<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
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

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


## Cómo pasar mis cambios sin comittear a una nueva rama

Hay dos formas seguras de mover tus cambios locales sin necesidad de hacer commit antes.

1) Método directo (lo más simple)
- Si solo quieres que tus cambios actuales sigan contigo en una nueva rama:

  ```bash
  git switch -c nombre-de-la-nueva-rama
  # (equivalente clásico) git checkout -b nombre-de-la-nueva-rama
  ```

  Notas:
  - Git trasladará tus cambios no confirmados (staged y unstaged) a la nueva rama, siempre que no haya conflictos con el punto de partida de esa rama.
  - La rama anterior quedará sin esos cambios en su working tree (no se "copian"; se mueven contigo al cambiar de rama).

2) Método con stash (si quieres dejar limpia la rama actual y luego aplicar los cambios en la nueva)
- Útil si quieres que la rama actual quede limpia antes de moverte, o si hay riesgo de conflicto al cambiar directamente.

  ```bash
  # Guarda cambios (incluye archivos sin seguimiento con -u)
  git stash push -u -m "mover cambios a nueva rama"

  # Crea y cambia a la nueva rama
  git switch -c nombre-de-la-nueva-rama

  # Recupera los cambios del stash
  git stash pop
  ```

  Variantes útiles:
  - Mantener lo que está staged y guardar solo lo no staged:
    ```bash
    git stash push -k -m "solo unstaged"   # --keep-index
    ```
  - Ver los stashes guardados y elegir uno concreto:
    ```bash
    git stash list
    git stash show -p stash@{0}   # ver diff del stash
    git stash apply stash@{0}     # aplicar sin borrar el stash
    git stash drop stash@{0}      # borrar ese stash después
    ```

Comprobaciones y tips
- Ver estado antes y después:
  ```bash
  git status
  ```
- Volver rápidamente a la rama anterior:
  ```bash
  git switch -
  ```
- Si al cambiar de rama Git avisa de conflictos con tus cambios sin commit:
  - Usa el método con stash (arriba), o
  - Haz commit temporal (WIP) y luego reordena/edita más tarde, o
  - Guarda solo parte de los cambios: 
    ```bash
    # aplicar interactivamente partes del stash (método moderno)
    git restore -p --source=stash@{0} .
    ```

Resumen rápido
- Sin complicaciones: git switch -c nueva-rama
- Dejar limpia la rama actual primero: git stash -u && git switch -c nueva-rama && git stash pop
