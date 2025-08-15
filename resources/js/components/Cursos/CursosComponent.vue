<template>
  <div class="grid-hor">
    <form ref="form" id="cursoForm" v-on:submit.prevent="guardarCurso">
      <input name="_token" type="hidden" v-model="token" />
      <div class="form-group">
        <label class="col-sm-3 col-form-label" for="nombre"
          >Nombre <span class="text-danger ml-1">*</span></label
        >
        <input
          class="form-control"
          id="nombre"
          type="text"
          name="nombre"
          ref="nombre"
          v-model="curso.nombre"
          placeholder="Ingrese el nombre del curso"
        />
      </div>
      <div class="form-group">
        <label class="col-sm-3 col-form-label" for="descripcion"
          >Descripción <span class="text-danger ml-1">*</span></label
        >
        <textarea
          class="form-control"
          id="descripcion"
          type="text"
          name="descripcion"
          ref="descripcion"
          v-model="curso.descripcion"
          placeholder="Ingrese la descripción"
        ></textarea>
      </div>
      <div class="form-group">
        <label class="col-sm-3 col-form-label" for="costo"
          >Costo <span class="text-danger ml-1">*</span></label
        >
        <input
          class="form-control"
          type="number"
          name="costo"
          ref="costo"
          v-model="curso.costo"
          placeholder="Ingrese el costo del curso"
          @focusout="curso.costo = formatearModeloADecimal(curso.costo);"
        />
      </div>
      <button
        type="submit"
        class="btn btn-info"
        id="btnAgregarCurso"
      >
        <span class="font-weight-bold">Guardar</span>
        <img :src="'/images/load.gif'" style="width: 1em" v-if="isLoading" />
      </button>
      <a class="btn btn-danger" href="/curso">Cancelar</a>
    </form>
  </div>
</template>

<script src="./CursosComponent.js">
</script>

<style>
</style>
