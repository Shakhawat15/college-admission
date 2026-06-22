<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact " dir="ltr"
    data-theme="theme-default" data-assets-path="{{ asset('public') }}/backend//assets/"
    data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>SEMS Demo Admission</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="description" content="SEMS Demo Admission" />
    <meta name="keywords" content="school,college,student,teacher, admission, eleven admission, college admission">
    <link rel="icon" type="image/x-icon" href="{{ asset('logo/favicon.png') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('public') }}/backend//assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="{{ asset('public') }}/backend//assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="{{ asset('public') }}/backend//assets/vendor/fonts/flag-icons.css" />
    <link rel="stylesheet" href="{{ asset('public') }}/backend//assets/vendor/css/rtl/core.css"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('public') }}/backend//assets/vendor/css/rtl/theme-default.css"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('public') }}/backend//assets/css/demo.css" />
    <link rel="stylesheet" href="{{ asset('public') }}/backend//assets/css/dashboard.css" />
    <link rel="stylesheet"
        href="{{ asset('public') }}/backend//assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="{{ asset('public') }}/backend//assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="{{ asset('public') }}/backend//assets/vendor/libs/apex-charts/apex-charts.css" />
    <link rel="stylesheet" href="{{ asset('public') }}/backend//assets/vendor/css/pages/card-analytics.css" />
    <link rel="stylesheet" href="{{ asset('public') }}/backend//css/index.min.css" />
    <script src="{{ asset('public') }}/backend//assets/vendor/libs/jquery/jquery.js"></script>
    <script src="{{ asset('public') }}/backend//assets/vendor/js/helpers.js"></script>
    <link rel="stylesheet"
        href="{{ asset('public') }}/backend//assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css">

    <script src="{{ asset('public') }}/backend//assets/js/config.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('public') }}/backend//assets/vendor/js/template-customizer.js"></script>
    <script type="text/javascript"
        src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <style>
        :root {
            --bs-breadcrumb-divider: ">";
            --primary-gradient: linear-gradient(135deg, #4361ee 0%, #3a0ca3 100%);
            --sidebar-bg: linear-gradient(180deg, #1e1e2d 0%, #151521 100%);
            --sidebar-text: #a2a3b7;
            --sidebar-hover: rgba(255, 255, 255, 0.05);
            --content-bg: #f4f7fe;
            --glass-bg: rgba(255, 255, 255, 0.85);
            --glass-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.07);
        }

        body {
            background-color: var(--content-bg);
            font-family: 'Public Sans', sans-serif;
        }

        /* Modern Glassmorphism Navbar */
        #layout-navbar {
            background: var(--glass-bg) !important;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            box-shadow: var(--glass-shadow) !important;
            border-radius: 12px;
            margin: 15px auto;
            width: calc(100% - 30px);
            padding: 0 1rem;
            border: 1px solid rgba(255, 255, 255, 0.18);
            z-index: 10;
        }

        /* Beautiful Dark Sidebar */
        .bg-menu-theme {
            background: var(--sidebar-bg) !important;
            box-shadow: 4px 0 15px rgba(0, 0, 0, 0.05);
        }

        .bg-menu-theme .app-brand-link .app-brand-text {
            color: #ffffff !important;
            font-weight: 700;
        }

        .bg-menu-theme .menu-link {
            color: var(--sidebar-text) !important;
            transition: all 0.3s ease;
        }

        .bg-menu-theme .menu-item:not(.active):hover>.menu-link {
            background-color: var(--sidebar-hover) !important;
            color: #ffffff !important;
            border-radius: 8px;
            margin: 0 12px;
        }

        .bg-menu-theme .menu-item.active>.menu-link {
            background: var(--primary-gradient) !important;
            color: #ffffff !important;
            border-radius: 8px;
            margin: 4px 12px;
            box-shadow: 0 4px 12px rgba(67, 97, 238, 0.4);
            font-weight: 500;
        }

        .bg-menu-theme .menu-item.active>.menu-link i {
            color: #ffffff !important;
        }

        .menu-icon {
            color: #6a6b82;
        }

        /* Modernized Clock Badge */
        .clockdate-wrapper {
            background: rgba(67, 97, 238, 0.1);
            padding: 6px 16px;
            border-radius: 30px;
            display: flex;
            align-items: center;
            gap: 10px;
            border: 1px solid rgba(67, 97, 238, 0.2);
        }

        #clock {
            font-family: 'Public Sans', sans-serif;
            font-size: 16px;
            color: #4361ee;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        #date {
            font-size: 13px;
            font-weight: 500;
            color: #6c757d;
        }

        /* Content Area & Scrollbars */
        .content-wrapper {
            height: calc(100vh - 90px);
            overflow-y: auto;
            padding-top: 10px;
        }

        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        .scrollable {
            overflow-y: auto;
            max-height: 500px;
        }

        .breadcrumb a {
            text-decoration: none;
            color: #4361ee;
            font-weight: 500;
        }

        .breadcrumb a:hover {
            text-decoration: none;
            color: #3a0ca3;
        }

        .avatar.avatar-online {
            position: relative;
            width: 2.5rem !important;
            height: 2.5rem !important;
            cursor: pointer;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            border-radius: 50%;
        }

        .search-input-wrapper {
            width: 100%;
        }

        .fixTableHead,
        .fixed {
            overflow-y: auto;
            height: 90vh;
        }

        .fixed thead th,
        .fixTableHead thead th {
            position: sticky;
            top: 0;
            background: #fff;
            z-index: 1;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        .pagination {
            padding: 10px;
        }

        @media (max-width: 600px) {
            .navbar-nav {
                width: 100% !important;
                justify-content: center;
            }

            #layout-navbar {
                margin: 10px;
                width: calc(100% - 20px);
            }

            .clockdate-wrapper {
                margin-top: 10px;
            }
        }
    </style>
