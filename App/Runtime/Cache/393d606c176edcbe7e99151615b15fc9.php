<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Carousel Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="__CSS__/bootstrap1.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="__CSS__/uploadify.css">
    <link rel="stylesheet" href="__CSS__/screen.css" media="screen">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="__JS__/html5shiv.js"></script>
      <script src="__JS__/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="__CSS__/carousel.css" rel="stylesheet">
  </head>
<!-- NAVBAR
================================================== -->
  <body>
    <div class="navbar-wrapper">
      <div class="container">

        <div class="navbar navbar-inverse navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <a class="navbar-brand" href="#">Greenfibre</a>
              <a class="navbar-brand" href="#">编辑 <?php echo ($result["title"]); ?></a>
            </div>
            <div class="navbar-collapse collapse">

              <ul class="nav navbar-nav">
                <a class="btn btn-default" style="margin-top:10px" href="<?php echo U('Admin/item');?>/type/<?php echo ($result["product_type"]); ?>">&laquo;返回</a>
              </ul>
              <a class="btn btn-default pull-right" href="#" id="submit_content" style="margin-top:7px;">提交 &raquo;</a>
              
            </div>
          </div>
        </div>

      </div>
    </div>

<!-- 
  <section id="product-banner" style="margin-top:100px;"> -->
    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide">
      <!-- Indicators -->
      <ol class="carousel-indicators" id="my_carousel-indicators">
        <?php if(empty($result["banner"])): ?><li data-target="#myCarousel" data-slide-to="1" class="active"></li><?php endif; ?>
        <notempty>
        <?php if(is_array($result["banner"])): $i = 0; $__LIST__ = $result["banner"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li data-target="#myCarousel" data-slide-to="<?php echo ($i); ?>" <?php if(($i) == "1"): ?>class="active"<?php endif; ?>></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </notempty>
      </ol>
      <div class="carousel-inner" id="my_carousel-inner">
        <?php if(empty($result["banner"])): ?><div class="active">
            <img src="data:image/png;base64," data-src="holder.js/100%x500/auto/#777:#7a7a7a/text:First slide" alt="First slide">
            <div class="container">
              <div class="carousel-caption">
                <h1>添加轮转图片</h1>
                <p><a class="btn btn-large btn-primary" data-toggle="modal" data-target="#pic1" href="#">添加图片</a></p>
              </div>
            </div>
          </div><?php endif; ?>
        <?php if(!empty($result["banner"])): if(is_array($result["banner"])): $i = 0; $__LIST__ = $result["banner"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="item <?php if(($i) == "1"): ?>active<?php endif; ?>">
            <img src="__UPLOAD__<?php echo ($vo); ?>" alt="First slide">
            <div class="container">
              <div class="carousel-caption">
                <h1>添加轮转图片</h1>
                <p><a class="btn btn-large btn-primary" data-toggle="modal" data-target="#pic1" href="#">添加图片</a></p>
              </div>
            </div>
          </div><?php endforeach; endif; else: echo "" ;endif; endif; ?>
        
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div><!-- /.carousel -->
    
  <!-- /#product-banner.container -->

  <section id="product-intro" class="container">
    <p><a class="btn btn-default" data-toggle="modal" data-target="#line1" href="#">编辑 &raquo;</a></p>
    <h2 class="title" id="line1_title"><?php echo (($result["line1_title"])?($result["line1_title"]):"在这里添加产品标题"); ?>&nbsp<?php echo ($result["line1_title_en"]); ?></h2>
    <p id="line1_content"><?php echo (($result["line1_text"])?($result["line1_text"]):"在这里添加产品介绍"); ?><br><?php echo ($result["line1_text_en"]); ?></p>
    <?php if(!empty($result["line1_pic"])): ?><img class="featurette-image" src="__UPLOAD__<?php echo ($result["line1_pic"]); ?>" width="452" height="302" alt="Generic placeholder image" id="line1_img"><?php endif; ?>
    <?php if(empty($result["line1_pic"])): ?><img class="featurette-image" src="data:image/png;base64," data-src="holder.js/452x302" alt="Generic placeholder image" id="line1_img"><?php endif; ?>
  </section>
  <!-- /#product-intro.container -->

  <section id="show">
    <div class="container group">
      <p><a class="btn btn-default" data-toggle="modal" data-target="#line2_left" href="#">编辑左边模块 &raquo;</a>
        <a class="btn btn-default" data-toggle="modal" data-target="#line2_right" href="#">编辑右边模块 &raquo;</a></p>
      <h2 id="line2_title"><?php echo (($result["line2_title"])?($result["line2_title"]):"在这里添加产品标题"); ?>&nbsp<?php echo ($result["line2_title_en"]); ?></h2>
      <p id="line2_content"><?php echo (($result["line2_text"])?($result["line2_text"]):"在这里添加产品介绍"); ?>&nbsp<?php echo ($result["line2_text_en"]); ?></p>
      <?php if(empty($result["line2_pic"])): ?><img class="featurette-image" src="data:image/png;base64," data-src="holder.js/416x278" alt="Generic placeholder image" id="line2_img"><?php endif; ?>
      <?php if(!empty($result["line2_pic"])): ?><img class="featurette-image" src="__UPLOAD__<?php echo ($result["line2_pic"]); ?>" width="416" height="278" alt="Generic placeholder image" id="line2_img"><?php endif; ?>

      <div id="show-list">

        <ol id="ol_list">
          <?php if(empty($result["line2_spic"])): ?><li>
            <ul>
              <li>
                <img class="featurette-image" src="data:image/png;base64," data-src="holder.js/133x89" alt="Generic placeholder image">
              </li>
              <li>
                <img class="featurette-image" src="data:image/png;base64," data-src="holder.js/133x89" alt="Generic placeholder image">
              </li>
              <li>
                <img class="featurette-image" src="data:image/png;base64," data-src="holder.js/133x89" alt="Generic placeholder image">
              </li>
              <li>
                <img class="featurette-image" src="data:image/png;base64," data-src="holder.js/133x89" alt="Generic placeholder image">
              </li>
              <li>
                <img class="featurette-image" src="data:image/png;base64," data-src="holder.js/133x89" alt="Generic placeholder image" >
              </li>
              <li>
                <img class="featurette-image" src="data:image/png;base64," data-src="holder.js/133x89" alt="Generic placeholder image">
              </li>
            </ul>
          </li><?php endif; ?>
          <?php if(!empty($result["line2_spic"])): ?><li><ul>
            <?php if(is_array($result["line2_spic"])): $i = 0; $__LIST__ = $result["line2_spic"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($i%6==1)&& $i!=1) echo '</ul></li><li><ul>' ?>
            <li>
              <img src="__UPLOAD__<?php echo ($vo); ?>" alt="" width="133" height="89">
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul></li><?php endif; ?>
          
        </ol>
        <input type="button" value="next" class="button sprite">
      </div>
      <!-- /#show-list -->
    </div>
  </section>
  <!-- /#show -->
      <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2013 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>
    <!-- Modal -->
    <div class="modal fade" id="pic1">
      <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">添加图片</h4>
            </div>
            <form action='<?php echo U("Event/uploadPoster");?>' method="post" enctype="multipart/form-data">
            <div class="modal-body">
            <div class="tab-content" id="myTabContent">
               <input id="file_upload" name="file_upload" type="file" multiple="true">
            </div>                
            </div>
            <div class="modal-footer">
                <a href="javascript:$('#file_upload').uploadify('upload','*')" class="btn btn-primary" >保存</a>
            </div>
          </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="line1">
      <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">添加图片</h4>
            </div>
            <div class="modal-body">
            <div class="tab-content" id="myTabContent">
              <p>
                中文标题：<input type="text" id="line1_edit_titlezh" value="<?php echo ($result["line1_title"]); ?>">
                英文标题：<input type="text" id="line1_edit_titleen"  value="<?php echo ($result["line1_title_en"]); ?>">
              </p>
              <p>中文内容：<textarea rows="5" cols="75" id="line1_edit_contentzh"><?php echo ($result["line1_text"]); ?></textarea></p>
              <p>英文内容：<textarea rows="5" cols="75" id="line1_edit_contenten"><?php echo ($result["line1_text_en"]); ?></textarea></p>
              <p>图片：<input id="line1_file_upload" name="file_upload" type="file" multiple="true">
            </div>                
            </div>
            <div class="modal-footer">
                <a href="javascript:$('#line1_file_upload').uploadify('upload','*')"  class="btn btn-primary">保存</a>
            </div>
      </div>
    </div>
  </div>

    <div class="modal fade" id="line2_left">
      <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">添加图片</h4>
            </div>
           <div class="modal-body">
            <div class="tab-content" id="myTabContent">
              <p>
                中文标题:<input type="text" id="line2_edit_titlezh" value="<?php echo ($result["line2_title"]); ?>">
                英文标题:<input type="text" id="line2_edit_titleen" value="<?php echo ($result["line2_title_en"]); ?>">
              </p>
               <p>内容：编辑中文<textarea rows="5" cols="75" id="line2_edit_contentzh"><?php echo ($result["line2_text"]); ?></textarea>
                编辑英文<textarea rows="5" cols="75" id="line2_edit_contenten"><?php echo ($result["line2_text_en"]); ?></textarea>
              </p>
               <p>图片：<input id="line2_file_uploadb" name="file_upload" type="file" multiple="false"></p>
            </div>                
            </div>
            <div class="modal-footer">
                <a href="javascript:$('#line2_file_uploadb').uploadify('upload','*')"  class="btn btn-primary">保存</a>
            </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="line2_right">
      <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">添加图片</h4>
            </div>
           <div class="modal-body">
            <div class="tab-content" id="myTabContent">
               <p>图片：<input id="line2_file_uploads" name="file_upload" type="file" multiple="false"></p>
            </div>                
            </div>
            <div class="modal-footer">
                <a href="javascript:$('#line2_file_uploads').uploadify('upload','*')"  class="btn btn-primary">保存</a>
            </div>
      </div>
    </div>
  </div>
    <script src="__JS__/jquery.js"></script>
    <script src="__JS__/holder.js"></script>
    <script src="__JS__/jquery.min.js" type="text/javascript"></script>
    <script src="__JS__/jquery.uploadify.min.js" type="text/javascript"></script>
  <script src="__JS__/jquery.components.min.js"></script>
    <script src="__JS__/bootstrap.min.js"></script>
  <script>
    $(document).ready(function () {
      var num = 0;
      $('#product-banner').promo();
      $('#show-list').showpic('#show-win');
      $('#show-list input').click(function () {
        $uls = $('#show-list ul');
        l = $uls.size();
        $uls.filter(':visible').hide()
          .end().eq(num++ % l).show();
      });

      var banner = [];
      var content='';
      var list_content='';
      var pic_content='';
      var form_banner_src='';
      var line1_titlezh='';
      var line1_titleen='';
      var line1_contentzh='';
      var line1_contenten='';
      var line1_pic='';
      var line2_titlezh='';
      var line2_titleen='';
      var line2_contentzh='';
      var line2_contenten='';
      var line2_pic='';
      var line2_spic='';
      var i=0;
      $("#file_upload").uploadify({
          'auto'     : false,
          'swf'      : '__IMG__/uploadify.swf',
          'uploader' : '<?php echo U("Event/uploadPoster");?>',
          'onUploadSuccess' : function(file, data, response) {
            var jsonObject = jQuery.parseJSON(data);
              banner.push(jsonObject);
              content=content+'<li data-target="#myCarousel" data-slide-to="'+i+'"';
              if(i==0){
                content=content+' class="active"';
              }
              if(i==0){form_banner_src=form_banner_src+jsonObject.img_src;}
              else{form_banner_src=form_banner_src+':'+jsonObject.img_src;}
              content=content+'></li>';  
              $('#my_carousel-indicators').html(content);
              pic_content=pic_content+'<div class="item';
              if(i==0){pic_content=pic_content+' active';}
              pic_content=pic_content+'"><img src="__UPLOAD__'+jsonObject.img_src+'" data-src="holder.js/50%x500/auto/#777:#7a7a7a/text:First slide" alt="First slide"><div class="container"><div class="carousel-caption"><h1>添加轮转图片</h1><p><a class="btn btn-large btn-primary" data-toggle="modal" data-target="#pic1" href="#">添加图片</a></p></div></div></div>';
              $('#my_carousel-inner').html(pic_content);
              $('#myCarousel').append('<input type="hidden" name="banner_src" value="'+jsonObject.img_src+'"/>');
              i++;
          },
          'onQueueComplete' : function(queueData){
              $('.close').trigger('click');
          },
          'onUploadError' : function(file, errorCode, errorMsg, errorString) {
            alert('The file ' + file.name + ' could not be uploaded: ' + errorString);
          },
      });

      $("#line1_file_upload").uploadify({
          'auto'     : false,
          'swf'      : '__IMG__/uploadify.swf',
          'uploader' : '<?php echo U("Event/uploadPoster");?>',
          'onUploadSuccess' : function(file, data, response) {
              var jsonObject = jQuery.parseJSON(data);
              var titlezh = $('#line1_edit_titlezh').val();
              var titleen = $('#line1_edit_titleen').val();
              var contentzh = $('#line1_edit_contentzh').val();
              var contenten = $('#line1_edit_contenten').val();
              $('#line1_title').html(titlezh+' '+titleen);
              $('#line1_content').html(contentzh+'<br>'+contenten);
              $('#line1_img').attr('src','__UPLOAD__'+jsonObject.img_src);
              line1_titlezh=titlezh;
              line1_titleen=titleen;
              line1_pic=jsonObject.img_src;
              line1_contentzh=contentzh;
              line1_contenten=contenten;
              $('.close').trigger('click');
          },
          'onUploadError' : function(file, errorCode, errorMsg, errorString) {
            alert('The file ' + file.name + ' could not be uploaded: ' + errorString);
          },
      });

      $("#line2_file_uploadb").uploadify({
          'auto'     : false,
          'swf'      : '__IMG__/uploadify.swf',
          'uploader' : '<?php echo U("Event/uploadPoster");?>',
          'onUploadSuccess' : function(file, data, response) {
              var jsonObject = jQuery.parseJSON(data);
              var titlezh = $('#line2_edit_titlezh').val();
              var titleen = $('#line2_edit_titleen').val();
              var contentzh = $('#line2_edit_contentzh').val();
              var contenten = $('#line2_edit_contenten').val();
              $('#line2_title').html(titlezh+' '+titleen);
              $('#line2_content').html(contentzh+'<br>'+contenten);
              $('#line2_img').attr('src','__UPLOAD__'+jsonObject.img_src);
              line2_titlezh=titlezh;
              line2_titleen=titleen;
              line2_pic=jsonObject.img_src;
              line2_contentzh=contentzh;
              line2_contenten=contenten;
              $('.close').trigger('click');
          },
          'onUploadError' : function(file, errorCode, errorMsg, errorString) {
            alert('The file ' + file.name + ' could not be uploaded: ' + errorString);
          },
      });

      var j=1;
     $("#line2_file_uploads").uploadify({
          'auto'     : false,
          'swf'      : '__IMG__/uploadify.swf',
          'uploader' : '<?php echo U("Event/uploadPoster");?>',
          'onUploadSuccess' : function(file, data, response) {
            var jsonObject = jQuery.parseJSON(data);
            if(j%6==1){
              if(j==1){list_content=list_content+'<li><ul>';}
              else{list_content=list_content+'</ul></li><li><ul>'}
              list_content=list_content+'<li><img src="__UPLOAD__'+jsonObject.img_src+'" alt="" width="133" height="89"></li>';
            }else{
              list_content=list_content+'<li><img src="__UPLOAD__'+jsonObject.img_src+'" alt="" width="133" height="89"></li>';
            }
            if(j==1){line2_spic=line2_spic+jsonObject.img_src;}
            else{line2_spic=line2_spic+':'+jsonObject.img_src;}
            j++;
            $('#ol_list').html(list_content);
          },
          'onQueueComplete' : function(queueData) {
              $('.close').trigger('click');
          },
          'onUploadError' : function(file, errorCode, errorMsg, errorString) {
            alert('The file ' + file.name + ' could not be uploaded: ' + errorString);
          },
      });



      $('#submit_content').click(function(){
        $.ajax({
          type:'POST',
          url:'<?php echo U("Event/doEdit");?>',
          data:{
              product_type:'<?php echo ($result["product_type"]); ?>',
              banner:form_banner_src,
              line1_titlezh:line1_titlezh,
              line1_titleen:line1_titleen,
              line1_pic:line1_pic,
              line1_textzh:line1_contentzh,
              line1_texten:line1_contenten,
              line2_titlezh:line2_titlezh,
              line2_titleen:line2_titleen,
              line2_pic:line2_pic,
              line2_textzh:line2_contentzh,
              line2_texten:line2_contenten,
              line2_spic:line2_spic
          },
          success:
              function(data){
                window.location.href='<?php echo U("Admin/index");?>';
              }
        });
      });
    });




  </script>
      <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->


</body>
</html>