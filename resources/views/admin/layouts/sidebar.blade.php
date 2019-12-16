<section class="sidebar">
      <!-- Sidebar user panel -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">BERANDA</li>
        <li><a href="{{ url('/') }}"><i class="fa fa-fw fa-home"></i> Home</span></a></li>

        <li class="header">EVENT</li>
        @if(\Auth::user()->name=='admin')
        <li><a href="{{ url('admin/user') }}"><i class="fa fa-fw fa-user"></i> Public User Account </span></a></li>
        <li><a href="{{ url('admin/kategori') }}"><i class="fa fa-fw fa-tags"></i> Kategori Event</span></a></li>
        @endif
        <li><a href="{{ url('admin/komentar') }}"><i class="fa fa-fw fa-bullhorn"></i> Komentar</span></a></li>
        <li><a href="{{ url('admin/artikel') }}"><i class="fa fa-fw fa-pencil"></i> Upload Informasi Event</span></a></li>
        
        

        <li class="header">OTHER</li>
        <li><a href="{{ url('/keluar') }}"><span class="glyphicon glyphicon-log-out"></span> Logout</span></a></li>


      </ul>
    </section>