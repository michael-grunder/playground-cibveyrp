#!/bin/sh

# Start redis-server
/project/target/start-redis.sh >/dev/null 2>&1

# Populate some keys
php /project/target/scan-populate.php >/dev/null 2>&1

# Now execute our command
php /project/target/$1
