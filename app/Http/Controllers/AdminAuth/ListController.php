<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Lista;
use Illuminate\Http\Request;
use DB;
use App\Integrante;

class ListController extends Controller
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
            $list = Lista::where('lista_numero', 'LIKE', "%$keyword%")
                ->orWhere('nombre', 'LIKE', "%$keyword%")
                ->orWhere('cantidad_integrantes', 'LIKE', "%$keyword%")
                ->orWhere('logo', 'LIKE', "%$keyword%")
                ->orWhere('descripcion', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $list = Lista::latest()->paginate($perPage);
        }

        return view('admin.list.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $contador = DB::table('lists')->count();
        $contador = $contador+1;
        $integrantes = Integrante::where('lista_id','=',$contador)->count();
        return view('admin.list.create', compact('contador','integrantes'));
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
			'nombre' => 'required|max:191',
			'descripcion' => 'nullable|max:191'
		]);
        $requestData = $request->all();
                if ($request->hasFile('logo')) {
            $requestData['logo'] = $request->file('logo')
                ->store('uploads', 'public');
        }

        Lista::create($requestData);

        return redirect('admin/list')->with('flash_message', 'List added!');
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
        $list = Lista::findOrFail($id);
        $integrantes = Integrante::where('lista_id', $list->id)->get();

        return view('admin.list.show', compact('list','integrantes'));
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
        $list = Lista::findOrFail($id);

        return view('admin.list.edit', compact('list'));
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
			'nombre' => 'required|max:191',
			'descripcion' => 'nullable|max:191'
		]);
        $requestData = $request->all();
                if ($request->hasFile('logo')) {
            $requestData['logo'] = $request->file('logo')
                ->store('uploads', 'public');
        }

        $list = Lista::findOrFail($id);
        $list->update($requestData);

        return redirect('admin/list')->with('flash_message', 'List updated!');
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
        $integrantes = Integrante::where('lista_id', $id)->count();

        try {
            
            if($integrantes = 0){                
                Lista::destroy($id);
                DB::commit();
            }

        } catch (\Exception $e) {
            DB::rollback();            
        }

        return redirect('admin/list')->with('flash_message', 'List deleted!');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }
    
}
