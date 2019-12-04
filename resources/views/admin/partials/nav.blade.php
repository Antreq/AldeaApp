<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('dashboard')}}" class="nav-link {{request() -> is('admin') ? 'active' : ''}}" >
              <i class="nav-icon fas fa-home"></i>
              <p>
                Inicio
                <!--<span class="right badge badge-danger">New</span>-->
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview {{ request()-> is('admin/*') ? 'menu-open' : 'menu-closed' }}" >
            <a href="/" class='nav-link'>
              <i class="nav-icon fas fa-folder"></i>
              <p>
                Publicaciones
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.posts.index') }}" class="nav-link {{request() -> is('admin/posts') ? 'active' : ''}}" >
                  <i class="far fa-circle nav-icon"></i>
                   Ver todas
                </a>
              </li>
              <li class="nav-item">
                <a href="#" data-toggle="modal" data-target="#exampleModal" class="nav-link" ><i class="fa fa-pencil-alt"></i> Nueva publicación
                </a>
              </li>
            </ul>
          </li>
        </ul>
</nav>