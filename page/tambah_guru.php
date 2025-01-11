<div class="main">
    <div class = "">
        <div class = "page_title">
            <div class = "title_left">
                <h3>Form Tambah Guru</h3>
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
        $nip=$_POST['nip'];
        $nm_guru=$_POST['nm_guru'];
        $tmp_lahir=$_POST['tmp_lahir'];
        $tgl_lahir=$_POST['tgl_lahir']; $jenkel=$_POST['jenkel'];
        $pendidikan_terakhir=$_POST['pendidikan_terakhir'];
        $alamat=$_POST['alamat'];
        if(empty($nip)){
            echo '<div class="warning">Data guru Tidak Boleh Kosong</div>';
        }else{
            $insert=mysqli_query($conn, "insert into guru (
            nip,nm_guru,tmp_lahir,tgl_lahir,jenkel, pendidikan_terakhir, alamat)
            values ('$nip', '$nm_guru', '$tmp_lahir', '$tgl_lahir', '$jenkel', '$pendidikan_terakhir', '$alamat')" );
            if($insert){
                echo "<div class='alert alert-success alert-dismissible'>Berhasil Disimpan</div>";
                echo "<meta http-equiv='refresh' content='0 url=index.php?page=guru'>";
            }else{
                 echo `<div class="error">guru Gagal Disimpan</div>`;
            }
        }
    }
?>

<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Halaman Tambah Data Guru </h2>
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
                        <label class="col-form-label col-md-3 col-sm-3 label-align " for="first-name">NIP <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <input type="text" id="first-name" required="required" class="form-control" name="nip">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align " for="last-name">Nama Guru <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <input type="text" id="last-name" name="nm_guru" required="required" class="form-control">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Tempat
                            Lahir</label>
                        <div class="col-md-6 col-sm-6">
                            <input id="middle-name" class="form-control" type="text" name="tmp_lahir">

                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Tanggal
                            Lahir</label>
                        <div class="col-md-6 col-sm-6">
                            <input id="middle-name" class="form-control" type="date" name="tgl_lahir">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Jenis
                            Kelamin</label>
                        <div class="col-md-6 col-sm-6">
                            <select id="middle-name" class="form-control" name="jenkel" required>
                                <option value="">-- Pilih ---</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Pendidikan
                            Terakhir</label>
                        <div class="col-md-6 col-sm-6">
                            <select id="middle-name" name="pendidikan_terakhir" class="form-control" required>
                                <option value="">-- Pilih ---</option>
                                <option value="3">3</option>
                                <option value="52">S2</option>
                                <option value="S1">1</option>
                                <option value="D3">D3</option>
                                <option value="SMA">SMA</option>
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Alamat</label>
                        <div class="col-md-6 col-sm-6">
                            <textarea id="middle-name" class="form-control" type="text" name="alamat"></textarea>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <button type="submit" class="btn btn-success" name="simpan">SIMPAN</button>
                            <button class="btn btn-primary" type="reset">batal</ button>
                                <button class="btn btn-primary" type="button" style="color:red;"><a
                                        href="index.php?page=guru">Kembali </button></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>