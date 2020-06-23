<?php

namespace App\HttpController;

use App\Model\Users\SiamUserModel;
use EasySwoole\EasySwoole\Config;
use EasySwoole\Http\Message\Status;
use EasySwoole\Jwt\Jwt;

/**
 * Class Users
 * Create With Automatic Generator
 */
class Users extends Base
{
    /**
     * @return bool
     * @throws \EasySwoole\Mysqli\Exception\Exception
     * @throws \EasySwoole\ORM\Exception\Exception
     * @throws \Throwable
     */
    public function login()
    {
        $user = SiamUserModel::create()->get([
            'u_account' => $this->request()->getRequestParam('u_account'),
        ]);

        if ($user === NULL) {
            $this->writeJson(Status::CODE_NOT_FOUND, new \stdClass(), '用户不存在');
            return FALSE;
        }


        // 生成token
        $config    = Config::getInstance();
        $jwtConfig = $config->getConf('JWT');

        $jwtObject = Jwt::getInstance()
            ->setSecretKey($jwtConfig['key']) // 秘钥
            ->publish();

        $jwtObject->setAlg('HMACSHA256'); // 加密方式
        $jwtObject->setAud("easy_swoole_admin"); // 用户
        $jwtObject->setExp(time()+$jwtConfig['exp']); // 过期时间
        $jwtObject->setIat(time()); // 发布时间
        $jwtObject->setIss($jwtConfig['iss']); // 发行人
        $jwtObject->setJti(md5(time())); // jwt id 用于标识该jwt
        $jwtObject->setNbf(time()); // 在此之前不可用
        $jwtObject->setSub($jwtConfig['sub']); // 主题

        // 自定义数据
        $jwtObject->setData([
            'u_id'   => $user->u_id,
            'u_name' => $user->u_name
        ]);

        // 最终生成的token
        $token = $jwtObject->__toString();

        $this->writeJson(Status::CODE_OK, [
            'token'    => $token,
            'userInfo' => $user->toArray(),
            'authList' => $user->getAuth(),
        ], '登陆成功');
    }
}
