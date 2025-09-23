<?php

namespace App\Controllers;

use App\Models\CampgroundModel;

class Campground extends BaseController
{
    protected $campgroundModel;

    public function __construct()
    {
        $this->campgroundModel = new CampgroundModel();
    }

    public function index()
    {
        // Static campground data
        $campgrounds = [
            [
                'id' => 1,
                'name' => 'Telaga Ngebel',
                'description' => 'Campground dengan pemandangan danau yang menakjubkan di Ngebel, Ponorogo. Lokasi ini sangat cocok untuk camping keluarga dengan suasana yang tenang dan udara yang sejuk.',
                'location' => 'Ngebel, Ponorogo, Jawa Timur',
                'price_per_person' => 15000.00,
                'image' => 'telaga-ngebel.jpg',
                'facilities' => 'Area camping seluas 2 hektar, 30+ spot tenda, Toilet dan MCK (5 unit), Air bersih 24 jam, Parkir kendaraan (50 slot), Security 24/7, Warung makan dan minuman, Rental peralatan camping, Area foto dengan spot terbaik, Gazebo untuk meeting, Fire pit area, WiFi gratis',
                'contact_info' => 'WhatsApp: 081234567890',
                'status' => 'active'
            ],
            [
                'id' => 2,
                'name' => 'Bumi Perkemahan Karanganyar',
                'description' => 'Area camping yang luas dengan fasilitas lengkap di Karanganyar, Ngawi. Lokasi strategis dengan akses mudah dan fasilitas modern. Cocok untuk acara besar dan camping kelompok.',
                'location' => 'Karanganyar, Ngawi, Jawa Timur',
                'price_per_person' => 25000.00,
                'image' => 'bumi-perkemahan-karanganyar.jpg',
                'facilities' => 'Area camping seluas 5 hektar, 50+ spot tenda, Toilet dan MCK (10 unit), Air bersih 24 jam, Parkir kendaraan (100 slot), Security 24/7, Kantin dan warung makan, Rental peralatan camping lengkap, Area foto dengan berbagai spot, Hall untuk acara indoor, Fire pit area (3 lokasi), WiFi gratis, Sound system',
                'contact_info' => 'WhatsApp: 081234567891',
                'status' => 'active'
            ],
            [
                'id' => 3,
                'name' => 'Wonder Park Tawangmangu',
                'description' => 'Campground premium dengan pemandangan gunung dan udara sejuk di Tawangmangu. Lokasi eksklusif dengan fasilitas terbaik dan pemandangan yang menakjubkan. Perfect untuk acara spesial dan retreat.',
                'location' => 'Tawangmangu, Magetan, Jawa Timur',
                'price_per_person' => 50000.00,
                'image' => 'wonder-park-tawangmangu.jpg',
                'facilities' => 'Area camping premium seluas 3 hektar, 20+ spot tenda eksklusif, Toilet dan MCK premium (8 unit), Air panas dan dingin 24 jam, Parkir kendaraan (40 slot), Security 24/7, Restaurant dan cafe, Rental peralatan camping premium, Area foto dengan pemandangan gunung, Meeting room ber-AC, Fire pit area dengan pemandangan, WiFi gratis high speed, Sound system profesional, Fotografer profesional',
                'contact_info' => 'WhatsApp: 081234567892',
                'status' => 'active'
            ],
            [
                'id' => 4,
                'name' => 'Bumi Perkemahan Gembira',
                'description' => 'Campground dengan suasana yang menyenangkan di Madiun. Lokasi yang mudah dijangkau dengan fasilitas lengkap dan harga terjangkau. Cocok untuk keluarga dan kelompok kecil.',
                'location' => 'Madiun, Jawa Timur',
                'price_per_person' => 30000.00,
                'image' => 'bumi-perkemahan-gembira.jpg',
                'facilities' => 'Area camping seluas 1.5 hektar, 25+ spot tenda, Toilet dan MCK (6 unit), Air bersih 24 jam, Parkir kendaraan (40 slot), Security 24/7, Warung makan dan minuman, Rental peralatan camping, Area foto dengan berbagai spot, Gazebo untuk meeting, Fire pit area, WiFi gratis, Playground untuk anak',
                'contact_info' => 'WhatsApp: 081234567893',
                'status' => 'active'
            ]
        ];

        $data = [
            'title' => 'Campground - CVI WIROTAMAN',
            'campgrounds' => $campgrounds
        ];

        // Debug: Log campgrounds data
        log_message('debug', 'Campgrounds data: ' . json_encode($campgrounds));

        return view('campground/index', $data);
    }

