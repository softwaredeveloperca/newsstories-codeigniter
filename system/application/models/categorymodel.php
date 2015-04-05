<?
class Categorymodel extends Model {
	public $CategoryName="";
	function Categorymodel()
	{
		parent::Model();
		$this->load->database();
	}
	function getID($CategoryName){
		$CategoryName=str_replace("-", " ", $CategoryName);
		$sql="SELECT CategoryID, Name FROM Categories WHERE LOWER(Name) LIKE " . $this->db->escape($CategoryName);
		$query=$this->db->query($sql);
		$queryresult=$query->row();
		$this->CategoryName=$queryresult->Name;
		return $queryresult->CategoryID;
	}
	function getCategories()
	{
		$sql="SELECT * FROM Categories WHERE CategoryID > 0";
		$query=$this->db->query($sql);
		$queryresult=$query->result();
		return $queryresult;
	}
}
?>