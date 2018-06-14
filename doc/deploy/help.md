#部署帮助文档
<!-- 文档结构说明 -->
@import "../documentStructureDescription.md"
####1.linux部署常用命令
- 切换所属用户和用户组
-       chwon -R 用户名:用户组名 目录名
- 切换所属用户组 
-       chgrp -R 用户组名 目录名
- 切换权限 
-        chmod -R 权限代码 目录名
####2.git部署常用命令
- 远程服务器创建空仓库
-       git init --bare
- 本地初始化git仓库
-       git add .
        git commit -m 'init'
- 添加远程地址，并设置默认推送分支
-       git remote add origin git@<server>:/目录.git
        git push --set-upstream origin master
####3.部署开发环境
#####3.1手动部署
- 安装nodejs
- 安装git
- 设置ssh登陆远程服务器
- 克隆远程服务器git库
- 安装vscode
- 添加Markdown Preview Enhanced插件
- 添加PlantUML插件
- 拥有java运行环境
#####3.2自动部署
####4.部署运行环境