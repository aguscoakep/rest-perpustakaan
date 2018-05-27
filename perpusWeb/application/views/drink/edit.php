<?php echo form_open('drink/edit');?>
<?php echo form_hidden('id',$datadrink[0]->id);?>

<table>
    <tr><td>ID</td><td><?php echo form_input('',$datadrink[0]->id,"disabled");?></td></tr>
    <tr><td>NAMA</td><td><?php echo form_input('nama_minuman',$datadrink[0]->nama_minuman);?></td></tr>
    <tr><td>NOMOR</td><td><?php echo form_input('tipe',$datadrink[0]->tipe);?></td></tr>
    <tr><td>JUMLAH</td><td><?php echo form_input('jumlah',$datadrink[0]->jumlah);?></td></tr>
    <tr><td>HARGA</td><td><?php echo form_input('harga',$datadrink[0]->harga);?></td></tr>
    <tr><td colspan="2">
        <?php echo form_submit('submit','Simpan');?>
        <?php echo anchor('drink','Kembali');?></td></tr>
</table>
<?php
echo form_close();
?>