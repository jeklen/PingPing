# PingPing
Help you find fun guys to do fantastic things

#
http://lovepingping.applinzi.com/join.php
http://lovepingping.applinzi.com/group/1/multi/index1.php
## Git代码部署说明
### 提交到新浪云

```
# 在你应用的git代码目录里，添加一个新的git远程仓库 sae
$ git remote add sae https://git.sinacloud.com/aipingping(已不用操作）

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
