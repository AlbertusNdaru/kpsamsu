<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carousel extends CI_Controller {
	function __construct() {
		parent::__construct();
        $this->load->model('Model_carousel');
	}

	function index()
    {     
        $data['record']     =    $this->Model_carousel->M_tampil_data();
        $this->template->load('template','admin/carousel/view_carousel',$data);
    }

    
    function viewAddCarousel()
    {
        $this->template->load('template','admin/Carousel/input_carousel');
    }

    function viewEditCarousel($id)
    {   
        $data['edit']= $this->Model_carousel->M_tampil_data_by_id($id);
        $this->template->load('template','admin/carousel/edit_carousel',$data);
    }

    function addCarousel()
    {
       $Title = $this->input->post('title');
       $Subtitle    = $this->input->post('subtitle');
       $Line1 = $this->input->post('line1');
       $Line2        = $this->input->post('line2');
       $Line3 = $this->input->post('line3');
       $Line4       = $this->input->post('line4');
       $Line5      = $this->input->post('line5');
       $Image      = $_FILES['image']['name'];
       $dataCarousel = array('Title'=>$Title,
                            'Subtitle'=>$Subtitle,
                            'Line1'=>$Line1,
                            'Line2'=>$Line2,
                            'Line3'=>$Line3,
                            'Line4'=>$Line4,
                            'Line5'=>$Line5,
                            'Image'=>$Image);
        $insert     = $this->Model_carousel->M_addCarousel($dataCarousel);
        $uploadImg  = $this->uploadImageCarousel();
        if($insert && $uploadImg)
        {
            $this->session->set_flashdata('Status','Input Succes');
            redirect('admin/carousel/viewAddCarousel');
        }
        else
        {
            $this->session->set_flashdata('Status','Input Failed');
            redirect('admin/carousel/viewAddCarousel');
        }
    }

    function editCarousel()
    {
        $Title      = $this->input->post('title');
        $Subtitle   = $this->input->post('subtitle');
        $Line1      = $this->input->post('line1');
        $Line2      = $this->input->post('line2');
        $Line3      = $this->input->post('line3');
        $Line4      = $this->input->post('line4');
        $Line5      = $this->input->post('line5');
        $Image      = $_FILES['image']['name'];
        $id         = $this->input->post('id');
        if($Image=="")
        {
            $dataCarousel = array('Title'=>$Title,
            'Subtitle'=>$Subtitle,
            'Line1'=>$Line1,
            'Line2'=>$Line2,
            'Line3'=>$Line3,
            'Line4'=>$Line4,
            'Line5'=>$Line5);
            $uploadImg=true;
        }
        else
        {
            $dataCarousel = array('Title'=>$Title,
            'Subtitle'=>$Subtitle,
            'Line1'=>$Line1,
            'Line2'=>$Line2,
            'Line3'=>$Line3,
            'Line4'=>$Line4,
            'Line5'=>$Line5,
            'Image'=>$Image);
             $this->Model_carousel->M_deleteimg($id);
             $uploadImg  = $this->uploadImageCarousel();
        }
        $edit=$this->Model_carousel->M_editCarousel($dataCarousel,$id);
        if($edit && $uploadImg)
        {
            $this->session->set_flashdata('Status','Edit Succes');
            redirect('admin/Carousel');
        }
        else
        {
            $this->session->set_flashdata('Status','Edit Failed');
            redirect('admin/Carousel');
        }
    }

    

    function deleteCarousel($id)
    {
        $delete=$this->Model_carousel->M_deleteCarousel($id);
        if($delete)
        {
            $this->session->set_flashdata('Status','Delete Succes');
            redirect('admin/Carousel');
        }
        else
        {
            $this->session->set_flashdata('Status','Delete Failed');
            redirect('admin/Carousel');
        }
    }

    public function uploadImageCarousel(){
		$config['upload_path']          = './assets/img_slide/';
		$config['allowed_types']        = '*';
		//$config['max_size']             = 100;
		//$config['max_width']            = 1024;
		//$config['max_height']           = 768;
 
		$this->load->library('upload', $config);
 
		if ( ! $this->upload->do_upload('image')){
			$error = array('error' => $this->upload->display_errors());
			return false;
		}else{
            $data = array('upload_data' => $this->upload->data());
           return true;
        }
    }

}  
