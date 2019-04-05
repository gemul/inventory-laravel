<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <li class="{{ \App\Utils::checkRoute(['dashboard::index', 'admin::index']) ? 'active': '' }}">
        <a href="{{ route('dashboard::index') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
    </li>
    @if (Auth::user()->hakAkses('user-entry'))
        <li class="{{ \App\Utils::checkRoute(['admin::users.index', 'admin::users.create']) ? 'active': '' }}">
            <a href="{{ route('admin::users.index') }}">
                <i class="fa fa-user-secret"></i> <span>Users</span>
            </a>
        </li>
    @endif
    <li class="treeview menu-close">
        <a href="#">
        <i class="fa fa-book"></i> <span>Master</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="{{ \App\Utils::checkRoute(['admin::kategori']) ? 'active': '' }}">
                <a href="{{ route('admin::kategori.index') }}">
                    <span>Kategori</span>
                </a>
            </li>
            <li class="{{ \App\Utils::checkRoute(['admin::barang']) ? 'active': '' }}">
                <a href="{{ route('admin::barang.index') }}">
                    <span>Barang</span>
                </a>
            </li>
        </ul>
    </li>
    <li class="treeview menu-close">
        <a href="#">
        <i class="fa fa-book"></i> <span>Transaksi</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="{{ \App\Utils::checkRoute(['transaksi::barang']) ? 'active': '' }}">
                <a href="{{ route('transaksi::barang.index') }}">
                    <span>Barang</span>
                </a>
            </li>
            <li class="{{ \App\Utils::checkRoute(['transaksi::peminjaman']) ? 'active': '' }}">
                <a href="{{ route('transaksi::peminjaman.index') }}">
                    <span>Peminjaman</span>
                </a>
            </li>
        </ul>
        <li class="{{ \App\Utils::checkRoute(['peminjaman::index']) ? 'active': '' }}">
            <a href="{{ route('peminjaman::index') }}">
                <i class="fa fa-id-card"></i>
                <span>Peminjaman</span>
            </a>
        </li>
    </li>
</ul>
