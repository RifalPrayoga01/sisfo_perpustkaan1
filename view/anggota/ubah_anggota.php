<?php include('./view/layout/header.php'); ?>

<div class="row">
    <div class="col-lg-6">
        <h4 class="mb-3">Anggota</h4>
        <div class="card shadow">
            <div class="card-header">
                Ubah Anggota
            </div>
            <div class="card-body">
                <?php
                if(isset($_SESSION["ERROR_SISTEM"])){
                    echo '<div class="alert alert-danger" role="alert">'.$_SESSION["ERROR_SISTEM"].'</div>';
                    unset($_SESSION["ERROR_SISTEM"]);
                }

                if(isset($_SESSION["SUCCESS_SISTEM"])){
                    echo '<div class="alert alert-success" role="alert">'.$_SESSION["SUCCESS_SISTEM"].'</div>';
                    unset($_SESSION["SUCCESS_SISTEM"]);
                }
                ?>
                <form name="f1" action="index.php?modul=anggota&proses=proses_ubah" method="post">
                    <input type="hidden" name="npm_lama" value="<?=$data_anggota['npm']?>">
                    <div class="form-group mb-2">
                        <label>NPM :</label>
                        <input type="text" name="npm" class="form-control" required value="<?=$data_anggota['npm']?>">
                    </div>
                    <div class="form-group mb-2">
                        <label>NAMA :</label>
                        <input type="text" name="nama" class="form-control" required value="<?=$data_anggota['nama']?>">
                    </div>
                    <div class="form-group mb-2">
                        <label>Jurusan :</label>
                        <input type="text" name="jurusan" class="form-control" required value="<?=$data_anggota['jurusan']?>">
                    </div>
                    <div class="form-group mb-2">
                        <label>No. Telp :</label>
                        <input type="text" name="no_telp" class="form-control" required value="<?=$data_anggota['no_telp']?>">
                    </div>
                    <div class="form-group mb-2">
                        <label>Email :</label>
                        <input type="text" name="email" class="form-control" required value="<?=$data_anggota['email']?>">
                    </div>
                    <input type="submit" value="Simpan" class="btn btn-primary">
                </form>
            </div>
        </div>
        
    </div>
</div>

<?php include('./view/layout/footer.php'); ?>