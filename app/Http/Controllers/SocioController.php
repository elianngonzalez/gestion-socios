<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Socio;

class SocioController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('socio.index');
    }

    public function socio(){
        $socios = Socio::all();
            return datatables()->of($socios)
            ->addColumn('btn', 'actions') 
            ->rawColumns(['btn'])
            ->make(true);
    }    

    /**     
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $socios = new Socio();

        $socios -> nombre         = $request -> get('nombre');
        $socios -> apellido       = $request -> get('apellido');
        $socios -> doc            = $request -> get('doc');
        $socios -> fecha_nac      = $request -> get('fecha_nac');
        $socios -> lugar_nac      = $request -> get('lugar_nac');
        $socios -> nacionalidad   = $request -> get('nacionalidad');
        $socios -> profesion      = $request -> get('profesion');
        $socios -> domicilio      = $request -> get('domicilio');
        $socios -> email          = $request -> get('email');
        $socios -> tel_laboral    = $request -> get('tel_laboral');
        $socios -> tel_residencia = $request -> get('tel_residencia');





        $socios->save();
        return redirect('/socios');
        
        // TODO LO DE ARRIBA SE PUEDE RESUMIR ASÍ: ↓ 
        //$vinculo = Vinculo::create($request->all());
        //return redirect()->route('vinculos.index')
       }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      //
    }
}
