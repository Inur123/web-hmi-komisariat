<?php

namespace App\Http\Controllers\User\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HmiController extends Controller
{
     public function index()
    {
        // data yang ingin dikirim ke view
        $data = [
            'title' => 'HMI Komisariat Fitrah',
            // tambahkan data lain jika perlu
        ];

        return view('user.profile.hmi', $data);
    }
}
