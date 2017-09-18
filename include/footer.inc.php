<?php
/*
 * Created by PhpStorm.
 * User: fa
 * Date: 2016/9/8
 * Time: 20:38
 */
if(!defined("IN_TG")){
    exit("Access Defined");
}
?>
<div class="web_foot wid960 marAuto">
    <p>版权所有：郑轻计算机与通信工程学院大学生科技创业中心</p>
    <ul class="clear">
        <li><a href="#">关于我们|</a></li>
        <li><a href="#">法律顾问|</a></li>
        <li><a href="#">刊登广告|</a></li>
        <li><a href="#">联系方式|</a></li>
        <li><a href="#">本站地图|</a></li>
        <li>违法和不良信息举报电话：12345678910</li>
    </ul>
</div>

<script>
       var oLogin=$('<div class="loginBox loginModel">' +
       ' <div class="canBox"><a href="#" class="cancel"></a></div>'+
       ' <div class="mainBox"><div><label >用户名:</label><input type="text" name="userName" autocomplete="off"><dfn></dfn></div>' +
       '<div><label>密码:</label><input type="password" name="userPwd"><dfn></dfn></div>' +
       '<div class="vertify"><label>验证码:</label><input type="text"><span></span><dfn></dfn></div> ' +
       '<div class="submit"><input type="submit" value="登陆"></div></div></div>');
    var oRegister=$('<div class="regBox loginModel">' +
       ' <div class="canBox"><a href="#" class="cancel"></a></div>'+
       ' <div class="mainBox"><div><label >用户名:</label><input type="text" name="userName"><dfn></dfn></div>' +
       '<div><label>密码:</label><input type="password" class="pwd1" name="userPwd"><dfn></dfn></div>' +
       '<div><label>密码:</label><input type="password" class="pwd2" name="pwd2"><dfn></dfn></div>' +
       '<div class="vertify"><label>验证码:</label><input type="text"><span></span><dfn></dfn></div> ' +
       '<div class="submit"><input type="submit" value="注册"></div></div></div>');

       /**+
        * 弹出框登陆效果主函数
        */
       var _Verify='';//全局变量
       (function () {               //主函数
           var oLanding = $('.user_login,.user_register');
           $('.user_login').data("dom", oLogin);   //注入数据1
           $('.user_register').data("dom", oRegister);  //注入数据2

           oLanding.click(function () {
               $('body').append($(this).data('dom'));//插入元素
               $('.loginModel').removeClass('zoomOutUp');
               $('.loginModel').addClass('animated rollIn')
               $('.mark').show();       //开启遮罩
               var _this_data = $(this).data('dom');//获取当前注销对象
               removeDom(_this_data);//关闭弹出框
               verify();    //验证表单
               subLogin(_this_data);
           });
       }());


       /*
       *
       * 验证表单模块
       * */
       function verify(){
           var oText=$('.loginModel input[type=text],.loginModel input[type=password]');
           var oPwd=$('.loginModel input[type=password]');
           var oName=$('.loginModel input[name=userName]');
           oText.blur(function(){
               var oShape=new ShapeBase();
               var notNull=oShape.notEmpty($(this),'输入信息');
               if(notNull) {
                       var checkName = oShape.checkUserName(oName);
                       var checkPwd = oShape.checkPwd(oPwd);
                       var checkRepeat= oShape.checkRepeatPwd($('.pwd1'), $('.pwd2'));
                   if(checkPwd&&checkName&&checkRepeat)
                       _Verify ='reg';
                   if(checkPwd&&checkName&&!checkRepeat)
                       _Verify = 'login';
               }

           });
       }


        /**+
         *
         *登陆前检验模块
         */
       function subLogin(_this_data){
           $('.submit input').click(function(){
               var name=$('.loginModel input[name=userName]');
               var key=$('.loginModel input[name=userPwd]');
               if(_Verify=='login') {
                   var objData={
                       username:name.val(),
                       login_key:key.val(),
                       logType:'login'
                   };
                   loginTest(objData,'登陆',_this_data);
               }
               else if(_Verify=='reg') {
                   var objData={
                       regName:name.val(),
                       regKey:key.val(),
                       logType:'reg'
                   };
                   loginTest(objData,'注册',_this_data);
               }
               else
                   alert("请完善信息再登陆");
               return false;
           });
       }

       /**
        *关闭弹窗函数模块
        *
        */
       function removeDom(_this_data){
           $('.cancel').click(function () {
               $('.loginModel').removeClass('rollIn');
               setTimeout(function(){
                   _this_data.remove();
               },1000);
               $('.loginModel').addClass('zoomOutUp');

               $('.mark').hide();   //关闭遮罩
           });
       }


       /**+
        *登陆数据传送模块
        * @param objData 传输的数据
        * @param strNote 提示信息
        * @param _this_data 指针
        */
       function loginTest(objData,strNote,_this_data) {
           $.ajax({
               url: '../function/login.func.php',
               type: "post",
               data: objData,
               success: function (data) {
                   if ($.trim(data) == 'pass') {
                       removeDom(_this_data);
                       window.location.reload();
                   }
                   else {
                       alert($.trim(data));
                   }
               },
               error: function () {
                   alert('网络连接出问题，请检查网络');
               }
           });
       }
</script>