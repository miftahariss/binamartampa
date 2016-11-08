<div id="kiri"><h2>Selamat Datang di Control Panel Guru & Pegawai - SMA Negeri 1 Wongsorejo</h2>
<div id="isi"><br />
<script type="text/javascript">
function lihatObjek()
{
var data="";
document.soal.simpan.value="";
	for(i=0;i<document.soal.length;i++)
	{
		if(document.soal.elements[i].type=='radio')
		{
			if(document.soal.elements[i].checked==true)
			{
				if(data=="")
				data=document.soal.elements[i].value;
				else
				data+='|'+document.soal.elements[i].value;
			}
		}
	}
	document.soal.simpan.value=data;
}
</script>
<form method="post" action="<?php echo base_url(); ?>index.php/guru/simpaninput" name="soal">
<table width="100%" class="table" border="1">
<tr bgcolor="#fff" align="center"><td style="padding:5px;">No</td><td style="padding:5px;">NIS</td><td style="padding:5px;">Nama Siswa</td><td colspan="7" style="padding:5px;">Keterangan Absen</td></tr>
<?php
foreach($nama_siswa->result_array() as $k)
{
	$nk = $k["nama_kelas"];
}
echo"Tanggal : <input type='text' name='tgl' value='".$tgl."' size='2' class='textfield' readonly='readonly'> - 
Bulan : <input type='text' name='bln' value='".$bln."' size='2' class='textfield' readonly='readonly'> - 
Tahun : <input type='text' name='thn' value='".$thn."' size='2' class='textfield' readonly='readonly'> - 
Kelas : <input type='text' name='kelas' value='".$nk."' size='8' class='textfield' readonly='readonly'>
";
echo'<input type="hidden" value="" name="simpan"/>';
echo'<input type="hidden" value="'.$id_kls.'" name="kelas"/><br><br>';
$no=1;
foreach($nama_siswa->result_array() as $n)
{
echo "<tr class='tr'><td class='td'>".$no."</td><td class='td'>".$n['nis']."</td><td class='td'>".$n['nama_siswa']."</td>
<td class='td'><input type='radio' onclick='javascript:lihatObjek();' value='".$n['id_siswa']."_".$n['id_kelas']."_S' name='".$n['id_siswa']."' class='submitButton2'>(S) Sakit </td>
<td class='td'><input type='radio' onclick='javascript:lihatObjek();' value='".$n['id_siswa']."_".$n['id_kelas']."_I' name='".$n['id_siswa']."' class='submitButton2'>(I) Izin </td>
<td class='td'><input type='radio' onclick='javascript:lihatObjek();' value='".$n['id_siswa']."_".$n['id_kelas']."_A' name='".$n['id_siswa']."' class='submitButton2'>(A) Alpha </td>
<td class='td'><input type='radio' onclick='javascript:lihatObjek();' value='".$n['id_siswa']."_".$n['id_kelas']."_B' name='".$n['id_siswa']."' class='submitButton2'>(B) Bolos</td>
<td class='td'><input type='radio' onclick='javascript:lihatObjek();' value='".$n['id_siswa']."_".$n['id_kelas']."_H' name='".$n['id_siswa']."' class='submitButton2'>(H) Hadir</td>
<td class='td'><input type='radio' onclick='javascript:lihatObjek();' value='".$n['id_siswa']."_".$n['id_kelas']."_D' name='".$n['id_siswa']."' class='submitButton2'>(D) Dispen</td>
<td class='td'><input type='radio' onclick='javascript:lihatObjek();' value='".$n['id_siswa']."_".$n['id_kelas']."_SK' name='".$n['id_siswa']."' class='submitButton2'>(SK) Skors</td>
</tr>";
$no++;
}
?>
</table>
<input type="submit" class="submitButton" value="Simpan Rekap Absensi" />
<input type="reset" class="submitButton" value="Hapus dan Ulang Pengisian" />
</form>
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
</div>
</div>
