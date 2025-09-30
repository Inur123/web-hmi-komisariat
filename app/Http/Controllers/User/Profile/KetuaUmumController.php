<?php

namespace App\Http\Controllers\User\Profile;

use App\Models\Alumni;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KetuaUmumController extends Controller
{
     public function index()
    {

        $ketuaUmums = Alumni::where('jabatan', 'Ketua Umum')
                           ->orderBy('periode', 'desc')
                           ->paginate(9);

        return view('user.profile.ketua_umum', compact('ketuaUmums'));
    }
}
