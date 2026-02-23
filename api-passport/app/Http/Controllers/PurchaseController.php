<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Purchase;

class PurchaseController extends Controller{
public function index()
{
    $purchases = Purchase::with(['user', 'game'])->get();

    return response()->json($purchases);
}
}


?>