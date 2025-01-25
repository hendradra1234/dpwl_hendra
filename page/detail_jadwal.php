<div class="left_col" role="main">
    <div class="">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Halaman Tampil Data <small>Jadwal</small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-box table-responsive">

                                <?php
                                    include "config/connection.php";

                                    $pesan = '';
                                    $id_jadwal= $_GET['id_jadwal'];
                                    $cek_mapel = mysqli_query($conn, "SELECT * FROM hasil, mapel WHERE hasil.id_mapel AND hasil.id_jadwal='$id_jadwal';");
                                    if(mysqli_num_rows($cek_mapel) <= 0) {
                                        $pesan = '
                                            <div class="alert alert-danger alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">*</button>
                                            <h5><i close="icon fas fa-ban"></i> Gagal!</h5>
                                            Detail Pesanan tidak ada di database !!
                                            </div>';
                                    }
                                ?>
                                <?php
                                    echo $pesan;
                                    $no = 1;
                                ?>
                                <?php if(mysqli_num_rows($cek_mapel) > 0): ?>
                                <table id="datatable-buttons" class="table table-striped table-bordered"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID Mapel</th>
                                            <th>Mata Pelajaran</th>
                                            <th>Hari</th>
                                            <th>Waktu</th>
                                            <th>Kelas</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <?php while($mapel = mysqli_fetch_array($cek_mapel)): ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $mapel['id_mapel'] ?></td>
                                            <td><?= $mapel['nm_mapel'] ?></td>
                                            <td><?= $mapel['hari'] ?></td>
                                            <td><?= $mapel['waktu'] ?></td>
                                            <td><?= $mapel['kelas'] ?></td>
                                        </tr>
                                        <?php $no++ ?>
                                        <?php endwhile ?>
                                    </tbody>
                                </table>
                                <?php endif ?>
                                <button class="btn btn-success" type="button" style="color:red;"><a
                                        href=" index.php?page=jadwal">Kembali</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>