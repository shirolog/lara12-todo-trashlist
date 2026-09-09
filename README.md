# Laravel Todo App

Laravelで制作したTodo管理アプリです。

## 概要

Todoの登録・編集・完了・削除など、タスクを管理することができるアプリです。

削除したTodoはゴミ箱に移動し、必要に応じて復元したり完全に削除したりすることができます。

## 主な機能

* Todoの登録
* Todoの編集
* Todoの完了・未完了の切り替え
* Todoの削除
* ゴミ箱への移動
* Todoの復元
* Todoの完全削除
* バリデーション
* 成功メッセージの表示
* ページネーション

## 使用技術

* PHP 8.2
* Laravel 12
* MySQL / MariaDB
* Blade
* JavaScript
* Tailwind CSS

## データベース

Todoの管理には`tasks`テーブルを使用しています。

主なカラム：

* `task_name`：Todoの内容
* `due_date`：期限
* `is_deleted`：削除状態
* `created_at`：作成日時
* `updated_at`：更新日時

## Seeder

初期データを登録するために`TaskSeeder`を用意しています。

以下のコマンドで初期データを登録できます。

```bash
php artisan db:seed --class=TaskSeeder
```

## 環境構築

### 1. リポジトリをクローン

```bash
git clone <repository-url>
cd <project-directory>
```

### 2. Composerパッケージをインストール

```bash
composer install
```

### 3. `.env`ファイルを作成

```bash
cp .env.example .env
```

### 4. アプリケーションキーを生成

```bash
php artisan key:generate
```

### 5. データベースを設定

`.env`ファイルのデータベース設定を、自分の環境に合わせて変更します。

```env
DB_DATABASE=database_name
DB_USERNAME=root
DB_PASSWORD=
```

### 6. マイグレーションを実行

```bash
php artisan migrate
```

### 7. 初期データを登録

```bash
php artisan db:seed --class=TaskSeeder
```

### 8. アプリケーションを起動

```bash
php artisan serve
```

ブラウザからアプリケーションにアクセスしてください。

## 工夫した点

* Todoと削除済みTodoを分けて管理できるようにした
* ゴミ箱からTodoを復元できるようにした
* 完全削除と通常の削除を分けた
* バリデーションを実装し、不正な入力を防止した
* 操作結果が分かるように成功メッセージを表示した
* Todoが増えた場合でも管理しやすいようページネーションを実装した

## 今後の改善

* Todoの検索機能
* Todoの並び替え機能
* 非同期通信による操作性の向上
* UI・UXのさらなる改善
