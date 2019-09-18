<?php

/**
 * 特点:将调用者与创建者分离,调用者直接向工厂请求,减少代码的耦合.提高系统的可维护性与可扩展性.
 * 缺点:当要修改类的时候,工厂类也需要做出相对应的更改，违反了开闭原则(对于扩展代码开放,对于类内修改关闭).
 */

/**
 * 简单工厂类
 */
class SimpleFactory {

    public static function createObj($type) {
        switch ($type) {
            case 'Mail':
                return new Mail();
                break;
            case 'Sms':
                return new Sms();
                break;
            default:
                throw new \Exception($type . ' Class not found!');
                break;
        }
    }
}

/**
 * 接口类，继承该接口的子类需要实现里面所有的方法
 */
interface Message {
    public function send();
}
/**
 * Sms类
 */
class Sms implements Message {
    public function send() {
        echo __CLASS__ . ' send Message!';
    }
}

/**
 * Mail类
 */
class Mail implements Message {
    public function send() {
        echo __CLASS__ . ' send Message!';
    }
}

//调用示例
$class = SimpleFactory::createObj('Sms');
$class->send();