$('#frmsearch').on('submit',function(e){
    e.preventDefault();
    var url = $(this).attr('action');
    var data  = $(this).serializeArray();
    var get = $(this).attr('method');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
  
        type:get,
        url:url,
        data:data
  
  
  
  
    }).done(function(data){
  
         $('.result').html(data);
        });
        
      $(document).on('click','.pagination a',function(e){
        e.preventDefault();
        var page=$(this).attr('href').split('?page=')[1];
        var search=$('#search').val();
        
        get_post(page,search)
  
      });
      function get_post(page,search) {
        var url ='/'+'users'+'/'+'searchUser';
  
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
  
          type:get,
          url:url+'?page='+page,
          data:{'search':search},
        }).done(function(data){
  
         $('.result').html(data);
        });
  
      } 
  
  
});
