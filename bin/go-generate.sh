#!/usr/bin/env bash
root_dir=$(cd "$(dirname "$0")"; cd ..; pwd)

protoExec=$(which "protoc")
if [ -z $protoExec ]; then
    echo 'Please install protoc!'
    echo "Please look readme.md to install proto3"
    echo "if you use centos7,please look docs/centos7-protoc-install.md"
    exit
fi

protos_dir=$root_dir/protos
pb_dir=$root_dir/pb

mkdir -p $pb_dir

#删除老的pb生成的go文件
rm -rf $root_dir/pb/*

echo "\n\033[0;32mGenerating codes...\033[39;49;0m\n"

#生成golang pb代码
echo "generating golang stubs..."
cd $protos_dir

# echo $protoExec -I $protos_dir --go_out=plugins=grpc:$root_dir/pb $protos_dir/*.proto;

$protoExec -I $protos_dir --go_out=plugins=grpc:$root_dir/pb $protos_dir/*.proto

# 生成http gw
$protoExec -I $protos_dir --grpc-gateway_out=logtostderr=true:$root_dir/pb $protos_dir/*.proto

echo "generating golang code success"

echo "\n\033[0;32mGenerate codes successfully!\033[39;49;0m\n"

exit 0

