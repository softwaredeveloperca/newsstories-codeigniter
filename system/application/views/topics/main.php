<table width="100%">
<tr><td width="30%" valign="top"><br><br><h2>Newspapers by Region</h2>
<? foreach($Regions as $Region){	
?>
<a href="/newspapers/regions/<? echo strtolower($Region->Name); ?>.html"><? echo $Region->Name;  ?></a><br>
<?
}
?><br><br></td><td valign="top" width="40%"><br><br><h1>All Newspapers in Canada</h1><br>
Show Only: <a href="/newspapers/language/english<? if(isset($ProvinceName)){ ?>/<? echo $ProvinceName; ?>.html<? } ?>">English</a> - <a href="/newspapers/language/french<? if(isset($ProvinceName)){ ?>/<? echo $ProvinceName; ?>.html<? } ?>">French</a> Newspapers<br><br>
<?
foreach($Newspapers as $Newspaper){
?>
<a href="/newspapers/view/<? echo strtolower($Newspaper->Name); ?>.html"><? echo stripslashes($Newspaper->Name); ?></a><br>
<?
}
?></td>
<td valign="top" width="30%"><br><br><h2>Newspapers by Province</h2>
<? foreach($Provinces as $Province){	
?>
<a href="/newspapers/province/<? echo strtolower($Province->Name); ?>.html"><? echo $Province->Name;  ?></a><br>
<?
}
?><br><br>
</td></tr>
</table>