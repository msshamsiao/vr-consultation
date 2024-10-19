<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Application')</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome CSS -->
    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Include Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f3f5f9;
            color: #333;
            margin: 0;
        }

        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
            width: 300px;
            padding-top: 3.5rem;
            background-color: #000000e0;
            color: #fff;
            overflow-y: auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: width 0.3s ease;
        }

        .sidebar ul {
            padding-left: 0;
        }

        .sidebar ul li {
            padding: 15px;
            transition: background-color 0.3s ease;
        }

        .sidebar ul li a {
            color: #fff;
            display: flex;
            align-items: center;
        }

        .sidebar ul li a .fas,
        .sidebar ul li a .far {
            width: 30px;
            margin-right: 10px;
            color: #bdb8d7;
        }

        .sidebar ul li:hover {
            background-color: #003d80;
        }

        .sidebar ul li a:hover {
            text-decoration: none;
            color: #304FFE;
        }

        .sidebar-heading {
            font-size: 1.2rem;
            padding: 1rem;
            text-align: center;
            color: #adb5bd;
        }

        .main-content {
            margin-left: 300px;
            padding: 20px;
            background-color: #ffffff;
            min-height: 100vh;
            box-shadow: -10px 0 10px rgba(0, 0, 0, 0.1);
            transition: margin-left 0.3s ease;
        }

        .navbar {
            position: fixed;
            top: 0;
            left: 300px;
            width: calc(100% - 300px);
            z-index: 99;
            padding: 10px 0;
            background-color: #343a40;
            color: #fff;
        }

        .navbar-brand {
            padding-left: 20px;
        }

        .navbar-nav {
            margin-left: auto;
            padding-right: 20px;
        }

        .nav-item {
            margin-left: 10px;
        }

        .nav-link {
            color: #fff;
        }

        .nav-link:hover {
            color: #ccc;
        }

        .footer {
            position: fixed;
            bottom: 0;
            left: 300px;
            width: calc(100% - 300px);
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 10px 0;
            z-index: 98;
        }

        .select2-container .select2-selection--multiple {
            height: auto !important;
        }

        @media (max-width: 992px) {
            .sidebar {
                width: 250px;
                padding-top: 3.2rem;
            }

            .main-content {
                margin-left: 250px;
            }

            .navbar {
                left: 250px;
                width: calc(100% - 250px);
            }

            .footer {
                left: 250px;
                width: calc(100% - 250px);
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
                padding-top: 3rem;
            }

            .main-content {
                margin-left: 200px;
            }

            .navbar {
                left: 200px;
                width: calc(100% - 200px);
            }

            .footer {
                left: 200px;
                width: calc(100% - 200px);
            }
        }

        @media (max-width: 576px) {
            .sidebar {
                width: 100%;
                padding-top: 3rem;
                left: -100%;
            }

            .main-content {
                margin-left: 0;
            }

            .navbar {
                left: 0;
                width: 100%;
            }

            .footer {
                left: 0;
                width: 100%;
            }

            .sidebar.active {
                left: 0;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <small class="sidebar-heading">Electronic Health Records</small>
        <ul>
            <li><a href="/dashboard"><i class="fas fa-tachometer-alt"></i>Dashboard</a></li>
            <li><a href="/patients"><i class="fas fa-user"></i>Patient Information</a></li>
            <li><a href="/clinical_notes"><i class="fas fa-notes-medical"></i>Clinical Notes</a></li>
            <li><a href="/lab_results"><i class="fas fa-vials"></i>Lab Results</a></li>
            <li><a href="/xrays"><i class="fas fa-x-ray"></i>View X-ray</a></li>
        </ul>
        <small class="text-muted sidebar-heading">Scheduling and Appointment</small>
        <ul>
            <li><a href="/appointments"><i class="far fa-calendar-alt"></i>Appointment</a></li>
            <li><a href="/tasks"><i class="fas fa-tasks"></i>Tasks</a></li>
        </ul>
    </div>

    <!-- Main content -->
    <div class="main-content">
        <header>
            <nav class="navbar navbar-expand-lg">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Samantha Siao
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Logout</a>
                                {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form> --}}
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- Main content area -->
        <main class="container mt-5">
            <div class="container-fluid">
                @yield('content')
            </div>
        </main>

        <!-- Footer -->
        {{-- <footer class="footer">
            <p>&copy; {{ date('Y') }} My Application. All rights reserved.</p>
        </footer> --}}
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include Popper.js before Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Include Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#illness').select2({
                placeholder: "Select Medical Conditions",
                allowClear: true
            });
        });
    </script>
</body>
</html>
