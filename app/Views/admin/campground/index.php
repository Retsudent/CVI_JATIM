<!doctype html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Campground Management - CVI Jatim</title>
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
		
		/* Campground Cards */
		.campground-container {
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
		
		.search-box {
			display: flex;
			align-items: center;
			gap: 10px;
			background: var(--gray-50);
			padding: 10px 15px;
			border-radius: 10px;
			border: 2px solid var(--gray-200);
		}
		
		.search-box input {
			border: none;
			background: transparent;
			outline: none;
			font-size: 14px;
			width: 200px;
		}
		
		.campground-grid {
			display: grid;
			grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
			gap: 25px;
		}
		
		.campground-card {
			background: white;
			border-radius: 20px;
			overflow: hidden;
			box-shadow: var(--shadow-md);
			transition: all 0.3s ease;
			position: relative;
		}
		
		.campground-card:hover {
			transform: translateY(-8px);
			box-shadow: var(--shadow-xl);
		}
		
		.campground-image {
			width: 100%;
			height: 200px;
			background: linear-gradient(135deg, var(--mint), var(--sage));
			display: flex;
			align-items: center;
			justify-content: center;
			font-size: 48px;
			color: var(--dark-green);
			position: relative;
		}
		
		.campground-badge {
			position: absolute;
			top: 15px;
			right: 15px;
			background: var(--primary-green);
			color: white;
			padding: 6px 12px;
			border-radius: 20px;
			font-size: 12px;
			font-weight: 600;
		}
		
		.campground-info {
			padding: 25px;
		}
		
		.campground-title {
			font-size: 20px;
			font-weight: 700;
			color: var(--dark-green);
			margin-bottom: 8px;
		}
		
		.campground-location {
			font-size: 14px;
			color: var(--gray-600);
			margin-bottom: 15px;
			display: flex;
			align-items: center;
			gap: 5px;
		}
		
		.campground-description {
			font-size: 14px;
			color: var(--gray-600);
			line-height: 1.6;
			margin-bottom: 20px;
		}
		
		.campground-features {
			margin-bottom: 20px;
		}
		
		.features-title {
			font-size: 14px;
			font-weight: 600;
			color: var(--dark-green);
			margin-bottom: 10px;
		}
		
		.features-list {
			display: flex;
			flex-wrap: wrap;
			gap: 8px;
		}
		
		.feature-tag {
			background: var(--mint);
			color: var(--dark-green);
			padding: 4px 8px;
			border-radius: 12px;
			font-size: 12px;
			font-weight: 500;
		}
		
		.campground-meta {
			display: flex;
			justify-content: space-between;
			align-items: center;
			margin-bottom: 20px;
		}
		
		.campground-price {
			font-size: 18px;
			font-weight: 700;
			color: var(--primary-green);
		}
		
		.campground-capacity {
			font-size: 14px;
			color: var(--gray-600);
			display: flex;
			align-items: center;
			gap: 5px;
		}
		
		.campground-actions {
			display: flex;
			gap: 10px;
		}
		
		.btn {
			padding: 10px 16px;
			border: none;
			border-radius: 10px;
			font-size: 14px;
			font-weight: 600;
			cursor: pointer;
			transition: all 0.3s ease;
			text-decoration: none;
			display: inline-flex;
			align-items: center;
			gap: 6px;
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
			transform: translateY(-2px);
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
			
			.campground-grid {
				grid-template-columns: 1fr;
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
				<a href="http://localhost:8080/admin/merchandise" class="nav-item">
					<div class="nav-icon">🛍️</div>
					<span>Merchandise</span>
				</a>
				<a href="http://localhost:8080/admin/campground" class="nav-item active">
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
					<div class="page-icon">🏕️</div>
					<span>Campground Management</span>
				</div>
				<a href="#" class="add-btn" onclick="openAddModal()">
					<span>➕</span>
					<span>Tambah Campground Baru</span>
				</a>
			</div>
			
			<!-- Stats Row -->
			<div class="stats-row">
				<div class="stat-card">
					<div class="stat-icon">🏕️</div>
					<div class="stat-info">
						<h3>4</h3>
						<p>Total Campground</p>
					</div>
				</div>
				<div class="stat-card">
					<div class="stat-icon">✅</div>
					<div class="stat-info">
						<h3>4</h3>
						<p>Campground Aktif</p>
					</div>
				</div>
				<div class="stat-card">
					<div class="stat-icon">👥</div>
					<div class="stat-info">
						<h3>125</h3>
						<p>Total Kapasitas</p>
					</div>
				</div>
				<div class="stat-card">
					<div class="stat-icon">💰</div>
					<div class="stat-info">
						<h3>Rp 1.2M</h3>
						<p>Pendapatan Bulan Ini</p>
					</div>
				</div>
			</div>
			
			<!-- Campground Container -->
			<div class="campground-container">
				<div class="container-header">
					<h3 class="container-title">Daftar Campground</h3>
					<div class="search-box">
						<span>🔍</span>
						<input type="text" placeholder="Cari campground..." id="searchInput">
					</div>
				</div>
				
				<div class="campground-grid">
					<div class="campground-card">
						<div class="campground-image">
							<span>🏞️</span>
							<div class="campground-badge">Aktif</div>
						</div>
						<div class="campground-info">
							<h4 class="campground-title">Telaga Ngebel</h4>
							<div class="campground-location">
								<span>📍</span>
								<span>Ngebel, Ponorogo, Jawa Timur</span>
							</div>
							<p class="campground-description">
								Campground dengan pemandangan danau yang menakjubkan. Lokasi ini sangat cocok untuk camping keluarga dengan suasana yang tenang dan udara yang sejuk.
							</p>
							<div class="campground-features">
								<div class="features-title">Fasilitas:</div>
								<div class="features-list">
									<span class="feature-tag">Toilet & MCK</span>
									<span class="feature-tag">Parkir</span>
									<span class="feature-tag">Warung</span>
									<span class="feature-tag">Security</span>
									<span class="feature-tag">WiFi</span>
								</div>
							</div>
							<div class="campground-meta">
								<span class="campground-price">Rp 15.000</span>
								<span class="campground-capacity">👥 30+ spot</span>
							</div>
							<div class="campground-actions">
								<button class="btn btn-view" onclick="viewCampground(1)">👁️ Lihat</button>
								<button class="btn btn-edit" onclick="editCampground(1)">✏️ Edit</button>
								<button class="btn btn-delete" onclick="deleteCampground(1)">🗑️ Hapus</button>
							</div>
						</div>
					</div>
					
					<div class="campground-card">
						<div class="campground-image">
							<span>🏕️</span>
							<div class="campground-badge">Aktif</div>
						</div>
						<div class="campground-info">
							<h4 class="campground-title">Bumi Perkemahan Karanganyar</h4>
							<div class="campground-location">
								<span>📍</span>
								<span>Karanganyar, Ngawi, Jawa Timur</span>
							</div>
							<p class="campground-description">
								Area camping yang luas dengan fasilitas lengkap. Lokasi strategis dengan akses mudah dan fasilitas modern. Cocok untuk acara besar dan camping kelompok.
							</p>
							<div class="campground-features">
								<div class="features-title">Fasilitas:</div>
								<div class="features-list">
									<span class="feature-tag">Hall Indoor</span>
									<span class="feature-tag">Sound System</span>
									<span class="feature-tag">Kantin</span>
									<span class="feature-tag">Rental</span>
									<span class="feature-tag">WiFi</span>
								</div>
							</div>
							<div class="campground-meta">
								<span class="campground-price">Rp 25.000</span>
								<span class="campground-capacity">👥 50+ spot</span>
							</div>
							<div class="campground-actions">
								<button class="btn btn-view" onclick="viewCampground(2)">👁️ Lihat</button>
								<button class="btn btn-edit" onclick="editCampground(2)">✏️ Edit</button>
								<button class="btn btn-delete" onclick="deleteCampground(2)">🗑️ Hapus</button>
							</div>
						</div>
					</div>
					
					<div class="campground-card">
						<div class="campground-image">
							<span>⛰️</span>
							<div class="campground-badge">Premium</div>
						</div>
						<div class="campground-info">
							<h4 class="campground-title">Wonder Park Tawangmangu</h4>
							<div class="campground-location">
								<span>📍</span>
								<span>Tawangmangu, Magetan, Jawa Timur</span>
							</div>
							<p class="campground-description">
								Campground premium dengan pemandangan gunung dan udara sejuk. Lokasi eksklusif dengan fasilitas terbaik dan pemandangan yang menakjubkan.
							</p>
							<div class="campground-features">
								<div class="features-title">Fasilitas:</div>
								<div class="features-list">
									<span class="feature-tag">Restaurant</span>
									<span class="feature-tag">Meeting Room</span>
									<span class="feature-tag">Fotografer</span>
									<span class="feature-tag">Air Panas</span>
									<span class="feature-tag">WiFi High Speed</span>
								</div>
							</div>
							<div class="campground-meta">
								<span class="campground-price">Rp 50.000</span>
								<span class="campground-capacity">👥 20+ spot</span>
							</div>
							<div class="campground-actions">
								<button class="btn btn-view" onclick="viewCampground(3)">👁️ Lihat</button>
								<button class="btn btn-edit" onclick="editCampground(3)">✏️ Edit</button>
								<button class="btn btn-delete" onclick="deleteCampground(3)">🗑️ Hapus</button>
							</div>
						</div>
					</div>
					
					<div class="campground-card">
						<div class="campground-image">
							<span>🎪</span>
							<div class="campground-badge">Aktif</div>
						</div>
						<div class="campground-info">
							<h4 class="campground-title">Bumi Perkemahan Gembira</h4>
							<div class="campground-location">
								<span>📍</span>
								<span>Madiun, Jawa Timur</span>
							</div>
							<p class="campground-description">
								Campground dengan suasana yang menyenangkan. Lokasi yang mudah dijangkau dengan fasilitas lengkap dan harga terjangkau. Cocok untuk keluarga dan kelompok kecil.
							</p>
							<div class="campground-features">
								<div class="features-title">Fasilitas:</div>
								<div class="features-list">
									<span class="feature-tag">Playground</span>
									<span class="feature-tag">Gazebo</span>
									<span class="feature-tag">Warung</span>
									<span class="feature-tag">Rental</span>
									<span class="feature-tag">WiFi</span>
								</div>
							</div>
							<div class="campground-meta">
								<span class="campground-price">Rp 30.000</span>
								<span class="campground-capacity">👥 25+ spot</span>
							</div>
							<div class="campground-actions">
								<button class="btn btn-view" onclick="viewCampground(4)">👁️ Lihat</button>
								<button class="btn btn-edit" onclick="editCampground(4)">✏️ Edit</button>
								<button class="btn btn-delete" onclick="deleteCampground(4)">🗑️ Hapus</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
	</div>
	
	<script>
		function openAddModal() {
			alert('Fitur Tambah Campground akan segera tersedia!');
		}
		
		function viewCampground(id) {
			alert('Melihat detail campground ID: ' + id);
		}
		
		function editCampground(id) {
			alert('Mengedit campground ID: ' + id);
		}
		
		function deleteCampground(id) {
			if (confirm('Apakah Anda yakin ingin menghapus campground ini?')) {
				alert('Campground ID: ' + id + ' berhasil dihapus!');
			}
		}
		
		// Search functionality
		document.getElementById('searchInput').addEventListener('input', function(e) {
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
