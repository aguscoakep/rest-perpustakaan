<?php $this->load->view('peminjaman/Header')  ?>
<?php echo $this->session->flashdata('hasil'); ?>

<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">+ Tambah</button></br></br> -->

<a href="http://localhost/perpusWeb/index.php/peminjaman/create" class="btn btn-primary">+ Tambah data<a><br><br> 

<table class="table">
    <tr><th>ID PEMINJAMAN</th>
      <th>TANGGAL PEMINJAMAN</th>
      <th>USER</th>
      <th>BUKU</th>
      <th>BATAS KEMBALI</th>
      <th>STATUS</th>
      <th>AKSI</th>
    </tr>
    <?php
    foreach ($datapeminjaman as $drink){
        echo "<tr>
              <td>$drink->id_peminjaman</td>
              <td>$drink->tanggal_peminjaman</td>
              <td>$drink->id_user</td>
              <td>$drink->id_buku</td>
              <td>$drink->batas_kembali</td>
              <td>$drink->status</td>
              <td>".anchor('peminjaman/edit/'.$drink->id_peminjaman,'Edit')."
                  ".anchor('peminjaman/delete/'.$drink->id_peminjaman,'Delete')."</td>
              </tr>";
    }
    ?>
</table>


<?php $this->load->view('peminjaman/footer')  ?>