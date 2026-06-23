<?php require_once APP_PATH . '/layouts/header.php'; ?>

<div class="container-fluid">
    <div class="page-heading">
        <h1><?= htmlspecialchars($title) ?></h1>
    </div>

    <div class="card" style="max-width:680px;">
        <div class="card-header"><h6>Chat Room</h6></div>
        <div class="card-body" style="padding:0;">

            <!-- Messages -->
            <div id="chat-messages" style="height:340px;overflow-y:auto;padding:20px;display:flex;flex-direction:column;gap:14px;">
                <div style="display:flex;gap:10px;align-items:flex-start;">
                    <img src="https://i.pravatar.cc/36?img=1" style="width:36px;height:36px;border-radius:50%;flex-shrink:0;">
                    <div>
                        <div style="font-size:11px;color:var(--text-muted);margin-bottom:4px;">Emily · 10:32</div>
                        <div style="background:var(--bg-elevated);border-radius:0 10px 10px 10px;padding:10px 14px;font-size:13px;max-width:320px;">Hei, ada update soal project server migration?</div>
                    </div>
                </div>
                <div style="display:flex;gap:10px;align-items:flex-start;flex-direction:row-reverse;">
                    <img src="https://i.pravatar.cc/36?img=12" style="width:36px;height:36px;border-radius:50%;flex-shrink:0;">
                    <div style="text-align:right;">
                        <div style="font-size:11px;color:var(--text-muted);margin-bottom:4px;">Kamu · 10:35</div>
                        <div style="background:var(--accent);border-radius:10px 0 10px 10px;padding:10px 14px;font-size:13px;max-width:320px;color:#fff;">Sudah 20%, masih on track 👍</div>
                    </div>
                </div>
            </div>

            <!-- Input -->
            <div style="border-top:1px solid var(--border);padding:14px 20px;display:flex;gap:10px;">
                <input type="text" id="chat-input" class="form-control" placeholder="Ketik pesan..." style="flex:1;"
                    onkeydown="if(event.key==='Enter') sendChat()">
                <button class="btn btn-primary" onclick="sendChat()">
                    <i class="fas fa-paper-plane"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<script>
function sendChat() {
    const input = document.getElementById('chat-input');
    const msg = input.value.trim();
    if (!msg) return;

    const box = document.getElementById('chat-messages');
    const now = new Date().toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' });

    box.innerHTML += `
        <div style="display:flex;gap:10px;align-items:flex-start;flex-direction:row-reverse;">
            <img src="https://i.pravatar.cc/36?img=12" style="width:36px;height:36px;border-radius:50%;flex-shrink:0;">
            <div style="text-align:right;">
                <div style="font-size:11px;color:var(--text-muted);margin-bottom:4px;">Kamu · ${now}</div>
                <div style="background:var(--accent);border-radius:10px 0 10px 10px;padding:10px 14px;font-size:13px;max-width:320px;color:#fff;">${msg}</div>
            </div>
        </div>`;
    box.scrollTop = box.scrollHeight;
    input.value = '';
}
</script>

<?php require_once APP_PATH . '/layouts/footer.php'; ?>
