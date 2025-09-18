<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MerchandiseSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Kaos Event Anniversary CVI WIROTAMAN 2nd',
                'description' => 'Kaos eksklusif untuk event Anniversary CVI Wirotaman ke-2 dengan desain menarik.',
                'price' => 100000.00,
                'image' => 'kaos-anniversary.jpg',
                'category' => 'Apparel',
                'stock' => 50,
                'status' => 'available',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Tumbler Hitam Event Anniversary CVI WIROTAMAN 2nd',
                'description' => 'Tumbler hitam dengan logo CVI Wirotaman untuk event Anniversary.',
                'price' => 45000.00,
                'image' => 'tumbler-hitam.jpg',
                'category' => 'Accessories',
                'stock' => 30,
                'status' => 'available',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Tumbler Putih Event Anniversary CVI WIROTAMAN 2nd',
                'description' => 'Tumbler putih dengan logo CVI Wirotaman untuk event Anniversary.',
                'price' => 45000.00,
                'image' => 'tumbler-putih.jpg',
                'category' => 'Accessories',
                'stock' => 30,
                'status' => 'available',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Tumbler Set Vacuum Flask Event Anniversary CVI WIROTAMAN 2nd',
                'description' => 'Set tumbler vacuum flask dengan logo CVI Wirotaman.',
                'price' => 60000.00,
                'image' => 'tumbler-set.jpg',
                'category' => 'Accessories',
                'stock' => 20,
                'status' => 'available',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('merchandise')->insertBatch($data);
    }
}



