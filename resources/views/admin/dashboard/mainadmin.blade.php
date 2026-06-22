@extends('admin.layouts.layout')

@section('title', 'Dashboard')

@section('page-title', 'Dashboard')

@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

    <style>
        /* ============================================
                                                           DASHBOARD STYLES - VIBRANT COLOR EDITION
                                                           ============================================ */

        /* Dashboard Header - More Vibrant Gradient */
        .dashboard-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 30%, #f093fb 60%, #f5576c 100%);
            border-radius: 24px;
            padding: 2.5rem 3rem;
            margin-bottom: 2.5rem;
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(102, 126, 234, 0.3);
        }

        .dashboard-header::before {
            content: '';
            position: absolute;
            top: -60%;
            right: -10%;
            width: 500px;
            height: 500px;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 50%;
            animation: pulseGlow 4s ease-in-out infinite;
        }

        .dashboard-header::after {
            content: '';
            position: absolute;
            bottom: -40%;
            left: -10%;
            width: 400px;
            height: 400px;
            background: rgba(255, 255, 255, 0.06);
            border-radius: 50%;
            animation: pulseGlow 5s ease-in-out infinite reverse;
        }

        @keyframes pulseGlow {

            0%,
            100% {
                transform: scale(1);
                opacity: 0.5;
            }

            50% {
                transform: scale(1.2);
                opacity: 0.8;
            }
        }

        .dashboard-header .header-content {
            position: relative;
            z-index: 1;
        }

        .dashboard-header h2 {
            color: #fff;
            font-weight: 800;
            font-size: 2.2rem;
            margin-bottom: 0.5rem;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .dashboard-header h2 i {
            background: rgba(255, 255, 255, 0.2);
            padding: 8px 12px;
            border-radius: 12px;
            backdrop-filter: blur(10px);
        }

        .dashboard-header p {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1.05rem;
            margin-bottom: 0;
            font-weight: 400;
        }

        .dashboard-header .header-date {
            color: #fff;
            font-size: 0.9rem;
            background: rgba(255, 255, 255, 0.15);
            padding: 0.5rem 1.5rem;
            border-radius: 50px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        /* Floating particles effect */
        .dashboard-header .particle {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            animation: floatParticle 6s ease-in-out infinite;
        }

        .dashboard-header .particle:nth-child(1) {
            width: 20px;
            height: 20px;
            top: 20%;
            left: 30%;
            animation-delay: 0s;
        }

        .dashboard-header .particle:nth-child(2) {
            width: 30px;
            height: 30px;
            top: 60%;
            right: 20%;
            animation-delay: 1s;
        }

        .dashboard-header .particle:nth-child(3) {
            width: 15px;
            height: 15px;
            bottom: 20%;
            left: 50%;
            animation-delay: 2s;
        }

        @keyframes floatParticle {

            0%,
            100% {
                transform: translateY(0) rotate(0deg);
            }

            50% {
                transform: translateY(-20px) rotate(180deg);
            }
        }

        /* Stat Cards - More Colorful and Vibrant */
        .stat-card {
            border: none;
            border-radius: 20px;
            padding: 1.8rem 1.5rem;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            height: 100%;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: -30%;
            right: -20%;
            width: 120px;
            height: 120px;
            border-radius: 50%;
            opacity: 0.15;
            transition: all 0.4s ease;
        }

        .stat-card::after {
            content: '';
            position: absolute;
            bottom: -40%;
            left: -30%;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            opacity: 0.08;
            transition: all 0.4s ease;
        }

        .stat-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.12);
        }

        .stat-card:hover::before {
            transform: scale(1.5);
            opacity: 0.2;
        }

        .stat-card:hover::after {
            transform: scale(1.3);
            opacity: 0.15;
        }

        .stat-card .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            color: #fff;
            flex-shrink: 0;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
        }

        .stat-card .stat-number {
            font-size: 2.2rem;
            font-weight: 800;
            color: #0f172a;
            line-height: 1.2;
            margin-top: 4px;
        }

        .stat-card .stat-label {
            font-size: 0.9rem;
            color: #64748b;
            font-weight: 500;
            margin-bottom: 0;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .stat-card .stat-change {
            font-size: 0.8rem;
            font-weight: 600;
            padding: 0.2rem 0.8rem;
            border-radius: 50px;
            display: inline-block;
            margin-top: 6px;
        }

        /* Stat card colors - More Vibrant */
        .stat-card-purple {
            background: linear-gradient(135deg, #f5f3ff 0%, #ede9fe 40%, #ddd6fe 100%);
        }

        .stat-card-purple .stat-icon {
            background: linear-gradient(135deg, #7c3aed, #6d28d9);
        }

        .stat-card-purple::before {
            background: #7c3aed;
        }

        .stat-card-purple::after {
            background: #6d28d9;
        }

        .stat-card-blue {
            background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 40%, #bfdbfe 100%);
        }

        .stat-card-blue .stat-icon {
            background: linear-gradient(135deg, #3b82f6, #2563eb);
        }

        .stat-card-blue::before {
            background: #3b82f6;
        }

        .stat-card-blue::after {
            background: #2563eb;
        }

        .stat-card-green {
            background: linear-gradient(135deg, #ecfdf5 0%, #d1fae5 40%, #a7f3d0 100%);
        }

        .stat-card-green .stat-icon {
            background: linear-gradient(135deg, #10b981, #059669);
        }

        .stat-card-green::before {
            background: #10b981;
        }

        .stat-card-green::after {
            background: #059669;
        }

        .stat-card-orange {
            background: linear-gradient(135deg, #fffbeb 0%, #fef3c7 40%, #fde68a 100%);
        }

        .stat-card-orange .stat-icon {
            background: linear-gradient(135deg, #f59e0b, #d97706);
        }

        .stat-card-orange::before {
            background: #f59e0b;
        }

        .stat-card-orange::after {
            background: #d97706;
        }

        .stat-card-pink {
            background: linear-gradient(135deg, #fdf2f8 0%, #fce7f3 40%, #fbcfe8 100%);
        }

        .stat-card-pink .stat-icon {
            background: linear-gradient(135deg, #ec4899, #db2777);
        }

        .stat-card-pink::before {
            background: #ec4899;
        }

        .stat-card-pink::after {
            background: #db2777;
        }

        .stat-card-cyan {
            background: linear-gradient(135deg, #ecfeff 0%, #cffafe 40%, #a5f3fc 100%);
        }

        .stat-card-cyan .stat-icon {
            background: linear-gradient(135deg, #06b6d4, #0891b2);
        }

        .stat-card-cyan::before {
            background: #06b6d4;
        }

        .stat-card-cyan::after {
            background: #0891b2;
        }

        /* Chart Cards - Enhanced */
        .chart-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
            transition: all 0.4s ease;
            overflow: hidden;
            height: 100%;
            background: #fff;
        }

        .chart-card:hover {
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.1);
            transform: translateY(-4px);
        }

        .chart-card .card-header {
            background: linear-gradient(135deg, #f8fafc, #f1f5f9);
            border-bottom: 2px solid #e2e8f0;
            padding: 1.3rem 1.8rem;
            font-weight: 700;
            font-size: 1.05rem;
            color: #0f172a;
        }

        .chart-card .card-body {
            padding: 1.8rem;
        }

        .chart-card .card-header .badge-status {
            font-size: 0.7rem;
            font-weight: 600;
            padding: 0.3rem 1rem;
            border-radius: 50px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: #fff;
        }

        .chart-container {
            position: relative;
            height: 320px;
            width: 100%;
        }

        .chart-container-sm {
            height: 280px;
        }

        /* Complaint Table - Enhanced */
        .complaint-table {
            border-radius: 20px;
            overflow: hidden;
        }

        .complaint-table thead th {
            background: linear-gradient(135deg, #f8fafc, #f1f5f9);
            border-bottom: 2px solid #e2e8f0;
            font-weight: 700;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            color: #475569;
            padding: 1rem 1.2rem;
        }

        .complaint-table tbody td {
            padding: 1rem 1.2rem;
            vertical-align: middle;
            font-size: 0.9rem;
            border-bottom: 1px solid #f1f5f9;
        }

        .complaint-table tbody tr:hover {
            background: #f8fafc;
        }

        .complaint-table .status-badge {
            padding: 0.25rem 1rem;
            border-radius: 50px;
            font-size: 0.7rem;
            font-weight: 600;
            text-transform: uppercase;
        }

        .status-badge.pending {
            background: linear-gradient(135deg, #fef3c7, #fde68a);
            color: #92400e;
        }

        .status-badge.resolved {
            background: linear-gradient(135deg, #d1fae5, #a7f3d0);
            color: #065f46;
        }

        .status-badge.in-progress {
            background: linear-gradient(135deg, #dbeafe, #bfdbfe);
            color: #1e40af;
        }

        .priority-badge {
            padding: 0.2rem 0.8rem;
            border-radius: 50px;
            font-size: 0.65rem;
            font-weight: 700;
            text-transform: uppercase;
        }

        .priority-badge.high {
            background: linear-gradient(135deg, #fee2e2, #fecaca);
            color: #991b1b;
        }

        .priority-badge.medium {
            background: linear-gradient(135deg, #fef3c7, #fde68a);
            color: #92400e;
        }

        .priority-badge.low {
            background: linear-gradient(135deg, #d1fae5, #a7f3d0);
            color: #065f46;
        }

        /* Quick Action Cards - More Vibrant */
        .quick-action {
            border: none;
            border-radius: 20px;
            padding: 1.5rem 1.2rem;
            text-align: center;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
            background: #fff;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
            text-decoration: none;
            display: block;
            height: 100%;
            position: relative;
            overflow: hidden;
        }

        .quick-action::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.05), rgba(118, 75, 162, 0.05));
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .quick-action:hover {
            transform: translateY(-6px) scale(1.02);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.12);
            text-decoration: none;
        }

        .quick-action:hover::before {
            opacity: 1;
        }

        .quick-action .qa-icon {
            width: 56px;
            height: 56px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 0.8rem;
            font-size: 1.5rem;
            color: #fff;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s ease;
        }

        .quick-action:hover .qa-icon {
            transform: scale(1.1) rotate(5deg);
        }

        .quick-action .qa-title {
            font-weight: 700;
            font-size: 0.95rem;
            color: #0f172a;
            margin-bottom: 0.2rem;
        }

        .quick-action .qa-sub {
            font-size: 0.8rem;
            color: #94a3b8;
        }

        /* Animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fadeInUp 0.7s ease forwards;
        }

        .animate-fade-in:nth-child(2) {
            animation-delay: 0.1s;
        }

        .animate-fade-in:nth-child(3) {
            animation-delay: 0.2s;
        }

        .animate-fade-in:nth-child(4) {
            animation-delay: 0.3s;
        }

        .animate-fade-in:nth-child(5) {
            animation-delay: 0.4s;
        }

        .animate-fade-in:nth-child(6) {
            animation-delay: 0.5s;
        }

        .animate-fade-in:nth-child(7) {
            animation-delay: 0.6s;
        }

        .animate-fade-in:nth-child(8) {
            animation-delay: 0.7s;
        }

        /* Responsive */
        @media (max-width: 991.98px) {
            .dashboard-header {
                padding: 1.8rem;
                border-radius: 20px;
            }

            .dashboard-header h2 {
                font-size: 1.6rem;
            }

            .stat-card .stat-number {
                font-size: 1.8rem;
            }

            .chart-container {
                height: 260px;
            }

            .chart-container-sm {
                height: 240px;
            }
        }

        @media (max-width: 767.98px) {
            .dashboard-header {
                padding: 1.5rem;
                text-align: center;
            }

            .dashboard-header .header-date {
                margin-top: 0.8rem;
                display: inline-block;
                font-size: 0.8rem;
            }

            .stat-card {
                padding: 1.2rem;
            }

            .stat-card .stat-icon {
                width: 48px;
                height: 48px;
                font-size: 1.3rem;
            }

            .stat-card .stat-number {
                font-size: 1.5rem;
            }

            .chart-container {
                height: 220px;
            }

            .chart-container-sm {
                height: 200px;
            }

            .complaint-table thead th,
            .complaint-table tbody td {
                padding: 0.7rem 0.9rem;
                font-size: 0.8rem;
            }

            .quick-action .qa-icon {
                width: 44px;
                height: 44px;
                font-size: 1.1rem;
            }
        }

        @media (max-width: 575.98px) {
            .dashboard-header h2 {
                font-size: 1.2rem;
            }

            .dashboard-header p {
                font-size: 0.85rem;
            }

            .stat-card .stat-number {
                font-size: 1.2rem;
            }

            .stat-card .stat-label {
                font-size: 0.75rem;
            }

            .stat-card .stat-icon {
                width: 40px;
                height: 40px;
                font-size: 1rem;
            }

            .chart-container {
                height: 200px;
            }

            .chart-container-sm {
                height: 180px;
            }
        }

        /* Extra spacing */
        .stat-row {
            margin-bottom: 2rem;
        }

        .quick-action-row {
            margin-bottom: 2rem;
        }

        .chart-row {
            margin-bottom: 2rem;
        }

        .complaint-section {
            margin-top: 0.5rem;
        }

        /* Custom scrollbar for table */
        .table-responsive::-webkit-scrollbar {
            height: 6px;
        }

        .table-responsive::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 10px;
        }

        .table-responsive::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 10px;
        }

        /* Container adjustments */
        .container-full {
            max-width: 100%;
            padding-left: 2rem;
            padding-right: 2rem;
        }

        @media (max-width: 767.98px) {
            .container-full {
                padding-left: 1rem;
                padding-right: 1rem;
            }
        }

        @media (max-width: 575.98px) {
            .container-full {
                padding-left: 0.75rem;
                padding-right: 0.75rem;
            }
        }
    </style>

    <div class="content-wrapper">
        <div class="container-full flex-grow-1 container-p-y pt-5">

            <!-- ============================================
                                    STATISTICS CARDS - Colorful & Vibrant
                                    ============================================ -->
            <div class="row g-4 stat-row animate-fade-in">
                <!-- Total Board List - Purple -->
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="stat-card stat-card-purple">
                        <div class="d-flex align-items-start justify-content-between">
                            <div>
                                <div class="stat-label">📋 Total Board List</div>
                                <div class="stat-number">1,284</div>
                            </div>
                            <div class="stat-icon">
                                <i class="bx bx-list-ul"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Admitted - Green -->
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="stat-card stat-card-green">
                        <div class="d-flex align-items-start justify-content-between">
                            <div>
                                <div class="stat-label">✅ Total Admitted</div>
                                <div class="stat-number">847</div>
                            </div>
                            <div class="stat-icon">
                                <i class="bx bx-user-check"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Remaining Seats - Orange -->
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="stat-card stat-card-orange">
                        <div class="d-flex align-items-start justify-content-between">
                            <div>
                                <div class="stat-label">💺 Remaining Seats</div>
                                <div class="stat-number">437</div>
                            </div>
                            <div class="stat-icon">
                                <i class="bx bx-chair"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Daily Admission - Blue -->
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="stat-card stat-card-blue">
                        <div class="d-flex align-items-start justify-content-between">
                            <div>
                                <div class="stat-label">📅 Today's Admission</div>
                                <div class="stat-number">32</div>
                            </div>
                            <div class="stat-icon">
                                <i class="bx bx-user-plus"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- ============================================
                                    QUICK ACTION CARDS - Colorful
                                    ============================================ -->
            <div class="row g-3 quick-action-row animate-fade-in">
                <div class="col-md-3 col-6">
                    <a href="{{ route('boardList') }}" class="quick-action">
                        <div class="qa-icon" style="background: linear-gradient(135deg, #7c3aed, #6d28d9);">
                            <i class="bx bx-list-ul"></i>
                        </div>
                        <div class="qa-title">Board List</div>
                        <div class="qa-sub">Manage board entries</div>
                    </a>
                </div>
                <div class="col-md-3 col-6">
                    <a href="{{ route('admissionlist.index') }}" class="quick-action">
                        <div class="qa-icon" style="background: linear-gradient(135deg, #10b981, #059669);">
                            <i class="bx bx-user-check"></i>
                        </div>
                        <div class="qa-title">Applicants</div>
                        <div class="qa-sub">View all applicants</div>
                    </a>
                </div>
                <div class="col-md-3 col-6">
                    <a href="{{ route('admissionOpen') }}" class="quick-action">
                        <div class="qa-icon" style="background: linear-gradient(135deg, #f59e0b, #d97706);">
                            <i class="bx bx-plus-circle"></i>
                        </div>
                        <div class="qa-title">Open Admission</div>
                        <div class="qa-sub">Start new admission</div>
                    </a>
                </div>
                <div class="col-md-3 col-6">
                    <a href="{{ route('admissionIdCard') }}" class="quick-action">
                        <div class="qa-icon" style="background: linear-gradient(135deg, #ec4899, #db2777);">
                            <i class="bx bx-id-card"></i>
                        </div>
                        <div class="qa-title">ID Cards</div>
                        <div class="qa-sub">Generate ID cards</div>
                    </a>
                </div>
            </div>

            <!-- ============================================
                                    CHARTS SECTION - Two Column Layout
                                    ============================================ -->
            <div class="row g-4 chart-row animate-fade-in">
                <!-- Daily Admission Overview - LINE CHART -->
                <div class="col-xl-8 col-lg-7">
                    <div class="chart-card card">
                        <div class="card-header d-flex justify-content-between align-items-center flex-wrap">
                            <span>📈 Daily Admission Overview</span>
                            <span class="badge-status">
                                <i class="bx bx-calendar me-1"></i> Last 7 Days
                            </span>
                        </div>
                        <div class="card-body">
                            <div class="chart-container">
                                <canvas id="dailyAdmissionChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Admission Status Distribution - DOUGHNUT CHART -->
                <div class="col-xl-4 col-lg-5">
                    <div class="chart-card card">
                        <div class="card-header">
                            <span>📊 Admission Status Distribution</span>
                        </div>
                        <div class="card-body">
                            <div class="chart-container chart-container-sm">
                                <canvas id="statusDistributionChart"></canvas>
                            </div>
                            <div class="row mt-3 text-center">
                                <div class="col-4">
                                    <div class="small text-muted">Admitted</div>
                                    <div class="fw-bold" style="color: #10b981;">847</div>
                                </div>
                                <div class="col-4">
                                    <div class="small text-muted">Remaining</div>
                                    <div class="fw-bold" style="color: #f59e0b;">312</div>
                                </div>
                                <div class="col-4">
                                    <div class="small text-muted">In Progress</div>
                                    <div class="fw-bold" style="color: #6366f1;">80</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ============================================
                                    LATEST COMPLAINTS TABLE - Enhanced
                                    ============================================ -->
            <div class="row complaint-section animate-fade-in">
                <div class="col-12">
                    <div class="chart-card card">
                        <div class="card-header d-flex justify-content-between align-items-center flex-wrap">
                            <span><i class="bx bx-message-alt-error me-2" style="color: #ef4444;"></i> Latest
                                Complaints</span>
                            <span class="badge-status" style="background: linear-gradient(135deg, #ef4444, #dc2626);">
                                5 New
                            </span>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table complaint-table mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Student</th>
                                            <th>Subject</th>
                                            <th>Priority</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="avatar avatar-sm" style="width:32px;height:32px;">
                                                        <img src="https://ui-avatars.com/api/?name=Rahul+Sharma&background=7c3aed&color=fff&size=32"
                                                            alt="avatar" class="rounded-circle"
                                                            style="width:32px;height:32px;">
                                                    </div>
                                                    <span class="fw-semibold">Rahul Sharma</span>
                                                </div>
                                            </td>
                                            <td>Admission fee payment issue</td>
                                            <td><span class="priority-badge high">High</span></td>
                                            <td><span class="status-badge pending">Pending</span></td>
                                            <td>2024-12-20</td>
                                            <td>
                                                <button class="btn btn-sm"
                                                    style="background: linear-gradient(135deg, #667eea, #764ba2); color: #fff; border: none; border-radius: 8px; padding: 0.3rem 1rem;">
                                                    View
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="avatar avatar-sm" style="width:32px;height:32px;">
                                                        <img src="https://ui-avatars.com/api/?name=Priya+Patel&background=10b981&color=fff&size=32"
                                                            alt="avatar" class="rounded-circle"
                                                            style="width:32px;height:32px;">
                                                    </div>
                                                    <span class="fw-semibold">Priya Patel</span>
                                                </div>
                                            </td>
                                            <td>Document verification delay</td>
                                            <td><span class="priority-badge medium">Medium</span></td>
                                            <td><span class="status-badge in-progress">In Progress</span></td>
                                            <td>2024-12-19</td>
                                            <td>
                                                <button class="btn btn-sm"
                                                    style="background: linear-gradient(135deg, #667eea, #764ba2); color: #fff; border: none; border-radius: 8px; padding: 0.3rem 1rem;">
                                                    View
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="avatar avatar-sm" style="width:32px;height:32px;">
                                                        <img src="https://ui-avatars.com/api/?name=Arif+Ahmed&background=f59e0b&color=fff&size=32"
                                                            alt="avatar" class="rounded-circle"
                                                            style="width:32px;height:32px;">
                                                    </div>
                                                    <span class="fw-semibold">Arif Ahmed</span>
                                                </div>
                                            </td>
                                            <td>Wrong subject allocation</td>
                                            <td><span class="priority-badge high">High</span></td>
                                            <td><span class="status-badge resolved">Resolved</span></td>
                                            <td>2024-12-18</td>
                                            <td>
                                                <button class="btn btn-sm"
                                                    style="background: linear-gradient(135deg, #667eea, #764ba2); color: #fff; border: none; border-radius: 8px; padding: 0.3rem 1rem;">
                                                    View
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="avatar avatar-sm" style="width:32px;height:32px;">
                                                        <img src="https://ui-avatars.com/api/?name=Sara+Khan&background=ec4899&color=fff&size=32"
                                                            alt="avatar" class="rounded-circle"
                                                            style="width:32px;height:32px;">
                                                    </div>
                                                    <span class="fw-semibold">Sara Khan</span>
                                                </div>
                                            </td>
                                            <td>ID card not received</td>
                                            <td><span class="priority-badge low">Low</span></td>
                                            <td><span class="status-badge pending">Pending</span></td>
                                            <td>2024-12-17</td>
                                            <td>
                                                <button class="btn btn-sm"
                                                    style="background: linear-gradient(135deg, #667eea, #764ba2); color: #fff; border: none; border-radius: 8px; padding: 0.3rem 1rem;">
                                                    View
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="avatar avatar-sm" style="width:32px;height:32px;">
                                                        <img src="https://ui-avatars.com/api/?name=John+Das&background=3b82f6&color=fff&size=32"
                                                            alt="avatar" class="rounded-circle"
                                                            style="width:32px;height:32px;">
                                                    </div>
                                                    <span class="fw-semibold">John Das</span>
                                                </div>
                                            </td>
                                            <td>Transport service not available</td>
                                            <td><span class="priority-badge medium">Medium</span></td>
                                            <td><span class="status-badge in-progress">In Progress</span></td>
                                            <td>2024-12-16</td>
                                            <td>
                                                <button class="btn btn-sm"
                                                    style="background: linear-gradient(135deg, #667eea, #764ba2); color: #fff; border: none; border-radius: 8px; padding: 0.3rem 1rem;">
                                                    View
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent text-center py-3">
                            <a href="#" class="fw-semibold" style="color: #667eea; text-decoration: none;">
                                View All Complaints <i class="bx bx-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- ============================================
                            CHARTS JAVASCRIPT
                            ============================================ -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // ============================================
            // COLOR PALETTE - Enhanced
            // ============================================
            const colors = {
                primary: '#667eea',
                primaryGradient: 'rgba(102, 126, 234, 0.3)',
                green: '#10b981',
                orange: '#f59e0b',
                blue: '#3b82f6',
                pink: '#ec4899',
                purple: '#7c3aed',
                cyan: '#06b6d4',
                dark: '#0f172a',
                gray: '#94a3b8'
            };

            // ============================================
            // 1. DAILY ADMISSION CHART (LINE CHART)
            // ============================================
            const dailyCtx = document.getElementById('dailyAdmissionChart').getContext('2d');
            new Chart(dailyCtx, {
                type: 'line',
                data: {
                    labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                    datasets: [{
                        label: 'Daily Admissions',
                        data: [28, 35, 42, 30, 48, 22, 32],
                        borderColor: colors.primary,
                        backgroundColor: colors.primaryGradient,
                        fill: true,
                        tension: 0.4,
                        pointBackgroundColor: colors.primary,
                        pointBorderColor: '#fff',
                        pointBorderWidth: 2,
                        pointRadius: 6,
                        pointHoverRadius: 10,
                        borderWidth: 3
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            backgroundColor: '#0f172a',
                            titleColor: '#fff',
                            bodyColor: '#e2e8f0',
                            cornerRadius: 8,
                            padding: 12,
                            callbacks: {
                                label: function(context) {
                                    return 'Admissions: ' + context.parsed.y;
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                display: true,
                                color: 'rgba(0, 0, 0, 0.05)',
                                drawBorder: false
                            },
                            ticks: {
                                stepSize: 10,
                                font: {
                                    size: 11,
                                    weight: '500'
                                }
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                font: {
                                    size: 11,
                                    weight: '600'
                                }
                            }
                        }
                    },
                    interaction: {
                        intersect: false,
                        mode: 'index'
                    }
                }
            });

            // ============================================
            // 2. STATUS DISTRIBUTION CHART (DOUGHNUT)
            // ============================================
            const statusCtx = document.getElementById('statusDistributionChart').getContext('2d');
            new Chart(statusCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Admitted', 'Remaining', 'In Progress'],
                    datasets: [{
                        data: [847, 312, 80],
                        backgroundColor: [
                            colors.green,
                            colors.orange,
                            colors.primary
                        ],
                        borderWidth: 4,
                        borderColor: '#ffffff',
                        hoverOffset: 15
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '60%',
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                padding: 16,
                                usePointStyle: true,
                                pointStyle: 'circle',
                                font: {
                                    size: 12,
                                    weight: '600'
                                },
                                color: '#0f172a'
                            }
                        },
                        tooltip: {
                            backgroundColor: '#0f172a',
                            titleColor: '#fff',
                            bodyColor: '#e2e8f0',
                            cornerRadius: 8,
                            padding: 12,
                            callbacks: {
                                label: function(context) {
                                    let total = context.dataset.data.reduce((a, b) => a + b, 0);
                                    let percentage = ((context.parsed / total) * 100).toFixed(1);
                                    return context.label + ': ' + context.parsed + ' (' + percentage +
                                        '%)';
                                }
                            }
                        }
                    },
                    animation: {
                        animateRotate: true,
                        duration: 1500
                    }
                }
            });

        });
    </script>
@endsection
