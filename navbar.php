<nav class="navbar navbar-expand-lg warna2 shadow-sm">
    <div class="container-fluid">
        <!-- Brand/Logo -->
        <a class="navbar-brand text-white fw-bold fs-4" href="index.php">
            <i class="fas fa-car me-2"></i>RodaLancar
        </a>

        <!-- Mobile Toggle Button -->
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon-custom">
                <i class="fas fa-bars text-white"></i>
            </span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Main Navigation -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link nav-link-custom px-3" href="index.php">
                        <i class="fas fa-home me-1"></i>
                        <span class="text-white">Home</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-custom px-3" href="tentang-kami.php">
                        <i class="fas fa-info-circle me-1"></i>
                        <span class="text-white">Tentang Kami</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-custom px-3" href="unit-mobil.php">
                        <i class="fas fa-car me-1"></i>
                        <span class="text-white">Unit Mobil</span>
                    </a>
                </li>
            </ul>

            <!-- Right Side - Login/User Menu -->
            <ul class="navbar-nav">
                <!-- Jika belum login -->
                <li class="nav-item dropdown me-2">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user me-1"></i>
                        Akun
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end warna4 border-0 shadow">
                        <li>
                            <a class="dropdown-item py-2" href="login.php">
                                <i class="fas fa-sign-in-alt me-2"></i>
                                <span>Login</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item py-2" href="adminpanel/login.php">
                                <i class="fas fa-user-shield me-2 "></i>
                                <span>Login Admin</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
    /* Custom Navbar Styles */
    .nav-link-custom {
        position: relative;
        transition: all 0.3s ease;
        border-radius: 8px;
        margin: 0 2px;
    }

    .nav-link-custom:hover {
        background-color: rgba(255, 255, 255, 0.1);
        transform: translateY(-1px);
    }

    .nav-link-custom:hover span {
        color: #DDE6ED !important;
    }

    .navbar-brand {
        transition: all 0.3s ease;
    }

    .navbar-brand:hover {
        transform: scale(1.05);
        color: #DDE6ED !important;
    }

    /* Dropdown Styles */
    .dropdown-menu {
        border-radius: 12px;
        padding: 8px;
        margin-top: 8px;
    }

    .dropdown-item {
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .dropdown-item:hover {
        background-color: rgba(39, 55, 77, 0.1);
        transform: translateX(5px);
    }

    /* Mobile Toggle Button */
    .navbar-toggler {
        padding: 8px 12px;
        border-radius: 8px;
    }

    .navbar-toggler:hover {
        background-color: rgba(255, 255, 255, 0.1);
    }

    /* Contact Button */
    .btn-outline-light {
        transition: all 0.3s ease;
        font-weight: 500;
    }

    .btn-outline-light:hover {
        background-color: white;
        color: #27374D !important;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    /* Active Navigation State */
    .nav-link-custom.active {
        background-color: rgba(255, 255, 255, 0.15);
    }

    .nav-link-custom.active span {
        color: #DDE6ED !important;
        font-weight: 600;
    }

    /* Responsive adjustments */
    @media (max-width: 991px) {
        .navbar-collapse {
            background-color: rgba(39, 55, 77, 0.95);
            margin-top: 15px;
            border-radius: 12px;
            padding: 15px;
            backdrop-filter: blur(10px);
        }

        .nav-link-custom {
            margin: 2px 0;
            padding: 10px 15px !important;
        }

        .btn-outline-light {
            margin-top: 10px;
        }
    }

    /* Badge for notifications (optional) */
    .notification-badge {
        position: absolute;
        top: -5px;
        right: -5px;
        background-color: #dc3545;
        color: white;
        border-radius: 50%;
        width: 18px;
        height: 18px;
        font-size: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>