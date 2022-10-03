<nav class="navbar navbar-expand-lg navbar-light brand-bg-secondary">
    <a class="navbar-brand brand-logo-txt ms-5" href="/">
        <!-- <img src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24" class="d-inline-block align-text-top"> -->
        Qout"
    </a>

    <button class="navbar-toggler mb-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <!-- <span class="navbar-toggler-icon"></span> -->
      <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-profiles/avatar-1.webp"
                        alt="Generic placeholder image" class="bg-dark img-fluid rounded-circle"
                        style="max-width: 38px;">
    </button>

    <div class="text-uppercase collapse navbar-collapse" id="navbarSupportedContent">
      <div class="w-100 d-flex flex-column flex-md-row justify-content-between align-items-center align-items-md-end">
        
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0 text-center">
          <li class="nav-item mx-2">
            <a class="nav-link" href=<?php echo '/profile?username='.$user->username;?> >
              Profile
            </a>
          </li>

          <li class="nav-item mx-2">
            <a class="nav-link" href="/friends">Friends</a>
          </li>

          <li class="nav-item mx-2">
            <a class="nav-link" href="/quots">Quots</a>
          </li>

          <li class="nav-item mx-2">
            <a class="nav-link" href="/signin">Logout</a>
          </li>
        </ul>
        
        <form class="d-flex ">
          <input class="form-control me-2" type="search" placeholder="Find People" aria-label="Search">
          <button class="btn brand-btn-outline brand-txt-primary" type="submit">Search</button>
        </form>
        
      </div>
    </div>
</nav>