<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Municipio;
use App\Models\Provincia;
use App\Models\Apa;
use App\Models\Localizacao;
use App\Models\Districto;
use App\Models\Federacao;
use App\Models\Comuna;
use Illuminate\Support\Facades\DB;


class ApaController extends Controller
{
    //

    private $municipio;
    private $provincia;
    private $apa;
    private $l;
    private $districto;
    private $federacao;
    private $comuna;
   

 public function __construct(){
   $this->federacao = new Federacao();
   $this->municipio= new Municipio();
   $this->provincia= new Provincia();
   $this->l=new Localizacao();
   $this->apa=new Apa();
   $this->districto = new Districto();
   $this->comuna = new Comuna();
    }

public function index(){

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





/*

Funcao que renderiza a view para o cadastro de Apas


*/
public function cadastrarApa(){
    	return view('apa.cadastrar');
    }


    public function store($request)
    {
        //

        $provincia_id =$this->ConsultarProvinciaID($request['provincia']);
        $municipio_id =$this->ConsultarMunicipioID($request['municipio']);
$insert = Localizacao::create([

            'provincia_id'=>$provincia_id,
            'municipio_id'=>$municipio_id,
            'districto_id'=>$request['districto'],
            'comuna_id'=>$request['comuna'],
            'bairro'=>$request['bairro'],
            'rua'=>$request['rua'],
            'ncasa'=>$request['ncasa']
            ]);


if ($insert) {
        return $insert->id; 
     
}

    }




/*cadastrar Apa*/

public function storeApa(Request $request)
    {
    	# code...



    	$localizacao['provincia'] = $request->provincia;
    	$localizacao['municipio'] = $request->municipio;
    	$localizacao['districto'] = $request->districto;
    	$localizacao['comuna'] = $request->comuna;
    	$localizacao['bairro'] = $request->bairro;
    	$localizacao['rua'] = $request->rua;
    	$localizacao['ncasa'] = $request->ncasa;
    	$localizacao_id = $this->store($localizacao);


$federacaoId = $this->ConsultarFederacaoID($request->federacao);



    	$insert = Apa::create([

		'nome'=>$request->nome,
		'email'=>$request->email,
		'telefone'=>$request->telefone,
		'facebook'=>$request->facebook,
		'responsavel'=>$request->responsavel,
		'localizacao_id'=>$localizacao_id,
        'federacao_id'=>13,

    		]);


 



    	if ($insert) {
    		# code...

    		$retorno = "Associação Cadastrada Com Sucesso";

        return response()->json($retorno); 


    	}else{

    		$retorno = "Erro ao Cadastrar a Associação";

        return response()->json($retorno); 

    	}

    }    



/*

Funcao que retorna os municipios da provincia selecionada

*/

public function Provincias_Municipios($provincia){


  $provincia_id = $this->provincia->where('nome',$provincia)->get();

        $t;

        foreach ($provincia_id as $x) {
            # code...

            $t = $x->id;
        }

        $municipios = $this->provincia->find($t)->ProvinciaMunicipio;

        return response()->json($municipios); 



    }

    /*

Funcao que retorna todas as comunas mediante ao seu municipio


*/
public function MunicipioComuna($municipio)
{
	# code...

$municipio_id = $this->municipio->where('nome',$municipio)->get();

foreach ($municipio_id as $m) {
	# code...


	$t = $m->id;
}

$comunas = $this->municipio->find($t)->MunicipioComuna;

 return response()->json($comunas);


}



/*

Funcao que retorna todos os districtos de um determinado municipio


*/


public function MunicipioDistricto($municipio){


$municipio_id = $this->municipio->where('nome',$municipio)->get();


foreach ($municipio_id as $m) {
	# code...


	$t = $m->id;
}

$districtos = $this->municipio->find($t)->MunicipioDistricto;

 return response()->json($districtos);


}

public function ConsultarFederacaoID($federacao)
{
    # code...


    $fd = $this->federacao->where('nome',$federacao)->get();

foreach ($fd as $value) {
    

    $x = $value->id;

return $x;

}



}

public function ConsultarAssociacoes()
{
    
 /*   $papel = DB::select('SELECT  f.nome Federacao,a.nome Associacao,p.nome Provincia,a.id Associacao_id FROM 
     provincias p, apas a,localizacaos l,federacaos f WHERE 
     a.federacao_id=f.id and l.id=a.localizacao_id and l.provincia_id=p.id');
*/
$federacaos = $this->federacao->all();

return response()->json($federacaos);



}

public function Consultar()
{
    # code...
    return view('apa.consulta');
}
public function Associacoes($id)
{
    # code...
  
$fed = $this->federacao->find($id)->FederacaoApa;

return response()->json($fed);

}

public function Pa($id)
{
    # code...


    $pa  = $this->apa->find($id);

    $loca=$this->l->find($pa->localizacao_id);
    //dd($loca);

    $provincias =$this->provincia->find($loca->provincia_id) ;

    $municipios =$this->municipio->find($loca->municipio_id);

    $districtos=$this->districto->find($loca->districto_id);

    $comunas =$this->comuna->find($loca->comuna_id);
    
    return view ('apa.consulta2',compact('pa','loca','comunas','provincias','municipios','districtos'));


}

}
