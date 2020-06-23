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
        $id = $request->getRequestParam('id');
        $roseChart = [
            [
                'name' => "技术研发",
                'value' => 40
            ],
            [
                'name' => "服务器",
                'value' => 48
            ],
            [
                'name' => "运营推广",
                'value' => 30
            ],
            [
                'name' => "呼叫中心",
                'value' => 60
            ],
            [
                'name' => "智能质检",
                'value' => 90
            ],
            [
                'name' => "金融",
                'value' => 45
            ],
            [
                'name' => "电销",
                'value' => 5
            ],
            [
                'name' => "教育培训",
                'value' => 28
            ],
            [
                'name' => "大数据催收",
                'value' => 4
            ]
        ];
        $result = [
            'data' => $roseChart
        ];
        $this->writeJson(Status::CODE_OK, $result, '成功');
    }
}
