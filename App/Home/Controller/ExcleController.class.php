<?php
/**
 * Created by PhpStorm.
 * User: zhao晓明
 * Date: 2016/4/16
 * Time: 21:17
 */
namespace Home\Controller;
//namespace Vendor\phpexcel;
//namespace Vendor\Excle;
use Think\Controller;
class ExcleController extends Controller{

    public function Excle(){
        $time=I('post.time');
        $th1=strtotime($time)+24*60*60;
        $time3=date('Y-m-d',$th1);
        $record=M('record');
        $conuser=$record->where("time>='$time 07:00:00' and time <='$time3 07:00:00'")->order('time')->select();
        $data = array();
        foreach ($conuser as $k=>$goods_info){
            $data[$k][conname] = $goods_info['conname'];
            $data[$k][time] = $goods_info['time'];
            $data[$k][mac] = $goods_info['mac'];
            $data[$k][conpos] = $goods_info['conpos'];
            $data[$k][put] = $goods_info['put'];
            $data[$k][type] = $goods_info['type'];
            $data[$k][account] = $goods_info['account'];
            $data[$k][out1] = $goods_info['out1'];
            $data[$k][give] = $goods_info['give'];
            $data[$k][turn] = $goods_info['turn'];
            $data[$k][coturn] = $goods_info['coturn'];
            $data[$k][out2] = $goods_info['out2'];
            $data[$k][wainame] = $goods_info['wainame'];
            $data[$k][bossname] = $goods_info['bossname'];
        }
        foreach ($data as $field=>$v){
            if($field == 'conname'){
                $headArr[]='客户姓名';
            }

            if($field == 'time'){
                $headArr[]='时间';
            }

            if($field == 'mac'){
                $headArr[]='机器编号';
            }

            if($field == 'conpos'){
                $headArr[]='座位编号';
            }

            if($field == 'put'){
                $headArr[]='入金';
            }

            if($field == 'type'){
                $headArr[]='入金方式';
            }
            if($field == 'account'){
                $headArr[]='主管姓名';
            }

            if($field == 'out1'){
                $headArr[]='出金';
            }

            if($field == 'give'){
                $headArr[]='赠分';
            }

            if($field == 'turn'){
                $headArr[]='优惠';
            }

            if($field == 'coturn'){
                $headArr[]='扣优惠';
            }

            if($field == 'out2'){
                $headArr[]='返现';
            }
            if($field == 'wainame'){
                $headArr[]='操作人';
            }
            if($field == 'bossname'){
                $headArr[]='审核主管';
            }
            $filename="记录";

            $this->getExcel($filename,$headArr,$data,$time);
        }

    }
    private  function getExcel($fileName,$headArr,$data,$time){
        //导入PHPExcel类库，因为PHPExcel没有用命名空间，只能inport导入
        import("Org.Util.PHPExcel");
        import("Org.Util.PHPExcel.Writer.Excel5");
        import("Org.Util.PHPExcel.IOFactory.php");

        $date = $time;
        $fileName .= "_{$date}.xls";

        //创建PHPExcel对象，注意，不能少了\
        $objPHPExcel = new \PHPExcel();
        $objProps = $objPHPExcel->getProperties();

        //设置表头
        $key = ord("A");
        //print_r($headArr);exit;
        foreach($headArr as $v){
            $colum = chr($key);
            $objPHPExcel->setActiveSheetIndex(0) ->setCellValue($colum.'1', $v);
            $objPHPExcel->setActiveSheetIndex(0) ->setCellValue($colum.'1', $v);
            $key += 1;
        }

        $column = 2;
        $objActSheet = $objPHPExcel->getActiveSheet();

        //print_r($data);exit;
        foreach($data as $key => $rows){ //行写入
            $span = ord("A");
            foreach($rows as $keyName=>$value){// 列写入
                $j = chr($span);
                $objActSheet->setCellValue($j.$column, $value);
                $span++;
            }
            $column++;
        }

        $fileName = iconv("utf-8", "gb2312", $fileName);
        //重命名表
        //$objPHPExcel->getActiveSheet()->setTitle('test');
        //设置活动单指数到第一个表,所以Excel打开这是第一个表
        $objPHPExcel->setActiveSheetIndex(0);
        header('Content-Type: application/vnd.ms-excel');
        header("Content-Disposition: attachment;filename=\"$fileName\"");
        header('Cache-Control: max-age=0');

        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output'); //文件通过浏览器下载
        exit;
    }





}