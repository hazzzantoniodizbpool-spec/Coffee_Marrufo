<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />

  <title>Coffee Shop</title>

  
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;500;700;900&family=Work+Sans:wght@400;500;700;900&display=swap" rel="stylesheet" />

  <link rel="icon" type="image/x-icon" href="data:image/x-icon;base64," />
</head>
  <body>
    <div class="relative flex h-auto min-h-screen w-full flex-col bg-white group/design-root overflow-x-hidden" style='font-family: "Work Sans", "Noto Sans", sans-serif;'>
      <div class="layout-container flex h-full grow flex-col">
        <header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-b-[#f4f3f0] px-10 py-3">
          <div class="flex items-center gap-4 text-[#181511]">
            <div class="size-4">
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M39.475 21.6262C40.358 21.4363 40.6863 21.5589 40.7581 21.5934C40.7876 21.655 40.8547 21.857 40.8082 22.3336C40.7408 23.0255 40.4502 24.0046 39.8572 25.2301C38.6799 27.6631 36.5085 30.6631 33.5858 33.5858C30.6631 36.5085 27.6632 38.6799 25.2301 39.8572C24.0046 40.4502 23.0255 40.7407 22.3336 40.8082C21.8571 40.8547 21.6551 40.7875 21.5934 40.7581C21.5589 40.6863 21.4363 40.358 21.6262 39.475C21.8562 38.4054 22.4689 36.9657 23.5038 35.2817C24.7575 33.2417 26.5497 30.9744 28.7621 28.762C30.9744 26.5497 33.2417 24.7574 35.2817 23.5037C36.9657 22.4689 38.4054 21.8562 39.475 21.6262ZM4.41189 29.2403L18.7597 43.5881C19.8813 44.7097 21.4027 44.9179 22.7217 44.7893C24.0585 44.659 25.5148 44.1631 26.9723 43.4579C29.9052 42.0387 33.2618 39.5667 36.4142 36.4142C39.5667 33.2618 42.0387 29.9052 43.4579 26.9723C44.1631 25.5148 44.659 24.0585 44.7893 22.7217C44.9179 21.4027 44.7097 19.8813 43.5881 18.7597L29.2403 4.41187C27.8527 3.02428 25.8765 3.02573 24.2861 3.36776C22.6081 3.72863 20.7334 4.58419 18.8396 5.74801C16.4978 7.18716 13.9881 9.18353 11.5858 11.5858C9.18354 13.988 7.18717 16.4978 5.74802 18.8396C4.58421 20.7334 3.72865 22.6081 3.36778 24.2861C3.02574 25.8765 3.02429 27.8527 4.41189 29.2403Z"
                  fill="currentColor"
                ></path>
              </svg>
            </div>
            <h2 class="text-[#181511] text-lg font-bold leading-tight tracking-[-0.015em]">Coffee Shop</h2>
          </div>
          <div class="flex flex-1 justify-end gap-8">
            <div class="flex items-center gap-9">
              <a class="text-[#181511] text-sm font-medium leading-normal" href="#">Menu</a>
              <a class="text-[#181511] text-sm font-medium leading-normal" href="#">Orders</a>
              <a class="text-[#181511] text-sm font-medium leading-normal" href="#">Customers</a>
              <a class="text-[#181511] text-sm font-medium leading-normal" href="#">Reports</a>

            @guest
              <a class="text-[#181511] text-sm font-medium leading-normal" href="{{ route('login.show') }}">Login</a>
              <a class="text-[#181511] text-sm font-medium leading-normal" href="{{ route('signup.show') }}">Signup</a>
            @endguest

            @auth
              <form method="POST" action="{{ route('logout') }}">
            @csrf
              <button type="submit" class="text-[#181511] text-sm font-medium leading-normal p-1.5 bg-red-500 rounded-lg">Logout</button>
              </form>
            @endauth

            </div>
            <button
              class="flex max-w-[480px] cursor-pointer items-center justify-center overflow-hidden  text-[#181511] gap-1.5 text-sm font-bold leading-normal tracking-[0.015em] min-w-0 px-1.5"
            >
              <div class="text-[#181511]" data-icon="Gear" data-size="20px" data-weight="regular">
                <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill="currentColor" viewBox="0 0 256 256">
                  <path
                    d="M128,80a48,48,0,1,0,48,48A48.05,48.05,0,0,0,128,80Zm0,80a32,32,0,1,1,32-32A32,32,0,0,1,128,160Zm88-29.84q.06-2.16,0-4.32l14.92-18.64a8,8,0,0,0,1.48-7.06,107.21,107.21,0,0,0-10.88-26.25,8,8,0,0,0-6-3.93l-23.72-2.64q-1.48-1.56-3-3L186,40.54a8,8,0,0,0-3.94-6,107.71,107.71,0,0,0-26.25-10.87,8,8,0,0,0-7.06,1.49L130.16,40Q128,40,125.84,40L107.2,25.11a8,8,0,0,0-7.06-1.48A107.6,107.6,0,0,0,73.89,34.51a8,8,0,0,0-3.93,6L67.32,64.27q-1.56,1.49-3,3L40.54,70a8,8,0,0,0-6,3.94,107.71,107.71,0,0,0-10.87,26.25,8,8,0,0,0,1.49,7.06L40,125.84Q40,128,40,130.16L25.11,148.8a8,8,0,0,0-1.48,7.06,107.21,107.21,0,0,0,10.88,26.25,8,8,0,0,0,6,3.93l23.72,2.64q1.49,1.56,3,3L70,215.46a8,8,0,0,0,3.94,6,107.71,107.71,0,0,0,26.25,10.87,8,8,0,0,0,7.06-1.49L125.84,216q2.16.06,4.32,0l18.64,14.92a8,8,0,0,0,7.06,1.48,107.21,107.21,0,0,0,26.25-10.88,8,8,0,0,0,3.93-6l2.64-23.72q1.56-1.48,3-3L215.46,186a8,8,0,0,0,6-3.94,107.71,107.71,0,0,0,10.87-26.25,8,8,0,0,0-1.49-7.06Zm-16.1-6.5a73.93,73.93,0,0,1,0,8.68,8,8,0,0,0,1.74,5.48l14.19,17.73a91.57,91.57,0,0,1-6.23,15L187,173.11a8,8,0,0,0-5.1,2.64,74.11,74.11,0,0,1-6.14,6.14,8,8,0,0,0-2.64,5.1l-2.51,22.58a91.32,91.32,0,0,1-15,6.23l-17.74-14.19a8,8,0,0,0-5-1.75h-.48a73.93,73.93,0,0,1-8.68,0,8,8,0,0,0-5.48,1.74L100.45,215.8a91.57,91.57,0,0,1-15-6.23L82.89,187a8,8,0,0,0-2.64-5.1,74.11,74.11,0,0,1-6.14-6.14,8,8,0,0,0-5.1-2.64L46.43,170.6a91.32,91.32,0,0,1-6.23-15l14.19-17.74a8,8,0,0,0,1.74-5.48,73.93,73.93,0,0,1,0-8.68,8,8,0,0,0-1.74-5.48L40.2,100.45a91.57,91.57,0,0,1,6.23-15L69,82.89a8,8,0,0,0,5.1-2.64,74.11,74.11,0,0,1,6.14-6.14A8,8,0,0,0,82.89,69L85.4,46.43a91.32,91.32,0,0,1,15-6.23l17.74,14.19a8,8,0,0,0,5.48,1.74,73.93,73.93,0,0,1,8.68,0,8,8,0,0,0,5.48-1.74L155.55,40.2a91.57,91.57,0,0,1,15,6.23L173.11,69a8,8,0,0,0,2.64,5.1,74.11,74.11,0,0,1,6.14,6.14,8,8,0,0,0,5.1,2.64l22.58,2.51a91.32,91.32,0,0,1,6.23,15l-14.19,17.74A8,8,0,0,0,199.87,123.66Z"
                  ></path>
                </svg>
              </div>
            </button>
            <div
              class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10"
              style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDhCzBhvNcaALW4Fh1kO0RuKKFs6-kqiWt29RnAbTNd5I1y1jCME4QgxbWXZbvticiNYpemFWRURgFHmn4c7u4TPjw4cDSWWgUBfqNly1E6j1HV3tYpuAMNNpf4iEnPN6MO-6XYwUNY7RgBUXPteffyrICBq_WAyrpAp-VBBUGB-QirjtVoyhZqiim1IgQ8EtItxDnmUmb5Q9o5W-Se01muhG-32wW0up0Dulina3Hja0IbYuXeKPtaSPQ2Cm-jlBz1mjFAoOa-usU");'
            ></div>
          </div>
        </header>
        <!-- Seccion de la gestion de la orden -->
        <div id="app" class="gap-1 px-6 flex flex-1 justify-center py-5">

          <div  class="layout-content-container flex flex-col max-w-[920px] flex-1">
            <!--@{{orden}}  contenido del pedido-->  
            <div class="flex flex-wrap justify-between gap-3 p-4"><p class="text-[#181511] tracking-light text-[32px] font-bold leading-tight min-w-72">New Order</p></div>
            <div v-if="!extras" class="pb-3">
              <div class="flex border-b border-[#e6e1db] px-4 gap-8">
               <a  v-for="categoria in categorias"
               @click="categoria_seleccionada=categoria.id"
               :class="{'border-b-[3px]':categoria.id==categoria_seleccionada,'border-b-[#181511]':categoria.id==categoria_seleccionada}"
               class="flex flex-col items-center justify-center  text-[#181511] pb-[13px] pt-4" href="#">
                  <p class="text-[#181511] text-sm font-bold leading-normal tracking-[0.015em]">@{{categoria.nombre}}</p>
                </a>
                <!-- <a class="flex flex-col items-center justify-center border-b-[3px] border-b-transparent text-[#897961] pb-[13px] pt-4" href="#">
                  <p class="text-[#897961] text-sm font-bold leading-normal tracking-[0.015em]">Brewed Coffee</p>
                </a>
                <a class="flex flex-col items-center justify-center border-b-[3px] border-b-transparent text-[#897961] pb-[13px] pt-4" href="#">
                  <p class="text-[#897961] text-sm font-bold leading-normal tracking-[0.015em]">Teas</p>
                </a>-->
              </div>
            </div>
            <h3 v-if="!extras" class="text-[#181511] text-lg font-bold leading-tight tracking-[-0.015em] px-4 pb-2 pt-4"> @{{nomcategoria}} </h3>
            <div v-if="!extras" v-for="producto in productos_seleccionados" class="p-4">
              <div class="flex items-stretch justify-between gap-4 rounded-lg">
                <div class="flex flex-[2_2_0px] flex-col gap-4">
                  <div class="flex flex-col gap-1">
                    <p class="text-[#000000] text-sm font-normal leading-normal">@{{ producto.nombre }}</p>
                    <p class="text-[#000000] text-base font-bold leading-tight">@{{ producto.categoria }} -$@{{producto.precio}}</p>
                    <p class="text-[#000000] text-sm font-normal leading-normal">@{{ producto.descripcion }}</p>
                  </div>

                  <button
                  @click="agregar_orden(producto)"
                    class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-8 px-4 flex-row-reverse bg-[#10B981] text-[#181511] text-sm font-medium leading-normal w-fit">
                    <span class="truncate">Add to Order</span>
                  </button>

                </div>
                <div
                  class="w-full bg-center bg-no-repeat aspect-video bg-cover rounded-lg flex-1"
                  style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuD31QERfM_T9m0f0o3Pp100ZryflN5Zf_HqNRGUo0PXPF2p8nuO0Dre2CO3aNAlPvH4oR20ppqYETFaBoXRVtuWnRQuKLs_Xh8DPbGXEK0ldE6TYun49OlPL5vMdR1OPQLo8ROKlUe0G4bF__NItL7tTaWAbzCs5WIbwqG2fk_nPEcAoKkBmpetoBFQANtT5Ff2JMaDcuIoxkSzQMbIiKVmo5asT025-JDBTKLCxRo-QjzYDpUGKBDk7FnZT-_ImADaRdX2xR7Zv7E");'                
                  ></div>
              </div>
            </div>

          </div>
          <div v-if="!extras" class="layout-content-container flex flex-col w-[360px]">
            <h2 class="text-[#181511] text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5">Carrito</h2>
            <div v-for="(item,index) in orden" class="flex items-center gap-4 bg-white px-4 min-h-[72px] py-2 justify-between">
              <div class="flex flex-col justify-start">
                <p class="text-[#181511] text-base font-medium leading-normal line-clamp-1">@{{item.nombre}}</p>
                <p class="text-[#897961] text-sm font-normal leading-normal line-clamp-2">@{{item.descripcion}}</p>
              </div>
              <div class="shrink-0"><p class="text-[#181511] text-base font-normal leading-normal">$@{{item.precio}}</p> </div>
              <div class="flex items-center gap-3">
                  <div class="px-4">
    <!-- Línea única: tamaño | (espacio) | acciones -->
    <div class="flex items-center justify-between gap-3">
      <!-- Left: etiqueta + select -->
      <div class="flex flex-col  items-start gap-2">
        <p class="text-sm text-[#897961] min-w-[72px]">Talla</p>
        <select v-model="item.tamanio" class="form-select h-9 rounded-md border border-[#e6e1db] bg-white text-sm text-[#181511] px-3 pr-10 min-w-[180px]">
          <option v-for="tamanio in tamanios" :value="tamanio.id" >@{{ tamanio.nombre }}</option>

        </select>
      </div>

      <!-- Right: botones eliminar y configurar (misma línea) -->
      <div class="flex items-center gap-3">
        <button @click="eliminar_orden(index)"class="flex items-center justify-center w-9 h-9 rounded-md bg-white border border-[#e6e1db] hover:bg-[#FF6B6B]" aria-label="Eliminar item">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 256 256"><path d="M216,48H176V40a24,24,0,0,0-24-24H104A24,24,0,0,0,80,40v8H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM96,40a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8v8H96Zm96,168H64V64H192ZM112,104v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Zm48,0v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Z"></path></svg>
        </button>

        <button @click="activar_extra(index)" class="flex items-center gap-2 px-3 h-9 rounded-md bg-[#f4f3f0] hover:bg-[#FFD580]" aria-label="Configurar adicionales">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 -960 960 960" fill="#5f6368"><path d="M427-120v-225h60v83h353v60H487v82h-60Zm-307-82v-60h247v60H120Zm187-166v-82H120v-60h187v-84h60v226h-60Zm120-82v-60h413v60H427Zm166-165v-225h60v82h187v60H653v83h-60Zm-473-83v-60h413v60H120Z"></path></svg>

        </button>
      </div>
    </div>
  </div>




      </div>
              <!-- <div class="flex flex-col">
                <span>Tamaño</span>
                <div>
                <select v-model="item.tamanio" name="size_item_1" class="form-select h-9 rounded-md border border-[#e6e1db] bg-white text-sm text-[#181511] px-3 pr-10 min-w-[180px]" >
                  <option v-for="tamanio in tamanios" :value="tamanio.id">@{{tamanio.nombre}}</option>

                </select>

              </div>
            </div> -->
            <!-- <div>
                  <button @click="activar_extra(index)">Extras</button>
                </div> -->
                <!-- <div>
                  <button @click="eliminar_orden(index)">Eliminar</button>
                </div> -->

           </div>

     <div class="@container">
  <div class="px-4">
    <!-- Línea única: tamaño | (espacio) | acciones -->
    <div class="flex items-center justify-between gap-3">
      <!-- Left: etiqueta + select -->
      <!-- <div class="flex flex-col  items-start gap-2">
        <p class="text-sm text-[#897961] min-w-[72px]">Tamaño</p>
        <select name="size_item_1" class="form-select h-9 rounded-md border border-[#e6e1db] bg-white text-sm text-[#181511] px-3 pr-10 min-w-[180px]">
          <option value="small">Small (S)</option>
          <option value="medium" selected>Medium (M)</option>
          <option value="large">Large (L)</option>
        </select>
      </div> -->


      <!-- Right: botones eliminar y configurar (misma línea) -->
      <!-- <div class="flex items-center gap-3">

        <button @click="eliminar_orden(index)" class="flex items-center justify-center w-9 h-9 rounded-md bg-white border border-[#e6e1db] hover:bg-[#fff7f0]" aria-label="Eliminar item">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 256 256"><path d="M216,48H176V40a24,24,0,0,0-24-24H104A24,24,0,0,0,80,40v8H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM96,40a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8v8H96Zm96,168H64V64H192ZM112,104v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Zm48,0v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Z"></path></svg>
        </button>

        <button class="flex items-center gap-2 px-3 h-9 rounded-md bg-[#f4f3f0] hover:bg-[#e6e1db]" aria-label="Configurar adicionales">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 -960 960 960" fill="#5f6368"><path d="M427-120v-225h60v83h353v60H487v82h-60Zm-307-82v-60h247v60H120Zm187-166v-82H120v-60h187v-84h60v226h-60Zm120-82v-60h413v60H427Zm166-165v-225h60v82h187v60H653v83h-60Zm-473-83v-60h413v60H120Z"></path></svg>

        </button>
      </div> -->
    </div>
  </div>
</div>
            <div class="px-4">
              <hr class="border-t border-[#e6e1db] my-2" />
            </div>
            <h2 class="text-[#181511] text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5">Loyalty Program</h2>
            <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
              <label class="flex flex-col min-w-40 flex-1">
                <input
                  placeholder="Search Customer"
                  class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#181511] focus:outline-0 focus:ring-0 border border-[#e6e1db] bg-white focus:border-[#e6e1db] h-14 placeholder:text-[#897961] p-[15px] text-base font-normal leading-normal"
                  value=""
                />
              </label>
            </div>
            <div class="flex px-4 py-3">
              <button
                class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 flex-1 bg-[#f4f3f0] text-[#181511] text-sm font-bold leading-normal tracking-[0.015em] gap-2"
              >
                <svg  class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#5f6368"><path d="m523.5-263 139.54-140Q674-414 679-427.4q5-13.41 5-28.6 0-31.93-22.54-54.46Q638.93-533 607-533q-20.36 0-40.18 13T523-478q-24-29-43.29-42T440-533q-31.93 0-54.46 22.54Q363-487.93 363-456q0 15.19 5 28.6 5 13.4 15.96 24.4L523.5-263ZM863-404 557-97q-9 8.5-20.25 12.75T514.25-80Q503-80 492-84.5T472-97L98-472q-8-8-13-18.96-5-10.95-5-23.04v-306q0-24.75 17.63-42.38Q115.25-880 140-880h307q12.07 0 23.39 4.87Q481.7-870.25 490-862l373 373q9.39 9 13.7 20.25 4.3 11.25 4.3 22.5t-4.5 22.75Q872-412 863-404ZM516-138l306-307-375-375H140v304l376 378ZM245-664q21 0 36.5-15.5T297-716q0-21-15.5-36.5T245-768q-21 0-36.5 15.5T193-716q0 21 15.5 36.5T245-664Zm236 185Z"/></svg>
                <span class="truncate">Apply Loyalty Points</span>
              </button>
            </div>
            <div class="flex px-4 py-3">
              <button
                class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 flex-1 bg-[#f4f3f0] text-[#181511] text-sm font-bold leading-normal tracking-[0.015em]"
              >
                <span class="truncate">Enroll New Customer</span>
              </button>
            </div>
            <h2 class="text-[#181511] text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5">Total</h2>
            <div class="flex items-center gap-4 bg-white px-4 min-h-14 justify-between">
              <p class="text-[#181511] text-base font-normal leading-normal flex-1 truncate">Subtotal</p>
              <div class="shrink-0"><p class="text-[#181511] text-base font-normal leading-normal">$ @{{orden_summary.subtotal}}</p></div>
            </div>
            <div class="flex items-center gap-4 bg-white px-4 min-h-14 justify-between">
              <p class="text-[#181511] text-base font-normal leading-normal flex-1 truncate">Tax (@{{impuesto*100}}%)</p>
              <div class="shrink-0"><p class="text-[#181511] text-base font-normal leading-normal">$ @{{orden_summary.impuesto}}</p></div>
            </div>
            <div class="flex items-center gap-4 bg-white px-4 min-h-14 justify-between">
              <p class="text-[#181511] text-base font-normal leading-normal flex-1 truncate">Total</p>
              <div class="shrink-0"><p class="text-[#181511] text-base font-normal leading-normal">$ @{{orden_summary.total}}</p></div>
            </div>
            <h2 class="text-[#181511] text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5">Payment Method</h2>
            <div class="flex flex-wrap gap-3 p-4">
              <label
                class="text-sm font-medium leading-normal flex items-center justify-center rounded-lg border border-[#e6e1db] px-4 h-11 text-[#181511] has-[:checked]:border-[3px] has-[:checked]:px-3.5 has-[:checked]:border-[#ec9213] relative cursor-pointer"
              >
                Cash
                <input type="radio" class="invisible absolute" name="2c3d8e51-4e73-4539-bd2d-1d3678c37bc8" />
              </label>
              <label
                class="text-sm font-medium leading-normal flex items-center justify-center rounded-lg border border-[#e6e1db] px-4 h-11 text-[#181511] has-[:checked]:border-[3px] has-[:checked]:px-3.5 has-[:checked]:border-[#ec9213] relative cursor-pointer"
              >
                Card
                <input type="radio" class="invisible absolute" name="2c3d8e51-4e73-4539-bd2d-1d3678c37bc8" />
              </label>
              <label
                class="text-sm font-medium leading-normal flex items-center justify-center rounded-lg border border-[#e6e1db] px-4 h-11 text-[#181511] has-[:checked]:border-[3px] has-[:checked]:px-3.5 has-[:checked]:border-[#ec9213] relative cursor-pointer"
              >
                Mobile Pay
                <input type="radio" class="invisible absolute" name="2c3d8e51-4e73-4539-bd2d-1d3678c37bc8" />
              </label>
            </div>
            <div class="flex px-4 py-3">
              <button
              :disabled="procesando_orden"
                @click="guardar_orden"
                class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 flex-1 bg-[#059669] text-white text-sm font-bold leading-normal tracking-[0.015em] mr-2">
                <svg v-if="procesando_orden" width="30" height="30" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200"><circle fill="#FF156D" stroke="#FF156D" stroke-width="15" r="15" cx="40" cy="65"><animate attributeName="cy" calcMode="spline" dur="2" values="65;135;65;" keySplines=".5 0 .5 1;.5 0 .5 1" repeatCount="indefinite" begin="-.4"></animate></circle><circle fill="#FF156D" stroke="#FF156D" stroke-width="15" r="15" cx="100" cy="65"><animate attributeName="cy" calcMode="spline" dur="2" values="65;135;65;" keySplines=".5 0 .5 1;.5 0 .5 1" repeatCount="indefinite" begin="-.2"></animate></circle><circle fill="#FF156D" stroke="#FF156D" stroke-width="15" r="15" cx="160" cy="65"><animate attributeName="cy" calcMode="spline" dur="2" values="65;135;65;" keySplines=".5 0 .5 1;.5 0 .5 1" repeatCount="indefinite" begin="0"></animate></circle></svg>
              <span  v-else class="truncate">Complete Order</span>
              </button>
              <button
                @click="eliminar"
                class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 flex-1 bg-[#ef4444] text-white text-sm font-bold leading-normal tracking-[0.015em]">
                <span class="truncate">Vaciar</span>
              </button>
            </div>
          </div>
          <!-- Cotenido para agregar extras a las bebidas  -->
          <div v-if="extras" class="px-40 flex flex-1 justify-center py-5">
          <div class="layout-content-container flex flex-col w-[512px] max-w-[512px] py-5 max-w-[960px] flex-1">
            <div class="flex flex-wrap justify-between gap-3 p-4">
              <p class="text-[#181511] tracking-light text-[32px] font-bold leading-tight min-w-72">Personaiza tu prenda</p>
              <!-- -->@{{producto_seleccionado}}
            </div>
            <div v-for="cextra in categoria_complementos">
            <h3 class="text-[#181511] text-lg font-bold leading-tight tracking-[-0.015em] px-4 pb-2 pt-4">@{{cextra.nombre}}</h3>
            <div class="flex flex-wrap gap-3 p-4">
              <label v-for="extra in dame_extras(cextra.id)"
                @click="agregar_extra(extra)"
                      class="text-sm font-medium leading-normal flex items-center justify-center rounded-lg border border-[#e6e1db] px-4 h-11 text-[#181511] has-[:checked]:border-[3px] has-[:checked]:px-3.5 has-[:checked]:border-[#ec9213] relative cursor-pointer">
                @{{extra.nombre}} (+$@{{extra.precio}})
                <input type="radio" class="invisible absolute" name="44eb06a9-8655-41c3-b4b8-00ae39927731">
              </label>

            </div>
            </div>
            <!---->
            <h3 class="text-[#181511] text-lg font-bold leading-tight tracking-[-0.015em] px-4 pb-2 pt-4">Sweeteners</h3>
            <div class="flex flex-wrap gap-3 p-4">
              <label class="text-sm font-medium leading-normal flex items-center justify-center rounded-lg border border-[#e6e1db] px-4 h-11 text-[#181511] has-[:checked]:border-[3px] has-[:checked]:px-3.5 has-[:checked]:border-[#ec9213] relative cursor-pointer">
                Vanilla Syrup (+$0.30)
                <input type="radio" class="invisible absolute" name="08ee64a3-441c-43a5-a764-48380f872bd4">
              </label>
              <label class="text-sm font-medium leading-normal flex items-center justify-center rounded-lg border border-[#e6e1db] px-4 h-11 text-[#181511] has-[:checked]:border-[3px] has-[:checked]:px-3.5 has-[:checked]:border-[#ec9213] relative cursor-pointer">
                Caramel Syrup (+$0.30)
                <input type="radio" class="invisible absolute" name="08ee64a3-441c-43a5-a764-48380f872bd4">
              </label>
              <label class="text-sm font-medium leading-normal flex items-center justify-center rounded-lg border border-[#e6e1db] px-4 h-11 text-[#181511] has-[:checked]:border-[3px] has-[:checked]:px-3.5 has-[:checked]:border-[#ec9213] relative cursor-pointer">
                Hazelnut Syrup (+$0.30)
                <input type="radio" class="invisible absolute" name="08ee64a3-441c-43a5-a764-48380f872bd4">
              </label>
              <label class="text-sm font-medium leading-normal flex items-center justify-center rounded-lg border border-[#e6e1db] px-4 h-11 text-[#181511] has-[:checked]:border-[3px] has-[:checked]:px-3.5 has-[:checked]:border-[#ec9213] relative cursor-pointer">
                Honey (+$0.20)
                <input type="radio" class="invisible absolute" name="08ee64a3-441c-43a5-a764-48380f872bd4">
              </label>
              <label class="text-sm font-medium leading-normal flex items-center justify-center rounded-lg border border-[#e6e1db] px-4 h-11 text-[#181511] has-[:checked]:border-[3px] has-[:checked]:px-3.5 has-[:checked]:border-[#ec9213] relative cursor-pointer">
                Sugar (+$0.00)
                <input type="radio" class="invisible absolute" name="08ee64a3-441c-43a5-a764-48380f872bd4">
              </label>
            </div>
            
            <h3 class="text-[#181511] text-lg font-bold leading-tight tracking-[-0.015em] px-4 pb-2 pt-4">Toppings</h3>
            <div class="flex flex-wrap gap-3 p-4">
              <label class="text-sm font-medium leading-normal flex items-center justify-center rounded-lg border border-[#e6e1db] px-4 h-11 text-[#181511] has-[:checked]:border-[3px] has-[:checked]:px-3.5 has-[:checked]:border-[#ec9213] relative cursor-pointer">
                Whipped Cream (+$0.40)
                <input type="radio" class="invisible absolute" name="89364acb-0b64-4691-a734-ba66d4e039d9">
              </label>
              <label class="text-sm font-medium leading-normal flex items-center justify-center rounded-lg border border-[#e6e1db] px-4 h-11 text-[#181511] has-[:checked]:border-[3px] has-[:checked]:px-3.5 has-[:checked]:border-[#ec9213] relative cursor-pointer">
                Cinnamon (+$0.10)
                <input type="radio" class="invisible absolute" name="89364acb-0b64-4691-a734-ba66d4e039d9">
              </label>
              <label class="text-sm font-medium leading-normal flex items-center justify-center rounded-lg border border-[#e6e1db] px-4 h-11 text-[#181511] has-[:checked]:border-[3px] has-[:checked]:px-3.5 has-[:checked]:border-[#ec9213] relative cursor-pointer">
                Cocoa Powder (+$0.10)
                <input type="radio" class="invisible absolute" name="89364acb-0b64-4691-a734-ba66d4e039d9">
              </label>
            </div>
            
            <h3 class="text-[#181511] text-lg font-bold leading-tight tracking-[-0.015em] px-4 pb-2 pt-4">Temperature &amp; Size</h3>
            <div class="flex flex-wrap gap-3 p-4">
              <label class="text-sm font-medium leading-normal flex items-center justify-center rounded-lg border border-[#e6e1db] px-4 h-11 text-[#181511] has-[:checked]:border-[3px] has-[:checked]:px-3.5 has-[:checked]:border-[#ec9213] relative cursor-pointer">
                Hot (+$0.00)
                <input type="radio" class="invisible absolute" name="117623c2-c8b3-4ab4-8721-8aabd5f4bb6c">
              </label>
              <label class="text-sm font-medium leading-normal flex items-center justify-center rounded-lg border border-[#e6e1db] px-4 h-11 text-[#181511] has-[:checked]:border-[3px] has-[:checked]:px-3.5 has-[:checked]:border-[#ec9213] relative cursor-pointer">
                Iced (+$0.00)
                <input type="radio" class="invisible absolute" name="117623c2-c8b3-4ab4-8721-8aabd5f4bb6c">
              </label>
              <label class="text-sm font-medium leading-normal flex items-center justify-center rounded-lg border border-[#e6e1db] px-4 h-11 text-[#181511] has-[:checked]:border-[3px] has-[:checked]:px-3.5 has-[:checked]:border-[#ec9213] relative cursor-pointer">
                Small (+$0.00)
                <input type="radio" class="invisible absolute" name="117623c2-c8b3-4ab4-8721-8aabd5f4bb6c">
              </label>
              <label class="text-sm font-medium leading-normal flex items-center justify-center rounded-lg border border-[#e6e1db] px-4 h-11 text-[#181511] has-[:checked]:border-[3px] has-[:checked]:px-3.5 has-[:checked]:border-[#ec9213] relative cursor-pointer">
                Medium (+$0.50)
                <input type="radio" class="invisible absolute" name="117623c2-c8b3-4ab4-8721-8aabd5f4bb6c">
              </label>
              <label class="text-sm font-medium leading-normal flex items-center justify-center rounded-lg border border-[#e6e1db] px-4 h-11 text-[#181511] has-[:checked]:border-[3px] has-[:checked]:px-3.5 has-[:checked]:border-[#ec9213] relative cursor-pointer">
                Large (+$1.00)
                <input type="radio" class="invisible absolute" name="117623c2-c8b3-4ab4-8721-8aabd5f4bb6c">
              </label>
            </div>
            <p class="text-[#897961] text-sm font-normal leading-normal pb-3 pt-1 px-4">Total Customization Cost: $1.30</p>
              <div class="flex px-4 py-3 justify-end gap-4">
            <button 
              @click="extras=false"
              class="px-4 py-2 rounded-lg text-white bg-red-600 text-sm font-medium">
              Cancelar
            </button>
            <button class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-[#ec9213] text-[#181511] text-sm font-bold leading-normal tracking-[0.015em] ">
              <span class="truncate">Confirm Customization</span>
            </button>
          </div>
        </div>
        <!-- Seccion de la gestion de la orden //hover:bg-orange-600 hover:text-white// -->
      </div>

    </div>
    <script src="{{asset('vue.js')}}"></script>
    <script>
    var app = new Vue({
            el: '#app'
            //Es el estado de la aplicacion
            ,data:function(){
                return {
                   productos:[]
                   ,categorias: <?php echo json_encode($categorias); ?>
                   ,complementos: <?php echo json_encode($extra); ?>
                   ,categoria_complementos: <?php echo json_encode($categoria_extras); ?>
                   ,orden:[]
                   ,clientes:[]
                   ,metodos_pago:[] 
                   ,tamanios:[]
                   ,categoria_seleccionada:1
                   ,impuesto:.16
                   ,extras:false
                   ,producto_seleccionado:-1
                   ,procesando_orden:false


              }

            }

            ,computed:{
               subtotal:function(){

                    return 0;
                  }

                  ,impuesto:function(){

                    return 0;
                  }


                  ,total:function(){

                    return 0;
                  }

                  ,productos_seleccionados:function(){
                    var sd=this;
                    return this.productos.filter(function(item){
                      return item.categoria== sd.categoria_seleccionada;
                    });
                  }

                  ,nomcategoria:function(){

                    var sd=this;
                    let dx=this.categorias.findIndex(function(item){
                      return item.id==sd.categoria_seleccionada;
                    });

                    if(dx==-1)
                    return 'Sin categoria';
                    else
                    return this.categorias[dx].nombre;

                  }

                  ,orden_summary:function(){
                    let ty={
                      subtotal:0
                      ,impuesto:0
                      ,total:0
                    }
                    ty.subtotal=this.orden.reduce(function(rf,item){
                      rf=rf+parseFloat(item.precio);
                      return rf;
                    },0);
                    ty.impuesto=ty.subtotal*parseFloat(this.impuesto);
                    ty.total= ty.subtotal+ty.impuesto;
                    return ty;
                  }

              }
                     ,methods:{
                      agregar_orden:function(item){
                        //this.orden.push(item);

                        this.orden.push({
                          id:item.id
                          ,nombre:item.nombre
                          ,precio:item.precio
                          ,descripcion:item.descripcion
                          ,tamanio:1
                          ,extras:[]
                        });

                        //this.orden.push({
                          //tamanio:1
                          //,...item
                        //});

                      }

                      ,eliminar_orden:function(index){
                        this.orden.splice(index,1);
                      }

                      ,limpiar_orden:function(){
                        this.orden.splice(0,this.orden.length);
                      }
                      
                      ,eliminar:function(index){
                        this.orden.splice(index);
                      }

                      ,guardar_orden:function(){
                        console.log('a guardar se ha dicho');
                        this.procesando_orden=true;
                            var self=this;
                            //El objetivo XMLHttpRequest es el encargado de hacer las peticiones asincronas
                            var xhr = new XMLHttpRequest();
                          //Aqui se abre la conexion, se indica a que URL (ruta)se va a acceder
                          //Y si se va a utilizar GET o POST
                          xhr.open('POST', '/api/venta/save', true);
                          //Se hace esta linea para indicar a Javascript que este pendiente
                          //cuando el estado de la peticion cambie
                          xhr.onreadystatechange =  function(){
                          //En esta linea preguntamos si la conexion se ha terminado
                              if (this.readyState == 4){
                                  self.procesando_orden=false;
                                if (this.status == 200){
                                    alert('Orden guardada');
                            }
                            else{
                                alert('Algo salio mal');
                            }
                            self.limpiar_orden();
                        }
                        }
                      xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
                      xhr.send(JSON.stringify(this.orden));

                      }

                      ,dame_extras:function(idcategoria){
                        return this.complementos.filter(function(item){
                          return item.idcategoria==idcategoria;
                        })

                      }

                      ,activar_extra:function(index){
                        this.extras=true;
                        this.producto_seleccionado=index;
                      }

                      ,agregar_extra:function(extra){
                        this.orden[this.producto_seleccionado].extras.push(extra);
                      }


                     }
                      ,created(){
                      var self=this;
                      //El objetivo XMLHttpRequest es el encargado de hacer las peticiones asincronas
                      var xhr = new XMLHttpRequest();
                    //Aqui se abre la conexion, se indica a que URL (ruta)se va a acceder
                    //Y si se va a utilizar GET o POST
                    xhr.open('GET', '{{route("productos")}}', true);
                    //Se hace esta linea para indicar a Javascript que este pendiente
                    //cuando el estado de la peticion cambie
                    xhr.onreadystatechange =  function(){
                    //En esta linea preguntamos si la conexion se ha terminado
                        if (this.readyState == 4){
                            //Es que el resultado de la conexion sea exitoso
                            if (this.status == 200){
                                //En esta variable se encuentra el contenido de la respuesta
                                //Que viene del backend this.responseText
                                info=JSON.parse(this.responseText);
                                //console.log(info);
                                for(e=0;e<info.length;e++){
                                  self.productos.push(info[e]);
                                  console.log(self.productos);
                                }

                        }
                        else{
                            alert('Algo salio mal');
                        }
                    }
                    }
                  xhr.send();



                  //var xhr = new XMLHttpRequest();
                    //Aqui se abre la conexion, se indica a que URL (ruta)se va a acceder
                    //Y si se va a utilizar GET o POST
                    //xhr.open('GET', '{{route("categorias")}}', true);
                    //Se hace esta linea para indicar a Javascript que este pendiente
                    //cuando el estado de la peticion cambie
                    //xhr.onreadystatechange =  function(){
                    //En esta linea preguntamos si la conexion se ha terminado
                        //if (this.readyState == 4){
                            //Es que el resultado de la conexion sea exitoso
                            //if (this.status == 200){
                                //En esta variable se encuentra el contenido de la respuesta
                                //Que viene del backend this.responseText
                                //info=JSON.parse(this.responseText);
                                //console.log(info);
                                //for(e=0;e<info.length;e++){
                                  //self.categorias.push(info[e]);
                                  //console.log(self.categorias);
                                //}

                        //}
                        //else{
                            //alert('Algo salio mal');
                        //}
                    //}
                    //}
                  //xhr.send();

                   var xhr = new XMLHttpRequest();
                    //Aqui se abre la conexion, se indica a que URL (ruta)se va a acceder
                    //Y si se va a utilizar GET o POST
                    xhr.open('GET', '{{route("tamanios")}}', true);
                    //Se hace esta linea para indicar a Javascript que este pendiente
                    //cuando el estado de la peticion cambie
                    xhr.onreadystatechange =  function(){
                    //En esta linea preguntamos si la conexion se ha terminado
                        if (this.readyState == 4){
                            //Es que el resultado de la conexion sea exitoso
                            if (this.status == 200){
                                //En esta variable se encuentra el contenido de la respuesta
                                //Que viene del backend this.responseText
                                info=JSON.parse(this.responseText);
                                //console.log(info);
                                for(e=0;e<info.length;e++){
                                  self.tamanios.push(info[e]);
                                  console.log(self.tamanios);
                                }

                        }
                        else{
                            alert('Algo salio mal');
                        }
                    }
                    }
                  xhr.send();


          }

        });

    </script>
  </body>
</html>
