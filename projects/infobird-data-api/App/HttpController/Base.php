<?php
/**
 * Users: xiaonian
 * Date: 2020/05/09
 * Time: 16:40
 */
namespace App\HttpController;
use EasySwoole\Http\AbstractInterface\Controller;
use EasySwoole\Kafka\Config\ProducerConfig;
use EasySwoole\Kafka\Kafka;
use EasySwoole\EasySwoole\Config;
use EasySwoole\Redis\Redis;
use EasySwoole\Redis\Config\RedisConfig;
use EasySwoole\Http\Message\Status;
//use EasySwoole\Redis\RedisCluster;
//use EasySwoole\Redis\Config\RedisClusterConfig;


class Base extends Controller
{
	public function index()
	{
		$this->actionNotFound('index');
	}
}