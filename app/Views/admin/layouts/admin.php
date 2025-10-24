<!doctype html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $page_title ?? 'Admin Dashboard' ?> - CVI Jatim</title>
	<link rel="stylesheet" href="<?= base_url('assets/css/admin-layout.css') ?>">
	<?php if (isset($custom_css)): ?>
	<style>
		<?= $custom_css ?>
	</style>
	<?php endif; ?>
</head>
<body>
	<div class="layout">
		<?php include APPPATH . 'Views/admin/components/navbar.php'; ?>
		<?php include APPPATH . 'Views/admin/components/sidebar.php'; ?>
		
		<!-- Main Content -->
		<main class="content">
			<?= $this->renderSection('content') ?>
		</main>
	</div>
	
	<?php if (isset($custom_js)): ?>
	<script>
		<?= $custom_js ?>
	</script>
	<?php endif; ?>

	<script>
	// Sidebar toggle for small screens
	(function(){
		var toggle = document.querySelector('.menu-toggle');
		var layout = document.querySelector('.layout');
		var content = document.querySelector('.content');
		if(!toggle || !layout) return;

		function closeSidebar(){ layout.classList.remove('show-sidebar'); }
		function openSidebar(){ layout.classList.add('show-sidebar'); }

		toggle.addEventListener('click', function(e){
			e.stopPropagation();
			if(layout.classList.contains('show-sidebar')) closeSidebar(); else openSidebar();
		});

		// Close when clicking on content overlay/area
		content && content.addEventListener('click', function(){
			if(layout.classList.contains('show-sidebar')) closeSidebar();
		});

		// Close on escape
		document.addEventListener('keydown', function(e){ if(e.key === 'Escape') closeSidebar(); });
	})();
	</script>
</body>
</html>

