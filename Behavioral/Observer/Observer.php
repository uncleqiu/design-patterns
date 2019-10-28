<?php

/**
 * 观察者模式
 * 当一个对象被改变时，会自动通知与它依赖的对象
 */

/**
 * 主题类（通知者，可抽象）
 * 增加、删除、通知观察者
 */
class Subject {

    //用来保存观察者对象
    private $observers = [];

    //增加观察者
    public function register(Observer $object) {
        $this->observers[] = $object;
    }

    //删除观察者
    public function remove($object) {
        foreach ($this->observers as $key => $observer) {
            if ($observer === $object) {
                unset($this->observers[$key]);
            }
        }
    }

    //通知观察者
    public function notify() {
        foreach ($this->observers as $object) {
            //每个观察者实现自己的update方法
            $object->update();
        }
    }
}

//抽象观察者接口
interface Observer {
    //触发通知方法
    public function update();
}

//具体观察者类A
class ObserverA implements Observer {

    public function update() {
        echo __CLASS__ . ' has been updated';
    }
}

//具体观察者类B
class ObserverB implements Observer {

    public function update() {
        echo __CLASS__ . ' has been updated';
    }
}

//调用示例
$subject = new Subject();
$subject->register(new ObserverA());
$subject->register(new ObserverB());
$subject->notify();