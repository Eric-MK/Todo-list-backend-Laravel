<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return Item::orderBy('created_at', 'DESC')->get();//The get method is used to retrieve the items from the database and return them as a collection.
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
        $newItem = new Item;
        $newItem->name = $request->item['name'];
        $newItem->save();

        return $newItem;
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


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $existingItem = Item::find( $id );
//The update function is a PHP function that takes two arguments: a Request object and an id string. The function is used to update an existing Item object with the given id based on the completed property in the Request object.
       if ($existingItem) {
          $existingItem->completed = $request->item['completed'] ? true : false; //if the completed request item property is true the record completed property is set to true else false
          $existingItem->completed_at = $request->item['completed'] ? Carbon::now() : null;//if completed item is true Carbonnow() sets the current date and time
          $existingItem->save();
          return $existingItem;
        }

        return "Item not found. ";

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $existingItem = Item::find($id);

        if ($existingItem) {

            $existingItem->delete();
            return "Item successfully deleted";
        }

        return "Item not found.";
    }
}
