<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Paralelo;
use Illuminate\Http\Request;

class ParaleloController extends Controller
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
            $paralelo = Paralelo::where('paralelo', 'LIKE', "%$keyword%")
                ->orWhere('activo', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $paralelo = Paralelo::latest()->paginate($perPage);
        }

        return view('admin.paralelo.index', compact('paralelo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.paralelo.create');
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
			'paralelo' => 'required'
		]);
        $requestData = $request->all();
        
        Paralelo::create($requestData);

        return redirect('admin/paralelo')->with('flash_message', 'Paralelo added!');
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
        $paralelo = Paralelo::findOrFail($id);

        return view('admin.paralelo.show', compact('paralelo'));
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
        $paralelo = Paralelo::findOrFail($id);

        return view('admin.paralelo.edit', compact('paralelo'));
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
			'paralelo' => 'required'
		]);
        $requestData = $request->all();
        
        $paralelo = Paralelo::findOrFail($id);
        $paralelo->update($requestData);

        return redirect('admin/paralelo')->with('flash_message', 'Paralelo updated!');
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
        Paralelo::destroy($id);

        return redirect('admin/paralelo')->with('flash_message', 'Paralelo deleted!');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }
    
}
