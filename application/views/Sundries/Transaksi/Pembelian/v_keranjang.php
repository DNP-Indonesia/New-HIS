<?php $no = 1; foreach($keranjang as $tempel) { ?>
	<tr>
		<td><?php echo $no; ?></td>
		<td><?php echo $tempel->barang; ?></td>
		<td><?php echo $tempel->brand; ?></td>
		<td><?php echo $tempel->type; ?></td>
		<td><?php echo $tempel->ukuran; ?></td>
		<td><?php echo $tempel->satuan; ?></td>
		<td><?php echo $tempel->jumlah; ?></td>
		<td><?php echo $tempel->keterangan; ?></td>
		<td>
			<a href="#" class="btn btn-sm btn-danger hapuskeranjang" data-idbarang="<?php echo $tempel->id_barang; ?>">Hapus Dari Keranjang</a>
		</td>
	</tr>
<?php $no++; } ?>
<script type="text/javascript">
	$(function(){

		function loaddatabarang(){
                var id_user   = $('#id_user').val();
                $.ajax({
                    type:'POST',
                    url: "<?= site_url('Sundries/purchasecontroller/showkeranjang')?>",
                    data:{id_user:id_user},
                    cache:false,
                    success:function(respond){
                        $('#isikeranjang').html(respond);
                    }
                });
            }


		$(".hapuskeranjang").click(function(){
			var idbarang = $(this).attr("data-idbarang");

			$.ajax({
				type:'POST',
				url:"<?= site_url('Sundries/purchasecontroller/hapuskeranjang')?>",
				data:{
					idbarang:idbarang
				},
				cache:false,
				success:function(response){
					if (response = 1) {
						Swal.fire("Terhapus","Berhasil Dihapus","success");
						loaddatabarang();
					}
				}
			});
		});
	});
</script>