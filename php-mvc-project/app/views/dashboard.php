<?php require_once APP_PATH . '/layouts/header.php'; ?>

<!-- ===== PAGE CONTENT ===== -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="page-heading">
        <h1><?= htmlspecialchars($title) ?></h1>
        <a href="#" class="btn btn-primary btn-sm">
            <i class="fas fa-download"></i> Generate Report
        </a>
    </div>

    <!-- Stat Cards -->
    <div class="stat-row">
        <div class="card">
            <div class="stat-card primary">
                <div class="stat-label">Pendapatan Bulanan</div>
                <div class="stat-value"><?= htmlspecialchars($earnings_monthly) ?></div>
                <i class="fas fa-calendar stat-icon"></i>
            </div>
        </div>
        <div class="card">
            <div class="stat-card success">
                <div class="stat-label">Pendapatan Tahunan</div>
                <div class="stat-value"><?= htmlspecialchars($earnings_annual) ?></div>
                <i class="fas fa-dollar-sign stat-icon"></i>
            </div>
        </div>
        <div class="card">
            <div class="stat-card info">
                <div class="stat-label">Tasks</div>
                <div class="stat-value"><?= $tasks_percent ?>%</div>
                <div class="progress progress-sm" style="margin-top:10px;">
                    <div class="progress-bar" style="width:<?= $tasks_percent ?>%;background:var(--accent-info);"></div>
                </div>
                <i class="fas fa-clipboard-list stat-icon"></i>
            </div>
        </div>
        <div class="card">
            <div class="stat-card warning">
                <div class="stat-label">Pending Requests</div>
                <div class="stat-value"><?= $pending_requests ?></div>
                <i class="fas fa-comments stat-icon"></i>
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-header">
                    <h6>Earnings Overview</h6>
                    <div class="dropdown">
                        <button class="topbar-icon-btn" onclick="App.toggleDropdown('chartDropdown')" style="width:28px;height:28px;">
                            <i class="fas fa-ellipsis-v" style="font-size:12px;"></i>
                        </button>
                        <div class="dropdown-menu" id="chartDropdown" style="min-width:160px;">
                            <a class="dropdown-item" href="#">Export PNG</a>
                            <a class="dropdown-item" href="#">Export CSV</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Refresh</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header"><h6>Revenue Sources</h6></div>
                <div class="card-body">
                    <div class="chart-pie">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="chart-legend">
                        <div class="legend-item"><div class="legend-dot" style="background:var(--accent);"></div> Direct</div>
                        <div class="legend-item"><div class="legend-dot" style="background:var(--accent-success);"></div> Social</div>
                        <div class="legend-item"><div class="legend-dot" style="background:var(--accent-info);"></div> Referral</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Projects Row -->
    <div class="row">
        <div class="col-lg-6">
            <div class="card" style="margin-bottom:20px;">
                <div class="card-header"><h6>Projects</h6></div>
                <div class="card-body">
                    <?php foreach ($projects as $project): ?>
                        <div class="project-row">
                            <div class="project-meta">
                                <span class="project-name"><?= htmlspecialchars($project['name']) ?></span>
                                <span class="project-pct"><?= isset($project['label']) ? $project['label'] : $project['percent'] . '%' ?></span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar <?= $project['color'] ?>" style="width:<?= $project['percent'] ?>%"></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header"><h6>Pendekatan Pengembangan</h6></div>
                <div class="card-body">
                    <p style="color:var(--text-secondary);font-size:13px;margin-bottom:12px;">
                        AkuAtmin menggunakan konsep <strong style="color:var(--accent);">MVC</strong> dengan PHP native.
                        CSS ditulis dari scratch — tidak ada Bootstrap, tidak ada framework eksternal.
                    </p>
                    <p style="color:var(--text-secondary);font-size:13px;margin:0;">
                        Routing bekerja melalui
                        <code style="background:var(--bg-elevated);padding:2px 6px;border-radius:4px;color:var(--accent-info);font-size:12px;">index.php</code>
                        yang membaca parameter <code style="background:var(--bg-elevated);padding:2px 6px;border-radius:4px;color:var(--accent-info);font-size:12px;">?url=</code>.
                    </p>
                    <button class="btn btn-secondary btn-sm" style="margin-top:16px;" onclick="App.toast('Berhasil dimuat ulang!', 'success')">
                        <i class="fas fa-sync-alt"></i> Test Toast
                    </button>
                </div>
            </div>
        </div>
    </div>

</div><!-- End container-fluid -->

<?php
// Chart data — di-pass ke script.js via inline script
$scripts = <<<JS
<script>
document.addEventListener('DOMContentLoaded', () => {
    App.initAreaChart(
        'myAreaChart',
        ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'],
        [0, 10000, 5000, 15000, 10000, 20000, 15000, 25000, 17500, 30000, 25000, 40000]
    );
    App.initDoughnutChart(
        'myPieChart',
        ['Direct','Social','Referral'],
        [55, 30, 15],
        ['#4f8cff','#22d3a0','#38bdf8']
    );
});
</script>
JS;
?>

<?php require_once APP_PATH . '/layouts/footer.php'; ?>
