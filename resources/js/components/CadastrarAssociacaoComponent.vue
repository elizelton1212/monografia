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

<div class="col-md-4">
                <div class="card card-primary">
                    <div class="card-header ">Contacto</div>

                    <div class="card-body">
                        <div class="form-group">
                        <form>
                        
         <input type="tel" class="form-control-range" v-model='telefone'  id="telefone" placeholder="Telefone" required>
         <input type="email" class="form-control-range" v-model='email' id="email" placeholder="Em@il" required>
         <input type="text" class="form-control-range" v-model='facebook'    id="facebook"    placeholder="Facebook">
         <input type="txt" class="form-control-range" v-model='twitter'       id="twitter"    placeholder="Twitter">
<br>
<button type='submit' class='btn btn-primary' @click.prevent="salvarContacto">Cadastrar</button><button type='reset' class='btn btn-danger'>Limpar</button>
                        </form>
                      </div>

                    </div>
                </div>
            </div>



<div class="col-md-4">
                <div class="card card-primary">
                    <div class="card-header ">Associação</div>

                    <div class="card-body">
                        <div class="form-group">
                        <form>
                        
         <input type="tel" class="form-control-range" v-model='telefone'  id="telefone" placeholder="Telefone" required>
         <input type="email" class="form-control-range" v-model='email' id="email" placeholder="Em@il" required>
         <input type="text" class="form-control-range" v-model='facebook'    id="facebook"    placeholder="Facebook">
         <input type="txt" class="form-control-range" v-model='twitter'       id="twitter"    placeholder="Twitter">
<br>
<button type='submit' class='btn btn-primary' @click.prevent="salvarContacto">Cadastrar</button><button type='reset' class='btn btn-danger'>Limpar</button>
                        </form>
                      </div>

                    </div>
                </div>
            </div>


<div class="col-md-4">
                <div class="card card-primary">
                    <div class="card-header ">Clube</div>

                    <div class="card-body">
                        <div class="form-group">
                        <form>
                        
         <input type="tel" class="form-control-range" v-model='nomeClube'  id="nomeClube" placeholder="Nome" required>
         <input type="email" class="form-control-range" v-model='diminuitivo' id="diminuitivo" placeholder="diminuitivo" required>
         <input type="text" class="form-control-range" v-model='insignia'    id="insignia"    placeholder="Insignia">
         <input type="text" class="form-control-range" v-model='cor'       id="cor"    placeholder="Cor">
         <select v-model='provinciaClube' required class="form-control-feedback" id='provincia'>
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
         <input type="txt" class="form-control-range" v-model='municipioClube' id="municipioClube" placeholder="Municipio" required>
         <input type="txt" class="form-control-range" v-model='districtoClube' id="districtoClube" placeholder="Districto" required>
         <input type="txt" class="form-control-range" v-model='bairroClube'    id="bairroClube"    placeholder="Bairro">
         <input type="txt" class="form-control-range" v-model='ruaClube'       id="ruaClube"    placeholder="Rua">
       <input type="txt" class="form-control-range" v-model='numero_casaClube' id="numero_casaClube" placeholder="Numero da Casa" required>     

<br>
<button type='submit' class='btn btn-primary' @click.prevent="salvarClube">Cadastrar</button><button type='reset' class='btn btn-danger'>Limpar</button>
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
