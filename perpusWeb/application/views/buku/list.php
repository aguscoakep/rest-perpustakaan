<?php $this->load->view('buku/Header')  ?>

<?php echo $this->session->flashdata('hasil'); ?>

<a href="http://localhost/perpusWeb/index.php/buku/create" class="btn btn-primary" >+ Tambah data<a><br><br>
<table class="table">
    <tr><th>ID</th>
      <th>JUDUL</th>
      <th>KATEGORI</th>
      <th>PENERBIT</th>
      <th>PENGARANG</th>
      <th>STATUS</th>
      <th>AKSI</th>
    </tr>
    <?php
    foreach ($databuku as $drink){
        echo "<tr>
              <td>$drink->id_buku</td>
              <td>$drink->judul</td>
              <td>$drink->id_kategori</td>
              <td>$drink->id_penerbit</td>
              <td>$drink->id_pengarang</td>
              <td>$drink->status</td>
              <td>".anchor('buku/edit/'.$drink->id_buku,'Edit')."
                  ".anchor('buku/delete/'.$drink->id_buku,'Delete')."</td>
              </tr>";
    }
    ?>
</table>


<?php $this->load->view('buku/footer')  ?>