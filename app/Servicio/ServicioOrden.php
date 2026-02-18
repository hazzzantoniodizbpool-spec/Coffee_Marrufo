<?php
namespace App\Servicio;
use App\Models\DetalleOrden;
use App\Models\Orden;
use App\Models\ExtraOrden;

class ServicioOrden
{
    function registrar($objeto)
    {
       $o=new Orden();
       $o->idusuario=$objeto->idusuario;
       $o->idcliente=$objeto->idcliente;
       $o->total=0;

        if(isset($objeto->canal))
            $o->canal=$objeto->canal;
        else
            $o->canal="WEB";

        if(isset($objeto->idcanal))
            $o->idcanal=$objeto->idcanal;
        else
            $o->idcanal=0;

       if(isset($objeto->fecha))
        $o->fecha=$objeto->fecha;
       else
       $o->fecha=now();

       if(isset($objeto->status))
        $o->status=$objeto->status;
       else
       $o->status=1;
       $o->num_productos=0;
        $o->save();

        $total=0;
        $num_productos=0;

        foreach($objeto->productos as $elemento){
            $d=new DetalleOrden();
            $d->idorden=$o->id;
            $d->idproducto=$elemento['id'];
            if(isset($elemento['cantidad']))
            $d->cantidad=$elemento['cantidad'];
            else
                $d->cantidad=1;

            $d->precio=$elemento['precio'];
              if(isset($elemento['idpromocion']))
            $d->idpromocion=$elemento['idpromocion'];
            else
                $d->idpromocion=0;

            // 🔴 CORREGIDO: PRIMERO guardar el detalle para generar el ID
            $d->save();

            // 🔴 CORREGIDO: AHORA procesar los extras con el ID ya existente
            foreach($elemento['extras'] as $extra){
                $ex=new ExtraOrden();
                $ex->idextra=$extra['id'];
                $ex->iddetalle_orden=$d->id; // ✅ AHORA SÍ TIENE ID
                $ex->precio=$extra['precio'];
                if(isset($extra['cantidad']))
                    $ex->cantidad=$extra['cantidad'];
                else
                    $ex->cantidad=1;

                $total=$total+($ex->cantidad*$extra['precio']);
                $ex->save();
            }

            // 🔴 CORREGIDO: Calcular total después de guardar extras
            $total=$total+($d->cantidad*$d->precio);
            $num_productos=$num_productos+$d->cantidad;
            
            // 🔴 NOTA: El $d->save() de aquí se ELIMINÓ porque ya se guardó arriba
        }

        $o->total=$total;
        $o->num_productos=$num_productos;
        $o->save();
    }
}