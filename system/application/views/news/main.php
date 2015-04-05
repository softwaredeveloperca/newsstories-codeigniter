<table width="100%">
<tr><td width="20%" valign="top" class="container"><br><h2>News by Region</h2>
<? 
$IsItSet=0;
foreach($Regions as $Region){
	if($RegionID == $Region->RegionID || $SubName == $Region->Name){
		$IsItSet=1;
		?><b><? echo $Region->Name; ?></b><?
	}
	else
	{
?>
<a href="/news/<? if($Name != "" && $Name != $Region->Name && $URLName != ""){ ?><? echo $URLName; ?>/<? } ?>region/<? echo str_replace(" ", "-", strtolower($Region->Name)); ?>.html"><? echo $Region->Name; ?></a>
<?  } ?>
<br>
<?
  
}
if($IsItSet == 1){
	?><a href="/news<? if($URLName != ""){ echo ("/" . $URLName); } ?>.html">All Regions</a><br><?
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
<a href="/news/<? if($Name != "" && $Name != $Province->Name && $URLName != ""){ ?><? echo $URLName; ?>/<? } ?>province/<? echo str_replace(" ", "-", strtolower($Province->Name)); ?>.html"><? echo $Province->Name; ?></a>
<?
	} ?><br><?
}
if($IsItSet == 1){
	?><a href="/news<? if($URLName != ""){ echo ("/" . $URLName); } ?>.html">All Provinces</a><br><?
}

if(isset($Newspapers)){ 
?>
<br><h2>News by Newspaper</h2>
<? 
    foreach($Newspapers as $Newspaper){
?>
<a href="http://www.newsstories.ca/news/newspaper/<? echo str_replace(" ", "-", strtolower($Newspaper->Name)); ?>.html"><? echo $Newspaper->Name; ?></a><br />
<? 
    }
} 
?>
</td><td valign="top" width="60%" class="container"><br><h1>Latest Canadian News
<? if($RegionID > 0){ ?> -  <? echo $RegionName; ?><? } ?>
<? if($ProvinceID > 0){ ?> -  <? echo $ProvinceName; ?><? } ?>
<? if($CategoryID > 0){ ?> -  <? echo $CategoryName; ?><? } ?></h1>
<? if(isset($DDescription)){ ?><? echo $DDescription; ?><? } ?><br>
<br><br>
<? include("system/application/views/ad.php"); ?>
<!-- Show Only: <a href="/news/language/english<? if(isset($ProvinceName)){ ?>/<? echo $ProvinceName; ?>.html<? } ?>">English</a> - <a href="/news/language/french<? if(isset($ProvinceName)){ ?>/<? echo $ProvinceName; ?>.html<? } ?>">French</a> News--><hr>
<? if(isset($ass)){ echo $this->pagination->create_links(); ?><hr><? } ?>
<? include("news.php"); ?>
<? if(isset($ass)){ echo $this->pagination->create_links(); ?><? } ?>
</td>
<td valign="top" width="20%" class="container">
<br><h2>News by Topic</h2><script type="text/javascript"><!--
google_ad_client = "pub-0859992975261405";
google_ad_width = 125;
google_ad_height = 125;
google_ad_format = "125x125_as";
google_ad_type = "text_image";
google_color_border = "FFFFFF";
google_color_bg = "FFFFFF";
google_color_link = "5572ad";
google_color_text = "000000";
google_color_url = "000000";
//--></script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script><br /><br /><br />
<? 
$IsItSet=0;
foreach($Topics as $Topic){	
	if($CategoryID == $Topic->CategoryID){
		$IsItSet=1;
		?><b><? echo $Topic->Name; ?></b><?
	}
	else
	{
?>
<a href="/news/<? if($Name != "" && $Name != $Topic->Name && $PageTopic != "topic"){ ?><? if($URLName != ""){ echo ($URLName); ?>/<? } ?><? } ?>topic/<? echo str_replace(" ", "-", strtolower($Topic->Name)); ?>
<? if($SubURLName != ""){ 
	echo ("/" . $SubURLName . ".html"); 
	} 
	else {
		?>.html<?
	} ?>"><? echo $Topic->Name;  ?></a>
<?
	} ?><br><? 
	
} 

if($IsItSet == 1){
	 ?><a href="/news<? if($SubURLName != ""){ echo ("/" . $SubURLName); } ?>.html">All Topics</a><br><? 
}
?><br><br>
</td></tr>
</table>