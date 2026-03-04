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

        <div class="px-40 flex flex-1 justify-center py-5">
          <div class="layout-content-container flex flex-col max-w-[960px] flex-1">
            
            <div class="flex flex-wrap justify-between gap-3 p-4">
              <div class="flex min-w-72 flex-col gap-3">
                <p class="text-[#181511] tracking-light text-[32px] font-bold leading-tight">Consola Ecommerce</p>
                <p class="text-[#897961] text-sm font-normal leading-normal">Overview of key performance indicators for your coffee shop.</p>
              </div>
            </div>
            
            <h2 class="text-[#181511] text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5">Indicadores de ventas</h2>
            <p class="text-[#897961] px-4 text-sm font-normal leading-normal">Últimos 3 meses.</p>
            
            <div class="flex flex-wrap gap-4 px-4 py-6">
              
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
                  <div class="flex items-center">
                    <select v-model="filtro_chart_1" class="custom-select h-9 cursor-pointer rounded-md border border-[#e6e1db] bg-white px-3 py-1 text-xs font-semibold text-[#897961] focus:border-[#897961] focus:ring-0">
                      <option value="0">Todos</option>
                      <option v-for='producto in productos' :value="producto.id">@{{ producto.nombre }}</option>
                    </select>
                  </div>
                </div>

                <div class="flex min-h-[180px] flex-1 flex-col gap-8 py-4">
                  <div>
                    <apexchart
                      :options="chart1.configuracion" 
                      :series="chart1.series"></apexchart>
                  </div>
                  <div class="flex justify-around">
                    <p class="text-[#897961] text-[13px] font-bold leading-normal tracking-[0.015em]">Mon</p>
                    <p class="text-[#897961] text-[13px] font-bold leading-normal tracking-[0.015em]">Tue</p>
                    <p class="text-[#897961] text-[13px] font-bold leading-normal tracking-[0.015em]">Wed</p>
                    <p class="text-[#897961] text-[13px] font-bold leading-normal tracking-[0.015em]">Thu</p>
                    <p class="text-[#897961] text-[13px] font-bold leading-normal tracking-[0.015em]">Fri</p>
                    <p class="text-[#897961] text-[13px] font-bold leading-normal tracking-[0.015em]">Sat</p>
                    <p class="text-[#897961] text-[13px] font-bold leading-normal tracking-[0.015em]">Sun</p>
                  </div>
                </div>
              </div>

              <div class="flex min-w-72 flex-1 flex-col gap-2 rounded-lg border border-[#e6e1db] p-6">
                <p class="text-[#181511] text-base font-medium leading-normal">Productos más vendidos</p>
                <p class="text-[#181511] tracking-light text-[32px] font-bold leading-tight truncate">250</p>
                <div class="flex gap-1">
                  <p class="text-[#897961] text-base font-normal leading-normal">Capuchino</p>
                  <p class="text-[#078810] text-base font-medium leading-normal">20</p>
                </div>
                aqui va el gráfico de barras
                <apexchart 
                      :options="configuracion" 
                      :series="valores">
                </apexchart>
              </div>
            </div>

            <div class="flex flex-wrap gap-4 px-4 py-6">
              
              <div class="flex min-w-72 flex-1 flex-col gap-2 rounded-lg border border-[#e6e1db] p-6 relative">
                <div class="flex items-start justify-between">
                  <div class="flex flex-col gap-2">
                    <div class="h-5 w-48 animate-pulse rounded bg-[#e6e1db]"></div>
                    <div class="mt-2 h-10 w-32 animate-pulse rounded bg-[#e6e1db]"></div>
                  </div>
                  <div class="flex items-center">
                    <div class="h-9 w-24 animate-pulse rounded-md bg-[#e6e1db]"></div>
                  </div>
                </div>
                <div class="mt-1 flex gap-2">
                  <div class="h-4 w-20 animate-pulse rounded bg-[#e6e1db]"></div>
                  <div class="h-4 w-12 animate-pulse rounded bg-[#e6e1db]"></div>
                </div>
                <div class="flex min-h-[180px] flex-1 flex-col gap-8 py-4">
                  <div class="relative h-[148px] w-full">
                    <div class="flex h-full items-end justify-between gap-4 px-2">
                      <div class="h-[30%] w-full animate-pulse rounded-t bg-[#f4f3f0]"></div>
                      <div class="h-[60%] w-full animate-pulse rounded-t bg-[#f4f3f0]"></div>
                      <div class="h-[45%] w-full animate-pulse rounded-t bg-[#f4f3f0]"></div>
                      <div class="h-[80%] w-full animate-pulse rounded-t bg-[#f4f3f0]"></div>
                      <div class="h-[55%] w-full animate-pulse rounded-t bg-[#f4f3f0]"></div>
                      <div class="h-[70%] w-full animate-pulse rounded-t bg-[#f4f3f0]"></div>
                      <div class="h-[40%] w-full animate-pulse rounded-t bg-[#f4f3f0]"></div>
                    </div>
                  </div>
                  <div class="flex justify-around">
                    <div class="h-3 w-8 animate-pulse rounded bg-[#e6e1db]"></div>
                    <div class="h-3 w-8 animate-pulse rounded bg-[#e6e1db]"></div>
                    <div class="h-3 w-8 animate-pulse rounded bg-[#e6e1db]"></div>
                    <div class="h-3 w-8 animate-pulse rounded bg-[#e6e1db]"></div>
                    <div class="h-3 w-8 animate-pulse rounded bg-[#e6e1db]"></div>
                    <div class="h-3 w-8 animate-pulse rounded bg-[#e6e1db]"></div>
                    <div class="h-3 w-8 animate-pulse rounded bg-[#e6e1db]"></div>
                  </div>
                </div>
              </div>

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

    <script src="{{ asset('apexcharts.js') }}"></script>
    <script src="{{ asset('vue.js') }}"></script>
    <script src="{{ asset('vue-apexcharts.js') }}"></script>
    <script src="{{ asset('PlantillaColumna.js') }}"></script>
    
    <script>
      Vue.component('apexchart', VueApexCharts);
      var app = new Vue({
        el: '#app',
        data: {
          total_ventas: 0
          ,series1: []
          ,valores: [44, 55, 13, 43, 22]
          ,configuracion: {
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
            }
            ,productos:<?php echo json_encode($productos); ?>
            ,filtro_chart_1: '0'
          } 
        ,methods: {}
        ,computed:{
          chart1: function() { 
            let plantilla=Columna();
            plantilla.xaxis.categories.push('ventas');
            let final={
              series:this.series1
              ,configuracion:plantilla
            } 
            return final;
          } 
        } 
        ,watch:{
            filtro_chart_1:function(newValue){
              console.log('cambio el valor');
            }
        }
        ,components: {
          apexchart: VueApexCharts
        }
        ,created() {
          var xhr = new XMLHttpRequest();
          xhr.open('GET', '{{ route("total_ventas") }}', true);
          var self = this;
          xhr.onreadystatechange = function() {
            if (this.readyState == 4){
              //pregunto si salio bien
              if (this.status == 200) {
                info=JSON.parse(this.responseText);
                self.total_ventas = info.total;
                for(i=0;i<info.tendencia.length;i++){
                  self.series1.push(
                    {
                      name: info.tendencia[i].fecha,
                      data: [parseFloat(info.tendencia[i].total_ventas)]
                    }
                  );
                }
                console.log('ya cargo' ,info);
            }
          } 
        }
          xhr.send();
        }
      }); 
    </script>
  </body>
</html>