<div class="main">
    <div class = "">
        <div class = "page_title">
            <div class = "title_left">
                <h3>Form Tambah Mapel</h3>
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
        $id_mapel=$_POST['id_mapel'];
        $nm_mapel=$_POST['nm_mapel'];
        $kkm=$_POST['kkm'];
        if(empty($id_mapel)){
            echo '<div class="warning">Data Mapel Tidak Boleh Kosong</div>';
        }else{
            $insert=mysqli_query($conn, "INSERT INTO mapel (
            id_mapel, nm_mapel, kkm)
            values ('$id_mapel', '$nm_mapel', '$kkm')" );
            if($insert){
                echo "<div class='alert alert-success alert-dismissible'>Berhasil Disimpan</div>";
                echo "<meta http-equiv='refresh' content='0 url=index.php?page=Mapel'>";
            }else{
                 echo `<div class="error">Mapel Gagal Disimpan</div>`;
            }
        }
    }
?>

<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Halaman Tambah Data Mapel </h2>
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
                        <label class="col-form-label col-md-3 col-sm-3 label-align " for="id_mapel">ID Mapel <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <input type="text" id="id_mapel" required="required" class="form-control" name="id_mapel">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align " for="nm_mapel">Nama Mapel <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <input type="text" id="nm_mapel" name="nm_mapel" required="required" class="form-control">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="kkm" class="col-form-label col-md-3 col-sm-3 label-align">KKM</label>
                        <div class="col-md-6 col-sm-6">
                            <input id="kkm" class="form-control" type="number" name="kkm">

                        </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <button type="submit" class="btn btn-success" name="simpan">SIMPAN</button>
                            <button class="btn btn-primary" type="reset">batal</ button>
                                <button class="btn btn-primary" type="button" style="color:red;"><a
                                        href="index.php?page=Mapel">Kembali </button></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>