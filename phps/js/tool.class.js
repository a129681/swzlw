/**
 * Created by fa on 2016/10/16.
 */


function myCookie()
{
    /**
     * 读取cookie
     * @param:name 想要获取的cookie名字
     */
    myCookie.getCookie=function (name){
        var arr = document.cookie.match(new RegExp("(^| )"+name+"=([^;]*)(;|$)"));
        if(arr != null){
            return unescape(arr[2]);
        }else{
            return null;
        }
    }
    /**+
     *设置cookie
     * @param name 想要设置的名字
     * @param value 设置的值
     * @param iDay 过期时间
     */
    myCookie.setCookie=function setCookie(name,value,iDay){
        var oDate=new Date();
        oDate.setDate(oDate.getDate()+iDay);
        document.cookie=name+"="+value;+"expires="+oDate;
    }
    /**+
     *
     * @param name
     */
    myCookie.removeCookie=function(name){
        setCookie(name,'-1',-1);
    }
}


function ShapeBase() {
    /**
     * 非空校验
     */
    this.notEmpty = function (obj, strNote) {
        obj.next('dfn').html('');
        var tempValue = obj.val();
        if (tempValue == "") {
            obj.next('dfn').html(strNote+"不能为空");
            return false;
        }
        return true;
    };
    /**
     * 验证数字
     * @param minLen:最小长度,不校验传0;maxLen:最大长度,不校验传0
     */
    this.isDigit = function (obj, minLen, maxLen, strNote) {
        var patrn = /^\d|([1-9][0-9]{1,})$/;
        if (!patrn.exec(obj.value)) {
            alert("【" + strNote + "】必须由数字组成!");
            return false;
        }
        //长度验证
        return ShapeBase.lengthLimit(obj, minLen, maxLen, strNote);
        return true;
    };
    /**
     * 校验登录名：只能输入5-20个以字母开头、可带数字、“_”、“.”的字串
     */
    this.checkUserName = function (obj) {
        obj.next('dfn').html('');//初始化
        var value=obj.val();
        var patrn = /^[a-zA-Z][\w]{4,19}$/;
        if(!value)
        {
            return false;
        }
        if (!patrn.exec(value)) {
            obj.next('dfn').html("只能由5-20个字母开头的数字和下划线组成");
            return false;
        }
        return true;
    };
    /**
     * 校验密码：只能输入6-20个字母、数字、下划线
     */
    this.checkPwd = function (obj) {
        obj.next('dfn').html('');
        var value=obj.val();
        if(!value)
        {
            return false;
        }
        var patrn = /^(\w){6,20}$/;
        if (!patrn.exec(value)) {
            obj.next('dfn').html("密码只能输入字母、数字、下划线！");
            return false;
        }
        return true;
    };
    /**
     * 校验密码：两次密码是否一致
     */
    this.checkRepeatPwd = function (obj1, obj2) {
        obj2.next('dfn').html('');
        var value1=obj1.val();
        var value2=obj2.val();
        if(!value1&&!value2)
        {
            return false;
        }
        if(value1&&value2) {
            if (value1!= value2) {
                obj2.next('dfn').html( "密码不一致！请重新输入");
                value1= "";
                value2 = "";
                return false;
            }
            return true;
        }
        return false;
    }
    /**
     * 校验普通电话、传真号码：可以“+”开头，除数字外，可含有“-”
     * @param canImpty:1,可空;0,必填
     */
    this.checkTel = function (obj, canImpty) {
        if (canImpty == 1) {
            if (obj.value == "") {
                return true;
            }
        }
        var patrn = /^[+]{0,1}(\d){1,3}[ ]?([-]?((\d)|[ ]){1,12})+$/;
        if (!patrn.exec(obj.value)) {
            alert("电话/传真号码格式不正确！");
            return false;
        }
        return true;
    }
    /**
     * 验证手机号
     * @param canImpty:1,可空;0,必填
     */
    this.checkMobile = function (obj, canImpty) {
        if (canImpty == 1) {
            if (obj.value == "") {
                return true;
            }
        }
        if (!(/^1[\d]{10}$/g.test(obj.value))) {
            alert("手机号码格式不正确，请确认！");
            return false;
        }
    }
    /**
     * 只能是汉字
     */
    this.isChinese = function (obj, strNote) {
        var reg = /^[\u4e00-\u9fa5]+$/gi;
        if (!reg.test(obj.value)) {
            alert("【" + strNote + "】必须为汉字!");
            //obj.select();
            return false;
        }
        return true;
    }
    /**
     * 长度限制
     * @param obj:对象,minLen:最小长度,maxLen:最大长度
     */
    this.lengthLimit = function (obj, minLen, maxLen, strNote) {
        if (minLen > 0 && maxLen > 0) {
            if (obj.value.length < minLen || obj.value.length > maxLen) {
                alert("【" + strNote + "】长度必须是" + minLen + "至" + maxLen + "个字符!");
            }
        }
        else if (maxLen > 0) {
            if (obj.value.length > maxLen) {
                alert("【" + strNote + "】不能超过" + maxLen + "个字符！");
                //obj.select();
                return false;
            }
        }
        else if (minLen > 0) {
            if (obj.value.length < minLen) {
                alert("【" + strNote + "】不能少于" + minLen + "个字符！");
                //obj.select();
                return false;
            }
        }
        return true;
    }
    /**
     * 验证邮箱格式
     * @param canImpty:1,可空;0,必填
     */
    this.isEmail = function (obj, canImpty) {
        if (canImpty == 1) {
            if (obj.value == "") {
                return true;
            }
        }
        if (obj.value.search(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/) != -1) {
            return true;
        }
        else {
            alert("邮箱格式不正确!");
            //obj.select();
            return false;
        }
    }
    this.maxWord=function (obj,Num){
        var limNum=Num;
        obj.on('input',function(){
            var curLength=$(this).val().length;
            if(curLength>limNum){
                $(this).val(jQuery.trim($(this).val()));
                $(this).val($(this).val().substr(0,limNum));
                $(this).next('dfn').html("超过"+limNum+"字数限制，超出部分将被截断");
            }
            else
            {
                $(this).next('dfn').html("剩余"+(limNum-curLength)+"个字");
            }

        });
    }
}
/***+
 *
 * @param count 一行的页数
 * @param pageCount 总页数
 * @param obj   //插入的对象
 */
