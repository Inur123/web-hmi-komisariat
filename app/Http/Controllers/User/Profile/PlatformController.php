<?php

namespace App\Http\Controllers\User\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlatformController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Platform',
            // tambahkan data lain jika perlu
        ];

        return view('user.profile.platform', $data);
    }
}
