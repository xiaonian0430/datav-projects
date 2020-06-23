<?php
/**
 * @Description: 基础类
 * @author: Xiao Nian
 * @date: 2020-06-22 09:40:22
 */
namespace App\HttpController;

use EasySwoole\Http\AbstractInterface\Controller;
use EasySwoole\Http\Message\Status;


abstract class Base extends Controller
{
    private $basicAction = [
        '/api/users/login',
    ];
    protected $token;

    public function index()
    {
        return 'index';
    }

    protected function onRequest(?string $action): ?bool
    {
        if (!parent::onRequest($action)) {
		    return false;
        }

        $path = $this->request()->getUri()->getPath();
        if (!in_array($path, $this->basicAction)) {

            // 必须有token
            if (empty( $this->request()->getHeader('token')[0] )){
                $this->writeJson(Status::CODE_UNAUTHORIZED, new \stdClass(), "token不可为空");
                return false;
            }


            $config    = Config::getInstance();
            $jwtConfig = $config->getConf('JWT');

            $jwtObject = Jwt::getInstance()->setSecretKey($jwtConfig['key'])->decode($this->request()->getHeader('token')[0]);
            $status = $jwtObject->getStatus();
            // 如果encode设置了秘钥,decode 的时候要指定

            switch ($status)
            {
                case  1:
                    $this->token = $jwtObject->getData();
                    break;
                case  -1:
                    $this->writeJson(Status::CODE_BAD_REQUEST, new \stdClass(), "token无效");
                    return false;
                    break;
                case  -2:
                    $this->writeJson(Status::CODE_UNAUTHORIZED, new \stdClass(), "token过期");
                    return false;
                    break;
            }

            if (!is_array($this->token) || empty($this->token)){
                $this->writeJson(Status::CODE_BAD_REQUEST, new \stdClass(), "token解析失败:".$this->token);
                return false;
            }

            // 权限策略判断
            if ( !$this->vifPolicy($this->token['u_id'], $path) ){
                $this->writeJson(Status::CODE_BAD_REQUEST, new \stdClass(), "无权限访问该接口");
                return false;
            }
        }
    }

    /**
     * 验证权限策略
     * @param $uid 用户id
     * @param string $path
     * @return bool
     * @throws
     */
    private function vifPolicy($uid, string $path)
    {
        if (empty($uid)) {
            return false;
        }

        // 该路径接口不需要验证 直接通过
        if ($this->shouldVifPath($path) == false){
            return true;
        }

        // 从缓存拿 没有就从数据库读取 初始化
        $policy = Cache::getInstance()->get('policy_'.$uid);

        if($policy === null){
            $policy = new Policy();
            // 用户权限
            $userModel = SiamUserModel::create()->get($uid);
            $userAuth  = $userModel->getAuth();
            foreach ($userAuth as $key => $value) {
                $policy->addPath($value['auth_rules'], PolicyNode::EFFECT_ALLOW);
            }
            Cache::getInstance()->set('policy_'.$uid, serialize($policy), 10 * 60);
        }else{
            $policy = unserialize($policy);
        }

        if($policy->check($path) === 'allow'){
            return true;
        }
        return false;
    }

    /**
     * 该路径是否建立了权限管理  没建立就是不用管
     * @param string $path
     * @return bool
     * @throws
     */
    private function shouldVifPath(string $path): bool
    {
        $cache = Cache::getInstance();
        $authRes = $cache->get('shouldvif_api_'.md5($path));
        if ($authRes === null){
            $auth = SiamAuthModel::create()->get(['auth_rules' => $path]);
            $cache->set('shouldvif_api_'.md5($path),  false, 3*60);

            // 没有设置该api规则 所以不需要验证
            if ($auth===null){
                return false;
            }else{
                return true;
            }
        }else if ($authRes === true){
            return true;
        }else{
            return false;
        }
    }
}
