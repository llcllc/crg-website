<?
/* Template Name: Exhibition */
$pid = $post->ID;
?>



  <!-- Image for Header -->
  <div class="exhibition-page-container">
    <img src="<?=get('installation_image');?>"/>
    <div class="page-header">
    <?php get_template_part('templates/page', 'header'); ?>
    <h2>On View <?=get('start_date');?> - <?=get('end_date');?></h2>
    </div>
  </div>

  <div class="container exhibition-container-width">
    <div class="row">
      <? if (have_posts()) : while (have_posts()) : the_post(); ?>


      <!-- Press Release -->
      <div class="col-xs-12 col-lg-4 col-lg-push-8">
        <h4>Press Release</h4>
        <a class="print small" href="#" onclick='jQuery("#press-release").print({stylesheet:"/wp-content/themes/crg-website/dist/styles/print.css"}); '><span class="glyphicon glyphicon-print"></span> print</a>
        <div id="press-release">
        <? the_content();?>
        </div>
        <button  type="button" class="btn btn-link expand-arrow pull-right hidden" >
          <span class="glyphicon glyphicon-menu-down"></span>
        </button>
		
      </div>

      <!-- Selected work -->
	  <?php if(get_image('selected_image',1,1,1,$pid)){ ?>
      <div class="col-xs-12 col-lg-8 col-lg-pull-4">
        <h4>Selected Work</h4>
          <?
          $items = get_group('Selected Works');

          //print_r($items);
          //$photoID = $_GET['photo'];


          if(count($items)) :

          $itemsChunk = array_chunk($items,1,false);

          ?>
          <div class="selected-work-slider">

          <?
          foreach ($itemsChunk as $items) :
            ?>
          <div class="selected-work-slider-container">
          <?


            foreach ($items as $key => $item) :
                ?>
                <div class="slide-image"><img data-lazy="<?=$item['selected_image'][1][o];?>"></div>
				<div class="slide-captions"><?=$item['selected_work_caption'][1];?> </div>
                <?
            endforeach;
          ?>
        </div>
          <?
            endforeach;
          endif; //count/items
          ?>
        </div>
      </div>
	  <?php }?>

      <!-- Installation Shots -->
	  <?php if(get_image('selected_image',1,1,1,$pid)){ ?>
      <div class="col-xs-12 col-lg-8 cheat">
        <h4>Installation Shots</h4>
          <?
          $items = get_group('Installation Shots');

          //print_r($items);
          //$photoID = $_GET['photo'];


          if(count($items)) :

          $itemsChunk = array_chunk($items,1,true);

          ?>
          <div class="installation-slider">

          <?
          foreach ($itemsChunk as $items) :
            ?>
          <div class="installation-slider-container">
          <?


            foreach ($items as $key => $item) :
                ?>
                <img data-lazy="<?=$item['installation_image'][1][o];?>">
                <?
            endforeach;
          ?>
        </div>
          <?
            endforeach;
          endif; //count/items
          ?>
        </div>
      </div>
	  <?php }
	  
	  
	  if(get('related_artist',1,1,1,$pid)){ ?>

      <div class="col-xs-12 col-lg-4">
        <h4>Participating Artists:</h4>

      <?
      $artists = get_group('Participating Artists');

      if (is_array($artists)) :

      foreach($artists as $artist) :

        if (!$artist['related_artist'][1]=="") :

      ?>
        <span class="participating-artists"><a href="<?=get_permalink($artist['related_artist'][1]);?>"><?=get_the_title($artist['related_artist'][1]);?></a></span><br/>
      <?
        elseif (!$artist['outside_artist'][1]=="") :
          echo $artist['outside_artist'][1]."<br/>";
        endif;


      endforeach;
        endif;
       ?>
     </div>
<? 
}
	

endwhile; endif; ?>
    </div>
  </div>

<script>
jQuery(document).ready(function($)
{
// Maintaining visibility of the arrows which are not related to any ajax containers (e.g. Biography)
  $.fn.hasOverflow = function() {
  var $this = $(this);
  return $this[0].scrollHeight > $this.outerHeight() ||
      $this[0].scrollWidth > $this.outerWidth();
    };

  var $content = jQuery('#press-release');
  if($content.hasOverflow()) {
   var e = jQuery($content).closest("div").next(".expand-arrow");
   jQuery(e).removeClass("hidden");}

   // Arrows behavior after click
     $('.expand-arrow').toggle(function() {

       var e = $(this).closest("div").find('div');
       var a = $(this).children("span");
       var b = jQuery(this).closest("div").next().next(".cheat");

         $(e[0]).addClass("expand");
         $(a).removeClass("glyphicon-menu-down").addClass("glyphicon-menu-up");
         $(b).addClass("col-lg-pull-4");

       }, function () {
     var e = $(this).closest("div").find('div');
     var a = $(this).children("span");
     var b = jQuery(this).closest("div").next().next(".cheat");

     $(e[0]).removeClass("expand");
     $(a).removeClass("glyphicon-menu-up").addClass("glyphicon-menu-down");
     $(b).removeClass("col-lg-pull-4");
     });
 });
</script>

<script>
//Selected Work slider
    jQuery(document).ready(function(){
      jQuery('.selected-work-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        arrows: false,
        fade: true,
        lazyLoad: 'progressive',
        customPaging: function(slider, i) {
    var thumb = jQuery(slider.$slides[i]).data();
    return '<div class="numberCircle"><div class="height_fix"></div><a class="content">'+(i+1)+'</a></div>';
            },
            responsive: [
                {
                  breakpoint: 1024,
                  settings: {
                      // adaptiveHeight: true,
                      // mobileFirst: true,
                      // arrows: true,
                      // variableWidth: true,
                  }
                }
              ]
      });
    });

    var $status = jQuery('.pagingInfo');
     var $slickElement = jQuery('.slider');

     $slickElement.on('init reInit afterChange', function (event, slick, currentSlide, nextSlide) {
         //currentSlide is undefined on init -- set it to 0 in this case (currentSlide is 0 based)
         var i = (currentSlide ? currentSlide : 0) + 1;
         $status.text(i + '/' + slick.slideCount);
     });
</script>
	 
	 <script>
	 //Selected Work slider
	     jQuery(document).ready(function(){
	       jQuery('.installation-slider').slick({
	         slidesToShow: 1,
	         slidesToScroll: 1,
	         dots: true,
	         arrows: false,
	         fade: true,
	         lazyLoad: 'progressive',
	         customPaging: function(slider, i) {
	     var thumb = jQuery(slider.$slides[i]).data();
	     return '<div class="numberCircle"><div class="height_fix"></div><a class="content">'+(i+1)+'</a></div>';
	             },
	             responsive: [
	                 {
	                   breakpoint: 1024,
	                   settings: {
	                       // adaptiveHeight: true,
	                       // mobileFirst: true,
	                       // arrows: true,
	                       // variableWidth: true,
	                   }
	                 }
	               ]
	       });
	     });

	     var $status = jQuery('.pagingInfo');
	      var $slickElement = jQuery('.slider');

	      $slickElement.on('init reInit afterChange', function (event, slick, currentSlide, nextSlide) {
	          //currentSlide is undefined on init -- set it to 0 in this case (currentSlide is 0 based)
	          var i = (currentSlide ? currentSlide : 0) + 1;
	          $status.text(i + '/' + slick.slideCount);
	      });
	 </script>