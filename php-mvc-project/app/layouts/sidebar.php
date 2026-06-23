<!-- SIDEBAR -->
<nav class="sidebar" id="sidebar">

    <a class="sidebar-brand" href="<?= BASE_URL ?>dashboard">
        <div class="sidebar-brand-icon">
            <i class="fas fa-bolt"></i>
        </div>
        <div class="sidebar-brand-text">AkuAtmin</div>
    </a>

    <hr class="sidebar-divider">
    <div class="sidebar-heading">Main</div>

    <?php
    $currentUrl = $_SERVER['REQUEST_URI'];
    // Helper check function
    $isActive = function($url) use ($currentUrl) {
        return (strpos($currentUrl, $url) !== false);
    };
    $isHome = ($currentUrl === BASE_URL || $currentUrl === BASE_URL . 'index.php' || $isActive('dashboard'));
    ?>

    <li class="nav-item <?= $isHome ? 'active' : '' ?>">
        <a class="nav-link" href="<?= BASE_URL ?>dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider">
    <div class="sidebar-heading">Interface</div>

    <li class="nav-item <?= $isActive('form') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= BASE_URL ?>form">
            <i class="fas fa-fw fa-wpforms"></i>
            <span>Form</span>
        </a>
    </li>

    <li class="nav-item <?= $isActive('chat') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= BASE_URL ?>chat">
            <i class="fas fa-fw fa-comments"></i>
            <span>Chat</span>
        </a>
    </li>

    <hr class="sidebar-divider">
    <div class="sidebar-heading">System</div>

    <li class="nav-item <?= $isActive('settings') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= BASE_URL ?>settings">
            <i class="fas fa-fw fa-cog"></i>
            <span>Settings</span>
        </a>
    </li>

    <hr class="sidebar-divider">
    <button id="sidebarToggle" onclick="App.toggleSidebar()"></button>

</nav>
