@extends('template.layout')
@section('konten')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Gudang Online</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ url('barang-masuk/'.$barangmasuk->id) }}" method="POST" >
                        
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id">
                            <div class="form-group">
                                <label class="font-weight-bold">TANGGAL</label>
                                <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" rows="5" value="{{ $barangmasuk->tanggal }}">
                            
                                <!-- error message untuk title -->
                                @error('tanggal')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">JENIS BARANG</label>
                                <select class="form-control @error('jenis_barang') is-invalid @enderror" name="id_jenis_barang">
                                    @foreach ($barangmasuk->jenis as $item)
                                    <option @if ($item->id == $barangmasuk->id_jenis_barang)
                                        selected
                                        @endif 
                                        value="{{ $item->id }}" >{{ $item->jenis_barang }}</option>
                                    @endforeach
                             </select>
                               
                            
                                <!-- error message untuk title -->
                                @error('jenis_barang')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">NAMA BARANG</label>
                                <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" name="nama_barang" rows="5" value="{{ $barangmasuk->nama_barang }}">
                            
                                <!-- error message untuk content -->
                                @error('nama_Barang')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">NAMA SUPPLIER</label>
                                <select class="form-control @error('nama_supplier') is-invalid @enderror" name="id_supplier">
                                    @foreach ($barangmasuk->supplier as $item)
                                    <option @if ($item->id == $barangmasuk->id_supplier)
                                        selected
                                        @endif 
                                        value="{{ $item->id }}" >{{ $item->nama_supplier }}</option>
                                    @endforeach
                             </select>
                            
                                <!-- error message untuk content -->
                                @error('nama_supplier')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'content' );
</script>
</body>
</html>
@endsection