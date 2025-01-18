<div role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Halaman Ubah Data</h3>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $id_mapel = $_GET['id_mapel'];
        if(isset($_POST['ubah'])) {
            $nm_mapel = $_POST['nm_mapel'];
            $kkm = $_POST['kkm'];

            if(empty($kkm) || empty($nm_mapel)) {
                echo '<div class="warning">Data Tidak Boleh Kosong</div>';
            } else {
                $edit = mysqli_query($conn, "UPDATE mapel SET nm_mapel='$nm_mapel', kkm='$kkm' WHERE id_mapel='$id_mapel'");

                if($edit) {
                    echo '<div class="success">mapel Berhasil Diedit!</div>';
                    echo '<meta http-equiv="refresh" content="0; url=index.php?page=mapel">';
                } else {
                    echo '<div class="error">mapel Gagal Diedit!</div>';
                }
            }
        }

        $sql = mysqli_query($conn, "SELECT * FROM mapel WHERE id_mapel='$id_mapel'");
        $result = mysqli_fetch_array($sql);
        ?>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Halaman Ubah Data mapel</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Settings 1</a></li>
                                    <li><a href="#">Settings 2</a></li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form method="post" id="demo-form2" data-parsley-validate
                            class="form-horizontal form-label-left">
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="id_mapel">
                                    id_mapel <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" id="id_mapel" required="required" disabled class="form-control"
                                        name="id_mapel" value="<?php echo $id_mapel; ?>">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="nm_mapel">
                                    Nama mapel <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" id="nm_mapel" name="nm_mapel" required="required"
                                        value="<?php echo $result['nm_mapel']; ?>" class="form-control">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label for="kkm" class="col-form-label col-md-3 col-sm-3 label-align">KKM</label>
                                <div class="col-md-6 col-sm-6">
                                    <input id="kkm" class="form-control" type="number" name="kkm"
                                        value="<?php echo $result['kkm']; ?>">
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button type="submit" class="btn btn-success" name="ubah">UBAH</button>
                                    <button class="btn btn-primary" type="reset">BATAL</ button>
                                        <button class="btn btn-warning" type="button" style="color:red;"><a
                                                href="index.php?page=mapel">Kembali </button></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>