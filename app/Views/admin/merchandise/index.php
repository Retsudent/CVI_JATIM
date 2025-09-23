<!doctype html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Merchandise Management - CVI Jatim</title>
	<style>
		:root {
			--primary-green: #2e7d32;
			--dark-green: #1b5e20;
			--light-green: #66bb6a;
			--mint: #c8e6c9;
			--sage: #a5d6a7;
			--forest: #388e3c;
			--earth: #4e342e;
			--sky: #e3f2fd;
			--cloud: #f1f8e9;
			--gold: #ffc107;
			--amber: #ff8f00;
			--white: #ffffff;
			--gray-50: #fafafa;
			--gray-100: #f5f5f5;
			--gray-200: #eeeeee;
			--gray-300: #e0e0e0;
			--gray-600: #757575;
			--gray-800: #424242;
			--shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
			--shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
			--shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
			--shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
		}
		
		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}
		
		html, body {
			height: 100%;
			font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
			background: linear-gradient(135deg, #e8f5e8 0%, #c8e6c9 25%, #a5d6a7 50%, #81c784 75%, #66bb6a 100%);
			overflow: hidden;
		}
		
		.layout {
			display: grid;
			grid-template-columns: 280px 1fr;
			grid-template-rows: 70px 1fr;
			height: 100vh;
		}
		
		/* Topbar */
		.topbar {
			grid-column: 1/3;
			background: linear-gradient(135deg, var(--dark-green) 0%, var(--primary-green) 50%, var(--forest) 100%);
			color: white;
			display: flex;
			align-items: center;
			justify-content: space-between;
			padding: 0 30px;
			box-shadow: var(--shadow-lg);
			position: relative;
			z-index: 100;
		}
		
		.brand {
			display: flex;
			align-items: center;
			gap: 15px;
			font-weight: 800;
			font-size: 20px;
		}
		
		.logo-icon {
			width: 40px;
			height: 40px;
			background: linear-gradient(45deg, var(--gold), var(--amber));
			border-radius: 50%;
			display: flex;
			align-items: center;
			justify-content: center;
			font-size: 20px;
			box-shadow: var(--shadow-md);
		}
		
		.user-info {
			display: flex;
			align-items: center;
			gap: 15px;
		}
		
		.user-avatar {
			width: 35px;
			height: 35px;
			background: rgba(255, 255, 255, 0.2);
			border-radius: 50%;
			display: flex;
			align-items: center;
			justify-content: center;
			font-size: 16px;
		}
		
		.logout-btn {
			background: rgba(255, 255, 255, 0.1);
			color: white;
			text-decoration: none;
			padding: 8px 16px;
			border-radius: 20px;
			font-weight: 600;
			transition: all 0.3s ease;
			border: 1px solid rgba(255, 255, 255, 0.2);
		}
		
		.logout-btn:hover {
			background: rgba(255, 255, 255, 0.2);
			transform: translateY(-1px);
		}
		
		/* Sidebar */
		.sidebar {
			background: rgba(255, 255, 255, 0.95);
			backdrop-filter: blur(20px);
			border-right: 1px solid rgba(0, 0, 0, 0.1);
			padding: 20px 0;
			overflow-y: auto;
		}
		
		.nav-section {
			margin-bottom: 30px;
		}
		
		.nav-title {
			font-size: 12px;
			font-weight: 700;
			color: var(--gray-600);
			text-transform: uppercase;
			letter-spacing: 1px;
			margin: 0 20px 15px;
		}
		
		.nav-item {
			display: flex;
			align-items: center;
			gap: 12px;
			padding: 12px 20px;
			color: var(--gray-800);
			text-decoration: none;
			transition: all 0.3s ease;
			position: relative;
			font-weight: 500;
		}
		
		.nav-item:hover {
			background: var(--mint);
			color: var(--dark-green);
			transform: translateX(5px);
		}
		
		.nav-item.active {
			background: linear-gradient(135deg, var(--primary-green), var(--forest));
			color: white;
			box-shadow: var(--shadow-md);
		}
		
		.nav-item.active::before {
			content: '';
			position: absolute;
			left: 0;
			top: 0;
			bottom: 0;
			width: 4px;
			background: var(--gold);
		}
		
		.nav-icon {
			width: 20px;
			height: 20px;
			display: flex;
			align-items: center;
			justify-content: center;
			font-size: 16px;
		}
		
		/* Main Content */
		.content {
			padding: 30px;
			overflow-y: auto;
			background: rgba(255, 255, 255, 0.1);
		}
		
		.page-header {
			display: flex;
			justify-content: space-between;
			align-items: center;
			margin-bottom: 30px;
		}
		
		.page-title {
			font-size: 28px;
			font-weight: 700;
			color: var(--dark-green);
			display: flex;
			align-items: center;
			gap: 15px;
		}
		
		.page-icon {
			width: 50px;
			height: 50px;
			background: linear-gradient(135deg, var(--primary-green), var(--forest));
			border-radius: 15px;
			display: flex;
			align-items: center;
			justify-content: center;
			font-size: 24px;
			color: white;
			box-shadow: var(--shadow-md);
		}
		
		.add-btn {
			background: linear-gradient(135deg, var(--primary-green), var(--forest));
			color: white;
			text-decoration: none;
			padding: 12px 24px;
			border-radius: 12px;
			font-weight: 600;
			display: flex;
			align-items: center;
			gap: 8px;
			transition: all 0.3s ease;
			box-shadow: var(--shadow-md);
		}
		
		.add-btn:hover {
			transform: translateY(-2px);
			box-shadow: var(--shadow-lg);
		}
		
		/* Stats Cards */
		.stats-row {
			display: grid;
			grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
			gap: 20px;
			margin-bottom: 30px;
		}
		
		.stat-card {
			background: rgba(255, 255, 255, 0.95);
			backdrop-filter: blur(20px);
			border-radius: 16px;
			padding: 20px;
			box-shadow: var(--shadow-lg);
			display: flex;
			align-items: center;
			gap: 15px;
		}
		
		.stat-icon {
			width: 50px;
			height: 50px;
			background: linear-gradient(135deg, var(--mint), var(--sage));
			border-radius: 12px;
			display: flex;
			align-items: center;
			justify-content: center;
			font-size: 20px;
			color: var(--dark-green);
		}
		
		.stat-info h3 {
			font-size: 24px;
			font-weight: 700;
			color: var(--dark-green);
			margin-bottom: 5px;
		}
		
		.stat-info p {
			font-size: 14px;
			color: var(--gray-600);
		}
		
		/* Merchandise Grid */
		.merchandise-container {
			background: rgba(255, 255, 255, 0.95);
			backdrop-filter: blur(20px);
			border-radius: 20px;
			padding: 30px;
			box-shadow: var(--shadow-xl);
		}
		
		.container-header {
			display: flex;
			justify-content: space-between;
			align-items: center;
			margin-bottom: 25px;
		}
		
		.container-title {
			font-size: 20px;
			font-weight: 700;
			color: var(--dark-green);
		}
		
		.filter-tabs {
			display: flex;
			gap: 10px;
		}
		
		.filter-tab {
			padding: 8px 16px;
			border: 2px solid var(--gray-200);
			background: var(--gray-50);
			border-radius: 20px;
			font-size: 14px;
			font-weight: 600;
			color: var(--gray-600);
			cursor: pointer;
			transition: all 0.3s ease;
		}
		
		.filter-tab.active {
			background: var(--primary-green);
			color: white;
			border-color: var(--primary-green);
		}
		
		.merchandise-grid {
			display: grid;
			grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
			gap: 20px;
		}
		
		.product-card {
			background: white;
			border-radius: 16px;
			overflow: hidden;
			box-shadow: var(--shadow-md);
			transition: all 0.3s ease;
			position: relative;
		}
		
		.product-card:hover {
			transform: translateY(-5px);
			box-shadow: var(--shadow-xl);
		}
		
		.product-image {
			width: 100%;
			height: 200px;
			background: var(--gray-200);
			display: flex;
			align-items: center;
			justify-content: center;
			font-size: 48px;
			color: var(--gray-600);
		}
		
		.product-info {
			padding: 20px;
		}
		
		.product-title {
			font-size: 18px;
			font-weight: 700;
			color: var(--dark-green);
			margin-bottom: 8px;
		}
		
		.product-description {
			font-size: 14px;
			color: var(--gray-600);
			margin-bottom: 15px;
			line-height: 1.5;
		}
		
		.product-meta {
			display: flex;
			justify-content: space-between;
			align-items: center;
			margin-bottom: 15px;
		}
		
		.product-price {
			font-size: 20px;
			font-weight: 700;
			color: var(--primary-green);
		}
		
		.product-stock {
			font-size: 12px;
			padding: 4px 8px;
			border-radius: 12px;
			font-weight: 600;
		}
		
		.stock-available {
			background: var(--mint);
			color: var(--dark-green);
		}
		
		.stock-low {
			background: #fff3cd;
			color: #856404;
		}
		
		.stock-out {
			background: #f8d7da;
			color: #721c24;
		}
		
		.product-actions {
			display: flex;
			gap: 8px;
		}
		
		.btn {
			padding: 8px 12px;
			border: none;
			border-radius: 8px;
			font-size: 12px;
			font-weight: 600;
			cursor: pointer;
			transition: all 0.3s ease;
			text-decoration: none;
			display: inline-flex;
			align-items: center;
			gap: 5px;
			flex: 1;
			justify-content: center;
		}
		
		.btn-edit {
			background: var(--gold);
			color: white;
		}
		
		.btn-delete {
			background: #f44336;
			color: white;
		}
		
		.btn-view {
			background: var(--primary-green);
			color: white;
		}
		
		.btn:hover {
			transform: translateY(-1px);
			box-shadow: var(--shadow-md);
		}
		
		/* Responsive */
		@media (max-width: 768px) {
			.layout {
				grid-template-columns: 1fr;
				grid-template-rows: 70px 1fr;
			}
			
			.sidebar {
				display: none;
			}
			
			.content {
				padding: 20px;
			}
			
			.page-header {
				flex-direction: column;
				gap: 15px;
				align-items: flex-start;
			}
			
			.stats-row {
				grid-template-columns: 1fr;
			}
			
			.merchandise-grid {
				grid-template-columns: 1fr;
			}
			
			.filter-tabs {
				flex-wrap: wrap;
			}
		}
	</style>
</head>
<body>
	<div class="layout">
		<!-- Topbar -->
		<div class="topbar">
			<div class="brand">
				<div class="logo-icon">🌿</div>
				<span>Admin CVI Jatim</span>
			</div>
			<div class="user-info">
				<div class="user-avatar">👤</div>
				<span><?= htmlspecialchars($_SESSION['username'] ?? 'Admin') ?></span>
				<a class="logout-btn" href="http://localhost:8080/logout">Keluar</a>
			</div>
		</div>
		
		<!-- Sidebar -->
		<aside class="sidebar">
			<div class="nav-section">
				<div class="nav-title">Dashboard</div>
				<a href="http://localhost:8080/admin" class="nav-item">
					<div class="nav-icon">📊</div>
					<span>Overview</span>
				</a>
			</div>
			
			<div class="nav-section">
				<div class="nav-title">Konten</div>
				<a href="http://localhost:8080/admin/events" class="nav-item">
					<div class="nav-icon">🎉</div>
					<span>Events</span>
				</a>
				<a href="http://localhost:8080/admin/merchandise" class="nav-item active">
					<div class="nav-icon">🛍️</div>
					<span>Merchandise</span>
				</a>
				<a href="http://localhost:8080/admin/campground" class="nav-item">
					<div class="nav-icon">🏕️</div>
					<span>Campground</span>
				</a>
				<a href="http://localhost:8080/admin/gallery" class="nav-item">
					<div class="nav-icon">📸</div>
					<span>Gallery</span>
				</a>
			</div>
			
			<div class="nav-section">
				<div class="nav-title">Website</div>
				<a href="http://localhost:8080/" class="nav-item">
					<div class="nav-icon">🌐</div>
					<span>Lihat Website</span>
				</a>
			</div>
		</aside>
		
		<!-- Main Content -->
		<main class="content">
			<!-- Page Header -->
			<div class="page-header">
				<div class="page-title">
					<div class="page-icon">🛍️</div>
					<span>Merchandise Management</span>
				</div>
				<a href="#" class="add-btn" onclick="openAddModal()">
					<span>➕</span>
					<span>Tambah Produk Baru</span>
				</a>
			</div>
			
			<!-- Stats Row -->
			<div class="stats-row">
				<div class="stat-card">
					<div class="stat-icon">📦</div>
					<div class="stat-info">
						<h3>8</h3>
						<p>Total Produk</p>
					</div>
				</div>
				<div class="stat-card">
					<div class="stat-icon">✅</div>
					<div class="stat-info">
						<h3>6</h3>
						<p>Produk Aktif</p>
					</div>
				</div>
				<div class="stat-card">
					<div class="stat-icon">💰</div>
					<div class="stat-info">
						<h3>Rp 2.4M</h3>
						<p>Total Penjualan</p>
					</div>
				</div>
				<div class="stat-card">
					<div class="stat-icon">📈</div>
					<div class="stat-info">
						<h3>156</h3>
						<p>Terjual Bulan Ini</p>
					</div>
				</div>
			</div>
			
			<!-- Merchandise Container -->
			<div class="merchandise-container">
				<div class="container-header">
					<h3 class="container-title">Daftar Produk</h3>
					<div class="filter-tabs">
						<div class="filter-tab active" onclick="filterProducts('all')">Semua</div>
						<div class="filter-tab" onclick="filterProducts('active')">Aktif</div>
						<div class="filter-tab" onclick="filterProducts('low')">Stok Rendah</div>
						<div class="filter-tab" onclick="filterProducts('out')">Habis</div>
					</div>
				</div>
				
				<div class="merchandise-grid">
					<div class="product-card" data-status="active">
						<div class="product-image">👕</div>
						<div class="product-info">
							<h4 class="product-title">Kaos Event Anniversary</h4>
							<p class="product-description">Kaos premium dengan desain eksklusif untuk event anniversary CVI Wirotaman. Bahan katun combed 30s yang nyaman dipakai.</p>
							<div class="product-meta">
								<span class="product-price">Rp 85.000</span>
								<span class="product-stock stock-available">Stok: 45</span>
							</div>
							<div class="product-actions">
								<button class="btn btn-view" onclick="viewProduct(1)">👁️ Lihat</button>
								<button class="btn btn-edit" onclick="editProduct(1)">✏️ Edit</button>
								<button class="btn btn-delete" onclick="deleteProduct(1)">🗑️ Hapus</button>
							</div>
						</div>
					</div>
					
					<div class="product-card" data-status="active">
						<div class="product-image">🍶</div>
						<div class="product-info">
							<h4 class="product-title">Tumbler Putih Event</h4>
							<p class="product-description">Tumbler stainless steel dengan logo CVI Wirotaman. Kapasitas 500ml, tahan panas dan dingin.</p>
							<div class="product-meta">
								<span class="product-price">Rp 125.000</span>
								<span class="product-stock stock-low">Stok: 8</span>
							</div>
							<div class="product-actions">
								<button class="btn btn-view" onclick="viewProduct(2)">👁️ Lihat</button>
								<button class="btn btn-edit" onclick="editProduct(2)">✏️ Edit</button>
								<button class="btn btn-delete" onclick="deleteProduct(2)">🗑️ Hapus</button>
							</div>
						</div>
					</div>
					
					<div class="product-card" data-status="active">
						<div class="product-image">🍶</div>
						<div class="product-info">
							<h4 class="product-title">Tumbler Hitam Event</h4>
							<p class="product-description">Tumbler stainless steel hitam dengan logo CVI Wirotaman. Kapasitas 500ml, tahan panas dan dingin.</p>
							<div class="product-meta">
								<span class="product-price">Rp 125.000</span>
								<span class="product-stock stock-available">Stok: 23</span>
							</div>
							<div class="product-actions">
								<button class="btn btn-view" onclick="viewProduct(3)">👁️ Lihat</button>
								<button class="btn btn-edit" onclick="editProduct(3)">✏️ Edit</button>
								<button class="btn btn-delete" onclick="deleteProduct(3)">🗑️ Hapus</button>
							</div>
						</div>
					</div>
					
					<div class="product-card" data-status="active">
						<div class="product-image">🍶</div>
						<div class="product-info">
							<h4 class="product-title">Tumbler Set Vacuum Flask</h4>
							<p class="product-description">Set tumbler vacuum flask dengan 2 ukuran (350ml & 500ml). Bahan stainless steel premium dengan logo CVI.</p>
							<div class="product-meta">
								<span class="product-price">Rp 250.000</span>
								<span class="product-stock stock-out">Stok: 0</span>
							</div>
							<div class="product-actions">
								<button class="btn btn-view" onclick="viewProduct(4)">👁️ Lihat</button>
								<button class="btn btn-edit" onclick="editProduct(4)">✏️ Edit</button>
								<button class="btn btn-delete" onclick="deleteProduct(4)">🗑️ Hapus</button>
							</div>
						</div>
					</div>
					
					<div class="product-card" data-status="active">
						<div class="product-image">🎒</div>
						<div class="product-info">
							<h4 class="product-title">Tas Ransel CVI</h4>
							<p class="product-description">Tas ransel dengan desain outdoor yang kuat dan tahan air. Cocok untuk camping dan aktivitas outdoor.</p>
							<div class="product-meta">
								<span class="product-price">Rp 180.000</span>
								<span class="product-stock stock-available">Stok: 12</span>
							</div>
							<div class="product-actions">
								<button class="btn btn-view" onclick="viewProduct(5)">👁️ Lihat</button>
								<button class="btn btn-edit" onclick="editProduct(5)">✏️ Edit</button>
								<button class="btn btn-delete" onclick="deleteProduct(5)">🗑️ Hapus</button>
							</div>
						</div>
					</div>
					
					<div class="product-card" data-status="active">
						<div class="product-image">🧢</div>
						<div class="product-info">
							<h4 class="product-title">Topi Baseball CVI</h4>
							<p class="product-description">Topi baseball dengan logo bordir CVI Wirotaman. Bahan katun yang nyaman dan tahan lama.</p>
							<div class="product-meta">
								<span class="product-price">Rp 65.000</span>
								<span class="product-stock stock-low">Stok: 5</span>
							</div>
							<div class="product-actions">
								<button class="btn btn-view" onclick="viewProduct(6)">👁️ Lihat</button>
								<button class="btn btn-edit" onclick="editProduct(6)">✏️ Edit</button>
								<button class="btn btn-delete" onclick="deleteProduct(6)">🗑️ Hapus</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
	</div>
	
	<script>
		function openAddModal() {
			alert('Fitur Tambah Produk akan segera tersedia!');
		}
		
		function viewProduct(id) {
			alert('Melihat detail produk ID: ' + id);
		}
		
		function editProduct(id) {
			alert('Mengedit produk ID: ' + id);
		}
		
		function deleteProduct(id) {
			if (confirm('Apakah Anda yakin ingin menghapus produk ini?')) {
				alert('Produk ID: ' + id + ' berhasil dihapus!');
			}
		}
		
		function filterProducts(status) {
			// Update active tab
			document.querySelectorAll('.filter-tab').forEach(tab => {
				tab.classList.remove('active');
			});
			event.target.classList.add('active');
			
			// Filter products
			const products = document.querySelectorAll('.product-card');
			products.forEach(product => {
				if (status === 'all' || product.dataset.status === status) {
					product.style.display = 'block';
				} else {
					product.style.display = 'none';
				}
			});
		}
	</script>
</body>
</html>
