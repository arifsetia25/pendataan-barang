<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gudang Online</title>
    <script src="https://kit.fontawesome.com/cc1d8ebad0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
      span{
        color: #fffffe;
      }
      .hover-effect:hover {
        opacity: 0.5;
      }

      
    </style>
</head>

<body>

  {{-- SIDEBAR --}}
    <div class="container-fluid">
      <div class="row flex-nowrap">
          <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 " style="background-color: #232946">
              <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100 ">
                  <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-decoration-none" style="color: #fffffe">
                      <p><span class="fs-3 d-none d-sm-inline">Menu</span></p>
                  </a>
                  <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                      <li class="nav-item">
                          <a href="{{ route('dashboard') }}" class="nav-link align-middle px-0 hover-effect">
                            <i class="fa-sharp fa-solid fa-gauge fa-lg" style="color: #fffffe;"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span>
                          </a>
                      </li>
                      <li>
                          <a href="{{ url('barang-masuk')}}"  class="nav-link px-0 align-middle hover-effect">
                            <i class="fa-solid fa-cart-flatbed fa-lg" style="color: #ffffff;"></i> <span class="ms-1 d-none d-sm-inline">Barang Masuk</span> </a>
                      </li>
                      <li>
                          <a href="{{url('barang-keluar')}}" class="nav-link px-0 align-middle hover-effect">
                            <i class="fa-solid fa-dolly fa-lg" style="color: #ffffff;"></i> <span class="ms-1 d-none d-sm-inline">Barang Keluar</span></a>
                      </li>
                      <li>
                            <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle hover-effect">
                                <i class="fa-solid fa-warehouse fa-lg" style="color: #ffffff;"></i> <span class="ms-1 d-none d-sm-inline">Master Barang</span></a>
                            <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="{{ url('info-barang') }}" class="nav-link px-2 hover-effect"><i class="fa-solid fa-box fa-lg" style="color: #ffffff;"></i>
                                        <span class="d-none d-sm-inline">Info Barang</span> </a>
                                </li>
                                <li>
                                    <a href="{{ url('jenis-barang')}}" class="nav-link px-2 hover-effect"><i class="fa-solid fa-cubes fa-lg" style="color: #ffffff;"></i>
                                        <span class="d-none d-sm-inline">Jenis Barang</span></a>
                                </li>
                            </ul>
                      </li>
                      <li>
                          <a href="{{ url('supplier') }}"  class="nav-link px-0 align-middle hover-effect">
                            <i class="fa-solid fa-address-book fa-lg" style="color: #ffffff;"></i> <span class="ms-1 d-none d-sm-inline">Supplier</span> </a>
                            
                      </li>
                      
                  </ul>
                  <hr>
                  <div class="dropdown pb-4">
                      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                          <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                          <span class="d-none d-sm-inline mx-1" style="font-size: 14px;">{{ Auth::user()->nama }}</span>
                      </a>
                      <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                        
                    
                          <li><a class="dropdown-item" href="{{ route('actionlogout') }}">Sign out</a></li>
                      </ul>
                  </div>
              </div>
          </div>
             {{-- END OF SIDEBAR --}}          

          <div class="col-10 py-3" style="background-color: #fffffe;">
            
            @yield('konten')
              
              
          </div>

          
      </div>
      
      
</body>