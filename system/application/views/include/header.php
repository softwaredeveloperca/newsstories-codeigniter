<?php
$ara=explode(".", $_SERVER['HTTP_HOST']);
if($ara[0] == "www")
{

}
else
{
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: http://www." . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
	
}
//include_once("/home/clf55/public_html/informational/informationinclude.php");
$SiteID=103;
?>
<html>
<head>
<title>News Stories<? if(isset($Title)){ ?> - <? echo $Title; ?><? } ?></title>
<META NAME="Description" CONTENT="<? if(isset($Description)){ ?><? echo $Description; ?><? } ?>">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">


<STYLE TYPE="text/css">
body { 
   
    background-image:url('/images/stripe.png');
    }
    
	.container
	{
	
	
		font-family:Times New Roman, Times, serif;
font-size:94%;
padding:15px;
border-width: 1px 1px 1px 1px;
border-spacing: 0px;
border-style: solid solid solid solid;
border-color: #000000;
	
	}
		.container2
	{
	
		
		font-family:Times New Roman, Times, serif
font-size:94%;
padding:0px;
	
	}
			.container3
	{
	
		
				padding: 10px;
                
                width 500px;
    
		font-family:Arial, Times New Roman, Times, serif
font-size:94%;
border-width: 1px 1px 1px 1px;
border-spacing: 0px;
border-style: solid solid solid solid;
border-color: #000000;
	
	}

	h1
	{
		 font-family: Times New Roman, Times, serif
		
		color: #000;
		
	}
	h2
	{
		 font-family: Times New Roman, Times, serif
		color: #000;
	}
	h3
	{
		 font-family: Times New Roman, Times, serif
		
		color: #000;
	}
	h4
	{
		 font-family: Times New Roman, Times, serif
		
		color: #000;
	}
	.themain
	{
	padding: 5px;
		
		
	}
	 a:link {
color: #5572AD;
font-size:94%; font-family:Times New Roman, Times, serif; font-weight:bold;

}

a:visited {
color: #5572AD;
font-size:94%; font-family:Times New Roman, Times, serif; font-weight:bold;


}

a:hover {
color: #010101;
font-size:94%; font-family:Times New Roman, Times, serif; font-weight:bold;


}

a:active {
color: #5572AD;
text-decoration: none;
font-size:94%; font-family:Times New Roman, Times, serif; font-weight:bold;

}

.header
{

	
}
.header a:link {
color: #5572AD;
font-size: 113%;
text-decoration: none;
}

.header a:visited {
color: #5572AD;
font-size: 113%;
text-decoration: none;
}

.header a:hover {
color: #FF0000;
font-size: 113%;
text-decoration: none;

}
.header a:active {
color: #5572AD;
font-size: 113%;
text-decoration: none;
}

.nor { font-size: 100%; }
<? if(isset($headermap) && $headermap == 1){ ?>
#canada
	{
	
	position: relative;
	
	}
	#alberta {
	
	position:absolute;
	
	
		top:178px;
		left: 82px;
		width:200px;
    overflow:visible;
	
   
    background-repeat: no-repeat;
    height: 0px !important; /* for most browsers */
    height /**/:35px; /* for IE5.5's bad box model */
	
	
	}
	#bc {
	position:absolute;
	
		left: 10px;
		top:130px;
		width:200px;
    overflow:visible;
	
 
    background-repeat: no-repeat;
    height: 0px !important; /* for most browsers */
    height /**/:35px; /* for IE5.5's bad box model */
	
	}
	#sask {
	position:absolute;
	
		left: 130px;
		top:195px;
		width:200px;
    overflow:visible;
	
 
    background-repeat: no-repeat;
    height: 0px !important; /* for most browsers */
    height /**/:35px; /* for IE5.5's bad box model */
	
	
	}
	#manitoba {
	position:absolute;
	
		left: 187px;
		top:201px;
		width:200px;
    overflow:visible;
	
 
    background-repeat: no-repeat;
    height: 0px !important; /* for most browsers */
    height /**/:35px; /* for IE5.5's bad box model */
	
	
	}
	#ontario {
	position:absolute;
	
		left: 230px;
		top:234px;
		width:200px;
    overflow:visible;
	
 
    background-repeat: no-repeat;
    height: 0px !important; /* for most browsers */
    height /**/:35px; /* for IE5.5's bad box model */
	
	
	}
		#quebec {
	position:absolute;
	
		left: 310px;
		top:160px;
		width:200px;
    overflow:visible;
	
 
    background-repeat: no-repeat;
    height: 0px !important; /* for most browsers */
    height /**/:35px; /* for IE5.5's bad box model */
	
	
	}
	#novascotia {
	position:absolute;
	
		left: 443px;
		top:270px;
		width:200px;
    overflow:visible;
	
 
    background-repeat: no-repeat;
    height: 0px !important; /* for most browsers */
    height /**/:35px; /* for IE5.5's bad box model */
	
	
	}
	#nb {
	position:absolute;
	
		left: 415px;
		top:280px;
		width:200px;
    overflow:visible;
	
 
    background-repeat: no-repeat;
    height: 0px !important; /* for most browsers */
    height /**/:35px; /* for IE5.5's bad box model */
	
	
	}
	#nfld{
	position:absolute;
	
		left: 380px;
		top:164px;
		width:200px;
    overflow:visible;
	
 
    background-repeat: no-repeat;
    height: 0px !important; /* for most browsers */
    height /**/:35px; /* for IE5.5's bad box model */
	
	
	}
	#pei {
	position:absolute;
	
		left: 450px;
		top:270px;
		width:200px;
    overflow:visible;
	
 
    background-repeat: no-repeat;
    height: 0px !important; /* for most browsers */
    height /**/:35px; /* for IE5.5's bad box model */
	
	
	}
	#yukon {
	position:absolute;
	
		left: 16px;
		top:47px;
		width:200px;
    overflow:visible;
	
 
    background-repeat: no-repeat;
    height: 0px !important; /* for most browsers */
    height /**/:35px; /* for IE5.5's bad box model */
	
	
	}
	#nwt {
	position:absolute;
	
		left: 75px;
		top:33px;
		width:200px;
    overflow:visible;
	
 
    background-repeat: no-repeat;
    height: 0px !important; /* for most browsers */
    height /**/:35px; /* for IE5.5's bad box model */
	
	
	}
	#nuv {
	position:absolute;
	
		left: 130px;
		top:5px;
		width:200px;
    overflow:visible;
	
 
    background-repeat: no-repeat;
    height: 0px !important; /* for most browsers */
    height /**/:35px; /* for IE5.5's bad box model */
	
