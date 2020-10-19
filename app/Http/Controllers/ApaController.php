<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apa;
use App\Models\Localizacao;
class ApaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     private $apa;
     private $localizacao;

     public function __construct()
     {
        $this->middleware('auth');

        $this->apa=new Apa();
        $this->localizacao=new Localizacao();
     }

    public function index()
    {
        //
        $apas = $this->apa->paginate(15);;
        return view('apa.index',compact('apas'));
        
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
        
    //Instruçáo para cadastrar a localização com os dados que vêm do formulario da modal cadastrar Apa

    $localizacao = $this->localizacao->create([
        
        'provincia'=>$request->provincia,
        'municipio'=>$request->municipio,
        'districto'=>$request->districto,
        'bairro'=>$request->bairro,
        'rua'=>$request->rua,
        'numero_da_casa'=>$request->numero_da_casa,


    ]);

    // se a localização for feita com sucesso então faz o cadastro da Apa        
    
    if($localizacao){

        //Instruçáo para cadastrar a apa com os dados que vêm do formulario da modal cadastrar Apa

    $insertapa = $this->apa->create([
        
        'nome'=>$request->nome,
        'email'=>$request->email,
        'telefone'=>$request->nome,
        /*
         O campo localização sera preenchido com o 
         retorno do cadastro da localização acessando o campo id*/

        'localizacao_i'=>$localizacao->id

        ]);

        if($insertapa){
            echo 'Dados Cadastrados com sucesso';
        }else{
            echo 'Erro ao Cadastrar os Dados';
        }
    
    }
    
    
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
        $apas = $this->apa->find($id);
        return view('apa.show',compact('apas'));
    
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
        $apas = $this->apa->find($id);
        return view('apa.edit',compact('apas'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //

            
    //Instruçáo para actualizar a localização com os dados que vêm do formulario da modal cadastrar Apa

    $localizacao = $this->localizacao->where('id',$request->localizacao_id)->update([
        
        'provincia'=>$request->provincia,
        'municipio'=>$request->municipio,
        'districto'=>$request->districto,
        'bairro'=>$request->bairro,
        'rua'=>$request->rua,
        'numero_da_casa'=>$request->numero_da_casa,


    ])->get();

    // se a localização for feita com sucesso então faz o cadastro da Apa        
    
    if($localizacao){

        //Instruçáo para atualizar a apa com os dados que vêm do formulario da modal cadastrar Apa

    $insertapa = $this->apa->where('id',$request->apa_id)->update([
        
        'nome'=>$request->nome,
        'email'=>$request->email,
        'telefone'=>$request->nome,
        /*
         O campo localização sera preenchido com o 
         retorno do cadastro da localização acessando o campo id*/

        'localizacao_i'=>$localizacao->id

        ]);

        if($insertapa){
            echo 'Dados Alterados com sucesso';
        }else{
            echo 'Erro ao Alterar os Dados';
        }
    
    }
    
        
        

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
        $pagar = $this->apa->destroy($id);
    }

    public function procurar(Request $request)
    {
    
    $apas = $this->apa->where('id',$request->apa_id)->get();

        return view('apa.consulta',compact('apas'));
    }


}
