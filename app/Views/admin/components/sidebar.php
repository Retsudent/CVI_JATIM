<?php
// Get current page to set active navigation
$current_page = basename($_SERVER['REQUEST_URI']);
$active_events = (strpos($current_page, 'events') !== false) ? 'active' : '';
$active_merchandise = (strpos($current_page, 'merchandise') !== false) ? 'active' : '';
$active_campground = (strpos($current_page, 'campground') !== false) ? 'active' : '';
$active_gallery = (strpos($current_page, 'gallery') !== false) ? 'active' : '';
$active_reviews = (strpos($current_page, 'reviews') !== false) ? 'active' : '';
$active_dashboard = ($current_page === 'admin' || $current_page === '') ? 'active' : '';
?>

<!-- Sidebar -->
<aside class="sidebar">
	<div class="nav-section">
		<div class="nav-title">Dashboard</div>
		<a href="/admin" class="nav-item <?= $active_dashboard ?>">
			<div class="nav-icon">
				<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
					<path d="M18 20V10"></path>
					<path d="M12 20V4"></path>
					<path d="M6 20v-6"></path>
				</svg>
			</div>
			<span>Overview</span>
		</a>
	</div>
	
	<div class="nav-section">
		<div class="nav-title">Content Management</div>
		<a href="/admin/events" class="nav-item <?= $active_events ?>">
			<div class="nav-icon">
				<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
					<rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
					<line x1="16" y1="2" x2="16" y2="6"></line>
					<line x1="8" y1="2" x2="8" y2="6"></line>
					<line x1="3" y1="10" x2="21" y2="10"></line>
				</svg>
			</div>
			<span>Events</span>
		</a>
		<a href="/admin/merchandise" class="nav-item <?= $active_merchandise ?>">
			<div class="nav-icon">
				<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
					<path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
					<line x1="3" y1="6" x2="21" y2="6"></line>
				</svg>
			</div>
			<span>Products</span>
		</a>
		<a href="/admin/campground" class="nav-item <?= $active_campground ?>">
			<div class="nav-icon">
				<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
					<path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
					<circle cx="12" cy="10" r="3"></circle>
				</svg>
			</div>
			<span>Locations</span>
		</a>
		<a href="/admin/gallery" class="nav-item <?= $active_gallery ?>">
			<div class="nav-icon">
				<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
					<rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
					<circle cx="8.5" cy="8.5" r="1.5"></circle>
					<polyline points="21,15 16,10 5,21"></polyline>
				</svg>
			</div>
			<span>Gallery</span>
		</a>
		<a href="/admin/reviews" class="nav-item <?= $active_reviews ?>">
			<div class="nav-icon">
				<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
					<polygon points="12,2 15.09,8.26 22,9.27 17,14.14 18.18,21.02 12,17.77 5.82,21.02 7,14.14 2,9.27 8.91,8.26"></polygon>
				</svg>
			</div>
			<span>Reviews</span>
		</a>
	</div>
	
	<div class="nav-section">
		<div class="nav-title">Website</div>
		<a href="/" class="nav-item">
			<div class="nav-icon">
				<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
					<circle cx="12" cy="12" r="10"></circle>
					<line x1="2" y1="12" x2="22" y2="12"></line>
					<path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
				</svg>
			</div>
			<span>View Website</span>
		</a>
	</div>
</aside>

