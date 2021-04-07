<template>
    <div class="container">
        <div class=" row justify-content-left" >


            <div class="col-lg-3 col-sm-3 col-xs-3" v-for='(apa) in apa' ::key="apa.id">
                <div class="card card-primary">
                    <div class="card-header">{{apa.nome}}</div>

                        <div class="card-body" >
                        <center><img height='100' width='120' class="brand-image img-circle elevation-3" style="opacity: .8" :src=apa.insignia></center><br>
                        
                        

                        

                       
                        <hr>
        

<button class='btn btn-primary small' data-toggle='modal' @click='link(federacao.id)' data-target='#ver'><i class='fas fa-eye'></i></button>
                <button  class='btn btn-success small' data-toggle='modal' @click='link(federacao.id)' data-target='#edit'><i class='fas fa-edit'></i></button>
                
                <button  class='btn btn-danger small' @click='deletFederacao(federacao.id)'><i class='fas fa-trash'></i></button>
                
                        </div>



                </div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {

    data(){
    return{
                 apa:{},
                nome:'',
                
                modalidade:'',
                telefone:'',
                acronimo:'',
                cores:'',
                site:'',
                insignia:'',
                estado:''
    }

    },



        mounted() {
            console.log('Component mounted.');
            this.getResults();
            this.verAdm();
        },

        methods:{


          getResults(){
              axios.get('consultarClubesAuth')
              .then(response=>{
                  console.log(response.data)
                  this.apa = response.data;

              });
          },


          verAdm(){
          axios.get('verAdm').then(response=>{

          this.estado=response.data;



          });
          },

        },
    }
</script>
