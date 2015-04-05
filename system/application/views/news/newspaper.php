<table width="100%">
<tr><td width="20%" valign="top" class="container"><br><h2>Feeds from <? echo stripslashes($NewspaperName); ?></h2>
<?
$IsItSet=0;
foreach($Feeds as $FeedItem){
	if($FeedID == $FeedItem->FeedID){
		$IsItSet=1;
		?><b><? echo $FeedItem->FeedName; ?></b><br><?
	}
	else
	{
	?><a href="/news/newspaper/<? echo str_replace(" ", "-", strtolower($NewspaperName)); ?>/<? echo str_replace(" ", "-", strtolower(str_replace("'", "", $FeedItem->FeedName))); ?>.html"><? echo $FeedItem->FeedName; ?></a><br>
<?
	}
}
if($IsItSet == 1){
	?><a href="/news/newspaper/<? echo str_replace(" ", "-", strtolower($NewspaperName)); ?>.html">All Feeds</a><br><?
}
?>

</td>
<td width="80%" valign="top" class="container"><br><h2><? if(isset($FeedName)){ ?><? echo stripslashes($FeedName); ?> - Feed <br><? } ?>News by <a href="/newspapers/view/<? echo str_replace(" ", "-", strtolower($NewspaperName)); ?>.html"><? echo stripslashes($NewspaperName); ?></a></h2>
<? if(isset($DDescription)){ ?><? echo $DDescription; ?><? } ?><br>
<br><br>
<? include("system/application/views/ad.php"); ?><hr>
<? if(isset($ass)){ echo $this->pagination->create_links(); ?><hr><? } ?>
<? include("system/application/views/news/news.php"); ?>
<? if(isset($ass)){ echo $this->pagination->create_links(); ?><hr><? } ?>
</td></tr></table>