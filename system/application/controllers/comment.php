<?php

class Comment extends Controller {
	function Comment()
	{
		parent::Controller();	
		$this->load->model('newsmodel');
	}
	function View($NewsID)
	{
		$data['NewsID']=$NewsID;
		$data['Comments'] = $this->newsmodel->getComments($NewsID);
		
		
		if(isset($_POST['AddComment']) && $_POST['AddComment'] == 1){
			$data['ReturnMessage']=$this->newsmodel->addComment($NewsID, $_POST['Comment'], $_SERVER['REMOTE_ADDR']); 	
		}
		$data['Comments']=$this->newsmodel->getComments($NewsID);
		
		$this->load->view('news/comment', $data);
	}
}