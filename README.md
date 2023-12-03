# HotelServices

Добрый день! 

В рамках моего текущего коммерческого опыта я выполнил проект по администрированию различных товаров и услуг в рамках условного отеля (гостиницы). 

## Допущения
1. Мы не используем правила валидации exists для дальнейшей оптимизации(хочется
самим следить за запросами в БД).

## Задачи
1. Улучшить обработку ошибок(избавится от findOrFail в модели или добавить в общий
exception handler ModelNotFound)
2. Вынести отдельно ResourceCollection
3. В TgService изменить Http клиент или добавить DepencyInjection
4. Перенести телеграм нотификации в обработчики событий(выкидывать события там, где
сейчас используется код для нотификции)
5. TgService адаптировать под нотификации Laravel(или начать использовать готовую библиотеку)
6. Добавить csfixer + phpstan
7. Написать тесты

