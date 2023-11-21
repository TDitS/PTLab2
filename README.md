# Лабораторная 2 по дисциплине "Технологии программирования"

___Цель___  
Изучение фреймворка MVC

___Индивидуальное задание. Вариант №3___  
Разработка: Магазин предметов роскоши  
Расчетная процедура: В магазине имеется определенное количество товара каждого вида. После покупки количество товара уменьшается. Если товар закончился, его покупка должна быть невозможной.

### Используемое программное обеспечение и компоненты:  
```
PHP 8.2.12 - язык сценариев общего назначения.
PHP Storm - интегрированная среда разработки для PHP.
Composer - пакетный менеджер для языка PHP.
Laravel - бесплатный веб-фреймворк с открытым кодом, предназначенный для разработки с использованием архитектурной модели MVC.
NodeJS - необходим для установок зависимостей проекта.
Bootstrap - инструмент для создания веб-приложений.
OpenServer - необходим для работы с базой данных.
```

### Используемые настройки:  
```
Настройки БД остались по умолчанию (хост, порт, логин, пароль)
931 строка: раскомментировать в файле php.ini строку ";extension=fileinfo" - Необходимо для установки компонентов MVC
945 строка: раскомментировать в файле php.ini строку ";extension=pdo_mysql" - Необходимо для осуществления миграции в БД
963 строка: раскомментировать в файле php.ini строку ";extension=zip" - Необходимо для установки компонентов MVC
```

### Используемые команды: 

___Установка composer на уровень рабочей сессии___  
```
php -r "readfile('https://getcomposer.org/installer');" | php 
```

___Установка всех компонентов laravel___  
```
php composer.phar global require laravel/installer
```

___Создание MVC-проекта с помощью laravel___  
```
php composer.phar create-project --prefer-dist laravel/laravel PTLab2
```

___Переход в папку с проектом___  
```
cd PTLab2
```

___Запуск локального сервера___  
```
php artisan serve
```

___Установки зависимостей проекта___  
```
npm i
```

___Создание контроллера___  
```
php artisan make:controller MainController
```

___Создание модели с файлом миграции для формы___  
```
php artisan make:model OrderModel -m
```

___Провести миграцию таблицы___  
```
php artisan migrate
```

___Создание модели с файлом миграции для вывода данных магазина___  
```
php artisan make:model PriceModel -m
```

___Провести миграцию таблицы повторно___  
```
php artisan migrate
```

### Выводы:
В ходе лабораторной работы я научился работать с фрейморками MVC (Model-View-Controller). Для реализации лабораторной работы и изучения материала мной был выбран фреймворк "Laravel".Laravel предлагает множество удобных функций и инструментов для разработки веб-приложений.

# Лабораторная 3 по дисциплине "Технологии программирования"

___Цель___  
Изучение модульного тестирования приложений

### Используемые команды:  

___Создание фабрики модели "PriceFactory"___  
```
php artisan make:factory PriceModelFactory --model=PriceModel
```

___Создание сидов для проверки корректности созданной фабрики___  
```
php artisan db:seed
```

___Создание модульного теста___  
```
php artisan make:test ProjectTest --unit
```

___Запуск всех тестов___  
```
php artisan test
```

___Результаты тестирования___ 
![pull_uml](/img/Screenshot_1.png)

### Выводы:
В ходе лабораторной работы я научился работать с фрейморками MVC (Model-View-Controller). Для реализации лабораторной работы и изучения материала мной был выбран фреймворк "Laravel".Laravel предлагает множество удобных функций и инструментов для разработки веб-приложений.
