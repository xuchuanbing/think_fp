<?php
namespace Back\Controller;

use Think\Controller;
use Think\Verify;

class VerifyController extends Controller
{
     /* 生成验证码 */
    public function verify()
    {
        ob_clean();
        $config = array(
            'fontSize'    =>    40,    // 验证码字体大小
            'length'      =>    4,     // 验证码位数
            'useNoise'    =>    true, // 关闭验证码杂点
        );
        $Verify = new Verify($config);
        $Verify->entry();
     }

}