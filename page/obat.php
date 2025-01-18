<div class="left_col" role="main">
    <div class="">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Halaman Tampil Data <small>Obat</small></h2>
                    <div class="clearfix">
                    </div>
                </div>
                <div class="btn btn-outline-primary mr-2" style="float: right;clear: both;">
                    <div style="float: right;clear: both;">
                        <a href="index.php?page=tambah_obat" class="btn-sm btn-primary"> <i
                                class="fa fa-plus"></i>TAMBAH</a>
                    </div>
                </div>

                <?php
                    include "config/connection.php";

                    if (isset($_GET['action'])) {
                        if ($_GET['action'] == 'hapus') {
                            $kd_obat = $_GET['kd_obat'];

                            $sql = mysqli_query($conn, "DELETE FROM obat WHERE kd_obat = '$kd_obat'");

                            if ($sql) {
                                echo '<div class = "alert alert-warning alert-dimissible">obat Berhasil Dihapus</div>';
                            } else {
                                echo '<div class = "error">obat Gagal Dihapus</div>';
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
                                            <th>ID</th>
                                            <th>Nama Obat</th>
                                            <th>Satuan</th>
                                            <th>Jenis Obat</th>
                                            <th>Stock</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql = mysqli_query($conn, "SELECT * FROM obat ORDER BY kd_obat");
                                            $no = 1;
                                        ?>

                                        <?php
                                                if (!$sql) {
                                                    // If the query failed, print the error
                                                    echo("Query failed: " . mysqli_error($conn));
                                                } else {
                                                    while($result=mysqli_fetch_array($sql)) {
                                                    echo '<tr>
                                                    <td>'.$result['kd_obat'].'</td>
                                                    <td>'.$result['nm_obat'].'</td>
                                                    <td>'.$result['satuan'].'</td>
                                                    <td>'.$result['jenis_obat'].'</td>
                                                    <td>'.$result['stock'].'</td>
                                                    <td align = "left">
                                                        <a href="index.php?page=edit_obat&kd_obat='.$result['kd_obat'].'"
                                                        class = "badge badge-primary">EDIT</a>
                                                        <a href="index.php?page=obat&action=hapus&kd_obat='.$result['kd_obat'].'"
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