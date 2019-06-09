<div class="container-fluid">
            <div class="block-header">
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Image Product
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Nama Barang</th>
                                            <th>Kategori</th>
                                            <th>Merk</th>
                                            <th>Type</th>
                                            <th>Upload</th>
                                            <th>Preview Gambar</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nama Barang</th>
                                            <th>Kategori</th>
                                            <th>Merk</th>
                                            <th>Type</th>
                                            <th>Upload</th>
                                            <th>Preview Gambar</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php 
                                    $no = $this->uri->segment('3');
                                    foreach ($record as $r) { ?>
                                        <tr class="gradeU">
                                          <td><?php echo $r->Product_name ?></td>
                                          <td><?php echo $r->Category_name ?></td>
                                          <td><?php echo $r->Merk ?></td>
                                          <td><?php echo $r->Type_name ?></td>
                                          <td style="width:40%;"> 
                                            <?php echo form_open_multipart('admin/Image_product/addImage_product'); ?>
                                            <input hidden name="IdProduct" type='text' value="<?= $r->Id?>">
                                            <input required  id="inputfoto" accept="image/x-png,image/gif,image/jpeg" type="file" class="form-control" name="berkas" placeholder="upload">
                                            <button type="submit" class="btn btn-primary btn-sm" >Upload</button>
                                            </form>
                                          </td>
                                          <td align='center' style="width:10%;"><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalpreview" onclick="previewimg('<?= $r->Id?>')">Preview Image</button></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>
        <?php include 'preview_img.php'?>
<script>
  <?php if (!empty($this->session->flashdata('Status'))){?>
    setnotifstatus('<?php echo $this->session->flashdata('Status')?>');
 <?php }?>

 function previewimg(id)
{
    $.ajax({
        url:"<?php echo base_url('admin/Image_product/getImgProduct');?>",
        type : "POST",
        data:{
            Id : id
        },
        success : function(data)
        {
            var result = $.parseJSON(data);
            console.log(result['Photo_name']);
            $("#imgproduct").empty();
            $("#imgproduct").append(
                       "<image style='width: 50%;'src=<?php echo base_url_shop().'images/'?>"+result['Photo_name']+">"
                );
        }
    });
}

 function setnotifstatus(err)
 { 
    if (err == 'Upload Succes')
        {
        ttp='success';
        }
    else
        {
        ttp='danger';
        }

    $.notify({
        // options
        message: err,
    },{
        // settings
        element: 'body',
        position: null,
        type: ttp,
        allow_dismiss: true,
        newest_on_top: false,
        showProgressbar: false,
        placement: {
        from: "bottom",
        align: "right"
        },
        offset: 20,
        spacing: 10,
        z_index: 1031,
        delay: 5000,
        timer: 1000,
        url_target: '_blank',
        mouse_over: null,
        animate: {
        enter: 'animated fadeInRight',
        exit: 'animated fadeOutRight'
        },
        onShow: null,
        onShown: null,
        onClose: null,
        onClosed: null,
        icon_type: 'class',
        template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
        '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
        '<span data-notify="icon"></span> ' +
        '<span data-notify="title">{1}</span> ' +
        '<span data-notify="message">{2}</span>' +
        '<div class="progress" data-notify="progressbar">' +
            '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
        '</div>' +
        '<a href="{3}" target="{4}" data-notify="url"></a>' +
        '</div>' 
    });

  }
  </script>