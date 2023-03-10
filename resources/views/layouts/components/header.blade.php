<nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>
    
    <img src="{{asset('images/logo text.png')}}" style="height: 40px;" alt="Image">

    @php
    if(auth()->user()->role == "super"){
        $name = "Super Admin";
    }elseif(auth()->user()->role == "instance"){
        $name = Auth::user()->instance->name;
    }else{
        $name = Auth::user()->participant->name;
    }
    @endphp

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
        <div class="topbar-divider d-none d-sm-block"></div>
        <div>
            
        </div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">

            <a class="nav-link dropdown-toggle " href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline small">{{ $name }}</span>
                @if (auth()->user()->role == 'super')
                <figure class="img-profile rounded-circle avatar font-weight-bold " data-initial = "{{ $name[0]}}" ></figure>
                @elseif (auth()->user()->role == 'instance')
                <image src="{{ auth()->user()->instance->photo == null ? asset('images/preview.png') : asset('storage/'.auth()->user()->instance->photo) }}"class="img-profile rounded-circle"></image>
                @else
                <image src="{{ auth()->user()->participant->photo == null ? asset('images/preview.png') : asset('storage/'.auth()->user()->participant->photo) }}"class="img-profile rounded-circle"></image>
                @endif
            </a>
            <!-- Dropdown - User Information -->
            @php
            if(auth()->user()->role == 'super'){
                $route = route('admin.profile');
            }elseif(auth()->user()->role == 'instance'){
                $route = route('instance.profile');
            }else{
                $route = route('profile.index');
            }
            @endphp
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ $route }}">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    {{ __('Profil') }}
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    {{ __('Logout') }}
                </a>
            </div>
        </li>

    </ul>

</nav>