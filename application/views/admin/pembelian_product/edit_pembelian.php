<div class="container-fluid">
                <div class="block-header">
                    <h2 align="center">ADD PRODUCT</h2>
                </div>
                <!-- Input -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="body">
                            <?php echo form_open('admin/Product/editProduct'); ?>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input required type="text" class="form-control" name="productname" value='<?= $record->Product_name?>'>
                                                <label class="form-label">Product Name</label>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="text" hidden name="id" value='<?= $record->Id?>'>
                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                            <div>
                                                <select name="category_id">
                                                <?php foreach ($dataCategory as $k) {
                                                        echo "<option value='$k->Id'";
                                                        echo $record->Category_id==$k->Id?'selected':'';
                                                        echo">$k->Category_name</option>";
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                            <div>
                                                <select name="product_type_id">
                                                    <?php foreach ($dataType as $t) {
                                                        echo "<option value='$t->Id'";
                                                        echo $record->Product_type_id==$t->Id?'selected':'';
                                                        echo">$t->Type_name</option>";
                                                    }?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group form-float form-group">
                                            <div class="form-line">
                                                <input required type="text" class="form-control" name="merk" value='<?= $record->Merk?>' />
                                                <label class="form-label">Merk</label>
                                            </div>
                                        </div>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input required type="text" class="form-control" name="description" value='<?= $record->Description?>' />
                                                <label class="form-label">Description</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                               <label class="form-label">Status</label><br>
                                            <select name="status">
                                                <option <?php if($record->Status_item=='None'){echo 'selected';}?> value="None">None</option>
                                                <option <?php if($record->Status_item=='New'){echo 'selected';}?> value="New">New</option>
                                                <option <?php if($record->Status_item=='Sale'){echo 'selected';}?> value="Sale">Sale</option>
                                            </select>
                                        </div>
                         
                                    </div>
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


    