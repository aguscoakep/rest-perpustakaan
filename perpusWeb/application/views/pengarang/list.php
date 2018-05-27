<?php $this->load->view('pengarang/Header')  ?>
<?php echo $this->session->flashdata('hasil'); ?>
<?php $this->load->view('pengarang/create')  ?>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">+ Tambah</button></br></br>
<!-- <a href="http://localhost/perpusWeb/index.php/pengarang/create" class="btn btn-Primary">+ Tambah data<a><br><br> -->
<table class="table">
    <tr><th>Id pengarang</th>
      <th>Nama pengarang</th>
      <th>aksi</th></tr>
    <?php
    foreach ($datapengarang as $drink){
        echo "<tr>
              <td>$drink->id_pengarang</td>
              <td>$drink->nama_pengarang</td>
              <td>".anchor('pengarang/edit/'.$drink->id_pengarang,'Edit')."
                  ".anchor('pengarang/delete/'.$drink->id_pengarang,'Delete')."</td>
              </tr>";
    }
    ?>
</table>
<?php $this->load->view('pengarang/footer')  ?>