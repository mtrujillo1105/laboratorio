<template>
  <div>
    <form>
      <div class="card pl-3 pr-3 pt-2">
        <div class="form-row">
          <div class="col-md-3 form-group">
            <label for="codigoParametro">Código</label>
            <select
              class="form-control"
              name="codigoParametro"
              id="codigoParametro"
              ref="codigoParametro"
              v-model="busqueda.codigoParametro"
            >
              <option value="">Seleccionar</option>
              <option
                v-for="param in parametros"
                v-bind:value="param.id_parametro"
                v-bind:key="param.id_parametro"
              >
                {{ param.nombre }}
              </option>
            </select>
          </div>
          <div class="col-md-3 form-group">
            <label for="descripcionParametro">Descripción</label>
            <input
              type="text"
              v-model="busqueda.descripcionParametro"
              class="col-sm form-control"
              maxlength="11"
              autocomplete="off"
              name="descripcionParametro"
              ref="descripcionParametro"
            />
          </div>
          <div class="col-md-3 form-group">
            <br />
            <button
              type="button"
              class="btn btn-success"
              @click="obtenerListaParametroValor()"
            >
              Buscar
            </button>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <div class="d-flex bd-highlight">
            <div class="p-2 flex-grow-1 bd-highlight">
              <h5>Resultados de la busqueda</h5>
            </div>
            <div class="p-2 bd-highlight">
              <button
                type="button"
                class="btn btn-success"
                @click="abrirModalParametroNuevo()"
              >
                Nuevo
              </button>
            </div>
          </div>
        </div>
      </div>
    </form>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <table id="tabla_datos" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th scope="col">Código</th>
                  <th scope="col" width="15%">Nombre completo</th>
                  <th scope="col" width="25%">Valor</th>
                  <th scope="col" width="15%">Parametro</th>
                  <th scope="col" width="5%">Activo</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                <tr
                  v-for="(parametro, indice) of parametroValores"
                  :key="parametro.id_parametro_valor"
                  class="text-center"
                >
                  <td class="text-left">{{ parametro.id_parametro_valor }}</td>
                  <td class="text-left">{{ parametro.nombre }}</td>
                  <td class="text-left">{{ parametro.valor }}</td>
                  <td class="text-left">{{ parametro.nombre_parametro }}</td>
                  <td>{{ parametro.activo ? "Si" : "No" }}</td>
                  <td>
                    <button
                      class="btn btn-info"
                      @click="abrirModalActualizarParametro(indice)"
                    >
                      Editar
                    </button>
                    <button
                      class="btn btn-danger"
                      @click="eliminar(parametro.id_parametro_valor)"
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
    </div>

    <!--modal-->
    <div
      class="modal fade"
      id="modal-parametro-valor"
      tabindex="-1"
      role="dialog"
      aria-labelledby="modal-ficha-tecnica-label"
      aria-hidden="true"
      data-keyboard="false"
      data-backdrop="static"
    >
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modal-ficha-tecnica-label">
              Registro de configuración del sistema

            </h5>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="card">
                <div class="card-header">INFORMACIÓN BASICA</div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-4 form-group">
                      <label for="codigoParametroValor">Código</label>
                      <input
                        type="text"
                        class="form-control"
                        name="codigoParametroValor"
                        id="codigoParametroValor"
                        ref="codigoParametroValor"
                        :disabled="tipoCrud === 1"
                        v-model="parametroNuevo.id_parametro_valor"
                      />
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 form-group">
                      <label for="codigoParametroRegistro">Parametro</label>
                      <select
                        class="form-control"
                        name="codigoParametroRegistro"
                        id="codigoParametroRegistro"
                        ref="codigoParametroRegistro"
                        v-model="parametroNuevo.id_parametro"
                      >
                        <option value="">Seleccionar</option>
                        <option
                          v-for="param in parametros"
                          v-bind:value="param.id_parametro"
                          v-bind:key="param.id_parametro"
                        >
                          {{ param.nombre }}
                        </option>
                      </select>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 form-group">
                      <label for="activo">Activo</label>
                      <select
                        class="form-control"
                        name="activo"
                        id="activo"
                        ref="activo"
                        v-model="parametroNuevo.activo"
                      >
                        <option value="">Seleccionar</option>
                        <option
                          v-for="item in listaActivo"
                          v-bind:value="item.id"
                          v-bind:key="item.id"
                        >
                          {{ item.valor }}
                        </option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 form-group">
                      <label for="valorParametro">Valor</label>
                      <input
                        type="text"
                        class="form-control"
                        name="valorParametro"
                        id="valorParametro"
                        ref="valorParametro"
                        maxlength="500"
                        v-model="parametroNuevo.valor"
                      />
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 form-group">
                      <label for="nombreParametro">Descripción Completo</label>
                      <input
                        type="text"
                        class="form-control"
                        name="nombreParametro"
                        id="nombreParametro"
                        ref="nombreParametro"
                        v-model="parametroNuevo.nombre"
                      />
                    </div>
                  </div>
                </div>
              </div>

              <div class="card">
                <div class="card-header">INFORMACIÓN ADICIONAL</div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-4 form-group">
                      <label for="valorAdicional1">Valor Adicional 1</label>
                      <input
                        type="text"
                        class="form-control"
                        name="valorAdicional1"
                        id="valorAdicional1"
                        ref="valorAdicional1"
                        maxlength="500"
                        v-model="parametroNuevo.valor_adicional_1"
                      />
                    </div>
                    <div class="col-md-4 form-group">
                      <label for="valorAdicional2">Valor Adicional 2</label>
                      <input
                        type="text"
                        class="form-control"
                        name="valorAdicional2"
                        ref="valorAdicional2"
                        id="valorAdicional2"
                        maxlength="200"
                        v-model="parametroNuevo.valor_adicional_2"
                      />
                    </div>
                    <div class="col-md-4 form-group">
                      <label for="valorAdicional3">Valor Adicional 3</label>
                      <input
                        type="text"
                        class="form-control"
                        name="valorAdicional3"
                        ref="valorAdicional3"
                        id="valorAdicional3"
                        maxlength="200"
                        v-model="parametroNuevo.valor_adicional_3"
                      />
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" @click="ok()">
              Aceptar&nbsp;&nbsp;<i class="fa fa-check" aria-hidden="true"></i>
            </button>
            <button type="button" class="btn btn-danger" @click="cancel()">
              Cancelar&nbsp;&nbsp;<i class="fa fa-ban" aria-hidden="true"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script src="./IndexParametroComponent.js">
</script>

<style>
</style>
