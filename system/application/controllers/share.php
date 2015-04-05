<?php

class Share extends Controller {
	function Comment()
	{
		parent::Controller();	
		$this->load->model('sharemodel');
		$this->load->model('newsmodel');
	}
	function Url($NewsID)
	{
		
		$data['NewsID']=$NewsID;
		$data['bgcolor']="#FFFFFF";
		$newsrecord=$this->newsmodel->getNewsItem($NewsID);
		if(isset($newsrecord->NewsID)){
			$data['title'] = $newsrecord->Title;
			$data['url'] = $this->sharemodel->getURL($newsrecord->Url);
		}
		
		$this->load->view('news/share', $data);
	}
}