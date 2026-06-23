@extends('admin.layouts.layout')
@section('content')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('public/backend') }}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="{{ asset('public/backend') }}/assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="{{ asset('public/backend') }}/assets/vendor/libs/bootstrap-select/bootstrap-select.css" />
    <link rel="stylesheet" href="{{ asset('public/backend') }}/assets/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="{{ asset('public/backend') }}/assets/vendor/libs/flatpickr/flatpickr.css" />
    <link rel="stylesheet" href="{{ asset('public/backend') }}/assets/vendor/libs/tagify/tagify.css" />
    <link rel="stylesheet"
        href="{{ asset('public/backend') }}/assets/vendor/libs/@form-validation/umd/styles/index.min.css" />

    <style>
        /* ============================================
                   SESSION PAGE STYLES - VIBRANT COLOR EDITION
                   ============================================ */

        /* Page Header */
        .page-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 30%, #f093fb 60%, #f5576c 100%);
            border-radius: 20px;
            padding: 2rem 2.5rem;
            margin-bottom: 2rem;
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(102, 126, 234, 0.3);
        }

        .page-header::before {
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

        .page-header::after {
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
            0%, 100% { transform: scale(1); opacity: 0.5; }
            50% { transform: scale(1.2); opacity: 0.8; }
        }

        .page-header .header-content {
            position: relative;
            z-index: 1;
        }

        .page-header h2 {
            color: #fff;
            font-weight: 800;
            font-size: 2rem;
            margin-bottom: 0.5rem;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .page-header h2 i {
            background: rgba(255, 255, 255, 0.2);
            padding: 8px 12px;
            border-radius: 12px;
            backdrop-filter: blur(10px);
        }

        .page-header p {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1rem;
            margin-bottom: 0;
        }

        /* Cards - Modern Design */
        .modern-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
            background: #fff;
        }

        .modern-card:hover {
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.1);
            transform: translateY(-4px);
        }

        /* List Card - Gradient Header */
        .list-card .card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #fff;
            border: none;
            padding: 1.2rem 1.5rem;
            font-weight: 700;
            font-size: 1.1rem;
        }

        .list-card .card-header i {
            margin-right: 10px;
        }

        /* Form Card - Colorful Header */
        .form-card .card-header {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: #fff;
            border: none;
            padding: 1.2rem 1.5rem;
            font-weight: 700;
            font-size: 1.1rem;
        }

        .form-card .card-header i {
            margin-right: 10px;
        }

        /* Table Design */
        .table-modern {
            border-radius: 16px;
            overflow: hidden;
        }

        .table-modern thead th {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            border-bottom: 2px solid #e2e8f0;
            font-weight: 700;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            color: #475569;
            padding: 1rem 1.2rem;
        }

        .table-modern tbody td {
            padding: 0.9rem 1.2rem;
            vertical-align: middle;
            font-size: 0.9rem;
            border-bottom: 1px solid #f1f5f9;
        }

        .table-modern tbody tr {
            transition: all 0.3s ease;
        }

        .table-modern tbody tr:hover {
            background: #f8fafc;
            transform: scale(1.01);
        }

        /* Status Badges */
        .status-badge {
            padding: 0.3rem 1rem;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: inline-block;
        }

        .status-badge.active {
            background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
            color: #065f46;
            box-shadow: 0 2px 10px rgba(16, 185, 129, 0.2);
        }

        .status-badge.inactive {
            background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
            color: #991b1b;
            box-shadow: 0 2px 10px rgba(239, 68, 68, 0.2);
        }

        /* Action Buttons */
        .action-btn {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .action-btn:hover {
            transform: scale(1.1);
        }

        .action-btn.edit {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #fff;
            box-shadow: 0 2px 10px rgba(102, 126, 234, 0.3);
        }

        .action-btn.delete {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            color: #fff;
            box-shadow: 0 2px 10px rgba(239, 68, 68, 0.3);
        }

        /* Form Elements */
        .form-control-modern {
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            padding: 0.6rem 1rem;
            transition: all 0.3s ease;
            font-size: 0.9rem;
        }

        .form-control-modern:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
        }

        .form-label-modern {
            font-weight: 600;
            font-size: 0.85rem;
            color: #475569;
            margin-bottom: 0.3rem;
        }

        .form-select-modern {
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            padding: 0.6rem 1rem;
            transition: all 0.3s ease;
            font-size: 0.9rem;
        }

        .form-select-modern:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
        }

        /* Submit Button */
        .btn-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #fff;
            border: none;
            border-radius: 12px;
            padding: 0.6rem 1.8rem;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .btn-gradient:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 25px rgba(102, 126, 234, 0.4);
            color: #fff;
        }

        .btn-gradient:active {
            transform: translateY(0);
        }

        .btn-gradient-secondary {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: #fff;
            border: none;
            border-radius: 12px;
            padding: 0.6rem 1.8rem;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(240, 147, 251, 0.3);
        }

        .btn-gradient-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 25px rgba(240, 147, 251, 0.4);
            color: #fff;
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

        /* Row Gap */
        .row-gap {
            margin-bottom: 1.5rem;
        }

        /* Responsive */
        @media (max-width: 991.98px) {
            .page-header {
                padding: 1.5rem;
                border-radius: 16px;
            }
            .page-header h2 {
                font-size: 1.6rem;
            }
        }

        @media (max-width: 767.98px) {
            .page-header {
                padding: 1.2rem;
                text-align: center;
            }
            .page-header h2 {
                font-size: 1.3rem;
            }
            .table-modern thead th,
            .table-modern tbody td {
                padding: 0.6rem 0.8rem;
                font-size: 0.8rem;
            }
            .form-control-modern {
                font-size: 0.85rem;
            }
        }

        @media (max-width: 575.98px) {
            .page-header h2 {
                font-size: 1.1rem;
            }
            .page-header p {
                font-size: 0.85rem;
            }
            .table-modern thead th,
            .table-modern tbody td {
                padding: 0.4rem 0.6rem;
                font-size: 0.75rem;
            }
        }

        /* Floating Particles */
        .particle {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            animation: floatParticle 6s ease-in-out infinite;
        }

        .particle:nth-child(1) {
            width: 20px;
            height: 20px;
            top: 20%;
            left: 30%;
            animation-delay: 0s;
        }

        .particle:nth-child(2) {
            width: 30px;
            height: 30px;
            top: 60%;
            right: 20%;
            animation-delay: 1s;
        }

        .particle:nth-child(3) {
            width: 15px;
            height: 15px;
            bottom: 20%;
            left: 50%;
            animation-delay: 2s;
        }

        @keyframes floatParticle {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }

        /* Badge Count */
        .badge-count {
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
            padding: 0.2rem 0.8rem;
            border-radius: 50px;
            font-size: 0.75rem;
            backdrop-filter: blur(10px);
        }
    </style>

