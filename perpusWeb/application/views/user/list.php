<?php $this->load->view('user/Header')  ?>
<?php $this->load->view('user/create')  ?>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">+ Tambah</button></br></br>
<?php echo $this->session->flashdata('hasil'); ?>
<!-- <a href="http://localhost/perpusWeb/index.php/user/create" class="btn btn-Primary">+ Tambah data<a> -->
<table class="table">
    <tr><th>ID</th>
      <th>NAMA</th>
      <th>ALAMAT</th>
      <th>NO TELP</th>
      <th>TANGGAL LAHIR</th>
      <th>STATUS</th>
      <th>USERNAME</th>
      <th>ROLE</th>
      <th>AKSI</th>
    </tr>
    <?php
    foreach ($datauser as $drink){
        echo "<tr>
              <td>$drink->id_user</td>
              <td>$drink->nama</td>
              <td>$drink->alamat</td>
              <td>$drink->no_telp</td>
              <td>$drink->tanggal_lahir</td>
              <td>$drink->status</td>
              <td>$drink->u_name</td>
              <td>$drink->role</td>
              <td>".anchor('user/edit/'.$drink->id_user,'Edit')."
                  ".anchor('user/delete/'.$drink->id_user,'Delete')."</td>
              </tr>";
    }
    ?>
</table>

  <?php $this->load->view('user/footer')  ?>