<style>
    .webnav-bar {
        background: #038199 !important;
    }

    .webnav-bar .navbar-nav .nav-link {
        color: #fff;
        padding: 0 10px;
    }

    .webnav-bar .navbar-nav>a {
        color: #fff;
    }

    .navbar-light .navbar-nav .nav-link.active,
    .navbar-light .navbar-nav .show>.nav-link {
        color: #a3e0ee;
    }

    .webnav-bar a svg {
        width: 2em;
        height: 2em;
    }

    .webnav-bar .navbar-nav .nav-link {
        padding: 10px;
        border-radius: 5px;
        line-height: 1.3;
    }

    .webnav-bar .navbar-nav .nav-link:hover,
    .webnav-bar .navbar-nav .nav-link.active {
        background: #fff;
        color: #038199 !important;
    }
</style>

@auth
    @if (Auth::user()->user_type == 'admin')
        <nav class="navbar navbar-expand-lg navbar-light webnav-bar mb-3">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 align-items-center">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('admin/dashboard') }}" id="homeLink">Dashboard</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{ route('definetopic') }}" id="feedbackLink"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Carrier Mgmt
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="feedbackLink">
                                <li><a class="dropdown-item" href="{{ route('createcarrier') }}">Create Carrier</a></li>
                                <li><a class="dropdown-item" href="{{ route('showcarrieradmin') }}">Show All Carriers</a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{ route('createload') }}" id="feedbackLink"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Load Mgmt
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="feedbackLink">
                                <li><a class="dropdown-item" href="{{ route('createload') }}">Create Load</a></li>
                                <li><a class="dropdown-item" href="{{ route('showloadadmin') }}">Show All Loads</a></a></li>
                            </ul>
                        </li>


                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{ route('timetracker') }}" id="assessmentsLink"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Time Mgmt
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="assessmentsLink">
                                <li><a class="dropdown-item" href="{{ route('timetracker') }}">Enter Time</a></li>
                                <li><a class="dropdown-item" href="{{ route('showhistory') }}">Show History</a></li>
                                <li><a class="dropdown-item" href="{{ route('createdailyupdate') }}">Enter Update</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{ route('timetracker') }}" id="assessmentsLink"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Admin Controls
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="assessmentsLink">
                                <li><a class="dropdown-item" href="{{ route('showallusertimehistory') }}">Show All User's
                                        Time History</a></li>
                                <li><a class="dropdown-item" href="{{ route('updatesforallsales') }}">Show All Sale's
                                        Users Updates</a></li>
                                
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{ route('file.index') }}" id="rubricsLink"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Resources
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="assessmentsLink">
                                <li><a class="dropdown-item" href="{{ route('file.index') }}">Add Resources</a></li>
                                <li><a class="dropdown-item" href="{{ route('showallfiles') }}">All Resources</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{ route('createload') }}" id="feedbackLink"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                User Mgmt
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="feedbackLink">
                                <li><a class="dropdown-item" href="{{ route('createload') }}">Create User</a></li>
                                <li><a class="dropdown-item" href="{{ route('showallusers') }}">Show All Users</a></a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{ route('createload') }}" id="feedbackLink"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Notes Mgmt
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="feedbackLink">
                                <li><a class="dropdown-item" href="{{ route('createnote') }}">Create a Note</a></li>
                                <li><a class="dropdown-item" href="{{ route('showallnotes') }}">Show All Notes</a></a></li>
                            </ul>
                        </li>

                    </ul>
                    <div class="header-actions-container">
                        <!-- Header actions start -->
                        <ul class="header-actions">
                            <!-- Your existing header actions -->
                        </ul>
                        <!-- Header actions end -->
                    </div>
                    <div class="header-actions-container">
                        <!-- Header actions start -->
                        <ul class="header-actions">
                            <li class="dropdown">
                                <a href="#" id="userSettings" class="user-settings" data-toggle="dropdown"
                                    aria-haspopup="true">
                                    <span class="user-name d-none d-md-block text-white">@auth
                                            {{ Auth::user()->name }}
                                        @endauth
                                    </span>
                                    <span class="avatar">
                                        <img src="{{ asset('assets/img') }}/user.png" alt="User Avatar">
                                        <span class="status online"></span>
                                    </span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userSettings">
                                    <div class="header-profile-actions">
                                        <a href="{{ route('updatepassword') }}">Update Password</a>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>

                                    </div>
                                </div>

                            </li>
                            <li>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userSettings">
                                    <div class="header-profile-actions">
                                        <a href="login.html">Logout</a>
                                    </div>
                                </div>
                            </li>

                        </ul>
                        <!-- Header actions end -->

                    </div>
                </div>
            </div>
        </nav>
    @elseif (Auth::user()->user_type == 'qa')
        <nav class="navbar navbar-expand-lg navbar-light webnav-bar mb-3">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 align-items-center">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('qa/dashboard') }}" id="homeLink">Dashboard</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{ route('definetopic') }}" id="feedbackLink"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Carrier Mgmt
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="feedbackLink">
                                <li><a class="dropdown-item" href="{{ route('showcarrieradmin') }}">Show All Carriers</a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{ route('createload') }}" id="feedbackLink"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Load Mgmt
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="feedbackLink">
                                <li><a class="dropdown-item" href="{{ route('showloadadmin') }}">Show All Loads</a></a></li>
                            </ul>
                        </li>


                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{ route('timetracker') }}" id="assessmentsLink"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Time Mgmt
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="assessmentsLink">
                                <li><a class="dropdown-item" href="{{ route('timetracker') }}">Enter Time</a></li>
                                <li><a class="dropdown-item" href="{{ route('showhistory') }}">Show History</a></li>
                                <li><a class="dropdown-item" href="{{ route('createdailyupdate') }}">Enter Update</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{ route('timetracker') }}" id="assessmentsLink"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Admin Controls
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="assessmentsLink">
                                <li><a class="dropdown-item" href="{{ route('showallusertimehistory') }}">Show All User's
                                        Time History</a></li>
                                <li><a class="dropdown-item" href="{{ route('updatesforallsales') }}">Show All Sale's
                                        Users Updates</a></li>
                                
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{ route('file.index') }}" id="rubricsLink"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Resources
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="assessmentsLink">
                                <li><a class="dropdown-item" href="{{ route('file.index') }}">Add Resources</a></li>
                                <li><a class="dropdown-item" href="{{ route('showallfiles') }}">All Resources</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{ route('createload') }}" id="feedbackLink"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                User Mgmt
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="feedbackLink">
                                <li><a class="dropdown-item" href="{{ route('showallusers') }}">Show All Users</a></a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{ route('createload') }}" id="feedbackLink"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Notes Mgmt
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="feedbackLink">
                                <li><a class="dropdown-item" href="{{ route('showallnotes') }}">Show All Notes</a></a></li>
                            </ul>
                        </li>

                    </ul>
                    <div class="header-actions-container">
                        <!-- Header actions start -->
                        <ul class="header-actions">
                            <!-- Your existing header actions -->
                        </ul>
                        <!-- Header actions end -->
                    </div>
                    <div class="header-actions-container">
                        <!-- Header actions start -->
                        <ul class="header-actions">
                            <li class="dropdown">
                                <a href="#" id="userSettings" class="user-settings" data-toggle="dropdown"
                                    aria-haspopup="true">
                                    <span class="user-name d-none d-md-block text-white">@auth
                                            {{ Auth::user()->name }}
                                        @endauth
                                    </span>
                                    <span class="avatar">
                                        <img src="{{ asset('assets/img') }}/user.png" alt="User Avatar">
                                        <span class="status online"></span>
                                    </span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userSettings">
                                    <div class="header-profile-actions">
                                        <a href="{{ route('updatepassword') }}">Update Password</a>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>

                                    </div>
                                </div>

                            </li>
                            <li>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userSettings">
                                    <div class="header-profile-actions">
                                        <a href="login.html">Logout</a>
                                    </div>
                                </div>
                            </li>

                        </ul>
                        <!-- Header actions end -->

                    </div>
                </div>
            </div>
        </nav>
    
    @elseif(Auth::user()->user_type == 'sales')
        <nav class="navbar navbar-expand-lg navbar-light webnav-bar mb-3">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 align-items-center">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('sales/dashboard') }}"
                                id="homeLink">Dashboard</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{ route('definetopic') }}" id="feedbackLink"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Carrier Mgmt
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="feedbackLink">
                                <li><a class="dropdown-item" href="{{ route('createcarrier') }}">Create Carrier</a></li>
                                <li><a class="dropdown-item" href="{{ route('showcarrier') }}">Show All</a></a></li>
                            </ul>
                        </li>


                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{ route('timetracker') }}" id="assessmentsLink"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Time Mgmt
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="assessmentsLink">
                                <li><a class="dropdown-item" href="{{ route('timetracker') }}">Enter Time</a></li>
                                <li><a class="dropdown-item" href="{{ route('showhistory') }}">Show History</a></li>
                                <li><a class="dropdown-item" href="{{ route('createdailyupdate') }}">Enter Update</a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{ route('file.index') }}" id="rubricsLink"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Resources
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="assessmentsLink">
                                <li><a class="dropdown-item" href="{{ route('showallfiles') }}">All Resources</a></li>
                            </ul>
                        </li>

                    </ul>
                    <div class="header-actions-container">
                        <!-- Header actions start -->
                        <ul class="header-actions">
                            <!-- Your existing header actions -->
                        </ul>
                        <!-- Header actions end -->
                    </div>
                    <div class="header-actions-container">
                        <!-- Header actions start -->
                        <ul class="header-actions">
                            <li class="dropdown">
                                <a href="#" id="userSettings" class="user-settings" data-toggle="dropdown"
                                    aria-haspopup="true">
                                    <span class="user-name d-none d-md-block text-white">@auth
                                            {{ Auth::user()->name }}
                                        @endauth
                                    </span>
                                    <span class="avatar">
                                        <img src="{{ asset('assets/img') }}/user.png" alt="User Avatar">
                                        <span class="status online"></span>
                                    </span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userSettings">
                                    <div class="header-profile-actions">
                                        <a href="{{ route('updatepassword') }}">Update Password</a>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>

                                    </div>
                                </div>

                            </li>
                            <li>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userSettings">
                                    <div class="header-profile-actions">
                                        <a href="login.html">Logout</a>
                                    </div>
                                </div>
                            </li>

                        </ul>
                        <!-- Header actions end -->

                    </div>
                </div>
            </div>
        </nav>
    @elseif(Auth::user()->user_type == 'dispatch')
        <nav class="navbar navbar-expand-lg navbar-light webnav-bar mb-3">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 align-items-center">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('dispatch/dashboard') }}"
                                id="homeLink">Dashboard</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{ route('createload') }}" id="feedbackLink"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Load Mgmt
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="feedbackLink">
                                <li><a class="dropdown-item" href="{{ route('createload') }}">Create Load</a></li>
                                <li><a class="dropdown-item" href="{{ route('showload') }}">Show All</a></a></li>
                            </ul>
                        </li>


                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{ route('timetracker') }}" id="assessmentsLink"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Time Mgmt
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="assessmentsLink">
                                <li><a class="dropdown-item" href="{{ route('timetracker') }}">Enter Time</a></li>
                                <li><a class="dropdown-item" href="{{ route('showhistory') }}">Show History</a></li>
                                <li><a class="dropdown-item" href="{{ route('createdailyupdate') }}">Enter Update</a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('showcarrierdispatch') }}"
                                id="homeLink">Assigned Carrier</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{ route('file.index') }}" id="rubricsLink"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Resources
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="assessmentsLink">
                                <li><a class="dropdown-item" href="{{ route('showallfiles') }}">All Resources</a></li>
                            </ul>
                        </li>
                        

                    </ul>
                    <div class="header-actions-container">
                        <!-- Header actions start -->
                        <ul class="header-actions">
                            <!-- Your existing header actions -->
                        </ul>
                        <!-- Header actions end -->
                    </div>
                    <div class="header-actions-container">
                        <!-- Header actions start -->
                        <ul class="header-actions">
                            <li class="dropdown">
                                <a href="#" id="userSettings" class="user-settings" data-toggle="dropdown"
                                    aria-haspopup="true">
                                    <span class="user-name d-none d-md-block text-white">@auth
                                            {{ Auth::user()->name }}
                                        @endauth
                                    </span>
                                    <span class="avatar">
                                        <img src="{{ asset('assets/img') }}/user.png" alt="User Avatar">
                                        <span class="status online"></span>
                                    </span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userSettings">
                                    <div class="header-profile-actions">
                                        <a href="{{ route('updatepassword') }}">Update Password</a>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>

                                    </div>
                                </div>

                            </li>
                            <li>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userSettings">
                                    <div class="header-profile-actions">
                                        <a href="login.html">Logout</a>
                                    </div>
                                </div>
                            </li>

                        </ul>
                        <!-- Header actions end -->

                    </div>
                </div>
            </div>
        </nav>
    @else
        <li class="nav-item">
            <!-- Default Menu for other user types -->
        </li>
    @endif
@endauth


<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get the current URL path
        var path = window.location.pathname;

        // Define the route names associated with each navigation item
        var routeNames = {
            'home': 'homeLink',
            'mycategories': 'assessmentsLink',
            'definetopic': 'feedbackLink',
            'alltopics': 'feedbackLink',
            'newassesment': 'assessmentsLink',
            'rubrics': 'rubricsLink'
        };

        // Find the corresponding route name and add the 'active' class
        var activeLinkId = routeNames[path.replace('/', '')];
        if (activeLinkId) {
            // Remove 'active' class from all nav links
            document.querySelectorAll('.nav-link').forEach(function(link) {
                link.classList.remove('active');
            });

            // Add 'active' class to the current nav link
            document.getElementById(activeLinkId).classList.add('active');
        }
    });
</script>
