<template>
    <div class="container">
        <div class=" row justify-content-left" >
            <div  class="col-lg-3 col-sm-3 col-xs-3"v-for='(federacao, index ) in federacao.data' ::key="federacao.id">
                <div  class="card card-primary">
                    <div class="card-header"><button  @click='verAssociacoes(federacao.id)' data-toggle='modal' data-target='#ver' class='btn btn-primary'>{{federacao.nome}}</button></div>

                        <div class="card-body" >
                        <center><img height='100' width='120' class="brand-image img-circle elevation-3" style="opacity: .8" :src=federacao.imagem></center><br>
                       
                        <hr>         
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

<ul v-for='(Associacoes) in Associacoes' ::key='Associacoes.id'>
    
    <li>
       <button class="btn btn-primary" @click='pesquisarAssociacao(Associacoes.id)'>{{Associacoes.nome}}</button> 

    </li>
</ul>                
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
                verid:'',
                Associacoes:''
                

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


          verAssociacoes(id){
            axios.get('consultaAsso/'+id).then(response=>{

                this.Associacoes = response.data

            })
            
          },

          pesquisarAssociacao(id){
      location.href='pesquisaAsso/'+id;

          },

        },
    }
</script>
