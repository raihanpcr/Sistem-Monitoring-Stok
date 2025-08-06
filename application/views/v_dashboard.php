
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- RECENT SALES -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <div class="d-md-flex mb-3">

                                <style>
                                    table.table-bordered > thead > tr > th{
                                        border:1px solid white;
                                        font-weight: bold;
                                    }
                                    
                                    table.table-bordered > tbody > tr > td{
                                        border:1px solid white;
                                    }  

                                </style>

                                <table id="dataTable" class="table-bordered">
                                    <tr>
                                        <td><h3 class="box-title mb-0">Data</h3></td>
                                    </tr>
                                    <tr>
                                        <td><p>Keterangan </p></td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #9CC3D5FF; color: #9CC3D5FF" > 60</td>
                                        <td><b>&nbsp : &nbsp</b></td>
                                        <td><b>Usia < 60 Hari</b></td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #EEA47FFF; color: #EEA47FFF" > 60</td>
                                        <td><b>&nbsp : &nbsp</b></td>
                                        <td><b>Usia 61 - 120 Hari</b></td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #E94B3CFF; color: #E94B3CFF" > 60</td>
                                        <td><b>&nbsp : &nbsp</b></td>
                                        <td><b>Usia > 120 Hari</b></td>
                                    </tr>
                                </table>
                                
                                <div class="col-md-3 col-sm-4 col-xs-6 ms-auto">

                                    <input type="date" name="filtertgl" id="filtertgl" text="input tanggal">

                                    <select id="idJenisLaporan" name="Jenis">
										<option value="0">Show All</option>
										<?php foreach($jenislaporan as $jns) : ?>
                                            <option value="<?= $jns->idJenis ?>"><?= $jns->jenisLaporan ?></option>
										<?php endforeach; ?>
									</select>

                                </div>
                            </div>
                            <div class="scroll table-responsive tableFixHead">
                                <style>
                                    table.table-bordered > thead > tr > th{
                                        border:1px solid white;
                                        font-weight: bold;
                                    }
                                    
                                    table.table-bordered > tbody > tr > td{
                                        border:1px solid white;
                                    }  

                                </style>
                                <table class="table no-wrap table-bordered" id="tbLaporan">
                                    <thead>
                                        <tr>
                                            <th style="position: sticky; top: 0; background-color: white;">Plant</th>
                                            <th style="position: sticky; top: 0; background-color: white;">Plant Desc</th>
                                            <th style="position: sticky; top: 0; background-color: white;">Material Group</th>
                                            <th style="position: sticky; top: 0; background-color: white;">Material Group Desc</th>
                                            <th style="position: sticky; top: 0; background-color: white;">Material</th>
                                            <th style="position: sticky; top: 0; background-color: white;">Material Desc</th>
                                            <th style="position: sticky; top: 0; background-color: white;">Last Using</th>
                                            <th style="position: sticky; top: 0; background-color: white;">Umur</th>
                                            <th style="position: sticky; top: 0; background-color: white;">Stok dibawah < 60 Hari</th>
                                            <th style="position: sticky; top: 0; background-color: white;">Satuan</th>
                                            <th style="position: sticky; top: 0; background-color: white;">Val <= 60</th>
                                            <th style="position: sticky; top: 0; background-color: white;">Stok 61 - 120 Hari</th>
                                            <th style="position: sticky; top: 0; background-color: white;">Satuan</th>
                                            <th style="position: sticky; top: 0; background-color: white;">Val 61 - 120</th>
                                            <th style="position: sticky; top: 0; background-color: white;">Stok > 120</th>
                                            <th style="position: sticky; top: 0; background-color: white;">Satuan</th>
                                            <th style="position: sticky; top: 0; background-color: white;">Val > 120</th>
                                            <th style="position: sticky; top: 0; background-color: white;">Tanggal</th>
                                            <th style="position: sticky; top: 0; background-color: white;">Jenis Laporan</th>
                                        </tr>
                                    </thead>
                                
                                    <tbody>
                                        
                                        <?php 
                                            if(empty($datalaporan)){ ?>
                                                <tr><td style="text-align:center" colspan='19'>Tidak ada data</td></tr>

                                        <?php
                                            }
                                            else 
                                            {
                                                foreach ($datalaporan as $lpr) : ?>
                                                    <?php
                                                    
                                                    $warna="";
                                                    
                                                    if($lpr['umur'] <= 60 && $lpr['umur'] != NULL)
                                                    {
                                                        $warna = 'background-color: #9CC3D5FF;';
                                                    }
                                                    elseif($lpr['umur'] >= 61 && $lpr['umur'] <= 120)
                                                    {
                                                        $warna = 'background-color: #EEA47FFF;';
                                                    }
                                                    elseif($lpr['umur'] > 120)
                                                    {
                                                        $warna = 'background-color: #E94B3CFF;
                                                                  color: #FFFFFFFF;';
                                                    }
                                                    else
                                                    {
                                                        $warna = 'background-color: white;';
                                                    }
                                                    // echo $warna."<br>";
                                                    
                                                    ?>

                                                    <tr style="<?php echo $warna?>"> 
                                                        <td><?php echo $lpr['plant'];?></td>
                                                        <td><?php echo $lpr['plantDesc'];?></td>
                                                        <td><?php echo $lpr['materialGroup'];?></td>
                                                        <td><?php echo $lpr['materialGroupDesc'];?></td>
                                                        <td><?php echo $lpr['material'];?></td>
                                                        <td><?php echo $lpr['materialDesc'];?></td>
                                                        <td><?php echo $lpr['lastUsing'];?></td>
                                                        <td><?php echo $lpr['umur'];?></td>
                                                        <td><?php echo number_format($lpr['stok'], 0, ',','.');?></td>
                                                        <td><?php echo $lpr['satuan'];?></td>
                                                        <td><?php echo number_format($lpr['value'], 0, ',','.');?></td>
                                                        <td><?php echo number_format($lpr['stok2'], 0, ',','.');?></td>
                                                        <td><?php echo $lpr['satuan2'];?></td>
                                                        <td><?php echo number_format($lpr['value2'], 0, ',','.');?></td>
                                                        <td><?php echo number_format($lpr['stok3'], 0, ',','.');?></td>
                                                        <td><?php echo $lpr['satuan3'];?></td>
                                                        <td><?php echo number_format($lpr['value3'], 0, ',','.');?></td>
                                                        <td><?php echo $lpr['tanggal'];?></td>
                                                        <td><?php echo $lpr['jenisLaporan'];?></td>
                                                    </tr>
            
                                                <?php endforeach;
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                    <!-- /.col -->
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center"> Sistem Monitoring Bahan Pupuk dan Bahan Kimia <a
                    href="">PTPN5</a>
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#idJenisLaporan").change(function() {
                laporan();
                // let a = $(this).values;
                // console.log(a);
            });
            $("#filtertgl").change(function() {
                laporan();
                // let a = $(this).values;
                // console.log(a);
            });
        });

        function laporan() {
            var id = $("#idJenisLaporan").val();
            var tgl = $("#filtertgl").val();
                $.ajax({
                url : "<?= base_url('C_dashboard/load') ?>",
                data : "idJenisLaporan=" + id + "&filtertgl=" + tgl,
                    success:function(data) {
                        $("#tbLaporan tbody").html(data);
                    }
                });
            // else if (id != 0) {
            //     $.ajax({
            //     url : "<?= base_url('C_dashboard/load') ?>",
            //     data : "idJenisLaporan=" + id,
            //         success:function(data) {
            //             $("#tbLaporan tbody").html(data);
            //         }
            //     });
            // }
            // else if (tgl != 0) {
            //     $.ajax({
            //     url : "<?= base_url('C_dashboard/load') ?>",
            //     data : "filtertgl=" + tgl,
            //         success:function(data) {
            //             $("#tbLaporan tbody").html(data);
            //         }
            //     });
            // }
        }
    </script>