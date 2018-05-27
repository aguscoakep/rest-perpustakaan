<?php echo form_open('foot/edit');?>
<?php echo form_hidden('id',$datafoot[0]->id);?>

<table>
    <tr><td>ID</td><td><?php echo form_input('',$datafoot[0]->id,"disabled");?></td></tr>
    <tr><td>NAMA</td><td><?php echo form_input('nama_makanan',$datafoot[0]->nama_makanan);?></td></tr>
    <tr><td>NOMOR</td><td><?php echo form_input('tipe',$datafoot[0]->tipe);?></td></tr>
    <tr><td>TEMPAT</td><td><?php echo form_input('tempat',$datafoot[0]->tempat);?></td></tr>
    <tr><td>JUMLAH</td><td><?php echo form_input('jumlah',$datafoot[0]->jumlah);?></td></tr>
    <tr><td>HARGA</td><td><?php echo form_input('harga',$datafoot[0]->harga);?></td></tr>
    <tr><td colspan="2">
        <?php echo form_submit('submit','Simpan');?>
        <?php echo anchor('foot','Kembali');?></td></tr>
</table>
<?php
echo form_close();
?>