/**
 * @author 左雨欣
 */
window.getUrlParam=function (name) {
	var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)"); //构造一个含有目标参数的正则表达式对象
	var r = window.location.search.substr(1).match(reg);  //匹配目标参数
	if (r != null) return unescape(r[2]); return ""; //返回参数值
}
//dese64 		
var base64EncodeChars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/";
     var base64DecodeChars = new Array(
         -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
         -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
 	     -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, 62, -1, -1, -1, 63,
         52, 53, 54, 55, 56, 57, 58, 59, 60, 61, -1, -1, -1, -1, -1, -1,
         -1,  0,  1,  2,  3,  4,  5,  6,  7,  8,  9, 10, 11, 12, 13, 14,
         15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, -1, -1, -1, -1, -1,
        -1, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40,
        41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, -1, -1, -1, -1, -1);
    //编码的方法
    function base64encode(str) {
        var out, i, len;
        var c1, c2, c3;
        len = str.length;
        i = 0;
        out = "";
        while(i < len) {
        c1 = str.charCodeAt(i++) & 0xff;
        if(i == len)
        {
            out += base64EncodeChars.charAt(c1 >> 2);
            out += base64EncodeChars.charAt((c1 & 0x3) << 4);
            out += "==";
            break;
        }
        c2 = str.charCodeAt(i++);
        if(i == len)
        {
            out += base64EncodeChars.charAt(c1 >> 2);
            out += base64EncodeChars.charAt(((c1 & 0x3)<< 4) | ((c2 & 0xF0) >> 4));
            out += base64EncodeChars.charAt((c2 & 0xF) << 2);
            out += "=";
            break;
        }
        c3 = str.charCodeAt(i++);
        out += base64EncodeChars.charAt(c1 >> 2);
        out += base64EncodeChars.charAt(((c1 & 0x3)<< 4) | ((c2 & 0xF0) >> 4));
        out += base64EncodeChars.charAt(((c2 & 0xF) << 2) | ((c3 & 0xC0) >>6));
        out += base64EncodeChars.charAt(c3 & 0x3F);
        }
        return out;
    }
    //解码的方法
    function base64decode(str) {
        var c1, c2, c3, c4;
        var i, len, out;
        len = str.length;
        i = 0;
        out = "";
        while(i < len) {
        
        do {
            c1 = base64DecodeChars[str.charCodeAt(i++) & 0xff];
        } while(i < len && c1 == -1);
        if(c1 == -1)
            break;
        
       do {
            c2 = base64DecodeChars[str.charCodeAt(i++) & 0xff];
        } while(i < len && c2 == -1);
        if(c2 == -1)
            break;
        out += String.fromCharCode((c1 << 2) | ((c2 & 0x30) >> 4));
        
        do {
            c3 = str.charCodeAt(i++) & 0xff;
            if(c3 == 61)
            return out;
           c3 = base64DecodeChars[c3];
        } while(i < len && c3 == -1);
       if(c3 == -1)
            break;
        out += String.fromCharCode(((c2 & 0XF) << 4) | ((c3 & 0x3C) >> 2));
        
        do {
            c4 = str.charCodeAt(i++) & 0xff;
            if(c4 == 61)
            return out;
            c4 = base64DecodeChars[c4];
        } while(i < len && c4 == -1);
        if(c4 == -1)
            break;
        out += String.fromCharCode(((c3 & 0x03) << 6) | c4);
        }
        return out;
    }
   function utf16to8(str) {
        var out, i, len, c;
        out = "";
        len = str.length;
        for(i = 0; i < len; i++) {
       c = str.charCodeAt(i);
        if ((c >= 0x0001) && (c <= 0x007F)) {
            out += str.charAt(i);
        } else if (c > 0x07FF) {
            out += String.fromCharCode(0xE0 | ((c >> 12) & 0x0F));
            out += String.fromCharCode(0x80 | ((c >>  6) & 0x3F));
           out += String.fromCharCode(0x80 | ((c >>  0) & 0x3F));
       } else {
           out += String.fromCharCode(0xC0 | ((c >>  6) & 0x1F));
           out += String.fromCharCode(0x80 | ((c >>  0) & 0x3F));
      }
       }
       return out;
   }
  function utf8to16(str) {
       var out, i, len, c;
       var char2, char3;
       out = "";
       len = str.length;
       i = 0;
       while(i < len) {
      c = str.charCodeAt(i++);
       switch(c >> 4)
       { 
         case 0: case 1: case 2: case 3: case 4: case 5: case 6: case 7:
           // 0xxxxxxx
          out += str.charAt(i-1);
           break;
         case 12: case 13:
           // 110x xxxx   10xx xxxx
           char2 = str.charCodeAt(i++);
           out += String.fromCharCode(((c & 0x1F) << 6) | (char2 & 0x3F));
           break;
         case 14:
           // 1110 xxxx  10xx xxxx  10xx xxxx
           char2 = str.charCodeAt(i++);
           char3 = str.charCodeAt(i++);
           out += String.fromCharCode(((c & 0x0F) << 12) |
                          ((char2 & 0x3F) << 6) |
                          ((char3 & 0x3F) << 0));
           break;
       }
       }
      return out;
   }
