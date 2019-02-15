<div class="content-wrapper"  style="margin-left: 0px">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        EDIT KATEGORI BARANG
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Input Kategori Barang</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
                <?php echo form_open_multipart('kategori/edit'); ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                            <input type="hidden" name="id" value="<?php echo $record->id_kategori?>">
                                <div class="form-group">
                                    <label>Nama Kategori</label>
                                    <input required id="kategoriinput" type="text" name="kategori" class="form-control" placeholder="kategori" value="<?php echo $record->jenis_barang?>">
                                </div>

                                <button type="submit" name="submit" class="btn btn-primary btn-sm" >Update</button> | 
                                <?php echo anchor('kategori','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                                </form>
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                <!-- /. ROW  -->
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->