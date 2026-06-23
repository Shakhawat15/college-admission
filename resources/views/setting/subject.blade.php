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
                   SUBJECT PAGE STYLES - VIBRANT PURPLE/VIOLET EDITION
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
            background: linear-gradient(135deg, #7c3aed 0%, #6d28d9 100%);
            color: #fff;
            border: none;
            padding: 1rem 1.5rem;
            font-weight: 700;
            font-size: 1rem;
        }

        .list-card .card-header i {
            margin-right: 8px;
        }

        /* Form Card - Compact */
        .form-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
            overflow: hidden;
            background: #fff;
        }

        .form-card .card-header {
            background: linear-gradient(135deg, #a78bfa 0%, #8b5cf6 100%);
            color: #fff;
            border: none;
            padding: 0.8rem 1.5rem;
            font-weight: 700;
            font-size: 1rem;
        }

        .form-card .card-header i {
            margin-right: 8px;
        }

        .form-card .card-body {
            padding: 1.2rem 1.5rem 1.5rem 1.5rem;
        }

        /* Compact Form Fields */
        .form-row-compact {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.8rem 1.2rem;
        }

        .form-row-compact .mb-3 {
            margin-bottom: 0 !important;
        }

        .form-row-compact .mb-3.full-width {
            grid-column: 1 / -1;
        }

        .form-control-modern-compact {
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            padding: 0.4rem 0.8rem;
            transition: all 0.3s ease;
            font-size: 0.85rem;
            height: 38px;
        }

        .form-control-modern-compact:focus {
            border-color: #7c3aed;
            box-shadow: 0 0 0 4px rgba(124, 58, 237, 0.1);
        }

        .form-select-modern-compact {
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            padding: 0.4rem 0.8rem;
            transition: all 0.3s ease;
            font-size: 0.85rem;
            height: 38px;
        }

        .form-select-modern-compact:focus {
            border-color: #7c3aed;
            box-shadow: 0 0 0 4px rgba(124, 58, 237, 0.1);
        }

        .form-label-modern-compact {
            font-weight: 600;
            font-size: 0.75rem;
            color: #475569;
            margin-bottom: 0.2rem;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .form-label-modern-compact i {
            color: #7c3aed;
            font-size: 14px;
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
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            color: #475569;
            padding: 0.8rem 1rem;
        }

        .table-modern tbody td {
            padding: 0.7rem 1rem;
            vertical-align: middle;
            font-size: 0.85rem;
            border-bottom: 1px solid #f1f5f9;
            word-wrap: break-word !important;
        }

        .table-modern tbody tr {
            transition: all 0.3s ease;
        }

        .table-modern tbody tr:hover {
            background: #f8fafc;
            transform: scale(1.005);
        }

        /* Status Badges */
        .status-badge {
            padding: 0.2rem 0.8rem;
            border-radius: 50px;
            font-size: 0.7rem;
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
            width: 28px;
            height: 28px;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }

        .action-btn:hover {
            transform: scale(1.1);
        }

        .action-btn.edit {
            background: linear-gradient(135deg, #7c3aed 0%, #6d28d9 100%);
            color: #fff;
            box-shadow: 0 2px 10px rgba(124, 58, 237, 0.3);
        }

        .action-btn.delete {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            color: #fff;
            box-shadow: 0 2px 10px rgba(239, 68, 68, 0.3);
        }

        /* Submit Buttons - Compact */
        .btn-gradient-compact {
            background: linear-gradient(135deg, #7c3aed 0%, #6d28d9 100%);
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 0.4rem 1.2rem;
            font-weight: 600;
            font-size: 0.85rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(124, 58, 237, 0.3);
        }

        .btn-gradient-compact:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 25px rgba(124, 58, 237, 0.4);
            color: #fff;
        }

        .btn-gradient-secondary-compact {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 0.4rem 1.2rem;
            font-weight: 600;
            font-size: 0.85rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
        }

        .btn-gradient-secondary-compact:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 25px rgba(59, 130, 246, 0.4);
            color: #fff;
        }

        /* ============================================
                   PAGINATION STYLES
                   ============================================ */
        .pagination-modern {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 4px;
            padding: 0.5rem 0;
        }

        .pagination-modern .page-item {
            margin: 0 2px;
        }

        .pagination-modern .page-link {
            padding: 0.3rem 0.7rem;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
            background: #fff;
            color: #475569;
            font-weight: 500;
            font-size: 0.8rem;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .pagination-modern .page-link:hover {
            background: #f1f5f9;
            border-color: #cbd5e1;
            transform: translateY(-1px);
        }

        .pagination-modern .page-item.active .page-link {
            background: linear-gradient(135deg, #7c3aed 0%, #6d28d9 100%);
            color: #fff;
            border-color: #7c3aed;
            box-shadow: 0 2px 10px rgba(124, 58, 237, 0.3);
        }

        .pagination-modern .page-item.active .page-link:hover {
            background: linear-gradient(135deg, #7c3aed 0%, #6d28d9 100%);
            color: #fff;
        }

        .pagination-modern .page-item.disabled .page-link {
            opacity: 0.5;
            cursor: not-allowed;
        }

        /* Pagination Info */
        .pagination-info {
            font-size: 0.8rem;
            color: #64748b;
            padding: 0.5rem 0;
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
            .form-row-compact {
                grid-template-columns: 1fr;
            }
            .table-modern thead th,
            .table-modern tbody td {
                padding: 0.5rem 0.7rem;
                font-size: 0.75rem;
            }
        }

        @media (max-width: 767.98px) {
            .table-modern thead th,
            .table-modern tbody td {
                padding: 0.4rem 0.5rem;
                font-size: 0.7rem;
            }
            .form-card .card-body {
                padding: 1rem;
            }
            .pagination-modern {
                justify-content: center;
            }
            .pagination-info {
                text-align: center;
                margin-bottom: 0.5rem;
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
                    <a href="{{ route('dashboard') }}" style="color: #7c3aed; text-decoration: none;">
                        <i class="bx bx-home me-1"></i> Dashboard
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page" style="color: #6d28d9; font-weight: 600;">
                    <i class="bx bx-book-content me-1"></i> Subject
                </li>
            </ol>
        </nav>

       <!-- Main Content Row - 8-4 Layout -->
       <div class="row mb-4 g-4">
          <!-- Subject List Card - 8 Columns -->
          <div class="col-xl-8 col-lg-7 animate-fade-in">
             <div class="card modern-card list-card">
                <h5 class="card-header">
                    <i class="bx bx-book-content me-1"></i> Subject List
                    <span class="badge bg-light text-dark ms-2">{{ $subjects->total() }}</span>
                </h5>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-modern mb-0">
                            <thead>
                                <tr>
                                    <th style="width: 40px;">SL</th>
                                    <th>Subject Name</th>
                                    <th>Subject Name Bn</th>
                                    <th>Parent</th>
                                    <th>Status</th>
                                    @if (Auth::user()->is_view_user == 0)
                                    <th style="width: 80px; text-align: center;">Actions</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subjects as $key => $subject)
                                <tr id="row{{ $subject->id }}">
                                    <td>
                                        <span class="fw-bold" style="color: #7c3aed;">
                                            {{ ($subjects->currentPage() - 1) * $subjects->perPage() + $loop->iteration }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="avatar avatar-sm" style="width: 28px; height: 28px; background: linear-gradient(135deg, #7c3aed, #6d28d9); color: #fff; border-radius: 6px; display: flex; align-items: center; justify-content: center; font-size: 12px;">
                                                <i class="bx bx-book"></i>
                                            </div>
                                            <span class="fw-semibold">{{ $subject->subject_name }}</span>
                                        </div>
                                    </td>
                                    <td>{{ $subject->subject_name_bn }}</td>
                                    <td>{{ $subject->parent_subject }}</td>
                                    <td>
                                        <span class="status-badge {{ $subject->active == 1 ? 'active' : 'inactive' }}">
                                            {{ $subject->active == 1 ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    @if (Auth::user()->is_view_user == 0)
                                    <td style="text-align: center;">
                                        <div class="d-flex justify-content-center gap-1">
                                            <button class="action-btn edit"
                                                data-id="{{ $subject->id }}"
                                                data-subject_name="{{ $subject->subject_name }}"
                                                data-subject_name_bn="{{ $subject->subject_name_bn }}"
                                                data-short_subject="{{ $subject->short_subject }}"
                                                data-parent_subject="{{ $subject->parent_subject }}"
                                                data-publication="{{ $subject->publication }}"
                                                data-details="{{ $subject->details }}"
                                                data-active="{{ $subject->active }}"
                                                title="Edit">
                                                <i class="bx bx-edit-alt"></i>
                                            </button>
                                            <button class="action-btn delete"
                                                data-url="{{ route('subject.destroy', $subject->id) }}"
                                                data-id="{{ $subject->id }}"
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

                    <!-- Pagination -->
                    @if ($subjects->hasPages())
<div class="d-flex
        justify-content-between align-items-center flex-wrap px-3 py-2 border-top">
    <div class="pagination-info">
        Showing {{ $subjects->firstItem() }} to {{ $subjects->lastItem() }} of {{ $subjects->total() }} entries
    </div>
    <nav>
        <ul class="pagination pagination-modern mb-0">
            {{-- Previous Page Link --}}
            @if ($subjects->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link">‹</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $subjects->previousPageUrl() }}" rel="prev">‹</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($subjects->links()->elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $subjects->currentPage())
                            <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($subjects->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $subjects->nextPageUrl() }}" rel="next">›</a>
                </li>
            @else
                <li class="page-item disabled">
                    <span class="page-link">›</span>
                </li>
            @endif
        </ul>
    </nav>
    </div>
    @endif
    </div>
    </div>
    </div>

    <!-- Subject Form Card - 4 Columns -->
    <div class="col-xl-4 col-lg-5 animate-fade-in">
        <div class="form-card">
            <div class="card-header">
                <i class="bx bx-plus-circle me-1"></i> <span id="formTitle">Add Subject</span>
            </div>
            <div class="card-body">
                <form class="needs-validation" method="post" action="{{ route('subject.store') }}" novalidate=""
                    id="formsubmit">
                    @csrf
                    <input type="hidden" name="id" id="id" value="0" />

                    <div class="form-row-compact">
                        <div class="mb-3">
                            <label class="form-label-modern-compact" for="subject_name">
                                <i class="bx bx-text"></i> Subject Name
                            </label>
                            <input type="text" class="form-control-modern-compact" name="subject_name" id="subject_name"
                                placeholder="e.g. Mathematics" required="">
                            <div class="invalid-feedback" style="font-size: 0.7rem;">Required</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label-modern-compact" for="short_subject">
                                <i class="bx bx-text"></i> Short Name
                            </label>
                            <input type="text" class="form-control-modern-compact" name="short_subject"
                                id="short_subject" placeholder="e.g. Math" required="">
                            <div class="invalid-feedback" style="font-size: 0.7rem;">Required</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label-modern-compact" for="subject_name_bn">
                                <i class="bx bx-text"></i> Subject Name Bn
                            </label>
                            <input type="text" class="form-control-modern-compact" name="subject_name_bn"
                                id="subject_name_bn" placeholder="বাংলা নাম" required="">
                            <div class="invalid-feedback" style="font-size: 0.7rem;">Required</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label-modern-compact" for="parent_subject">
                                <i class="bx bx-layer"></i> Parent Subject
                            </label>
                            <input type="text" class="form-control-modern-compact" name="parent_subject"
                                id="parent_subject" placeholder="Parent subject" required="">
                            <div class="invalid-feedback" style="font-size: 0.7rem;">Required</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label-modern-compact" for="publication">
                                <i class="bx bx-book"></i> Publication
                            </label>
                            <input type="text" class="form-control-modern-compact" name="publication"
                                id="publication" placeholder="Publication" required="">
                            <div class="invalid-feedback" style="font-size: 0.7rem;">Required</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label-modern-compact" for="active">
                                <i class="bx bx-toggle-left"></i> Status
                            </label>
                            <select class="form-select-modern-compact" name="active" id="active" required="">
                                <option value="">Select</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                            <div class="invalid-feedback" style="font-size: 0.7rem;">Required</div>
                        </div>

                        <div class="mb-3 full-width">
                            <label class="form-label-modern-compact" for="details">
                                <i class="bx bx-detail"></i> Details
                            </label>
                            <input type="text" class="form-control-modern-compact" name="details" id="details"
                                placeholder="Additional details (optional)">
                        </div>
                    </div>

                    <div class="d-flex gap-2 mt-2">
                        @if (Auth::user()->is_view_user == 0)
                            <button type="submit" class="btn-gradient-compact" id="submit">
                                <i class="bx bx-save me-1"></i> <span id="submitText">Save</span>
                            </button>
                            <button type="button" class="btn-gradient-secondary-compact" id="resetForm">
                                <i class="bx bx-reset me-1"></i> Reset
                            </button>
                        @endif
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

    <script>
        @if ($errors->any())
            Swal.fire({
                title: "Error",
                text: "{{ implode(',', $errors->all(':message')) }}",
                icon: "warning",
                confirmButtonColor: '#7c3aed'
            });
        @endif

        @if (Session::get('success'))
            Swal.fire({
                title: "Good job!",
                text: "{{ Session::get('success') }}",
                icon: "success",
                confirmButtonColor: '#7c3aed'
            });
        @endif

        @if (Session::get('error'))
            Swal.fire({
                title: "Error",
                text: "{{ Session::get('error') }}",
                icon: "warning",
                confirmButtonColor: '#7c3aed'
            });
        @endif

        @if (Session::get('warning'))
            Swal.fire({
                title: "Warning",
                text: "{{ Session::get('warning') }}",
                icon: "warning",
                confirmButtonColor: '#7c3aed'
            });
        @endif

        $(function() {
            // Edit Subject
            $(document.body).on('click', '.edit', function() {
                var id = $(this).data('id');
                var subject_name = $(this).data('subject_name');
                var subject_name_bn = $(this).data('subject_name_bn');
                var publication = $(this).data('publication');
                var details = $(this).data('details');
                var short_subject = $(this).data('short_subject');
                var parent_subject = $(this).data('parent_subject');
                var active = $(this).data('active');

                $('#id').val(id);
                $('#subject_name').val(subject_name);
                $('#subject_name_bn').val(subject_name_bn);
                $('#short_subject').val(short_subject);
                $('#parent_subject').val(parent_subject);
                $('#publication').val(publication);
                $('#details').val(details);
                $('#active').val(active);

                $('#submit').removeClass('btn-gradient-compact').addClass('btn-gradient-secondary-compact');
                $('#submitText').text('Update');
                $('#formTitle').text('Edit Subject');

                // Scroll to form
                $('html, body').animate({
                    scrollTop: $(".form-card").offset().top - 100
                }, 500);
            });

            // Reset Form
            $('#resetForm').on('click', function() {
                $('#id').val(0);
                $('#subject_name').val('');
                $('#subject_name_bn').val('');
                $('#short_subject').val('');
                $('#parent_subject').val('');
                $('#publication').val('');
                $('#details').val('');
                $('#active').val('');

                $('#submit').removeClass('btn-gradient-secondary-compact').addClass('btn-gradient-compact');
                $('#submitText').text('Save');
                $('#formTitle').text('Add Subject');

                // Remove any validation errors
                $('.is-invalid').removeClass('is-invalid');
                $('.invalid-feedback').hide();
            });

            // Delete Subject
            $(document.body).on('click', '.delete', function() {
                var id = $(this).data('id');
                var url = $(this).data('url');

                Swal.fire({
                    title: 'Delete Subject?',
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
                                        text: "Subject deleted successfully",
                                        icon: "success",
                                        confirmButtonColor: '#7c3aed'
                                    });
                                    $('#row' + id).remove();
                                } else {
                                    Swal.fire({
                                        title: "Error!",
                                        text: response,
                                        icon: "warning",
                                        confirmButtonColor: '#7c3aed'
                                    });
                                }
                            },
                            error: function(data, errorThrown) {
                                Swal.fire({
                                    title: "Error",
                                    text: errorThrown,
                                    icon: "warning",
                                    confirmButtonColor: '#7c3aed'
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
