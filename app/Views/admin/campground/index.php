<!doctype html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Locations Management - CVI Jatim</title>
	<link rel="stylesheet" href="<?= base_url('assets/css/admin-layout.css') ?>">
	<style>
		/* Custom styles for this page only */
		.nav-item.active {
			background: #f0fdf4;
			color: #166534;
			border-right: 3px solid #22c55e;
		}
		
		/* Custom styles for this page only */
		.stats-row {
			display: grid;
			grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
			gap: 20px;
			margin-bottom: 32px;
		}
		
		.stat-card {
			background: #ffffff;
			border: 1px solid #e5e7eb;
			border-radius: 8px;
			padding: 20px;
			box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
		}
		
		.stat-header {
			display: flex;
			align-items: center;
			justify-content: space-between;
			margin-bottom: 12px;
		}
		
		.stat-icon {
			width: 32px;
			height: 32px;
			background: #f3f4f6;
			border-radius: 6px;
			display: flex;
			align-items: center;
			justify-content: center;
			color: #6b7280;
		}
		
		.stat-value {
			font-size: 24px;
			font-weight: 700;
			color: #111827;
			margin-bottom: 4px;
		}
		
		.stat-label {
			font-size: 14px;
			color: #6b7280;
		}
		
		.campgrounds-container {
			background: #ffffff;
			border: 1px solid #e5e7eb;
			border-radius: 8px;
			padding: 24px;
			box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
		}
		
		.table-header {
			display: flex;
			justify-content: space-between;
			align-items: center;
			margin-bottom: 20px;
		}
		
		.search-box {
			display: flex;
			align-items: center;
			gap: 8px;
			padding: 8px 12px;
			background: #f9fafb;
			border: 1px solid #e5e7eb;
			border-radius: 6px;
			width: 300px;
		}
		
		.search-box input {
			border: none;
			background: transparent;
			outline: none;
			font-size: 14px;
			width: 100%;
		}
		
		.campgrounds-grid {
			display: grid;
			grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
			gap: 20px;
		}
		
		.campground-card {
			background: #ffffff;
			border: 1px solid #e5e7eb;
			border-radius: 8px;
			overflow: hidden;
			box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
			transition: all 0.2s ease;
		}
		
		.campground-card:hover {
			box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
		}
		
		.campground-image {
			width: 100%;
			height: 200px;
			object-fit: cover;
		}
		
		.campground-info {
			padding: 16px;
		}
		
		.campground-title {
			font-size: 16px;
			font-weight: 600;
			color: #111827;
			margin-bottom: 8px;
		}
		
		.campground-location {
			font-size: 14px;
			color: #6b7280;
			margin-bottom: 8px;
			display: flex;
			align-items: center;
			gap: 4px;
		}
		
		.campground-description {
			font-size: 14px;
			color: #374151;
			line-height: 1.5;
			margin-bottom: 12px;
		}
		
		.campground-actions {
			display: flex;
			gap: 8px;
		}
		
		.btn-sm {
			padding: 6px 12px;
			font-size: 12px;
			border-radius: 4px;
			text-decoration: none;
			display: inline-flex;
			align-items: center;
			gap: 4px;
		}
		
		.btn-secondary {
			background: #f3f4f6;
			color: #374151;
			border: 1px solid #e5e7eb;
		}
		
		.btn-danger {
			background: #ef4444;
			color: white;
			border: 1px solid #ef4444;
		}
	
	</style>
