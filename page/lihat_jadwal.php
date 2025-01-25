<br><br>
<div class="left_col" role="main">
    <div class="">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <div class="clearfix"></div>
                </div>
                <?php
                    include "config/connection.php";

                    $ta_jadwal = $_SESSION['ta_jadwal'];
                    $sms_jadwal = $_SESSION['sms_jadwal'];
                    $nip = $_SESSION['nip'];
                    $sql1 = mysqli_query($conn, "SELECT jadwal.*, guru.*, hasil.hari, hasil.waktu, hasil.kelas, mapel.*
                    FROM jadwal,guru, mapel, hasil
                    WHERE jadwal.nip = guru.nip AND hasil.id_jadwal = jadwal.id_jadwal
                    AND hasil.id_mapel = mapel.id_mapel AND guru.nip = '$nip'
                    AND jadwal.ta_jadwal='$ta_jadwal' AND jadwal.sms_jadwal='$sms_jadwal'");
                    $result1 = mysqli_fetch_array($sql1);
                ?>
                <h5 style="color:black;font-weight:bold;">
                    <center><br>JADWAL MENGAJAR<br>
                        SEMESTER: <?=$result1['sms_jadwal']; ?>, TAHUN AJARAN : <?=$result1['ta_jadwal']; ?></center>
                </H5>
                <br>
                <tr>
                    <table width="100%" border="0" align="center">
                        <td width="100"><b style="font-size: 15px;color:black;">Nama guru</b></td>
                        <td width="17"><b>:</b></td>
                        <td width="228"><b style="font-size: 15px; color:black;"><?php echo $result1['nm_guru']; ?></b>
                        </td>
                        <td width="432">&nbsp;</td>
                        <td width="250" rowspan="10">&nbsp;</td>
                </tr>
                </table>

                <div class="x_content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table table-bordered">
                                <table class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr style="background-color: teal; color:white; text-align: center;">
                                            <th>ID MAPEL</th>
                                            <th>MATA PELAJARAN</th>
                                            <th>HARI</th>
                                            <th>WAKTU</th>
                                            <th>KELAS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no=0;
                                            $sql = mysqli_query($conn, "SELECT jadwal.*, guru.*, hasil.hari, hasil.waktu, hasil.kelas, mapel.*
                                            FROM jadwal, guru, mapel, hasil
                                            WHERE jadwal.nip = guru.nip AND hasil.id_jadwal = jadwal.id_jadwal
                                            AND hasil.id_mapel = mapel.id_mapel AND guru.nip = '$nip'
                                            AND jadwal.ta_jadwal = '$ta_jadwal' AND jadwal.sms_jadwal = '$sms_jadwal'");

                                            while($result = mysqli_fetch_array($sql)) {
                                                    $no++;
                                        ?>
                                            <tr style="text-align: center;">
                                                <td><?=$result['id_mapel']; ?></td>
                                                <td><?=$result['nm_mapel']; ?></td>
                                                <td><?=$result['hari']; ?></td>
                                                <td><?=$result['waktu']; ?></td>

                                                <td><?=$result['kelas']; ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <form method="post" action=""><br>
                                    <div class="button" style="text-align: right;">
                                        <input type="submit" name="cetak_jadwal" value="CETAK"
                                            class="btn btn-danger btn-sm" style="text-align: left;">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    include "config/connection.php";
    if (isset($_POST['cetak_jadwal'])) { 
        $ta_jadwal = $_SESSION['ta_jadwal'];
        $sms_jadwal = $_SESSION['sms_jadwal'];
        $nip = $_SESSION['nip'];
        echo "<meta http-equiv='refresh' content='0; url=page/bukti_jadwal.php?nip=$nip&ta_jadwal=$ta_jadwal
            &sms_jadwal=$sms_jadwal'>";
    }
?>