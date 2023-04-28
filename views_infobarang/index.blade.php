@extends('template.layout')
@section('konten')
<div class="container-fluid">
    <div class="card border border-1-light shadow rounded-3">
        <div class="card-body ">
            <a href="{{ url('info-barang/create') }}" class="btn btn-md btn-success mb-3">Tambah</a>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                
                    
                @endif
            <table class="table">
                <thead class="table-success">
                  <th class="px-2">NO</th>
                  <th class="px-2">NAMA BARANG</th>
                  <th class="px-2">JENIS BARANG</th>
                  <th class="px-2">STOK</th>
                  <th class="px-2">RAK BARANG</th>
                  <th class="px-5">AKSI</th>
                </thead>
                <tbody>
                    <?php 
                        $no=1;
                    ?>
                    @forelse ($infobarang as $item)
                                    <tr>
                                        <td>
                                            {{ $no++}}
                                        </td>
                                        <td>{{ $item->nama_barang }}</td>
                                        <td>{{ $item->jenis_barang }}</td>
                                        <td>{{ $item->stok }}</td>
                                        <td>{{ $item->rak_barang }}</td>
                                        <td >
                                            <form onsubmit="return confirm('Apakah Anda Yakin ingin menghapus {{ $item->nama_barang }} ?');" action="{{ url('info-barang', $item->id) }}" method="POST">
                                                <a href="{{ url('info-barang/'.$item->id.'/edit') }}" class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                  @empty
                                      <div class="alert alert-danger">
                                          Data Post belum Tersedia.
                                      </div>
                                  @endforelse
                </tbody>
              </table>
              {{--  {{ $infobarang->links('pagination::bootstrap-5') }}  --}}
        </div>
      </div>
  </div>
  
@endsection