<div class="container-fluid">
                <div class="block-header">
                    <h2 align="center">Edit Karyawan</h2>
                </div>
                <!-- Input -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="body">
                                <?php echo form_open('admin/Karyawan/editKaryawan'); ?>
                                    <div class="row clearfix">
                                        <div class="col-sm-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input required readonly type="text" class="form-control" name="nama" value='<?= $record->NIK?>'>
                                                    <label class="form-label">NIK</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input required type="text" class="form-control" name="nama" value='<?= $record->Nama?>'>
                                                    <label class="form-label">Nama</label>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="text" hidden name="id" value='<?= $record->Id?>'>
                                        <div class="col-sm-6">
                                            <div class="form-group form-float form-group">
                                                <div class="form-line">
                                                    <input required type="text" class="form-control" name="alamat" value='<?= $record->Alamat?>' />
                                                    <label class="form-label">Alamat</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input required type="text" class="form-control" name="nohp" value='<?= $record->No_hp?>' />
                                                    <label class="form-label">No HP</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input required type="email" class="form-control" name="email" value="<?= $record->Email?>">
                                                    <label class="form-label">Email</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label">Jenis Kelamin</label><br>
                                                <select name="jeniskel">
                                                    <option <?php if($record->Jenis_kel=='L'){echo 'selected';}?> value="L">Laki-Laki</option>
                                                    <option <?php if($record->Jenis_kel=='P'){echo 'selected';}?> value="P">Perempuan</option>
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


    