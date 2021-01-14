<?php

namespace App\Http\Controllers;

use App\Models\Localizacao;
use App\Models\Provincia;
use App\Models\Municipio;
use Illuminate\Http\Request;

class LocalizacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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


/*
Consultar a provicia para retornar o codigo para cadastrar na Localizacao
*/

public function ConsultarProvinciaID($provincia)
{
    # code...
    $t;
    $provincias = Provincia::where('nome',$provincia)->get();

    foreach ($provincias as $p) {
          # code...
        $t = $p->id;

      }

        return $t; 


}




/*
Consultar a municipio para retornar o codigo para cadastrar na Localizacao
*/

public function ConsultarMunicipioID($municipio)
{
    # code...
    $t;
    $provincias = Municipio::where('nome',$municipio)->get();

    foreach ($provincias as $p) {
          # code...
        $t = $p->id;

      }

        return $t; 


}


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $provincia_id =$this->ConsultarProvinciaID($request->provincia);
        $municipio_id =$this->ConsultarMunicipioID($request->municipio);
$insert = Localizacao::create([

            'provincia_id'=>$provincia_id,
            'municipio_id'=>$municipio_id,
            'districto_id'=>$request->districto,
            'comuna_id'=>$request->comuna,
            'bairro'=>$request->bairro,
            'rua'=>$request->rua,
            'ncasa'=>$request->ncasa
            ]);


if ($insert) {
        return response()->json($insert->id); 
     
}

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Localizacao  $localizacao
     * @return \Illuminate\Http\Response
     */
    public function show(Localizacao $localizacao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Localizacao  $localizacao
     * @return \Illuminate\Http\Response
     */
    public function edit(Localizacao $localizacao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Localizacao  $localizacao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Localizacao $localizacao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Localizacao  $localizacao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Localizacao $localizacao)
    {
        //
    }
}
