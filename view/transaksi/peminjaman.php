<?php include('./view/layout/header.php'); ?>

<div class="row">
    <div class="col-lg-6">
        <h4 class="mb-3">Transaksi Peminjaman Buku</h4>
        <div class="card shadow">
            <div class="card-header">
                Form Peminjaman
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
                <form method="post" action="index.php?modul=transaksi&proses=proses_pinjam">
                    <div class="form-group mb-2">
                        <label>NPM:</label>
                        <input type="text" name="npm" class="form-control" required>
                    </div>
                    <div class="form-group mb-2">
                        <label>Kode Buku:</label>
                        <input type="text" name="kode_buku" class="form-control" required>
                    </div>
                    <div class="form-group mb-2">
                        <label>Tanggal Pinjam:</label>
                        <input type="date" name="tgl_pinjam" class="form-control" required>
                    </div>
                    <div class="form-group mb-2">
                        <label>Deadline:</label>
                        <input type="date" name="deadline" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Tabel Daftar Peminjaman -->
    <div class="col-lg-12 mt-4">
        <h5 class="mb-3">Daftar Peminjaman</h5>
        <div class="card shadow">
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>NPM</th>
                            <th>Kode Buku</th>
                            <th>Tanggal Pinjam</th>
                            <th>Deadline</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = mysqli_fetch_assoc($data)) { ?>
                            <tr>
                                <td><?= $row['id_pinjam'] ?></td>
                                <td><?= $row['npm'] ?></td>
                                <td><?= $row['kode_buku'] ?></td>
                                <td><?= $row['tgl_pinjam'] ?></td>
                                <td><?= $row['deadline'] ?></td>
                            </tr>
                        <?php } ?>
                        <?php if(mysqli_num_rows($data) == 0): ?>
                            <tr>
                                <td colspan="5" class="text-center text-muted">Belum ada data peminjaman.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include('./view/layout/footer.php'); ?>
