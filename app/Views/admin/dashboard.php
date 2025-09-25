<!doctype html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Dashboard - CVI Jatim</title>
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
			overflow: auto;
		}
		
		.layout {
			display: grid;
			grid-template-columns: 280px 1fr;
			grid-template-rows: minmax(56px, 64px) 1fr;
			min-height: 100vh;
		}
		
		/* Topbar */
		.topbar {
			grid-column: 1/3;
			background: linear-gradient(135deg, var(--dark-green) 0%, var(--primary-green) 50%, var(--forest) 100%);
			color: white;
			display: flex;
			align-items: center;
			justify-content: space-between;
			padding: 0 20px;
			box-shadow: var(--shadow-lg);
			position: relative;
			z-index: 100;
		}

		/* Mobile menu button */
		.menu-toggle {
			display: none;
			width: 40px;
			height: 40px;
			border-radius: 10px;
			background: rgba(255, 255, 255, 0.12);
			border: 1px solid rgba(255, 255, 255, 0.2);
			color: #fff;
			display: inline-flex;
			align-items: center;
			justify-content: center;
			cursor: pointer;
		}
		
		.brand {
			display: flex;
			align-items: center;
			gap: 12px;
			font-weight: 800;
			font-size: clamp(16px, 2.5vw, 20px);
		}
		
		.logo-icon {
			width: clamp(28px, 4.5vw, 40px);
			height: clamp(28px, 4.5vw, 40px);
			background: linear-gradient(45deg, var(--gold), var(--amber));
			border-radius: 50%;
			display: flex;
			align-items: center;
			justify-content: center;
			font-size: clamp(14px, 2vw, 20px);
			box-shadow: var(--shadow-md);
		}
		
		.user-info {
			display: flex;
			align-items: center;
			gap: 15px;
		}
		
		.user-avatar {
			width: clamp(28px, 4vw, 35px);
			height: clamp(28px, 4vw, 35px);
			background: rgba(255, 255, 255, 0.2);
			border-radius: 50%;
			display: flex;
			align-items: center;
			justify-content: center;
			font-size: clamp(12px, 1.8vw, 16px);
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
			padding: clamp(16px, 2.5vw, 30px);
			overflow-y: auto;
			background: rgba(255, 255, 255, 0.1);
		}
		
		.content-header {
			margin-bottom: 30px;
		}
		
		.welcome-card {
			background: rgba(255, 255, 255, 0.95);
			backdrop-filter: blur(20px);
			border-radius: 20px;
			padding: 30px;
			box-shadow: var(--shadow-xl);
			margin-bottom: 30px;
			position: relative;
			overflow: hidden;
		}
		
		.welcome-card::before {
			content: '';
			position: absolute;
			top: -50%;
			right: -50%;
			width: 200%;
			height: 200%;
			background: radial-gradient(circle, rgba(102, 187, 106, 0.1) 0%, transparent 70%);
			animation: shimmer 4s ease-in-out infinite;
		}
		
		@keyframes shimmer {
			0%, 100% { transform: rotate(0deg); }
			50% { transform: rotate(180deg); }
		}
		
		.welcome-title {
			font-size: clamp(20px, 3.2vw, 28px);
			font-weight: 700;
			color: var(--dark-green);
			margin-bottom: 10px;
			position: relative;
			z-index: 2;
		}
		
		.welcome-subtitle {
			font-size: clamp(13px, 2.2vw, 16px);
			color: var(--gray-600);
			margin-bottom: 20px;
			position: relative;
			z-index: 2;
		}
		
		.status-badge {
			display: inline-flex;
			align-items: center;
			gap: 8px;
			background: linear-gradient(135deg, var(--light-green), var(--sage));
			color: white;
			padding: 8px 16px;
			border-radius: 20px;
			font-size: 14px;
			font-weight: 600;
			position: relative;
			z-index: 2;
		}
		
		/* Stats Grid */
		.stats-grid {
			display: grid;
			grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
			gap: 20px;
			margin-bottom: 30px;
		}
		
		.stat-card {
			background: rgba(255, 255, 255, 0.95);
			backdrop-filter: blur(20px);
			border-radius: 16px;
			padding: 25px;
			box-shadow: var(--shadow-lg);
			transition: all 0.3s ease;
			position: relative;
			overflow: hidden;
		}
		
		.stat-card:hover {
			transform: translateY(-5px);
			box-shadow: var(--shadow-xl);
		}
		
		.stat-card::before {
			content: '';
			position: absolute;
			top: 0;
			left: 0;
			right: 0;
			height: 4px;
			background: linear-gradient(90deg, var(--primary-green), var(--light-green));
		}
		
		.stat-header {
			display: flex;
			align-items: center;
			justify-content: space-between;
			margin-bottom: 15px;
		}
		
		.stat-title {
			font-size: 16px;
			font-weight: 600;
			color: var(--gray-800);
		}
		
		.stat-icon {
			width: 40px;
			height: 40px;
			background: linear-gradient(135deg, var(--mint), var(--sage));
			border-radius: 10px;
			display: flex;
			align-items: center;
			justify-content: center;
			font-size: 18px;
			color: var(--dark-green);
		}
		
		.stat-value {
			font-size: 24px;
			font-weight: 700;
			color: var(--dark-green);
			margin-bottom: 5px;
		}
		
		.stat-description {
			font-size: 14px;
			color: var(--gray-600);
		}
		
		/* Quick Actions */
		.quick-actions {
			background: rgba(255, 255, 255, 0.95);
			backdrop-filter: blur(20px);
			border-radius: 20px;
			padding: 30px;
			box-shadow: var(--shadow-lg);
		}
		
		.section-title {
			font-size: 20px;
			font-weight: 700;
			color: var(--dark-green);
			margin-bottom: 20px;
			display: flex;
			align-items: center;
			gap: 10px;
		}
		
		.actions-grid {
			display: grid;
			grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
			gap: 15px;
		}
		
		.action-btn {
			display: flex;
			align-items: center;
			gap: 12px;
			padding: clamp(12px, 2vw, 15px) clamp(14px, 3vw, 20px);
			background: var(--gray-50);
			border: 2px solid var(--gray-200);
			border-radius: 12px;
			color: var(--gray-800);
			text-decoration: none;
			transition: all 0.3s ease;
			font-weight: 500;
		}
		
		.action-btn:hover {
			background: var(--mint);
			border-color: var(--light-green);
			color: var(--dark-green);
			transform: translateY(-2px);
			box-shadow: var(--shadow-md);
		}
		
		.action-icon {
			width: 24px;
			height: 24px;
			display: flex;
			align-items: center;
			justify-content: center;
			font-size: 16px;
		}
		
		/* Responsive */
		@media (max-width: 1200px) {
			.stats-grid { grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); }
		}

		@media (max-width: 992px) {
			.layout {
				grid-template-columns: 1fr;
				grid-template-rows: 60px 1fr;
			}
			.menu-toggle { display: inline-flex; }
			.sidebar {
				position: fixed;
				top: 60px;
				bottom: 0;
				left: 0;
				width: 260px;
				background: rgba(255, 255, 255, 0.98);
				transform: translateX(-100%);
				transition: transform 0.25s ease;
				z-index: 200;
			}
			.sidebar.open { transform: translateX(0); }
			.content { padding: 20px; }
			.stats-grid { grid-template-columns: 1fr; }
		}

		@media (max-width: 576px) {
			.topbar { padding: 0 12px; }
			.brand { gap: 8px; }
			.user-info span { display: none; }
			.logout-btn { display: none; }
			.sidebar { width: 220px; top: 56px; }
			.actions-grid { grid-template-columns: 1fr; }
		}
	</style>
