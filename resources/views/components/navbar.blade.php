<nav class="navbar navbar-expand-lg navbar-dark bg-info">
    <a class="navbar-brand" href="{{route('products.index')}}">E-Commerce</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav mr-auto">

        <li class="nav-item dropdown active">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Data of your account
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">

            <a class="dropdown-item" href="{{route('users.show', Auth::user()->email)}}">Show data</a>
            <a class="dropdown-item" href="{{route('users.edit', Auth::user()->email)}}">Update Data</a>
            <a class="dropdown-item" href="{{route('users.show', Auth::user()->email)}}">Delete Data</a>

          </div>
        </li>

        <li class="nav-item active">
          <a class="nav-link" href={{route('password.edit', Auth::user()->email)}}>Reset your password</a>
        </li>

        @if (Auth::user()->is_admin === '0')

          <li class="nav-item active">
            <a class="nav-link" href="{{route('userProducts.index')}}">Your Products</a>
          </li>

        @endif

        @if (Auth::user()->is_admin === '1')

          <li class="nav-item active">
            <a class="nav-link" href="{{route('userProducts.index')}}">Products of users</a>
          </li>
            
          <li class="nav-item active">
            <a class="nav-link" href={{route('users.index')}}>Users</a>
          </li>

        @endif

      </ul>

      <a href="{{route('logout')}}" style="color: white; text-decoration: none">Logout</a>

    </div>
</nav>