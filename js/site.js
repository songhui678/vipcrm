$(function() {
    $('#carousel').carouFredSel({
        width: '100%',
        items: {
            visible: 3,
            start: -1
        },
        scroll: {
            items: 1,
            duration: 1000,
            timeoutDuration: 3000
        },
        prev: '#prev',
        next: '#next',
        pagination: {
            container: '#pager', 
            deviation: 1
        }
    });

    $(window).scroll(function(event){
        if($(this).scrollTop() > 0){
          if($.browser.ie6){
            $('#goTopButton').css('top', $(this).scrollTop() + $(this).height() - 170);
          }
          if($('#goTopButton').css('display') == 'none'){
            $('#goTopButton').fadeIn();
          }
        }else{
          $('#goTopButton').fadeOut();
        }
      });

    $('#lzform').ajaxForm({
        dataType:'json',
        success:function processJson(data) {
          var items = [];
          $.each(data,function(key, val){var tem=[key,val];items.push(tem)});
          var length = items.length;
          if(data.status != 1){       
            //items[i][0]错误节点名称
            //items[i][1]对应错误提示
            for(var i=0;i<length;i++){
                alert(items[i][1]);
                return false;
            }
          }else{
            document.location.reload(); 
          }
        }
    });
    $(".green_btn").click(
      function(){
        $('#lzform').submit();
      }
    )

    document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000);
});