<?php echo form_open_multipart('drink/create');?>
<table>
    <tr><td>NAMA_MINUMAN</td><td><?php echo form_input('nama_minuman');?></td></tr>
    <tr><td>TYPE</td><td><?php echo form_input('tipe');?></td></tr>                
    <tr><td>JUMLAH</td><td><?php echo form_input('jumlah');?></td></tr>        
    <tr><td>HARGA</td><td><?php echo form_input('harga');?></td></tr>        
    <tr><td colspan="2">
        <?php echo form_submit('submit','Simpan');?>
        <?php echo anchor('drink','Kembali');?></td></tr>
</table>
<?php
echo form_close();
?>