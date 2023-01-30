<nav class="navbar navbar-expand-lg navbar-light sticky-top bg-info">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Navbar brand -->
      <a class="navbar-brand mt-2 mt-lg-0" href="#">
        <img
          src="https://mdbcdn.b-cdn.net/img/logo/mdb-transaprent-noshadows.webp"
          height="15"
          alt="MDB Logo"
          loading="lazy"
        />
      </a>
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
        <li class="nav-item ">
          <a class="nav-link text-light {{request()->path()==="/" ? "text-decoration-underline" : ""}}" 
          href="{{route("home")}}">Home
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light {{request()->path()==="user/createPost" ? "text-decoration-underline" : ""}}" 
          href="{{route("createPost")}}">Create Post</a>
        </li>
        {{-- admin authorisation --}}
        @can ("admin")            
          <li class="nav-item">
            <a class="nav-link text-light {{request()->path()==="admin/index" ? "text-decoration-underline" : ""}}"
             href="{{route("admin.index")}}">Admin Controls</a>
          </li>
        @endcan

        <li class="nav-item">
          <a class="nav-link text-light {{request()->path()==="user/contactUs" ? "text-decoration-underline" : ""}}"
           href="{{route("contactUs")}}">Contact Us</a>
        </li>
      </ul>
      <!-- Left links -->
    </div>
    
      <!-- Avatar -->
      <div class="dropdown">
        <a
          class="dropdown-toggle d-flex align-items-center hidden-arrow"
          href="#"
          id="navbarDropdownMenuAvatar"
          role="button"
          data-mdb-toggle="dropdown"
          aria-expanded="false"
        >
          <img
            src="{{asset("images/profiles/".auth()->user()->image)}}"
            class="rounded-circle"
            height="35"
            width="35"
            alt="Black and White Portrait of a Man"
            loading="lazy"
          />
        </a>
        <ul
          class="dropdown-menu dropdown-menu-end"
          aria-labelledby="navbarDropdownMenuAvatar"
        >
          <li>
            <a class="dropdown-item" href="{{route("userProfile")}}">{{auth()->user()->username}}</a>
            <a class="dropdown-item" href="{{route("userProfile")}}">My profile</a>
          </li>
         
          <li>
            <a class="dropdown-item" href="{{route("logout")}}">Logout</a>
          </li>
        </ul>
      </div>
    </div>
    <!-- Right elements -->
  </div>
  <!-- Container wrapper -->
</nav>