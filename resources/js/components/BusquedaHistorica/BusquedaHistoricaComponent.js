export default {
    props: {
        token: String,
        tipoBusqueda: String,
        user: Object
    },
    data() {
        return {
            busqueda: {
                tipoBusqueda: ""
            },
            cotizaciones: [],
            tiposBusqueda: [
                { id: 1, valor: "Ensayo" },
                { id: 2, valor: "Calibración" }
            ],
            solicitante: {},
            contacto: {},
            cotizacion: {},
            equipos: [],
            tipo: '',

            openWindow: false,

            loading: false,
            esBusquedaHistorica: true,
            vistaPreviaLoading: false
        };
    },
    created: async function() {
        await this.obtenerCotizaciones();
    },
    methods: {
        CloseWindow(value) {
            console.log(value);
        },
        onChange(event) {
            this.cotizaciones = [];
            this.busqueda.nombreSolicitante = '';
            this.busqueda.nombreEquipo = '';
            this.busqueda.nombreEnsayo = '';
        },
        obtenerCotizaciones: async function() {
            if (this.busqueda.tipoBusqueda == "") {
                return;
            }
            this.loading = true;
            const url = `/cotizacionHistorica`;

            let response = await axios.post(url, this.busqueda);

            this.cotizaciones = response.data;
            this.loading = false;
        },
        verCotizacion: async function(id) {
            this.vistaPreviaLoading = true;
            this.solicitante = {};
            this.contacto = {};
            this.cotizacion = {};
            this.equipos = [];
            this.tipo = this.busqueda.tipoBusqueda === 1 ? 'ensayo': 'calibracion';

            let url = `/cotizacionHistorica/${id}`;

            let response = await axios.get(url);

            this.solicitante = response.data.solicitante;
            this.contacto = response.data.contacto;
            this.cotizacion = response.data.cotizacion;

            this.solicitante.ubigeoCompleto = response.data.solicitante.departamento + '->' + response.data.solicitante.provincia + '->' + response.data.solicitante.distrito;
            this.solicitante.tiposSolicitanteDescripcion = response.data.solicitante.TIPSOLIC_Descripcion;

            url = `/cotizaciondetalle/${id}/list`;

            response = await axios.get(url);

            this.equipos = response.data;

            this.openWindow = !this.openWindow;
            if (this.openWindow) this.openWindow = false;
            setTimeout(() => {
                (this.openWindow = true);
                this.vistaPreviaLoading = false;
            } , 500);
        }
    }
};
