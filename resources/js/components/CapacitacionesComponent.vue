<template>
    <div class="form control">
        <div class="row">
            <div class="col-sm-11 mx-auto mb-4">
                <div class="card">
                    <div class="card-header text-light" style="background-color: #800404;">
                        <h6 class="m-0 font-weight-bold">Empresa Solicitante</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="col-form-label" for="SOLIC_Nombre">Nombre<span class="text-danger ml-1">*</span></label>
                                <input class="form-control" type="text" name="SOLIC_Nombre" ref="SOLIC_Nombre" v-model="solicitante.SOLIC_Nombre" maxlength="100" />
                            </div>
                            <div class="form-group col-md-3">
                                <label class="col-form-label">Tipo<span class="text-danger ml-1">*</span></label>
                                <select v-model="solicitante.TIPSOLIP_Codigo" class="form-control" name="TIPSOLIP_Codigo" ref="TIPSOLIP_Codigo" id="TIPSOLIP_Codigo">
                                    <option value="">Seleccione un tipo</option>
                                    <option v-for="tipoSolicitante in tiposSolicitante" v-bind:value="tipoSolicitante.TIPSOLIP_Codigo" v-bind:key="tipoSolicitante.TIPSOLIP_Codigo">{{ tipoSolicitante.TIPSOLIC_Descripcion }}</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="col-form-label">RUC<span class="text-danger ml-1">*</span></label>
                                <input class="form-control" type="text" name="SOLIC_Ruc" ref="SOLIC_Ruc" v-model="solicitante.SOLIC_Ruc" maxlength="11" @keypress="restringirSoloNumerosEnteros($event)" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label class="col-form-label" for="SOLIC_Direccion">Dirección<span class="text-danger ml-1">*</span></label>
                                <input class="form-control" type="text" name="SOLIC_Direccion" ref="SOLIC_Direccion" v-model="solicitante.SOLIC_Direccion" maxlength="255" />
                            </div>
                            <div class="form-group col-md-3">
                                <label class="col-form-label" for="SOLIC_Telefono">Teléfono<span class="text-danger ml-1">*</span></label>
                                <input class="form-control" type="text" name="SOLIC_Telefono" ref="SOLIC_Telefono" v-model="solicitante.SOLIC_Telefono" maxlength="100" @keypress="restringirSoloNumerosEnteros($event)" />
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-form-label" for="SOLIC_Email">Email<span class="text-danger ml-1">*</span></label>
                                <input class="form-control" type="email" name="SOLIC_Email" ref="SOLIC_Email" v-model="solicitante.SOLIC_Email" maxlength="255" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label class="col-form-label">Nombre del Departamento<span class="text-danger ml-1">*</span></label>
                                <select v-model="ubigeo.UBIGC_CodDpto" class="form-control" name="UBIGC_CodDpto" ref="UBIGC_CodDpto" @change="listarProvincias()" id="UBIGC_CodDpto">
                                    <option value="">Seleccione un Departamento</option>
                                    <option v-for="departamento in departamentos" v-bind:value="departamento.UBIGC_CodDpto" v-bind:key="departamento.UBIGC_CodDpto">{{ departamento.UBIGC_Descripcion }}</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-form-label" for="">Nombre de la Provincia<span class="text-danger ml-1">*</span></label>
                                <select v-model="ubigeo.UBIGC_CodProv" class="form-control" name="UBIGC_CodProv" ref="UBIGC_CodProv" @change="listarDistritos()" id="UBIGC_CodProv">
                                    <option value="">Seleccione una Provincia</option>
                                    <option v-for="provincia in provincias" v-bind:value="provincia.UBIGC_CodProv" v-bind:key="provincia.UBIGC_CodProv">{{ provincia.UBIGC_Descripcion }}</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-form-label" for="">Nombre del Distrito<span class="text-danger ml-1">*</span></label>
                                <select v-model="ubigeo.UBIGC_CodDist" class="form-control" name="UBIGC_CodDist" ref="UBIGC_CodDist" id="UBIGC_CodDist">
                                    <option value="">Seleccione un Distrito</option>
                                    <option v-for="distrito in distritos" v-bind:value="distrito.UBIGC_CodDist" v-bind:key="distrito.UBIGC_CodDist">{{ distrito.UBIGC_Descripcion }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-11 mx-auto mb-4">
                <div class=" card">
                    <div class="card-header text-light" style="background-color: #800404;">
                        <h6 class="m-0 font-weight-bold">Representante de la Empresa Solicitante</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label class="col-form-label" for="nombre_contacto">Nombre del Contacto<span class="text-danger ml-1">*</span></label>
                                <input class="form-control" type="text" name="nombre_contacto" ref="nombre_contacto" v-model="contacto.nombre_contacto" maxlength="100" />
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-form-label" for="correo_contacto">Correo Electrónico del Contacto<span class="text-danger ml-1">*</span></label>
                                <input class="form-control" type="text" name="correo_contacto" ref="correo_contacto" v-model="contacto.correo_contacto" maxlength="255" />
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-form-label" for="celular_contacto">Celular del Contacto<span class="text-danger ml-1">*</span></label>
                                <input class="form-control" type="text" name="celular_contacto" ref="celular_contacto" v-model="contacto.celular_contacto" maxlength="9" @keypress="restringirSoloNumerosEnteros($event)" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-sm-11 mx-auto text-left">
                <div class=" card">
                    <div class="card-header text-light" style="background-color: #800404;">
                        <h6 class="m-0 font-weight-bold">Ingresar los correos electrónicos a los que se les enviará la cotización en formato (4 correos como máximo) </h6>
                    </div>
                    <div class="card-body">
                        <input type="text" class="form-control" id="txt-emails-envio-cotizacion" ref="emails_envio_cotizacion" />
                        <button type="button" id="ver-emails" style="display: none;">ver emails</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-11 mx-auto text-center">
            <h3>CURSOS QUE FORMAN PARTE DE LA COTIZACION</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-11 mx-auto text-left">
                <button type="button" class="btn btn-success btn-sm px-4 pt-2" id="boton_modal" @click="openNewCapacitacion">
                    <span class="font-weight-bold">Nueva Capacitación</span>&nbsp;&nbsp;
                    <i class="fa fa-plus" aria-hidden="true"></i>
                </button>
            </div>
        </div>
        <div class="row" v-show="capacitaciones.length">
            <div class="col-sm-11 mx-auto text-center">
                <div class="table-responsive">
                    <table class="table table-sm table-bordered mt-4 mb-0 w-100" style="width: max-content;">
                        <thead class="bg-success">
                            <tr>
                                <th scope="col" class="h6 text-white text-center font-weight-normal">Nombre del Curso</th>
                                <th scope="col" class="h6 text-white text-center font-weight-normal">Descripcion del Curso</th>
                                <th scope="col" class="h6 text-white text-center font-weight-normal">Cantidad de Inscritos</th>
                                <th scope="col" class="h6 text-white text-center font-weight-normal">Acciones</th>
                                <th style="display: none;"></th>
                                <th style="display: none;"></th>
                                <th style="display: none;"></th>
                                <th style="display: none;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(capacitacion, index) in capacitaciones" :key="index">
                                <td class="text-center" v-text="capacitacion.CURSOC_Nombre"></td>
                                <td class="text-center" v-text="capacitacion.CURSOC_Descripcion"></td>
                                <td class="text-center" v-text="capacitacion.COCAC_Cantidad"></td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-outline-warning btn-sm m-auto" title="Editar capacitación" @click="editCapacitacion(index)">
                                        <i class="fa fa-edit ml-0" aria-hidden="true"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline-danger btn-sm m-auto" @click="deleteCapacitacion(index)" title="Eliminar Capacitación">
                                        <i class="fa fa-trash ml-0" aria-hidden="true"></i>
                                    </button>
                                </td>
                                <td style="display: none;" v-text="capacitacion.COCAC_Costo_Curso_Original"></td>
                                <td style="display: none;" v-text="capacitacion.COCAC_Descuento_Porcentaje"></td>
                                <td style="display: none;" v-text="capacitacion.COCAC_Descuento_Moneda_Real"></td>
                                <td style="display: none;" v-text="capacitacion.COCAC_SubTotal"></td>
                                <td style="display: none;" v-text="capacitacion.COCAC_SubTotal_Descontado"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- MODAL PARA AGREGAR CAPACITACION -->
        <div class="modal fade" id="modal-nueva-capacitacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">
                            Agregar Capacitación
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row form-group mb-2">
                                <div class="col-md-3">
                                    <label class="col-form-label col-form-label-sm">Nombre del Curso:</label>
                                </div>
                                <div class="col-md-9">
									<select v-model="capacitacion.id_curso" class="form-control-sm curso" name="curso" ref="cursocap" @change="seleccionarCurso()">
										<option v-for="curso in cursos" v-bind:value="curso.id_curso" v-bind:key="curso.id_curso">{{ curso.CURSOC_Nombre }}</option>
									</select>
                                </div>
                            </div>
                            <div class="row form-group mb-2">
                                <div class="col-md-3">
                                    <label class="col-form-label col-form-label-sm">Cantidad de Estudiantes:</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control-sm w-100 text-left" name="cantidad[]" ref="cantidadest" v-model.number="capacitacion.COCAC_Cantidad"
										autocomplete="off" @focusout="getDescuento(capacitacion.id_curso)" @keypress="restringirSoloNumerosEnteros($event)"  />
                                </div>
                            </div>
                            <div class="row form-group mb-2">
                                <div class="col-md-3">
                                    <label class="col-form-label col-form-label-sm">Detallar curso a cotizar (Sólo si el curso no esta en la lista):</label>
                                </div>
                                <div class="col-md-9">
                                    <textarea style="resize: none" rows="2" cols="5" class="form-control detalle-curso-cotizar" ref="detallecur" v-model="capacitacion.COCAC_Detalle_Curso_Cotizar" :readonly="capacitacion.id_curso != 0">
                                    </textarea>
                                </div>
                            </div>
                            <div class="row form-group mb-2">
                                <div class="col-md-3">
                                    <label class="col-form-label col-form-label-sm">Indique el horario tentativo para el dictado del curso:</label>
                                </div>
                                <div class="col-md-9">
                                    <textarea style="resize: none" rows="2" cols="5" class="form-control" ref="horarioten" v-model="capacitacion.COCAC_Horario_Tentativo_Curso">
                                    </textarea>
                                </div>
                            </div>
                            <div class="row form-group mb-2">
                                <div class="col-md-3">
                                    <label class="col-form-label col-form-label-sm">Lugar de Capacitación:</label>
                                </div>
                                <div class="col-md-9">
                                    <select v-model="capacitacion.COCAC_Lugar_Capacitacion" class="form-control-sm" ref="lugarcap">
                                        <option value="1">Oficinas de la Empresa</option>
                                        <option value="2">Laboratorio de Electricidad</option>
                                        <option value="3">Cualquiera de las dos opciones</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success btn-sm" @click="addCapacitacion()">
                            Agregar&nbsp;&nbsp;<i class="fa fa-plus" aria-hidden="true"></i>
                        </button>
                        <button type="button" class="btn btn-danger btn-sm" @click="cancelAddCapacitacion()">
                            Cancelar&nbsp;&nbsp;<i class="fa fa-ban" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MODAL PARA AGREGAR CAPACITACION -->
        <!-- MODAL PARA EDITAR CAPACITACION -->
        <div class="modal fade" id="modal-editar-capacitacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">
                            Editar Capacitación
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row form-group mb-2">
                                <div class="col-md-3">
                                    <label class="col-form-label col-form-label-sm">Nombre del Curso:</label>
                                </div>
                                <div class="col-md-9">
									<select v-model="capacitacion.id_curso" class="form-control-sm curso" name="curso" ref="cursocapedit" @change="seleccionarCurso()">
										<option v-for="curso in cursos" v-bind:value="curso.id_curso" v-bind:key="curso.id_curso">{{ curso.CURSOC_Nombre }}</option>
									</select>
                                </div>
                            </div>
                            <div class="row form-group mb-2">
                                <div class="col-md-3">
                                    <label class="col-form-label col-form-label-sm">Cantidad de Estudiantes:</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control-sm w-100 text-left" name="cantidad[]" ref="cantidadedit" v-model.number="capacitacion.COCAC_Cantidad"
										autocomplete="off" @focusout="getDescuento(capacitacion.id_curso)" @keypress="restringirSoloNumerosEnteros($event)"  />
                                </div>
                            </div>
                            <div class="row form-group mb-2">
                                <div class="col-md-3">
                                    <label class="col-form-label col-form-label-sm">Detallar curso a cotizar (Sólo si el curso no esta en la lista):</label>
                                </div>
                                <div class="col-md-9">
                                    <textarea style="resize: none" rows="2" cols="5" class="form-control detalle-curso-cotizar" ref="detallecuredit" v-model="capacitacion.COCAC_Detalle_Curso_Cotizar" :readonly="capacitacion.id_curso != 0">
                                    </textarea>
                                </div>
                            </div>
                            <div class="row form-group mb-2">
                                <div class="col-md-3">
                                    <label class="col-form-label col-form-label-sm">Indique el horario tentativo para el dictado del curso:</label>
                                </div>
                                <div class="col-md-9">
                                    <textarea style="resize: none" rows="2" cols="5" class="form-control" ref="horariotenedit" v-model="capacitacion.COCAC_Horario_Tentativo_Curso">
                                    </textarea>
                                </div>
                            </div>
                            <div class="row form-group mb-2">
                                <div class="col-md-3">
                                    <label class="col-form-label col-form-label-sm">Lugar de Capacitación:</label>
                                </div>
                                <div class="col-md-9">
                                    <select v-model="capacitacion.COCAC_Lugar_Capacitacion" class="form-control-sm" ref="lugarcapedit">
                                        <option value="1">Oficinas de la Empresa</option>
                                        <option value="2">Laboratorio de Electricidad</option>
                                        <option value="3">Cualquiera de las dos opciones</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success btn-sm" @click="updateCapacitacion()">
                            Actualizar&nbsp;&nbsp;<i class="fa fa-edit" aria-hidden="true"></i>
                        </button>
                        <button type="button" class="btn btn-danger btn-sm" @click="cancelEditCapacitacion()">
                            Cancelar&nbsp;&nbsp;<i class="fa fa-ban" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MODAL PARA EDITAR CAPACITACION -->
        <br />
        <br />
        <br />
        <br />
        <div class="row mb-4">
            <div class="col-sm-11 mx-auto text-center">
                <button type="button" class="btn btn-warning btn-lg px-4 py-2" id="boton_modal" @click="vistaPrevia()">
                    <span class="text-white font-weight-bold">Vista Preliminar</span>
                    <span><i class="fa fa-search-plus text-white" aria-hidden="true"></i></span>
                </button>
                <button type="button" class="btn btn-primary btn-lg px-4 py-2" id="btn-registrar-cotizacion-capacitacion" @click="addCotizacion()">
                    <span class="font-weight-bold">Solicitar Cotización</span>&nbsp;&nbsp;
                    <i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;
                    <img :src="'/images/load.gif'" style="display: none; width: 1em;" />
                </button>
            </div>
        </div>

        <window-portal v-model="openWindow">
            <vista-preliminar
                :solicitante="solicitante"
                :contacto="contacto"
                :cotizacion="cotizacion"
                :capacitaciones="capacitaciones"
                tipo="capacitacion"
                />
        </window-portal>
        <br />
    </div>
</template>

<script>
    $(document).ready(function(){
        // $('.curso').val('0');
    });
    export default {
        data: function() {
            return {
                solicitante: {},
                contacto: {},
                cotizacion: {},
                ubigeo: {},
                tiposSolicitante: [],
                departamentos: [],
                provincias: [],
                distritos: [],
                capacitaciones: [],
                capacitacion: {},
                cursos: [],
                curso: {},
                idxCurso: null,
                openWindow: false,
                idxCapacitacion: null
            }
        },
        created() {
            this.listarTiposSolicitante();
            this.listarDepartamentos();
            this.listarCursos();
        },
        methods: {
            vistaPrevia(){
                if(this.validarCotizacion()){

                    var departamento = $("#UBIGC_CodDpto").find('option:selected').text();
                    var provincia = $("#UBIGC_CodProv").find('option:selected').text();
                    var distrito = $("#UBIGC_CodDist").find('option:selected').text();
                    this.solicitante.ubigeoCompleto = departamento + '->' + provincia + '->' + distrito;

                    this.solicitante.tiposSolicitanteDescripcion = $("#TIPSOLIP_Codigo").find('option:selected').text();

                    let emailEnvioCotizacion = $('#txt-emails-envio-cotizacion').val().split(',');
                    this.cotizacion.COTIC_Correo1 = (emailEnvioCotizacion[0] != undefined && emailEnvioCotizacion[0] != null) ? emailEnvioCotizacion[0] : '';
                    this.cotizacion.COTIC_Correo2 = (emailEnvioCotizacion[1] != undefined && emailEnvioCotizacion[1] != null) ? emailEnvioCotizacion[1] : '';
                    this.cotizacion.COTIC_Correo3 = (emailEnvioCotizacion[2] != undefined && emailEnvioCotizacion[2] != null) ? emailEnvioCotizacion[2] : '';
                    this.cotizacion.COTIC_Correo4 = (emailEnvioCotizacion[3] != undefined && emailEnvioCotizacion[3] != null) ? emailEnvioCotizacion[3] : '';

                    if(this.openWindow)
                        this.openWindow = false;

                    setTimeout(() => this.openWindow = true, 500);
                }
            },
            validarCotizacion(){
                let regexpEmail = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                let regexpRuc = /^[0-9]{11}$/;
				if (typeof this.solicitante.SOLIC_Nombre == "undefined" || this.solicitante.SOLIC_Nombre.trim() == '') {
					this.$refs.SOLIC_Nombre.focus();
                    this.mostrarMensajeInformacion('¡Debe ingresar el nombre del solicitante!', 'warning');
                    return false;
                } else if (typeof this.solicitante.TIPSOLIP_Codigo == "undefined" || this.solicitante.TIPSOLIP_Codigo == '') {
					this.$refs.TIPSOLIP_Codigo.focus();
                    this.mostrarMensajeInformacion('¡Debe seleccionar un tipo de solicitante!', 'warning');
                    return false;
                } else if (typeof this.solicitante.SOLIC_Ruc == "undefined" || this.solicitante.SOLIC_Ruc.trim() == '') {
					this.$refs.SOLIC_Ruc.focus();
                    this.mostrarMensajeInformacion('¡Debe ingresar el número de RUC del solicitante!', 'warning');
                    return false;
                } else if (!regexpRuc.test(this.solicitante.SOLIC_Ruc)) {
					this.$refs.SOLIC_Ruc.focus();
                    this.mostrarMensajeInformacion('¡Debe ingresar un número de  RUC válido!', 'warning');
                    return false;
                } else if (typeof this.solicitante.SOLIC_Direccion == "undefined" || this.solicitante.SOLIC_Direccion.trim() == '') {
					this.$refs.SOLIC_Direccion.focus();
                    this.mostrarMensajeInformacion('¡Debe ingresar la dirección del solicitante!', 'warning');
                    return false;
                } else if (typeof this.solicitante.SOLIC_Telefono == "undefined" || this.solicitante.SOLIC_Telefono.trim() == '') {
					this.$refs.SOLIC_Telefono.focus();
                    this.mostrarMensajeInformacion('¡Debe ingresar el teléfono del solicitante!', 'warning');
                    return false;
                } else if (typeof this.solicitante.SOLIC_Email == "undefined" || this.solicitante.SOLIC_Email.trim() == '') {
					this.$refs.SOLIC_Email.focus();
                    this.mostrarMensajeInformacion('¡Debe ingresar el email del solicitante!', 'warning');
                    return false;
                } else if (!regexpEmail.test(this.solicitante.SOLIC_Email)) {
	                this.$refs.SOLIC_Email.focus();
                    this.mostrarMensajeInformacion('¡Debe ingresar un email de solicitante válido!', 'warning');
                    return false;
                } else if (typeof this.ubigeo.UBIGC_CodDpto == "undefined" || this.ubigeo.UBIGC_CodDpto == '') {
					this.$refs.UBIGC_CodDpto.focus();
                    this.mostrarMensajeInformacion('¡Debe seleccionar un departamento!', 'warning');
                    return false;
                } else if (typeof this.ubigeo.UBIGC_CodProv == "undefined" || this.ubigeo.UBIGC_CodProv == '') {
					this.$refs.UBIGC_CodProv.focus();
                    this.mostrarMensajeInformacion('¡Debe seleccionar una provincia!', 'warning');
                    return false;
                } else if (typeof this.ubigeo.UBIGC_CodDist == "undefined" || this.ubigeo.UBIGC_CodDist == '') {
					this.$refs.UBIGC_CodDist.focus();
                    this.mostrarMensajeInformacion('¡Debe seleccionar un distrito!', 'warning');
                    return false;
                } else if (typeof this.contacto.nombre_contacto == "undefined" || this.contacto.nombre_contacto.trim() == '') {
					this.$refs.nombre_contacto.focus();
                    this.mostrarMensajeInformacion('¡Debe ingresar el nombre del contacto!', 'warning');
                    return false;
                } else if (typeof this.contacto.correo_contacto == "undefined" || this.contacto.correo_contacto.trim() == '') {
					this.$refs.correo_contacto.focus();
                    this.mostrarMensajeInformacion('¡Debe ingresar el email del contacto!', 'warning');
                    return false;
                } else if (!regexpEmail.test(this.contacto.correo_contacto)) {
	                this.$refs.correo_contacto.focus();
                    this.mostrarMensajeInformacion('¡Debe ingresar un email de contacto válido!', 'warning');
                    return false;
                } else if (typeof this.contacto.celular_contacto == "undefined" || this.contacto.celular_contacto.trim() == '') {
	                this.$refs.celular_contacto.focus();
                    this.mostrarMensajeInformacion('¡Debe ingresar el celular del contacto!', 'warning');
                    return false;
                } else {
                    return true;
                }
            },
            addCotizacion() {
                let url = "/cotizacion-capacitacion-web/store";
                let regexpEmail = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                let regexpRuc = /^[0-9]{11}$/;
				if (typeof this.solicitante.SOLIC_Nombre == "undefined" || this.solicitante.SOLIC_Nombre.trim() == '') {
					this.$refs.SOLIC_Nombre.focus();
					this.mostrarMensajeInformacion('¡Debe ingresar el nombre del solicitante!', 'warning');
                } else if (typeof this.solicitante.TIPSOLIP_Codigo == "undefined" || this.solicitante.TIPSOLIP_Codigo == '') {
					this.$refs.TIPSOLIP_Codigo.focus();
					this.mostrarMensajeInformacion('¡Debe seleccionar un tipo de solicitante!', 'warning');
                } else if (typeof this.solicitante.SOLIC_Ruc == "undefined" || this.solicitante.SOLIC_Ruc.trim() == '') {
					this.$refs.SOLIC_Ruc.focus();
					this.mostrarMensajeInformacion('¡Debe ingresar el número de RUC del solicitante!', 'warning');
                } else if (!regexpRuc.test(this.solicitante.SOLIC_Ruc)) {
					this.$refs.SOLIC_Ruc.focus();
					this.mostrarMensajeInformacion('¡Debe ingresar un número de  RUC válido!', 'warning');
                } else if (typeof this.solicitante.SOLIC_Direccion == "undefined" || this.solicitante.SOLIC_Direccion.trim() == '') {
					this.$refs.SOLIC_Direccion.focus();
					this.mostrarMensajeInformacion('¡Debe ingresar la dirección del solicitante!', 'warning');
                } else if (typeof this.solicitante.SOLIC_Telefono == "undefined" || this.solicitante.SOLIC_Telefono.trim() == '') {
					this.$refs.SOLIC_Telefono.focus();
					this.mostrarMensajeInformacion('¡Debe ingresar el teléfono del solicitante!', 'warning');
                } else if (typeof this.solicitante.SOLIC_Email == "undefined" || this.solicitante.SOLIC_Email.trim() == '') {
					this.$refs.SOLIC_Email.focus();
					this.mostrarMensajeInformacion('¡Debe ingresar el email del solicitante!', 'warning');
                } else if (!regexpEmail.test(this.solicitante.SOLIC_Email)) {
	                this.$refs.SOLIC_Email.focus();
					this.mostrarMensajeInformacion('¡Debe ingresar un email de solicitante válido!', 'warning');
                } else if (typeof this.ubigeo.UBIGC_CodDpto == "undefined" || this.ubigeo.UBIGC_CodDpto == '') {
					this.$refs.UBIGC_CodDpto.focus();
					this.mostrarMensajeInformacion('¡Debe seleccionar un departamento!', 'warning');
                } else if (typeof this.ubigeo.UBIGC_CodProv == "undefined" || this.ubigeo.UBIGC_CodProv == '') {
					this.$refs.UBIGC_CodProv.focus();
					this.mostrarMensajeInformacion('¡Debe seleccionar una provincia!', 'warning');
                } else if (typeof this.ubigeo.UBIGC_CodDist == "undefined" || this.ubigeo.UBIGC_CodDist == '') {
					this.$refs.UBIGC_CodDist.focus();
					this.mostrarMensajeInformacion('¡Debe seleccionar un distrito!', 'warning');
                } else if (typeof this.contacto.nombre_contacto == "undefined" || this.contacto.nombre_contacto.trim() == '') {
					this.$refs.nombre_contacto.focus();
					this.mostrarMensajeInformacion('¡Debe ingresar el nombre del contacto!', 'warning');
                } else if (typeof this.contacto.correo_contacto == "undefined" || this.contacto.correo_contacto.trim() == '') {
					this.$refs.correo_contacto.focus();
					this.mostrarMensajeInformacion('¡Debe ingresar el email del contacto!', 'warning');
                } else if (!regexpEmail.test(this.contacto.correo_contacto)) {
	                this.$refs.correo_contacto.focus();
					this.mostrarMensajeInformacion('¡Debe ingresar un email de contacto válido!', 'warning');
                } else if (typeof this.contacto.celular_contacto == "undefined" || this.contacto.celular_contacto.trim() == '') {
	                this.$refs.celular_contacto.focus();
					this.mostrarMensajeInformacion('¡Debe ingresar el celular del contacto!', 'warning');
                } else {
                    var now_date = new Date();

                    this.solicitante.UBIGP_Codigo = this.ubigeo.UBIGC_CodDpto + this.ubigeo.UBIGC_CodProv + this.ubigeo.UBIGC_CodDist;
                    let emailEnvioCotizacion = $('#txt-emails-envio-cotizacion').val().split(',');
                    if (emailEnvioCotizacion[0] == '')
                    {
                        this.mostrarMensajeInformacion('¡Debe ingresar por lo menos un correo electrónico!', 'warning');
                        return false;
                    }
                    this.cotizacion.COTIC_Correo1 = (emailEnvioCotizacion[0] != undefined && emailEnvioCotizacion[0] != null) ? emailEnvioCotizacion[0] : '';
                    this.cotizacion.COTIC_Correo2 = (emailEnvioCotizacion[1] != undefined && emailEnvioCotizacion[1] != null) ? emailEnvioCotizacion[1] : '';
                    this.cotizacion.COTIC_Correo3 = (emailEnvioCotizacion[2] != undefined && emailEnvioCotizacion[2] != null) ? emailEnvioCotizacion[2] : '';
                    this.cotizacion.COTIC_Correo4 = (emailEnvioCotizacion[3] != undefined && emailEnvioCotizacion[3] != null) ? emailEnvioCotizacion[3] : '';
                    this.cotizacion.COTIC_Fecha_Cotizacion = moment(new Date()).format('yyyy-MM-DD');
                    this.mostrarMensajeConfirmacion('¿Está seguro de registrar la capacitación?', 'Si, registrar', 'No, cancelar').then((result) => {
                        if (result.isConfirmed) {
                            $('#btn-registrar-cotizacion-capacitacion').attr('disabled', true);
							$('#btn-registrar-cotizacion-capacitacion > img').css({
								'display': 'inline-block'
							});
							axios.post(url, {
                                solicitante: this.solicitante,
                                contacto: this.contacto,
                                cotizacion: this.cotizacion,
                                capacitaciones: this.capacitaciones
							}).then(function(response) {
								Swal.fire({
									title: '"' + response.data + '"',
									icon: 'success',
									confirmButtonText: 'Aceptar',
									allowOutsideClick: false
								}).then(function() {
									location.href = '/cot_capacitaciones';
								});
								$('#btn-registrar-cotizacion-capacitacion > img').css({
									'display': 'none'
								});
							}).catch(function(error) {
								Swal.fire({
									position: 'top-end',
									icon: 'error',
									title: error,
									showConfirmButton: false,
									timer: 3000
								});
								$('#btn-registrar-cotizacion-capacitacion').attr('disabled', false);
								$('#btn-registrar-cotizacion-capacitacion > img').css({
									'display': 'none'
								});
							});
                        }
                    });
                }
            },
            openNewCapacitacion() {
                $('#modal-nueva-capacitacion').modal();
                this.capacitacion = {};
                this.capacitacion.id_curso = 0;
                this.capacitacion.COCAC_Costo_Curso_Original = 0;
            },
            addCapacitacion() {
                if (typeof this.capacitacion.id_curso == "undefined") {
					this.$refs.cursocap.focus();
					this.mostrarMensajeInformacion('¡Debe seleccionar un curso!', 'warning');
                } else if (typeof this.capacitacion.COCAC_Cantidad == "undefined" || this.capacitacion.COCAC_Cantidad == '') {
                    this.$refs.cantidadest.focus();
                    this.mostrarMensajeInformacion('¡Debe ingresar la cantidad de estudiantes!', 'warning');

                } else if (   (!$('.detalle-curso-cotizar').prop('readonly')) &&   (typeof this.capacitacion.COCAC_Detalle_Curso_Cotizar == "undefined" || this.capacitacion.COCAC_Detalle_Curso_Cotizar.trim() == '') ) {
                    this.$refs.detallecur.focus();
                    this.mostrarMensajeInformacion('¡Debe ingresar el detalle del curso a cotizar!', 'warning');

                } else if (typeof this.capacitacion.COCAC_Horario_Tentativo_Curso == "undefined" || this.capacitacion.COCAC_Horario_Tentativo_Curso.trim() == '') {
                    this.$refs.horarioten.focus();
                    this.mostrarMensajeInformacion('¡Debe ingresar el horario tentativo!', 'warning');
                } else if (typeof this.capacitacion.COCAC_Lugar_Capacitacion == "undefined" || this.capacitacion.COCAC_Lugar_Capacitacion == '0') {
					this.$refs.lugarcap.focus();
					this.mostrarMensajeInformacion('¡Debe seleccionar un lugar de capacitación!', 'warning');
                } else {
                    $('#modal-nueva-capacitacion').modal('hide');
					let url = '/curso/' + this.capacitacion.id_curso;
					axios.get(url).then((response) => {
                        let curso = {};
						curso = response.data;
                        this.capacitaciones.push({
                            id_curso: this.capacitacion.id_curso,
                            CURSOC_Nombre: curso.CURSOC_Nombre,
                            CURSOC_Descripcion: curso.CURSOC_Descripcion,
                            COCAC_Cantidad: this.capacitacion.COCAC_Cantidad,
                            COCAC_Detalle_Curso_Cotizar: (this.capacitacion.COCAC_Detalle_Curso_Cotizar === undefined) ? '' : this.capacitacion.COCAC_Detalle_Curso_Cotizar.trim(),
                            COCAC_Horario_Tentativo_Curso: (this.capacitacion.COCAC_Horario_Tentativo_Curso === undefined) ? '' : this.capacitacion.COCAC_Horario_Tentativo_Curso.trim(),
                            COCAC_Lugar_Capacitacion: this.capacitacion.COCAC_Lugar_Capacitacion,
                            COCAC_Costo_Curso_Original: this.capacitacion.COCAC_Costo_Curso_Original,
                            COCAC_Descuento_Porcentaje: this.capacitacion.COCAC_Descuento_Porcentaje,
                            COCAC_Descuento_Moneda_Real: this.capacitacion.COCAC_Descuento_Moneda_Real,
                            COCAC_SubTotal: this.capacitacion.COCAC_SubTotal,
                            COCAC_SubTotal_Descontado: this.capacitacion.COCAC_SubTotal_Descontado
                        });
					});
                }
            },
            cancelAddCapacitacion() {
                this.capacitacion = {};
                $('#modal-nueva-capacitacion').modal('hide');
            },
            editCapacitacion(index) {
                $('#modal-editar-capacitacion').modal();
                this.idxCapacitacion = index;
                this.capacitacion = JSON.parse(JSON.stringify(this.capacitaciones[index]));
            },
            updateCapacitacion() {
                if (typeof this.capacitacion.id_curso == "undefined") {
					this.$refs.cursocapedit.focus();
					this.mostrarMensajeInformacion('¡Debe seleccionar un curso!', 'warning');
                } else if (typeof this.capacitacion.COCAC_Cantidad == "undefined" || this.capacitacion.COCAC_Cantidad == '') {
                    this.$refs.cantidadedit.focus();
                    this.mostrarMensajeInformacion('¡Debe ingresar la cantidad de estudiantes!', 'warning');

                } else if (   (!$('.detalle-curso-cotizar').prop('readonly')) &&   (typeof this.capacitacion.COCAC_Detalle_Curso_Cotizar == "undefined" || this.capacitacion.COCAC_Detalle_Curso_Cotizar.trim() == '') ) {
                    this.$refs.detallecuredit.focus();
                    this.mostrarMensajeInformacion('¡Debe ingresar el detalle del curso a cotizar!', 'warning');

                } else if (typeof this.capacitacion.COCAC_Horario_Tentativo_Curso == "undefined" || this.capacitacion.COCAC_Horario_Tentativo_Curso.trim() == '') {
                    this.$refs.horariotenedit.focus();
                    this.mostrarMensajeInformacion('¡Debe ingresar el horario tentativo!', 'warning');
                } else if (typeof this.capacitacion.COCAC_Lugar_Capacitacion == "undefined" || this.capacitacion.COCAC_Lugar_Capacitacion == '0') {
					this.$refs.lugarcapedit.focus();
					this.mostrarMensajeInformacion('¡Debe seleccionar un lugar de capacitación!', 'warning');
                } else {
                    $('#modal-editar-capacitacion').modal('hide');
                    let url = '/curso/' + this.capacitacion.id_curso;
					axios.get(url).then((response) => {
                        let curso = {};
						curso = response.data;
                        this.capacitacion.id_curso = curso.id_curso;
                        this.capacitacion.CURSOC_Nombre = curso.CURSOC_Nombre;
                        this.capacitacion.CURSOC_Descripcion = curso.CURSOC_Descripcion;
                        // this.capacitacion.COCAC_Cantidad = curso.COCAC_Cantidad;

                        this.capacitaciones[this.idxCapacitacion] = this.capacitacion;
                        this.capacitacion = {};
                        this.idxCapacitacion = null;
					});

                }
            },
            cancelEditCapacitacion() {
                this.capacitacion = {};
                this.idxCapacitacion = null;
                $('#modal-editar-capacitacion').modal('hide');
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
            seleccionarCurso(e)
            {
                let idCurso = this.capacitacion.id_curso;
                if (idCurso == 0)
                    $('.detalle-curso-cotizar').prop('readonly', false);
                else
                {
                    this.capacitacion.COCAC_Detalle_Curso_Cotizar = '';
                    $('.detalle-curso-cotizar').prop('readonly', true);
                }
                this.getCurso(idCurso);
                this.getDescuento(idCurso);
            },
            getCurso(idCurso) {
                let url = '/curso/' + idCurso;
                axios.get(url).then((response) => {
                    this.capacitacion.COCAC_Costo_Curso_Original = response.data.CURSOC_Costo;
                });
            },
            getDescuento(idCurso) {
                if (idCurso != 0 && this.capacitacion.COCAC_Cantidad != 0) {
                    let url = '/curso/' + idCurso + '/descuento';
                    axios.get(url).then((response) => {
                        let descuento = $(response.data).filter((i, descuento) => ((descuento.id_curso) == idCurso && (this.capacitacion.COCAC_Cantidad >= descuento.cantidad_min && this.capacitacion.COCAC_Cantidad <= descuento.cantidad_max)));
                        this.capacitacion.COCAC_Descuento_Porcentaje = (descuento.length != 0) ? descuento[0].descuento : 0;
                        let subTotal = parseFloat(this.capacitacion.COCAC_Cantidad) * parseFloat(this.capacitacion.COCAC_Costo_Curso_Original);
                        this.capacitacion.COCAC_Descuento_Moneda_Real = ((subTotal * parseFloat(this.capacitacion.COCAC_Descuento_Porcentaje)) / 100).toFixed(2);
                        this.capacitacion.COCAC_SubTotal = subTotal;
                        this.capacitacion.COCAC_SubTotal_Descontado = (subTotal - parseFloat(this.capacitacion.COCAC_Descuento_Moneda_Real)).toFixed(2);
                    });
                } else {
                    this.capacitacion.COCAC_Descuento_Porcentaje = 0;
                    this.capacitacion.COCAC_Descuento_Moneda_Real = '0.00';
                    this.capacitacion.COCAC_SubTotal = '0.00';
                    this.capacitacion.COCAC_SubTotal_Descontado = '0.00';
                }
            },
            listarTiposSolicitante() {
                var url = '/tiposolicitante/list';
                axios.get(url).then(response => {
                    this.tiposSolicitante = response.data;
                    this.solicitante.TIPSOLIP_Codigo = '';
                });
            },
            listarDepartamentos() {
                var url = '/departamento/list';
                axios.get(url).then(response => {
                    this.departamentos = response.data;
                    this.ubigeo.UBIGC_CodDpto = '';
                    this.ubigeo.UBIGC_CodProv = '';
                    this.ubigeo.UBIGC_CodDist = '';
                });
            },
			listarCursos() {
				var url = '/curso/list';
				axios.get(url).then(response => {
					this.cursos = response.data;
				});
			},
            listarProvincias() {
                if (this.ubigeo.UBIGC_CodDpto != '') {
                    var url = '/provincia/' + this.ubigeo.UBIGC_CodDpto + '/list';
                    axios.get(url).then(response => {
                        this.provincias = response.data;
                    });
                } else {
                    this.provincias = [];
                    this.distritos = [];
                }
                this.ubigeo.UBIGC_CodProv = '';
                this.ubigeo.UBIGC_CodDist = '';
            },
            listarDistritos() {
                if (this.ubigeo.UBIGC_CodProv != '') {
                    var url = '/distrito/' + this.ubigeo.UBIGC_CodDpto + '/' + this.ubigeo.UBIGC_CodProv + '/list';
                    axios.get(url).then(response => {
                        this.distritos = response.data;
                    });
                } else
                    this.distritos = [];
                this.ubigeo.UBIGC_CodDist = '';
            }                        ,
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
            formatearDecimales(e, control) {
                control.value = isNaN(parseFloat(control.value)) ? '0.00' : (parseFloat(control.value)).toFixed(2);
            }
        }
    }
</script>
