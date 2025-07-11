<?php include('./view/layout/header.php'); ?>

<div class="container py-4">
    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1">Manajemen Anggota</h2>
            <p class="text-muted small">Kelola data anggota perpustakaan</p>
        </div>
        <a href="index.php?modul=anggota&proses=tambah" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Anggota
        </a>
    </div>

    <!-- Notification Area -->
    <?php
    if(isset($_SESSION["ERROR_SISTEM"])){
        echo '<div class="alert alert-light border alert-dismissible fade show mb-4" role="alert">
                <div class="d-flex align-items-center">
                    <i class="fas fa-exclamation-circle text-danger me-2"></i>
                    <div>'.$_SESSION["ERROR_SISTEM"].'</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              </div>';
        unset($_SESSION["ERROR_SISTEM"]);
    }

    if(isset($_SESSION["SUCCESS_SISTEM"])){
        echo '<div class="alert alert-light border alert-dismissible fade show mb-4" role="alert">
                <div class="d-flex align-items-center">
                    <i class="fas fa-check-circle text-success me-2"></i>
                    <div>'.$_SESSION["SUCCESS_SISTEM"].'</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              </div>';
        unset($_SESSION["SUCCESS_SISTEM"]);
    }
    ?>

    <!-- Members Table -->
    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th width="50">No</th>
                            <th>Nama Anggota</th>
                            <th>NPM</th>
                            <th>Jurusan</th>
                            <th width="150" class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $i=1;
                        foreach($data_anggota as $anggota): ?>
                        <tr>
                            <td class="text-muted"><?=$i?></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="bg-light rounded p-2 me-3">
                                        <i class="fas fa-user text-muted"></i>
                                    </div>
                                    <div>
                                        <div class="fw-medium"><?=$anggota['nama']?></div>
                                        <small class="text-muted"><?=$anggota['email']?></small>
                                    </div>
                                </div>
                            </td>
                            <td><?=$anggota['npm']?></td>
                            <td><?=$anggota['jurusan']?></td>
                            <td class="text-end">
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="index.php?modul=anggota&proses=ubah&npm=<?=$anggota['npm']?>" 
                                       class="btn btn-sm btn-outline-secondary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="index.php?modul=anggota&proses=proses_hapus&npm=<?=$anggota['npm']?>" 
                                       class="btn btn-sm btn-outline-danger"
                                       onclick="return confirm('Hapus anggota ini?')">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php 
                        $i+=1;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer bg-white border-0 text-muted small py-3">
            Total: <?=count($data_anggota)?> anggota
        </div>
    </div>
</div>

<?php include('./view/layout/footer.php'); ?>

<style>
    body {
        background-color: #f8f9fa;
    }
    .card {
        border-radius: 8px;
    }
    .table {
        --bs-table-hover-bg: rgba(0,0,0,0.02);
    }
    .table th {
        font-weight: 500;
        border-bottom-width: 1px;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #6c757d;
    }
    .table td {
        vertical-align: middle;
        padding: 12px 16px;
        border-bottom: 1px solid #f0f0f0;
    }
    .btn-sm {
        padding: 0.25rem 0.5rem;
    }
</style>