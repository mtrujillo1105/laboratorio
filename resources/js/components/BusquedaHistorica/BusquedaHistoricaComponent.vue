<template>
  <div>
    <div class="card pl-3 pr-3 pt-2">
      <form ref="form" id="cursoForm" v-on:submit.prevent="obtenerCotizaciones">
        <div class="form-row">
          <div class="col-md-2 form-group">
            <label for="tipoBusqueda">Tipo busqueda</label>
            <select
              class="form-control"
              name="tipoBusqueda"
              id="tipoBusqueda"
              ref="tipoBusqueda"
              @change="onChange($event)"
              v-model="busqueda.tipoBusqueda"
            >
              <option value="">Seleccionar</option>
              <option
                v-for="tipo in tiposBusqueda"
                v-bind:value="tipo.id"
                v-bind:key="tipo.id"
              >
                {{ tipo.valor }}
              </option>
            </select>
          </div>
          <div class="col-md-2 form-group" v-if="busqueda.tipoBusqueda != ''">
            <label for="nombreSolicitante">Nombre del solicitante</label>
            <input
              type="text"
              v-model="busqueda.nombreSolicitante"
              class="col-sm form-control"
              maxlength="11"
              autocomplete="off"
              name="nombreSolicitante"
              ref="nombreSolicitante"
            />
          </div>
          <div class="col-md-2 form-group" v-if="busqueda.tipoBusqueda != ''">
            <label for="nombreEquipo">Nombre del equipo</label>
            <input
              type="text"
              v-model="busqueda.nombreEquipo"
              class="col-sm form-control"
              maxlength="11"
              autocomplete="off"
              name="nombreEquipo"
              ref="nombreEquipo"
            />
          </div>
          <div class="col-md-2 form-group" v-if="busqueda.tipoBusqueda == 1">
            <label for="nombreEnsayo">Nombre de ensayo</label>
            <input
              type="text"
              v-model="busqueda.nombreEnsayo"
              class="col-sm form-control"
              maxlength="11"
              autocomplete="off"
              name="nombreEnsayo"
              ref="nombreEnsayo"
            />
          </div>
          <div class="col-md-1 form-group" v-if="busqueda.tipoBusqueda != ''">
            <br />

            <button type="submit" class="btn btn-success" :disabled="loading">
              Buscar&nbsp;&nbsp;<img :src="'/images/load.gif'" style="width: 1em;" v-if="loading" />
            </button>
          </div>
        </div>
      </form>
    </div>
    <div class="row">
      <div class="col-12">
        <div
          class="alert alert-warning"
          role="alert"
          v-if="busqueda.tipoBusqueda == ''"
        >
          Seleccionar un tipo de busqueda
        </div>
        <div
          class="alert alert-warning"
          role="alert"
          v-else-if="!cotizaciones.length"
        >
          No se encontraron datos para la busqueda.
        </div>
        <div class="card" v-else>
          <div class="card-body">
            <table id="tabla_datos" class="table table-bordered table-hover">
              <thead>
                <tr></tr>
                <tr>
                  <th scope="col" width="20%">Solicitante</th>
                  <th scope="col" width="20%">Equipo</th>
                  <th scope="col" width="20%" v-if="busqueda.tipoBusqueda == 1">Prueba</th>
                  <th scope="col" width="10%">Costo</th>
                  <th scope="col" width="10%">Cotización</th>
                </tr>
              </thead>
              <tbody>
                <tr
                  v-for="(cotizacion, indice) of cotizaciones"
                  :key="cotizacion.id_curso"
                  class="text-center"
                >
                  <td scope="row">{{ cotizacion.nombreSolicitante }}</th>
                  <td class="text-left">{{ cotizacion.nombreEquipo }}</td>
                  <td class="text-left" v-if="busqueda.tipoBusqueda == 1">{{ cotizacion.nombrePrueba }}</td>
                  <td class="text-right">{{ cotizacion.total }}</td>
                  <td>
                    <button
                      class="btn btn-info"
                      @click="verCotizacion(cotizacion.codigoCotizacion)"
                      :disabled="vistaPreviaLoading"
                    >
                        Ver Cotización&nbsp;&nbsp;<img :src="'/images/load.gif'" style="width: 1em;" v-if="vistaPreviaLoading" />
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <window-portal v-model="openWindow" v-on:close-window="CloseWindow">
      <vista-preliminar
        :solicitante="solicitante"
        :contacto="contacto"
        :cotizacion="cotizacion"
        :equipos="equipos"
        :tipo="tipo"
        :esBusquedaHistorica="esBusquedaHistorica"
      />
    </window-portal>
  </div>
</template>

<script src="./BusquedaHistoricaComponent.js">
</script>

<style>
</style>
