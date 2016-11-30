# PingPing
Help you find fun guys to do fantastic things

# 网页列表 
- 发布活动

http://lovepingping.applinzi.com/publish.php

- 发布活动

http://lovepingping.applinzi.com/join.php

- 参加活动

http://lovepingping.applinzi.com/dianzan.php

- 点赞页面
# 微信二维码见主目录下图片


# 第二轮sprint

## 微信端
自动回复功能

### 1.回复固定的消息 
输入一些关键词，回复一些给定的消息。这些输入和输出都是给定了的。比如说输入拼拼，那么就返回拼拼的简介，而拼拼的简介之前就已经在储存好了。

### 2.回复数据库里的消息
输入一些关键词，比如我的活动，就从数据库里提取出用户的活动，然后返回一条消息

### 3.仍在探索的功能
能不能用户一打开微信号，就可以给用户推送和他相关的消息呢？微信里有一个叫事件的东西，但是我没有发现能实现这个功能的事件。

## 网页

### 1.发布活动
用户点击发布活动的按钮，跳转到发布活动的网页。那个网页会自动获取用户的openid，这个用于认证用户。从用户表里搜索用户，如果发现用户以前被记录过。那么返回的用户的表单里会自动帮用户填写一些信息。

在这个网页中，用户可以输入活动名称，时间，地点，认识，姓名，QQ，电话，图片等信息。然后点击commit，会将这些信息传递给数据库。接着用户页面显示发布成功。

### 2.参加活动

点击参加活动的按钮，跳转到活动列表的网页。活动列表的网页可以有三个导航条。一个是热门活动，第二个是全部活动，第三个是用户发布和参加的活动。

点击热门活动，从数据库里选出参加人数最多的4条数据，显示在页面内。

点击全部活动，按照时间顺序显示所有活动（带分页）

点击我的活动，有一个二级菜单，第一个显示的是用户发布的活动，第二个显示的是用户参加的活动。带分页显示。

### 3.更多
点击微信中的更多按钮，显示二级菜单。二级菜单中有我们和pingping两个菜单。

点击我们，显示我们的简介。点击pingping，显示pingping的简介。

### 导航功能
如果有时间的话，可以考虑微信的导航功能。

## 测试

## Git代码部署说明

### 提交到新浪云

```
# 在你应用的git代码目录里，添加一个新的git远程仓库 sae
$ git remote add sae https://git.sinacloud.com/lovepingping
# 编辑代码并将代码部署到 `sae` 的版本2。
$ git add .
$ git commit -m 'Init my first app'
$ git push sae master:2
```
### 提交代码到github
$ git push

### 目前有的功能
回复和发送消息一样的文本

### 微信mp.weixin.qq.com账号密码
- 账号:1103939030@qq.com
- 密码：aipingping110
### 分工

### 网站根目录
lovepingping.applinzi.com

### 代码架构
#### 文件夹
pic
sqlScript
backlog
test
Doc
#### 微信菜单生成代码
- menuDelete.php
删除menu

- menutest.php
创建menu

#### 微网页
- publish.php发布活动
- join.php参加活动
