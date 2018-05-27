<?php $this->load->view('pengembalian/Header')  ?>

<?php echo $this->session->flashdata('hasil'); ?>

<a href="http://localhost/perpusWeb/index.php/pengembalian/create" class="btn btn-primary">+ Tambah data<a> <br/><br/>

<table class="table">
    <tr><th>ID PENGEAMBALIAN</th>
      <th>PEMINJAMAN</th>
      <th>USER</th>
      <th>BUKU</th>
      <th>JATUH TEMPO</th>
      <th>DENDA</th>
      <th>TANGGAL KEMBALI</th>
      <th>STATUS</th>
      <th>AKSI</th>
    </tr>
    <?php
    foreach ($datapengembalian as $drink){
        echo "<tr>
              <td>$drink->id_pengembalian</td>
              <td>$drink->id_peminjaman</td>
              <td>$drink->id_user</td>
              <td>$drink->id_buku</td>
              <td>$drink->jatuhtempo</td>
              <td>$drink->denda</td>
              <td>$drink->tanggal_dikembalikan</td>
              <td>$drink->status</td>
              <td>".anchor('pengembalian/edit/'.$drink->id_pengembalian,'Edit')."
                  ".anchor('pengembalian/delete/'.$drink->id_pengembalian,'Delete')."</td>
              </tr>";
    }
    ?>
</table>
  <?php $this->load->view('pengembalian/footer')  ?>