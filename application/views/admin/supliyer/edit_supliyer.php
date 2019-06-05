<div class="container-fluid">
            <div class="block-header">
                <h2 align="center">ADD CATEGORY</h2>
            </div>
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                          <?php echo form_open('admin/Supliyer/editSupliyer'); ?>
                            <div class="row clearfix">
                                <div class="col-sm-12"  style="margin-top:10px !important">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="Nama" value='<?= $record->Nama?>'>
                                            <label class="form-label">Nama Supliyer</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12"  style="margin-top:10px !important">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="Alamat" value='<?= $record->Alamat?>'>
                                            <label class="form-label">Alamat</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12"  style="margin-top:10px !important">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="Kontak" value='<?= $record->Kontak?>'>
                                            <label class="form-label">No Telp</label>
                                        </div>
                                    </div>
                                </div>
                                <input hidden type="text"  name="Id" value='<?= $record->Id?>'>
                                <div class="col-sm-12" style="margin-bottom:5px !important">
                                    <button type="submit" class="btn btn-primary">UPDATE</button>
                                </div>
                            </div>
                          </form >
                        </div>
                    </div>
                </div>
            </div>
            <!--#END# Switch Button -->
</div>
