<div id="sidebar" class="active">
  <div class="sidebar-wrapper active">
    <div class="sidebar-header">
      <img src="assets/images/logo.svg" alt="" srcset="" />
    </div>
    <div class="sidebar-menu">
      <ul class="menu">
        <li class="sidebar-item active">
          <a href="<?=SITE_ROOT?>/index.php" class="sidebar-link">
            <i data-feather="home" width="20"></i>
            <span>Dashboard</span>
          </a>
        </li>

        <li class="sidebar-item has-sub"></li>

        <li class="sidebar-item">
          <a href="<?=SITE_ROOT?>/forms/createForm.php" class="sidebar-link">
            <i data-feather="layout" width="20"></i>
            <span>Add Students</span>
          </a>
        </li>

        <li class="sidebar-item">
          <a href="<?=SITE_ROOT?>/view_students.php" class="sidebar-link">
            <i data-feather="file-plus" width="20"></i>
            <span>View Students</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a href="auth-register.html" class="sidebar-link">
            <i data-feather="file-plus" width="20"></i>
            <span>Register</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a href="auth-login.html" class="sidebar-link">
            <i data-feather="file-plus" width="20"></i>
            <span>Login</span>
          </a>
        </li>
      </ul>
    </div>
    <button class="sidebar-toggler btn x">
      <i data-feather="x"></i>
    </button>
  </div>
</div>