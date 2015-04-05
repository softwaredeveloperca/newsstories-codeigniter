<table width="100%"><tr><td width="20%" valign="top">
<table width="85%" align="center"><tr><td>
<br /><br /><a href="/mynews/">Change My News</a><br><br>
<? if(!isset($Provinces) && !isset($Regions) && !isset($Categories) && !isset($Newspapers)){
	?>No Preferences selected showing all news.<?
}
else {
	?>
<h4>Provinces</h4>
<?
	if(isset($Provinces)){
		foreach($Provinces as $Province){
?>
<? echo ucwords(strtolower(str_replace("-", " ", $Province))); ?><br> 
<?
}
	}
		else {
			?>none<?
		}
	?>
    <h4>Regions</h4>
    <?
	if(isset($Regions)){
		foreach($Regions as $Region){
?>
<? echo ucwords(strtolower(str_replace("-", " ", $Region))); ?><br> 
<?
}
	}
		else {
			?>none<?
		}
	?><h4>Categories</h4>
    <?
	$x=0;
		if(isset($Categories)){
		foreach($Categories as $Category){
			$x++;
?>
<? echo ucwords(strtolower($Category)); ?><br>  
<?
	if($x == 12){ ?></td><td valign="top"><? }
	}
		}
		else {
			?>none<?
		}
	?>
    <h4>Newspaper</h4>
    <?
	$x=0;
		if(isset($Newspapers)){
		foreach($Newspapers as $Newspaper){
			$x++;
?>
<? echo ucwords(strtolower(str_replace("-", " ", $Newspaper))); ?><br>  
<?
	if($x == 12){ ?></td><td valign="top"><? }
	}
		}
		else {
			?>none<?
		}
}
	?>
    
    </td></tr></table>
</td><td width="80%">
<br>
<h1>My Personalized News</h1>
Here is your personalized news stream.  Get all of the latest new stories from every available canadian news source.
<br><br><br>
<? include("system/application/views/ad.php"); ?><hr>
<? include("system/application/views/news/news.php"); ?>
<br><br><br><br><br><br><br>
</tr></table>