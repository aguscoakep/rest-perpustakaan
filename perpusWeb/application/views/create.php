<?php echo form_open_multipart('foot/create');?>
<table>
    <tr><td>NAMA_MAKANAN</td><td><?php echo form_input('nama_makanan');?></td></tr>
    <tr><td>TYPE</td><td><?php echo form_input('tipe');?></td></tr>        
    <tr><td>TEMPAT</td><td><?php echo form_input('tempat');?></td></tr>        
    <tr><td>JUMLAH</td><td><?php echo form_input('jumlah');?></td></tr>        
    <tr><td>HARGA</td><td><?php echo form_input('harga');?></td></tr>        
    <tr><td colspan="2">
        <?php echo form_submit('submit','Simpan');?>
        <?php echo anchor('foot','Kembali');?></td></tr>
</table>
<?php
echo form_close();
?>