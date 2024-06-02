# Coal_Seal_Manage_System
项目基于XAMPP提供的Apache和MySQL环境，使用php语言开发的煤炭销售管理系统
# 环境配置

## XAMPP下载

### Linux环境安装

#### 1.XAMPP下载

首先，从官方XAMPP网站下载适用于Linux的XAMPP安装包。

```bash
wget https://www.apachefriends.org/xampp-files/7.4.29/xampp-linux-x64-7.4.29-1-installer.run
```

#### 2. 修改安装包的权限

下载完成后，需要修改安装包的权限以便能够执行。

```bash
chmod +x xampp-linux-x64-7.4.29-1-installer.run
```

#### 3.安装XAMPP

运行安装包来安装XAMPP。

```bash
sudo ./xampp-linux-x64-7.4.29-1-installer.run
```


#### 4. 启动XAMPP
安装完成后，可以通过以下命令启动XAMPP。
```bash 
sudo /opt/lampp/lampp start
```

#### 5. 验证安装

启动成功后，可以在浏览器中输入 http: //localhost应该会看到XAMPP的欢迎页面，表示XAMPP已经成功安装并运行。

#### 6. 管理XAMPP

可以使用以下命令来管理XAMPP：

- 启动XAMPP: sudo /opt/lampp/lampp start
- 停止XAMPP: sudo /opt/lampp/lampp stop
- 重启XAMPP: sudo /opt/lampp/lampp restart

#### 7.配置环境

XAMPP的默认安装目录是 /opt/lampp。你可以将目录Client文件夹放在 /opt/lampp/htdocs 目录下，以便通过浏览器访问<http://localhost/Client。>

### windows环境安装

官网下载相应版本<https://www.apachefriends.org/download.html>

