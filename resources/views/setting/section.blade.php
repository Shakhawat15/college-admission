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

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">

    <style>
        /* ============================================
                   SECTION PAGE STYLES - VIBRANT AMBER/GOLD EDITION
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
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
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
            background: linear-gradient(135deg, #fbbf24 0%, #fcd34d 100%);
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

        .form-control-modern-compact {
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            padding: 0.4rem 0.8rem;
            transition: all 0.3s ease;
            font-size: 0.85rem;
            height: 38px;
        }

        .form-control-modern-compact:focus {
            border-color: #f59e0b;
            box-shadow: 0 0 0 4px rgba(245, 158, 11, 0.1);
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
            border-color: #f59e0b;
            box-shadow: 0 0 0 4px rgba(245, 158, 11, 0.1);
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
            color: #f59e0b;
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
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            color: #fff;
            box-shadow: 0 2px 10px rgba(245, 158, 11, 0.3);
        }

        .action-btn.delete {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            color: #fff;
            box-shadow: 0 2px 10px rgba(239, 68, 68, 0.3);
        }

        /* Submit Buttons - Compact */
        .btn-gradient-compact {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 0.4rem 1.2rem;
            font-weight: 600;
            font-size: 0.85rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(245, 158, 11, 0.3);
        }

        .btn-gradient-compact:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 25px rgba(245, 158, 11, 0.4);
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
                   BETTER DATATABLES PAGINATION STYLING
                   ============================================ */
        .dataTables_wrapper .dataTables_paginate {
            padding: 0.5rem 0;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 4px;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 0.3rem 0.7rem !important;
            border-radius: 8px !important;
            border: 1px solid #e2e8f0 !important;
            background: #fff !important;
            color: #475569 !important;
            font-weight: 500 !important;
            font-size: 0.8rem !important;
            transition: all 0.3s ease !important;
            margin: 0 2px !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: #f1f5f9 !important;
            border-color: #cbd5e1 !important;
            transform: translateY(-1px) !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%) !important;
            color: #fff !important;
            border-color: #f59e0b !important;
            box-shadow: 0 2px 10px rgba(245, 158, 11, 0.3) !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%) !important;
            color: #fff !important;
            transform: translateY(-1px) !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled {
            opacity: 0.5 !important;
            cursor: not-allowed !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.previous,
        .dataTables_wrapper .dataTables_paginate .paginate_button.next {
            padding: 0.3rem 0.9rem !important;
        }

        /* DataTables Info */
        .dataTables_wrapper .dataTables_info {
            padding: 0.5rem 0;
            font-size: 0.8rem;
            color: #64748b;
        }

        /* DataTables Length & Filter */
        .dataTables_wrapper .dataTables_length {
            font-size: 0.8rem;
            color: #475569;
        }

        .dataTables_wrapper .dataTables_length select {
            border-radius: 8px;
            border: 2px solid #e2e8f0;
            padding: 0.2rem 0.5rem;
            font-size: 0.8rem;
            background: #fff;
        }

        .dataTables_wrapper .dataTables_filter {
            font-size: 0.8rem;
            color: #475569;
        }

        .dataTables_wrapper .dataTables_filter input {
            border-radius: 8px;
            border: 2px solid #e2e8f0;
            padding: 0.2rem 0.5rem;
            font-size: 0.8rem;
            background: #fff;
        }

        .dataTables_wrapper .dataTables_filter input:focus {
            border-color: #f59e0b;
            outline: none;
        }

        /* DataTables Buttons */
        .dt-buttons .dt-button {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%) !important;
            color: #fff !important;
            border: none !important;
            border-radius: 8px !important;
            padding: 0.25rem 0.7rem !important;
            margin: 0 2px !important;
            font-weight: 600 !important;
            font-size: 0.7rem !important;
            transition: all 0.3s ease !important;
        }

        .dt-buttons .dt-button:hover {
            transform: translateY(-2px) !important;
            box-shadow: 0 4px 15px rgba(245, 158, 11, 0.3) !important;
            color: #fff !important;
        }

        /* DataTables Top Bar */
        .dataTables_wrapper .dataTables_top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.5rem 1rem;
            background: #f8fafc;
            border-radius: 12px 12px 0 0;
            border-bottom: 1px solid #e2e8f0;
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
            .dataTables_wrapper .dataTables_top {
                flex-direction: column;
                gap: 0.5rem;
                padding: 0.5rem;
            }
            .dataTables_wrapper .dataTables_paginate {
                justify-content: center;
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
                    <a href="{{ route('dashboard') }}" style="color: #f59e0b; text-decoration: none;">
                        <i class="bx bx-home me-1"></i> Dashboard
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page" style="color: #d97706; font-weight: 600;">
                    <i class="bx bx-columns me-1"></i> Section
                </li>
            </ol>
        </nav>

       <!-- Main Content Row - 8-4 Layout -->
       <div class="row mb-4 g-4">
          <!-- Section List Card - 8 Columns -->
          <div class="col-xl-8 col-lg-7 animate-fade-in">
             <div class="card modern-card list-card">
                <h5 class="card-header">
                    <i class="bx bx-columns me-1"></i> Section List
                    <span class="badge bg-light text-dark ms-2">{{ count($sections) }}</span>
                </h5>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-modern mb-0" id="headerTable">
                            <thead>
                                <tr>
                                    <th style="width: 40px;">SL</th>
                                    <th>Section Name</th>
                                    <th>Class Name</th>
                                    <th>Version</th>
                                    <th>Group</th>
                                    <th>Status</th>
                                    @if (Auth::user()->is_view_user == 0)
                                    <th style="width: 80px; text-align: center;">Actions</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sections as $key => $section)
                                <tr id="row{{ $section->id }}">
                                    <td>
                                        <span class="fw-bold" style="color: #f59e0b;">{{ $key + 1 }}</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="avatar avatar-sm" style="width: 28px; height: 28px; background: linear-gradient(135deg, #f59e0b, #d97706); color: #fff; border-radius: 6px; display: flex; align-items: center; justify-content: center; font-size: 12px;">
                                                <i class="bx bx-columns"></i>
                                            </div>
                                            <span class="fw-semibold">{{ $section->section_name }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-dark border" style="font-size: 0.75rem;">{{ $section->classvalue->class_name ?? 'N/A' }}</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-dark border" style="font-size: 0.75rem;">{{ $section->version->version_name ?? 'N/A' }}</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-dark border" style="font-size: 0.75rem;">{{ $section->group->group_name ?? 'N/A' }}</span>
                                    </td>
                                    <td>
                                        <span class="status-badge {{ $section->active == 1 ? 'active' : 'inactive' }}">
                                            <i class="bx {{ $section->active == 1 ? 'bx-check-circle' : 'bx-x-circle' }} me-1"></i>
                                            {{ $section->active == 1 ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    @if (Auth::user()->is_view_user == 0)
                                    <td style="text-align: center;">
                                        <div class="d-flex justify-content-center gap-1">
                                            <button class="action-btn edit"
                                                data-id="{{ $section->id }}"
                                                data-section_name="{{ $section->section_name }}"
                                                data-active="{{ $section->active }}"
                                                data-class_code="{{ $section->class_code }}"
                                                data-group_id="{{ $section->group_id }}"
                                                data-version_id="{{ $section->version_id }}"
                                                data-serial="{{ $section->serial }}"
                                                title="Edit">
                                                <i class="bx bx-edit-alt"></i>
                                            </button>
                                            <button class="action-btn delete"
                                                data-url="{{ route('section.destroy', $section->id) }}"
                                                data-id="{{ $section->id }}"
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

          <!-- Section Form Card - 4 Columns -->
          <div class="col-xl-4
        col-lg-5 animate-fade-in">
    <div class="form-card">
        <div class="card-header">
            <i class="bx bx-plus-circle me-1"></i> <span id="formTitle">Add Section</span>
        </div>
        <div class="card-body">
            <form class="needs-validation" method="post" action="{{ route('section.store') }}" novalidate=""
                id="formsubmit">
                @csrf
                <input type="hidden" name="id" id="id" value="0" />

                <div class="form-row-compact">
                    <div class="mb-3">
                        <label class="form-label-modern-compact" for="section_name">
                            <i class="bx bx-text"></i> Section Name
                        </label>
                        <input type="text" class="form-control-modern-compact" name="section_name" id="section_name"
                            placeholder="e.g. Section A" required="">
                        <div class="invalid-feedback" style="font-size: 0.7rem;">Required</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label-modern-compact" for="class_code">
                            <i class="bx bx-book"></i> Class
                        </label>
                        <select class="form-select-modern-compact" name="class_code" id="class_code" required="">
                            <option value="">Select</option>
                            <option value="0">KG</option>
                            <option value="1">Class I</option>
                            <option value="2">Class II</option>
                            <option value="3">Class III</option>
                            <option value="4">Class IV</option>
                            <option value="5">Class V</option>
                            <option value="6">Class VI</option>
                            <option value="7">Class VII</option>
                            <option value="8">Class VIII</option>
                            <option value="9">Class IX</option>
                            <option value="10">Class X</option>
                            <option value="11">Class XI</option>
                            <option value="12">Class XII</option>
                        </select>
                        <div class="invalid-feedback" style="font-size: 0.7rem;">Required</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label-modern-compact" for="version_id">
                            <i class="bx bx-layer"></i> Version
                        </label>
                        <select class="form-select-modern-compact" name="version_id" id="version_id">
                            <option value="">Select</option>
                            @foreach ($versions as $version)
                                <option value="{{ $version->id }}">{{ $version->version_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label-modern-compact" for="group_id">
                            <i class="bx bx-group"></i> Group
                        </label>
                        <select class="form-select-modern-compact" name="group_id" id="group_id">
                            <option value="">Select</option>
                            @foreach ($groups as $group)
                                <option value="{{ $group->id }}">{{ $group->group_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label-modern-compact" for="serial">
                            <i class="bx bx-hash"></i> Serial
                        </label>
                        <input type="text" class="form-control-modern-compact" name="serial" id="serial"
                            placeholder="e.g. 1" required="">
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

    <!-- DataTables Scripts -->
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>

    <script>
        $(document).ready(function() {
            $('#headerTable').DataTable({
                dom: '<"dataTables_top"lfB>rtip',
                buttons: [{
                        extend: 'copy',
                        text: '<i class="bx bx-copy"></i> Copy',
                        className: 'btn btn-gradient btn-sm'
                    },
                    {
                        extend: 'csv',
                        text: '<i class="bx bx-file"></i> CSV',
                        className: 'btn btn-gradient btn-sm'
                    },
                    {
                        extend: 'excel',
                        text: '<i class="bx bx-file-blank"></i> Excel',
                        className: 'btn btn-gradient btn-sm'
                    },
                    {
                        extend: 'pdf',
                        text: '<i class="bx bx-file"></i> PDF',
                        className: 'btn btn-gradient btn-sm'
                    },
                    {
                        extend: 'print',
                        text: '<i class="bx bx-printer"></i> Print',
                        className: 'btn btn-gradient btn-sm'
                    }
                ],
                language: {
                    search: "Search:",
                    lengthMenu: "Show _MENU_ entries",
                    info: "Showing _START_ to _END_ of _TOTAL_ entries",
                    infoEmpty: "Showing 0 to 0 of 0 entries",
                    infoFiltered: "(filtered from _MAX_ total entries)",
                    paginate: {
                        first: "«",
                        last: "»",
                        next: "›",
                        previous: "‹"
                    }
                },
                columnDefs: [{
                    orderable: false,
                    targets: [6]
                }],
                pageLength: 10,
                lengthMenu: [10, 25, 50, 100],
                responsive: true,
                order: [
                    [0, 'asc']
                ]
            });
        });

        @if ($errors->any())
            Swal.fire({
                title: "Error",
                text: "{{ implode(',', $errors->all(':message')) }}",
                icon: "warning",
                confirmButtonColor: '#f59e0b'
            });
        @endif

        @if (Session::get('success'))
            Swal.fire({
                title: "Good job!",
                text: "{{ Session::get('success') }}",
                icon: "success",
                confirmButtonColor: '#f59e0b'
            });
        @endif

        @if (Session::get('error'))
            Swal.fire({
                title: "Error",
                text: "{{ Session::get('error') }}",
                icon: "warning",
                confirmButtonColor: '#f59e0b'
            });
        @endif

        $(function() {
            // Edit Section
            $(document.body).on('click', '.edit', function() {
                var id = $(this).data('id');
                var section_name = $(this).data('section_name');
                var class_code = $(this).data('class_code');
                var group_id = $(this).data('group_id');
                var serial = $(this).data('serial');
                var version_id = $(this).data('version_id');
                var active = $(this).data('active');

                $('#id').val(id);
                $('#section_name').val(section_name);
                $('#class_code').val(class_code);
                $('#group_id').val(group_id);
                $('#version_id').val(version_id);
                $('#serial').val(serial);
                $('#active').val(active);

                $('#submit').removeClass('btn-gradient-compact').addClass('btn-gradient-secondary-compact');
                $('#submitText').text('Update');
                $('#formTitle').text('Edit Section');

                // Scroll to form
                $('html, body').animate({
                    scrollTop: $(".form-card").offset().top - 100
                }, 500);
            });

            // Reset Form
            $('#resetForm').on('click', function() {
                $('#id').val(0);
                $('#section_name').val('');
                $('#class_code').val('');
                $('#group_id').val('');
                $('#version_id').val('');
                $('#serial').val('');
                $('#active').val('');

                $('#submit').removeClass('btn-gradient-secondary-compact').addClass('btn-gradient-compact');
                $('#submitText').text('Save');
                $('#formTitle').text('Add Section');

                // Remove any validation errors
                $('.is-invalid').removeClass('is-invalid');
                $('.invalid-feedback').hide();
            });

            // Delete Section
            $(document.body).on('click', '.delete', function() {
                var id = $(this).data('id');
                var url = $(this).data('url');

                Swal.fire({
                    title: 'Delete Section?',
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
                                        text: "Section deleted successfully",
                                        icon: "success",
                                        confirmButtonColor: '#f59e0b'
                                    });
                                    $('#row' + id).remove();
                                    // Refresh DataTable
                                    $('#headerTable').DataTable().row('#row' + id)
                                        .remove().draw();
                                } else {
                                    Swal.fire({
                                        title: "Error!",
                                        text: response,
                                        icon: "warning",
                                        confirmButtonColor: '#f59e0b'
                                    });
                                }
                            },
                            error: function(data, errorThrown) {
                                Swal.fire({
                                    title: "Error",
                                    text: errorThrown,
                                    icon: "warning",
                                    confirmButtonColor: '#f59e0b'
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
