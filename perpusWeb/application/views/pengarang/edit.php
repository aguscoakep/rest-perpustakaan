<?php $this->load->view('user/Header')  ?>
<?php echo form_open('pengarang/edit');?>
<?php echo form_hidden('id_pengarang',$datapengarang[0]->id_pengarang);?>

<table class="table">
    <tr><td>ID</td>
    	<td><?php echo form_input('',$datapengarang[0]->id_pengarang,"disabled");?></td>
    </tr>
    <tr><td>NAMA</td>
    	<td><?php echo form_input('nama_pengarang',$datapengarang[0]->nama_pengarang);?></td>
    </tr>
    <tr><td colspan="2">
        <?php echo form_submit('submit','Simpan');?>
        </td></tr>
</table>
<?php
echo form_close();
?>
<?php $this->load->view('user/footer')  ?>