<?php include('./view/layout/header.php'); ?>

<div class="row">
    <div class="col-lg-12">
        <h4 class="mb-3">Pengembalian Buku</h4>

        <?php
        if(isset($_SESSION["ERROR_SISTEM"])){
            echo '<div class="alert alert-danger">'.$_SESSION["ERROR_SISTEM"].'</div>';
            unset($_SESSION["ERROR_SISTEM"]);
        }

        if(isset($_SESSION["SUCCESS_SISTEM"])){
            echo '<div class="alert alert-success">'.$_SESSION["SUCCESS_SISTEM"].'</div>';
            unset($_SESSION["SUCCESS_SISTEM"]);
        }
        ?>

        
        <div class="card mb-4 shadow">
            <div class="card-header bg-primary text-white">Form Pengembalian</div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID Pinjam</th>
                            <th>NPM</th>
                            <th>Kode Buku</th>
                            <th>Tanggal Pinjam</th>
                            <th>Deadline</th>
                            <th>Pengembalian</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = mysqli_fetch_assoc($belumKembali)) { ?>
                        <tr>
                            <td><?= $row['id_pinjam'] ?></td>
                            <td><?= $row['npm'] ?></td>
                            <td><?= $row['kode_buku'] ?></td>
                            <td><?= $row['tgl_pinjam'] ?></td>
                            <td><?= $row['deadline'] ?></td>
                            <td>
                                <form method="post" action="index.php?modul=transaksi&proses=proses_kembali" class="d-flex">
                                    <input type="hidden" name="id_pinjam" value="<?= $row['id_pinjam'] ?>">
                                    <input type="date" name="tgl_kembali" class="form-control me-2" required>
                                    <button type="submit" class="btn btn-success btn-sm">Kembalikan</button>
                                </form>
                            </td>
                        </tr>
                        <?php } ?>
                        <?php if(mysqli_num_rows($belumKembali) == 0): ?>
                        <tr>
                            <td colspan="6" class="text-center text-muted">Semua buku sudah dikembalikan.</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card shadow">
            <div class="card-header bg-secondary text-white">Riwayat Pengembalian</div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID Kembali</th>
                            <th>ID Pinjam</th>
                            <th>NPM</th>
                            <th>Kode Buku</th>
                            <th>Tgl Pinjam</th>
                            <th>Deadline</th>
                            <th>Tgl Kembali</th>
                            <th>Denda</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = mysqli_fetch_assoc($riwayat)) { ?>
                        <tr>
                            <td><?= $row['id_kembali'] ?></td>
                            <td><?= $row['id_pinjam'] ?></td>
                            <td><?= $row['npm'] ?></td>
                            <td><?= $row['kode_buku'] ?></td>
                            <td><?= $row['tgl_pinjam'] ?></td>
                            <td><?= $row['deadline'] ?></td>
                            <td><?= $row['tgl_kembali'] ?></td>
                            <td>Rp <?= number_format($row['denda'], 0, ',', '.') ?></td>
                        </tr>
                        <?php } ?>
                        <?php if(mysqli_num_rows($riwayat) == 0): ?>
                        <tr>
                            <td colspan="8" class="text-center text-muted">Belum ada riwayat pengembalian.</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include('./view/layout/footer.php'); ?>
