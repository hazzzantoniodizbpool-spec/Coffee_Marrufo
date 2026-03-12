<html>
  <head>
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="" />
    <link
      rel="stylesheet"
      as="style"
      onload="this.rel='stylesheet'"
      href="https://fonts.googleapis.com/css2?display=swap&amp;family=Noto+Sans%3Awght%40400%3B500%3B700%3B900&amp;family=Work+Sans%3Awght%40400%3B500%3B700%3B900"
    />
    <title>Cofee Dashboard</title>
    <link rel="icon" type="image/x-icon" href="data:image/x-icon;base64," />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link rel="stylesheet" href="{{ asset('apexcharts.css') }}">
  </head>
  <body>
    <div id="app" class="relative flex h-auto min-h-screen w-full flex-col bg-white group/design-root overflow-x-hidden" style='font-family: "Work Sans", "Noto Sans", sans-serif;'>
      <div class="layout-container flex h-full grow flex-col">
        
        <!-- Encabezado -->
        <header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-b-[#f4f3f0] px-10 py-3">
          <div class="flex items-center gap-4 text-[#181511]">
            <div class="size-4">
              <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M42.4379 44C42.4379 44 36.0744 33.9038 41.1692 24C46.8624 12.9336 42.2078 4 42.2078 4L7.01134 4C7.01134 4 11.6577 12.932 5.96912 23.9969C0.876273 33.9029 7.27094 44 7.27094 44L42.4379 44Z"
                  fill="currentColor"
                ></path>
              </svg>
            </div>
            <h2 class="text-[#181511] text-lg font-bold leading-tight tracking-[-0.015em]">Coffee Shop</h2>
          </div>
          
          <div class="flex flex-1 justify-end gap-8">
            <div class="flex items-center gap-9">
              <a class="text-[#181511] text-sm font-medium leading-normal" href="#">Dashboard</a>
              <a class="text-[#181511] text-sm font-medium leading-normal" href="#">Menu</a>
              <a class="text-[#181511] text-sm font-medium leading-normal" href="#">Orders</a>
              <a class="text-[#181511] text-sm font-medium leading-normal" href="#">Customers</a>
              <a class="text-[#181511] text-sm font-medium leading-normal" href="#">Reports</a>
            </div>
            
            <button
              class="flex max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 bg-[#f4f3f0] text-[#181511] gap-2 text-sm font-bold leading-normal tracking-[0.015em] min-w-0 px-2.5"
            >
              <div class="text-[#181511]" data-icon="Bell" data-size="20px" data-weight="regular">
                <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill="currentColor" viewBox="0 0 256 256">
                  <path
                    d="M221.8,175.94C216.25,166.38,208,139.33,208,104a80,80,0,1,0-160,0c0,35.34-8.26,62.38-13.81,71.94A16,16,0,0,0,48,200H88.81a40,40,0,0,0,78.38,0H208a16,16,0,0,0,13.8-24.06ZM128,216a24,24,0,0,1-22.62-16h45.24A24,24,0,0,1,128,216ZM48,184c7.7-13.24,16-43.92,16-80a64,64,0,1,1,128,0c0,36.05,8.28,66.73,16,80Z"
                  ></path>
                </svg>
              </div>
            </button>
            
            <div
              class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10"
              style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCiWzftYojm6n802x2Ii1YpfttBNrsLyT7QtPoMWw-v8AJgjAPIH8gvcar6Ssi3uVkJLQKNVEm6K3LaTmgGYXBx1WZ5xNm08RCWbs7wMVhlzN_0PvQAflkGMIBynOl44EKyNJnBT0U6u6ELwqFlXupon0xegknFwutU04uVXhuDePbpXH9nyj8U7VzscyAz2XthKOAGcSB1D2ZmVG8SDdMKmzHD10rLwu271OoxLyrvnqFR2BrlRQNSatzfBXmtSFTTv4HTKOWxH5E");'
            ></div>
          </div>
        </header>

        <!-- Contenido principal -->
        <div class="px-40 flex flex-1 justify-center py-5">
          <div class="layout-content-container flex flex-col max-w-[960px] flex-1">
            
            <!-- Título de la consola -->
            <div class="flex flex-wrap justify-between gap-3 p-4">
              <div class="flex min-w-72 flex-col gap-3">
                <p class="text-[#181511] tracking-light text-[32px] font-bold leading-tight">Consola Ecommerce</p>
                <p class="text-[#897961] text-sm font-normal leading-normal">Overview of key performance indicators for your coffee shop.</p>
              </div>
            </div>
            
            <!-- Indicadores de ventas -->
            <h2 class="text-[#181511] text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5">Indicadores de ventas</h2>
            <p class="text-[#897961] px-4 text-sm font-normal leading-normal">Últimos 3 meses.</p>
            
            <div class="flex flex-wrap gap-4 px-4 py-6">
              
              <!-- Chart 1: Ventas totales -->
              <div class="flex min-w-72 flex-1 flex-col gap-2 rounded-lg border border-[#e6e1db] p-6">
                <div class="flex items-start justify-between">
                  <div class="flex flex-col gap-2">
                    <p class="text-[#181511] text-base font-medium leading-normal">Ventas totales</p>
                    <p class="text-[#181511] tracking-light text-[32px] font-bold leading-tight truncate">$@{{ total_ventas }}</p>
                    <div class="flex gap-1">
                      <p class="text-[#897961] text-base font-normal leading-normal">Promedio diario</p>
                      <p class="text-[#078810] text-base font-medium leading-normal">$1,250</p>
                    </div>
                  </div>
                  <div class="flex items-center gap-2">
                    <select v-model="filtro_chart_1.idproducto" class="custom-select h-9 cursor-pointer rounded-md border border-[#e6e1db] bg-white px-3 py-1 text-xs font-semibold text-[#897961] focus:border-[#897961] focus:ring-0">
                      <option value="0">Todos los productos</option>
                      <option v-for='producto in productos' :value="producto.id">@{{ producto.nombre }}</option>
                    </select>
                    <select v-model="filtro_chart_1.canal" class="custom-select h-9 cursor-pointer rounded-md border border-[#e6e1db] bg-white px-3 py-1 text-xs font-semibold text-[#897961] focus:border-[#897961] focus:ring-0">
                      <option value="">Todos los canales</option>
                      <option value="WEB">WEB</option>
                      <option value="APP">APP</option>
                      <option value="KIOSKO">KIOSKO</option>
                      <option value="TAQUILLA">TAQUILLA</option>
                    </select>
                  </div>
                </div>

                <div class="flex min-h-[180px] flex-1 flex-col gap-8 py-4">
                  <div>
                    <apexchart
                      :options="chart1.configuracion" 
                      :series="chart1.series"></apexchart>
                  </div>
                </div>
              </div>

              <!-- Chart 2: Análisis por categoría -->
              <div class="flex min-w-72 flex-1 flex-col gap-2 rounded-lg border border-[#e6e1db] p-6">
                <p class="text-[#181511] text-base font-medium leading-normal">Analisis por categoria</p>
                <p class="text-[#181511] tracking-light text-[32px] font-bold leading-tight truncate">$@{{ total_categoria }}</p>
                <div class="flex gap-1">
                  <p class="text-[#897961] text-base font-normal leading-normal">Capuchino</p>
                  <p class="text-[#078810] text-base font-medium leading-normal">20</p>
                </div>
                <div class="flex items-center">
                  <select v-model="filtro_chart_2" class="custom-select h-9 cursor-pointer rounded-md border border-[#e6e1db] bg-white px-3 py-1 text-xs font-semibold text-[#897961] focus:border-[#897961] focus:ring-0">
                    <option value="">Todos</option>
                    <option v-for='genero in generos' :value="genero">@{{ genero }}</option>
                  </select>
                </div>
                <apexchart
                  :options="chart2.configuracion" 
                  :series="chart2.series"></apexchart>
              </div>
            </div>
            
            <!-- Análisis demográficos -->
            <h2 class="text-[#181511] text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5">analisis demograficos</h2>
            <div class="flex flex-wrap gap-4 px-4 py-6">
              
              <!-- Chart 3: Usuarios por géneros -->
              <div class="flex min-w-72 flex-1 flex-col gap-2 rounded-lg border border-[#e6e1db] p-6">
                <p class="text-[#181511] text-base font-medium leading-normal">usuarios x generos</p>
                <div class="flex gap-2 items-center">
                  <select v-model="filtro_chart_3.idedad" class="custom-select h-9 cursor-pointer rounded-md border border-[#e6e1db] bg-white px-3 py-1 text-xs font-semibold text-[#897961] focus:border-[#897961] focus:ring-0">
                    <option value="">Todas las edades</option>
                    <option v-for='edad in edades' :value="edad.id">@{{ edad.nombre }}</option>
                  </select>
                  <select v-model="filtro_chart_3.idocupacion" class="custom-select h-9 cursor-pointer rounded-md border border-[#e6e1db] bg-white px-3 py-1 text-xs font-semibold text-[#897961] focus:border-[#897961] focus:ring-0">
                    <option value="">Todas las ocupaciones</option>
                    <option v-for='ocupacion in ocupaciones' :value="ocupacion.id">@{{ ocupacion.nombre }}</option>
                  </select>
                </div>
                <apexchart
                  :options="chart3.configuracion" 
                  :series="chart3.series"></apexchart>
              </div>
              
              <!-- Chart 4: Distribución por edades -->
              <div class="flex min-w-72 flex-1 flex-col gap-2 rounded-lg border border-[#e6e1db] p-6">
                <p class="text-[#181511] text-base font-medium leading-normal">Distribución por edades</p>
                <div class="flex gap-2 items-center">
                  <select v-model="filtro_chart_4.genero" class="custom-select h-9 cursor-pointer rounded-md border border-[#e6e1db] bg-white px-3 py-1 text-xs font-semibold text-[#897961] focus:border-[#897961] focus:ring-0">
                    <option value="">Todos los géneros</option>
                    <option v-for='genero in generos' :value="genero">@{{ genero }}</option>
                  </select>
                  <select v-model="filtro_chart_4.idocupacion" class="custom-select h-9 cursor-pointer rounded-md border border-[#e6e1db] bg-white px-3 py-1 text-xs font-semibold text-[#897961] focus:border-[#897961] focus:ring-0">
                    <option value="">Todas las ocupaciones</option>
                    <option v-for='ocupacion in ocupaciones' :value="ocupacion.id">@{{ ocupacion.nombre }}</option>
                  </select>
                </div>
                <apexchart
                  :options="chart4.configuracion" 
                  :series="chart4.series"></apexchart>
              </div>
            </div>
            
            <!-- Tercer renglón de gráficos -->
            <div class="flex flex-wrap gap-4 px-4 py-6">
              
              <!-- Chart 5: Ventas por producto -->
              <div class="flex min-w-72 flex-1 flex-col gap-2 rounded-lg border border-[#e6e1db] p-6">
                <p class="text-[#181511] text-base font-medium leading-normal">Ventas por producto</p>
                <div class="flex gap-2 items-center">
                  <select v-model="filtro_chart_5" class="custom-select h-9 cursor-pointer rounded-md border border-[#e6e1db] bg-white px-3 py-1 text-xs font-semibold text-[#897961] focus:border-[#897961] focus:ring-0">
                    <option value="">Todos</option>
                    <option value="Hombre">Hombres</option>
                    <option value="Mujer">Mujeres</option>
                  </select>
                </div>
                <apexchart
                  :options="chart5.configuracion" 
                  :series="chart5.series"></apexchart>
              </div>

              <!-- Customer Traffic Projection (placeholder) -->
              <div class="flex min-w-72 flex-1 flex-col gap-2 rounded-lg border border-[#e6e1db] p-6 relative bg-white/50">
                <div class="flex items-start justify-between">
                  <div class="flex flex-col gap-2">
                    <p class="text-[#181511] text-base font-medium leading-normal">Customer Traffic Projection</p>
                    <div class="mt-2 h-10 w-24 animate-pulse rounded bg-[#e6e1db]"></div>
                  </div>
                  <div class="flex items-center">
                    <select class="custom-select h-9 cursor-not-allowed rounded-md border border-[#e6e1db] bg-white px-3 py-1 text-xs font-semibold text-[#897961]/50 focus:outline-none">
                      <option>Loading...</option>
                    </select>
                  </div>
                </div>
                <div class="flex gap-1">
                  <div class="h-4 w-28 animate-pulse rounded bg-[#e6e1db]"></div>
                </div>
                <div class="flex min-h-[180px] flex-1 items-center justify-center py-4">
                  <div class="flex h-[148px] w-full flex-col justify-center gap-4">
                    <div class="h-2 w-full animate-pulse rounded bg-[#f4f3f0]"></div>
                    <div class="h-2 w-3/4 animate-pulse rounded bg-[#f4f3f0]"></div>
                    <div class="h-2 w-5/6 animate-pulse rounded bg-[#f4f3f0]"></div>
                    <div class="h-2 w-1/2 animate-pulse rounded bg-[#f4f3f0]"></div>
                    <div class="h-2 w-2/3 animate-pulse rounded bg-[#f4f3f0]"></div>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('apexcharts.js') }}"></script>
    <script src="{{ asset('vue.js') }}"></script>
    <script src="{{ asset('vue-apexcharts.js') }}"></script>
    <script src="{{ asset('PlantillaColumna.js') }}"></script>
    <script src="{{ asset('PlantillaPie.js') }}"></script>

    <script>
      Vue.component('apexchart', VueApexCharts);
      
      var app = new Vue({
        el: '#app',
        
        data: {
          total_categoria: 0,
          total_ventas: 0,
          series1: [],
          series2: [],
          series3: [],
          series4: [],
          series5: [],
          valores: [44, 55, 13, 43, 22],
          configuracion: {
            chart: {
              width: 380,
              type: 'pie',
            },
            labels: ['CANAL A', 'CANAL B', 'CANAL C', 'CANAL D', 'CANAL E'],
            responsive: [{
              breakpoint: 480,
              options: {
                chart: {
                  width: 200
                },
                legend: {
                  position: 'bottom'
                }
              }
            }]
          },
          productos: <?php echo json_encode($productos); ?>,
          generos: <?php echo json_encode($generos); ?>,
          edades: <?php echo json_encode($edades); ?>,
          ocupaciones: <?php echo json_encode($ocupaciones); ?>,
          filtro_chart_1: {
            idproducto: '0',
            canal: ''
          },
          filtro_chart_2: '',
          filtro_chart_3: {
            idedad: 0,
            idocupacion: 0
          },
          filtro_chart_4: {
            genero: '',
            idocupacion: 0
          },
          filtro_chart_5: ''
        },
        
        methods: {},
        
        computed: {
          chart1: function() { 
            let plantilla = Columna();
            plantilla.xaxis.categories.push('ventas');
            let final = {
              series: this.series1,
              configuracion: plantilla
            };
            return final;
          },
          
          chart2: function() { 
            let plantilla = Columna();
            plantilla.xaxis.categories.push('ventas');
            let final = {
              series: this.series2,
              configuracion: plantilla
            };
            return final;
          },
          
          chart3: function() { 
            let plantilla = Pie();
            let final = {
              series: [],
              configuracion: plantilla
            };
            for(i = 0; i < this.series3.length; i++) {
              final.series.push(this.series3[i].total)
              final.configuracion.labels.push(this.series3[i].genero);
            } 
            return final;
          },
          
          chart4: function() { 
            let plantilla = Pie();
            let final = {
              series: [],
              configuracion: plantilla
            };
            for(i = 0; i < this.series4.length; i++) {
              final.series.push(this.series4[i].total)
              final.configuracion.labels.push(this.series4[i].rango_edad);
            } 
            return final;
          },
          
          chart5: function() {
            let plantilla = Columna();
            // solo una categoría en X
            plantilla.xaxis.categories = ['Ventas'];
            return {
              series: this.series5,
              configuracion: plantilla
            }
          }
        },
        
        watch: {
          filtro_chart_1: {
            handler: function(newValue) {
              this.series1.splice(0, this.series1.length);

              var xhr = new XMLHttpRequest();
              xhr.open('POST', '{{ route("total_ventas") }}', true);
              var self = this;
              xhr.onreadystatechange = function() {
                if (this.readyState == 4) {
                  if (this.status == 200) {
                    info = JSON.parse(this.responseText);
                    self.total_ventas = info.total;
                    for(i = 0; i < info.tendencia.length; i++) {
                      self.series1.push({
                        name: info.tendencia[i].fecha,
                        data: [parseFloat(info.tendencia[i].total_ventas)]
                      });
                    }
                    console.log('ya cargo', info);
                  }
                }
              }
              xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
              xhr.send(JSON.stringify({
                idproducto: newValue.idproducto,
                canal: newValue.canal,
                _token: '{{ csrf_token() }}'
              }));
            },
            deep: true
          },
          
          filtro_chart_2: function(newValue) {
            this.series2.splice(0, this.series2.length);
            this.total_categoria = 0;

            var xhr = new XMLHttpRequest();
            xhr.open('POST', '{{ route("total_ventas_categoria") }}', true);
            var self = this;
            xhr.onreadystatechange = function() {
              if (this.readyState == 4) {
                if (this.status == 200) {
                  info = JSON.parse(this.responseText);
                  let sumaTotal = 0;
                  for(i = 0; i < info.categorias.length; i++) {
                    self.series2.push({
                      name: info.categorias[i].nombre,
                      data: [parseFloat(info.categorias[i].total)]
                    });
                    sumaTotal += parseFloat(info.categorias[i].total);
                  }
                  self.total_categoria = sumaTotal;
                }
              }
            }
            xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
            xhr.send(JSON.stringify({
              genero: newValue,
              _token: '{{ csrf_token() }}'
            }));
          },
          
          filtro_chart_3: {
            handler: function(newValue) {
              var xhr = new XMLHttpRequest();
              xhr.open('POST', '{{ route("demografico_genero") }}', true);
              var self = this; 
              xhr.onreadystatechange = function() {
                if (this.readyState == 4) {
                  if (this.status == 200) {
                    self.series3.splice(0, self.series3.length);
                    info = JSON.parse(this.responseText);
                    for(i = 0; i < info.length; i++) {
                      self.series3.push(info[i]);
                    }
                  }
                }
              }
              xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
              xhr.send(JSON.stringify({
                idedad: newValue.idedad,
                idocupacion: newValue.idocupacion,
                _token: '{{ csrf_token() }}'
              }));
            },
            deep: true
          },
          
          filtro_chart_4: {
            handler: function(newValue) {
              var xhr = new XMLHttpRequest();
              xhr.open('POST', '{{ route("demografico_edades") }}', true);
              var self = this; 
              xhr.onreadystatechange = function() {
                if (this.readyState == 4) {
                  if (this.status == 200) {
                    self.series4.splice(0, self.series4.length);
                    info = JSON.parse(this.responseText);
                    for(i = 0; i < info.length; i++) {
                      self.series4.push(info[i]);
                    }
                  }
                }
              }
              xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
              xhr.send(JSON.stringify({
                genero: newValue.genero,
                idocupacion: newValue.idocupacion,
                _token: '{{ csrf_token() }}'
              }));
            },
            deep: true
          },
          
          filtro_chart_5: {
            handler: function(newValue) {
              // Limpiar series antes de cargar nuevos datos
              this.series5.splice(0, this.series5.length);
              var xhr = new XMLHttpRequest();
              xhr.open('POST', '{{ route("ventas_producto_genero") }}', true);
              var self = this;
              xhr.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                  let info = JSON.parse(this.responseText);
                  for (let i = 0; i < info.length; i++) {
                    self.series5.push({
                      name: info[i].nombre,
                      data: [parseFloat(info[i].total)]
                    });
                  }
                }
              }
              xhr.setRequestHeader("Content-Type", "application/json");
              xhr.send(JSON.stringify({
                genero: newValue,
                _token: '{{ csrf_token() }}'
              }));
            },
            deep: true
          }
        },
        
        components: {
          apexchart: VueApexCharts
        },
        
        created() {
          var self = this;
          
          // Carga inicial chart1
          var xhr1 = new XMLHttpRequest();
          xhr1.open('GET', '{{ route("total_ventas") }}', true);
          xhr1.onreadystatechange = function() {
            if (this.readyState == 4) {
              if (this.status == 200) {
                info = JSON.parse(this.responseText);
                self.total_ventas = info.total;
                for(i = 0; i < info.tendencia.length; i++) {
                  self.series1.push({
                    name: info.tendencia[i].fecha,
                    data: [parseFloat(info.tendencia[i].total_ventas)]
                  });
                }
                console.log('ya cargo', info);
              }
            }
          }
          xhr1.send();

          // Carga inicial chart2
          var xhr2 = new XMLHttpRequest();
          xhr2.open('GET', '{{ route("total_ventas_categoria") }}', true);
          xhr2.onreadystatechange = function() {
            if (this.readyState == 4) {
              if (this.status == 200) {
                info = JSON.parse(this.responseText);
                let sumaTotal = 0;
                for(i = 0; i < info.categorias.length; i++) {
                  self.series2.push({
                    name: info.categorias[i].nombre,
                    data: [parseFloat(info.categorias[i].total)]
                  });
                  sumaTotal += parseFloat(info.categorias[i].total);
                }
                self.total_categoria = sumaTotal;
              }
            }
          }
          xhr2.send();

          // Carga inicial chart3
          var xhr3 = new XMLHttpRequest();
          xhr3.open('GET', '{{ route("demografico_genero") }}', true);
          xhr3.onreadystatechange = function() {
            if (this.readyState == 4) {
              if (this.status == 200) {
                info = JSON.parse(this.responseText);
                for(i = 0; i < info.length; i++) {
                  self.series3.push(info[i]);
                }
              }
            }
          }
          xhr3.send();

          // Carga inicial chart4
          var xhr4 = new XMLHttpRequest();
          xhr4.open('GET', '{{ route("demografico_edades") }}', true);
          xhr4.onreadystatechange = function() {
            if (this.readyState == 4) {
              if (this.status == 200) {
                info = JSON.parse(this.responseText);
                for(i = 0; i < info.length; i++) {
                  self.series4.push(info[i]);
                }
              }
            }
          }
          xhr4.send();

          // DATOS DEL CHART5
          var xhr5 = new XMLHttpRequest();
          xhr5.open('GET', '{{ route("ventas_producto_genero") }}', true);
          xhr5.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              let info = JSON.parse(this.responseText);
              self.series5.splice(0, self.series5.length);
              for (let i = 0; i < info.length; i++) {
                self.series5.push({
                  name: info[i].nombre,
                  data: [parseFloat(info[i].total)]
                });
              }
            }
          }
          xhr5.send();
        }
      }); 
    </script>
  </body>
</html>