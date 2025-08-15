<template>
  <div class="grid-hor">

    <form ref="form" method="POST"  class="col-sm-10" @submit.prevent="guardarContacto">
        <input name="_method" type="hidden" value="PATCH">
        <input name="_token" type="hidden" v-model="token">
        <div class="form-group">
          <label>Solicitante</label>
          <select v-model="contacto.SOLIP_Codigo" class="form-control" name="solicitante">
            <option v-for="solicitante in solicitantes" v-bind:value="solicitante.SOLIP_Codigo" v-bind:key="solicitante.SOLIP_Codigo">{{ solicitante.SOLIC_Nombre }}</option>
          </select>
        </div>
        <div class="form-group">
          <label>Nombres</label>
          <input type="text" class="form-control" v-model="contacto.nombre_contacto" autocomplete="off" name="nombre" placeholder="Ingrese el nombre">
        </div>
        <div class="form-group">
          <label>Correo electronico</label>
          <input type="text" class="form-control" v-model="contacto.correo_contacto" autocomplete="off" name="correo" placeholder="Ingrese el correo">
        </div>
        <div class="form-group">
          <label>Celular</label>
          <input type="text" class="form-control" v-model="contacto.celular_contacto" autocomplete="off" name="celular" placeholder="Ingrese el número de celular" maxlength="9">
        </div>
        <button class="btn btn-info" type="submit">Editar</button>
        <a class="btn btn-danger" href="/contacto">Cancelar</a>
    </form>

  </div>
</template>

<script>
    export default {
        data(){
            return {
              contacto:[],
              solicitantes:[],
              saveData:null
            }
        },
        props:{
            codigo:String,
            token:String
        },
        created(){
          this.getContacto(this.codigo);
          this.listarSolicitantes();
        },
        methods:{
            listarSolicitantes(){
                var url = '/solicitante/list';
                axios.get(url).then(response=>{
                    this.solicitantes = response.data;
                });
            },
            getContacto(id){
                var url = '/contacto/'+id+'/get';
                axios.get(url).then(response=>{
                    this.contacto = response.data;
                    console.log(this.contacto);
                });
            },
            guardarContacto: async function(){
                try {
                    let url = "/contacto"
                    let data = {
                        id: this.codigo,
                        solicitante : this.contacto.SOLIP_Codigo,
                        nombres : this.contacto.nombre_contacto,
                        correo : this.contacto.correo_contacto,
                        celular : this.contacto.celular_contacto
                    }

                    let response = await axios.put(url, data);
                    Swal.fire({ title: '"' + response.data + '"', icon: 'success', confirmButtonText: 'Aceptar', allowOutsideClick: false })
                        .then(function() {
                            location.href = '/contacto';
                        });

                } catch (error) {

                }
            }
        }
    }
</script>
