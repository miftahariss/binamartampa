<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SMK KESEHATAN BINA MARTAPURA</title>
<link href="<?php echo base_url(); ?>system/application/views/main-web/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>system/application/views/main-web/css/highslide.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="<?php echo base_url(); ?>system/application/views/main-web/images/icon.png" />
<script type="text/javascript" src="<?php echo base_url(); ?>system/application/views/main-web/js/dropdown.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>system/application/views/main-web/js/highslide-with-html.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>system/application/views/main-web/js/slideshow.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>system/application/views/main-web/js/utilities.js"></script>
<script type="text/javascript">
hs.graphicsDir = '<?php echo base_url(); ?>system/application/views/main-web/images/';
hs.outlineType = 'rounded-white';
hs.wrapperClassName = 'draggable-header';

</script>
</head>

<body onLoad="goforit()">
<div id="luar">
<div id="head">
<div id="head-kiri"><img src="<?php echo base_url(); ?>system/application/views/main-web/images/bg-head.png" /></div>
<div id="head-kanan">
<span><h5><a href="<?php echo base_url() ?>">BERANDA</a> | 
<?php
$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
if($session!=""){
$pecah=explode("|",$session);
$nama = $pecah[1];
$status = $pecah[2];
if($status=='admin'){
?>
<a href="<?php echo base_url() ?>index.php/web/logout">LOG OUT</a> | <a href="<?php echo base_url(); ?>index.php/adminweb">C-PANEL</a>
<?php
}
else{
?>
<a href="<?php echo base_url() ?>index.php/web/logout">LOG OUT</a> | <a href="<?php echo base_url(); ?>index.php/guru">C-PANEL</a>
<?php
}
}
else{
?>
<a href="<?php echo base_url() ?>index.php/web/login">LOG IN</a> 
<?php
}
?>

| <a href="<?php echo base_url() ?>index.php/web/contact">HUBUNGI KAMI</a></h5></span>
<?php
if($session!=""){
echo "Selamat Datang <b>".$nama."</b>";
}
else{

}
?>
</div>
</div>
<div id="menu">
	<?php
	$no=1;
	foreach($menu->result_array() as $m){
		echo "<div id='parent_".$no."' class='sample_attach'><a href='#'>".$m['title']."</a></div>";
		$sub_menu=$this->Web_model->Sub_Menu_Atas($m['id'],"1");
		//print_r($sub_menu);
		//echo $m['id_parent'];
		echo"<div id='child_".$no."'>";
		foreach($sub_menu->result_array() as $sm)
		{
			echo "<a class='sample_attach' href='".base_url()."index.php/web/data/".$sm['id']."'>".$sm['title']."</a>";
		}
		echo"</div>";
		if($no<6){
		echo'<div id="batas-menu"><img src="'.base_url().'system/application/views/main-web/images/batas.jpg" /></div>';
		}
		echo'<script type="text/javascript">
		at_attach("parent_'.$no.'", "child_'.$no.'", "hover", "y", "pointer");
		</script>';
		$no++;
	}
	?>

</div>
<div>
<div id="imgSShow" align="center"><img src="<?php echo base_url(); ?>system/application/views/main-web/images/head.jpg" alt="large image" name="SLIDESIMG" id="SLIDESIMG" style="opacity: 1;"><script type="text/javascript">
  SLIDES = new slideshow("SLIDES");
  SLIDES.timeout = 5000;
  SLIDES.prefetch = 1;
  s = new slide();
  s.src = "<?php echo base_url(); ?>system/application/views/main-web/images/head.jpg";
  SLIDES.add_slide(s);

  s = new slide();
  s.src = "<?php echo base_url(); ?>system/application/views/main-web/images/head2.jpg";
  SLIDES.add_slide(s);
  
  s = new slide();
  s.src = "<?php echo base_url(); ?>system/application/views/main-web/images/head3.jpg";
  SLIDES.add_slide(s);
  
  s = new slide();
  s.src = "<?php echo base_url(); ?>system/application/views/main-web/images/head4.jpg";
  SLIDES.add_slide(s);
  
  s = new slide();
  s.src = "<?php echo base_url(); ?>system/application/views/main-web/images/head5.jpg";
  SLIDES.add_slide(s);

  SLIDES.image = document.images.SLIDESIMG;
     
  // SLIDEanimpre = new YAHOO.util.Anim('SLIDESIMG', { opacity: { to: 0.1, from:1 } }, 2, YAHOO.util.Easing.easeOut);

  // SLIDES.pre_update_hook = function() { SLIDEanimpre.animate(); alert("pre"); return; }
  SLIDES.pre_update_hook = function() { YAHOO.util.Dom.setStyle('SLIDESIMG','opacity','0.4'); return; }

  SLIDEanim = new YAHOO.util.Anim('SLIDESIMG', { opacity: { to: 1, from:0.4 } }, 1, YAHOO.util.Easing.easeOut);

  SLIDES.post_update_hook = function() { SLIDEanim.animate(); return; }
  
  SLIDES.update();
  
  YAHOO.util.Event.addListener("body", "onload", SLIDES.play());
</script></div>
</div>
<div id="menu">
	<?php
	$no=1;
	foreach($menu_bawah->result_array() as $mb){
		echo "<div class='sample_attach'><a href='".base_url()."index.php/web/data/".$mb['id']."'>".$mb['title']."</a></div>";
		if($no<6){
		echo'<div id="batas-menu"><img src="'.base_url().'system/application/views/main-web/images/batas.jpg" /></div>';
		}
		$no++;
	}
	?><div id="s-menu"><script language="javascript" src="<?php echo base_url(); ?>system/application/views/main-web/js/clock.js" type="text/javascript"></script><span id="clock"></span></div>
</div>
