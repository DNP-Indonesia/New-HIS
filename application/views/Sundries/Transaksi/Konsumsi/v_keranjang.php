<?php $no = 1;
foreach ($keranjang as $tempel) { ?>
<tr>
    <td class="text-center">
        <?php echo $no; ?>
    </td>
    <td class="text-center">
        <?php echo $tempel->faris; ?>
    </td>
    <td class="text-center">
        <?php echo $tempel->barang; ?>
    </td>
    <td class="text-center">
        <?php echo $tempel->jumlah; ?>
    </td>
    <td class="text-center">
    <a href="#" class="btn btn-sm btn-danger hapuskeranjang" data-idkeranjang="<?php echo $tempel->id_keranjang_consumption; ?>"
            data-iduser="<?php echo $tempel->id_user; ?>">Hapus</a>
    </td>
</tr>
<?php $no++;
} ?>

<script type="text/javascript">
    $(function() {

        function loaddatabarang() {
            var id_user = $('#id_user').val();
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('showkeranjangkonsumsi'); ?>",
                data: {
                    id_user: id_user
                },
                cache: false,
                success: function(respond) {
                    $('#isikeranjang').html(respond);
                }
            });
        }

        $(".hapuskeranjang").click(function() {
            var idkeranjang = $(this).attr("data-idkeranjang");
            var iduser = $(this).attr("data-iduser");

            $.ajax({
                type: 'GET',
                url: "<?php echo site_url('deletekeranjangkonsumsi/' . $tempel->id_keranjang_consumption); ?>",
                data: {
                    idkeranjang: idkeranjang,
                    iduser: iduser
                },
                cache: false,
                success: function(response) {
                    if (response = 1) {
                        Swal.fire("Terhapus", "Berhasil Dihapus", "success");
                        loaddatabarang();
                    }
                }
            });
        });
    });
</script>
