<div id="content-tengah">
<div id="title-isi">Data Siswa-Siswi SMAN 1 Wongsorejo</div>
<div>
<form method="post" action="<?php echo base_url(); ?>index.php/web/rekapsiswa">
<h5>Pilih Nama Kelas</h5><br />Pilih Kelas : <select name="kls" class="dropdown">
<?php
foreach($kls->result_array() as $k)
{
echo "<option value='".$k['id_kelas']."'>Kelas ".$k['nama_kelas']."</option>";
}
?>
</select>
<input type="submit" value="Lihat Data Siswa" class="submitButton" />
</form>
</div>
<div>
</div>
</div>
