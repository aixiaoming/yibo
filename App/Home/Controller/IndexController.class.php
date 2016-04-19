<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        if(ismobile()){
            if(islogin()){
                $this->display();
            }else{
                $this->display('Index/waiter');
            }
        }else{
            $Pc = new \Home\Controller\PcController();
            $Pc->index();
        }
    }
    //服务员登录
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
                session('level',$user['level']);
                session('userid',$user['id']);
                if($user['level']==1){
                    $data['error']=0;
                    $data['url']=U('Boss/jump1');//主管页面
                    $this->ajaxReturn($data);
                }elseif($user['level']==2){
                    $data['error']=0;
                    $data['url']=U('Index/jump');
                    $this->ajaxReturn($data);
                }
            }else{
                $data['error']=1;
                $data['msg']="账号密码错误";
                $this->ajaxReturn($data);
            }
    }
    //服务员退出
    public function loginout(){
        session(null);
        if(ismobile()){
            $this->display('Index/index');
        }else{
            $Pc = new \Home\Controller\PcController();
            $Pc->index();
        }
    }
    //服务员让客户登录界面
    public function waiter(){
        session('conuserid',null);
        $conuser=D('user')->order('num desc')->select();
//        print_r($conuser);
        $this->assign('conuser',$conuser);
        $this->display();
    }
    //客户登录
    public function conlogin(){
        $userphone=I('post.userphone');
        if($userphone==''){
            $data['error']=1;
            $data['msg']="账号为空";
            $this->ajaxReturn($data);
        }
        $user = M("user"); // 实例化User对象
        $username=$user->where("userphone='$userphone' or name='$userphone'")->find();
        if($username['userphone']==''){
            $data['error']=1;
            $data['msg']="此用户不存在";
            $this->ajaxReturn($data);
        }
        session('conuserid',$username['id']);
        $data['error']=0;
        $data['url']=U('Index/conadd');
        $this->ajaxReturn($data);
    }
     public function conlogin2(){
        $userphone=I('post.userphone');
        if($userphone==''){
            $this->success('错误','/yibo/index.php/Home/Index/waiter',0);
        }
        $user = M("user"); // 实例化User对象
        $username=$user->where("name='$userphone'")->find();
        if($username['userphone']==''){
            $this->success('错误','/yibo/index.php/Home/Index/waiter',0);
        }
        session('conuserid',$username['id']);
         $this->redirect("Index/conadd");
    }
//    public function select(){
//        $value1 = session('userid');
//        if($value1==""){
//            $this->error('服务员登录超时，请重新登录','/yibo/index.php/Home/Index/index',3);
//        }
//        $value = session('conuserid');
//        if($value==""){
//            $this->error('客户登录超时，请重新登录','/yibo/index.php/Home/Index/waiter',3);
//        }
//        $consur=D('user')->where("id='$value'")->find();
//        $put=$conrecord=D('record')->where("conid='$value' and out1=''")->find();
//        $this->assign('consur',$consur);
//        $this->assign('put',$put);
//        $this->display();
//    }
    //客户注册页面
    public function reg(){
        $this->display();
    }
    //客户信息注册
    public function conreg(){
        if (!IS_AJAX) {
            $data['error']=1;
            $data['msg']="提交方式不正确";
            $this->ajaxReturn($data);
        }else{
            $userphone=I('post.userphone');
            $name = I('post.name');
            if(empty($userphone)||empty($name)){
                $data['error']=1;
                $data['msg']="请输入帐号姓名";
                $this->ajaxReturn($data);
            }
            $user = M("user"); // 实例化User对象
            $conuser=$user->where("userphone='$userphone'")->find();
            $conname=$user->where("name='$name'")->find();
            if(!empty($conname)){
                $data['error']=1;
                $data['msg']="该姓名已存在";
                $this->ajaxReturn($data);
            }else{
                if(!empty($conuser)){
                    $data['error']=1;
                    $data['msg']="账号已存在";
                    $this->ajaxReturn($data);
                }else{
                    $data['userphone'] = $userphone;
                    $data['name'] = $name;
                    $user->add($data);
                    $data1['error']=0;
                    $data1['url']=U('Index/waiter');
                    $this->ajaxReturn($data1);
                }
            }
          }
        }

//    客户信息上传界面
    public function conadd(){
        $value1 = session('userid');
        if($value1==""){
            $this->error('服务员登录超时，请重新登录','/yibo/index.php/Home/Index/index',0);
        }
        $value = session('conuserid');
        if($value==""){
            $this->error('客户登录超时，请重新登录','/yibo/index.php/Home/Index/waiter',0);
        }
        $user = M("user"); // 实例化User对象
        $conuser=$user->where("id='$value'")->find();
        $data['num']=$conuser['num']+1;
        $user->where("id='$value'")->save($data);
        $admin = M("admin");
        $boss=$admin->where("level=1")->select();
        $waiter=$admin->where("id=$value1")->find();//找到此服务员
        $macid=$waiter['macid'];//此服务员可控制的机器号
        $macarray=explode(',',$macid);//转化为数组
        $mac = M("machine"); // 实例化User对象
        $posmac=$mac->where('level=2')->select();
        if($macid==''){
            $macarray=$mac->where('level=1')->select();
        }
        $last=D('record')->where("conid='$value'")->order('time desc')->limit(1)->select();
        $this->assign('boss',$boss);
        $this->assign('last',$last);
        $this->assign('macarray',$macarray);
        $this->assign('posmac',$posmac);
        $this->assign('conuser',$conuser);
        $this->display();
    }
