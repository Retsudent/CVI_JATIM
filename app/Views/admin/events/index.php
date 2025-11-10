<!doctype html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Events Management - CVI Jatim</title>
	<link rel="stylesheet" href="<?= base_url('assets/css/admin-layout.css') ?>">
	<style>
		/* Page-specific enhancements */
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
		
		.events-container {
			background: #ffffff;
			border: 1px solid var(--gray-200);
			border-radius: var(--radius-md);
			padding: 24px;
			box-shadow: var(--shadow);
		}
		
		.table-header {
			display: flex;
			justify-content: space-between;
			align-items: center;
			margin-bottom: 20px;
			flex-wrap: wrap;
			gap: 16px;
		}
		
		.event-image {
			width: 60px;
			height: 60px;
			border-radius: var(--radius-sm);
			object-fit: cover;
			box-shadow: var(--shadow-sm);
			border: 2px solid var(--gray-200);
			background: var(--gray-100);
			flex-shrink: 0;
		}
		
		.event-image[src=""],
		.event-image:not([src]) {
			display: none;
		}
		
		.event-image-placeholder {
			width: 60px;
			height: 60px;
			border-radius: 8px;
			background: #f3f4f6;
			border: 2px solid #e5e7eb;
			display: flex;
			align-items: center;
			justify-content: center;
			color: #9ca3af;
			font-size: 24px;
			flex-shrink: 0;
		}
		
		.action-buttons {
			display: flex;
			gap: 8px;
			flex-wrap: wrap;
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
		
		.empty-state {
			padding: 60px 20px;
			text-align: center;
		}
		
		.empty-state svg {
			width: 64px;
			height: 64px;
			margin-bottom: 16px;
			color: var(--gray-300);
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
							<rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
							<line x1="16" y1="2" x2="16" y2="6"></line>
							<line x1="8" y1="2" x2="8" y2="6"></line>
							<line x1="3" y1="10" x2="21" y2="10"></line>
						</svg>
					</div>
					<span>Events Management</span>
				</div>
				<a href="/admin/events/create" class="add-btn">
					<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
						<line x1="12" y1="5" x2="12" y2="19"></line>
						<line x1="5" y1="12" x2="19" y2="12"></line>
					</svg>
					<span>Add New Event</span>
				</a>
			</div>
			
			<!-- Stats Row -->
			<div class="stats-row">
				<div class="stat-card">
					<div class="stat-header">
						<div class="stat-icon">
							<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
								<line x1="16" y1="2" x2="16" y2="6"></line>
								<line x1="8" y1="2" x2="8" y2="6"></line>
								<line x1="3" y1="10" x2="21" y2="10"></line>
							</svg>
						</div>
					</div>
					<div class="stat-value"><?= isset($totalEvents) ? (int)$totalEvents : 0 ?></div>
					<div class="stat-label">Total Events</div>
				</div>
				<div class="stat-card">
					<div class="stat-header">
						<div class="stat-icon">
							<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<polyline points="20,6 9,17 4,12"></polyline>
							</svg>
						</div>
					</div>
					<div class="stat-value"><?= isset($activeEvents) ? (int)$activeEvents : 0 ?></div>
					<div class="stat-label">Active Events</div>
				</div>
				<div class="stat-card">
					<div class="stat-header">
						<div class="stat-icon">
							<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<circle cx="12" cy="12" r="10"></circle>
								<polyline points="12,6 12,12 16,14"></polyline>
							</svg>
						</div>
					</div>
					<div class="stat-value"><?= isset($upcomingEvents) ? (int)$upcomingEvents : 0 ?></div>
					<div class="stat-label">Upcoming</div>
				</div>
			</div>
			
			<!-- Events Container -->
			<div class="events-container">
				<div class="table-header">
					<h3>Event List</h3>
					<div class="search-box">
						<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
							<circle cx="11" cy="11" r="8"></circle>
							<path d="M21 21l-4.35-4.35"></path>
						</svg>
						<input type="text" placeholder="Search events...">
					</div>
				</div>
				
				<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th>Event</th>
							<th>Date</th>
							<th>Location</th>
							<th>Status</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
<?php
try {
    $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=cvi_wirotaman', 'postgres', 'postgres', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    $rows = $pdo->query('SELECT id, title, description, location, start_date, end_date, image, status FROM events ORDER BY id DESC LIMIT 100')->fetchAll(PDO::FETCH_ASSOC);
} catch (Throwable $e) { $rows = []; }
if (!$rows) {
    echo '<tr><td colspan="5">Tidak ada data event.</td></tr>';
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
            // Just filename, assume it's in events folder
            $img = base_url('assets/images/events/' . htmlspecialchars($imageData));
            $hasImage = true;
        }
    }
?>
						<tr>
							<td>
								<div style="display: flex; align-items: center; gap: 12px;">
									<?php if ($hasImage): ?>
									<img src="<?= $img ?>" alt="Event" class="event-image" 
										loading="lazy"
										decoding="async">
									<?php endif; ?>
									<div class="event-image-placeholder" style="display: <?= $hasImage ? 'none' : 'flex' ?>; width: 60px; height: 60px; border-radius: 8px; background: #f3f4f6; border: 2px solid #e5e7eb; align-items: center; justify-content: center; color: #9ca3af; font-size: 24px;">📅</div>
									<div>
										<div style="font-weight: 600; color: #111827;"><?= htmlspecialchars($r['title']) ?></div>
										<div style="font-size: 12px; color: #6b7280;"><?= htmlspecialchars($r['description']) ?></div>
									</div>
								</div>
							</td>
							<td><?= htmlspecialchars($r['start_date']) ?></td>
							<td><?= htmlspecialchars($r['location']) ?></td>
							<td><span class="status-badge <?= $r['status']==='active'?'status-active':'status-inactive' ?>"><?= htmlspecialchars($r['status']) ?></span></td>
							<td>
								<div class="action-buttons">
									<?php if ($hasImage): ?>
									<button type="button" class="btn btn-secondary btn-sm" onclick="openImageModal('<?= $img ?>', '<?= htmlspecialchars($r['title'], ENT_QUOTES) ?>', '<?= htmlspecialchars($r['description'], ENT_QUOTES) ?>')">View</button>
									<?php else: ?>
									<button type="button" class="btn btn-secondary btn-sm" onclick="alert('Tidak ada gambar untuk event ini')" title="Tidak ada gambar">View</button>
									<?php endif; ?>
									<a href="/admin/events/edit/<?= (int)$r['id'] ?>" class="btn btn-secondary btn-sm">Edit</a>
									<form method="post" action="/admin/events/delete/<?= (int)$r['id'] ?>" onsubmit="return confirm('Hapus event ini?');" style="display:inline">
										<?= csrf_field() ?>
										<button type="submit" class="btn btn-danger btn-sm">Delete</button>
									</form>
								</div>
							</td>
						</tr>
<?php endforeach; ?>
					</tbody>
				</table>
				</div>
			</div>
		
		</main>
	</div>
	
	<script>
		// Prevent images from continuously loading on error
		document.addEventListener('DOMContentLoaded', function() {
			// Handle all event images
			const eventImages = document.querySelectorAll('.event-image');
			eventImages.forEach(function(img) {
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
						// Show placeholder
						const placeholder = this.nextElementSibling;
						if (placeholder && placeholder.classList.contains('event-image-placeholder')) {
							placeholder.style.display = 'flex';
						}
					}
				};
			});
		});
		
		// Search functionality
		document.querySelector('.search-box input').addEventListener('input', function(e) {
			const searchTerm = e.target.value.toLowerCase();
			const rows = document.querySelectorAll('.table tbody tr');
			
			rows.forEach(row => {
				const text = row.textContent.toLowerCase();
				row.style.display = text.includes(searchTerm) ? '' : 'none';
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
