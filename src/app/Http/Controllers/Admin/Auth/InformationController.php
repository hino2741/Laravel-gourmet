<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Information;

class InformationController extends Controller
{
    public function __construct(Information $information)
    {
        $this->middleware('auth:admin');
        $this->information = $information;
    }

    public function index()
    {
        $informationList = $this->information
            ->orderByDesc('release_date')
            ->paginate();
        return view('auth.index', compact('informationList'), ['authgroup' => 'admin']);
    }
}
