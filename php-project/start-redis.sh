#!/bin/sh

redis-server --daemonize yes --save ""

if command -v usleep; then
    USLEEP=1
else
    USLEEP=0
fi

while true; do
    VAL=$(redis-cli ping "PING123")
    if [ "$VAL" = "PING123" ]; then
        exit 0
    fi

    if [ "$USLEEP" = "1" ]; then
        usleep 10000
    else
        sleep .1
    fi
done

for n in `seq 0 4`; do
    echo "PING" && redis-cli PING
    sleep 1
done
