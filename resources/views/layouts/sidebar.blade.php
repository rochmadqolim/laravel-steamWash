 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="#" class="brand-link">
         <div class="brand-text text-center font-weight-light">Steam Wash</div>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar Menu -->
         <nav class="mt-5 pb-3 mb-3 d-flex">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                 <li class="nav-item">
                     <a href="dashboard" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>
                             Dashboard
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="form" class="nav-link {{ request()->is('form') ? 'active' : '' }}">
                         <i class="nav-icon fas fa-edit"></i>
                         <p>
                             Order
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="user" class="nav-link {{ request()->is('user') ? 'active' : '' }}">
                         <i class="fas fa-user nav-icon"></i>
                         <p>
                             User Setting
                         </p>
                     </a>
                 </li>
         </nav>
     </div>
     <!-- /.sidebar -->
 </aside>
