# Flipp Backend


### Getting Started

```bash
$ composer install
# Start PHP Server
$ php70 -S 0.0.0.0:8080 -t ./public
```

### Database
```
$ touch database/database.sqlite
```

### Queue Management - https://lumen.laravel.com/docs/5.3/queues
```
# Start Queue Worker
$ php artisan queue:work

# Start Queue Listener
$ php artisan queue:listen
```

