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

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button
                type="submit"
                class="nav-link text-danger border-0 bg-transparent w-100 text-start">
                🚪 Logout
            </button>
        </form>

    </nav>

</div>