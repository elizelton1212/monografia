<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\RoleUser;
use App\Models\Federacao;
use App\Models\UserAssociacao;
use App\Models\FederacaoUser;

class UserController extends Controller
{

private $fed_id;
private $user;
private $papel;
private $roleUser;
private $ua;
private $fU;
public function __construct()
{
    # code...

    $this->user = new User();
    $this->papel = new Role();
    $this->roleUser = new RoleUser();
    $this->fu=new FederacaoUser();
    $this->ua = new UserAssociacao();
    $this->federacao = new Federacao();
}


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('Administrativo.Sistema.cadastrarUser');
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

      return  $request;

        $federacao_id = $this->consultarFederacao($request->federacao);
        $papel_id = $this->consulTarPapelID($request->funcao);

$imagem= request()->file('imagem');


$imagemNome=$imagem->getClientOriginalName();
$imagemNome=time().'_'.$imagemNome;
$imagem->move(public_path('/images'),$imagemNome);


$user = $this->user->create([
    'name'=>$request->nome,
    'email'=>$request->email,
    'imagem'=>'images'.$imagemNome,
    'password'=>$request->password,

    ]);

if($user){

$fus = $this->fu->create([
    'user_id'=>$user->id,
    'federacao_id'=>$federacao_id
    ]);




}

if($fus){
$this->roleUser->create([
    'role_id'=>$papel_id,
    'user_id'=>$user->id
    ]);

return "Dados Cadastrados Com Sucesso";

}else{


    return "Erro ao Cadastrar Dados";
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

    public function consultarPapel()
    {
        # code...

$papeis = $this->papel->all();

        return response()->json($papeis);
    }

    public function consulTarPapelID($papel)
    {
        # code...


        $papeis = $this->papel->where('name',$papel)->get();
$papel_id;
        foreach ($papeis as $p) {
            # code...

            $papel_id = $p->id;
        }


        return $papel_id;
    }

public function consultarFederacao($federacao)
{
    # code...


    $federacaos = $this->federacao->where('nome',$federacao)->get();



    foreach ($federacaos as $f) {
        # code...

        $federacao_id = $f->id;
    }

    return $this->fed_id;
}

}
