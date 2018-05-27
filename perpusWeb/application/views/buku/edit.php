<?php $this->load->view('user/Header')  ?>
<?php echo form_open('buku/edit');?>
<?php echo form_hidden('id_buku',$databuku[0]->id_buku);?>

<table class="table">
    <tr><td>ID</td>
    	<td>
            <input type="text" class="form-control" name="id_buku" value="<?php echo $databuku[0]->id_buku?>">      
        </td>
    </tr>
    <tr>
    	<td>JUDUL</td>
    	<td>
        <input type="text" class="form-control" name="judul" value="<?php echo $databuku[0]->judul?>">  </td>
    </tr>
    <tr>
    	<td>KATEGORI</td>
        <td>
        <select class='form-control'  name="id_kategori">
            <option value=''><?php echo $databuku[0]->id_kategori?></option>
            <?php foreach ($datakategori as $metu) { ?>
              <option value="<?php echo $metu->id_kategori ?>" <?php if ( $metu->id_kategori == $databuku[0]->id_kategori){
                echo "selected";
              } ?>>
              <?php echo $metu->id_kategori ?><?php echo $metu->nama_kategori ?></option>;
            <?php } ?>
            
           </select> 
        </td>
    </tr>
    <tr>
    	<td>PENERBIT</td>
        <td>

        <select class='form-control'  name="id_penerbit">
            <option value=''><?php echo $databuku[0]->id_penerbit?></option>
            <?php foreach ($datapenerbit as $metu) { ?>
              <option value="<?php echo $metu->id_penerbit ?>" <?php if ( $metu->id_penerbit == $databuku[0]->id_penerbit){
                echo "selected";
              } ?>><?php echo $metu->id_penerbit ?><?php echo $metu->nama_penerbit ?></option>;
            <?php } ?>
           </select> 
            
        </td>
    </tr>
    <tr>
    	<td>PENGARANG</td>
    	<td>
          
        <select class='form-control'  name="id_pengarang">
            <option value=''><?php echo $databuku[0]->id_pengarang?></option>
            <?php foreach ($datapengarang as $metu) { ?>
              <option value="<?php echo $metu->id_pengarang ?>" <?php if ( $metu->id_pengarang== $databuku[0]->id_penerbit){
                echo "selected";
              } ?>><?php echo $metu->id_pengarang ?><?php echo $metu->nama_pengarang ?></option>;
            <?php } ?>
           </select>         
        </td>
    </tr>
    <tr>
    	<td>STATUS</td>
    	<td>
        <input type="text" class="form-control" name="status" value="<?php echo $databuku[0]->status?>">    
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