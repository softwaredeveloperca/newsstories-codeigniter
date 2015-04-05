<table width="100%">
<tr><td width="20%" valign="top" class="container"><br><h2>News by Region</h2>
<? 
$IsItSet=0;
foreach($Regions as $Region){
	if($RegionID == $Region->RegionID){
		$IsItSet=1;
		?><b><? echo $Region->Name; ?></b><?
	}
	else
	{
?>
<a href="/newspapers/<? if($Name != "" && $Name != $Region->Name && $URLName != ""){ ?><? echo $URLName; ?>/<? } ?>region/<? echo str_replace(" ", "-", strtolower($Region->Name)); ?>.html"><? echo $Region->Name; ?></a>
<?  } ?>
<br>
<?
  
}
if($IsItSet == 1){
	?><a href="/newspapers<? if($URLName != ""){ echo ("/" . $URLName); } ?>.html">All Regions</a><br><?
}
?><br><h2>News by Province</h2>
<? 
$IsItSet=0;
foreach($Provinces as $Province){
	if($ProvinceID == $Province->ProvinceID){
		$IsItSet=1;
		?><b><? echo $Province->Name; ?></b><?
	}
	else
	{
?>
<a href="/newspapers/<? if($Name != "" && $Name != $Province->Name && $URLName != ""){ ?><? echo $URLName; ?>/<? } ?>province/<? echo str_replace(" ", "-", strtolower($Province->Name)); ?>.html"><? echo $Province->Name; ?></a>
<?
	} ?><br><?
}
if($IsItSet == 1){
	?><a href="/newspapers<? if($URLName != ""){ echo ("/" . $URLName); } ?>.html">All Provinces</a><br><?
}
?><br><br></td><td valign="top" width="80%" class="container"><br><h1>Read Canadian Newspapers
<? if($ProvinceID > 0){ ?> -  <? echo $ProvinceName; ?><? } ?></h1>
<? if(isset($DDescription)){ ?><? echo $DDescription; ?><? } ?><br>
<br><br>
<? include("system/application/views/ad.php"); ?>
<hr>
<?
foreach($Newspapers as $Newspaper){
?>
<a href="/newspapers/view/<? echo str_replace(" ", "-", strtolower($Newspaper->Name)); ?>.html"><? echo stripslashes($Newspaper->Name); ?></a>
<br>
<?
}
?>
<br><br>
</td></tr>
</table>