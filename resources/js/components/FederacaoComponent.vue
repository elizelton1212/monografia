
<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 ">
                <div class="card card-primary">
                    <div class="card-header ">Cadastro de Federações</div>

                    <div class="card-body">
                       <form method='post' @submit.prevent="saveFederacao" enctype='multipart/form-data' >
                <input type='text' class='form-control' v-model='nome' id='nome' placeholder='Nome da Federação' required>
                <input type='text' class='form-control' v-model='sigla' id='siglas' placeholder='Siglas' required> 
                <input type='text' class='form-control' v-model='modalidade' id='modalidade' placeholder='Modalidade' required>
                <input type='text' class='form-control' v-model='president' id='president' placeholder='Presidente' required>                 
                <input type='number' class='form-control'  v-model='telefone' id='telefone' placeholder='Telefone' required> 
                <input type='email' class='form-control'  v-model='email' id='email' placeholder='em@ail' required> 
                
                <lable>Escolha uma Imagem</lable>
                <input type='file'  id='customFile' @change='imagemSelecionada'>
                <div  v-if='imagemPreview'>
                <img :src='imagemPreview' class='figure-img img-fulid rounded' height='80' style='max-heigth:100px'>
                 </div>                
                <button type='submit'  class='btn btn-primary'>Cadastrar</button>
                <button type='reset' class='btn btn-danger'>Limpar</button>
                            <strong v-if(retorno)>{{retorno}}</strong>
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
                federacao:{},
                nome:'',
                sigla:'',
                modalidade:'',
                president:'',
                telefone:'',
                email:'',
                imagem:null,
                imagem2:'',
                imagemPreview:null,
                'retorno':'',
            }
        },
        mounted() {
            console.log('Component mounted.')
               

        },

        methods:{
            saveFederacao(){
             let data = new FormData;
          
              data.append('nome',this.nome);
              data.append('imagem',this.imagem);
              data.append('sigla',this.sigla);
              data.append('modalidade',this.modalidade);
              data.append('president',this.president);
              data.append('telefone',this.telefone);
              data.append('email',this.email);




              this.imagem2=data;
              axios.post('cadastrarFederacao',data).then(response=>{
                  this.nome = '';
                  this.sigla= '';
                  this.modalidade= '';
                  this.president= '';
                  this.telefone= '';
                  this.email= '';
                  this.imagemPreview='';
                
                this.retorno =response.data;
              });
            
          },


          imagemSelecionada(e){

          this.imagem=e.target.files[0];
let reader = new FileReader();
reader.readAsDataURL(this.imagem);
reader.onload=e=>{
this.imagemPreview =e.target.result;

};


          },
         
        },




    }
</script>
