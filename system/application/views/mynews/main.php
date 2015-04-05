<table width="100%"><tr><td width="10%" valign="top">
</td><td width="90%">
<br>
<table width="100%"><tr><td valign="top" width="40%">
<h1>My News</h1>
Select the type of news you want to receive and create a personal stream of news.  Personalize your news experience.  
<br><br>Select what news you want to see by province, region, topic or newspaper.<br><br><a href="/mynews/personal.html"><font size="+4">My News</font></a>
<br><br><br>
<? include("system/application/views/ad.php"); ?></td><td valign="top" width="50%"  class="container2">
</td></tr></table><br><br>
<h2>Setup Personal News</h2>
<div id="accordion">
	<h3><a href="#">Select by Province / Region</a></h3>
	<div>
    <table width="85%" align="center" class="nor"><tr><td valign="top" width="50%"><?
		foreach($Provinces as $Province){
?>
<input class="provincecheckboxes" type="checkbox" name="<? echo str_replace(" ", "-", strtolower($Province->Name)); ?>" value="1"<? if(isset($ProvincesArr) && in_array(str_replace(" ", "-", strtolower($Province->Name)), $ProvincesArr)){ ?> CHECKED<? } ?>> <? echo $Province->Name; ?>  <br> 
<?
}
	?>
    	
    </td><td width="10%" valign="top">&nbsp;

</td><td valign="top" width="50%">
    <?
		foreach($Regions as $Region){
?>
<input class="regioncheckboxes" type="checkbox" name="<? echo str_replace(" ", "-", strtolower($Region->Name)); ?>" value="1"<? if(isset($RegionsArr) && in_array(str_replace(" ", "-", strtolower($Region->Name)), $RegionsArr)){ ?> CHECKED<? } ?>> <? echo $Region->Name; ?> <br> 
<?
}
	?>
    </td></tr></table><br>
	</div>
    <h3><a href="#">Select by Topic</a></h3>
	<div>
    <table width="85%" align="center" class="nor"><tr><td valign="top">
		<?
		$x=0;
		foreach($Categories as $Category){
			$x++;
?>
<input class="categorycheckboxes" type="checkbox" name="<? echo str_replace(" ", "-", strtolower($Category->Name)); ?>" id="<? echo str_replace(" ", "-", strtolower($Category->Name)); ?>" value="1"<? if(isset($CategoriesArr) && in_array(str_replace(" ", "-", strtolower($Category->Name)), $CategoriesArr)){ ?> CHECKED<? } ?>> <? echo $Category->Name; ?> <br>  
<?
	if($x == 15){ ?></td><td valign="top"><? }
}
	?>
    </td></tr></table><br>
	</div>
	<h3><a href="#">Select by Newspaper</a></h3>
	<div>
           
        
         <? foreach($Newspapers as $Newspaper){ ?>
    <input class="newspapercheckboxes" type="checkbox" name="<? echo str_replace(" ", "-", strtolower($Newspaper->Name)); ?>" id="<? echo str_replace(" ", "-", strtolower($Newspaper->Name)); ?>" value="1"<? if(isset($NewspapersArr) && in_array(str_replace(" ", "-", strtolower($Newspaper->Name)), $NewspapersArr)){ ?> CHECKED<? } ?>> <? echo $Newspaper->Name; ?><br>
		<? } ?>
	</div>
   
</div>
<br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</td></tr></table>