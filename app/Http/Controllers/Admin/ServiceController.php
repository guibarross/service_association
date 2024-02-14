<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreUpdateService;
use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;


class ServiceController extends Controller
{
    public function index(Service $service)
    {
        $services = $service::paginate(6);


        return view('admin\services\index', compact('services'));
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
        } else {
            abort(401, 'Acesso não autorizado.');
        }

        if (!$service = Service::find($id)) {
            return back();
        }
    }

    public function associateUser(Service $service, $id)
    {

        $user = auth()->user();

        if (auth()->user()->is_admin === 1) {
            abort(401, 'Acesso não autorizado.');
        }

        $service = $service->findOrFail($id);

        if ($user->associatedServices->contains($service)) {
            return redirect()->route('services.show', ['id' => $service->id])->with('msg', 'Este serviço já foi associado.');
        }

        $user->associatedServices()->attach($service);

        return redirect()->route('user.services', compact('user'))->with('msg', 'Serviço associado com sucesso!');
    }


    public function userServices(User $user)
    {

        $user = auth()->user();

        // Recupere os serviços associados ao usuário
        $services = $user->associatedServices;

        return view('admin.services.user-services', compact('services', 'user'));
    }

    public function disassociationUser(Service $service, $id)
    {

        $user = auth()->user();

        if (auth()->user()->is_admin === 1) {
            abort(401, 'Acesso não autorizado.');
        }

        $service = $service->findOrFail($id);

        $user->associatedServices()->detach($service);

        return redirect()->route('user.services', compact('user'))->with('msg', 'Serviço desassociado com sucesso!');
    }


    public function userAssociated($serviceId)
    {
        $service = Service::findOrFail($serviceId);

        // Verifique se o usuário é administrador
        if (auth()->user()->is_admin !== 1) {
            abort(401, 'Acesso não autorizado.');
        }

        // Recupere os usuários associados a este serviço
        $users = $service->users;

        return view('admin.services.user-associated', compact('users', 'service'));
    }


    public function search(Request $request)
    {
        $query = $request->input('query');
    
        $services = Service::query();
    
        if ($query) {
            $services = $services->where('title', 'LIKE', "%$query%")
                                ->orWhere('description', 'LIKE', "%$query%")
                                ->orWhere('local', 'LIKE', "%$query%");
        }
    
        $services = $services->get();
    
        return view('admin.services.index', compact('services', 'query'));
    }
}
