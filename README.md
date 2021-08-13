--
----

Step 1: Install laravel

Login Register vue js working

Step 1: Message -a

make Model and migration

```text
php artisan make:model -m Message
```

make controller, Model, migration and factory

```
php artisan make:modal Message -a
``` 

migration
```text
user_id (unique)
message(text)
```


modal
```text
public function user(){
    return $this->belongsTo(User::class);
}
```
