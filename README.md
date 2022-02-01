# GFS-reb

## DB(MySQL)をDockerで立てる

**M1 Mac以外は、docker-compose.yml内の**

```yml
platform: linux/x86_64
```

**をコメントアウトする。**

1. docker-compose.ymlがあるフォルダで`docker-compose up -d`を実行。
2. `cd api`
3. `php artisan migrate`