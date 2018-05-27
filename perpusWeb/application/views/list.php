<font color="orange">
<?php echo $this->session->flashdata('hasil'); ?>
</font>
<table border="1">
    <tr><th>ID</th>
      <th>NAMA_MAKANAN</th>
      <th>TYPE</th>
      <th>TEMPAT</th>
      <th>JUMLAH</th>
      <th>HARGA</th>
      <th>AKSI</th></tr>
    <?php
    foreach ($datafoot as $foot){
        echo "<tr>
              <td>$foot->id</td>
              <td>$foot->nama_makanan</td>
              <td>$foot->tipe</td>
              <td>$foot->tempat</td>
              <td>$foot->jumlah</td>
              <td>$foot->harga</td>
              <td>".anchor('foot/edit/'.$foot->id,'Edit')."
                  ".anchor('foot/delete/'.$foot->id,'Delete')."</td>
              </tr>";
    }
    ?>
</table>
<a href="http://localhost/footWeb/index.php/foot/create">+ Tambah data<a>
<a href="http://localhost/footWeb/index.php/drink/index">   >>PESAN MINUMAN<<  <a>