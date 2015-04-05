<?


?>
<table width="100%"><tr><td width="20%" valign="top" class="container"><br><p align="center">
<? include("system/application/views/ad2.php"); ?>
</p>
<br>
<h2 align="center">Latest Canadian News</h2>
<style type="text/css">

/*Example CSS for the two demo scrollers*/

#pscroller1{
width: 310px;
height: 220px;
/*border: 1px solid black;*/
padding: 5px;
/* background-color: lightyellow; */
}

#pscroller2{
width: 150px;
height: 220px;
/*border: 1px solid black;*/
padding: 3px;
}

a{
text-decoration: none;
}

.someclass{ //class to apply to your scroller(s) if desired
}

</style>

<script type="text/javascript">

/*Example message arrays for the two demo scrollers*/
var pausecontent=new Array()
<? 
$cnt=0;
$specialc = array("$", "%", '\'', "\n", "-");
foreach($News as $NewsItem){
	
?>
pausecontent[<? echo $cnt; ?>]='<font style="font-family: Times New Roman; font-size: 16px; color: 1e294a; text-decoration:none;"><a target="_blank" href="<? echo $NewsItem->Url; ?>"><u><b><? echo str_replace($specialc, "", stripslashes($NewsItem->Title)); ?></b></u></a><br><? 

$NewsItem->Description=strip_tags( stripslashes($NewsItem->Description), "<img>");
echo substr(str_replace($specialc, "", $NewsItem->Description), 0, 255);
																 
if (strlen($NewsItem->Description) > 255){ ?>...<? } ?><br>from: <a href="/news/newspaper/<? echo str_replace($specialc, "", stripslashes($NewsItem->NewsName)); ?>.html"><? echo str_replace($specialc, "", stripslashes($NewsItem->NewsName)); ?></a> <br><a href="/news/province/<? echo str_replace($specialc, "", stripslashes($NewsItem->ProvinceName)); ?>.html"><? echo str_replace($specialc, "", stripslashes($NewsItem->ProvinceName)); ?></a> - <a href="/news/region/<? echo str_replace($specialc, "", stripslashes($NewsItem->RegionName)); ?>.html"><? echo str_replace($specialc, "", stripslashes($NewsItem->RegionName)); ?></a><br>Topic: <a href="/news/topic/<? echo str_replace($specialc, "", stripslashes($NewsItem->CatName)); ?>.html"><? echo str_replace($specialc, "", stripslashes($NewsItem->CatName)); ?></a> </font>'

<?
$cnt=$cnt+1;
}
?>
</script>
<script type="text/javascript">

/***********************************************
* Pausing up-down scroller- Dynamic Drive (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit http://www.dynamicdrive.com/ for this script and 100s more.
***********************************************/

function pausescroller(content, divId, divClass, delay){
this.content=content //message array content
this.tickerid=divId //ID of ticker div to display information
this.delay=delay //Delay between msg change, in miliseconds.
this.mouseoverBol=0 //Boolean to indicate whether mouse is currently over scroller (and pause it if it is)
this.hiddendivpointer=1 //index of message array for hidden div
document.write('<div id="'+divId+'" class="'+divClass+'" style="position: relative; overflow: hidden"><div class="innerDiv" style="position: absolute; width: 100%" id="'+divId+'1">'+content[0]+'</div><div class="innerDiv" style="position: absolute; width: 100%; visibility: hidden" id="'+divId+'2">'+content[1]+'</div></div>')
var scrollerinstance=this
if (window.addEventListener) //run onload in DOM2 browsers
window.addEventListener("load", function(){scrollerinstance.initialize()}, false)
else if (window.attachEvent) //run onload in IE5.5+
window.attachEvent("onload", function(){scrollerinstance.initialize()})
else if (document.getElementById) //if legacy DOM browsers, just start scroller after 0.5 sec
setTimeout(function(){scrollerinstance.initialize()}, 500)
}

// -------------------------------------------------------------------
// initialize()- Initialize scroller method.
// -Get div objects, set initial positions, start up down animation
// -------------------------------------------------------------------

pausescroller.prototype.initialize=function(){
this.tickerdiv=document.getElementById(this.tickerid)
this.visiblediv=document.getElementById(this.tickerid+"1")
this.hiddendiv=document.getElementById(this.tickerid+"2")
this.visibledivtop=parseInt(pausescroller.getCSSpadding(this.tickerdiv))
//set width of inner DIVs to outer DIV's width minus padding (padding assumed to be top padding x 2)
this.visiblediv.style.width=this.hiddendiv.style.width=this.tickerdiv.offsetWidth-(this.visibledivtop*2)+"px"
this.getinline(this.visiblediv, this.hiddendiv)
this.hiddendiv.style.visibility="visible"
var scrollerinstance=this
document.getElementById(this.tickerid).onmouseover=function(){scrollerinstance.mouseoverBol=1}
document.getElementById(this.tickerid).onmouseout=function(){scrollerinstance.mouseoverBol=0}
if (window.attachEvent) //Clean up loose references in IE
window.attachEvent("onunload", function(){scrollerinstance.tickerdiv.onmouseover=scrollerinstance.tickerdiv.onmouseout=null})
setTimeout(function(){scrollerinstance.animateup()}, this.delay)
}


