<?php

namespace App\Http\Controllers\User\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProgramKamiController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Program Kami',
            // tambahkan data lain jika perlu
        ];

        return view('user.profile.program_kami', $data);
    }
}
