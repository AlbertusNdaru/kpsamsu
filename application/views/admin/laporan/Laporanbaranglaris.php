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
                            ALFALFA COLECTION <br>
                            Laporan 10 Barang Laris : 
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
                                                <th>Nama Barang</th>
                                                <th>Type Barang</th>
                                                <th>Jumlah Terjual</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1; $total=0; foreach ($record as $r){ ?>
                                            <tr class="gradeU">
                                                <td align="center"><?php echo $no ?></td>
                                                <td align="left"><?php echo $r->Product_name ?></td>
                                                <td align="center"><?php echo $r->Type_name ?></td>
                                                <td align="center"><?php echo $r->jmljual ?></td>  
                                            </tr>
                                        <?php $no++; } ?>
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