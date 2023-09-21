<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderStoreRequest; 
use App\Services\Order\OrderMethods;
use Illuminate\Http\JsonResponse;

class OrdersController extends Controller
{
    public function store(OrderStoreRequest $request, OrderMethods $order)
    { 
        $data = $request->validated(); 
        $order->store($data);  
        return new JsonResponse();  
    }   
}
