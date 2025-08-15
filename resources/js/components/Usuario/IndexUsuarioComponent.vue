<template>
  <div class="card-body">
    <table id="example2" class="table table-bordered table-hover">
      <thead>
        <tr class="text-center">
          <th scope="col">Codigo</th>
          <th scope="col">Nombre</th>
          <th scope="col">Email</th>
          <th scope="col">Rol</th>
          <th scope="col">Estado</th>
          <th scope="col" colspan="2" class="text-center">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="(usuario, indice) of usuarios"
          :key="usuario.id"
          class="text-center"
        >
          <th scope="row">{{ usuario.id }}</th>
          <td>{{ usuario.name }}</td>
          <td>{{ usuario.email }}</td>
          <td>{{ usuario.ROL_Descripcion }}</td>
          <td>
              <i class="fas fa-check-circle text-success" v-if="usuario.flag_activo"></i>
              <i class="fas fa-times-circle text-danger" v-else-if="!usuario.flag_activo"></i>
          </td>
          <td>
              <button class="btn btn-info" v-if="usuario.flag_activo" @click="btnEditar(usuario.id)">Editar</button>
          </td>
          <td>
            <button
              class="btn btn-danger"
              v-on:submit.prevent="btnBorrar(indice)" v-if="usuario.flag_activo"
              @click="btnBorrar(usuario, indice) in usuarios"
            >
              Eliminar
            </button>
            <button
              class="btn btn-success"
              v-on:submit.prevent="btnBorrar(indice)" v-if="!usuario.flag_activo"
              @click="btnBorrar(usuario, indice) in usuarios"
            >
              Activar
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script src="./IndexUsuarioComponent.js" ></script>

<style>
</style>