function wxShare(){
	//alert(1)
	wx.onMenuShareTimeline({
	    title: shareTitle, // 分享标题
	    link: shareUrl, // 分享链接
	    imgUrl: imgUrl, // 分享图标
	    success: function () { 
	        // 用户确认分享后执行的回调函数
	       // alert('分享成功')
	    },
	    cancel: function () { 
	    	//alert('分享失败')
	        // 用户取消分享后执行的回调函数
	    }
	});
	wx.onMenuShareAppMessage({
	    title: shareTitle, // 分享标题
	    desc: descTitle, // 分享描述
	    link: shareUrl, // 分享链接
	    imgUrl: imgUrl, // 分享图标
	    type: '', // 分享类型,music、video或link，不填默认为link
	    dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
	    success: function () {
	    	// alert('分享成功') 
	        // 用户确认分享后执行的回调函数
	    },
	    cancel: function () { 
	    	//alert('分享失败')
	        // 用户取消分享后执行的回调函数
   		 }
	});
	wx.onMenuShareQQ({
	    title: shareTitle, // 分享标题
	    desc: descTitle, // 分享描述
	    link: shareUrl, // 分享链接
	    imgUrl: imgUrl, // 分享图标
	    success: function () { 
	        // 用户确认分享后执行的回调函数
	       // alert('分享成功')
	    },
	    cancel: function () { 
	    	//alert('分享失败')
	        // 用户取消分享后执行的回调函数
	    }
	});
	wx.onMenuShareWeibo({
	    title: shareTitle, // 分享标题
	    desc: descTitle, // 分享描述
	    link: shareUrl, // 分享链接
	    imgUrl: imgUrl, // 分享图标
	   success: function () { 
	        // 用户确认分享后执行的回调函数
	      //  alert('分享成功')
	    },
	    cancel: function () { 
	    	//alert('分享失败')
	        // 用户取消分享后执行的回调函数
	    }
	// });
});
// wx.error(function(res){
	// alert(res)
// });
// wx.checkJsApi({
    // jsApiList: ['onMenuShareTimeline','onMenuShareAppMessage','onMenuShareQQ','onMenuShareWeibo'], // 需要检测的JS接口列表，所有JS接口列表见附录2,
    // success: function(res) {
        // // 以键值对的形式返回，可用的api值true，不可用为false
        // // 如：{"checkResult":{"chooseImage":true},"errMsg":"checkJsApi:ok"}
    // }
// });
}   

function formatDate(time, sep, withYear) {
        sep = sep || '-';
        withYear = (typeof withYear == "undefined") ? true : false;
        time = time * 1000;
        var date = new Date(time);
        return (withYear ? date.getFullYear() + sep : "") + (date.getMonth() + 1) + sep + date.getDate();
    }

function verboseTime(time, stopAt, notFuture) {
        if (time == 0) {
            return "很久前";
        }
        (notFuture === undefined) && (notFuture = true);

        stopAt = stopAt || 'hour';
        time = parseInt(time);
        var now = parseInt(new Date().getTime() / 1000);
        var past = now - time;
        var neg = false;
        if (past < 0) {
            if (notFuture) {
                return "刚刚";
            } else {
                neg = true;
                past = -past;
            }
        }

        var retStr = '';
        do {
            var min = parseInt(past / 60);
            if (min < 60) {
                if (min == 0) {
                    return "刚刚";
                }
                retStr = min + "分钟";
                break;
            }
            if ('min' == stopAt) {
                break;
            }

            var hour = parseInt(min / 60);
            if (hour < 24) {
                retStr = hour + "小时";
                break;
            }
            if ('hour' == stopAt) {
                break;
            }

            var day = parseInt(hour / 24);
            if (day < 30) {
                retStr = day + "天";
                break;
            }
            if ('day' == stopAt) {
                break;
            }

            var month = parseInt(day / 30);
            if (month < 12) {
                retStr = month + "月";
                break;
            }
            if ('month' == stopAt) {
                break;
            }
            var year = parseInt(month / 12);
            retStr = year + "年";
        } while (0);

        if ("" == retStr) {
            return formatDate(time);
        } else {
            return neg ? retStr + "后" : retStr + "前";
        }
 }