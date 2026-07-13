<style>
    .sidebar {
        width: 260px;
        min-height: 100vh;
        height: 100%;
        display: flex;
        flex-direction: column;
        background: #172033;
        transition: width 0.35s cubic-bezier(0.22, 1, 0.36, 1), padding 0.35s ease;
        overflow-x: hidden;
        overflow-y: auto;
        position: relative;
        min-width: 80px;
        will-change: width;
    }

    .sidebar.collapsed {
        width: 80px;
    }

    .sidebar .sidebar-top {
        display: flex;
        justify-content: flex-start;
        align-items: center;
        gap: 0.75rem;
        margin-bottom: 1.5rem;
        transition: gap 0.28s ease;
    }

    .sidebar.collapsed .sidebar-top {
        justify-content: center;
        gap: 0;
    }

    .sidebar .logo-text {
        display: inline-block;
        white-space: nowrap;
        opacity: 1;
        visibility: visible;
        max-width: 180px;
        overflow: hidden;
        transform: translateX(0);
        transition: opacity 0.28s ease, visibility 0.28s ease, max-width 0.28s ease, transform 0.28s ease;
    }

    .sidebar.collapsed .logo-text {
        opacity: 0;
        visibility: hidden;
        max-width: 0;
        transform: translateX(-8px);
    }

    .sidebar .nav-link span {
        display: inline-block;
        opacity: 1;
        max-width: 180px;
        overflow: hidden;
        white-space: nowrap;
        transform: translateX(0);
        transition: opacity 0.28s ease, max-width 0.28s ease, transform 0.28s ease;
    }

    .sidebar.collapsed .nav-link span {
        opacity: 0;
        max-width: 0;
        transform: translateX(-8px);
        pointer-events: none;
    }

    .sidebar .sidebar-toggle {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 42px;
        height: 42px;
        border: none;
        background: rgba(255,255,255,.08);
        cursor: pointer;
        padding: 0;
        color: #fff;
        font-size: 1.3rem;
        border-radius: 10px;
        transition: transform 0.25s ease, background 0.25s ease, color 0.25s ease;
    }

    .sidebar .sidebar-toggle:hover {
        transform: scale(1.05);
        background: rgba(255,255,255,.16);
    }

    .sidebar .nav-link {
        color: #cbd5e1;
        padding: 12px 15px;
        border-radius: 12px;
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        gap: 12px;
        transition: background 0.25s ease, color 0.25s ease, transform 0.25s ease, padding 0.25s ease;
    }

    .sidebar .nav-link:hover {
        background: #25324b;
        color: white;
        transform: translateX(4px);
    }

    .sidebar.collapsed .nav-link {
        justify-content: center;
        padding: 12px 0;
    }

    .sidebar .nav-link.text-danger {
        color: #ff6b6b;
    }

    .sidebar hr {
        opacity: .15;
        border-color: rgba(255,255,255,.12);
    }
</style>

<script>
    const sidebarStateKey = 'sidebarCollapsed';
    let sidebar;

    function setSidebarHtmlClass(collapsed) {
        document.documentElement.classList.toggle('sidebar-collapsed', collapsed);
        document.documentElement.classList.toggle('sidebar-expanded', !collapsed);
    }

    function loadSidebarState() {
        const collapsed = localStorage.getItem(sidebarStateKey);
        const isCollapsed = collapsed !== 'false';
        if (!sidebar) return;

        sidebar.classList.toggle('collapsed', isCollapsed);
        setSidebarHtmlClass(isCollapsed);
    }

    function saveSidebarState() {
        if (!sidebar) return;
        const isCollapsed = sidebar.classList.contains('collapsed');
        localStorage.setItem(sidebarStateKey, isCollapsed);
        setSidebarHtmlClass(isCollapsed);
    }

    function toggleSidebar() {
        if (!sidebar) return;
        sidebar.classList.toggle('collapsed');
        saveSidebarState();
    }

    document.addEventListener('DOMContentLoaded', function () {
        sidebar = document.querySelector('.sidebar');
        loadSidebarState();
    });
</script>

<div class="sidebar p-3">

    <div class="sidebar-top">
        <button type="button" class="sidebar-toggle" onclick="toggleSidebar()" aria-label="Toggle sidebar" title="Klik untuk minimize/restore sidebar">
            📦
        </button>

        <div class="d-flex align-items-center gap-2">
            <span class="logo-text text-white fw-semibold">AssetFlow</span>
        </div>
    </div>

    <nav class="nav flex-column">
        <a href="{{ route('user.dashboard') }}" class="nav-link">🏠 <span>Dashboard</span></a>
        <a href="{{ route('user.barang.index') }}" class="nav-link">📋 <span>Daftar Barang</span></a>
        <a href="{{ route('user.peminjaman.index') }}" class="nav-link">📦 <span>Barang Dipinjam</span></a>
        <a href="{{ route('user.riwayat') }}" class="nav-link">🕒 <span>Riwayat</span></a>
        <a href="{{ route('user.profil') }}" class="nav-link">👤 <span>Profil</span></a>
        <button
            type="button"
            class="nav-link text-danger border-0 bg-transparent w-100 text-start"
            data-bs-toggle="modal"
            data-bs-target="#logoutModalUser">
            🚪 <span>Logout</span>
        </button>
    </nav>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <div class="modal fade" id="logoutModalUser" tabindex="-1" aria-labelledby="logoutModalUserLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="logoutModalUserLabel">Konfirmasi Logout</h5>
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