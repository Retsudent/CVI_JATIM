<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CampgroundSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Telaga Ngebel',
                'description' => 'Campground dengan pemandangan danau yang indah, cocok untuk camping dan kegiatan outdoor.',
                'location' => 'Ngebel, Ponorogo',
                'price_per_person' => 15000.00,
                'image' => 'telaga-ngebel.jpg',
                'facilities' => 'Toilet, Air bersih, Area parkir, Tempat sampah',
                'contact_info' => 'WhatsApp: 081234567890',
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Gunung Lawu',
                'description' => 'Campground di kaki Gunung Lawu dengan udara sejuk dan pemandangan gunung yang menakjubkan.',
                'location' => 'Magetan',
                'price_per_person' => 20000.00,
                'image' => 'gunung-lawu.jpg',
                'facilities' => 'Toilet, Air bersih, Area parkir, Tempat sampah, Warung',
                'contact_info' => 'WhatsApp: 081234567891',
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Pantai Pacitan',
                'description' => 'Campground di tepi pantai dengan pemandangan sunset yang indah.',
                'location' => 'Pacitan',
                'price_per_person' => 25000.00,
                'image' => 'pantai-pacitan.jpg',
                'facilities' => 'Toilet, Air bersih, Area parkir, Tempat sampah, Warung, Gazebo',
                'contact_info' => 'WhatsApp: 081234567892',
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('campgrounds')->insertBatch($data);
    }
}