//    public function conout(){
//        if(empty($_POST)){
//            $value1 = session('userid');
//            if($value1==""){
//                $this->error('服务员登录超时，请重新登录','/yibo/index.php/Home/Index/index',3);
//            }
//            $value = session('conuserid');
//            if($value==""){
//                $this->error('客户登录超时，请重新登录','/yibo/index.php/Home/Index/waiter',3);
//            }
//            $user = M("user"); // 实例化User对象
//            $conuser=$user->where("id='$value'")->find();
//            $conid=$conuser['id'];
//            $conrecord=D('record')->where("conid='$conid' and out1=''")->find();
//            $this->assign('conrecord',$conrecord);
//            $this->assign('conuser',$conuser);
//            $this->display();
//        }else{
//            $id = I('post.conid');
//            $data2['out1'] = I('post.out');
//            $data2['give'] = I('post.give');
//            $data2['turn'] = I('post.turn');
//            $data2['coturn'] = I('post.coturn');
//            if($data2['give']!="" or $data2['coturn']!="" or $data2['turn']!=""){
//                $data['judge']=2;
//                $data['agreetime']=2;
//            }else{
//                $data['judge']=1;
//            }
//            if($data2['out1']!=""){
//                $data['out1']=$data2['out1'];
//            }
//            if($data2['give']!=""){
//                $data['give']=$data2['give'];
//            }
//            if($data2['turn']!=""){
//                $data['turn']=$data2['turn'];
//            }
//            if($data2['coturn']!=""){
//                $data['coturn']=$data2['coturn'];
//            }
//
//            $record = M("record");
//            $record->where("id='$id'")->save($data);
//            $data1['error']=0;
//            $data1['url']=U('Index/jump2');
//            $this->ajaxReturn($data1);
//
//        }
//    }
    //客户信息提交
    public function conaddto(){
        if(!IS_AJAX){
            $data['error']=1;
            $data['msg']="提交方式不正确";
            $this->ajaxReturn($data);
        }else{
            $data['conid'] = I('post.conid');
            $data['conname'] = I('post.name');
            $data['mac'] = I('post.mac');
            $data['conpos'] = I('post.conpos');
            $data['put'] = I('post.put');
            $data['type'] = I('post.type');
            $data['account'] = I('post.account');
            $data['out1'] = I('post.out');
            $data['give'] = I('post.give');
            $data['turn'] = I('post.turn');
            $data['coturn'] = I('post.coturn');
            $data['out2'] = I('post.real');
//            $data['out2'] = I('post.real');
            $data['waitid'] = session('userid');
            $waiid=session('userid');
            $user = M("admin");
            $waiter=$user->where("id='$waiid'")->find();
            $data['wainame'] = $waiter['name'];
            $data['time'] = date('Y-m-d H:i:s');


            if($data['conid']==""){
                $data1['error']=1;
                $data1['msg']="网络错误，请重新登录客户账号";
                $this->ajaxReturn($data1);
            }
            if($data['mac']== "" or $data['conpos'] == ""){
                $data1['error']=1;
                $data1['msg']="机器号或座位号为空";
                $this->ajaxReturn($data1);
            }
            if($data['type']=="网银"){
                if($data['account']==""){
                    $data1['error']=1;
                    $data1['msg']="请输入主管姓名";
                    $this->ajaxReturn($data1);
                }
            }
            if($data['give']!="" or $data['coturn']!="" or $data['turn']!="" or $data['out2']!=""){
                $data['judge']=2;
            }else{
                $data['judge']=1;
            }
            $record = M("record");
            $record->add($data);
            $data1['error']=0;
            $data1['url']=U('Index/waiter');
            $this->ajaxReturn($data1);
        }
    }
    public function bosssee(){

        if(empty($_POST)){
            $see=D('record')->where('agreetime=1 and waisee=1')->select();
            $this->assign('see',$see);
            $this->display();
        }else{
            $recordid = I('post.id');
            $data['waisee']=2;
            D('record')->where("id='$recordid'")->save($data);
            $this->success('处理成功','/yibo/index.php/Home/Index/bosssee',0);
        }
    }

    public function seeout(){
        $data['waisee']=2;
        D('record')->where('agreetime=1 and waisee=1')->save($data);
        $this->success('处理成功','/yibo/index.php/Home/Index/bosssee',0);
    }
    //调转页面
    public function jump(){
        $this->success('成功','/yibo/index.php/Home/Index/waiter',0);
    }
    public function jump2(){
        $this->success('成功','/yibo/index.php/Home/Index/select',0);
    }
}