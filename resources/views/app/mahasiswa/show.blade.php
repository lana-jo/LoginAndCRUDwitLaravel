@extends('layouts.default')
@section('content')
    <!-- MAIN -->
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <h4 class="page-title">Data Pegawai</h4>
                {{-- pengambilan dan pengiriman data ke database melauli function controller store --}}
                {!! Form::open(array('route' => 'mahasiswa.store','method'=>'POST','enctype'=>'multipart/form-data')) !!}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">NIP </label>
                            <input type="text" class="form-control" name="nrp" value="{{ $data->nrp }}" readonly>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nama</label>
                            <input type="name" class="form-control" name="name" value="{{ $data->name }}" readonly>
                        </div>
                        <div class="form-group">
                            <label class="control-label">No. Telpon </label>
                            <input type="text" class="form-control" name="no_telp" value="{{ $data->no_telp }}" readonly>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Bagian/Majelis </label>
                            <input type="text" class="form-control" name="bagian_majelis" value="{{ $data->bagian_majelis }}" readonly>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Status </label>
                            <input type="radio" class="radio-inline" name="pegawai" disabled {{ $data->pegawai == '1' ? 'checked' : '' }} value="1"> admin
                            <input type="radio" class="radio-inline" name="pegawai" disabled {{ $data->pegawai == '0' ? 'checked' : '' }} value="0"> pegawai
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <!-- END MAIN CONTENT -->
    </div>
    <!-- END MAIN -->

@endsection