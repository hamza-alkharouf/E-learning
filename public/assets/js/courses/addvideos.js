
  $(function() {
    $('input:file').on('change' , function(){
      $count = 0;
      $.each(this.files , (i , v) => {
        var filename = v.name;
        $countpuls = $count+1;
        $('.filenames').append('<div class="name">'+$countpuls+'- '+ filename + '</div>');
        $('.filenames').append('<div class="form-group"> <label for="videoDuration">Video Duration</label><input id="videoDuration"  class="form-control" required  type="text"placeholder="Video Duration"name='+$count+"videoDuration"+'></div>');
  
        $count++;
      });
  
    });
  });