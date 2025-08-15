export default {
    data(){
        return {
            cursos: [],
            saveData:null
        }
    },
    created(){
        this.listar();
    },
    methods: {
        listar(){
            var url = '/curso/list';
            axios.get(url).then(response => {
                this.cursos = response.data;
            });
        },
        btnBorrar: async function(curso,indice){
            try {
                var url = `/curso/delete/${curso.id_curso}`;
                let response = await axios.delete(url);

                if (response.data.status !== undefined && response.data.status === 'ERROR') {
                    Swal.fire({ title: '', text: '"' + response.data.message + '"', icon: 'error', confirmButtonText: 'Aceptar', allowOutsideClick: false });
                    return;
                }
                Swal.fire({ title: '', text: '"' + response.data.message + '"', icon: 'success', confirmButtonText: 'Aceptar', allowOutsideClick: false })

                this.listar();
            } catch (error) {
                console.log(error.message);
            }
        },
        btnEditar(id){
            location.href = '/curso/'+id+'/edit';
        },
        btnNuevo(){
            location.href = '/curso/create';
        }
    },
    mounted() {
        console.log('Component mounted.')
    }

}
