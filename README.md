<============================================================================>

Junior Task

/* Мини система за визуализация и анализ с известяване и експорт във файл. */

Съдържание
    1./* Изисквания */
    2./* Информация за проекта */
    3./* MySQL информация */
    4./* Как се стартира проекта */
    
<============================================================================>

1./* Изисквания */
1. Общи
    [X] Интерфейсът трябва да е респонсив (препоръчително използване на Bootstrap >= 4)
    [X] За проекта да се използва PHP (>= 7), MySql, JavaScript ( или jQuery)
2. Публичната част
    [X] Форма за регистрация на потребител
    [X] Формите трябва да имат валидация (клиентска и сървърна)
    [X] За събмит да се използва AJAX
3. Потребителска част
    [X] Възможност за редакция на потребителски профил;
    [X] Визуализация на финансовите инструменти (e.g. currency exchanges) в
        табличен вид чрез използване на REST API за получаване на данни (може да се използва ​https://openexchangerates.org/)​
    [X] Възможност данните да бъдат подреждани (низходящо - възходящо по колона),
        филтрирани(филтър за избор по вид, по стойност -от:до и т.н.), записвани в БД, експортвани във файл(csv, xls);
    [X] Визуализация на данните с чартове (ползване на js библиотека за чартове по избор);

2./* Информация за проекта */
Framework: Laravel 8
Bootstrap: 5

Пътища:
 - /login -> защитен път, ако потребител е логнат, пренасочи към /
 - /register -> защитен път, ако потребител е логнат, преносачи към /
 - / -> защитен път, ако потребител не е логнат, пренасочи към /login
 - /profile -> защитен път, ако потребител не е логнат, пренасочи към /login
 - /chart -> защитен път, ако потребител не е логнат, пренасочи към /login

Публична част:
Login и Register форми с валидация създадени чрез laravel/ui пакетa
 - пълна валидация от формата до датабазата, с хашване на пароли

Потребителска част:
 - път /profile -> с форма за промяна на име и имейл, чрез post метод за ъпдейт на информацията в датабазата
 - път / -> визуализация на Dashboard
   - таблица интегрирана чрез Yajra Datatables Framework
   - таблица с дата от openexchangerates API
   - таблицата има филтър за подредба по колони, търсачка и пагинация
   - таблицата има два бутона за експорт в excel и csv формат
 - път /chart -> визуализация на Chart
   - чарт интегриран чрез ChartJS Framework
   - чарт с дата от openexchangerates API

3./* MySQL информация */
Main table: currency_exchange
    users table:
        - съдържа датата за всички регистрирани потребители
        - по колони
            - име
            - имейл
            - парола
            - токен за запомняне при повторно влизане в сайта
    dashboards table
        - съдържа цялата дата, вземата от API
        - по колони
            - currency -> името на валутата
            - code -> кода на валутата
            - rate -> текущия курс

4./* Как се стартира проекта */
    1. cd currency_exchange
    2. composer update
    3. composer install
    4. mysql -u root -p
    5. CREATE DATABASE dashboards;
    6. php artisan migrate
    7. php artisan config:clear
    8. php artisan serve


<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
