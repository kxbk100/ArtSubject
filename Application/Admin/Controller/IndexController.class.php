<?php
namespace Admin\Controller;
use Think\Controller;
use \ThinkPHP\Library\Vendor\PHPExcel;
class IndexController extends Controller {
	
	public function index(){
		$this->display();
    }
    
    public function infoEdit(){
        $this -> display();
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
				$this->success('登录成功',U('Admin/Index/passageAdmin?year=2015'));
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
			$Page = new \Think\Page($count,20);
			$show = $Page->show();
			$list = $data_2015->order('id')->page($p.',10')->select();
			$this->assign('list',$list);
			$this->assign('page',$show);
		}else if($year == "2016"){
			$count = $data_2016->count();
			$Page = new \Think\Page($count,20);
			$show = $Page->show();
			$list = $data_2016->order('id')->page($p.',10')->select();
			$this->assign('list',$list);
			$this->assign('page',$show);
		}else if($year == "2017"){
			$count = $data_2017->count();
			$Page = new \Think\Page($count,20);
			$show = $Page->show();
			$list = $data_2017->order('id')->page($p.',10')->select();
			$this->assign('list',$list);
			$this->assign('page',$show);	
		}

		$this->assign('year',$year);
		$this->display();
	}

	public function download(){
        if(is_null(I('session.account','',''))||(I('session.account','','')=='')){
			$this->error('非法进入',U('Admin/Index/index'));
		}
		$year = $_GET['id'];
        if($year == "2015"){
			$data = M("data_2015") -> select();
		}else if($year == "2016"){
			$data = M("data_2016") -> select();
		}else if($year == "2017"){
			$data = M("data_2017") -> select();
		}

        // 导出Exl
        import("Org.Util.PHPExcel");
        import("Org.Util.PHPExcel.Worksheet.Drawing");
        import("Org.Util.PHPExcel.Writer.Excel2007");
        $objPHPExcel = new \PHPExcel();
        $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);
    
        $objActSheet = $objPHPExcel->getActiveSheet();
        
        // 水平居中（位置很重要，建议在最初始位置）
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('A')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('B')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('C')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('D')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('E')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('F')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('G')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('H')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('I')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('J')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('K')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        
        $objActSheet->setCellValue('A1', 'ID');
        $objActSheet->setCellValue('B1', '姓名');
		$objActSheet->setCellValue('C1', 'EMS单号');
		$objActSheet->setCellValue('D1', '机要编号');
        $objActSheet->setCellValue('E1', '学号');
        $objActSheet->setCellValue('F1', '专业班级');
        $objActSheet->setCellValue('G1', '手机号');
        $objActSheet->setCellValue('H1', '档案去向');
        $objActSheet->setCellValue('I1', '身份证号');
        $objActSheet->setCellValue('J1', '备注');
        $objActSheet->setCellValue('K1', '查询情况');

        //设置个表格宽度
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(4);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(9);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(9);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(12);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(45);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(12);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(46);
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(9);
        
        // 垂直居中
        $objPHPExcel->getActiveSheet()->getStyle('A')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('B')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('C')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('D')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('E')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('F')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('G')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('H')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('I')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('J')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('K')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        
        // 处理表数据
        foreach($data as $k => $v){
			$k +=2;
			if($v['is_searched'] == 1){
				$sign = "已查询";
			}else{
				$sign = "未查询";
			}
            $objActSheet->setCellValue('A'.$k, $v['id']);    
            $objActSheet->setCellValue('B'.$k, $v['name']);    
            $objActSheet->setCellValue('C'.$k, $v['ems_id']);    
            $objActSheet->setCellValue('D'.$k, $v['jiyao_id']);
            $objActSheet->setCellValue('E'.$k, $v['student_id']);    
            $objActSheet->setCellValue('F'.$k, $v['major_class']);
            $objActSheet->setCellValue('G'.$k, $v['phone']);    
            $objActSheet->setCellValue('H'.$k, $v['direction']);
            $objActSheet->setCellValue('I'.$k, $v['id_number']);    
            $objActSheet->setCellValue('J'.$k, $v['remark']);
            $objActSheet->setCellValue('K'.$k, $sign);    
            $objActSheet->setCellValue('L'.$k, $v['train']);
        }
        
        $fileName = '学生档案信息';
        $date = date("Y-m-d",time());
        $fileName .= "_{$year}_{$date}.xls";

        $fileName = iconv("utf-8", "gb2312", $fileName);
        //重命名表
        // $objPHPExcel->getActiveSheet()->setTitle('test');
        //设置活动单指数到第一个表,所以Excel打开这是第一个表
        $objPHPExcel->setActiveSheetIndex(0);
        header('Content-Type: application/vnd.ms-excel');
        header("Content-Disposition: attachment;filename=\"$fileName\"");
        header('Cache-Control: max-age=0');

        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output'); //文件通过浏览器下载
        // END    
    }
}