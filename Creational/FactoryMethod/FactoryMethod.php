<?php

/**
 * 工厂方法模式
 */

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
/**
 * 消息接口工厂类
 */
interface MessageFactory {
    public function createObj();
}

/**
 * 邮件工厂类
 */
class MailFactory implements MessageFactory {
    public function createObj() {
        return new Mail();
    }
}

/**
 * 短信工厂类
 */
class SmsFactory implements MessageFactory {
    public function createObj() {
        return new Sms();
    }
}


//调用示例
$mailFactory = new MailFactory();
$mail = $mailFactory->createObj();
$mail->send();
$smsFactory = new SmsFactory();
$sms = $smsFactory->createObj();
$sms->send();