# Redis->lRange()
@[Testing]({"stubs": ["lrange.php"], "command": "/project/target/spawn.sh lrange.php"})

# Redis->zRange()
@[Testing]({"stubs": ["zrange.php"], "command": "/project/target/spawn.sh zrange.php"})

# Redis->getBit()
@[Redis->getBit($str_key, $i_position): int]({"stubs": ["getbit.php"], "command": "spawn.sh getbit.php"})
