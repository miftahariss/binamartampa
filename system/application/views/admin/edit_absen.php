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
foreach($detail->result_array() as $e){
$id_absen=$e["id_absensi"];
$nama_siswa=$e["nama_siswa"];
$kelas=$e["nama_kelas"];
$tanggal=$e["tanggal"];
$bulan=$e["bulan"];
$tahun=$e["tahun"];
$absensi=$e["absen"];
}
?>
<div id="isi">
<h1>Modul Absen</h1><br />
<table width="100%">
<form method="post" action="<?php echo base_url(); ?>index.php/adminweb/updateabsen">
<tr><td width="200">Nama Siswa - <?php echo $id_absen; ?></td><td width="10" align="center">:</td><td><input type="text" class="input" readonly="readonly" name="nama" size="50" value="<?php echo $nama_siswa; ?>" /></td></tr>
<tr><td width="200">Tahun Ajaran</td><td width="10" align="center">:</td><td><input type="text" class="input" readonly="readonly" name="kelas" size="50" value="<?php echo $kelas; ?>"  /></td></tr>
<tr><td width="200">Tanggal Absensi</td><td width="10" align="center">:</td><td>
<select class="input" name="tgl">
<?php
$tgl1=$tanggal;
for($i=1;$i<=31;$i++)
{
if($tgl1==$i)
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
$tgl2=$bulan;
for($i=1;$i<=12;$i++)
{
if($tgl2==$i)
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
$tgl3=$tahun;
for($i=2009;$i<=$tgl3;$i++)
{
if($tgl3==$i)
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

</td></tr>
<tr><td width="200"></td><td width="10" align="center"></td><td>
<?php
if($absensi=="S"){
?>
<input type="radio" value="H" class="input" name="absensi" />Hadir<br />
<input type="radio" value="I" class="input" name="absensi" />Izin<br />
<input type="radio" value="A" class="input" name="absensi" />Alpha<br />
<input type="radio" value="B" class="input" name="absensi" />Bolos<br />
<input type="radio" value="SK" class="input" name="absensi" />Skors<br />
<input type="radio" value="D" class="input" name="absensi" />Dispensasi<br />
<input type="radio" value="S" class="input" name="absensi" checked="checked" />Sakit
<?php
}
else if($absensi=="SK"){
?>
<input type="radio" value="H" class="input" name="absensi" />Hadir<br />
<input type="radio" value="I" class="input" name="absensi" />Izin<br />
<input type="radio" value="A" class="input" name="absensi" />Alpha<br />
<input type="radio" value="B" class="input" name="absensi" />Bolos<br />
<input type="radio" value="SK" class="input" name="absensi" checked="checked" />Skors<br />
<input type="radio" value="D" class="input" name="absensi" />Dispensasi<br />
<input type="radio" value="S" class="input" name="absensi" />Sakit
<?php
}
else if($absensi=="H"){
?>
<input type="radio" value="H" class="input" name="absensi" checked="checked" />Hadir<br />
<input type="radio" value="I" class="input" name="absensi" />Izin<br />
<input type="radio" value="A" class="input" name="absensi" />Alpha<br />
<input type="radio" value="B" class="input" name="absensi" />Bolos<br />
<input type="radio" value="SK" class="input" name="absensi" />Skors<br />
<input type="radio" value="D" class="input" name="absensi" />Dispensasi<br />
<input type="radio" value="S" class="input" name="absensi" />Sakit
<?php
}
else if($absensi=="I"){
?>
<input type="radio" value="H" class="input" name="absensi" />Hadir<br />
<input type="radio" value="I" class="input" name="absensi" checked="checked" />Izin<br />
<input type="radio" value="A" class="input" name="absensi" />Alpha<br />
<input type="radio" value="B" class="input" name="absensi" />Bolos<br />
<input type="radio" value="SK" class="input" name="absensi" />Skors<br />
<input type="radio" value="D" class="input" name="absensi" />Dispensasi<br />
<input type="radio" value="S" class="input" name="absensi" />Sakit
<?php
}
else if($absensi=="A"){
?>
<input type="radio" value="H" class="input" name="absensi" />Hadir<br />
<input type="radio" value="I" class="input" name="absensi" />Izin<br />
<input type="radio" value="A" class="input" name="absensi" checked="checked" />Alpha<br />
<input type="radio" value="B" class="input" name="absensi" />Bolos<br />
<input type="radio" value="SK" class="input" name="absensi" />Skors<br />
<input type="radio" value="D" class="input" name="absensi" />Dispensasi<br />
<input type="radio" value="S" class="input" name="absensi" />Sakit
<?php
}
else if($absensi=="B"){
?>
<input type="radio" value="H" class="input" name="absensi" />Hadir<br />
<input type="radio" value="I" class="input" name="absensi" />Izin<br />
<input type="radio" value="A" class="input" name="absensi" />Alpha<br />
<input type="radio" value="B" class="input" name="absensi" checked="checked" />Bolos<br />
<input type="radio" value="SK" class="input" name="absensi" />Skors<br />
<input type="radio" value="D" class="input" name="absensi" />Dispensasi<br />
<input type="radio" value="S" class="input" name="absensi" />Sakit
<?php
}
else{
?>
<input type="radio" value="H" class="input" name="absensi" />Hadir<br />
<input type="radio" value="I" class="input" name="absensi" />Izin<br />
<input type="radio" value="A" class="input" name="absensi" />Alpha<br />
<input type="radio" value="B" class="input" name="absensi" />Bolos<br />
<input type="radio" value="SK" class="input" name="absensi" />Skors<br />
<input type="radio" value="D" class="input" name="absensi" checked="checked" />Dispensasi<br />
<input type="radio" value="S" class="input" name="absensi" />Sakit
<?php
}
?>
</td></tr>
<tr><td width="200"></td><td width="10" align="center"></td><td><input type="submit" value="Simpan Data" class="input" /> <input type="reset" value="Hapus" class="input" /><input type="hidden" name="id" value="<?php echo $id_absen; ?>" /></td></tr>
</form>
</table>
</div>