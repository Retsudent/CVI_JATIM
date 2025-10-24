<!-- Topbar -->
<div class="topbar">
	<div class="brand">
	<button type="button" class="menu-toggle" aria-label="Toggle sidebar" title="Toggle sidebar" onclick="(function(l){if(!l)l=document.querySelector('.layout');l&&l.classList.toggle('show-sidebar');})()" style="border:0;background:transparent;padding:6px 8px;margin-right:8px;display:inline-flex;align-items:center;border-radius:6px;cursor:pointer;">
			<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
				<line x1="3" y1="12" x2="21" y2="12"></line>
				<line x1="3" y1="6" x2="21" y2="6"></line>
				<line x1="3" y1="18" x2="21" y2="18"></line>
			</svg>
		</button>
		<div class="logo-icon">
			<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
				<path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
			</svg>
		</div>
		<span>CVI Jatim Admin</span>
	</div>
	<div class="user-info">
		<div class="user-avatar">
			<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
				<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
				<circle cx="12" cy="7" r="4"></circle>
			</svg>
		</div>
		<span><?= htmlspecialchars($_SESSION['username'] ?? 'Admin') ?></span>
		<a class="logout-btn" href="/logout">Logout</a>
	</div>
</div>

