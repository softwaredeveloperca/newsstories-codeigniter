<?php

class Provinces extends Controller {

	function Provinces()
	{
		parent::Controller();	
	}
	function view($ProvinceID)
	{
		$this->load->model('provincemodel');
		
		$data['Regions'] = $this->provincemodel->getRegions($ProvinceID);
		$this->load->view('include/header');
		$this->load->view('province/province.php', $data);
		$this->load->view('include/footer');
	}
	function index()
	{
		$this->load->model('provincemodel');
		$this->load->model('regionmodel');
		
		$data['Provinces'] = $this->provincemodel->getProvinces();
		$adata['SectionName'] = "Provinces";
		
		$adata['headermap'] = 1;
		$adata['Title']="Provinces";
		$adata['Description']="Get all of the lastest news from each individual province you want.  Select a province from the map or list for the latest news from all newspapers.";
		
		$this->load->view('include/header', $adata);
		$this->load->view('province/main', $data);
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
