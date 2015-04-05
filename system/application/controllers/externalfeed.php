<?php

class ExternalFeed extends Controller {
	
	function ExternalFeed()
	{
		parent::Controller();	
		$this->load->model('newspapermodel');
		$this->load->model('newsmodel');
		$this->load->model('provincemodel');
		$this->load->model('regionmodel');
		$this->load->model('categorymodel');
	}
	function index($CategoryID)
	{
		//$adata['SectionName']="MyNews";
	
		
		//$this->newmodel->getResult($sql)
		$data['News'] = $this->newsmodel->getNews(0, 0, 0, 0, 0, 0, "CurrentDate", 25, $CategoryID);
	
		
		header("Content-type: text/x-json");    
		print json_encode($data['News']);
		
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