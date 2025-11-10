<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - CVI Jatim</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-green: #10b981;
            --dark-green: #047857;
            --light-green: #34d399;
            --mint: #d1fae5;
            --sage: #a7f3d0;
            --forest: #059669;
            --earth: #1f2937;
            --sky: #f0f9ff;
            --cloud: #f9fafb;
            --gold: #f59e0b;
            --amber: #d97706;
            --error: #ef4444;
            --success: #10b981;
            --gray-50: #f9fafb;
            --gray-100: #f3f4f6;
            --gray-200: #e5e7eb;
            --gray-300: #d1d5db;
            --gray-400: #9ca3af;
            --gray-500: #6b7280;
            --gray-600: #4b5563;
            --gray-700: #374151;
            --gray-800: #1f2937;
            --gray-900: #111827;
        }
		
		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}
		
		html, body {
			height: 100%;
			font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
			background: linear-gradient(135deg, #667eea 0%, #764ba2 25%, #f093fb 50%, #4facfe 75%, #00f2fe 100%);
			background-size: 400% 400%;
			animation: gradientShift 15s ease infinite;
			overflow: hidden;
			-webkit-font-smoothing: antialiased;
			-moz-osx-font-smoothing: grayscale;
		}

		@keyframes gradientShift {
			0% { background-position: 0% 50%; }
			50% { background-position: 100% 50%; }
			100% { background-position: 0% 50%; }
		}
		
		/* Animated background elements */
		.bg-elements {
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			pointer-events: none;
			z-index: 0;
			overflow: hidden;
		}

		.bg-circle {
			position: absolute;
			border-radius: 50%;
			background: rgba(255, 255, 255, 0.1);
			backdrop-filter: blur(40px);
			animation: float 20s ease-in-out infinite;
		}

		.bg-circle:nth-child(1) {
			width: 300px;
			height: 300px;
			top: -100px;
			left: -100px;
			animation-delay: 0s;
		}

		.bg-circle:nth-child(2) {
			width: 200px;
			height: 200px;
			top: 60%;
			right: -50px;
			animation-delay: 5s;
		}

		.bg-circle:nth-child(3) {
			width: 150px;
			height: 150px;
			bottom: -50px;
			left: 20%;
			animation-delay: 10s;
		}

		.bg-circle:nth-child(4) {
			width: 250px;
			height: 250px;
			top: 30%;
			right: 10%;
			animation-delay: 7s;
		}
		
		@keyframes float {
			0%, 100% { 
				transform: translate(0, 0) scale(1);
				opacity: 0.3;
			}
			33% { 
				transform: translate(30px, -30px) scale(1.1);
				opacity: 0.5;
			}
			66% { 
				transform: translate(-20px, 20px) scale(0.9);
				opacity: 0.4;
			}
		}
		
		.container {
			display: flex;
			align-items: center;
			justify-content: center;
			min-height: 100vh;
			padding: 20px;
			position: relative;
			z-index: 1;
		}
		
		.login-card {
			background: rgba(255, 255, 255, 0.95);
			backdrop-filter: blur(20px) saturate(180%);
			-webkit-backdrop-filter: blur(20px) saturate(180%);
			border-radius: 32px;
			box-shadow: 
				0 20px 60px rgba(0, 0, 0, 0.15),
				0 0 0 1px rgba(255, 255, 255, 0.3),
				inset 0 1px 0 rgba(255, 255, 255, 0.6);
			max-width: 480px;
			width: 100%;
			overflow: hidden;
			position: relative;
			animation: slideUp 0.8s cubic-bezier(0.16, 1, 0.3, 1);
			transition: transform 0.3s ease, box-shadow 0.3s ease;
		}

		.login-card:hover {
			transform: translateY(-5px);
			box-shadow: 
				0 30px 80px rgba(0, 0, 0, 0.2),
				0 0 0 1px rgba(255, 255, 255, 0.3),
				inset 0 1px 0 rgba(255, 255, 255, 0.6);
		}
		
		@keyframes slideUp {
			from {
				opacity: 0;
				transform: translateY(40px) scale(0.95);
			}
			to {
				opacity: 1;
				transform: translateY(0) scale(1);
			}
		}
		
		.card-header {
			background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
			color: white;
			padding: 48px 40px;
			text-align: center;
			position: relative;
			overflow: hidden;
		}

		.card-header::before {
			content: '';
			position: absolute;
			top: -50%;
			left: -50%;
			width: 200%;
			height: 200%;
			background: radial-gradient(circle, rgba(255,255,255,0.15) 0%, transparent 70%);
			animation: shimmer 8s ease-in-out infinite;
		}

		.card-header::after {
			content: '';
			position: absolute;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			background: 
				radial-gradient(circle at 20% 50%, rgba(255,255,255,0.1) 0%, transparent 50%),
				radial-gradient(circle at 80% 80%, rgba(255,255,255,0.1) 0%, transparent 50%);
			pointer-events: none;
		}
		
		@keyframes shimmer {
			0%, 100% { transform: rotate(0deg) translate(-50%, -50%); }
			50% { transform: rotate(180deg) translate(-50%, -50%); }
		}
		
		.logo-container {
			position: relative;
			z-index: 2;
			margin-bottom: 24px;
		}

		.logo {
			width: 80px;
			height: 80px;
			background: rgba(255, 255, 255, 0.2);
			backdrop-filter: blur(10px);
			border-radius: 24px;
			margin: 0 auto;
			display: flex;
			align-items: center;
			justify-content: center;
			box-shadow: 
				0 8px 32px rgba(0, 0, 0, 0.2),
				inset 0 1px 0 rgba(255, 255, 255, 0.3);
			position: relative;
			transition: transform 0.3s ease;
		}

		.logo:hover {
			transform: scale(1.1) rotate(5deg);
		}

		.logo svg {
			width: 48px;
			height: 48px;
			filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.2));
		}
		
		.card-title {
			font-size: 32px;
			font-weight: 800;
			margin-bottom: 12px;
			letter-spacing: -0.5px;
			position: relative;
			z-index: 2;
			text-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
		}
		
		.card-subtitle {
			font-size: 15px;
			opacity: 0.95;
			font-weight: 400;
			position: relative;
			z-index: 2;
			letter-spacing: 0.2px;
		}
		
		.card-body {
			padding: 48px 40px;
			background: white;
		}
		
		.form-group {
			margin-bottom: 28px;
			position: relative;
		}

		.form-group:last-of-type {
			margin-bottom: 32px;
		}
		
		.form-label {
			display: flex;
			align-items: center;
			gap: 8px;
			margin-bottom: 10px;
			color: var(--gray-700);
			font-weight: 600;
			font-size: 14px;
			letter-spacing: 0.3px;
		}

		.form-label svg {
			width: 18px;
			height: 18px;
			color: var(--gray-500);
		}

		.input-wrapper {
			position: relative;
			display: flex;
			align-items: center;
		}

		.input-icon {
			position: absolute;
			left: 16px;
			width: 20px;
			height: 20px;
			color: var(--gray-400);
			pointer-events: none;
			transition: color 0.3s ease;
			z-index: 1;
		}

		.form-input {
			width: 100%;
			padding: 16px 16px 16px 48px;
			border: 2px solid var(--gray-200);
			border-radius: 14px;
			background: var(--gray-50);
			font-size: 15px;
			color: var(--gray-900);
			transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
			position: relative;
			font-family: inherit;
		}

		.form-input:focus {
			outline: none;
			border-color: #667eea;
			background: white;
			box-shadow: 
				0 0 0 4px rgba(102, 126, 234, 0.1),
				0 4px 12px rgba(102, 126, 234, 0.15);
			transform: translateY(-2px);
		}

		.form-input:focus + .input-icon,
		.form-input:not(:placeholder-shown) + .input-icon {
			color: #667eea;
		}

		.form-input::placeholder {
			color: var(--gray-400);
			font-weight: 400;
		}

		.password-toggle {
			position: absolute;
			right: 16px;
			background: none;
			border: none;
			cursor: pointer;
			padding: 4px;
			display: flex;
			align-items: center;
			justify-content: center;
			color: var(--gray-400);
			transition: color 0.3s ease, transform 0.2s ease;
			z-index: 2;
		}

		.password-toggle:hover {
			color: var(--gray-600);
			transform: scale(1.1);
		}

		.password-toggle:active {
			transform: scale(0.95);
		}

		.password-toggle svg {
			width: 20px;
			height: 20px;
		}

		.input-wrapper.password-input .form-input {
			padding-right: 48px;
		}
		
		.login-btn {
			width: 100%;
			padding: 18px 24px;
			border: none;
			border-radius: 14px;
			background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
			color: white;
			font-size: 16px;
			font-weight: 700;
			cursor: pointer;
			transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
			position: relative;
			overflow: hidden;
			letter-spacing: 0.5px;
			box-shadow: 
				0 4px 14px rgba(102, 126, 234, 0.4),
				0 2px 4px rgba(0, 0, 0, 0.1);
			font-family: inherit;
		}

		.login-btn::before {
			content: '';
			position: absolute;
			top: 0;
			left: -100%;
			width: 100%;
			height: 100%;
			background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
			transition: left 0.6s;
		}
		
		.login-btn:hover {
			transform: translateY(-3px);
			box-shadow: 
				0 8px 24px rgba(102, 126, 234, 0.5),
				0 4px 8px rgba(0, 0, 0, 0.15);
		}
		
		.login-btn:hover::before {
			left: 100%;
		}
		
		.login-btn:active {
			transform: translateY(-1px);
		}

		.login-btn:disabled {
			opacity: 0.7;
			cursor: not-allowed;
			transform: none;
		}

		.login-btn.loading {
			pointer-events: none;
		}

		.login-btn.loading::after {
			content: '';
			position: absolute;
			width: 20px;
			height: 20px;
			top: 50%;
			left: 50%;
			margin-left: -10px;
			margin-top: -10px;
			border: 3px solid rgba(255, 255, 255, 0.3);
			border-radius: 50%;
			border-top-color: white;
			animation: spin 0.8s linear infinite;
		}

		@keyframes spin {
			to { transform: rotate(360deg); }
		}
		
		.alert {
			background: linear-gradient(135deg, #fef2f2, #fee2e2);
			border-left: 4px solid var(--error);
			color: #991b1b;
			padding: 16px 20px;
			border-radius: 12px;
			margin-bottom: 28px;
			font-size: 14px;
			animation: shake 0.5s ease-in-out;
			display: flex;
			align-items: center;
			gap: 12px;
			font-weight: 500;
		}

		.alert svg {
			width: 20px;
			height: 20px;
			flex-shrink: 0;
		}
		
		@keyframes shake {
			0%, 100% { transform: translateX(0); }
			25% { transform: translateX(-8px); }
			75% { transform: translateX(8px); }
		}
		
		.footer {
			padding: 24px 40px;
			background: var(--gray-50);
			color: var(--gray-600);
			font-size: 13px;
			text-align: center;
			border-top: 1px solid var(--gray-200);
			line-height: 1.6;
		}

		.footer strong {
			color: var(--gray-800);
			font-weight: 600;
		}
		
		.footer a {
			color: #667eea;
			text-decoration: none;
			font-weight: 600;
			transition: color 0.3s ease;
			display: inline-flex;
			align-items: center;
			gap: 4px;
		}
		
		.footer a:hover {
			color: #764ba2;
			text-decoration: underline;
		}

		.footer a svg {
			width: 14px;
			height: 14px;
		}
		
		/* Responsive */
		@media (max-width: 640px) {
			.login-card {
				margin: 10px;
				border-radius: 24px;
				max-width: 100%;
			}
			
			.card-header, .card-body {
				padding: 32px 24px;
			}

			.footer {
				padding: 20px 24px;
			}
			
			.card-title {
				font-size: 28px;
			}

			.card-subtitle {
				font-size: 14px;
			}

			.logo {
				width: 70px;
				height: 70px;
			}

			.logo svg {
				width: 40px;
				height: 40px;
			}
		}

		@media (max-width: 480px) {
			.card-header, .card-body {
				padding: 28px 20px;
			}

			.footer {
				padding: 18px 20px;
				font-size: 12px;
			}
		}
	</style>
</head>
<body>
	<div class="bg-elements">
		<div class="bg-circle"></div>
		<div class="bg-circle"></div>
		<div class="bg-circle"></div>
		<div class="bg-circle"></div>
	</div>
	
	<div class="container">
		<div class="login-card">
			<div class="card-header">
				<div class="logo-container">
					<div class="logo">
						<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M12 2L2 7L12 12L22 7L12 2Z" fill="white" opacity="0.9"/>
							<path d="M2 17L12 22L22 17" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" opacity="0.9"/>
							<path d="M2 12L12 17L22 12" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" opacity="0.9"/>
						</svg>
					</div>
				</div>
				<h1 class="card-title">Welcome Back</h1>
				<p class="card-subtitle">Masuk ke Area Admin CVI Jatim</p>
			</div>
			
			<div class="card-body">
				<?php 
				if (isset($_SESSION['error'])): ?>
					<div class="alert">
						<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M12 8V12M12 16H12.01M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
						</svg>
						<span><?= htmlspecialchars($_SESSION['error']) ?></span>
					</div>
					<?php unset($_SESSION['error']); ?>
				<?php endif; ?>
				
				<form action="<?= base_url('auth/attempt') ?>" method="post" id="loginForm">
                    <?= csrf_field() ?>
					<div class="form-group">
						<label class="form-label" for="username">
							<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M20 21V19C20 17.9391 19.5786 16.9217 18.8284 16.1716C18.0783 15.4214 17.0609 15 16 15H8C6.93913 15 5.92172 15.4214 5.17157 16.1716C4.42143 16.9217 4 17.9391 4 19V21" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
								<path d="M12 11C14.2091 11 16 9.20914 16 7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7C8 9.20914 9.79086 11 12 11Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
							Username
						</label>
						<div class="input-wrapper">
							<input 
								class="form-input" 
								type="text" 
								id="username" 
								name="username" 
								value="<?= old('username') ?>"
								placeholder="Masukkan username Anda"
								required 
								autofocus
								autocomplete="username"
							>
							<svg class="input-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M20 21V19C20 17.9391 19.5786 16.9217 18.8284 16.1716C18.0783 15.4214 17.0609 15 16 15H8C6.93913 15 5.92172 15.4214 5.17157 16.1716C4.42143 16.9217 4 17.9391 4 19V21" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
								<path d="M12 11C14.2091 11 16 9.20914 16 7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7C8 9.20914 9.79086 11 12 11Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</div>
					</div>
					
					<div class="form-group">
						<label class="form-label" for="password">
							<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
								<path d="M12 6V12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
								<path d="M12 16H12.01" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
							Password
						</label>
						<div class="input-wrapper password-input">
							<input 
								class="form-input" 
								type="password" 
								id="password" 
								name="password" 
								placeholder="Masukkan password Anda"
								required
								autocomplete="current-password"
							>
							<svg class="input-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M1 12C1 12 5 4 12 4C19 4 23 12 23 12C23 12 19 20 12 20C5 20 1 12 1 12Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
								<path d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
							<button type="button" class="password-toggle" id="passwordToggle" aria-label="Toggle password visibility">
								<svg id="eyeIcon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="display: block;">
									<path d="M1 12C1 12 5 4 12 4C19 4 23 12 23 12C23 12 19 20 12 20C5 20 1 12 1 12Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
									<path d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
								<svg id="eyeOffIcon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="display: none;">
									<path d="M17.94 17.94C16.2306 19.243 14.1491 19.9649 12 20C5 20 1 12 1 12C2.24389 9.68192 3.96914 7.65663 6.06 6.06M9.9 4.24C10.5883 4.0789 11.2931 3.99836 12 4C19 4 23 12 23 12C22.393 13.1356 21.6691 14.2048 20.84 15.19M14.12 14.12C13.8454 14.4148 13.5141 14.6512 13.1462 14.8151C12.7782 14.9791 12.3809 15.0673 11.9781 15.0744C11.5753 15.0815 11.1748 15.0074 10.8016 14.8565C10.4284 14.7056 10.0887 14.4811 9.80385 14.1962C9.51897 13.9113 9.29439 13.5716 9.14351 13.1984C8.99262 12.8252 8.91853 12.4247 8.92563 12.0219C8.93274 11.6191 9.02091 11.2218 9.18488 10.8538C9.34884 10.4859 9.58525 10.1546 9.88 9.88M1 1L23 23" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
							</button>
						</div>
					</div>
					
					<button class="login-btn" type="submit" id="loginBtn">
						<span id="btnText">Masuk ke Dashboard</span>
					</button>
				</form>
			</div>
			
			<div class="footer">
				💡 <strong>Demo:</strong> admin / admin123 | 
				<a href="<?= base_url() ?>">
					<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M19 12H5M5 12L12 19M5 12L12 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>
					Kembali ke Website
				</a>
			</div>
		</div>
	</div>

	<script>
		// Password toggle functionality
		const passwordToggle = document.getElementById('passwordToggle');
		const passwordInput = document.getElementById('password');
		const eyeIcon = document.getElementById('eyeIcon');
		const eyeOffIcon = document.getElementById('eyeOffIcon');

		if (passwordToggle && passwordInput) {
			passwordToggle.addEventListener('click', function() {
				const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
				passwordInput.setAttribute('type', type);
				
				if (type === 'text') {
					eyeIcon.style.display = 'none';
					eyeOffIcon.style.display = 'block';
				} else {
					eyeIcon.style.display = 'block';
					eyeOffIcon.style.display = 'none';
				}
			});
		}

		// Form submission loading state
		const loginForm = document.getElementById('loginForm');
		const loginBtn = document.getElementById('loginBtn');
		const btnText = document.getElementById('btnText');

		if (loginForm && loginBtn) {
			loginForm.addEventListener('submit', function() {
				loginBtn.classList.add('loading');
				loginBtn.disabled = true;
				if (btnText) {
					btnText.style.opacity = '0';
				}
			});
		}

		// Add smooth focus animation
		const inputs = document.querySelectorAll('.form-input');
		inputs.forEach(input => {
			input.addEventListener('focus', function() {
				this.parentElement.style.transform = 'scale(1.01)';
			});
			
			input.addEventListener('blur', function() {
				this.parentElement.style.transform = 'scale(1)';
			});
		});
	</script>
</body>
</html>
