<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Telegram;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Service;
use App\Models\User;
use DB;
use App\Http\Resources\OrderResource; 
use App\Http\Requests\OrderStoreRequest; 


class OrdersController extends Controller
{
    public function store(OrderStoreRequest $request, Telegram $telegram )
    { 
        $data = $request->validated(); 

        $service = Service::findOrFail($data['service_id']);

        $order = new Order(); 
        $order->service()->associate($service->id);
        $order->price = $service->price;
        $order->user_id = Auth::user()->id;
        $order->save(); 

        $message = 'Поздравляем. Вы сделали заказ товара(услуги). id товара(услуги): ' . $order->service_id;
                      
        $telegram->sendMessage(config('bots.tlgr.telegram_id'), $message);
        return new OrderResource($order);
    }   
}
