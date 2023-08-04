# LaravelBlogApp

To deploy:
1. Download or git clone this repo. Run composer install
2. Copy contents of `.env.example` into a new file `.env`
3. For `DB_CONNECTION` put 'sqlite' and create `database.sqlite` in the database directory. Like so: `DB_CONNECTION=sqlite`
4. `php artisan migrate`
