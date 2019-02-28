<div class="container-fluid">
                <div class="block-header">
                    <h2 align="center">EDIT CAROUSEL</h2>
                </div>
                <!-- Input -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="body">
                            <?php echo form_open_multipart('admin/Carousel/editCarousel'); ?>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                             <label class="form-label">Judul</label>
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="title" value="<?= $edit->Title?>">
                                                <input type="text" hidden name="id" value="<?= $edit->Id?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                             <label class="form-label">Sub Judul</label>
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="subtitle" value="<?= $edit->Subtitle?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                             <label class="form-label">Line 1</label>
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="line1" value="<?= $edit->Line1?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                              <label class="form-label">Line 2</label>
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="line2" value="<?= $edit->Line2?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                              <label class="form-label">Line 3</label>
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="line3" value="<?= $edit->Line3?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                              <label class="form-label">Line 4</label>
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="line4" value="<?= $edit->Line4?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                              <label class="form-label">Line 5</label>
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="line5" value="<?= $edit->Line5?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                    <div class="form-group">
                                              <label class="form-label">Image</label>
                                            <div class="form-line">
                                            <input id="inputfoto" accept="image/x-png,image/gif,image/jpeg" type="file" class="form-control" name="image" placeholder="upload">
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
