<?
class Newspapermodel extends Model {
	public $NewspaperCount=0;
	public $NewspaperName="";
	
	function Newspapermodel()
	{
		parent::Model();
		$this->load->database();
	}
	function getResult($sql){
			$query=$this->db->query($sql);
			$this->NewspaperCount=$query->num_rows();
			$queryresult=$query->result();
			return $queryresult;
	}
	function getNewspapersWithFeeds(){
		$sql="SELECT a.Name FROM NewsSources a, Feeds f WHERE a.NewsSourceID=f.SourceID GROUP BY a.NewsSourceID ORDER BY Name";
		
		return $this->getResult($sql);
	}
	function getNewspapers($ProvinceID=0, $RegionID=0, $LangID=0, $IsNational=0){
		$sqladd=" WHERE 1";
		if($ProvinceID > 0){
			$sqladd.=" AND ProvinceID = " . $this->db->escape($ProvinceID);
		}
		if($RegionID > 0){
			$sqladd.=" AND RegionID = " . $this->db->escape($RegionID);
		}
		if($LangID > 0){
			$sqladd.=" AND LangID = " . $this->db->escape($LangID);
		}
		if($IsNational > 0){
			$sqladd.=" AND National = 1";
		}
		$sql="SELECT * FROM NewsSources" . $sqladd . " ORDER BY Name";

		return $this->getResult($sql);
	}
	function getNewspaper($NewspaperID){
				
		$sql="SELECT *, NewsSources.Name as NewsName, Lang.Name as LangName, Provinces.Name as ProvinceName, Regions.Name as RegionName FROM NewsSources, Provinces, Regions, Lang WHERE Lang.LangID=NewsSources.LangID AND Regions.RegionID=NewsSources.RegionID AND Provinces.ProvinceID=NewsSources.ProvinceID AND NewsSources.NewsSourceID = " . $this->db->escape($NewspaperID);

		return $this->getResult($sql);
	}
	function getID($NewsName, $dontd=0){
		if($dontd==0){
			$NewsName=urldecode($NewsName);
		}
		$NewsName=str_replace("-", " ", $NewsName);
		$sql="SELECT NewsSourceID, Name FROM NewsSources WHERE Name LIKE " . $this->db->escape($NewsName);
		$query=$this->db->query($sql);
		$queryresult=$query->row();
		if(isset($queryresult->Name)){
			$this->NewspaperName=$queryresult->Name;
		}
		if(isset($queryresult->NewsSourceID)){
			return $queryresult->NewsSourceID;
		}
		return "";
	}
    function getBy($ProvinceID=0, $RegionID=0, $TopicID=0)
    {
        $addsql="";
        if($ProvinceID > 0){
            $addsql=" AND ProvinceID = '" . $ProvinceID . "'"; 
        }
        if($RegionID > 0){
            $addsql.=" AND RegionID = '" . $RegionID . "'"; 
        }
        $sql="select NewsSourceID, NewsSources.Name as Name from NewsSources WHERE 1 $addsql ORDER BY Name ASC";
        
        if($TopicID > 0){
            $addsql="select NewsSourceID, NewsSources.Name as Name from NewsSources, Feeds WHERE 1 $addsql and Feeds.CategoryID='$CategoryID' AND NewsSources.NewsSourceID=Feeds.SourceID GROUP BY NewsSourceID, NewsSources.Name ORDER BY NewsSources.Name"; 
        }
        //print $sql;
        return $this->getResult($sql);
        
    }
}