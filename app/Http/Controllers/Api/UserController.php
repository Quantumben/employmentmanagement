<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::get();

        return response()->json(
            [
                'employees' => $user,
                'message' => 'Users fetched',
                'statusCode' => 200,
                'status' => true
            ],
            200,
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $fields = $request->validate([
            'username' => 'required|string',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed'

        ]);
        $create = User::create([
            'username' => $fields['username'],
            'first_name' => $fields['first_name'],
            'last_name' => $fields['last_name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
        ]);

        return response()->json(
            [
                'employees' => $create,
                'message' => 'Users Created',
                'statusCode' => 200,
                'status' => true
            ],
            200,
        );
    }


    public function show(Request $request)
    {

    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->update($request->all());


        // $user->update([
        //     'username' => $request['username'],
        //     'first_name' => $request['first_name'],
        //     'last_name' => $request['last_name'],
        //     'email' => $request['email']
        // ]);

        return response()->json(
            [
                'employees' => $user,
                'message' => 'User Updated',
                'statusCode' => 200,
                'status' => true
            ],
            200,
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $deleted = User::destroy($id);

        return response()->json(
            [
                'employees' => $deleted,
                'message' => 'User deleted',
                'statusCode' => 200,
                'status' => true
            ],
            200,
        );

    }

    public function search($id)
    {
        $search = User::where('id', 'like', '%' .$id. '%')->get();

        return response()->json(
            [
                'employees' => $search,
                'message' => 'User Searched',
                'statusCode' => 200,
                'status' => true
            ],
            200,
        );
    }


}
