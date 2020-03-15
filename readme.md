## Social Graph Test project

## Usage

### Requirements

- PHP 5.6 or greater.
- A SQLite or Mysql database.

### Running

You can use docker to run this project following this steps based on existing project Dockerfile:

First, build the php56-alpine image:

```shell script
docker build -t php56-alpine .
```

Next, run a container from the created image:

```shell script
docker run -it --rm --name php56 -p 8000:8000 -v "$PWD":/usr/src/myapp -w /usr/src/myapp php56-alpine:latest php artisan serve --host 0.0.0.0
```

However, you can run it too on some [L|X|W|M]AMP or using the PHP build-in server from your own environment.

## Available Resources

### Frontend

A interface witch allow you to see information related with the selected user.
When page is loaded, a list with all available user is showed on right side. 
Click on some user name to see your own information.

#### Resources

| URL    | Description              |
|--------|--------------------------|
| /users | List of available users. |

### API

A list with all available api resources.

#### Resources

| URL                                          | Description                                               |
|----------------------------------------------|-----------------------------------------------------------|
| /api/users                                   | List of available users.                                  |
| /api/users/{user}                            | Show details from a user.                                 |
| /api/users/{user}/suggested-connections      | List all suggested connections to selected user.          |
| /api/users/{user}/connections-of-connections | List all connections from connections from selected user. |
| /api/users/{user}/suggested-countries        | List all suggested unvisited countries to selected user.  |
