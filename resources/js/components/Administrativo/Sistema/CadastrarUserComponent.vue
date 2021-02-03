<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-header">Registar Utilizador (Administrador da Federação)</div>

                    <div class="card-body">
                    <input type='text' v-model='nome' id='nome' required class='form-control' placeholder='Nome Completo'>
                    <input type='email' v-model='email' id='email' required class='form-control' placeholder ='Email'>
                    <input type='password' v-model='password' id='password' required class='form-control' placeholder ='Palavra Pass'>
                    <Lable>Imagem</lable>
                    <input type='file' @change='imagemSelecionada'>
                   <br>
                    <lable>Federacao</lable>
                    <select  v-model='federacao'>
                    <option  v-for='(federacaos) in federacaos' ::key="federacaos.id">{{federacaos.nome}}</option>
                    </select>
                    <br><hr>
                    <center><button type='submit' class='btn btn-success'>Registar</button><button type='reset' class='btn btn-danger'>Limpar</button></center>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
    dat(){

    return{
    federacaos:'',
    nome:'',
    email:'',
    imagem:'',
    password:'',
    }
    },
        mounted() {
            console.log('Component mounted.')
            this.federacaos
        },

        methods:{
        consultarFederacao(){

        axios.post('consultarFederacao2').then(response=>{
        console.log(ressponse.data)
        this.federacaos=response.data;
        });
        },

        imagemSelecionada(){

        },

        }



    }
</script>
