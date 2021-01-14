<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Example Cadastro de Federações</div>

                    <div class="card-body">
                       Elizelton Satolia
                    </div>
                </div>
            </div>
        </div>
    </div>

    
</template>

<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3 ">
                <div class="card card-primary">
                    <div class="card-header ">Cadastro de Federações</div>

                    <div class="card-body">
                       <form>
                <input type='text' class='form-control' v-model='nome' id='nome' placeholder='Nome da Federação' required>
                <input type='text' class='form-control' v-model='sigla' id='siglas' placeholder='Siglas' required> 
                <input type='text' class='form-control' v-model='modalidade' id='modalidade' placeholder='Modalidade' required>
                <input type='text' class='form-control' v-model='president' id='president' placeholder='Presidente' required>                 
                <input type='number' class='form-control'  v-model='telefone' id='telefone' placeholder='Telefone' required> 
                <input type='email' class='form-control'  v-model='email' id='email' placeholder='em@ail' required> 

                <button type='submit' @click.prevent="saveFederacao" class='btn btn-primary'>Cadastrar</button>
                <button type='reset' class='btn btn-danger'>Limpar</button>

                       </form>
                    </div>
                </div>
            </div>
             <div class="col-md-9">
                <div class="card card-primary">
                    <div class="card-header">Federações Cadastradas</div>

                    <div class="card-body">
                       <table class='tale table-bordered table-hover dataTable dtr-inline ' border='1'>
                <thead>
                <tr>

                <th scope='col'>#</th>
                <th scope='col'>Nome</th>
                <th scope='col'>Sigla</th>
                <th scope='col'>Telefone</th>
                <th scope='col'>Email</th>
                <th scope='col'>Ações</th>
                </tr>
                </thead>
                <tbody>

                <tr v-for='(federacao, index ) in federacao.data' ::key="federacao.id">
                <th scope='row'>{{index+1}}</th>
                <td>{{federacao.nome}}</td>
                <td>{{federacao.sigla}}</td>
                <td>{{federacao.telefone}}</td>
                <td>{{federacao.email}}</td>
                <td>
                <button class='btn btn-primary small' data-toggle='modal' @click='link(federacao.id)' data-target='#ver'><i class='fas fa-eye'></i></button>
                <button class='btn btn-success small' data-toggle='modal' @click='link(federacao.id)' data-target='#edit'><i class='fas fa-edit'></i></button>
                <button class='btn btn-danger small' @click='deletFederacao(federacao.id)'><i class='fas fa-trash'></i></button>
                </td>
                

                </tr>
                </tbody>
                </table>
            <pagination :data="federacao" @pagination-changed-page="getResults"></pagination>

                      </div>
                </div>
            </div>
        </div>

<div class='modal' tabindex='-1' id='ver' role='dialog'>
<div class='modal-dialog' role="document">
<div class='modal-content'>
<div class='modal-header'>
<h5 class='modal-title'>Federação</h5>

<button type='button' class='close' data-dismiss='modal' arial-lable='close'>
<span aria-hidden='true'>&times;</span>
</button>
</div>
<div class='modal-body'>
<input type='text' class='form-control' v-model='vernome' id='vernome' placeholder='Nome da Federação' required>
                <input type='text' class='form-control' v-model='versigla' id='versiglas' placeholder='Siglas' required> 
                <input type='text' class='form-control' v-model='vermodalidade' id='vermodalidade' placeholder='Modalidade' required>
                <input type='text' class='form-control' v-model='verpresident' id='verpresident' placeholder='Presidente' required>                 
                <input type='number' class='form-control'  v-model='vertelefone' id='vertelefone' placeholder='Telefone' required> 
                <input type='email' class='form-control'  v-model='veremail' id='veremail' placeholder='em@ail' required> 

                
</div>
<div class='modal-footer'>

<button type='button' class='btn btn-secondary' data-dismiss='modal'>Sair</button>

</div>
</div>
</div></div>


<div class='modal' tabindex='-1' id='edit' role='dialog'>
<div class='modal-dialog' role="document">
<div class='modal-content'>
<div class='modal-header'>
<h5 class='modal-title'>Federação</h5>

<button type='button' class='close' data-dismiss='modal' arial-lable='close'>
<span aria-hidden='true'>&times;</span>
</button>
</div>
<div class='modal-body'>
<form>
                <input type='hidden' class='form-control' v-model='verid' id='verid' placeholder='Nome da Federação' required>

                <input type='text' class='form-control' v-model='vernome' id='vernome' placeholder='Nome da Federação' required>
                <input type='text' class='form-control' v-model='versigla' id='versiglas' placeholder='Siglas' required> 
                <input type='text' class='form-control' v-model='vermodalidade' id='vermodalidade' placeholder='Modalidade' required>
                <input type='text' class='form-control' v-model='verpresident' id='verpresident' placeholder='Presidente' required>                 
                <input type='number' class='form-control'  v-model='vertelefone' id='vertelefone' placeholder='Telefone' required> 
                <input type='email' class='form-control'  v-model='veremail' id='veremail' placeholder='em@ail' required> 
<button type='button' class='btn btn-primary' @click.prevent="editarFederacao">Guardar Mudancas</button>

  </form>                   
</div>
<div class='modal-footer'>
<button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
  
</div>
</div>
</div></div>

    </div>

    
</template>

<script>
    export default {
        data(){
            return {
                federacao:{},
                nome:'',
                sigla:'',
                modalidade:'',
                president:'',
                telefone:'',
                email:'',
                vernome:'',
                versigla:'',
                vermodalidade:'',
                verpresident:'',
                vertelefone:'',
                veremail:'',
                editarnome:'',
                editarsigla:'',
                editarmodalidade:'',
                editarpresidente:'',
                editartelefone:'',
                editaremail:'',
                verid:''
            }
        },
        mounted() {
            console.log('Component mounted.')
                this.getResults();

        },

        methods:{
            saveFederacao(){
              axios.post('cadastrarFederacao',{
                  federacao:{},
                  nome:this.nome,
                  sigla:this.sigla,
                  modalidade:this.modalidade,
                  president:this.president,
                  telefone:this.telefone,
                  email:this.email,
               
                


              }).then(response=>{
                  this.nome = '';
                  this.sigla= '';
                  this.modalidade= '';
                  this.president= '';
                  this.telefone= '';
                  this.email= '';
                this.getResults();
              });
            
          },
          getResults(page = 1){
              axios.get('federacoes?page='+page)
              .then(response=>{
                  console.log(response.data)
                  this.federacao = response.data;

              });
          },

          link(id){
              
              axios.get('procuraFederacao/'+id).then(response=>{
                  console.log(response);
                  this.vernome =response.data.nome;
                  this.versigla= response.data.sigla;
                  this.vermodalidade = response.data.modalidade;
                  this.verpresident = response.data.president;
                  this.vertelefone=response.data.telefone;
                  this.veremail=response.data.email;
                  this.verid=response.data.id;

              });
          },

          editarFederacao(){

               axios.post('editarFederacao',{
                 verid:this.verid,
                  vernome:this.vernome,
                  versigla:this.versigla,
                  vermodalidade:this.vermodalidade,
                  verpresident:this.verpresident,
                  vertelefone:this.vertelefone,
                  veremail:this.veremail
                
               
                


              }).then(response=>{
                  console.log(response)
                   this.getResults();
              });

          },

          deletFederacao(id){
              axios.delete('apagarFederacao/'+id).then(response=>{
                   this.getResults();


              })
          }

        },




    }
</script>
