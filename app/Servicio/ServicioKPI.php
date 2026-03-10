<?php
namespace App\Servicio;
use App\Models\DetalleOrden;
use App\Models\Orden;
use App\Models\ExtraOrden;
use Illuminate\Support\Facades\DB;

class ServicioKPI
{
    //Key 
    //Perfomance
    //Indicator

    //Total de ventas de los ultimos N meses
    //Atributos 
        //Meses-cuantos meses antes genero el KPI
    
    /**
     * 
     * select SUM(orden.total)
     * from orden
     * where DATE_SUB(now(), INTERVAL 3 MONTH)
     * 
     * 
     * select SUM(detalle_orden.cantidad*detalle_orden.precio)
     * from orden
     * join detalle_orden on detalle_orden.idorden=orden.id
     * where detalle_orden.idproducto=1
     * and DATE_SUB(now(), INTERVAL 3 MONTH)
     * 
     * SIN FILTRO DE PRODUCTO
     *  select SUM(Orden.total)
     * from orden
     * where DATE_SUB(now(), INTERVAL 3 MONTH)
     * group by DATE_FORMAT(orden.fecha, "%m-%Y")
     * order by DATE_FORMAT(orden.fecha, "%Y-%m") desc
     * 
     * CON FILTRO DE PRODUCTO
     * select SUM(detalle_orden.cantidad*detalle_orden.precio)
     * from orden
     * join detalle_orden on orden.id=detalle_orden.idorden
     * where DATE_SUB(now(), INTERVAL 3 MONTH)
     * and detalle_orden.idproducto=13
     * group by DATE_FORMAT(orden.fecha, "%m-%Y")
     * order by DATE_FORMAT(orden.fecha, "%Y-%m") desc
     */
    function total_ventas($objeto){
       if(!isset($objeto->meses)){
            $objeto->meses = 3;
       }
       
       if(!isset($objeto->idproducto)){
            $objeto->idproducto = 0;
       }

       if(!isset($objeto->tendencias)){
            $objeto->tendencias = false;
       }
       //1.Defino la consulta base
       if($objeto->idproducto==0){
        //sin filtro de producto
            $consulta = DB::table("orden")
                ->select(
                    DB::raw("SUM(orden.total) as total_ventas"))
                ->whereRaw("orden.fecha >= DATE_SUB(now(), INTERVAL ".$objeto->meses." MONTH)");
       }
       else{
        //con filtro de producto
        $consulta = DB::table("orden")
                ->join("detalle_orden", "detalle_orden.idorden", "=", "orden.id")
                ->select(
                    DB::raw("SUM(detalle_orden.cantidad * detalle_orden.precio) as total_ventas"))
                ->whereRaw("orden.fecha >= DATE_SUB(now(), INTERVAL ".$objeto->meses." MONTH)")
                ->where("detalle_orden.idproducto", $objeto->idproducto);
       }

        //2.configuro la consulta 
        if($objeto->tendencias){
            $consulta->groupBy(DB::raw("DATE_FORMAT(orden.fecha, '%m-%Y')"))
                    ->orderBy(DB::raw("DATE_FORMAT(orden.fecha, '%Y-%m')"), "asc")
                    ->addSelect(DB::raw("DATE_FORMAT(orden.fecha, '%m-%Y') as fecha"));
        }


        //3.ejecuto la consulta
        return $consulta->get();  
        //return array();
       // return null; //← SOLO PARA PRUEBAS, LUEGO ELIMINAR ESTA LÍNEA Y DESCOMENTAR LA ANTERIOR  
    }
    /**
     * consulta base
     * select orden.canal
     * ,sum(orden.total)
     * from orde
     * where orden.fecha>=DATE_SUB(now(), INTERVAL 3 MONTH)
     * group by orden.canal
     * order by sum(orden.total) desc
     * 
     * select orden.canal
     * ,sum(orden.total)
     * ,Date_FORMAT(orden.fecha, "%m-%Y") 
     * from orde
     * where orden.fecha>=DATE_SUB(now(), INTERVAL 3 MONTH)
     * group by orden.canal,Date_FORMAT(orden.fecha, "%m-%Y")
     * order by Date_FORMAT(orden.fecha, "%m-%Y") desc
     */
    function tendencias_canal($objeto){
        if(!isset($objeto->meses)){
            $objeto->meses = 3;
       }
       
       if(!isset($objeto->tendencias)){
            $objeto->tendencias = false;
       }

        //1.Defino la consulta base
        $consulta = DB::table("orden")
                ->select(
                    DB::raw("SUM(orden.total) as total_ventas")
                    ,"orden.canal"
                )
                ->whereRaw("orden.fecha >= DATE_SUB(now(), INTERVAL ".$objeto->meses." MONTH)")
                ->groupBy("orden.canal");
                //->orderBy(DB::raw("SUM(orden.total)"), "desc");

                
        if($objeto->tendencias){
            $consulta->groupBy(DB::raw("DATE_FORMAT(orden.fecha, '%m-%Y')"))
                    ->orderBy(DB::raw("DATE_FORMAT(orden.fecha, '%Y-%m')"), "asc")
                    ->addSelect(DB::raw("DATE_FORMAT(orden.fecha, '%m-%Y') as fecha"));
        }
        //3.ejecuto la consulta
        return $consulta->get();

    }

