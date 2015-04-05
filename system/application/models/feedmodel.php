<?
class Feedmodel extends Model {
	public $FeedCount=0;
	public $FeedName="";
	function Feedmodel()
	{
		parent::Model();
		$this->load->database();
	}
	function getResult($sql){
			$query=$this->db->query($sql);
			$this->FeedCount=$query->num_rows();
			$queryresult=$query->result();
			return $queryresult;
	}
	function getFeeds($ProvinceID=0, $RegionID=0, $LangID=0, $NewspaperID=0){
		$sqladd="";
		if($ProvinceID > 0){
			$sqladd.=" AND ProvinceID = " . $this->db->escape($ProvinceID);
		}
		if($RegionID > 0){
			$sqladd.=" AND RegionID = " . $this->db->escape($RegionID);
		}
		if($LangID > 0){
			$sqladd.=" AND LangID = " . $this->db->escape($LangID);
		}
       
		if($NewspaperID > 0){
			$sqladd.=" AND Feeds.SourceID = " . $this->db->escape($NewspaperID);
		}
		$sql="SELECT *, Feeds.Name as FeedName, NewsSources.Name as NewsName, Categories.Name as CatName FROM Feeds, NewsSources, Categories WHERE Categories.CategoryID=Feeds.CategoryID AND Feeds.SourceID=NewsSourceID AND IsLive=1" . $sqladd . " ORDER BY Feeds.Name ASC";
		//print $sql;

		return $this->getResult($sql);
	}
	function getID($NewspaperID, $FeedName){
		$FeedName=urldecode($FeedName);
		$FeedName=str_replace("-", " ", $FeedName);
		$sql="SELECT FeedID, Name FROM Feeds WHERE SourceID=" . $this->db->escape($NewspaperID) . " AND REPLACE(Name, '\'', '') LIKE " . $this->db->escape($FeedName);
		$query=$this->db->query($sql);
		$queryresult=$query->row();
		$this->FeedName=$queryresult->Name;
		return $queryresult->FeedID;
	}
}