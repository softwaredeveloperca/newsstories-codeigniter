<?
class Boardcatmodel extends Model {
	function Boardcatmodel()
	{
		parent::Model();
		$this->load->database();
	}
	function getBoardID(){
		//print "fgfg";
		//exit();
		//$conn=mysql_connect("robertdevenyi.com", "clf55_rob", "babyu5") or die(mysql_error());
		$sql="select * from clf55_NewsStories.NewsExportFeeds WHERE SubCategoryID='" . $this->FeedID . "'";
		//print $sql;
		$re=mysql_query($sql, $conn) or die(mysql_error());
		$rw=mysql_fetch_object($re);
		//var_dump($rw);
		return $rw->BoardID;
	}
}
?>