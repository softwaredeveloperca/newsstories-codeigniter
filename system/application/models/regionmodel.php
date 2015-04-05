<?
class Regionmodel extends Model {
	public $RegionName="";
	function Regionmodel()
	{
		parent::Model();
		$this->load->database();
	}
	function getID($RegionName){
		$RegionName=str_replace("-", " ", $RegionName);
		$sql="SELECT RegionID, Name FROM Regions WHERE LOWER(Name) LIKE " . $this->db->escape($RegionName);
		$query=$this->db->query($sql);
		$queryresult=$query->row();
		$this->RegionName=$queryresult->Name;
		return $queryresult->RegionID;
	}
	function getRegions()
	{
		$sql="SELECT * FROM Regions WHERE RegionID > 0";
		$query=$this->db->query($sql);
		$queryresult=$query->result();
		return $queryresult;
	}
}
?>