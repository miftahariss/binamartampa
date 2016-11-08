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
<div>
<table border="1">
<?php
foreach($siswa->result_array() as $b)
{
	$kelas = $b['nama_kelas'];
	$id_kls = $b['id_kelas'];
}
$i=1;
echo"<tr align='center' bgcolor='#EAEAEA'><td>No</td><td>NIS</td><td>Nama Siswa</td>
<td width='70'>Hadir</td><td width='70'>Sakit</td><td width='70'>Izin</td><td width='70'>Alpha</td><td width='70'>Bolos</td><td width='70'>Dispensasi</td><td width='70'>Skorsing</td><td width='70'>Total</td></tr>";
echo "<div id='title-isi'>Rekap Absensi Kelas ".$kelas." - ".getBulan($bulan)." - ".$tahun."</div>";
foreach($siswa->result_array() as $h)
{


echo "<tr><td>".$i."</td><td>".$h["nis"]."</td><td>".$h["nama_siswa"]."</td>";

$hs_hadir = $this->Akademik_model->Rekap_Absen_Siswa($id_kls,$bulan,$tahun,$h["id_siswa"],"and tbl_absensi.absen='H'");
foreach($hs_hadir->result() as $dh)
{
echo "<td align='center'>".$dh->jml."</td>";
}

$hs_sakit = $this->Akademik_model->Rekap_Absen_Siswa($id_kls,$bulan,$tahun,$h["id_siswa"],"and tbl_absensi.absen='S'");
foreach($hs_sakit->result() as $ds)
{
echo "<td align='center'>".$ds->jml."</td>";
}

$hs_izin = $this->Akademik_model->Rekap_Absen_Siswa($id_kls,$bulan,$tahun,$h["id_siswa"],"and tbl_absensi.absen='I'");
foreach($hs_izin->result() as $di)
{
echo "<td align='center'>".$di->jml."</td>";
}

$hs_alpha = $this->Akademik_model->Rekap_Absen_Siswa($id_kls,$bulan,$tahun,$h["id_siswa"],"and tbl_absensi.absen='A'");
foreach($hs_alpha->result() as $da)
{
echo "<td align='center'>".$da->jml."</td>";
}

$hs_bolos = $this->Akademik_model->Rekap_Absen_Siswa($id_kls,$bulan,$tahun,$h["id_siswa"],"and tbl_absensi.absen='B'");
foreach($hs_bolos->result() as $db)
{
echo "<td align='center'>".$db->jml."</td>";
}

$hs_dispensasi = $this->Akademik_model->Rekap_Absen_Siswa($id_kls,$bulan,$tahun,$h["id_siswa"],"and tbl_absensi.absen='D'");
foreach($hs_dispensasi->result() as $dd)
{
echo "<td align='center'>".$dd->jml."</td>";
}

$hs_skors = $this->Akademik_model->Rekap_Absen_Siswa($id_kls,$bulan,$tahun,$h["id_siswa"],"and tbl_absensi.absen='SK'");
foreach($hs_skors->result() as $dsk)
{
echo "<td align='center'>".$dsk->jml."</td>";
}

$hs_total = $this->Akademik_model->Rekap_Absen_Siswa($id_kls,$bulan,$tahun,$h["id_siswa"],"");
foreach($hs_total->result() as $dt)
{
echo "<td align='center'>".$dt->jml."</td>";
}
$i++;
echo "</tr>";
}
?>
</table>
</div>
</div>
