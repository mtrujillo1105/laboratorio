import crudTypes from '../../crudTypes'
export default {
    data() {
        return {
            curso: {
                nombre: '',
                descripcion: '',
                costo: "0.00"
            },
            isLoading: false,
        }
    },
    props: {
        token: String,
        id: {
            type: Number,
            default: () => null,
        },
        tipo: {
            type: Number,
            default: () => crudTypes.NUEVO
        }
    },
    created() {
        if (this.tipo == crudTypes.ACTUALIZAR) {
            this.obtenerCurso();
        }
    },
    methods: {
        guardarCurso: async function (e) {
            if (this.validarCurso()) {
                var url = `/curso`
                var data = this.curso;

                this.isLoading = true;
                let response = null;

                if(this.tipo == crudTypes.NUEVO){
                    response = await axios.post(url, data);
                }
                else if (this.tipo == crudTypes.ACTUALIZAR){
                    data.id = this.id;
                    response = await axios.put(url, data);
                }
                this.isLoading = false;

                Swal.fire({
                    title: '"' + response.data + '"',
                    icon: 'success',
                    confirmButtonText: 'Aceptar',
                    allowOutsideClick: false
                }).then(function () {
                    location.href = '/curso';
                });
            }

        },
        actualizarCurso: async function() {
            if(this.validarCurso()){
                var url = `/curso/update`
                var data = curso;

                this.isLoading = true;

                let response = await axios.put(url, data);
                this.isLoading = false;

                Swal.fire({
                    title: '"' + response.data + '"',
                    icon: 'success',
                    confirmButtonText: 'Aceptar',
                    allowOutsideClick: false
                }).then(function () {
                    location.href = '/curso';
                });
            }
        },
        validarCurso() {
            var error = false;
            if (typeof this.curso.nombre == "undefined" || this.curso.nombre.trim() == '') {
                this.$refs.nombre.focus();
                this.mostrarMensajeInformacion('¡Debe ingresar el nombre del curso!', 'warning');
                error = true;
            } else if (typeof this.curso.descripcion == "undefined" || this.curso.descripcion == '') {
                this.$refs.descripcion.focus();
                this.mostrarMensajeInformacion('¡Debe ingresar una descriipción!', 'warning');
                error = true;
            } else if (typeof this.curso.costo == "undefined" || this.curso.costo == '' || this.curso.costo == 0) {
                this.$refs.costo.focus();
                this.mostrarMensajeInformacion('¡Debe colocar el costo del curso!', 'warning');
                error = true;
            }
            return !error;
        },
        obtenerCurso: async function() {
            var url = `/curso/${this.id}`
            let response = await axios.get(url);

            this.curso.nombre = response.data.CURSOC_Nombre;
            this.curso.descripcion = response.data.CURSOC_Descripcion;
            this.curso.costo = response.data.CURSOC_Costo;
        },
        mostrarMensajeInformacion(titulo, icono) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-primary',
                },
                buttonsStyling: false
            });
            swalWithBootstrapButtons.fire({
                title: titulo,
                icon: icono,
                confirmButtonText: 'Aceptar',
                allowOutsideClick: false
            });
        },
        mostrarMensajeConfirmacion(titulo, textoConfirma, textoCancela) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-primary margin-button-confirm-swal',
                    cancelButton: 'btn btn-danger margin-button-confirm-swal'
                },
                buttonsStyling: false
            });
            return swalWithBootstrapButtons.fire({
                title: titulo,
                text: '',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: textoConfirma,
                cancelButtonText: textoCancela,
                reverseButtons: false,
                allowOutsideClick: false
            });
        },
        formatearModeloADecimal(value){
            value = isNaN(parseFloat(value)) ? '0.00' : (parseFloat(value)).toFixed(2);
            return value;
        },
    }
}
