<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all(); // Fetch all items from the database
        return view('index', compact('items'));
        // Pass $items to the view
    }
}
