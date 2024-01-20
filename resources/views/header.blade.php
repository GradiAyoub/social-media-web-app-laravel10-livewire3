<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('style.css')}}">

    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg  navbar-dark shadow">
        <div class="container-fluid">
          <a class="navbar-brand"  href="{{url('/')}}">App</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{url('/')}}">posts</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{url('/users')}}">users</a>
              </li>
            </ul>
            <form class="d-flex" style="height: 50px; margin: 0 0">
            <input class="form-control my-1 mx-1" type="search" placeholder="Search" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">
              <ul class="navbar-nav mx-2">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="{{ url('storage/'. $user->img)}}" alt="" width="50px" height="50px" class="rounded-circle pb-1">
                    <span> {{$user->name}}</span>
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{url('/profile/'. $user->id)}}">profile</a></li>
                    <li><a class="dropdown-item" href="{{url('/changeProfile')}}">change profile</a></li>

                    <li> <livewire:logout />  </li>
                  </ul>
                </li>
              </ul>
            </form>

          </div>
        </div>
      </nav>
<div class="offcanvas offcanvas-top h-75 overflow-auto" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">

      <livewire:Search /> 
</div>




