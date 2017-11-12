<?php
namespace Admin\Controller;
use Think\Controller;
use \ThinkPHP\Library\Vendor\PHPExcel;
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
		$year = I('get.year','','');
		$data_2015 = M("data_2015");
		$data_2016 = M("data_2016");
		$data_2017 = M("data_2017");

		$p = I('get.p','','')?I('get.p','',''):1;

		if($year == "2015"){
			$count = $data_2015->count();
			$Page = new \Think\Page($count,10);
			$show = $Page->show();
			$list = $data_2015->order('id')->page($p.',10')->select();
			$this->assign('list',$list);
			$this->assign('page',$show);
		}else if($year == "2016"){
			$count = $data_2016->count();
			$Page = new \Think\Page($count,10);
			$show = $Page->show();
			$list = $data_2016->order('id')->page($p.',10')->select();
			$this->assign('list',$list);
			$this->assign('page',$show);
		}else if($year == "2017"){
			$count = $data_2017->count();
			$Page = new \Think\Page($count,10);
			$show = $Page->show();
			$list = $data_2017->order('id')->page($p.',10')->select();
			$this->assign('list',$list);
			$this->assign('page',$show);	
		}

		$this->assign('year',$year);
		$this->display();
	}

	function expStudents(){//导出Excel
        $xlsName  = "students_2015";
        $xlsCell  = array(
	        array('id','序号'),
	        array('institute','学院'),
	        array('name','学生姓名'),
	        array('jiyao_id','机要编号'),
	        array('student_id','学号'),
	        array('major_class','专业班级'),
	        array('phone','学生电话（长号）'),
	        array('direction','档案去向'),
	        array('id_number','身份证号'),
	        array('remark','备注')
        );

        $xlsModel = M('data_2015');
    
        $xlsData  = $xlsModel->Field('id,institute,name,jiyao_id,student_id,major_class,phone,direction,id_number,remark')->select();

        $this->exportExcel($xlsName,$xlsCell,$xlsData);
         
    }

    public function exportExcel($expTitle,$expCellName,$expTableData){
        $xlsTitle = iconv('utf-8', 'gb2312', $expTitle);//文件名称
        $fileName = $_SESSION['account'].date('_YmdHis');//or $xlsTitle 文件名称可根据自己情况设定
        $cellNum = count($expCellName);
        $dataNum = count($expTableData);
        vendor("PHPExcel.PHPExcel");
       
        $objPHPExcel = new Vendor\PHPExcel\PHPExcel();
        $cellName = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ');
        
        $objPHPExcel->getActiveSheet(0)->mergeCells('A1:'.$cellName[$cellNum-1].'1');//合并单元格
       // $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', $expTitle.'  Export time:'.date('Y-m-d H:i:s'));  
        for($i=0;$i<$cellNum;$i++){
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($cellName[$i].'2', $expCellName[$i][1]); 
        } 
          // Miscellaneous glyphs, UTF-8   
        for($i=0;$i<$dataNum;$i++){
          for($j=0;$j<$cellNum;$j++){
            $objPHPExcel->getActiveSheet(0)->setCellValue($cellName[$j].($i+3), $expTableData[$i][$expCellName[$j][0]]);
          }             
        }  
        
        header('pragma:public');
        header('Content-type:application/vnd.ms-excel;charset=utf-8;name="'.$xlsTitle.'.xls"');
        header("Content-Disposition:attachment;filename=$fileName.xls");//attachment新窗口打印inline本窗口打印
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');  
        $objWriter->save('php://output'); 
        exit;   
    }
}