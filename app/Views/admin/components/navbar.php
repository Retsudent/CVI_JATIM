<!-- Topbar -->
<div class="topbar">
	<div class="brand">
		<button type="button" class="menu-toggle" aria-label="Toggle sidebar" title="Toggle sidebar" onclick="(function(l){if(!l)l=document.querySelector('.layout');l&&l.classList.toggle('show-sidebar');})()">
			<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
				<line x1="3" y1="12" x2="21" y2="12"></line>
				<line x1="3" y1="6" x2="21" y2="6"></line>
				<line x1="3" y1="18" x2="21" y2="18"></line>
			</svg>
		</button>
		<div class="logo-icon">
			<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
				<path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
			</svg>
		</div>
		<span>CVI Jatim Admin</span>
	</div>
	<div class="user-info">
		<div class="user-avatar">
			<?= strtoupper(substr($_SESSION['username'] ?? 'A', 0, 1)) ?>
		</div>
		<span style="font-weight: 600; color: var(--gray-700);"><?= htmlspecialchars($_SESSION['username'] ?? 'Admin') ?></span>
		<a class="logout-btn" href="/logout">
			<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
				<path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
				<polyline points="16 17 21 12 16 7"></polyline>
				<line x1="21" y1="12" x2="9" y2="12"></line>
			</svg>
			<span></span>
		</a>
	</div>
</div>

