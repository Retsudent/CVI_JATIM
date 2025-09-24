<!doctype html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Events Management - CVI Jatim</title>
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
		
		/* Events Table */
		.events-container {
			background: rgba(255, 255, 255, 0.95);
			backdrop-filter: blur(20px);
			border-radius: 20px;
			padding: 30px;
			box-shadow: var(--shadow-xl);
		}
		
		.table-header {
			display: flex;
			justify-content: space-between;
			align-items: center;
			margin-bottom: 25px;
		}
		
		.table-title {
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
		
		.events-table {
			width: 100%;
			border-collapse: collapse;
			margin-top: 20px;
		}
		
		.events-table th {
			background: var(--mint);
			color: var(--dark-green);
			padding: 15px;
			text-align: left;
			font-weight: 600;
			border-radius: 10px 10px 0 0;
		}
		
		.events-table td {
			padding: 15px;
			border-bottom: 1px solid var(--gray-200);
		}
		
		.events-table tr:hover {
			background: var(--gray-50);
		}
		
		.event-image {
			width: 60px;
			height: 60px;
			border-radius: 10px;
			object-fit: cover;
			background: var(--gray-200);
		}
		
		.event-title {
			font-weight: 600;
			color: var(--dark-green);
			margin-bottom: 5px;
		}
		
		.event-date {
			font-size: 12px;
			color: var(--gray-600);
		}
		
		.status-badge {
			padding: 6px 12px;
			border-radius: 20px;
			font-size: 12px;
			font-weight: 600;
			text-transform: uppercase;
		}
		
		.status-active {
			background: var(--mint);
			color: var(--dark-green);
		}
		
		.status-inactive {
			background: #ffebee;
			color: #c62828;
		}
		
		.action-buttons {
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
			
			.events-table {
				font-size: 14px;
			}
			
			.events-table th,
			.events-table td {
				padding: 10px;
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
				<a href="http://localhost:8080/admin/events" class="nav-item active">
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
			<!-- Page Header -->
			<div class="page-header">
				<div class="page-title">
					<div class="page-icon">🎉</div>
					<span>Events Management</span>
				</div>
				<a href="http://localhost:8080/admin/events/create" class="add-btn">
					<span>➕</span>
					<span>Tambah Event Baru</span>
				</a>
			</div>
			
			<!-- Stats Row -->
			<div class="stats-row">
				<div class="stat-card">
					<div class="stat-icon">📅</div>
					<div class="stat-info">
						<h3>12</h3>
						<p>Total Events</p>
					</div>
				</div>
				<div class="stat-card">
					<div class="stat-icon">✅</div>
					<div class="stat-info">
						<h3>8</h3>
						<p>Event Aktif</p>
					</div>
				</div>
				<div class="stat-card">
					<div class="stat-icon">⏰</div>
					<div class="stat-info">
						<h3>4</h3>
						<p>Event Mendatang</p>
					</div>
				</div>
				<div class="stat-card">
					<div class="stat-icon">👥</div>
					<div class="stat-info">
						<h3>156</h3>
						<p>Total Peserta</p>
					</div>
				</div>
			</div>
			
			<!-- Events Table -->
			<div class="events-container">
				<div class="table-header">
					<h3 class="table-title">Daftar Events</h3>
					<div class="search-box">
						<span>🔍</span>
						<input type="text" placeholder="Cari event..." id="searchInput">
					</div>
				</div>
				
				<table class="events-table">
					<thead>
						<tr>
							<th>Gambar</th>
							<th>Event</th>
							<th>Tanggal Mulai</th>
							<th>Tanggal Selesai</th>
							<th>Lokasi</th>
							<th>Status</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
<?php
try {
    $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=cvi_wirotaman', 'postgres', 'postgres', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    $rows = $pdo->query('SELECT id, title, description, location, start_date, end_date, image, status FROM events ORDER BY id DESC LIMIT 100')->fetchAll(PDO::FETCH_ASSOC);
} catch (Throwable $e) { $rows = []; }
if (!$rows) {
    echo '<tr><td colspan="7">Tidak ada data event.</td></tr>';
}
foreach ($rows as $r):
    $img = $r['image'] ? '/assets/images/' . htmlspecialchars($r['image']) : '/assets/images/placeholder.jpg';
?>
						<tr>
							<td><img src="<?= $img ?>" alt="Event" class="event-image"></td>
							<td>
								<div class="event-title"><?= htmlspecialchars($r['title']) ?></div>
								<div class="event-date"><?= htmlspecialchars($r['description']) ?></div>
							</td>
							<td><?= htmlspecialchars($r['start_date']) ?></td>
							<td><?= htmlspecialchars($r['end_date']) ?></td>
							<td><?= htmlspecialchars($r['location']) ?></td>
							<td><span class="status-badge <?= $r['status']==='active'?'status-active':'status-inactive' ?>"><?= htmlspecialchars($r['status']) ?></span></td>
							<td>
								<div class="action-buttons">
									<button class="btn btn-view">👁️</button>
									<button class="btn btn-edit">✏️</button>
									<button class="btn btn-delete">🗑️</button>
								</div>
							</td>
						</tr>
<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</main>
	</div>
	
	<script>
		function openAddModal(){ window.location.href='/admin/events/create'; }
		
		function viewEvent(id) {
			alert('Melihat detail event ID: ' + id);
		}
		
		function editEvent(id) {
			alert('Mengedit event ID: ' + id);
		}
		
		function deleteEvent(id) {
			if (confirm('Apakah Anda yakin ingin menghapus event ini?')) {
				alert('Event ID: ' + id + ' berhasil dihapus!');
			}
		}
		
		// Search functionality
		document.getElementById('searchInput').addEventListener('input', function(e) {
			const searchTerm = e.target.value.toLowerCase();
			const rows = document.querySelectorAll('.events-table tbody tr');
			
			rows.forEach(row => {
				const text = row.textContent.toLowerCase();
				row.style.display = text.includes(searchTerm) ? '' : 'none';
			});
		});
	</script>
</body>
</html>