    public function detail($id)
    {
        // Static campground data
        $campgrounds = [
            1 => [
                'id' => 1,
                'name' => 'Telaga Ngebel',
                'description' => 'Telaga Ngebel adalah campground yang menawarkan pemandangan danau yang menakjubkan di Ngebel, Ponorogo. Lokasi ini sangat cocok untuk camping keluarga dengan suasana yang tenang dan udara yang sejuk. Danau yang jernih dan pemandangan perbukitan menciptakan atmosfer yang sempurna untuk relaksasi dan kegiatan outdoor.',
                'location' => 'Ngebel, Ponorogo, Jawa Timur',
                'price_per_person' => 15000.00,
                'image' => 'telaga-ngebel.jpg',
                'facilities' => 'Area camping seluas 2 hektar, 30+ spot tenda, Toilet dan MCK (5 unit), Air bersih 24 jam, Parkir kendaraan (50 slot), Security 24/7, Warung makan dan minuman, Rental peralatan camping, Area foto dengan spot terbaik, Gazebo untuk meeting, Fire pit area, WiFi gratis',
                'contact_info' => 'WhatsApp: 081234567890',
                'status' => 'active'
            ],
            2 => [
                'id' => 2,
                'name' => 'Bumi Perkemahan Karanganyar',
                'description' => 'Bumi Perkemahan Karanganyar adalah area camping yang luas dengan fasilitas lengkap di Karanganyar, Ngawi. Lokasi strategis dengan akses mudah dan fasilitas modern. Cocok untuk acara besar dan camping kelompok.',
                'location' => 'Karanganyar, Ngawi, Jawa Timur',
                'price_per_person' => 25000.00,
                'image' => 'bumi-perkemahan-karanganyar.jpg',
                'facilities' => 'Area camping seluas 5 hektar, 50+ spot tenda, Toilet dan MCK (10 unit), Air bersih 24 jam, Parkir kendaraan (100 slot), Security 24/7, Kantin dan warung makan, Rental peralatan camping lengkap, Area foto dengan berbagai spot, Hall untuk acara indoor, Fire pit area (3 lokasi), WiFi gratis, Sound system',
                'contact_info' => 'WhatsApp: 081234567891',
                'status' => 'active'
            ],
            3 => [
                'id' => 3,
                'name' => 'Wonder Park Tawangmangu',
                'description' => 'Wonder Park Tawangmangu adalah campground premium dengan pemandangan gunung dan udara sejuk di Tawangmangu. Lokasi eksklusif dengan fasilitas terbaik dan pemandangan yang menakjubkan. Perfect untuk acara spesial dan retreat.',
                'location' => 'Tawangmangu, Magetan, Jawa Timur',
                'price_per_person' => 50000.00,
                'image' => 'wonder-park-tawangmangu.jpg',
                'facilities' => 'Area camping premium seluas 3 hektar, 20+ spot tenda eksklusif, Toilet dan MCK premium (8 unit), Air panas dan dingin 24 jam, Parkir kendaraan (40 slot), Security 24/7, Restaurant dan cafe, Rental peralatan camping premium, Area foto dengan pemandangan gunung, Meeting room ber-AC, Fire pit area dengan pemandangan, WiFi gratis high speed, Sound system profesional, Fotografer profesional',
                'contact_info' => 'WhatsApp: 081234567892',
                'status' => 'active'
            ],
            4 => [
                'id' => 4,
                'name' => 'Bumi Perkemahan Gembira',
                'description' => 'Bumi Perkemahan Gembira adalah campground dengan suasana yang menyenangkan di Madiun. Lokasi yang mudah dijangkau dengan fasilitas lengkap dan harga terjangkau. Cocok untuk keluarga dan kelompok kecil.',
                'location' => 'Madiun, Jawa Timur',
                'price_per_person' => 30000.00,
                'image' => 'bumi-perkemahan-gembira.jpg',
                'facilities' => 'Area camping seluas 1.5 hektar, 25+ spot tenda, Toilet dan MCK (6 unit), Air bersih 24 jam, Parkir kendaraan (40 slot), Security 24/7, Warung makan dan minuman, Rental peralatan camping, Area foto dengan berbagai spot, Gazebo untuk meeting, Fire pit area, WiFi gratis, Playground untuk anak',
                'contact_info' => 'WhatsApp: 081234567893',
                'status' => 'active'
            ]
        ];

        $campground = $campgrounds[$id] ?? null;
        
        if (!$campground) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Campground not found');
        }

        // Get related campgrounds (exclude current one)
        $relatedCampgrounds = array_filter($campgrounds, function($key) use ($id) {
            return $key != $id;
        });

        $data = [
            'title' => $campground['name'] . ' - CVI WIROTAMAN',
            'campground' => $campground,
            'related_campgrounds' => array_values($relatedCampgrounds)
        ];

        return view('campground/detail', $data);
    }
}



