<?php
/**
 * Created by PhpStorm.
 * User: fa
 * Date: 2016/10/16
 * Time: 14:13
 */
?>

<?php
    class LoginTest  //登陆
    {
        private $user;
        private $key;
        public function __construct($user,$key)
        {
            $this->user=$user;
            $this->key=$key;
        }

        public function isNull()
        {
            if(empty($this->user))
                return "用户名为空";
            elseif(empty($this->key))
                return "密码为空";
            else
                return "请输入用户名";
        }

        public function isRight($sqlUser,$sqlKey)
        {
            if($this->user==$sqlUser&&$this->key==$sqlKey)
                return "pass";
            else
            {
                if($this->user!=$sqlUser)
                    return "账号不存在";
                else
                    return "密码错误";
            }

        }
    }

    class Pagination  //分页
    {
        public static $P=1;
        public $sum;    //数据总条数
        public $sinNum; //单页数据条数
        public $pageNum;//页数
        public $lastPage;//最后一页数目
        public function __construct($Sum,$SinNum)
        {
            $this->sum=$Sum;
            $this->sinNum=$SinNum;
            $this->pageNum=$this->sum/$this->sinNum;
            $this->lastPage=$this->sum%$this->sinNum;
        }

        function page($myPost)
        {
            if($myPost=='') {
                switch ($myPost) {
                    case '上一页':
                        $page = --self::$P;
                        break;
                    case '下一页':
                        $page = ++self::$P;
                        break;
                    default:
                        $page = self::$P = (int)$myPost;
                }
                return $page;
            }
            return self::$P;
        }
    }

    class mySession
    {
        public function start()
        {
            session_start();
        }
        public function destroy()
        {
            session_destroy();
        }

    }
    
    class upload
    {
        public $road;
        public function __construct($myRoad) {
            $this->road=$myRoad;
        }
       public function upload(){
              $file = $_FILES['form_file'];
              //得到传输的数据
    //得到文件名称
              $name = $file['name'];
              $type = strtolower(substr($name,strrpos($name,'.')+1)); //得到文件类型，并且都转化成小写
              $allow_type = array('jpg','jpeg','gif','png'); //定义允许上传的类型
    //判断文件类型是否被允许上传
              if(!in_array($type, $allow_type)){
                //如果不被允许，则直接停止程序运行
                $myRes="图片类型不允许";
                exit();
              }
    //判断是否是通过HTTP POST上传的
              if(!is_uploaded_file($file['tmp_name'])){
                //如果不是通过HTTP POST上传的
                $myRes="非法上传";
                exit();
              }
              if(move_uploaded_file($file['tmp_name'],$this->$road.time().'.'.$type)){
                return substr($this->$road.time().'.'.$type,8);
              }
              else
              {
                return 'image/Infor/default_pic.jpg';
              }
            }
    }




?>
