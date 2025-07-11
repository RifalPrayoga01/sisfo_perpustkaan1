<?php include('./view/layout/header.php'); ?>

<div class="row">
    <div class="col-lg-6">
        <h4 class="mb-3">Buku</h4>
        <div class="card shadow">
            <div class="card-header">
                Ubah Buku
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
                <form name="f1" action="index.php?modul=buku&proses=proses_ubah" method="post">
                    <input type="hidden" name="kodebuku_lama" value="<?=$data_buku['kode_buku']?>">
                    <div class="form-group mb-2">
                        <label>Kode :</label>
                        <input type="text" name="kode_buku" class="form-control" required value="<?=$data_buku['kode_buku']?>">
                    </div>
                    <div class="form-group mb-2">
                        <label>ISBN :</label>
                        <input type="text" name="isbn" class="form-control" required value="<?=$data_buku['isbn']?>">
                    </div>
                    <div class="form-group mb-2">
                        <label>Judul :</label>
                        <input type="text" name="judul" class="form-control" required value="<?=$data_buku['judul']?>">
                    </div>
                    <div class="form-group mb-2">
                        <label>Pengarang :</label>
                        <input type="text" name="pengarang" class="form-control" required value="<?=$data_buku['pengarang']?>">
                    </div>
                    <div class="form-group mb-2">
                        <label>Tahun :</label>
                        <input type="text" name="tahun" class="form-control" required value="<?=$data_buku['tahun']?>">
                    </div>
                    <div class="form-group mb-2">
                        <label>Penerbit :</label>
                        <input type="text" name="penerbit" class="form-control" required value="<?=$data_buku['penerbit']?>">
                    </div>
                    <input type="submit" value="Simpan" class="btn btn-primary">
                </form>
            </div>
        </div>
        
    </div>
</div>

<?php include('./view/layout/footer.php'); ?>