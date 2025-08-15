<template>
  <div class="grid-hor">
    <form ref="form">
      <input name="_token" type="hidden" v-model="token" />
      <div class="form-group">

        <label class="col-sm-3 col-form-label col-form-label-sm">Tipo <span class="text-danger ml-1">*</span></label>
        <select v-model="solicitante.TIPSOLIP_Codigo" class="form-control" name="TIPSOLIP_Codigo" ref="TIPSOLIP_Codigo" id="TIPSOLIP_Codigo" >
            <option value="">Seleccione un tipo </option>
            <option v-for="tipoSolicitante in tiposSolicitante" v-bind:value="tipoSolicitante.TIPSOLIP_Codigo" v-bind:key="tipoSolicitante.TIPSOLIP_Codigo">{{ tipoSolicitante.TIPSOLIC_Descripcion }}</option>
        </select>
      </div>
      <div class="form-group">
            <label class="col-form-label" for="SOLIC_Nombre">Nombre<span class="text-danger ml-1">*</span></label>
            <input class="form-control" type="text" name="SOLIC_Nombre" ref="SOLIC_Nombre" v-model="solicitante.SOLIC_Nombre" maxlength="100" />
      </div>
      <div class="form-group">
            <label class="col-form-label">RUC<span class="text-danger ml-1">*</span></label>
                                <input class="form-control" type="text" name="SOLIC_Ruc" ref="SOLIC_Ruc" v-model="solicitante.SOLIC_Ruc" maxlength="11" @keypress="restringirSoloNumerosEnteros($event)" />
      </div>
      <div class="form-group">
            <label class="col-form-label" for="SOLIC_Email">Email<span class="text-danger ml-1">*</span></label>
            <input class="form-control" type="email" name="SOLIC_Email" ref="SOLIC_Email" v-model="solicitante.SOLIC_Email" maxlength="255" />
      </div>
      <div class="form-group">
            <label class="col-form-label" for="SOLIC_Direccion">Dirección<span class="text-danger ml-1">*</span></label>
            <input class="form-control" type="text" name="SOLIC_Direccion" ref="SOLIC_Direccion" v-model="solicitante.SOLIC_Direccion" maxlength="255" />
      </div>
        <div class="form-group">
            <label class="col-form-label" for="SOLIC_Telefono">Teléfono<span class="text-danger ml-1">*</span></label>
            <input class="form-control" type="text" name="SOLIC_Telefono" ref="SOLIC_Telefono" v-model="solicitante.SOLIC_Telefono" maxlength="100" @keypress="restringirSoloNumerosEnteros($event)" />
        </div>
        <div class="form-group">
            <label class="col-form-label">Nombre del Departamento<span class="text-danger ml-1">*</span></label>
            <select v-model="ubigeo.UBIGC_CodDpto" class="form-control" id="UBIGC_CodDpto" name="UBIGC_CodDpto" ref="UBIGC_CodDpto" @change="listarProvincias()">
                <option value="">Seleccione un Departamento</option>
                <option v-for="departamento in departamentos" v-bind:value="departamento.UBIGC_CodDpto" v-bind:key="departamento.UBIGC_CodDpto" >{{ departamento.UBIGC_Descripcion }}</option>
            </select>
        </div>
        <div class="form-group">
            <label class="col-form-label" for="">Nombre de la Provincia<span class="text-danger ml-1">*</span></label>
            <select v-model="ubigeo.UBIGC_CodProv" class="form-control" id="UBIGC_CodProv" name="UBIGC_CodProv" ref="UBIGC_CodProv" @change="listarDistritos()">
                <option value="">Seleccione una Provincia</option>
                <option v-for="provincia in provincias" v-bind:value="provincia.UBIGC_CodProv" v-bind:key="provincia.UBIGC_CodProv" >{{ provincia.UBIGC_Descripcion }}</option>
            </select>
        </div>
        <div class="form-group">
            <label class="col-form-label" for="">Nombre del Distrito<span class="text-danger ml-1">*</span></label>
            <select v-model="ubigeo.UBIGC_CodDist" class="form-control" id="UBIGC_CodDist" name="UBIGC_CodDist" ref="UBIGC_CodDist">
                <option value="">Seleccione un Distrito</option>
                <option v-for="distrito in distritos" v-bind:value="distrito.UBIGC_CodDist" v-bind:key="distrito.UBIGC_CodDist" >{{ distrito.UBIGC_Descripcion }}</option>
            </select>
        </div>
        <button type="button" class="btn btn-info" id="btn-registrar-cotizacion-ensayo" @click="addSolicitante()">
            <span class="font-weight-bold">Agregar</span>&nbsp;&nbsp;
            <img :src="'/images/load.gif'" style="width: 1em;" v-if="isLoading"/>
        </button>
        <!-- <a class="btn btn-info" v-on:click="submit">Agregar</a> -->
        <a class="btn btn-danger" href="/solicitante">Cancelar</a>
    </form>


  </div>
</template>
<script>
export default {
    data() {
        return{
            solicitante: {},
            tiposSolicitante: [],
            ubigeo: {},

            departamentos: [],
            provincias: [],
            distritos: [],

            isDisabled: true,
            isLoading: false
        }
    },
    props: {
        token: String,
    },
    created() {
        this.listarTiposSolicitante();
        this.listarDepartamentos();
    },
    methods:{
        addSolicitante(){
            let url = "/solicitante/store";
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
            }else{
                this.isLoading = true;
                this.solicitante.UBIGP_Codigo = this.ubigeo.UBIGC_CodDpto + this.ubigeo.UBIGC_CodProv + this.ubigeo.UBIGC_CodDist;
                this.mostrarMensajeConfirmacion('¿Desea continuar con el registro?', 'Si', 'No')
                    .then((result) => {
                    if(result.isConfirmed){
                        axios.post(url, {
							solicitante: this.solicitante
                        }).then((response) => {
                            Swal.fire({
                                title: '"' + response.data + '"',
                                icon: 'success',
                                confirmButtonText: 'Aceptar',
                                allowOutsideClick: false
                            }).then(() => {
                                this.isLoading = false;
                                location.href = '/solicitante';
                            }).catch((error) => {
                                this.isLoading = false;
                                Swal.fire({
									position: 'top-end',
									icon: 'error',
									title: error,
									showConfirmButton: false,
									timer: 3000
                                });

							});

                        });
                    }
                });
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
        },
        restringirSoloNumerosEnteros(e) {
            let regex = new RegExp('^[0-9]+$');
            let key = String.fromCharCode(!e.charCode ? e.which : e.charCode);
            if (!regex.test(key)) {
                e.preventDefault();
                return false;
            }
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
    }
};
</script>
