@extends('template.layout')
@section('konten')
    <div class="container-fluid">
        <div class="card border border-1-light shadow rounded-3">
            <div class="card-body">
                <a href="{{ route('supplier.create') }}" class="btn btn-md btn-success mb-3">Tambah</a>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                    
                @endif
                <table class="table">
                    <thead class="table-success">
                        <th>NO</th>
                        <th>NAMA SUPPLIER</th>
                        <th>ALAMAT</th>
                        <th>NO TELEPON</th>
                        <th>AKSI</th>
                    </thead>
                    <tbody>
                            <?php 
                            $no = $supplier->firstItem();
                            ?>

                            @forelse ($supplier as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->nama_supplier}}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ $item->no_telp }}</td>
                                    <td>
                                        <form onsubmit="return confirm('apakah anda yakin menghapus {{ $item->nama_supplier }} ? ')" action="{{ url('supplier', $item->id) }}" method="post">
                                            <a href="{{ url('supplier/'.$item->id.'/edit') }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>   
                            
                                @empty
                                <div class="alert alert-danger">
                                    Data Belum Tersedia
                                </div>
                                
                             @endforelse
                    </tbody>
                    
                </table>
                {{ $supplier->links('pagination::bootstrap-5') }}
            </div>
           
        </div>
        
    </div>
    
@endsection