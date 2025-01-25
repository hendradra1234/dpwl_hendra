<?php
    include "config/connection.php";

    $ta_jadwal = $_SESSION['ta_jadwal'];
    $sms_jadwal = $_SESSION['sms_jadwal'];
    $sql_data_jadwal = mysqli_query ($conn, "SELECT jadwal.*, guru.*, hasil.hari, hasil.waktu, hasil.kelas, mapel.*
    FROM jadwal, guru, mapel, hasil
    WHERE jadwal.nip = guru.nip
    AND hasil.id_jadwal = jadwal.id_jadwal
    AND hasil.id_mapel = mapel.id_mapel
    AND jadwal.ta_jadwal = '$ta_jadwal'
    AND jadwal.sms_jadwal = '$sms_jadwal'");
    $result_data_jadwal = mysqli_fetch_array($sql_data_jadwal);
    $no=1;
?>
<h3 style="color:black;font-weight:bold;">
    <center>LAPORAN JADWAL GURU<br>
        SEMESTER : <?=$result_data_jadwal['sms_jadwal']; ?>, TAHUN AJARAN : <?=$result_data_jadwal['ta_jadwal']; ?>
    </center>
</H3>
    <table width="963" class="table table-bordered" border="1" align="center">
        <tr style="background-color: teal; color:black;text-align: center;">
            <th width="34"><i class=""></i>No</th>
            <th width="239"><i class=""></i>N I P</th>
            <th width="239"><i class=""></i>Nama Guru</th>
            <th width="239"><i class=""></i>Mata Pelajaran</th>
            <th width="200"><i class=""></i>Hari</th>
            <th width="400"><i class=""></i>Waktu</th>
            <th width="340"><i class=""></i>Kelas</th>
        </tr>

        <?php
            $sql_data_jadwal1 = mysqli_query ($conn, "SELECT
            jadwal.*,guru.*,hasil.hari,hasil.waktu,hasil.kelas,mapel.* from jadwal,guru,mapel,hasil where jadwal.nip=guru.nip and hasil.id_jadwal=jadwal.id_jadwal and hasil.id_mapel=mapel.id_mapel and jadwal.ta_jadwal='$ta_jadwal' and jadwal.sms_jadwal='$sms_jadwal'");
            $no=1;
            while(
                $result_jadwal = mysqli_fetch_array($sql_data_jadwal1)){
                    echo '<tr align="center"><td>'.$no.'</td>
                    <td>' .$result_jadwal['nip'].'</td>
                    <td>'.$result_jadwal['nm_guru'].'</td>
                    <td>' .$result_jadwal['nm_mapel'].'</td>
                    <td>'.$result_jadwal['hari'].'</td>
                    <td>'.$result_jadwal['waktu'].'</td>
                    <td>'.$result_jadwal['kelas'].'</td>
                    </tr>';
                    $no++;
                }
        ?>
    </table>
<script>
    window.onload = window.print;
</script>