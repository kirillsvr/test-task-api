## Установка

1. Клонируйте репозиторий на свой компьютер.

   ```bash
   git clone -b v3 --depth 1 --single-branch https://github.com/kirillsvr/test-task-api.git
   ```

2. Запустите Docker Compose и дождитесь пока все контейнеры запустятся.

   ```bash
   docker-compose up -d
   ```

3. Перейдите в php контейнер.

    ```bash
    docker exec -it app bash
    ```

4. Установите зависимости.

    ```bash
    composer install
    ```

5. Запустите миграции.

   ```bash
   php artisan migrate
   ```

6. Запустите загрузку начальных данных.

   ```bash
   php artisan db:seed --class=GamesSeeder
   ```


## Документация

### Описание ресурса Games

Игры содержат название, компанию разработчика и жанр, к которым они относятся. Игры могут быть получены, добавлены, обновлены или удалены.

#### Доступные методы

- POST `/games`
- GET `/games`
- GET `/games/{game_id}`
- PUT `/games/{game_id}`
- DELETE `/games/{game_id}`

### Получить список игр

   ```bash
   GET    http://localhost:8886/api/v1/games
   ```

#### Запрос и параметры запроса
   ```bash
   Content-Type application/json
   ```

| Название |                                                   Описание                                                   | Тип данных | Обязательный параметр |
|---------:|:------------------------------------------------------------------------------------------------------------:|:-----------:|:----------------------|
|   genres | Жанр игры, выбранный на основе идентификатора жанра в запросе. Вернет игры, которые относятся к этому жанру  | string      | Нет                   |

#### Пример запроса
   ```bash
   curl -H "Content-Type:application/json" -X GET "http://localhost:8886/api/v1/games?genres=1,2,5"
   ```

#### Пример ответа
   ```bash
   {
       "success": true,
       "results": {
           "count": 2,
           "data": [
               {
                   "id": 201,
                   "name": "'Change Name'",
                   "developer": "Rodriguez, Emmerich and Tromp",
                   "genres": [
                       "et",
                       "provident",
                       "ut",
                       "quas"
                   ],
                   "created_at": "2022-05-05T16:55:54.000000Z"
               },
               {
                   "id": 202,
                   "name": "Change Name",
                   "developer": "Rodriguez, Emmerich and Tromp",
                   "genres": [
                       "ex",
                       "quidem",
                       "eius",
                       "et",
                       "est",
                       "vel",
                       "quas"
                   ],
                   "created_at": "2022-05-05T16:55:54.000000Z"
               }
           ]
       }
   }
   ```

<br>

### Получить одну игру

   ```bash
   GET    http://localhost:8886/api/v1/games/:game_id
   ```

#### Запрос и параметры запроса
   ```bash
   Content-Type application/json
   ```

| Название |      Описание      | Тип данных  | Обязательный параметр |
|---------:|:------------------:|:-----------:|:----------------------|
|  game_id | Идентификатор игры |     int     | Да                    |

#### Пример запроса
   ```bash
   curl -H "Content-Type:application/json" -X GET "http://localhost:8886/api/v1/games/10"
   ```

#### Пример ответа
   ```bash
   {
       "success": true,
       "results": {
           "id": 249,
           "name": "Senger-Hagenes",
           "developer": "Rodriguez, Emmerich and Tromp",
           "genres": [
               "provident",
               "quae"
           ],
           "created_at": "2022-05-05T16:55:54.000000Z"
       }
   }
   ```

<br>

### Создать игру

   ```bash
   POST    http://localhost:8886/api/v1/games
   ```

#### Запрос и параметры запроса
   ```bash
   Content-Type application/json
   ```

|     Название |                     Описание                     | Тип данных | Обязательный параметр |
|-------------:|:------------------------------------------------:|:----------:|:----------------------|
|         name |                  Название игры                   |   string   | Да                    |
| developer_id | Идентификатор разработчика из таблицы developers |    int     | Да                    |
|        genre |    Идентификатор жанра игры из таблицы genres    |   array    | Нет                   |

#### Пример запроса
   ```bash
   curl -H "Content-Type:application/json" -X POST "http://localhost:8886/api/v1/games"
   ```

#### Пример ответа
   ```bash
   {
       "success": true,
       "results": {
           "id": 249,
           "name": "Senger-Hagenes",
           "developer": "Rodriguez, Emmerich and Tromp",
           "genres": [
               "provident",
               "quae"
           ],
           "created_at": "2022-05-05T16:55:54.000000Z"
       }
   }
   ```

<br>

### Обновить игру

   ```bash
   PUT    http://localhost:8886/api/v1/games/:game_id
   ```

#### Запрос и параметры запроса
   ```bash
   Content-Type application/json
   ```

|     Название |                       Описание                       | Тип данных | Обязательный параметр |
|-------------:|:----------------------------------------------------:|:----------:|:----------------------|
|      game_id |                  Идентификатор игры                  |    int     | Да                    |
|         name |                    Название игры                     |   string   | Да                    |
| developer_id |   Идентификатор разработчика из таблицы developers   |    int     | Да                    |
|        genre |      Идентификатор жанра игры из таблицы genres      |   array    | Нет                   |

#### Пример запроса
   ```bash
   curl -H "Content-Type:application/json" -X PUT "http://localhost:8886/api/v1/games/10"
   ```

#### Пример ответа
   ```bash
   {
       "success": true,
       "results": {
           "id": 231,
           "name": "Name",
           "developer": "Stokes-Macejkovic",
           "genres": [],
           "created_at": "2022-05-05T16:55:54.000000Z"
       }
   }
   ```


<br>

### Удалить игру

   ```bash
   DELETE    http://localhost:8886/api/v1/games/:game_id
   ```

#### Запрос и параметры запроса
   ```bash
   Content-Type application/json
   ```

|     Название |                       Описание                       | Тип данных | Обязательный параметр |
|-------------:|:----------------------------------------------------:|:----------:|:----------------------|
|      game_id |                  Идентификатор игры                  |    int     | Да                    |

#### Пример запроса
   ```bash
   curl -H "Content-Type:application/json" -X DELETE "http://localhost:8886/api/v1/games/10"
   ```

#### Пример ответа
   ```bash
   
   ```