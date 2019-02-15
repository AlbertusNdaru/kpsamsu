<div class="container-fluid">
            <div class="block-header">
                <h2>
                    PRODUCT
                </h2>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                BASIC EXAMPLE
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="<?php echo base_url()?>Product/viewAddProduct">Add Data</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
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
                                          <td><?php echo $r->Deskripsi ?></td>
                                          <td><?php echo $r->Type_name ?></td>
                                          <td><?php echo $r->deskripsi ?></td>
                                          <td style="text-align:center">
                                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-primary" onclick="previewimage('<?php echo $r->id_barang?>')">Preview Image</button></td>
                                          <td align="center">
                                              <a href='<?php echo base_url('product/edit/'.$r->id_barang)?>'><i class="material-icons text-warning">edit</i></a>
                                              <a href='<?php echo base_url('product/delete/'.$r->id_barang)?>'><i class="material-icons text-primary">delete</i></a>
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