Clone the project

```bash
  git clone https://github.com/DikyEfriansyah/resep-share-project.git
```

Go to the project directory

```bash
  cd resep-share-project
```

-   Copy .env.example file to .env and edit database credentials there

```bash
    composer install
```

```bash
    php artisan key:generate
```
```bash
    php artisan migrate
```
