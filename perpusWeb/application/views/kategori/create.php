<?php $this->load->view('temp/header_create')  ?>
<?php echo form_open_multipart('kategori/create');?>
<table class="table">
    <tr><td>Nama Kategori</td>
    	<td><?php echo form_input('nama_kategori');?></td>
    </tr>      
    <tr><td colspan="2">
        <?php echo form_submit('submit','Simpan');?>
        </td></tr>
</table>
<?php
echo form_close();
?>
<?php $this->load->view('temp/footer_create')  ?>