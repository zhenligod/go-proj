# go-proj项目
    基于golang gin框架和grpc框架封装而成。
    涉及到的包：gin,grpc,protobuf,daheige/thinkgo

# 目录结构
    .
    ├── app                             应用目录
    │   ├── job                         job/task作业层
    │   ├── logic                       公共逻辑层，上下文采用标准上下文ctx
    │   │   ├── BaseLogic.go
    │   │   ├── HomeLogic.go
    │   │   └── readme.md
    │   ├── rpc                         grpc service层
    │   │   └── service
    │   └── web                         web/api
    │       ├── controller
    │       ├── middleware
    │       └── routes                        
    ├── bin                             存放golang生成的二进制文件和shell脚本                      
    │   ├── go-gen                      golang生成的二进制文件
    │   │   ├── rpc
    │   │   └── web
    │   ├── nodejs-generate.sh
    │   ├── pb-generate.sh              golang pb和php pb代码生成脚本
    │   ├── php7.2_install.sh
    │   ├── pprof-check-version.sh      pprof性能监控生成自动版本号
    │   ├── web-check-version.sh        gin框架应用性能监控自动生成版本号
    │   └── web-init.sh                 golang rpc,web,job自动化构建脚本
    ├── conf                            项目配置文件目录
    ├── clients                         golang,php,nodejs客户端生成的代码
    │   ├── go
    │   │   └── client.go
    │   └── php
    │       ├── App                     自动生成的php代码
    │       ├── composer.json           composer文件，可以指定App命名空间自动加载
    │       ├── composer.lock
    │       ├── hello_client.php
    │       ├── readme.md
    │       └── vendor
    ├── cmd                             各个应用的main.go文件和配置文件app.yaml,线上可以放在别的目录
    │   ├── job
    │   ├── rpc
    │   │   ├── app.yaml                开发模式下的配置文件
    │   │   ├── logs
    │   │   └── main.go
    │   └── web
    │       ├── app.yaml
    │       ├── logs
    │       └── main.go
    ├── go.mod
    ├── go.sum
    ├── HealthCheck                     健康检查自动生成的代码
    │   ├── ginCheck
    │   │   └── checkversion.go
    │   ├── pprofCheck
    │   │   └── checkversion.go
    │   └── readme.md
    ├── library                         公共库主要是第三方库，logger,gin metrics监控等
    │   ├── helper                      助手函数库
    │   ├── ginMonitor                  gin web/api打点监控
    │   │   └── monitor.go
    │   └── Logger                      日志服务
    │       ├── log.go
    │       └── readme.md
    ├── LICENSE
    ├── logs                            运行日志目录，线上可放在别的目录,开发模式goland日志放在logs中
    │   ├── rpc
    │   └── web
    ├── pb                              根据pb协议，自动生成的golang pb代码
    │   └── hello.pb.go
    ├── protos                          pb协议文件
    │   └── hello.proto
    └── readme.md

# go-grpc和php grpc工具安装
    参考https://github.com/daheige/hg-grpc

# grpc运行
    1、生成pb代码
        sh bin/pb-generate.sh
    2、启动服务端
    $ cp app.exam.yaml app.yaml
    $ sh bin/app-start.sh rpc
    2019/07/14 11:25:26 server pprof run on:  51051
    2019/07/14 11:25:26 go-proj grpc run on: 50051

    3、运行客户端
    $ go run clients/go/client.go 
    2019/07/14 11:26:36 name:hello,golang grpc,message:call ok

    php客户端
    $ php clients/php/hello_client.php 
    检测App\Grpc\GPBMetadata\Hello\HelloReq是否存在
    bool(true)
    status code: 0
    name:hello,world
    call ok

# woker job/task运行
    $ sh bin/pprof-check-version.sh 
    $ go run cmd/worker/worker.go 
    2019/07/17 21:29:37 ===worker service start===
    2019/07/17 21:29:37 server pprof run on:  30031
    2019/07/17 21:29:38 hello world
    2019/07/17 21:29:39 current id:  heige
    2019/07/17 21:29:40 hello world
    2019/07/17 21:29:42 current id:  heige

# 项目工程化构建
    构建web
    $ sh bin/web-init.sh web
    初始化成功！
    生成自动版本号
    HealthCheck/pprofCheck/checkversion.go
    生成checkVersion.go成功
    HealthCheck/ginCheck/checkversion.go
    生成checkVersion.go成功
    开始构建web二进制文件
    构建web成功！

    构建rpc
    $ sh bin/web-init.sh rpc
    初始化成功！
    生成自动版本号
    HealthCheck/pprofCheck/checkversion.go
    生成checkVersion.go成功

    Generating codes...

    generating golang stubs...
    generating golang code success
    generating php stubs...
    generating php stubs from: /web/go/go-proj/protos/hello.proto
            [DONE]


    Generate codes successfully!

    开始构建web二进制文件
    构建rpc成功！

# 开发模式启动
    可以把项目中的app.exam.yaml复制到cmd对应的应用中，然后go run main.go启动

# 关于项目部署
    建议将web,grpc,job分开单独部署，可采用不同的app.yaml配置文件启动

# 项目上线说明
    1、可将bin下面的对应cmd下面的main.go生成的二进制文件，分发到线上部署，配置文件参考cmd/web/app.yaml
    2、上线二进制文件，需要指定app.yaml目录和logs目录

# 版权
    MIT
