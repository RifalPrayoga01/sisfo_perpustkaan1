<nav class="navbar navbar-expand-lg bg-body-tertiary mb-3 shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Sistem Perpustakaan</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php?modul=anggota">Anggota</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php?modul=buku">Buku</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Transaksi
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="index.php?modul=transaksi&proses=peminjaman">Peminjaman</a></li>
                        <li><a class="dropdown-item" href="index.php?modul=transaksi&proses=pengembalian">Pengembalian</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php?modul=user"></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="index.php?modul=auth&proses=logout">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>