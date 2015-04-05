<?php

class Newspapers extends Controller {

	function Newspapers()
	{
		parent::Controller();	
	}
	function province($ProvinceName)
	{
		$this->load->model('newspapermodel');
		$this->load->model('provincemodel');
		$ProvinceID=$this->provincemodel->getID($ProvinceName);
		if($ProvinceID > 0){
			$data['ProvinceName']=$ProvinceName;
			$data['Newspapers'] = $this->newspapermodel->getNewspapers($ProvinceID);
			$this->load->view('include/header');
			$this->load->view('main');
			$this->load->view('include/footer');
		}
		else
		{
			$this->invalid();	
		}
	}
	function view($NewspaperName){
		$this->load->model('newspapermodel');
		
		$NewspaperID=$this->newspapermodel->getID($NewspaperName);
		if($NewspaperID > 0){
			$data['NewspaperName'] = $NewspaperName;
		}
		else 
		{
			$this->invalid();	
		}
	}
	function region($RegionName)
	{
		$this->load->model('newspapermodel');
		$this->load->model('regionmodel');
		$RegionID=$this->regionmodel->getID($RegionName);
		$data['Newspapers'] = $this->newspapernmodel->getNewspapers(0, $RegionID);
		$this->load->view('include/header');
		$this->load->view('main', $data);
		$this->load->view('include/footer');
	}
	function index()
	{
		$this->load->model('newspapermodel');
		$this->load->model('provincemodel');
		$this->load->model('regionmodel');
		$data['Regions'] = $this->regionmodel->getRegions();
		$data['Newspapers'] = $this->newspapermodel->getNewspapers();
		$data['Provinces'] = $this->provincemodel->getProvinces();
		
		$this->load->view('include/header');
		$this->load->view('newspapers/main', $data);
		$this->load->view('include/footer');
	}
	function invalid()
	{
		$this->load->helper('url');
		redirect('/newspapers.html', 'refresh');
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>