<?php
// ===================================================
// DashboardController.php — Logic / Pengontrol Dashboard
// ===================================================

class DashboardController {

    /**
     * Halaman utama dashboard
     */
    public function index(): void {
        $data = [
            'title'            => 'Dashboard',
            'earnings_monthly' => '$40,000',
            'earnings_annual'  => '$215,000',
            'tasks_percent'    => 50,
            'pending_requests' => 18,
            'projects'         => [
                ['name' => 'Server Migration',  'percent' => 20,  'color' => 'bg-danger'],
                ['name' => 'Sales Tracking',    'percent' => 40,  'color' => 'bg-warning'],
                ['name' => 'Customer Database', 'percent' => 60,  'color' => ''],
                ['name' => 'Payout Details',    'percent' => 80,  'color' => 'bg-info'],
                ['name' => 'Account Setup',     'percent' => 100, 'color' => 'bg-success', 'label' => 'Complete!'],
            ],
        ];

        $this->view('dashboard', $data);
    }

    /**
     * Halaman 404
     */
    public function notFound(): void {
        http_response_code(404);
        $this->view('404', ['title' => '404 — Halaman Tidak Ditemukan']);
    }

    // ── Helper ──────────────────────────────────────

    protected function view(string $view, array $data = []): void {
        if (!empty($data)) extract($data);
        $file = APP_PATH . '/views/' . $view . '.php';
        if (file_exists($file)) {
            require_once $file;
        } else {
            die("View not found: {$view}");
        }
    }
}
