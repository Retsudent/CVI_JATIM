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
			flex-wrap: wrap;
			gap: 16px;
		}
		
		.table-header h3 {
			margin: 0;
			flex: 1;
			min-width: 150px;
		}
		
		.table-header > div {
			display: flex;
			gap: 16px;
			align-items: center;
			flex-wrap: wrap;
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
			display: flex;
			align-items: center;
			gap: 6px;
			white-space: nowrap;
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
			width: 100%;
			max-width: 300px;
			flex-shrink: 0;
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
			grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
			gap: 20px;
		}
		
		.photo-card {
			background: #ffffff;
			border: 1px solid var(--gray-200);
			border-radius: var(--radius-md);
			overflow: hidden;
			box-shadow: var(--shadow);
			transition: all 0.3s ease;
			position: relative;
			display: flex;
			flex-direction: column;
		}
		
		.photo-card:hover {
			box-shadow: var(--shadow-lg);
			transform: translateY(-4px);
		}
		
		.photo-image-container {
			position: relative;
			width: 100%;
			height: 200px;
			overflow: hidden;
			background: var(--gray-100);
		}
		
		.photo-image {
			width: 100%;
			height: 100%;
			object-fit: cover;
			transition: all 0.3s ease;
		}
		
		.photo-card:hover .photo-image {
			transform: scale(1.05);
			filter: brightness(0.6);
		}
		
		.photo-overlay {
			position: absolute;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			background: rgba(0, 0, 0, 0.5);
			display: flex;
			align-items: center;
			justify-content: center;
			gap: 8px;
			opacity: 0;
			transition: opacity 0.3s ease;
			pointer-events: none;
		}
		
		.photo-card:hover .photo-overlay {
			opacity: 1;
			pointer-events: all;
		}
		
		.overlay-btn {
			padding: 10px 16px;
			background: rgba(255, 255, 255, 0.95);
			border: 2px solid rgba(255, 255, 255, 0.8);
			border-radius: var(--radius-sm);
			font-size: 13px;
			font-weight: 600;
			cursor: pointer;
			text-decoration: none;
			color: var(--gray-900);
			transition: all 0.2s ease;
			box-shadow: var(--shadow-md);
			pointer-events: all;
		}
		
		.overlay-btn:hover {
			background: #ffffff;
			border-color: #ffffff;
			transform: translateY(-2px);
			box-shadow: var(--shadow-lg);
		}
		
		.overlay-btn:active {
			transform: translateY(0);
		}
		
		.photo-info {
			padding: 16px;
			background: #ffffff;
			border-top: 1px solid var(--gray-200);
		}
		
		.photo-title {
			font-size: 15px;
			font-weight: 600;
			color: var(--gray-900);
			margin-bottom: 6px;
		}
		
		.photo-date {
			font-size: 13px;
			color: var(--gray-500);
		}
		
		/* Lightbox Modal */
		.lightbox {
			display: none;
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background: rgba(0, 0, 0, 0.95);
			z-index: 10000;
			justify-content: center;
			align-items: center;
			animation: fadeIn 0.3s ease;
		}
		
		.lightbox.active {
			display: flex;
		}
		
		@keyframes fadeIn {
			from { opacity: 0; }
			to { opacity: 1; }
		}
		
		.lightbox-content {
			position: relative;
			max-width: 90vw;
			max-height: 90vh;
			display: flex;
			justify-content: center;
			align-items: center;
		}
		
		.lightbox-image {
			max-width: 100%;
			max-height: 90vh;
			object-fit: contain;
			border-radius: var(--radius-md);
			box-shadow: var(--shadow-xl);
			animation: zoomIn 0.3s ease;
		}
		
		@keyframes zoomIn {
			from { transform: scale(0.8); opacity: 0; }
			to { transform: scale(1); opacity: 1; }
		}
		
		.lightbox-close {
			position: absolute;
			top: 20px;
			right: 20px;
			width: 40px;
			height: 40px;
			background: rgba(255, 255, 255, 0.9);
			border: none;
			border-radius: 50%;
			font-size: 24px;
			cursor: pointer;
			display: flex;
			align-items: center;
			justify-content: center;
			color: var(--gray-900);
			transition: all 0.2s ease;
			box-shadow: var(--shadow-lg);
			z-index: 10001;
		}
		
		.lightbox-close:hover {
			background: #ffffff;
			transform: rotate(90deg);
		}
		
		.lightbox-info {
			position: absolute;
			bottom: 20px;
			left: 50%;
			transform: translateX(-50%);
			background: rgba(255, 255, 255, 0.95);
			padding: 16px 24px;
			border-radius: var(--radius-md);
			box-shadow: var(--shadow-lg);
			text-align: center;
			max-width: 80%;
		}
		
		.lightbox-title {
			font-size: 18px;
			font-weight: 600;
			color: var(--gray-900);
			margin-bottom: 4px;
		}
		
		.lightbox-date {
			font-size: 14px;
			color: var(--gray-500);
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
		
		/* Responsive Styles */
		@media (max-width: 768px) {
			.stats-row {
				grid-template-columns: 1fr;
				gap: 16px;
			}
			
			.gallery-container {
				padding: 16px;
			}
			
			.table-header {
				flex-direction: column;
				align-items: stretch;
			}
			
			.table-header h3 {
				min-width: auto;
			}
			
			.table-header > div {
				width: 100%;
				flex-direction: column;
				align-items: stretch;
			}
			
			.view-toggle {
				width: 100%;
				justify-content: stretch;
			}
			
			.toggle-btn {
				flex: 1;
				justify-content: center;
			}
			
			.search-box {
				max-width: 100%;
				width: 100%;
			}
			
			.photos-grid {
				grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
				gap: 16px;
			}
			
			.photo-image-container {
				height: 150px;
			}
			
			.photo-info {
				padding: 12px;
			}
			
			.photo-title {
				font-size: 14px;
			}
			
			.photo-date {
				font-size: 12px;
			}
			
			.overlay-btn {
				padding: 8px 12px;
				font-size: 12px;
			}
		}
		
		@media (max-width: 480px) {
			.page-header {
				flex-direction: column;
				align-items: stretch;
				gap: 12px;
			}
			
			.add-btn {
				width: 100%;
				justify-content: center;
			}
			
			.photos-grid {
				grid-template-columns: 1fr;
				gap: 12px;
			}
			
			.photo-image-container {
				height: 200px;
			}
			
			.photo-overlay {
				gap: 6px;
				flex-wrap: wrap;
			}
			
			.overlay-btn {
				padding: 6px 10px;
				font-size: 11px;
			}
		}
		
		@media (min-width: 769px) and (max-width: 1024px) {
			.photos-grid {
				grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
			}
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
					<div>
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
						<div class="photo-image-container">
							<img src="<?= $img ?>" alt="<?= htmlspecialchars($r['title']) ?>" class="photo-image" data-lightbox-src="<?= $img ?>" data-lightbox-title="<?= htmlspecialchars($r['title']) ?>" data-lightbox-date="<?= date('d M Y', strtotime($r['created_at'])) ?>">
							<div class="photo-overlay">
								<button type="button" class="overlay-btn" onclick="openLightbox('<?= $img ?>', '<?= htmlspecialchars(addslashes($r['title'])) ?>', '<?= date('d M Y', strtotime($r['created_at'])) ?>')">View</button>
								<a href="/admin/gallery/edit/<?= (int)$r['id'] ?>" class="overlay-btn">Edit</a>
								<form method="post" action="/admin/gallery/delete/<?= (int)$r['id'] ?>" onsubmit="return confirm('Hapus foto ini?');" style="display:inline">
									<?= csrf_field() ?>
									<button type="submit" class="overlay-btn">Delete</button>
								</form>
							</div>
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
	
	<!-- Lightbox Modal -->
	<div class="lightbox" id="lightbox">
		<button class="lightbox-close" onclick="closeLightbox()">&times;</button>
		<div class="lightbox-content">
			<img src="" alt="" class="lightbox-image" id="lightboxImage">
			<div class="lightbox-info">
				<div class="lightbox-title" id="lightboxTitle"></div>
				<div class="lightbox-date" id="lightboxDate"></div>
			</div>
		</div>
	</div>
	
	<script>
		
		// Search functionality
		document.querySelector('.search-box input').addEventListener('input', function(e) {
			const searchTerm = e.target.value.toLowerCase();
			const cards = document.querySelectorAll('.photo-card');
			
			cards.forEach(card => {
				const text = card.textContent.toLowerCase();
				card.style.display = text.includes(searchTerm) ? 'flex' : 'none';
			});
		});
		
		// Function to update grid layout based on view and screen size
		function updateGridLayout() {
			const grid = document.querySelector('.photos-grid');
			const activeView = document.querySelector('.toggle-btn.active')?.dataset.view;
			
			if (!grid) return;
			
			if (activeView === 'list') {
				grid.style.gridTemplateColumns = '1fr';
			} else {
				// Responsive grid based on screen size
				if (window.innerWidth <= 480) {
					grid.style.gridTemplateColumns = '1fr';
				} else if (window.innerWidth <= 768) {
					grid.style.gridTemplateColumns = 'repeat(auto-fill, minmax(150px, 1fr))';
				} else if (window.innerWidth <= 1024) {
					grid.style.gridTemplateColumns = 'repeat(auto-fill, minmax(180px, 1fr))';
				} else {
					grid.style.gridTemplateColumns = 'repeat(auto-fill, minmax(200px, 1fr))';
				}
			}
		}
		
		// View toggle functionality
		document.querySelectorAll('.toggle-btn').forEach(btn => {
			btn.addEventListener('click', function() {
				document.querySelectorAll('.toggle-btn').forEach(b => b.classList.remove('active'));
				this.classList.add('active');
				updateGridLayout();
			});
		});
		
		// Update grid on window resize
		let resizeTimeout;
		window.addEventListener('resize', function() {
			clearTimeout(resizeTimeout);
			resizeTimeout = setTimeout(function() {
				updateGridLayout();
			}, 250);
		});
		
		// Initialize grid layout on page load
		document.addEventListener('DOMContentLoaded', function() {
			updateGridLayout();
		});
		
		// Lightbox functionality
		function openLightbox(imageSrc, title, date) {
			const lightbox = document.getElementById('lightbox');
			const lightboxImage = document.getElementById('lightboxImage');
			const lightboxTitle = document.getElementById('lightboxTitle');
			const lightboxDate = document.getElementById('lightboxDate');
			
			lightboxImage.src = imageSrc;
			lightboxTitle.textContent = title;
			lightboxDate.textContent = date;
			lightbox.classList.add('active');
			document.body.style.overflow = 'hidden';
		}
		
		function closeLightbox() {
			const lightbox = document.getElementById('lightbox');
			lightbox.classList.remove('active');
			document.body.style.overflow = '';
		}
		
		// Close lightbox when clicking outside the image
		document.getElementById('lightbox').addEventListener('click', function(e) {
			if (e.target === this || e.target.classList.contains('lightbox-content')) {
				closeLightbox();
			}
		});
		
		// Close lightbox with Escape key
		document.addEventListener('keydown', function(e) {
			if (e.key === 'Escape') {
				closeLightbox();
			}
		});
	
	</script>
</body>
</html>