<template>
    <!--Form content-->
    <div class="invoice p-3 mb-3">
        <form ref="form">
            <input name="_token" type="hidden" v-model="token" />
            <!-- Cabecera fila 1 -->
            <div class="row invoice-info">
                <div class="col-sm-3 invoice-col">
                    <div class="row form-group">
                        <label class="col-sm-auto col-form-label col-form-label-sm">Solicitante</label>
                        <select class="col-sm-6 form-control-sm" name="contacto" v-model="solicitanteSelected" @change="mostrarDatosSolicitante()">
                            <option v-for="solicitante in solicitantes" v-bind:value="solicitante.SOLIP_Codigo" v-bind:key="solicitante.SOLIP_Codigo" >{{ solicitante.SOLIC_Nombre }}</option>
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
            <!-- Cabecera fila 2 -->
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    <div class="row form-group">
                        <label class="col-sm-3 col-form-label col-form-label-sm">Contacto</label>
                        <select v-model="contactoSelected" class="col-sm-6 form-control-sm" name="contacto" ref="contacto" @change="mostrarDatosContacto()">
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
            <div class="row">
                <div class="form-group col-sm-12">
                    <label for="emails">Correos opcionales</label>
                    <tags-input :values="emailTags" :key="componentKey" placeholder="Ingrese el correo"
                    typeValidation="email"
                    :limit="4"
                    :duplicateValidation="true" />
                </div>
            </div>
            <!-- /Cabecera fila 2 -->
            <!--Detalle Cotizacion-->
            <div class="row invoice-info">
                <a href="javascript:void(0);" id="btn-agregar-equipo" @click="addEquipo()" class="btn btn-info btn-sm m-2">
                    Equipo&nbsp;&nbsp;<i class="fa fa-plus" aria-hidden="true"></i>
                </a>
                <div class="col-12 table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr class="text-center">
                                <th style="width: 5%;">Eliminar</th>
                                <th style="width: 10%;">Nombre</th>
                                <th style="width: 15%;">Descripcion</th>
                                <th style="width: 15%">Fabricante</th>
                                <th style="width: 5%">Ficha Técnica</th>
                                <th style="width: 5%">Costo</th>
                                <th style="width: 5%">Cantidad</th>
                                <th style="width: 5%">Subtotal</th>
                                <th style="width: 5%;" v-if="!ocultarDescuentos">Dscto.(%)</th>
                                <th style="width: 5%;" v-if="!ocultarDescuentos">Subtotal Dscto.</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center" v-for="(equipo, index) in equipos" :key="equipo.index">
                                <td>
                                    <button type="button" @click="deleteEquipo(index)" class="btn btn-outline-danger btn-sm">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                    <input type="hidden" name="codigodet[]" v-model="equipo.CODEP_Codigo" />
                                </td>
                                <td>
                                    <input type="text" class="form-control-sm w-100" name="nombre[]" v-model="equipo.CODEC_Nombre_Equipo" autocomplete="off" />
                                </td>
                                <td>
                                    <input type="text" class="form-control-sm w-100" name="descripcion[]" v-model="equipo.CODEC_Descripcion_Equipo" autocomplete="off">
                                </td>
                                <td>
                                    <input type="text" class="form-control-sm w-100" name="fabricante[]" v-model="equipo.CODEC_Fabricante_Equipo" autocomplete="off" />
                                </td>
                                <!--td class="pb-0 mb-0"><i class="far fa-file-pdf" style="color:red;font-size: 23px;"></i></td-->
                                <td>
                                    <button type="button" class="btn btn-outline-warning btn-sm"
                                        @click="editEquipo(index)" title="Agregar ficha técnica"><i class="fa fa-file" aria-hidden="true"></i></button>
                                </td>
                                <td>
                                    <input type="text" class="form-control-sm w-100 text-right" name="unitario[]"
                                        v-model.number="equipo.CODEC_Costo" autocomplete="off" @keypress="restringirSoloNumerosDecimales($event)" @focusout="realizarCalculosDeCalibracion($event, index)" />
                                </td>
                                <td>
                                    <input type="text" class="form-control-sm w-100 text-right" name="cantidad[]"
                                        v-model.number="equipo.CODEC_Cantidad" autocomplete="off" @keypress="restringirSoloNumerosEnteros($event)" @focusout="realizarCalculosDeCalibracion($event, index)" />
                                </td>
                                <td>
                                    <input type="text" class="form-control-sm w-100 text-right" name="subtotaldet[]"
                                        v-model.number="(isNaN(equipo.CODEC_SubTotal) || equipo.CODEC_SubTotal == '') ? '0.00' : (parseFloat(equipo.CODEC_SubTotal)).toFixed(2)"
                                        autocomplete="off" readonly="readonly" style="background-color: #2883f5; color: #ffffff;" />
                                </td>
                                <td v-if="!ocultarDescuentos">
                                    <input type="text" class="form-control-sm w-100 text-right" name="dcto_porcentaje[]"
                                        v-model.number="equipo.CODEC_dcto_porcentaje"
                                        autocomplete="off" @keypress="restringirSoloNumerosDecimales($event)" @focusout="realizarCalculosDeCalibracion($event, index)"
                                        style="background-color: rgb(230, 66, 16); color: rgb(255, 255, 255);"
                                        />
                                </td>
                                <td v-if="!ocultarDescuentos">
                                    <input type="text" class="form-control-sm w-100 text-right" name="dcto_subtotal[]"
                                        v-model.number="(isNaN(equipo.CODEC_dcto_subtotal) || equipo.CODEC_dcto_subtotal == '') ? '0.00' : (parseFloat(equipo.CODEC_dcto_subtotal)).toFixed(2)"
                                        autocomplete="off" readonly style="background-color: rgb(0, 156, 48); color: rgb(255, 255, 255);" />
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
                                    <input type="text" v-model="SubTotal" name="subtotal" class="form-control-sm w-25 text-right" readonly="readonly" />
                                </td>
                            </tr>
                            <tr>
                                <td class="text-right">
                                    <strong>Dscto(%)</strong>
                                    <input type="text" name="subtotal" class="form-control-sm w-50 text-right" v-model="DescuentoPorcentaje"
                                    @focusout="calcularTotalFinal()">
                                </td>
                                <td class="text-right">
                                    <strong>Subtotal</strong>
                                    <input type="text" name="subtotal" class="form-control-sm w-50 text-right" v-model="SubtotalDescuento"
                                    readonly>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-right" colspan="2">
                                    <strong class="mr-2">I.G.V. S/. (18%)</strong>
                                    <input type="text" v-model="Igv" name="igv" class="form-control-sm w-25 text-right" readonly="readonly" />
                                </td>
                            </tr>
                            <tr>
                                <td class="text-right" colspan="2">
                                    <strong class="mr-2">Total S/.</strong>
                                    <input type="text" v-model="Total" name="total" class="form-control-sm w-25 text-right" readonly="readonly" />
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
                    <button type="button" class="btn btn-info" id="btn-agregar-cotizacion-calibracion" @click="addCotizacion()">
                        Registrar&nbsp;&nbsp;<i class="fa fa-save" aria-hidden="true"></i>&nbsp;<img :src="'/images/load.gif'" style="display: none; width: 1em;" />
                    </button>
                    <button type="button" class="btn btn-danger" @click="irAListado()">
                        Ir al listado&nbsp;&nbsp;<i class="fa fa-arrow-left" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="btn btn-warning" id="btn-registrar-cotizacion-ensayo" @click="downloadPdf();" :disabled="true">
                        Descargar PDF&nbsp;&nbsp;<i class="fa fa-file-pdf" aria-hidden="true"></i>&nbsp;<img :src="'/images/load.gif'" style="display: none; width: 1em;" />
                    </button>
                </div>
            </div>
            <!--/Botones-->
        </form>
        <!-- Modal Ficha Técnica -->
        <div class="modal fade" id="modal-ficha-tecnica" tabindex="-1" role="dialog" aria-labelledby="modal-ficha-tecnica-label" aria-hidden="true" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-ficha-tecnica-label">
                            Ficha Técnica: {{ equipo.CODEC_Nombre_Equipo }}
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row form-group">
                                <div class="col-md-3">Descripción</div>
                                <div class="col-md-9">
                                    <textarea style="resize: none" class="form-control" v-model="equipo.CODEC_Descripcion_Ficha_Tecnica_Equipo" rows="3" cols="5" name="ficha[]"></textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-3">Url</div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" v-model="equipo.CODEC_Url_Ficha_Tecnica_Equipo" name="url[]" />
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-3">Archivo (Descripción de equipo)</div>
                                <div class="col-md-9">
                                    <input type="file" class="form-control" id="archivoFichaTecnica" />
                                    <p class="font-weight-bold"><a href="javascript:void(0);" @click="downloadFileEquipo();">{{equipo.CODEC_Archivo_Descripcion_Equipo}}</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success btn-sm" @click="updateFichaEquipo()">
                            Aceptar&nbsp;&nbsp;<i class="fa fa-check" aria-hidden="true"></i>
                        </button>
                        <button type="button" class="btn btn-danger btn-sm" @click="cancelUpdateFichaEquipo()">
                            Cancelar&nbsp;&nbsp;<i class="fa fa-ban" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Modal Ficha Técnica -->
        <!--/Form content-->
    </div>
