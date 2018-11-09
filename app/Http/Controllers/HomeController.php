<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lista;
use App\Integrante;
use App\Voto;
use Validator;
use App\Http\Requests;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function ingreso(Request $request)
    {
        


        if (!empty($request['cod_estudiante'])) {
            $codigo_estudiante = $request['cod_estudiante'];
            $listas = Lista::get();
            flash('Bienvenido '.$request['cod_estudiante'])->success(); 
            return view('sufragar',compact('codigo_estudiante','listas'));
        }else{
            flash('No se puede continuar '.$request['cod_estudiante'])->warning(); 
            return redirect()->back();
        }
    }

    public function verlista($idlista, $codigo_estudiante){
        $lista = Lista::where('id', $idlista)->first();
        $integrantes = Integrante::where('lista_id', $idlista)->get(); 
        
        return view('detallelista', compact('lista','integrantes','codigo_estudiante'));
    }
    
    public function votolista(Request $request){

        $rules = array
        (
            'numero_cedula' => 'required|unique:votos'
        );
        $messages = array
        (
            'numero_cedula.required' => 'Ingrese el código del estudiante.',
            'numero_cedula.unique' => 'Ya existe un voto con este codigo',
        );


        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails())
        {
            return redirect()->back()->withInput()->withErrors($validator)->withInput();
            
        }

        try {

            Voto::create([
                'numero_cedula' => $request['numero_cedula'],
                'lista_id' => $request['lista_id']
            ]);

            flash('Voto realizado con exito...')->success()->important(); 

        } catch (\Exception $e) {
            flash('Ya existe un voto con este codigo :'. $request['codigo_estudiante'])->warning()->important(); 
        }

        
        return view('finalizavoto');
    }

    
    public function votonulo(Request $request, $codigo_estudiante){

        $request['numero_cedula'] = $codigo_estudiante;
        $request['lista_id'] = '0';

        $rules = array
        (
            'numero_cedula' => 'required|unique:votos'
        );
        $messages = array
        (
            'numero_cedula.required' => 'Ingrese el código del estudiante.',
            'numero_cedula.unique' => 'Ya existe un voto con este codigo',
        );


        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails())
        {
            return redirect()->back()->withInput()->withErrors($validator)->withInput();
            
        }

        try {

            Voto::create([
                'numero_cedula' => $request['numero_cedula']
            ]);

            flash('Voto realizado con exito...')->success()->important(); 

            if(Auth::check()){
                Auth::logout();
            }

        } catch (\Exception $e) {
            flash('Ya existe un voto con este codigo :'. $request['numero_cedula'])->warning()->important(); 
        }

        
        return view('finalizavoto');
    }
}
