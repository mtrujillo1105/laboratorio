<template>
    <div class="card-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr class="text-center">
          <th scope="col">Código</th>
          <th scope="col">Nombres</th>
          <th scope="col">Tipo</th>
          <th scope="col">RUC</th>
          <th scope="col" colspan="2" class="text-center">Acciones</th>
        </tr>
        </thead>
        <tbody>
          <tr v-for="(solicitante,indice) of solicitantes" :key="solicitante.id_contacto" class="text-center">
            <th scope="row">{{solicitante.SOLIP_Codigo}}</th>
            <td>{{solicitante.SOLIC_Nombre}}</td>
            <td>{{solicitante.TIPSOLIC_Descripcion}}</td>
            <td>{{solicitante.SOLIC_Ruc}}</td>
            <td>
                <button class="btn btn-info" @click="btnEditar(solicitante.SOLIP_Codigo)">Editar</button>
            </td>
            <td>
                <button class="btn btn-danger"
                v-on:submit.prevent="btnBorrar(indice)"
                @click="btnBorrar(solicitante, indice) in solicitantes">Eliminar</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                solicitantes: [],
                saveData:null
            }
        },
        created(){
            this.listar();
        },
        methods: {
            listar(){
                var url = '/solicitante/list';
                axios.get(url).then(response => {
                    this.solicitantes = response.data;
                });
            },
            btnBorrar(solicitante,indice){
                var url = '/solicitante/'+solicitante.SOLIP_Codigo;
                axios.delete(url).then(response =>{
                    if (response.data.status !== undefined && response.data.status === 'ERROR') {
                        Swal.fire({ title: '', text: '"' + response.data.message + '"', icon: 'error', confirmButtonText: 'Aceptar', allowOutsideClick: false });
                        return;
                    }
                    Swal.fire({ title: '', text: '"' + response.data.message + '"', icon: 'success', confirmButtonText: 'Aceptar', allowOutsideClick: false })
                    //this.result.splice(indice, 1)
                    this.listar();
                }).catch(function(error){
                    console.log(error.message);
                });
            },
            btnEditar(id){
                location.href = '/solicitante/'+id+'/edit';
            },
            btnNuevo(){
                location.href = '/solicitante/create';
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
