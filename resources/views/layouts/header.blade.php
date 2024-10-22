<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
      <!-- Profile Icon -->
      <li class="nav-item">
        <a id="profile" class="nav-link" href="#" role="button">
            <i class="fas fa-user"></i>
        </a>
    </li>

    <!-- Logout Form -->
    <form id="logout-form" action="{{ url('logout') }}" method="get" style="display: none;">
        @csrf
    </form>
</ul>
</nav>
<!-- Profile Modal -->
<div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document"> <!-- Modal dialog centered -->
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="profileModalLabel">User Profile</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body text-center"> <!-- Centered text -->
            <!-- Profile Information -->
            <img src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : asset('foto.png') }}"
                alt="User Avatar" class="img-circle mb-3" width="100" height="100">
            <p><strong>Username:</strong> {{ auth()->user()->username }}</p>
            <p><strong>Nama:</strong> {{ auth()->user()->nama }}</p>
            <p><strong>Level:</strong>
                {{ auth()->user()->level ? auth()->user()->level->level_nama : 'Tidak ada level' }}</p>
        </div>
        <div class="modal-footer justify-content-center"> <!-- Centered footer -->
            <button type="button" class="btn btn-danger" data-dismiss="modal" id="logout-link">Logout</button>
            <a href="{{ url('profile/edit') }}" class="btn btn-primary">Edit Profile</a>
        </div>
    </div>
</div>
</div>
<!-- Add this CSS in your stylesheet or within a <style> tag in your HTML -->
  <style>
   /* Navbar Styles */
.main-header {
    background: linear-gradient(90deg, #0056b3, #007bff); /* Gradient background */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3); /* Stronger shadow */
    padding: 0 15px; /* Add padding for a cleaner look */
}

.navbar-nav .nav-link {
    color: #ffffff;
    font-weight: 600;
    font-size: 16px; /* Increase font size for better readability */
    text-transform: uppercase; /* Capitalize the text */
    transition: color 0.3s ease, transform 0.3s ease; /* Smooth transition */
}

.navbar-nav .nav-link:hover {
    color: #ffcc00; /* Add a highlight color when hovered */
    transform: scale(1.08); /* Slight zoom effect */
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Add text shadow for depth */
}

/* Navbar Search */
.navbar-search-block {
    position: relative;
    margin-right: 20px;
}

.form-control-navbar {
    border-radius: 25px;
    border: 1px solid #007bff;
    background-color: #f8f9fa;
    padding: 8px 15px; /* Add padding for a nicer look */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); /* Stronger shadow */
}

.input-group-append .btn-navbar {
    border-radius: 50%; /* Round the search button */
    background-color: #007bff;
    color: white;
    width: 40px;
    height: 40px; /* Adjust the size */
    display: flex;
    align-items: center;
    justify-content: center;
}

.input-group-append .btn-navbar:hover {
    background-color: #0056b3;
}

/* Dropdown Styles */
.dropdown-menu {
    border-radius: 12px;
    box-shadow: 0 6px 30px rgba(0, 0, 0, 0.3); /* Stronger dropdown shadow */
    background: #ffffff;
}

.dropdown-item {
    padding: 10px 20px; /* Add padding for better clickability */
    transition: background-color 0.3s, color 0.3s ease;
}

.dropdown-item:hover {
    background-color: #f1f1f1;
    color: #007bff;
}

/* Profile Icon */
#profile {
    color: #ffffff;
    font-size: 20px; /* Increase icon size */
    transition: color 0.3s ease, transform 0.3s ease;
}

#profile:hover {
    color: #ffcc00;
    transform: scale(1.15); /* Bigger hover effect */
}

/* Modal Styles */
.modal-header {
    background-color: #007bff; /* Blue header */
    color: white; /* White text */
    border-bottom: none; /* Remove border */
}

.modal-body img {
    border: 3px solid #007bff; /* Add a border to the profile image */
    padding: 5px;
}

.modal-body p {
    font-size: 16px; /* Larger text */
    color: #333; /* Darker text color */
}

.modal-footer .btn {
    border-radius: 25px; /* Rounded buttons */
    padding: 10px 20px;
    transition: background-color 0.3s ease;
}

.modal-footer .btn-danger {
    background-color: #ff4d4d; /* Bright red */
    border: none;
}

.modal-footer .btn-danger:hover {
    background-color: #cc0000; /* Darker red */
}

.modal-footer .btn-primary {
    background-color: #007bff;
    border: none;
}

.modal-footer .btn-primary:hover {
    background-color: #0056b3;
}


</style>


<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Profile Modal Script -->
<script>
document.getElementById('profile').addEventListener('click', function(e) {
    e.preventDefault();
    $('#profileModal').modal('show'); // Trigger the modal
});

document.getElementById('logout-link').addEventListener('click', function(e) {
    e.preventDefault();
    Swal.fire({
        title: 'Apakah Anda yakin ingin keluar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, keluar!',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('logout-form').submit();
        }
    });
});
</script>
