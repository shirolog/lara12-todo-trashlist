# Laravel Todo App

Laravel 12で制作したTodo管理アプリです。

## 概要

Todoの登録・編集・完了・削除など、日々のタスクを管理できるアプリケーションです。

削除したTodoはゴミ箱に移動し、必要に応じて復元したり、完全に削除したりすることができます。

## 主な機能

- Todoの登録
- Todoの編集
- Todoの完了・未完了の切り替え
- Todoの削除
- ゴミ箱への移動
- 削除したTodoの復元
- Todoの完全削除
- バリデーション
- 成功メッセージの表示
- ページネーション

## 使用技術

- PHP 8.2以上
- Laravel 12
- MySQL / MariaDB
- Blade
- JavaScript
- Tailwind CSS 4
- Vite 6

## データベース

Todoの管理には `tasks` テーブルを使用しています。

主なカラム：

| カラム名 | 説明 |
|---|---|
| `task_name` | Todoの内容 |
| `due_date` | 期限 |
| `is_deleted` | 削除状態 |
| `created_at` | 作成日時 |
| `updated_at` | 更新日時 |

## Seeder

初期データを登録するために `TaskSeeder` を用意しています。

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

### 3. Node.jsパッケージをインストール

```bash
npm install
```

### 4. `.env` ファイルを作成

```bash
cp .env.example .env
```

### 5. アプリケーションキーを生成

```bash
php artisan key:generate
```

### 6. データベースを設定

使用するデータベースにデータベースを作成し、`.env` ファイルの設定を自分の環境に合わせて変更してください。

```env
DB_DATABASE=database_name
DB_USERNAME=root
DB_PASSWORD=
```

### 7. マイグレーションを実行

```bash
php artisan migrate
```

### 8. 初期データを登録

```bash
php artisan db:seed --class=TaskSeeder
```

### 9. CSS・JavaScriptをビルド

```bash
npm run build
```

### 10. アプリケーションを起動

```bash
php artisan serve
```

ブラウザから表示されたURLにアクセスしてください。

## 工夫した点

- Todoと削除済みTodoを分けて管理できるようにした
- 削除したTodoをゴミ箱から復元できるようにした
- 通常の削除と完全削除を分けて実装した
- バリデーションによって不正な入力を防止した
- 成功メッセージを表示し、操作結果が分かるようにした
- ページネーションを実装し、Todoが増えても管理しやすくした

## 今後の改善

- Todoの検索機能
- Todoの並び替え機能
- 非同期通信による操作性の向上
- UI・UXのさらなる改善