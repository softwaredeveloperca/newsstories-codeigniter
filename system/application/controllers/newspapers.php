<?php

class Newspapers extends Controller {

	function Newspapers()
	{
		parent::Controller();	
	}
	function view($NewspaperName){
		$this->load->model('newspapermodel');
		$this->load->model('feedmodel');
		
		$NewspaperID=$this->newspapermodel->getID($NewspaperName);
		
		if($NewspaperID > 0){
			$data['NewspaperName']=$this->newspapermodel->NewspaperName;
			$data['Newspaper']=$this->newspapermodel->getNewspaper($NewspaperID);
			
			$data['Feeds']=$this->feedmodel->getFeeds(0, 0, 0, $NewspaperID);
		}
		
		$adata['Title']="" . stripslashes($data['NewspaperName']) . " details";
		$adata['Description']="Find all news by " . stripslashes($data['NewspaperName']) . " or select news by topics from " . stripslashes($data['NewspaperName']) . ".";
		$data['DDescription']=$adata['Description'];
		
		$adata['SectionName']="Newspapers";
		
		$this->load->view('include/header', $adata);
		$this->load->view('newspaper/newspaper', $data);
		$this->load->view('include/footer');
	}
	function province($ProvinceName)
	{	
		$this->load->model('newspapermodel');
		$this->load->model('provincemodel');
		$this->load->model('regionmodel');
		
		$adata['SectionName']="Newspapers";
		$data['Regions'] = $this->regionmodel->getRegions();
		$data['URLName']="";
		$data['Provinces'] = $this->provincemodel->getProvinces();
		
		$ProvinceID=$this->provincemodel->getID($ProvinceName);
		$data['ProvinceName']=$this->provincemodel->ProvinceName;
		$data['Newspapers'] = $this->newspapermodel->getNewspapers($ProvinceID);
		$data['Name']=$this->provincemodel->ProvinceName;
		$data['RegionID']=0;
		$data['ProvinceID']=$ProvinceID;
		
		$adata['Title']="Newspapers from " . stripslashes($data['Name']);
		$adata['Description']="Find all of the newspapers from the province of " . stripslashes($data['Name']);
		$data['DDescription']=$adata['Description'];
		
		$this->load->view('include/header', $adata);
		$this->load->view('newspaper/main', $data);
		$this->load->view('include/footer');
	}
	function region($RegionName)
	{
		$adata['SectionName']="Newspapers";
		$this->load->model('newspapermodel');
		$this->load->model('regionmodel');
		$this->load->model('provincemodel');
		$data['Regions'] = $this->regionmodel->getRegions();
		$data['URLName']="";
		
		$data['Provinces'] = $this->provincemodel->getProvinces();
		
		$RegionID=$this->regionmodel->getID($RegionName);
		$data['RegionID']=$RegionID;
		$data['Name']=$this->regionmodel->RegionName;
		$data['Newspapers'] = $this->newspapermodel->getNewspapers(0, $RegionID);
		$data['ProvinceID']=0;
		
		$adata['Title']="Newspapers from " . stripslashes($data['Name']);
		$adata['Description']="Find all of the newspapers from the region of " . stripslashes($data['Name']);
		$data['DDescription']=$adata['Description'];
		
		$this->load->view('include/header', $adata);
		$this->load->view('newspaper/main', $data);
		$this->load->view('include/footer');
	}
	function index()
	{
		$adata['SectionName']="Newspapers";
		$this->load->model('newspapermodel');
		$this->load->model('provincemodel');
		$this->load->model('regionmodel');
		$data['Regions'] = $this->regionmodel->getRegions();
		$data['Newspapers'] = $this->newspapermodel->getNewspapers();
		$data['Provinces'] = $this->provincemodel->getProvinces();
		
		$data['ProvinceID']=0;
		$data['RegionID']=0;
		$data['Name']="";
		
		$adata['Title']="Canadian Newspapers";
		$adata['Description']="Select all of the news by Canadian newspaper.  Select a Province or Region to narrow down your selection.";
		$data['DDescription']=$adata['Description'];
		$adata['URLName']="";
		
		$this->load->view('include/header', $adata);
		$this->load->view('newspaper/main', $data);
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