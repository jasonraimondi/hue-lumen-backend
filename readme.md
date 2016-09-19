# Flipp Backend


### Getting Started

```bash
# Start PHP Server
$ php70 -S 0.0.0.0:8080 -t ./public
```

### Database
```
$ touch database/database.sqlite
```

### Queue Management
```
# Start Queue Worker
$ php artisan queue:work

# Start Queue Listener
$ php artisan queue:listen
```

