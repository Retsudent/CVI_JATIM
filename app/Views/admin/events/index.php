<!doctype html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Events Management - CVI Jatim</title>
	<link rel="stylesheet" href="<?= base_url('assets/css/admin-layout.css') ?>">
	<style>
		/* Custom styles for this page only */
		.nav-item.active {
			background: #f0fdf4;
			color: #166534;
			border-right: 3px solid #22c55e;
		}
		
		.stats-row {
			display: grid;
			grid-template-columns: repeat(1, 1fr);
			gap: 20px;
			margin-bottom: 32px;
		}
		
		@media (min-width: 576px) {
			.stats-row { grid-template-columns: repeat(2, 1fr); }
		}
		@media (min-width: 992px) {
			.stats-row { grid-template-columns: repeat(4, 1fr); }
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
		
		.search-box {
			display: flex;
			align-items: center;
			gap: 8px;
			padding: 8px 12px;
			background: #f9fafb;
			border: 1px solid #e5e7eb;
			border-radius: 6px;
			width: 300px;
		}
		
		.search-box input {
			border: none;
			background: transparent;
			outline: none;
			font-size: 14px;
			width: 100%;
		}
		
		.events-table {
			width: 100%;
			border-collapse: collapse;
			background: #ffffff;
			border-radius: 8px;
			overflow: hidden;
			box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
		}
		
		.events-table th {
			background: #f9fafb;
			color: #374151;
			padding: 12px 16px;
			text-align: left;
			font-weight: 600;
			font-size: 12px;
			text-transform: uppercase;
			letter-spacing: 0.05em;
			border-bottom: 1px solid #e5e7eb;
		}
		
		.events-table td {
			padding: 12px 16px;
			border-bottom: 1px solid #f3f4f6;
			vertical-align: middle;
			font-size: 14px;
			color: #374151;
		}
		
		.events-table tr:hover {
			background: #f9fafb;
		}
		
		.events-table tr:last-child td {
			border-bottom: none;
		}
		
		.event-image {
			width: 60px;
			height: 60px;
			border-radius: 6px;
			object-fit: cover;
		}
		
		.status-badge {
			display: inline-flex;
			align-items: center;
			gap: 4px;
			padding: 4px 8px;
			border-radius: 4px;
			font-size: 12px;
			font-weight: 500;
		}
		
		.status-active {
			background: #dcfce7;
			color: #166534;
		}
		
		.status-inactive {
			background: #f3f4f6;
			color: #6b7280;
		}
		
		.action-buttons {
			display: flex;
			gap: 8px;
		}
		
		.btn-sm {
			padding: 6px 10px;
			font-size: 12px;
			border-radius: 4px;
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
					<div class="stat-value">12</div>
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
					<div class="stat-value">8</div>
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
					<div class="stat-value">4</div>
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
				<table class="events-table">
					<thead>
						<tr>
							<th>Event</th>
							<th>Date</th>
							<th>Location</th>
							<th>Status</th>
							<th>Participants</th>
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
    echo '<tr><td colspan="6">Tidak ada data event.</td></tr>';
}
foreach ($rows as $r):
    $img = $r['image'] ? '/assets/images/' . htmlspecialchars($r['image']) : '/assets/images/placeholder.jpg';
?>
						<tr>
							<td>
								<div style="display: flex; align-items: center; gap: 12px;">
									<img src="<?= $img ?>" alt="Event" class="event-image">
									<div>
										<div style="font-weight: 600; color: #111827;"><?= htmlspecialchars($r['title']) ?></div>
										<div style="font-size: 12px; color: #6b7280;"><?= htmlspecialchars($r['description']) ?></div>
									</div>
								</div>
							</td>
							<td><?= htmlspecialchars($r['start_date']) ?></td>
							<td><?= htmlspecialchars($r['location']) ?></td>
							<td><span class="status-badge <?= $r['status']==='active'?'status-active':'status-inactive' ?>"><?= htmlspecialchars($r['status']) ?></span></td>
							<td>0</td>
							<td>
								<div class="action-buttons">
									<a href="/event/detail/<?= (int)$r['id'] ?>" class="btn btn-secondary btn-sm" target="_blank">View</a>
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
		
		// Search functionality
		document.querySelector('.search-box input').addEventListener('input', function(e) {
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
                                    <a class="btn btn-view" href="/event/detail/<?= (int)$r['id'] ?>" target="_blank">👁️</a>
                                    <a class="btn btn-edit" href="/admin/events/edit/<?= (int)$r['id'] ?>">✏️</a>
									<form method="post" action="/admin/events/delete/<?= (int)$r['id'] ?>" onsubmit="return confirm('Hapus event ini?');" style="display:inline">
										<?= csrf_field() ?>
										<button type="submit" class="btn btn-delete">🗑️</button>
									</form>
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
