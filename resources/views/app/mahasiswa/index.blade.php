@extends('layouts.default')
@section('content')
    <!-- MAIN -->
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <meta name="_token" content="{{ csrf_token() }}">
                
                <div class="row">
                    <div class="col-md-12">
                        <!-- BORDERED TABLE -->
                        <div class="panel inline">
                            <div class="panel-heading">
                                <h3 class="panel-title d-inline">Daftar Pegawai</h3>
                           
                            </div>
                            <div class="panel-body">      
                                <div class="row">
                                    <div class="col-xs-12 col-md-8">
                                        {{-- tombol tambah pegawai --}}
                                        <h3 class="btn-group" ><a type="button" href="{{ route('mahasiswa.create') }}" class="btn btn-default"><i class="fa fa-plus-square"></i> Pegawai Baru </a></h3>
                                    </div>
                                    <div class="col-xs-6 col-md-4">
                                        {{-- form cari --}}
                                        <form class="btn-group"  action="cari" method="GET">
                                            {{csrf_field()}}
                                            <input type="text" name="cari" placeholder="Cari Pegawai ..">
                                            <input type="submit" value="cari">
                                        </form>
                                    </div>
                                </div>
                                
                            
                                <table class="table table-bordered">
                               
                                    <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>email</th>
                                        <th>No. Telpon</th>
                                        <th>Bagian/Majelis</th>
                                        <th>action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $i => $d)
                                        <tr>
                                            <td>{{ $i + 1}}</td>
                                            <td>{{ $d->nrp }}</td>
                                            <td>{{ $d->name }}</td>
                                            <td>{{ $d->email }}</td>
                                            <td>{{ $d->no_telp  }}</td>
                                            <td>{{ $d->bagian_majelis  }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    {{-- tombol edit --}}
                                                    <a href="{{ route('mahasiswa.edit',$d->id) }}" class="btn btn-default">Edit</a>
                                                    {{-- tombol delete --}}
                                                    <form method="POST" action="{{ route('mahasiswa.destroy',$d->id)  }}'" style="display:inline">
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{ $data->render() }}
                                
                            </div>
                        </div>
                        <!-- END BORDERED TABLE -->
                    </div>
                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT -->
    </div>

    <!-- END MAIN -->
@endsection