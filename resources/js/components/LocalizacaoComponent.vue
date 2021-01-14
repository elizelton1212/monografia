<template>
    <div class="container">
        <div class="row justify-content-left">
            <div class="col-md-4">
                <div class="card card-primary">
                    <div class="card-header ">Cadastrar Localização</div>

                    <div class="card-body">
                        <div class="form-group">
                        <form>
                        <select v-model='provincia' required class="form-control-feedback" id='provincia'>
                        <option value='Luanda'>Luanda</option>
                        <option value='Benguela'>Benguela</option>
                        <option value='Malange'>Malange</option>
                        <option value='Huambo'>Huambo</option>
                        <option value='Huila'>Huila</option>
                        <option value='Namibe'>Namibe</option>
                        <option value='Cunene'>Cunene</option>
                        <option value='Moxico'>Moxico</option>
                        <option value='Cabinda'>Cabinda</option>
                        <option value='Kwanza-Sul'>Kwanza-Sul</option>
                        <option value='Kwanza-Norte'>Kwanza-Norte</option>
                        <option value='Uige'>Uige</option>
                        <option value='Bie'>Bie</option>
                        <option value='Lunda-Sul'>Lunda-Sul</option>
                        <option value='Lunda-Norte'>Lunda-Norte</option>
                        <option value='Luanda'>Zaire</option>
                        <option value='Kuando-Cubango'>Kuando-Cubango</option>                        
                        </select>
                        <label for="exampleInputEmail1">Provincia</label>
                        
                        <br>
         <input type="txt" class="form-control-range" v-model='municipio' id="municipio" placeholder="Municipio" required>
         <input type="txt" class="form-control-range" v-model='districto' id="districto" placeholder="Districto" required>
         <input type="txt" class="form-control-range" v-model='bairro'    id="bairro"    placeholder="Bairro">
         <input type="txt" class="form-control-range" v-model='rua'       id="rua"    placeholder="Rua">
       <input type="txt" class="form-control-range" v-model='numero_casa' id="numero_casa" placeholder="Numero da Casa" required>
<br>
<button type='submit' class='btn btn-primary' @click.prevent="salvarLocalizacao">Cadastrar</button><button type='reset' class='btn btn-danger'>Limpar</button>
                        </form>
                      </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data() {
            return {
              localizacao:{},
              provincia:'',
              municipio:'',
              districto:'',
              bairro:'',
              rua:'',
              numero_casa:''
  
            }
        },

        methods: {
            salvarLocalizacao(){
                axios.post('cadastrarLocalizacao',{
                    provincia:this.provincia,
                    municipio:this.municipio,
                    districto:this.districto,
                    bairro:this.bairro,
                    rua:this.rua,
                    numero_casa:this.numero_casa,
                }).then(response=>{
                    this.provincia='';
                    this.municipio='';
                    this.districto='';
                    this.bairro='';
                    this.rua='';
                    this.numero_casa='';

                });


            }
        },
    }
</script>
