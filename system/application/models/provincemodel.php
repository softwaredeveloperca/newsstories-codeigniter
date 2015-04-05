<?
class Provincemodel extends Model {
	public $ProvinceName="";
	function Provincemodel()
	{
		parent::Model();
		$this->load->database();
	}
	function getID($ProvinceName){
		$ProvinceName=str_replace("-", " ", $ProvinceName);
		$sql="SELECT ProvinceID, Name FROM Provinces WHERE LOWER(Name) LIKE " . $this->db->escape($ProvinceName);
		//print $sql . "<br>";
		$query=$this->db->query($sql);
		$queryresult=$query->row();
		//print $queryresult->ProvinceID;
		$this->ProvinceName=$queryresult->Name;
		return $queryresult->ProvinceID;
	}
	function getRegions($ProvinceID){
		$sql="SELECT * FROM Regions WHERE Province = " . $this->db->escape($ProvinceID);
		$query=$this->db->query($sql);
		$queryresult=$query->result();
		return $queryresult;
	}
	function getProvinces()
	{
		$sql="SELECT * FROM Provinces WHERE ProvinceID > 0 order by Name ASC";
		$query=$this->db->query($sql);
		$queryresult=$query->result();
		return $queryresult;
	}
}
?>