<?php

namespace App\Http\Controllers;

use Auth;
use App\Todo;
use App\Item;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\TodoFormRequest;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{
    public function store(Request $request)
    { 
        try {
            $item = new Item;
            DB::transaction(function() use (&$item, $request) {
                $item->title = $request['title'];
                $item->user_id = Auth::user()->id;
                $item->save();

                foreach($request['tasks'] as $task) {
                    $item->addTask($task);
                }

                $item->save();
            }, 2);

            return response()->json([
                'item' => $item
            ], 200);
        }catch(Exception $e) {
            return response()->json(['error' => 'Todo doesnt exist'], 404);
        }
    }

    public function show($id) {
        try {   
            $todo = Todo::findOrFail($id);

            return response()->json(['todo' => $todo], 200);
        }catch(Exception $e) {
            return response()->json(['error' => 'Todo with id #'.$id.' doesnt exist'], 404);
        }
    }

    public function edit($id)
    {
        $toDo = Todo::findOrFail($id);
    }

    public function destroy($id) {
        try{
            $todo = Todo::findOrFail($id);
            
            $todo->delete();

            return response()->json(['success' => 'Succesfully deleted'], 200);
        }catch(Exception $e) {
            return response()->json(['error' => 'Cannot delete this item #'.$id], 404);
        }
    }

}
