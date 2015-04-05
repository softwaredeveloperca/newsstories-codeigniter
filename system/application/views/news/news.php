<?
$thecnt=0;
foreach($News as $NewsItem){
$thecnt++;
if($thecnt==10){
		?><table width="100%"><tr><td class="container3"><?
    include("system/application/views/ad.php"); 
    
    ?></td></tr></table><?
}
?>

<table width="100%"><tr><td class="container3">
<img src="http://www.newsstories.ca/images/icon/<? echo rand(1, 1000); ?>.png"> <a href="<? echo strtolower($NewsItem->Url); ?>" target="_blank"><font size="4"><? echo stripslashes($NewsItem->Title); ?></font></a><br>
<? if($NewsItem->Description != ""){ ?><? echo str_replace("<img", "<img align=\"right\"", strip_tags(stripslashes($NewsItem->Description), "<img><a>")); ?><br><? } ?>
<table cellpadding="0" cellspacing="0" width="500"><tr><td valign="top" class="container2">
<? if(isset($CategoryID) && $CategoryID < 1){ ?><b>Category:</b> <a href="/news/topic/<? echo str_replace(" ", "-", strtolower(stripslashes($NewsItem->CatName))); ?>.html"><? echo stripslashes($NewsItem->CatName); ?></a><? } ?></td><td width="50%" valign="top" class="container2"><? if(isset($ProvinceID) && $ProvinceID < 1){ ?><b>Province:</b> <a href="/news/province/<? echo str_replace(" ", "-", strtolower(stripslashes($NewsItem->ProvinceName))); ?>.html"><? echo stripslashes($NewsItem->ProvinceName); ?></a><? } ?></td></tr>
<td width="50%" valign="top" class="container2"><b>Newspaper:</b> <a href="/news/newspaper/<? echo str_replace(" ", "-", strtolower(stripslashes($NewsItem->NewsName))); ?>.html"><? echo stripslashes($NewsItem->NewsName); ?></a></td>
<td width="50%" valign="top" class="container2"><? if(isset($RegionID) && $RegionID < 1){ ?><b>Region:</b> <a href="/news/region/<? echo str_replace(" ", "-", strtolower(stripslashes($NewsItem->RegionName))); ?>.html"><? echo stripslashes($NewsItem->RegionName); ?></a><? } ?></td></tr>
<td width="50%" valign="top" class="container2"><b>Feed:</b> <a href="/news/newspaper/<? echo str_replace(" ", "-", strtolower(stripslashes($NewsItem->NewsName))); ?>/<? echo str_replace(" ", "-", strtolower(stripslashes($NewsItem->FeedName))); ?>.html"><? echo stripslashes($NewsItem->FeedName); ?></a>
</td><td width="50%" valign="top" class="container2"><b>Date:</b> <? echo stripslashes($NewsItem->CurrentDate); ?></td></tr></table>
<p><br /><br />
</p>
<? 
//var_dump($_SERVER['REMOTE_ADDR']);
if($_SERVER['REMOTE_ADDR'] == "173.35.214.231"){ 

 ?>
 <table width="100%"><tr><td width="50%">
<a href="http://www.newsstories.ca/comment/view/<?php echo $NewsItem->NewsID; ?>.html" onclick=" NewWindow(this.href,'mywin','500','300','yes','center');return false;" onfocus="this.blur()">Comment<?php if($NewsItem->Comments > 0){ ?> (<?php echo $NewsItem->Comments; ?>)<? } ?></a></td><td width="50%">
<a href="http://www.newsstories.ca/share/url/<?php echo $NewsItem->NewsID; ?>.html" onclick=" NewWindow(this.href,'mywin','500','300','yes','center');return false;" onfocus="this.blur()">Share</a></td></tr></table><br>
<? } ?>

   </td></tr></table>
<?

}
?>