<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: hello.proto

namespace App\Grpc\Hello;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * message 对应生成代码的 struct
 * 定义客户端请求的数据格式
 *
 * Generated from protobuf message <code>App.Grpc.Hello.HelloReq</code>
 */
class HelloReq extends \Google\Protobuf\Internal\Message
{
    /**
     * [修饰符] 类型 字段名 = 标识符;
     *
     * Generated from protobuf field <code>string name = 1;</code>
     */
    private $name = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $name
     *           [修饰符] 类型 字段名 = 标识符;
     * }
     */
    public function __construct($data = NULL) {
        \App\Grpc\GPBMetadata\Hello::initOnce();
        parent::__construct($data);
    }

    /**
     * [修饰符] 类型 字段名 = 标识符;
     *
     * Generated from protobuf field <code>string name = 1;</code>
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * [修饰符] 类型 字段名 = 标识符;
     *
     * Generated from protobuf field <code>string name = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setName($var)
    {
        GPBUtil::checkString($var, True);
        $this->name = $var;

        return $this;
    }

}
