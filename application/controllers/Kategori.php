<?php
class Kategori extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('Model_kategori');
        isLoginSessionExpired();
    }
    
    function index()
    {
        $data['record']     =    $this->Model_kategori->tampil_data();
        $this->template->load('template','admin/kategori/view_category',$data);
    }

    function viewAddCategory()
    {
        $this->template->load('template','admin/kategori/input_category');
    }
    
    function addCategory()
    {
        $categoryname    = $this->input->post('categoryname');
        $description = $this->input->post('description');
        $dataCategory    = array('Category_name'=>$categoryname,'Description'=>$description);
        $insert = $this->Model_kategori->M_addCategory($dataCategory);
        if($insert)
        {
            $this->session->set_flashdata('Status','Input Succes');
            redirect('Kategori/viewAddCategory');
        }
        else
        {
            $this->session->set_flashdata('Status','Input Failed');
            redirect('Kategori/viewAddCategory');
        }
    }
    
    function edit()
    {
        if (ceksession()){
        if(isset($_POST['submit'])){
            // proses kategori
            $this->Model_kategori->edit();
            redirect('kategori');
        }
        else{
            $id=  $this->uri->segment(3);
            $data['record']=  $this->Model_kategori->get_one($id)->row();
            //print_r($data['record']->id_kategori);
            //$this->load->view('kategori/form_edit',$data);
            $this->template->load('template','admin/kategori/edit_kategori',$data);
        }
    }
    }
    
    
    function delete()
    {
        if (ceksession()){
        $id=  $this->uri->segment(3);
        $this->Model_kategori->delete($id);
        redirect('kategori');
        }
    }
}