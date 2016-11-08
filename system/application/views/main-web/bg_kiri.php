
<div id="content">
<div id="content-kiri">

<div id="bg-judul">KEPALA SEKOLAH</div>
<div id="isi-side-kepsek">
<img src="<?php echo base_url(); ?>system/application/views/main-web/images/laki.jpg" /><br />
Drs. Istu Handono<br />NIP. 19641229198903 1 011
</div>
<div id="bg-bawah-judul"></div>

<div id="bg-judul">PENGUMUMAN TERBARU</div>
<div id="isi-side">
<ul>
<?php
foreach($umum->result_array() as $u)
{
echo "<li class='li-class'><a href=".base_url()."index.php/web/detailpengumuman/".$u['id_pengumuman']." onclick=\"return hs.htmlExpand(this, { objectType: 'iframe' } )\">".$u['judul_pengumuman']."</a></li>";
}
?>
</ul><br />
<div class="submitButton"><a href="<?php echo base_url(); ?>index.php/web/data/9">Lihat Semua Pengumuman</a></div>
</div>
<div id="bg-bawah-judul"></div> 

<!-- <div id="bg-judul">KRITIK DAN SARAN</div>
<div id="isi-side">
<div id="cboxdiv" style="text-align: center; line-height: 0">
<div><iframe frameborder="0" width="215" height="245" src="http://www2.cbox.ws/box/?boxid=2175405&amp;boxtag=r8m5q2&amp;sec=main" marginheight="2" marginwidth="2" scrolling="auto" allowtransparency="yes" name="cboxmain" style="border: 0px solid;" id="cboxmain"></iframe></div>
<div><iframe frameborder="0" width="215" height="75" src="http://www2.cbox.ws/box/?boxid=2175405&amp;boxtag=r8m5q2&amp;sec=form" marginheight="2" marginwidth="2" scrolling="no" allowtransparency="yes" name="cboxform" style="border: 0px solid;border-top:0px" id="cboxform"></iframe></div>
</div>
</div>
<div id="bg-bawah-judul"></div> -->

<!-- <div id="bg-judul">ALUMNI SMANJO</div>
<div id="isi-side">
<ul>
<li class="li-class">Register Alumni</li>
<li class="li-class">Daftar Alumni</li>
</ul>
</div>
<div id="bg-bawah-judul"></div> -->

<!-- <div id="bg-judul">LINK TERKAIT</div>
<div id="isi-side">
<ul>
<li class="li-class">Jardiknas</li>
<li class="li-class">Depdiknas</li>
<li class="li-class">BSNP Indonesia</li>
<li class="li-class">Kabupaten Banyuwangi</li>
</ul>
</div>
<div id="bg-bawah-judul"></div> -->

</div>
