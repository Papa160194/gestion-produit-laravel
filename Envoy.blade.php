@servers(['web' => 'sc2trpa3376@109.234.167.46'])

@task('deploy')
    cd gestion-produit-laravel
    git pull origin main
    composer install
    php artisan migrate
    php artisan db:seed
@endtask