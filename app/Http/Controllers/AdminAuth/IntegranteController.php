<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Integrante;
use App\Lista;
use Illuminate\Http\Request;
use App\Cargo;
use App\Course;
use App\Paralelo;

class IntegranteController extends Controller
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
            $integrante = Integrante::where('nombre_alumno', 'LIKE', "%$keyword%")
                ->orWhere('apellido_alumno', 'LIKE', "%$keyword%")
                ->orWhere('cargo', 'LIKE', "%$keyword%")
                ->orWhere('curso', 'LIKE', "%$keyword%")
                ->orWhere('paralelo', 'LIKE', "%$keyword%")
                ->orWhere('descripcion', 'LIKE', "%$keyword%")
                ->orWhere('lista_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $integrante = Integrante::latest()->paginate($perPage);
        }

        return view('admin.integrante.index', compact('integrante'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        
        return view('admin.integrante.create');
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
        
        $requestData = $request->all();

        $requestData = $request->all();
                if ($request->hasFile('foto')) {
            $requestData['foto'] = $request->file('foto')
                ->store('uploads', 'public');
        }
        
        Integrante::create($requestData); 

        $count_integrantes = Integrante::where('lista_id','=',$requestData['lista_id'])->count();

        Lista::where('id', $requestData['lista_id'])->update(['cantidad_integrantes' => $count_integrantes]);

        return redirect('admin/list')->with('flash_message', 'Integrante added!');
        //return redirect('admin/integrante')->with('flash_message', 'Integrante added!');
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
        $integrante = Integrante::findOrFail($id);

        return view('admin.integrante.show', compact('integrante'));
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
        $integrante = Integrante::findOrFail($id);

        $cargos = Cargo::where('activo','1')->pluck('cargo_lista', 'id');
        $cursos = Course::where('activo','1')->pluck('curso', 'id');
        $paralelos = Paralelo::where('activo','1')->pluck('paralelo', 'id');
        $listas = Lista::pluck('nombre', 'id');

        return view('admin.integrante.edit', compact('integrante','cargos','cursos','paralelos','listas'));
    }
    
    public function addmember($id)
    {
        $lista = Lista::findOrFail($id);
        $cargos = Cargo::where('activo','1')->pluck('cargo_lista', 'id');
        $cursos = Course::where('activo','1')->pluck('curso', 'id');
        $paralelos = Paralelo::where('activo','1')->pluck('paralelo', 'id');
        return view('admin.integrante.create', compact('lista','cargos','cursos','paralelos'));

        //return view('admin.integrante.edit', compact('integrante'));
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
        
        $requestData = $request->all();
        
        $integrante = Integrante::findOrFail($id);
        $integrante->update($requestData);
        //return redirect()->back()->with('flash_message', 'Integrante updated!');
        //return redirect('admin/integrante')->with('flash_message', 'Integrante updated!');
        return redirect('admin/list/'.$requestData['lista_id'])->with('flash_message', 'Integrante updated!');
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
        Integrante::destroy($id);

        return redirect()->back()->with('flash_message', 'Integrante deleted!');
        //return redirect('admin/integrante')->with('flash_message', 'Integrante deleted!');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }
    
}
