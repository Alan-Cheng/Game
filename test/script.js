$(document).ready(function() {
    // 加載頁面時，獲取並顯示已有留言
    loadMessages();
  
    // 提交留言表單時，使用AJAX發送請求
    $('#messageForm').submit(function(event) {
      event.preventDefault();
  
      var name = $('#name').val();
      var message = $('#message').val();
  
      // 使用AJAX發送請求
      $.ajax({
        url: 'get_messages.php',
        type: 'POST',
        data: {
          name: name,
          message: message
        },
        success: function(response) {
          // 清空表單
          $('#name').val('');
          $('#message').val('');
  
          // 重新加載留言
          loadMessages();
        }
      });
    });

    // 函數用於獲取並顯示留言
    function loadMessages() {
      $.ajax({
        url: 'get_messages.php',
        type: 'GET',
        success: function(response) {
          // 將回應的HTML插入到messageList區域
          $('#messageList').html(response);
        }
      });
    }
  });
  