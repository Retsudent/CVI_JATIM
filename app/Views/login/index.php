<!doctype html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login - CVI Jatim</title>
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
		
		/* Animated background elements */
		.bg-elements {
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			pointer-events: none;
			z-index: 0;
		}
		
		.leaf {
			position: absolute;
			width: 20px;
			height: 20px;
			background: var(--light-green);
			border-radius: 50% 0;
			animation: float 6s ease-in-out infinite;
		}
		
		.leaf:nth-child(1) { top: 20%; left: 10%; animation-delay: 0s; }
		.leaf:nth-child(2) { top: 60%; left: 80%; animation-delay: 2s; }
		.leaf:nth-child(3) { top: 80%; left: 20%; animation-delay: 4s; }
		.leaf:nth-child(4) { top: 30%; left: 70%; animation-delay: 1s; }
		.leaf:nth-child(5) { top: 70%; left: 60%; animation-delay: 3s; }
		
		@keyframes float {
			0%, 100% { transform: translateY(0px) rotate(0deg); opacity: 0.7; }
			50% { transform: translateY(-20px) rotate(180deg); opacity: 1; }
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
			backdrop-filter: blur(20px);
			border-radius: 24px;
			box-shadow: 
				0 20px 40px rgba(0, 0, 0, 0.1),
				0 0 0 1px rgba(255, 255, 255, 0.2);
			max-width: 450px;
			width: 100%;
			overflow: hidden;
			position: relative;
			animation: slideUp 0.8s ease-out;
		}
		
		@keyframes slideUp {
			from {
				opacity: 0;
				transform: translateY(30px);
			}
			to {
				opacity: 1;
				transform: translateY(0);
			}
		}
		
		.card-header {
			background: linear-gradient(135deg, var(--primary-green) 0%, var(--forest) 50%, var(--dark-green) 100%);
			color: white;
			padding: 40px 30px;
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
			background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
			animation: shimmer 3s ease-in-out infinite;
		}
		
		@keyframes shimmer {
			0%, 100% { transform: rotate(0deg); }
			50% { transform: rotate(180deg); }
		}
		
		.logo {
			width: 60px;
			height: 60px;
			background: linear-gradient(45deg, var(--gold), var(--amber));
			border-radius: 50%;
			margin: 0 auto 20px;
			display: flex;
			align-items: center;
			justify-content: center;
			font-size: 24px;
			box-shadow: 0 8px 16px rgba(0,0,0,0.2);
			position: relative;
			z-index: 2;
		}
		
		.card-title {
			font-size: 28px;
			font-weight: 700;
			margin-bottom: 8px;
			letter-spacing: 0.5px;
			position: relative;
			z-index: 2;
		}
		
		.card-subtitle {
			font-size: 14px;
			opacity: 0.9;
			font-weight: 300;
			position: relative;
			z-index: 2;
		}
		
		.card-body {
			padding: 40px 30px;
		}
		
		.form-group {
			margin-bottom: 24px;
			position: relative;
		}
		
		.form-label {
			display: block;
			margin-bottom: 8px;
			color: var(--earth);
			font-weight: 600;
			font-size: 14px;
			text-transform: uppercase;
			letter-spacing: 0.5px;
		}
		
		.form-input {
			width: 100%;
			padding: 16px 20px;
			border: 2px solid #e0e0e0;
			border-radius: 12px;
			background: #fafafa;
			font-size: 16px;
			transition: all 0.3s ease;
			position: relative;
		}
		
		.form-input:focus {
			outline: none;
			border-color: var(--light-green);
			background: white;
			box-shadow: 0 0 0 3px rgba(102, 187, 106, 0.1);
			transform: translateY(-2px);
		}
		
		.form-input::placeholder {
			color: #999;
			font-style: italic;
		}
		
		.login-btn {
			width: 100%;
			padding: 16px 24px;
			border: none;
			border-radius: 12px;
			background: linear-gradient(135deg, var(--primary-green) 0%, var(--forest) 100%);
			color: white;
			font-size: 16px;
			font-weight: 700;
			cursor: pointer;
			transition: all 0.3s ease;
			position: relative;
			overflow: hidden;
			text-transform: uppercase;
			letter-spacing: 1px;
		}
		
		.login-btn::before {
			content: '';
			position: absolute;
			top: 0;
			left: -100%;
			width: 100%;
			height: 100%;
			background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
			transition: left 0.5s;
		}
		
		.login-btn:hover {
			transform: translateY(-2px);
			box-shadow: 0 8px 25px rgba(46, 125, 50, 0.3);
		}
		
		.login-btn:hover::before {
			left: 100%;
		}
		
		.login-btn:active {
			transform: translateY(0);
		}
		
		.alert {
			background: linear-gradient(135deg, #ffebee, #ffcdd2);
			border-left: 4px solid #f44336;
			color: #c62828;
			padding: 16px 20px;
			border-radius: 12px;
			margin-bottom: 24px;
			font-size: 14px;
			animation: shake 0.5s ease-in-out;
		}
		
		@keyframes shake {
			0%, 100% { transform: translateX(0); }
			25% { transform: translateX(-5px); }
			75% { transform: translateX(5px); }
		}
		
		.footer {
			padding: 20px 30px;
			background: var(--cloud);
			color: var(--earth);
			font-size: 12px;
			text-align: center;
			border-top: 1px solid rgba(0,0,0,0.05);
		}
		
		.footer a {
			color: var(--primary-green);
			text-decoration: none;
			font-weight: 600;
		}
		
		.footer a:hover {
			text-decoration: underline;
		}
		
		/* Responsive */
		@media (max-width: 480px) {
			.login-card {
				margin: 10px;
				border-radius: 20px;
			}
			
			.card-header, .card-body {
				padding: 30px 20px;
			}
			
			.card-title {
				font-size: 24px;
			}
		}
	</style>
</head>
<body>
	<div class="bg-elements">
		<div class="leaf"></div>
		<div class="leaf"></div>
		<div class="leaf"></div>
		<div class="leaf"></div>
		<div class="leaf"></div>
	</div>
	
	<div class="container">
		<div class="login-card">
			<div class="card-header">
				<div class="logo">🌿</div>
				<h1 class="card-title">Welcome Back</h1>
				<p class="card-subtitle">Masuk ke Area Admin CVI Jatim</p>
			</div>
			
			<div class="card-body">
				<?php 
				if (isset($_SESSION['error'])): ?>
					<div class="alert"><?= htmlspecialchars($_SESSION['error']) ?></div>
					<?php unset($_SESSION['error']); ?>
				<?php endif; ?>
				
				<form action="http://localhost:8080/login" method="post">
					<div class="form-group">
						<label class="form-label" for="username">Username</label>
						<input 
							class="form-input" 
							type="text" 
							id="username" 
							name="username" 
							placeholder="Masukkan username Anda"
							required 
							autofocus
						>
					</div>
					
					<div class="form-group">
						<label class="form-label" for="password">Password</label>
						<input 
							class="form-input" 
							type="password" 
							id="password" 
							name="password" 
							placeholder="Masukkan password Anda"
							required
						>
					</div>
					
					<button class="login-btn" type="submit">
						Masuk ke Dashboard
					</button>
				</form>
			</div>
			
			<div class="footer">
				💡 <strong>Demo:</strong> admin / admin123 | 
				<a href="http://localhost:8080/">← Kembali ke Website</a>
			</div>
		</div>
	</div>
</body>
</html>


