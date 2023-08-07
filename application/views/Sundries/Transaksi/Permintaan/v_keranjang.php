<?php
// View
$no = 1;
foreach ($keranjang as $tempel) {
?>
    <tr>
        <td>
            <?php echo $no; ?>
        </td>
        <td>
            <?php echo $tempel->barang; ?>
        </td>
        <td>
            <?php echo $tempel->brand; ?>
        </td>
        <td>
            <?php echo $tempel->type; ?>
        </td>
        <td>
            <?php echo $tempel->ukuran; ?>
        </td>
        <td>
            <?php echo $tempel->satuan; ?>
        </td>
        <td>
            <?php echo $tempel->jumlah; ?>
        </td>
        <td>
            <?php echo $tempel->keterangan; ?>
        </td>
        <td>
            <a href="#" class="btn btn-sm btn-danger hapuskeranjang"
                data-idbarang="<?php echo $tempel->id_barang; ?>" data-iduser="<?php echo $tempel->id_user; ?>">Hapus</a>
        </td>
    </tr>
<?php
    $no++;
}
?>

<!-- Script -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    $(function () {
        // Fungsi untuk menampilkan konfirmasi dan menghapus data
        function deleteData(id_barang, id_user) {
            if (confirm('Apakah Anda yakin ingin menghapus item ini?')) {
                $.ajax({
                    type: 'POST',
                    url: "<?php echo site_url('deletekeranjangpermintaan')?>",
                    data: {
                        id_barang: id_barang,
                        id_user: id_user
                    },
                    cache: false,
                    success: function (response) {
                        // Tampilkan ulang data keranjang setelah berhasil dihapus
                        loaddatabarang();
                    }
                });
            }
        }

        // Event handler untuk menghapus item ketika tombol hapus diklik
        $(document).on('click', '.hapuskeranjang', function (e) {
            e.preventDefault();
            var id_barang = $(this).data('idbarang');
            var id_user = $(this).data('iduser');
            deleteData(id_barang, id_user);
        });

        function loaddatabarang() {
            var id_user = $('#id_user').val();
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('showkeranjangpermintaan')?>",
                data: {
                    id_user: id_user
                },
                cache: false,
                success: function (respond) {
                    $('#isikeranjang').html(respond);
                }
            });
        }
    });
</script>
