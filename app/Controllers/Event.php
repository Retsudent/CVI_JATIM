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
        $data = [
            'title' => 'Events - CVI WIROTAMAN',
            'events' => $this->eventModel->getAllEvents()
        ];

        return view('event/index', $data);
    }

    public function detail($id)
    {
        $event = $this->eventModel->find($id);
        
        if (!$event) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Event not found');
        }

        $data = [
            'title' => $event['title'] . ' - CVI WIROTAMAN',
            'event' => $event
        ];

        return view('event/detail', $data);
    }
}



