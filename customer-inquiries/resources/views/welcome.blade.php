<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Customer Inquiry System</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                min-height: 100vh;
                color: #333;
            }

            .container {
                max-width: 1200px;
                margin: 0 auto;
                padding: 0 20px;
            }

            .header {
                padding: 20px 0;
                background: rgba(255, 255, 255, 0.1);
                backdrop-filter: blur(10px);
                border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            }

            .nav {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .logo {
                font-size: 24px;
                font-weight: 700;
                color: white;
            }

            .nav-links {
                display: flex;
                gap: 20px;
            }

            .nav-link {
                color: white;
                text-decoration: none;
                padding: 10px 20px;
                border-radius: 8px;
                transition: all 0.3s ease;
                border: 1px solid rgba(255, 255, 255, 0.2);
            }

            .nav-link:hover {
                background: rgba(255, 255, 255, 0.2);
                transform: translateY(-2px);
            }

            .main-content {
                display: flex;
                align-items: center;
                min-height: calc(100vh - 100px);
                padding: 60px 0;
            }

            .content-grid {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 60px;
                align-items: center;
            }

            .hero-section h1 {
                font-size: 3.5rem;
                font-weight: 700;
                color: white;
                margin-bottom: 20px;
                line-height: 1.2;
            }

            .hero-section p {
                font-size: 1.2rem;
                color: rgba(255, 255, 255, 0.9);
                margin-bottom: 40px;
                line-height: 1.6;
            }

            .action-buttons {
                display: flex;
                gap: 20px;
                flex-wrap: wrap;
            }

            .btn {
                padding: 15px 30px;
                border-radius: 12px;
                text-decoration: none;
                font-weight: 600;
                transition: all 0.3s ease;
                display: inline-flex;
                align-items: center;
                gap: 10px;
                border: none;
                cursor: pointer;
                font-size: 16px;
            }

            .btn-primary {
                background: #ff6b6b;
                color: white;
                box-shadow: 0 8px 25px rgba(255, 107, 107, 0.3);
            }

            .btn-primary:hover {
                background: #ff5252;
                transform: translateY(-3px);
                box-shadow: 0 12px 35px rgba(255, 107, 107, 0.4);
            }

            .btn-secondary {
                background: rgba(255, 255, 255, 0.15);
                color: white;
                border: 1px solid rgba(255, 255, 255, 0.3);
            }

            .btn-secondary:hover {
                background: rgba(255, 255, 255, 0.25);
                transform: translateY(-3px);
            }

            .features-grid {
                background: white;
                border-radius: 20px;
                padding: 40px;
                box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
                backdrop-filter: blur(10px);
            }

            .features-title {
                font-size: 1.8rem;
                font-weight: 600;
                color: #333;
                margin-bottom: 30px;
                text-align: center;
            }

            .feature-item {
                display: flex;
                align-items: center;
                gap: 15px;
                padding: 20px 0;
                border-bottom: 1px solid #f0f0f0;
            }

            .feature-item:last-child {
                border-bottom: none;
            }

            .feature-icon {
                width: 50px;
                height: 50px;
                background: linear-gradient(135deg, #667eea, #764ba2);
                border-radius: 12px;
                display: flex;
                align-items: center;
                justify-content: center;
                color: white;
                font-size: 20px;
            }

            .feature-content h3 {
                font-size: 1.1rem;
                font-weight: 600;
                color: #333;
                margin-bottom: 5px;
            }

            .feature-content p {
                color: #666;
                font-size: 0.9rem;
            }

            .icon {
                width: 20px;
                height: 20px;
                fill: currentColor;
            }

            @media (max-width: 768px) {
                .content-grid {
                    grid-template-columns: 1fr;
                    gap: 40px;
                    text-align: center;
                }

                .hero-section h1 {
                    font-size: 2.5rem;
                }

                .nav-links {
                    flex-direction: column;
                    gap: 10px;
                }

                .action-buttons {
                    justify-content: center;
                }

                .features-grid {
                    padding: 30px 20px;
                }
            }

            .stats {
                display: flex;
                justify-content: space-around;
                margin: 40px 0;
                background: rgba(255, 255, 255, 0.1);
                border-radius: 15px;
                padding: 30px;
                backdrop-filter: blur(10px);
            }

            .stat-item {
                text-align: center;
                color: white;
            }

            .stat-number {
                font-size: 2rem;
                font-weight: 700;
                margin-bottom: 5px;
            }

            .stat-label {
                font-size: 0.9rem;
                opacity: 0.8;
            }
        </style>
    @endif
</head>

<body>
    <!-- Header -->
    <header class="header">
        <div class="container">
            <nav class="nav">
                <div class="logo">📞 Customer Inquiry System</div>
                @if (Route::has('login'))
                    <div class="nav-links">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="nav-link">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="nav-link">Login</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="nav-link">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <div class="content-grid">
                <!-- Hero Section -->
                <div class="hero-section">
                    <h1>Manage Customer Inquiries Effortlessly</h1>
                    <p>Streamline your customer communication with our powerful inquiry management system. Track,
                        respond, and
                        analyze customer requests with ease.</p>

                    <!-- Stats -->
                    <div class="stats">
                        <div class="stat-item">
                            <div class="stat-number">100%</div>
                            <div class="stat-label">Response Rate</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">24/7</div>
                            <div class="stat-label">Available</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">Fast</div>
                            <div class="stat-label">Setup</div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="action-buttons">
                        <a href="{{ route('inquiries.create') }}" class="btn btn-primary">
                            <svg class="icon" viewBox="0 0 20 20">
                                <path
                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            Submit New Inquiry
                        </a>
                        <a href="{{ route('inquiries.index') }}" class="btn btn-secondary">
                            <svg class="icon" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                                    clip-rule="evenodd" />
                            </svg>
                            View All Inquiries
                        </a>
                    </div>
                </div>

                <!-- Features Section -->
                <div class="features-grid">
                    <h2 class="features-title">Why Choose Our System?</h2>

                    <div class="feature-item">
                        <div class="feature-icon">✉️</div>
                        <div class="feature-content">
                            <h3>Easy Submission</h3>
                            <p>Simple and intuitive form for customers to submit inquiries</p>
                        </div>
                    </div>

                    <div class="feature-item">
                        <div class="feature-icon">⚡</div>
                        <div class="feature-content">
                            <h3>Real-time Management</h3>
                            <p>Instant notifications and real-time inquiry tracking</p>
                        </div>
                    </div>

                    <div class="feature-item">
                        <div class="feature-icon">📊</div>
                        <div class="feature-content">
                            <h3>Analytics Dashboard</h3>
                            <p>Comprehensive insights and reporting capabilities</p>
                        </div>
                    </div>

                    <div class="feature-item">
                        <div class="feature-icon">🔒</div>
                        <div class="feature-content">
                            <h3>Secure & Reliable</h3>
                            <p>Enterprise-grade security and data protection</p>
                        </div>
                    </div>

                    <div class="feature-item">
                        <div class="feature-icon">📱</div>
                        <div class="feature-content">
                            <h3>Mobile Responsive</h3>
                            <p>Works perfectly on all devices and screen sizes</p>
                        </div>
                    </div>

                    <div class="feature-item">
                        <div class="feature-icon">🚀</div>
                        <div class="feature-content">
                            <h3>Built with Laravel</h3>
                            <p>Powered by modern Laravel framework and Tailwind CSS</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
