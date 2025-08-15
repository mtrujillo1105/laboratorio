<template>
  <div class="container-fluid pt-4">
    <div class="row">
      <div
        class="col-12 col-sm-6 col-md-3 dashboard-item"
        @click="irListado('/cotizacion')"
      >
        <div class="info-box">
          <span class="info-box-icon bg-info elevation-1"
            ><i class="fas fa-cog"></i
          ></span>

          <div class="info-box-content">
            <span class="info-box-text">Ensayos</span>
            <span class="info-box-number">
              {{ dashboard.ensayos }}
              <small></small>
            </span>
          </div>
        </div>
      </div>
      <div
        class="col-12 col-sm-6 col-md-3 dashboard-item"
        @click="irListado('/calibracion')"
      >
        <div class="info-box mb-3">
          <span class="info-box-icon bg-danger elevation-1"
            ><i class="fas fa-thumbs-up"></i
          ></span>

          <div class="info-box-content">
            <span class="info-box-text">Calibraciones</span>
            <span class="info-box-number">
              {{ dashboard.calibraciones }}
            </span>
          </div>
        </div>
      </div>
      <div
        class="col-12 col-sm-6 col-md-3 dashboard-item"
        @click="irListado('/capacitacion')"
      >
        <div class="info-box mb-3">
          <span class="info-box-icon bg-success elevation-1"
            ><i class="fas fa-shopping-cart"></i
          ></span>

          <div class="info-box-content">
            <span class="info-box-text">Capacitaciones</span>
            <span class="info-box-number">
              {{ dashboard.capacitaciones }}
            </span>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-warning elevation-1"
            ><i class="fas fa-users"></i
          ></span>
          <div class="info-box-content">
            <span class="info-box-text">Asesorias</span>
            <span class="info-box-number">
              {{ dashboard.asesorias }}
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      dashboard: {
        ensayos: 0,
        calibraciones: 0,
        capacitaciones: 0,
        asesorias: 0,
      },
    };
  },
  created() {
    this.obtenerDatos();
  },
  methods: {
    obtenerDatos: async function () {
      var url = `/cotizacion/listDatosDashboard`;
      const response = await axios.get(url);
      this.dashboard = response.data;
    },
    irListado: function (url) {
      location.href = `${url}`;
    },
  },
};
</script>

<style lang="scss" scoped>
.dashboard-item {
  cursor: pointer;

  .info-box:hover {
    background-color: #C5C8E3;
  }
}
</style>>

