>项目打包注意事项：  
1. 现将项目拉入服务器，确保服务器安装了docker及docker-compose。  
2. 使用docker-compose up一键生成项目镜像，下载镜像过程可能较慢，耐心等待。    
3. 打包成功后，先退出来，使用docker-compose up -d让其在后台运行  
4. 这是要把数据导进数据库，可用下面的命令，.sql文件在mysql下，忽略密码警告
``` txt
 docker exec -i mysql mysql -uroot -proot spring < schema.sql
```
注意：由于用到了thinkphp5.1，runtime需要较高的权限，所以，需要进入/nginx/www/ThinkPhp5.1里面，执行下面命令：  
``` txt
chmod -R 777 runtime
```
接着访问公网ip即可。