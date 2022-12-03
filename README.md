# marannu-catering

Project UAS Web Programming

Cara install :

```bash
git clone https://github.com/filbertmangiri/marannu-catering.git
cd marannu-catering
copy .env.example .env
composer update
php artisan key:generate
php artisan storage:link
npm install
npm run build
php artisan serve
```

Kalau di Git Bash, ganti
`copy .env.example .env` menjadi
`cp .env.example .env`

Jalankan MySQL, pastikan informasi database cocok dengan yang ada di `.env`

Buka di browser http://localhost:8000
