<?php

namespace App\Services\Order;

use App\Http\Requests\ServiceStoreRequest;
use App\Models\Order; 
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\OrderResource; 
use App\Notifications\Telegram;

class OrderStoreService 

{ 
    public function __construct(
        private Order $order, 
        private ServiceStoreService $service, 
        private Telegram $telegram
    )
    {           
    }

    public function store(array $data): OrderResource
    { 
        $service = $this->service->findOrFail($data['service_id']); 
                                
        $this->order->service()->associate($service->id);
        $this->order->price = $service->price;
        $this->order->user_id = Auth::user()->id;
        $this->order->save(); 

        /**
        * TODO: быстрое решение - в будущем спрятать это в события 
        */
        $this->tgNotification();
     
        return new OrderResource($this->order);    
       
    }

    private function tgNotification()
    { 
        
        $message = trans( 
            'notifications.order_create', 
            [
               'serviceId' => $this->order->service_id
            ]
        );
         
        $this->telegram->sendMessage(config('bots.tlgr.telegram_id'), $message);
    } 

}