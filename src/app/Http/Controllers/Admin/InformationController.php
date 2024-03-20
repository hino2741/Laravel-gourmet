<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Information;
use App\Http\Requests\Admin\InformationRequest;
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
            ->with('adminUser')
            ->orderByDesc('release_date')
            ->paginate();
        return view('admin.information.index', compact('informationList'), ['authgroup' => 'admin']);
    }

    public function create()
    {
        return view('admin.information.create');
    }

    public function store(InformationRequest $request)
    {
        $inputs = $request->all();
        $this->information->user_id = Auth::id();
        $this->information
            ->fill($inputs)
            ->save();
        return redirect()->route('admin.information.index');
    }

    public function edit($id)
    {
        $information = $this->information->findOrFail($id);
        return view('admin.information.edit', compact('information'));
    }

    public function update(InformationRequest $request, $id)
    {
        $inputs = $request->all();
        $this->information
            ->findOrFail($id)
            ->fill($inputs)
            ->save();
        return redirect()->route('admin.information.index');
    }

    public function delete($id)
    {
        $this->information
            ->findOrFail($id)
            ->delete();
        return redirect()->route('admin.information.index');
    }
}
