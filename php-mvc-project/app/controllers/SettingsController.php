<?php
// ===================================================
// SettingsController.php — Logic / Pengontrol Settings
// ===================================================

class SettingsController {

    public function index(): void {
        $this->view('settings', ['title' => 'Settings']);
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
