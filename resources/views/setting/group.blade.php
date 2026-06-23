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
                   GROUP PAGE STYLES - VIBRANT PINK/ROSE EDITION
                   ============================================ */

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
            background: linear-gradient(135deg, #ec4899 0%, #db2777 100%);
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
            background: linear-gradient(135deg, #f472b6 0%, #fbcfe8 100%);
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
            background: linear-gradient(135deg, #ec4899 0%, #db2777 100%);
            color: #fff;
            box-shadow: 0 2px 10px rgba(236, 72, 153, 0.3);
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
            border-color: #ec4899;
            box-shadow: 0 0 0 4px rgba(236, 72, 153, 0.1);
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
            border-color: #ec4899;
            box-shadow: 0 0 0 4px rgba(236, 72, 153, 0.1);
        }

        /* Submit Button */
        .btn-gradient {
            background: linear-gradient(135deg, #ec4899 0%, #db2777 100%);
            color: #fff;
            border: none;
            border-radius: 12px;
            padding: 0.6rem 1.8rem;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(236, 72, 153, 0.3);
        }

        .btn-gradient:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 25px rgba(236, 72, 153, 0.4);
            color: #fff;
        }

        .btn-gradient:active {
            transform: translateY(0);
        }

        .btn-gradient-secondary {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: #fff;
            border: none;
            border-radius: 12px;
            padding: 0.6rem 1.8rem;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
        }

        .btn-gradient-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 25px rgba(59, 130, 246, 0.4);
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

        /* Responsive */
        @media (max-width: 991.98px) {
            .table-modern thead th,
            .table-modern tbody td {
                padding: 0.6rem 0.8rem;
                font-size: 0.8rem;
            }
        }

        @media (max-width: 767.98px) {
            .table-modern thead th,
            .table-modern tbody td {
                padding: 0.4rem 0.6rem;
                font-size: 0.75rem;
            }
            .form-control-modern {
                font-size: 0.85rem;
            }
        }
    </style>

<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y pt-4">

        <!-- Simple Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4 animate-fade-in">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}" style="color: #ec4899; text-decoration: none;">
                        <i class="bx bx-home me-1"></i> Dashboard
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page" style="color: #db2777; font-weight: 600;">
                    <i class="bx bx-group me-1"></i> Group
                </li>
            </ol>
        </nav>

       <!-- Main Content Row -->
       <div class="row mb-4">
          <!-- Group List Card -->
          <div class="col-md mb-4 mb-md-0 animate-fade-in">
             <div class="card modern-card list-card">
                <h5 class="card-header">
                    <i class="bx bx-group me-1"></i> Group List
                    <span class="badge bg-light text-dark ms-2">{{ count($academyGroups) }}</span>
                </h5>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-modern mb-0">
                            <thead>
                                <tr>
                                    <th style="width: 50px;">SL</th>
                                    <th>Group Name</th>
                                    <th>Status</th>
                                    @if (Auth::user()->is_view_user == 0)
                                    <th style="width: 100px; text-align: center;">Actions</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($academyGroups as $key => $group)
                                <tr id="row{{ $group->id }}">
                                    <td>
                                        <span class="fw-bold" style="color: #ec4899;">{{ $key + 1 }}</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="avatar avatar-sm" style="width: 32px; height: 32px; background: linear-gradient(135deg, #ec4899, #db2777); color: #fff; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 14px;">
                                                <i class="bx bx-group"></i>
                                            </div>
                                            <span class="fw-semibold">{{ $group->group_name }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="status-badge {{ $group->active == 1 ? 'active' : 'inactive' }}">
                                            <i class="bx {{ $group->active == 1 ? 'bx-check-circle' : 'bx-x-circle' }} me-1"></i>
                                            {{ $group->active == 1 ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    @if (Auth::user()->is_view_user == 0)
                                    <td style="text-align: center;">
                                        <div class="d-flex justify-content-center gap-2">
                                            <button class="action-btn edit"
                                                data-id="{{ $group->id }}"
                                                data-group_name="{{ $group->group_name }}"
                                                data-active="{{ $group->active }}"
                                                title="Edit">
                                                <i class="bx bx-edit-alt"></i>
                                            </button>
                                            <button class="action-btn delete"
                                                data-url="{{ route('group.destroy', $group->id) }}"
                                                data-id="{{ $group->id }}"
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

          <!-- Group Form Card -->
          <div class="col-md
        animate-fade-in">
    <div class="card modern-card form-card">
        <h5 class="card-header">
            <i class="bx bx-plus-circle me-1"></i> <span id="formTitle">Add New Group</span>
        </h5>
        <div class="card-body">
            <form class="needs-validation" method="post" action="{{ route('group.store') }}" novalidate=""
                id="formsubmit">
                @csrf
                <input type="hidden" name="id" id="id" value="0" />

                <div class="mb-3">
                    <label class="form-label-modern" for="group_name">
                        <i class="bx bx-text me-1" style="color: #ec4899;"></i> Group Name
                    </label>
                    <input type="text" class="form-control form-control-modern" name="group_name" id="group_name"
                        placeholder="Enter group name" required="">
                    <div class="valid-feedback"> Looks good! </div>
                    <div class="invalid-feedback"> Please enter Group Name. </div>
                </div>

                <div class="mb-4">
                    <label class="form-label-modern" for="active">
                        <i class="bx bx-toggle-left me-1" style="color: #ec4899;"></i> Status
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
                                    <i class="bx bx-save me-1"></i> <span id="submitText">Save Group</span>
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
                confirmButtonColor: '#ec4899'
            });
        @endif

        @if (Session::get('success'))
            Swal.fire({
                title: "Good job!",
                text: "{{ Session::get('success') }}",
                icon: "success",
                confirmButtonColor: '#ec4899'
            });
        @endif

        @if (Session::get('error'))
            Swal.fire({
                title: "Error",
                text: "{{ Session::get('error') }}",
                icon: "warning",
                confirmButtonColor: '#ec4899'
            });
        @endif

        $(function() {
            // Edit Group
            $(document.body).on('click', '.edit', function() {
                var id = $(this).data('id');
                var group_name = $(this).data('group_name');
                var active = $(this).data('active');

                $('#id').val(id);
                $('#group_name').val(group_name);
                $('#active').val(active);

                $('#submit').removeClass('btn-gradient').addClass('btn-gradient-secondary');
                $('#submitText').text('Update Group');
                $('#formTitle').text('Edit Group');

                // Scroll to form
                $('html, body').animate({
                    scrollTop: $(".form-card").offset().top - 100
                }, 500);
            });

            // Reset Form
            $('#resetForm').on('click', function() {
                $('#id').val(0);
                $('#group_name').val('');
                $('#active').val('');

                $('#submit').removeClass('btn-gradient-secondary').addClass('btn-gradient');
                $('#submitText').text('Save Group');
                $('#formTitle').text('Add New Group');

                // Remove any validation errors
                $('.is-invalid').removeClass('is-invalid');
                $('.invalid-feedback').hide();
            });

            // Delete Group
            $(document.body).on('click', '.delete', function() {
                var id = $(this).data('id');
                var url = $(this).data('url');

                Swal.fire({
                    title: 'Delete Group?',
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
                                        text: "Group deleted successfully",
                                        icon: "success",
                                        confirmButtonColor: '#ec4899'
                                    });
                                    $('#row' + id).remove();
                                } else {
                                    Swal.fire({
                                        title: "Error!",
                                        text: response,
                                        icon: "warning",
                                        confirmButtonColor: '#ec4899'
                                    });
                                }
                            },
                            error: function(data, errorThrown) {
                                Swal.fire({
                                    title: "Error",
                                    text: errorThrown,
                                    icon: "warning",
                                    confirmButtonColor: '#ec4899'
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
