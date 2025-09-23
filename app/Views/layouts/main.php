<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'CVI Wirotaman' ?> - Komunitas Pecinta Alam Jawa Timur</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        /* Natural Camping Theme */
        :root {
            --primary-green: #2d5016;
            --secondary-green: #4a7c59;
            --accent-green: #6b8e23;
            --light-green: #8fbc8f;
            --pale-green: #90ee90;
            --mint-green: #98fb98;
            --natural-brown: #8b4513;
            --earth-tone: #a0522d;
            --forest-green: #228b22;
            --sage-green: #9caf88;
            --olive-green: #808000;
            --dark-green: #1a3d0a;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg,rgb(240, 248, 255) 0%, #e6ffe6 50%, #f0fff0 100%);
            color: var(--primary-green);
            line-height: 1.6;
            padding-bottom: 80px; /* Space for bottom nav */
            min-height: 100vh;
        }
        
        /* Main content spacing */
        main {
            position: relative;
            z-index: 1;
        }
        
        
        /* Top Navigation - Simple */
        .navbar {
            background: linear-gradient(135deg, var(--primary-green) 0%, var(--secondary-green) 50%, var(--accent-green) 100%);
            box-shadow: 0 4px 12px rgba(45, 80, 22, 0.3);
            border-bottom: 3px solid var(--light-green);
            padding: 1rem 0;
            z-index: 1050; /* Ensure navbar stays above other content */
        }
        
        .navbar-brand {
            font-family: 'Inter', sans-serif;
            font-weight: 700;
            font-size: 1.5rem;
            color: #f5f5dc !important;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            transition: all 0.3s ease;
        }
        
        .navbar-brand:hover {
            color: #ffd700 !important;
            transform: scale(1.05);
        }
        
        /* Navbar Scroll Progress */
        .scroll-progress-container { position: absolute; bottom: 0; left: 0; width: 100%; height: 4px; background: rgba(255,255,255,0.15); }
        .scroll-progress-bar { width: 0%; height: 100%; background: linear-gradient(90deg, #ffd700, #98fb98, #6b8e23); box-shadow: 0 0 8px rgba(255,215,0,0.5); transition: width 0.1s linear; }
        
        /* Bottom Navigation */
        .bottom-nav {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(135deg, var(--primary-green) 0%, var(--secondary-green) 100%);
            box-shadow: 0 -4px 12px rgba(45, 80, 22, 0.3);
            border-top: 3px solid var(--light-green);
            z-index: 1000;
        }
        
        .bottom-nav .nav-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 1rem 0.5rem;
            color: #f5f5dc;
            text-decoration: none;
            transition: all 0.3s ease;
            border-radius: 10px;
            margin: 0.25rem;
        }
        
        .bottom-nav .nav-item:hover {
            background: linear-gradient(45deg, rgba(255, 215, 0, 0.2), rgba(144, 238, 144, 0.2));
            color: #ffd700;
            transform: translateY(-2px);
        }
        
        .bottom-nav .nav-item i {
            font-size: 1.5rem;
            margin-bottom: 0;
        }
        
        .bottom-nav .nav-item span {
            display: none;
        }
        
        /* Hero Section */
        .hero-section {
            padding: 6rem 0 2rem; /* Increased top padding to account for fixed navbar */
            background: linear-gradient(135deg, #f0f8ff 0%, #e6ffe6 50%, #f0fff0 100%);
            position: relative;
            overflow: hidden;
            margin-top: 0; /* Ensure no margin conflicts */
        }
        
        /* Hero Section with Carousel (Home page only) */
        .hero-carousel-section {
            min-height: 100vh;
            display: flex;
            align-items: center;
            background: none; /* Remove default background for carousel */
        }
        /* Keep large sizing on home hero only */
        .hero-carousel-section .hero-content { padding: 4rem 3rem; border-radius: 30px; max-width: 700px; background: linear-gradient(135deg, rgba(255,255,255,0.90) 0%, rgba(248,255,248,0.82) 50%, rgba(255,255,255,0.88) 100%); }
        .hero-carousel-section .hero-title { font-size: 2.8rem; }
        .hero-carousel-section .hero-subtitle { font-size: 1.4rem; }
        
        /* Hero Carousel */
        .hero-carousel {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }
        
        .carousel-slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }
        
        .carousel-slide.active {
            opacity: 1;
        }
        
        .carousel-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(0, 0, 0, 0.5) 0%, rgba(45, 80, 22, 0.6) 50%, rgba(0, 0, 0, 0.4) 100%);
        }
        
        /* Floating Particles */
        .floating-particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 2;
            pointer-events: none;
        }
        
        .particle {
            position: absolute;
            background: rgba(107, 142, 35, 0.3);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }
        
        .particle:nth-child(1) {
            width: 8px;
            height: 8px;
            top: 20%;
            left: 10%;
            animation-delay: 0s;
            animation-duration: 8s;
        }
        
        .particle:nth-child(2) {
            width: 12px;
            height: 12px;
            top: 60%;
            left: 80%;
            animation-delay: 2s;
            animation-duration: 10s;
        }
        
        .particle:nth-child(3) {
            width: 6px;
            height: 6px;
            top: 80%;
            left: 20%;
            animation-delay: 4s;
            animation-duration: 7s;
        }
        
        .particle:nth-child(4) {
            width: 10px;
            height: 10px;
            top: 30%;
            left: 70%;
            animation-delay: 1s;
            animation-duration: 9s;
        }
        
        .particle:nth-child(5) {
            width: 14px;
            height: 14px;
            top: 70%;
            left: 50%;
            animation-delay: 3s;
            animation-duration: 11s;
        }
        
        @keyframes float {
            0%, 100% {
                transform: translateY(0px) rotate(0deg);
                opacity: 0.3;
            }
            50% {
                transform: translateY(-20px) rotate(180deg);
                opacity: 0.8;
            }
        }
        
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="20" cy="20" r="2" fill="%23a9d3a9" opacity="0.3"/><circle cx="80" cy="30" r="1.5" fill="%2398fb98" opacity="0.4"/><circle cx="60" cy="70" r="1" fill="%238fbc8f" opacity="0.3"/><circle cx="30" cy="80" r="2.5" fill="%2390ee90" opacity="0.2"/></svg>');
            background-size: 200px 200px;
            z-index: 1;
        }
        
        .hero-content {
            position: relative;
            z-index: 3;
            background: linear-gradient(135deg, 
                rgba(255, 255, 255, 0.92) 0%, 
                rgba(248, 255, 248, 0.85) 50%, 
                rgba(255, 255, 255, 0.90) 100%);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            padding: 2.5rem 2rem; /* compact default for inner pages */
            box-shadow: 
                0 20px 40px rgba(0, 0, 0, 0.12),
                0 0 0 1px rgba(255, 255, 255, 0.3),
                inset 0 1px 0 rgba(255, 255, 255, 0.4);
            border: 2px solid rgba(107, 142, 35, 0.2);
            max-width: 680px;
            margin: 0 auto;
            transform: translateY(0);
            transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
            animation: heroContentFloat 6s ease-in-out infinite;
        }
        
        .hero-content:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 
                0 35px 70px rgba(0, 0, 0, 0.2),
                0 0 0 1px rgba(255, 255, 255, 0.4),
                inset 0 1px 0 rgba(255, 255, 255, 0.5);
        }
        
        @keyframes heroContentFloat {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-5px); }
        }
        
        /* Carousel Dots */
        .carousel-dots {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 3;
            display: flex;
            gap: 10px;
        }
        
        .dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.5);
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .dot.active {
            background: var(--accent-green);
            transform: scale(1.2);
        }
        
        .dot:hover {
            background: rgba(255, 255, 255, 0.8);
        }
        
        .hero-logo {
            animation: logoGlow 3s ease-in-out infinite alternate;
            filter: drop-shadow(0 0 20px rgba(107, 142, 35, 0.4));
            transition: all 0.3s ease;
        }
        
        .hero-logo:hover {
            transform: scale(1.1) rotate(5deg);
            filter: drop-shadow(0 0 30px rgba(107, 142, 35, 0.6));
        }
        
        @keyframes logoGlow {
            0% { filter: drop-shadow(0 0 20px rgba(107, 142, 35, 0.4)); }
            100% { filter: drop-shadow(0 0 30px rgba(107, 142, 35, 0.6)); }
        }
        
        .hero-title {
            color: var(--primary-green);
            font-family: 'Inter', sans-serif;
            font-size: 2.2rem; /* compact default */
            font-weight: 800;
            text-shadow: 
                2px 2px 8px rgba(0,0,0,0.3),
                0 0 20px rgba(107, 142, 35, 0.2);
            margin-bottom: 1rem;
            text-align: center;
            position: relative;
            animation: titleSlideIn 1s ease-out;
            background: linear-gradient(45deg, var(--primary-green), var(--accent-green));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .hero-subtitle {
            color: var(--secondary-green);
            font-size: 1.2rem; /* compact default */
            font-weight: 600;
            margin-bottom: 2rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            text-shadow: 1px 1px 4px rgba(0,0,0,0.2);
            animation: subtitleFadeIn 1.5s ease-out 0.3s both;
            position: relative;
        }
        
        .hero-subtitle::before {
            content: '';
            position: absolute;
            left: 50%;
            bottom: -10px;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, var(--accent-green), var(--light-green));
            border-radius: 2px;
            animation: underlineExpand 2s ease-out 1s both;
        }
        
        @keyframes titleSlideIn {
            0% { 
                opacity: 0; 
                transform: translateY(-30px); 
            }
            100% { 
                opacity: 1; 
                transform: translateY(0); 
            }
        }
        
        @keyframes subtitleFadeIn {
            0% { 
                opacity: 0; 
                transform: translateY(20px); 
            }
            100% { 
                opacity: 1; 
                transform: translateY(0); 
            }
        }
        
        @keyframes underlineExpand {
            0% { width: 0; }
            100% { width: 60px; }
        }
        
        /* Cards */
        .card {
            border: 2px solid var(--light-green);
            border-radius: 1.5rem;
            box-shadow: 0 8px 16px rgba(45, 80, 22, 0.2);
            transition: all 0.3s ease;
            background: linear-gradient(135deg, rgba(255,255,255,0.9) 0%, rgba(248,255,248,0.85) 100%);
            backdrop-filter: blur(6px);
            overflow: hidden;
            position: relative;
        }
        
        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--light-green), var(--pale-green), var(--mint-green), var(--light-green));
        }
        
        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 16px 32px rgba(45, 80, 22, 0.3);
            border-color: var(--accent-green);
        }
        
        .card-title {
            color: var(--primary-green);
            font-weight: 600;
            margin-bottom: 1rem;
        }
        
        .card-text {
            color: var(--secondary-green);
            line-height: 1.6;
        }
        
        /* Buttons */
        .btn {
            border-radius: 25px;
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            transition: all 0.3s ease;
            border: 2px solid;
            position: relative;
            overflow: hidden;
        }
        
        /* Hero Section Buttons */
        .hero-section .btn {
            min-width: 220px;
            height: 60px;
            box-shadow: 
                0 10px 25px rgba(0, 0, 0, 0.2),
                0 0 0 1px rgba(255, 255, 255, 0.1);
            transform: translateY(0);
            border: 2px solid;
            font-weight: 700;
            font-size: 1.1rem;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
            border-radius: 50px;
            position: relative;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            animation: buttonSlideIn 1s ease-out 0.8s both;
        }
        
        .hero-section .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.6s ease;
        }
        
        .hero-section .btn:hover::before {
            left: 100%;
        }
        
        .hero-section .btn:hover {
            transform: translateY(-5px) scale(1.05);
            box-shadow: 
                0 15px 35px rgba(0, 0, 0, 0.3),
                0 0 0 1px rgba(255, 255, 255, 0.2);
        }
        
        .hero-section .btn:active {
            transform: translateY(-2px) scale(1.02);
        }
        
        .hero-section .btn-primary {
            background: linear-gradient(135deg, 
                var(--accent-green) 0%, 
                var(--light-green) 50%, 
                var(--pale-green) 100%);
            color: white;
            border-color: var(--accent-green);
            position: relative;
        }
        
        .hero-section .btn-primary::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, 
                rgba(255, 255, 255, 0.2) 0%, 
                transparent 50%, 
                rgba(255, 255, 255, 0.1) 100%);
            border-radius: 50px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .hero-section .btn-primary:hover::after {
            opacity: 1;
        }
        
        .hero-section .btn-primary:hover {
            background: linear-gradient(135deg, 
                var(--light-green) 0%, 
                var(--pale-green) 50%, 
                var(--accent-green) 100%);
            color: white;
        }
        
        .hero-section .btn-outline-primary {
            background: rgba(255, 255, 255, 0.95);
            color: var(--primary-green);
            border-color: var(--accent-green);
            backdrop-filter: blur(10px);
        }
        
        .hero-section .btn-outline-primary:hover {
            background: linear-gradient(135deg, 
                var(--accent-green) 0%, 
                var(--light-green) 100%);
            color: white;
            border-color: var(--accent-green);
        }
        
        @keyframes buttonSlideIn {
            0% { 
                opacity: 0; 
                transform: translateY(30px); 
            }
            100% { 
                opacity: 1; 
                transform: translateY(0); 
            }
        }
        
        /* Quick Stats Section */
        .quick-stats-section {
            background: linear-gradient(135deg, #f8fff8 0%, #e6ffe6 100%);
            position: relative;
            overflow: hidden;
        }
        
        .quick-stats-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="20" cy="20" r="1" fill="%23a9d3a9" opacity="0.2"/><circle cx="80" cy="30" r="1.5" fill="%2398fb98" opacity="0.3"/><circle cx="60" cy="70" r="0.8" fill="%238fbc8f" opacity="0.2"/></svg>');
            background-size: 150px 150px;
            z-index: 1;
        }
        
        .stat-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 2rem 1.5rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(107, 142, 35, 0.1);
            transition: all 0.3s ease;
            position: relative;
            z-index: 2;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--primary-green);
            margin: 0;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        }
        
        .stat-label {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--secondary-green);
            margin: 0;
        }
        
        /* Highlights Section */
        .highlights-section {
            background: linear-gradient(135deg, #ffffff 0%, #f8fff8 100%);
            position: relative;
        }
        
        .badge-circle {
            width: 42px; height: 42px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center;
            background: linear-gradient(135deg, var(--accent-green), var(--light-green)); color: #fff; box-shadow: 0 6px 16px rgba(45,80,22,.25);
        }

        .highlights-title {
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--primary-green);
            margin-bottom: 1.5rem;
        }
        
        .highlights-description {
            font-size: 1.1rem;
            color: var(--secondary-green);
            line-height: 1.8;
            margin-bottom: 2rem;
        }
        
        .feature-item { display:flex; align-items:center; gap:.6rem; padding:.75rem 1rem; border:1px solid rgba(107,142,35,.15); border-radius:12px; background: rgba(255,255,255,.85); box-shadow: 0 6px 14px rgba(0,0,0,.06); }
        .feature-item i { color: var(--accent-green); }
        
        .card-frame { padding: .75rem; border-radius: 1.25rem; background: linear-gradient(135deg, rgba(107,142,35,.15), rgba(144,238,144,.15)); box-shadow: 0 12px 30px rgba(45,80,22,.15); }
        .object-cover { object-fit: cover; }
        .parallax-lite { transform: translateZ(0); transition: transform .6s ease; }
        .card-frame:hover .parallax-lite { transform: scale(1.03); }
        
        /* Testimonials Section */
        .testimonials-section {
            background: linear-gradient(135deg, #f0f8ff 0%, #e6ffe6 100%);
            position: relative;
        }
        
        .testimonial-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(107, 142, 35, 0.1);
            transition: all 0.3s ease;
            height: 100%;
        }
        
        .testimonial-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }
        
        .testimonial-text {
            font-size: 1.1rem;
            color: var(--secondary-green);
            line-height: 1.7;
            font-style: italic;
            margin-bottom: 1.5rem;
        }
        
        .author-name {
            font-weight: 700;
            color: var(--primary-green);
            margin: 0;
        }
        
        .author-title {
            font-size: 0.9rem;
            color: var(--secondary-green);
            margin: 0;
        }
        
        /* CTA Section */
        .cta-section {
            background: linear-gradient(135deg, var(--accent-green) 0%, var(--light-green) 100%);
            position: relative;
            overflow: hidden;
        }
        
        .cta-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="20" cy="20" r="2" fill="rgba(255,255,255,0.1)"/><circle cx="80" cy="30" r="1.5" fill="rgba(255,255,255,0.15)"/><circle cx="60" cy="70" r="1" fill="rgba(255,255,255,0.1)"/></svg>');
            background-size: 200px 200px;
            z-index: 1;
        }
        
        .cta-content {
            position: relative;
            z-index: 2;
        }
        
        .cta-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: white;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        
        .cta-description {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 2rem;
        }
        
        .cta-buttons .btn {
            min-width: 200px;
            height: 50px;
            font-weight: 600;
            border-radius: 25px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            display: inline-flex; align-items: center; justify-content: center;
        }
        
        .cta-buttons .btn-primary {
            background: white;
            color: var(--accent-green);
            border: 2px solid white;
        }
        
        .cta-buttons .btn-primary:hover {
            background: transparent;
            color: white;
            border-color: white;
        }
        
        .cta-buttons .btn-outline-primary {
            background: transparent;
            color: white;
            border: 2px solid white;
        }
        
        .cta-buttons .btn-outline-primary:hover {
            background: white;
            color: var(--accent-green);
        }
        
        .btn-primary {
            background: linear-gradient(45deg, var(--accent-green), var(--light-green), var(--pale-green));
            color: var(--primary-green);
            border-color: var(--secondary-green);
            text-shadow: 1px 1px 2px rgba(255,255,255,0.5);
        }
        
        .btn-primary:hover {
            background: linear-gradient(45deg, var(--light-green), var(--pale-green), var(--mint-green));
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(45, 80, 22, 0.3);
            color: var(--primary-green);
        }
        
        .btn-outline-primary {
            color: var(--primary-green);
            border: 2px solid var(--accent-green);
            background: transparent;
        }
        
        .btn-outline-primary:hover {
            background: linear-gradient(45deg, var(--accent-green), var(--light-green));
            color: white;
            transform: translateY(-2px);
        }

        /* ========== Scroll-in Animations (Global) ========== */
        [data-animate] { opacity: 0; transform: translateY(16px); transition: opacity .6s ease, transform .6s ease; }
        [data-animate].in-view { opacity: 1; transform: none; }
        [data-animate="fade-up"] { transform: translateY(18px); }
        [data-animate="fade-right"] { transform: translateX(-24px); }
        [data-animate="fade-left"] { transform: translateX(24px); }
        [data-animate="zoom-in"] { transform: scale(.95); }
        [data-animate="zoom-in"].in-view { transform: scale(1); }
        
        /* Card Button Styling */
        .card .btn-sm {
            min-width: 70px;
            padding: 0.4rem 0.8rem;
            font-size: 0.85rem;
            white-space: nowrap;
            border-radius: 20px;
        }
        
        .card .btn-outline-secondary {
            color: var(--primary-green);
            border-color: var(--accent-green);
            background: transparent;
        }
        
        .card .btn-outline-secondary:hover {
            background: var(--accent-green);
            color: white;
            border-color: var(--accent-green);
        }
        
        .card .btn-outline-primary {
            color: var(--primary-green);
            border-color: var(--accent-green);
            background: transparent;
        }
        
        .card .btn-outline-primary:hover {
            background: var(--accent-green);
            color: white;
            border-color: var(--accent-green);
        }
        
        /* Badges */
        .badge {
            border-radius: 20px;
            font-weight: 600;
            padding: 0.5rem 1rem;
            border: 2px solid;
        }
        
        .badge.bg-success {
            background: linear-gradient(45deg, #228b22, #32cd32, #90ee90);
            color: white;
            border-color: #006400;
        }
        
        .badge.bg-warning {
            background: linear-gradient(45deg, #ffd700, #ffed4e, #fff8dc);
            color: var(--primary-green);
            border-color: #daa520;
        }
        
        .badge.bg-secondary {
            background: linear-gradient(45deg, var(--natural-brown), var(--earth-tone));
            color: white;
            border-color: #654321;
        }
        
        /* Typography */
        h1, h2, h3, h4, h5, h6 {
            color: var(--primary-green);
            font-weight: 600;
            margin-bottom: 1rem;
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 3rem;
        }
        
        .section-title h2 {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-green);
            margin-bottom: 1rem;
        }
        
        .section-title p {
            color: var(--secondary-green);
            font-size: 1.1rem;
            max-width: 600px;
            margin: 0 auto;
        }
        
        /* Responsive Design */
        @media (max-width: 576px) {
            /* Navbar */
            .navbar { padding: .6rem 0; }
            .navbar-brand { font-size: 1.1rem; }

            /* Hero Home */
            .hero-carousel-section { min-height: 86vh; }
            .hero-carousel-section .hero-content { padding: 2rem 1.25rem; border-radius: 18px; max-width: 92%; }
            .hero-carousel-section .hero-title { font-size: 1.8rem; }
            .hero-carousel-section .hero-subtitle { font-size: 1rem; }

            /* Generic Hero */
            .hero-section { padding: 4.25rem 0 1.5rem; }
            .hero-content { padding: 1.5rem 1.25rem; }
            .hero-title { font-size: 1.6rem; }
            .hero-subtitle { font-size: .95rem; }

            /* Buttons */
            .hero-section .btn { min-width: 150px; height: auto; padding: .8rem 1.1rem; font-size: .95rem; }
            .hero-section .btn + .btn { margin-top: .6rem; }

            /* CTA buttons become stacked and full-width */
            .cta-buttons { display: flex; flex-direction: column; align-items: stretch; gap: .75rem; }
            .cta-buttons .btn { width: 100%; height: auto; padding: .9rem 1rem; font-size: 1rem; justify-content: center; }

            /* Dots */
            .carousel-dots { bottom: 16px; }
            .dot { width: 9px; height: 9px; }

            /* Highlights */
            .highlights-title { font-size: 1.5rem; }
            .feature-item { padding: .6rem .8rem; }
        }

        @media (min-width: 577px) and (max-width: 768px) {
            .hero-section {
                padding: 5rem 0 2rem; /* Slightly less padding on mobile */
            }
            
            .hero-carousel-section {
                min-height: 80vh;
            }
            
            .hero-content {
                padding: 2rem 1.5rem;
                margin: 1rem;
                max-width: 90%;
            }
            
            .hero-title {
                font-size: 2.2rem;
            }
            
            .hero-subtitle {
                font-size: 1.2rem;
            }
            
            .hero-section .btn {
                min-width: 180px;
                height: 50px;
                font-size: 1rem;
            }
            
            .stat-card {
                padding: 1.5rem 1rem;
            }
            
            .stat-number {
                font-size: 2rem;
            }
            
            .highlights-title {
                font-size: 1.8rem;
            }
            
            .highlights-description {
                font-size: 1rem;
            }
            
            .cta-title {
                font-size: 2rem;
            }
            
            .cta-description {
                font-size: 1.1rem;
            }
            
            .cta-buttons .btn {
                min-width: 160px;
                height: 45px;
                font-size: 0.95rem;
            }
            
            .carousel-dots {
                bottom: 20px;
            }
            
            .dot {
                width: 10px;
                height: 10px;
            }
            
            .hero-title {
                font-size: 2rem;
            }
            
            .hero-subtitle {
                font-size: 1rem;
            }
            
            .section-title h2 {
                font-size: 2rem;
            }
            
            /* Mobile button adjustments */
            .hero-section .btn {
                min-width: 180px;
                font-size: 0.9rem;
                padding: 0.6rem 1.2rem;
            }
            
            .hero-section .row.g-3 {
                gap: 1rem !important;
            }
            
            .bottom-nav .nav-item {
                padding: 0.75rem 0.25rem;
            }
            
            .bottom-nav .nav-item i {
                font-size: 1.3rem;
            }
            
            .bottom-nav .nav-item span {
                display: none;
            }
            
            /* Mobile card button adjustments */
            .card .btn-sm {
                min-width: 60px;
                padding: 0.3rem 0.6rem;
                font-size: 0.8rem;
            }
        }
        
        /* Loading */
        .loading {
            display: none;
            text-align: center;
            padding: 2rem;
        }
        
        .spinner-border {
            color: var(--accent-green);
        }
        
        /* Footer */
        .footer {
            background: linear-gradient(135deg, var(--primary-green) 0%, var(--secondary-green) 100%);
            color: #f5f5dc;
            padding: 3rem 0 2rem;
            margin-top: 4rem;
        }
        
        .footer h5 {
            color: #ffd700;
            font-weight: 600;
            margin-bottom: 1rem;
        }
        
        .footer a {
            color: #f5f5dc;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .footer a:hover {
            color: #ffd700;
        }
    </style>
</head>
<body>
    <!-- Top Navigation - Simple Logo Only -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container position-relative">
            <a class="navbar-brand" href="<?= base_url() ?>">
                <i class="fas fa-mountain me-2" style="color: var(--accent-green);"></i>CVI WIROTAMAN
            </a>
            <div class="scroll-progress-container">
                <div class="scroll-progress-bar" id="scrollProgressBar"></div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        <?php
        // Check if this is home page
        $isHomePage = (isset($_GET['page']) && $_GET['page'] === '') || (!isset($_GET['page']) && $_SERVER['REQUEST_URI'] === '/');
        
        if ($isHomePage) {
            // Home page - include its own hero section
            if (isset($content)) {
                echo $content;
            }
        } else {
            // Other pages - no header, just content
            if (isset($content)) {
                echo $content;
            }
        }
        ?>
    </main>

    <!-- Bottom Navigation -->
    <nav class="bottom-nav">
        <div class="container">
            <div class="row g-0">
                <div class="col-2">
                    <a href="<?= base_url() ?>" class="nav-item">
                        <i class="fas fa-home"></i>
                        <span>Home</span>
                    </a>
                </div>
                <div class="col-2">
                    <a href="<?= base_url('event') ?>" class="nav-item">
                        <i class="fas fa-calendar-alt"></i>
                        <span>Event</span>
                    </a>
                </div>
                <div class="col-2">
                    <a href="<?= base_url('merchandise') ?>" class="nav-item">
                        <i class="fas fa-shopping-bag"></i>
                        <span>Merchandise</span>
                    </a>
                </div>
                <div class="col-2">
                    <a href="<?= base_url('campground') ?>" class="nav-item">
                        <i class="fas fa-campground"></i>
                        <span>Campground</span>
                    </a>
                </div>
                <div class="col-2">
                    <a href="<?= base_url('gallery') ?>" class="nav-item">
                        <i class="fas fa-images"></i>
                        <span>Gallery</span>
                    </a>
                </div>
                <div class="col-2">
                    <a href="<?= base_url('contact') ?>" class="nav-item">
                        <i class="fas fa-envelope"></i>
                        <span>Contact</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5><i class="fas fa-mountain me-2"></i>CVI Wirotaman</h5>
                    <p>Komunitas Pecinta Alam Jawa Timur yang berdedikasi untuk melestarikan alam dan mengembangkan kegiatan outdoor.</p>
                </div>
                <div class="col-md-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="<?= base_url() ?>">Home</a></li>
                        <li><a href="<?= base_url('event') ?>">Events</a></li>
                        <li><a href="<?= base_url('campground') ?>">Campground</a></li>
                        <li><a href="<?= base_url('gallery') ?>">Gallery</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Contact Info</h5>
                    <p><i class="fas fa-envelope me-2"></i>info@cviwirotaman.com</p>
                    <p><i class="fas fa-phone me-2"></i>+62 812-3456-7890</p>
                    <p><i class="fas fa-map-marker-alt me-2"></i>Jawa Timur, Indonesia</p>
                </div>
            </div>
            <hr class="my-4" style="border-color: var(--light-green);">
            <div class="text-center">
                <p>&copy; 2024 CVI Wirotaman. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script>
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
        
        // Add loading state to forms
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', function() {
                const submitBtn = this.querySelector('button[type="submit"]');
                if (submitBtn) {
                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Loading...';
                    submitBtn.disabled = true;
                }
            });
        });
        
        // Active state for bottom navigation
        document.addEventListener('DOMContentLoaded', function() {
            const currentPath = window.location.pathname;
            const navItems = document.querySelectorAll('.bottom-nav .nav-item');
            
            navItems.forEach(item => {
                const href = item.getAttribute('href');
                if (currentPath === href || (currentPath === '/' && href === '<?= base_url() ?>')) {
                    item.style.background = 'linear-gradient(45deg, rgba(255, 215, 0, 0.3), rgba(144, 238, 144, 0.3))';
                    item.style.color = '#ffd700';
                }
            });
            
            // Scroll progress bar
            const progressBar = document.getElementById('scrollProgressBar');
            const updateProgress = () => {
                const scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
                const scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
                const scrolled = scrollHeight > 0 ? (scrollTop / scrollHeight) * 100 : 0;
                if (progressBar) progressBar.style.width = scrolled + '%';
            };
            updateProgress();
            window.addEventListener('scroll', updateProgress, { passive: true });
        });

        // Intersection Observer to add 'in-view' class for [data-animate]
        (function(){
            const animated = document.querySelectorAll('[data-animate]');
            if (!('IntersectionObserver' in window) || animated.length === 0) {
                animated.forEach(el => el.classList.add('in-view'));
                return;
            }
            const io = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('in-view');
                        io.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.15, rootMargin: '0px 0px -10% 0px' });
            animated.forEach(el => io.observe(el));
        })();
    </script>
</body>
</html>