</head>
<body>
	<div class="layout">
		<!-- Topbar -->
		<div class="topbar">
			<div class="brand">
				<button class="menu-toggle" id="menuToggle" aria-label="Menu">☰</button>
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
				<a href="#" class="nav-item active">
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
			<div class="content-header">
				<div class="welcome-card">
					<h1 class="welcome-title">Selamat datang kembali! 👋</h1>
					<p class="welcome-subtitle">Kelola konten website CVI Jatim dengan mudah dan efisien</p>
					<div class="status-badge">
						<span>🌿</span>
						<span>Tema Alam Aktif</span>
					</div>
				</div>
			</div>
			
			<!-- Stats Grid -->
			<div class="stats-grid">
				<div class="stat-card">
					<div class="stat-header">
						<h3 class="stat-title">Total Events</h3>
						<div class="stat-icon">🎉</div>
					</div>
					<div class="stat-value">12</div>
					<div class="stat-description">Event aktif bulan ini</div>
				</div>
				
				<div class="stat-card">
					<div class="stat-header">
						<h3 class="stat-title">Merchandise</h3>
						<div class="stat-icon">🛍️</div>
					</div>
					<div class="stat-value">8</div>
					<div class="stat-description">Produk tersedia</div>
				</div>
				
				<div class="stat-card">
					<div class="stat-header">
						<h3 class="stat-title">Campground</h3>
						<div class="stat-icon">🏕️</div>
					</div>
					<div class="stat-value">4</div>
					<div class="stat-description">Lokasi camping</div>
				</div>
				
				<div class="stat-card">
					<div class="stat-header">
						<h3 class="stat-title">Gallery</h3>
						<div class="stat-icon">📸</div>
					</div>
					<div class="stat-value">156</div>
					<div class="stat-description">Foto tersimpan</div>
				</div>
			</div>
			
			<!-- Quick Actions -->
			<div class="quick-actions">
				<h2 class="section-title">
					<span>⚡</span>
					<span>Quick Actions</span>
				</h2>
				<div class="actions-grid">
					<a href="<?= base_url('admin/events/create') ?>" class="action-btn">
						<div class="action-icon">➕</div>
						<span>Tambah Event Baru</span>
					</a>
					<a href="<?= base_url('admin/merchandise') ?>" class="action-btn">
						<div class="action-icon">📦</div>
						<span>Kelola Merchandise</span>
					</a>
					<a href="<?= base_url('admin/campground') ?>" class="action-btn">
						<div class="action-icon">🏕️</div>
						<span>Update Campground</span>
					</a>
					<a href="<?= base_url('admin/gallery/create') ?>" class="action-btn">
						<div class="action-icon">📷</div>
						<span>Upload Gallery</span>
					</a>
					<a href="<?= base_url('admin') ?>" class="action-btn">
						<div class="action-icon">📊</div>
						<span>Lihat Analytics</span>
					</a>
					<a href="<?= base_url('admin') ?>" class="action-btn">
						<div class="action-icon">⚙️</div>
						<span>Pengaturan</span>
					</a>
				</div>
			</div>
		</main>
	</div>
<script>
(function(){
	var toggle = document.getElementById('menuToggle');
	var sidebar = document.querySelector('.sidebar');
	if (toggle && sidebar) {
		toggle.addEventListener('click', function(){
			sidebar.classList.toggle('open');
		});
	}
	// Close when clicking outside
	document.addEventListener('click', function(e){
		if (window.innerWidth <= 992 && sidebar && sidebar.classList.contains('open')) {
			var within = sidebar.contains(e.target) || (toggle && toggle.contains(e.target));
			if (!within) { sidebar.classList.remove('open'); }
		}
	});
})();
</script>
</body>
</html>


