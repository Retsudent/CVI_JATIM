<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Respon Review - Admin CVI Jatim</title>
	<link rel="stylesheet" href="<?= base_url('assets/css/admin-layout.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/admin-forms.css') ?>">
	
	<style>
		/* Custom styles for this page only */
		.nav-item.active {
			background: #f0fdf4;
			color: #166534;
			border-right: 3px solid #22c55e;
		}
		
		body {
			font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
			background: linear-gradient(135deg, #f0f8ff 0%, #e6ffe6 100%);
			color: var(--gray-800);
			overflow-x: hidden;
		}
		
		.layout {
			display: grid;
			grid-template-columns: 280px 1fr;
			grid-template-rows: 70px 1fr;
			min-height: 100vh;
		}
		
		/* Topbar */
		.topbar {
			grid-column: 1 / -1;
			background: linear-gradient(135deg, var(--primary-green), var(--forest));
			color: white;
			padding: 0 30px;
			display: flex;
			align-items: center;
			justify-content: space-between;
			box-shadow: var(--shadow-md);
		}
		
		.brand {
			display: flex;
			align-items: center;
			gap: 12px;
			font-weight: 700;
			font-size: 18px;
		}
		
		.logo-icon {
			width: 35px;
			height: 35px;
			background: rgba(255, 255, 255, 0.2);
			border-radius: 50%;
			display: flex;
			align-items: center;
			justify-content: center;
			font-size: 16px;
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
		
		.content-header {
			margin-bottom: 30px;
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
		}
	</style>
</head>
<body>
	<div class="layout">
		<?php include APPPATH . 'Views/admin/components/navbar.php'; ?>
		<?php include APPPATH . 'Views/admin/components/sidebar.php'; ?>
		
		<!-- Main Content -->
		<main class="content">
			<div class="content-header">
				<h1 style="font-size: 2rem; font-weight: 700; color: var(--dark-green); margin-bottom: 0.5rem;">💬 Respon Review</h1>
				<p style="color: var(--gray-600); font-size: 1.1rem;">Berikan respon untuk review pelanggan</p>
			</div>

<div class="admin-form-container">

	<?php if (session()->getFlashdata('error')): ?>
		<div class="alert alert-danger" role="alert" style="margin-bottom:1rem;">
			<?= htmlspecialchars(session()->getFlashdata('error')) ?>
		</div>
	<?php endif; ?>
	<?php if (session()->getFlashdata('success')): ?>
		<div class="alert alert-success" role="alert" style="margin-bottom:1rem;">
			<?= htmlspecialchars(session()->getFlashdata('success')) ?>
		</div>
	<?php endif; ?>

	<form method="post" action="<?= base_url('admin/reviews/respond/' . $type . '/' . $review['id']) ?>" id="responseForm">
        <?= csrf_field() ?>
        <!-- Debug info to verify form data -->
        <input type="hidden" name="debug_info" value="review_<?= $review['id'] ?>">
        <div class="form-section">
            <h4>📝 Review Pelanggan</h4>
            
            <div style="background: #f8f9fa; padding: 1.5rem; border-radius: 8px; margin-bottom: 1.5rem;">
                <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1rem;">
                    <h4 style="margin: 0; color: #2c3e50;"><?= htmlspecialchars($review['customer_name']) ?></h4>
                    <div style="display: flex; gap: 0.2rem;">
                        <?php for ($i = 1; $i <= 5; $i++): ?>
                            <span style="color: <?= $i <= $review['rating'] ? '#ffc107' : '#ddd' ?>;">⭐</span>
                        <?php endfor; ?>
                    </div>
                    <span class="status-badge status-<?= $review['is_approved'] ? 'approved' : 'pending' ?>">
                        <?= $review['is_approved'] ? '✅ Disetujui' : '⏳ Menunggu' ?>
                    </span>
                </div>
                
                <p style="margin: 0; color: #6c757d; font-size: 0.9rem;">
                    <?= date('d F Y H:i', strtotime($review['created_at'])) ?>
                </p>
                
                <?php if (!empty($review['comment'])): ?>
                    <div style="background: #fff; padding: 1rem; border-radius: 6px; margin-top: 1rem;">
                        <p style="margin: 0; line-height: 1.6;"><?= nl2br(htmlspecialchars($review['comment'])) ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        
        <div class="form-section">
            <h4>💬 Respon Admin</h4>
            
            <div class="form-group">
                <label>Respon Admin</label>
                <textarea 
                    name="admin_response" 
                    id="adminResponse"
                    placeholder="Tulis respon yang sopan dan membantu untuk pelanggan..."
                    required
                ><?= htmlspecialchars(old('admin_response', $review['admin_response'] ?? '')) ?></textarea>
                <div class="form-help">Respon akan ditampilkan di halaman publik sebagai balasan dari admin</div>
                <?php if (session('error')): ?>
                    <div class="alert alert-danger"><?= session('error') ?></div>
                <?php endif; ?>
                <?php if (session('success')): ?>
                    <div class="alert alert-success"><?= session('success') ?></div>
                <?php endif; ?>
            </div>

            <script>
            document.getElementById('responseForm').onsubmit = function(e) {
                var response = document.getElementById('adminResponse').value.trim();
                if (!response) {
                    e.preventDefault();
                    alert('Silakan tulis respon admin terlebih dahulu');
                    return false;
                }
                // Log form submission attempt
                console.log('Submitting response:', response);
                return true;
            };
            </script>
        </div>
        
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">
                💾 Simpan Respon
            </button>
            <a href="/admin/reviews" class="btn btn-outline">
                ← Kembali ke Review
            </a>
        </div>
    </form>
</div>

		</main>
	</div>
</body>
</html>

<style>
.status-approved {
    background: #d4edda;
    color: #155724;
}

.status-pending {
    background: #fff3cd;
    color: #856404;
}
</style>

<script>
// Warn before unloading the page if the admin has typed a response but not submitted.
(function(){
	var textarea = document.querySelector('textarea[name="admin_response"]');
	if (!textarea) return;
	var initial = textarea.value || '';
	var form = textarea.closest('form');
	var isSubmitting = false;

	window.addEventListener('beforeunload', function (e) {
		if (isSubmitting) return;
		var current = textarea.value || '';
		if (current !== initial) {
			var msg = 'Anda memiliki perubahan yang belum disimpan. Apakah Anda yakin ingin meninggalkan halaman ini?';
			(e || window.event).returnValue = msg; // Gecko + IE
			return msg; // Webkit, Chrome
		}
	});

	if (form) {
		form.addEventListener('submit', function () { isSubmitting = true; });
	}
})();
</script>





