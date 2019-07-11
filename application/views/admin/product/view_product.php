<div class="container-fluid">
            <div class="block-header">
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                PRODUCT
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="<?php echo base_url()?>admin/Product/viewAddProduct">Add Data</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Nama Barang</th>
                                            <th>Kategori</th>
                                            <th>Merk</th>
                                            <th>Deskripsi</th>
                                            <?php if ($_SESSION['userdata']->Usergrup_id == 1){?>
                                            <th>Harga Supliyer</th>
                                            <?php } ?>
                                            <th>Harga</th>
                                            <th>Stok</th>
                                            <th>Type</th>
                                            <th style="text-align:center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nama Barang</th>
                                            <th>Kategori</th>
                                            <th>Merk</th>
                                            <th>Deskripsi</th>
                                            <?php if ($_SESSION['userdata']->Usergrup_id == 1){?>
                                            <th>Harga Supliyer</th>
                                            <?php } ?>
                                            <th>Harga</th>
                                            <th>Stok</th>
                                            <th>Type</th>
                                            <th style="text-align:center">Aksi</th>
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
                                          <td><?php echo $r->Description ?></td>
                                          <?php if ($_SESSION['userdata']->Usergrup_id == 1){?>
                                          <td>Rp <?php echo $r->Harga_supliyer ?></td>
                                          <?php } ?>
                                          <td>Rp <?php echo $r->Price ?></td>
                                          <td><?php echo $r->Stok ?></td>
                                          <td><?php echo $r->Type_name ?></td>
                                          <td align="center">
                                              <a href='<?php echo base_url('admin/Product/viewEditProduct/'.$r->Id)?>'><i class="material-icons text-warning">edit</i></a>
                                              <a href='<?php echo base_url('admin/Product/deleteProduct/'.$r->Id)?>'><i class="material-icons text-primary">delete</i></a>
                                          </td>
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
<script>
</script>
<script>
  <?php if (!empty($this->session->flashdata('Status'))){?>
    setnotifstatus('<?php echo $this->session->flashdata('Status')?>');
<?php }?>


 function setnotifstatus(err)
{ 
if (err == 'Input Succes' || err == 'Edit Succes' || err == 'Delete Succes')
    {
      ttp='success';
    }
 else if(err == 'Input Failed' ||err == 'Edit Failed' || err == 'Delete Failed')
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