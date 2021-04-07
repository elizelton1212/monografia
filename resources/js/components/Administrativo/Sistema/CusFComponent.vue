<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                    <form method='post' @submit.prevent='cadastrarUser'>
                    <input type='text' class='form-control' v-model='nome' placeholder='Nome Completo' required>
                     <input type='email' v-model='email' id='email' required class='form-control' placeholder ='Email'>
                    <input type='password' v-model='password' id='password' required class='form-control' placeholder ='Palavra Pass'>
                    Imagem
                    <input type='file' @change='imagemSelecionada'>
                   <br>
                    Federacao
                    <select  v-model='federacao'>
                    <option  v-for='(federacaos) in federacaos' ::key="federacaos.id">{{federacaos.nome}}</option>
                    </select>
                    Função
                    <select v-model='funcao' >
                    <option v-for='(roles) in roles' ::key="roles.id">{{roles.name}}</option>

                    </select>
                    <br><hr>
                    <center><button type='submit' class='btn btn-success'>Registar</button><button type='reset' class='btn btn-danger'>Limpar</button></center>

                    <strong v-if='retornoCadastro'></strong>
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
    return{
    federacaos:'',
    funcao:'',
    federacao:'',
    nome:'',
    email:'',
    imagem:null,
    password:'',
    retornoCadastro:'',
    imagemPreview:null,
    roles:'',

    }
    },
        mounted() {
            console.log('Component mounted.')
            this.consultarFederacao();
            this.Papeis();
        },
          methods:{
        consultarFederacao(){

        axios.post('ConsultarFederacao2').then(response=>{
        console.log(response.data)
        this.federacaos=response.data;
        });
        },

        cadastrarUser(){
          let data = new FormData;
            data.append('nome',this.nome);
            data.append('email',this.email);
            data.append('imagem',this.imagem);
            data.append('funcao',this.funcao);
            data.append('federacao',this.federacao);
            data.append('password',this.password);



            axios.post('cadastrarUser',data).then(response=>{
            this.retornoCadastro = response.data;

        });

        },

        imagemSelecionada(e){
        this.imagem=e.target.files[0];
        let reader = new FileReader();
reader.readAsDataURL(this.imagem);
reader.onload=e=>{
this.imagemPreview =e.target.result;

}
        },

        Papeis(){

        axios.post('consultarPapeis').then(response=>{
        console.log(response.data);
        this.roles = response.data;

        });


        },

        }

    }
</script>
