#!/bin/bash
set -e
#启动mysql
service mysql start
#导入数据
mysql < /mysql/schema.sql
echo '3.导入数据完毕....'
echo 'mysql容器启动完毕,且数据导入成功'

tail -f /dev/null