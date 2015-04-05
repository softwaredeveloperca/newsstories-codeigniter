<?
class Newsmodel extends Model {
	public $NewsCount=0;
	private $ProvinceID;
	private $RegionID;
	private $LangID;
	private $CategoryID;
	private $NewspaperID;
	private $FeedID;
	private $MultiArray=0;
	
	function Newsmodel()
	{
		parent::Model();
		$this->load->database();
	}
	function addComment($NewsID, $Comment, $IP){
		$ins=mysql_query("INSERT INTO Comments (NewsID, Comment, IP, TheDate) VALUES ('" . addslashes($NewsID) . "', '" . addslashes($Comment) . "', '" . addslashes($IP) . "', NOW())") or die(mysql_error());
		
		$upd=mysql_query("UPDATE News SET Comments=Comments+1 WHERE NewsID=" . $this->db->escape($NewsID)); 
	
	}
	function getComments($NewsID){
		$sql="SELECT * FROM Comments WHERE NewsID=" . $this->db->escape($NewsID) . " ORDER BY TheDate DESC";
		return $this->getResult($sql);
	}
	function getNewsItem($NewsID){
		$sql="SELECT * FROM News WHERE NewsID=" . $this->db->escape($NewsID);
		return $this->getResult($sql);
	}
	function getResult($sql){
			$query=$this->db->query($sql);
			$this->NewsCount=$query->num_rows();
			$queryresult=$query->result();
			return $queryresult;
	}
	function addSingleQuery($TableName, $TableField, $sqladd, $Special=""){
		
		if($Special != ""){ $TableFieldVar=$Special; }
		else { $TableFieldVar=$TableField; }
		return (" AND " . $TableName . "." . $TableField . " = " . $this->db->escape($this->{$TableFieldVar}));
	}
	function addArrayQuery($TableName, $TableField, $sqladd, $Special=""){
			
			//$tbname=str_replace("id", "", strtolower($TableField));
			
			//$ci =& get_instance();
			//$ci->load->model($tbname . 'model');
			//$ci->other_model->get_related(3); 
			
			//$this->load->model($tbname . 'model');
			//$data['News'] = $this->{$tbname.'model'}->getID(strtolower($this->db->escape($value));
			if($Special != ""){ $TableFieldVar=$Special; }
			else { $TableFieldVar=$TableField; }
			$sqladd="";
			$x=0;				
			foreach($this->{$TableFieldVar} as $value){	
				if($value != "" && $value > 0){
					if($x==0)
					{
						if($this->MultiArray == 0) $sqladd.=" AND ( (";
						else $sqladd.=" OR (";											 
					}
					else 
					{
						$sqladd.=" OR ";
					}	
					$sqladd.=$TableName . ". " . $TableField . " = " . $this->db->escape($value);
					$x++;
				}
			}
			$sqladd.=") ";
			$this->MultiArray++;
			//print $sqladd;
			//print "<hr>";
			return $sqladd;
	}
	function getNews($ProvinceID=0, $RegionID=0, $LangID=0, $CategoryID=0, $NewspaperID=0, $FeedID=0, $OrderBy="CurrentDate", $Limit=25, $SubCategoryID=0, $CurrentPage=0){
		$this->ProvinceID=$ProvinceID;
		$this->RegionID=$RegionID;
		$this->LangID=$LangID;
		$this->CategoryID=$CategoryID;
		$this->NewspaperID=$NewspaperID;
		$this->FeedID=$FeedID;
		$sqladd="";

		if(is_array($ProvinceID) && count($ProvinceID) > 0){
			
			$sqladd.=$this->addArrayQuery("Provinces", "ProvinceID", $sqladd);
		}
		elseif($ProvinceID > 0){
			$sqladd.=$this->addSingleQuery("Provinces", "ProvinceID", $sqladd);
		}
		
		if(is_array($RegionID) && count($RegionID) > 0){
			$sqladd.=$this->addArrayQuery("Regions", "RegionID", $sqladd);
		}
		elseif($RegionID > 0){
			$sqladd.=$this->addSingleQuery("Regions", "RegionID", $sqladd);
			//$sqladd.=" AND Regions.RegionID = " . $this->db->escape($RegionID);
		}
		
		
		if($LangID > 0){
			//$sqladd.=" AND Lang.LangID = " . $this->db->escape($LangID);
		}
		
		if(is_array($CategoryID) && count($CategoryID) > 0){
			$sqladd.=$this->addArrayQuery("Categories", "CategoryID", $sqladd);
		}
		elseif($CategoryID > 0){
			$sqladd.=$this->addSingleQuery("Categories", "CategoryID", $sqladd);
			//$sqladd.=" AND Categories.CategoryID = " . $this->db->escape($CategoryID);
		}
		
		
		if(is_array($NewspaperID) && count($NewspaperID) > 0){
			$sqladd.=$this->addArrayQuery("NewsSources", "NewsSourceID", $sqladd, "NewspaperID");
		}
		elseif($NewspaperID > 0){
			$sqladd.=$this->addSingleQuery("NewsSources", "NewsSourceID", $sqladd, "NewspaperID");
			//$sqladd.=" AND NewsSources.NewsSourceID = " . $this->db->escape($NewspaperID);
		}
		if($FeedID > 0){
			$sqladd.=$this->addSingleQuery("Feeds", "FeedID", $sqladd);
			//$sqladd.=" AND Feeds.FeedID = " . $this->db->escape($FeedID);
		}
		if($SubCategoryID > 0){
			$sqladd.=" AND Feeds.SubCategoryID='" . addslashes($SubCategoryID) . "' ";
			//$this->addSingleQuery("SubCategory", "", $sqladd);
		}
		
		if($this->MultiArray>0){
			$sqladd.=")";
		}
		//, Lang 
		//NewsSources.LangID=Lang.LangID AND
		//Lang.Name as LangName 
		$sql="SELECT *, NewsSources.Name as NewsName, Feeds.Name as FeedName, Categories.Name as CatName, Provinces.Name as ProvinceName, Regions.Name as RegionName FROM News, Feeds, NewsSources, Categories, Provinces, Regions WHERE Regions.RegionID=NewsSources.RegionID AND Provinces.ProvinceID=NewsSources.ProvinceID AND Categories.CategoryID=Feeds.CategoryID AND NewsSources.NewsSourceID=Feeds.SourceID AND Feeds.FeedID=News.FeedID" . $sqladd . " Order By $OrderBy DESC Limit $CurrentPage, $Limit";
		//print $sql;
		//exit();
		return ($this->getResult($sql));
	}
	function getExternalFeed($SubCategoryID){
		$sql="SELECT * FROM NewsExportFeeds FROM SubCategoryID=" . $this->db->escape($value);
		return getResult($sql);
		
	}
}