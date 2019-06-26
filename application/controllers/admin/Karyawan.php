<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Karyawan extends CI_Controller{

    /**
     * Class constructor.
     */
    function __construct() {
        parent::__construct();
        $this->load->model('Model_karyawan');
        $this->load->model('Model_penjualan_admin');
        isLoginSessionExpired();
    }

    function index()
    {
        if (ceksession())
        {
            $data['record'] = $this->Model_karyawan->get_karyawan();
            $data['transaksi'] = $this->Model_penjualan_admin->cekpenjualan();
            $this->template->load('template','admin/karyawan/view_karyawan',$data);
        }
    }

    function viewEditKaryawan($id_karyawan)
    {
       //echo $id_karyawan;
        if (ceksession())
        {
            $data['record'] = $this->Model_karyawan->get_karyawan_by_id($id_karyawan);
            $data['transaksi'] = $this->Model_penjualan_admin->cekpenjualan();
            $this->template->load('template','admin/karyawan/edit_karyawan',$data);
        }
    }

    function viewAddKaryawan()
    {
       //echo $id_karyawan;
        if (ceksession())
        {
            $data['transaksi'] = $this->Model_penjualan_admin->cekpenjualan();
            $this->template->load('template','admin/karyawan/input_karyawan',$data);
        }
    }

    function addkaryawan()
    {
        if (ceksession())
        {
            $karyawan = array(
                'Nama'      => $this->input->post('nama'),
                'NIK'      => $this->input->post('nik'),
                'Alamat'    => $this->input->post('alamat'),
                'No_hp'     => $this->input->post('nohp'),
                'Email'     => $this->input->post('email'),
                'Jenis_kel' => $this->input->post('jeniskel'),
                );
            $addkaryawan=$this->Model_karyawan->add_karyawan($karyawan);
            if($addkaryawan)
            {
                $this->session->set_flashdata('Status','Input Succes');
                redirect('admin/Karyawan');
            }
            else
            {
                $this->session->set_flashdata('Status','Input Failed');
                redirect('admin/Karyawan');
            }
        }
    }

    function editKaryawan()
    {
        if (ceksession())
        {
            $id_karyawan = $this->input->post('id');
            $karyawan = array(
                'Nama'      => $this->input->post('nama'),
                'Alamat'    => $this->input->post('alamat'),
                'No_hp'     => $this->input->post('nohp'),
                'Email'     => $this->input->post('email'),
                'Jenis_kel' => $this->input->post('jeniskel'),
                'Update_at' => get_current_date()
                );
            $editkaryawan= $this->Model_karyawan->update_karyawan($id_karyawan,$karyawan);
            if($editkaryawan)
            {
                $this->session->set_flashdata('Status','Edit Succes');
                redirect('admin/Karyawan');
            }
            else
            {
                $this->session->set_flashdata('Status','Edit Failed');
                redirect('admin/Karyawan');
            }
        }
    }

    function editStatuskaryawan($id_karyawan,$status)
    {
        $karyawan = array(
                        'Status'=>$status
                        );
        $editkaryawan = $this->Model_karyawan->update_karyawan($id_karyawan,$karyawan);
        if($editkaryawan)
        {
            $this->session->set_flashdata('Status','Edit Success');
            redirect('admin/Karyawan');
        }
        else
        {
            $this->session->set_flashdata('Status','Edit Failed');
            redirect('admin/Karyawan');
        }
    }

    function deleteKaryawan($id_karyawan)
    {
        $deleteKaryawan = $this->Model_karyawan->delete_karyawan($id_karyawan);
        if($deleteKaryawan)
        {
            $this->session->set_flashdata('Status','Delete Succes');
            redirect('admin/Karyawan');
        }
        else
        {
            $this->session->set_flashdata('Status','Delete Failed');
            redirect('admin/Karyawan');
        }
    }
}
?>