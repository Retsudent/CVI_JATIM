<!doctype html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Reviews Management - CVI Jatim</title>
	<link rel="stylesheet" href="<?= base_url('assets/css/admin-layout.css') ?>">
	<style>
		/* Custom styles for this page only */
		.nav-item.active {
			background: #f0fdf4;
			color: #166534;
			border-right: 3px solid #22c55e;
		}
		
		/* Custom styles for this page only */
		.reviews-container {
			background: #ffffff;
			border: 1px solid #e5e7eb;
			border-radius: 8px;
			padding: 24px;
			box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
		}
		
		.tab-buttons {
			display: flex;
			flex-direction: column;
			gap: 12px;
			margin-bottom: 24px;
		}
		
		.tab-btn-row {
			display: flex;
			gap: 8px;
			flex-wrap: wrap;
		}
		
		.tab-btn {
			padding: 12px 24px;
			border: 1px solid #e5e7eb;
			background: #ffffff;
			border-radius: 6px;
			font-size: 14px;
			font-weight: 500;
			cursor: pointer;
			transition: all 0.2s ease;
			display: flex;
			align-items: center;
			gap: 8px;
			white-space: nowrap;
			flex: 1;
			min-width: 150px;
			justify-content: center;
		}
		
		.tab-btn.active {
			background: #111827;
			color: white;
			border-color: #111827;
		}
		
		.tab-content {
			display: none;
		}
		
		.tab-content.active {
			display: block;
		}
		
		.review-card {
			background: #ffffff;
			border: 1px solid #e5e7eb;
			border-radius: 8px;
			padding: 20px;
			margin-bottom: 16px;
			box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
		}
		
		.reviews-card-title {
			font-size: 15px;
			font-weight: 600;
			color: #1f2937;
			margin-bottom: 12px;
		}

		.review-header {
			display: flex;
			justify-content: space-between;
			align-items: flex-start;
			gap: 12px;
			flex-wrap: wrap;
		}
		
		.review-user {
			display: flex;
			align-items: center;
			gap: 12px;
			flex: 1;
			min-width: 200px;
		}
		
		.user-avatar {
			width: 40px;
			height: 40px;
			background: linear-gradient(135deg, var(--blue-500) 0%, var(--blue-600) 100%);
			border-radius: 10px;
			color: white;
			display: flex;
			align-items: center;
			justify-content: center;
			font-weight: 700;
			font-size: 16px;
			box-shadow: 0 4px 10px rgba(59, 130, 246, 0.25);
		}
		
		.review-user-info {
			display: flex;
			flex-direction: column;
			gap: 4px;
		}
		
		.review-user-info h4 {
			font-size: 16px;
			font-weight: 600;
			color: #111827;
			margin: 0;
		}
		
		.review-user-info p {
			font-size: 14px;
			color: #6b7280;
			margin: 0;
		}
		
		.review-user-email {
			font-size: 13px;
			color: #4b5563;
			margin-top: 2px;
			display: flex;
			align-items: center;
			gap: 4px;
		}
		
		.review-user-email svg {
			width: 14px;
			height: 14px;
			color: #6b7280;
		}
		
		.review-rating {
			display: flex;
			flex-direction: column;
			align-items: flex-end;
			gap: 8px;
			text-align: right;
		}
		
		.stars {
			display: flex;
			gap: 2px;
		}
		
		.star {
			width: 16px;
			height: 16px;
			color: #fbbf24;
		}
		
		.star.empty {
			color: #e5e7eb;
		}
		
		.review-status {
			padding: 4px 8px;
			border-radius: 4px;
			font-size: 12px;
			font-weight: 500;
		}
		
		.status-live {
			background: #dcfce7;
			color: #166534;
		}
		.status-pending {
			background: #fef3c7;
			color: #92400e;
		}
		
		.review-content {
			margin-bottom: 12px;
		}
		
		.review-text {
			font-size: 14px;
			color: #374151;
			line-height: 1.5;
			margin-bottom: 8px;
		}
		
		.review-date {
			font-size: 12px;
			color: #6b7280;
		}
		
		.admin-response {
			background: #f0f9ff;
			border: 1px solid #bae6fd;
			border-radius: 6px;
			padding: 12px;
			margin-top: 12px;
		}
		
		.admin-response h5 {
			font-size: 12px;
			font-weight: 600;
			color: #0369a1;
			margin: 0 0 8px 0;
			text-transform: uppercase;
			letter-spacing: 0.05em;
		}
		
		.admin-response p {
			font-size: 14px;
			color: #0c4a6e;
			margin: 0;
		}
		
		.review-actions {
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
			border: 1px solid;
			white-space: nowrap;
		}
		
		.btn-secondary {
			background: #f3f4f6;
			color: #374151;
			border-color: #e5e7eb;
		}
		
		.btn-danger {
			background: #ef4444;
			color: white;
			border-color: #ef4444;
		}
		
		#reviewsFilterForm {
			display: flex;
			gap: 12px;
			align-items: center;
			flex-wrap: wrap;
		}
		
		#reviewsFilterForm label {
			font-weight: 600;
			white-space: nowrap;
		}
		
		#reviewsFilterForm select,
		#reviewsFilterForm input[type="date"] {
			padding: 8px;
			border-radius: 6px;
			border: 1px solid #e5e7eb;
			font-size: 14px;
			min-width: 120px;
		}
		
		/* Responsive Styles */
		@media (max-width: 768px) {
			.reviews-container {
				padding: 16px;
			}
			
			.tab-btn-row {
				flex-direction: column;
			}
			
			.tab-btn {
				width: 100%;
				min-width: auto;
			}
			
			#reviewsFilterForm {
				flex-direction: column;
				align-items: stretch;
			}
			
			#reviewsFilterForm label {
				margin-bottom: 4px;
			}
			
			#reviewsFilterForm select,
			#reviewsFilterForm input[type="date"],
			#reviewsFilterForm button,
			#reviewsFilterForm a {
				width: 100%;
				min-width: auto;
			}
			
			.review-card {
				padding: 16px;
			}
			
			.reviews-card-title {
				font-size: 14px;
				margin-bottom: 8px;
			}

			.review-header {
				flex-direction: column;
				align-items: stretch;
				gap: 10px;
			}

			.review-user {
				min-width: auto;
			}

			.review-rating {
				align-items: flex-start;
				width: 100%;
				text-align: left;
			}
			
			.review-actions {
				flex-direction: column;
			}
			
			.review-actions .btn-sm {
				width: 100%;
				justify-content: center;
			}
			
			.review-user-info h4 {
				font-size: 15px;
			}
			
			.review-user-info p {
				font-size: 13px;
			}
			
			.review-text {
				font-size: 13px;
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
			
			.reviews-container {
				padding: 12px;
			}
			
			.review-card {
				padding: 12px;
			}
			
			.user-avatar {
				width: 36px;
				height: 36px;
				font-size: 14px;
			}
			
			.stars {
				gap: 1px;
			}
			
			.star {
				width: 14px;
				height: 14px;
			}
			
			.review-status {
				font-size: 11px;
				padding: 3px 6px;
			}
		}
		
		@media (min-width: 769px) and (max-width: 1024px) {
			.tab-btn {
				min-width: 140px;
			}
			
			#reviewsFilterForm {
				gap: 8px;
			}
			
			#reviewsFilterForm select,
			#reviewsFilterForm input[type="date"] {
				min-width: 100px;
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
							<polygon points="12,2 15.09,8.26 22,9.27 17,14.14 18.18,21.02 12,17.77 5.82,21.02 7,14.14 2,9.27 8.91,8.26"></polygon>
						</svg>
					</div>
					<span>Reviews Management</span>
				</div>
				<a href="/admin/reviews" class="add-btn">
					<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
						<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
						<polyline points="14,2 14,8 20,8"></polyline>
						<line x1="16" y1="13" x2="8" y2="13"></line>
						<line x1="16" y1="17" x2="8" y2="17"></line>
					</svg>
					<span>View All Reviews</span>
				</a>
			</div>
			
			<!-- Reviews Container -->
			<div class="reviews-container">
				<?php
				// Read filters from query string
				$filterRating = isset($_GET['rating']) && $_GET['rating'] !== '' ? (int)$_GET['rating'] : null;
				$filterDateRaw = isset($_GET['date']) && $_GET['date'] !== '' ? trim($_GET['date']) : null;
				$filterDate = null;
				if ($filterDateRaw) {
					// Accept dd/mm/yy or dd/mm/yyyy or yyyy-mm-dd or other strtotime parsable values
					if (preg_match('#^(\d{1,2})/(\d{1,2})/(\d{2,4})$#', $filterDateRaw, $m)) {
						$d = str_pad($m[1],2,'0',STR_PAD_LEFT);
						$mth = str_pad($m[2],2,'0',STR_PAD_LEFT);
						$y = $m[3];
						if (strlen($y) === 2) { $y = '20'.$y; }
						$filterDate = $y . '-' . $mth . '-' . $d;
					} elseif (preg_match('#^\d{4}-\d{2}-\d{2}$#', $filterDateRaw)) {
						$filterDate = $filterDateRaw;
					} else {
						$ts = strtotime($filterDateRaw);
						if ($ts !== false) $filterDate = date('Y-m-d', $ts);
					}
				}
				$selectedTabParam = isset($_GET['tab']) ? $_GET['tab'] : null;
				?>

				<div class="tab-buttons">
					<div class="tab-btn-row">
						<button class="tab-btn active" data-tab="merchandise">
							<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
								<line x1="3" y1="6" x2="21" y2="6"></line>
							</svg>
							Product Reviews
						</button>
						<button class="tab-btn" data-tab="campground">
							<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
								<circle cx="12" cy="10" r="3"></circle>
							</svg>
							Location Reviews
						</button>
					</div>

					<form id="reviewsFilterForm" method="get">
						<input type="hidden" name="tab" id="filterTabInput" value="<?= htmlspecialchars($selectedTabParam ?? 'merchandise') ?>" />
						<label>Filter:</label>
						<select name="rating" id="filterRating">
							<option value="">All ratings</option>
							<?php for ($s = 1; $s <= 5; $s++): ?>
								<option value="<?= $s ?>" <?= ($filterRating === $s) ? 'selected' : '' ?>><?= $s ?> star<?= $s>1 ? 's' : '' ?></option>
							<?php endfor; ?>
						</select>
						<input type="date" name="date" id="filterDate" value="<?= htmlspecialchars($filterDate ?? '') ?>" />
						<button type="submit" class="tab-btn">Apply</button>
						<a href="/admin/reviews" class="tab-btn">Clear</a>
					</form>
				</div>
				
				<!-- Merchandise Reviews Tab -->
				<div class="tab-content active" id="merchandise">
					<h3>Product Reviews</h3>
