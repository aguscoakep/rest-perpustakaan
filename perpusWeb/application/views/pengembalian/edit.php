<?php $this->load->view('user/Header')  ?>
<?php echo form_open('pengembalian/edit');?>
<?php echo form_hidden('id_pengembalian',$datapengembalian[0]->id_pengembalian);?>

<table class="table">
    <tr><td>ID</td>
    	<td>
         <input type="text" class="form-control" name="id_pengembalian" value="<?php echo $datapengembalian[0]->id_pengembalian?>">   
        </td>
    </tr>
    <tr>
    	<td>PEMINJAMAN</td>
    	<td>
            <select class='form-control'  name="id_peminjaman">
            <option value=''><?php echo $datapengembalian[0]->id_peminjaman?></option>
            <?php foreach ($datapeminjaman as $metu) { ?>
              <option value="<?php echo $metu->id_peminjaman ?>" <?php if ( $metu->id_peminjaman == $datapengembalian[0]->id_peminjaman){
                echo "selected";
              } ?>>

              <?php echo $metu->id_peminjaman ?></option>;
            <?php } ?>
           </select> 
        </td>
    </tr>
    <tr>
    	<td>USER</td>
        <td>
        
        <select class='form-control'  name="id_user">
            <option value=''><?php echo $datapengembalian[0]->id_user?></option>
            <?php foreach ($dataUser as $metu) { ?>
              <option value="<?php echo $metu->id_user ?>" <?php if ( $metu->id_user == $datapengembalian[0]->id_user){
                echo "selected";
              } ?>>

              <?php echo $metu->id_user ?><?php echo $metu->nama ?></option>;
            <?php } ?>
           </select> 
        </td>
    </tr>
    <tr>
    	<td>BUKU</td>
        <td>
            
            <select class='form-control'  name="id_buku">
            <option value=''><?php echo $datapengembalian[0]->id_buku?></option>
            <?php foreach ($databuku as $metu) { ?>
              <option value="<?php echo $metu->id_buku ?>" <?php if ( $metu->id_buku == $datapengembalian[0]->id_buku){
                echo "selected";
              } ?>>

              <?php echo $metu->id_buku ?> <?php echo $metu->judul ?></option>;
             
            <?php } ?>
           </select> 
         

        </td>
    </tr>
    <tr>
        <td>JATUH TEMPO</td>
        <td> <input type="text" class="form-control" name="jatuhtempo" value="<?php echo $datapengembalian[0]->jatuhtempo?>">  </td>
    </tr> 
     <tr>
        <td>DENDA</td>
        <td>
             <input type="text" class="form-control" name="denda" value="<?php echo $datapengembalian[0]->denda?>">  
        </td>
    </tr> 
    <tr>
        <td>TANGGAL DIKEMBALIKAN</td>
        <td>
             <input type="date" class="form-control" name="tanggal_dikembalikan" value="<?php echo $datapengembalian[0]->tanggal_dikembalikan?>">  
        </td>
    </tr> 
    <tr>
    	<td>STATUS</td>
    	<td>
          <input type="text" class="form-control" name="status" value="<?php echo $datapengembalian[0]->status?>">     
        </td>
    </tr>
    <tr><td colspan="2">
        <?php echo form_submit('submit','Simpan');?>
       </td></tr>
</table>
<?php
echo form_close();
?>
<?php $this->load->view('user/footer')  ?>