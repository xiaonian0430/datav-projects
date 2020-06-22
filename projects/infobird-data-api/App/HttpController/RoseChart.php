<?php
/**
 * @Description: 玫瑰图
 * @author: Xiao Nian
 * @date: 2020-06-22 09:40:22
 */
namespace App\HttpController;

use EasySwoole\Http\AbstractInterface\Controller;
use EasySwoole\Http\Message\Status;
use App\HttpController\Basic;

class RoseChart extends Basic
{
    /**
    * 数据集
    */
    public function data()
    {
        $request = $this->request();
        $audio_ref = $request->getRequestParam('audio_ref');
        $audio_compare = $request->getRequestParam('audio_compare');
        $client_id = $request->getRequestParam('client_id');
        $job_id = session_create_id();
        $data = [
            'job_id' => $job_id,
            'client_id' => $client_id,
            'audio_ref' => $audio_ref,
            'audio_compare' => $audio_compare,
            'score_status' => '0',
            'score' => '0'
        ];
        $this->process_job($data);
        $res = [
            'job_id' => $job_id
        ];
        $this->writeJson(Status::CODE_OK, $res, '成功');
    }
}
