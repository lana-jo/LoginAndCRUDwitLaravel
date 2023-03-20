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
                <h4 class="page-title">Edit Account</h4>
                {{-- pengaturan agar data dapat masuk ke database dengan menggunakan controller mahasiswa function update dengan patokan $data->id --}}
                    {!! Form::model($data, ['method' => 'PATCH','route' => ['mahasiswa.update', $data->id], 'enctype'=>'multipart/form-data']) !!}                
                    <div class="row">
                    {{ csrf_field() }}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $data->name }}">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $data->email }}" >
                        </div>
                        <div class="form-group">
                            <label class="control-label">Username</label>
                            <input type="text" class="form-control" name="nrp" value="{{ $data->nrp }}" >
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nomor Telephone</label>
                            <input type="text" class="form-control" name="no_telp" value="{{ $data->no_telp}}" >
                        </div>
                        <div class="form-group">
                            <label class="control-label">Bagian Majelis</label>
                            <input type="text" class="form-control" name="bagian_majelis" value="{{($data->bagian_majelis)}}" >
                        </div>
                <div class="control-label">
                    <div class="control-label">
                        <div class="form-group">
                            <label class="control-label">New Password</label>
                            <input type="password" id="new_password" class="form-control" name="new_password" placeholder="New Password..." >
                        </div>
                    </div>
                </div>                
                <!-- </form> -->
                        <div class="form-group">
                            <label class="control-label">Status </label>
                            <input type="radio" class="radio-inline" name="pegawai" {{ $data->pegawai == '1' ? 'checked' : '' }} value="1"> admin
                            <input type="radio" class="radio-inline" name="pegawai" {{ $data->pegawai == '0' ? 'checked' : '' }} value="0"> pegawai
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
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