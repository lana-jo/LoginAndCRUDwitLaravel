@extends('layouts.default')
@section('content')
<link rel="stylesheet" href="{{ ('css/table') }}">
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
                <div class="row">
                    <div class="col-md-12">
                        <!-- BORDERED TABLE -->
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Sekretariat</h3>
                            </div >
                            <div class="col-xs-12 col-md-8">
                                <h3 class="col-md-8"><a type="button" href="{{ route('user.create') }}" class="btn btn-default"><i class="fa fa-plus-square"></i> New User </a></h3>
                            </div>
                            <div class="panel-body">
                            
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
                                                    <a href="{{ route('user.edit',$d->id) }}" class="btn btn-default">Edit</a>
                                                    <form method="POST" action="{{ route('user.destroy',$d->id)  }}'" style="display:inline">
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
 <!-- Bootstrap core JavaScript-->
 <script src="{{asset('assets/vendor/jq/jquery.min.js')}}"></script>
  <script src="{{asset('assets/vendor/bs/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('assets/vendor/jq-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('assets/js/sb-admin-2.min.js')}}"></script>

  <!-- Page level plugins -->
  <script src="{{asset('assets/vendor/dttables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('assets/vendor/dttables/dataTables.bootstrap4.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('assets/js/demo/datatables-demo.js')}}"></script>

    <!-- END MAIN -->
@endsection