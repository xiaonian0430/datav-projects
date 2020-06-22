<?php
/**
 * @Description: 基础类
 * @author: Xiao Nian
 * @date: 2020-06-22 09:40:22
 */
namespace App\HttpController;

use EasySwoole\Http\AbstractInterface\Controller;
use EasySwoole\Kafka\Config\ProducerConfig;
use EasySwoole\Kafka\Kafka;
use EasySwoole\EasySwoole\Config;
use EasySwoole\Redis\Redis;
use EasySwoole\Redis\Config\RedisConfig;
use EasySwoole\Http\Message\Status;


class Basic extends Controller
{
    public function index()
    {
        return 'index';
    }
}
