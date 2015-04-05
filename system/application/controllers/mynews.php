<?php

class MyNews extends Controller {
	private $ProvinceArrID;
	private $RegionArrID;
	private $LangArrID;
	private $CategoryArrID;
	private $NewspaperArrID;
	
	private $ProvinceArr;
	private $RegionArr;
	private $LangArr;
	private $CategoryArr;
	private $NewspaperArr;
	private $FeedArr;
	function MyNews()
	{
		parent::Controller();	
		$this->load->model('newspapermodel');
		$this->load->model('newsmodel');
		$this->load->model('provincemodel');
		$this->load->model('regionmodel');
		$this->load->model('categorymodel');
		
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
		$this->load->model('categorymodel');
		
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
	function func($value) { 
			return str_replace("-", " ", strtolower($value));
		}
	function getCookieData(){	
		$arroffields=array("Province", "Region", "Category", "Newspaper");
		foreach($arroffields as $value){
			if(isset($_COOKIE[strtolower($value)]) && $_COOKIE[strtolower($value)] != "")
			{
				$anarray=explode("^", $_COOKIE[strtolower($value)]);
				$this->{$value . "Arr"}= $this->removeBlanksArray($anarray);	
			
				$newarray[]="";
				foreach($anarray as $value2){
					if($value == "Newspaper"){
						$newarray[]=$this->{strtolower($value) . 'model'}->getID($value2, 1);
					}
					else {
						$newarray[]=$this->{strtolower($value) . 'model'}->getID($value2);
					}
				}
				unset($newarray['']);
				$this->{$value . "ArrID"}= $newarray;
				unset($newarray);
			}
		}		
	}
	function removeBlanksArray($AnArray){
		foreach ($AnArray as $key => $value) {
      		if (is_null($value) || $value=="") {
        	unset($AnArray[$key]);
     		 }
		}
		return $AnArray;
	}
	function Personal ()
	{
		$adata['SectionName']="MyNews";

		$data['ss']="";
		$data['LangID']=0;
		
		$this->load->model('newspapermodel');
		$this->load->model('newsmodel');
		$this->load->model('provincemodel');
		$this->load->model('regionmodel');
		$this->load->model('categorymodel');
		
		$this->getCookieData();
		unset($this->ProvinceArr['']);
		$data['Provinces']=$this->ProvinceArr;
		$data['Categories']=$this->CategoryArr;
		$data['Regions']=$this->RegionArr;
		$data['Newspapers']=$this->NewspaperArr;
		
		$adata['Title']="Personal News Stream";
		$adata['Description']="Here is your personalized news stream.  Get all of the latest new stories from every available canadian news source.";
		
		
		$data['News'] = $this->newsmodel->getNews($this->ProvinceArrID, $this->RegionArrID, $data['LangID'], $this->CategoryArrID, $this->NewspaperArrID);	
		
		$this->load->view('include/header', $adata);
		$this->load->view('mynews/personal', $data);
	
		$this->load->view('include/footer');
	}
	function index()
	{
		$adata['SectionName']="MyNews";
		
		$this->load->model('newspapermodel');
		$this->load->model('newsmodel');
		$this->load->model('provincemodel');
		$this->load->model('regionmodel');
		$this->load->model('categorymodel');
		
		
		$data['Categories'] = $this->categorymodel->getCategories();
		$data['Regions'] = $this->regionmodel->getRegions();
		$data['Newspapers'] = $this->newspapermodel->getNewspapers();
		$data['Provinces'] = $this->provincemodel->getProvinces();
		
		$data['ProvinceID']=0;
		$data['RegionID']=0;
		$data['Name']="";
		
		$this->getCookieData();
		$data['ProvincesArr']=$this->ProvinceArr;
		$data['CategoriesArr']=$this->CategoryArr;
		$data['RegionsArr']=$this->RegionArr;
		
		$adata['Title']="My News";
		$adata['Description']="Select the type of news you want to receive and create a personal stream of news.  Personalize your news experience.  Select what news you want to see by province, region, topic or newspaper.";
		$data['DDescription']=$adata['Description'];
		$adata['URLName']="";
		$adata['mycontent']=1;
		
		$this->load->view('include/header', $adata);
		$this->load->view('mynews/main', $data);
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