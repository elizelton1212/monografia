<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-header">Cadastrar Associação</div>

                    <div class="card-body">
             <form>       
         <input type='text' class="form-control-range" v-model='nome' placeholder="Nome" required>
         <input type="email" class="form-control-range" v-model='email' id="email" placeholder="Em@il" required>
         <input type="tel" class="form-control-range" v-model='telefone'  id="telefone" placeholder="Telefone" required>
         <input type="text" class="form-control-range" v-model='facebook'    id="facebook"    placeholder="Facebook">
         <input type="text" class="form-control-range" v-model='responsavel' id='responsavel' placeholder="Responsavel">
         <lable>Provincia</lable>

         <select v-model='provincia' id='provincia' @change='link2()'>

         <option></option>
         <option  v-for='(provincias) in provincias' ::key="provincias.id"  >


         {{provincias.nome}}


         </option>
         </select>

         <lable>Municipio</lable>

        <select required  v-model='municipio' id='municipio' @change='link3()'>
         <option value></option>
         <option v-model='municipio'  v-for='(municipios) in municipios' ::key="municipios.id" >{{municipios.nome}}</option>

         </select>
        
         <lable>Districto</lable>


         <select required v-model='districto' id='districto'>
         <option value v-for='(districtos) in districtos' ::key="districtos.id">{{districtos.nome}}</option>
         </select>
        
         <lable>Comuna</lable>

        <select required v-model='comuna' id='comuna' @click='link4()'>
         <option value v-for='(comunas) in comunas' ::key="comunas.id">{{comunas.nome}}</option>
         </select>

         <input type="text" class="form-control-range" v-model='bairro' id='bairro' placeholder="Bairro">
         <input type="text"  required v-model='rua' id='rua' placeholder="Rua">
         <input type="text"  required v-model='ncasa' id='responsavel' placeholder="Nº Casa">
         <strong  v-if='retorno'></strong>
        
        <br>
        <br>

<button type='submit' class='btn btn-success' @click.prevent="ResgistarApa">Registar</button><button type='reset' class='btn btn-danger'>Limpar</button>

        
         
         </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
data() {
            return {
                federacao:'',
                localizacoes:'',
                localizacao:'',
                federacaos:'',
                retornoLocalizacao:'',
                provincias:'',
                municipios:'',
                districtos:'',
                bairros:'',
                comunas:'',
                provincia:'',
                municipio:'',
                districto:'',
                rua:'',
                responsavel:'',
                ncasa:'',
                email:'',
                telefone:'',
                nome:'',
                facebook:'',
                comuna:'',
                bairro:'',
                retorno:'',
            }
        },

        mounted() {
            console.log('Component mounted.')
            this.getResults();
            this.link2();
            this.link3();
            this.link4();
            this.link5();

        },

        methods:{
getResults(){
              axios.get('consultaProvincia')
              .then(response=>{
                  console.log(response.data)
                  this.provincias=response.data;

              });
          },
       link2(){
             
             var t = $("#provincia").val();

              axios.get('consultarMunicipios/'+t).then(response=>{
              console.log(response.data);
              this.municipios = response.data;
              });           
          },
           link3(){

           var d = $("#municipio").val();

              axios.get('consultarDistricto/'+d).then(response=>{
              console.log(response.data);
              this.districtos = response.data;
              });
              

          },

          link4(){

           var x = $("#municipio").val();

              axios.get('consultarComuna/'+x).then(response=>{
              console.log(response.data);
              this.comunas = response.data;
              });

          },

             ResgistarApa(){
              

              axios.post('registarApa',{

                nome:this.nome,
                email:this.email,
                telefone:this.telefone,
                facebook:this.facebook,
                responsavel:this.responsavel,
                localizacao:this.retornoLocalizacao,
                provincia:this.provincia,
                municipio:this.municipio,
                districto:this.districto,
                comuna:this.comuna,
                bairro:this.bairro,
                rua:this.rua,
                ncasa:this.ncasa,
                federacao:this.federacao



              }).then(response=>{

                this.provincia = '';
                this.municipio= '';
                this.districto= '';
                this.districtos= '';
                this.comuna='';
                this.bairro= '';
                this.rua= '';
                this.ncasa= '';
                this.nome='';
                this.email='';
                this.telefone='';
                this.facebook='';
                this.responsavel='';
                this.localizacao='';
                this.federacao='';
                this.retornoLocalizacao='';
                this.retorno=response.data;



              });
            
          },
          link5(){
          axios.post('ConsultarFederacao2').then(response=>{
        console.log(response.data)
        this.federacaos=response.data;
        });

          },

        },
    }
    
</script>