</head>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo mt-2 mb-2">
                    <a href="{{ route('dashboard') }}" class="app-brand-link">
                        <span class="app-brand-logo demo">
                            <img src="{{ asset('public/logo/logo.png') }}" width="45"
                                style="border-radius: 8px;" />
                        </span>
                        <span class="app-brand-text demo menu-text fw-bold ms-2"
                            style="font-size: 1.1rem; text-transform: uppercase;">SEMS</span>
                    </a>
                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle text-white"></i>
                    </a>
                </div>
                <div class="menu-inner-shadow"></div>
                @include('admin.layouts.leftnav')
            </aside>
            <div class="layout-page">
                @include('admin.layouts.topnav')

                <div class="content-wrapper container-full">
                    @yield('content') </div>

                @include('admin.layouts.footer')
            </div>
        </div>
        <div class="layout-overlay layout-menu-toggle"></div>
        <div class="drag-target"></div>
    </div>
    <script src="{{ asset('public') }}/backend//assets/vendor/libs/popper/popper.js"></script>
    <script src="{{ asset('public') }}/backend//assets/vendor/js/bootstrap.js"></script>
    <script src="{{ asset('public') }}/backend//assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="{{ asset('public') }}/backend//assets/vendor/libs/hammer/hammer.js"></script>
    <script src="{{ asset('public') }}/backend//assets/vendor/libs/i18n/i18n.js"></script>
    <script src="{{ asset('public') }}/backend//assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="{{ asset('public') }}/backend//assets/vendor/js/menu.js"></script>

    <script src="{{ asset('public') }}/backend//assets/vendor/libs/apex-charts/apexcharts.js"></script>
    <script src="{{ asset('public') }}/backend//assets/vendor/libs/select2/select2.js"></script>
    <script src="{{ asset('public') }}/backend//assets/vendor/libs/bootstrap-select/bootstrap-select.js"></script>
    <script src="{{ asset('public') }}/backend//assets/vendor/libs/moment/moment.js"></script>
    <script src="{{ asset('public') }}/backend//assets/vendor/libs/flatpickr/flatpickr.js"></script>
    <script src="{{ asset('public') }}/backend//assets/vendor/libs/tagify/tagify.js"></script>
    <script src="{{ asset('public') }}/backend//assets/vendor/libs/@form-validation/umd/bundle/popular.min.js"></script>
    <script src="{{ asset('public') }}/backend//assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js">
    </script>
    <script src="{{ asset('public') }}/backend//assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js">
    </script>

    <script src="{{ asset('public') }}/backend//assets/js/main.js"></script>
    <script src="{{ asset('public') }}/backend//assets/js/form-validation.js"></script>
    <script src="{{ asset('public') }}/backend/assets/vendor/libs/bs-stepper/bs-stepper.js"></script>
    <script src="{{ asset('public') }}/backend/assets/js/form-wizard-icons.js"></script>

    <script>
        $(function() {
            $(document.body).on('click', '.viewsearch', function() {
                $('.search-input-wrapper').removeClass('d-none');
                $('#navbar-collapse').addClass('d-none');
            });
            $(document.body).on('click', '.close-search', function() {
                $('.search-input-wrapper').addClass('d-none');
                $('#navbar-collapse').removeClass('d-none');
            });
        });

        function startTime() {
            var today = new Date();
            var hr = today.getHours();
            var min = today.getMinutes();
            var sec = today.getSeconds();
            var ap = (hr < 12) ? "<span>AM</span>" : "<span>PM</span>";
            hr = (hr == 0) ? 12 : hr;
            hr = (hr > 12) ? hr - 12 : hr;
            hr = checkTime(hr);
            min = checkTime(min);
            sec = checkTime(sec);
            document.getElementById("clock").innerHTML = hr + ":" + min + ":" + sec + " " + ap;

            var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
            var days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
            var curWeekDay = days[today.getDay()];
            var curDay = today.getDate();
            var curMonth = months[today.getMonth()];
            var curYear = today.getFullYear();
            var date = curDay + " " + curMonth + ", " + curYear;
            document.getElementById("date").innerHTML = date;

            var time = setTimeout(function() {
                startTime()
            }, 1000);
        }

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }
        startTime();

        function fnExcelReport() {
            var tab_text = "<table border='2px'><tr bgcolor='#87AFC6'>";
            var j = 0;
            var tab = document.getElementById('headerTable');

            for (j = 0; j < tab.rows.length; j++) {
                tab_text = tab_text + tab.rows[j].innerHTML + "</tr>";
            }

            tab_text = tab_text + "</table>";
            tab_text = tab_text.replace(/<A[^>]*>|<\/A>/g, "");
            tab_text = tab_text.replace(/<img[^>]*>/gi, "");
            tab_text = tab_text.replace(/<input[^>]*>|<\/input>/gi, "");

            var msie = window.navigator.userAgent.indexOf("MSIE ");
            if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
                txtArea1.document.open("txt/html", "replace");
                txtArea1.document.write(tab_text);
                txtArea1.document.close();
                txtArea1.focus();
                sa = txtArea1.document.execCommand("SaveAs", true, "Report.xls");
            } else {
                sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));
            }
            return sa;
        }
    </script>
</body>

</html>
