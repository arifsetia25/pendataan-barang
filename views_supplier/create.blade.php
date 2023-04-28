@extends('template.layout')
@section('konten')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{ route('supplier.store') }}" method="POST" >
                    
                        @csrf

                        <div class="form-group">
                            <label class="font-weight-bold">NAMA SUPPLIER</label>
                            <input type="text" class="form-control @error('nama_supplier') is-invalid @enderror" rows="5" name="nama_supplier" placeholder="Masukkan Nama Supplier">
                           
                            <!-- error message untuk title -->
                            @error('nama_supplier')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">ALAMAT</label>
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" rows="5" name="alamat" placeholder="Masukkan Alamat">
                           
                            <!-- error message untuk title -->
                            @error('alamat')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">NO TELEPON</label>
                            <input type="text" class="form-control @error('no_telp') is-invalid @enderror" rows="5" name="no_telp" placeholder="Masukkan No Telepon">
                           
                            <!-- error message untuk title -->
                            @error('no_telp')
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
@endsection