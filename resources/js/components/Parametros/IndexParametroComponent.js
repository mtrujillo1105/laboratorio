import crudTypes from '../../crudTypes'
export default {
    props: {
        token: String,
        user: {
            type: Object,
            default: () => null,
        },
    },
    data() {
        return {
            parametroValores: [],
            busqueda: {
                codigoParametro: '',
                descripcionParametro: null
            },
            loading: false,
            parametros: [],
            parametroNuevo: {
            },
            listaActivo: [
                {'id': 1, 'valor': 'Sí'},
                {'id': 0, 'valor': 'No'}
            ],
            componentKey: 0,
            tipoCrud : null
        }
    },
    methods: {
        forceRerender() {
            this.componentKey +=1;
        },
        obtenerListaParametro: async function(){
            let url = `/parametro`;
            let response = await axios.get(url);

            this.parametros = response.data;

        },
        obtenerListaParametroValor: async function() {
            let url = `/parametro/list`;
            let response = await axios.post(url, {
                codigoParametro: this.busqueda.codigoParametro,
                descripcionParametro: this.busqueda.descripcionParametro
            });

            this.parametroValores = response.data;
        },

        abrirModalParametroNuevo() {
            this.tipoCrud = crudTypes.NUEVO;
            $('#modal-parametro-valor').modal();
            this.parametroNuevo = {
                activo: 1,
                eliminado: 0,
                id_parametro: '',
                id_parametro_valor: null,
                id_parametro_valor_padre: null,
                nombre: null,
                nombre_parametro: null,
                orden: null,
                valor: null,
                valor_adicional_1: null,
                valor_adicional_2: null,
                valor_adicional_3: null,
            };
        },
        abrirModalActualizarParametro(index){
            this.tipoCrud = crudTypes.ACTUALIZAR;
            this.parametroNuevo = {};
            Object.assign(this.parametroNuevo, this.parametroValores[index]);
            $('#modal-parametro-valor').modal();
        },
        eliminar: async function(id) {
            try {
                this.mostrarMensajeConfirmacion('¿Está seguro que desea eliminar el parametro?', 'Si, eliminar', 'No, cancelar').then(async (result) => {
                    if (result.isConfirmed) {
                        let url = `/parametro/${id}`;
                        let response = await axios.delete(url);

                        await this.obtenerListaParametroValor();
                    }
                });

            } catch (error) {
                console.log(error);
            }
        },
        esInvalido(){
            var esInvalido = true;
            if (typeof this.parametroNuevo.id_parametro_valor == "undefined" || this.parametroNuevo.id_parametro_valor == '' || this.parametroNuevo.id_parametro_valor == null) {
                this.$refs.codigoParametroValor.focus();
                this.mostrarMensajeInformacion('¡Debe ingresar un código para el parametro!', 'warning');
            } else if (typeof this.parametroNuevo.id_parametro == "undefined" || this.parametroNuevo.id_parametro == '' || this.parametroNuevo.id_parametro == null) {
                this.$refs.codigoParametroRegistro.focus();
                this.mostrarMensajeInformacion('¡Debe seleccionar el parametro padre!', 'warning');
            } else if (typeof this.parametroNuevo.activo === "undefined" || this.parametroNuevo.activo === '' || this.parametroNuevo.activo === null) {
                this.$refs.activo.focus();
                this.mostrarMensajeInformacion('¡Debe indicar el estado del parametro!', 'warning');
            } else if (typeof this.parametroNuevo.valor == "undefined" || this.parametroNuevo.valor == '' || this.parametroNuevo.valor == null) {
                this.$refs.valorParametro.focus();
                this.mostrarMensajeInformacion('¡Debe ingresar el valor del parametro!', 'warning');
            } else if (typeof this.parametroNuevo.nombre == "undefined" || this.parametroNuevo.nombre == '' || this.parametroNuevo.nombre == null) {
                this.$refs.nombreParametro.focus();
                this.mostrarMensajeInformacion('¡Debe colocar un nombre para el parametro!', 'warning');
            }else{
                esInvalido = false;
            }
            return esInvalido;
        },
        ok: async function(){
            try {
                debugger
                if(!this.esInvalido()) {
                    let url = `/parametro`;
                    let response = await axios.post(url, this.parametroNuevo);

                    await this.obtenerListaParametroValor();

                    $('#modal-parametro-valor').modal('hide');
                }
            } catch (error) {
                console.log(error);
            }
        },
        cancel(){
            this.parametroNuevo = {};
            $('#modal-parametro-valor').modal('hide');
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
    },
    created: async function(){
        await this.obtenerListaParametro();
        await this.obtenerListaParametroValor();
    }
}
