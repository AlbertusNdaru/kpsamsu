    <div class="container-fluid">
                <div class="block-header">
                    <h2 align="center">ADD PRODUCT</h2>
                </div>
                <!-- Input -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="body">
                            <?php echo form_open('Product/addProduct'); ?>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="productname">
                                                <label class="form-label">Product Name</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                     
                                            <div>
                                            <select name="category">
                                             <?php foreach($dataCategory as $data) {?>
                                                <option value="<?php echo $data->Id?>"><?php echo $data->Category_name?></option>
                                             <?php }?>
                                             </select>
                                    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                         
                                            <div>
                                            <select name="typeproduct">
                                             <?php foreach($dataType as $data) {?>
                                                <option value="<?php echo $data->Id?>"><?php echo $data->Type_name?></option>
                                             <?php }?>
                                             </select>
                                     
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group form-float form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="merk" />
                                                <label class="form-label">Merk</label>
                                            </div>
                                        </div>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="description" />
                                                <label class="form-label">Description</label>
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