<?php

namespace App\Http\Controllers;

use App\Models\Federacao;
use Illuminate\Http\Request;

class FederacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

private $federacao;
     public function __construct(){

$this->federacao =new Federacao();

     }
    public function index()
    {
        //

        return view("federacao.index");
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


$imagem= request()->file('imagem');




$imagemNome=$imagem->getClientOriginalName();

$imagemNome=time().'_'.$imagemNome;


$imagem->move(public_path('/images'),$imagemNome);

$insert = $this->federacao->create([

    'nome'=>$request->nome,
    'sigla'=>$request->sigla,
    'modalidade'=>$request->modalidade,
    'president'=>$request->president,
    'telefone'=>$request->telefone,
    'email'=>$request->email,
    'imagem'=>'images/'.$imagemNome,
    
]);


if($insert){

    return 'Dados Cadastrados com sucesso';
}else{

    return 'Erro ao cadastrar os dados';
}

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Federacao  $federacao
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $federacoes = $this->federacao->paginate(20);

        return response()->json($federacoes);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Federacao  $federacao
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {

        $id = $request->verid;
        $update = $this->federacao->where('id',$id)->update([
            
            'nome'=>$request->vernome,
            'sigla'=>$request->versigla,
            'modalidade'=>$request->vermodalidade,
            'president'=>$request->verpresident,
            'telefone'=>$request->vertelefone,
            'email'=>$request->veremail,
            'imagem'=>$request->imagem,


        ]);



    }


    public function apagarFederacao($id)
    {
        $this->federacao->destroy($id);

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Federacao  $federacao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Federacao $federacao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Federacao  $federacao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Federacao $federacao)
    {
        //
    }

    public function procuraFederacao($id)
    {
        $fed = $this->federacao->find($id);
        return response()->json($fed);

    }

    public function ConsultarFederacao()
    {
        return view('federacao.consultar');
    }

    public function consultarFederacao2(Request $request)
    {
        # code...

           $fed = $this->federacao->all();
        return response()->json($fed);

    }
}
