<?php $this->load->view('temp/header_create')  ?>
<?php echo form_open_multipart('user/create');?>

<table>
    <tr><td>Nama</td>
    	<td>
            <input type="text" name="nama" class='form-control' >
        </td>
    </tr>
    <tr>
    	<td>Alamat</td>
    	<td>
             <input type="text" name="alamat" class='form-control' >
        </td>
    </tr>                
    <tr>
    	<td>Telepon</td>
    	<td>
             <input type="text" name="no_telp" class='form-control' >
        </td>
    </tr>        
    <tr>
    	<td>Tanggal Lahir</td>
    	<td>
         <input type="date" name="tanggal_lahir" class='form-control' >
        </td>
    </tr>        
    <tr>
        <td>status</td>
        <td>
         <input type="text" name="status" class='form-control' >
        </td>
    </tr> 
    <tr>
        <td>Username</td>
        <td>
             <input type="text" name="u_name" class='form-control' >
        </td>
    </tr>  
     <tr>
        <td>Password</td>
        <td>
            <input type="text" name="u_paswd" class='form-control' >
        </td>
    </tr>
    <tr>
    	<td>Role</td>
        <td>
            <select class="form-control"  name="role">
                <option name=role value="User">User</option>
                <option name=role value="Administrator">Administrator</option>
             </select>
        </td>
    </tr>        
    <tr><td colspan="2">
        <?php echo form_submit('submit','Simpan');?>
        </td></tr>
</table>
 <?php echo form_close(); ?>

<?php $this->load->view('temp/footer_create')  ?>