<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Voto;
use Illuminate\Http\Request;
use DB;

class VotoController extends Controller
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

    public function reset(){
        //$votos = Voto::all();
        //$votos ->truncate();
        DB::table('votos')->truncate();
        return redirect()->back()->with('flash_message', 'Votos reseted!');
    }

    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        /*if (!empty($keyword)) {
            $voto = Voto::where('numero_cedula', 'LIKE', "%$keyword%")
                ->orWhere('lista_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $voto = Voto::latest()->paginate($perPage);
        }*/

        $nulos = DB::table('votos')
        ->whereNull('lista_id')->get();
        $nuloscant = Count($nulos);

        $nulos['nulo'] = "NULO";
        $nulos['cant'] = $nuloscant;

        $voto = DB::table('lists')
    ->join('votos', 'votos.lista_id', '=', 'lists.id')
    ->select('lists.nombre','lists.lista_numero',DB::raw('COUNT(votos.lista_id) as cant'))
    ->groupBy('votos.lista_id')
    ->orderBy('cant', 'DESC')
    ->get();


        return view('admin.voto.index', compact('voto','nulos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.voto.create');
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
        
        Voto::create($requestData);

        return redirect('admin/voto')->with('flash_message', 'Voto added!');
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
        $voto = Voto::findOrFail($id);

        return view('admin.voto.show', compact('voto'));
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
        $voto = Voto::findOrFail($id);

        return view('admin.voto.edit', compact('voto'));
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
        
        $voto = Voto::findOrFail($id);
        $voto->update($requestData);

        return redirect('admin/voto')->with('flash_message', 'Voto updated!');
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
        Voto::destroy($id);

        return redirect('admin/voto')->with('flash_message', 'Voto deleted!');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }
    
}
