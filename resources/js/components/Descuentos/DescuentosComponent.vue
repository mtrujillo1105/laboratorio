<template>
  <div class="grid-hor">
    <div class="form">
      <div class="row">
        <div class="form-group col-md-12">
          <label class="col-form-label"
            >Nombre del curso<span class="text-danger ml-1">*</span></label
          >
          <select
            v-model="cabeceraDescuento.id_curso"
            class="form-control"
            name="CURSOC_Nombre"
            ref="CURSOC_Nombre"
            id="CURSOC_Nombre"
            @change="obtenerDescuentos"
            :disabled="disableSelectCursos"
          >
            <option value="">Seleccionar curso</option>
            <option
              v-for="curso in cursos"
              v-bind:value="curso.id_curso"
              v-bind:key="curso.id_curso"
            >
              {{ curso.CURSOC_Nombre }}
            </option>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <button class="btn btn-info mb-2" @click="nuevoDescuento" :disabled="disableOptions || loading">
            NUEVO DESCUENTO
            <i aria-hidden="true" class="fa fa-plus"></i>
          </button>
        </div>
      </div>

      <div class="row" style="min-height: 300px">
        <div class="col-12 table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr class="text-center">
                <th>Acciones</th>
                <th>Valor inicial</th>
                <th>Valor final</th>
                <th>% Descuento</th>
              </tr>
            </thead>
            <tbody>
              <tr
                class="text-center "
                v-for="(
                  descuento, index
                ) in cabeceraDescuento.detalleDescuentos"
                :key="index"
              >
                <td>
                  <button
                    type="button"
                    @click="borrarDescuento(index)"
                    class="btn btn-outline-danger btn-sm"
                  >
                    <i class="fa fa-trash" aria-hidden="true"></i>
                  </button>
                  <input
                    type="hidden"
                    name="id_descuento"
                    v-model="descuento.id_descuento"
                  />
                </td>
                <td>
                  <input
                    type="number"
                    class="form-control-sm w-50 text-center"
                    name="cantidad_min"
                    ref="cantidad_min"
                    focus-on-create
                    v-model="descuento.cantidad_min"
                    @keypress="restringirSoloNumerosEnteros($event)"
                    @focusout="descuento.cantidad_min = formatearModeloAEntero(descuento.cantidad_min)"
                    autocomplete="off"
                  />
                </td>
                <td>
                  <input
                    type="number"
                    class="form-control-sm w-50 text-center"
                    name="cantidad_max"
                    ref="cantidad_max"
                    v-model="descuento.cantidad_max"
                    @keypress="restringirSoloNumerosEnteros($event)"
                    @focusout="descuento.cantidad_max = formatearModeloAEntero(descuento.cantidad_max)"
                    autocomplete="off"
                  />
                </td>
                <td>
                  <input
                    type="number"
                    class="form-control-sm w-50 text-center"
                    name="descuento"
                    v-model="descuento.descuento"
                    @focusout="descuento.descuento = formatearModeloADecimal(descuento.descuento)"
                    autocomplete="off"
                  />
                </td>
                <td></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="row text-left">
        <div class="col text-left">
          <button
            type="button"
            class="btn btn-info"
            id="btn-registrar-cotizacion-ensayo"
            @click="guardarDescuento()"
            :disabled="disableOptions || loading"
          >
            Guardar&nbsp;&nbsp;<i class="fa fa-save" aria-hidden="true"></i
            >&nbsp;<img
              :src="'/images/load.gif'"
              style="display: none; width: 1em"
            />
          </button>
          <button type="button" class="btn btn-danger" @click="irAListado()">
            Ir al listado&nbsp;&nbsp;<i
              class="fa fa-arrow-left"
              aria-hidden="true"
            ></i>
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script src="./DescuentosComponent.js">
</script>

<style>
</style>
