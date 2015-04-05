<?php

class Feeds extends Controller {

	function Feeds()
	{
		parent::Controller();	
	}
	function province($ProvinceName)
	{
		$this->load->model('feedmodel');
		$this->load->model('provincemodel');
		$ProvinceID=$this->provincemodel->getID($ProvinceName);
		if($ProvinceID > 0){
			$data['ProvinceName']=$ProvinceName;
			$data['Feeds'] = $this->feedmodel->getFeeds($ProvinceID);
			$this->load->view('include/header');
			$this->load->view('main');
			$this->load->view('include/footer');
		}
		else
		{
			$this->invalid();	
		}
	}
	function view($FeedName){
		$this->load->model('Feedmodel');
		
		$FeedID=$this->feedmodel->getID($FeedName);
		if($FeedID > 0){
			$data['FeedName'] = $FeedName;
		}
		else 
		{
			$this->invalid();	
		}
	}
	function region($RegionName)
	{
		$this->load->model('feedmodel');
		$this->load->model('regionmodel');
		$RegionID=$this->regionmodel->getID($RegionName);
		$data['Feeds'] = $this->feedmodel->getFeeds(0, $RegionID);
		$this->load->view('include/header');
		$this->load->view('main', $data);
		$this->load->view('include/footer');
	}
	function index()
	{
		$this->load->model('feedmodel');
		$this->load->model('provincemodel');
		$this->load->model('regionmodel');
		$data['Regions'] = $this->regionmodel->getRegions();
		$data['Feeds'] = $this->feedmodel->getFeeds();
		$data['Provinces'] = $this->provincemodel->getProvinces();
		
		$this->load->view('include/header');
		$this->load->view('feeds/main', $data);
		$this->load->view('include/footer');
	}
	function invalid()
	{
		$this->load->helper('url');
		redirect('/Feeds.html', 'refresh');
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>