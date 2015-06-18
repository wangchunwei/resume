<?php
class SiteController extends CController 
{
    
    public function actionIndex()
    {
        $data = "吕坤杰的简历";
        $this->render("index", array("data" => $data));
        
    }
    
    public function actionList()
        
    {
        $get = $_GET['id'];
        $data = "list";
        $this->render("list", array("data" => $data));
        
    }
    
    public function actionAddress()
    {
        
        $this->render("address");
    }
    
    public function actionMresume()
    {
     	$this->render("mresume");   
    }
    
    
    public function actionContact()
    {
        var_dump($_GET);
        die();
        
        $this->render("contact");
    }
    
    public function actionHistory()
    {
        
     	$this->render("history");   
    }
    
    public function actionSafe()
    {
        $this->render("safe");
    }
    
    public function actionInfo()
    {
    	$this->render("download");    
        
    }
    
    public function actionDownload()
    {
        
        $file_dir ='./assets/';
        $file_name = '吕坤洁_前端开发工程师_简历.pdf';
        $file = fopen($file_dir . $file_name,"r"); // 打开文件
// 输入文件标签
        
        Header("Content-type: application/octet-stream");
        Header("Accept-Ranges: bytes");
        Header("Accept-Length: ".filesize($file_dir . $file_name));
        Header("Content-Disposition: attachment; filename=" . $file_name);
        // 输出文件内容
        echo fread($file,filesize($file_dir . $file_name));
        fclose($file);
        exit();
        
        
        
    }
    
    public function actionMail()
    {
        include("./protected/extensions/PHPMailer/class.phpmailer.php");
        include("./protected/extensions/PHPMailer/class.smtp.php");
        
        $mail    = isset($_POST['mail'])    ? $_POST['mail']    : null;
        $phone   = isset($_POST['phone'])   ? $_POST['phone']   : null;
        $content = isset($_POST['content']) ? $_POST['content'] : null;
        
        if(empty($mail) || strpos($mail, '@') == false){
            echo json_encode(array('msg' => '邮箱不能为空'));
            return;
        }
        
        if(empty($content)){
            echo json_encode(array('msg' => '留言不能为空'));
            return;
        }
        
        $mysql = new SaeMysql();
        
        $sql = "INSERT  INTO `content` ( `mail`, `phone`, `content`, `ctime`) VALUES ( '" .$mail."' , '". $phone."', '". $content. "', NOW() ) ";
        
		$mysql->runSql($sql);
        
        $this->_sendMail($mail);
        $ourMsg = "邮箱:".$mail.",电话:".$phone.",留言:".$content;
        $this->_sendMail("qqtenten@163.com", $ourMsg, '留言提醒');
        echo json_encode(array('msg' => '成功了'));
        
    }
    
    protected function _sendMail($address, $content = '感谢您的宝贵意见，我将做的更好', $subject = '感谢您的宝贵意见') {
        
        $mailer = new PHPmailer();
        $mailer->Host = 'smtp.163.com';
        $mailer->IsSMTP();
        $mailer->SMTPAuth = true;
        
        //链家邮件发件人设置
        $mailer->Username = "willwcw";
        $mailer->Password = 'XXXXXXXX';
        
        $mailer->From = "willwcw@163.com";
        $mailer->FromName = "通知邮件";
        $mailer->CharSet = "UTF-8";
        
        //收件人设置
        $mailer->Encoding = "base64";
        

        $mailer->AddAddress($address);

        $mailer->IsHTML(true);
        $mailer->Subject = $subject;
        $mailer->Body =  $content;
         
        $mailer->Send();
        
        
        
    }
}
