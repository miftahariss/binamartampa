<div id="content">
<div><h3>Rekap Absensi Harian Siswa</h3></div><br>
<div>
<form method="post" action="<?php echo base_url(); ?>index.php/akademik/rekapabsen">
<h5>Masukkan Kriteria Pencarian</h5><br />Kelas : <select name="kls" class="dropdown">
<?php
foreach($kls->result_array() as $k)
{
echo "<option value='".$k['id_kelas']."'>".$k['nama_kelas']."</option>";
}
?>
</select>
 - Bulan : <select name="bln" class="dropdown">
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
 - Tahun : <select name="thn" class="dropdown">
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
<input type="submit" value="Lihat Absensi" class="submitButton" />
</form>
</div>
</div>
