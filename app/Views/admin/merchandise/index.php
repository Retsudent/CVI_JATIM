<!doctype html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Products Management - CVI Jatim</title>
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
		
		.products-container {
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
		
		.filter-buttons {
			display: flex;
			gap: 8px;
			/* allow horizontal scrolling on small screens */
			overflow-x: auto;
			-webkit-overflow-scrolling: touch;
			padding-bottom: 6px;
			flex-wrap: nowrap;
		}
		
		.filter-btn {
			padding: 8px 16px;
			border: 1px solid #e5e7eb;
			background: #ffffff;
			border-radius: 6px;
			font-size: 14px;
			cursor: pointer;
			transition: all 0.2s ease;
			min-width: 72px;
			flex: 0 0 auto;
		}
		
		.filter-btn.active {
			background: #111827;
			color: white;
			border-color: #111827;
		}
		
		/* Responsive adjustments for filter buttons */
		@media (max-width: 768px) {
			.filter-btn {
				padding: 6px 10px;
				font-size: 13px;
				min-width: 64px;
			}
			.table-header { flex-wrap: wrap; gap: 8px; align-items: center; }
		}
		
		.products-grid {
			display: grid;
			grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
			gap: 20px;
		}
		
		.product-card {
			background: #ffffff;
			border: 1px solid #e5e7eb;
			border-radius: 8px;
			overflow: hidden;
			box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
			transition: all 0.2s ease;
		}
		
		.product-card:hover {
			box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
		}
		
		.product-image {
			width: 100%;
			height: 200px;
			object-fit: cover;
			background: var(--gray-100);
			display: block;
		}
		
		.product-image[src=""],
		.product-image:not([src]) {
			background: var(--gray-200);
		}
		
		.product-info {
			padding: 16px;
		}
		
		.product-title {
			font-size: 16px;
			font-weight: 600;
			color: #111827;
			margin-bottom: 8px;
		}
		
		.product-price {
			font-size: 18px;
			font-weight: 700;
			color: #059669;
			margin-bottom: 8px;
		}
		
		.product-stock {
			font-size: 14px;
			color: #6b7280;
			margin-bottom: 12px;
		}
		
		.product-actions {
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
							<path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
							<line x1="3" y1="6" x2="21" y2="6"></line>
						</svg>
					</div>
					<span>Products Management</span>
				</div>
				<a href="/admin/merchandise/create" class="add-btn">
					<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
						<line x1="12" y1="5" x2="12" y2="19"></line>
						<line x1="5" y1="12" x2="19" y2="12"></line>
					</svg>
					<span>Add New Product</span>
				</a>
			</div>
			
			<!-- Stats Row -->
			<div class="stats-row">
				<div class="stat-card">
					<div class="stat-header">
						<div class="stat-icon">
							<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
								<line x1="3" y1="6" x2="21" y2="6"></line>
							</svg>
						</div>
					</div>
					<div class="stat-value"><?= isset($totalProducts) ? (int)$totalProducts : 0 ?></div>
					<div class="stat-label">Total Products</div>
				</div>
				<div class="stat-card">
					<div class="stat-header">
						<div class="stat-icon">
							<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<polyline points="20,6 9,17 4,12"></polyline>
							</svg>
						</div>
					</div>
					<div class="stat-value"><?= isset($activeProducts) ? (int)$activeProducts : 0 ?></div>
					<div class="stat-label">Active Products</div>
				</div>
			</div>
			
			<!-- Products Container -->
			<div class="products-container">
				<div class="table-header">
					<h3>Product List</h3>
					<div class="filter-buttons">
						<button class="filter-btn active" data-filter="all">All</button>
						<button class="filter-btn" data-filter="active">Active</button>
						<button class="filter-btn" data-filter="low">Low Stock</button>
						<button class="filter-btn" data-filter="out">Out of Stock</button>
					</div>
				</div>
				
				<div class="products-grid">
<?php
// Use products provided by the controller (indexMerch)
$rows = isset($products) && is_array($products) ? $products : [];
if (empty($rows)) {
	echo '<div style="grid-column: 1/-1; text-align: center; padding: 40px; color: #6b7280;">Tidak ada data produk.</div>';
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
            // Just filename, assume it's in merchandise folder
            $img = base_url('assets/images/merchandise/' . htmlspecialchars($imageData));
            $hasImage = true;
        }
    }
    $stockClass = $r['stock'] > 10 ? 'active' : ($r['stock'] > 0 ? 'low' : 'out');
?>
					<div class="product-card" data-status="<?= $stockClass ?>">
						<?php if ($hasImage): ?>
						<img src="<?= $img ?>" alt="Product" class="product-image" loading="lazy" decoding="async">
						<?php else: ?>
						<div class="product-image-placeholder" style="width: 100%; height: 200px; background: #f3f4f6; border: 2px solid #e5e7eb; display: flex; align-items: center; justify-content: center; color: #9ca3af; font-size: 48px;">🛍️</div>
						<?php endif; ?>
						<div class="product-info">
							<div class="product-title"><?= htmlspecialchars($r['name']) ?></div>
							<div class="product-price">Rp <?= number_format($r['price'], 0, ',', '.') ?></div>
							<div class="product-stock">Stock: <?= $r['stock'] ?> pcs</div>
							<div class="product-actions">
								<?php if ($hasImage): ?>
								<button type="button" class="btn-sm btn-secondary" onclick="openImageModal('<?= $img ?>', '<?= htmlspecialchars($r['name'], ENT_QUOTES) ?>', 'Rp <?= number_format($r['price'], 0, ',', '.') ?> - Stock: <?= $r['stock'] ?> pcs')">View</button>
								<?php else: ?>
								<button type="button" class="btn-sm btn-secondary" onclick="alert('Tidak ada gambar untuk produk ini')" title="Tidak ada gambar">View</button>
								<?php endif; ?>
								<a href="/admin/merchandise/edit/<?= (int)$r['id'] ?>" class="btn-sm btn-secondary">Edit</a>
								<form method="post" action="/admin/merchandise/delete/<?= (int)$r['id'] ?>" onsubmit="return confirm('Hapus produk ini?');" style="display:inline">
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
		
		// Filter functionality
		document.querySelectorAll('.filter-btn').forEach(btn => {
			btn.addEventListener('click', function() {
				// Update active button
				document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
				this.classList.add('active');
				
				// Filter products
				const filter = this.dataset.filter;
				const products = document.querySelectorAll('.product-card');
				
				products.forEach(product => {
					if (filter === 'all' || product.dataset.status === filter) {
						product.style.display = 'block';
					} else {
						product.style.display = 'none';
					}
				});
			});
		});
	
	</script>
	
	<script>
		// Prevent images from continuously loading on error
		document.addEventListener('DOMContentLoaded', function() {
			// Handle all product images
			const productImages = document.querySelectorAll('.product-image');
			productImages.forEach(function(img) {
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
						if (!this.nextElementSibling || !this.nextElementSibling.classList.contains('product-image-placeholder')) {
							const placeholder = document.createElement('div');
							placeholder.className = 'product-image-placeholder';
							placeholder.style.cssText = 'width: 100%; height: 200px; background: #f3f4f6; border: 2px solid #e5e7eb; display: flex; align-items: center; justify-content: center; color: #9ca3af; font-size: 48px;';
							placeholder.textContent = '🛍️';
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