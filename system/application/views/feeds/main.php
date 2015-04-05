<table width="100%">
<tr><td width="30%" valign="top"><br><br><h2>Feeds by Region</h2>
<? foreach($Regions as $Region){	
?>
<a href="/feeds/regions/<? echo strtolower($Region->Name); ?>.html"><? echo $Region->Name;  ?></a><br>
<?
}
?><br><br></td><td valign="top" width="40%"><br><br><h1>All Feeds in Canada</h1><br>
Show Only: <a href="/feeds/language/english<? if(isset($ProvinceName)){ ?>/<? echo $ProvinceName; ?>.html<? } ?>">English</a> - <a href="/feeds/language/french<? if(isset($ProvinceName)){ ?>/<? echo $ProvinceName; ?>.html<? } ?>">French</a> Feeds<br><br>
<?
foreach($Feeds as $Feed){
?>
<a href="/news/feed/<? echo str_replace(" ", "-", strtolower($Feed->Name)); ?>-<? echo strtolower($Feed->FeedID); ?>.html"><? echo stripslashes($Feed->NewsName); ?> - <? echo stripslashes($Feed->Feedsname); ?></a><br>
<?
}
?><br><br></td>
<td valign="top" width="30%"><br><br><h2>Feeds by Province</h2>
<? foreach($Provinces as $Province){	
?>
<a href="/feeds/province/<? echo strtolower($Province->Name); ?>.html"><? echo $Province->Name;  ?></a><br>
<?
}
?><br><br>
</td></tr>
</table>