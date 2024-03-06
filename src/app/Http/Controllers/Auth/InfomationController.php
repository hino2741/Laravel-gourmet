<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Infomation;

class InfomationController extends Controller
{
    public function __construct(Infomation $infomation)
    {
        $this->middleware('auth:admin');
        $this->infomation = $infomation;
    }

    public function index()
    {
        $infomation = $this->infomation
            ->orderByDesc('release_date')
            ->paginate();
        return view('auth.index', compact('infomation'), ['authgroup' => 'admin']);
    }
}
