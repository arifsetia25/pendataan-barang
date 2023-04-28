@extends('template.layout')
@section('konten')
<style>
.card{
    border-radius: 8px;
    border: 1px solid #cccccc;
    display: flex;
    align-items: center;
    justify-content: center;
    padding-top: 10px;
    box-sizing: border-box;
    width: 200px;
    height: 100px;
    transition: all linear 200ms;
  }
  .card:hover{
    transform: scale(1.1);
    transition: all linear 200ms;
    z-index: 1;
    box-shadow: 1px 1px 10px rgba(0,0,0,.3);
    cursor: pointer;
  }

  
</style>
    <div class="p-5 mb-4 rounded-3" style="background-color: #e8e4e6;">
        <div class="container-fluid">
            <h1 class="display-7 fw-bold">Pendataan Barang</h1>
            <p class="col-md-8 fs-4">Selamat datang <b>{{ Auth::user()->nama}} </p>
        </div>
  </div>
  <div class="container d-flex flex-wrap align-items-center">
    <a href="{{ url('barang-masuk') }}" class="text-decoration-none"> <div class="m-2 card text-white" style="background-color:#5D9C59;"><i class="fa-solid fa-cart-flatbed fa-2xl" style="color: #ffffff; padding-bottom: 15px;"></i> Item Barang Masuk</div></a>
    <a href="{{ url('barang-keluar') }}" class="text-decoration-none"> <div class="m-2 card text-white text-decoration-none" style="background-color: #f25f4c"><i class="fa-solid fa-dolly fa-2xl" style="color: #ffffff; padding-bottom: 15px;"></i>Item Barang Keluar</div></a>
    <a href="{{ url('info-barang') }}" class="text-decoration-none"> <div class="m-2 card text-white" style="background-color: #009FBD"><i class="fa-solid fa-box fa-2xl" style="color: #ffffff; padding-bottom: 15px;"></i>Item Informasi Barang</div></a>
    <a href="{{ url('supplier') }}" class="text-decoration-none"> <div class="m-2 card text-white text-decoration-none" style="background-color: #FD841F"><i class="fa-solid fa-address-book fa-2xl" style="color: #ffffff; padding-bottom: 15px;"></i>Supplier</div></a>
    
  </div>
@endsection