<?php

namespace App\Http\Controllers;

use App\Models\list_item;
use Illuminate\Http\Request;

class todo_list_controller extends Controller
{
    public function index()
    {
        $list_items = list_item::all();
        return view('todo_list', compact('list_items'));
    }

    public function saved_item(Request $request)
    {
        $newlist_item = new list_item;
        $newlist_item->name = $request->list_item;
        $newlist_item->save();
        return redirect()->route('index');
    }

    public function delete_item($id)
    {
        list_item::findOrFail($id)->delete();
        return redirect()->route('index');
    }

    public function complete_item($id)
    {
        $list_item = list_item::findOrFail($id);
        $list_item->is_completed = true;
        $list_item->save();
        return redirect()->route('index');
    }
}
