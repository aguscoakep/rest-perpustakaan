<?php $this->load->view('user/Header')  ?>
<?php echo form_open('penerbit/edit');?>
<?php echo form_hidden('id_penerbit',$datapenerbit[0]->id_penerbit);?>

<table class="table">
    <tr><td>ID</td>
    	<td><?php echo form_input('',$datapenerbit[0]->id_penerbit,"disabled");?></td>
    </tr>
    <tr><td>NAMA</td>
    	<td><?php echo form_input('nama_penerbit',$datapenerbit[0]->nama_penerbit);?></td>
    </tr>
    <tr><td colspan="2">
        <?php echo form_submit('submit','Simpan');?>
        </td></tr>
</table>
<?php
echo form_close();
?>
<?php $this->load->view('user/footer')  ?>