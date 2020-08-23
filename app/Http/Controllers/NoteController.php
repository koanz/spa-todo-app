<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\Item;
use App\Note;
use Illuminate\Http\Request;
use App\Http\Requests\NoteFormRequest;

class NoteController extends Controller
{
    public function store(Request $request)
    {
        $item = new Item;
        DB::transaction(function() use (&$item, $request) {
            $item->title = $request['title'];
            $item->user_id = Auth::user()->id;
            $item->save();

            $item->note()->create([
                'content' => $request['content']
            ]);
        }, 2);

       return response()->json([
           'item' => $item
       ], 200);

        // Return message error
        /* return response()->json(['error' => ''], 200);*/
    }

    public function show($id) {
        $note = Note::findOrFail($id);

        return response()->json([
            'note' => $note
        ], 200);
    }

    public function update(Request $request, Note $note) {
        try {
            if($this->validateRequest()){
                $note->update([
                    'title' => $request->title,
                    'body' => $request->body
                ]);

                return response()->json(['note' => $note], 200);
            }
        } catch(Exception $e) {
            return response()->json(['error' => 'Note with id #'.$id.' doesnt exist.'], 404);
        }
    }

    public function destroy($id) {
        try{
            $note = Note::findOrFail($id);

            $note->delete();

            return response()->json(['success' => 'Successfuly deleted'], 200);
        }catch(Exception $e) {
            return response()->json(['error' => 'Cannot delete this item. '.$e->getMessage()], 404);
        }
    }

    private function validateRequest() : array {
        return request()->validate([
            'title' => 'max:100|required',
            'body' => 'max:250|required'
        ]);
    }
}