<?php
try {
	$pdo = new PDO('pgsql:host=localhost;port=5432;dbname=cvi_wirotaman', 'postgres', 'postgres', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

	// Build merchandise query with optional filters
	$merchSql = 'SELECT mr.*, m.name as product_name FROM merchandise_reviews mr JOIN merchandise m ON mr.merchandise_id = m.id';
	$merchConditions = [];
	$merchParams = [];
	if (!empty($filterRating)) {
		$merchConditions[] = 'mr.rating = :rating';
		$merchParams[':rating'] = $filterRating;
	}
	if (!empty($filterDate)) {
		$merchConditions[] = "DATE(mr.created_at) = :date";
		$merchParams[':date'] = $filterDate;
	}
	if (!empty($merchConditions)) {
		$merchSql .= ' WHERE ' . implode(' AND ', $merchConditions);
	}
	$merchSql .= ' ORDER BY mr.created_at DESC LIMIT 50';

	$stmt = $pdo->prepare($merchSql);
	$stmt->execute($merchParams);
	$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Throwable $e) { $rows = []; }
if (!$rows) {
    echo '<p style="text-align: center; color: #6b7280; padding: 40px;">Tidak ada review produk.</p>';
}
foreach ($rows as $r):
    $stars = '';
    for ($i = 1; $i <= 5; $i++) {
        $stars .= '<svg class="star' . ($i <= $r['rating'] ? '' : ' empty') . '" width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path></svg>';
    }
?>
					<div class="review-card">
						<div class="reviews-card-title"><?= htmlspecialchars($r['product_name']) ?></div>
						<div class="review-header">
							<div class="review-user">
								<div class="user-avatar"><?= strtoupper(substr($r['customer_name'], 0, 1)) ?></div>
								<div class="review-user-info">
									<h4><?= htmlspecialchars($r['customer_name']) ?></h4>
									<?php if (!empty($r['customer_email'])): ?>
									<div class="review-user-email">
										<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
											<path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
											<polyline points="22,6 12,13 2,6"></polyline>
										</svg>
										<span><?= htmlspecialchars($r['customer_email']) ?></span>
									</div>
									<?php endif; ?>
								</div>
							</div>
							<div class="review-rating">
								<div class="stars"><?= $stars ?></div>
								<?php if (!empty($r['is_approved'])): ?>
									<span class="review-status status-live">Live</span>
								<?php else: ?>
									<span class="review-status status-pending">Pending</span>
								<?php endif; ?>
							</div>
						</div>
						<div class="review-content">
							<div class="review-text"><?= htmlspecialchars($r['comment']) ?></div>
							<div class="review-date"><?= date('d M Y H:i', strtotime($r['created_at'])) ?></div>
						</div>
						<?php if ($r['admin_response']): ?>
						<div class="admin-response">
							<h5>Admin Response:</h5>
							<p><?= htmlspecialchars($r['admin_response']) ?></p>
						</div>
						<?php endif; ?>
						<div class="review-actions">
							<a href="/admin/reviews/respond/merchandise/<?= (int)$r['id'] ?>" class="btn-sm btn-secondary">Respond</a>
							<form method="post" action="/admin/reviews/toggle/merchandise/<?= (int)$r['id'] ?>" style="display:inline">
								<?= csrf_field() ?>
								<button type="submit" class="btn-sm btn-secondary"><?= $r['is_approved'] ? 'Hide' : 'Approve' ?></button>
							</form>
							<form method="post" action="/admin/reviews/delete/merchandise/<?= (int)$r['id'] ?>" onsubmit="return confirm('Hapus review ini?');" style="display:inline">
								<?= csrf_field() ?>
								<button type="submit" class="btn-sm btn-danger">Delete</button>
							</form>
						</div>
					</div>
<?php endforeach; ?>
				</div>
				
				<!-- Campground Reviews Tab -->
				<div class="tab-content" id="campground">
					<h3>Location Reviews</h3>
<?php
try {
	// Build campground query with optional filters
	$campSql = 'SELECT cr.*, c.name as campground_name FROM campground_reviews cr JOIN campgrounds c ON cr.campground_id = c.id';
	$campConditions = [];
	$campParams = [];
	if (!empty($filterRating)) {
		$campConditions[] = 'cr.rating = :rating';
		$campParams[':rating'] = $filterRating;
	}
	if (!empty($filterDate)) {
		$campConditions[] = "DATE(cr.created_at) = :date";
		$campParams[':date'] = $filterDate;
	}
	if (!empty($campConditions)) {
		$campSql .= ' WHERE ' . implode(' AND ', $campConditions);
	}
	$campSql .= ' ORDER BY cr.created_at DESC LIMIT 50';

	$stmt = $pdo->prepare($campSql);
	$stmt->execute($campParams);
	$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Throwable $e) { $rows = []; }
if (!$rows) {
    echo '<p style="text-align: center; color: #6b7280; padding: 40px;">Tidak ada review lokasi.</p>';
}
foreach ($rows as $r):
    $stars = '';
    for ($i = 1; $i <= 5; $i++) {
        $stars .= '<svg class="star' . ($i <= $r['rating'] ? '' : ' empty') . '" width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path></svg>';
    }
?>
					<div class="review-card">
						<div class="reviews-card-title"><?= htmlspecialchars($r['campground_name']) ?></div>
						<div class="review-header">
							<div class="review-user">
								<div class="user-avatar"><?= strtoupper(substr($r['customer_name'], 0, 1)) ?></div>
								<div class="review-user-info">
									<h4><?= htmlspecialchars($r['customer_name']) ?></h4>
									<?php if (!empty($r['customer_email'])): ?>
									<div class="review-user-email">
										<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
											<path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
											<polyline points="22,6 12,13 2,6"></polyline>
										</svg>
										<span><?= htmlspecialchars($r['customer_email']) ?></span>
									</div>
									<?php endif; ?>
								</div>
							</div>
							<div class="review-rating">
								<div class="stars"><?= $stars ?></div>
								<?php if (!empty($r['is_approved'])): ?>
									<span class="review-status status-live">Live</span>
								<?php else: ?>
									<span class="review-status status-pending">Pending</span>
								<?php endif; ?>
							</div>
						</div>
						<div class="review-content">
							<div class="review-text"><?= htmlspecialchars($r['comment']) ?></div>
							<div class="review-date"><?= date('d M Y H:i', strtotime($r['created_at'])) ?></div>
						</div>
						<?php if ($r['admin_response']): ?>
						<div class="admin-response">
							<h5>Admin Response:</h5>
							<p><?= htmlspecialchars($r['admin_response']) ?></p>
						</div>
						<?php endif; ?>
						<div class="review-actions">
							<a href="/admin/reviews/respond/campground/<?= (int)$r['id'] ?>" class="btn-sm btn-secondary">Respond</a>
							<form method="post" action="/admin/reviews/toggle/campground/<?= (int)$r['id'] ?>" style="display:inline">
								<?= csrf_field() ?>
								<button type="submit" class="btn-sm btn-secondary"><?= $r['is_approved'] ? 'Hide' : 'Approve' ?></button>
							</form>
							<form method="post" action="/admin/reviews/delete/campground/<?= (int)$r['id'] ?>" onsubmit="return confirm('Hapus review ini?');" style="display:inline">
								<?= csrf_field() ?>
								<button type="submit" class="btn-sm btn-danger">Delete</button>
							</form>
						</div>
					</div>
<?php endforeach; ?>
				</div>
			</div>
		
		</main>
	</div>
	
	<script>
		
		// Tab functionality
		document.querySelectorAll('.tab-btn').forEach(btn => {
			btn.addEventListener('click', function() {
				// Update active button
				document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
				this.classList.add('active');
				
				// Update active content
				document.querySelectorAll('.tab-content').forEach(content => content.classList.remove('active'));
				document.getElementById(this.dataset.tab).classList.add('active');

				// Keep filter form's hidden tab input in sync
				var tabInput = document.getElementById('filterTabInput');
				if (tabInput) { tabInput.value = this.dataset.tab; }
			});
		});

		// Respect URL fragment on load so redirects to /admin/reviews#campground keep that tab active
		document.addEventListener('DOMContentLoaded', function() {
			var hash = (window.location.hash || '').replace('#','');
			if (hash) {
				var btn = document.querySelector('.tab-btn[data-tab="' + hash + '"]');
				if (btn) {
					btn.click();
				}
			}
		});
	
	</script>

    <?php if (!empty($selectedTabParam)): ?>
    <script>
        (function(){
            try { window.location.hash = <?= json_encode($selectedTabParam) ?>; } catch(e) {}
        })();
    </script>
    <?php endif; ?>
</body>
</html>

