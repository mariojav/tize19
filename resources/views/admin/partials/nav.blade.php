<!-- Sidebar Menu -->
<ul class="sidebar-menu" data-widget="tree">
        <li class="header">NAVEGACION</li>
        <!-- Optionally, you can add icons to the links -->
        {{-- <li {{ request()->is('admin') ? 'class=active' : ''}}><a href="{{route('dashboard')}}"><i class="fa fa-link"></i> <span>inicio</span></a></li> --}}
        <li {{ request()->is('admin') ? 'class=active' : ''}}><a href="#"><i class="fa fa-link"></i> <span>inicio</span></a></li>
        <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li>
        <li class="treeview {{ request()->is('admin/posts*') ? 'active' : ''}}">
          <a href="#"><i class="fa fa-link"></i> <span>blog</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
          <li {{ request()->is('admin/posts') ? 'class=active' : ''}}><a href=" {{route('docente.posts.index')}} ">ver posts</a></li>
            <li><a href="#" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-pencil"></i>Crear un post</a></li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->