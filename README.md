# Blog API + Filament Admin (Laravel + GraphQL)

Проект на Laravel с GraphQL API, Filament Admin и аутентификацией с подтверждением email.

---

## 📦 Установка

```bash
git clone https://github.com/wapostlew/mini-blog.git
cd mini-blog
composer install
cp .env.example .env
php artisan key:generate
```

## ⚙️ Настройка окружения
- Создайте базу данных и укажите параметры в .env:


```env
DB_CONNECTION=sqlite
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=laravel
# DB_USERNAME=root
# DB_PASSWORD=
```

- Настройте почтовый сервис для верификации email:

```env
MAIL_MAILER=log
MAIL_SCHEME=null
MAIL_HOST=127.0.0.1
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_FROM_ADDRESS="no-reply@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```
## 🛠️ Миграции и сидеры
```bash
php artisan migrate --seed
```
Сидеры создадут:
 - Тестовые статьи блога

### ▶️ Запуск сервера
```bash
php artisan serve
php artisan queque:work 
```
Проект будет доступен по адресу: localhost:8000
Письмо можно увидеть в логе: storage/logs/laravel.log
### 🔑 Доступ в Filament Admin
Панель администратора:

```
http://127.0.0.1:8000/app
```
### 🔍 GraphQL Playground
```
http://127.0.0.1:8000/graphql-playground
```
### 📄 Примеры GraphQL запросов
- Список статей
```bash
query {
  posts(limit: 5, sort_by: "created_at", sort_order: "desc") {
    data {
      id
      title
      status
    }
    total
    current_page
    last_page
  }
}
```
- Детали статьи
```bash
query {
  post(id: 1) {
    id
    title
    content
    status
  }
}
```
### 🖥️ Тестирование через curl
- Получить список постов:
```bash
curl 'http://127.0.0.1:8000/graphql' \
  -H 'Content-Type: application/json' \
  --data-binary '{"query":"query { posts(limit: 5) { data { id title } total } }"}'
```
- Получить конкретный пост:
```bash
curl 'http://127.0.0.1:8000/graphql' \
  -H 'Content-Type: application/json' \
  --data-binary '{"query":"query { post(id: 1) { id title content } }"}'
```
