
	echo "Creating database dumps... "

	mysqldump -u root -proot --no-data ixd_yourAppName > tests/_data/dump.sql;
	mysqldump -u root -proot --no-data ixd_yourAppName > tests/_data/api-dump.sql;
	mysqldump -u root -proot --no-data ixd_yourAppName > tests/_data/acceptance-dump.sql;

