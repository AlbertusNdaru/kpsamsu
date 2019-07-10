    <div class="container-fluid">
                <div class="block-header">
                    <h2 align="center">ADD PRODUCT</h2>
                </div>
                <!-- Input -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="body">
                            <?php echo form_open('admin/Pembelian/addPembelian'); ?>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                             <label class="form-label">Product Name</label>
                                            <div class="form-line">
                                                <input readonly type="text" class="form-control" name="productname" value="<?= $product->Product_name?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                              <label class="form-label">Merk</label>
                                            <div class="form-line">
                                                <input readonly type="text" class="form-control" name="merk" value="<?= $product->Merk?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                                <label class="form-label">Harga Supliyer</label>
                                            <div class="form-line">
                                                <input readonly type="text" class="form-control" name="harga_supliyer" value="<?= $product->Harga_supliyer?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                                <label class="form-label">Jumlah Beli</label>
                                            <div class="form-line">
                                                <input required type="number" class="form-control" name="jumlah_beli"  />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div>
                                                <label class="form-label">Supliyer</label><br>
                                                <select name="Supliyer_id">
                                                <?php foreach($Supliyer as $data) {?>
                                                    <option value="<?php echo $data->Id?>"><?php echo $data->Nama?></option>
                                                <?php }?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <div class="col-sm-12" style="margin-bottom:5px !important">
                                        <button type="submit" name="id" value="<?= $product->Id?>" class="btn btn-primary">Beli</button>
                                    </div>
                                </div>
                                </form >
                            </div>
                        </div>
                    </div>
                </div>
                <!--#END# Switch Button -->
    </div>

    <script>
  <?php if (!empty($this->session->flashdata('Status'))){?>
    setnotifstatus('<?php echo $this->session->flashdata('Status')?>');
<?php }?>


 function setnotifstatus(err)
{ 
if (err == 'Input Succes')
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