</head>
<body>
	<div class="layout">
		<?php include APPPATH . 'Views/admin/components/navbar.php'; ?>
		<?php include APPPATH . 'Views/admin/components/sidebar.php'; ?>
		
		<!-- Main Content -->
		<main class="content">
			
			<!-- Page Header -->
			<div class="page-header">
				<div class="page-title">
					<div class="page-icon">
						<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
							<path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
							<circle cx="12" cy="10" r="3"></circle>
						</svg>
					</div>
					<span>Locations Management</span>
				</div>
				<a href="/admin/campground/create" class="add-btn">
					<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
						<line x1="12" y1="5" x2="12" y2="19"></line>
						<line x1="5" y1="12" x2="19" y2="12"></line>
					</svg>
					<span>Add New Location</span>
				</a>
			</div>
			
			<!-- Stats Row -->
			<div class="stats-row">
				<div class="stat-card">
					<div class="stat-header">
						<div class="stat-icon">
							<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
								<circle cx="12" cy="10" r="3"></circle>
							</svg>
					</div>
					</div>
					<div class="stat-value">4</div>
					<div class="stat-label">Total Locations</div>
				</div>
				<div class="stat-card">
					<div class="stat-header">
						<div class="stat-icon">
							<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<polyline points="20,6 9,17 4,12"></polyline>
							</svg>
					</div>
					</div>
					<div class="stat-value">4</div>
					<div class="stat-label">Active Locations</div>
				</div>
				<div class="stat-card">
					<div class="stat-header">
						<div class="stat-icon">
							<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
								<circle cx="9" cy="7" r="4"></circle>
								<path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
								<path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
							</svg>
					</div>
					</div>
					<div class="stat-value">125</div>
					<div class="stat-label">Total Capacity</div>
				</div>
				<div class="stat-card">
					<div class="stat-header">
						<div class="stat-icon">
							<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
							</svg>
					</div>
					</div>
					<div class="stat-value">Rp 1.2M</div>
					<div class="stat-label">Monthly Revenue</div>
				</div>
			</div>
			
			<!-- Campgrounds Container -->
			<div class="campgrounds-container">
				<div class="table-header">
					<h3>Location List</h3>
					<div class="search-box">
						<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
							<circle cx="11" cy="11" r="8"></circle>
							<path d="M21 21l-4.35-4.35"></path>
						</svg>
						<input type="text" placeholder="Search locations...">
					</div>
				</div>
				
				<div class="campgrounds-grid">
<?php
try {
    $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=cvi_wirotaman', 'postgres', 'postgres', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    $rows = $pdo->query('SELECT id, name, description, location, image, status FROM campgrounds ORDER BY id DESC LIMIT 100')->fetchAll(PDO::FETCH_ASSOC);
} catch (Throwable $e) { $rows = []; }
if (!$rows) {
    echo '<div style="grid-column: 1/-1; text-align: center; padding: 40px; color: #6b7280;">Tidak ada data lokasi.</div>';
}
foreach ($rows as $r):
    $img = $r['image'] ? base_url('assets/images/campground/' . htmlspecialchars($r['image'])) : base_url('assets/images/placeholder.jpg');
?>
					<div class="campground-card">
						<img src="<?= $img ?>" alt="Campground" class="campground-image">
						<div class="campground-info">
							<div class="campground-title"><?= htmlspecialchars($r['name']) ?></div>
							<div class="campground-location">
								<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
									<path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
									<circle cx="12" cy="10" r="3"></circle>
								</svg>
								<?= htmlspecialchars($r['location']) ?>
							</div>
							<div class="campground-description"><?= htmlspecialchars($r['description']) ?></div>
							<div class="campground-actions">
								<a href="/campground/detail/<?= (int)$r['id'] ?>" class="btn-sm btn-secondary" target="_blank">View</a>
								<a href="/admin/campground/edit/<?= (int)$r['id'] ?>" class="btn-sm btn-secondary">Edit</a>
								<form method="post" action="/admin/campground/delete/<?= (int)$r['id'] ?>" onsubmit="return confirm('Hapus lokasi ini?');" style="display:inline">
									<?= csrf_field() ?>
									<button type="submit" class="btn-sm btn-danger">Delete</button>
								</form>
							</div>
						</div>
					</div>
<?php endforeach; ?>
				</div>
			</div>
		
		</main>
	</div>
	
	<script>
		
		// Search functionality
		document.querySelector('.search-box input').addEventListener('input', function(e) {
			const searchTerm = e.target.value.toLowerCase();
			const cards = document.querySelectorAll('.campground-card');
			
			cards.forEach(card => {
				const text = card.textContent.toLowerCase();
				card.style.display = text.includes(searchTerm) ? 'block' : 'none';
			});
		});
	
	</script>
</body>
</html>