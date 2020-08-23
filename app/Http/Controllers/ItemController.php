<?php
namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(){
        $items = Item::where('user_id', Auth::user()->id)->with('note', 'tasks')->orderBy('created_at', 'desc')->get();

        //dd($items->toArray());

        return response()->json([
            'items' => $items
        ], 200);
    }

    public function store(Request $request) {
        $item = new Item;
        DB::transaction(function() use ($request, &$item){
            $item->title = $request['title'];
            $item->user_id = Auth::user()->id;

            $item->note()->create([
                'content' => $request['content']
            ]);
        }, 2);

        return response()->json([
            'item' => $item
        ], 200);
    }
}
