<?php 
  $photos = Photo::find_all();
 ?>
<div class="modal fade" id="photo-library">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Gallery System Library</h4>
      </div>
      <div class="modal-body">
          <div class="col-md-9">
             <div class="thumbnails row">
            
              <?php foreach($photos as $photo){ ?>
                
               <div class="col-xs-2">
                 <a role="checkbox" aria-checked="false" tabindex="0" id="" href="#" class="thumbnail">
                   <img class="modal_thumbnails img-responsive" src="<?=$photo->photo_path()?>" data-src="<?=$photo->photo_path()?>"data-id="<?=$photo->id?>" data-filename="<?=$photo->filename?>">
                 </a>
                  <div class="photo-id hidden"></div>
               </div>

              <?php } ?>

             </div>
          </div><!--col-md-9 -->

  <div class="col-md-3">
    <div id="modal_sidebar">
      <div>
        <p></p>
        <img src="">
      </div>
    </div>
  </div>

   </div><!--Modal Body-->
      <div class="modal-footer">
        <div class="row">
               <!--Closes Modal-->
              <button id="set_user_image" type="button" class="btn btn-primary" disabled="true" data-dismiss="modal">Apply Selection</button>
        </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript">
  $(document).ready(function(){
    var user_id;
    var user_image;
    var photo_id;
    var photo_src;

    var ajax_url = "ajax_user_save_image.php";

    $(".modal_thumbnails").click(function(){
      $("#set_user_image").prop("disabled", false);
      user_id = $("#user-id").data("id");
      user_image = $(this).data("filename");
      photo_src = $(this).data("src");
      photo_id = $(this).data("id");

      var html = "<p>Selected photo</p>";
      html += '<p>Id: ' + photo_id + '</p>';
      html += '<img src="' + photo_src + '" class="img-responsive">';
      
      $("#modal_sidebar").html(html);
    });

    $("#set_user_image").click(function(){
      edit_user();
    });

    function edit_user(){
      $.ajax({
        url: ajax_url,
        data: {
          user_image: user_image,
          user_id: user_id
        },
        type: "POST",
        success: function(data){
          if(!data.error) $("#user-image").prop("src", data);

          $("#modal_sidebar").html("");
        }
      });
    }
  });
</script>
