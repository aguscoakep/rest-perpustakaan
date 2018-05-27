<?php $this->load->view('user/Header')  ?>
<?php echo form_open('kategori/edit');?>
<?php echo form_hidden('id_kategori',$datakategori[0]->id_kategori);?>

<table class="table">
    <tr><td>ID</td>
    	<td><?php echo form_input('',$datakategori[0]->id_kategori,"disabled");?></td>
    </tr>
    <tr><td>NAMA</td>
    	<td><?php echo form_input('nama_kategori',$datakategori[0]->nama_kategori);?></td>
    </tr>
    <tr><td colspan="2">
        <?php echo form_submit('submit','Simpan');?>
        </td></tr>
</table>
<?php
echo form_close();
?>
<?php $this->load->view('user/footer')  ?>