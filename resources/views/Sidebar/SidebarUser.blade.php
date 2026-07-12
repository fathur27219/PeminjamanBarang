<style>
    .sidebar {
        width: 260px;
        min-height: 100vh;
        height: 100%;
        display: flex;
        flex-direction: column;
        background: #172033;
        transition: width .3s ease, padding .3s ease;
        overflow: hidden;
        position: relative;
        min-width: 80px;
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
    }

    .sidebar.collapsed .sidebar-top {
        justify-content: center;
    }

    .sidebar .logo-text {
        display: inline-block;
        white-space: nowrap;
        transition: opacity .3s ease, visibility .3s ease, width .3s ease;
    }

    .sidebar.collapsed .logo-text {
        opacity: 0;
        visibility: hidden;
        width: 0;
        overflow: hidden;
    }

    .sidebar.collapsed .nav-link span {
        display: none;
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
        transition: transform .3s ease, background .3s ease;
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
        transition: background .3s ease, color .3s ease, transform .3s ease;
    }

    .sidebar .nav-link:hover {
        background: #25324b;
        color: white;
        transform: translateX(5px);
    }

    .sidebar.collapsed .nav-link {
        justify-content: center;
    }

    .sidebar.collapsed .nav-link span {
        display: none;
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
        <a href="#" class="nav-link">👤 <span>Profil</span></a>
        <a href="#" class="nav-link text-danger">🚪 <span>Logout</span></a>
    </nav>

</div>