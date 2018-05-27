<?php $this->load->view('user/Header')  ?>
<?php echo form_open('user/edit');?>
<?php echo form_hidden('id_user',$datauser[0]->id_user);?>

<table class="table">
    <tr><td>ID</td>
    	<td><?php echo form_input('',$datauser[0]->id_user,"disabled");?></td>
    </tr>
    <tr>
    	<td>JUDUL</td>
    	<td><?php echo form_input('nama',$datauser[0]->nama);?></td>
    </tr>
    <tr>
    	<td>KATEGORI</td><td><?php echo form_input('alamat',$datauser[0]->alamat);?></td>
    </tr>
    <tr>
    	<td>PENERBIT</td><td><?php echo form_input('no_telp',$datauser[0]->no_telp);?></td>
    </tr>
    <tr>
    	<td>PENGARANG</td>
    	<td><?php echo form_input('tanggal_lahir',$datauser[0]->tanggal_lahir);?></td>
    </tr>
    <tr>
        <td>STATUS</td>
        <td><?php echo form_input('status',$datauser[0]->status);?></td>
    </tr>
    <tr>
        <td>Username</td>
        <td><?php echo form_input('u_name',$datauser[0]->u_name);?></td>
    </tr>
    <tr>
        <td>Password</td>
        <td><?php echo form_input('u_paswd',$datauser[0]->u_paswd);?></td>
    </tr>
      <tr>
    	<td>Role</td>
    	<td><?php echo form_input('role',$datauser[0]->role);?></td>
    </tr>
    <tr><td colspan="2">
        <?php echo form_submit('submit','Simpan');?>
       </td></tr>
</table>
<?php
echo form_close();
?>
<?php $this->load->view('user/footer')  ?>