</template>

<script>
    export default {
        data() {
            return {
                cotizacion: [],
                equipo: [],
                equipos: [],
                contactos: [],
                usuarios: [],
                solicitantes: [],
                saveData: null,
                idxEquipo: null,
                SubTotal: '0.00',
                Igv: '0.00',
                Total: '0.00',
                DescuentoPorcentaje: '0.00',
                DescuentoImporte: '0.00',
                SubtotalDescuento: '0.00',

                solicitanteSelected: null,
                contactoSelected: null,

                emailTags: [],
                componentKey: 0,

                ubigeo: {},
                departamentos: [],
                provincias: [],
                distritos: [],

                mostrarNumeroCotizacion: true,
                ocultarDescuentos: true
            };
        },
        props: {
            token: String,
            user: Object
        },
        created() {
            this.cotizacion.COTIC_Fecha = moment(new Date()).format('yyyy-MM-DD');
            this.listarSolicitantes();
            this.listarUsuarios();
        },
        mounted() {
            console.log('Component mounted.');
        },
        computed: {
        },
        methods: {
            forceRerender() {
                this.componentKey +=1;
            },
            downloadPdf: async function() {
                var url = '/cotizacion/pdf';

                const response = await axios({
                    url: url,
                    method: 'post',
                    responseType: 'blob',
                    data: {
                        'idSolicitante': this.solicitanteSelected,
                        'cotizaciones': this.equipos,
                        'subtotal' : this.SubTotal,
                        'igv': this.Igv,
                        'descuento': this.DescuentoPorcentaje,
                        'descuentoImporte': this.DescuentoImporte,
                        'total': this.Total,
                        'nroCotizacion': this.cotizacion.COTIC_Numero,
                        'esCapacitacion': false
                    }
                });

                this.downloadFile(response, this.equipo.nombre_archivo);
            },
            addEquipo() {
                let fila = {
                    CODEP_Codigo: "",
                    CODEC_Nombre_Equipo: "",
                    CODEC_Descripcion_Equipo: "",
                    CODEC_Fabricante_Equipo: "",
                    CODEC_Cantidad: "",
                    CODEC_Costo: "",
                    CODEC_SubTotal: "",
                    CODEC_Descripcion_Ficha_Tecnica_Equipo: "",
                    CODEC_Url_Ficha_Tecnica_Equipo: "",
                    CODEC_Archivo_Descripcion_Equipo: "",
                    CODEC_dcto_porcentaje: "0.00",
                    CODEC_dcto_importe: "0.00",
                    CODEC_dcto_subtotal: "0.00"
                };
                this.equipos.push(fila);
            },
            editEquipo(index) {
                $('#modal-ficha-tecnica').modal();
                this.idxEquipo = index;
                this.equipo = {};
                Object.assign(this.equipo, this.equipos[index]);
                // this.equipo = JSON.parse(JSON.stringify(this.equipos[index]));
                $("#file").val('');
                $('#archivoFichaTecnica').val('');
            },
            updateFichaEquipo() {
                let fileUploadedArray = $('#archivoFichaTecnica').prop('files');

                if ((this.equipo.CODEC_Descripcion_Ficha_Tecnica_Equipo == null || this.equipo.CODEC_Descripcion_Ficha_Tecnica_Equipo.trim() == '') ||
                    (typeof fileUploadedArray === 'undefined' && fileUploadedArray.length == 0 )
                ) {
                    Swal.fire({
                        title: '¡Debe ingresar al menos la descripción de la ficha!',
                        text: '',
                        icon: 'warning',
                        confirmButtonText: 'Aceptar',
                        allowOutsideClick: false
                    });
                    return false;
                }

                if(fileUploadedArray.length > 0){
                    this.equipo.archivo = fileUploadedArray[0];
                    this.equipo.CODEC_Archivo_Descripcion_Equipo = fileUploadedArray[0].name;
                    this.equipos[this.idxEquipo] = this.equipo;

                    this.equipo = {};
                    this.idxEquipo = null;
                    fileUploadedArray = [];
                    $('#archivoFichaTecnica').val('');
                    $('#modal-ficha-tecnica').modal('hide');
                    $('.modal-backdrop').remove();

                }else{
                    this.equipos[this.idxEquipo] = this.equipo;
                    this.equipo = {};
                    this.idxEquipo = null;
                    $('#archivoFichaTecnica').val('');
                    $('#modal-ficha-tecnica').modal('hide');
                }
            },
            cancelUpdateFichaEquipo()
            {
                this.equipo.CODEC_Descripcion_Ficha_Tecnica_Equipo = '';
                this.equipo.CODEC_Url_Ficha_Tecnica_Equipo = '';
                this.idxEquipo = null;
                $('#modal-ficha-tecnica').modal('hide');
            },
            deleteEquipo(index) {
                this.mostrarMensajeConfirmacion('¿Está seguro de eliminar este equipo?', 'Si, eliminar', 'No, cancelar').then((result) => {
                    if (result.isConfirmed) {
                        this.equipos.splice(index, 1);
                        this.setSubTotal();
                        this.setIgv();
                        this.setTotal();
                        this.mostrarMensajeInformacion('¡El equipo se eliminó correctamente!', 'success');
                    }
                });
            },
            addCotizacion() {
                let url = '/calibracion/store';
                if (typeof this.contactoSelected == "undefined" || this.contactoSelected == '' || this.contactoSelected == null) {
                    this.$refs.contacto.focus();
                    this.mostrarMensajeInformacion('¡Debe seleccionar un contacto!', 'warning');
                } else if (typeof this.cotizacion.COTIC_Fecha == "undefined" || this.cotizacion.COTIC_Fecha == '') {
                    this.$refs.fecha.focus();
                    this.mostrarMensajeInformacion('¡Debe ingresar la fecha!', 'warning');
                } else if (typeof this.cotizacion.COTIC_Numero == "undefined" || this.cotizacion.COTIC_Numero == '') {
                    this.$refs.numero.focus();
                    this.mostrarMensajeInformacion('¡Debe ingresar el número de cotización!', 'warning');
                // } else if (typeof this.cotizacion.USUA_Codigo == "undefined" || this.cotizacion.USUA_Codigo == '') {
                //     this.$refs.usuario.focus();
                //     this.mostrarMensajeInformacion('¡Debe seleccionar un usuario!', 'warning');
                } else if (this.equipos.length == 0) {
                    this.mostrarMensajeInformacion('¡Debe ingresar al menos un equipo!', 'warning');
                } else if ($(this.equipos).filter((i, equipo) => (equipo.CODEC_Nombre_Equipo.trim() == '')).length != 0) {
					this.mostrarMensajeInformacion('¡Debe ingresar el nombre en todos los equipos!', 'warning');
                } else if ($(this.equipos).filter((i, equipo) => (equipo.CODEC_Descripcion_Equipo.trim() == '')).length != 0) {
					this.mostrarMensajeInformacion('¡Debe ingresar la descripción en todos los equipos!', 'warning');
                } else if ($(this.equipos).filter((i, equipo) => (equipo.CODEC_Fabricante_Equipo.trim() == '')).length != 0) {
                    this.mostrarMensajeInformacion('¡Debe ingresar el fabricante en todos los equipos!', 'warning');
                } else if ($(this.equipos).filter((i, equipo) => (equipo.CODEC_Descripcion_Ficha_Tecnica_Equipo.trim() == '') && (equipo.CODEC_Archivo_Descripcion_Equipo.trim() == '')).length != 0) {
                    this.mostrarMensajeInformacion('¡Debe registrar la descripción de ficha técnica en todos los equipos!', 'warning');
                } else if ($(this.equipos).filter((i, equipo) => (equipo.CODEC_Costo == '' || equipo.CODEC_Costo == 0)).length != 0) {
					this.mostrarMensajeInformacion('¡Debe ingresar el costo en todos los equipos!', 'warning');
                } else if ($(this.equipos).filter((i, equipo) => (equipo.CODEC_Cantidad == '' || equipo.CODEC_Cantidad == 0)).length != 0) {
					this.mostrarMensajeInformacion('¡Debe ingresar la cantidad en todos los equipos!', 'warning');
                } else {
                    this.mostrarMensajeConfirmacion('¿Está seguro de registrar la cotización?', 'Si, registrar', 'No,     cancelar').then((result) => {
                        if (result.isConfirmed) {
                            this.cotizacion.UBIGP_Codigo = this.ubigeo.UBIGC_CodDpto + this.ubigeo.UBIGC_CodProv + this.ubigeo.UBIGC_CodDist;
                            const config = {
                                headers: {
                                    'content-type': 'multipart/form-data',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                }
                            };
                            let formData = new FormData();
                            formData.append('contacto', this.contactoSelected);
                            formData.append('fecha', this.cotizacion.COTIC_Fecha);
                            formData.append('numero', this.cotizacion.COTIC_Numero);
                            formData.append('usuario', this.user.id);
                            formData.append('ubigeo', this.cotizacion.UBIGP_Codigo);
                            this.emailTags.forEach((value, i) => {
                                formData.append(`correo${i+1}`, value);
                            });
                            this.equipos.forEach((equipo, i) => {
                                formData.append(`equipos[${i}][COTIP_Codigo]`, equipo.COTIP_Codigo);
                                formData.append(`equipos[${i}][CODEC_Nombre_Equipo]`, equipo.CODEC_Nombre_Equipo);
                                formData.append(`equipos[${i}][CODEC_Descripcion_Equipo]`, equipo.CODEC_Descripcion_Equipo);
                                formData.append(`equipos[${i}][CODEC_Fabricante_Equipo]`, equipo.CODEC_Fabricante_Equipo);
                                formData.append(`equipos[${i}][CODEC_Cantidad]`, equipo.CODEC_Cantidad);
                                formData.append(`equipos[${i}][CODEC_Costo]`, equipo.CODEC_Costo);
                                formData.append(`equipos[${i}][CODEC_SubTotal]`, equipo.CODEC_SubTotal);
                                formData.append(`equipos[${i}][CODEC_Descripcion_Ficha_Tecnica_Equipo]`, equipo.CODEC_Descripcion_Ficha_Tecnica_Equipo);
                                formData.append(`equipos[${i}][CODEC_Url_Ficha_Tecnica_Equipo]`, equipo.CODEC_Url_Ficha_Tecnica_Equipo ?? '');
                                formData.append(`equipos[${i}][CODEC_dcto_porcentaje]`, equipo.CODEC_dcto_porcentaje);
                                formData.append(`equipos[${i}][CODEC_dcto_importe]`, equipo.CODEC_dcto_importe);
                                formData.append(`equipos[${i}][CODEC_dcto_subtotal]`, equipo.CODEC_dcto_subtotal);
                                formData.append(`equipos[${i}][tempFile]`, equipo.archivo === undefined ? null : equipo.archivo);
                            });
                            formData.append('descuentoPorcentaje', this.DescuentoPorcentaje);
                            formData.append('descuentoImporte', this.DescuentoImporte);
                            formData.append('subtotalDescuento', this.SubtotalDescuento);
                            formData.append('subtotal', this.SubTotal);
                            formData.append('igv', this.Igv);
                            formData.append('total', this.Total);
                            formData.append('COTIC_flag_pedido', this.cotizacion.COTIC_flag_pedido ? 1 : 0);

                            $('#btn-agregar-cotizacion-calibracion').attr('disabled', true);
                            $('#btn-agregar-cotizacion-calibracion > img').css({
                                'display': 'inline-block'
                            });

                            axios.post(url,
                                formData, config
                            )
                            .then(function(response) {
                                if(response.data.error === undefined){
                                    Swal.fire({
                                        title: '"' + response.data + '"',
                                        icon: 'success',
                                        confirmButtonText: 'Aceptar',
                                        allowOutsideClick: false
                                    }).then(function() {
                                        location.href = '/calibracion';
                                    });
                                }else{
                                    Swal.fire({
                                        title: '"' + response.data.error + '"',
                                        icon: 'error',
                                        confirmButtonText: 'Aceptar',
                                        allowOutsideClick: false
                                    });
                                    $('#btn-agregar-cotizacion-calibracion').attr('disabled', false);
                                    $('#btn-agregar-cotizacion-calibracion > img').css({
                                        'display': 'none'
                                    });
                                }

                            }).catch(error => {
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'error',
                                    title: error,
                                    showConfirmButton: false,
                                    timer: 3000
                                });
                                $('#btn-agregar-cotizacion-calibracion').attr('disabled', false);
                                $('#btn-agregar-cotizacion-calibracion > img').css({
                                    'display': 'none'
                                });
                            });
                        }
                    });
                }
            },
            seleccionarContacto : async function(){
                // const response = await axios.get(`/solicitante/contacto/get/${this.solicitanteSelected}`);
                // this.contactoSelected = response.data.id_contacto;
                if(this.contactos.length == 0){
                    this.contactoSelected = undefined;
                    return;
                }
                this.contactoSelected = this.contactos[0].id_contacto;
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
            irAListado() {
                this.mostrarMensajeConfirmacion('¿Está seguro que desea cancelar el registro?', 'Si, cancelar', 'No, permanecer').then((result) => {
                    if (result.isConfirmed) {
                        location.href = '/calibracion';
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
                var regex = new RegExp('^[0-9]+$');
                var key = String.fromCharCode(!e.charCode ? e.which : e.charCode);
                if (!regex.test(key)) {
                    e.preventDefault();
                    return false;
                }
            },
            restringirSoloNumerosDecimales(e) {
                if (!((e.which >= 48 && e.which <= 57) ||
                        (e.which == 40 || e.which == 41) ||
                        (e.which == 8 || e.which == 0 || e.which == 46))) {
                    e.preventDefault();
                    return false;
                }
            },
            realizarCalculosDeCalibracion(e, index)
            {

                let equipo = this.equipos[index];
				let cantidad = isNaN(parseInt(equipo.CODEC_Cantidad)) ? 0 : parseInt(equipo.CODEC_Cantidad);
				let costo = isNaN(parseFloat(equipo.CODEC_Costo)) ? 0 : parseFloat(equipo.CODEC_Costo);
                let subtotal = (cantidad * costo).toFixed(2);
                let descuento = isNaN(parseFloat(equipo.CODEC_dcto_porcentaje)) ? 0 : parseFloat(equipo.CODEC_dcto_porcentaje);
                let monto_descuento = (subtotal * descuento) / 100;
                let subtotal_descontado = descuento > 0 ? (subtotal - monto_descuento).toFixed(2) : subtotal;

                this.equipos[index].CODEC_Costo = this.formatearModeloADecimal(equipo.CODEC_Costo);
                this.equipos[index].CODEC_SubTotal = this.formatearModeloADecimal(subtotal);
                this.equipos[index].CODEC_dcto_porcentaje = this.formatearModeloADecimal(descuento);
                this.equipos[index].CODEC_dcto_importe = this.formatearModeloADecimal(monto_descuento);
                this.equipos[index].CODEC_dcto_subtotal = this.formatearModeloADecimal(subtotal_descontado);

                this.calcularTotalFinal();
            },
            formatearModeloADecimal(value) {
				value = isNaN(parseFloat(value)) ? '0.00' : (parseFloat(value)).toFixed(2);
				return value;
			},
            formatearDecimales(e, control) {
                control.value = isNaN(parseFloat(control.value)) ? '0.00' : (parseFloat(control.value)).toFixed(2);
            },
            setSubTotal() {
                var suma = 0;
                this.equipos.forEach((equipo, index) => {
					if (isNaN(equipo.CODEC_dcto_subtotal) || equipo.CODEC_dcto_subtotal < 0 || equipo.CODEC_dcto_subtotal == '')
						suma += 0;
					else
						suma += parseFloat(equipo.CODEC_dcto_subtotal);
                });
                this.SubTotal = (suma).toFixed(2);
            },
            setDescuento() {
                let descuentoPorc = isNaN(this.DescuentoPorcentaje) || this.DescuentoPorcentaje === '' ? 0 : parseFloat(this.DescuentoPorcentaje);
                let montoDescuento = (this.SubTotal * descuentoPorc) / 100;
                this.DescuentoPorcentaje = (descuentoPorc).toFixed(2);
                this.DescuentoImporte = (montoDescuento).toFixed(2);
                this.SubtotalDescuento = descuentoPorc > 0 ? (this.SubTotal - montoDescuento).toFixed(2) : (parseFloat(this.SubTotal)).toFixed(2);
            },
            setIgv() {
                this.Igv = (Number(this.SubtotalDescuento) * 0.18).toFixed(2);
            },
            setTotal() {
                this.Total = (Number(this.SubtotalDescuento) + Number(this.Igv)).toFixed(2);
            },
            seleccionarSolicitante(){
                var url = '/contacto/solicitante/get/' + this.contactoSelected
                    axios.get(url).then(response => {
                        this.solicitanteSelected = response.data.SOLIP_Codigo
                    });
            },
            calcularTotalFinal() {
                this.setSubTotal();
                this.setDescuento();
                this.setIgv();
                this.setTotal();
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
                if(this.contactoSelected === '' || this.contactoSelected === null || this.contactoSelected === undefined){
                    this.cotizacion.correo_contacto = '';
                    this.cotizacion.celular_contacto = '';
                    return;
                }

                const contacto = this.contactos.filter(obj => obj.id_contacto == this.contactoSelected)[0];

                this.cotizacion.correo_contacto = contacto?.correo_contacto;
                this.cotizacion.celular_contacto = contacto?.celular_contacto;
            },
            downloadFileEquipo() {
                this.downloadBlob(this.equipo.archivo, this.equipo.archivo.name);
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

