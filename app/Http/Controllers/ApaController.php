<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Municipio;
use App\Models\Provincia;
use App\Models\Apa;
use App\Models\Localizacao;
class ApaController extends Controller
{
    //

    private $municipio;
    private $provincia;

 public function __construct(){

   $this->municipio= new Municipio();
   $this->provincia= new Provincia();

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





    	$insert = Apa::create([

		'nome'=>$request->nome,
		'email'=>$request->email,
		'telefone'=>$request->telefone,
		'facebook'=>$request->facebook,
		'responsavel'=>$request->responsavel,
		'localizacao_id'=>$localizacao_id

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


}
