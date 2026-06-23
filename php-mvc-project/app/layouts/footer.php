        </div><!-- End #content -->

        <!-- Footer -->
        <footer class="sticky-footer">
            <span>Copyright &copy; AkuAtmin <?= date('Y') ?></span>
        </footer>

    </div><!-- End #content-wrapper -->
</div><!-- End #wrapper -->

<!-- Scroll to Top -->
<a class="scroll-to-top" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal -->
<div class="modal-overlay" id="logoutModal">
    <div class="modal-box">
        <div class="modal-header">
            <h5>Siap untuk Keluar?</h5>
            <button class="modal-close" onclick="App.hideModal('logoutModal')">&times;</button>
        </div>
        <div class="modal-body">
            Pilih "Logout" jika Anda ingin mengakhiri sesi saat ini.
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" onclick="App.hideModal('logoutModal')">Batal</button>
            <a class="btn btn-primary" href="<?= BASE_URL ?>users/logout">Logout</a>
        </div>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
<!-- App JS -->
<script src="<?= BASE_URL ?>assets/js/script.js"></script>

<?php if (isset($scripts)) echo $scripts; ?>

</body>
</html>
