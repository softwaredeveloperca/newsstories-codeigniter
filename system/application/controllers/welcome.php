<?php
class Welcome extends Controller {

	function Welcome()
	{
		parent::Controller();	
	}
	function index()
	{
		$this->load->model('newsmodel');
		$this->load->model('regionmodel');
		$this->load->model('provincemodel');
		$this->load->model('newspapermodel');
		$this->load->model('categorymodel');
		
		$data['News'] = $this->newsmodel->getNews();
		$data['Regions'] = $this->regionmodel->getRegions();
		$data['Provinces'] = $this->provincemodel->getProvinces();
		$data['Topics'] = $this->categorymodel->getCategories();
		$data['Newspapers'] = $this->newspapermodel->getNewspapers(0, 0, 0, 1);
		$data['NewspapersAll'] = $this->newspapermodel->getNewspapersWithFeeds();
		$adata['SectionName'] = "Home";
		
		$adata['Description']="Find the latest Canadian News from all newspapers in the country.  You can easily select news by province, region, topic, newspaper and specific newspaper feeds.  Find out what news is going on around the country.  The best place to get all Canadian news in one place.";
		$this->load->view('include/header', $adata);
		$this->load->view('main', $data);
		$this->load->view('include/footer');
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */