<li class="menu-header">Dashboard</li>
<li {{ $num == 4 ? 'class=active' : '' }}><a class="nav-link" href="{{base_url('admin/monitor')}}"><i class="far fa-file"></i> <span>Monitor Mahasiswa</span></a></li>
<li class="menu-header">Master</li>
<li {{ $num == 2 ? 'class=active' : '' }}><a class="nav-link" href="{{base_url('admin/berkas')}}"><i class="far fa-file"></i> <span>Berkas</span></a></li>
<li {{ $num == 3 ? 'class=active' : '' }}><a class="nav-link" href="{{base_url('admin/student')}}"><i class="far fa-user"></i> <span>Mahasiswa</span></a></li>