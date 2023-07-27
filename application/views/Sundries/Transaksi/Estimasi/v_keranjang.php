<?php $no = 1; foreach($keranjang as $tempel) { ?>
	<tr>
		<td><?php echo $no; ?></td>
		<td><?php echo $tempel->barang; ?></td>
		<td><?php echo $tempel->jumlah; ?></td>
		<td>
			<a href="#" class="btn btn-sm btn-danger hapuskeranjang" data-idbarang="<?php echo $tempel->id_barang; ?>" data-iduser="<?php echo $tempel->id_user; ?>">Hapus Dari Keranjang</a>
		</td>
	</tr>
<?php $no++; } ?>

<script type="text/javascript">
	$(function(){

		function loaddatabarang(){
                var id_user   = $('#id_user').val();
                $.ajax({
                    type:'POST',
                    url: "<?= site_url('estimasicontroller/showkeranjang')?>",
                    data:{id_user:id_user},
                    cache:false,
                    success:function(respond){
                        $('#isikeranjang').html(respond);
                    }
                });
            }


		$(".hapuskeranjang").click(function(){
			var idbarang = $(this).attr("data-idbarang");
			var iduser = $(this).attr("data-iduser");

			$.ajax({
				type:'POST',
				url:"<?= site_url('estimasicontroller/hapuskeranjang')?>",
				data:{
					idbarang:idbarang,
					iduser:iduser
				},
				cache:false,
				success:function(response){
					if (response = 1) {
						Swal.fire("Deleted","Berhasil Dihapus","success");
						loaddatabarang();
					}
				}
			});
		});
	});
</script>