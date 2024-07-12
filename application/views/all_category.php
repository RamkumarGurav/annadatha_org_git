<div class="products-area ">
   <div class="container">
      <div class="row">
         <?  if (!empty($categories)) { ?>
            <?  foreach ($categories as $c) { ?>
               <div class="col-lg-12">
                  <h2 class="featured-items"><?php  echo $c->name ?></h2>
                  <div id="Container" class="row justify-content-center">
                     <?  if (empty($c->cover_image)) {
                        $c->cover_image = 'default_image.jpg';
                     } ?>
                     <div class="col-sm-6 col-lg-3 mix armchair center-table" style="display: inline-block;" data-bound="">
                        <div class="products-item box-cat ">
                           <a href="<?php  echo base_url() . $c->slug_url ?>">
                              <div class="top">
                                 <img data-src="<?php  echo _uploaded_files_ ?>category//<?php  echo $c->cover_image ?>"
                                    alt="<?php  echo $c->name ?>" title="<?php  echo $c->name ?>" class="lazy">
                                 <div class="inner text-center">
                                    <h4><?php  echo $c->name ?></h4>
                                 </div>
                              </div>
                           </a>
                        </div>
                     </div>
                     <?  if (!empty($c->sub_category)) { ?>
                        <?  foreach ($c->sub_category as $ic) { ?>
                           <?  if (empty($ic->cover_image)) {
                              $ic->cover_image = 'default_image.jpg';
                           } ?>
                           <div class="col-sm-6 col-lg-3 mix armchair center-table" style="display: inline-block;" data-bound="">
                              <div class="products-item box-cat ">
                                 <a href="<?php  echo base_url() . $c->slug_url . '/' . $ic->slug_url ?>">
                                    <div class="top">
                                       <img data-src="<?php  echo _uploaded_files_ ?>/category/<?php  echo $ic->cover_image ?>"
                                          alt="<?php  echo $ic->name ?>" title="<?php  echo $ic->name ?>" class="lazy">
                                       <div class="inner text-center">
                                          <h4><?php  echo $ic->name ?></h4>
                                       </div>
                                    </div>
                                 </a>
                              </div>
                           </div>

                           <?  if (!empty($ic->super_sub_category)) { ?>
                              <?  foreach ($ic->super_sub_category as $ssc) { ?>
                                 <?  if (empty($ssc->cover_image)) {
                                    $ssc->cover_image = 'default_image.jpg';
                                 } ?>
                                 <div class="col-sm-6 col-lg-3 mix armchair center-table" style="display: inline-block;" data-bound="">
                                    <div class="products-item box-cat ">
                                       <a href="<?php  echo base_url() . $c->slug_url . '/' . $ic->slug_url . '/' . $ssc->slug_url ?>">
                                          <div class="top">
                                             <img data-src="<?php  echo _uploaded_files_ ?>/category/<?php  echo $ssc->cover_image ?>"
                                                alt="<?php  echo $ssc->name ?>" title="<?php  echo $ssc->name ?>" class="lazy">
                                             <div class="inner text-center">
                                                <h4><?php  echo $ssc->name ?></h4>
                                             </div>
                                          </div>
                                       </a>
                                    </div>
                                 </div>
                              <?  } ?>
                           <?  } ?>

                        <?  } ?>
                     <?  } ?>
                  </div>
                  <!-- <div class="text-center">
               <a class="common-btn" href="<?php  echo base_url(__allCategories__) ?>">
               Load More 
               <img src="<?php  echo __scriptFilePath__ ?>images/shape1.png" alt="Shape">
               <img src="<?php  echo __scriptFilePath__ ?>images/shape2.png" alt="Shape">
               </a>
            </div> -->
               </div>
            <?  } ?>
         <?  } ?>
      </div>
   </div>
</div>



<script>

   window.addEventListener("load", function () {
      var lazyImages = [].slice.call(document.querySelectorAll("img.lazy"));

      if ("IntersectionObserver" in window) {
         let lazyImageObserver = new IntersectionObserver(function (entries, observer) {
            entries.forEach(function (entry) {
               if (entry.isIntersecting) {
                  let lazyImage = entry.target;
                  lazyImage.src = lazyImage.dataset.src;
                  lazyImage.classList.remove("lazy");
                  lazyImageObserver.unobserve(lazyImage);
               }
            });
         });

         lazyImages.forEach(function (lazyImage) {
            lazyImageObserver.observe(lazyImage);
         });
      } else {
         // Possibly fall back to a more compatible method here
      }
   })

</script>