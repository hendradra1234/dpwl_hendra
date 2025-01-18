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
        $kd_obat = $_GET['kd_obat'];
        if(isset($_POST['ubah'])) {
            $nm_obat=$_POST['nm_obat'];
            $satuan=$_POST['satuan'];
            $jenis_obat=$_POST['jenis_obat'];
            $stock=$_POST['stock'];

            if(empty($nm_obat)) {
                echo '<div class="warning">Data Tidak Boleh Kosong</div>';
            } else {
                $edit = mysqli_query($conn, "UPDATE obat SET nm_obat='$nm_obat', satuan='$satuan',
                jenis_obat='$jenis_obat', stock='$stock' WHERE kd_obat='$kd_obat'");

                if($edit) {
                    echo '<div class="success">obat Berhasil Diedit!</div>';
                    echo '<meta http-equiv="refresh" content="0; url=index.php?page=obat">';
                } else {
                    echo '<div class="error">obat Gagal Diedit!</div>';
                }
            }
        }

      $sql = mysqli_query($conn, "SELECT * FROM obat WHERE kd_obat='$kd_obat'");
      $result = mysqli_fetch_array($sql);
    ?>
      <div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Edit Data Obat </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i </a> </li> <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-haspopup="true" aria-expanded="false"> <i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a class="dropdown-item" href="#">Settings 1</a> </li>
                                <li><a class="dropdown-item" href="#">Settings_2</a> </li>
                            </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a> </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <form method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align " for="stock">ID <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <input type="text"disabled id="id_obat" value="<?php echo $result['kd_obat']; ?>" class="form-control" name="kd_obat">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align " for="nm_obat">Nama Obat <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <input type="text" id="nm_obat" name="nm_obat" required="required" class="form-control" value="<?php echo $result['nm_obat']; ?>">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="satuan" class="col-form-label col-md-3 col-sm-3 label-align">Satuan</label>
                        <div class="col-md-6 col-sm-6">
                            <select id="satuan" name="satuan" class="form-control" required>
                                <option value="">-- Pilih ---</option>
                                <?php
                                $options = ['gr' => 'gr', 'piece' => 'Piece', 'unit' => 'Unit', 'tablet' => 'Tablet', 'botol' => 'Botol'];
                                foreach ($options as $value => $label) {
                                    echo "<option value=\"$value\" " . ($result['satuan'] == $value ? 'selected' : '') . ">$label</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="jenis_obat" class="col-form-label col-md-3 col-sm-3 label-align">Jenis Obat</label>
                        <div class="col-md-6 col-sm-6">
                            <select id="jenis_obat" name="jenis_obat" class="form-control" required>
                                <option value="">-- Pilih ---</option>
                                <?php
                                $jenis_obat_options = [
                                    'pain-killer' => 'pain-killer',
                                    'anti-inflamation' => 'anti-inflamation',
                                    'depresant' => 'depresant',
                                    'turning-kit' => 'Turning-kit',
                                    'bandages' => 'bandages'
                                ];
                                foreach ($jenis_obat_options as $value => $label) {
                                    echo "<option value=\"$value\" " . ($result['jenis_obat'] == $value ? 'selected' : '') . ">$label</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align " for="stock">Stock <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <input type="number" id="stock" required="required" class="form-control" name="stock" value="<?php echo $result['stock']; ?>">
                        </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <button type="submit" class="btn btn-success" name="ubah">EDIT</button>
                            <button class="btn btn-primary" type="reset">batal</ button>
                                <button class="btn btn-primary" type="button" style="color:red;"><a
                                        href="index.php?page=obat">Kembali </button></a>
                        </div>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>