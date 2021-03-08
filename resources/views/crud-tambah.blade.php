@extends('layouts/master')
@section('title', 'Tambah Data')
@section('judul', 'Tambah Data')
@section('content')
    <div class="section-body">
        <div class="card">
            <div class="card-header">
                Form Tambah Data
            </div>
            <div class="card-body">
                <form action="{{ route('crud.simpan') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kode Barang</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control phone-number" name="kode"
                                        value="{{ old('kode') }}">
                                </div>
                                <label @error('kode') class="text-danger" @enderror>@error('kode') {{ $message }}
                                @enderror
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Barang</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-tablet"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control phone-number" name="barang"
                                    value="{{ old('barang') }}">
                            </div>
                            <label @error('barang') class="text-danger" @enderror>@error('barang') {{ $message }}
                            @enderror
                        </label>
                    </div>
                </div>
                <div class="col-lg-12">
                    <button class="btn btn-primary" id="save-btn">Save Changes</button>
                </div>
            </div>
        </form>
    </div>
    <div class="card-footer bg-whitesmoke">
        This is card footer
    </div>
</div>

</div>
@endsection
