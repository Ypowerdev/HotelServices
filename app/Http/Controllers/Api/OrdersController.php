<?php

namespace App\Http\Controllers\Api;

use App\Notifications\Telegram;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Service;
use App\Http\Resources\OrderResource; 
use App\Http\Requests\OrderStoreRequest; 
use App\Services\Order\OrderStoreService;
use Illuminate\Http\JsonResponse;

class OrdersController extends Controller
{
    public function store(OrderStoreRequest $request, OrderStoreService $crud)
    { 
        $data = $request->validated(); 
        $crud->store($data);  
        return new JsonResponse();  
    }   
}
