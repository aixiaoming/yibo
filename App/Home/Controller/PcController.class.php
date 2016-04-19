<?php
namespace Home\Controller;
use Think\Controller;
class PcController extends Controller{
    public function index(){

        if(islogin()){
            $this->display('Pc/login');
        }else{
        if(!isadmin()){
            $this->error('登录超时，请重新登录','/yibo/index.php/Home/Index/index',0);
        }
            if(empty($_POST)){
                $time=date('Y-m-d');
                $th=time()-365*24*60*60;
                $th1=time()+24*60*60;
                $th2=time()-24*60*60;
                $time1=date('Y-m-d',$th);
                $time2=date('H');
                $time3=date('Y-m-d',$th1);
                $time4=date('Y-m-d',$th2);
                $record=M('record');
                $record->where("time <='$time1 00:00:00'")->delete();
                if($time2>7){
                    $conuser=$record->where("time>='$time 07:00:00' and time <='$time3 07:00:00'")->order('time')->select();
                }else{
                    $conuser=$record->where("time>='$time4 07:00:00' and time <='$time 07:00:00'")->order('time')->select();
                }
                foreach($conuser as $card){
                    $sum['put'] += $card['put'];
                    $sum['out'] += $card['out1'];
                    $sum['out2'] += $card['out2'];
                    $sum['give'] += $card['give'];
                    $sum['turn'] += $card['turn'];
                    $sum['coturn'] += $card['coturn'];
                }
                $this->assign('time',$time);
                $this->assign('sum',$sum);
                $this->assign('conuser',$conuser);
                $this->display('Pc/index');
            }else{
                $time=I('post.time');
                $record=M('record');
                $th1=strtotime($time)+24*60*60;
                $time3=date('Y-m-d',$th1);
                $conuser=$record->where("time>='$time 07:00:00' and time <='$time3 07:00:00'")->order('time')->select();
                foreach($conuser as $card){
                    $sum['put'] += $card['put'];
                    $sum['out'] += $card['out1'];
                    $sum['out2'] += $card['out2'];
                    $sum['give'] += $card['give'];
                    $sum['turn'] += $card['turn'];
                    $sum['coturn'] += $card['coturn'];
                }
                $this->assign('time',$time);
                $this->assign('sum',$sum);
                $this->assign('conuser',$conuser);
                $this->display('Pc/index');
            }


        }
    }
    public function month(){
        if(!isadmin()){
            $this->error('登录超时，请重新登录','/yibo/index.php/Home/Index/index',0);
        }
        if(empty($_POST)){
            $time=date('Y-m');
            $record=M('record');
            $conuser=$record->where("time>='$time-01 00:00:00' and time <='$time-31 23:59:59'")->order('time')->select();
            foreach($conuser as $card){
                $sum['put'] += $card['put'];
                $sum['out'] += $card['out1'];
                $sum['out2'] += $card['out2'];
                $sum['give'] += $card['give'];
                $sum['turn'] += $card['turn'];
                $sum['coturn'] += $card['coturn'];
            }
            $this->assign('time',$time);
            $this->assign('sum',$sum);
            $this->assign('conuser',$conuser);
            $this->display();
        }else{
            $time=I('post.time');
            $record=M('record');
            $conuser=$record->where("time>='$time-01 00:00:00' and time <='$time-31 23:59:59'")->order('time')->select();
            foreach($conuser as $card){
                $sum['put'] += $card['put'];
                $sum['out'] += $card['out1'];
                $sum['out2'] += $card['out2'];
                $sum['give'] += $card['give'];
                $sum['turn'] += $card['turn'];
                $sum['coturn'] += $card['coturn'];
            }
            $this->assign('sum',$sum);
            $this->assign('conuser',$conuser);
            $this->display('pc/month');
        }
    }
    public function login(){

        $login=I('post.login');
        $password = MD5(I('post.password'));
        if(empty($login)||empty($password)){
            $data['error']=1;
            $data['msg']="请输入帐号密码";
            $this->ajaxReturn($data);
        }
        $admin = M("admin"); // 实例化User对象
        $user=$admin->where("login='$login'")->find();
        if($password==$user['password']){
            session('userid',$user['id']);
            if($user['level']==0){
                $data['error']=0;
                $data['url']=U('index');
                $this->ajaxReturn($data);
            }else{
                $data['error']=1;
                $data['msg']="账号密码错误";
                $this->ajaxReturn($data);
            }
        }else{
            $data['error']=1;
            $data['msg']="账号密码错误";
            $this->ajaxReturn($data);
        }
    }
    public function user(){
        if(!isadmin()){
            $this->error('登录超时，请重新登录','/yibo/index.php/Home/Index/index',0);
        }
        if(empty($_POST)){
            $this->display('Pc/user');
        }else{
            $stime=I('post.time');
            if($stime==""){
                $login=I('post.login');
                $admin=M('user');
                $conuser1=$admin->where("userphone='$login' or name='$login'")->find();
                $conid=$conuser1['id'];
                $record=M('record');
                $conuser=$record->where("conid='$conid'")->select();
                foreach($conuser as $card){
                    $sum['put'] += $card['put'];
                    $sum['out'] += $card['out1'];$sum['out2'] += $card['out2'];
                    $sum['give'] += $card['give'];
                    $sum['turn'] += $card['turn'];
                    $sum['coturn'] += $card['coturn'];
                }
                $this->assign('conid',$conid);
                $this->assign('sum',$sum);
                $this->assign('conuser',$conuser);
                $this->display('Pc/user');
            }else{
                $conid=I('post.conid');
                $record=M('record');
                $th1=strtotime($stime)+24*60*60;
                $time3=date('Y-m-d',$th1);
                $conuser=$record->where("conid='$conid' and time>='$stime 07:00:00' and time <='$time3 07:00:00'")->select();
                foreach($conuser as $card){
                    $sum['put'] += $card['put'];
                    $sum['out'] += $card['out1'];$sum['out2'] += $card['out2'];
                    $sum['give'] += $card['give'];
                    $sum['turn'] += $card['turn'];
                    $sum['coturn'] += $card['coturn'];
                }
                $this->assign('conid',$conid);
                $this->assign('sum',$sum);
                $this->assign('conuser',$conuser);
                $this->display('Pc/user');
            }

        }

    }
    public function admin(){
        if(!isadmin()){
            $this->error('登录超时，请重新登录','/yibo/index.php/Home/Index/index',0);
        }
        $admin=M('admin');
        $user0=$admin->where("level=0")->select();
        $user1=$admin->where("level=1")->select();
        $user2=$admin->where("level=2")->select();
        $this->assign('user0',$user0);
        $this->assign('user1',$user1);
        $this->assign('user2',$user2);
        $user=M('user');
        $user3=$user->select();
        $this->assign('user3',$user3);
        $this->display();
    }
    public function add(){
        if(!isadmin()){
            $this->error('登录超时，请重新登录','/yibo/index.php/Home/Index/index',0);
        }
        if (!IS_AJAX) {
            $data['error']=1;
            $data['msg']="提交方式不正确";
            $this->ajaxReturn($data);
        }else{
            $data['level']=I('post.level');
            $data['login']= I('post.login');
            $data['password2']=I('post.password');
            $data['password1']=I('post.password1');
            $data['name']= I('post.name');
            if(empty($data['login'])||empty($data['name'])){
                $data['error']=1;
                $data['msg']="请输入帐号姓名";
                $this->ajaxReturn($data);
            }
            if(empty($data['password1'])||empty($data['password2'])){
                $data['error']=1;
                $data['msg']="密码或确认密码为空";
                $this->ajaxReturn($data);
            }
            if($data['password1']!=$data['password2']){
                $data['error']=1;
                $data['msg']="密码不一致";
                $this->ajaxReturn($data);
            }
            $data['password']=MD5(I('post.password'));
            $login=$data['login'];
            $user = M("admin"); // 实例化User对象
            $conuser=$user->where("login='$login'")->find();
            if(!empty($conuser)){
                $data['error']=1;
                $data['msg']="账号已存在";
                $this->ajaxReturn($data);
            }else{
                $user->add($data);
                $data1['error']=0;
                $data1['url']=U('Pc/admin');
                $this->ajaxReturn($data1);
            }
        }
    }
    public function update(){
        if(!isadmin()){
            $this->error('登录超时，请重新登录','/yibo/index.php/Home/Index/index',0);
        }
        if (!IS_AJAX) {
            $id=I('get.id');
            $user = M("admin"); // 实例化User对象
            $conuser=$user->where("id='$id'")->find();
            $this->assign('conuser',$conuser);
            $this->assign('id',$id);
            $this->display();
        }else{
            $data['id']=I('post.id');
            $data['password2']=I('post.password2');
            $data['password1']=I('post.password1');
            if(empty($data['password1'])||empty($data['password2'])){
                $data1['error']=1;
                $data1['msg']="密码或确认密码为空";
                $this->ajaxReturn($data1);
            }
            if($data['password1']!=$data['password2']){
                $data1['error']=1;
                $data1['msg']="密码不一致";
                $this->ajaxReturn($data1);
            }
            $data['password']=MD5(I('post.password2'));
            $id=$data['id'];
            $user = M("admin"); // 实例化User对象
            $user->where("id='$id'")->save($data);
                $data1['error']=0;
                $data1['url']=U('Pc/admin');
                $this->ajaxReturn($data1);
        }
    }
    public function mac(){
        if(!isadmin()){
            $this->error('登录超时，请重新登录','/yibo/index.php/Home/Index/index',0);
        }
        $mac=D('machine')->where('level=1')->select();
        $pos=D('machine')->where('level=2')->select();
        if(empty($_POST)){
            $time=date('Y-m-d');
            $time2=date('H');
            $th1=strtotime($time)+24*60*60;
            $th2=time()-24*60*60;
            $time4=date('Y-m-d',$th2);
            $time3=date('Y-m-d',$th1);
            if($time2>7){
                $conuser=D('record')->where("mac=1 and time>='$time 07:00:00' and time<='$time3 07:00:00'")->order('time')->select();
            }else{
                $conuser=D('record')->where("mac=1 and time>='$time4 07:00:00' and time <='$time 07:00:00'")->order('time')->select();
            }

            foreach($conuser as $card){
                $sum['put'] += $card['put'];
                $sum['out'] += $card['out1'];
                $sum['out2'] += $card['out2'];
                $sum['give'] += $card['give'];
                $sum['turn'] += $card['turn'];
                $sum['coturn'] += $card['coturn'];
            }
            $now=1;
            $nowpos=全部位置;
            $this->assign('now',$now);
            $this->assign('nowpos',$nowpos);
            $this->assign('conuser',$conuser);
            $this->assign('sum',$sum);
            $this->assign('time',$time);
            $this->assign('mac',$mac);
            $this->assign('pos',$pos);
            $this->display();
        }else{
            $macid=I('post.mac');
            $posid=I('post.pos');
            $time=I('post.time');
            $th1=strtotime($time)+24*60*60;
            $time3=date('Y-m-d',$th1);
            $record=M('record');
            if($posid=="全部位置"){
                $conuser=$record->where("mac='$macid' and time>='$time 07:00:00' and time<='$time3 07:00:00'")->order('time')->select();
            }else{
                $conuser=$record->where("mac='$macid' and conpos='$posid' and time>='$time 07:00:00' and time<='$time3 07:00:00'")->order('time')->select();
            }
            foreach($conuser as $card){
                $sum['put'] += $card['put'];
                $sum['out'] += $card['out1'];
                $sum['out2'] += $card['out2'];
                $sum['give'] += $card['give'];
                $sum['turn'] += $card['turn'];
                $sum['coturn'] += $card['coturn'];
            }
            $this->assign('now',$macid);
            $this->assign('nowpos',$posid);
            $this->assign('time',$time);
//            $this->assign('macid',$macid);
//            $this->assign('posid',$posid);
            $this->assign('mac',$mac);
            $this->assign('pos',$pos);
            $this->assign('sum',$sum);
            $this->assign('conuser',$conuser);
            $this->display();
        }
    }
    public function qitain(){
        if(!isadmin()){
            $this->error('登录超时，请重新登录','/yibo/index.php/Home/Index/index',0);
        }
            $time=date('Y-m-d');
            $th1=strtotime($time)-7*24*60*60;
            $time3=date('Y-m-d',$th1);
            $conuser=D('record')->where("time>='$time3 07:00:00' and time<='$time 07:00:00'")->order('time')->select();
            foreach($conuser as $card){
                $sum['put'] += $card['put'];
                $sum['out'] += $card['out1'];
                $sum['out2'] += $card['out2'];
                $sum['give'] += $card['give'];
                $sum['turn'] += $card['turn'];
                $sum['coturn'] += $card['coturn'];
            }
            $this->assign('conuser',$conuser);
            $this->assign('sum',$sum);
            $this->assign('time',$time);
            $this->assign('mac',$mac);
            $this->assign('pos',$pos);
            $this->display();
        }


}