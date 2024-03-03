<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Infomation;
use App\AdminUser;

class InfomationController extends Controller
{
    public function __construct(Infomation $infomation)
    {
        $this->middleware('auth:admin');
        $this->infomation = $infomation;
    }

    public function index()
    {
        $infomation = $this->infomation->all();
        return view('auth.index', compact('infomation'), ['authgroup' => 'admin']);
    }
}
