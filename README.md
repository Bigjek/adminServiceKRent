
## Введение

=======================================
## Ссылки на Habrahabr

+ [Часть 1 — Конфигурация Symfony2 и шаблонов](https://habrahabr.ru/post/301760/) :pushpin:
+ [Часть 2 — Страница с контактной информацией: валидаторы, формы и электронная почта](https://habrahabr.ru/post/302032/) :pushpin:
+ [Часть 3 — Doctrine 2 и Фикстуры данных](https://habrahabr.ru/post/302438/) :pushpin:
+ [Часть 4 — Модель комментариев, Репозиторий и Миграции Doctrine 2](https://habrahabr.ru/post/302602/) :pushpin:
+ [Часть 5 — Twig расширения, Боковая панель(sidebar) и Assetic](https://habrahabr.ru/post/303114/) :pushpin:
+ [Часть 6 — Модульное и Функциональное тестирование](https://habrahabr.ru/post/303578/) :pushpin:

Если Вам понравилось руководство Вы можете поставить :star: репозиторию проекта или подписаться. Спасибо.

=======================================
## Установка 
=======================================


:three: Откройте консоль из папки распакованного архива 

:four: Введите команду  ```composer update```

:five: Во время установки введите параметры вашей базы данных

:six: После установки введите  ```php app/console assets:install web --symlink``` 

:seven: Создайте базу данных, если она еще не была создана ранее, то вызовите следующую команду  ```php app/console doctrine:database:create``` 

:eight: Обновите схему  ```php app/console doctrine:schema:update --force``` 

:nine: Загрузите фикстуры  ```php app/console doctrine:fixtures:load``` ,  на вопрос продолжить ли выполнение команды ответить: ```yes```

:keycap_ten: Запустите сервер командой  ```php app/console server:run``` , 

:one::one: Перейдите по адресу http://localhost:8000/