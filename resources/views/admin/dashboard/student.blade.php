@extends('admin.layouts.layout')
@section('content')
    <style>
        /* ============================================
                                       MODERN STUDENT DASHBOARD STYLES
                                       ============================================ */

        /* ----- ROOT VARIABLES ----- */
        :root {
            --primary: #4f46e5;
            --primary-dark: #4338ca;
            --primary-light: #818cf8;
            --primary-gradient: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
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

        /* ----- DASHBOARD HEADER ----- */
        .dashboard-welcome {
            background: var(--primary-gradient);
            border-radius: var(--radius-lg);
            padding: 2rem 2.5rem;
            margin-bottom: 2rem;
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(79, 70, 229, 0.25);
        }

        .dashboard-welcome::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
        }

        .dashboard-welcome::after {
            content: '';
            position: absolute;
            bottom: -30%;
            left: -5%;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.04);
            border-radius: 50%;
        }

        .dashboard-welcome .welcome-content {
            position: relative;
            z-index: 1;
        }

        .dashboard-welcome h2 {
            color: #fff;
            font-weight: 700;
            font-size: 1.8rem;
            margin-bottom: 0.3rem;
        }

        .dashboard-welcome h2 i {
            margin-right: 10px;
        }

        .dashboard-welcome p {
            color: rgba(255, 255, 255, 0.85);
            font-size: 1rem;
            margin-bottom: 0;
        }

        .dashboard-welcome .student-badge {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            padding: 0.4rem 1.2rem;
            border-radius: var(--radius-full);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #fff;
            font-size: 0.85rem;
            font-weight: 500;
        }

        /* ----- DASHBOARD CARDS ----- */
        .dash-card {
            border: none !important;
            border-radius: var(--radius-lg) !important;
            overflow: hidden;
            transition: var(--transition) !important;
            box-shadow: var(--shadow-sm) !important;
            height: 100%;
            background: #fff !important;
            position: relative;
        }

        .dash-card:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow-lg) !important;
        }

        .dash-card .card-body {
            padding: 1.5rem 1.2rem !important;
            text-align: center;
        }

        .dash-card .card-body a {
            text-decoration: none;
            display: block;
        }

        /* Card Icon Wrapper */
        .dash-icon-wrapper {
            width: 75px;
            height: 75px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            transition: var(--transition);
            position: relative;
        }

        .dash-icon-wrapper::after {
            content: '';
            position: absolute;
            inset: -3px;
            border-radius: 50%;
            background: inherit;
            opacity: 0.15;
            transform: scale(1);
            transition: var(--transition);
        }

        .dash-card:hover .dash-icon-wrapper::after {
            transform: scale(1.2);
            opacity: 0.2;
        }

        .dash-icon-wrapper img {
            width: 40px;
            height: 40px;
            object-fit: contain;
            border-radius: 0;
            position: relative;
            z-index: 1;
        }

        /* Card Title */
        .dash-card .card-title {
            font-weight: 700;
            font-size: 0.95rem;
            color: var(--secondary);
            margin-bottom: 0.2rem;
            transition: var(--transition);
        }

        .dash-card:hover .card-title {
            color: var(--primary);
        }

        .dash-card .card-subtitle {
            font-size: 0.75rem;
            color: var(--gray);
            margin-bottom: 0;
        }

        /* Card Border Accents */
        .dash-card .card-accent {
            height: 4px;
            width: 100%;
            position: absolute;
            top: 0;
            left: 0;
            border-radius: var(--radius-lg) var(--radius-lg) 0 0;
        }

        .card-accent-primary {
            background: var(--primary-gradient);
        }

        .card-accent-success {
            background: linear-gradient(135deg, #10b981, #34d399);
        }

        .card-accent-warning {
            background: linear-gradient(135deg, #f59e0b, #fbbf24);
        }

        .card-accent-danger {
            background: linear-gradient(135deg, #ef4444, #f87171);
        }

        .card-accent-info {
            background: linear-gradient(135deg, #3b82f6, #60a5fa);
        }

        .card-accent-purple {
            background: linear-gradient(135deg, #8b5cf6, #a78bfa);
        }

        .card-accent-pink {
            background: linear-gradient(135deg, #ec4899, #f472b6);
        }

        .card-accent-orange {
            background: linear-gradient(135deg, #f97316, #fb923c);
        }

        .card-accent-teal {
            background: linear-gradient(135deg, #14b8a6, #2dd4bf);
        }

        /* Icon Background Colors */
        .bg-icon-primary {
            background: linear-gradient(135deg, #eef2ff, #e0e7ff);
        }

        .bg-icon-success {
            background: linear-gradient(135deg, #ecfdf5, #d1fae5);
        }

        .bg-icon-warning {
            background: linear-gradient(135deg, #fffbeb, #fef3c7);
        }

        .bg-icon-danger {
            background: linear-gradient(135deg, #fef2f2, #fee2e2);
        }

        .bg-icon-info {
            background: linear-gradient(135deg, #eff6ff, #dbeafe);
        }

        .bg-icon-purple {
            background: linear-gradient(135deg, #f5f3ff, #ede9fe);
        }

        .bg-icon-pink {
            background: linear-gradient(135deg, #fdf2f8, #fce7f3);
        }

        .bg-icon-orange {
            background: linear-gradient(135deg, #fff7ed, #ffedd5);
        }

        .bg-icon-teal {
            background: linear-gradient(135deg, #f0fdfa, #ccfbf1);
        }

        /* ============================================
                                       ACTION BUTTON CARDS (Separate Styling)
                                       ============================================ */
        .action-card {
            border: none !important;
            border-radius: var(--radius-lg) !important;
            overflow: hidden;
            transition: var(--transition) !important;
            box-shadow: var(--shadow-sm) !important;
            height: 100%;
            background: #fff !important;
            position: relative;
            cursor: pointer;
        }

        .action-card:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow-lg) !important;
        }

        .action-card .card-body {
            padding: 1.5rem 1.2rem !important;
            text-align: center;
        }

        .action-card .card-body a {
            text-decoration: none;
            display: block;
        }

        .action-card .action-icon {
            width: 65px;
            height: 65px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 0.8rem;
            transition: var(--transition);
            font-size: 1.8rem;
            color: #fff;
            position: relative;
        }

        .action-card .action-icon::after {
            content: '';
            position: absolute;
            inset: -2px;
            border-radius: 50%;
            background: inherit;
            opacity: 0.15;
            transform: scale(1);
            transition: var(--transition);
        }

        .action-card:hover .action-icon::after {
            transform: scale(1.3);
            opacity: 0.25;
        }

        .action-card .action-icon i {
            position: relative;
            z-index: 1;
        }

        .action-card .action-title {
            font-weight: 700;
            font-size: 0.9rem;
            color: var(--secondary);
            margin-bottom: 0.2rem;
            transition: var(--transition);
        }

        .action-card:hover .action-title {
            color: var(--primary);
        }

        .action-card .action-sub {
            font-size: 0.7rem;
            color: var(--gray);
            margin-bottom: 0;
        }

        /* Action Icon Colors */
        .action-icon-primary {
            background: var(--primary-gradient);
        }

        .action-icon-success {
            background: linear-gradient(135deg, #10b981, #34d399);
        }

        .action-icon-warning {
            background: linear-gradient(135deg, #f59e0b, #fbbf24);
        }

        .action-icon-danger {
            background: linear-gradient(135deg, #ef4444, #f87171);
        }

        .action-icon-info {
            background: linear-gradient(135deg, #3b82f6, #60a5fa);
        }

        .action-icon-purple {
            background: linear-gradient(135deg, #8b5cf6, #a78bfa);
        }

        /* ============================================
                                       SECTION TITLE
                                       ============================================ */
        .section-title {
            font-weight: 700;
            font-size: 1.2rem;
            color: var(--secondary);
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .section-title i {
            color: var(--primary);
        }

        .section-title .title-line {
            flex: 1;
            height: 2px;
            background: linear-gradient(90deg, var(--primary-light), transparent);
            margin-left: 0.5rem;
        }

        /* ============================================
                                       RESPONSIVE
                                       ============================================ */
        @media (max-width: 991px) {
            .dashboard-welcome {
                padding: 1.5rem;
                border-radius: var(--radius-md);
            }

            .dashboard-welcome h2 {
                font-size: 1.4rem;
            }
        }

        @media (max-width: 767px) {
            .dashboard-welcome {
                padding: 1.2rem;
                text-align: center;
            }

            .dashboard-welcome .student-badge {
                margin-top: 0.5rem;
                display: inline-block;
            }

            .dash-icon-wrapper {
                width: 60px;
                height: 60px;
            }

            .dash-icon-wrapper img {
                width: 32px;
                height: 32px;
            }

            .action-card .action-icon {
                width: 55px;
                height: 55px;
                font-size: 1.4rem;
            }
        }

        @media (max-width: 575px) {
            .dashboard-welcome h2 {
                font-size: 1.1rem;
            }

            .dashboard-welcome p {
                font-size: 0.85rem;
            }

            .dash-card .card-body {
                padding: 1rem 0.8rem !important;
            }

            .dash-card .card-title {
                font-size: 0.8rem;
            }

            .action-card .card-body {
                padding: 1rem 0.8rem !important;
            }

            .action-card .action-title {
                font-size: 0.8rem;
            }
        }

        /* ============================================
                                       ANIMATIONS
                                       ============================================ */
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

        .animate-fade-in {
            animation: fadeInUp 0.6s ease forwards;
        }

        .animate-fade-in:nth-child(2) {
            animation-delay: 0.05s;
        }

        .animate-fade-in:nth-child(3) {
            animation-delay: 0.1s;
        }

        .animate-fade-in:nth-child(4) {
            animation-delay: 0.15s;
        }

        .animate-fade-in:nth-child(5) {
            animation-delay: 0.2s;
        }

        .animate-fade-in:nth-child(6) {
            animation-delay: 0.25s;
        }

        .animate-fade-in:nth-child(7) {
            animation-delay: 0.3s;
        }

        .animate-fade-in:nth-child(8) {
            animation-delay: 0.35s;
        }

        .animate-fade-in:nth-child(9) {
            animation-delay: 0.4s;
        }

        .animate-fade-in:nth-child(10) {
            animation-delay: 0.45s;
        }

        .animate-fade-in:nth-child(11) {
            animation-delay: 0.5s;
        }

        .animate-fade-in:nth-child(12) {
            animation-delay: 0.55s;
        }

        /* ============================================
                                       MODAL STYLES
                                       ============================================ */
        .modal-content {
            border-radius: var(--radius-lg) !important;
            border: none !important;
            box-shadow: var(--shadow-xl) !important;
            overflow: hidden;
        }

        .modal-body {
            padding: 2rem;
            text-align: center;
            min-height: 200px;
        }

        .modal-body .congrats-icon {
            font-size: 4rem;
            color: #ee00bb;
            margin-bottom: 1rem;
            display: block;
        }

        .modal-body p {
            font-size: 1.1rem;
            color: var(--secondary);
            line-height: 1.8;
        }

        .modal-body .highlight-text {
            color: #ee00bb;
            font-weight: 700;
        }
    </style>

    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">

            <!-- ============================================
                                        DASHBOARD WELCOME HEADER
                                        ============================================ -->
            <div class="dashboard-welcome animate-fade-in">
                <div class="welcome-content d-flex flex-wrap justify-content-between align-items-center">
                    <div>
                        <h2><i class="fas fa-user-graduate"></i> Welcome Back, {{ Auth::user()->name }}!</h2>
                        <p>Here's your student dashboard overview. Access all your academic resources from one place.</p>
                    </div>
                    <div class="student-badge">
                        <i class="fas fa-id-card me-2"></i>
                        Student Code: {{ Auth::user()->ref_id ?? 'N/A' }}
                    </div>
                </div>
            </div>

            <!-- ============================================
                                        MAIN DASHBOARD CARDS
                                        ============================================ -->
            <div class="row g-4 mb-4">

                <!-- Profile -->
                <div class="col-sm-6 col-lg-3 animate-fade-in">
                    <div class="dash-card">
                        <div class="card-accent card-accent-primary"></div>
                        <div class="card-body">
                            <a href="{{ route('StudentProfile', 0) }}">
                                <div class="dash-icon-wrapper bg-icon-primary">
                                    <img src="{{ asset('public/dashboard/student.jpg') }}" alt="Profile">
                                </div>
                                <h5 class="card-title">Profile</h5>
                                <p class="card-subtitle">View & update your profile</p>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- ID Card - NEW -->
                <div class="col-sm-6 col-lg-3 animate-fade-in">
                    <div class="dash-card">
                        <div class="card-accent card-accent-success"></div>
                        <div class="card-body">
                            <a href="{{ route('getidcardd') }}" target="_blank">
                                <div class="dash-icon-wrapper bg-icon-success">
                                    <img src="{{ asset('public/dashboard/id-card1.png') }}" alt="ID Card">
                                </div>
                                <h5 class="card-title">ID Card</h5>
                                <p class="card-subtitle">View & print your ID card</p>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Print Admission Form - NEW (Separate) -->
                <div class="col-sm-6 col-lg-3 animate-fade-in">
                    <div class="dash-card">
                        <div class="card-accent card-accent-warning"></div>
                        <div class="card-body">
                            <a href="{{ url('admin/studentPrint/' . Auth::user()->ref_id) }}" target="_blank">
                                <div class="dash-icon-wrapper bg-icon-warning">
                                    <img src="{{ asset('public/dashboard/admission.png') }}" alt="Admission Form">
                                </div>
                                <h5 class="card-title">Admission Form</h5>
                                <p class="card-subtitle">Download & print admission form</p>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Prospectus -->
                <div class="col-sm-6 col-lg-3 animate-fade-in">
                    <div class="dash-card">
                        <div class="card-accent card-accent-purple"></div>
                        <div class="card-body">
                            <a href="@if ($version_id == 1) # @elseif($version_id == 2) # @endif"
                                target="_blank">
                                <div class="dash-icon-wrapper bg-icon-purple">
                                    <img src="{{ asset('public/dashboard/brochure.png') }}" alt="Prospectus">
                                </div>
                                <h5 class="card-title">Prospectus</h5>
                                <p class="card-subtitle">Download college prospectus</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- ============================================
                                    SUCCESS MODAL
                                    ============================================ -->
        <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <img class="demo-bg" src="{{ asset('public/popsheen.png') }}" alt=""
                        style="opacity:0.15;position:absolute;width:100%;height:100%;object-fit:cover;">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <span class="congrats-icon">🎉</span>
                        <h4 style="color: #ee00bb; font-weight: 700;">Congratulations!</h4>
                        <p>Your Admission Process is completed.</p>
                        <p style="font-size: 0.9rem; color: var(--gray);">
                            <i class="fas fa-info-circle me-1"></i>
                            You will receive further instructions via SMS.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        @if (Session::get('success'))
            $(document).ready(function() {
                $('#modalCenter').modal('show');
            });
        @endif

        @if (Session::get('warning'))
            Swal.fire({
                title: "Warning!",
                text: "{{ Session::get('warning') }}",
                icon: "warning",
                confirmButtonColor: "#4f46e5"
            });
        @endif
    </script>
@endsection
