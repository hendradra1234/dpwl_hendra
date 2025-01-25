<div class="left_col" role="main">
    <div class="">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Halaman Tampil Data <small>Jadwal</small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="btn btn-outline-primary mr-2" style="float: right;clear: both;">
                    <div style="float: right;clear: both;">
                        <a href="index.php?page=tambah_jadwal" class="btn-sm btn-primary">
                            <i class="fa fa-plus"></i>
                            TAMBAH DATA</a>
                    </div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-box table-responsive">
                                <?php
                                    include "config/connection.php";

                                    //hapus data Jadwal
                                    if(isset($_GET['action'])) {
                                        if($_GET['action']=='hapus') {
                                            $id_jadwal = $_GET['id_jadwal'];
                                            $sql =mysqli_query($conn,"DELETE jadwal.*, hasil.* FROM jadwal, hasil
                                                WHERE jadwal.id_jadwal = hasil.id_jadwal
                                                AND jadwal.id_jadwal = '$id_jadwal'");
                                            if($sql){
                                                echo '<div class="alert alert-warning alert-dismissible">jadwal Berhasil Dihapus</div>'; }else{
                                                echo '<div class="error">jadwal Gagal Dihapus</div>';
                                            }
                                        }
                                }
                                ?>

                                <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID Jadwal</th>
                                            <th>Tahun Ajaran</th>
                                            <th>Semester</th>
                                            <th>NIP</th>
                                            <th>Nama Guru</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $no=0;
                                        $sql =mysqli_query($conn,"select jadwal.*,guru.* from jadwal,guru where jadwal.nip-guru.nip order by jadwal.id_jadwal");
                                        while($result = mysqli_fetch_array($sql)){
                                            $no++;
                                    ?>
                                        <tr>
                                            <td><?=$result['id_jadwal']; ?></td>
                                            <td><?=$result['ta_jadwal']; ?></td>
                                            <td><?=$result['sms_jadwal']; ?></td>
                                            <td><?=$result['nip']; ?></td>
                                            <td><?=$result['nm_guru']; ?></td>
                                            <td>
                                                <a href="index.php?page=jadwal&action=hapus&id_jadwal=<?= $result['id_jadwal']?>" class="badge badge-danger">HAPUS</a>
                                                <a href="index.php?page=detail_jadwal&id_jadwal=<?= $result['id_jadwal']?>"
                                                    class="badge_badge-primary">DETAIL</a>
                                            </td>
                                        </tr>
                                    <?php
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