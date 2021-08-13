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


E:\soft\laragon\www\learn_lchat>php artisan make:model Message -a
Model created successfully.
Factory created successfully.
Created Migration: 2021_08_13_062002_create_messages_table
Seeder created successfully.
Controller created successfully.

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

-----------------

```text
Step 1
public function up()
{
    Schema::create('messages', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id');
        $table->foreign('user_id')->references('id')->on('users');
        $table->string('message');
        $table->timestamps();
    });
}
    
    
Step 2
Modal in relation write

User modal
public function messages()
{
    return $this->hasMany(Message::class);
}


Message Modal

class Message extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

Web.php


Controller Fetch and send

npm install --save laravel-echo pusher-js

env
require('dotenv').config();
bootstrap.js

```

import Echo from 'laravel-echo';

window.Pusher = require('pusher-js');

window.Echo = new Echo({ broadcaster: 'pusher', key: process.env.MIX_PUSHER_APP_KEY, cluster:
process.env.MIX_PUSHER_APP_CLUSTER, forceTLS: true });

```



composer require pusher/pusher-php-server "~4.0"

app.php
// App\Providers\BroadcastServiceProvider::class,







```

MessageSent.php

```text
public function __construct(User $user, Message $message)
{
    $this->user = $user;
    $this->user = $message;
}

return new PrivateChannel('lchat');
```

MessageController.php

```text
broadcast(new MessageSent(auth()->user(), $request->message))->toOthers();
```
php artisan make:event MessageSent

>npm install vuetify
vuetify

```txt
"dependencies": {
        "emoji-mart-vue": "^2.6.4",
        "laravel-echo": "^1.4.0",
        "pusher-js": "^4.2.2",
        "vue-upload-component": "^2.8.15",
    "vuetify": "^1.1.9"
}
```

localhost direct redirect https://psttsr.nxwebinar.com/server.php
aws apache server configure https://docs.aws.amazon.com/efs/latest/ug/wt2-apache-web-server.html
https://forums.aws.amazon.com/thread.jspa?threadID=244772
