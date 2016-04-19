<?php
/**
 * Created by PhpStorm.
 * User: zhao晓明
 * Date: 2016/3/17
 * Time: 17:15
 * 主管控制页面
 */
namespace Home\Controller;
use Think\Controller;
class BossController extends Controller{
    public function jump1(){
        $this->success('登录成功','/yibo/index.php/Home/Boss/index',0);
    }
    public function index(){
        if(!isboss()){
            $this->error('登录超时，请重新登录','/yibo/index.php/Home/Index/index',0);
        }
        $apply=M("record");
        $count      = $apply->where('judge=2 AND agreetime=2')->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $apply->where('judge=2 and agreetime=2')->order('time')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('count',$count);
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display(); // 输出模板
    }
    public function agree(){
        if(!isboss()){
            $this->error('登录超时，请重新登录','/yibo/index.php/Home/Index/index',0);
        }
        $value1=session('userid');
        $user=M('admin');
        $boss=$user->where("id='$value1'")->find();
//        print_r($boss);
        $recordid = I('post.id');
//        print_r($recordid);
        $data['waisee']=1;
        $data['bossname']=$boss['name'];
        $data['agree']=1;
        $data['agreetime']=1;
        $data['stime']=date('Y-m-d H:i:s');
        $data['bossid']=$boss['id'];
        $record=M('record');
        $record->where("id='$recordid'")->save($data);
        $this->success('处理成功','/yibo/index.php/Home/Boss/index',0);
    }
    public function disagree(){
        if(!isboss()){
            $this->error('登录超时，请重新登录','/yibo/index.php/Home/Index/index',0);
        }
        $user=M('admin');
        $value1=session('userid');
        $boss=$user->where("id='$value1'")->find();
        $recordid = I('post.id');
        $data2['give'] = I('post.give');
        $data2['turn'] = I('post.turn');
        $data2['coturn'] = I('post.coturn');
        $data2['out2'] = I('post.out2');
        if($data2['give']!=""){
            $data['give']=0;
        }
        if($data2['turn']!=""){
            $data['turn']=0;
        }
        if($data2['coturn']!=""){
            $data['coturn']=0;
        }
        if($data2['out2']!=""){
            $data['out2']=0;
        }
        $data['waisee']=1;
        $data['bossname']=$boss['name'];
        $data['agree']=2;
        $data['agreetime']=1;
        $data['stime']=date('Y-m-d H:i:s');
        $data['bossid']=$boss['id'];
        $record=M('record');
        $record->where("id='$recordid'")->save($data);
        $this->success('处理成功','/yibo/index.php/Home/Boss/index',0);
    }
    public function role(){
        if(!isboss()){
            $this->error('登录超时，请重新登录','/yibo/index.php/Home/Index/index',0);
        }
        $waiterid=I('post.id');
        $waiter1=D(admin)->where("id='$waiterid'")->find();
        $waiter2=$waiter1['macid'];
//        $waiter=explode(',',$waiter2);
        $mac = M("machine"); // 实例化User对象
        if($waiter2==""){
            $waiter2="1,2,3,4,5,6,7,8,9,10";
        }
        $conmac=$mac->where('level=1')->select();
        $this->assign('waiter1',$waiter1);
        $this->assign('waiterid',$waiterid);
        $this->assign('waiter',$waiter2);
        $this->assign('conmac',$conmac);
        $this->display();
    }
    public function roleindex(){
        if(!isboss()){
            $this->error('登录超时，请重新登录','/yibo/index.php/Home/Index/index',0);
        }
        $admin=M("admin");
        $waiter=$admin->where('level=2')->select();
        $this->assign('waiter',$waiter);
        $this->display();
    }
    public function rolesubmit(){
        if(!isboss()){
            $this->error('登录超时，请重新登录','/yibo/index.php/Home/Index/index',0);
        }
        $id=I('post.waiterid');
        $mac=I('post.mac');
        $data['macid']= implode(',',$mac);
        D('admin')->where("id='$id'")->save($data);
//        print_r($mac);
        $this->success('处理成功','/yibo/index.php/Home/Boss/roleindex',0);
    }
    public function  record(){
        if(!isboss()){
            $this->error('登录超时，请重新登录','/yibo/index.php/Home/Index/index',0);
        }
            $conuser=D('user')->order('num desc')->select();
            $this->assign('conuser',$conuser);
            $this->display();
    }
    public function per(){
        $name=I('post.name');
        $timex=I('post.time');
        if($timex==''){
            if($name==''){
                $conid=I('post.conid');
            }else{
                $user = M("user"); // 实例化User对象
                $username=$user->where("userphone='$name' or name='$name'")->find();
                $conid=$username['id'];
            }
            $time=date('Y-m-d');
            $time2=date('H');
            $th1=time()+24*60*60;
            $th2=time()-24*60*60;
            $time3=date('Y-m-d',$th1);
            $time4=date('Y-m-d',$th2);
            $record=M('record');
            $user=D('user')->where("id='$conid'")->find();
            if($time2>7){
                $conuser=$record->where("conid='$conid' and time>='$time 07:00:00' and time <='$time3 07:00:00'")->order('time')->select();
            }else{
                $conuser=$record->where("conid='$conid' and time>='$time4 07:00:00' and time <='$time 07:00:00'")->order('time')->select();
            }
            foreach($conuser as $card){
                $sum['put'] += $card['put'];
                $sum['out'] += $card['out1'];
                $sum['out2'] += $card['out2'];
                $sum['give'] += $card['give'];
                $sum['turn'] += $card['turn'];
                $sum['coturn'] += $card['coturn'];
            }
//        print_r($conuser);
            $this->assign('user',$user);
            $this->assign('time',$time);
            $this->assign('sum',$sum);
            $this->assign('conid',$conid);
            $this->assign('conuser',$conuser);
            $this->display('Boss/per');
        }else{
            $conid=I('post.conid');
            $time=I('post.time');
            $th1=strtotime($time)+24*60*60;
            $time3=date('Y-m-d',$th1);
            $record=M('record');
            $user=D('user')->where("id='$conid'")->find();
            $conuser=$record->where("conid='$conid' and time>='$time 07:00:00' and time<='$time3 07:00:00'")->order('time')->select();
            foreach($conuser as $card){
                $sum['put'] += $card['put'];
                $sum['out'] += $card['out1'];
                $sum['out2'] += $card['out2'];
                $sum['give'] += $card['give'];
                $sum['turn'] += $card['turn'];
                $sum['coturn'] += $card['coturn'];
            }
//        print_r($conuser);
            $this->assign('user',$user);
            $this->assign('time',$time);
            $this->assign('sum',$sum);
            $this->assign('conid',$conid);
            $this->assign('conuser',$conuser);
            $this->display('Boss/per');
        }
    }

}