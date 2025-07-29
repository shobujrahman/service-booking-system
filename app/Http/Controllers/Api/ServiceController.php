<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function index()
    {
        return Service::where('status', true)->get();
    }

    public function store(Request $request)
    {
        $this->authorizeAdmin();
        return Service::create($request->validate([
            'name'        => 'required',
            'description' => 'required',
            'price'       => 'required|numeric',
        ]));
    }

    public function update(Request $request, Service $service)
    {
        $this->authorizeAdmin();

        $service->update($request->validate([
            'name'        => 'required',
            'description' => 'required',
            'price'       => 'required|numeric',
        ]));
        return response()->json(['message' => 'Updated', 'service' => $service]);
    }

    public function destroy(Service $service)
    {
        $this->authorizeAdmin();
        $service->delete();
        return response()->json(['message' => 'Deleted']);
    }

    private function authorizeAdmin()
    {
        if (! Auth::user()->is_admin) {
            abort(403, 'Admin only.');
        }
    }

}
