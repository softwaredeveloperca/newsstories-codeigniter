<?php

class News extends Controller {
	private $newsdata;
	function News()
	{
		parent::Controller();	
	}
	function getSubTopic($SubTopic, $SubName)
	{
		
	}
	function firstSet($Type="")
	{
		$this->load->model('provincemodel');
		$this->load->model('regionmodel');
		$this->load->model('categorymodel');
		$this->load->model('newsmodel');
        $this->load->model('newspapermodel');
		$this->load->library('pagination');
		
		
		$this->newsdata['PageTopic']=$Type;
		
		$this->newsdata['RegionID']=0;
		$this->newsdata['LangID']=0;
		$this->newsdata['ProvinceID']=0;
		$this->newsdata['CategoryID']=0;
		$this->newsdata['CategoryName']=0;
		$this->newsdata['Name']="";
		$this->newsdata['URLName']="";
		$this->newsdata['SubName']="";
		$this->newsdata['SubURLName']="";
		$this->newsdata['SubSubName']="";
		$this->newsdata['SubSubURLName']="";
		$this->newsdata['PageURLName']="";
		
		
		$this->newsdata['Regions'] = $this->regionmodel->getRegions();
		$this->newsdata['Provinces'] = $this->provincemodel->getProvinces();
		$this->newsdata['Topics'] = $this->categorymodel->getCategories();
		return $this->newsdata;
	}
	function setsub($SubTopic, $SubName, $SubType=0){
		if($SubTopic == "province"){
			$this->newsdata['ProvinceID']=$this->provincemodel->getID($SubName);
			$this->newsdata['ProvinceName']=$this->provincemodel->ProvinceName;
			$this->newsdata['RegionID'] = 0;
			$this->newsdata['RegionName'] = "";
		}
		elseif($SubTopic == "region"){
			$this->newsdata['RegionID']=$this->regionmodel->getID($SubName);
			$this->newsdata['RegionName']=$this->regionmodel->RegionName;
			$this->newsdata['ProvinceID'] = 0;
			$this->newsdata['ProvinceName'] = "";
		}
		elseif($SubTopic == "lang"){
			//$this->newsdata['LangID']=$this->langmodel->getID($SubName);
		}
		elseif($SubTopic == "topic"){
			$this->newsdata['CategoryID']=$this->categorymodel->getID($SubName);
			$this->newsdata['CategoryName']=$this->categorymodel->CategoryName;
		}
		if($SubType == 0){
			
			$this->newsdata['SubURLName'].=$SubTopic . "/" . $SubName; 
		}
		elseif($SubType == 1)
		{
			//$this->newsdata['SubSubURLName'].=$SubTopic . "/" . $SubName; 
		}
	}
	function topic($CategoryName, $SubTopic="", $SubName="", $SubSubTopic="", $SubSubName="", $SubTopicID=0)
	{
		$this->firstSet("topic");
		$this->newsdata['CategoryID']=$this->categorymodel->getID($CategoryName);
		$this->newsdata['CategoryName'] = $this->categorymodel->CategoryName;
		if(is_numeric($SubTopic)){
			$SubTopicID=$SubTopic;
		}
		if($SubTopic != "") $this->setSub($SubTopic, $SubName);
		if($SubSubTopic != "") $this->setSub($SubSubTopic, $SubSubName, 1);
		
		
		$data=$this->newsdata;
		$data['Name']=$this->newsdata['CategoryName'];
		$data['URLName']="topic/" . str_replace(" ", "-", strtolower($data['Name'])); 
	
		if(!isset($PageNumber)){
			$PageNumber=0;
		}
		
		$data['News'] = $this->newsmodel->getNews($data['ProvinceID'], $data['RegionID'], $data['LangID'], $data['CategoryID'], 0, 0, "CurrentDate", 25, $PageNumber, $SubTopicID);
		$data['Newspapers']=$this->newspapermodel->getBy($data['ProvinceID'], $data['RegionID'], $data['LangID'], $data['CategoryID']);
		
		if($PageNumber > 0){
			$adata['Title'] .= " - Page " . (ceil($PageNumber/25) + 1);
		}
		
		
		
		$adata['SectionName'] = "News";
		$adata['Title']=stripslashes($this->newsdata['CategoryName']);
		$adata['Description']="Find the latest news for the topic " . stripslashes($this->newsdata['CategoryName']);
		
		if($SubTopic == "province"){
			$adata['Title'].=" - " . $this->newsdata['ProvinceName'];
			$adata['Description'].=" and for the province of " . $this->newsdata['ProvinceName'];
		}
		elseif($SubTopic == "region"){
			$adata['Title'].=" - " . $this->newsdata['RegionName'];
			$adata['Description'].=" and for the region of " . $this->newsdata['RegionName'];
		}
		
		$data['DDescription']=$adata['Description'];
		
		
		if($SubTopic !="" && $SubName != ""){
			$TheUrl=$data['URLName'] . "/" . $SubName . "/" . $SubSubName;
		}
		else {
			
			$TheUrl=$data['URLName'];
		}
	
		
		//print "bbb" . $SubSubTopic;
		$config['base_url'] = 'http://www.newsstories.ca/news/' . $TheUrl . "";
		$config['total_rows'] = '1000';
		$config['per_page'] = '25';
	

		$this->pagination->initialize($config); 	
		//$data['ass']=1;
		
		
		$this->load->view('include/header', $adata);
		$this->load->view('news/main', $data);
		$this->load->view('include/footer');
	}
	function province($ProvinceName, $SubTopicID=0, $SubName="", $SubSubTopic="", $SubSubName="")
	{
		
		$SubTopic="";
		$this->firstSet("province");
		$this->newsdata['ProvinceID']=$this->provincemodel->getID($ProvinceName);
		$this->newsdata['ProvinceName'] = $this->provincemodel->ProvinceName;
		if($SubTopic != "") $this->setSub($SubTopic, $SubName);
		if($SubSubTopic != "") $this->setSub($SubSubTopic, $SubSubName, 1);
		
		$data=$this->newsdata;
		$data['Name']=$this->newsdata['ProvinceName'];
		$data['SubURLName']="province/" . str_replace(" ", "-", strtolower($data['Name'])); 
		$data['URLName']="";
		
		$data['News'] = $this->newsmodel->getNews($data['ProvinceID'], $data['RegionID'], $data['LangID'], $data['CategoryID'], 0, 0, "CurrentDate", 25, 0, $SubTopicID);
		$data['Newspapers']=$this->newspapermodel->getBy($data['ProvinceID'], $data['RegionID'], $data['LangID'], $data['CategoryID']);
        
		$adata['SectionName'] = "News";
		
		$adata['Title']=stripslashes($data['ProvinceName']);
		$adata['Description']="Find the latest news for the province " . stripslashes($data['ProvinceName']);
		
		$data['DDescription']=$adata['Description'];
		
		$config['base_url'] = 'http://www.newsstories.ca/news/' . $data['SubURLName'] . "";
		$config['total_rows'] = '1000';
		$config['per_page'] = '25';
	

		$this->pagination->initialize($config); 	
		$data['ass']=1;
		
		
		$this->load->view('include/header', $adata);
		$this->load->view('news/main', $data);
		$this->load->view('include/footer');	
	}
	function region($RegionName, $SubTopicID=0, $SubName="", $SubSubTopic="", $SubSubName="")
	{
		$SubTopic="";
		$this->firstSet("region");
		$this->newsdata['RegionID']=$this->regionmodel->getID($RegionName);
		$this->newsdata['RegionName'] = $this->regionmodel->RegionName;
		//if($SubTopic != "") $this->setSub($SubTopic, $SubName);
		//if($SubSubTopic != "") $this->setSub($SubSubTopic, $SubSubName, 1);
		
		$data=$this->newsdata;
		$data['Name']=$this->newsdata['RegionName'];
		
		
		$data['SubURLName']="region/" . str_replace(" ", "-", strtolower($data['Name'])); 
	
		
		$data['News'] = $this->newsmodel->getNews($data['ProvinceID'], $data['RegionID'], $data['LangID'], $data['CategoryID'], 0, 0, "CurrentDate", 25, 0, $SubTopicID);
		$data['Newspapers']=$this->newspapermodel->getBy($data['ProvinceID'], $data['RegionID'], $data['LangID'], $data['CategoryID']);
		
		
		$adata['SectionName'] = "News";
		
		$adata['Title']=stripslashes($data['RegionName']);
		$adata['Description']="Find the latest news for the region " . stripslashes($data['RegionName']);
		
		$data['DDescription']=$adata['Description'];
		
	
		$config['base_url'] = 'http://www.newsstories.ca/news/' . $data['SubURLName'] . "";
		$config['total_rows'] = '1000';
		$config['per_page'] = '25';
	

		$this->pagination->initialize($config); 	
		$data['ass']=1;
		
		
		$this->load->view('include/header', $adata);
		$this->load->view('news/main', $data);
		$this->load->view('include/footer');
	}
	function newspaper($NewspaperName, $FeedName="")
	{
		$this->load->model('newspapermodel');
		$this->load->model('newsmodel');
		$this->load->model('feedmodel');
		$this->load->library('pagination');
		
		$CurrentPage=0;
		$data['FeedID']=0;
		if(is_numeric($FeedName)){
			$CurrentPage=$FeedName;
		}
		
		$data['NewspaperID']=$this->newspapermodel->getID($NewspaperName);
		$data['NewspaperName'] = $this->newspapermodel->NewspaperName;
		
		$adata['Title'] = "" . stripslashes($data['NewspaperName']);
		$adata['Description'] = "Find the latest news stories from " . stripslashes($data['NewspaperName']);
		
		
		
		if($FeedName != "" && !is_numeric($FeedName)){
			$data['FeedID']=$this->feedmodel->getID($data['NewspaperID'], $FeedName);
			$data['FeedName'] = $this->feedmodel->FeedName;
			$adata['Title'].=" - " . stripslashes($data['FeedName']);
			$adata['Description'].=" on the topic " . stripslashes($data['FeedName']) . ".";
		}
		
		$data['Feeds'] = $this->feedmodel->getFeeds(0, 0, 0, $data['NewspaperID']);
		
		$data['News'] = $this->newsmodel->getNews(0, 0, 0, 0, $data['NewspaperID'], $data['FeedID'], "CurrentDate", 25, 0, $CurrentPage);
		$adata['SectionName'] = "News";
		
		$data['DDescription']=$adata['Description'];
		
		$TheUrl=$NewspaperName;
		if($FeedName != "" && !is_numeric($FeedName)){
			$TheUrl.="/" . $FeedName;
		}
		
		$config['base_url'] = 'http://www.newsstories.ca/news/newspaper/' . $TheUrl . "";
		$config['total_rows'] = '1000';
		$config['per_page'] = '25';
	

		$this->pagination->initialize($config); 	
		$data['ass']=1;
			
		$this->load->view('include/header', $adata);
		$this->load->view('news/newspaper', $data);
		$this->load->view('include/footer');
	}
	function reader($Url){
		$adata['dffd']="";
		$data['dfdf']="";
		$this->load->view('include/header', $adata);
		$this->load->view('news/reader', $data);
		$this->load->view('include/footer');
	}
	function index($PageNumber=0)
	{
		$this->firstSet("");
		
		
		$data=$this->newsdata;
		
		$data['News'] = $this->newsmodel->getNews(0, 0, 0, 0, 0, 0, "CurrentDate", 55, 0, $PageNumber);
		$adata['SectionName'] = "News";
		$adata['Title'] = "Canadian News";
		if($PageNumber > 0){
			$adata['Title'] .= " - Page " . (ceil($PageNumber/25) + 1);
		}
		$adata['Description'] = "Find the latest Canadian news stories from across the country.  Use the menus to filter based on topic, province or  region.";	
		$data['DDescription']=$adata['Description'];
		
		$config['base_url'] = 'http://www.newsstories.ca/news/index';
		$config['total_rows'] = '20000';
		$config['per_page'] = '25';

		$this->pagination->initialize($config); 	
		$data['ass']=1;
		
		
		$this->load->view('include/header', $adata);
		$this->load->view('news/main', $data);
		$this->load->view('include/footer');
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>