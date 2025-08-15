export default {
    data(){
        return {
            usuarios: [],
            saveData:null
        }
    },
    created(){
        this.listar();
    },
    methods: {
        listar(){
            var url = '/usuario/list';
            axios.get(url).then(response => {
                this.usuarios = response.data;
            });
        },
        btnBorrar(usuario,indice){
            var url = '/usuario/'+usuario.id;
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
            location.href = '/usuario/'+id+'/edit';
        },
    },
}
