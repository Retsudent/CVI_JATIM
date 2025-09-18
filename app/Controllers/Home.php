<?php

namespace App\Controllers;

use App\Models\EventModel;
use App\Models\MerchandiseModel;
use App\Models\CampgroundModel;

class Home extends BaseController
{
    protected $eventModel;
    protected $merchandiseModel;
    protected $campgroundModel;

    public function __construct()
    {
        $this->eventModel = new EventModel();
        $this->merchandiseModel = new MerchandiseModel();
        $this->campgroundModel = new CampgroundModel();
    }

    public function index()
    {
        // Sample data untuk demo
        $data = [
            'title' => 'CVI WIROTAMAN - Ngawi, Ponorogo, Pacitan, Madiun, Magetan',
            'events' => [
                [
                    'id' => 1,
                    'title' => 'Anniversary CVI Wirotaman 2nd',
                    'description' => 'Perayaan ulang tahun ke-2 CVI Wirotaman dengan berbagai kegiatan seru dan menarik.',
                    'location' => 'Wonder Park - Tawangmangu',
                    'start_date' => '2025-05-10',
                    'end_date' => '2025-05-11',
                    'image' => 'anniversary-2nd.jpg',
                    'price' => 0.00,
                    'status' => 'upcoming'
                ],
                [
                    'id' => 2,
                    'title' => 'Happy Camp KOPDAR CVI JATIM',
                    'description' => 'Kopdar dan camping bersama komunitas CVI Jawa Timur.',
                    'location' => 'Bumi Perkemahan Karanganyar',
                    'start_date' => '2024-03-02',
                    'end_date' => '2024-03-03',
                    'image' => 'happy-camp.jpg',
                    'price' => 0.00,
                    'status' => 'completed'
                ]
            ],
            'merchandise' => [
                [
                    'id' => 1,
                    'name' => 'Kaos Event Anniversary CVI WIROTAMAN 2nd',
                    'description' => 'Kaos eksklusif untuk event Anniversary CVI Wirotaman ke-2 dengan desain menarik.',
                    'price' => 100000.00,
                    'image' => 'kaos-anniversary.jpg',
                    'category' => 'Apparel',
                    'stock' => 50,
                    'status' => 'available'
                ],
                [
                    'id' => 2,
                    'name' => 'Tumbler Hitam Event Anniversary CVI WIROTAMAN 2nd',
                    'description' => 'Tumbler hitam dengan logo CVI Wirotaman untuk event Anniversary.',
                    'price' => 45000.00,
                    'image' => 'tumbler-hitam.jpg',
                    'category' => 'Accessories',
                    'stock' => 30,
                    'status' => 'available'
                ]
            ],
            'campgrounds' => [
                [
                    'id' => 1,
                    'name' => 'Telaga Ngebel',
                    'description' => 'Campground dengan pemandangan danau yang indah, cocok untuk camping dan kegiatan outdoor.',
                    'location' => 'Ngebel, Ponorogo',
                    'price_per_person' => 15000.00,
                    'image' => 'telaga-ngebel.jpg',
                    'facilities' => 'Toilet, Air bersih, Area parkir, Tempat sampah',
                    'contact_info' => 'WhatsApp: 081234567890',
                    'status' => 'active'
                ],
                [
                    'id' => 2,
                    'name' => 'Gunung Lawu',
                    'description' => 'Campground di kaki Gunung Lawu dengan udara sejuk dan pemandangan gunung yang menakjubkan.',
                    'location' => 'Magetan',
                    'price_per_person' => 20000.00,
                    'image' => 'gunung-lawu.jpg',
                    'facilities' => 'Toilet, Air bersih, Area parkir, Tempat sampah, Warung',
                    'contact_info' => 'WhatsApp: 081234567891',
                    'status' => 'active'
                ]
            ]
        ];

        return view('home/index', $data);
    }
}