<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
	
	public function index(){
		$this->display();
	}

	public function getInfo(){
		$teacher_account = M("teacher_account");

		$account = I('post.account','','');
		$password = I('post.password','','');

		$fetched = $teacher_account->where("account='$account'")->select();
		if(count($fetched) == 0){
			$this->error('账号不存在',U('Admin/Index/index'));
		}else{
			if($fetched[0]['password'] == md5($password)){
				session("account", $value=$account);
				$this->success('登录成功',U('Admin/Index/passageAdmin'));
			}else{
				$this->error('密码错误',U('Admin/Index/index'));
			}
		}
	}

	public function passageAdmin(){
		if(is_null(I('session.account','',''))||(I('session.account','','')=='')){
				$this->error('非法进入',U('Admin/Index/index'));
		}
		$data_2015 = M("data_2015");
		$data_2016 = M("data_2016");
		$data_2017 = M("data_2017");

		$p = I('get.p','','')?I('get.p','',''):1;

		$result1 = $data_2015->order('id')->page($p.',10')->select();
		$result2 = $data_2016->order('id')->page($p.',10')->select();
		$result3 = $data_2017->order('id')->page($p.',10')->select();

		$this->assign('result1',$result1);
		$this->assign('result2',$result1);
		$this->assign('result3',$result1); 
		$this->assign('a',$p);
		$this->assign('b',$p+1);
		$this->assign('c',$p+2);
		$this->assign('d',$p+3);
		$this->assign('preview',(($p-1)<=0)?1:$p-1);
		$this->assign('next',(($p+1)>=49)?$p:$p+1);
		$this->display();
	}

}