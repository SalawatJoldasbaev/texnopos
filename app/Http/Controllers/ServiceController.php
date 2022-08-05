<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Requests\ServiceCreateRequest;

class ServiceController extends Controller
{
    public function create(ServiceCreateRequest $request)
    {
        Service::create([
            'name' => $request->name,
            'type' => $request->type,
            'description' => $request->description,
            'image' => $request->image,
            'technologies' => $request->technologies
        ]);
        return ResponseController::success();
    }
    public function index()
    {
        $services = Service::all(['id', 'name', 'type', 'description', 'image', 'technologies']);
        return ResponseController::data($services);
    }
    public function update(Service $service, Request $request)
    {
        $service->update($request->all());
        return ResponseController::success();
    }
    public function delete(Service $service)
    {
        $service->delete();
        return ResponseController::success();
    }
}
