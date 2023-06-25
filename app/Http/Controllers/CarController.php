<?php
namespace App\Http\Controllers;

use App\Models\Car;

use Illuminate\Http\Request;
use App\Http\Requests\CarRequest;
use App\Http\Resources\CarResource;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();

        return response()->json($cars);
    }



    public function store(CarRequest $request)
{
    $input = $request->all();

    $existingCar = Car::where('model', $input['model'])
                        ->where('color', $input['color'])
                        ->first();

    if ($existingCar) {
        $existingCar->quantity += $input['quantity'];
        $existingCar->save();

        return response()->json($existingCar, 200);
    }

    $car = Car::create($input);

    return response()->json($car, 201);
}


    public function show($id)
    {
        $car = Car::findOrFail($id);

        return response()->json($car);
    }

    public function update(CarRequest $request, $id)
    {
        $car = Car::findOrFail($id);
        $car->update($request->all());

        return CarResource::collection(
            Car::all()
      );
    }

    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();

        return response()->json(null, 204);
    }


    public function search($name)
    {

        if ($name) {
            return Car::where('model', $name)
            ->orWhere('model',"like","$name%",$name)->

            orWhere('id',$name)->get();

        }

     }

}







