<template>
    <div class="container">
        <div class="row justify-content-left" >
            <div class="row-md-1"v-for='(federacao, index ) in federacao.data' ::key="federacao.id">
                <div class="card card-primary">
                    <div class="card-header">{{federacao.nome}}</div>

                        <div class="card-body" >
                        <center><img height='100' width='120' class="brand-image img-circle elevation-3" style="opacity: .8" :src=federacao.imagem></center><br>
                        
                        

                        

                       
                        <hr>

<button class='btn btn-primary small' data-toggle='modal' @click='link(federacao.id)' data-target='#ver'><i class='fas fa-eye'></i></button>
                <button class='btn btn-success small' data-toggle='modal' @click='link(federacao.id)' data-target='#edit'><i class='fas fa-edit'></i></button>
                <button class='btn btn-danger small' @click='deletFederacao(federacao.id)'><i class='fas fa-trash'></i></button>

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
    return{
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
            console.log('Component mounted.');
            this.getResults();
        },

        methods:{


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
