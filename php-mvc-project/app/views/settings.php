<?php require_once APP_PATH . '/layouts/header.php'; ?>

<div class="container-fluid">
    <div class="page-heading">
        <h1><?= htmlspecialchars($title) ?></h1>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header"><h6>Profil Akun</h6></div>
                <div class="card-body">
                    <div style="display:flex;align-items:center;gap:16px;margin-bottom:20px;">
                        <img src="https://i.pravatar.cc/64?img=12" style="width:64px;height:64px;border-radius:50%;border:2px solid var(--border-hover);">
                        <div>
                            <div style="font-weight:600;color:var(--text-primary);">Admin</div>
                            <div style="font-size:12px;color:var(--text-muted);">admin@akuatmin.dev</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control" value="Admin">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" value="admin@akuatmin.dev">
                    </div>
                    <button class="btn btn-primary btn-sm" onclick="App.toast('Profil berhasil disimpan!','success')">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header"><h6>Preferensi</h6></div>
                <div class="card-body">
                    <div style="display:flex;justify-content:space-between;align-items:center;padding:12px 0;border-bottom:1px solid var(--border);">
                        <div>
                            <div style="font-size:13px;color:var(--text-primary);">Notifikasi Email</div>
                            <div style="font-size:11px;color:var(--text-muted);">Terima update via email</div>
                        </div>
                        <label style="position:relative;display:inline-block;width:40px;height:22px;cursor:pointer;">
                            <input type="checkbox" checked style="opacity:0;width:0;height:0;" onchange="App.toast(this.checked?'Aktif':'Nonaktif','info')">
                            <span style="position:absolute;inset:0;background:var(--accent);border-radius:11px;transition:.3s;"></span>
                            <span style="position:absolute;top:3px;left:3px;width:16px;height:16px;background:#fff;border-radius:50%;transition:.3s;"></span>
                        </label>
                    </div>
                    <div style="display:flex;justify-content:space-between;align-items:center;padding:12px 0;">
                        <div>
                            <div style="font-size:13px;color:var(--text-primary);">Dark Mode</div>
                            <div style="font-size:11px;color:var(--text-muted);">Tampilan gelap (aktif by default)</div>
                        </div>
                        <label style="position:relative;display:inline-block;width:40px;height:22px;cursor:pointer;">
                            <input type="checkbox" checked style="opacity:0;width:0;height:0;" onchange="App.toast('Mode diubah','info')">
                            <span style="position:absolute;inset:0;background:var(--accent);border-radius:11px;transition:.3s;"></span>
                            <span style="position:absolute;top:3px;left:3px;width:16px;height:16px;background:#fff;border-radius:50%;transition:.3s;"></span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once APP_PATH . '/layouts/footer.php'; ?>
