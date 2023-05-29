<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
      
    public function index(Request $request)
    {
        try {
            $user = new User();

            return view('user', ['user' => $user->get()]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function store(Request $request)
    {
        try {
            $user = new User();
            $user->fill($request->all())
                ->save();

            return redirect()->route('user.index', ['user' => $user->get()]);
            // return response('Saved successfully.');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function show(Request $request, $id)
    {
        try {
            $user = new User;
               
            

            return view('edit-user', ['todo' => $user->find($id)]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $user = new User();
            $user->find($id)
                ->fill($request->all())
                ->save();

            return response('Updated successfully');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy (Request $request, $id)
    {
        try {
            $user = new User();
            $user ->delete($id);
         
            
            return response('Deleted successfully.');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
