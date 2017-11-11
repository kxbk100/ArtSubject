<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
	
	public function index(){
		$this->display();
	}

	public function passageStudent(){
		$data_2015 = M("data_2015");
		$data_2016 = M("data_2016");
		$data_2017 = M("data_2017");
		$name = I('post.name'.''.'');
		$id_number = I('post.id_number'.''.'');
		$phone = I('post.phone'.''.'');

		//验证码验证
		$verify_code = I('post.verify'.''.'');
		$verify = new \Think\Verify();
		if($verify->check($verify_code, "")){
			$result1 = $data_2015->where("name='$name'")->select();
			$result2 = $data_2016->where("name='$name'")->select();
			$result3 = $data_2017->where("name='$name'")->select();
			$result = 0;
			if(count($result1) != 0){
				$result = $result1;
				$data = $data_2015;
			}else if(count($result2) != 0){
				$result = $result2;
				$data = $data_2016;
			}else if(count($result3) != 0){
				$result = $result3;
				$data = $data_2017;
			}

			if($result == 0){
				$this->error('未查询到结果，请检查您的信息是否正确',U('Home/Index/index'));
			}else{

				//TODO  验证身份证号是否对应，修改数据库电话号码
				if($result[0]['id_number'] == $id_number){
					$update['id'] = $result[0]['id'];
					$update['phone'] = $phone;
					$data->save($update); 
					$this->assign('result',$result);
					$this->display();
				}else{
					$this->error('身份证号错误',U('Home/Index/index'));
				}

			}

		}else{
			$this->error('验证码错误',U('Home/Index/index'));
		}
	}
 
	//验证码生成  
	public function verify_c(){  
	    $Verify = new \Think\Verify();  
	    $Verify->fontSize = 18;  
	    $Verify->length   = 4;  
	    $Verify->useNoise = false;  
	    $Verify->codeSet = '0123456789';  
	    $Verify->imageW = 130;  
	    $Verify->imageH = 50;  
	    //$Verify->expire = 600;  
	    $Verify->entry();  
	}  

	/** 
	 * 验证码检查
	 */  
	public function check_verify($code, $id = ""){  
	    $verify = new \Think\Verify();  
	    return $verify->check($code, $id);  
	}  

}