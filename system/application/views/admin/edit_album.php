<div id="isi">
<h1>Module Galeri</h1><br />
<!-- Batas Content -->
<a href="<?php echo base_url().'index.php/adminweb/tambahfoto';?>"><div class="submitButton"><b> + Tambah Foto Kegiatan</b></div></a> 
<br /><br /><br />
<?php
foreach($detail->result_array() as $a)
{
$id=$a['id_album'];
$nama=$a['nama_album'];
}
?>
<form method="post" action="<?php echo base_url(); ?>index.php/adminweb/updatealbum">
<table width="100%" cellpadding="2" cellspacing="1" class="widget-small">
<tr bgcolor="#FFF" ><td width="150">Nama Album</td><td width="10" align="center">:</td><td><input type="text" name="nama" class="input" size="60" value="<?php echo $nama; ?>" /></td><td><input type="submit" value="Simpan Album" class="input" /> <input type="reset" value="Ulang Pengisian" class="input" /><input type="hidden" name="id" value="<?php echo $id ?>" /></td></tr>
</table>
</form> 
<br />

</div>