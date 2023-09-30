
Ошибка в {{env('APP_NAME')}} 
<b>Описание:</b> <code>{{$file}}</code>
<b>Строка:</b> <code>{{$line}}</code>
@if(Auth::user())
<b>Пользователь:</b> <a href="t.me/{{Auth::user()->telegram_username}}">{{Auth::user()->name}}</a>
@endif