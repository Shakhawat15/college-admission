<ul class="menu-inner py-1">
    <!-- Dashboards -->
    <li class="menu-item {{ Session::get('activemenu') == 'dashboard' ? 'active open' : '' }}">
        <a href="{{ url('admin/dashboard') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-grid-alt"></i>
            <div class="text-truncate" data-i18n="Dashboard">Dashboard</div>
        </a>
    </li>

    <!-- Profile (Student) -->
    @if (Auth::user()->group_id == 4)
        <li class="menu-item {{ Session::get('activemenu') == 'profile' ? 'active open' : '' }}">
            <a href="{{ route('StudentProfile', 0) }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user-circle"></i>
                <div class="text-truncate" data-i18n="Profile">Profile</div>
            </a>
        </li>
    @endif

    <!-- Admission (Group 7) -->
    @if (Auth::user()->group_id == 7)
        <li class="menu-item {{ Session::get('activemenu') == 'admission' ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-user-plus"></i>
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
                <i class="menu-icon tf-icons bx bx-key"></i>
                <div class="text-truncate" data-i18n="Resend password">Resend password</div>
            </a>
        </li>
    @endif

    <!-- Teacher Profile (Group 3) -->
    @if (Auth::user()->group_id == 3)
        <li class="menu-item {{ Session::get('activemenu') == 'Profile' ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-user-badge"></i>
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
                <i class="menu-icon tf-icons bx bx-layer"></i>
                <div class="text-truncate" data-i18n="Class">Class</div>
            </a>
        </li>
        <li class="menu-item {{ Session::get('activemenu') == 'Routen' ? 'active open' : '' }}">
            <a href="{{ route('teacherRouten') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-calendar-event"></i>
                <div class="text-truncate" data-i18n="My Routine">My Routine</div>
            </a>
        </li>
        <li class="menu-item {{ Session::get('activemenu') == 'Student' ? 'active open' : '' }}">
            <a href="{{ route('teacherStudent') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-group"></i>
                <div class="text-truncate" data-i18n="Student">Student</div>
            </a>
        </li>

        @if (Auth::user()->id == 10881)
            <li class="menu-item {{ Session::get('activemenu') == 'ca' ? 'active open' : '' }}">
                <a href="{{ route('collegeAdmission') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-select-multiple"></i>
                    <div class="text-truncate" data-i18n="College Admission">College Admission</div>
                </a>
            </li>
        @endif
        @if (Auth::user()->id == 10909)
            <li class="menu-item {{ Session::get('activemenu') == 'ks' ? 'active open' : '' }}">
                <a href="{{ route('showStudentCounts') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-pie-chart-alt-2"></i>
                    <div class="text-truncate" data-i18n="Student Statistics">Student Statistics</div>
                </a>
            </li>
        @endif
    @endif

    <!-- Students Module -->
    @if (Auth::user()->getMenu('Students', 'module_name'))
        <li class="menu-item {{ Session::get('activemenu') == 'student' ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-group"></i>
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

    <!-- Admission Module -->
    @if (Auth::user()->getMenu('Admission', 'module_name'))
        <li class="menu-item {{ Session::get('activemenu') == 'admission' ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-id-card"></i>
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

    <!-- Class Module -->
    @if (Auth::user()->getMenu('Class', 'module_name') && Auth::user()->is_view_user == 0)
        <li class="menu-item {{ Session::get('activemenu') == 'class' ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-spreadsheet"></i>
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

    <!-- Academy Settings -->
    @if (Auth::user()->getMenu('Academy Settings', 'module_name') && Auth::user()->is_view_user == 0)
        <li class="menu-item {{ Session::get('activemenu') == 'setting' ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-cog"></i>
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

    <!-- Users Module -->
    @if (Auth::user()->getMenu('Users', 'module_name') && Auth::user()->is_view_user == 0)
        <li class="menu-item {{ Session::get('activemenu') == 'users' ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-shield-quarter"></i>
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
            </ul>
        </li>
    @endif
</ul>
