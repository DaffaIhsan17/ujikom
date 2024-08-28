<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    public function destroy($id)
    {
        $item = Keranjang::findOrFail($id);
        $item->delete();

        return response()->json(['success' => 'Item berhasil dihapus']);
    }
}
