@extends('admin.layouts.layout')
@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

    <style>
        /* ============================================
                                   DASHBOARD STYLES
                                   ============================================ */
        .dashboard-header {
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 50%, #a855f7 100%);
            border-radius: 20px;
            padding: 2rem 2.5rem;
            margin-bottom: 2rem;
            position: relative;
            overflow: hidden;
        }

        .dashboard-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 400px;
            height: 400px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
        }

        .dashboard-header::after {
            content: '';
            position: absolute;
            bottom: -30%;
            left: -5%;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.04);
            border-radius: 50%;
        }

        .dashboard-header .header-content {
            position: relative;
            z-index: 1;
        }

        .dashboard-header h2 {
            color: #fff;
            font-weight: 700;
            font-size: 1.8rem;
            margin-bottom: 0.3rem;
        }

        .dashboard-header p {
            color: rgba(255, 255, 255, 0.8);
            font-size: 1rem;
            margin-bottom: 0;
        }

        .dashboard-header .header-date {
            color: rgba(255, 255, 255, 0.9);
            font-size: 0.9rem;
            background: rgba(255, 255, 255, 0.15);
            padding: 0.4rem 1.2rem;
            border-radius: 50px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Stat Cards */
        .stat-card {
            border: none;
            border-radius: 16px;
            padding: 1.5rem 1.2rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            height: 100%;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            opacity: 0.1;
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.12);
        }

        .stat-card .stat-icon {
            width: 56px;
            height: 56px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.6rem;
            color: #fff;
            flex-shrink: 0;
        }

        .stat-card .stat-number {
            font-size: 2rem;
            font-weight: 800;
            color: #0f172a;
            line-height: 1.2;
        }

        .stat-card .stat-label {
            font-size: 0.85rem;
            color: #64748b;
            font-weight: 500;
            margin-bottom: 0;
        }

        .stat-card .stat-change {
            font-size: 0.75rem;
            font-weight: 600;
            padding: 0.15rem 0.6rem;
            border-radius: 50px;
            display: inline-block;
        }

        .stat-card .stat-change.up {
            background: #d1fae5;
            color: #059669;
        }

        .stat-card .stat-change.down {
            background: #fee2e2;
            color: #dc2626;
        }

        .stat-card .stat-change.neutral {
            background: #e0e7ff;
            color: #6366f1;
        }

        /* Stat card colors */
        .stat-card-purple {
            background: linear-gradient(135deg, #f5f3ff 0%, #ede9fe 100%);
        }

        .stat-card-purple .stat-icon {
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
        }

        .stat-card-blue {
            background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
        }

        .stat-card-blue .stat-icon {
            background: linear-gradient(135deg, #3b82f6, #60a5fa);
        }

        .stat-card-green {
            background: linear-gradient(135deg, #ecfdf5 0%, #d1fae5 100%);
        }

        .stat-card-green .stat-icon {
            background: linear-gradient(135deg, #10b981, #34d399);
        }

        .stat-card-orange {
            background: linear-gradient(135deg, #fffbeb 0%, #fef3c7 100%);
        }

        .stat-card-orange .stat-icon {
            background: linear-gradient(135deg, #f59e0b, #fbbf24);
        }

        /* Chart Cards */
        .chart-card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.06);
            transition: all 0.3s ease;
            overflow: hidden;
            height: 100%;
        }

        .chart-card:hover {
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
        }

        .chart-card .card-header {
            background: transparent;
            border-bottom: 1px solid #f1f5f9;
            padding: 1.2rem 1.5rem;
            font-weight: 600;
            font-size: 1rem;
        }

        .chart-card .card-body {
            padding: 1.5rem;
        }

        .chart-card .card-header .badge-status {
            font-size: 0.7rem;
            font-weight: 600;
            padding: 0.2rem 0.8rem;
            border-radius: 50px;
        }

        .chart-container {
            position: relative;
            height: 300px;
            width: 100%;
        }

        .chart-container-sm {
            height: 280px;
        }

        /* Complaint Table */
        .complaint-table {
            border-radius: 16px;
            overflow: hidden;
        }

        .complaint-table thead th {
            background: #f8fafc;
            border-bottom: 2px solid #e2e8f0;
            font-weight: 600;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #64748b;
            padding: 0.8rem 1rem;
        }

        .complaint-table tbody td {
            padding: 0.8rem 1rem;
            vertical-align: middle;
            font-size: 0.9rem;
            border-bottom: 1px solid #f1f5f9;
        }

        .complaint-table tbody tr:hover {
            background: #f8fafc;
        }

        .complaint-table .status-badge {
            padding: 0.2rem 0.8rem;
            border-radius: 50px;
            font-size: 0.7rem;
            font-weight: 600;
        }

        .status-badge.pending {
            background: #fef3c7;
            color: #d97706;
        }

        .status-badge.resolved {
            background: #d1fae5;
            color: #059669;
        }

        .status-badge.in-progress {
            background: #dbeafe;
            color: #2563eb;
        }

        .priority-badge {
            padding: 0.15rem 0.6rem;
            border-radius: 50px;
            font-size: 0.65rem;
            font-weight: 700;
            text-transform: uppercase;
        }

        .priority-badge.high {
            background: #fee2e2;
            color: #dc2626;
        }

        .priority-badge.medium {
            background: #fef3c7;
            color: #d97706;
        }

        .priority-badge.low {
            background: #d1fae5;
            color: #059669;
        }

        /* Quick Action Cards */
        .quick-action {
            border: none;
            border-radius: 16px;
            padding: 1.2rem;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
            background: #fff;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.06);
            text-decoration: none;
            display: block;
            height: 100%;
        }

        .quick-action:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
            text-decoration: none;
        }

        .quick-action .qa-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 0.6rem;
            font-size: 1.3rem;
            color: #fff;
        }

        .quick-action .qa-title {
            font-weight: 600;
            font-size: 0.9rem;
            color: #0f172a;
            margin-bottom: 0.2rem;
        }

        .quick-action .qa-sub {
            font-size: 0.75rem;
            color: #94a3b8;
        }

        /* Responsive */
        @media (max-width: 991.98px) {
            .dashboard-header {
                padding: 1.5rem;
                border-radius: 16px;
            }

            .dashboard-header h2 {
                font-size: 1.4rem;
            }

            .stat-card .stat-number {
                font-size: 1.5rem;
            }

            .chart-container {
                height: 240px;
            }

            .chart-container-sm {
                height: 220px;
            }
        }

        @media (max-width: 767.98px) {
            .dashboard-header {
                padding: 1.2rem;
                text-align: center;
            }

            .dashboard-header .header-date {
                margin-top: 0.5rem;
                display: inline-block;
                font-size: 0.8rem;
            }

            .stat-card {
                padding: 1rem;
            }

            .stat-card .stat-icon {
                width: 44px;
                height: 44px;
                font-size: 1.2rem;
            }

            .stat-card .stat-number {
                font-size: 1.3rem;
            }

            .chart-container {
                height: 200px;
            }

            .chart-container-sm {
                height: 200px;
            }

            .complaint-table thead th,
            .complaint-table tbody td {
                padding: 0.6rem 0.8rem;
                font-size: 0.8rem;
            }

            .quick-action .qa-icon {
                width: 40px;
                height: 40px;
                font-size: 1rem;
            }
        }

        @media (max-width: 575.98px) {
            .dashboard-header h2 {
                font-size: 1.1rem;
            }

            .dashboard-header p {
                font-size: 0.85rem;
            }

            .stat-card .stat-number {
                font-size: 1.1rem;
            }

            .stat-card .stat-label {
                font-size: 0.75rem;
            }

            .stat-card .stat-icon {
                width: 38px;
                height: 38px;
                font-size: 1rem;
            }

            .chart-container {
                height: 180px;
            }

            .chart-container-sm {
                height: 180px;
            }
        }

        /* Animation */
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

        /* Extra spacing between sections */
        .section-gap {
            margin-bottom: 1.5rem;
        }

        .section-gap-lg {
            margin-bottom: 2rem;
        }

        .stat-row {
            margin-bottom: 1.75rem;
        }

        .quick-action-row {
            margin-bottom: 1.75rem;
        }

        .chart-row {
            margin-bottom: 1.75rem;
        }

        .complaint-section {
            margin-top: 0.25rem;
        }
    </style>

    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">

            <!-- ============================================
                                    DASHBOARD HEADER
                                    ============================================ -->
            <div class="dashboard-header animate-fade-in">
                <div class="header-content d-flex flex-wrap justify-content-between align-items-center">
                    <div>
                        <h2><i class="bx bx-home-circle me-2"></i> Dashboard</h2>
                        <p>Welcome back! Here's what's happening with your admission system today.</p>
                    </div>
                    <div class="header-date">
                        {{-- <i class="bx bx-calendar me-1"></i>
                        {{ date('l, d M Y') }} --}}
                    </div>
                </div>
            </div>

            <!-- ============================================
                                    STATISTICS CARDS
                                    ============================================ -->
            <div class="row g-4 stat-row animate-fade-in">
                <!-- Total Board List -->
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="stat-card stat-card-purple">
                        <div class="d-flex align-items-start justify-content-between">
                            <div>
                                <div class="stat-label">Total Board List</div>
                                <div class="stat-number">1,284</div>
                            </div>
                            <div class="stat-icon">
                                <i class="bx bx-list-ul"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Admitted -->
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="stat-card stat-card-green">
                        <div class="d-flex align-items-start justify-content-between">
                            <div>
                                <div class="stat-label">Total Admitted</div>
                                <div class="stat-number">847</div>
                            </div>
                            <div class="stat-icon">
                                <i class="bx bx-user-check"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Remaining Seats -->
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="stat-card stat-card-orange">
                        <div class="d-flex align-items-start justify-content-between">
                            <div>
                                <div class="stat-label">Remaining Seats</div>
                                <div class="stat-number">437</div>
                            </div>
                            <div class="stat-icon">
                                <i class="bx bx-chair"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Daily Admission -->
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="stat-card stat-card-blue">
                        <div class="d-flex align-items-start justify-content-between">
                            <div>
                                <div class="stat-label">Today's Admission</div>
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
                                    QUICK ACTION CARDS
                                    ============================================ -->
            <div class="row g-3 quick-action-row animate-fade-in">
                <div class="col-md-3 col-6">
                    <a href="{{ route('boardList') }}" class="quick-action">
                        <div class="qa-icon" style="background: linear-gradient(135deg, #6366f1, #8b5cf6);">
                            <i class="bx bx-list-ul"></i>
                        </div>
                        <div class="qa-title">Board List</div>
                        <div class="qa-sub">Manage board entries</div>
                    </a>
                </div>
                <div class="col-md-3 col-6">
                    <a href="{{ route('admissionlist.index') }}" class="quick-action">
                        <div class="qa-icon" style="background: linear-gradient(135deg, #10b981, #34d399);">
                            <i class="bx bx-user-check"></i>
                        </div>
                        <div class="qa-title">Applicants</div>
                        <div class="qa-sub">View all applicants</div>
                    </a>
                </div>
                <div class="col-md-3 col-6">
                    <a href="{{ route('admissionOpen') }}" class="quick-action">
                        <div class="qa-icon" style="background: linear-gradient(135deg, #f59e0b, #fbbf24);">
                            <i class="bx bx-plus-circle"></i>
                        </div>
                        <div class="qa-title">Open Admission</div>
                        <div class="qa-sub">Start new admission</div>
                    </a>
                </div>
                <div class="col-md-3 col-6">
                    <a href="{{ route('admissionIdCard') }}" class="quick-action">
                        <div class="qa-icon" style="background: linear-gradient(135deg, #ec4899, #f472b6);">
                            <i class="bx bx-id-card"></i>
                        </div>
                        <div class="qa-title">ID Cards</div>
                        <div class="qa-sub">Generate ID cards</div>
                    </a>
                </div>
            </div>

            <!-- ============================================
                                    CHARTS SECTION - TWO COLUMN LAYOUT
                                    ============================================ -->
            <div class="row g-4 chart-row animate-fade-in">
                <!-- Daily Admission Overview - LINE CHART -->
                <div class="col-xl-8 col-lg-7">
                    <div class="chart-card card">
                        <div class="card-header d-flex justify-content-between align-items-center flex-wrap">
                            <span>📈 Daily Admission Overview</span>
                            <span class="badge-status bg-primary text-white">
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
                                    <div class="fw-bold text-success">847</div>
                                </div>
                                <div class="col-4">
                                    <div class="small text-muted">Remaining</div>
                                    <div class="fw-bold text-warning">312</div>
                                </div>
                                <div class="col-4">
                                    <div class="small text-muted">In Progress</div>
                                    <div class="fw-bold text-primary">80</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ============================================
                                    LATEST COMPLAINTS TABLE
                                    ============================================ -->
            <div class="row complaint-section animate-fade-in">
                <div class="col-12">
                    <div class="chart-card card">
                        <div class="card-header d-flex justify-content-between align-items-center flex-wrap">
                            <span><i class="bx bx-message-alt-error me-2 text-danger"></i> Latest Complaints</span>
                            <span class="badge-status bg-danger text-white">5 New</span>
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
                                                        <img src="https://ui-avatars.com/api/?name=Rahul+Sharma&background=6366f1&color=fff&size=32"
                                                            alt="avatar" class="rounded-circle"
                                                            style="width:32px;height:32px;">
                                                    </div>
                                                    <span>Rahul Sharma</span>
                                                </div>
                                            </td>
                                            <td>Admission fee payment issue</td>
                                            <td><span class="priority-badge high">High</span></td>
                                            <td><span class="status-badge pending">Remaining</span></td>
                                            <td>2024-12-20</td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary">View</button>
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
                                                    <span>Priya Patel</span>
                                                </div>
                                            </td>
                                            <td>Document verification delay</td>
                                            <td><span class="priority-badge medium">Medium</span></td>
                                            <td><span class="status-badge in-progress">In Progress</span></td>
                                            <td>2024-12-19</td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary">View</button>
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
                                                    <span>Arif Ahmed</span>
                                                </div>
                                            </td>
                                            <td>Wrong subject allocation</td>
                                            <td><span class="priority-badge high">High</span></td>
                                            <td><span class="status-badge resolved">Resolved</span></td>
                                            <td>2024-12-18</td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary">View</button>
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
                                                    <span>Sara Khan</span>
                                                </div>
                                            </td>
                                            <td>ID card not received</td>
                                            <td><span class="priority-badge low">Low</span></td>
                                            <td><span class="status-badge pending">Remaining</span></td>
                                            <td>2024-12-17</td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary">View</button>
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
                                                    <span>John Das</span>
                                                </div>
                                            </td>
                                            <td>Transport service not available</td>
                                            <td><span class="priority-badge medium">Medium</span></td>
                                            <td><span class="status-badge in-progress">In Progress</span></td>
                                            <td>2024-12-16</td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary">View</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent text-center">
                            <a href="#" class="text-primary fw-semibold">View All Complaints <i
                                    class="bx bx-chevron-right"></i></a>
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
            // COLOR PALETTE
            // ============================================
            const colors = {
                primary: '#6366f1',
                primaryLight: 'rgba(99, 102, 241, 0.1)',
                primaryGradient: 'rgba(99, 102, 241, 0.3)',
                green: '#10b981',
                greenLight: 'rgba(16, 185, 129, 0.1)',
                orange: '#f59e0b',
                orangeLight: 'rgba(245, 158, 11, 0.1)',
                blue: '#3b82f6',
                blueLight: 'rgba(59, 130, 246, 0.1)',
                pink: '#ec4899',
                purple: '#8b5cf6',
                red: '#ef4444',
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
                        pointRadius: 5,
                        pointHoverRadius: 8,
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
                            padding: 10,
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
                                color: 'rgba(0, 0, 0, 0.04)',
                                drawBorder: false
                            },
                            ticks: {
                                stepSize: 10,
                                font: {
                                    size: 11
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
                                    weight: '500'
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
                        borderWidth: 3,
                        borderColor: '#ffffff',
                        hoverOffset: 10
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '65%',
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                padding: 14,
                                usePointStyle: true,
                                pointStyle: 'circle',
                                font: {
                                    size: 12,
                                    weight: '500'
                                },
                                color: '#0f172a'
                            }
                        },
                        tooltip: {
                            backgroundColor: '#0f172a',
                            titleColor: '#fff',
                            bodyColor: '#e2e8f0',
                            cornerRadius: 8,
                            padding: 10,
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
                        duration: 1200
                    }
                }
            });

        });
    </script>
@endsection
