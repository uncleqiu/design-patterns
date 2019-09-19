<?php

/**
 * 单例模式
 * 特点:保证一个类只能产生一个对象，对外仅提供一个获取实例的方法，降低资源的消耗
 * 缺点:不适用于经常变化的对象，不易扩展
 * 应用场景:需要频繁实例化，消耗资源多且使用较频繁的类(如数据库连接对象)
 */

 /**
  * 单例模式类
  */
final class Singleton {

    /**
     * 保存实例的属性
     */
    private static $instance;

    /**
     * 构造方法私有化，防止外部new实例化对象
     */
    private function __construct() {}
    
    /**
     * 唯一获取对象实例的方法
     */
    public static function geteInstance() {
        if (!(self::$instance instanceof self)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * 防止外部克隆对象
     */
    private function __clone() {}

    /**
     * 防止被序列化
     */
    private function __wakeup() {}
}

//测试代码
$obj1 = Singleton::geteInstance();//获得对象1
$obj2 = Singleton::geteInstance();//获得对象2
if ($obj1 === $obj2) {
    echo '相同的对象';//判断将会进入这里
} else {
    echo '两个不同的对象';
}