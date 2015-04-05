<? foreach($Newspaper as $Newsp){ ?>
<table width="100%">
<tr><td width="20%" valign="top" class="container"><br><h2>View News by Feed</h2>
<hr>
<?
foreach($Feeds as $Feed){
?>
<a href="/news/newspaper/<? echo str_replace(" ", "-", strtolower($Newsp->NewsName)); ?>/<? echo str_replace(" ", "-", strtolower($Feed->FeedName)); ?>.html"><? echo stripslashes($Feed->FeedName); ?></a>
<br>
<?
}
?><br><br><br></td><td valign="top" width="80%" class="container"><br>

<? 

	
?><h1><? echo stripslashes($Newsp->NewsName); ?></h1><br>
<a href="<? echo $Newsp->WebSite; ?>" target="_blank"><? echo $Newsp->WebSite; ?></a><br>
<? if($Newsp->National == 1){ ?>National News Source<? } ?><br>
Region: <a href="/news/region/<? echo str_replace(" ", "-", strtolower($Newsp->RegionName)); ?>.html"><? echo $Newsp->RegionName; ?></a><br>
Province: <a href="/news/province/<? echo str_replace(" ", "-", strtolower($Newsp->ProvinceName)); ?>.html"><? echo $Newsp->ProvinceName; ?></a><br>
<? if($Newsp->City != ""){ ?><? echo stripslashes($Newsp->City); ?><? } ?>


<br><br>
View All <a href="/news/newspaper/<? echo str_replace(" ", "-", strtolower($Newsp->NewsName)); ?>.html"><? echo stripslashes($Newsp->NewsName); ?> News</a>
<br><br>

</td></tr>
</table><? } ?>