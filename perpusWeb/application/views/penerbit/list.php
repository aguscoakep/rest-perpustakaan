<?php $this->load->view('penerbit/Header')  ?>
<?php $this->load->view('penerbit/create')  ?>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">+ Tambah</button></br></br>
<?php echo $this->session->flashdata('hasil'); ?>

<!-- <a href="http://localhost/perpusWeb/index.php/penerbit/create" class="btn btn-Primary">+ Tambah data<a> -->
<table class="table">
    <tr><th>Id penerbit</th>
      <th>Nama penerbit</th>
      <th>aksi</th></tr>
    <?php
    foreach ($datapenerbit as $drink){
        echo "<tr>
              <td>$drink->id_penerbit</td>
              <td>$drink->nama_penerbit</td>
              <td>".anchor('penerbit/edit/'.$drink->id_penerbit,'Edit')."
                  ".anchor('penerbit/delete/'.$drink->id_penerbit,'Delete')."</td>
              </tr>";
    }
    ?>
</table>

<?php $this->load->view('penerbit/footer')  ?>