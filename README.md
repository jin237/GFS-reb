# GFS-reb

## DB(MySQL)をDockerで立てる

- docker-compose.ymlは`api/`の中。
- M1 Mac以外は、docker-compose.yml内の`platform: linux/x86_64`をコメントアウトする。
- ローカルにデータをバインドしない場合は、yml内の`volumes:`を削除。
- ローカルにデータをバインとする場合は、dbフォルダを作成する。（`mkdir ./docker/db`）

### 環境設定ファイルを編集

.env

```env
MYSQL_ROOT_PASSWORD:
MYSQL_DATABASE:
MYSQL_USER:
MYSQL_PASSWORD:
```

### コンテナ立ち上げ

```sh
docker-compose up -d
```

### コンテナへログイン

```sh
# コンテナの確認
docker ps

# ログイン
docker-compose exec db bash
```

### MySQLへ接続

```sh
mysql -u <ユーザー名> -p<パスワード> <DB名>
```
