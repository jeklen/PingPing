# PingPing
Help you find fun guys to do fantastic things

## Git代码部署说明(我只是在看看新浪云）

在你应用的git代码目录里，添加一个新的git远程仓库 sae
$ git remote add sae https://git.sinacloud.com/aipingping

编辑代码并将代码部署到 `sae` 的版本1。
$ git add .
$ git commit -m 'Init my first app'
$ git push sae master:1
SAE支持Git、SVN、代码打包上传三种提交方式，具体请参考：http://www.sinacloud.com/doc/sae/tutorial/code-deploy.html#git
