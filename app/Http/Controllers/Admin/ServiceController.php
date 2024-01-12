<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreUpdateService;
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
            if (auth()->user()->is_admin === 1) {
                return view('admin\services\create');
            }
    
            else {
                abort(401, 'Acesso não autorizado.');
            }

    }

    public function store(StoreUpdateService $request, Service $service)
    {
        $data = $request->validated();

        $service = $service->create($data);

        return redirect()->route('services.index')->with('msg', 'Serviço cadastrado com sucesso!');
    }

    public function edit(Service $service, string | int $id)
    {
        // Verificar se o usuário é administrador
        if (auth()->user()->is_admin != 1) {
            abort(401, 'Acesso não autorizado.');
        }
    
        if (!$service = $service->where('id', $id)->first()) {
            return back();
        }
    
        return view('admin.services.edit', compact('service'));
    }
    

    public function update(StoreUpdateService $request, Service $service, string $id)
{
    // Verificar se o usuário é administrador
    if (auth()->user()->is_admin != 1) {
        abort(401, 'Acesso não autorizado.');
    }

    if (!$service = $service->find($id)) {
        return back();
    }

    $service->update($request->validated());

    return redirect()->route('services.index')->with('msg', 'Serviço editado com sucesso!');
}


    public function destroy(string | int $id)
    {
        $service = Service::findOrFail($id);

        if (auth()->user()->is_admin === 1) {
            $service->delete();
            return redirect()->route('services.index')->with('msg', 'Serviço excluido com sucesso!');
        }

        else {
            abort(401, 'Acesso não autorizado.');
        }

        if (!$service = Service::find($id)) {
            return back();
        }
    }

}
