<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
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
        $infomationList = $this->infomation
            ->orderByDesc('release_date')
            ->paginate();
        return view('auth.index', compact('infomationList'), ['authgroup' => 'admin']);
    }
}
