<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class EventSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'title' => 'Anniversary CVI Wirotaman 2nd',
                'description' => 'Perayaan ulang tahun ke-2 CVI Wirotaman dengan berbagai kegiatan seru dan menarik.',
                'location' => 'Wonder Park - Tawangmangu',
                'start_date' => '2025-05-10',
                'end_date' => '2025-05-11',
                'image' => 'anniversary-2nd.jpg',
                'price' => 0.00,
                'status' => 'upcoming',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'Happy Camp KOPDAR CVI JATIM',
                'description' => 'Kopdar dan camping bersama komunitas CVI Jawa Timur.',
                'location' => 'Bumi Perkemahan Karanganyar',
                'start_date' => '2024-03-02',
                'end_date' => '2024-03-03',
                'image' => 'happy-camp.jpg',
                'price' => 0.00,
                'status' => 'completed',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'Halal Bi Halal CVI WIROTAMAN 2025',
                'description' => 'Acara halal bi halal setelah Ramadhan dengan silaturahmi dan berbagai kegiatan.',
                'location' => 'Bumi Perkemahan Gunung Lawu',
                'start_date' => '2025-04-12',
                'end_date' => '2025-04-13',
                'image' => 'halal-bihalal.jpg',
                'price' => 0.00,
                'status' => 'upcoming',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'Camping Menyambut Ramadhan CVI WIROTAMAN 2025',
                'description' => 'Camping bersama menyambut bulan suci Ramadhan dengan berbagai kegiatan keagamaan.',
                'location' => 'Danau Telaga Ngebel',
                'start_date' => '2025-02-22',
                'end_date' => '2025-02-23',
                'image' => 'ramadhan-camping.jpg',
                'price' => 0.00,
                'status' => 'upcoming',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('events')->insertBatch($data);
    }
}