// -------------------------------------------------------------------
// animateup()- Move the two inner divs of the scroller up and in sync
// -------------------------------------------------------------------

pausescroller.prototype.animateup=function(){
var scrollerinstance=this
if (parseInt(this.hiddendiv.style.top)>(this.visibledivtop+5)){
this.visiblediv.style.top=parseInt(this.visiblediv.style.top)-5+"px"
this.hiddendiv.style.top=parseInt(this.hiddendiv.style.top)-5+"px"
setTimeout(function(){scrollerinstance.animateup()}, 50)
}
else{
this.getinline(this.hiddendiv, this.visiblediv)
this.swapdivs()
setTimeout(function(){scrollerinstance.setmessage()}, this.delay)
}
}

// -------------------------------------------------------------------
// swapdivs()- Swap between which is the visible and which is the hidden div
// -------------------------------------------------------------------

pausescroller.prototype.swapdivs=function(){
var tempcontainer=this.visiblediv
this.visiblediv=this.hiddendiv
this.hiddendiv=tempcontainer
}

pausescroller.prototype.getinline=function(div1, div2){
div1.style.top=this.visibledivtop+"px"
div2.style.top=Math.max(div1.parentNode.offsetHeight, div1.offsetHeight)+"px"
}

// -------------------------------------------------------------------
// setmessage()- Populate the hidden div with the next message before it's visible
// -------------------------------------------------------------------

pausescroller.prototype.setmessage=function(){
var scrollerinstance=this
if (this.mouseoverBol==1) //if mouse is currently over scoller, do nothing (pause it)
setTimeout(function(){scrollerinstance.setmessage()}, 100)
else{
var i=this.hiddendivpointer
var ceiling=this.content.length
this.hiddendivpointer=(i+1>ceiling-1)? 0 : i+1
this.hiddendiv.innerHTML=this.content[this.hiddendivpointer]
this.animateup()
}
}

pausescroller.getCSSpadding=function(tickerobj){ //get CSS padding value, if any
if (tickerobj.currentStyle)
return tickerobj.currentStyle["paddingTop"]
else if (window.getComputedStyle) //if DOM2
return window.getComputedStyle(tickerobj, "").getPropertyValue("padding-top")
else
return 0
}
</script>
<script type="text/javascript">
new pausescroller(pausecontent, "pscroller1", "someclass", 3000)
</script>

<h1>News Stories . ca</h1>

Find the latest Canadian News from all newspapers in the country.  You can easily select news by province, region, topic, newspaper and specific newspaper feeds.  Find out what news is going on around the country.  The best place to get all Canadian news in one place.<br><br>
<p align="center">
<? include("system/application/views/ad3.php"); ?>
</p>
</td><td width="80%" valign="top" class="container">
<h1>News Stories</h1>
<a href="/news.html"><font size="4">LATEST NEWS FROM EVERYWHERE IN CANADA</font></a>
<h2>News by Topic: </h2>
<?

foreach($Topics as $Topic){
	
?>
- <a href="/news/topic/<? echo str_replace(" ", "-", strtolower($Topic->Name)); ?>.html"><? echo $Topic->Name; ?></a> 
<?
  
}
?>
<hr>
<br><br>
<? include("system/application/views/ad.php"); ?><hr>
<h2>News by Region: </h2>
<?

foreach($Regions as $Region){
	
?>
- <a href="/news/region/<? echo str_replace(" ", "-", strtolower($Region->Name)); ?>.html"><? echo $Region->Name; ?></a> 
<?
  
}
?><hr>
<h2>News by Province:</h2>
<?

foreach($Provinces as $Province){
	
?>
- <a href="/news/province/<? echo str_replace(" ", "-", strtolower($Province->Name)); ?>.html"><? echo $Province->Name; ?></a> 
<?
  
}
?><hr>
<h2>News by National News Source:</h2>
<?

foreach($Newspapers as $Newspaper){
	
?>
- <a href="/news/newspaper/<? echo str_replace(" ", "-", strtolower($Newspaper->Name)); ?>.html"><? echo $Newspaper->Name; ?></a> 
<?
  
}
?><hr><a href="/newspapers.html">View All Local Canadian Newspapers</a>

<br /><br />
<h2>News by Newspaper:</h2>
<table>
<?
$x=0;
foreach($NewspapersAll as $Newspaper){
	$x++;
	if($x%2==1){ ?><tr><? } 
?>
<td><a href="/news/newspaper/<? echo str_replace(" ", "-", strtolower($Newspaper->Name)); ?>.html"><? echo $Newspaper->Name; ?></a></td>
<?
  if($x%2==0){ ?><tr><? } 
}
?>
</table><hr><a href="/newspapers.html">View All Local Canadian Newspapers</a>

<br /><br />
<br /><br />
Part of the <a href="http://www.informational.ca">Informational Site Network</a><br><br><br><br>
</td></tr></table>