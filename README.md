<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://icons.veryicon.com/png/o/business/terminal-project/task-management-26.png" width="100">
  </a>
</p>

# Task Tracker CLI

Простое консольное приложение для управления задачами с использованием **Laravel Artisan Commands** и **MySQL**.

## 🚀 Возможности
- Добавление задач
- Обновление описания задачи
- Удаление задач
- Изменение статуса (в процессе / выполнено)
- Вывод списка задач

## 📋 Требования
Перед установкой убедитесь, что у вас установлены:
- **PHP** (>=8.0)
- **Composer**
- **MySQL**

## 🔧 Установка
### 1. Клонирование репозитория
```bash
git clone https://github.com/iammaga/task-tracker-cli.git
cd task-tracker-cli
```

### 2. Установка зависимостей
```bash
composer install
```

### 3. Настройка `.env`
```bash
cp .env.example .env
```
Откройте `.env` и настройте базу данных:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=task_tracker
DB_USERNAME=root
DB_PASSWORD=secret
```

### 4. Генерация ключа
```bash
php artisan key:generate
```

### 5. Запуск миграций
```bash
php artisan migrate
```

## 🛠 Использование CLI

### 📌 Добавить задачу
```bash
php artisan task add "Купить продукты"
```

### ✏️ Обновить описание
```bash
php artisan task update "Купить молоко" --id=1
```

### ❌ Удалить задачу
```bash
php artisan task delete --id=1
```

### 🔄 Изменить статус задачи
```bash
php artisan task mark-in-progress --id=1
php artisan task mark-done --id=1
```

### 📜 Вывести список задач
```bash
php artisan task list
```

## 🛠 Технологии
- **Backend**: Laravel 10
- **База данных**: MySQL
- **CLI**: Laravel Artisan Commands

## 🛠 Идеа
```bash
https://roadmap.sh/projects/task-tracker
```

## 👤 Контакты
Разработчик: **Muhammad Zikirzoda**  
GitHub: [iammaga](https://github.com/iammaga/)

