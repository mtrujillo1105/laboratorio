export default {
    data() {
        return {
            descuentos: []
        }
    },
    created() {
        this.listar();
    },
    methods: {
        listar: async function () {
            try {
                let url = "/descuento/list";
                let response = await axios.get(url);

                this.descuentos = response.data;
            } catch (error) {
                console.log(error);
            }
        },
        btnEditar(id) {
            location.href = '/descuento/' + id + '/edit';
        },
        btnBorrar: async function (curso, indice) {
            try {
                var url = `/descuento/${curso.id_curso}`;
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
    },
    mounted() {
        console.log('Component mounted.')
    }
}
