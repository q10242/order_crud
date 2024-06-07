使用前先將80 port 讓給本專案
php artisan sail:install

說明: 
環境需要先要安裝docker 

./vendor/bin/sail up -d
./vendor/bin/sail migrate 

可由tinker 先創造10個user
./vendor/bin/sail shell 
```
> User::factory()->count(10)->create()
```


進入專案網址 (default是http://localhost)
/orderItems 即為 物品列表，內含操作介面
/orders 即為訂單

測試:
./vendor/bin/test 即可跑測試