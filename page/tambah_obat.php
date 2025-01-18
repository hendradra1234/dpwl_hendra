<div class="main">
    <div class = "">
        <div class = "page_title">
            <div class = "title_left">
                <h3>Form Tambah obat</h3>
            </div>
        </div>

        <div class = "title_right">
            <div class = "col-md-5 col-sm-5 form-group pull-right top_search">
                <div class = "imput_group">
                    <input type = "text" class = "form-control" placeholder = "Search for...">
                    <span class = "input-group-list">
                        <button class ="btn btn-default"  type = "button">Go</button>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    if(isset($_POST['simpan'])) {
        $kd_obat=$_POST['kd_obat'];
        $nm_obat=$_POST['nm_obat'];
        $satuan=$_POST['satuan'];
        $jenis_obat=$_POST['jenis_obat'];
        $stock=$_POST['stock'];
        if(empty($kd_obat)){
            echo '<div class="warning">Data obat Tidak Boleh Kosong</div>';
        }else{
            $insert=mysqli_query($conn, "insert into obat (
            kd_obat,nm_obat,satuan,jenis_obat,stock)
            values ('$kd_obat', '$nm_obat', '$satuan', '$jenis_obat', '$stock')" );
            if($insert){
                echo "<div class='alert alert-success alert-dismissible'>Berhasil Disimpan</div>";
                echo "<meta http-equiv='refresh' content='0 url=index.php?page=obat'>";
            }else{
                 echo `<div class="error">obat Gagal Disimpan</div>`;
            }
        }
    }
?>

<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Halaman Tambah Data Obat </h2>
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
                            <input type="text" id="stock" required="required" class="form-control" name="kd_obat">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align " for="last-name">Nama Obat <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <input type="text" id="last-name" name="nm_obat" required="required" class="form-control">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Satuan</label>
                        <div class="col-md-6 col-sm-6">
                            <select id="middle-name" name="satuan" class="form-control" required>
                                <option value="">-- Pilih ---</option>
                                <option value="gr">gr</option>
                                <option value="piece">Piece</option>
                                <option value="unit">Unit</option>
                                <option value="tablet">Tablet</option>
                                <option value="botol">Botol</option>
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Jenis Obat</label>
                        <div class="col-md-6 col-sm-6">
                            <select id="middle-name" name="jenis_obat" class="form-control" required>
                                <option value="">-- Pilih ---</option>
                                <option value="pain-killer">pain-killer</option>
                                <option value="anti-inflamation">anti-inflamation</option>
                                <option value="depresant">depresant</option>
                                <option value="turning-kit">Turning-kit</option>
                                <option value="bandages">bandages</option>
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align " for="stock">Stock <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <input type="number" id="stock" required="required" class="form-control" name="stock">
                        </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <button type="submit" class="btn btn-success" name="simpan">SIMPAN</button>
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