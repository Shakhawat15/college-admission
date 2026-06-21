<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=yes">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SEMS DEMO SCHOOL</title>

    <!-- Plugins css Style -->
    <link href='{{ asset('public/') }}/assets/plugins/fontawesome-5.15.2/css/all.min.css' rel='stylesheet'>
    <link href='{{ asset('public/') }}/assets/plugins/fontawesome-5.15.2/css/fontawesome.min.css' rel='stylesheet'>
    <link href='{{ asset('public/') }}/assets/plugins/animate/animate.css' rel='stylesheet'>
    <link href='{{ asset('public/') }}/assets/plugins/fancybox/jquery.fancybox.min.css' rel='stylesheet'>
    <link href='{{ asset('public/') }}/assets/plugins/isotope/isotope.min.css' rel='stylesheet'>
    <link href='{{ asset('public/') }}/assets/plugins/owl-carousel/owl.carousel.min.css' rel='stylesheet'
        media='screen'>
    <link href='{{ asset('public/') }}/assets/plugins/owl-carousel/owl.theme.default.min.css' rel='stylesheet'
        media='screen'>
    <link href='{{ asset('public/') }}/assets/plugins/revolution/css/settings.css' rel='stylesheet'>
    <link href='{{ asset('public/') }}/assets/plugins/revolution/css/layers.css' rel='stylesheet'>
    <link href='{{ asset('public/') }}/assets/plugins/revolution/css/navigation.css' rel='stylesheet'>

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Custom css -->
    <link href="{{ asset('public/') }}/assets/css/kidz.css" id="option_style" rel="stylesheet">
    <link href="{{ asset('public/') }}/assets/css/custom.css" id="option_style" rel="stylesheet">

    <!-- Favicon -->
    <link href="https://kgadmission.sems.ac/public/frontend/uploads/school_content/logo/sems.png" rel="shortcut icon">

    <!-- Javascript -->
    <script src='{{ asset('public/') }}/assets/plugins/jquery/jquery.min.js'></script>
    <script src='{{ asset('public/') }}/assets/plugins/bootstrap/js/bootstrap.bundle.min.js'></script>
    <script src='{{ asset('public/') }}/assets/plugins/fancybox/jquery.fancybox.min.js'></script>
    <script src='{{ asset('public/') }}/assets/plugins/isotope/isotope.min.js'></script>
    <script src='{{ asset('public/') }}/assets/plugins/images-loaded/js/imagesloaded.pkgd.min.js'></script>
    <script src='{{ asset('public/') }}/assets/plugins/lazyestload/lazyestload.js'></script>
    <script src='{{ asset('public/') }}/assets/plugins/velocity/velocity.min.js'></script>
    <script src='{{ asset('public/') }}/assets/plugins/smoothscroll/SmoothScroll.js'></script>
    <script src='{{ asset('public/') }}/assets/plugins/owl-carousel/owl.carousel.min.js'></script>
    <script src='{{ asset('public/') }}/assets/plugins/revolution/js/jquery.themepunch.tools.min.js'></script>
    <script src='{{ asset('public/') }}/assets/plugins/revolution/js/jquery.themepunch.revolution.min.js'></script>
    <script src='{{ asset('public/') }}/assets/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js'>
    </script>
    <script
        src='{{ asset('public/') }}/assets/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js'>
    </script>
    <script src='{{ asset('public/') }}/assets/plugins/revolution/js/extensions/revolution.extension.navigation.min.js'>
    </script>
    <script src='{{ asset('public/') }}/assets/plugins/wow/wow.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript"
        src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>

    <style>
        /* ============================================
           ROOT VARIABLES
           ============================================ */
        :root {
            --primary: #A51C30;
            --primary-dark: #7A1524;
            --primary-light: #C4283F;
            --primary-rgb: 165, 28, 48;
            --secondary: #00ADEF;
            --gold: #F0C24B;
            --gold-dark: #D9A52E;
            --gold-light: #FCE8A0;
            --gold-rgb: 240, 194, 75;
            --dark: #1a1a2e;
            --gray: #6c7a8d;
            --gray-light: #9aa6b5;
            --light-gray: #f0f2f5;
            --white: #ffffff;
            --shadow-sm: 0 2px 12px rgba(20, 20, 40, 0.06);
            --shadow-md: 0 10px 32px rgba(20, 20, 40, 0.10);
            --shadow-lg: 0 22px 64px rgba(20, 20, 40, 0.14);
            --shadow-gold: 0 8px 24px rgba(var(--gold-rgb), 0.35);
            --shadow-primary: 0 8px 24px rgba(var(--primary-rgb), 0.30);
            --radius-sm: 10px;
            --radius-md: 18px;
            --radius-lg: 26px;
            --radius-pill: 999px;
            --ease: cubic-bezier(0.4, 0, 0.2, 1);
            --transition: all 0.3s var(--ease);
            --font-display: 'Inter', 'Plus Jakarta Sans', sans-serif;
            --font-body: 'Plus Jakarta Sans', 'Inter', sans-serif;
        }

        /* ============================================
           BASE STYLES
           ============================================ */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: var(--font-body);
            background: #f8f9fc;
            color: var(--dark);
            line-height: 1.7;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        a {
            text-decoration: none;
            transition: var(--transition);
        }

        a:hover {
            text-decoration: none;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        ::selection {
            background: rgba(var(--primary-rgb), 0.18);
            color: var(--primary-dark);
        }

        a:focus-visible,
        button:focus-visible,
        input:focus-visible,
        select:focus-visible {
            outline: 2px solid var(--secondary);
            outline-offset: 2px;
        }

        @media (prefers-reduced-motion: reduce) {

            *,
            *::before,
            *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
                scroll-behavior: auto !important;
            }
        }

        /* ============================================
           TOP BAR
           ============================================ */
        .top-bar {
            background: linear-gradient(120deg, var(--primary-dark) 0%, var(--primary) 55%, var(--primary-light) 100%) !important;
            padding: 0.5rem 0;
            position: relative;
            z-index: 1000;
            border-bottom: 3px solid var(--gold);
            box-shadow: 0 2px 18px rgba(var(--primary-rgb), 0.25);
        }

        .top-bar .logoicon {
            width: 55px;
            height: auto;
            border-radius: 12px;
            background: #fff;
            padding: 3px;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.18);
            transition: var(--transition);
        }

        .top-bar .logoicon:hover {
            transform: scale(1.06) rotate(-2deg);
        }

        .school-brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .school-brand .brand-name {
            font-family: var(--font-display);
            font-weight: 800;
            font-size: 26px;
            color: #fff;
            line-height: 1;
            letter-spacing: -0.5px;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.15);
        }

        .school-brand .brand-name span {
            color: var(--gold);
        }

        .school-brand .brand-sub {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.78);
            font-weight: 500;
            letter-spacing: 0.6px;
            margin-top: 3px;
            display: block;
        }

        .school-brand .divider {
            width: 2px;
            height: 35px;
            background: rgba(255, 255, 255, 0.2);
            margin: 0 8px;
        }

        .top-bar .top-menu .btn-login {
            background: linear-gradient(135deg, var(--gold), var(--gold-dark));
            color: var(--dark) !important;
            padding: 0.45rem 1.6rem;
            border-radius: var(--radius-pill);
            font-weight: 700;
            font-size: 0.85rem;
            transition: var(--transition);
            border: none;
            box-shadow: var(--shadow-gold);
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .top-bar .top-menu .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(var(--gold-rgb), 0.5);
            color: var(--dark) !important;
        }

        .top-bar .top-menu .social-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.12);
            color: #fff;
            transition: var(--transition);
            font-size: 0.85rem;
            border: 1px solid rgba(255, 255, 255, 0.15);
        }

        .top-bar .top-menu .social-icon:hover {
            background: var(--gold);
            color: var(--dark);
            transform: translateY(-2px);
            border-color: var(--gold);
        }

        /* ============================================
           NAVBAR
           ============================================ */
        .navbar-custom {
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            box-shadow: 0 4px 24px rgba(20, 20, 40, 0.06);
            padding: 0.3rem 0;
            border-bottom: 1px solid rgba(var(--primary-rgb), 0.12);
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .navbar-custom .navbar-brand-mobile {
            display: none;
            font-weight: 800;
            font-size: 1.15rem;
            color: var(--primary);
        }

        .navbar-custom .navbar-brand-mobile i {
            color: var(--gold);
        }

        .navbar-custom .nav-item {
            position: relative;
        }

        .navbar-custom .nav-link {
            font-weight: 600;
            font-size: 0.85rem;
            color: var(--dark) !important;
            padding: 0.55rem 1.2rem !important;
            border-radius: var(--radius-sm);
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 8px;
            position: relative;
        }

        .navbar-custom .nav-link::after {
            content: '';
            position: absolute;
            left: 1.2rem;
            right: 1.2rem;
            bottom: 4px;
            height: 2px;
            background: var(--gold);
            border-radius: 2px;
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.25s var(--ease);
        }

        .navbar-custom .nav-link .nav-icon {
            color: var(--primary);
            font-size: 0.8rem;
            opacity: 0.6;
            transition: var(--transition);
            width: 18px;
            text-align: center;
        }

        .navbar-custom .nav-link:hover,
        .navbar-custom .nav-link.active {
            background: rgba(var(--primary-rgb), 0.08);
            color: var(--primary) !important;
        }

        .navbar-custom .nav-link:hover::after,
        .navbar-custom .nav-link.active::after {
            transform: scaleX(1);
        }

        .navbar-custom .nav-link:hover .nav-icon,
        .navbar-custom .nav-link.active .nav-icon {
            opacity: 1;
        }

        .navbar-custom .nav-item.active .nav-link {
            background: rgba(var(--primary-rgb), 0.1);
            color: var(--primary) !important;
        }

        .navbar-custom .dropdown-menu {
            border: none;
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-lg);
            padding: 0.6rem;
            min-width: 230px;
            border-top: 4px solid var(--primary);
            margin-top: 8px;
            animation: dropFade 0.18s var(--ease);
        }

        @keyframes dropFade {
            from {
                opacity: 0;
                transform: translateY(-6px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .navbar-custom .dropdown-item {
            font-weight: 500;
            font-size: 0.85rem;
            padding: 0.55rem 1rem;
            border-radius: var(--radius-sm);
            transition: var(--transition);
            color: var(--dark);
        }

        .navbar-custom .dropdown-item:hover {
            background: rgba(var(--primary-rgb), 0.06);
            color: var(--primary);
            padding-left: 1.2rem;
        }

        .navbar-custom .dropdown-item i {
            margin-right: 8px;
            color: var(--gray);
            font-size: 0.75rem;
        }

        .navbar-custom .sub-menu {
            list-style: none;
            padding-left: 1.2rem;
        }

        .navbar-custom .sub-menu li a {
            color: var(--gray);
            font-size: 0.82rem;
            padding: 0.22rem 0;
            display: block;
            transition: var(--transition);
        }

        .navbar-custom .sub-menu li a:hover {
            color: var(--primary);
            padding-left: 4px;
        }

        .navbar-custom .navbar-toggler {
            border: none;
            padding: 0.4rem 0.6rem;
            border-radius: var(--radius-sm);
            color: var(--dark);
            font-size: 1.2rem;
        }

        .navbar-custom .navbar-toggler:focus {
            box-shadow: none;
        }

        .navbar-custom .dropdown-toggle::after {
            margin-left: 6px;
            font-size: 0.6rem;
            vertical-align: middle;
        }

        /* ============================================
           FOOTER
           ============================================ */
        .footer-bg-img {
            background: linear-gradient(180deg, var(--dark) 0%, #14142a 100%);
            color: rgba(255, 255, 255, 0.7);
            position: relative;
        }

        .footer-bg-img .footer-content {
            padding: 3.2rem 0 2.4rem;
            position: relative;
        }

        .footer-bg-img .footer-heading {
            color: #fff;
            font-size: 1.05rem;
            font-weight: 700;
            margin-bottom: 1.2rem;
            letter-spacing: 0.2px;
        }

        .footer-bg-img .footer-link {
            color: rgba(255, 255, 255, 0.6);
            transition: var(--transition);
            display: inline-block;
            margin-bottom: 0.4rem;
            font-size: 0.9rem;
        }

        .footer-bg-img .footer-link:hover {
            color: var(--gold);
            transform: translateX(4px);
        }

        .footer-bg-img .copyright {
            background: rgba(0, 0, 0, 0.35) !important;
            padding: 1.2rem 0;
            border-top: 1px solid rgba(255, 255, 255, 0.06);
        }

        .footer-bg-img .copyright .copyright-text {
            font-size: 0.85rem;
            color: rgba(255, 255, 255, 0.5);
            margin: 0;
        }

        .footer-bg-img .copyright .copyright-text strong {
            color: var(--gold);
        }

        .footer-bg-img .social-footer-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.06);
            color: #fff;
            transition: var(--transition);
            font-size: 0.85rem;
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        .footer-bg-img .social-footer-icon:hover {
            background: var(--primary);
            border-color: var(--primary);
            transform: translateY(-3px);
            color: #fff;
        }

        .color-bar .col {
            height: 4px;
            padding: 0;
        }

        /* ============================================
           BACK TO TOP
           ============================================ */
        .back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 46px;
            height: 46px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            box-shadow: var(--shadow-primary);
            transition: var(--transition);
            z-index: 999;
            opacity: 0;
            visibility: hidden;
            transform: translateY(20px);
        }

        .back-to-top.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .back-to-top:hover {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary));
            transform: translateY(-3px);
            box-shadow: 0 14px 34px rgba(var(--primary-rgb), 0.45);
            color: #fff;
        }

        /* ============================================
           GLOBAL MODAL FIX - Override all modal positioning issues
           ============================================ */
        .modal {
            padding-right: 0 !important;
        }

        .modal-dialog {
            margin: 1.75rem auto !important;
            max-width: 500px;
            width: 100%;
        }

        .modal-dialog-centered {
            display: flex !important;
            align-items: center !important;
            min-height: calc(100% - 3.5rem) !important;
        }

        .modal-content {
            border-radius: var(--radius-lg);
            border: none;
            box-shadow: var(--shadow-lg);
            overflow: hidden;
            width: 100% !important;
            margin: 0 auto !important;
        }

        /* Remove all conflicting margin-left overrides */
        .modal-dialog {
            margin-left: auto !important;
            margin-right: auto !important;
        }

        /* Fix for the main content page modal */
        #checkOnlineAdmissionStatus .modal-dialog {
            margin: 1.75rem auto !important;
            max-width: 800px !important;
        }

        #checkOnlineAdmissionStatus .modal-content {
            width: 100% !important;
        }

        /* Fix for login block modal */
        #loginBlockModal .modal-dialog {
            margin: 1.75rem auto !important;
            max-width: 500px !important;
        }

        /* Remove any legacy margin overrides */
        .notice .modal-dialog {
            margin: 1.75rem auto !important;
        }

        /* Fix for mobile */
        @media (max-width: 767px) {
            .modal-dialog {
                margin: 0.5rem auto !important;
                max-width: 94% !important;
            }

            #checkOnlineAdmissionStatus .modal-dialog {
                margin: 0.5rem auto !important;
                max-width: 94% !important;
            }

            #loginBlockModal .modal-dialog {
                margin: 0.5rem auto !important;
                max-width: 94% !important;
            }
        }

        /* Fix for desktop large screens */
        @media (min-width: 768px) {
            #checkOnlineAdmissionStatus .modal-dialog {
                max-width: 800px !important;
                margin: 1.75rem auto !important;
            }

            #loginBlockModal .modal-dialog {
                max-width: 500px !important;
                margin: 1.75rem auto !important;
            }
        }

        /* ============================================
           MODAL LOGIN CUSTOM STYLES
           ============================================ */
        .modal-login-custom .modal-content {
            border-radius: var(--radius-lg);
            border: none;
            box-shadow: var(--shadow-lg);
            overflow: hidden;
            transform: scale(0.92) translateY(12px);
            transition: transform 0.35s cubic-bezier(0.34, 1.56, 0.64, 1), opacity 0.3s ease;
            opacity: 0;
        }

        .modal-login-custom.show .modal-content {
            transform: scale(1) translateY(0);
            opacity: 1;
        }

        .modal-login-custom .modal-backdrop.show {
            opacity: 0.6;
            transition: opacity 0.35s ease;
        }

        .modal-login-custom .modal-header-grad {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            padding: 1.8rem 2rem 1.6rem;
            text-align: center;
            border-bottom: none;
            position: relative;
            overflow: hidden;
        }

        .modal-login-custom .modal-header-grad::before {
            content: '';
            position: absolute;
            top: -40%;
            right: -10%;
            width: 160px;
            height: 160px;
            background: rgba(255, 255, 255, 0.06);
            border-radius: 50%;
        }

        .modal-login-custom .modal-header-grad .icon-badge {
            width: 52px;
            height: 52px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.15);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 0.7rem;
            font-size: 1.3rem;
            color: var(--gold);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .modal-login-custom .modal-header-grad h4 {
            color: #fff;
            font-weight: 700;
            margin: 0;
            position: relative;
            z-index: 1;
        }

        .modal-login-custom .modal-header-grad p {
            color: rgba(255, 255, 255, 0.75);
            font-size: 0.85rem;
            margin: 0;
            position: relative;
            z-index: 1;
        }

        .modal-login-custom .modal-body-custom {
            padding: 2rem;
        }

        .modal-login-custom .form-control {
            border-radius: var(--radius-sm);
            border: 2px solid #e8ecf1;
            padding: 0.7rem 1rem;
            font-size: 0.9rem;
            transition: var(--transition);
        }

        .modal-login-custom .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(var(--primary-rgb), 0.08);
        }

        .modal-login-custom .input-group-text {
            background: var(--light-gray);
            border: 2px solid #e8ecf1;
            border-right: none;
            border-radius: var(--radius-sm) 0 0 var(--radius-sm);
            color: var(--gray);
        }

        .modal-login-custom .input-group .form-control {
            border-radius: 0 var(--radius-sm) var(--radius-sm) 0;
            border-left: none;
        }

        .modal-login-custom .btn-login-modal {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border: none;
            color: #fff;
            padding: 0.85rem;
            border-radius: var(--radius-sm);
            font-weight: 700;
            font-size: 0.95rem;
            transition: var(--transition);
            width: 100%;
            box-shadow: var(--shadow-primary);
        }

        .modal-login-custom .btn-login-modal:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(var(--primary-rgb), 0.4);
            color: #fff;
        }

        /* ============================================
           RESPONSIVE
           ============================================ */
        @media (max-width: 991px) {
            .top-bar .school-brand .brand-name {
                font-size: 20px;
            }

            .top-bar .school-brand .brand-sub {
                font-size: 11px;
            }

            .top-bar .school-brand .divider {
                display: none;
            }

            .top-bar .logoicon {
                width: 45px;
            }
        }

        @media (max-width: 768px) {
            .top-bar {
                padding: 0.5rem 0;
            }

            .top-bar .school-brand .brand-name {
                font-size: 16px;
            }

            .top-bar .school-brand .brand-sub {
                font-size: 9px;
            }

            .top-bar .logoicon {
                width: 38px;
            }

            .top-bar .top-menu .btn-login {
                padding: 0.3rem 1rem;
                font-size: 0.7rem;
            }

            .top-bar .top-menu .social-icon {
                width: 30px;
                height: 30px;
                font-size: 0.7rem;
            }

            .navbar-custom .navbar-brand-mobile {
                display: block;
            }

            .navbar-custom .navbar-collapse {
                background: #fff;
                padding: 1rem;
                border-radius: var(--radius-md);
                box-shadow: var(--shadow-lg);
                margin-top: 0.5rem;
                border: 1px solid rgba(0, 0, 0, 0.04);
            }

            .navbar-custom .nav-link {
                padding: 0.5rem 0.8rem !important;
                font-size: 0.8rem;
            }

            .navbar-custom .nav-link::after {
                display: none;
            }

            .navbar-custom .dropdown-menu {
                border: none;
                box-shadow: none;
                padding: 0.3rem 0 0.3rem 1.5rem;
                background: rgba(0, 0, 0, 0.02);
                border-radius: var(--radius-sm);
                border-top: none;
                margin-top: 0;
            }

            .navbar-custom .sub-menu {
                padding-left: 0.8rem;
            }

            .modal-login-custom .modal-header-grad {
                padding: 1.2rem 1.2rem;
            }

            .modal-login-custom .modal-body-custom {
                padding: 1.2rem;
            }

            .modal-login-custom .form-control {
                font-size: 0.8rem;
                padding: 0.5rem 0.8rem;
            }

            .back-to-top {
                width: 38px;
                height: 38px;
                font-size: 0.9rem;
                bottom: 16px;
                right: 16px;
            }

            .modal-login-custom .modal-content {
                transform: scale(0.94) translateY(10px);
            }
        }

        @media (max-width: 480px) {
            .top-bar .school-brand .brand-name {
                font-size: 13px;
            }

            .top-bar .logoicon {
                width: 30px;
            }

            .top-bar .top-menu .btn-login {
                padding: 0.2rem 0.7rem;
                font-size: 0.6rem;
            }

            .top-bar .top-menu .social-icon {
                width: 26px;
                height: 26px;
                font-size: 0.6rem;
            }
        }

        /* ============================================
           UTILITY
           ============================================ */
        .bg-primary-custom {
            background: var(--primary) !important;
        }

        .text-primary-custom {
            color: var(--primary) !important;
        }

        .text-gold {
            color: var(--gold) !important;
        }

        .btn-gold {
            background: var(--gold);
            color: var(--dark);
            border: none;
            font-weight: 700;
            transition: var(--transition);
        }

        .btn-gold:hover {
            background: var(--gold-dark);
            color: var(--dark);
            transform: translateY(-2px);
        }

        .shadow-hover {
            transition: var(--transition);
        }

        .shadow-hover:hover {
            box-shadow: var(--shadow-lg) !important;
            transform: translateY(-4px);
        }

        .navbar-toggler-icon-custom {
            font-size: 1.2rem;
            color: var(--dark);
        }

        /* Remove any transform conflicts */
        .modal.show .modal-dialog {
            transform: none !important;
        }
    </style>

    @stack('styles')
