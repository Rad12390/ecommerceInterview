<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function get()
    {
        return response()->json([
            'id' => '123',
            'name' => 'Converse Chuck Taylor',
            'price' => 1000,
            'description' => 'Classic high top sneakers',
            'variants' => ['Red', 'Blue', 'Black'],
        ]);
    }
}
