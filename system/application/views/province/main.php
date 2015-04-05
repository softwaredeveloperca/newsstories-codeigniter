<?
$anarray=array('red', 'orange', 'green', 'blue', 'lightred', 'lightblue', 'lightorange', 'lightgreen');

?>

<table width="100%">
<tr><td width="65%" valign="top" class="container" height="500">
<div id="rightcontent">
<div id="canada">
<div id="bc"><a href="/news/provinces/british-columbia.html"><img border="0" src="/images/bc<? echo $anarray[rand(0, 7)]; ?>.gif" /></a></div>
<div id="alberta"><a href="/news/province/alberta.html"><img border="0" src="/images/alberta<? echo $anarray[rand(0, 7)]; ?>.gif" /></a></div>
<div id="sask"><a href="/news/province/saskatewan.html"><img border="0" src="/images/sask<? echo $anarray[rand(0, 7)]; ?>.gif" /></a></div>
<div id="manitoba"><a href="/news/province/manitoba.html"><img border="0" src="/images/manitoba<? echo $anarray[rand(0, 7)]; ?>.gif" /></a></div>
<div id="ontario"><a href="/news/province/ontario.html"><img border="0" src="/images/ontario<? echo $anarray[rand(0, 7)]; ?>.gif" /></a></div>
<div id="quebec"><a href="/news/province/quebec.html"><img border="0" src="/images/quebec<? echo $anarray[rand(0, 7)]; ?>.gif" /></a></div>
<div id="nb"><a href="/news/province/new-brunswick.html"><img border="0" src="/images/newbrunswick<? echo $anarray[rand(0, 7)]; ?>.gif" /></a></div>
<div id="novascotia"><a border="0" href="/news/province/nova-scotia.html"><img border="0" src="/images/novascotia<? echo $anarray[rand(0, 7)]; ?>.gif" /></a></div>
<div id="nfld"><a href="/news/province/newfoundland.html"><img border="0" src="/images/nfld<? echo $anarray[rand(0, 7)]; ?>.gif" /></a></div>
<div id="pei"><a href="/news/province/pei.html"><img border="0" src="/images/pei<? echo $anarray[rand(0, 7)]; ?>.gif" /></a></div>
<div id="yukon"><a href="/news/province/yukon.html"><img border="0" src="/images/yukon<? echo $anarray[rand(0, 7)]; ?>.gif" /></a></div>
<div id="nwt"><a href="/news/province/northwest-territories.html"><img border="0" src="/images/nwt<? echo $anarray[rand(0, 7)]; ?>.gif" /></a></div>
<div id="nuv"><a href="/news/province/nunavut.html"><img border="0" src="/images/nuv2<? echo $anarray[rand(0, 7)]; ?>.gif" /></a></div>
</div>
<h1 align="right">News by <br>Canadian Province</h1>
</td><td valign="top" width="35%" class="container" style="padding: 50px;"><h2>Select by Province</h2><br>
Get all of the lastest news from each individual province you want.  Select a province from the map or list for the latest news from all newspapers.<br><br><hr>
<p align="center">
<? include("system/application/views/ad2.php"); ?>
</p>
<hr>
<br>
<? foreach($Provinces as $Province){	
?>
<a href="/news/province/<? echo str_replace(" ", "-", strtolower($Province->Name));  ?>.html"><? echo $Province->Name; ?></a><br>
<?
}
?><br><br>
</td></tr></table>