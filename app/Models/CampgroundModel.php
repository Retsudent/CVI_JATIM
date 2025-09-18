<?php

namespace App\Models;

use CodeIgniter\Model;

class CampgroundModel extends Model
{
    protected $table = 'campgrounds';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'name',
        'description',
        'location',
        'price_per_person',
        'image',
        'facilities',
        'contact_info',
        'status',
        'created_at',
        'updated_at'
    ];

    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    protected $validationRules = [
        'name' => 'required|max_length[255]',
        'description' => 'required',
        'location' => 'required|max_length[255]',
        'price_per_person' => 'required|decimal',
        'facilities' => 'permit_empty',
        'contact_info' => 'permit_empty',
        'status' => 'required|in_list[active,inactive,maintenance]'
    ];

    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    public function getAllCampgrounds()
    {
        return $this->where('status', 'active')->orderBy('name', 'ASC')->findAll();
    }
}