</head>

<body id="body" class="boxed pattern-04">

    <!-- ============================================
    HEADER
    ============================================ -->
    <header class="header" id="pageTop">

        <!-- ===== TOP BAR ===== -->
        <div class="top-bar scroll-down-div">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-7 col-md-7">
                        <div class="school-brand">
                            <a href="{{ url('/') }}">
                                <img class="logoicon"
                                    src="https://kgadmission.sems.ac/public/frontend/uploads/school_content/logo/sems.png"
                                    alt="SEMS Logo">
                            </a>
                            <span class="divider"></span>
                            <div>
                                <div class="brand-name">SEMS <span>DEMO</span></div>
                                <span class="brand-sub">ESTD 2000 | EIIN-100000</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-5 col-md-5">
                        <div class="top-menu d-flex justify-content-end align-items-center gap-2 gap-md-3">
                            <a href="javascript:void(0)" class="btn-login" data-bs-toggle="modal"
                                data-bs-target="#modal-login">
                                <i class="fas fa-user"></i> Login
                            </a>
                            <button class="navbar-toggler d-md-none" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <i class="fas fa-bars" style="color: #fff; font-size: 1.2rem;"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ===== NAVBAR ===== -->
        <nav class="navbar navbar-expand-md navbar-custom scroll-up-div">
            <div class="container">
                <a class="navbar-brand-mobile" href="{{ url('/') }}">
                    <i class="fas fa-graduation-cap"></i> SEMS DEMO
                </a>

                <div class="collapse navbar-collapse" id="navbarContent">
                    <ul class="navbar-nav ms-auto">
                        @php
                            $colors = ['bg-primary', 'bg-danger', 'bg-success', 'bg-info', 'bg-purple', 'bg-pink'];
                            $icons = [
                                'fas fa-home',
                                'far fa-building',
                                'fas fa-graduation-cap',
                                'fas fa-balance-scale',
                                'fa fa-bell',
                                'fas fa-camera-retro',
                            ];
                        @endphp

                        @isset($pages)
                            @foreach ($pages as $ke => $page)
                                <li class="nav-item {{ $ke == 0 ? 'active' : '' }}">
                                    @if (isset($page['tree']))
                                        <a class="nav-link dropdown-toggle" href="javascript:void(0)"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="{{ $icons[$loop->index] ?? 'fas fa-map' }} nav-icon"></i>
                                            <span>{{ $page['title'] }}</span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            @foreach ($page['tree'] as $childpage)
                                                @if (isset($childpage['tree']) && !empty($childpage['tree']))
                                                    <li>
                                                        <a class="dropdown-item" href="#">
                                                            {{ $childpage['title'] }}
                                                            <i class="fas fa-chevron-right float-end mt-1"></i>
                                                        </a>
                                                        <ul class="sub-menu">
                                                            @foreach ($childpage['tree'] as $subchildpage)
                                                                <li>
                                                                    <a href="{{ url('page/' . $subchildpage['slug']) }}">
                                                                        {{ $subchildpage['title'] }}
                                                                    </a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                @else
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ url('page/' . $childpage['slug']) }}">
                                                            <i class="fas fa-angle-right me-2"></i>
                                                            {{ $childpage['title'] }}
                                                        </a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    @else
                                        <a class="nav-link"
                                            href="{{ $page['title'] == 'Home' ? url('/') : url('page/' . $page['slug']) }}">
                                            <i class="{{ $icons[$loop->index] ?? 'fas fa-map' }} nav-icon"></i>
                                            <span>{{ $page['title'] }}</span>
                                        </a>
                                    @endif
                                </li>
                            @endforeach
                        @endisset
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- ============================================
    MAIN CONTENT
    ============================================ -->
    @yield('content')

    <!-- ============================================
    FOOTER
    ============================================ -->
    <footer class="footer-bg-img">
        <!-- Color Bar -->
        <div class="color-bar">
            <div class="container-fluid">
                <div class="row">
                    <div class="col color-bar bg-warning"></div>
                    <div class="col color-bar bg-danger"></div>
                    <div class="col color-bar bg-success"></div>
                    <div class="col color-bar bg-info"></div>
                    <div class="col color-bar bg-purple"></div>
                    <div class="col color-bar bg-pink"></div>
                    <div class="col color-bar bg-warning d-none d-md-block"></div>
                    <div class="col color-bar bg-danger d-none d-md-block"></div>
                    <div class="col color-bar bg-success d-none d-md-block"></div>
                    <div class="col color-bar bg-info d-none d-md-block"></div>
                    <div class="col color-bar bg-purple d-none d-md-block"></div>
                    <div class="col color-bar bg-pink d-none d-md-block"></div>
                </div>
            </div>
        </div>

        <!-- Footer Content -->
        <div class="footer-content">
            <div class="container">
                <div class="row g-4">
                    <div class="col-md-4">
                        <h5 class="footer-heading">
                            <i class="fas fa-graduation-cap text-gold me-2"></i> SEMS DEMO SCHOOL
                        </h5>
                        <p style="font-size:0.9rem; opacity:0.7;">
                            Providing quality education and seamless admission management for students across the
                            country.
                        </p>
                        <div class="d-flex gap-2 mt-3">
                            <a href="#" class="social-footer-icon"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="social-footer-icon"><i class="fab fa-youtube"></i></a>
                            <a href="#" class="social-footer-icon"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <h5 class="footer-heading">Quick Links</h5>
                        <ul class="list-unstyled">
                            <li><a href="{{ url('/') }}" class="footer-link">Home</a></li>
                            <li><a href="#" class="footer-link">Admission</a></li>
                            <li><a href="#" class="footer-link">Notice Board</a></li>
                            <li><a href="#" class="footer-link">Contact</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h5 class="footer-heading">Resources</h5>
                        <ul class="list-unstyled">
                            <li><a href="#" class="footer-link">Admission Guide</a></li>
                            <li><a href="#" class="footer-link">Fee Structure</a></li>
                            <li><a href="#" class="footer-link">Academic Calendar</a></li>
                            <li><a href="#" class="footer-link">Result Portal</a></li>
                        </ul>
                    </div>
                    <div class="col-md-2">
                        <h5 class="footer-heading">Support</h5>
                        <ul class="list-unstyled">
                            <li><a href="#" class="footer-link">Help Desk</a></li>
                            <li><a href="#" class="footer-link">FAQs</a></li>
                            <li><a href="#" class="footer-link">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="copyright">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-7 text-center text-md-start">
                        <p class="copyright-text">
                            &copy; <span id="copy-year"></span> Powered By <a href="https://shahintech.org"
                                target="_blank"><strong>Shahin TECH</strong></a>
                        </p>
                    </div>
                    <div class="col-md-5 text-center text-md-end">
                        <span style="font-size:0.8rem; opacity:0.4;">v2.0 | Admission Management System</span>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- ============================================
    LOGIN MODAL — with smooth animation
    ============================================ -->
    <div class="modal fade modal-login-custom" id="modal-login" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header-grad">
                    <div class="w-100">
                        <div class="icon-badge"><i class="fas fa-user-graduate"></i></div>
                        <h4>Welcome Back</h4>
                        <p>Login to your admission account</p>
                    </div>
                    <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body-custom">
                    <div id="login-error" class="alert alert-danger d-none text-center">
                        {{ session('login_error') }}
                    </div>

                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input type="text" id="email" name="email" class="form-control"
                                    placeholder="Username or Email" value="{{ old('email') }}" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input type="password" id="password" name="password" class="form-control"
                                    placeholder="Password" required>
                            </div>
                        </div>

                        <button type="submit" class="btn-login-modal">
                            <i class="fas fa-sign-in-alt me-2"></i> Log In
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- ============================================
    FORGOT PASSWORD MODAL
    ============================================ -->
    <div class="modal fade modal-login-custom" id="modal-forgot-password" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header-grad">
                    <div class="w-100">
                        <div class="icon-badge"><i class="fas fa-calendar-alt"></i></div>
                        <h4>Verify Birthdate</h4>
                        <p>Enter your birthdate to reset password</p>
                    </div>
                    <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body-custom">
                    <form action="{{ route('password.reset.verify') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
                                <input type="date" name="birthdate" class="form-control" required>
                            </div>
                        </div>

                        <button type="submit" class="btn-login-modal">
                            <i class="fas fa-check-circle me-2"></i> Verify
                        </button>

                        <div class="text-center mt-3">
                            <a href="javascript:void(0)" class="text-primary-custom small" data-bs-toggle="modal"
                                data-bs-target="#modal-login" data-bs-dismiss="modal">
                                <i class="fas fa-arrow-left me-1"></i> Back to Login
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- ============================================
    BACK TO TOP
    ============================================ -->
    <a href="#pageTop" class="back-to-top" id="back-to-top">
        <i class="fas fa-arrow-up"></i>
    </a>

    <!-- ============================================
    SCRIPTS
    ============================================ -->
    <script src='{{ asset('public/') }}/assets/js/kidz.js'></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // ===== COPYRIGHT YEAR =====
            document.getElementById('copy-year').textContent = new Date().getFullYear();

            // ===== BACK TO TOP =====
            const backToTop = document.getElementById('back-to-top');
            window.addEventListener('scroll', function() {
                if (window.scrollY > 400) {
                    backToTop.classList.add('show');
                } else {
                    backToTop.classList.remove('show');
                }
            });

            backToTop.addEventListener('click', function(e) {
                e.preventDefault();
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });

            // ===== LOGIN ERROR =====
            @if (session('login_error'))
                const loginModal = new bootstrap.Modal(document.getElementById('modal-login'));
                loginModal.show();
                document.getElementById('login-error').classList.remove('d-none');
            @endif

            // ===== SWEETALERT =====
            @if (Session::get('success'))
                Swal.fire({
                    title: "Good job!",
                    text: "{{ Session::get('success') }}",
                    icon: "success",
                    confirmButtonColor: "#A51C30"
                });
            @endif

            @if (Session::get('warning'))
                Swal.fire({
                    title: "Warning!",
                    html: "{!! Session::get('warning') !!}",
                    icon: "warning",
                    confirmButtonColor: "#A51C30"
                });
            @endif
        });

        // Scroll behavior for navbar
        $(document).ready(function() {
            var $scrollUpDiv = $('.scroll-up-div');
            var $scrollUpDivi = $('.scroll-up-div i');

            $(window).on('scroll', function() {
                let scrollPos = $(window).scrollTop() + $(window).height();

                if ($(window).scrollTop() <= 180) {
                    $scrollUpDiv.css('margin-top', '0px');
                    $scrollUpDivi.removeClass('d-hide');
                } else if (scrollPos >= 800) {
                    if ($(window).width() > 1900) {
                        if (scrollPos >= 1000) {
                            $scrollUpDiv.css('margin-top', '0px');
                            $scrollUpDivi.addClass('d-hide');
                        } else {
                            $scrollUpDiv.css('margin-top', '0px');
                            $scrollUpDivi.removeClass('d-hide');
                        }
                    } else {
                        $scrollUpDiv.css('margin-top', '85px');
                        $scrollUpDivi.addClass('d-hide');
                    }
                }
            });
        });
    </script>

    @stack('scripts')
</body>

</html>
