export default {
    props: {
      solicitante: {
        type: Object,
        default: () => ({}),
      },
      contacto: {
        type: Object,
        default: () => ({}),
      },
      cotizacion: {
        type: Object,
        default: () => ({}),
      },
      equipos: {
        type: Array,
        default: () => [],
      },
      capacitaciones: {
        type: Array,
        default: () => [],
      },
      tipo: {
        type: String,
        default: () => "ensayo",
      },
      esBusquedaHistorica: {
          type: Boolean,
          default: () => false
      }
    },
    data() {
      return {};
    },
    mounted() {},
    created() {},
    methods: {
        formatPrice(value) {
            let val = (value/1).toFixed(2).replace('.', ',')
            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
        }
    }
  };
