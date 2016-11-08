
<div id="isi">
<div>

<form method="post" action="<?php echo base_url(); ?>index.php/adminweb/inputabsensi">
<h4>Masukkan Inputan Absensi</h4>
Tanggal : <select name="tgl" class="input">
<?php
$tgl=date('d');
for($i=1;$i<=31;$i++)
{
if($tgl==$i)
{
echo "<option value='".$i."' selected>".$i."</option>";
}
else
{
echo "<option value='".$i."'>".$i."</option>";
}
}
?>
</select>
 - Bulan : <select name="bln" class="input">
<?php
function getBulan($bln){
				switch ($bln){
					case 1: 
						return "Januari";
						break;
					case 2:
						return "Februari";
						break;
					case 3:
						return "Maret";
						break;
					case 4:
						return "April";
						break;
					case 5:
						return "Mei";
						break;
					case 6:
						return "Juni";
						break;
					case 7:
						return "Juli";
						break;
					case 8:
						return "Agustus";
						break;
					case 9:
						return "September";
						break;
					case 10:
						return "Oktober";
						break;
					case 11:
						return "November";
						break;
					case 12:
						return "Desember";
						break;
				}
			} 
$tgl=date('m');
for($i=1;$i<=12;$i++)
{
if($tgl==$i)
{
echo "<option value='".$i."' selected>".getBulan($i)."</option>";
}
else
{
echo "<option value='".$i."'>".getBulan($i)."</option>";
}
}
?>
</select>
 - Tahun : <select name="thn" class="input">
<?php
$tgl=date('Y');
for($i=2009;$i<=$tgl;$i++)
{
if($tgl==$i)
{
echo "<option value='".$i."' selected>".$i."</option>";
}
else
{
echo "<option value='".$i."'>".$i."</option>";
}
}
?>
</select>

Kelas : <select name="kls" class="input">
<?php
foreach($kls->result_array() as $k)
{
echo "<option value='".$k['id_kelas']."'>".$k['nama_kelas']."</option>";
}
?>
</select>
<input type="submit" value="Input Absensi" class="input" />
</form>
<br />
<form method="post" action="<?php echo base_url(); ?>index.php/adminweb/cekabsen">
<h4>Cek Absensi Harian</h4>Tanggal : <select name="tgl" class="input">
<?php
$tgl=date('d');
for($i=1;$i<=31;$i++)
{
if($tgl==$i)
{
echo "<option value='".$i."' selected>".$i."</option>";
}
else
{
echo "<option value='".$i."'>".$i."</option>";
}
}
?>
</select>
 - Bulan : <select name="bln" class="input">
<?php
$tgl=date('m');
for($i=1;$i<=12;$i++)
{
if($tgl==$i)
{
echo "<option value='".$i."' selected>".getBulan($i)."</option>";
}
else
{
echo "<option value='".$i."'>".getBulan($i)."</option>";
}
}
?>
</select>
 - Tahun : <select name="thn" class="input">
<?php
$tgl=date('Y');
for($i=2009;$i<=$tgl;$i++)
{
if($tgl==$i)
{
echo "<option value='".$i."' selected>".$i."</option>";
}
else
{
echo "<option value='".$i."'>".$i."</option>";
}
}
?>
</select>

Kelas : <select name="kls" class="input">
<?php
foreach($kls->result_array() as $k)
{
echo "<option value='".$k['id_kelas']."'>".$k['nama_kelas']."</option>";
}
?>
</select>

<input type="submit" value="Lihat Absensi" class="input" />
</form>
<br /><br />
<table width="100%">
<?php
$no=1;
foreach($absen->result_array() as $a)
{
echo "<tr><td>".$no."</td><td>".$a['nis']."</td><td>".$a['nama_siswa']."</td><td>".$a['absen']."</td><td>
<a href='".base_url()."index.php/adminweb/editabsen/".$a['id_absensi']."'><div class='submitButton2'>Edit Data</div></a>
</td></tr>";

$no++;
}
?>
</table>
</div>
</div>
