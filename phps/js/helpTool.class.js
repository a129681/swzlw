/**
 * Created by fa on 2016/10/20.
 */
function myCookie()
{
    /**
     * 读取cookie
     * @param:name 想要获取的cookie名字
     */
    this.getCookie=function (name){
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
    this.setCookie= function(name, value,add) {
        alert('a');
            var Days = 30;
            var exp = new Date();
            exp.setTime(exp.getTime() +(1000*add));
            document.cookie = name + "=" + escape(value) + ";expires=" + exp.toUTCString();
        }
    /**+
     *
     * @param name
     */
    this.removeCookie=function(name){
        this.setCookie(name,'-1',-1);
    }
}

function ShapeBase() {
    //formobj = document.getElementsByName(frmname);
    /**
     * 非空校验
     */
    this.notEmpty = function (value, strNote,dfn) {
        dfn.html('');
        var tempValue = value;
        if (tempValue == "") {
            dfn.html(strNote+"不能为空");
            return false;
        }
        return true;
    }
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
    }
    /**
     * 校验登录名：只能输入5-20个以字母开头、可带数字、“_”、“.”的字串
     */
    this.checkUserName = function (value,dfn) {
        dfn.html(' ');//初始化
        var patrn = /^[a-zA-Z][\w]{4,19}$/;
        if(!value)
        {
            return false;
        }

        if (!patrn.exec(value)) {
            dfn.html("只能由5-20个字母开头的数字和下划线组成");
            return false;
        }
        return true;
    }
    /**
     * 校验密码：只能输入6-20个字母、数字、下划线
     */
    this.checkPwd = function (value,dfn) {
        dfn.html('');
        if(!value)
        {
            return false;
        }
        var patrn = /^(\w){6,20}$/;
        if (!patrn.exec(value)) {
            dfn.html("密码只能输入字母、数字、下划线！");
            return false;
        }
        return true;
    }
    /**
     * 校验密码：两次密码是否一致
     */
    this.checkRepeatPwd = function (value1,value2,dfn) {
        dfn.html('');
        if(!value1&&!value2)
        {
            return false;
        }
        if(value1&&value2) {
            if (value1!= value2) {
                dfn.html( "密码不一致！请重新输入");
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
}