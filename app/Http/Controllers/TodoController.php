<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $todo = Todo::where('user_id', auth()->user()->id)->latest()->get();

        return view('todolist.index', compact('todo'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'todo' => 'required',
        ]);

        try {

            $data = $request->all();

            $data['status'] = false;
            $data['user_id'] = Auth::user()->id;

            $todo = Todo::create($data);

            // dd($todo);

            return redirect()->back();
            
        } catch(Exception $e) {
            dd($e->getMessage());
            // return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $todo = Todo::findOrFail($id);

        return view('todolist.edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'todo' => 'required'
        ]);

        try {

            $todo = Todo::find($id);

            $data = $request->all();

            $data['status'] = $request->has('status') ? true : false;

            $todo->update($data);

            return redirect()->route('todolist.index');
            
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->route('todolist.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            
            $todo = Todo::find($id);

            $todo->delete();

            return redirect()->back();

        } catch(Exception $e) {
            // dd($e->getMessage());
            return redirect()->back();
        }
    }
}
