<?php

namespace App\Models;

use CodeIgniter\Model;

class EventModel extends Model
{
    protected $table = 'events';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'title',
        'description',
        'location',
        'start_date',
        'end_date',
        'image',
        'price',
        'capacity',
        'whatsapp_contact',
        'activities',
        'facilities',
        'status',
        'created_at',
        'updated_at'
    ];
    
    protected $DBGroup = 'default';

    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    protected $validationRules = [
        'title' => 'required|max_length[255]',
        'description' => 'required',
        'location' => 'required|max_length[255]',
        'start_date' => 'required|valid_date',
        'end_date' => 'permit_empty|valid_date',
        'price' => 'permit_empty|decimal',
        'status' => 'required|in_list[upcoming,ongoing,completed,cancelled]'
    ];

    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    public function getUpcomingEvents($limit = null)
    {
        try {
            $builder = $this->builder();

            // Get current date in Y-m-d format
            $current_date = date('Y-m-d');

            // Build query for upcoming events - include events that are upcoming or ongoing
            // Include events that either start in the future OR have not yet ended (end_date >= today)
            $builder->groupStart()
                    ->where('start_date >=', $current_date)
                    ->orWhere('end_date >=', $current_date)
                ->groupEnd()
                ->whereIn('status', ['upcoming', 'ongoing'])
                    ->orderBy('start_date', 'ASC')
                    ->orderBy('created_at', 'DESC'); // If same date, show newest first

            if ($limit) {
                $builder->limit((int)$limit);
            }
            $result = $builder->get()->getResultArray();

            // Log the query for debugging
            log_message('info', 'getUpcomingEvents query executed. Found ' . count($result) . ' events');

            return $result;

        } catch (\Exception $e) {
            log_message('error', 'Error in getUpcomingEvents: ' . $e->getMessage());
            return [];
        }
    }

    public function getAllEvents()
    {
        return $this->orderBy('start_date', 'DESC')->findAll();
    }

    /**
     * Get recent events for testing purposes
     */
    public function getRecentEvents($limit = 5)
    {
        try {
            return $this->orderBy('created_at', 'DESC')
                        ->limit((int)$limit)
                        ->findAll();
        } catch (\Exception $e) {
            log_message('error', 'Error in getRecentEvents: ' . $e->getMessage());
            return [];
        }
    }

    /**
     * Get events for home page - includes upcoming and recent events
     */
    public function getHomeEvents($limit = 3)
    {
        try {
            $builder = $this->builder();
            $current_date = date('Y-m-d');

            // Get upcoming events first
            $upcoming = $builder->where('start_date >=', $current_date)
                               ->whereIn('status', ['upcoming', 'ongoing'])
                               ->orderBy('start_date', 'ASC')
                               ->limit((int)$limit)
                               ->get()
                               ->getResultArray();

            // If we don't have enough upcoming events, get recent events
            if (count($upcoming) < $limit) {
                $remaining = $limit - count($upcoming);
                $recent = $this->orderBy('created_at', 'DESC')
                              ->limit($remaining)
                              ->findAll();
                
                // Merge while avoiding duplicates (an event may appear in both upcoming and recent)
                $merged = array_merge($upcoming, $recent);
                $seen = [];
                $deduped = [];
                foreach ($merged as $item) {
                    $id = isset($item['id']) ? (string)$item['id'] : null;
                    if ($id === null) {
                        $deduped[] = $item;
                        continue;
                    }
                    if (!isset($seen[$id])) {
                        $seen[$id] = true;
                        $deduped[] = $item;
                    }
                }

                // Ensure we return at most $limit items
                $upcoming = array_slice($deduped, 0, (int)$limit);
            }

            return $upcoming;
        } catch (\Exception $e) {
            log_message('error', 'Error in getHomeEvents: ' . $e->getMessage());
            return [];
        }
    }

    /**
     * Count total events by status
     */
    public function countEventsByStatus()
    {
        try {
            $result = [];
            $statuses = ['upcoming', 'ongoing', 'completed', 'cancelled'];

            foreach ($statuses as $status) {
                $count = $this->where('status', $status)->countAllResults();
                $result[$status] = $count;
            }

            return $result;
        } catch (\Exception $e) {
            log_message('error', 'Error in countEventsByStatus: ' . $e->getMessage());
            return [];
        }
    }
}
