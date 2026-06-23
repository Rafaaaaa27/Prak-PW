/**
 * script.js — JavaScript untuk interaksi
 * AkuAtmin MVC Project
 */

const App = (() => {

    // ── Dropdown ──────────────────────────────────────────
    function toggleDropdown(id) {
        document.querySelectorAll('.dropdown-menu').forEach(el => {
            if (el.id !== id) el.classList.remove('show');
        });
        const el = document.getElementById(id);
        if (el) el.classList.toggle('show');
    }

    // Tutup dropdown saat klik di luar
    document.addEventListener('click', e => {
        if (!e.target.closest('.dropdown')) {
            document.querySelectorAll('.dropdown-menu')
                    .forEach(el => el.classList.remove('show'));
        }
    });

    // ── Modal ─────────────────────────────────────────────
    function showModal(id) {
        const el = document.getElementById(id);
        if (el) el.classList.add('show');
    }

    function hideModal(id) {
        const el = document.getElementById(id);
        if (el) el.classList.remove('show');
    }

    // Tutup modal saat klik overlay
    document.addEventListener('click', e => {
        if (e.target.classList.contains('modal-overlay')) {
            e.target.classList.remove('show');
        }
    });

    // ── Sidebar collapse ──────────────────────────────────
    function toggleCollapse(id) {
        const el = document.getElementById(id);
        if (!el) return;
        el.style.display = (el.style.display === 'none' || el.style.display === '')
            ? 'block' : 'none';
    }

    function toggleSidebar() {
        document.getElementById('sidebar')?.classList.toggle('collapsed');
        document.getElementById('content-wrapper')?.classList.toggle('expanded');
    }

    // ── Scroll to Top ─────────────────────────────────────
    const scrollBtn = document.querySelector('.scroll-to-top');
    if (scrollBtn) {
        scrollBtn.style.opacity = '0';
        window.addEventListener('scroll', () => {
            scrollBtn.style.opacity = window.scrollY > 200 ? '1' : '0';
        });
    }

    // ── Charts ────────────────────────────────────────────
    function initAreaChart(canvasId, labels, values) {
        const ctx = document.getElementById(canvasId);
        if (!ctx) return;
        new Chart(ctx, {
            type: 'line',
            data: {
                labels,
                datasets: [{
                    label: 'Pendapatan',
                    lineTension: 0.4,
                    backgroundColor: 'rgba(79,140,255,0.08)',
                    borderColor: '#4f8cff',
                    borderWidth: 2,
                    pointRadius: 4,
                    pointBackgroundColor: '#4f8cff',
                    pointBorderColor: '#0f1117',
                    pointBorderWidth: 2,
                    data: values,
                }],
            },
            options: {
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    x: {
                        grid: { color: 'rgba(255,255,255,0.04)' },
                        ticks: { color: '#8892aa', font: { family: 'DM Sans', size: 11 } },
                    },
                    y: {
                        grid: { color: 'rgba(255,255,255,0.04)' },
                        ticks: {
                            color: '#8892aa',
                            font: { family: 'DM Sans', size: 11 },
                            callback: v => '$' + v.toLocaleString(),
                        },
                    },
                },
            },
        });
    }

    function initDoughnutChart(canvasId, labels, values, colors) {
        const ctx = document.getElementById(canvasId);
        if (!ctx) return;
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels,
                datasets: [{
                    data: values,
                    backgroundColor: colors,
                    hoverBackgroundColor: colors.map(c => c + 'cc'),
                    borderWidth: 3,
                    borderColor: '#181c27',
                }],
            },
            options: {
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                cutout: '78%',
            },
        });
    }

    // ── Toast Notification ────────────────────────────────
    function toast(message, type = 'info', duration = 3000) {
        const container = document.getElementById('toast-container')
            || (() => {
                const div = document.createElement('div');
                div.id = 'toast-container';
                div.style.cssText = 'position:fixed;bottom:24px;left:24px;z-index:9999;display:flex;flex-direction:column;gap:8px;';
                document.body.appendChild(div);
                return div;
            })();

        const colors = {
            success: 'var(--accent-success)',
            danger:  'var(--accent-danger)',
            warning: 'var(--accent-warning)',
            info:    'var(--accent)',
        };

        const el = document.createElement('div');
        el.style.cssText = `
            background: var(--bg-elevated);
            border: 1px solid ${colors[type] || colors.info};
            border-left: 4px solid ${colors[type] || colors.info};
            border-radius: var(--radius-sm);
            color: var(--text-primary);
            font-size: 13px;
            padding: 10px 16px;
            box-shadow: var(--shadow-card);
            animation: fadeUp 0.25s ease;
            max-width: 280px;
        `;
        el.textContent = message;
        container.appendChild(el);

        setTimeout(() => {
            el.style.opacity = '0';
            el.style.transition = 'opacity 0.3s';
            setTimeout(() => el.remove(), 300);
        }, duration);
    }

    // Public API
    return { toggleDropdown, showModal, hideModal, toggleCollapse, toggleSidebar, initAreaChart, initDoughnutChart, toast };

})();
