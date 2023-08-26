<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use App\Helpers\Telegram;
use Illuminate\Container\Container;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    protected $telegram; 

    public function __construct(Container $container, Telegram $telegram)
    {
        parent::__construct($container); 
        $this->telegram = $telegram;         
    }
    
    public function report (Throwable $e)
    { 
        $data = [ 
            'description' => $e->getMessage(), 
            'file' => $e->getFile(), 
            'line' => $e->getLine(),
        ];    
        
        $this->telegram->sendMessage (env('REPORT_TELEGRAM_ID'), view('report', $data));

    }

    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
