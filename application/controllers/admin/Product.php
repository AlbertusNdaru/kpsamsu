<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
	function __construct() {
		parent::__construct();
        $this->load->model('Model_barang');
        $this->load->model('Model_kategori');
	}

	function index()
    {     
        $data['record']     =    $this->Model_barang->M_tampil_data();
        $this->template->load('template','admin/product/view_product',$data);
    }

    
    function viewAddProduct()
    {
        $data['dataCategory'] = $this->Model_kategori->M_tampil_data();
        $data['dataType'] = $this->Model_barang->M_tampil_data_type();
        $this->template->load('template','admin/product/input_product',$data);
    }

    function viewEditProduct($id)
    {   
        $data['dataCategory'] = $this->Model_kategori->M_tampil_data();
        $data['dataType'] = $this->Model_barang->M_tampil_data_type();
        $data['record']= $this->Model_barang->M_tampil_data_by_id($id);
        $this->template->load('template','admin/product/edit_product',$data);
    }

    // function addProduct()
    // {
    //    $productname = $this->input->post('productname');
    //    $category    = $this->input->post('category');
    //    $typeproduct = $this->input->post('typeproduct');
    //    $merk        = $this->input->post('merk');
    //    $description = $this->input->post('description');
    //    $price       = $this->input->post('price');
    //    $price_S     = $this->input->post('price_supliyer');
    //    $status      = $this->input->post('status');
    //    $dataProduct = array('Product_name'=>$productname,
    //                         'Category_id'=>$category,
    //                         'Merk'=>$merk,
    //                         'Description'=>$description,
    //                         'Product_type_id'=>$typeproduct,
    //                         'Price'=>$price,
    //                         'Harga_supliyer'=>$price_S,
    //                         'Status_item'=>$status);
    //    $typesize    = $this->Model_barang->M_tampil_data_type_byId($typeproduct);
    //    $typename    = $typesize->Size_type;
    //     if($typename=="Atasan")
    //         {
    //             $stok=array('XL','L','M','S');
    //         }
    //     else if($typename=="Bawahan")
    //             {
    //                 $stok=array('26','27','28','29','30','31','32','33','34','35','36');
    //             }
    //     else 
    //             {
    //                 $stok=array('31','32','33','34','35','36');
    //             }
    //    $insert     = $this->Model_barang->M_addProduct($dataProduct,$stok);
    //     if($insert)
    //     {
    //         $this->session->set_flashdata('Status','Input Succes');
    //         redirect('admin/Product/viewAddProduct');
    //     }
    //     else
    //     {
    //         $this->session->set_flashdata('Status','Input Failed');
    //         redirect('admin/Product/viewAddProduct');
    //     }
    // }

    function addProduct()
    {
       $productname = $this->input->post('productname');
       $category    = $this->input->post('category');
       $typeproduct = $this->input->post('typeproduct');
       $merk        = $this->input->post('merk');
       $description = $this->input->post('description');
       $price       = $this->input->post('price');
       $price_S     = $this->input->post('price_supliyer');
       $status      = $this->input->post('status');
       $dataProduct = array('Product_name'=>$productname,
                            'Category_id'=>$category,
                            'Merk'=>$merk,
                            'Description'=>$description,
                            'Product_type_id'=>$typeproduct,
                            'Price'=>$price,
                            'Harga_supliyer'=>$price_S,
                            'Status_item'=>$status);
       $insert     = $this->Model_barang->M_addProduct($dataProduct,$stok);
        if($insert)
        {
            $this->session->set_flashdata('Status','Input Succes');
            redirect('admin/Product/viewAddProduct');
        }
        else
        {
            $this->session->set_flashdata('Status','Input Failed');
            redirect('admin/Product/viewAddProduct');
        }
    }

    function editProduct()
    {
        $productname      = $this->input->post('productname');
        $category_id      = $this->input->post('category_id');
        $merk             = $this->input->post('merk');
        $description      = $this->input->post('description');
        $product_type_id  = $this->input->post('product_type_id');
        $status           = $this->input->post('status');
        $update_at        = get_current_date();
        $id               = $this->input->post('id');
        $dataEdit= array('Product_name'=>$productname,
                         'Category_id'=>$category_id,
                         'Merk'=>$merk,
                         'Description'=>$description,
                         'Product_type_id'=>$product_type_id,
                         'Update_at'=>$update_at,
                         'Status_item'=>$status);
        $edit=$this->Model_barang->M_editProduct($dataEdit,$id);
        if($edit)
        {
            $this->session->set_flashdata('Status','Edit Succes');
            redirect('admin/Product');
        }
        else
        {
            $this->session->set_flashdata('Status','Edit Failed');
            redirect('admin/Product');
        }
    }

    

    function deleteProduct($id)
    {
        $delete=$this->Model_barang->M_deleteProduct($id);
        if($delete)
        {
            $this->session->set_flashdata('Status','Delete Succes');
            redirect('admin/Product');
        }
        else
        {
            $this->session->set_flashdata('Status','Delete Failed');
            redirect('admin/Product');
        }
    }
}
