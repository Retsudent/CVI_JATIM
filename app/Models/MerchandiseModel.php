<?php

namespace App\Models;

use CodeIgniter\Model;

class MerchandiseModel extends Model
{
    protected $table = 'merchandise';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'name',
        'description',
        'price',
        'image',
        'category',
        'stock',
        'status',
        'sizes',
        'colors',
        'specifications',
        'whatsapp_contact',
        'rating',
        'reviews',
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
        'price' => 'required|numeric',
        'stock' => 'required|integer',
        'status' => 'permit_empty|in_list[available,out_of_stock,discontinued]',
        'sizes' => 'permit_empty',
        'colors' => 'permit_empty',
        'specifications' => 'permit_empty',
        'whatsapp_contact' => 'permit_empty'
    ];

    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    public function getFeaturedMerchandise($limit = null)
    {
        $builder = $this->builder();
        $builder->where('status', 'available')
                ->where('stock >', 0)
                ->orderBy('created_at', 'DESC');
        
        if ($limit) {
            $builder->limit($limit);
        }
        
        return $builder->get()->getResultArray();
    }

    public function getAllMerchandise()
    {
        return $this->orderBy('created_at', 'DESC')->findAll();
    }
}



