<?php
   include APPPATH.'views/admin/laporan/laporan.php';

    // $subtotalpayment=0;
    // $totalfinepayment=0;
    // $totalratepayment=0;
    // $total=0;
?>          
            <div>
                <div align="center" >
                    <img style="display: block;margin-left: auto;margin-right: auto;width: 100px;" src="<?php echo base_url()?>assets/images/logolaporan.jpg">
                    <div>
                        <h2 align="center">
                            TOKO BAJU <br>
                            Laporan Pembelian : 
                            <small><?=  date('d-m-y') ?></small>
                        </h2>
                       
                    </div>
                </div>
            </div> 
                <!-- /. ROW  -->
                <div>
                    <div>
                        <div>
                            <div>
                                <div>
                                    <table border=1>
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Tanggal Transaksi</th>
                                                <th>Jumlah</th>
                                                <th>Nama Barang</th>
                                                <th>Total Transaksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1; $total=0; foreach ($record as $r){ ?>
                                            <tr class="gradeU">
                                                <td align="center"><?php echo $no ?></td>
                                                <td align="center"><?php echo $r->create_at ?></td>
                                                <td align="center"><?php echo $r->jumlah_beli ?></td>
                                                <td align="center"><?php echo $r->Product_name ?></td>
                                                <td align="left">Rp <?php $jml=$r->jumlah_beli*$r->price;echo number_format($jml,2) ?></td>
                                            </tr>
                                        <?php $no++; $total=$total+$jml; } ?>
                                            <tr>
                                                <td colspan="4" style="text-align: right; font-size:18px;" ><B>Total</B></td>
                                                <td style="font-size:18px;"><B>Rp <?php echo  number_format($total,2);?></B></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                     <br><br>
                                    <table style="width: 100%; margin-left: 75%;">
                                        <tbody>
                                            <tr class="gradeU">
                                                <td align="center">Yogyakarta, <?= date('d-M-Y');?></td>
                                            </tr>
                                            <tr class="gradeU">
                                
                                                <td align="center">  Admin</td>
                                            </tr>
                                            <tr class="gradeU">
                            
                                                <td align="center"> <br></td>
                                            </tr>
                                            <tr class="gradeU">
                           
                                                <td align="center">  <?= $_SESSION['userdata']->Username?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /. TABLE  -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /. ROW  -->