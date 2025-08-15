<template>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th scope="col" style="width: 5%">Código</th>
                <th scope="col" style="width: 60%">Nombre del Curso</th>
                <th scope="col" style="width: 5%">Cantidad Descuentos</th>
                <th scope="col" style="width: 15%" colspan="2" class="text-center">Acciones</th>
              </tr>
            </thead>
            <tbody>
              <tr
                v-for="(descuento, indice) of descuentos"
                :key="descuento.id_curso"
                class="text-center"
              >
                <th class="text-center" scope="row">
                  {{ descuento.id_curso }}
                </th>
                <td class="text-left">{{ descuento.CURSOC_Nombre }}</td>
                <td class="text-right">{{ descuento.cantidad_descuentos }}</td>
                <td>
                  <button
                    class="btn btn-info"
                    @click="btnEditar(descuento.id_curso)"
                  >
                    Editar
                  </button>
                </td>
                <td>
                  <button
                    class="btn btn-danger"
                    v-on:submit.prevent="btnBorrar(indice)"
                    @click="btnBorrar(descuento, indice) in descuentos"
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
</template>

<script src="./IndexDescuentosComponent.js">
</script>

<style>
</style>
