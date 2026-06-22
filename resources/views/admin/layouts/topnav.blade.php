<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm" style="color: #4361ee;"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <div class="navbar-nav align-items-center d-none d-md-flex">
            <div id="clockdate">
                <div class="clockdate-wrapper">
                    <i class="bx bx-time-five" style="color: #4361ee; font-size: 1.2rem;"></i>
                    <div id="clock"></div>
                    <div id="date" class="ms-2 border-start ps-2 border-secondary"></div>
                </div>
            </div>
        </div>

        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                        @if (Auth::user()->photo)
                            <img src="{{ asset(Auth::user()->photo) }}" alt
                                style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover; border: 2px solid #4361ee;">
                        @else
                            <img src="{{ asset('public/logo/logo.png') }}" alt
                                style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover; border: 2px solid #4361ee;">
                        @endif
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0"
                    style="border-radius: 12px; overflow: hidden;">
                    <li>
                        <a class="dropdown-item py-3" href="#">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-online">
                                        @if (Auth::user()->photo)
                                            <img src="{{ asset(Auth::user()->photo) }}" alt
                                                style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;">
                                        @else
                                            <img src="{{ asset('public/logo/logo.png') }}" alt
                                                style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;">
                                        @endif
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <span class="fw-bold d-block text-dark">{{ Auth::user()->name }}</span>
                                    <small class="text-primary fw-medium">
                                        @if (Auth::user()->group_id == 2)
                                            Admin
                                        @elseif(Auth::user()->group_id == 3)
                                            Class Teacher
                                        @elseif(Auth::user()->group_id == 4)
                                            Parent
                                        @endif
                                    </small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider my-0"></div>
                    </li>
                    <li>
                        <a class="dropdown-item py-2 mt-1" href="{{ route('change.password.form') }}">
                            <i class="bx bx-lock-alt me-2 text-primary"></i>
                            <span class="align-middle">Change Password</span>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider my-0"></div>
                    </li>
                    <li>
                        <a class="dropdown-item py-2 mb-1 text-danger" href="{{ route('customlogout') }}">
                            <i class="bx bx-power-off me-2"></i>
                            <span class="align-middle fw-medium">Log Out</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
