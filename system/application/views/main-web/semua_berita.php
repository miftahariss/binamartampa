<div id="content-tengah">
<div id="title-berita"></div>
<div class="tglcariberita">Cari Berita : 
<select name="tgl" class="dropdown">
<option selected="selected">- Tanggal -</option>
<?php
for($i=1;$i<=31;$i++)
{
echo '<option value="'.$i.'">'.$i.'</option>';
}
?>
</select> - 
<select name="bln" class="dropdown">
<option selected="selected">- Bulan -</option>
<?php
for($i=1;$i<=12;$i++)
{
echo '<option value="'.$i.'">'.$i.'</option>';
}
?>
</select> - 
<select name="thn" class="dropdown">
<option selected="selected">- Tahun -</option>
<?php
$tahun=date(Y);
$tahun_min=$tahun-5;
for($i=$tahun_min;$i<=$tahun;$i++)
{
echo '<option value="'.$i.'">'.$i.'</option>';
}
?>
</select>
<input type="submit" class="submitButton" value="Lihat Berita" />
</div>
<?php
foreach($berita->result_array() as $b)
{
$isi=substr($b['isi'],0,300);
echo'<div id="berita"><img src='.base_url().'system/application/views/main-web/berita/'.$b['gambar'].' width="70" class="image"><h1>'.$b['judul_berita'].'
<h2>Kategori <b>Berita</b> -'. $b['tanggal'].' -|- '.$b['waktu'].' WIB</h2>'.$isi.'.... <a href="'.base_url().'index.php/web/berita/'.$b["id_berita"].'">[Baca Selengkapnya]</a>
</div>';
}
?>
<?php
echo "<table align='center'><tr><td>".$paginator."</td></tr></table>";
?>
</div>

