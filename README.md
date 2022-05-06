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

|   Название |                                                                                                         Описание                                                                                                         | Тип данных | Обязательный параметр |
|-----------:|:------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------:|:-----------:|:----------------------|
|     genres |                               Жанр игры, выбранный на основе идентификатора жанра в запросе. Вернет игры, которые относятся к этому жанру. Можно перечислять идентификаторы через запятую                                | string      | Нет                   |
| developers |                    Разработчик игры, выбранный на основе идентификатора разработчика в запросе. Вернет игры, которые относятся к данным разработчика. Можно перечислять идентификаторы через запятую                     | string      | Нет                   |
|     status | Статус игры, выбранный на основе названия статуса в запросе. Вернет игры, которые находятся в данном статусе разработки. Всего существует 3 статуса: developing, beta, release. Можно перечислять названия через запятую | string      | Нет                   |

#### Пример запроса
   ```bash
   curl -H "Content-Type:application/json" -X GET "http://localhost:8886/api/v1/games?genres=1,2,5&status=beta,release&developers=1,3,6"
   ```

#### Пример ответа
   ```bash
   {
       "success": true,
       "results": {
           "count": 12,
           "data": [
               {
                   "id": 3,
                   "name": "Brakus, Goodwin and Johnston",
                   "developer": "Nolan, Thiel and Lowe",
                   "status": "Beta",
                   "genres": [
                       "vel",
                       "distinctio",
                       "corrupti"
                   ],
                   "created_at": "2022-05-06T07:01:43.000000Z"
               },
               {
                   "id": 3,
                   "name": "Brakus, Goodwin and Johnston",
                   "developer": "Nolan, Thiel and Lowe",
                   "status": "Beta",
                   "genres": [
                       "vel",
                       "distinctio",
                       "corrupti"
                   ],
                   "created_at": "2022-05-06T07:01:43.000000Z"
               },
               {
                   "id": 3,
                   "name": "Brakus, Goodwin and Johnston",
                   "developer": "Nolan, Thiel and Lowe",
                   "status": "Beta",
                   "genres": [
                       "vel",
                       "distinctio",
                       "corrupti"
                   ],
                   "created_at": "2022-05-06T07:01:43.000000Z"
               },
               {
                   "id": 10,
                   "name": "Koepp, Thiel and Price",
                   "developer": "Nolan, Thiel and Lowe",
                   "status": "Beta",
                   "genres": [
                       "distinctio",
                       "eum",
                       "esse"
                   ],
                   "created_at": "2022-05-06T07:01:43.000000Z"
               },
               {
                   "id": 13,
                   "name": "Schiller and Sons",
                   "developer": "Bartell, Weissnat and Kunze",
                   "status": "Beta",
                   "genres": [
                       "distinctio"
                   ],
                   "created_at": "2022-05-06T07:01:43.000000Z"
               },
               {
                   "id": 14,
                   "name": "Dooley-Kilback",
                   "developer": "Funk Group",
                   "status": "Release",
                   "genres": [
                       "corrupti",
                       "eum",
                       "molestias"
                   ],
                   "created_at": "2022-05-06T07:01:43.000000Z"
               },
               {
                   "id": 17,
                   "name": "Conn, Armstrong and Eichmann",
                   "developer": "Nolan, Thiel and Lowe",
                   "status": "Beta",
                   "genres": [
                       "dignissimos",
                       "corrupti",
                       "eum",
                       "esse"
                   ],
                   "created_at": "2022-05-06T07:01:43.000000Z"
               },
               {
                   "id": 18,
                   "name": "Barrows Group",
                   "developer": "Nolan, Thiel and Lowe",
                   "status": "Release",
                   "genres": [
                       "distinctio",
                       "voluptatem",
                       "molestias",
                       "voluptatum"
                   ],
                   "created_at": "2022-05-06T07:01:43.000000Z"
               },
               {
                   "id": 35,
                   "name": "Corwin Ltd",
                   "developer": "Bartell, Weissnat and Kunze",
                   "status": "Release",
                   "genres": [
                       "vel",
                       "corrupti",
                       "eum",
                       "esse"
                   ],
                   "created_at": "2022-05-06T07:01:43.000000Z"
               },
               {
                   "id": 35,
                   "name": "Corwin Ltd",
                   "developer": "Bartell, Weissnat and Kunze",
                   "status": "Release",
                   "genres": [
                       "vel",
                       "corrupti",
                       "eum",
                       "esse"
                   ],
                   "created_at": "2022-05-06T07:01:43.000000Z"
               },
               {
                   "id": 38,
                   "name": "Yundt PLC",
                   "developer": "Funk Group",
                   "status": "Beta",
                   "genres": [
                       "corrupti"
                   ],
                   "created_at": "2022-05-06T07:01:43.000000Z"
               },
               {
                   "id": 40,
                   "name": "Morar-Leuschke",
                   "developer": "Funk Group",
                   "status": "Beta",
                   "genres": [
                       "vel",
                       "esse"
                   ],
                   "created_at": "2022-05-06T07:01:43.000000Z"
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
           "status": "Release",
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
           "status": "Developing",
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
           "status": "Developing",
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