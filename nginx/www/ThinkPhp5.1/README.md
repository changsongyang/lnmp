## 使用讲解
1. 配置nginx服务器，以拉入项目当中，打开conf/nginx.conf文件，配置tp项目的路径  
2. nginx项目配了两个批处理文件，分配开启服务和关闭，也需要配置，打开start_nginx.bat,配置nginx的路径，和php的文件。  
3. mysql的配置可在tp项目的config中的database.php中配置，本例子中的sql，在sql目录中有.sql文件。
4. redis我是配自己服务器的redis服务的，也可配成你自己的，点开Redis类(think\cache\driver\Redis)，可进行配置。  

### 后续还会加入docker进行服务编排。