<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="<?php echo base_url(); ?>system/application/views/admin/css/portal-style.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="<?php echo base_url(); ?>system/application/views/admin/images/icon.png" />
<script type="text/javascript" src="<?php echo base_url(); ?>system/application/views/admin/js/dropdown.js"></script>
<?php echo $scriptmce; ?>
<title>Halaman Administrator Website SMA Negeri 1 Wongsorejo</title>
</head>

<body onload="init()">
<div id="menu-atas">
<div class="logo"><a href="<?php echo base_url(); ?>index.php/adminweb"><img src="<?php echo base_url(); ?>system/application/views/admin/images/logo.png" border="0" /></a></div>
<div class="menu">
<div class="sub-menu"><a href="<?php echo base_url(); ?>index.php/adminweb/datastatis">Data Statis</a></div>
<div id="parent_1" class="sample_attach">Data Dinamis</div>
<div id="child_1">
<a class="sample_attach" href="<?php echo base_url(); ?>index.php/adminweb/berita">Indexs Berita</a>
<a class="sample_attach" href="<?php echo base_url(); ?>index.php/adminweb/pengumuman">Pengumuman</a>
<a class="sample_attach" href="<?php echo base_url(); ?>index.php/adminweb/agenda">Agenda Sekolah</a>
</div>
<script type="text/javascript">at_attach("parent_1", "child_1", "hover", "y", "pointer");</script>
<div id="parent_2" class="sample_attach">Sekolah</div>
<div id="child_2">
<a class="sample_attach" href="<?php echo base_url(); ?>index.php/adminweb/siswa">Data Siswa-Siswi</a>
<a class="sample_attach" href="<?php echo base_url(); ?>index.php/adminweb/kepegawaian">Data Kepegawaian</a>
<a class="sample_attach" href="<?php echo base_url(); ?>index.php/adminweb/alumni">Data Alumni</a>
</div>
<script type="text/javascript">at_attach("parent_2", "child_2", "hover", "y", "pointer");</script>
<div class="sub-menu"><a href="<?php echo base_url(); ?>index.php/adminweb/polling">Polling</a></div>
<div class="sub-menu"><a href="<?php echo base_url(); ?>index.php/adminweb/galeri">Galeri</a></div>
<div class="sub-menu"><a href="<?php echo base_url(); ?>index.php/adminweb/upload">Upload</a></div>
<div class="sub-menu"><a href="<?php echo base_url(); ?>index.php/adminweb/absensi">Absensi</a></div>
<div class="sub-menu"><a href="<?php echo base_url(); ?>index.php/adminweb/hubungi">Hubungi Kami</a></div>
<div class="sub-menu"><a href="<?php echo base_url(); ?>index.php/web/logout">Log Out</a></div>
</div>
</div>