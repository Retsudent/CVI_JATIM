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
		}
		
		.filter-btn {
			padding: 8px 16px;
			border: 1px solid #e5e7eb;
			background: #ffffff;
			border-radius: 6px;
			font-size: 14px;
			cursor: pointer;
			transition: all 0.2s ease;
		}
		
		.filter-btn.active {
			background: #111827;
			color: white;
			border-color: #111827;
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
					<div class="stat-value">8</div>
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
					<div class="stat-value">6</div>
					<div class="stat-label">Active Products</div>
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
					<div class="stat-value">Rp 2.4M</div>
					<div class="stat-label">Total Sales</div>
				</div>
				<div class="stat-card">
					<div class="stat-header">
						<div class="stat-icon">
							<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<path d="M18 20V10"></path>
								<path d="M12 20V4"></path>
								<path d="M6 20v-6"></path>
							</svg>
						</div>
					</div>
					<div class="stat-value">156</div>
					<div class="stat-label">Sold This Month</div>
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
try {
    $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=cvi_wirotaman', 'postgres', 'postgres', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    $rows = $pdo->query('SELECT id, name, description, price, stock, image, category, status FROM merchandise ORDER BY id DESC LIMIT 100')->fetchAll(PDO::FETCH_ASSOC);
} catch (Throwable $e) { $rows = []; }
if (!$rows) {
    echo '<div style="grid-column: 1/-1; text-align: center; padding: 40px; color: #6b7280;">Tidak ada data produk.</div>';
}
foreach ($rows as $r):
    $img = $r['image'] ? base_url('assets/images/merch/' . htmlspecialchars($r['image'])) : base_url('assets/images/placeholder.jpg');
    $stockClass = $r['stock'] > 10 ? 'active' : ($r['stock'] > 0 ? 'low' : 'out');
?>
					<div class="product-card" data-status="<?= $stockClass ?>">
						<img src="<?= $img ?>" alt="Product" class="product-image">
						<div class="product-info">
							<div class="product-title"><?= htmlspecialchars($r['name']) ?></div>
							<div class="product-price">Rp <?= number_format($r['price'], 0, ',', '.') ?></div>
							<div class="product-stock">Stock: <?= $r['stock'] ?> pcs</div>
							<div class="product-actions">
								<a href="/merchandise/detail/<?= (int)$r['id'] ?>" class="btn-sm btn-secondary" target="_blank">View</a>
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
</body>
</html>