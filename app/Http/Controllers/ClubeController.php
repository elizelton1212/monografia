<?php

namespace App\Http\Controllers;

use App\Models\Clube;
use App\Models\Apa;
use App\Models\Localizacao;
use App\Models\Provincia;
use App\Models\Municipio;
use App\Models\Districto;
use App\Models\Comuna;
use Illuminate\Support\Facades\DB;
use App\Models\UserAssociacao;




use Illuminate\Http\Request;

class ClubeController extends Controller
{
private $t;
private $associacao ;
 private $municipio;
    private $provincia;
    private $clube;
    private $l;
    private $districto;
    private $federacao;
    private $comuna;

public function __construct()
{
    

   $this->associacao = new Apa;
   $this->municipio= new Municipio();
   $this->provincia= new Provincia();
   $this->l=new Localizacao();
   $this->apa=new Apa();
   $this->districto = new Districto();
   $this->comuna = new Comuna();
   $this->clube= new Clube(); 
}


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view('clube.cadastrar');


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
        //



$imagem= request()->file('insignia');

$imagemNome=$imagem->getClientOriginalName();

$imagemNome=time().'_'.$imagemNome;


$imagem->move(public_path('/images/clubes'),$imagemNome);
//$provincia_id=$this->ConsultarProvinciaID($request->provincia);
$municipio_id=$this->ConsultarMunicipioID($request->municipio);


$r = UserAssociacao::where('user_id',auth()->user()->id)->get();   
        foreach ($r as $value) {
            # code...

            $this->t = $value->associacaos_id;
        }

         $apa = Apa::find($this->t);

        $localizacao = $apa->localizacao_id;

        $id_provincia= Localizacao::find($localizacao)->provincia_id;
        $provincia_id = $this->provincia->find($id_provincia)->id;



$localizacao = $this->l->create([
    'provincia_id'=>$provincia_id,
    'municipio_id'=>$municipio_id,
    'districto_id'=>null,
    'comuna_id'=>null,
    'bairro'=>$request->bairro,
    'rua'=>$request->rua,
    'ncasa'=>$request->ncasa,

    ]);

if ($localizacao) {

  //  $associacao_id = $this->ConsultarAssociacaoID($request->associacao);

    $r = UserAssociacao::where('user_id',auth()->user()->id)->get();   
        foreach ($r as $value) {
            # code...

            $this->t = $value->associacaos_id;
        }



    $insert = $this->clube->create([
        'nome'=>$request->nome,
        'cores'=>$request->cores,
        'acronimo'=>$request->acronimo,
        'insignia'=>'images/clubes/'.$imagemNome,
        'telefone'=>$request->telefone,
        'email'=>$request->email,
        'site'=>$request->site,
        'apa_id'=>$this->t,
        'localizacao_id'=>$localizacao->id


        ]);



    if($insert){
return 'Dados Cadastrados Com Sucesso';

    }else{
        return 'Erro ao Cadastrar os Dados';
    }
    


}




    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clube  $clube
     * @return \Illuminate\Http\Response
     */
    public function show(Clube $clube)
    {
        
        return view('clube.consultar');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clube  $clube
     * @return \Illuminate\Http\Response
     */
    public function edit(Clube $clube)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clube  $clube
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clube $clube)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clube  $clube
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clube $clube)
    {
        //
    }

    public function Associacoes()
    {
        
        $associacoes = $this->associacao->all();

        return response()->json($associacoes);
    }



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



/*public function COnsultarDistrictoID($districto)
{
 

 $t;
    $districtos = Districto::where('nome',$districto)->get();

    foreach ($districtos as $p) {
          # code...
        $t = $p->id;

      }

        return $t; 
   

}*/

/*public function ConsultarComuna($comuna)
{
    
 $t;
    $comunas = Comuna::where('nome',$comuna)->get();

    foreach ($comunas as $p) {
          # code...
        $t = $p->id;

      }

        return $t; 
   
}*/

public function ConsultarAssociacaoID($associacao)
{
    
 $t;
    $comunas = Apa::where('nome',$associacao)->get();

    foreach ($comunas as $p) {
          # code...
        $t = $p->id;

      }

        return $t; 


}

public function consultarClubes()
{
    


       $r = UserAssociacao::where('user_id',auth()->user()->id)->get();   
        foreach ($r as $value) {
            # code...

            $this->t = $value->associacaos_id;
        }

 $select = Apa::find($this->t)->clubes;

        
        
        return response()->json($select);

}



public function ConsultarProvinciasID()
{
    # code...
    $r = UserAssociacao::where('user_id',auth()->user()->id)->get();   
        foreach ($r as $value) {
            # code...

            $this->t = $value->associacaos_id;
        }

        $apa = Apa::find($this->t);

        $localizacao = $apa->localizacao_id;

        $id_provincia= Localizacao::find($localizacao)->provincia_id;
        $municipios = $this->provincia->find($id_provincia)->ProvinciaMunicipio;
        
        return response()->json($municipios);

}

}
