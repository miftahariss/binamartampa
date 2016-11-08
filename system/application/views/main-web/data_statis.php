<div id="content-tengah">
<?php
foreach($detail->result_array() as $b)
{
echo "<div id='title-isi'>".$b['title']." SMAN 1 Wongsorejo</div>";
echo"Share this article on :";
	?>
	<script language="javascript">
document.write("<a href='http://twitter.com/home/?status=" + document.URL + "' target='_blank'>&#8226; Twitter</a> | <a href='http://www.facebook.com/share.php?u=" + document.URL + "' target='_blank'>&#8226; Facebook</a> | <a href='http://www.reddit.com/submit?url=" + document.URL + "' target='_blank'>&#8226; Reddit</a> | <a href='http://digg.com/submit?url=" + document.URL + "' target='_blank'>&#8226; Digg</a>");
</script>
	<?php
	echo"<br><br>";
echo $b['content'];
}
?>
</div>

