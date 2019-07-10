<body>
<div id="modalinputtgl" class="modal fade">
            <div class="modal-dialog" style="top:70px; min-width: 700px;">
                <div class="modal-content" style="background-color:white;border-radius: 20px;top: 57px;">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Input Tanggal </h4>
                    </div>
                    <?php echo form_open('admin/Laporan/laporanpenjualanbydate'); ?>
                    <div  class="modal-body row">
                        <div class="col-md-6">
                            <label>Tanggal Awal</label>
                            <input required type="date" class="form-control" name="tgl1" />  
                        </div>
                        <div class="col-md-6">
                        <label>Tanggal Akhir</label>
                        <input required type="date" class="form-control" name="tgl2" />  
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <a href="" target="_blank" type="submit" class="btn btn-default" >Cetak</a>
                    </div>
                    </form>

                </div>
            </div>
</div>
</body>