<div class="left_col" role="main">
    <div class="">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Halaman Tampil Data <small>Guru</small></h2>
                    <div class="clearfix">
                    </div>
                </div>
                <div class="btn btn-outline-primary mr-2" style="float: right;clear: both;">
                    <div style="float: right;clear: both;">
                        <a href="index.php?page=tambah_guru" class="btn-sm btn-primary"> <i
                                class="fa fa-plus"></i>TAMBAH</a>
                    </div>
                </div>

                <?php
                    include "config/connection.php";

                    if (isset($_GET['action'])) {
                        if ($_GET['action'] == 'hapus') {
                            $nip = $_GET['nip'];

                            $sql = mysqli_query($conn, "DELETE FROM guru WHERE nip = '$nip'");

                            if ($sql) {
                                echo '<div class = "alert alert-warning alert-dimissible">Guru Berhasil Dihapus</div>';
                            } else {
                                echo '<div class = "error">Guru Gagal Dihapus</div>';
                            }
                        }
                    }
                ?>

                <div class="x_content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-box table-responsive">
                                <table id="datatable-buttons" class="table table-striped table-bordered"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>NIP</th>
                                            <th>Nama Guru</th>
                                            <th>Tempat Lahir</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Pendidikan</th>
                                            <th>Alamat</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql = mysqli_query($conn, "SELECT * FROM guru ORDER BY nip");
                                            $no = 1;
                                        ?>

                                        <?php
                                                if (!$sql) {
                                                    // If the query failed, print the error
                                                    echo("Query failed: " . mysqli_error($conn));
                                                } else {
                                                    while($result=mysqli_fetch_array($sql)) {
                                                    echo '<tr>
                                                    <td>'.$result['nip'].'</td>
                                                    <td>'.$result['nm_guru'].'</td>
                                                    <td>'.$result['tmp_lahir'].'</td>
                                                    <td>'.$result['tgl_lahir'].'</td>
                                                    <td>'.$result['jenkel'].'</td>
                                                    <td>'.$result['pendidikan_terakhir'].'</td>
                                                    <td>'.$result['alamat'].'</td>
                                                    <td align = "left">
                                                        <a href="index.php?page=edit_guru&nip='.$result['nip'].'"
                                                        class = "badge badge-primary">EDIT</a>
                                                        <a href="index.php?page=guru&action=hapus&nip='.$result['nip'].'"
                                                        class = "badge badge-danger">HAPUS</a>
                                                    </td>
                                                    </tr>';
                                                    $no++;
                                            }
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>