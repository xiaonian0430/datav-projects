<?php
/**
 * User: xn
 * Date: 2019-12-30
 * Time: 18:00
 */

return [
    'SERVER_NAME'    => "EasySwoole",
    'MAIN_SERVER'    => [
        'LISTEN_ADDRESS' => '0.0.0.0',
        'PORT'           => 9501,
        'SERVER_TYPE'    => EASYSWOOLE_WEB_SERVER, //可选为 EASYSWOOLE_SERVER  EASYSWOOLE_WEB_SERVER EASYSWOOLE_WEB_SOCKET_SERVER,EASYSWOOLE_REDIS_SERVER
        'SOCK_TYPE'      => SWOOLE_TCP,
        'RUN_MODEL'      => SWOOLE_PROCESS,
        'SETTING'        => [
            'worker_num'            => 8,
            'reload_async'          => true,
            'max_wait_time'         => 600,
            'package_max_length'    => 50 *1024*1024,
            'enable_static_handler' => true, //加入以下两条配置以返回静态文件
			'document_root'         => EASYSWOOLE_ROOT . '/public',
        ],
        'TASK'           => [
            'workerNum' => 4,
            'maxRunningNum' => 128,
            'timeout' => 15
        ]
    ],
    'TEMP_DIR'       => null,
    'LOG_DIR'        => null,
    'DISPLAY_ERROR'  => false,
    'PHAR'           => [
        'EXCLUDE' => ['.idea', 'Log', 'Temp', 'easyswoole', 'easyswoole.install']
    ],

    'ROOT_HOST' => 'http://112.74.58.15:18001',
     //redis 集群
    'REDIS_CONFIG' => [
        'clusters'  =>  [
            ['120.24.187.47', 51012],
        ],
        'one'=>[
            'host'=> '120.24.187.47',
            'port'=> 51012
        ]
    ],
    //kafka集群
    'KAFKA_CONFIG' => [
        'brokers'   => '112.74.58.15:59092'
    ],

    /*################ MYSQL CONFIG ##################*/
    'MYSQL' => [
        //数据库配置
        'host'                 => '112.74.58.15',//数据库连接ip
        'user'                 => 'root',//数据库用户名
        'password'             => '123456',//数据库密码
        'database'             => 'vue_form_design',//数据库
        'port'                 => '53300',//端口
        'timeout'              => '30',//超时时间
        'connect_timeout'      => '5',//连接超时时间
        'charset'              => 'utf8',//字符编码
        'strict_type'          => false, //开启严格模式，返回的字段将自动转为数字类型
        'fetch_mode'           => false,//开启fetch模式, 可与pdo一样使用fetch/fetchAll逐行或获取全部结果集(4.0版本以上)
        'alias'                => '',//子查询别名
        'isSubQuery'           => false,//是否为子查询
        'max_reconnect_times ' => '3',//最大重连次数
    ],

    /**##################     JWT      #############*/
    'JWT' => [
        'iss' => 'infobird', // 发行人
        'exp' => 7200, // 过期时间 默认2小时 2*60*60=7200
        'sub' => 'vue_form_design_api', // 主题
        'nbf' => NULL, // 在此之前不可用
        'key' => 'www.infobird.com', // 签名用的key
    ],
];
