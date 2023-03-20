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
                <h4 class="page-title">Profil</h4>
                {{-- pengambilan dan pengiriman data ke database melauli function controller store --}}
                {!! Form::open(array('route' => 'user.store','method'=>'POST','enctype'=>'multipart/form-data')) !!}
                <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $data->name }}"readonly>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $data->email }}"readonly >
                        </div>
                        <div class="form-group">
                            <label class="control-label">Username</label>
                            <input type="text" class="form-control" name="nrp" value="{{ $data->nrp }}"readonly>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nomor Telephone</label>
                            <input type="text" class="form-control" name="no_telp" value="{{ $data->no_telp}}"readonly >
                        </div>
                        <div class="form-group">
                            <label class="control-label">Bagian Majelis</label>
                            <input type="text" class="form-control" name="bagian_majelis" value="{{($data->bagian_majelis)}}"readonly>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Status </label>
                            <input type="radio" class="radio-inline" name="pegawai" disabled {{ $data->pegawai == '1' ? 'checked' : '' }} value="1"> admin
                            <input type="radio" class="radio-inline" name="pegawai" disabled {{ $data->pegawai == '0' ? 'checked' : '' }} value="0"> pegawai
                        </div>
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