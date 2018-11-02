<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Institution;
use Illuminate\Http\Request;

class InstitutionController extends Controller
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
            $institution = Institution::where('institucion', 'LIKE', "%$keyword%")
                ->orWhere('telefono', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('logo', 'LIKE', "%$keyword%")
                ->orWhere('representante', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $institution = Institution::latest()->paginate($perPage);
        }

        return view('admin.institution.index', compact('institution'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.institution.create');
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
			'institucion' => 'required|max:191',
			'telefono' => 'required|max:17',
			'email' => 'required|max:45',
			'representante' => 'required|max:191'
		]);
        $requestData = $request->all();
                if ($request->hasFile('logo')) {
            $requestData['logo'] = $request->file('logo')
                ->store('uploads', 'public');
        }

        Institution::create($requestData);

        return redirect('admin/institution')->with('flash_message', 'Institution added!');
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
        $institution = Institution::findOrFail($id);

        return view('admin.institution.show', compact('institution'));
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
        $institution = Institution::findOrFail($id);

        return view('admin.institution.edit', compact('institution'));
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
			'institucion' => 'required|max:191',
			'telefono' => 'required|max:17',
			'email' => 'required|max:45',
			'representante' => 'required|max:191'
		]);
        $requestData = $request->all();
                if ($request->hasFile('logo')) {
            $requestData['logo'] = $request->file('logo')
                ->store('uploads', 'public');
        }

        $institution = Institution::findOrFail($id);
        $institution->update($requestData);

        return redirect('admin/institution')->with('flash_message', 'Institution updated!');
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
        Institution::destroy($id);

        return redirect('admin/institution')->with('flash_message', 'Institution deleted!');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }
    
}
