<?
class Newspapers extends Model {
	public $NewspaperCount=0;
	function Newspapers()
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
	function getNewspapers($ProvinceID=0, $RegionID=0){
		$sqladd=" WHERE 1";
		if($ProvinceID > 0){
			$sqladd.=" AND ProvinceID = " . $this->db->escape($ProvinceID);
		}
		if($RegionID > 0){
			$sqladd.=" AND RegionID = " . $this->db->escape($RegionID);
		}
		$sql="SELECT * FROM NewsSources" . $sqladd;
		
		
		
		return $this->getResult($sql);
	}
}