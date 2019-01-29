#!/bin/sh

/project/target/start-redis.sh >/dev/null 2>&1

php /project/target/$1