<? } ?>
<? if(isset($mycontent) && $mycontent == 1){
?>
.accordion {
	width: 480px;
	border-bottom: solid 1px #c4c4c4;
}
#tabWrapper
{
    border-bottom: solid 1px #676767;
}

#tabContainer 
{
    padding:0;
margin:0;
    position:relative;
    z-index: 1;
    float:left;
    list-style:none;
}

#tabContainer li 
{
    float:left;
    margin:0;
    cursor: pointer;
    background: f1f1f1;
    border-top: solid 1px #676767;
    border-left: solid 1px #676767;
    border-right: solid 1px #ababab;
    margin-bottom: -1px;
}

#tabContainer .selected, #tabContainer .selected:hover
{
    background: #fff;
}


<? } ?>
</style>
<? if(isset($mycontent) && $mycontent == 1){
?>
  <link type="text/css" href="http://jqueryui.com/latest/themes/base/ui.all.css" rel="stylesheet" />
  <script type="text/javascript" src="http://www.newsstories.ca/js/development-bundle/jquery-1.3.2.js"></script>
  <script type="text/javascript" src="http://www.newsstories.ca/js/development-bundle/ui/ui.core.js"></script>
  <script type="text/javascript" src="http://www.newsstories.ca/js/development-bundle/ui/ui.accordion.js"></script>
  <script type="text/javascript" src="http://www.newsstories.ca/js/development-bundle/ui/ui.tabs.js"></script>
  <script type="text/javascript" src="http://www.newsstories.ca/js/jquery.cookie.js.txt"></script>

  <script type="text/javascript">
  $(document).ready(function(){
    $("#accordion").accordion({ autoHeight: false, active: false });
	$("#accordion").accordion('option', 'fillSpace', false);
	$("#tabs").tabs();
	
	

	$(".provincecheckboxes").click(function(){	
		if($(this).attr('checked')){
			if($.cookie('province') == null) $var="^" + $(this).attr('name');
			else $var=$.cookie('province') + "^" + $(this).attr('name');	
		}
		else {		
			$var=$(this).attr('name');
			$var=$.cookie('province').replace("^" + $(this).attr('name'), "");		
		}
		$.cookie("province", $var, { expires: 1000 });
	});
	$(".regioncheckboxes").click(function(){
		if($(this).attr('checked')){
			if($.cookie('region') == null) $var="^" + $(this).attr('name');
			else $var=$.cookie('region') + "^" + $(this).attr('name');	
		}
		else {		
			$var=$(this).attr('name');
			$var=$.cookie('region').replace("^" + $(this).attr('name'), "");		
		}
		$.cookie("region", $var, { expires: 1000 });
	});
	$(".categorycheckboxes").click(function(){
		if($(this).attr('checked')){
			if($.cookie('category') == null) $var="^" + $(this).attr('name');
			else $var=$.cookie('category') + "^" + $(this).attr('name');	
		}
		else {		
			$var=$(this).attr('name');
			$var=$.cookie('category').replace("^" + $(this).attr('name'), "");		
		}
		$.cookie("category", $var, { expires: 1000 });
	});
	$(".newspapercheckboxes").click(function(){
		if($(this).attr('checked')){
			if($.cookie('newspaper') == null) $var="^" + $(this).attr('name');
			else $var=$.cookie('newspaper') + "^" + $(this).attr('name');	
		}
		else {		
			$var=$(this).attr('name');
			$var=$.cookie('newspaper').replace("^" + $(this).attr('name'), "");		
		}
		$.cookie("newspaper", $var, { expires: 1000 });
	});
	
	
  });
  </script>
<? } ?>
<script language="javascript" type="text/javascript">
<!--
var win=null;
function NewWindow(mypage,myname,w,h,scroll,pos){
	//w=300;
if(pos=="center"){LeftPosition=(screen.width)?(screen.width-w)/2:100;TopPosition=(screen.height)?(screen.height-h)/2:100;}
else if((pos!="center" && pos!="random") || pos==null){LeftPosition=0;TopPosition=20}
settings='width='+w+',height='+h+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',location=no,directories=no,status=no,menubar=no,toolbar=no,resizable=no,modal=yes,alwaysRaised=yes';
//win=
//mypage="http://www.google.ca";

//settings="";
//alert(myname);
//myname="_blank";
win=window.open(mypage,myname,settings);
}
// -->
</script>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-3507936-10");
pageTracker._trackPageview();
} catch(err) {}</script>
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="1024" border="0" cellpadding="0" cellspacing="0" align="center">
	<tr><td colspan="3" align="center"><? $str=file_get_contents('http://www.informational.ca/Toolbar/index.php'); if($str != "We'll be back shortly") echo $str; ?></td></tr>
	<tr>
		<td>
			<img src="/images/newsstoriest4_01.gif" width="28" height="85" alt=""></td>
		<td background="/images/newsstoriest4_02.gif">
			<img src="/images/newsstoriest4_02.gif" width="970" height="85" alt=""></td>
		<td>
			<img src="/images/newsstoriest4_03.gif" width="26" height="85" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="/images/newsstoriest4_04.gif" width="28" height="9" alt=""></td>
		<td background="/images/newsstoriest4_05.gif" width="970">
			<img src="/images/newsstoriest4_05.gif" width="970" height="9" alt=""></td>
		<td width="26" height="9">
			<img src="/images/newsstoriest4_06.gif" width="26" height="9" alt=""></td>
	</tr>
	<tr>
		<td background="/images/newsstoriest4_07.gif" width="28">
			<img src="/images/newsstoriest4_07.gif" width="28" height="26" alt=""></td>
		<td width="970" height="26" bgcolor="#FFFFFF" class="header">
			&nbsp;&nbsp;&nbsp;
			<a href="/">Home</a> - 
			<?  
			if(isset($SectionName) && $SectionName=="News"){ ?><a href="/news.html" style="text-decoration:none;"><b>News</b></a><? } else { ?><a href="/news.html">News</a><? } ?>
			- 
			<? if(isset($SectionName) && $SectionName=="Provinces"){ ?><a href="/provinces.html" style="text-decoration:none;"><b>Provinces</b></a><? } else { ?><a href="/provinces.html">Provinces</a><? } ?>
			- 
			<? if(isset($SectionName) && $SectionName=="Newspapers"){ ?><a href="/newspapers.html" style="text-decoration:none;"><b>Newspapers</b></a><? } else { ?><a href="/newspapers.html">Newspapers</a><? } ?>
             
			<div style="float: right; valign: top;"><? if(isset($SectionName) && $SectionName=="MyNews"){ ?><a href="/mynews.html" style="text-decoration:none;"><b>My News</b></a><? } else { ?><a href="/mynews.html">My News</a><? } ?>&nbsp;&nbsp;&nbsp;</div></td>
		<td background="/images/newsstoriest4_09.gif" width="26">
			<img src="/images/newsstoriest4_09.gif" width="26" height="26" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="/images/newsstoriest4_10.gif" width="28" height="12" alt=""></td>
		<td background="/images/newsstoriest4_11.gif">
			<img src="/images/newsstoriest4_11.gif" width="970" height="12" alt=""></td>
		<td>
			<img src="/images/newsstoriest4_12.gif" width="26" height="12" alt=""></td>
	</tr>
	<tr>
		<td background="/images/newsstoriest4_13.gif" width="28" height="100%">&nbsp;
			</td>
		<td width="970" bgcolor="#FFFFFF">