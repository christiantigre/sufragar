<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Cargo;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except' => 'logout']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $cargo = Cargo::where('cargo_lista', 'LIKE', "%$keyword%")
                ->orWhere('activo', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $cargo = Cargo::latest()->paginate($perPage);
        }

        return view('admin.cargo.index', compact('cargo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.cargo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'cargo_lista' => 'required'
		]);
        $requestData = $request->all();
        
        Cargo::create($requestData);

        return redirect('admin/cargo')->with('flash_message', 'Cargo added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $cargo = Cargo::findOrFail($id);

        return view('admin.cargo.show', compact('cargo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $cargo = Cargo::findOrFail($id);

        return view('admin.cargo.edit', compact('cargo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'cargo_lista' => 'required'
		]);
        $requestData = $request->all();
        
        $cargo = Cargo::findOrFail($id);
        $cargo->update($requestData);

        return redirect('admin/cargo')->with('flash_message', 'Cargo updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Cargo::destroy($id);

        return redirect('admin/cargo')->with('flash_message', 'Cargo deleted!');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }
    
}
