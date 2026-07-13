<div class="col-md-2 sidebar p-3">

    <h4 class="text-white mb-4">
        📦 AssetFlow
    </h4>

    <nav class="nav flex-column">

        <a href="{{ route('admin.dashboard') }}" class="nav-link">
            🏠 Dashboard
        </a>

        <a href="{{ route('admin.barang.index') }}" class="nav-link">
            📦 Kelola Barang
        </a>

        <a href="#" class="nav-link">
            👥 Kelola Peminjam
        </a>

        <a href="#" class="nav-link">
            📄 Approval Peminjaman
        </a>

        <a href="#" class="nav-link">
            📋 Data Peminjaman
        </a>

        <a href="#" class="nav-link">
            📊 Laporan
        </a>

        <a href="#" class="nav-link">
            👤 Kelola User
        </a>

        <button
            type="button"
            class="nav-link text-danger border-0 bg-transparent w-100 text-start"
            data-bs-toggle="modal"
            data-bs-target="#logoutModalAdmin">
            🚪 Logout
        </button>

    </nav>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <div class="modal fade" id="logoutModalAdmin" tabindex="-1" aria-labelledby="logoutModalAdminLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="logoutModalAdminLabel">Konfirmasi Logout</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        Anda yakin ingin logout dari akun ini?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Ya, Logout</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>