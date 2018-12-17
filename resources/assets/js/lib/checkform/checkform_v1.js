/*
* 可檢測的class名：
* pname,ppassword,pemail,pphone,paddress,purl,pmobile
* pchinese,penglish,ptaiwan_id
 */
var onlyEnAndNum = /(\w){4,}$/;//英數字或底線,至少4個字元
var onlyEnAndNum6_12 = /^\w{6,12}$/;//英數字或底線6-12字元
var emailPatt = /\w+(\.\w+)*@\w+(\.\w+)+$/;
var phonePatt = /^[0-9]{8,10}$/;
var urlPatt = /^(https|http|ftp|rtsp|mms)(:\/\/)\w+$/;//http://xxx
var mobilePatt = /^09[0-9]{8}$/;
var chinesePatt = /^[\u4e00-\u9fa5]+$/i;
var englishPatt = /^[A-Za-z]+$/;
//可輸入-或+()及任意英數字及底線和中文 6以上
var addressPatt = /^[\(?\)?\-?\+?\w?\u4e00-\u9fa5]{6,}$/;
//任意英數字及底線和中文 2-15
var namePatt = /^[\w?\u4e00-\u9fa5]{2,15}$/;
function check(){
    var error = [];
    if($(".pname").length > 0) {
        if (namePatt.test($(".pname").val()) == false) {
            alert("輸入格式錯誤");
            $(".pname").focus();
            error.push("error");
        }
    }

    if($(".paccount").length > 0) {
        if (onlyEnAndNum.test($(".paccount").val()) == false) {
            alert("輸入格式錯誤");
            $(".paccount").focus();
            error.push("error");
        }
    }

    if($(".ppassword").length > 0) {
        if (onlyEnAndNum6_12.test($(".ppassword").val()) == false) {
            alert("輸入格式錯誤");
            $(".ppassword").focus();
            error.push("error");
        }
    }

    if($(".pemail").length > 0){
        if (emailPatt.test($(".pemail").val())==false){
            alert("輸入格式錯誤");
            $(".pemail").focus();
            error.push("error");
        }
    }

    if($(".pphone").length > 0) {
        if (phonePatt.test($(".pphone").val()) == false) {
            alert("輸入格式錯誤");
            $(".pphone").focus();
            error.push("error");
        }
    }
    if($(".paddress").length > 0) {
        if (addressPatt.test($(".paddress").val()) == false) {
            alert("輸入格式錯誤");
            $(".paddress").focus();
            error.push("error");
        }
    }
    if($(".purl").length > 0) {
        if (urlPatt.test($(".purl").val()) == false) {
            alert("輸入格式錯誤");
            $(".purl").focus();
            error.push("error");
        }
    }

    if($(".pmobile").length > 0) {
        if (mobilePatt.test($(".pmobile").val()) == false) {
            alert("輸入格式錯誤");
            $(".pmobile").focus();
            error.push("error");
        }
    }

    if($(".pchinese").length > 0) {
        if (chinesePatt.test($(".pchinese").val()) == false) {
            alert("輸入格式錯誤");
            $(".pchinese").focus();
            error.push("error");
        }
    }

    if($(".penglish").length > 0) {
        if (englishPatt.test($(".penglish").val()) == false) {
            alert("輸入格式錯誤");
            $(".penglish").focus();
            error.push("error");
        }
    }

    if($(".ptaiwan_id").length > 0) {
        if(_checkID($(".ptaiwan_id").val())=="error"){
            alert("輸入格式錯誤");
            $(".ptaiwan_id").focus();
            error.push("error");
        }
    }

    if(error.length>0){
        return false;
    }
}

function _checkID(idStr){
    // 依照字母的編號排列，存入陣列備用。
    var letters = new Array('A', 'B', 'C', 'D',
        'E', 'F', 'G', 'H', 'J', 'K', 'L', 'M',
        'N', 'P', 'Q', 'R', 'S', 'T', 'U', 'V',
        'X', 'Y', 'W', 'Z', 'I', 'O');
    // 儲存各個乘數
    var multiply = new Array(1, 9, 8, 7, 6, 5,
        4, 3, 2, 1);
    var nums = new Array(2);
    var firstChar;
    var firstNum;
    var lastNum;
    var total = 0;
    // 撰寫「正規表達式」。第一個字為英文字母，
    // 第二個字為1或2，後面跟著8個數字，不分大小寫。
    var regExpID=/^[a-z](1|2)\d{8}$/i;
    // 使用「正規表達式」檢驗格式
    if (idStr.search(regExpID)==-1) {
        // 基本格式錯誤
        //alert("請仔細填寫身份證號碼");
        return "error";
    } else {
        // 取出第一個字元和最後一個數字。
        firstChar = idStr.charAt(0).toUpperCase();
        lastNum = idStr.charAt(9);
    }
    // 找出第一個字母對應的數字，並轉換成兩位數數字。
    for (var i=0; i<26; i++) {
        if (firstChar == letters[i]) {
            firstNum = i + 10;
            nums[0] = Math.floor(firstNum / 10);
            nums[1] = firstNum - (nums[0] * 10);
            break;
        }
    }
    // 執行加總計算
    for(var i=0; i<multiply.length; i++){
        if (i<2) {
            total += nums[i] * multiply[i];
        } else {
            total += parseInt(idStr.charAt(i-1)) *
                multiply[i];
        }
    }
    // 和最後一個數字比對
    if ((10 - (total % 10))!= lastNum) {
        //alert("身份證號碼寫錯了！");
        return "error";
    }
    return true;
}