    //producto mas vendido
    //producto menos vendido
    //tedencias por producto
    /**
     * select producto.nombre
     * ,sum(detalle_orden.cantidad*detalle_orden.precio)
     * from detalle_orden
     * join producto on detalle_orden.idproducto=producto.id
     * join orden on orden.id=detalle_orden.idorden
     * where orden.fecha>=DATE_SUB(now(), INTERVAL 3 MONTH)
     * grup by producto.id
     * order by sum(detalle_orden.cantidad*detalle_orden.precio) desc
     */

    function ventas_productos($objeto){
        if(!isset($objeto->meses)){
            $objeto->meses = 3;
        }
        
        if(!isset($objeto->tendencias)){
            $objeto->tendencias = false;
        }

        if(!isset($objeto->idproducto)){
            $objeto->idproducto = 0;
        }
        $consulta = DB::table('orden')
                ->join('detalle_orden', 'orden.id', '=', 'detalle_orden.idorden')
                ->join('producto', 'detalle_orden.idproducto', '=', 'producto.id')
                ->select(
                    "producto.nombre",
                    DB::raw("SUM(detalle_orden.cantidad * detalle_orden.precio) as total")
                )
                ->whereRaw("orden.fecha >= DATE_SUB(now(), INTERVAL ".$objeto->meses." MONTH)")
                ->groupBy("producto.id", "producto.nombre")
                ->orderBy(DB::raw("SUM(detalle_orden.cantidad * detalle_orden.precio)"), "desc");
        if($objeto->tendencias){
            $consulta->groupBy(DB::raw("DATE_FORMAT(orden.fecha, '%m-%Y')"))
                    ->orderBy(DB::raw("DATE_FORMAT(orden.fecha, '%Y-%m')"), "asc")
                    ->addSelect(DB::raw("DATE_FORMAT(orden.fecha, '%m-%Y') as fecha"));
        }
        
        if($objeto->idproducto!=0){
            $consulta->where("producto.id", $objeto->idproducto);
        }

        return $consulta->get();
    }
    
    /**
     * con filtro de clientes 
     * select cateforia.nombre
     * ,sum(detalle_orden.cantidad*detalle_orden.precio)
     * from orden
     * join detalle_orden on orden.id=detalle_orden.idorden
     * join producto on producto.id=detalle_orden.idproducto
     * join categoria on categoria.id=producto.categoria
     * join cliente on orden.idcliente=cliente.id
     * where DaTE_SUB(now(), INTERVAL 3 MONTH)
     * and cliente.genero="Mujer"
     * 
     * sin filtro de clientes 
     * select cateforia.nombre
     * ,sum(detalle_orden.cantidad*detalle_orden.precio)
     * from orden
     * join detalle_orden on orden.id=detalle_orden.idorden
     * join producto on producto.id=detalle_orden.idproducto
     * join categoria on categoria.id=producto.categoria
     * where DaTE_SUB(now(), INTERVAL 3 MONTH)
     */

    function total_categorias($objeto){
        if(!isset($objeto->genero)){
            $objeto->genero = '';
        }

        if(!isset($objeto->meses)){
            $objeto->meses = 3;
        }
        
        $consulta = DB::table('orden')
            ->join('detalle_orden', 'orden.id', '=', 'detalle_orden.idorden')
            ->join('producto', 'detalle_orden.idproducto', '=', 'producto.id')
            ->join('categoria', 'categoria.id', '=', 'producto.categoria')
            ->select(
                "categoria.nombre",
                DB::raw("SUM(detalle_orden.cantidad * detalle_orden.precio) as total")
            )
            ->whereRaw("orden.fecha >= DATE_SUB(now(), INTERVAL ".$objeto->meses." MONTH)")
                ->groupBy("categoria.id", "categoria.nombre"); 

        if($objeto->genero != ''){
            $consulta->join('cliente', 'orden.idcliente', '=', 'cliente.id')
                        ->where("cliente.genero", $objeto->genero);
        }

        return $consulta->get();
    }

    /**
     * select cliente.genero
     * ,count(*)as total
     * from cliente 
     * grouby cliente.genero
     */
    function demografico_genero($objeto){
            if(!isset($objeto->idedad))
                $objeto->idedad = 0;
            if(!isset($objeto->idocupacion))
                $objeto->idocupacion = 0;

            $consulta = DB::table('cliente')
                ->select(
                    "cliente.genero",
                    DB::raw("COUNT(*) as total")
                )
                ->groupBy("cliente.genero");
                if($objeto->idedad!= 0){
                $consulta->where("cliente.idedad", $objeto->idedad);
                }
                if($objeto->idocupacion!= 0){
                $consulta->where("cliente.idocupacion", $objeto->idocupacion);
                }
    
            return $consulta->get();   
    }

}