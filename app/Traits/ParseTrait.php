<?php

namespace App\Traits;

trait ParseTrait
{
    public function parserRequest($query, $request)
    {
        //TODO agregar filtros restantes y refactorizarlo
        if ($request->has('price-min')) {

                $query->where('price','>=',$request->input('price-min'));

        }
        if ($request->has('price-max')) {

           $query->where('price','<=',$request->input('price-max'));

        }

        return $query;
    }
}