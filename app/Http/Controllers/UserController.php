<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
      
    public function index(Request $request)
    {
        try {
            $User = new User();

            return view('User', ['User' => $User->get()]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function store(Request $request)
    {
        try {
            $User = new User();
            $User->fill($request->all())
                ->save();

            return redirect()->route('User.index', ['User' => $User->get()]);
            // return response('Saved successfully.');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function show(Request $request, $id)
    {
        try {
            $User = new User;
               
            

            return view('edit-User', ['User' => $User->find($id)]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $User = new User();
            $User->find($id)
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
            $User = new User();
            $User ->delete($id);
         
            
            return response('Deleted successfully.');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