function myPage(count,pageCount,obj)
{
    var num=count;
    var objPage=obj;
    var rows=Math.ceil(pageCount/count);
    var pageCount=pageCount;
    function createDomA(num,k)
    {
        var oA="";
        for(var i=1;i<=num;i++)
        {
            oA+='<a href="javascript:void(0)">'+(k*10+i)+'</a>';
        }
        return oA;
    }
    function HIAndSH(key)
    {
        var Up=$('.pageUp');
        var Down=$('.pageDown');
        var Fir=$('.pageFir');
        var End=$('.pageEnd');
        switch (key)
        {
            case 1:
                Up.hide();
                Down.show();
                Fir.hide();
                End.show();break;
            case rows:
                Up.show();
                Down.hide();
                Fir.show();
                End.hide();break;
            default:
                Up.show();
                Down.show();
                Fir.show();
                End.show();
        }
    }

    (function myPage(){
        var oBtn1="<a href='javascript:void(0)' class='pageUp' >上一页</a>";
        var oBtn2="<a href='javascript:void(0)' class='pageDown' >下一页</a>";
        var oBtn3="<a href='javascript:void(0)' class='pageFir' >首页</a>";
        var oBtn4="<a href='javascript:void(0)' class='pageEnd' >尾页</a>";
        if(pageCount<10)
        {
            var oA="<span class='pageBox'>"+createDomA(pageCount,0)+"</span>";
            objPage.append($(oA));
        }
        else
        {
            var oA=createDomA(10,0);
            var oAll=oBtn1+oBtn3+'<span class="pageBox">'+oA+'</span>';
            oAll+=oBtn2+oBtn4;
            objPage.append($(oAll));
            $('.pageDown,.pageUp').attr("rowNum",1);
            HIAndSH(1);
        }
            $('.pageDown').click(function(){
                $('.pageBox').html('');
                var rowNum=Number($(this).attr("rowNum"))+1;
                $('.pageUp,.pageDown').attr('rowNum',rowNum);
                var p=(pageCount-(rowNum-1)*10)>10?10:(pageCount-(rowNum-1)*10);
                var aA=createDomA(p,rowNum-1);
                $('.pageBox').append($(aA));

                HIAndSH(rowNum);
            });
            $('.pageUp').click(function(){
                $('.pageBox').html('');
                var rowNum=Number($(this).attr('rowNum'))-1;
                $('.pageUp,.pageDown').attr('rowNum',rowNum);
                var aA=createDomA(10,rowNum-1);
                $('.pageBox').append($(aA));
                HIAndSH(rowNum);
            });
            $('.pageFir').click(function(){
                $('.pageBox').html('');
                $('.pageUp,.pageDown').attr('rowNum',1);
                var aA=createDomA(10,0);
                $('.pageBox').append($(aA));
                HIAndSH(1);
            });
            $('.pageEnd').click(function(){
                $('.pageBox').html('');
                $('.pageUp,.pageDown').attr('rowNum',rows);
                var aA=createDomA(pageCount-(rows-1)*10,rows-2);
                $('.pageBox').append($(aA));
                HIAndSH(rows);
            });
    }())
}