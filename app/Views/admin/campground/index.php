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
			flex-wrap: wrap;
			gap: 16px;
		}
		
		.table-header h3 {
			margin: 0;
			flex: 1;
			min-width: 150px;
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
		
		.campgrounds-grid {
			display: grid;
			grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
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
			background: var(--gray-100);
			display: block;
		}
		
		.campground-image[src=""],
		.campground-image:not([src]) {
			background: var(--gray-200);
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
			flex-wrap: wrap;
		}
		
		.btn-sm {
			padding: 6px 12px;
			font-size: 12px;
			border-radius: 4px;
			text-decoration: none;
			display: inline-flex;
			align-items: center;
			gap: 4px;
			white-space: nowrap;
		}
		
		/* Responsive Styles */
		@media (max-width: 768px) {
			.stats-row {
				grid-template-columns: 1fr;
				gap: 16px;
			}
			
			.campgrounds-container {
				padding: 16px;
			}
			
			.table-header {
				flex-direction: column;
				align-items: stretch;
			}
			
			.table-header h3 {
				min-width: auto;
			}
			
			.search-box {
				max-width: 100%;
				width: 100%;
			}
			
			.campgrounds-grid {
				grid-template-columns: 1fr;
				gap: 16px;
			}
			
			.campground-card {
				margin: 0;
			}
			
			.campground-image {
				height: 180px;
			}
			
			.campground-info {
				padding: 12px;
			}
			
			.campground-actions {
				flex-direction: column;
			}
			
			.campground-actions .btn-sm {
				width: 100%;
				justify-content: center;
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
			
			.campground-image {
				height: 150px;
			}
			
			.campground-title {
				font-size: 14px;
			}
			
			.campground-location,
			.campground-description {
				font-size: 13px;
			}
		}
		
		@media (min-width: 769px) and (max-width: 1024px) {
			.campgrounds-grid {
				grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
			}
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
		
		/* Image Lightbox Modal */
		.image-modal {
			display: none;
			position: fixed;
			z-index: 10000;
			left: 0;
			top: 0;
			width: 100%;
			height: 100%;
			background-color: rgba(0, 0, 0, 0.9);
			backdrop-filter: blur(5px);
			opacity: 0;
			transition: opacity 0.3s ease;
			overflow: auto;
		}
		
		.image-modal.active {
			display: flex;
			align-items: center;
			justify-content: center;
			opacity: 1;
		}
		
		.image-modal-content {
			position: relative;
			max-width: 90%;
			max-height: 90vh;
			margin: auto;
			animation: zoomIn 0.3s ease;
		}
		
		@keyframes zoomIn {
			from {
				transform: scale(0.8);
				opacity: 0;
			}
			to {
				transform: scale(1);
				opacity: 1;
			}
		}
		
		.image-modal-img {
			width: 100%;
			height: auto;
			max-height: 90vh;
			object-fit: contain;
			border-radius: 8px;
			box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
		}
		
		.image-modal-close {
			position: absolute;
			top: -50px;
			right: 0;
			color: #ffffff;
			font-size: 30px;
			font-weight: bold;
			cursor: pointer;
			background: rgba(255, 255, 255, 0.1);
			border: 2px solid rgba(255, 255, 255, 0.3);
			border-radius: 50%;
			width: 40px;
			height: 40px;
			display: flex;
			align-items: center;
			justify-content: center;
			transition: all 0.3s ease;
			line-height: 1;
			z-index: 10001;
		}
		
		.image-modal-close:hover {
			background: rgba(255, 255, 255, 0.2);
			border-color: rgba(255, 255, 255, 0.5);
			transform: rotate(90deg);
		}
		
		.image-modal-info {
			position: absolute;
			bottom: -60px;
			left: 0;
			right: 0;
			text-align: center;
			color: #ffffff;
			padding: 0 20px;
		}
		
		.image-modal-title {
			font-size: 18px;
			font-weight: 600;
			margin-bottom: 6px;
			word-wrap: break-word;
		}
		
		.image-modal-description {
			font-size: 14px;
			color: rgba(255, 255, 255, 0.8);
			word-wrap: break-word;
			max-height: 60px;
			overflow-y: auto;
		}
		
		@media (max-width: 768px) {
			.image-modal-content {
				max-width: 95%;
				padding: 10px;
			}
			
			.image-modal-close {
				top: -45px;
				width: 35px;
				height: 35px;
				font-size: 24px;
			}
			
			.image-modal-info {
				bottom: -55px;
			}
			
			.image-modal-title {
				font-size: 16px;
			}
			
			.image-modal-description {
				font-size: 12px;
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
					<div class="stat-value"><?= isset($totalLocations) ? (int)$totalLocations : 0 ?></div>
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
					<div class="stat-value"><?= isset($activeLocations) ? (int)$activeLocations : 0 ?></div>
					<div class="stat-label">Active Locations</div>
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
    // Handle both full URL and filename-only formats
    $imageData = $r['image'] ?? '';
    $hasImage = false;
    $img = '';
    
    if (!empty($imageData)) {
        if (strpos($imageData, 'http://') === 0 || strpos($imageData, 'https://') === 0) {
            // Full URL (http/https)
            $img = htmlspecialchars($imageData);
            $hasImage = true;
        } elseif (strpos($imageData, base_url()) === 0) {
            // URL with base_url prefix
            $img = htmlspecialchars($imageData);
            $hasImage = true;
        } elseif (strpos($imageData, 'assets/images/') !== false) {
            // Path contains assets/images
            $img = base_url($imageData);
            $hasImage = true;
        } elseif (strpos($imageData, '/') === 0) {
            // Absolute path starting with /
            $img = base_url(ltrim($imageData, '/'));
            $hasImage = true;
        } elseif (strpos($imageData, '/') !== false) {
            // Relative path with slashes
            $img = base_url($imageData);
            $hasImage = true;
        } else {
            // Just filename, assume it's in campground folder
            $img = base_url('assets/images/campground/' . htmlspecialchars($imageData));
            $hasImage = true;
        }
    }
?>
					<div class="campground-card">
						<?php if ($hasImage): ?>
						<img src="<?= $img ?>" alt="Campground" class="campground-image" loading="lazy" decoding="async">
						<?php else: ?>
						<div class="campground-image-placeholder" style="width: 100%; height: 200px; background: #f3f4f6; border: 2px solid #e5e7eb; display: flex; align-items: center; justify-content: center; color: #9ca3af; font-size: 48px;">🏕️</div>
						<?php endif; ?>
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
								<?php if ($hasImage): ?>
								<button type="button" class="btn-sm btn-secondary" onclick="openImageModal('<?= $img ?>', '<?= htmlspecialchars($r['name'], ENT_QUOTES) ?>', '<?= htmlspecialchars($r['location'], ENT_QUOTES) ?>')">View</button>
								<?php else: ?>
								<button type="button" class="btn-sm btn-secondary" onclick="alert('Tidak ada gambar untuk campground ini')" title="Tidak ada gambar">View</button>
								<?php endif; ?>
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
	
	<script>
		// Prevent images from continuously loading on error
		document.addEventListener('DOMContentLoaded', function() {
			// Handle all campground images
			const campgroundImages = document.querySelectorAll('.campground-image');
			campgroundImages.forEach(function(img) {
				// Set timeout to stop loading if image takes too long
				let loadTimeout = setTimeout(function() {
					if (!img.complete) {
						img.onerror();
					}
				}, 5000); // 5 second timeout
				
				img.onload = function() {
					clearTimeout(loadTimeout);
				};
				
				img.onerror = function() {
					clearTimeout(loadTimeout);
					// Prevent infinite loop
					if (this.dataset.errorHandled !== 'true') {
						this.dataset.errorHandled = 'true';
						this.onerror = null;
						this.style.display = 'none';
						// Create placeholder if it doesn't exist
						if (!this.nextElementSibling || !this.nextElementSibling.classList.contains('campground-image-placeholder')) {
							const placeholder = document.createElement('div');
							placeholder.className = 'campground-image-placeholder';
							placeholder.style.cssText = 'width: 100%; height: 200px; background: #f3f4f6; border: 2px solid #e5e7eb; display: flex; align-items: center; justify-content: center; color: #9ca3af; font-size: 48px;';
							placeholder.textContent = '🏕️';
							this.parentNode.insertBefore(placeholder, this.nextSibling);
						} else {
							this.nextElementSibling.style.display = 'flex';
						}
					}
				};
			});
		});
	</script>
	
	<!-- Image Modal -->
	<div id="imageModal" class="image-modal" onclick="closeImageModal(event)">
		<div class="image-modal-content" onclick="event.stopPropagation()">
			<span class="image-modal-close" onclick="closeImageModal(event)">&times;</span>
			<img id="modalImage" class="image-modal-img" src="" alt="Preview">
			<div class="image-modal-info">
				<div id="modalTitle" class="image-modal-title"></div>
				<div id="modalDescription" class="image-modal-description"></div>
			</div>
		</div>
	</div>
	
	<script>
		function openImageModal(imageSrc, title, description) {
			const modal = document.getElementById('imageModal');
			const modalImg = document.getElementById('modalImage');
			const modalTitle = document.getElementById('modalTitle');
			const modalDescription = document.getElementById('modalDescription');
			
			if (!modal || !modalImg) return;
			
			// Prevent infinite loop by setting onerror to null after first error
			let errorHandled = false;
			
			// Clear any previous error messages
			const existingError = modalImg.parentNode.querySelector('.image-error-message');
			if (existingError) {
				existingError.remove();
			}
			
			modalImg.onerror = function() {
				if (!errorHandled) {
					errorHandled = true;
					this.onerror = null; // Prevent infinite loop
					this.style.display = 'none';
					// Show error message instead of trying to load placeholder
					const errorDiv = document.createElement('div');
					errorDiv.className = 'image-error-message';
					errorDiv.style.cssText = 'color: #fff; text-align: center; padding: 40px; font-size: 16px; background: rgba(255,255,255,0.1); border-radius: 8px;';
					errorDiv.textContent = 'Gambar tidak dapat dimuat';
					this.parentNode.insertBefore(errorDiv, this);
				}
			};
			modalImg.onload = function() {
				this.style.display = 'block';
				errorHandled = false;
				// Remove error message if image loads successfully
				const existingError = this.parentNode.querySelector('.image-error-message');
				if (existingError) {
					existingError.remove();
				}
			};
			modalImg.src = imageSrc;
			modalImg.style.display = 'block';
			modalTitle.textContent = title || '';
			modalDescription.textContent = description || '';
			
			modal.classList.add('active');
			document.body.style.overflow = 'hidden';
		}
		
		function closeImageModal(event) {
			if (event) {
				event.stopPropagation();
			}
			const modal = document.getElementById('imageModal');
			if (modal) {
				modal.classList.remove('active');
				document.body.style.overflow = '';
			}
		}
		
		// Close modal on ESC key
		document.addEventListener('keydown', function(event) {
			if (event.key === 'Escape') {
				closeImageModal();
			}
		});
		
		// Close modal when clicking outside the image
		document.addEventListener('click', function(event) {
			const modal = document.getElementById('imageModal');
			if (modal && modal.classList.contains('active')) {
				if (event.target === modal) {
					closeImageModal();
				}
			}
		});
	</script>
</body>
</html>