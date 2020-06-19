<?php
/**
 * Users: xiaonian
 * Date: 2020/05/12
 * Time: 11:28
 */
namespace App\HttpController;
use EasySwoole\Http\AbstractInterface\Controller;
use EasySwoole\Http\Message\Status;
use EasySwoole\EasySwoole\Config;
use App\HttpController\Base;

class Upload extends Base
{
	/**
	* 文件上传
	*/
	public function file()
    {
		$request = $this->request();
        $files = $request->getUploadedFiles();
        $file = '';
        foreach($files as $file){
            break;
        }

        $instance = Config::getInstance();
		$root_host=$instance->getConf('ROOT_HOST');
		$file_id = session_create_id();
        $data = [
            'file_id'=>$file_id,
            'url' => ''
        ];
        if(!empty($file)){
            $arr=explode('.', $file->getClientFilename());
            $type=$arr[count($arr)-1];
            $date = date('Ymd',time());
            $path = 'public/files/'.$date;
            $url = $root_host.'/files/'.$date;

            //创建目录
            if(!is_dir($path)){
                if(!mkdir($path,777,true)){
                    $this->writeJson(Status::CODE_BAD_REQUEST,null,'失败');
                }else{
                    $path .= '/'.$file_id.'.'.$type;
                    $url .= '/'.$file_id.'.'.$type;
                    $file->moveTo($path); // 移动文件（file_put_contents 实行）
                    $data['url'] = $url;
                    $this->writeJson(Status::CODE_OK,$data,'成功');
                }
            }else{
                $path .= '/'.$file_id.'.'.$type;
                $url .= '/'.$file_id.'.'.$type;
                $file->moveTo($path); // 移动文件（file_put_contents 实行）
                //$file->getSize();               // 获取文件大小
                //$file->getError();              // 获取错误序号
                $data['url'] = $url;
                $this->writeJson(Status::CODE_OK,$data,'成功');
            }
        }else{
            $this->writeJson(Status::CODE_BAD_REQUEST,null,'失败');
        }
    }

    /**
	* 图片上传
	*/
	public function image()
    {
		$request = $this->request();
        $files = $request->getUploadedFiles();
        $file = '';
        foreach($files as $file){
            break;
        }

        $instance = Config::getInstance();
		$root_host=$instance->getConf('ROOT_HOST');
		$file_id = session_create_id();
        $data = [
            'file_id'=>$file_id,
            'url' => ''
        ];
        if(!empty($file)){
            $arr=explode('.', $file->getClientFilename());
            $type=$arr[count($arr)-1];
            $date = date('Ymd',time());
            $path = 'public/images/'.$date;
            $url = $root_host.'/images/'.$date;

            //创建目录
            if(!is_dir($path)){
                if(!mkdir($path,777,true)){
                    $this->writeJson(Status::CODE_BAD_REQUEST,null,'失败');
                }else{
                    $path .= '/'.$file_id.'.'.$type;
                    $url .= '/'.$file_id.'.'.$type;
                    $file->moveTo($path); // 移动文件（file_put_contents 实行）
                    $data['url'] = $url;
                    $this->writeJson(Status::CODE_OK,$data,'成功');
                }
            }else{
                $path .= '/'.$file_id.'.'.$type;
                $url .= '/'.$file_id.'.'.$type;
                $file->moveTo($path); // 移动文件（file_put_contents 实行）
                //$file->getSize();               // 获取文件大小
                //$file->getError();              // 获取错误序号
                $data['url'] = $url;
                $this->writeJson(Status::CODE_OK,$data,'成功');
            }
        }else{
            $this->writeJson(Status::CODE_BAD_REQUEST,null,'失败');
        }
    }
}
