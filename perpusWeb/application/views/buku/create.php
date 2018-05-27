<?php $this->load->view('buku/Header')  ?>

          <?php echo form_open_multipart('buku/create');?>

        <table class="table">
        <tr>
        <td>Judul</td>
        <td>
          <input class='form-control' type="text" name="judul">  
        </td>
        </tr>
        <tr>
        <td>Kategori</td>
        <td>
           <select class='form-control'  name="id_kategori">
            <option value=''>--pilih--</option>
            <?php foreach ($datakategori as $metu) { ?>
              <option value="<?php echo $metu->id_kategori ?>"><?php echo $metu->id_kategori ?><?php echo $metu->nama_kategori ?></option>;
            <?php } ?>
           </select>   
        </td>
        </tr>                
        <tr>
        <td>Penerbit</td>
        <td>
            <select class='form-control'  name="id_penerbit">
            <option value=''>--pilih--</option>
            <?php foreach ($datapenerbit as $metu) { ?>
              <option value="<?php echo $metu->id_penerbit ?>"><?php echo $metu->id_penerbit ?><?php echo $metu->nama_penerbit ?></option>;
            <?php } ?>
           </select> 
        </td>
        </tr>        
        <tr>
        <td>Pengarang</td>
        <td>
          <select class='form-control'  name="id_pengarang">
            <option value=''>--pilih--</option>
            <?php foreach ($datapengarang as $metu) { ?>
              <option value="<?php echo $metu->id_pengarang ?>"><?php echo $metu->id_pengarang ?><?php echo $metu->nama_pengarang ?></option>;
            <?php } ?>
           </select> 
        </td>
        </tr>        
        <tr>
        <td>status</td>
        <td>
           <input class='form-control' type="text" name="status"> 
        </td>
        </tr>        
         <tr>
        <td colspan="2">

        <?php echo form_submit('submit','Simpan');?></tr>
        </table>
        <?php
        echo form_close();
        ?>
<?php $this->load->view('buku/footer')  ?>
