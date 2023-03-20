<?php

namespace App\Http\Controllers;

use App\Ruangan;
use App\Transaksi;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function selesaiPinjam($id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->update([
                'status' => 'selesai'
            ]);
        Ruangan::find($transaksi->id_ruangan)
            ->update([
                'status' => 'available'
            ]);
    }
    public function search(Request $request)
    {
        
    }
}
