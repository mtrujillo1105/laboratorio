<template>
  <div class="row">
    <v-style>
      .smooth-enter-to, .smooth-leave { height: {{ computedHeight }}; }
    </v-style>

    <div class="col-12">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr class="text-center">
                <th scope="col">Codigo</th>
                <th scope="col">Solicitante</th>
                <th scope="col">Usuario</th>
                <th scope="col">Fecha</th>
                <th scope="col">Total S/.</th>
                <th scope="col">Seguimiento</th>
                <th scope="col" colspan="2">Acciones</th>
              </tr>
            </thead>
            <tbody>
              <tr
                v-for="(cotizacion, indice) of cotizaciones"
                :key="cotizacion.COTIP_Codigo"
                class="text-center"
              >
                <td>{{ cotizacion.COTIP_Codigo }}</td>
                <td>{{ cotizacion.SOLIC_Nombre }}</td>
                <td>{{ cotizacion.name }}</td>
                <td>{{ cotizacion.COTIC_Fecha_Cotizacion }}</td>
                <td class="text-right">{{ cotizacion.COTIC_Total }}</td>
                <td>
                  <button
                    class="btn btn-success"
                    @click="mostrarModalSeguimiento(cotizacion.COTIP_Codigo)"
                  >
                    Ver Seguimiento
                  </button>
                </td>
                <td>
                  <button
                    class="btn btn-info"
                    @click="btnEditar(cotizacion.COTIP_Codigo)"
                  >
                    Editar
                  </button>
                </td>
                <td>
                  <button
                    class="btn btn-danger"
                    v-on:submit.prevent="btnBorrar(indice)"
                    @click="btnBorrar(cotizacion, indice) in cotizaciones"
                  >
                    Eliminar
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div
      class="modal fade"
      id="modal-seguimiento"
      tabindex="-1"
      role="dialog"
      aria-labelledby="myModalLabel"
      aria-hidden="true"
      data-keyboard="false"
      data-backdrop="static"
    >
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">
              Seguimiento de cotización {{ this.idCotizacion }}
            </h5>
          </div>
          <div class="modal-body">
            <div
              class="alert alert-warning"
              role="alert"
              v-if="!seguimientos.length"
            >
              No se encontraron seguimientos para la cotización
              {{ this.idCotizacion }}.
            </div>
            <div
              v-else
              class="card"
              v-for="(seguimiento, index) in seguimientos"
              :key="seguimiento.index"
            >
              <div class="card-header">
                <h5 class="mb-0 row">
                  <div class="col-9 d-flex">
                    <div class="p2 text-uppercase">
                      {{ seguimiento.titulo }}
                    </div>
                    <div class="ml-auto p2">
                      {{ seguimiento.fecha_seguimiento }}
                    </div>
                  </div>
                  <div class="col-auto">
                    <button class="btn" v-on:click="toogleCollapse(index)">
                      <i class="fas fa-edit"></i>
                    </button>
                    <button
                      class="btn btn-danger"
                      @click="eliminarSeguimiento(seguimiento.id_seguimiento)"
                    >
                      Eliminar
                    </button>
                  </div>
                </h5>
              </div>
              <transition name="smooth">
                <div class="card-body" v-show="seguimiento.show">
                  <div class="form-group">
                    <div class="row">
                      <div class="col-6">
                        <label for="titulo">Titulo</label>
                        <input
                          type="text"
                          class="form-control"
                          id="titulo"
                          maxlength="50"
                          v-model="seguimientoEdit.titulo"
                        />
                      </div>
                      <div class="col-6">
                        <label for="fechaSeguimiento">Fecha Seguimiento</label>
                        <input
                          type="date"
                          class="form-control"
                          id="fechaSeguimiento"
                          v-model="seguimientoEdit.fecha_seguimiento"
                          autocomplete="off"
                          name="fecha"
                          ref="fecha"
                        />
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <textarea
                      class="form-control"
                      rows="5"
                      placeholder="Mensaje"
                      maxlength="1000"
                      v-model="seguimientoEdit.mensaje"
                    ></textarea>
                  </div>
                  <div class="form-group text-right">
                    <button
                      type="button"
                      class="btn btn-success"
                      @click="actualizarSeguimiento(seguimientoEdit)"
                    >
                      Grabar
                    </button>
                    <button
                      type="button"
                      class="btn btn-danger"
                      @click="cancelarActualizarSeguimiento(index)"
                    >
                      Cancelar
                    </button>
                  </div>
                </div>
              </transition>
            </div>

            <div class="card" v-if="seguimientoNuevoFlag">
              <div class="card-header">Nuevo Seguimiento</div>
              <div class="card-body">
                <div class="form-group">
                  <div class="row">
                    <div class="col-6">
                      <label for="titulo">Titulo</label>
                      <input
                        type="text"
                        class="form-control"
                        id="titulo"
                        maxlength="50"
                        v-model="seguimientoObject.titulo"
                      />
                    </div>
                    <div class="col-6">
                      <label for="fechaSeguimiento">Fecha Seguimiento</label>
                      <input
                        type="date"
                        class="form-control"
                        id="fechaSeguimiento"
                        v-model="seguimientoObject.fecha_seguimiento"
                        autocomplete="off"
                        name="fecha"
                        ref="fecha"
                      />
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <textarea
                    class="form-control"
                    rows="5"
                    placeholder="Mensaje"
                    maxlength="1000"
                    v-model="seguimientoObject.mensaje"
                  ></textarea>
                </div>
                <div class="form-group text-right">
                  <button
                    type="button"
                    class="btn btn-success"
                    @click="grabarNuevoSeguimiento()"
                  >
                    Grabar
                  </button>
                  <button
                    type="button"
                    class="btn btn-danger"
                    @click="cancelarNuevoSeguimiento()"
                  >
                    Cancelar
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer" style="display: block">
            <div class="row">
              <div class="col-6 text-left">
                <button
                  type="button"
                  class="btn btn-info"
                  @click="agregarSeguimiento()"
                  :disabled="seguimientoNuevoFlag"
                >
                  Seguimiento&nbsp;&nbsp;<i
                    class="fa fa-plus"
                    aria-hidden="true"
                  ></i>
                </button>
              </div>
              <div class="col-6 text-right">
                <button
                  type="button"
                  class="btn btn-danger btn-sm"
                  @click="cerrarModalSeguimiento()"
                >
                  Cerrar&nbsp;&nbsp;<i class="fa fa-ban" aria-hidden="true"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    token: String,
    user: Object,
  },
  data() {
    return {
      cotizaciones: [],
      saveData: null,

      idCotizacion: null,
      seguimientos: [],
      seguimientoEdit: [],
      computedHeight: "auto",
      seguimientoObject: {},
      seguimientoNuevoFlag: false,
    };
  },
  created() {
    this.listar();
  },
  mounted() {
    console.log("Component mounted.");
  },
  methods: {
    /*Seguimiento*/
    eliminarSeguimiento(id) {
      const url = `/seguimiento/delete/${id}`;
      try {
        this.mostrarMensajeConfirmacion(
          "¿Está seguro de eliminar este seguimiento?",
          "Si, eliminar",
          "No, cancelar"
        ).then((result) => {
          if (result.isConfirmed) {
            axios.delete(url).then((response) => {
              this.mostrarMensajeInformacion(
                "¡El seguimiento se eliminó correctamente!",
                "success"
              );
              this.listarSeguimiento(this.idCotizacion);
            });
          }
        });
      } catch (error) {}
    },
    validarSeguimiento(seguimiento) {
      if (
        typeof seguimiento.titulo === "undefined" ||
        seguimiento.titulo.trim() == ""
      ) {
        this.mostrarMensajeInformacion(
          "¡Debe ingresar un titulo para el seguimiento!",
          "warning"
        );
        return false;
      } else if (
        typeof seguimiento.mensaje === "undefined" ||
        seguimiento.mensaje.trim() == ""
      ) {
        this.mostrarMensajeInformacion(
          "¡Debe ingresar un mensaje para el seguimiento!",
          "warning"
        );
        return false;
      } else if (
        typeof seguimiento.fecha_seguimiento === "undefined" ||
        seguimiento.fecha_seguimiento === null ||
        seguimiento.fecha_seguimiento.trim() == ""
      ) {
        this.mostrarMensajeInformacion(
          "¡Debe ingresar una fecha para el seguimiento!",
          "warning"
        );
        return false;
      }
      return true;
    },
    mostrarMensajeInformacion(titulo, icono) {
      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: "btn btn-primary",
        },
        buttonsStyling: false,
      });
      swalWithBootstrapButtons.fire({
        title: titulo,
        icon: icono,
        confirmButtonText: "Aceptar",
        allowOutsideClick: false,
      });
    },
    mostrarMensajeConfirmacion(titulo, textoConfirma, textoCancela) {
      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: "btn btn-primary margin-button-confirm-swal",
          cancelButton: "btn btn-danger margin-button-confirm-swal",
        },
        buttonsStyling: false,
      });
      return swalWithBootstrapButtons.fire({
        title: titulo,
        text: "",
        icon: "question",
        showCancelButton: true,
        confirmButtonText: textoConfirma,
        cancelButtonText: textoCancela,
        reverseButtons: false,
        allowOutsideClick: false,
      });
    },

    actualizarSeguimiento: async function (seguimiento) {
      const url = `/seguimiento/update`;
      this.seguimientoObject = {
        id_seguimiento: seguimiento.id_seguimiento,
        titulo: seguimiento.titulo,
        mensaje: seguimiento.mensaje,
        fecha_seguimiento: seguimiento.fecha_seguimiento,
        usuario_modificacion: this.user.id,
        fecha_modificacion: moment(new Date()).format("yyyy-MM-DD"),
      };
      try {
        if (this.validarSeguimiento(this.seguimientoObject)) {
          let response = await axios.post(url, this.seguimientoObject);
          await this.listarSeguimiento(this.idCotizacion);
          seguimiento.show = false;
        }
      } catch (error) {}
    },
    cancelarActualizarSeguimiento(index) {
      this.seguimientoObject = {};
      this.seguimientos[index].show = false;
    },
    cancelarNuevoSeguimiento() {
      this.seguimientoObject = {};
      this.seguimientoNuevoFlag = false;
    },
    agregarSeguimiento() {
      this.seguimientoNuevoFlag = true;
      this.seguimientos.forEach((e) => (e.show = false));

      this.seguimientoObject = {
        titulo: "",
        mensaje: "",
        usuario: this.user.id,
        fecha_seguimiento: moment(new Date()).format("yyyy-MM-DD"),
      };
    },
    toogleCollapse(index) {
      this.seguimientoEdit = {};
      Object.assign(this.seguimientoEdit, this.seguimientos[index]);

      this.seguimientos[index].show = !this.seguimientos[index].show;
      this.seguimientoNuevoFlag = false;
      this.seguimientos.forEach((e, i) => {
        if (i !== index) {
          e.show = false;
        }
      });
    },
    cerrarModalSeguimiento() {
      this.seguimientoObject = {};
      this.seguimientoEdit = {};
      this.seguimientoNuevoFlag = false;
      $("#modal-seguimiento").modal("hide");
    },
    listarSeguimiento: async function (idCotizacion) {
      const url = `/seguimiento/list/${idCotizacion}`;
      let response = await axios.get(url);

      $.each(response.data, (key, value) => {
        // const fechaRegistro =
        //   value.fecha_registro != null
        //     ? value.fecha_registro.split(" ")[0]
        //     : value.fecha_registro;
        // this.$set(value, "fecha_registro", fechaRegistro);
        this.$set(value, "show", false);
      });
      this.seguimientos = response.data;
    },
    mostrarModalSeguimiento: async function (idCotizacion) {
      this.idCotizacion = idCotizacion;
      await this.listarSeguimiento(this.idCotizacion);

      $("#modal-seguimiento").modal();
    },
    grabarNuevoSeguimiento: async function () {
      const url = `/seguimiento/store`;
      const data = {
        id_cotizacion: this.idCotizacion,
        titulo: this.seguimientoObject.titulo,
        mensaje: this.seguimientoObject.mensaje,
        usuario_registro: this.seguimientoObject.usuario,
        fecha_seguimiento: this.seguimientoObject.fecha_seguimiento,
      };
      try {
        if (this.validarSeguimiento(this.seguimientoObject)) {
          let response = await axios.post(url, data);
          await this.listarSeguimiento(this.idCotizacion);
          this.cancelarNuevoSeguimiento();
        }
      } catch (error) {}
    },
    /*Final Seguimiento */
    listar() {
      var url = "/calibracion/list";
      axios.get(url).then((response) => {
        let data = response.data;
        $.each(data, (key, value) => {
          var fechaCotizacionFormateada =
            value.COTIC_Fecha_Cotizacion != null
              ? value.COTIC_Fecha_Cotizacion.split(" ")[0]
              : value.COTIC_Fecha_Cotizacion;
          this.$set(value, "COTIC_Fecha_Cotizacion", fechaCotizacionFormateada);
        });
        this.cotizaciones = data;
      });
    },
    btnBorrar(cotizacion, indice) {
      let _this = this;
      let url = "/cotizacion/delete/" + cotizacion.COTIP_Codigo;
      axios
        .delete(url)
        .then(function (response) {
          if (
            response.data.status !== undefined &&
            response.data.status === "ERROR"
          ) {
            Swal.fire({
              title: "",
              text: '"' + response.data.message + '"',
              icon: "error",
              confirmButtonText: "Aceptar",
              allowOutsideClick: false,
            });
            return;
          }
          Swal.fire({
            title: "",
            text: '"' + response.data.message + '"',
            icon: "success",
            confirmButtonText: "Aceptar",
            allowOutsideClick: false,
          });

          _this.listar();
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    btnEditar(id) {
      location.href = "/calibracion/" + id + "/edit";
    },
    btnNuevo() {
      location.href = "/calibracion/create";
    },
  },
};
</script>
