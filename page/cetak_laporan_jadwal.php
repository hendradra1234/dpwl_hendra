<div class="left_col" role="main">
    <div class="">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <div class="x_title">
                        <h2 style="color:teal;font-weight: bold;">LAPORAN JADWAL GURU</h2>
                        <div class="clearfix"></div>
                    </div>
                    <form method="post" action=""><br>
                        <label>Tahun Ajaran</label>
                        <select name="ta_jadwal" class="form-control" target='_blank'>
                            <?php
                                include "config/connection.php";

                                $sql_tbl_jadwal =mysqli_query($conn, "SELECT DISTINCT jadwal.ta_jadwal
                                FROM jadwal ORDER BY jadwal.id_jadwal ASC");
                                while($result_jadwal=mysqli_fetch_array($sql_tbl_jadwal)){
                                    echo '<option value='.$result_jadwal['ta_jadwal'].'>' . $result_jadwal['ta_jadwal'].'</option>';
                                }
                            ?>
                        </select><br />
                        <label>Semester</label>
                        <select name="sms_jadwal" class="form-control" target='_blank'>
                            <?php
                                $sql_tbl_jadwal =mysqli_query($conn, "SELECT DISTINCT jadwal.sms_jadwal from jadwal ORDER BY
                                jadwal.id_jadwal ASC");
                                while($result_jadwal = mysqli_fetch_array($sql_tbl_jadwal)){
                                    echo '<option value='.$result_jadwal['sms_jadwal'].'>'.$result_jadwal['sms_jadwal'].'</option>';
                                }
                            ?>
                        </select><br />
                        <input type="submit" name="cetak_laporan" value="CETAK LAPORAN" class="btn btn-danger btn-sm">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
        include "config/connection.php";
        if (isset($_POST['cetak_laporan'])) {
            $_SESSION['ta_jadwal']=$_POST['ta_jadwal'];
            $_SESSION['sms_jadwal']=$_POST['sms_jadwal'];
            echo "<meta http-equiv='refresh' content='0 url=index.php?page=laporan_jadwal_guru'>";
        }
    ?>