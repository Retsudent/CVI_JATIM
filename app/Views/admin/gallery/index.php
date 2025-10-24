<!doctype html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Gallery Management - CVI Jatim</title>
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
		
		.gallery-container {
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
		
		.view-toggle {
			display: flex;
			gap: 8px;
		}
		
		.toggle-btn {
			padding: 8px 12px;
			border: 1px solid #e5e7eb;
			background: #ffffff;
			border-radius: 6px;
			font-size: 14px;
			cursor: pointer;
			transition: all 0.2s ease;
		}
		
		.toggle-btn.active {
			background: #111827;
			color: white;
			border-color: #111827;
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
		
		.photos-grid {
			display: grid;
			grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
			gap: 20px;
		}
		
		.photo-card {
			background: #ffffff;
			border: 1px solid #e5e7eb;
			border-radius: 8px;
			overflow: hidden;
			box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
			transition: all 0.2s ease;
			position: relative;
		}
		
		.photo-card:hover {
			box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
		}
		
		.photo-image {
			width: 100%;
			height: 200px;
			object-fit: cover;
		}
		
		.photo-overlay {
			position: absolute;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			background: rgba(0, 0, 0, 0.7);
			display: flex;
			align-items: center;
			justify-content: center;
			gap: 8px;
			opacity: 0;
			transition: opacity 0.2s ease;
		}
		
		.photo-card:hover .photo-overlay {
			opacity: 1;
		}
		
		.overlay-btn {
			padding: 8px 12px;
			background: rgba(255, 255, 255, 0.9);
			border: none;
			border-radius: 4px;
			font-size: 12px;
			cursor: pointer;
			text-decoration: none;
			color: #111827;
		}
		
		.photo-info {
			padding: 12px;
		}
		
		.photo-title {
			font-size: 14px;
			font-weight: 600;
			color: #111827;
			margin-bottom: 4px;
		}
		
		.photo-date {
			font-size: 12px;
			color: #6b7280;
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

			<?php
			// Use the photos provided by the controller (AdminCrud::indexPhoto)
			// $photos was passed to the view as 'photos'. Keep the view logic
			// minimal: compute a local $rows and $totalPhotos from that array.
			$rows = isset($photos) && is_array($photos) ? $photos : [];
			// Prefer controller-provided totalPhotos when available, otherwise compute it here
			if (!isset($totalPhotos)) {
				$totalPhotos = is_array($rows) ? count($rows) : 0;
			}
			?>

			<!-- Page Header -->
			<div class="page-header">
				<div class="page-title">
					<div class="page-icon">
						<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
							<rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
							<circle cx="8.5" cy="8.5" r="1.5"></circle>
							<polyline points="21,15 16,10 5,21"></polyline>
						</svg>
					</div>
					<span>Gallery Management</span>
				</div>
				<a href="/admin/gallery/create" class="add-btn">
					<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
						<line x1="12" y1="5" x2="12" y2="19"></line>
						<line x1="5" y1="12" x2="19" y2="12"></line>
					</svg>
					<span>Upload New Photo</span>
				</a>
			</div>
			
			<!-- Stats Row -->
			<div class="stats-row">
				<div class="stat-card">
					<div class="stat-header">
						<div class="stat-icon">
							<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
								<circle cx="8.5" cy="8.5" r="1.5"></circle>
								<polyline points="21,15 16,10 5,21"></polyline>
							</svg>
						</div>
					</div>
					<div class="stat-value"><?= (int)$totalPhotos ?></div>
					<div class="stat-label">Total Photos</div>
				</div>
			</div>
			
			<!-- Gallery Container -->
			<div class="gallery-container">
				<div class="table-header">
					<h3>Photo List</h3>
					<div style="display: flex; gap: 16px; align-items: center;">
						<div class="view-toggle">
							<button class="toggle-btn active" data-view="grid">
								<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
									<rect x="3" y="3" width="7" height="7"></rect>
									<rect x="14" y="3" width="7" height="7"></rect>
									<rect x="14" y="14" width="7" height="7"></rect>
									<rect x="3" y="14" width="7" height="7"></rect>
								</svg>
								Grid
							</button>
							<button class="toggle-btn" data-view="list">
								<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
									<line x1="8" y1="6" x2="21" y2="6"></line>
									<line x1="8" y1="12" x2="21" y2="12"></line>
									<line x1="8" y1="18" x2="21" y2="18"></line>
									<line x1="3" y1="6" x2="3.01" y2="6"></line>
									<line x1="3" y1="12" x2="3.01" y2="12"></line>
									<line x1="3" y1="18" x2="3.01" y2="18"></line>
								</svg>
								List
							</button>
						</div>
						<div class="search-box">
							<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<circle cx="11" cy="11" r="8"></circle>
								<path d="M21 21l-4.35-4.35"></path>
							</svg>
							<input type="text" placeholder="Search photos...">
						</div>
					</div>
				</div>
				
				<div class="photos-grid">
<?php
try {
    $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=cvi_wirotaman', 'postgres', 'postgres', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    $rows = $pdo->query('SELECT id, title, caption as description, image, created_at FROM photos ORDER BY id DESC LIMIT 100')->fetchAll(PDO::FETCH_ASSOC);
} catch (Throwable $e) { $rows = []; }
if (!$rows) {
    echo '<div style="grid-column: 1/-1; text-align: center; padding: 40px; color: #6b7280;">Tidak ada data foto.</div>';
}
foreach ($rows as $r):
    $img = base_url('assets/images/' . htmlspecialchars($r['image']));
?>
					<div class="photo-card">
						<img src="<?= $img ?>" alt="Photo" class="photo-image">
						<div class="photo-overlay">
							<a href="/admin/gallery/view/<?= (int)$r['id'] ?>" class="overlay-btn">View</a>
							<a href="/admin/gallery/edit/<?= (int)$r['id'] ?>" class="overlay-btn">Edit</a>
							<form method="post" action="/admin/gallery/delete/<?= (int)$r['id'] ?>" onsubmit="return confirm('Hapus foto ini?');" style="display:inline">
								<?= csrf_field() ?>
								<button type="submit" class="overlay-btn">Delete</button>
							</form>
						</div>
						<div class="photo-info">
							<div class="photo-title"><?= htmlspecialchars($r['title']) ?></div>
							<div class="photo-date"><?= date('d M Y', strtotime($r['created_at'])) ?></div>
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
			const cards = document.querySelectorAll('.photo-card');
			
			cards.forEach(card => {
				const text = card.textContent.toLowerCase();
				card.style.display = text.includes(searchTerm) ? 'block' : 'none';
			});
		});
		
		// View toggle functionality
		document.querySelectorAll('.toggle-btn').forEach(btn => {
			btn.addEventListener('click', function() {
				document.querySelectorAll('.toggle-btn').forEach(b => b.classList.remove('active'));
				this.classList.add('active');
				
				const view = this.dataset.view;
				const grid = document.querySelector('.photos-grid');
				
				if (view === 'list') {
					grid.style.gridTemplateColumns = '1fr';
				} else {
					grid.style.gridTemplateColumns = 'repeat(auto-fill, minmax(250px, 1fr))';
				}
			});
		});
	
	</script>
</body>
</html>