<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y pt-5">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4 animate-fade-in">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}" style="color: #667eea; text-decoration: none;">
                        <i class="bx bx-home me-1"></i> Dashboard
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page" style="color: #764ba2; font-weight: 600;">
                    <i class="bx bx-calendar-event me-1"></i> Sessions
                </li>
            </ol>
        </nav>

        <!-- Main Content Row -->
        <div class="row g-4">

            <!-- Session List Card -->
            <div class="col-xl-8 col-lg-7 animate-fade-in">
                <div class="card modern-card list-card">
                    <div class="card-header">
                        <i class="bx bx-list-ul"></i> Session List
                        <span class="badge bg-light text-dark ms-2">{{ count($sessions) }}</span>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-modern mb-0">
                                <thead>
                                    <tr>
                                        <th style="width: 50px;">SL</th>
                                        <th>Session Name</th>
                                        <th>Session Code</th>
                                        <th>Status</th>
                                        @if (Auth::user()->is_view_user == 0)
                                        <th style="width: 100px; text-align: center;">Actions</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sessions as $key => $session)
                                    <tr id="row{{ $session->id }}">
                                        <td>
                                            <span class="fw-bold" style="color: #667eea;">{{ $key + 1 }}</span>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="avatar avatar-sm" style="width: 32px; height: 32px; background: linear-gradient(135deg, #667eea, #764ba2); color: #fff; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 14px;">
                                                    <i class="bx bx-calendar"></i>
                                                </div>
                                                <span class="fw-semibold">{{ $session->session_name }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-light text-dark border">{{ $session->session_code }}</span>
                                        </td>
                                        <td>
                                            <span class="status-badge {{ $session->active == 1 ? 'active' : 'inactive' }}">
                                                <i class="bx {{ $session->active == 1 ? 'bx-check-circle' : 'bx-x-circle' }} me-1"></i>
                                                {{ $session->active == 1 ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        @if (Auth::user()->is_view_user == 0)
                                        <td style="text-align: center;">
                                            <div class="d-flex justify-content-center gap-2">
                                                <button class="action-btn edit"
                                                    data-id="{{ $session->id }}"
                                                    data-session_name="{{ $session->session_name }}"
                                                    data-session_code="{{ $session->session_code }}"
                                                    data-active="{{ $session->active }}"
                                                    title="Edit">
                                                    <i class="bx bx-edit-alt"></i>
                                                </button>
                                                <button class="action-btn delete"
                                                    data-url="{{ route('session.destroy', $session->id) }}"
                                                    data-id="{{ $session->id }}"
                                                    title="Delete">
                                                    <i class="bx bx-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                        @endif
                                    </tr> @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Session Form Card -->
            <div class="col-xl-4
        col-lg-5 animate-fade-in">
    <div class="card modern-card form-card">
        <div class="card-header">
            <i class="bx bx-plus-circle"></i> <span id="formTitle">Add New Session</span>
        </div>
        <div class="card-body">
            <form class="needs-validation" method="post" action="{{ route('session.store') }}" novalidate=""
                id="formsubmit">
                @csrf
                <input type="hidden" name="id" id="id" value="0" />

                <div class="mb-3">
                    <label class="form-label-modern" for="session_name">
                        <i class="bx bx-text me-1" style="color: #667eea;"></i> Session Name
                    </label>
                    <input type="text" class="form-control form-control-modern" name="session_name" id="session_name"
                        placeholder="Enter session name (e.g., 2024-2025)" required="">
                    <div class="valid-feedback"> Looks good! </div>
                    <div class="invalid-feedback"> Please enter Session Name. </div>
                </div>

                <div class="mb-3">
                    <label class="form-label-modern" for="session_code">
                        <i class="bx bx-hash me-1" style="color: #667eea;"></i> Session Code
                    </label>
                    <input type="text" class="form-control form-control-modern" name="session_code" id="session_code"
                        placeholder="Enter session code (e.g., 2024)" required="">
                    <div class="valid-feedback"> Looks good! </div>
                    <div class="invalid-feedback"> Please enter Session Code. </div>
                </div>

                <div class="mb-4">
                    <label class="form-label-modern" for="active">
                        <i class="bx bx-toggle-left me-1" style="color: #667eea;"></i> Status
                    </label>
                    <select class="form-select form-select-modern" name="active" id="active" required="">
                        <option value="">Select Status</option>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                    <div class="valid-feedback"> Looks good! </div>
                    <div class="invalid-feedback"> Please select Status. </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        @if (Auth::user()->is_view_user == 0)
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-gradient" id="submit">
                                    <i class="bx bx-save me-1"></i> <span id="submitText">Save Session</span>
                                </button>
                                <button type="button" class="btn btn-gradient-secondary" id="resetForm">
                                    <i class="bx bx-reset me-1"></i> Reset
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>

    </div>
    </div>
    <!-- / Content -->

    <div class="content-backdrop fade"></div>
    </div>

    <!-- JavaScript -->
    <script>
        @if ($errors->any())
            Swal.fire({
                title: "Error",
                text: "{{ implode(',', $errors->all(':message')) }}",
                icon: "warning",
                confirmButtonColor: '#667eea'
            });
        @endif

        @if (Session::get('success'))
            Swal.fire({
                title: "Good job!",
                text: "{{ Session::get('success') }}",
                icon: "success",
                confirmButtonColor: '#667eea'
            });
        @endif

        @if (Session::get('error'))
            Swal.fire({
                title: "Error",
                text: "{{ Session::get('error') }}",
                icon: "warning",
                confirmButtonColor: '#667eea'
            });
        @endif

        $(function() {
            // Edit Session
            $(document.body).on('click', '.edit', function() {
                var id = $(this).data('id');
                var session_name = $(this).data('session_name');
                var session_code = $(this).data('session_code');
                var active = $(this).data('active');

                $('#id').val(id);
                $('#session_name').val(session_name);
                $('#session_code').val(session_code);
                $('#active').val(active);

                $('#submit').removeClass('btn-gradient').addClass('btn-gradient-secondary');
                $('#submitText').text('Update Session');
                $('#formTitle').text('Edit Session');

                // Scroll to form
                $('html, body').animate({
                    scrollTop: $(".form-card").offset().top - 100
                }, 500);
            });

            // Reset Form
            $('#resetForm').on('click', function() {
                $('#id').val(0);
                $('#session_name').val('');
                $('#session_code').val('');
                $('#active').val('');

                $('#submit').removeClass('btn-gradient-secondary').addClass('btn-gradient');
                $('#submitText').text('Save Session');
                $('#formTitle').text('Add New Session');

                // Remove any validation errors
                $('.is-invalid').removeClass('is-invalid');
                $('.invalid-feedback').hide();
            });

            // Delete Session
            $(document.body).on('click', '.delete', function() {
                var id = $(this).data('id');
                var url = $(this).data('url');

                Swal.fire({
                    title: 'Delete Session?',
                    text: 'This action cannot be undone!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#ef4444',
                    cancelButtonColor: '#64748b',
                    confirmButtonText: '<i class="bx bx-trash me-1"></i> Yes, Delete',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "delete",
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                            },
                            url: url,
                            data: {
                                "_token": "{{ csrf_token() }}"
                            },
                            success: function(response) {
                                if (response == 1) {
                                    Swal.fire({
                                        title: "Deleted!",
                                        text: "Session deleted successfully",
                                        icon: "success",
                                        confirmButtonColor: '#667eea'
                                    });
                                    $('#row' + id).remove();

                                    // Update total count
                                    var total = parseInt($('.badge-count').text()
                                        .replace('Total: ', ''));
                                    $('.badge-count').text('Total: ' + (total - 1));
                                } else {
                                    Swal.fire({
                                        title: "Error!",
                                        text: response,
                                        icon: "warning",
                                        confirmButtonColor: '#667eea'
                                    });
                                }
                            },
                            error: function(data, errorThrown) {
                                Swal.fire({
                                    title: "Error",
                                    text: errorThrown,
                                    icon: "warning",
                                    confirmButtonColor: '#667eea'
                                });
                            }
                        });
                    }
                });
            });

            // Form validation
            (function() {
                'use strict';
                var forms = document.querySelectorAll('.needs-validation');
                Array.prototype.slice.call(forms).forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            })();
        });
    </script>
@endsection
