<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Supliyer extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('Model_supliyer');
        $this->load->model('Model_penjualan_admin');
        isLoginSessionExpired();
    }
    
    function index()
    {
        if (ceksession())
        {
            $data['record']    = $this->Model_supliyer->tampildata();
            $data['transaksi'] = $this->Model_penjualan_admin->cekpenjualan();
            $this->template->load('template','admin/supliyer/view_supliyer',$data);
        }
    }

    function viewAddSupliyer()
    {
        if (ceksession())
        {
            $data['transaksi'] = $this->Model_penjualan_admin->cekpenjualan();
            $this->template->load('template','admin/supliyer/input_supliyer',$data);
        }
    }

    function viewEditSupliyer($Id)
    {  
        if (ceksession())
        {
            $data['record']    = $this->Model_supliyer->getSupliyerById($Id);
            $data['transaksi'] = $this->Model_penjualan_admin->cekpenjualan();
            $this->template->load('template','admin/supliyer/edit_supliyer',$data);
        } 
    }
    
    function addSupliyer()
    {
        if (ceksession())
        {
            $Nama   = $this->input->post('Nama');
            $Alamat = $this->input->post('Alamat');
            $Kontak = $this->input->post('Kontak');
            $dataSupliyer    = array(
                                     'Nama'   => $Nama,
                                     'Alamat' => $Alamat,
                                     'Kontak' => $Kontak
                                    );
            $insert = $this->Model_supliyer->addSupliyer($dataSupliyer);
            if($insert)
            {
                $this->session->set_flashdata('Status','Input Success');
                redirect('admin/supliyer/viewAddSupliyer');
            }
            else
            {
                $this->session->set_flashdata('Status','Input Failed');
                redirect('admin/supliyer/viewAddSupliyer');
            }
        }
    }

    function editSupliyer()
    {
        if (ceksession())
        {
            $Id     = $this->input->post('Id');
            $Nama   = $this->input->post('Nama');
            $Alamat = $this->input->post('Alamat');
            $Kontak = $this->input->post('Kontak');
            $dataSupliyer    = array(
                                     'Nama'   => $Nama,
                                     'Alamat' => $Alamat,
                                     'Kontak' => $Kontak,
                                     'Update' => Get_current_date()
                                    );
            $edit=$this->Model_supliyer->editSupliyer($dataSupliyer,$Id);
            if($edit)
            {
                $this->session->set_flashdata('Status','Edit Succes');
                redirect('admin/supliyer');
            }
            else
            {
                $this->session->set_flashdata('Status','Edit Failed');
                redirect('admin/supliyer');
            }
        }
    }

    function deleteSupliyer($id)
    {
        if (ceksession())
        {
            $delete = $this->Model_supliyer->deleteSupliyer($id);
            if($delete)
            {
                $this->session->set_flashdata('Status','Delete Succes');
                redirect('admin/Supliyer');
            }
            else
            {
                $this->session->set_flashdata('Status','Delete Failed');
                redirect('admin/Supliyer');
            }
        }
    }
}