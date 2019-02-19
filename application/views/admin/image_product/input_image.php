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
                                            <th>Type</th>
                                            <th>Upload</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nama Barang</th>
                                            <th>Kategori</th>
                                            <th>Merk</th>
                                            <th>Type</th>
                                            <th>Upload</th>
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
                                          <td> 
                                            <?php echo form_open_multipart('admin/Image_product/addImage_product'); ?>
                                            <input hidden name="IdProduct" type='text' value="<?= $r->Id?>">
                                            <input required multiple="multiple" id="inputfoto" accept="image/x-png,image/gif,image/jpeg" type="file" class="form-control" name="berkas[]" placeholder="upload">
                                            <button type="submit" class="btn btn-primary btn-sm" >Upload</button>
                                            </form>
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