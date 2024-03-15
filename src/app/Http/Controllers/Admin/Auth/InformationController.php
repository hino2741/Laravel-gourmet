<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('auth.information.index', compact('informationList'), ['authgroup' => 'admin']);
    }

    public function create()
    {
        return view('auth.information.create');
    }

    public function store(Request $request)
    {
        $inputs = $request->all();
        $this->information->user_id = Auth::id();
        $this->information->fill($inputs)->save();
        return redirect()->route('admin.information.index');
    }
}
