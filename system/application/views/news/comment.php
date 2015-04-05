<a href="" onClick="window.close();">Close</a>
<form action="" method="post">
<input type="hidden" name="AddComment" value="1">
<h3>My View Point</h3>
<textarea name="Comment" rows="5" cols="50"></textarea><br>
<input type="submit" name="Add" value="Add My Comment">
</form>
<hr>
<?php 
if(isset($Comments)){ 
	foreach($Comments as $key => $value){
		?><div id="comment-<?php echo $value->CommentID; ?>" style="padding: 5px; border: 1px solid #000; text-overflow: none; height: 100px""><?
		$TheComment=strip_tags(stripslashes($value->Comment));
		if(strlen($TheComment) > 255){ 
			$LongComment=$TheComment;
			$TheComment=substr($TheComment, 0, 255) . ' <a href="" target="_self" onClick="document.getElementById(\'comment-' . $value->CommentID . '\').style.overflow = \'scroll\'; document.getElementById(\'comment-' . $value->CommentID . '\').style.background = \'#999999\'; document.getElementById(\'comment-' . $value->CommentID . '\').style.height = \'250px\'; return false;">... more ....</a><br><br>' . substr($LongComment, 255, strlen($LongComment) - 255);
		}
		 echo $TheComment; ?></div><?
	}
}
?>
<br>
<a href="" onClick="window.close();">Close</a>