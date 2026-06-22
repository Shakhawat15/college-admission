<!DOCTYPE html>
<html lang="en" class="light-style layout-wide customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('/') }}public/backend/assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>SEMS DEMO SCHOOL - Login</title>
    <meta name="description" content="SEMS DEMO SCHOOL - Online Admission System" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('/') }}public/backend/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('/') }}public/backend/assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}public/backend/assets/vendor/css/core.css"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('/') }}public/backend/assets/vendor/css/theme-default.css"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('/') }}public/backend/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet"
        href="{{ asset('/') }}public/backend/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}public/backend/assets/vendor/css/pages/page-auth.css" />

    <!-- Helpers -->
    <script src="{{ asset('/') }}public/backend/assets/vendor/js/helpers.js"></script>
    <script src="{{ asset('/') }}public/backend/assets/js/config.js"></script>

    <style>
        /* ============================================
           MODERN LOGIN PAGE DESIGN
           ============================================ */

        /* ----- ROOT VARIABLES ----- */
        :root {
            --primary: #4f46e5;
            --primary-dark: #4338ca;
            --primary-light: #818cf8;
            --primary-gradient: linear-gradient(135deg, #4f46e5 0%, #7c3aed 50%, #a855f7 100%);
            --secondary: #0f172a;
            --gray: #64748b;
            --gray-light: #e2e8f0;
            --gray-lighter: #f1f5f9;
            --white: #ffffff;
            --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.06);
            --shadow-md: 0 4px 20px rgba(0, 0, 0, 0.08);
            --shadow-lg: 0 10px 40px rgba(0, 0, 0, 0.12);
            --shadow-xl: 0 20px 60px rgba(0, 0, 0, 0.15);
            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 16px;
            --radius-xl: 20px;
            --radius-full: 9999px;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* ----- BODY ----- */
        body {
            font-family: 'Inter', 'Plus Jakarta Sans', sans-serif;
            background: var(--gray-lighter);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%234f46e5" fill-opacity="0.03"%3E%3Cpath d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');
        }

        /* ----- AUTHENTICATION WRAPPER ----- */
        .authentication-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 2rem;
        }

        .authentication-inner {
            width: 100%;
            max-width: 440px;
        }

        /* ----- LOGIN CARD ----- */
        .card {
            border: none !important;
            border-radius: var(--radius-xl) !important;
            box-shadow: var(--shadow-xl) !important;
            overflow: hidden;
            background: var(--white) !important;
            transition: var(--transition);
        }

        .card:hover {
            box-shadow: 0 30px 80px rgba(0, 0, 0, 0.15) !important;
        }

        .card-body {
            padding: 2.5rem 2.2rem 2.8rem !important;
        }

        /* ----- BRAND / LOGO ----- */
        .app-brand {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .app-brand-link {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-decoration: none;
        }

        .app-brand-logo {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 90px;
            height: 90px;
            background: var(--primary-gradient);
            border-radius: 50%;
            box-shadow: 0 10px 30px rgba(79, 70, 229, 0.3);
            transition: var(--transition);
            padding: 8px;
        }

        .app-brand-logo:hover {
            transform: scale(1.05);
            box-shadow: 0 15px 40px rgba(79, 70, 229, 0.4);
        }

        .app-brand-logo img {
            width: 100%;
            height: auto;
            border-radius: 50%;
            background: #fff;
            padding: 4px;
        }

        .brand-name {
            font-family: 'Inter', sans-serif;
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--secondary);
            margin-top: 0.8rem;
            letter-spacing: -0.5px;
        }

        .brand-name span {
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .brand-sub {
            font-size: 0.75rem;
            color: var(--gray);
            font-weight: 500;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-top: 0.2rem;
        }

        /* ----- HEADER TEXT ----- */
        .login-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--secondary);
            margin-bottom: 0.3rem;
            text-align: center;
        }

        .login-subtitle {
            color: var(--gray);
            font-size: 0.9rem;
            text-align: center;
            margin-bottom: 1.8rem;
        }

        /* ----- FORM ELEMENTS ----- */
        .form-label {
            font-weight: 600;
            font-size: 0.85rem;
            color: var(--secondary);
            margin-bottom: 0.4rem;
        }

        .form-control {
            border-radius: var(--radius-md) !important;
            border: 2px solid var(--gray-light) !important;
            padding: 0.7rem 1rem !important;
            font-size: 0.9rem !important;
            transition: var(--transition) !important;
            background: var(--gray-lighter) !important;
            color: var(--secondary) !important;
        }

        .form-control:focus {
            border-color: var(--primary) !important;
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1) !important;
            background: var(--white) !important;
        }

        .form-control::placeholder {
            color: #94a3b8 !important;
            font-weight: 400;
        }

        .input-group {
            border-radius: var(--radius-md);
            overflow: hidden;
        }

        .input-group .form-control {
            border-radius: 0 !important;
        }

        .input-group .input-group-text {
            border-radius: 0 !important;
            border: 2px solid var(--gray-light) !important;
            border-right: none !important;
            background: var(--gray-lighter) !important;
            color: var(--gray) !important;
            cursor: pointer;
            transition: var(--transition);
            padding: 0.7rem 0.8rem;
        }

        .input-group .input-group-text:hover {
            color: var(--primary) !important;
        }

        /* ----- REMEMBER ME & FORGOT PASSWORD ----- */
        .form-check {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .form-check-input {
            width: 18px;
            height: 18px;
            border-radius: 4px !important;
            border: 2px solid var(--gray-light) !important;
            cursor: pointer;
            transition: var(--transition);
            margin-top: 0 !important;
        }

        .form-check-input:checked {
            background-color: var(--primary) !important;
            border-color: var(--primary) !important;
        }

        .form-check-label {
            font-size: 0.85rem;
            color: var(--gray);
            cursor: pointer;
        }

        .forgot-link {
            font-size: 0.85rem;
            color: var(--primary);
            font-weight: 600;
            text-decoration: none;
            transition: var(--transition);
        }

        .forgot-link:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }

        /* ----- SUBMIT BUTTON ----- */
        .btn-primary {
            background: var(--primary-gradient) !important;
            border: none !important;
            border-radius: var(--radius-md) !important;
            padding: 0.8rem !important;
            font-weight: 700 !important;
            font-size: 0.95rem !important;
            transition: var(--transition) !important;
            box-shadow: 0 4px 15px rgba(79, 70, 229, 0.35) !important;
            color: #fff !important;
            letter-spacing: 0.5px;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(79, 70, 229, 0.5) !important;
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        /* ----- DIVIDER ----- */
        .divider {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin: 1.5rem 0;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: var(--gray-light);
        }

        .divider-text {
            font-size: 0.8rem;
            color: var(--gray);
            font-weight: 500;
            white-space: nowrap;
        }

        /* ----- REGISTER LINK ----- */
        .register-link {
            text-align: center;
            font-size: 0.9rem;
            color: var(--gray);
            margin-top: 1.5rem;
        }

        .register-link a {
            color: var(--primary);
            font-weight: 600;
            text-decoration: none;
            transition: var(--transition);
        }

        .register-link a:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }

        /* ----- DEMO BADGE ----- */
        .demo-badge {
            display: inline-block;
            background: linear-gradient(135deg, #f59e0b, #d97706);
            color: #fff;
            padding: 0.2rem 1rem;
            border-radius: var(--radius-full);
            font-size: 0.65rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-top: 0.5rem;
        }

        /* ----- MODAL ----- */
        .modal-content {
            border-radius: var(--radius-lg) !important;
            border: none !important;
            box-shadow: var(--shadow-xl) !important;
            overflow: hidden;
        }

        .modal-header.bg-danger {
            background: linear-gradient(135deg, #dc2626, #b91c1c) !important;
            border: none !important;
            padding: 1.2rem 1.5rem;
        }

        .modal-header .modal-title {
            color: #fff !important;
            font-weight: 700 !important;
            font-size: 1.2rem !important;
        }

        .modal-body {
            padding: 1.8rem 1.5rem;
            font-size: 1rem;
            color: var(--secondary);
            line-height: 1.7;
        }

        .modal-footer {
            border: none !important;
            padding: 1rem 1.5rem 1.5rem;
        }

        /* ============================================
           RESPONSIVE
           ============================================ */
        @media (max-width: 576px) {
            .authentication-wrapper {
                padding: 1rem;
            }

            .card-body {
                padding: 1.8rem 1.2rem 2rem !important;
            }

            .app-brand-logo {
                width: 70px;
                height: 70px;
            }

            .brand-name {
                font-size: 1.2rem;
            }

            .login-title {
                font-size: 1.2rem;
            }

            .form-control {
                font-size: 0.85rem !important;
                padding: 0.6rem 0.8rem !important;
            }

            .btn-primary {
                font-size: 0.85rem !important;
                padding: 0.7rem !important;
            }

            .modal-body {
                padding: 1.2rem 1rem;
                font-size: 0.9rem;
            }
        }

        @media (max-width: 400px) {
            .card-body {
                padding: 1.2rem 0.8rem 1.5rem !important;
            }

            .app-brand-logo {
                width: 60px;
                height: 60px;
            }

            .brand-name {
                font-size: 1rem;
            }

            .forgot-link {
                font-size: 0.75rem;
            }
        }

        /* ----- ANIMATIONS ----- */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card {
            animation: fadeInUp 0.6s ease forwards;
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.02);
            }
        }

        .btn-primary:hover {
            animation: pulse 0.6s ease;
        }
    </style>
