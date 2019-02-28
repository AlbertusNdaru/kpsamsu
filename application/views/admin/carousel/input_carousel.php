<div class="container-fluid">
                <div class="block-header">
                    <h2 align="center">ADD CAROUSEL</h2>
                </div>
                <!-- Input -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="body">
                            <?php echo form_open_multipart('admin/Carousel/addCarousel'); ?>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                             <label class="form-label">Judul</label>
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="title" placeholder="Enter Product Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                             <label class="form-label">Sub Judul</label>
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="subtitle" placeholder="Enter Subtitle">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                             <label class="form-label">Line 1</label>
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="line1" placeholder="Enter Line 1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                              <label class="form-label">Line 2</label>
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="line2" placeholder="Enter Line 2" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                              <label class="form-label">Line 3</label>
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="line3" placeholder="Enter Line 3" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                              <label class="form-label">Line 4</label>
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="line4" placeholder="Enter Line 3" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                              <label class="form-label">Line 5</label>
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="line5" placeholder="Enter Line 5" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                    <div class="form-group">
                                              <label class="form-label">Image</label>
                                            <div class="form-line">
                                            <input required id="inputfoto" accept="image/x-png,image/gif,image/jpeg" type="file" class="form-control" name="image" placeholder="upload">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="margin-bottom:5px !important">
                                        <button type="submit" class="btn btn-primary">ADD</button>
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