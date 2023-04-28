@extends('template.layout')
@section('konten')
<div class="container-fluid">
    <div class="card border border-1-light shadow rounded-3">
        <div class="card-body ">
            <a href="{{ url('jenis-barang/create') }}" class="btn btn-md btn-success mb-3">Tambah</a>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                
                    
                @endif
            <table class="table">
                <thead class="table-success">
                  <th class="px-2">NO</th>
                  <th class="px-1">NAMA BARANG</th>
                  <th class="px-4">AKSI</th>
                </thead>
                <tbody>
                    <?php 
                        $no = $jenisbarang->firstItem();
                    ?>
                    @forelse ($jenisbarang as $item)
                                    <tr>
                                        <td>
                                            {{ $no++}}
                                        </td>
                                        <td>{{ $item->jenis_barang }}</td>
                                        <td >
                                            <form onsubmit="return confirm('Apakah Anda Yakin ingin menghapus {{ $item->jenis_barang }} ?');" action="{{ url('jenis-barang', $item->id) }}" method="POST">
                                                
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
              {{ $jenisbarang->links('pagination::bootstrap-5') }}
        </div>
      </div>
  </div>
@endsection