# 本專案說明

## 使用前準備

1. 確保 80 端口被釋放，以便本專案使用。
2. 安裝 Laravel Sail：
    ```sh
    php artisan sail:install
    ```

## 環境需求

- Docker

## 啟動專案

1. 啟動 Docker 容器：
    ```sh
    ./vendor/bin/sail up -d
    ```
2. 執行資料庫遷移：
    ```sh
    ./vendor/bin/sail artisan migrate
    ```

## 創建測試用戶

1. 進入 Tinker Shell：
    ```sh
    ./vendor/bin/sail shell
    ```
2. 創建 10 個測試用戶：
    ```sh
    > User::factory()->count(10)->create()
    ```

## 訪問專案

- 預設網址：http://localhost

### 功能頁面

- `/orderItems`：物品列表，內含操作介面
- `/orders`：訂單列表

## 測試

1. 執行測試：
    ```sh
    ./vendor/bin/sail artisan test
    ```
