<?php

namespace App\Controllers;

use App\Models\EventModel;
use App\Models\MerchandiseModel;
use App\Models\CampgroundModel;
use App\Models\PhotoModel;

class Home extends BaseController
{
    protected $eventModel;
    protected $merchandiseModel;
    protected $campgroundModel;
    protected $photoModel;

    public function __construct()
    {
        $this->eventModel = new EventModel();
        $this->merchandiseModel = new MerchandiseModel();
        $this->campgroundModel = new CampgroundModel();
        $this->photoModel = new PhotoModel();
    }

    public function index()
    {
        // Get latest events from database
        $latestEvents = $this->eventModel->getHomeEvents(3); // Get 3 events for home page

        // Debug logging for troubleshooting
        log_message('info', 'Home page loaded. Found ' . count($latestEvents) . ' upcoming events');

        // Additional debugging info (only in development)
        if (ENVIRONMENT === 'development') {
            $allEvents = $this->eventModel->getAllEvents();
            log_message('debug', 'Total events in database: ' . count($allEvents));
            foreach ($allEvents as $event) {
                log_message('debug', 'Event: ' . $event['title'] . ' - Status: ' . $event['status'] . ' - Start Date: ' . $event['start_date']);
            }
        }

        // Get statistics for the home page
        // Get real counts from database
        try {
            $eventsCount = (int) $this->eventModel->countAll();
        } catch (\Throwable $e) { $eventsCount = 0; }

        try {
            $campgroundsCount = (int) $this->campgroundModel->countAll();
        } catch (\Throwable $e) { $campgroundsCount = 0; }

        try {
            $photosCount = (int) $this->photoModel->countAll();
        } catch (\Throwable $e) { $photosCount = 0; }

        $stats = [
            'kabupaten' => 5, // keep as-is for now
            'campgrounds' => $campgroundsCount,
            'events' => $eventsCount,
            'members' => $photosCount // Memories = number of photos
        ];

        $data = [
            'title' => 'CVI WIROTAMAN - Ngawi, Ponorogo, Pacitan, Madiun, Magetan',
            'events' => $latestEvents,
            'stats' => $stats,
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

        return render('home/index', $data);
    }
}
