<div id="content-kanan">

<div id="bg-judul">STATISTIK PENGUNJUNG</div>
<div id="isi-side">
<ul>
<li class="li-class">
<?php
	foreach($counter_pengunjung->result_array() as $c)
	{
		echo "Dikunjungi oleh : <b>".$c['content']."</b> user";
	}
?>
</li>
<?php
$ip = $_SERVER['REMOTE_ADDR'];
?>
<li class="li-class">IP address :  <b><?php echo $ip; ?></b></li>
<li class="li-class">OS : <b><?php echo $os; ?></b></li>
<li class="li-class">Browser : <b><?php echo $browser; ?></b></li>
</ul>
</div>
<div id="bg-bawah-judul"></div> 

<div id="bg-judul">AGENDA SEKOLAH TERBARU</div>
<div id="isi-side">
<ul>
<?php
foreach($agenda->result_array() as $agenda)
{
echo "<li class='li-class'><a href=".base_url()."index.php/web/detailagenda/".$agenda['id_agenda']." onclick=\"return hs.htmlExpand(this, { objectType: 'iframe' } )\">".$agenda['tema_agenda']."</a></li>";
}
?>
</ul><br />
<div class="submitButton"><a href="<?php echo base_url(); ?>index.php/web/data/10">Lihat Semua Agenda</a></div>
</div>
<div id="bg-bawah-judul"></div> 

</div>

</div>
