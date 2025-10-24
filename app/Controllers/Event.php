<?php

namespace App\Controllers;

use App\Models\EventModel;

class Event extends BaseController
{
    protected $eventModel;

    public function __construct()
    {
        $this->eventModel = new EventModel();
    }

    public function index()
    {
        // Return all events for the public events listing so completed/past events are visible
        $events = $this->eventModel->getAllEvents();

        // Debug logging
        log_message('info', 'Event page loaded. Events returned (all): ' . count($events));

        $data = [
            'title' => 'Events - CVI WIROTAMAN',
            'events' => $events
        ];

        return render('event/index', $data);
    }

    public function detail($id)
    {
        $event = $this->eventModel->find($id);
        
        if (!$event) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Event not found');
        }

        // Normalize event data for view compatibility
        if (isset($event['start_date'])) {
            // view expects 'date' key (string), map from start_date (and include end_date if present)
            $event['date'] = $event['start_date'];
            if (!empty($event['end_date'])) {
                $event['date'] = $event['start_date'] . ' - ' . $event['end_date'];
            }
        } else {
            $event['date'] = $event['date'] ?? '';
        }

        // Ensure activities and facilities are arrays (DB may store JSON or null)
        if (isset($event['activities']) && is_string($event['activities'])) {
            $decoded = json_decode($event['activities'], true);
            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                $event['activities'] = $decoded;
            } else {
                // try to split by newlines as fallback
                $event['activities'] = array_values(array_filter(array_map('trim', preg_split('/\r?\n/', $event['activities']))));
            }
        }
        if (empty($event['activities']) || !is_array($event['activities'])) {
            $event['activities'] = [];
        }

        if (isset($event['facilities']) && is_string($event['facilities'])) {
            $decoded = json_decode($event['facilities'], true);
            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                $event['facilities'] = $decoded;
            } else {
                $event['facilities'] = array_values(array_filter(array_map('trim', preg_split('/\r?\n/', $event['facilities']))));
            }
        }
        if (empty($event['facilities']) || !is_array($event['facilities'])) {
            $event['facilities'] = [];
        }

        // Badge defaults derived from status if not present
        if (empty($event['badge_text'])) {
            $event['badge_text'] = ucfirst((string)($event['status'] ?? 'Info'));
        }
        if (empty($event['badge_class'])) {
            $map = [
                'upcoming' => 'bg-success',
                'ongoing'  => 'bg-primary',
                'completed'=> 'bg-secondary',
                'cancelled'=> 'bg-danger'
            ];
            $event['badge_class'] = $map[$event['status'] ?? ''] ?? 'bg-secondary';
        }

        $data = [
            'title' => $event['title'] . ' - CVI WIROTAMAN',
            'event' => $event
        ];

    return render('event/detail', $data);
    }
}
