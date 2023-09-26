<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Ganti Password</div>
                <div class="card-body">
                    <form method="post" action="<?= site_url('update-password') ?>">
                        <div class="form-group">
                            <label for="current_password">Password Saat Ini</label>
                            <input type="password" name="current_password" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="new_password">Password Baru</label>
                            <input type="password" name="new_password" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="confirm_password">Konfirmasi Password Baru</label>
                            <input type="password" name="confirm_password" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Ganti Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Tampilkan pesan flash (jika ada)
        const successMessage = "<?php echo $this->session->flashdata('success'); ?>";
        const errorMessage = "<?php echo $this->session->flashdata('error'); ?>";

        if (successMessage) {
            Swal.fire({
                title: "Sukses!",
                text: successMessage,
                icon: "success",
                timer: 2000, // Pop-up akan hilang setelah 2 detik
                showConfirmButton: false
            });
        }

        if (errorMessage) {
            Swal.fire({
                title: "Gagal!",
                text: errorMessage,
                icon: "error",
                timer: 2000, // Pop-up akan hilang setelah 2 detik
                showConfirmButton: false
            });
        }

        // Hapus pesan flash setelah beberapa detik (misalnya 5 detik)
        setTimeout(function() {
            $('.alert').fadeOut('slow', function() {
                $(this).remove();
            });
        }, 5000); // Menghilangkan pesan flash setelah 5 detik
    });
</script>