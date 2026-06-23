<?php require_once APP_PATH . '/layouts/header.php'; ?>

<div class="container-fluid">
    <div class="page-heading">
        <h1><?= htmlspecialchars($title) ?></h1>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header"><h6>Form Elements</h6></div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label">Text Input</label>
                        <input type="text" class="form-control" placeholder="Masukkan teks...">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" placeholder="email@example.com">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" placeholder="••••••••">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Textarea</label>
                        <textarea class="form-control" rows="4" placeholder="Tulis sesuatu..." style="resize:vertical;"></textarea>
                    </div>
                    <div style="display:flex;gap:10px;margin-top:8px;">
                        <button class="btn btn-primary" onclick="App.toast('Form berhasil dikirim!','success')">
                            <i class="fas fa-paper-plane"></i> Submit
                        </button>
                        <button class="btn btn-secondary">Reset</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header"><h6>Button Variants</h6></div>
                <div class="card-body" style="display:flex;flex-wrap:wrap;gap:10px;">
                    <button class="btn btn-primary" onclick="App.toast('Primary!','info')">Primary</button>
                    <button class="btn btn-secondary" onclick="App.toast('Secondary','info')">Secondary</button>
                    <button class="btn btn-primary btn-sm">Small</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once APP_PATH . '/layouts/footer.php'; ?>
