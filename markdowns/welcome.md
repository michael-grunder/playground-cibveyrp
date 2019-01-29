# Redis->lRange()
@[Testing]({"stubs": ["lrange.php"], "command": "/project/target/spawn.sh lrange.php"})

# Redis->zRange()
@[Testing]({"stubs": ["zrange.php"], "command": "/project/target/spawn.sh zrange.php"})

# Redis->getBit()
@[Redis->getBit($str_key, $i_position): int]({"stubs": ["getbit.php"], "command": "/project/target/spawn.sh getbit.php"})

# Redis->scan()
@["Redis->scan(&$it |, $str_pattern, $count): array]({"stubs": ["scan.php"], "command": "/project/target/spawn-scan.sh scan.php"})
