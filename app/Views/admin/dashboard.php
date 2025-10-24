<!doctype html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard - CVI Jatim</title>
	<link rel="stylesheet" href="<?= base_url('assets/css/admin-layout.css') ?>">
	<style>
		/* Custom styles for this page only */
		.nav-item.active {
			background: #f0fdf4;
			color: #166534;
			border-right: 3px solid #22c55e;
		}
		
		.dashboard-container {
			background: #ffffff;
			border: 1px solid #e5e7eb;
			border-radius: 8px;
			padding: 32px;
			box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
		}
		
		.dashboard-header {
			text-align: center;
			margin-bottom: 40px;
		}
		
		.dashboard-title {
			font-size: 32px;
			font-weight: 700;
			color: #111827;
			margin-bottom: 8px;
		}
		
		.dashboard-subtitle {
			font-size: 16px;
			color: #6b7280;
			margin-bottom: 20px;
		}
		
		.system-status {
			display: inline-flex;
			align-items: center;
			gap: 8px;
			background: #dcfce7;
			color: #166534;
			padding: 8px 16px;
			border-radius: 20px;
			font-size: 14px;
			font-weight: 500;
		}
		
		.status-dot {
			width: 8px;
			height: 8px;
			background: #22c55e;
			border-radius: 50%;
		}
		
		.stats-grid {
			display: grid;
			grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
			gap: 24px;
			margin-bottom: 40px;
		}
		
		.stat-card {
			background: #ffffff;
			border: 1px solid #e5e7eb;
			border-radius: 12px;
			padding: 24px;
			box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
			transition: all 0.2s ease;
		}
		
		.stat-card:hover {
			box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
		}
		
		.stat-header {
			display: flex;
			align-items: center;
			justify-content: space-between;
			margin-bottom: 16px;
		}
		
		.stat-icon {
			width: 40px;
			height: 40px;
			background: #f3f4f6;
			border-radius: 8px;
			display: flex;
			align-items: center;
			justify-content: center;
			color: #6b7280;
		}
		
		.stat-value {
			font-size: 28px;
			font-weight: 700;
			color: #111827;
			margin-bottom: 4px;
		}
		
		.stat-label {
			font-size: 14px;
			color: #6b7280;
			font-weight: 500;
		}
		
		.quick-actions {
			background: #ffffff;
			border: 1px solid #e5e7eb;
			border-radius: 8px;
			padding: 24px;
			box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
		}
		
		.quick-actions h3 {
			font-size: 20px;
			font-weight: 600;
			color: #111827;
			margin-bottom: 20px;
		}
		
		.actions-grid {
			display: grid;
			grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
			gap: 16px;
		}
		
		.action-btn {
			display: flex;
			align-items: center;
			gap: 12px;
			padding: 16px 20px;
			background: #f9fafb;
			border: 1px solid #e5e7eb;
			border-radius: 8px;
			text-decoration: none;
			color: #374151;
			font-weight: 500;
			transition: all 0.2s ease;
		}
		
		.action-btn:hover {
			background: #f3f4f6;
			border-color: #d1d5db;
			color: #111827;
		}
		
		.action-icon {
			width: 20px;
			height: 20px;
			color: #6b7280;
		}
	</style>
