<?php
/**
 * Users: xiaonian
 * Date: 2020/05/09
 * Time: 16:40
 */
namespace App\HttpController;
use EasySwoole\Http\AbstractInterface\Controller;
use EasySwoole\Http\Message\Status;
use App\HttpController\Base;
use EasySwoole\EasySwoole\Config;


class Form extends Base
{
	/**
	* 保存表单组件
	*/
    public function add()
    {
		$request = $this->request();
		$content = $request->getBody()->__toString();
		$raw_array = json_decode($content, true);
		$components = $raw_array['components'];
        $form_no = session_create_id();
		$res = [
			'form_no' => $form_no
		];
		$insert = [
			'form_no' => $form_no,
			'form_name' => 'test'.time(),
			'components' => $components,
			'describe' => '基于vue和ant-design-vue实现的表单设计器，样式使用less作为开发语言，主要功能是能通过简单操作来生成配置表单，生成可保存的JSON数据，并能将JSON还原成表单，使表单开发更简单更快速',
			'gmt_create' => date('Y-m-d H:i:s'),
			'gmt_modified' => date('Y-m-d H:i:s'),
		];

		$instance = Config::getInstance();
        $mysql_config=$instance->getConf('MYSQL');
		$config = new \EasySwoole\Mysqli\Config($mysql_config);
		
		$client = new \EasySwoole\Mysqli\Client($config);
		
		go(function ()use($client, $insert){
			//构建sql
			$client->queryBuilder()->insert('vfd_form', $insert);
			//执行sql
			$res = $client->execBuilder();
		});
		$this->writeJson(Status::CODE_OK,$res,'成功');
	}
	
	/**
	* 获取表单组件
	*/
    public function one()
    {
		$request = $this->request();
		$form_no = $request->getRequestParam('form_no');
		
		$instance = Config::getInstance();
        $mysql_config=$instance->getConf('MYSQL');
		$config = new \EasySwoole\Mysqli\Config($mysql_config);
		
		$client = new \EasySwoole\Mysqli\Client($config);
		
		//构建sql
		$client->queryBuilder()->where('form_no', $form_no)->getOne('vfd_form');
		//执行sql
		$form_res = $client->execBuilder();


		$components = $form_res[0]['components'];
		$components = json_decode($components);
		$res = [
			'form_no' => $form_no,
			'one' => $components
		];
		$this->writeJson(Status::CODE_OK,$res,'成功');
	}
	
	/**
	* 获取表单list
	*/
    public function list()
    {
		$request = $this->request();

		$instance = Config::getInstance();
        $mysql_config=$instance->getConf('MYSQL');
		$config = new \EasySwoole\Mysqli\Config($mysql_config);
		
		$client = new \EasySwoole\Mysqli\Client($config);
		
		//构建sql
		$client->queryBuilder()->get('vfd_form');
		//执行sql
		$form_list = $client->execBuilder();

		$res = [
			'list' => $form_list
		];
		$this->writeJson(Status::CODE_OK,$res,'成功');
    }
}