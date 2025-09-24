<!doctype html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Gallery Management - CVI Jatim</title>
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
		
		/* Gallery Container */
		.gallery-container {
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
		
		.gallery-controls {
			display: flex;
			gap: 15px;
			align-items: center;
		}
		
		.view-toggle {
			display: flex;
			background: var(--gray-100);
			border-radius: 10px;
			padding: 4px;
		}
		
		.view-btn {
			padding: 8px 12px;
			border: none;
			background: transparent;
			border-radius: 8px;
			cursor: pointer;
			transition: all 0.3s ease;
			font-size: 16px;
		}
		
		.view-btn.active {
			background: var(--primary-green);
			color: white;
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
		
		/* Gallery Grid */
		.gallery-grid {
			display: grid;
			grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
			gap: 20px;
		}
		
		.gallery-item {
			background: white;
			border-radius: 16px;
			overflow: hidden;
			box-shadow: var(--shadow-md);
			transition: all 0.3s ease;
			position: relative;
			group: hover;
		}
		
		.gallery-item:hover {
			transform: translateY(-5px);
			box-shadow: var(--shadow-xl);
		}
		
		.gallery-image {
			width: 100%;
			height: 200px;
			background: linear-gradient(135deg, var(--mint), var(--sage));
			display: flex;
			align-items: center;
			justify-content: center;
			font-size: 48px;
			color: var(--dark-green);
			position: relative;
			overflow: hidden;
		}
		
		.gallery-overlay {
			position: absolute;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			background: rgba(0, 0, 0, 0.7);
			display: flex;
			align-items: center;
			justify-content: center;
			opacity: 0;
			transition: all 0.3s ease;
		}
		
		.gallery-item:hover .gallery-overlay {
			opacity: 1;
		}
		
		.overlay-actions {
			display: flex;
			gap: 10px;
		}
		
		.overlay-btn {
			width: 40px;
			height: 40px;
			border: none;
			border-radius: 50%;
			background: rgba(255, 255, 255, 0.9);
			color: var(--dark-green);
			cursor: pointer;
			display: flex;
			align-items: center;
			justify-content: center;
			font-size: 16px;
			transition: all 0.3s ease;
		}
		
		.overlay-btn:hover {
			background: var(--primary-green);
			color: white;
			transform: scale(1.1);
		}
		
		.gallery-info {
			padding: 20px;
		}
		
		.gallery-title {
			font-size: 16px;
			font-weight: 600;
			color: var(--dark-green);
			margin-bottom: 8px;
		}
		
		.gallery-meta {
			display: flex;
			justify-content: space-between;
			align-items: center;
			margin-bottom: 15px;
		}
		
		.gallery-date {
			font-size: 12px;
			color: var(--gray-600);
		}
		
		.gallery-size {
			font-size: 12px;
			color: var(--gray-600);
			background: var(--gray-100);
			padding: 4px 8px;
			border-radius: 12px;
		}
		
		.gallery-actions {
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
		
		/* List View */
		.gallery-list {
			display: none;
		}
		
		.gallery-list.active {
			display: block;
		}
		
		.gallery-grid.active {
			display: grid;
		}
		
		.gallery-grid:not(.active) {
			display: none;
		}
		
		.list-item {
			display: flex;
			align-items: center;
			gap: 20px;
			padding: 20px;
			background: white;
			border-radius: 12px;
			margin-bottom: 15px;
			box-shadow: var(--shadow-sm);
			transition: all 0.3s ease;
		}
		
		.list-item:hover {
			box-shadow: var(--shadow-md);
			transform: translateY(-2px);
		}
		
		.list-image {
			width: 80px;
			height: 80px;
			background: linear-gradient(135deg, var(--mint), var(--sage));
			border-radius: 10px;
			display: flex;
			align-items: center;
			justify-content: center;
			font-size: 24px;
			color: var(--dark-green);
		}
		
		.list-info {
			flex: 1;
		}
		
		.list-title {
			font-size: 16px;
			font-weight: 600;
			color: var(--dark-green);
			margin-bottom: 5px;
		}
		
		.list-meta {
			display: flex;
			gap: 20px;
			font-size: 14px;
			color: var(--gray-600);
		}
		
		.list-actions {
			display: flex;
			gap: 8px;
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
			
			.gallery-grid {
				grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
			}
			
			.gallery-controls {
				flex-direction: column;
				gap: 10px;
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
				<a href="http://localhost:8080/admin/campground" class="nav-item">
					<div class="nav-icon">🏕️</div>
					<span>Campground</span>
				</a>
				<a href="http://localhost:8080/admin/gallery" class="nav-item active">
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
			<div style="background:#fff3cd;color:#856404;padding:10px 14px;border-radius:8px;border:1px solid #ffeeba;margin-bottom:14px;">
				<span style="font-weight:700;">Info:</span>
				count = <?= isset($photos)&&is_array($photos)?count($photos):0 ?>
				<?php if (!empty($photos)): ?>
					<?php $__names = array_map(static fn($p)=>$p['image']??'', array_slice($photos,0,3)); ?>
					<span style="margin-left:10px;">sample = <?= htmlspecialchars(implode(', ', $__names)) ?></span>
				<?php endif; ?>
				<?php if (!empty($debug)): ?>
					<span style="margin-left:10px;">db=<?= htmlspecialchars((string)($debug['dbName'] ?? '')) ?></span>
					<span style="margin-left:10px;">rawCount=<?= htmlspecialchars((string)($debug['rawCount'] ?? '')) ?></span>
					<?php if (!empty($debug['dbError'])): ?>
						<span style="margin-left:10px;color:#b71c1c;">dbError=<?= htmlspecialchars((string)$debug['dbError']) ?></span>
					<?php endif; ?>
				<?php endif; ?>
			</div>
			<!-- Page Header -->
			<div class="page-header">
				<div class="page-title">
					<div class="page-icon">📸</div>
					<span>Gallery Management</span>
				</div>
				<a href="http://localhost:8080/admin/gallery/create" class="add-btn">
					<span>➕</span>
					<span>Upload Foto Baru</span>
				</a>
			</div>
			
			<!-- Stats Row -->
			<div class="stats-row">
				<div class="stat-card">
					<div class="stat-icon">📸</div>
					<div class="stat-info">
						<h3>156</h3>
						<p>Total Foto</p>
					</div>
				</div>
				<div class="stat-card">
					<div class="stat-icon">📁</div>
					<div class="stat-info">
						<h3>8</h3>
						<p>Album</p>
					</div>
				</div>
				<div class="stat-card">
					<div class="stat-icon">💾</div>
					<div class="stat-info">
						<h3>2.4GB</h3>
						<p>Total Ukuran</p>
					</div>
				</div>
				<div class="stat-card">
					<div class="stat-icon">📅</div>
					<div class="stat-info">
						<h3>24</h3>
						<p>Foto Bulan Ini</p>
					</div>
				</div>
			</div>
			
			<!-- Gallery Container -->
			<div class="gallery-container">
				<?php if (!empty($success)): ?>
					<div style="background:#e8f5e9;color:#1b5e20;padding:10px;border-radius:6px;margin:10px 0;">
						<?= htmlspecialchars($success) ?>
					</div>
				<?php endif; ?>
				<?php if (!empty($error)): ?>
					<div style="background:#fdecea;color:#b71c1c;padding:10px;border-radius:6px;margin:10px 0;">
						<?= htmlspecialchars($error) ?>
					</div>
				<?php endif; ?>
				<div class="container-header">
					<h3 class="container-title">Daftar Foto <span style="display:inline-block;margin-left:8px;background:#e8f5e9;color:#1b5e20;border:1px solid #a5d6a7;padding:2px 8px;border-radius:999px;font-size:12px;vertical-align:middle;">count: <?= isset($photos)&&is_array($photos)?count($photos):0 ?></span></h3>
					<div class="gallery-controls">
						<div class="view-toggle">
						<button class="view-btn active" onclick="toggleView('grid', this)">⊞</button>
						<button class="view-btn" onclick="toggleView('list', this)">☰</button>
						</div>
						<div class="search-box">
							<span>🔍</span>
							<input type="text" placeholder="Cari foto..." id="searchInput">
						</div>
					</div>
				</div>
				
				<?php if (isset($_GET['debug'])): ?>
					<div style="background:#fff3cd;color:#856404;padding:10px;border-radius:6px;margin:0 0 15px;">
						Debug: jumlah foto = <?= isset($photos) && is_array($photos) ? count($photos) : 0 ?>
						<?php if (!empty($debug)): ?>
							<span style="margin-left:10px;">db=<?= htmlspecialchars((string)($debug['dbName'] ?? '')) ?></span>
							<span style="margin-left:10px;">rawCount=<?= htmlspecialchars((string)($debug['rawCount'] ?? '')) ?></span>
							<span style="margin-left:10px;">filesFound=<?= htmlspecialchars((string)($debug['filesFound'] ?? '')) ?></span>
							<?php if (!empty($debug['dbError'])): ?>
								<span style="margin-left:10px;color:#b71c1c;">dbError=<?= htmlspecialchars((string)$debug['dbError']) ?></span>
							<?php endif; ?>
						<?php endif; ?>
					</div>
				<?php endif; ?>

				<!-- Grid View -->
				<div class="gallery-grid active" id="gridView">
					<?php if (!empty($photos)) : ?>
						<?php foreach ($photos as $photo): ?>
							<div class="gallery-item">
								<div class="gallery-image">
									<?php if (!empty($photo['image'])): ?>
								<?php
									$__imgName = isset($photo['image']) ? basename((string)$photo['image']) : '';
									$__imgDir = FCPATH . 'assets' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR;
									$__imgPath = $__imgDir . $__imgName;
									$__imgUrl = base_url('assets/images/' . $__imgName);
									if ($__imgName !== '' && !is_file($__imgPath)) {
										// If DB value missing extension, try common ones
										$__base = pathinfo($__imgName, PATHINFO_FILENAME);
										$__try = ['jpg','jpeg','png','webp'];
										foreach ($__try as $__ext) {
											$__candidate = $__base . '.' . $__ext;
											if (is_file($__imgDir . $__candidate)) { $__imgName = $__candidate; $__imgUrl = base_url('assets/images/' . $__imgName); break; }
										}
									}
									if ($__imgName === '' || !is_file($__imgDir . $__imgName)) {
										$__imgUrl = base_url('assets/images/placeholder.jpg');
									}
								?>
								<img src="<?= htmlspecialchars($__imgUrl) ?>" alt="<?= htmlspecialchars($photo['title'] ?? '') ?>" style="width:100%;height:100%;object-fit:cover;" />
									<?php else: ?>
										<span>📷</span>
									<?php endif; ?>
									<div class="gallery-overlay">
										<div class="overlay-actions">
											<button class="overlay-btn" onclick="viewPhoto(<?= (int)($photo['id'] ?? 0) ?>)">👁️</button>
											<button class="overlay-btn" onclick="editPhoto(<?= (int)($photo['id'] ?? 0) ?>)">✏️</button>
											<button class="overlay-btn" onclick="deletePhoto(<?= (int)($photo['id'] ?? 0) ?>)">🗑️</button>
										</div>
									</div>
								</div>
								<div class="gallery-info">
									<h4 class="gallery-title"><?= htmlspecialchars($photo['title'] ?? 'Tanpa Judul') ?></h4>
									<div class="gallery-meta">
										<span class="gallery-date"><?= htmlspecialchars(date('d M Y', strtotime($photo['created_at'] ?? date('Y-m-d')))) ?></span>
										<span class="gallery-size">&nbsp;</span>
									</div>
									<div class="gallery-actions">
										<button class="btn btn-view" onclick="viewPhoto(<?= (int)($photo['id'] ?? 0) ?>)">👁️ Lihat</button>
										<button class="btn btn-edit" onclick="editPhoto(<?= (int)($photo['id'] ?? 0) ?>)">✏️ Edit</button>
										<button class="btn btn-delete" onclick="deletePhoto(<?= (int)($photo['id'] ?? 0) ?>)">🗑️ Hapus</button>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					<?php else: ?>
						<p>Tidak ada foto.</p>
					<?php endif; ?>
				</div>
				
				<!-- List View -->
				<div class="gallery-list" id="listView">
					<?php if (!empty($photos)) : ?>
						<?php foreach ($photos as $photo): ?>
							<div class="list-item">
								<div class="list-image">
									<?php if (!empty($photo['image'])): ?>
									<?php
										$__imgName = isset($photo['image']) ? basename((string)$photo['image']) : '';
										$__imgDir = FCPATH . 'assets' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR;
										$__imgPath = $__imgDir . $__imgName;
										$__imgUrl = base_url('assets/images/' . $__imgName);
										if ($__imgName !== '' && !is_file($__imgPath)) {
											$__base = pathinfo($__imgName, PATHINFO_FILENAME);
											$__try = ['jpg','jpeg','png','webp'];
											foreach ($__try as $__ext) {
												$__candidate = $__base . '.' . $__ext;
												if (is_file($__imgDir . $__candidate)) { $__imgName = $__candidate; $__imgUrl = base_url('assets/images/' . $__imgName); break; }
											}
										}
										if ($__imgName === '' || !is_file($__imgDir . $__imgName)) {
											$__imgUrl = base_url('assets/images/placeholder.jpg');
										}
									?>
									<img src="<?= htmlspecialchars($__imgUrl) ?>" alt="<?= htmlspecialchars($photo['title'] ?? '') ?>" style="width:80px;height:80px;object-fit:cover;border-radius:10px;" />
									<?php else: ?>
										📷
									<?php endif; ?>
								</div>
								<div class="list-info">
									<h4 class="list-title"><?= htmlspecialchars($photo['title'] ?? 'Tanpa Judul') ?></h4>
									<div class="list-meta">
										<span><?= htmlspecialchars(date('d M Y', strtotime($photo['created_at'] ?? date('Y-m-d')))) ?></span>
										<span><?= htmlspecialchars($photo['caption'] ?? '') ?></span>
									</div>
								</div>
								<div class="list-actions">
									<button class="btn btn-view" onclick="viewPhoto(<?= (int)($photo['id'] ?? 0) ?>)">👁️</button>
									<button class="btn btn-edit" onclick="editPhoto(<?= (int)($photo['id'] ?? 0) ?>)">✏️</button>
									<button class="btn btn-delete" onclick="deletePhoto(<?= (int)($photo['id'] ?? 0) ?>)">🗑️</button>
								</div>
							</div>
						<?php endforeach; ?>
					<?php else: ?>
						<p>Tidak ada foto.</p>
					<?php endif; ?>
				</div>
			</div>
		</main>
	</div>
	
	<script>
		// Navigasi ke halaman form tambah foto
		function openAddModal() { window.location.href = '/admin/gallery/create'; }
		
		function viewPhoto(id) {
			alert('Melihat foto ID: ' + id);
		}
		
		function editPhoto(id) {
			alert('Mengedit foto ID: ' + id);
		}
		
		function deletePhoto(id) {
			if (confirm('Apakah Anda yakin ingin menghapus foto ini?')) {
				alert('Foto ID: ' + id + ' berhasil dihapus!');
			}
		}
		
		function toggleView(view, btn) {
			// Update active button
			document.querySelectorAll('.view-btn').forEach(btn => {
				btn.classList.remove('active');
			});
			if (btn) { btn.classList.add('active'); }
			
			// Toggle views
			const gridView = document.getElementById('gridView');
			const listView = document.getElementById('listView');
			
			if (view === 'grid') {
				gridView.classList.add('active');
				listView.classList.remove('active');
			} else {
				gridView.classList.remove('active');
				listView.classList.add('active');
			}
		}
		
		// Search functionality
		document.getElementById('searchInput').addEventListener('input', function(e) {
			const searchTerm = e.target.value.toLowerCase();
			const items = document.querySelectorAll('.gallery-item, .list-item');
			
			items.forEach(item => {
				const text = item.textContent.toLowerCase();
				item.style.display = text.includes(searchTerm) ? '' : 'none';
			});
		});
	</script>
</body>
</html>
