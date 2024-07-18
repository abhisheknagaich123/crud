<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
class usersdata extends Controller
{
    public function index()
    {
        

        $users = User::all();
        
      
        return view('home', compact('users'));
    }
    public function create(){
        return view('create');

    }
    public function store(Request $request)
{
    // dd($request->all);
   
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Check if validation fails
    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
    }

    // Create a new user instance
    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = $request->password;

    // Save the user to the database
    $user->save();

    // Redirect to the index route with a success message
    return redirect()->route('users.index')->with('success', 'User added successfully.');
}



public function edit($id){
    // Retrieve the employee record from the database
    $product = User::findOrFail($id);

    // Pass the retrieved employee data to the 'edit' view
    return view('edit', ['user' => $product]);
}
public function update(Request $request, $id)
{
    // Validate the request data
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:6'
    ]);

    // Check if validation fails
    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
    }

    // Find the user by ID
    $user = User::findOrFail($id);

    // Update the user's details
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);

    // Save the changes to the database
    $user->save();

    // Redirect to the users index route with a success message
    return redirect()->route('users.index')->with('success', 'User updated successfully.');
}


public function delete($id)
{
    // Find the user by ID
    $user = User::findOrFail($id);

    // Delete the user
    $user->delete();

    // Redirect to the users index route with a success message
    return redirect()->route('users.index')->with('success', 'User deleted successfully.');
}


}
