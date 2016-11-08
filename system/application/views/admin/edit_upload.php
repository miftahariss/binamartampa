<div id="isi">
<h1>Module Upload</h1><br />

<form method="post" action="<?php echo base_url(); ?>index.php/adminweb/updateupload" enctype="multipart/form-data">
<table width="100%" cellpadding="2" cellspacing="1" class="widget-small">
<?php
foreach($download->result_array() as $d)
{
$jdl = $d['judul_file'];
$nm = $d['nama_file'];
$id = $d['id_download'];
}
?>
<td width="150">Judul File</td><td width="10" align="center">:</td><td><input type="text" name="judul" size="60" class="input" value="<?php echo $jdl; ?>" /></td></tr>
<td width="150">Nama File</td><td width="10" align="center">:</td><td><?php echo $nm; ?></td></tr>
<td width="150">Tipe File</td><td width="10" align="center">:</td><td><select class="input"><option>Berkas</option></select></td></tr>
<td width="150">Cari File</td><td width="10" align="center">:</td><td><input type="file" class="input" name="userfile" size="50" /> *Kosongkan saja jika tidak dirubah</td></tr>
<td width="150"></td><td width="10" align="center"></td><td><input type="submit" value="Upload Foto" class="input" /> <input type="reset" value="Ulang Pengisian" class="input" /><input type="hidden" name="id_download" value="<?php echo $id; ?>" /></td></tr>
</table>
</form> 
<br />
<!-- Batas content bawah -->
</div>