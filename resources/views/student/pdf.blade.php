<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Student CV</title>

    <style>
        @page {
            margin: 20px;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 14px;
            color: #333;
        }

        .header {
            background: #1e3a8a;
            color: white;
            padding: 18px;
        }

        .header table {
            width: 100%;
        }

        .logo {
            width: 70px;
        }

        .photo {
            width: 100px;
            height: 120px;
            border: 2px solid #ddd;
        }

        .title {
            font-size: 22px;
            font-weight: bold;
        }

        .subtitle {
            font-size: 16px;
        }

        .section {
            margin-top: 16px;
        }

        .section-title {
            background: #e5e7eb;
            padding: 6px 10px;
            font-size: 14px;
            font-weight: bold;
            border-left: 4px solid #1e3a8a;
        }

        .info-table {
            width: 100%;
            border-collapse: collapse;
        }

        .info-table td {
            padding: 8px;
            border: 1px solid #ddd;
        }

        .label {
            font-weight: bold;
            background: #f8fafc;
            width: 20%;
        }

        .footer {
            margin-top: 40px;
        }

        .signature {
            margin-top: 50px;
            width: 220px;
            text-align: center;
            border-top: 1px solid #000;
            float: right;
            padding-top: 5px;
        }

        .status-active {
            color: green;
            font-weight: bold;
        }

        .status-inactive {
            color: red;
            font-weight: bold;
        }

        .doc-table {
            width: 100%;
            border-collapse: collapse;
        }

        .doc-table td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .check {
            color: green;
            font-weight: bold;
        }

        .cross {
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body>

    @php
        $path = parse_url($student->photo, PHP_URL_PATH);
        // Remove '/public' from the path
        $pathWithoutPublic = str_replace('/public', '', $path);
        // Result: /sutdent/2026/11/254001_photo_1782090881.jpeg

        // Remove leading slash for Laravel's public_path()
$relativePath = ltrim($pathWithoutPublic, '/');
        // Result: sutdent/2026/11/254001_photo_1782090881.jpeg

        // Get the full filesystem path
        $fullPath = public_path($relativePath);
    @endphp
    <!-- HEADER -->

    <div class="header">
        <table style="color: white">
            <tr>

                <td width="15%">
                    <img src="{{ public_path('logo/demo-logo.png') }}" class="logo">
                </td>

                <td width="65%" align="center">
                    <div class="title">
                        SEMS DEMO SCHOOL
                    </div>

                    <div class="subtitle">
                        STUDENT PROFILE / CURRICULUM VITAE
                    </div>

                    <br>

                    Student Code:
                    {{ $student->student_code }}
                </td>

                <td width="20%" align="right">

                    @if ($student->photo)
                        <img src="{{ public_path($relativePath) }}" class="photo">
                    @endif

                </td>

            </tr>
        </table>
    </div>

    <!-- PERSONAL -->

    <div class="section">
        <div class="section-title">
            PERSONAL INFORMATION
        </div>

        <table class="info-table">

            <tr>
                <td class="label">Full Name</td>
                <td>{{ $student->first_name }} {{ $student->last_name }}</td>

                <td class="label">Bangla Name</td>
                <td>{{ $student->bangla_name }}</td>
            </tr>

            <tr>
                <td class="label">Gender</td>
                <td>{{ $gender }}</td>

                <td class="label">Date of Birth</td>
                <td>{{ $student->birthdate }}</td>
            </tr>

            <tr>
                <td class="label">Blood Group</td>
                <td>{{ $student->blood }}</td>

                <td class="label">Religion</td>
                <td>{{ $religionText }}</td>
            </tr>

            <tr>
                <td class="label">Nationality</td>
                <td>{{ $student->nationality }}</td>

                <td class="label">Status</td>
                <td>
                    <span class="{{ $student->active ? 'status-active' : 'status-inactive' }}">
                        {{ $student->active ? 'Active' : 'Inactive' }}
                    </span>
                </td>
            </tr>

        </table>
    </div>

    <!-- ACADEMIC -->

    <div class="section">
        <div class="section-title">
            ACADEMIC INFORMATION
        </div>

        <table class="info-table">

            <tr>
                <td class="label">Class</td>
                <td>{{ $className }}</td>

                <td class="label">Roll</td>
                <td>{{ $activity->roll ?? 'N/A' }}</td>
            </tr>

            <tr>
                <td class="label">Group</td>
                <td>{{ $groupName }}</td>

                <td class="label">Section</td>
                <td>{{ $sectionName }}</td>
            </tr>

            <tr>
                <td class="label">Version</td>
                <td>{{ $versionName }}</td>

                <td class="label">Shift</td>
                <td>{{ $shiftName }}</td>
            </tr>

            <tr>
                <td class="label">House</td>
                <td>{{ $houseName }}</td>

                <td class="label">PID</td>
                <td>{{ $student->PID }}</td>
            </tr>

        </table>
    </div>

    <!-- GUARDIAN -->

    <div class="section">
        <div class="section-title">
            GUARDIAN INFORMATION
        </div>

        <table class="info-table">

            <tr>
                <td class="label">Father</td>
                <td>{{ $student->father_name }}</td>

                <td class="label">Mobile</td>
                <td>{{ $student->father_phone }}</td>
            </tr>

            <tr>
                <td class="label">Mother</td>
                <td>{{ $student->mother_name }}</td>

                <td class="label">Mobile</td>
                <td>{{ $student->mother_phone }}</td>
            </tr>

        </table>
    </div>

    <!-- CONTACT -->

    <div class="section">
        <div class="section-title">
            CONTACT INFORMATION
        </div>

        <table class="info-table">

            <tr>
                <td class="label">Mobile</td>
                <td>{{ $student->mobile }}</td>

                <td class="label">Email</td>
                <td>{{ $student->email }}</td>
            </tr>

            <tr>
                <td class="label">Present Address</td>
                <td colspan="3">
                    {{ $student->present_addr }}
                </td>
            </tr>

        </table>
    </div>

    <!-- SSC -->

    <div class="section">
        <div class="section-title">
            SSC INFORMATION
        </div>

        <table class="info-table">

            <tr>
                <td class="label">School</td>
                <td>{{ $student->school_name }}</td>

                <td class="label">Board</td>
                <td>{{ $student->board }}</td>
            </tr>

            <tr>
                <td class="label">Passing Year</td>
                <td>{{ $student->passing_year }}</td>

                <td class="label">Result</td>
                <td>{{ $student->result }}</td>
            </tr>

        </table>
    </div>

    <!-- DOCUMENTS -->

    {{-- <div class="section">
        <div class="section-title">
            DOCUMENT STATUS
        </div>

        <table class="doc-table">

            <tr>
                <td>Photo</td>
                <td>{{ $student->photo ? '✓ Available' : '✗ Not Available' }}</td>

                <td>Birth Certificate</td>
                <td>{{ $student->birth_certificate ? '✓ Available' : '✗ Not Available' }}</td>
            </tr>

            <tr>
                <td>Transcript</td>
                <td>{{ $student->academic_transcript ? '✓ Available' : '✗ Not Available' }}</td>

                <td>Admit Card</td>
                <td>{{ $student->admit_card ? '✓ Available' : '✗ Not Available' }}</td>
            </tr>

        </table>
    </div> --}}

    <!-- FOOTER -->

    <div class="footer">

        <div class="signature">
            Authorized Signature
        </div>

        <div style="clear:both"></div>

        <br><br>

        Generated:
        {{ date('d M Y h:i A') }}

    </div>

</body>

</html>
