<div class="sidebar">
    <!-- SidebarSearch Form -->
    <div class="form-inline mt-2">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div>
    <style>
        /* Sidebar Background */
/* Sidebar Background with Gradient */
.sidebar {
    background: linear-gradient(135deg, #2c3e50); /* Warna gradien */
    color: #ecf0f1;
    padding: 15px;
    position: relative;
}

/* Sidebar Profile Section */
.sidebar-profile {
    display: flex;
    align-items: center;
    padding: 20px 15px;
    margin-bottom: 20px;
    background-color: rgba(255, 255, 255, 0.1); /* Semi-transparan background */
    border-radius: 10px;
}

.sidebar-profile img {
    width: 50px;
    height: 50px;
    border-radius: 50%; /* Membuat foto profil melingkar */
    margin-right: 15px;
    border: 2px solid #1abc9c;
}

.sidebar-profile .profile-name {
    font-size: 16px;
    font-weight: bold;
    color: #ecf0f1;
}

.sidebar-profile .profile-role {
    font-size: 12px;
    color: #bdc3c7;
}

/* Styling for Search Input */
.form-control-sidebar {
    background-color: #34495e;
    border: none;
    color: #ecf0f1;
    border-radius: 20px;
    padding: 10px 15px;
    transition: all 0.3s ease;
}

.form-control-sidebar:focus {
    background-color: #2c3e50;
    outline: none;
}

/* Search Button Styling */
.btn-sidebar {
    background-color: #1abc9c;
    color: #fff;
    border: none;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background-color 0.3s ease;
}

.btn-sidebar:hover {
    background-color: #16a085;
}

/* Sidebar Links */
.nav-sidebar .nav-link {
    color: #ecf0f1;
    margin-bottom: 10px;
    padding: 12px 20px;
    border-radius: 10px;
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
}

/* Background gradient effect on hover */
.nav-sidebar .nav-link::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 300%;
    height: 100%;
    background: linear-gradient(to right, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0));
    transition: left 0.4s ease;
}

.nav-sidebar .nav-link:hover::before {
    left: 0;
}

.nav-sidebar .nav-link:hover {
    transform: translateY(-5px); /* Floating effect */
    background-color: rgba(255, 255, 255, 0.2);
}

/* Active Link */
.nav-sidebar .nav-link.active {
    background-color: #16a085;
    font-weight: bold;
    box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.3); /* Bayangan */
}

/* Icon Styling */
.nav-icon {
    margin-right: 10px;
    color: #1abc9c;
    transition: transform 0.3s ease;
}

.nav-sidebar .nav-link:hover .nav-icon {
    transform: rotate(360deg); /* Animasi putaran pada icon */
}

/* Header Styling */
.nav-header {
    color: #95a5a6;
    text-transform: uppercase;
    font-size: 14px;
    margin-top: 20px;
    letter-spacing: 1px;
}

/* Sidebar Divider */
.sidebar-divider {
    height: 1px;
    background-color: #7f8c8d;
    margin: 15px 0;
}

/* Custom Scrollbar */
.sidebar {
    overflow-y: auto;
}

.sidebar::-webkit-scrollbar {
    width: 6px;
}

.sidebar::-webkit-scrollbar-thumb {
    background-color: #1abc9c;
    border-radius: 10px;
}

</style>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ url('/dashboard') }}" class="nav-link {{ $activeMenu == 'dashboard' ? 'active' : '' }} ">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-header">Data Pengguna</li>
            <li class="nav-item">
                <a href="{{ url('/level') }}" class="nav-link {{ $activeMenu == 'level' ? 'active' : '' }} ">
                    <i class="nav-icon fas fa-layer-group"></i>
                    <p>Level User</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/user') }}" class="nav-link {{ $activeMenu == 'user' ? 'active' : '' }}">
                    <i class="nav-icon far fa-user"></i>
                    <p>Data User</p>
                </a>
            </li>
            <li class="nav-header">Data Barang</li>
            <li class="nav-item">
                <a href="{{ url('/kategori') }}" class="nav-link {{ $activeMenu == 'kategori' ? 'active' : '' }} ">
                    <i class="nav-icon far fa-bookmark"></i>
                    <p>Kategori Barang</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/barang') }}" class="nav-link {{ $activeMenu == 'barang' ? 'active' : '' }} ">
                    <i class="nav-icon far fa-list-alt"></i>
                    <p>Data Barang</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/supplier') }}" class="nav-link {{ $activeMenu == 'supplier' ? 'active' : '' }} ">
                    <i class="nav-icon fas fa-shipping-fast"></i>
                    <p>Supplier</p>
                </a>
            </li>
            <li class="nav-header">Data Transaksi</li>
            <li class="nav-item">
                <a href="{{ url('/stok') }}" class="nav-link {{ $activeMenu == 'stok' ? 'active' : '' }} ">
                    <i class="nav-icon fas fa-cubes"></i>
                    <p>Stok Barang</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/penjualan') }}" class="nav-link {{ $activeMenu == 'penjualan' ? 'active' : '' }} ">
                    <i class="nav-icon fas fa-cash-register"></i>
                    <p>Transaksi Penjualan</p>
                </a>
            </li>
        </ul>
    </nav>

</div>
