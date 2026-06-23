<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($title ?? 'AkuAtmin') ?> — AkuAtmin</title>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@600;700;800&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <!-- App CSS -->
    <link href="<?= BASE_URL ?>assets/css/style.css" rel="stylesheet">
</head>
<body id="page-top">

<div id="wrapper">

    <?php require_once APP_PATH . '/layouts/sidebar.php'; ?>

    <!-- CONTENT WRAPPER -->
    <div id="content-wrapper">
        <div id="content">

            <!-- TOPBAR -->
            <nav class="topbar">
                <div class="navbar-search">
                    <div class="input-group">
                        <input type="text" placeholder="Cari...">
                        <button class="btn-search" type="button"><i class="fas fa-search" style="font-size:12px;"></i></button>
                    </div>
                </div>

                <div class="topbar-nav">

                    <!-- Alerts -->
                    <div class="dropdown">
                        <button class="topbar-icon-btn" onclick="App.toggleDropdown('alertsDropdown')">
                            <i class="fas fa-bell"></i>
                            <span class="badge-counter">3+</span>
                        </button>
                        <div class="dropdown-menu dropdown-list" id="alertsDropdown">
                            <div class="dropdown-header">Alerts Center</div>
                            <a class="dropdown-item" href="#">
                                <div class="icon-circle bg-primary" style="margin-right:12px;"><i class="fas fa-file-alt" style="color:#fff;"></i></div>
                                <div>
                                    <div style="font-size:13px;font-weight:500;">Laporan bulanan siap diunduh!</div>
                                    <div class="small-text">12 Desember 2024</div>
                                </div>
                            </a>
                            <a class="dropdown-item" href="#">
                                <div class="icon-circle bg-success" style="margin-right:12px;"><i class="fas fa-donate" style="color:#fff;"></i></div>
                                <div>
                                    <div style="font-size:13px;">Dana masuk ke akun Anda!</div>
                                    <div class="small-text">7 Desember 2024</div>
                                </div>
                            </a>
                            <a class="dropdown-item dropdown-item-center" href="#">Lihat Semua Alerts</a>
                        </div>
                    </div>

                    <!-- Messages -->
                    <div class="dropdown">
                        <button class="topbar-icon-btn" onclick="App.toggleDropdown('messagesDropdown')">
                            <i class="fas fa-envelope"></i>
                            <span class="badge-counter">7</span>
                        </button>
                        <div class="dropdown-menu dropdown-list" id="messagesDropdown">
                            <div class="dropdown-header">Message Center</div>
                            <a class="dropdown-item" href="#">
                                <div class="dropdown-list-image" style="margin-right:12px;">
                                    <img src="https://i.pravatar.cc/40?img=1" alt="user">
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div>
                                    <div class="text-truncate" style="font-size:13px;font-weight:500;">Bisakah kamu membantu dengan masalah ini?</div>
                                    <div class="small-text">Emily Fowler · 58m</div>
                                </div>
                            </a>
                            <a class="dropdown-item dropdown-item-center" href="#">Baca Semua Pesan</a>
                        </div>
                    </div>

                    <div class="topbar-divider"></div>

                    <!-- User -->
                    <div class="dropdown">
                        <div class="topbar-user" onclick="App.toggleDropdown('userDropdown')">
                            <span class="topbar-username"><?= htmlspecialchars($_SESSION['username'] ?? 'Admin') ?></span>
                            <img class="img-profile" src="https://i.pravatar.cc/40?img=12" alt="profile">
                        </div>
                        <div class="dropdown-menu" id="userDropdown">
                            <a class="dropdown-item" href="#"><i class="fas fa-user"></i> Profil</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-cogs"></i> Pengaturan</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" onclick="App.showModal('logoutModal'); return false;">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </div>

                </div>
            </nav>
            <!-- End Topbar -->