</head>
<body>
	<div class="layout">
		<?php include APPPATH . 'Views/admin/components/navbar.php'; ?>
		<?php include APPPATH . 'Views/admin/components/sidebar.php'; ?>
		
		<!-- Main Content -->
		<main class="content">
			<div class="dashboard-container">
				<div class="dashboard-header">
					<h1 class="dashboard-title">Dashboard Overview</h1>
					<p class="dashboard-subtitle">Monitor and manage your CVI Jatim content management system</p>
					<div class="system-status">
						<div class="status-dot"></div>
						<span>System Active</span>
					</div>
				</div>
				
				<div class="stats-grid">
					<div class="stat-card">
						<div class="stat-header">
							<div class="stat-icon">
								<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
									<rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
									<line x1="16" y1="2" x2="16" y2="6"></line>
									<line x1="8" y1="2" x2="8" y2="6"></line>
									<line x1="3" y1="10" x2="21" y2="10"></line>
								</svg>
							</div>
						</div>
						<div class="stat-value">12</div>
						<div class="stat-label">TOTAL EVENTS</div>
						<div style="font-size: 12px; color: #6b7280; margin-top: 4px;">Active events this month</div>
					</div>
					
					<div class="stat-card">
						<div class="stat-header">
							<div class="stat-icon">
								<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
									<path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
									<line x1="3" y1="6" x2="21" y2="6"></line>
								</svg>
							</div>
						</div>
						<div class="stat-value">8</div>
						<div class="stat-label">PRODUCTS</div>
						<div style="font-size: 12px; color: #6b7280; margin-top: 4px;">Products in inventory</div>
					</div>
					
					<div class="stat-card">
						<div class="stat-header">
							<div class="stat-icon">
								<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
									<path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
									<circle cx="12" cy="10" r="3"></circle>
								</svg>
							</div>
						</div>
						<div class="stat-value">4</div>
						<div class="stat-label">LOCATIONS</div>
						<div style="font-size: 12px; color: #6b7280; margin-top: 4px;">Camping locations</div>
					</div>
					
					<div class="stat-card">
						<div class="stat-header">
							<div class="stat-icon">
								<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
									<rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
									<circle cx="8.5" cy="8.5" r="1.5"></circle>
									<polyline points="21,15 16,10 5,21"></polyline>
								</svg>
							</div>
						</div>
						<div class="stat-value">156</div>
						<div class="stat-label">MEDIA</div>
						<div style="font-size: 12px; color: #6b7280; margin-top: 4px;">Photos in gallery</div>
					</div>
				</div>
				
				<div class="quick-actions">
					<h3>Quick Actions</h3>
					<div class="actions-grid">
						<a href="/admin/events" class="action-btn">
							<svg class="action-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
								<line x1="16" y1="2" x2="16" y2="6"></line>
								<line x1="8" y1="2" x2="8" y2="6"></line>
								<line x1="3" y1="10" x2="21" y2="10"></line>
							</svg>
							<span>Manage Events</span>
						</a>
						
						<a href="/admin/merchandise" class="action-btn">
							<svg class="action-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
								<line x1="3" y1="6" x2="21" y2="6"></line>
							</svg>
							<span>Manage Products</span>
						</a>
						
						<a href="/admin/campground" class="action-btn">
							<svg class="action-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
								<circle cx="12" cy="10" r="3"></circle>
							</svg>
							<span>Manage Locations</span>
						</a>
						
						<a href="/admin/gallery" class="action-btn">
							<svg class="action-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
								<circle cx="8.5" cy="8.5" r="1.5"></circle>
								<polyline points="21,15 16,10 5,21"></polyline>
							</svg>
							<span>Manage Gallery</span>
						</a>
						
						<a href="/admin/reviews" class="action-btn">
							<svg class="action-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<polygon points="12,2 15.09,8.26 22,9.27 17,14.14 18.18,21.02 12,17.77 5.82,21.02 7,14.14 2,9.27 8.91,8.26"></polygon>
							</svg>
							<span>Manage Reviews</span>
						</a>
						
						<a href="/admin/analytics" class="action-btn">
							<svg class="action-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<path d="M18 20V10"></path>
								<path d="M12 20V4"></path>
								<path d="M6 20v-6"></path>
							</svg>
							<span>View Analytics</span>
						</a>
						
						<a href="/admin/settings" class="action-btn">
							<svg class="action-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<circle cx="12" cy="12" r="3"></circle>
								<path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1 1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
							</svg>
							<span>Settings</span>
						</a>
					</div>
				</div>
			</div>
		</main>
	</div>
</body>
</html>
