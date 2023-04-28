@extends('template.layout')
@section('konten')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{ route('jenis-barang.store') }}" method="POST" >
                    
                        @csrf

                        <div class="form-group">
                            <label class="font-weight-bold">JENIS BARANG</label>
                            <input type="text" class="form-control @error('jenis_barang') is-invalid @enderror" rows="5" name="jenis_barang" placeholder="Masukkan Jenis Barang">
                            
                        
                            <!-- error message untuk title -->
                            @error('jenis_barang')
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