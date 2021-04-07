<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Apa;
use App\User;
use App\Models\UserAssociacao;

class AdmFederacaoController extends Controller
{

private $associacao;
private $user;
private $ua;
    public function __construct()
    {
        $this->associacao= new Apa();
        $this->user = new User();
        $this->ua = new UserAssociacao();
    }
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

public function consultarassociacaoid($federacao)
{
    # code...


    $federacaos = $this->associacao->where('nome',$federacao)->get();

$federacao_id;

    foreach ($federacaos as $f) {
        # code...

        $federacao_id = $f->id;
    }

    return $federacao_id;
}


    public function store(Request $request)
    {
        //
    

$imagem= request()->file('imagem');


$imagemNome=$imagem->getClientOriginalName();
$imagemNome=time().'_'.$imagemNome;
$imagem->move(public_path('/images'),$imagemNome);



    $user = $this->user->create([
    'name'=>$request->nome,
    'email'=>$request->email,
    'imagem'=>'images'.$imagemNome,
    'password'=>bcrypt($request->password),

    ]);
 if ($user){
    $papel = DB::insert('insert into role_user (user_id,role_id) values(?,?)',[$user->id,3]);
    $associacaos_id =$this->consultarassociacaoid($request->federacao);
    $this->ua->create([
            'user_id'=>$user->id,
            'associacaos_id'=>$associacaos_id
        ]); 
    return "Dados cadastrados com sucesso";

 }else{

    return  "Erro ao cadstrar os dados";
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


    public function consultarAssociacoes()
    {
        $retorno = $this->associacao->all();

        return response()->json($retorno); 

    }

    public function CadastrarAdminAssociacao()
    {
        # code...


        return view('Administrativo.Federacao.CadastrarAdmAssociacao');
    }


}
