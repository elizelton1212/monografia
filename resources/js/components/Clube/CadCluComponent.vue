<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card card-primary">
                    <div class="card-header">Cadastrar Clube</div>

                    <div class="card-body">

                    <form method="post" @submit.prevent='cadastrarClube()' enctype='multipart/form-data'>
                        <input type="text" class="form-control" v-model='nome' placeholder='Digite o Nome' required>
                        <input type="text" class="form-control" v-model='cores' placeholder='Digite as cores' required>
                <input type="text" class="form-control" v-model='acronimo' placeholder='Digite o Acronimo' required>
                <label>Selecione a Insignia do clube</label><input type="file" class="form-group" id='customFile' @change='imagemSelecionada' required>
                        <input type="text" class="form-control" v-model='telefone' placeholder='Digite o nº Telefone' required>
                        <input type="email" class="form-control" v-model='email' placeholder='Digite o email' required>
                        <input type="text" class="form-control" v-model='site' placeholder='Digite o endereço do seu site' required>
                                           

         <lable>Municipio</lable>

        <select required  v-model='municipio' id='municipio' @change='link3()'>
         <option value></option>
         <option v-model='municipio'  v-for='(municipios) in municipios' ::key="municipios.id" >{{municipios.nome}}</option>

         </select>
        
         <lable>Districto</lable>


         <select v-model='districto' id='districto'>
         <option v-for='(districtos) in districtos' ::key="districtos.id">{{districtos.nome}}</option>
         </select>
        
         <lable>Comuna</lable>

        <select v-model='comuna' id='comuna' @click='link4()'>
         <option value v-for='(comunas) in comunas' ::key="comunas.id">{{comunas.nome}}</option>
         </select>
         <input type="text" class="form-control" v-model='bairro' id='bairro' placeholder="Bairro">
         <input type="text"  required v-model='rua' id='rua' placeholder="Rua">
         <input type="text"  required v-model='ncasa' id='responsavel' placeholder="Nº Casa">


<br>
<br>
<button class='form-group btn btn-primary' >Registar</button><button class='form-group btn btn-danger'>Limpar</button>
<center></center>




                    </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {

                provincias:'',
                municipios:'',
                districtos:'',
                bairros:'',
                comunas:'',
                provincia:'',
                municipio:'',
                districto:'',
                rua:'',
                bairro:'',
                associacoes:'',
                nome:'',
                associacao:'',
                cores:'',
                acronimo:'',
                insignia:'',
                telefone:'',
                email:'',
                site:'',
                imagem:null,
                imagem2:'',
                imagemPreview:null,

            }
        },


        mounted() {
            console.log('Component mounted.')
            this.getResults();
            this.link2();
            this.link3();
            this.link4();
            this.consultarAsso();

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

              axios.get('ConsultarProvinciasID').then(response=>{
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
          consultarAsso(){

            axios.get('clubeConsultaAssociacao').then(response=>{
                this.associacoes= response.data;

            })

          },

          imagemSelecionada(e){

          this.insignia=e.target.files[0];
let reader = new FileReader();
reader.readAsDataURL(this.insignia);
reader.onload=e=>{
this.imagemPreview =e.target.result;

};


          },

         cadastrarClube(){


           let data = new FormData;
          
              data.append('nome',this.nome);
              data.append('cores',this.cores);
              data.append('insignia',this.insignia);
              data.append('telefone',this.telefone);
              data.append('email',this.email);
              data.append('site',this.site);
              data.append('acronimo',this.acronimo);
              data.append('associacao',this.associacao);
              data.append('provincia',this.provincia);
              data.append('municipio',this.municipio);
              data.append('districto',this.districto);
              data.append('comuna',this.comuna);
              data.append('bairro',this.bairro);
              data.append('ncasa',this.ncasa);


              axios.post('cadastrarClube1',data).then(response=>{
                  this.nome = '';
                  this.cores= '';
                  this.insignia= '';
                  this.telefone= '';
                  this.email= '';
                  this.site='';
                  this.acronimo= '';
                  this.associacao='';
                  this.provincia='';
                  this.comuna='';
                  this.bairro='';
                  this.municipio='';
                  this.districto='';
                  this.ncasa='';






                
                this.retorno =response.data;
              });
            
          },



        },

    }
</script>
