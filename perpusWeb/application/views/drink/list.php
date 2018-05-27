<font color="orange">
<?php echo $this->session->flashdata('hasil'); ?>
</font>
<table border="1">
    <tr><th>ID</th>
      <th>NAMA_MAKANAN</th>
      <th>TYPE</th>
      <th>JUMLAH</th>
      <th>HARGA</th>
      <th>AKSI</th></tr>
    <?php
    foreach ($datadrink as $drink){
        echo "<tr>
              <td>$drink->id</td>
              <td>$drink->nama_minuman</td>
              <td>$drink->tipe</td>
              <td>$drink->jumlah</td>
              <td>$drink->harga</td>
              <td>".anchor('drink/edit/'.$drink->id,'Edit')."
                  ".anchor('drink/delete/'.$drink->id,'Delete')."</td>
              </tr>";
    }
    ?>
</table>
<a href="http://localhost/footWeb/index.php/drink/create">+ Tambah data<a>