<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Service $service)
    {
        $services = $service->all();


        return view('admin\services\index', compact('services'));
    }

    public function show(string|int $id)
    {
        if (!$service = Service::find($id)) {
            return back();
        }

        return view('admin\services\show', compact('service'));
    }


    public function create()
    {
        return view('admin\services\create');
    }

    public function store(Request $request, Service $service)
    {
        $data = $request->all();

        $service = $service->create($data);

        return redirect()->route('services.index');
    }

    public function edit(Service $service, string | int $id)
    {
        if (!$service = $service->where('id', $id)->first()) {
            return back();
        };

        return view ('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service, string $id)
    {
        if (!$service = $service->find($id)) {
            return back();
        }

        $service->update($request->only([
            'title', 'description'
        ]));

        return redirect()->route('services.index');
    }

    public function destroy(string | int $id)
    {
        if (!$service = Service::find($id)) {
            return back();
        }

        $service->delete();

        return redirect()->route('services.index');
    }
}
