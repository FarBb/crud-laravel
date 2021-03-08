@extends('layouts/master')
@section('title', 'Edit Data')
@section('judul', 'Edit Data')
@section('content')
    <div class="section-body">
        <div class="card">
            <div class="card-header">
                Form Tambah Data
            </div>
            <div class="card-body">
                <form action="{{ route('crud.update', $data->id) }}" method="POST">
                    @csrf
                    @method('patch')
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
                                    <input type="text" class="form-control phone-number" name="kode" @if (old('kode')) value="{{ old('kode') }}">                
                                    @else                        
                                                                    value="{{ $data->kode_barang }}"> @endif </div>
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
                                    <input type="text" class="form-control phone-number" name="barang" @if (old('barang')) value="{{ old('barang') }}"> 
@else    
                                value="{{ $data->nama_barang }}"> @endif </div>
                                    <label @error('barang') class="text-danger" @enderror>@error('barang')
                                        {{ $message }}
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
