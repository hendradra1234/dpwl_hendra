<?php
    include "config/connection.php";
?>
<div class="left_col" role="main">
    <div class="">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2 style="color:teal;font-weight: bold;">CETAK JADWAL GURU</h2>
                    <div class="clearfix"></div>
                </div>
                <form method="post" action=""><br>
                    <label>Tahun Ajaran</label>
                    <select name="ta_jadwal" class="form-control" target='_blank'>
                    <?php
                        $sql_tbl_jadwal =mysqli_query($conn, "SELECT DISTINCT jadwal.ta_jadwal FROM jadwal ORDER BY jadwal.id_jadwal ASC");
                        while($result_jadwal = mysqli_fetch_array($sql_tbl_jadwal)){
                            echo '<option value='.$result_jadwal['ta_jadwal'].'>'.$result_jadwal['ta_jadwal'].'</option>';
                        }
                    ?>
                    </select><br />
                    <label>Semester</label>
                    <select name="sms_jadwal" class="form-control" target='_blank'> 
                    <?php
                        $sql_tbl_jadwal =mysqli_query($conn, "SELECT DISTINCT jadwal.sms_jadwal FROM jadwal ORDER BY jadwal.id_jadwal ASC");
                        while ($result_jadwal = mysqli_fetch_array($sql_tbl_jadwal)){
                            echo '<option value='.$result_jadwal['sms_jadwal'].'>'.$result_jadwal['sms_jadwal'].'</option>';
                        }
                    ?>
                    </select><br />
                    <label>Nama Guru</label>
                    <select name="nip" class="form-control" target='_blank'>
                    <?php
                        $sql_tbl_jadwal =mysqli_query($conn, "SELECT DISTINCT guru.nip, guru.nm_guru FROM guru ORDER BY nip ASC");
                        while($result_jadwal = mysqli_fetch_array($sql_tbl_jadwal)){
                            echo '<option value='.$result_jadwal['nip'].'>'.$result_jadwal['nip']. '--' . $result_jadwal['nm_guru'].'</option>';
                        }
                    ?>
                    </select><br />
                    <input type="submit" name="lihat_jadwal" value="LIHAT JADWAL" class="btn btn-danger btn-sm">
                </form>
            </div>
        </div>
    </div>
</div>
<br><br>
<?php
    include "config/connection.php";
    if (isset($_POST['lihat_jadwal'])) {
        $_SESSION['ta_jadwal']=$_POST['ta_jadwal'];
        $_SESSION['sms_jadwal']=$_POST['sms_jadwal'];
        $_SESSION['nip']=$_POST['nip'];
        echo "<meta http-equiv='refresh' content='0 url=index.php?page=lihat_jadwal'>";
    }
?>
