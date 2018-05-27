<?php $this->load->view('kategori/Header')  ?>
<?php $this->load->view('kategori/create')  ?>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">+ Tambah</button></br></br>
  
                <?php echo $this->session->flashdata('hasil'); ?>
                <table class="table">
                    <tr><th>ID KATEGORI</th>
                      <th>NAMA KATEGORI</th>
                      <th>AKSI</th></tr>
                    <?php
                    foreach ($datakategori as $drink){
                        echo "<tr>
                              <td>$drink->id_kategori</td>
                              <td>$drink->nama_kategori</td>
                              <td>".anchor ('kategori/edit/'.$drink->id_kategori,'Edit')."
                                  ".anchor('kategori/delete/'.$drink->id_kategori,'Delete')."</td>
                              </tr>";
                    }
                    ?>
                </table>
              

<?php $this->load->view('kategori/footer')  ?>