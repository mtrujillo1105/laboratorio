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
                                <select v-model="solicitante.TIPSOLIP_Codigo" class="form-control" name="TIPSOLIP_Codigo" ref="TIPSOLIP_Codigo" id="TIPSOLIP_Codigo" >
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
                                <select v-model="ubigeo.UBIGC_CodDpto" class="form-control" id="UBIGC_CodDpto" name="UBIGC_CodDpto" ref="UBIGC_CodDpto" @change="listarProvincias()">
                                    <option value="">Seleccione un Departamento</option>
                                    <option v-for="departamento in departamentos" v-bind:value="departamento.UBIGC_CodDpto" v-bind:key="departamento.UBIGC_CodDpto">{{ departamento.UBIGC_Descripcion }}</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-form-label" for="">Nombre de la Provincia<span class="text-danger ml-1">*</span></label>
                                <select v-model="ubigeo.UBIGC_CodProv" class="form-control" id="UBIGC_CodProv" name="UBIGC_CodProv" ref="UBIGC_CodProv" @change="listarDistritos()">
                                    <option value="">Seleccione una Provincia</option>
                                    <option v-for="provincia in provincias" v-bind:value="provincia.UBIGC_CodProv" v-bind:key="provincia.UBIGC_CodProv">{{ provincia.UBIGC_Descripcion }}</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-form-label" for="">Nombre del Distrito<span class="text-danger ml-1">*</span></label>
                                <select v-model="ubigeo.UBIGC_CodDist" class="form-control" id="UBIGC_CodDist" name="UBIGC_CodDist" ref="UBIGC_CodDist">
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
            <div class="col-sm-11 mx-auto text-left">
                <button type="button" class="btn btn-success btn-sm px-4 pt-2" @click="openNewEquipo">
                    <span class="font-weight-bold">Equipos a calibrar</span>&nbsp;&nbsp;
                    <i class="fa fa-plus" aria-hidden="true"></i>
                </button>
            </div>
        </div>
        <div class="row" v-show="equipos.length">
            <div class="col-sm-11 mx-auto text-center">
                <div class="table-responsive">
                    <table class="table table-sm table-bordered mt-4 mb-0 w-100" style="width: max-content;">
                        <thead class="bg-success">
                            <tr>
                                <!--th scope="col" class="h6 text-white text-center font-weight-normal">Identificador</th-->
                                <th scope="col" class="h6 text-white text-center font-weight-normal">Nombre del Equipo</th>
                                <th scope="col" class="h6 text-white text-center font-weight-normal">Descripcion del Equipo</th>
                                <th scope="col" class="h6 text-white text-center font-weight-normal">Cantidad</th>
                                <th scope="col" class="h6 text-white text-center font-weight-normal">Fabricante</th>
                                <th scope="col" class="h6 text-white text-center font-weight-normal">Descripción Ficha Tecnica</th>
                                <th scope="col" class="h6 text-white text-center font-weight-normal">URL Ficha Tecnica</th>
                                <th scope="col" class="h6 text-white text-center font-weight-normal">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(ensayo,index) in equipos" :key="index">
                                <!--td scope="row" class="text-center" v-text="ensayo.CODEP_Codigo"></td-->
                                <td class="text-center" v-text="ensayo.CODEC_Nombre_Equipo"></td>
                                <td class="text-center" v-text="ensayo.CODEC_Descripcion_Equipo"></td>
                                <td class="text-center" v-text="ensayo.CODEC_Cantidad"></td>
                                <td class="text-center" v-text="ensayo.CODEC_Fabricante_Equipo"></td>
                                <td class="text-center" v-text="ensayo.CODEC_Descripcion_Ficha_Tecnica_Equipo"></td>
                                <td class="text-center" v-text="ensayo.CODEC_Url_Ficha_Tecnica_Equipo"></td>
                                <th class="text-center">
                                    <button type="button" class="btn btn-outline-warning btn-sm m-auto" title="Editar equipo" @click="editEquipo(index)">
                                        <i class="fa fa-edit ml-0" aria-hidden="true"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline-danger btn-sm m-auto" @click="deleteEquipo(index)" title="Eliminar equipo">
                                        <i class="fa fa-trash ml-0" aria-hidden="true"></i>
                                    </button>
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- MODAL PARA AGREGAR EQUIPO -->
        <div class="modal fade" id="modal-nuevo-equipo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">
                            Agregar Equipo
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row form-group mb-2">
                                <div class="col-md-3">
                                    <label class="col-form-label col-form-label-sm">Nombre del Equipo:</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" ref="CODEC_Nombre_Equipo" class="form-control" v-model="equipo.CODEC_Nombre_Equipo" />
                                </div>
                            </div>
                            <div class="row form-group mb-2">
                                <div class="col-md-3">
                                    <label class="col-form-label col-form-label-sm">Descripción del Equipo:</label>
                                </div>
                                <div class="col-md-9">
                                    <textarea class="form-control" ref="CODEC_Descripcion_Equipo" rows="3" cols="5" v-model="equipo.CODEC_Descripcion_Equipo"></textarea>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-5">
                                    <div class="row form-group">
                                        <div class="col-md-7">
                                            <label class="col-form-label col-form-label-sm">Cantidad de Equipos:</label>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" ref="CODEC_Cantidad" class="form-control cantidad-equipos" v-model="equipo.CODEC_Cantidad" @keypress="restringirSoloNumerosEnteros($event)" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="row form-group">
                                        <div class="col-md-5">
                                            <label class="col-form-label col-form-label-sm">Fabricante del Equipo:</label>
                                        </div>
                                        <div class="col-md-7">
                                            <input type="text" ref="CODEC_Fabricante_Equipo" class="form-control" v-model="equipo.CODEC_Fabricante_Equipo" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group mb-2">
                                <div class="col-md-3">
                                    <label class="col-form-label col-form-label-sm">Descripción de la Ficha Técnica del Equipo:</label>
                                </div>
                                <div class="col-md-9">
                                    <textarea ref="CODEC_Descripcion_Ficha_Tecnica_Equipo" class="form-control" rows="3" cols="5" v-model="equipo.CODEC_Descripcion_Ficha_Tecnica_Equipo"></textarea>
                                </div>
                            </div>
                            <div class="row form-group mb-2">
                                <div class="col-md-3">
                                    <label class="col-form-label col-form-label-sm">URL de la Ficha Técnica del Equipo:</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" ref="CODEC_Url_Ficha_Tecnica_Equipo" class="form-control" v-model="equipo.CODEC_Url_Ficha_Tecnica_Equipo" />
                                </div>
                            </div>
                            <div class="row form-group mb-2">
                                <div class="col-md-3">
                                    <label class="col-form-label col-form-label-sm">Archivo de la Descripción del equipo:</label>
                                </div>
                                <div class="col-md-9">
                                  <input type="file" class="form-control" id="archivoFichaTecnica" />
                                  <p class="font-weight-bold">{{equipo.CODEC_Archivo_Descripcion_Equipo}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success btn-sm" @click="addEquipo()">
                            Agregar&nbsp;&nbsp;<i class="fa fa-plus" aria-hidden="true"></i>
                        </button>
                        <button type="button" class="btn btn-danger btn-sm" @click="cancelAddEquipo()">
                            Cancelar&nbsp;&nbsp;<i class="fa fa-ban" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MODAL PARA AGREGAR EQUIPO -->
        <!-- MODAL PARA EDITAR EQUIPO -->
        <div class="modal fade" id="modal-editar-equipo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">
                            Editar Equipo '{{ equipo.CODEC_Nombre_Equipo }}'
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row form-group mb-2">
                                <div class="col-md-3">
                                    <label class="col-form-label col-form-label-sm">Nombre del Equipo:</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" ref="CODEC_Nombre_Equipo" class="form-control" v-model="equipo.CODEC_Nombre_Equipo" />
                                </div>
                            </div>
                            <div class="row form-group mb-2">
                                <div class="col-md-3">
                                    <label class="col-form-label col-form-label-sm">Descripción del Equipo:</label>
                                </div>
                                <div class="col-md-9">
                                    <textarea class="form-control" ref="CODEC_Descripcion_Equipo" rows="3" cols="5" v-model="equipo.CODEC_Descripcion_Equipo"></textarea>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-5">
                                    <div class="row form-group">
                                        <div class="col-md-7">
                                            <label class="col-form-label col-form-label-sm">Cantidad de Equipos:</label>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" ref="CODEC_Cantidad" class="form-control cantidad-equipos" v-model="equipo.CODEC_Cantidad" @keypress="restringirSoloNumerosEnteros($event)" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="row form-group">
                                        <div class="col-md-5">
                                            <label class="col-form-label col-form-label-sm">Fabricante del Equipo:</label>
                                        </div>
                                        <div class="col-md-7">
                                            <input type="text" ref="CODEC_Fabricante_Equipo" class="form-control" v-model="equipo.CODEC_Fabricante_Equipo" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group mb-2">
                                <div class="col-md-3">
                                    <label class="col-form-label col-form-label-sm">Descripción de la Ficha Técnica del Equipo:</label>
                                </div>
                                <div class="col-md-9">
                                    <textarea ref="CODEC_Descripcion_Ficha_Tecnica_Equipo" class="form-control" rows="3" cols="5" v-model="equipo.CODEC_Descripcion_Ficha_Tecnica_Equipo"></textarea>
                                </div>
                            </div>
                            <div class="row form-group mb-2">
                                <div class="col-md-3">
                                    <label class="col-form-label col-form-label-sm">URL de la Ficha Técnica del Equipo:</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" ref="CODEC_Url_Ficha_Tecnica_Equipo" class="form-control" v-model="equipo.CODEC_Url_Ficha_Tecnica_Equipo" />
                                </div>
                            </div>
                            <div class="row form-group mb-2">
                                <div class="col-md-3">
                                    <label class="col-form-label col-form-label-sm">Archivo de la Descripción del equipo:</label>
                                </div>
                                <div class="col-md-9">
                                  <input type="file" class="form-control" id="archivoFichaTecnicaUpdate" />
                                  <p class="font-weight-bold"><a href="javascript:void(0);" @click="downloadFileEquipo();">{{equipo.CODEC_Archivo_Descripcion_Equipo}}</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success btn-sm" @click="updateEquipo()">
                            Actualizar&nbsp;&nbsp;<i class="fa fa-edit" aria-hidden="true"></i>
                        </button>
                        <button type="button" class="btn btn-danger btn-sm" @click="cancelEditEquipo()">
                            Cancelar&nbsp;&nbsp;<i class="fa fa-ban" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MODAL PARA EDITAR EQUIPO -->
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
                <button type="button" class="btn btn-primary btn-lg px-4 py-2" id="btn-registrar-cotizacion-calibracion" @click="addCotizacion()">
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
                :equipos="equipos"
                tipo="calibracion"
                />
        </window-portal>
        <br />
    </div>
</template>

<script>
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
                equipos: [],
                equipo: {},
                idxEquipo: null,
                openWindow: false,
            }
        },
        created() {
            this.listarTiposSolicitante();
            this.listarDepartamentos();
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
                let url = "/cotizacion-calibracion-web/store";
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
                    this.mostrarMensajeConfirmacion('¿Está seguro de registrar la cotización?', 'Si, registrar', 'No, cancelar').then((result) => {
                        if (result.isConfirmed) {
                            const config = {
                                headers: {
                                    'content-type': 'multipart/form-data',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                }
                            };
                            let formData = new FormData();

                            /*solicitante */
                            formData.append('solicitante[SOLIC_Direccion]', this.solicitante.SOLIC_Direccion);
                            formData.append('solicitante[SOLIC_Email]', this.solicitante.SOLIC_Email);
                            formData.append('solicitante[SOLIC_Nombre]', this.solicitante.SOLIC_Nombre);
                            formData.append('solicitante[SOLIC_Ruc]', this.solicitante.SOLIC_Ruc);
                            formData.append('solicitante[SOLIC_Telefono]', this.solicitante.SOLIC_Telefono);
                            formData.append('solicitante[TIPSOLIP_Codigo]', this.solicitante.TIPSOLIP_Codigo);
                            formData.append('solicitante[UBIGP_Codigo]', this.solicitante.UBIGP_Codigo);

                            /*contacto*/
                            formData.append('contacto[celular_contacto]', this.contacto.celular_contacto);
                            formData.append('contacto[correo_contacto]', this.contacto.correo_contacto);
                            formData.append('contacto[nombre_contacto]', this.contacto.nombre_contacto);

                            /*cotizacion */
                            formData.append('cotizacion[COTIC_Correo1]', this.cotizacion.COTIC_Correo1);
                            formData.append('cotizacion[COTIC_Correo2]', this.cotizacion.COTIC_Correo2);
                            formData.append('cotizacion[COTIC_Correo3]', this.cotizacion.COTIC_Correo3);
                            formData.append('cotizacion[COTIC_Correo4]', this.cotizacion.COTIC_Correo4);
                            formData.append('cotizacion[COTIC_Fecha_Cotizacion]', moment(new Date()).format('yyyy-MM-DD'));

                            /*equipos */
                            this.equipos.forEach((equipo, i) => {
                                formData.append(`equipos[${i}][COTIP_Codigo]`, equipo.COTIP_Codigo);
                                formData.append(`equipos[${i}][CODEC_Nombre_Equipo]`, equipo.CODEC_Nombre_Equipo);
                                formData.append(`equipos[${i}][CODEC_Descripcion_Equipo]`, equipo.CODEC_Descripcion_Equipo);
                                formData.append(`equipos[${i}][CODEC_Fabricante_Equipo]`, equipo.CODEC_Fabricante_Equipo);
                                formData.append(`equipos[${i}][CODEC_Cantidad]`, equipo.CODEC_Cantidad);
                                formData.append(`equipos[${i}][CODEC_Descripcion_Ficha_Tecnica_Equipo]`, equipo.CODEC_Descripcion_Ficha_Tecnica_Equipo);
                                formData.append(`equipos[${i}][CODEC_Url_Ficha_Tecnica_Equipo]`, equipo.CODEC_Url_Ficha_Tecnica_Equipo ?? '');
                                formData.append(`equipos[${i}][tempFile]`, equipo.archivo === undefined ? null : equipo.archivo);
                            });

                            $('#btn-registrar-cotizacion-calibracion').attr('disabled', true);
							$('#btn-registrar-cotizacion-calibracion > img').css({
								'display': 'inline-block'
							});

                            axios.post(url,
                                formData, config
                            )
                            .then(function(response) {
								Swal.fire({
									title: '"' + response.data + '"',
									icon: 'success',
									confirmButtonText: 'Aceptar',
									allowOutsideClick: false
								}).then(function() {
									location.href = '/cot_calibraciones';
								});
								$('#btn-registrar-cotizacion-calibracion > img').css({
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
								$('#btn-registrar-cotizacion-calibracion').attr('disabled', false);
								$('#btn-registrar-cotizacion-calibracion > img').css({
									'display': 'none'
								});
							});
                        }
                    });
                }
            },
            openNewEquipo() {
                $('#modal-nuevo-equipo').modal();
                this.equipo = {};
            },
            addEquipo() {
                let equipoActual = this.equipo;
                let equipos = this.equipos;
                let fileUploadedArray = $('#archivoFichaTecnica').prop('files');
                let idxEquipo = this.idxEquipo;

				if (typeof this.equipo.CODEC_Nombre_Equipo == "undefined" || this.equipo.CODEC_Nombre_Equipo.trim() == '') {
					this.$refs.CODEC_Nombre_Equipo.focus();
					this.mostrarMensajeInformacion('¡Debe ingresar el nombre del equipo!', 'warning');
                    return false;
				} else if (typeof this.equipo.CODEC_Descripcion_Equipo == "undefined" || this.equipo.CODEC_Descripcion_Equipo.trim() == '') {
					this.$refs.CODEC_Descripcion_Equipo.focus();
					this.mostrarMensajeInformacion('¡Debe ingresar la descripción del equipo!', 'warning');
				    return false;
                } else if (typeof this.equipo.CODEC_Cantidad == "undefined" || this.equipo.CODEC_Cantidad.trim() == '') {
					this.$refs.CODEC_Cantidad.focus();
					this.mostrarMensajeInformacion('¡Debe ingresar la cantidad de equipos!', 'warning');
                    return false;
				} else if (typeof this.equipo.CODEC_Fabricante_Equipo == "undefined" || this.equipo.CODEC_Fabricante_Equipo.trim() == '') {
					this.$refs.CODEC_Fabricante_Equipo.focus();
					this.mostrarMensajeInformacion('¡Debe ingresar el fabricante del equipo!', 'warning');
                    return false;
                } else if ((typeof this.equipo.CODEC_Descripcion_Ficha_Tecnica_Equipo == "undefined" || this.equipo.CODEC_Descripcion_Ficha_Tecnica_Equipo.trim() == '')
                    // (typeof fileUploadedArray === 'undefined' && fileUploadedArray.length == 0 )
                ) {
					this.$refs.CODEC_Descripcion_Ficha_Tecnica_Equipo.focus();
					this.mostrarMensajeInformacion('¡Debe ingresar la descripción de la ficha técnica del equipo!', 'warning');
                    return false;
				} else if (typeof this.equipo.CODEC_Url_Ficha_Tecnica_Equipo == "undefined" || this.equipo.CODEC_Url_Ficha_Tecnica_Equipo.trim() == '') {
					this.$refs.CODEC_Url_Ficha_Tecnica_Equipo.focus();
					this.mostrarMensajeInformacion('¡Debe ingresar la url de la ficha técnica del equipo!', 'warning');
                    return false;
                } else {
                    let filaEquipo = {
                            CODEP_Codigo: equipoActual.CODEP_Codigo,
                            CODEC_Nombre_Equipo: equipoActual.CODEC_Nombre_Equipo,
                            CODEC_Descripcion_Equipo: equipoActual.CODEC_Descripcion_Equipo,
                            CODEC_Cantidad: equipoActual.CODEC_Cantidad,
                            CODEC_Fabricante_Equipo: equipoActual.CODEC_Fabricante_Equipo,
                            CODEC_Descripcion_Ficha_Tecnica_Equipo: equipoActual.CODEC_Descripcion_Ficha_Tecnica_Equipo,
                            CODEC_Url_Ficha_Tecnica_Equipo: equipoActual.CODEC_Url_Ficha_Tecnica_Equipo,
                            CODEC_Archivo_Descripcion_Equipo: '',
                            pruebas: [],
                        };
                    if(fileUploadedArray.length > 0){
                        filaEquipo.archivo = fileUploadedArray[0];
                        filaEquipo.CODEC_Archivo_Descripcion_Equipo = fileUploadedArray[0].name;

                        equipos.push(filaEquipo);

                        equipoActual = [];
                        idxEquipo = null;
                        fileUploadedArray = [];
                        $('#archivoFichaTecnica').val('');

                        $('#modal-nuevo-equipo').modal('hide');
                    }else{
                        equipos.push(filaEquipo);
                        equipoActual = [];
                        this.equipo = {};
                        idxEquipo = null;
                        $('#modal-nuevo-equipo').modal('hide');
                    }
                }
            },
            cancelAddEquipo() {
                this.equipo = {};
                $('#modal-nuevo-equipo').modal('hide');
            },
            editEquipo(index) {
                $('#modal-editar-equipo').modal();
                this.idxEquipo = index;
                this.equipo = {};
                Object.assign(this.equipo, this.equipos[index]);
                // this.equipo = JSON.parse(JSON.stringify(this.equipos[index]));
                $("#file").val('');
                $('#archivoFichaTecnica').val('');
            },
            updateEquipo() {
                let fileUploadedArray = $('#archivoFichaTecnicaUpdate').prop('files');

				if (typeof this.equipo.CODEC_Nombre_Equipo == "undefined" || this.equipo.CODEC_Nombre_Equipo.trim() == '') {
					this.$refs.CODEC_Nombre_Equipo.focus();
					this.mostrarMensajeInformacion('¡Debe ingresar el nombre del equipo!', 'warning');
                    return false;
				} else if (typeof this.equipo.CODEC_Descripcion_Equipo == "undefined" || this.equipo.CODEC_Descripcion_Equipo.trim() == '') {
					this.$refs.CODEC_Descripcion_Equipo.focus();
					this.mostrarMensajeInformacion('¡Debe ingresar la descripción del equipo!', 'warning');
                    return false;
				} else if (typeof this.equipo.CODEC_Cantidad == "undefined" || this.equipo.CODEC_Cantidad.trim() == '') {
					this.$refs.CODEC_Cantidad.focus();
					this.mostrarMensajeInformacion('¡Debe ingresar la cantidad de equipos!', 'warning');
                    return false;
				} else if (typeof this.equipo.CODEC_Fabricante_Equipo == "undefined" || this.equipo.CODEC_Fabricante_Equipo.trim() == '') {
					this.$refs.CODEC_Fabricante_Equipo.focus();
					this.mostrarMensajeInformacion('¡Debe ingresar el fabricante del equipo!', 'warning');
                    return false;
				} else if (typeof this.equipo.CODEC_Descripcion_Ficha_Tecnica_Equipo == "undefined" || this.equipo.CODEC_Descripcion_Ficha_Tecnica_Equipo.trim() == '') {
					this.$refs.CODEC_Descripcion_Ficha_Tecnica_Equipo.focus();
					this.mostrarMensajeInformacion('¡Debe ingresar la descripción de la ficha técnica del equipo!', 'warning');
                    return false;
				} else if (typeof this.equipo.CODEC_Url_Ficha_Tecnica_Equipo == "undefined" || this.equipo.CODEC_Url_Ficha_Tecnica_Equipo.trim() == '') {
					this.$refs.CODEC_Url_Ficha_Tecnica_Equipo.focus();
					this.mostrarMensajeInformacion('¡Debe ingresar la url de la ficha técnica del equipo!', 'warning');
                    return false;
                } else {
                    if(fileUploadedArray.length > 0){
                        this.equipo.archivo = fileUploadedArray[0];
                        this.equipo.CODEC_Archivo_Descripcion_Equipo = fileUploadedArray[0].name;
                        this.equipos[this.idxEquipo] = this.equipo;

                        this.equipo = {};
                        this.idxEquipo = null;
                        fileUploadedArray = [];
                        $('#archivoFichaTecnicaUpdate').val('');
                        $('#modal-editar-equipo').modal('hide');

                    }else{
                        this.equipos[this.idxEquipo] = this.equipo;
                        this.equipo = {};
                        this.idxEquipo = null;
                        $('#archivoFichaTecnicaUpdate').val('');
                        $('#modal-editar-equipo').modal('hide');
                    }
                }
            },
            cancelEditEquipo() {
                this.equipo = {};
                this.idxEquipo = null;
                $('#modal-editar-equipo').modal('hide');
            },
            deleteEquipo(index) {
                this.mostrarMensajeConfirmacion('¿Está seguro de eliminar este equipo?', 'Si, eliminar', 'No, cancelar').then((result) => {
                    if (result.isConfirmed) {
                        this.equipos.splice(index, 1);
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: '¡El equipo se eliminó correctamente!',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    }
                });
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
            },
            setSubTotal() {
                var suma = 0;
                this.equipos.forEach((equipo, index) => {
					if (isNaN(equipo.CODEC_SubTotal) || equipo.CODEC_SubTotal < 0 || equipo.CODEC_SubTotal == '')
						suma += 0;
					else
						suma += parseFloat(equipo.CODEC_SubTotal);
                });
                this.SubTotal = (suma).toFixed(2);
            },
            setIgv() {
                this.Igv = (Number(this.SubTotal) * 0.18).toFixed(2);
            },
            setTotal() {
                this.Total = (Number(this.SubTotal) + Number(this.Igv)).toFixed(2);
            },
            downloadFileEquipo() {
                this.downloadBlob(this.equipo.archivo, this.equipo.archivo.name);
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
