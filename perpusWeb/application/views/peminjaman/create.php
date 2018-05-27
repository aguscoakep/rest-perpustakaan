<?php $this->load->view('user/header')  ?>
<?php echo form_open_multipart('peminjaman/create');?>
<table class="table">
    <tr><td>Tanggal pinjaman</td>
    	<td>
         <input class='form-control' type="date" name="tanggal_peminjaman">   
        </td>
    </tr>
    <tr>
    	<td>User</td>
    	<td>
          <select class='form-control'  name="id_user">
            <option value=''>--pilih--</option>
            <?php foreach ($dataUser as $metu) { ?>
              <option value="<?php echo $metu->id_user ?>"><?php echo $metu->id_user ?>_<?php echo $metu->nama ?></option>;
            <?php } ?>
           </select>   
        </td>
    </tr>                
    <tr>
    	<td>Buku</td>
    	<td>
          <select class='form-control'  name="id_buku">
            <option value=''>--pilih--</option>
            <?php foreach ($databuku as $metu) { ?>
              <option value="<?php echo $metu->id_buku ?>"><?php echo $metu->id_buku ?></option>;
            <?php } ?>
           </select>  
        </td>
    </tr>        
    <tr>
    	<td>Batas Kembali</td>
    	<td>
         <input type="text" name="batas_kembali" class='form-control'>   
        </td>
    </tr>        
    <tr>
    	<td>status</td>
        <td>
            <input type="text" name="status" class='form-control'>
        </td>
    </tr>        
    <tr><td colspan="2">
        <?php echo form_submit('submit','Simpan');?>
       </td>
   </tr>
</table>
<?php
echo form_close();
?>
<?php $this->load->view('user/footer')  ?>