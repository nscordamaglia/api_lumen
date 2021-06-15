<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Traits\ParseTrait;
use Illuminate\Http\Request;

class PropiedadesController extends Controller
{
    use ParseTrait;
    //TODO mejorar las respuestas
    /***
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
	public function index(Request $request)
	{
        $this->validate($request, [
            'property_type' => 'numeric',
            'transaction_type' => 'numeric',
            'price-min' => 'numeric',
            'price-max' => 'numeric',
            'search' => 'string'
        ]);

        //TODO llamada with para las relaciones necesarias
        $query = Item::query();
        $paginate = 15;

        if ($request->has('paginate')) {
            $paginate = $request->input('paginate');
        }

        //TODO evaluar el uso de librearia externa
        $query = $this->parserRequest($query, $request);
        $result = $query->orderBy('id')->paginate($paginate);
        return response()->json($result);
	}

    /***
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
	public function show($id)
    {
        $result = Item::findOrFail($id);
        return response()->json($result);
    }

    /***
     * @param Item $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
            'status' => 'required|in:available,rented,closed',
        ]);

        $result = Item::findOrFail($id);
        $result->update(['status' => $request->input('status')]);
        return response()->json("{$id} updated");
    }

    /***
     * @param Item $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $result = Item::findOrFail($id);
        $result->delete();
        return response()->json("{$id} deleted");
    }
}

