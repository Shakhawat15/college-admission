<style>
    /* Smooth Navigation Styling Engine */
    .menu-inner {
        padding: 10px 14px !important;
    }

    .bg-menu-theme .menu-link {
        color: #9295b8 !important;
        font-weight: 500;
        border-radius: 8px;
        margin: 3px 0;
        padding: 10px 14px;
        transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* Vibrant Glow Active States */
    .bg-menu-theme .menu-item.active>.menu-link {
        background: var(--active-item-gradient) !important;
        color: #ffffff !important;
        box-shadow: var(--accent-glow) !important;
        font-weight: 600;
    }

    .bg-menu-theme .menu-item.active>.menu-link i {
        color: #ffffff !important;
    }

    /* Sidebar Item Hover Configuration */
    .bg-menu-theme .menu-item:not(.active)>.menu-link:hover,
    .bg-menu-theme .menu-item.open:not(.active)>.menu-link {
        background-color: rgba(255, 255, 255, 0.05) !important;
        color: #ffffff !important;
    }

    .menu-item .menu-icon {
        font-size: 1.25rem;
        transition: transform 0.2s ease;
        color: #6c7293;
    }

    .menu-item:hover .menu-icon {
        transform: scale(1.08);
        color: #a855f7;
    }

    /* Premium Submenu Line Alignments */
    .bg-menu-theme .menu-sub {
        background: transparent !important;
        padding-left: 12px;
        margin: 4px 0 6px 8px;
        border-left: 1px dashed rgba(255, 255, 255, 0.12);
        list-style: none !important;
    }

    .bg-menu-theme .menu-sub .menu-link {
        padding: 8px 14px;
        font-size: 0.88rem;
    }

    /* Highlight class for selected configurations */
    .menu-item.highlight .menu-link {
        color: #38bdf8 !important;
        background: rgba(56, 189, 248, 0.06);
    }

    /* Handle CSS Truncations cleanly when layout is collapsed */
    .layout-menu-collapsed .layout-menu .text-truncate {
        opacity: 0;
        display: none;
    }

    .bg-menu-theme .menu-sub>.menu-item>.menu-link:before {
        content: "";
        position: absolute;
        left: -0.5625rem;
        width: .375rem;
        height: .375rem;
        border-radius: 50%;
    }
</style>

<ul class="menu-inner py-1">
    <!-- Dashboards -->
    <li class="menu-item {{ Session::get('activemenu') == 'dashboard' ? 'active open' : '' }}">
        <a href="{{ url('admin/dashboard') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-grid-alt text-primary"></i>
            <div class="text-truncate" data-i18n="Dashboard">Dashboard</div>
        </a>
    </li>

    <!-- Layouts -->
    @if (Auth::user()->group_id == 4)
        <li class="menu-item {{ Session::get('activemenu') == 'profile' ? 'active open' : '' }}">
            <a href="{{ route('StudentProfile', 0) }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user-circle text-info"></i>
                <div class="text-truncate" data-i18n="Profile">Profile</div>
            </a>
        </li>
    @endif

    @if (Auth::user()->group_id == 7)
        <li class="menu-item {{ Session::get('activemenu') == 'admission' ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-user-plus text-success"></i>
                <div class="text-truncate" data-i18n="Admission">Admission</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Session::get('activesubmenu') == 'na' ? 'highlight' : '' }}">
                    <a href="{{ route('collegeAdmission') }}" class="menu-link">
                        <div class="text-truncate" data-i18n="New Admission">New Admission</div>
                    </a>
                </li>
                @if (Auth::user()->getMenu('admissionIdCard', 'name'))
                    <li class="menu-item {{ Session::get('activesubmenu') == 'adc' ? 'highlight' : '' }}">
                        <a href="{{ route('admissionIdCard') }}" class="menu-link">
                            <div class="text-truncate" data-i18n="ID Card">ID Card</div>
                        </a>
                    </li>
                @endif
                <li class="menu-item {{ Session::get('activesubmenu') == 'ks' ? 'active open' : '' }}">
                    <a href="{{ route('showStudentCounts') }}" class="menu-link">
                        <div class="text-truncate" data-i18n="Primary Secondary Statistics">Primary Secondary Statistics
                        </div>
                    </a>
                </li>
                <li class="menu-item {{ Session::get('activesubmenu') == 'cs' ? 'active open' : '' }}">
                    <a href="{{ route('admissionstatus') }}" class="menu-link">
                        <div class="text-truncate" data-i18n="College Statistics">College Statistics</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item {{ Session::get('activesubmenu') == 'ul' ? 'active open' : '' }}">
            <a href="{{ route('users.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-key text-warning"></i>
                <div class="text-truncate" data-i18n="Resend password">Resend password</div>
            </a>
        </li>
    @endif

    @if (Auth::user()->group_id == 3)
        <li class="menu-item {{ Session::get('activemenu') == 'Profile' ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-user-badge text-info"></i>
                <div class="text-truncate" data-i18n="Profile">Profile</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Session::get('activesubmenu') == 'profile' ? 'highlight' : '' }}">
                    <a href="{{ route('teacherProfile') }}" class="menu-link">
                        <div class="text-truncate" data-i18n="My Profile">My Profile</div>
                    </a>
                </li>
                <li class="menu-item {{ Session::get('activesubmenu') == 'cp' ? 'highlight' : '' }}">
                    <a href="{{ route('change.password.form') }}" class="menu-link">
                        <div class="text-truncate" data-i18n="Change Password">Change Password</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item {{ Session::get('activemenu') == 'Class' ? 'active open' : '' }}">
            <a href="{{ route('teacherClass') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-layer text-success"></i>
                <div class="text-truncate" data-i18n="Class">Class</div>
            </a>
        </li>
        <li class="menu-item {{ Session::get('activemenu') == 'Routen' ? 'active open' : '' }}">
            <a href="{{ route('teacherRouten') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-calendar-event text-warning"></i>
                <div class="text-truncate" data-i18n="My Routine">My Routine</div>
            </a>
        </li>
        <li class="menu-item {{ Session::get('activemenu') == 'Student' ? 'active open' : '' }}">
            <a href="{{ route('teacherStudent') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-group text-primary"></i>
                <div class="text-truncate" data-i18n="Student">Student</div>
            </a>
        </li>

        @if (Auth::user()->id == 10881)
            <li class="menu-item {{ Session::get('activemenu') == 'ca' ? 'active open' : '' }}">
                <a href="{{ route('collegeAdmission') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-select-multiple text-danger"></i>
                    <div class="text-truncate" data-i18n="College Admission">College Admission</div>
                </a>
            </li>
        @endif
        @if (Auth::user()->id == 10909)
            <li class="menu-item {{ Session::get('activemenu') == 'ks' ? 'active open' : '' }}">
                <a href="{{ route('showStudentCounts') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-pie-chart-alt-2 text-secondary"></i>
                    <div class="text-truncate" data-i18n="Student Statistics">Student Statistics</div>
                </a>
            </li>
        @endif
    @endif

    @if (Auth::user()->getMenu('Students', 'module_name'))
        <li class="menu-item {{ Session::get('activemenu') == 'student' ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-group text-primary"></i>
                <div class="text-truncate" data-i18n="Students">Students</div>
            </a>
            <ul class="menu-sub">
                @if (Auth::user()->getMenu('students.index', 'name'))
                    <li class="menu-item {{ Session::get('activesubmenu') == 'si' ? 'highlight' : '' }}">
                        <a href="{{ route('students.index') }}" class="menu-link">
                            <div class="text-truncate" data-i18n="Students Info">Students Info</div>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->getMenu('studentXlUpload', 'name') && Auth::user()->is_view_user == 0)
                    <li class="menu-item {{ Session::get('activesubmenu') == 'spu' ? 'highlight' : '' }}">
                        <a href="{{ route('studentPIDUpload') }}" class="menu-link">
                            <div class="text-truncate" data-i18n="Students PID">Students PID</div>
                        </a>
                    </li>
                @endif
            </ul>
        </li>
    @endif

    @if (Auth::user()->getMenu('Admission', 'module_name'))
        <li class="menu-item {{ Session::get('activemenu') == 'admission' ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-id-card text-success"></i>
                <div class="text-truncate" data-i18n="Admission">Admission</div>
            </a>
            <ul class="menu-sub">
                @if (Auth::user()->getMenu('boardList', 'name'))
                    <li class="menu-item {{ Session::get('activesubmenu') == 'bl' ? 'highlight' : '' }}">
                        <a href="{{ route('boardList') }}" class="menu-link">
                            <div class="text-truncate" data-i18n="Board List">Board List</div>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->getMenu('admissionstatus', 'name'))
                    <li class="menu-item {{ Session::get('activesubmenu') == 'cas' ? 'highlight' : '' }}">
                        <a href="{{ route('admissionstatus') }}" class="menu-link">
                            <div class="text-truncate" data-i18n="College Student Statistics">College Student
                                Statistics</div>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->getMenu('admissionlist.index', 'name'))
                    <li class="menu-item {{ Session::get('activesubmenu') == 'al' ? 'highlight' : '' }}">
                        <a href="{{ route('admissionlist.index') }}" class="menu-link">
                            <div class="text-truncate" data-i18n="Applicant List">Applicant List</div>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->getMenu('admissionOpen', 'name'))
                    <li class="menu-item {{ Session::get('activesubmenu') == 'oa' ? 'highlight' : '' }}">
                        <a href="{{ route('admissionOpen') }}" class="menu-link">
                            <div class="text-truncate" data-i18n="Open Admission">Open Admission</div>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->getMenu('sectionWiseStudent', 'name'))
                    <li class="menu-item {{ Session::get('activesubmenu') == 'scws' ? 'highlight' : '' }}">
                        <a href="{{ route('sectionWiseStudent') }}" class="menu-link">
                            <div class="text-truncate" data-i18n="Section Wise Student">Section Wise Student</div>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->getMenu('admissionIdCard', 'name'))
                    <li class="menu-item {{ Session::get('activesubmenu') == 'adc' ? 'highlight' : '' }}">
                        <a href="{{ route('admissionIdCard') }}" class="menu-link">
                            <div class="text-truncate" data-i18n="ID Card">ID Card</div>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->getMenu('subjectWiseStudent', 'name'))
                    <li class="menu-item {{ Session::get('activesubmenu') == 'sws' ? 'highlight' : '' }}">
                        <a href="{{ route('subjectWiseStudent') }}" class="menu-link">
                            <div class="text-truncate" data-i18n="Subject Wise Student">Subject Wise Student</div>
                        </a>
                    </li>
                @endif
            </ul>
        </li>
    @endif

    @if (Auth::user()->getMenu('Class', 'module_name') && Auth::user()->is_view_user == 0)
        <li class="menu-item {{ Session::get('activemenu') == 'class' ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-spreadsheet text-info"></i>
                <div class="text-truncate" data-i18n="Class">Class</div>
            </a>
            <ul class="menu-sub">
                @if (Auth::user()->getMenu('classes.index', 'name'))
                    <li class="menu-item {{ Session::get('activesubmenu') == 'cl' ? 'highlight' : '' }}">
                        <a href="{{ route('classes.index') }}" class="menu-link">
                            <div class="text-truncate" data-i18n="Class List">Class List</div>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->getMenu('section.index', 'name'))
                    <li class="menu-item {{ Session::get('activesubmenu') == 'sc' ? 'highlight' : '' }}">
                        <a href="{{ route('section.index') }}" class="menu-link">
                            <div class="text-truncate" data-i18n="Section">Section</div>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->getMenu('subjectmapping.index', 'name'))
                    <li class="menu-item {{ Session::get('activesubmenu') == 'sm' ? 'highlight' : '' }}">
                        <a href="{{ route('subjectmapping.index') }}" class="menu-link">
                            <div class="text-truncate" data-i18n="Subject Mapping">Subject Mapping</div>
                        </a>
                    </li>
                @endif
            </ul>
        </li>
    @endif

    @if (Auth::user()->getMenu('Academy Settings', 'module_name') && Auth::user()->is_view_user == 0)
        <li class="menu-item {{ Session::get('activemenu') == 'setting' ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-cog text-warning"></i>
                <div class="text-truncate" data-i18n="Academy Settings">Academy Settings</div>
            </a>
            <ul class="menu-sub">
                @if (Auth::user()->getMenu('category.index', 'name'))
                    <li class="menu-item {{ Session::get('activesubmenu') == 'cat' ? 'highlight' : '' }}">
                        <a href="{{ route('category.index') }}" class="menu-link">
                            <div class="text-truncate" data-i18n="Category">Category</div>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->getMenu('version.index', 'name'))
                    <li class="menu-item {{ Session::get('activesubmenu') == 'vr' ? 'highlight' : '' }}">
                        <a href="{{ route('version.index') }}" class="menu-link">
                            <div class="text-truncate" data-i18n="Version">Version</div>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->getMenu('session.index', 'name'))
                    <li class="menu-item {{ Session::get('activesubmenu') == 'ss' ? 'highlight' : '' }}">
                        <a href="{{ route('session.index') }}" class="menu-link">
                            <div class="text-truncate" data-i18n="Session">Session</div>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->getMenu('shift.index', 'name'))
                    <li class="menu-item {{ Session::get('activesubmenu') == 'sh' ? 'highlight' : '' }}">
                        <a href="{{ route('shift.index') }}" class="menu-link">
                            <div class="text-truncate" data-i18n="Shift">Shift</div>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->getMenu('group.index', 'name'))
                    <li class="menu-item {{ Session::get('activesubmenu') == 'gu' ? 'highlight' : '' }}">
                        <a href="{{ route('group.index') }}" class="menu-link">
                            <div class="text-truncate" data-i18n="Group">Group</div>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->getMenu('subject.index', 'name'))
                    <li class="menu-item {{ Session::get('activesubmenu') == 'su' ? 'highlight' : '' }}">
                        <a href="{{ route('subject.index') }}" class="menu-link">
                            <div class="text-truncate" data-i18n="Subject">Subject</div>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->getMenu('house.index', 'name'))
                    <li class="menu-item {{ Session::get('activesubmenu') == 'ho' ? 'highlight' : '' }}">
                        <a href="{{ route('house.index') }}" class="menu-link">
                            <div class="text-truncate" data-i18n="House">House</div>
                        </a>
                    </li>
                @endif
            </ul>
        </li>
    @endif

    @if (Auth::user()->getMenu('Users', 'module_name') && Auth::user()->is_view_user == 0)
        <li class="menu-item {{ Session::get('activemenu') == 'users' ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-shield-quarter text-danger"></i>
                <div class="text-truncate" data-i18n="Users">Users</div>
            </a>
            <ul class="menu-sub">
                @if (Auth::user()->getMenu('users.index', 'name'))
                    <li class="menu-item {{ Session::get('activesubmenu') == 'ul' ? 'highlight' : '' }}">
                        <a href="{{ route('users.index') }}" class="menu-link">
                            <div class="text-truncate" data-i18n="Users List">Users List</div>
                        </a>
                    </li>
                @endif
                {{-- @if (Auth::user()->getMenu('roles.index', 'name'))
                    <li class="menu-item {{ Session::get('activesubmenu') == 'ur' ? 'highlight' : '' }}">
                        <a href="{{ route('roles.index') }}" class="menu-link">
                            <div class="text-truncate" data-i18n="Roles List">Roles List</div>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->getMenu('permissions.index', 'name'))
                    <li class="menu-item {{ Session::get('activesubmenu') == 'pr' ? 'highlight' : '' }}">
                        <a href="{{ route('permissions.index') }}" class="menu-link">
                            <div class="text-truncate" data-i18n="Roles Permissions">Roles Permissions</div>
                        </a>
                    </li>
                @endif --}}
            </ul>
        </li>
    @endif
</ul>
