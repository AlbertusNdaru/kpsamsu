<div class="container-fluid">
            <div class="block-header">               
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Transaksi Penjualan
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Id Transaksi</th>
                                            <th>Nama Member</th>
                                            <th>Tanggal</th>
                                            <th>Onkos Kirim</th>
                                            <th>Resi</th>
                                            <th>Kurir</th>
                                            <th>Transaksi</th>
                                            <th>Total Transaksi</th>
                                            <th>Status Kirim</th>
                                            <th style = "text-align: center">Detail and Sending</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id Transaksi</th>
                                            <th>Nama Member</th>
                                            <th>Tanggal</th>
                                            <th>Onkos Kirim</th>
                                            <th>Resi</th>
                                            <th>Kurir</th>
                                            <th>Transaksi</th>
                                            <th>Total Transaksi</th>
                                            <th >Status Kirim</th>
                                            <th style = "text-align: center">Detail and Sending</th>
                                        </tr>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php 
                                    $no = $this->uri->segment('3');
                                    foreach ($record as $r) { ?>
                                        <tr class="gradeU">
                                            <td><?php echo $r->Transaction_bill ?></td>
                                            <td><?php $namamember=explode('-',$r->Transaction_bill) ;echo $namamember[0] ;?></td>
                                            <td><?php echo $r->Date ?></td>
                                            <td>Rp <?php echo $r->Ongkir ?></td>
                                            <td><?php echo $r->Resi ?></td>
                                            <td><?php echo $r->Kurir ?></td>
                                            <td>Rp <?php echo $r->Payment ?></td>
                                            <td>Rp <?php echo ($r->Payment+$r->Ongkir) ?></td>
                                            <td>
                                            <?php if($r->Stats == 'Success') {echo 'Belum Dikirim';} else if($r->Stats == 'Sending'){echo 'Sudah Dikirim';}  ?>
                                            </td>
                                            <td align="center">
                                                <a class="btn btn-primary" href='<?php echo base_url('admin/Penjualan/getDetailPenjualanById?Id='.$r->Id)?>'>Detail</a>
                                                <?php if($r->Stats == 'Success') { ?>
                                                <button class="btn btn-success" onclick="kirim('<?php echo $r->Id ?>','<?php echo $r->Transaction_bill ?>')" >Kirim</button>
                                                <?php } ?>
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
 function kirim(id_penjualan,bill)
 {
    bootbox.prompt("Input Resi untuk Id Transaksi : "+bill+"", function(result) {                
    if (result === null) {                                                                          
    } else {
        $.ajax({
        url  :"<?php echo base_url('admin/Penjualan/updateStatusKirim');?>",
        type : 'POST',
        data : {
            Id : id_penjualan,
            resi : result,
            Stats : 3
        },
            success : function(data)
            {
                window.location="<?php echo base_url().'admin/Penjualan/vieDataStatusPenjualan'?>";
            }
        });
        }
    })
 }

<?php if (!empty($this->session->flashdata('Status'))){?>
    setnotifstatus('<?php echo $this->session->flashdata('Status')?>');
<?php }?>


 function setnotifstatus(err)
{ 

    if (err == 'Edit Succes' || err == 'Delete Succes' || err == 'Sending Succes')
    {
        ttp='success';
    }
    else if(err == 'Edit Failed' || err == 'Delete Failed' || err == 'Sending Failed')
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