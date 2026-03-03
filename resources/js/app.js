import './bootstrap';
import Vue from 'vue'
import VueApexCharts from 'vue-apexcharts'

// Registrar el componente globalmente
Vue.component('apexchart', VueApexCharts)

const app = new Vue({
    el: '#app',
});