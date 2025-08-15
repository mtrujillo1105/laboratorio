<template>
    <!--Form content-->
    <div class="invoice p-3 mb-3">
        <form ref="form" method="POST" :action="computedAction">
            <!-- Cabecera fila 1 -->
            <input name="_method" type="hidden" value="PATCH">
            <input name="_token" type="hidden" v-model="token">
            <input name="id_cotizacion" type="hidden" v-model="cotizacion.COTIP_Codigo">
            <div class="row row-sm invoice-info">
                <div class="col-sm-3 invoice-col">
                    <div class="row form-group">
                        <label class="col-sm-auto col-form-label col-form-label-sm">Solicitante</label>
                        <!-- <v-select label="solicitantes" :options="solicitantes"></v-select> -->
                        <select class="col-sm-6 form-control-sm" name="contacto" v-model="solicitanteSelected" @change="mostrarDatosSolicitante()">
                            <option v-for="solicitante in solicitantes"
                                v-bind:value="solicitante.SOLIP_Codigo"
                                v-bind:key="solicitante.SOLIP_Codigo">{{ solicitante.SOLIC_Nombre }}</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-3 invoice-col">
                    <div class="row form-group">
                        <label class="col-sm-3 col-form-label col-form-label-sm">Fecha</label>
                        <input type="date" class="col-sm-6 form-control-sm" v-model="cotizacion.COTIC_Fecha" autocomplete="off" name="fecha" ref="fecha" />
                    </div>
                </div>
                <div class="col-sm-2 invoice-col">
                    <div class="row form-group" v-if="mostrarNumeroCotizacion">
                        <label class="col-sm-auto col-form-label col-form-label-sm">Numero</label>
                        <input type="text" v-model="cotizacion.COTIC_Numero" class="col-sm-6 form-control-sm" maxlength="11" autocomplete="off" name="numero" ref="numero" />
                    </div>
                </div>
                <div class="col-sm-3 invoice-col">
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" name="chkPedido" id="chkPedido" v-model="cotizacion.COTIC_flag_pedido" />
                        <label for="chkPedido" class="col-check-label">La cotizacion se transformo en Pedido</label>
                    </div>
                </div>
            </div>
            <!-- /Cabecera fila 1 -->
            <!-- Datos del contacto -->
            <div class="row row-sm invoice-info">
                <div class="col-sm-4 invoice-col">
                    <div class="row form-group">
                        <label class="col-sm-3 col-form-label col-form-label-sm">Contacto</label>
                        <select v-model="cotizacion.id_contacto" class="col-sm-6 form-control-sm" name="contacto" ref="contacto" @change="mostrarDatosContacto()">
                           <option v-for="contacto in contactos" v-bind:value="contacto.id_contacto" v-bind:key="contacto.id_contacto">{{ contacto.nombre_contacto }}</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-4 invoice-col">
                    <div class="row form-group">
                        <label class="col-sm-auto col-form-label col-form-label-sm" for="correoContacto">Correo contacto: </label>
                        <input type="text" v-model.number="cotizacion.correo_contacto" id="correoContacto"
                            class="col-sm-6 form-control-sm" readonly>
                    </div>
                </div>
                <div class="col-sm-4 invoice-col">
                    <div class="row form-group">
                        <label class="col-sm-auto col-form-label col-form-label-sm">Celular contacto:</label>
                        <input type="text" v-model.number="cotizacion.celular_contacto"
                            class="col-sm-6 form-control-sm" readonly>
                    </div>
                </div>
            </div>


            <!-- Datos del ubigeo de solicitante -->
            <div class="row row-sm invoice-info">
                <div class="col-sm-4 invoice-col">
                    <div class="row form-group">
                        <label class="col-sm-auto col-form-label col-form-label-sm" for="UBIGC_CodDpto">Departamento</label>
                        <select v-model="ubigeo.UBIGC_CodDpto" class="col-sm-6 form-control-sm" id="UBIGC_CodDpto" name="UBIGC_CodDpto" ref="UBIGC_CodDpto" @change="listarProvincias()">
                            <option value="">Seleccione un Departamento</option>
                            <option v-for="departamento in departamentos" v-bind:value="departamento.UBIGC_CodDpto" v-bind:key="departamento.UBIGC_CodDpto">{{ departamento.UBIGC_Descripcion }}</option>
                        </select>
                    </div>

                </div>
                <div class="col-sm-4 invoice-col">
                    <div class="row form-group">
                        <label class="col-sm-3 col-form-label col-form-label-sm" for="UBIGC_CodProv">Provincia</label>
                        <select v-model="ubigeo.UBIGC_CodProv" class="col-sm-6 form-control-sm" id="UBIGC_CodProv" name="UBIGC_CodProv" ref="UBIGC_CodProv" @change="listarDistritos()">
                            <option value="">Seleccione una Provincia</option>
                            <option v-for="provincia in provincias" v-bind:value="provincia.UBIGC_CodProv" v-bind:key="provincia.UBIGC_CodProv">{{ provincia.UBIGC_Descripcion }}</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-4 invoice-col">
                    <div class="row form-group">
                        <label class="col-sm-3 col-form-label col-form-label-sm" for="UBIGC_CodDist">Distrito</label>
                        <select v-model="ubigeo.UBIGC_CodDist" class="col-sm-6 form-control-sm" id="UBIGC_CodDist" name="UBIGC_CodDist" ref="UBIGC_CodDist">
                            <option value="">Seleccione un Distrito</option>
                            <option v-for="distrito in distritos" v-bind:value="distrito.UBIGC_CodDist" v-bind:key="distrito.UBIGC_CodDist">{{ distrito.UBIGC_Descripcion }}</option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- Correo opcional -->
            <div class="row">
                <div class="form-group col-sm-12">
                    <label for="emails">Correos opcionales</label>
                    <tags-input :values="emailTags" :key="componentKey" placeholder="Ingrese el correo"
                    typeValidation="email"
                    :limit="4"
                    :duplicateValidation="true" />
                </div>
            </div>
            <!-- /.Cabecera fila 2 -->
            <!--Detalle Cotizacion-->
            <div class="row invoice-info">
                <!--label class="col-sm-2 col-form-label col-form-label-sm">Agregar</label-->
                <a href="javascript:void(0);" id="btn-agregar-capacitacion" @click="addCapacitacion()" class="btn btn-info btn-sm m-2">
                        Capacitación&nbsp;&nbsp;<i class="fa fa-plus" aria-hidden="true"></i>
                    </a>
                <div class="col-12 table-responsive">
                    <small><strong>Para configurar una capacitación primer seleccione un curso</strong></small>
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr class="text-center">
                                <th style="width: 1%;">Eliminar</th>
                                <th style="width: 8%;">Curso</th>
                                <th style="width: 1%;">Det.</th>
                                <th style="width: 10%;">Costo</th>
                                <th style="width: 10%;">Cantidad</th>
                                <th style="width: 10%;">Sub Total</th>
                                <th style="width: 10%;" v-if="!ocultarDescuentos">Descuento</th>
                                <th style="width: 10%;" v-if="!ocultarDescuentos">Sub Total Descontado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center" v-for="(capacitacion, index) in capacitaciones">
                                <td>
                                    <button type="button" @click="deleteCapacitacion(index)" class="btn btn-outline-danger btn-sm">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                    <input type="hidden" name="codigodet[]" v-model="capacitacion.COCAP_Codigo" class="form-control-sm">
                                </td>
                                <td>
                                    <select v-model="capacitacion.id_curso" class="form-control-sm curso" name="curso" ref="curso" @change="getInfoCurso(index)">
                                        <option v-for="curso in cursos" v-bind:value="curso.id_curso" v-bind:key="curso.id_curso">{{ curso.CURSOC_Nombre }}</option>
                                    </select>
                                </td>
                                <td>
									<button type="button" class="btn btn-outline-warning btn-sm"
                                        @click="mostrarDetalleCurso(index)" title="Mostrar detalle de capacitación" name="detalleCapacitacion[]" ref="detalleCapacitacion"><i class="fa fa-filter" aria-hidden="true"></i></button>
								</td>
                                <td>
                                    <input type="text" class="form-control-sm w-100 text-right" name="unitario[]" ref="costo" v-model="capacitacion.COCAC_Costo_Curso_Original" autocomplete="off" @keypress="restringirSoloNumerosDecimales($event)" @focusout="realizarCalculosDeCapacitacion(index)"
                                        :disabled="capacitacion.COCAP_Codigo == ''" />
                                </td>
                                <td>
                                    <input type="text" class="form-control-sm w-100 text-right cantidad" name="cantidad[]" ref="cantidad" v-model.number="capacitacion.COCAC_Cantidad" autocomplete="off" @keypress="restringirSoloNumerosEnteros($event)" @focusout="getDescuento(index)"
                                        :disabled="capacitacion.COCAP_Codigo == ''" />
                                </td>
                                <td>
                                    <input type="text" class="form-control-sm w-100 text-right" name="subtotalcapa[]" ref="subtotalcapa" readonly="readonly" v-model.number="(isNaN(capacitacion.COCAC_SubTotal) || capacitacion.COCAC_SubTotal == '') ? '0.00' : (parseFloat(capacitacion.COCAC_SubTotal)).toFixed(2)"
                                        autocomplete="off" style="background-color: #2883f5; color: #ffffff;" />
                                </td>
                                <td v-if="!ocultarDescuentos">
                                    <input type="text" class="form-control-sm w-100 text-right" name="descuento[]" ref="descuento" v-model.number="(isNaN(capacitacion.COCAC_Descuento_Porcentaje) || capacitacion.COCAC_Descuento_Porcentaje == '') ? '0 (0%)' : (parseFloat(capacitacion.COCAC_Descuento_Moneda_Real)).toFixed(2) + ' (' + capacitacion.COCAC_Descuento_Porcentaje +'%)'"
                                        autocomplete="off" style="background-color: #e64210; color: #ffffff;" readonly />
                                </td>
                                <td v-if="!ocultarDescuentos">
                                    <input type="text" class="form-control-sm w-100 text-right" name="costo_descontado[]" ref="costoDescontado" v-model.number="(isNaN(capacitacion.COCAC_SubTotal_Descontado) || capacitacion.COCAC_SubTotal_Descontado == '') ? '0.00' : (parseFloat(capacitacion.COCAC_SubTotal_Descontado)).toFixed(2)"
                                        readonly="readonly" autocomplete="off" style="background-color: #009c30; color: #ffffff;" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--/Detalle Cotizacion-->
            <!--Subtotales-->
            <div class="row invoice-info">
                <div class="col-8"></div>
                <div class="col-4">
                    <div class="table-responsive table-sm">
                        <table class="table float-right">
                            <tr>
                                <td class="text-right" colspan="2">
                                    <strong class="mr-2">Subtotal S/.</strong>
                                    <input type="text" v-model="setSubTotal" name="subtotal" class="form-control-sm w-25 text-right">
                                </td>
                            </tr>
                            <tr>
                                <td class="text-right">
                                    <strong>Dscto(%)</strong>
                                    <input type="text" name="subtotal" class="form-control-sm w-50 text-right" v-model="DescuentoPorcentaje"
                                    @keypress="restringirSoloNumerosDecimales($event)"
                                    @focusout="calcularTotalFinal()">
                                </td>
                                <td class="text-right">
                                    <strong>Subtotal</strong>
                                    <input type="text" name="subtotal" class="form-control-sm w-50 text-right" v-model="setSubTotalDescuento"
                                    readonly>
                                </td>
                            </tr>
                            <!-- <tr>
                                <td class="text-right" colspan="2">
                                    <strong class="mr-2">I.G.V. S/. (18%)</strong>
                                    <input type="text" v-model="setIgv" name="igv" class="form-control-sm w-25 text-right">
                                </td>
                            </tr> -->
                            <tr>
                                <td class="text-right" colspan="2">
                                    <strong class="mr-2">Total S/.</strong>
                                    <input type="text" v-model="setTotal" name="total" class="form-control-sm w-25 text-right">
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <!--/Subtotales-->
            <!--Botones-->
            <div class="row text-left">
                <div class="col text-left">
                    <button type="button" class="btn btn-info" id="btn-actualizar-cotizacion-capacitacion" @click="updateCotizacion()">
                        Actualizar&nbsp;&nbsp;<i class="fa fa-edit" aria-hidden="true"></i>&nbsp;<img :src="'/images/load.gif'" style="display: none; width: 1em;" />
                    </button>
                    <button type="button" class="btn btn-danger" @click="irAListado()">
                        Ir al listado&nbsp;&nbsp;<i class="fa fa-arrow-left" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="btn btn-warning" id="btn-registrar-cotizacion-ensayo" @click="downloadPdf();" :disabled="loadingPdf">
                        Descargar PDF&nbsp;&nbsp;<i class="fa fa-file-pdf" aria-hidden="true"></i>&nbsp;<img :src="'/images/load.gif'" style="width: 1em;" v-if="loadingPdf" />
                    </button>
                </div>
            </div>
            <!--/Botones-->
        </form>
        <!--/Form content-->
        <!-- Modal Detalle Curso -->
        <div class="modal fade" id="modal-detalle-curso" tabindex="-1" role="dialog" aria-labelledby="modal-detalle-curso-label" aria-hidden="true" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-ficha-tecnica-label">
                            Detalle de la capacitación
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row form-group">
                                <div class="col-md-3">Detallar curso a cotizar (Sólo si el curso no esta en la lista):</div>
                                <div class="col-md-9">
                                    <textarea style="resize: none" class="form-control" v-model="capacitacion.COCAC_Detalle_Curso_Cotizar" rows="3" cols="5" :disabled="capacitacion.id_curso != 0"></textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-3">Indique el horario tentativo para el dictado del curso:</div>
                                <div class="col-md-9">
                                    <textarea style="resize: none" class="form-control" v-model="capacitacion.COCAC_Horario_Tentativo_Curso" rows="3" cols="5"></textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-3">Lugar de Capacitación:</div>
                                <div class="col-md-9">
                                    <select v-model="capacitacion.COCAC_Lugar_Capacitacion" class="form-control">
                                        <option value="1">Oficinas de la Empresa</option>
                                        <option value="2">Laboratorio de Electricidad</option>
                                        <option value="3">Cualquiera de las dos opciones</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success btn-sm" @click="updateDetalleCursoCapacitacion()">
                            Aceptar&nbsp;&nbsp;<i class="fa fa-check" aria-hidden="true"></i>
                        </button>
                        <button type="button" class="btn btn-danger btn-sm" @click="cancelUpdateDetalleCursoCapacitacion()">
                            Cancelar&nbsp;&nbsp;<i class="fa fa-ban" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        data() {
            return {
                cotizacion: [],
                capacitaciones: [],
                cursos: [],
                contactos: [],
                usuarios: [],
                solicitantes: [],
                saveData: null,
                file: '',
                solicitanteSelected: null,
                DescuentoImporte: '0.00',
                DescuentoPorcentaje: '0.00',

                emailTags: [],
                componentKey: 0,

                ubigeo: {},
                departamentos: [],
                provincias: [],
                distritos: [],

                mostrarNumeroCotizacion : true,
                capacitacion : {},
                indexCapacitacion : null,
                ocultarDescuentos: true,

                loadingPdf: false
            }
        },
        props: {
            codigo: String,
            token: String,
            user: Object
        },
        created: async function() {
            await this.getCapacitaciones(this.codigo);
            await this.getCotizacion(this.codigo);
            this.listarSolicitantes();
            this.listarCursos();
            this.listarUsuarios();
        },
        mounted() {
            console.log('Component mounted.')
        },
        computed: {
            setSubTotal: function() {
				var suma = 0;
				this.capacitaciones.forEach((capacitacion, index) => {
					if (isNaN(capacitacion.COCAC_SubTotal_Descontado) || capacitacion.COCAC_SubTotal_Descontado < 0 || capacitacion.COCAC_SubTotal_Descontado == '')
						suma += 0;
					else
						suma += parseFloat(capacitacion.COCAC_SubTotal_Descontado);
				});
                this.forceRerender();
				return (parseFloat(suma)).toFixed(2);
			},
			setIgv: function() {
                return 0;
                // return (Number(this.setSubTotalDescuento) * 0.18).toFixed(2);
			},
			setTotal: function() {
                return (Number(this.setSubTotalDescuento) + Number(this.setIgv)).toFixed(2);
			},
            setSubTotalDescuento: function() {
                let descuentoPorc = isNaN(this.DescuentoPorcentaje) || this.DescuentoPorcentaje === '' ? 0 : parseFloat(this.DescuentoPorcentaje);
                let montoDescuento = (this.setSubTotal * descuentoPorc) / 100;
                this.DescuentoImporte = (montoDescuento).toFixed(2);
                return descuentoPorc > 0 ? (this.setSubTotal - montoDescuento).toFixed(2) : (parseFloat(this.setSubTotal)).toFixed(2);
            },
            computedAction: function() {
                return '/cotizacion/' + this.codigo;
            }
        },
        methods: {
            forceRerender() {
                this.componentKey +=1;
            },
            downloadPdf: async function() {
                if (!this.cotizacionInvalida()){
                    this.loadingPdf = true;

                    await this.guardarCotizacion();

                    var url = '/cotizacion/pdf';

                    const response = await axios({
                        url: url,
                        method: 'post',
                        responseType: 'blob',
                        data: {
                            'idSolicitante': this.solicitanteSelected,
                            'cotizaciones': this.capacitaciones,
                            'subtotal' : this.setSubTotal,
                            'igv': this.setIgv,
                            'descuento': this.DescuentoPorcentaje,
                            'descuentoImporte': this.setSubTotalDescuento,
                            'total': this.setTotal,
                            'nroCotizacion': this.cotizacion.COTIC_Numero,
                            'esCapacitacion': true
                        }
                    });

                    this.downloadFile(response, undefined);

                    this.loadingPdf = false;
                }

            },
            calcularTotalFinal() {
                let descuentoPorc = isNaN(this.DescuentoPorcentaje) || this.DescuentoPorcentaje === '' ? 0 : parseFloat(this.DescuentoPorcentaje);
                this.DescuentoPorcentaje = (descuentoPorc).toFixed(2);
            },
            getCotizacion: async function(id) {
                const response = await axios.get(`/cotizacion/${id}/get`);
                let resultado = response.data;

                resultado.COTIC_Fecha = (resultado.COTIC_Fecha_Cotizacion??resultado.COTIC_FechaRegistro).split(' ')[0];
                this.cotizacion = resultado;
                this.solicitanteSelected = resultado.SOLIP_Codigo;
                this.DescuentoPorcentaje = resultado.COTIC_dcto_porcentaje;
                this.DescuentoImporte = resultado.COTIC_dcto_importe;

                (resultado.COTIC_Correo1 !== null && resultado.COTIC_Correo1 !== '') ? this.emailTags.push(resultado.COTIC_Correo1) : null;
                (resultado.COTIC_Correo2 !== null && resultado.COTIC_Correo2 !== '') ? this.emailTags.push(resultado.COTIC_Correo2) : null;
                (resultado.COTIC_Correo3 !== null && resultado.COTIC_Correo3 !== '') ? this.emailTags.push(resultado.COTIC_Correo3) : null;
                (resultado.COTIC_Correo4 !== null && resultado.COTIC_Correo4 !== '') ? this.emailTags.push(resultado.COTIC_Correo4) : null;

                this.forceRerender();
            },
            getCapacitaciones(id) {
                var url = '/cotizacioncapacitacion/' + id + '/list';
                axios.get(url).then(response => {
                    this.capacitaciones = response.data;
                    // this.setearValoresIniciales();
                }).catch(error => {
                    console.log(error);
                });
            },
            addCapacitacion() {
                let fila = {
                    COCAP_Codigo: "",
                    id_curso: "",
                    COCAC_Cantidad: "",
                    COCAC_SubTotal: "",
                    COCAC_Costo_Curso_Original: "",
                    COCAC_Descuento_Porcentaje: "",
                    COCAC_Descuento_Moneda_Real: "",
                    COCAC_SubTotal_Descontado: "",
                    COCAC_Detalle_Curso_Cotizar: "",
                    COCAC_Horario_Tentativo_Curso: "",
                    COCAC_Lugar_Capacitacion: "",
                };
                this.capacitaciones.push(fila);
            },
			deleteCapacitacion(index) {
				this.mostrarMensajeConfirmacion('¿Está seguro de eliminar esta capacitación?', 'Si, eliminar', 'No, cancelar').then((result) => {
					if (result.isConfirmed) {
                        this.capacitaciones.splice(index, 1);
						Swal.fire({
							position: 'top-end',
							icon: 'success',
							title: '¡La capacitación se eliminó correctamente!',
							showConfirmButton: false,
							timer: 2000
						});
					}
				});
			},
            cotizacionInvalida(){
                var esInvalido = true;
                if (typeof this.cotizacion.id_contacto == "undefined" || this.cotizacion.id_contacto == '') {
                    this.$refs.contacto.focus();
                    this.mostrarMensajeInformacion('¡Debe seleccionar un contacto!', 'warning');
                } else if (typeof this.cotizacion.COTIC_Fecha == "undefined" || this.cotizacion.COTIC_Fecha == '') {
                    this.$refs.fecha.focus();
                    this.mostrarMensajeInformacion('¡Debe ingresar la fecha!', 'warning');
                } else if (typeof this.cotizacion.COTIC_Numero == "undefined" || this.cotizacion.COTIC_Numero == '') {
                    this.$refs.numero.focus();
                    this.mostrarMensajeInformacion('¡Debe ingresar el número de cotización!', 'warning');
                } else if (this.capacitaciones.length == 0) {
                    this.mostrarMensajeInformacion('¡Debe ingresar al menos una capacitación!', 'warning');
                } else if ($(this.capacitaciones).filter((i, capacitacion) => capacitacion.id_curso === '').length != 0) {
					this.mostrarMensajeInformacion('¡Debe seleccionar el curso en todas las capacitaciones!', 'warning');
				} else if ($(this.capacitaciones).filter((i, capacitacion) => capacitacion.COCAC_Detalle_Curso_Cotizar === '' && capacitacion.id_curso === 0).length != 0) {
					this.mostrarMensajeInformacion('¡Para Curso Personalizado, debe colocar el nombre del curso que desea cotizar!', 'warning');
                } else if ($(this.capacitaciones).filter((i, capacitacion) => capacitacion.COCAC_Horario_Tentativo_Curso === '').length != 0) {
					this.mostrarMensajeInformacion('¡Debe ingresar el horario del curso a cotizar!', 'warning');
                } else if ($(this.capacitaciones).filter((i, capacitacion) => capacitacion.COCAC_Lugar_Capacitacion === '').length != 0) {
					this.mostrarMensajeInformacion('¡Debe colocar el lugar de capacitación!', 'warning');
                } else if ($(this.capacitaciones).filter((i, capacitacion) => capacitacion.id_curso === '').length != 0) {
                    this.mostrarMensajeInformacion('¡Debe seleccionar el curso en todas las capacitaciones!', 'warning');
                } else if ($(this.capacitaciones).filter((i, capacitacion) => (capacitacion.COCAC_Cantidad == '' || capacitacion.COCAC_Cantidad == 0)).length != 0) {
                    this.mostrarMensajeInformacion('¡Debe ingresar la cantidad de alumnos en todas las capacitaciones!', 'warning');
                } else if ($(this.capacitaciones).filter((i, capacitacion) => (capacitacion.COCAC_Costo_Curso_Original == '' || capacitacion.COCAC_Costo_Curso_Original == 0)).length != 0) {
                    this.mostrarMensajeInformacion('¡Debe ingresar el costo del curso en todas las capacitaciones!', 'warning');
                }else{
                    esInvalido = false;
                }
                return esInvalido;
            },
            guardarCotizacion: async function (){
                let url = '/capacitacion/update';
                try {
                    this.cotizacion.UBIGP_Codigo = this.ubigeo.UBIGC_CodDpto + this.ubigeo.UBIGC_CodProv + this.ubigeo.UBIGC_CodDist;
                    let response = await axios.put(url, {
                                id_cotizacion: this.cotizacion.COTIP_Codigo,
                                contacto: this.cotizacion.id_contacto,
                                fecha: this.cotizacion.COTIC_Fecha,
                                numero: this.cotizacion.COTIC_Numero,
                                usuario: this.user.id,
                                capacitaciones: this.capacitaciones,
                                subtotal: this.setSubTotal,
                                igv: this.setIgv,
                                total: this.setTotal,
                                COTIC_flag_pedido: this.cotizacion.COTIC_flag_pedido,
                                subtotalDescuento: this.setSubTotalDescuento,
                                descuentoPorcentaje: this.DescuentoPorcentaje,
                                descuentoImporte: this.DescuentoImporte,
                                correo1: this.emailTags[0],
                                correo2: this.emailTags[1],
                                correo3: this.emailTags[2],
                                correo4: this.emailTags[3],
                                ubigeo: this.cotizacion.UBIGP_Codigo
                            });

                    return response;
                } catch (error) {
                    throw error;
                }
            },
            updateCotizacion() {
                if (!this.cotizacionInvalida())
                {
                    this.mostrarMensajeConfirmacion('¿Está seguro de registrar la cotización?', 'Si, registrar', 'No, cancelar').then(async (result) => {
                        if (result.isConfirmed) {
                            try {
                                let response = await this.guardarCotizacion();

                                if(response.data.error === undefined){
                                    Swal.fire({
                                        title: '"' + response.data + '"',
                                        icon: 'success',
                                        confirmButtonText: 'Aceptar',
                                        allowOutsideClick: false
                                    }).then(function() {
                                        location.href = '/capacitacion';
                                    });
                                }else{
                                    Swal.fire({
                                        title: '"' + response.data.error + '"',
                                        icon: 'error',
                                        confirmButtonText: 'Aceptar',
                                        allowOutsideClick: false
                                    });
                                    $('#btn-actualizar-cotizacion-capacitacion').attr('disabled', false);
                                    $('#btn-actualizar-cotizacion-capacitacion > img').css({
                                        'display': 'none'
                                    });
                                }
                            } catch (error) {
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'error',
                                    title: error,
                                    showConfirmButton: false,
                                    timer: 3000
                                });
                                $('#btn-actualizar-cotizacion-capacitacion').attr('disabled', false);
                                $('#btn-actualizar-cotizacion-capacitacion > img').css({
                                    'display': 'none'
                                });
                            }
                        }
                    });
                }
            },
            seleccionarContacto : async function(){
                // const response = await axios.get(`/solicitante/contacto/get/${this.solicitanteSelected}`);
                // this.cotizacion.id_contacto = response.data.id_contacto;
                if(this.contactos.length == 0){
                    this.contactoSelected = undefined;
                    return;
                }
                this.cotizacion.id_contacto = this.contactos[0].id_contacto;
            },
            mostrarDatosSolicitante: async function() {
                await this.listarContactos();
                await this.seleccionarContacto();
                await this.mostrarDatosContacto();
                await this.cargarUbigeo();
            },
            listarUsuarios() {
                var url = '/usuario/list';
                axios.get(url).then(response => {
                    this.usuarios = response.data;
                });
            },
            listarContactos: async function() {
                if(this.solicitanteSelected === null || this.solicitanteSelected === '')
                    return;

                const response = await axios.get(`/contacto/solicitante/list/${this.solicitanteSelected}`);
                this.contactos = response.data;
            },
            listarSolicitantes: async function() {
                const response = await axios.get('/solicitante/list');
                this.solicitantes = response.data;

                await this.listarContactos();
                await this.cargarUbigeo();
            },
            listarCursos() {
                var url = '/curso/list';
                axios.get(url).then(response => {
                    this.cursos = response.data;
                });
            },
            irAListado() {
                this.mostrarMensajeConfirmacion('¿Está seguro que desea cancelar el registro?', 'Si, cancelar', 'No, permanecer').then((result) => {
                    if (result.isConfirmed) {
                        location.href = '/capacitacion';
                    }
                });
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
            restringirSoloNumerosEnteros(e) {
                let regex = new RegExp('^[0-9]+$');
                let key = String.fromCharCode(!e.charCode ? e.which : e.charCode);
                if (!regex.test(key)) {
                    e.preventDefault();
                    return false;
                }
            },
            restringirSoloNumerosDecimales(e) {
                if (!((e.which >= 48 && e.which <= 57) ||
                        (e.which == 40 || e.which == 41) ||
                        (e.which == 32 || e.which == 8 || e.which == 0 || e.which == 46))) {
                    e.preventDefault();
                    return false;
                }
            },
            getInfoCurso(index) {
                // this.$refs.detalleCapacitacion[index].disabled = false;
                this.$refs.cantidad[index].disabled = false;
                this.$refs.costo[index].disabled = false;
                this.$refs.cantidad[index].focus();
                this.getCurso(index);
                this.getDescuento(index);

                if(this.capacitaciones[index].id_curso === 0){
                    this.capacitaciones[index].COCAC_Costo_Curso_Original = '0.00';
                    this.$refs.costo[index].focus();
                }
            },
            getCurso(index) {
                let capacitacion = this.capacitaciones[index];
                let idCurso = capacitacion.id_curso;
                if (idCurso != '') {
                    let url = '/curso/' + idCurso;
                    axios.get(url).then((response) => {
                        capacitacion.COCAC_Costo_Curso_Original = response.data.CURSOC_Costo;
                    });
                }
            },
            getDescuento(index) {
                let capacitacion = this.capacitaciones[index];
                let idCurso = capacitacion.id_curso;
                let cantidad = isNaN(parseInt(capacitacion.COCAC_Cantidad)) ? 0 : parseInt(capacitacion.COCAC_Cantidad);
                let costo = isNaN(parseFloat(capacitacion.COCAC_Costo_Curso_Original)) ? 0 : parseFloat(capacitacion.COCAC_Costo_Curso_Original);
                capacitacion.COCAC_SubTotal = isNaN(parseFloat(cantidad * costo)) ? 0 : parseFloat(cantidad * costo);

                if (idCurso !== '' && cantidad !== 0) {
                    let url = '/curso/' + idCurso + '/descuento';
                    axios.get(url).then((response) => {
                        let descuento = $(response.data).filter((i, descuento) => ((descuento.id_curso) == idCurso && (cantidad >= descuento.cantidad_min && cantidad <= descuento.cantidad_max)));
                        capacitacion.COCAC_Descuento_Porcentaje = (descuento.length != 0) ? descuento[0].descuento : 0;
                        capacitacion.COCAC_Descuento_Moneda_Real = (capacitacion.COCAC_SubTotal * capacitacion.COCAC_Descuento_Porcentaje) / 100;
                        this.realizarCalculosDeCapacitacion(index);
                    });
                } else {
                    capacitacion.COCAC_Descuento_Porcentaje = 0;
                    capacitacion.COCAC_Descuento_Moneda_Real = 0;
                }
            },
            realizarCalculosDeCapacitacion(index) {

                let capacitacion = this.capacitaciones[index];
                let cantidad = isNaN(parseInt(capacitacion.COCAC_Cantidad)) ? 0 : parseInt(capacitacion.COCAC_Cantidad);
                let costo = isNaN(parseFloat(capacitacion.COCAC_Costo_Curso_Original)) ? 0 : parseFloat(capacitacion.COCAC_Costo_Curso_Original);
                capacitacion.COCAC_Costo_Curso_Original = this.formatearDecimalesAModelo(capacitacion.COCAC_Costo_Curso_Original);
                capacitacion.COCAC_SubTotal = isNaN(parseFloat(cantidad * costo)) ? 0 : parseFloat(cantidad * costo);
                capacitacion.COCAC_Descuento_Moneda_Real = (capacitacion.COCAC_SubTotal * capacitacion.COCAC_Descuento_Porcentaje) / 100;
                capacitacion.COCAC_SubTotal_Descontado = (capacitacion.COCAC_SubTotal - capacitacion.COCAC_Descuento_Moneda_Real).toFixed(2);
                this.forceRerender();
            },
            formatearDecimalesAModelo(value) {
                value = isNaN(parseFloat(value)) ? '0.00' : (parseFloat(value)).toFixed(2);
                return value;
            },
            cargarUbigeo: async function() {
                const solicitante = this.solicitantes.filter(obj => obj.SOLIP_Codigo == this.solicitanteSelected)[0];

                await this.listarDepartamentos();
                this.ubigeo.UBIGC_CodDpto = solicitante === undefined ? '' : solicitante.UBIGC_CodDpto;
                await this.listarProvincias();
                this.ubigeo.UBIGC_CodProv = solicitante === undefined ? '' : solicitante.UBIGC_CodProv;
                await this.listarDistritos();
                this.ubigeo.UBIGC_CodDist = solicitante === undefined ? '' : solicitante.UBIGC_CodDist;

                this.forceRerender();
            },
            listarDepartamentos : async function() {
                var url = '/departamento/list';
                const response = await axios.get(url);

                this.departamentos = response.data;

                this.ubigeo.UBIGC_CodDpto = '';
                this.ubigeo.UBIGC_CodProv = '';
                this.ubigeo.UBIGC_CodDist = '';
            },
            listarProvincias: async function() {
                if (this.ubigeo.UBIGC_CodDpto != '') {
                    var url = `/provincia/${this.ubigeo.UBIGC_CodDpto}/list`;
                    const response = await axios.get(url);
                    this.provincias = response.data;
                } else {
                    this.provincias = [];
                    this.distritos = [];
                }

                this.ubigeo.UBIGC_CodProv = '';
                this.ubigeo.UBIGC_CodDist = '';
            },
            listarDistritos: async function() {
                if (this.ubigeo.UBIGC_CodProv != '') {
                    var url = `/distrito/${this.ubigeo.UBIGC_CodDpto}/${this.ubigeo.UBIGC_CodProv}/list`;
                    const response = await axios.get(url);
                    this.distritos = response.data;
                } else{
                    this.distritos = [];
                }

                this.ubigeo.UBIGC_CodDist = '';
            },
            mostrarDatosContacto() {
                if(this.cotizacion.id_contacto === '' || this.cotizacion.id_contacto === null || this.cotizacion.id_contacto === undefined){
                    this.cotizacion.correo_contacto = '';
                    this.cotizacion.celular_contacto = '';
                    return;
                }

                const contacto = this.contactos.filter(obj => obj.id_contacto == this.cotizacion.id_contacto)[0];

                this.cotizacion.correo_contacto = contacto?.correo_contacto;
                this.cotizacion.celular_contacto = contacto?.celular_contacto;
            },
            mostrarDetalleCurso(index) {
                this.indexCapacitacion = index;
                Object.assign(this.capacitacion, this.capacitaciones[index]);
                if(this.capacitacion.id_curso != 0){
                    this.capacitacion.COCAC_Detalle_Curso_Cotizar = '';
                }
                this.forceRerender();
                $('#modal-detalle-curso').modal();
            },
            updateDetalleCursoCapacitacion(){
                if(this.capacitacion.id_curso == 0 && (typeof this.capacitacion.COCAC_Detalle_Curso_Cotizar == "undefined" || this.capacitacion.COCAC_Detalle_Curso_Cotizar == "")){
					this.mostrarMensajeInformacion('¡Debe ingresar el nombre del curso a cotizar!', 'warning');
                    return;
                }
                this.capacitaciones[this.indexCapacitacion] = this.capacitacion;
                this.capacitacion = {};
                this.indexCapacitacion = null;
                $('#modal-detalle-curso').modal('hide');
            },
            cancelUpdateDetalleCursoCapacitacion(){
                this.capacitacion = {};
                this.indexCapacitacion = null;
                $('#modal-detalle-curso').modal('hide');
            },
            downloadFile(response, filename) {
                var newBlob = new Blob([response.data], {type: response.headers['content-type']})

                if (window.navigator && window.navigator.msSaveOrOpenBlob) {
                    window.navigator.msSaveOrOpenBlob(newBlob)
                    return
                }
                this.downloadBlob(newBlob, filename);
            },
            downloadBlob(blob, name = 'object') {
                const blobUrl = URL.createObjectURL(blob);

                const link = document.createElement("a");

                link.href = blobUrl;
                link.download = name;

                document.body.appendChild(link);

                link.dispatchEvent(
                    new MouseEvent('click', {
                    bubbles: true,
                    cancelable: true,
                    view: window
                    })
                );

                document.body.removeChild(link);
            },
        }
    }
</script>
