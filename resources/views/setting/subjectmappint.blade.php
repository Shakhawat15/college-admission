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
                   SUBJECT MAPPING PAGE STYLES - VIBRANT TEAL/CYAN EDITION
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

        /* Form Card - Compact */
        .form-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
            overflow: hidden;
            background: #fff;
        }

        .form-card .card-header {
            background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%);
            color: #fff;
            border: none;
            padding: 1rem 1.5rem;
            font-weight: 700;
            font-size: 1rem;
        }

        .form-card .card-header i {
            margin-right: 8px;
        }

        .form-card .card-body {
            padding: 1.2rem 1.5rem 1.5rem 1.5rem;
        }

        /* Single Column Form Fields */
        .form-control-modern-compact {
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            padding: 0.4rem 0.8rem;
            transition: all 0.3s ease;
            font-size: 0.85rem;
            height: 38px;
            width: 100%;
        }

        .form-control-modern-compact:focus {
            border-color: #06b6d4;
            box-shadow: 0 0 0 4px rgba(6, 182, 212, 0.1);
        }

        .form-select-modern-compact {
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            padding: 0.4rem 0.8rem;
            transition: all 0.3s ease;
            font-size: 0.85rem;
            height: 38px;
            width: 100%;
        }

        .form-select-modern-compact:focus {
            border-color: #06b6d4;
            box-shadow: 0 0 0 4px rgba(6, 182, 212, 0.1);
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
            color: #06b6d4;
            font-size: 14px;
        }

        /* List Card - Gradient Header */
        .list-card .card-header {
            background: linear-gradient(135deg, #22d3ee 0%, #67e8f9 100%);
            color: #fff;
            border: none;
            padding: 1rem 1.5rem;
            font-weight: 700;
            font-size: 1rem;
        }

        .list-card .card-header i {
            margin-right: 8px;
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

        /* Subject Type Badges */
        .subject-type-badge {
            padding: 0.15rem 0.6rem;
            border-radius: 50px;
            font-size: 0.6rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            display: inline-block;
        }

        .subject-type-badge.compulsory {
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
            color: #1e40af;
        }

        .subject-type-badge.group {
            background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
            color: #065f46;
        }

        .subject-type-badge.optional {
            background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
            color: #92400e;
        }

        .subject-type-badge.fourth {
            background: linear-gradient(135deg, #fce7f3 0%, #fbcfe8 100%);
            color: #9d174d;
        }

        /* Is Main Badge */
        .is-main-badge {
            padding: 0.15rem 0.6rem;
            border-radius: 50px;
            font-size: 0.6rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            display: inline-block;
        }

        .is-main-badge.yes {
            background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
            color: #065f46;
        }

        .is-main-badge.no {
            background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
            color: #991b1b;
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
            background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%);
            color: #fff;
            box-shadow: 0 2px 10px rgba(6, 182, 212, 0.3);
        }

        .action-btn.delete {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            color: #fff;
            box-shadow: 0 2px 10px rgba(239, 68, 68, 0.3);
        }

        /* Submit Buttons - Compact */
        .btn-gradient-compact {
            background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%);
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 0.4rem 1.2rem;
            font-weight: 600;
            font-size: 0.85rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(6, 182, 212, 0.3);
        }

        .btn-gradient-compact:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 25px rgba(6, 182, 212, 0.4);
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

        /* DataTables Customization */
        .dataTables_wrapper .dataTables_length {
            font-size: 0.8rem;
            color: #475569;
            padding: 0.5rem 0 0.5rem 0.5rem;
        }

        .dataTables_wrapper .dataTables_length select {
            border-radius: 8px;
            border: 2px solid #e2e8f0;
            padding: 0.2rem 0.5rem;
            font-size: 0.8rem;
            background: #fff;
            margin: 0 4px;
        }

        .dataTables_wrapper .dataTables_filter {
            font-size: 0.8rem;
            color: #475569;
            padding: 0.5rem 0.5rem 0.5rem 0;
        }

        .dataTables_wrapper .dataTables_filter input {
            border-radius: 8px;
            border: 2px solid #e2e8f0;
            padding: 0.2rem 0.5rem;
            font-size: 0.8rem;
            background: #fff;
            margin-left: 4px;
        }

        .dataTables_wrapper .dataTables_filter input:focus {
            border-color: #06b6d4;
            outline: none;
        }

        .dataTables_wrapper .dataTables_paginate {
            padding: 0.5rem 0.5rem 0.5rem 0;
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
            background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%) !important;
            color: #fff !important;
            border-color: #06b6d4 !important;
            box-shadow: 0 2px 10px rgba(6, 182, 212, 0.3) !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
            background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%) !important;
            color: #fff !important;
            transform: translateY(-1px) !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled {
            opacity: 0.5 !important;
            cursor: not-allowed !important;
        }

        .dataTables_wrapper .dataTables_info {
            padding: 0.5rem 0 0.5rem 0.5rem;
            font-size: 0.8rem;
            color: #64748b;
        }

        .dt-buttons {
            padding: 0.5rem 0.5rem 0.5rem 0;
        }

        .dt-buttons .dt-button {
            background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%) !important;
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
            box-shadow: 0 4px 15px rgba(6, 182, 212, 0.3) !important;
            color: #fff !important;
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
                padding: 0.5rem 0.7rem;
                font-size: 0.75rem;
            }
            .dataTables_wrapper .dataTables_paginate {
                justify-content: center;
            }
            .dataTables_wrapper .dataTables_info {
                text-align: center;
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
            .dt-buttons {
                display: flex;
                flex-wrap: wrap;
                gap: 4px;
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
                    <a href="{{ route('dashboard') }}" style="color: #06b6d4; text-decoration: none;">
                        <i class="bx bx-home me-1"></i> Dashboard
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page" style="color: #0891b2; font-weight: 600;">
                    <i class="bx bx-bookmark me-1"></i> Subject Mapping
                </li>
            </ol>
        </nav>

        <!-- Main Content Row - 8-4 Layout (Table Left, Form Right) -->
        <div class="row mb-4 g-4">

            <!-- Subject Mapping List Card - 8 Columns (LEFT) -->
            <div class="col-xl-8 col-lg-7 animate-fade-in">
                <div class="card modern-card list-card">
                    <h5 class="card-header">
                        <i class="bx bx-list-ul me-1"></i> Subject Mapping List
                        <span class="badge bg-light text-dark ms-2">{{ count($classWiseSubject) }}</span>
                    </h5>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-modern mb-0" id="headerTable">
                                <thead>
                                    <tr>
                                        <th style="width: 40px;">#</th>
                                        <th>Code</th>
                                        <th>Subject Name</th>
                                        <th>Group</th>
                                        <th>Class</th>
                                        <th>Type</th>
                                        <th>Main</th>
                                        <th>Status</th>
                                        @if (Auth::user()->is_view_user == 0)
                                            <th style="width: 80px; text-align: center;">Actions</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($classWiseSubject as $key => $subject)
                                        <tr id="row{{ $subject->id }}">
                                            <td>
                                                <span class="fw-bold" style="color: #06b6d4;">{{ $key + 1 }}</span>
                                            </td>
                                            <td>
                                                <span class="badge bg-light text-dark border">{{ $subject->subject_code }}</span>
                                            </td>
                                            <td>{{ $subject->subject->subject_name ?? '' }}</td>
                                            <td>{{ $subject->group->group_name ?? '' }}</td>
                                            <td>Class {{ $words[$subject->class_code] ?? '' }}</td>
                                            <td>
                                                @php
                                                    $typeClass = match ($subject->subject_type) {
                                                        1 => 'compulsory',
                                                        2 => 'group',
                                                        3 => 'optional',
                                                        4 => 'fourth',
                                                        default => 'optional',
                                                    };
                                                    $typeLabel = $subjectTypeLabels[$subject->subject_type] ?? 'N/A';
                                                @endphp
                                                <span class="subject-type-badge {{ $typeClass }}">
                                                    {{ $typeLabel }}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="is-main-badge {{ $subject->is_main == 1 ? 'yes' : 'no' }}">
                                                    {{ $subject->is_main == 1 ? 'Yes' : 'No' }}
                                                </span>
                                            </td>
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
                                                            data-subject_code="{{ $subject->subject_code }}"
                                                            data-subject_type="{{ $subject->subject_type }}"
                                                            data-active="{{ $subject->active }}"
                                                            data-is_main="{{ $subject->is_main }}"
                                                            data-group_id="{{ $subject->group_id }}"
                                                            data-class_id="{{ $subject->class_code }}"
                                                            data-subject_id="{{ $subject->subject_id }}"
                                                            title="Edit">
                                                            <i class="bx bx-edit-alt"></i>
                                                        </button>
                                                        <button class="action-btn delete"
                                                            data-url="{{ route('subjectmapping.destroy', $subject->id) }}"
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
                    </div>
                </div>
            </div>

            <!-- Subject Mapping Form Card - 4 Columns (RIGHT) -->
            <div class="col-xl-4
        col-lg-5 animate-fade-in">
    <div class="form-card">
        <div class="card-header">
            <i class="bx bx-plus-circle me-1"></i> <span id="formTitle">Add Mapping</span>
        </div>
        <div class="card-body">
            <form class="needs-validation" method="post" action="{{ route('subjectmapping.store') }}" novalidate=""
                id="formsubmit">
                @csrf
                <input type="hidden" name="id" id="id" value="0" />

                <!-- Single Column Form Fields -->
                <div class="mb-3">
                    <label class="form-label-modern-compact" for="class_id">
                        <i class="bx bx-book"></i> Class
                    </label>
                    <select class="form-select-modern-compact" name="class_code" id="class_id" required="">
                        <option value="">Select Class</option>
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
                    <label class="form-label-modern-compact" for="group_id">
                        <i class="bx bx-group"></i> Group
                    </label>
                    <select class="form-select-modern-compact" name="group_id" id="group_id">
                        <option value="">Select Group</option>
                        @foreach ($groups as $group)
                            <option value="{{ $group->id }}">{{ $group->group_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label-modern-compact" for="subject_id">
                        <i class="bx bx-book-content"></i> Subject
                    </label>
                    <select class="form-select-modern-compact" name="subject_id" id="subject_id" required="">
                        <option value="">Select Subject</option>
                        @foreach ($subjects as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback" style="font-size: 0.7rem;">Required</div>
                </div>

                <div class="mb-3">
                    <label class="form-label-modern-compact" for="subject_code">
                        <i class="bx bx-hash"></i> Subject Code
                    </label>
                    <input type="text" class="form-control-modern-compact" name="subject_code" id="subject_code"
                        placeholder="e.g. 101" required="">
                    <div class="invalid-feedback" style="font-size: 0.7rem;">Required</div>
                </div>

                <div class="mb-3">
                    <label class="form-label-modern-compact" for="subject_type">
                        <i class="bx bx-layer"></i> Subject Type
                    </label>
                    <select class="form-select-modern-compact" name="subject_type" id="subject_type" required="">
                        <option value="">Select Type</option>
                        <option value="1">Compulsory</option>
                        <option value="2">Group Subject</option>
                        <option value="3">Optional</option>
                        <option value="4">4th Subject</option>
                    </select>
                    <div class="invalid-feedback" style="font-size: 0.7rem;">Required</div>
                </div>

                <div class="mb-3">
                    <label class="form-label-modern-compact" for="is_main">
                        <i class="bx bx-star"></i> Is Main
                    </label>
                    <select class="form-select-modern-compact" name="is_main" id="is_main" required="">
                        <option value="">Select</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                    <div class="invalid-feedback" style="font-size: 0.7rem;">Required</div>
                </div>

                <div class="mb-3">
                    <label class="form-label-modern-compact" for="active">
                        <i class="bx bx-toggle-left"></i> Status
                    </label>
                    <select class="form-select-modern-compact" name="active" id="active" required="">
                        <option value="">Select Status</option>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                    <div class="invalid-feedback" style="font-size: 0.7rem;">Required</div>
                </div>

                <div class="d-flex gap-2 mt-3">
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
                    targets: [8]
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
                confirmButtonColor: '#06b6d4'
            });
        @endif

        @if (Session::get('success'))
            Swal.fire({
                title: "Good job!",
                text: "{{ Session::get('success') }}",
                icon: "success",
                confirmButtonColor: '#06b6d4'
            });
        @endif

        @if (Session::get('error'))
            Swal.fire({
                title: "Error",
                text: "{{ Session::get('error') }}",
                icon: "warning",
                confirmButtonColor: '#06b6d4'
            });
        @endif

        $(function() {
            // Edit Subject Mapping
            $(document.body).on('click', '.edit', function() {
                var id = $(this).data('id');
                var subject_code = $(this).data('subject_code');
                var class_id = $(this).data('class_id');
                var group_id = $(this).data('group_id');
                var is_main = $(this).data('is_main');
                var subject_id = $(this).data('subject_id');
                var subject_type = $(this).data('subject_type');
                var active = $(this).data('active');

                $('#id').val(id);
                $('#subject_code').val(subject_code);
                $('#subject_type').val(subject_type);
                $('#class_id').val(class_id);
                $('#subject_id').val(subject_id);
                $('#group_id').val(group_id);
                $('#is_main').val(is_main);
                $('#active').val(active);

                $('#submit').removeClass('btn-gradient-compact').addClass('btn-gradient-secondary-compact');
                $('#submitText').text('Update');
                $('#formTitle').text('Edit Mapping');

                // Scroll to form
                $('html, body').animate({
                    scrollTop: $(".form-card").offset().top - 100
                }, 500);
            });

            // Reset Form
            $('#resetForm').on('click', function() {
                $('#id').val(0);
                $('#subject_code').val('');
                $('#subject_type').val('');
                $('#class_id').val('');
                $('#subject_id').val('');
                $('#group_id').val('');
                $('#is_main').val('');
                $('#active').val('');

                $('#submit').removeClass('btn-gradient-secondary-compact').addClass('btn-gradient-compact');
                $('#submitText').text('Save');
                $('#formTitle').text('Add Mapping');

                // Remove any validation errors
                $('.is-invalid').removeClass('is-invalid');
                $('.invalid-feedback').hide();
            });

            // Delete Subject Mapping
            $(document.body).on('click', '.delete', function() {
                var id = $(this).data('id');
                var url = $(this).data('url');

                Swal.fire({
                    title: 'Delete Mapping?',
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
                                        text: "Mapping deleted successfully",
                                        icon: "success",
                                        confirmButtonColor: '#06b6d4'
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
                                        confirmButtonColor: '#06b6d4'
                                    });
                                }
                            },
                            error: function(data, errorThrown) {
                                Swal.fire({
                                    title: "Error",
                                    text: errorThrown,
                                    icon: "warning",
                                    confirmButtonColor: '#06b6d4'
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
