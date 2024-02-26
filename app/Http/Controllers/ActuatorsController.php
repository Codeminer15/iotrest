<?php

namespace App\Http\Controllers;

use App\Models\Actuator;
use Illuminate\Http\Request;

class ActuatorsController extends Controller
{
    public function index()
    {
        return Actuator::paginate();
    }

    public function show($id){
        return Actuator::find($id);
    }

    //crear un usuario
    public function store(Request $request){
        //Error controlado de validación
        $this->validate($request, [
            'name' => 'required|unique:actuators',
            'type' => 'required',
            'value' => 'required',
            'date' => 'required',
            'user_id' => 'required'
        ]);
        $actuator = new Actuator;
        $actuator->fill($request->all());
        $actuator->date = date('Y-m-d H:i:s');
        $actuator->user_id = $request->user()->id;
        $actuator->save();
        return $actuator;
    }

    //actualilzar un usuario
    public function update(Request $request, $id){
        $actuator = Actuator::find($id);
        if(!$actuator) return response('',404);
            $actuator->fill($request->all());
        $actuator->save();
        return $actuator;
    }

    //eliminar un usuario
    public function delete(Request $request, $id){
        $actuator = Actuator::find($id);
        if(!$actuator) return response('',404);
        $actuator->delete();
        return $actuator;
    }
}
