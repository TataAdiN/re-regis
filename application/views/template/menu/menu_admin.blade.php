<li class="menu-header">Dashboard</li>
<li class="dropdown {{ $num == 1 ? 'active' : '' }}">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
    <ul class="dropdown-menu">
        <li><a class="nav-link" href="dashboard-general.html">General Dashboard</a></li>
        <li><a class="nav-link" href="dashboard-ecommerce.html">Ecommerce Dashboard</a></li>
    </ul>
</li>
<li class="menu-header">Master</li>
<li {{ $num == 2 ? 'class=active' : '' }}><a class="nav-link" href="{{base_url('admin/berkas')}}"><i class="far fa-file"></i> <span>Berkas</span></a></li>
<li {{ $num == 3 ? 'class=active' : '' }}><a class="nav-link" href="{{base_url('admin/student')}}"><i class="far fa-user"></i> <span>Mahasiswa</span></a></li>