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
        'status',
        'created_at',
        'updated_at'
    ];

    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    protected $validationRules = [
        'title' => 'required|max_length[255]',
        'description' => 'required',
        'location' => 'required|max_length[255]',
        'start_date' => 'required|valid_date',
        'end_date' => 'required|valid_date',
        'price' => 'permit_empty|decimal',
        'status' => 'required|in_list[upcoming,ongoing,completed,cancelled]'
    ];

    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    public function getUpcomingEvents($limit = null)
    {
        $builder = $this->builder();
        $builder->where('start_date >=', date('Y-m-d'))
                ->where('status', 'upcoming')
                ->orderBy('start_date', 'ASC');
        
        if ($limit) {
            $builder->limit($limit);
        }
        
        return $builder->get()->getResultArray();
    }

    public function getAllEvents()
    {
        return $this->orderBy('start_date', 'DESC')->findAll();
    }
}



