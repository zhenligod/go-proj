<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: hello.proto

namespace App\Grpc\GPBMetadata;

class Hello
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        $pool->internalAddGeneratedFile(hex2bin(
            "0ac8010a0b68656c6c6f2e70726f746f120e4170702e477270632e48656c6c6f22180a0848656c6c6f526571120c0a046e616d65180120012809222b0a0a48656c6c6f5265706c79120c0a046e616d65180120012809120f0a076d65737361676518022001280932520a0e477265657465725365727669636512400a0853617948656c6c6f12182e4170702e477270632e48656c6c6f2e48656c6c6f5265711a1a2e4170702e477270632e48656c6c6f2e48656c6c6f5265706c7942065a042e3b7062620670726f746f33"
        ), true);

        static::$is_initialized = true;
    }
}

