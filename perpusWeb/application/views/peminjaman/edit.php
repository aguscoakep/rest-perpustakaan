<?php $this->load->view('user/Header')  ?>
<?php echo form_open('peminjaman/edit');?>
<?php echo form_hidden('id_peminjaman',$datapeminjaman[0]->id_peminjaman);?>

<table class="table">
    <tr><td>ID</td>
    	<td>

          <input type="text" class="form-control" name="id_peminjaman" value="<?php echo $datapeminjaman[0]->id_peminjaman?>">
         
        </td>
    </tr>
    <tr>
    	<td>TANGGAL PEMINJAMAN</td>
    	<td>
        <input type="date" class="form-control" name="tanggal_peminjaman" value="<?php echo $datapeminjaman[0]->tanggal_peminjaman?>">   
        </td>
    </tr>
    <tr>
    	<td>USER</td>
        <td>
        <select class='form-control'  name="id_user">
            <option value=''><?php echo $datapeminjaman[0]->id_user?></option>
            <?php foreach ($dataUser as $metu) { ?>
              <option value="<?php echo $metu->id_user ?>" <?php if ( $metu->id_user == $datapeminjaman[0]->id_user){
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
            <option value=''><?php echo $datapeminjaman[0]->id_buku?></option>
            <?php foreach ($databuku as $metu) { ?>
              <option value="<?php echo $metu->id_buku ?>" <?php if ( $metu->id_buku == $datapeminjaman[0]->id_buku){
                echo "selected";
              } ?>>

              <?php echo $metu->id_buku ?><?php echo $metu->judul ?></option>;
            <?php } ?>
           </select> 
        </td>
    </tr>
    <tr>
        <td>BATAS KEMBALI</td>
        <td> <input type="date" class="form-control" name="batas_kembali" value="<?php echo $datapeminjaman[0]->batas_kembali?>"> 
        </td>
    </tr> 
    <tr>
    	<td>STATUS</td>
    	<td>
         <input type="text" class="form-control" name="status" value="<?php echo $datapeminjaman[0]->status?>">    
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