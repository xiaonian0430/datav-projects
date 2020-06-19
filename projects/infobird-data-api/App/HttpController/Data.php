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


class Data extends Base
{
	/**
	* 保存数据
	*/
    public function add()
    {
		$request = $this->request();
		$content = $request->getBody()->__toString();
		$raw_array = json_decode($content, true);
		$data = $raw_array['data'];
		$form_no = $raw_array['form_no'];
        $data_no = session_create_id();
		$res = [
			'data_no' => $data_no
		];
		$insert = [
			'form_no' => $form_no,
			'data_no' => $data_no,
			'data' => $data,
			'gmt_create' => date('Y-m-d H:i:s'),
			'gmt_modified' => date('Y-m-d H:i:s'),
		];

		$instance = Config::getInstance();
        $mysql_config=$instance->getConf('MYSQL');
		$config = new \EasySwoole\Mysqli\Config($mysql_config);
		
		$client = new \EasySwoole\Mysqli\Client($config);
		
		go(function ()use($client, $insert){
			//构建sql
			$client->queryBuilder()->insert('vfd_data', $insert);
			//执行sql
			$res = $client->execBuilder();
		});

		$this->writeJson(Status::CODE_OK,$res,'成功');
	}

	/**
	* 更新数据
	*/
    public function update()
    {
		$request = $this->request();
		$content = $request->getBody()->__toString();
		$raw_array = json_decode($content, true);
		$data = $raw_array['data'];
		$data_no = $raw_array['data_no'];
		$res = [
			'data_no' => $data_no
		];
		$update = [
			'data' => $data,
			'gmt_modified' => date('Y-m-d H:i:s'),
		];

		$instance = Config::getInstance();
        $mysql_config=$instance->getConf('MYSQL');
		$config = new \EasySwoole\Mysqli\Config($mysql_config);
		
		$client = new \EasySwoole\Mysqli\Client($config);
		
		go(function ()use($client, $data_no, $update){
			//构建sql
			$client->queryBuilder()->where('data_no', $data_no)->update('vfd_data', $update);
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
		$data_no = $request->getRequestParam('data_no');

		$instance = Config::getInstance();
        $mysql_config=$instance->getConf('MYSQL');
		$config = new \EasySwoole\Mysqli\Config($mysql_config);
		
		$client = new \EasySwoole\Mysqli\Client($config);
		
		//构建sql
		$client->queryBuilder()->where('data_no', $data_no)->getOne('vfd_data');
		//执行sql
		$data_res = $client->execBuilder();


		$data = $data_res[0]['data'];
		$data = json_decode($data);

		$res = [
			'data_no' => $data_no,
			'one' => $data
		];
		$this->writeJson(Status::CODE_OK,$res,'成功');
	}
	
	/**
	* 获取数据list
	*/
    public function list()
    {
		$request = $this->request();
		$form_no = $request->getRequestParam('form_no');

		$instance = Config::getInstance();
        $mysql_config=$instance->getConf('MYSQL');
		$config = new \EasySwoole\Mysqli\Config($mysql_config);
		
		$client = new \EasySwoole\Mysqli\Client($config);
		
		//构建sql
		$client->queryBuilder()->where('form_no', $form_no)->get('vfd_data');
		//执行sql
		$data_list = $client->execBuilder();

		$res = [
			'list' => $data_list
		];
		$this->writeJson(Status::CODE_OK,$res,'成功');
    }
}