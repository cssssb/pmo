#部署帮助文档

####文档结构说明
- 四级markdown标题作为一级文档标题

####linux部署常用命令
- 切换所属用户和用户组
-       chwon -R 用户名:用户组名 目录名
- 切换所属用户组 
-       chgrp -R 用户组名 目录名
- 切换权限 
-        chmod -R 权限代码 目录名

####git部署常用命令
- 远程服务器创建空仓库
-       git init --bare
- 本地初始化git仓库
-       git add .
        git commit -m 'init'
        git remote add origin git@<server>:/目录.git