<?php $this->load->view('user/header')  ?>
<?php echo form_open_multipart('pengembalian/create');?>
<table >
    <tr><td>peminjaman</td>
    	<td>
         <select class='form-control'  name="id_peminjaman">
            <option value=''>--pilih--</option>
            <?php foreach ($datapeminjaman as $metu) { ?>
              <option value="<?php echo $metu->id_peminjaman ?>"><?php echo $metu->id_peminjaman ?></option>;
            <?php } ?>
           </select> 
        </td>
    </tr>
    <tr>
    	<td>User</td>
    	<td>
          <select class='form-control'  name="id_user">
            <option value=''>--pilih--</option>
            <?php foreach ($dataUser as $metu) { ?>
              <option value="<?php echo $metu->id_user ?>"><?php echo $metu->id_user ?><?php echo $metu->nama ?></option>;
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
              <option value="<?php echo $metu->id_buku ?>"><?php echo $metu->id_buku ?><?php echo $metu->judul ?></option>;
            <?php } ?>
           </select>   
        </td>
    </tr>        
    <tr>
    	<td>Jatuh Tempo</td>
    	<td>
          <input class='form-control' type="text" name="jatuhtempo">   
        </td>
    </tr>        
    <tr>
        <td>Denda</td>
        <td>
             <input class='form-control' type="text" name="denda">
        </td>
    </tr> 
    <tr>
        <td>tanggal_kembali</td>
        <td>
             <input class='form-control' type="date" name="tanggal_dikembalikan">
        </td>
    </tr>
    <tr>
    	<td>status</td>
        <td>
             <input class='form-control' type="text" name="status">
        </td>
    </tr>        
    <tr><td colspan="2">
        <?php echo form_submit('submit','Simpan');?>
        </td></tr>
</table>
 <?php echo form_close(); ?>
<?php $this->load->view('user/footer')  ?>