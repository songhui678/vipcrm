function alert(msg){
  msg = String(msg);
  art.dialog({
    title: '欢迎',
    content: msg,
    time:2000,
  });
}
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?2a697ada8f4019ec8c7e71a42a889ca4";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();