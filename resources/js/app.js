
require('./bootstrap');

window.Vue = require('vue');
window.Swal = require('sweetalert2');
window.moment = require('moment');

Vue.component('indexcontacto-component', require('./components/IndexContactoComponent.vue').default);
Vue.component('indexcotizacion-component', require('./components/IndexCotizacionComponent.vue').default);
Vue.component('indexcotizacioncalibracion-component', require('./components/IndexCotizacionCalibracionComponent.vue').default);
Vue.component('indexcotizacioncapacitacion-component', require('./components/IndexCotizacionCapacitacionComponent.vue').default);

Vue.component('createcotizacion-component', require('./components/CreateCotizacionComponent.vue').default);
Vue.component('createcotizacioncalibracion-component', require('./components/CreateCotizacionCalibracionComponent.vue').default);
Vue.component('createcotizacioncapacitacion-component', require('./components/CreateCotizacionCapacitacionComponent.vue').default);
Vue.component('createcontacto-component', require('./components/CreateContactoComponent.vue').default);

Vue.component('editcotizacion-component', require('./components/EditCotizacionComponent.vue').default);
Vue.component('editcotizacioncalibracion-component', require('./components/EditCotizacionCalibracionComponent.vue').default);
Vue.component('editcotizacioncapacitacion-component', require('./components/EditCotizacionCapacitacionComponent.vue').default);
Vue.component('editcontacto-component', require('./components/EditContactoComponent.vue').default);

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('ensayos', require('./components/EnsayosComponent.vue').default);
Vue.component('calibraciones', require('./components/CalibracionesComponent.vue').default);
Vue.component('capacitaciones', require('./components/CapacitacionesComponent.vue').default);
Vue.component('vista-preliminar', require('./components/Comun/VistaPreliminarComponent.vue').default);
Vue.component('window-portal', require('./components/WindowPortalComponent.vue').default);
// Vue.component('file-upload-component', require('./components/FileUploadComponent.vue').default);

/* Mantenimientos */
//Solicitante
Vue.component('createsolicitante-component', require('./components/CreateSolicitanteComponent.vue').default);
Vue.component('editsolicitante-component', require('./components/EditSolicitanteComponent.vue').default);
Vue.component('indexsolicitante-component', require('./components/IndexSolicitanteComponent.vue').default);


//Usuarios
Vue.component('indexusuario-component', require('./components/Usuario/IndexUsuarioComponent.vue').default);

//Cursos
Vue.component('indexcurso-component', require('./components/Cursos/IndexCursosComponent.vue').default);
Vue.component('curso-component', require('./components/Cursos/CursosComponent.vue').default);

//Descuentos
Vue.component('indexdescuento-component', require('./components/Descuentos/IndexDescuentosComponent.vue').default);
Vue.component('descuento-component', require('./components/Descuentos/DescuentosComponent.vue').default);

//Seguimiento
Vue.component('seguimiento-component', require('./components/Seguimiento/SeguimientoComponent.vue').default);

//Busqueda Historica
Vue.component('busqueda-component', require('./components/BusquedaHistorica/BusquedaHistoricaComponent.vue').default);

//Configuración
Vue.component('parametros-component', require('./components/Parametros/IndexParametroComponent.vue').default);

Vue.component('tags-input', require('./components/TagsInputComponent.vue').default);
Vue.component('dashboard-component', require('./components/DashboardComponent.vue').default);

Vue.component('v-style', {
    render: function (createElement) {
        return createElement('style', this.$slots.default)
    }
});

const app = new Vue({
    el: '#app',
});

Vue.directive('focus-on-create', {
    // Note: using Vue 1. In Vue 2, el would be a parameter
    bind: function () {
        Vue.nextTick(() => {
            this.el.focus();
        })
    }
});

Vue.filter('toCurrency', function (value) {
    if (typeof value !== "number") {
        return value;
    }
    var formatter = new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'USD',
        minimumFractionDigits: 0
    });
    return formatter.format(value);
});