</head>

<body>

    <!-- ============================================
    LOGIN BLOCK MODAL
    ============================================ -->
    <div class="modal fade" id="loginBlockModal" tabindex="-1" aria-labelledby="loginBlockLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="loginBlockLabel">
                        <i class="fas fa-exclamation-triangle me-2"></i> সতর্কতা
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <i class="fas fa-clock me-2 text-warning"></i>
                    সকাল ৮:০০ ঘটিকা হতে রাত ১২:০০ ঘটিকা পর্যন্ত অনলাইন ভর্তি কার্যক্রম চালু থাকবে।
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                        <i class="fas fa-check me-1"></i> বুঝেছি
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- ============================================
    LOGIN FORM
    ============================================ -->
    <div class="container-xxl">
        <div class="authentication-wrapper">
            <div class="authentication-inner">

                <div class="card">
                    <div class="card-body">

                        <!-- ===== BRAND / LOGO ===== -->
                        <div class="app-brand">
                            <a href="{{ url('/') }}" class="app-brand-link">
                                <span class="app-brand-logo">
                                    <img src="{{ asset('public/logo/logo.png') }}" alt="Logo" />
                                </span>
                            </a>
                            <div class="brand-name">SEMS <span>DEMO</span></div>
                        </div>

                        <!-- ===== TITLE ===== -->
                        <h4 class="login-title">Welcome Back</h4>
                        <p class="login-subtitle">Sign in to your account to continue</p>

                        <!-- ===== FORM ===== -->
                        <form class="mb-3" action="{{ route('login') }}" method="POST">
                            @csrf

                            <!-- Email / Username -->
                            <div class="mb-3">
                                <label for="email" class="form-label">
                                    <i class="fas fa-envelope me-1 text-primary"></i> Email or Username
                                </label>
                                <input type="text" class="form-control" id="email" name="email"
                                    placeholder="Enter your email or username" value="{{ old('email') }}" autofocus
                                    required />
                            </div>

                            <!-- Password -->
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between align-items-center">
                                    <label class="form-label" for="password">
                                        <i class="fas fa-lock me-1 text-primary"></i> Password
                                    </label>
                                    {{-- <a href="#" class="forgot-link">
                                        <small>Forgot Password?</small>
                                    </a> --}}
                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password"
                                        placeholder="Enter your password" aria-describedby="password" required />
                                    <span class="input-group-text cursor-pointer"
                                        onclick="togglePasswordVisibility()">
                                        <i class="bx bx-hide"></i>
                                    </span>
                                </div>
                            </div>

                            <!-- Remember Me -->
                            <div class="mb-3 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember-me"
                                        name="remember" />
                                    <label class="form-check-label" for="remember-me">
                                        Remember Me
                                    </label>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="mb-2">
                                <button class="btn btn-primary d-grid w-100" type="submit">
                                    <i class="fas fa-sign-in-alt me-2"></i> Sign In
                                </button>
                            </div>

                            <!-- Error Messages -->
                            @if ($errors->any())
                                <div class="alert alert-danger mt-3">
                                    <i class="fas fa-exclamation-circle me-2"></i>
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}
                                    @endforeach
                                </div>
                            @endif

                            @if (session('login_error'))
                                <div class="alert alert-danger mt-3">
                                    <i class="fas fa-exclamation-circle me-2"></i>
                                    {{ session('login_error') }}
                                </div>
                            @endif

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- ============================================
    SCRIPTS
    ============================================ -->
    <script src="{{ asset('/') }}public/backend/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="{{ asset('/') }}public/backend/assets/vendor/libs/popper/popper.js"></script>
    <script src="{{ asset('/') }}public/backend/assets/vendor/js/bootstrap.js"></script>
    <script src="{{ asset('/') }}public/backend/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="{{ asset('/') }}public/backend/assets/vendor/js/menu.js"></script>
    <script src="{{ asset('/') }}public/backend/assets/js/main.js"></script>

    <script>
        // ============================================
        // TOGGLE PASSWORD VISIBILITY
        // ============================================
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const icon = document.querySelector('.input-group-text i');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.className = 'bx bx-show';
            } else {
                passwordInput.type = 'password';
                icon.className = 'bx bx-hide';
            }
        }

        // ============================================
        // LOGIN BLOCK MODAL - SHOW DURING BLOCKED HOURS
        // ============================================
        $(function() {
            var currentHour = new Date().getHours();

            // Show modal if time is between 12 AM (0) and 7 AM (7)
            if (currentHour >= 0 && currentHour < 7) {
                $('#loginBlockModal').modal({
                    backdrop: 'static',
                    keyboard: false
                });
                $('#loginBlockModal').modal('show');
            }
        });

        // ============================================
        // PASSWORD VISIBILITY TOGGLE (Alternative)
        // ============================================
        document.addEventListener('DOMContentLoaded', function() {
            const toggleBtn = document.querySelector('.input-group-text');
            if (toggleBtn) {
                toggleBtn.addEventListener('click', function() {
                    const input = document.getElementById('password');
                    const icon = this.querySelector('i');

                    if (input.type === 'password') {
                        input.type = 'text';
                        icon.className = 'bx bx-show';
                    } else {
                        input.type = 'password';
                        icon.className = 'bx bx-hide';
                    }
                });
            }
        });
    </script>

</body>

</html>
