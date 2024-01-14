<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressStoreRequest;
use App\Models\Address;
use Illuminate\Http\Request;
use Inertia\Inertia;
use PhpParser\Node\Stmt\TryCatch;

class AddressController extends Controller
{
    public function index()
    {
        return Inertia::render('Address/Index');
    }

    public function add()
    {
        return Inertia::render('Address/Add');
    }

    public function store(AddressStoreRequest $request)
    {
        try {
            Address::create([
                'user_id' => auth()->user()->id,
                'addr1' => $request->addr1,
                'addr2' => $request->addr2,
                'city' => $request->city,
                'post_code' => $request->post_code,
                'country' => $request->country,
            ]);

            return to_route('address.index')->with('message', 'Address successfully saved !');
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $address = Address::find($id)
                ->delete();

            return back()->with('message', 'Address successfully deleted !');
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}
