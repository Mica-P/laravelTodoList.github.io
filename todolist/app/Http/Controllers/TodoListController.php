<?php

namespace App\Http\Controllers;

use App\Models\ListItem;
use Illuminate\Http\Request;


class TodoListController extends Controller
{
    public function index(){
        return view('welcome', ['listItems' => ListItem::where('is_complete', 0)->get()]);
        //passing value into the view. You add second parameter
    }

    public function markComplete($id){
        $listItem = ListItem::find($id);
        $listItem->is_complete = 1;
        $listItem->save();
        return redirect('/');
    }

    public function saveItem(Request $request) {

        $newListItem = new ListItem;
        $newListItem->name = $request->listItem;
        $newListItem->is_complete = 0;
        $newListItem->save();

//        return view('welcome', ['listItems' => ListItem::all()]); not a great idea to do this bc if you refresh the page you wil get the a pop-up resubmission

        return redirect('/');
    }
}
