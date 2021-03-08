@extends('layouts/master')
@section('title', 'CRUD')
@section('judul', 'CRUD')
@section('content')
    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <a href="crud/tambah" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Primary</a>
            </div>
            <div class="card-body">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Barang</h4>
                    </div>
                    @if (session('Success'))
                        {{-- <div class="alert alert-success alert-dismissible show fade">
                            <div class="alert-body">
                                <button class="close" data-dismiss="alert">
                                    <span>x</span>
                                </button>
                                {{ session('Success') }}
                            </div>
                        </div> --}}
                        <script>
                            swal('{{ session('Success') }}', {
                                icon: 'success',
                            });

                        </script>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $no => $a)
                                        <tr>
                                            {{-- <td>{{ $no + 1 }}</td> --}}
                                            <td>{{ $data->firstItem() + $no }}</td>
                                            <td>{{ $a->kode_barang }}</td>
                                            <td>{{ $a->nama_barang }}</td>
                                            <td>
                                                <a href="{{ route('crud.edit', $a->id) }}"
                                                    class="badge badge-primary">Edit</a>
                                                <a href="#" data-id="{{ $a->id }}"
                                                    class="badge badge-danger tombol-hapus">
                                                    <form action="{{ route('crud.hapus', $a->id) }}" method="POST"
                                                        id="delete{{ $a->id }}">
                                                        @csrf
                                                        @method('delete')
                                                    </form>
                                                    Delete
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $data->links() }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-whitesmoke">
                This is card footer
            </div>
        </div>
    </div>
@endsection
@push('page-script')
    <script src="{{ asset('assets/modules/sweetalert/dist/sweetalert.min.js') }}"></script>
@endpush
@push('after-script')
    <script>
        $(".tombol-hapus").click(function(e) {
            id = e.target.dataset.id;
            swal({
                    {{-- title: 'Apakah Anda Yakin?' + id, --}}
                    title: 'Apakah Anda Yakin?',
                    {{-- text: 'Once deleted, you will not be able to recover this imaginary file!', --}}
                    icon: 'warning',
                    buttons: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        {{-- swal('Data Berhasil Dihapus!', {
                            icon: 'success',
                        }); --}}
                        $(`#delete${id}`).submit();
                    } else {
                        swal('Penghapusan Data Dibatalkan!');
                    }
                });
        });

    </script>
@endpush
