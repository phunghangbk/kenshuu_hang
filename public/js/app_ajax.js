$("#btnTweet").click(function(e) {
  e.preventDefault();
  $.ajax({
    type: "POST",
    url: '/addArticle',
    data: { 
      '_token': $('input[name=_token]').val(),
      'content': $('textarea[name=content]').val(),},
      success: function(msg) {
        if(msg.errors)
        {
          $('.error').removeClass('hidden');
          $('.error').text(msg.errors.content[0]);
        }else{
          $('.error').addClass('hidden');
          $('#articleList').prepend(msg);
        }
    }
  }).fail(function(jqXHR, ajaxOptions, thrownError)
  {
    alert('server not responding...');
  });
  $('#content').val('');
});

var page = 1;
$("#load_more_button").click(function (e) {
  page++;
  loadMoreData(page);
});

function loadMoreData(page)
{
  $.ajax(
  {
    url: '?page=' + page,
    type: "get",
    beforeSend: function()
    {
      $('.load_more_button').show();
    }
  }).done(function(data)
  {   
    if(data.flag < 10 && data.flag >= 0){
      $('.load_more_button').html("No more records found");
      $('#load_more_button').hide();
    }
    $("#load_more").append(data.view);
  }).fail(function(jqXHR, ajaxOptions, thrownError)
  {
    alert('server not responding...');
  });
}
