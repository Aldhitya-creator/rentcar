<?php

namespace App\Http\Controllers\Admin;


use App\Models\Car;
use App\Models\Type;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\CarRequest;

class CarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::get();

        return view('admin.cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $statuses = Car::statuses();
        $types = Type::get(['id','nama']);

        return view('admin.cars.create', compact('statuses','types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarRequest $request)
    {
        $input = $request->all();
           //upload image pastiin di database admin path nya bener misal img/cars/1712071299.jpg 
           //bukan kayak gini C:\xampp\tmp\php38A9.tmp karena yang ini path nya salah atau unable
           if (request()->file('image')) {
            $image = request()->file('image');
            $imageUrl = $image->storeAs("public/images", time() . ".{$image->extension()}");
        } else {
            $imageUrl = null;
        }
        $input['image'] = "$imageUrl";
        $car = Car::create($input);
        return redirect()->route('admin.cars.index')->with([
            'message' => 'berhasil di buat',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        $statuses = Car::statuses();
        $types = Type::get(['id','nama']);

        return view('admin.cars.edit', compact('statuses','types','car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarRequest $request, Car $car)
    {
        $input = $request->all();
        if (request()->file('image')) {
            if ($car->image && Storage::exists($car->image)) {
                Storage::delete($car->image);
            }
            $image = request()->file('image');
            $imageUrl = $image->storeAs("public/images", time() . ".{$image->extension()}");
        } else {
            $imageUrl = $car->image;
        }
        $input['image'] = "$imageUrl";
 
        $car->update($input);
        return redirect()->route('admin.cars.index')->with([
            'message' => 'berhasil di edit',
            'alert-type' => 'info'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {  
        if ($car->image && Storage::exists($car->image)) {
        Storage::delete($car->image);
    }
        $car->delete();

        return redirect()->back()->with([
            'message' => 'berhasil di hapus',
            'alert-type' => 'danger'
        ]);
    }
}
