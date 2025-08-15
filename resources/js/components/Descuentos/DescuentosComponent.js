import crudTypes from '../../crudTypes'
export default {
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
    data() {
        return {
            cursos: [],
            cabeceraDescuento: {
                id_curso: '',
                detalleDescuentos: []
            },
            loading: false,
            disableSelectCursos: false
        }
    },
    computed: {
        disableOptions() {
            return this.cabeceraDescuento.id_curso === '';
        }
    },
    created: async function () {
        await this.listarCursos();
        if (this.tipo === crudTypes.ACTUALIZAR) {
            this.cabeceraDescuento.id_curso = this.id;
            await this.obtenerDescuentos();
            this.disableSelectCursos = true;
        }
    },
    methods: {
        listarCursos: async function () {
            var url = '/curso/list';
            var response = await axios.get(url);
            this.cursos = response.data;
        },
        nuevoDescuento() {
            var descuento = {
                id_descuento: null,
                id_curso: this.cabeceraDescuento.id_curso,
                cantidad_min: 0,
                cantidad_max: 0,
                descuento: 0
            };
            this.cabeceraDescuento.detalleDescuentos.push(descuento);
            Vue.nextTick(() => {
                this.$refs.cantidad_min[this.cabeceraDescuento.detalleDescuentos.length - 1].focus();
            });

        },
        borrarDescuento(index) {
            this.cabeceraDescuento.detalleDescuentos.splice(index, 1);
        },
        obtenerDescuentos: async function () {
            this.loading = true;
            let id_curso = this.cabeceraDescuento.id_curso;
            if (id_curso !== '') {
                let url = `/curso/${id_curso}/descuento`;
                let response = await axios.get(url);

                this.cabeceraDescuento.detalleDescuentos = response.data;
            } else {
                this.cabeceraDescuento.detalleDescuentos = [];
            }
            this.loading = false;
        },
        validarDescuentos: async function () {
            let validationResult = null;
            for (let index = 0; index < this.cabeceraDescuento.detalleDescuentos.length; index++) {
                const element = this.cabeceraDescuento.detalleDescuentos[index];

                var result = this.validarIntervalo(element, index);
                if (!result.validacion) {
                    validationResult = result;
                    break;
                }
            }
            if (validationResult) {
                await Swal.fire({ title: "'" + validationResult.mensaje + "'", icon: 'error', confirmButtonText: 'Aceptar', allowOutsideClick: false });
                return false;
            }
            else {
                return true;
            }

        },
        validarIntervalo(descuento, index) {
            var objetoValidacion = {
                mensaje: '',
                validacion: false
            }
            let cantidad_minima = this.formatearModeloAEntero(descuento.cantidad_min);
            let cantidad_maxima = this.formatearModeloAEntero(descuento.cantidad_max);
            let descuento_valor = this.formatearModeloADecimal(descuento.descuento);
            if(cantidad_maxima === cantidad_minima){
                this.$refs.cantidad_min[index].focus();
                objetoValidacion.mensaje = 'Los intervalos no deben ser iguales';
                return objetoValidacion;
            }
            if (cantidad_minima < 0) {
                this.$refs.cantidad_min[index].focus();
                objetoValidacion.mensaje = 'El valor mínimo no puede ser menor a 0';
                return objetoValidacion;
            }
            if (cantidad_maxima < 0) {
                this.$refs.cantidad_max[index].focus();
                objetoValidacion.mensaje = 'El valor máximo no puede ser menor a 0';
                return objetoValidacion;
            }
            if (descuento_valor < 0) {
                objetoValidacion.mensaje = 'El descuento no puede ser menor a 0';
                return objetoValidacion;
            }
            if (cantidad_minima > cantidad_maxima) {
                objetoValidacion.mensaje = 'El valor mínimo no puede ser mayor al máximo';
                return objetoValidacion;
            }
            var result = this.cabeceraDescuento.detalleDescuentos.find((elemento, indiceElemento) => {
                if (indiceElemento !== index) {
                    if (cantidad_minima >= elemento.cantidad_min && elemento.cantidad_max >= cantidad_minima) {
                        this.$refs.cantidad_min[index].focus();
                        return elemento;
                    }
                    else if (cantidad_maxima >= elemento.cantidad_min && elemento.cantidad_max >= cantidad_maxima) {
                        this.$refs.cantidad_max[index].focus();
                        return elemento;
                    }
                }
            });
            console.log(result);
            if (result !== undefined) {
                objetoValidacion.mensaje = 'Las cantidades maximas y minimas no se pueden cruzar.';
                return objetoValidacion;
            }

            objetoValidacion.validacion = true;
            return objetoValidacion;
        },
        irAListado() {
            location.href = '/descuento';
        },
        formatearModeloADecimal(value) {
            value = isNaN(parseFloat(value)) ? '0.00' : (parseFloat(value)).toFixed(4);
            return value;
        },
        formatearModeloAEntero(value) {
            value = isNaN(parseInt(value)) ? 0 : (parseInt(value));
            return value;
        },
        restringirSoloNumerosEnteros(e) {
            var regex = new RegExp('^[0-9]+$');
            var key = String.fromCharCode(!e.charCode ? e.which : e.charCode);
            if (!regex.test(key)) {
                e.preventDefault();
                return false;
            }
        },
        guardarDescuento: async function () {
            try {
                if (await this.validarDescuentos()) {
                    let url = `/descuento`;
                    let response = null;
                    let data = this.cabeceraDescuento;

                    response = await axios.post(url, data);

                    Swal.fire({
                        title: '"' + response.data + '"',
                        icon: 'success',
                        confirmButtonText: 'Aceptar',
                        allowOutsideClick: false
                    }).then(function () {
                        location.href = '/descuento';
                    });
                }
            } catch (error) {
                console.log(error);
            }
        }
    },

}
