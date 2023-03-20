<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/linearicons/style.css')}}">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css')}}">
    <link rel="stylesheet" href="{{ asset('css/tables.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <title>{{ config('app.name', 'Pinjam Ruang') }}</title>
    <style>
        li.line-garis {
            border-top: 1px solid #0af;
        }
    </style>

    <script src="{{ asset('assets/vendor/jquery/jquery.min.js')}}"></script>
</head>
<body>
<!-- WRAPPER -->
<div id="wrapper">
    <!-- NAVBAR -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="brand">
            <a href="" style="font-weight: 700;">App Peminjaman Ruang Rapat</a>
        </div>
        <div class="container-fluid">
            <div class="navbar-btn">
                <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
            </div>
            <form class="navbar-form navbar-left">
                <div class="input-group">
                </div>
            </form>
            <div id="navbar-menu">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span>{{ Auth::user()->name }} </span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                        <ul class="dropdown-menu">
                            @if(\App\Http\Controllers\BaseController::is_pegawai(\Illuminate\Support\Facades\Auth::id()))
                                <li><a href="{{ route('user.show',\Illuminate\Support\Facades\Auth::id()) }}"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
                                @else
                                <li><a href="{{ route('mahasiswa.show',\Illuminate\Support\Facades\Auth::id()) }}"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
                            @endif
                            <li><a href="{{ url('change-password') }}"><i class="lnr lnr-cog"></i> <span>Change Password</span></a></li>
                            <li><a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
    </nav>
    <!-- END NAVBAR -->

    <!-- LEFT SIDEBAR -->
    <div id="sidebar-nav" class="sidebar">
        <div class="sidebar-scroll">
            <nav>
                <ul class="nav">
                    <li><a href="{{ url('/')  }}" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
                    <li><a href="{{ url('/daftar-transaksi')  }}" ><i class="lnr lnr-list"></i> <span>Transaksi</span></a></li>
                    @if(\App\Http\Controllers\BaseController::is_pegawai(\Illuminate\Support\Facades\Auth::id()))
                        <li><a href="{{ route('ruangan.index')  }}" ><i class="lnr lnr-list"></i> <span>Ruangan</span></a></li>
                        <li><a href="{{ route('user.index')  }}" ><i class="lnr lnr-list"></i> <span>Bagian RT Sekretariat</span></a></li>
                        <li><a href="{{ route('mahasiswa.index')  }}" ><i class="lnr lnr-list"></i> <span></span> Pegawai</a></li>
                        @endif
                </ul>
            </nav>
        </div>
    </div>
    <!-- END LEFT SIDEBAR -->
    <!-- MAIN -->
    @yield('content')
    <!-- END MAIN -->
    <div class="clearfix"></div>
    <footer>
        <div class="container-fluid">
            <p class="copyright">&copy; {{ date('Y') }} <a href="#" target="_blank"></a>. All Rights Reserved.</p>
        </div>
    </footer>
</div>
<!-- END WRAPPER -->

<!-- END WRAPPER -->
<!-- Javascript -->
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{ asset('assets/scripts/klorofil-common.js') }}"></script>
<script src="{{ asset('js/table.js') }}"></script>
</body>
</html>