<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kategori extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('Model_kategori');
        $this->load->model('Model_penjualan_admin');
        isLoginSessionExpired();
    }
    
    function index()
    {
        if (ceksession())
        {
            $data['record']    = $this->Model_kategori->M_tampil_data();
            $data['transaksi'] = $this->Model_penjualan_admin->cekpenjualan();
            $this->template->load('template','admin/kategori/view_category',$data);
        }
        
    }

    function viewAddCategory()
    {
        if (ceksession())
        {
            $data['transaksi']  =    $this->Model_penjualan_admin->cekpenjualan();
            $this->template->load('template','admin/kategori/input_category',$data);
        }
    }

    function viewEditKategori($id)
    {   
        if (ceksession())
        {
            $data['record']    = $this->Model_kategori->M_tampil_data_by_id($id);
            $data['transaksi'] = $this->Model_penjualan_admin->cekpenjualan();
            $this->template->load('template','admin/Kategori/edit_category',$data);
        }
    }
    
    function addCategory()
    {
        if (ceksession())
        {
            $categoryname = $this->input->post('categoryname');
            $description  = $this->input->post('description');
            $dataCategory = array('Category_name' => $categoryname,'Description' => $description);
            $insert = $this->Model_kategori->M_addCategory($dataCategory);
            if($insert)
            {
                $this->session->set_flashdata('Status','Input Succes');
                redirect('admin/Kategori/viewAddCategory');
            }
            else
            {
                $this->session->set_flashdata('Status','Input Failed');
                redirect('admin/Kategori/viewAddCategory');
            }
        }
    }

    function editCategory()
    {
        if (ceksession())
        {
            $categoryname = $this->input->post('categoryname');
            $description  = $this->input->post('description');
            $update_at    = get_current_date();
            $id           = $this->input->post('id');
            $dataEdit= array('Category_name'=>$categoryname,
                             'Description'=>$description,
                             'Update_at'=>$update_at);
            $edit=$this->Model_kategori->M_editCategory($dataEdit,$id);
            if($edit)
            {
                $this->session->set_flashdata('Status','Edit Succes');
                redirect('admin/Kategori');
            }
            else
            {
                $this->session->set_flashdata('Status','Edit Failed');
                redirect('admin/Kategori');
            }
        }
    }

    function deleteCategory($id)
    {
        if (ceksession())
        {
            $delete = $this->Model_kategori->M_deleteCategory($id);
            if($delete)
            {
                $this->session->set_flashdata('Status','Delete Succes');
                redirect('admin/Kategori');
            }
            else
            {
                $this->session->set_flashdata('Status','Delete Failed');
                redirect('admin/Kategori');
            }
        }
    }
    
}