<div role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Form Tambah Jadwal</h3>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for..."> <span
                            class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button> </span>
                    </div>
                </div>
            </div>
        </div>
</div>
        <?php
            include "config/connection.php";

            if (isset($_POST['simpan'])) {
                // Generate new ID for jadwal
                $carikode = mysqli_query($conn, "SELECT MAX(id_jadwal) AS max_id FROM jadwal");
                if ($carikode) {
                    $datakode = mysqli_fetch_assoc($carikode);
                    $nilaikode = isset($datakode['max_id']) ? substr($datakode['max_id'], 2) : 0;
                    $kode = (int)$nilaikode + 1;
                    $hasilkode = "J-" . str_pad($kode, 3, "0", STR_PAD_LEFT);
                } else {
                    die("Error: " . mysqli_error($conn));
                }

                // Sanitize user inputs
                $id_jadwal = mysqli_real_escape_string($conn, $_POST['id_jadwal']);
                $ta_jadwal = mysqli_real_escape_string($conn, $_POST['ta_jadwal']);
                $sms_jadwal = mysqli_real_escape_string($conn, $_POST['sms_jadwal']);
                $nip = mysqli_real_escape_string($conn, $_POST['nip']);

                if (empty($id_jadwal)) {
                    echo '<div class="warning">Data jadwal tidak boleh kosong</div>';
                } else {
                    // Insert into jadwal table
                    $insert_jadwal = mysqli_query($conn, "INSERT INTO jadwal (id_jadwal, ta_jadwal, sms_jadwal, nip)
                                                        VALUES ('$id_jadwal', '$ta_jadwal', '$sms_jadwal', '$nip')");
                    if ($insert_jadwal) {
                        $id_mapel = $_POST['id_mapel'];
                        $hari = $_POST['hari'];
                        $waktu = $_POST['waktu'];
                        $kelas = $_POST['kelas'];

                        if (empty($hari)) {
                            echo '<div class="warning">Data hari tidak boleh kosong</div>';
                        } else {
                            $success = true;
                            if (is_array($hari)) {
                                foreach ($hari as $key => $value) {
                                    // Sanitize array inputs
                                    $current_id_mapel = mysqli_real_escape_string($conn, $id_mapel[$key]);
                                    $current_hari = mysqli_real_escape_string($conn, $hari[$key]);
                                    $current_waktu = mysqli_real_escape_string($conn, $waktu[$key]);
                                    $current_kelas = mysqli_real_escape_string($conn, $kelas[$key]);

                                    // Insert into hasil table
                                    $insert_hasil = mysqli_query($conn, "INSERT INTO hasil (id_jadwal, id_mapel, hari, waktu, kelas)
                                                                        VALUES ('$id_jadwal', '$current_id_mapel', '$current_hari', '$current_waktu', '$current_kelas')");
                                    if (!$insert_hasil) {
                                        $success = false;
                                        break;
                                    }
                                }
                            }

                            if ($success) {
                                echo '<div class="success">Jadwal berhasil disimpan</div>';
                                echo "<meta http-equiv='refresh' content='0; url=index.php?page=jadwal'>";
                            } else {
                                echo '<div class="error">Jadwal gagal disimpan</div>';
                            }
                        }
                    } else {
                        echo '<div class="error">Jadwal gagal disimpan</div>';
                    }
                }
            }
        ?>
        <?php
            $carikode = mysqli_query($conn,"select max(id_jadwal) from jadwal") or die (mysql_error());
            $datakode = mysqli_fetch_array($carikode);
            if ($datakode) {
                $nilaikode = substr($datakode[0], 2);
                $kode = (int) $nilaikode;
                $kode = $kode + 1;
                $hasilkode = "J-".str_pad($kode, 3, "0", STR_PAD_LEFT);
            } else {
                $hasilkode = "J-001";
            }
        ?>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Halaman Tambah Data Jadwal </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i> </a> </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false"> <i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a class="dropdown-item" href="#">Settings 1</a> </li>
                                    <li><a class="dropdown-item" href="#">Settings 2</a> </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a> </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        <br />
                        <form method="post" id="demo-form2" data-parsley-validate
                            class="form-horizontal form-label-left">
                            <div class="item form-group">
                                <label class="col-form-label col-md-1 col-sm-1 label-align for="first-name">ID Jadwal
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" id="id_jadwal" required="required" class="form-control"
                                        name="id_jadwal" value="<?php echo $hasilkode; ?>" readonly>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="middle-name" class="col-form-label col-md-1 col-sm-1 label-align">Tahun
                                    Ajaran</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <select id="ta_jadwal" name="ta_jadwal" class="form-control" required>
                                        <option value="">-- Pilih</option>
                                        <option value="2023/2024">2023/2024</option>
                                        <option value="2024/2025">2024/2025</option>
                                        <option value="2025/2026">2025/2026</option>
                                        <option value="2026/2027">2026/2027</option>
                                        <option value="2027/2028">2027/2028</option>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="sms_jadwal"
                                    class="col-form-label col-md-1 col-sm-1 label-align">Semester</label>
                                <div class="col-md-9 col-sm-9">
                                    <select id="sms_jadwal" class="form-control" name="sms_jadwal" required>
                                        <option value="">-- Pilih ---</option>
                                        <option value="Gasal">Ganjil</option>
                                        <option value="Genap">Genap</option>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="nip"
                                    class="col-form-label col-md-1 col-sm-1 label-align">NIP</label>
                                <div class="col-md-9 col-sm-9">
                                    <select id="nip" class="form-control" name="nip" required>
                                        <?php
                                            $sql_tbl_guru = mysqli_query($conn, "select * from guru order by nip asc");
                                            while($result_guru= mysqli_fetch_array($sql_tbl_guru)) {
                                                echo '<option value="' . $result_guru['nip'].'">'.$result_guru['nip'].'--'.$result_guru['nm_guru'] . '</option>';
                                            }
                                        ?>
                                    </select>
                                    <!--awal-->
                                </div>
                            </div><br>
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                data-target="#modalMapel"> TAMBAH MAPEL
                            </button><br>
                            <div class="modal fade" id="modalMapel" tabindex="-1" aria-labelledby="modalObatLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalMapelLabel">Tambah Mapel</h5>
                                            <button type="button" class="btn-close" data-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="id_mapel">Pilih Mapel</label>
                                                <select class="form-control" id="id_mapel" name="id_mapel">
                                                    <option value="0">--Pilih Mapel--</option>
                                                    <?php
                                                        $sql_tbl_mapel = mysqli_query($conn, "select * from mapel order by id_mapel asc");
                                                        while($result_mapel= mysqli_fetch_array($sql_tbl_mapel)) {
                                                            echo '<option value="' . $result_mapel['id_mapel'].'">'.$result_mapel['id_mapel'].'--'.$result_mapel['nm_mapel'].'</option>';
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="hari">Hari</label>
                                                <select class="form-control" id="hari" name="hari">
                                                    <option>--Pilih--</option>
                                                    <option value="senin">Senin</option>
                                                    <option value="selasa">Selasa</option>
                                                    <option value="rabu">Rabu</option>
                                                    <option value="kamis">Kamis</option>
                                                    <option value="jumat">Jumat</option>
                                                    <option value="sabtu">Sabtu</option>
                                                    <option value="minggu">Minggu</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="waktu">Waktu</label>
                                                <select class="form-control" id="waktu" name="waktu">
                                                    <option>--Pilih--</option>
                                                    <option value="08.00-09.00">08.00-09.00</option>
                                                    <option value="09.00-10.00">09.00-10.00</option>
                                                    <option value="10.00-11.00">10.00-11.00</option>
                                                    <option value="11.00-12.00">11.00-12.00</option>
                                                    <option value="12.00-13.00">12.00-13.00</option>
                                                    <option value="13.00-14.00">13.00-14.00</option>
                                                    <option value="14.00-15.00">14.00-15.00</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="kelas">Kelas</label>
                                                <select class="form-control" id="kelas" name="kelas">
                                                    <option>--Pilih--</option>
                                                    <option value="X">X</option>
                                                    <option value="XI">XI</option>
                                                    <option value="XII">XII</option>
                                                </select>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Batal</button> <button type="button"
                                                    class="btn btn-primary" id="tambah_modal">Tambah</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>

                            <table id="daftar_mapel" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width: 35%">Mata Pelajaran</th>
                                        <th scope="col" style="width: 20%">Hari</th>
                                        <th scope="col" style="width: 20%">Waktu</th>
                                        <th scope="col" style="width: 20%">Kelas</th>
                                        <th scope="col" style="width: 20%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-primary btn-sm" name="simpan">
                                SIMPAN
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
    $(document).ready(function() {
        $("#tambah_modal").click(function() {
            var id_mapel = $("#id_mapel").val();
            var hari = $("#hari").val();
            var waktu = $("#waktu").val();
            var kelas = $("#kelas").val();

            $('#modalMapel').modal('hide');
            markup = "<tr>" +
                "<td><input class='form-control' style='width:300px;' name='id_mapel[]' value='" +
                id_mapel + "' readonly/> </td>" +
                "<td><input class='form-control' style='width:150px;' name='hari[]' value='" + hari +
                "' readonly/> </td>" +
                "<td><input class='form-control' style='width:150px;' name='waktu[]' value='" + waktu +
                "' readonly/> </td>" +
                "<td><input class='form-control' style='width:150px;' name='kelas[]' value='"+ kelas +
                "' readonly/> </td>" +
                "<td>" +
                "<button id='deleteButton' class='fa fa-trash'"+
            "</button>"+
            "</td>" +
            "<tr>";
            tableBody = $("#daftar_mapel tbody");
            tableBody.append(markup);
            //reset form
            $("#id_mapel").val('0');
            $("#hari").val('');
            $("#waktu").val('');
            $("#kelas").val('');
        })
        $("#daftar_mapel").on("click", "#deleteButton", function() {
            $(this).closest("tr").remove();
        })
    })
</script>