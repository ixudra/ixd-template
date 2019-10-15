
    echo "Creating database dumps... "

    # Set up fresh database with empty tables
    php artisan migrate:fresh

    # Create database dumps
    mysqldump -u root -proot --no-data ixd_yourAppName > tests/_data/dump.sql;
    mysqldump -u root -proot --no-data ixd_yourAppName > tests/_data/api-dump.sql;
    mysqldump -u root -proot --no-data ixd_yourAppName > tests/_data/acceptance-dump.sql;

    # Set up fresh database with seed data
    php artisan migrate:fresh --seed

