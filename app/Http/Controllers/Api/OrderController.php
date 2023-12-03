<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderStoreRequest; 
use App\Services\Order\OrderMethods;
use Illuminate\Http\JsonResponse;

class OrderController extends Controller
{
    public function __construct(private OrderMethods $orderService)
    { 
    }

    public function store(OrderStoreRequest $request): JsonResponse
    { 
        $data = $request->validated(); 
        $this->orderService->store($data);  
        return new JsonResponse([
            'message' => 'Service with ID ' . $this->orderService->order->id.  ' provided  successfully' 
        ], 200);         
    }   
}
