<div id="kiri"><h2>Module Editor Berkas / File</h2>
<div id="isi">
<br>
<table width="760" style="border: 1pt ridge #cccccc;" cellpadding="2" cellspacing="1" class="widget-small">
<?php echo form_open_multipart('guru/updateupload');?>
<?php
foreach($kategori->result_array() as $k)
{
$judul=$k["judul_file"];
$nama_file=$k["nama_file"];
$id=$k["id_download"];
}
?>
<tr><td width="150">Judul File</td><td width="10">:</td><td><input type="text" name="judul" class="textfield" size="50" value="<?php echo $judul; ?>"></td></tr>
<tr><td width="150">Kategori File / Download</td><td width="10">:</td><td>
<?php
foreach($kategori->result_array() as $k)
{
$judul=$k["judul_file"];
}
?>
<select name="kategori" class="textfield-option">
<option>Berkas</option>
</select>
</td></tr>
<tr><td width="150">Nama File</td><td width="10">:</td><td><?php echo $nama_file; ?></td></tr>
<tr><td width="150" valign="top">Upload File</td><td width="10" valign="top">:</td><td><input type="file" name="userfile" class="textfield"> <h3>* Bila file tidak diganti, silahkan dikosongkan saja.</h3></td></tr>
<tr><td width="150" valign="top"></td><td width="10" valign="top"></td><td><input type="submit" value="Upload Berkas" class="tombol"<input type="hidden" name="id_download" value="<?php echo $id; ?>" /></td></tr>
</form>
</table>
<ul>
<li class="li-class">Nama file yang akan di-upload harap tidak mengandung karakter seperti ."`~* dan sebagainya.</li>
</ul>
<br /><br /><br /><br />
</div>
</div>
