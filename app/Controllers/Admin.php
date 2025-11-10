<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use App\Models\EventModel;
use App\Models\MerchandiseModel;
use App\Models\CampgroundModel;
use App\Models\PhotoModel;

class Admin extends BaseController
{
	public function index(): ResponseInterface
	{
		// gather stats for dashboard cards
		$eventModel = new EventModel();
		$merchModel = new MerchandiseModel();
		$campModel = new CampgroundModel();
		$photoModel = new PhotoModel();

		try {
			$eventsCount = (int) $eventModel->countAll();
		} catch (\Throwable $e) { $eventsCount = 0; }

		try {
			// Active events = statuses upcoming or ongoing
			$activeEventsCount = (int) $eventModel->whereIn('status', ['upcoming', 'ongoing'])->countAllResults();
		} catch (\Throwable $e) { $activeEventsCount = 0; }

		try {
			$productsCount = (int) $merchModel->countAll();
		} catch (\Throwable $e) { $productsCount = 0; }

		try {
			$locationsCount = (int) $campModel->countAll();
		} catch (\Throwable $e) { $locationsCount = 0; }

		try {
			$mediaCount = (int) $photoModel->countAll();
		} catch (\Throwable $e) { $mediaCount = 0; }

		$data = [
			'title' => 'Dashboard - Admin CVI Jatim',
			'session' => session(),
			'eventsCount' => $eventsCount,
			'activeEventsCount' => $activeEventsCount,
			'productsCount' => $productsCount,
			'locationsCount' => $locationsCount,
			'mediaCount' => $mediaCount
		];

		return $this->response->setBody(view('admin/dashboard', $data));
	}
}


