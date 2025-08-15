<template>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <table id="tabla_datos" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th scope="col">Codigo</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Costo</th>
                <!-- th scope="col" class="text-center">Ver</th> -->
                <th scope="col" colspan="2" class="text-center">Acciones</th>
              </tr>
            </thead>
            <tbody>
              <tr
                v-for="(curso, indice) of cursos"
                :key="curso.id_curso"
                class="text-center"
              >
                <th scope="row">{{ curso.id_curso }}</th>
                <td class="text-left">{{ curso.CURSOC_Nombre }}</td>
                <td class="text-left">{{ curso.CURSOC_Descripcion }}</td>
                <td class="text-right">{{ curso.CURSOC_Costo }}</td>
                <td>
                  <button
                    class="btn btn-info"
                    @click="btnEditar(curso.id_curso)"
                  >
                    Editar
                  </button>
                </td>
                <td>
                  <button
                    class="btn btn-danger"
                    v-on:submit.prevent="btnBorrar(indice)"
                    @click="btnBorrar(curso, indice) in cursos"
                  >
                    Eliminar
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
</template>

<script src="./IndexCursosComponent.js">
</script>

<style>
</style>
