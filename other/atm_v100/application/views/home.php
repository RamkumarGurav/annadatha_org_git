<!-- modal booking form start -->
<div class="booking-model">
   <div class="modal fade" id="popUpBookingForm" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="staticBackdropLabel">Booking Form</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <div class="modal-body-top mb-20">
                  <div class="d-flex gap-24 justify-content-between align-items-center mb-30">
                     <h6 class="guest-title small">Adult</h6>
                     <div class="guest-number">
                        <span class="guest-number-minus">
                           <i class="fa-sharp fa-regular fa-minus"></i>
                        </span>
                        <input class="guest-number-input" type="text" value="3">
                        <span class="guest-number-plus">
                           <i class="fa-sharp fa-regular fa-plus"></i>
                        </span>
                     </div>
                  </div>
                  <div class="d-flex gap-24 justify-content-between align-items-center mb-30">
                     <h6 class="guest-title small">Infant</h6>
                     <div class="guest-number">
                        <span class="guest-number-minus">
                           <i class="fa-sharp fa-regular fa-minus"></i>
                        </span>
                        <input class="guest-number-input" type="text" value="1">
                        <span class="guest-number-plus">
                           <i class="fa-sharp fa-regular fa-plus"></i>
                        </span>
                     </div>
                  </div>
                  <div class="d-flex gap-10 justify-content-between align-items-center">
                     <h6 class="guest-title small">Date</h6>
                     <div class="booking-modal-form-input">
                        <input class="form-control" id="selectingMultipleDate" type="text"
                           placeholder="Select Your date Range" readonly="readonly">
                     </div>
                  </div>
               </div>
               <div class="modal-body-bottom">
                  <h6 class="mb-10">Add Infant's Ages</h6>
                  <div class="booking-infant-age">
                     <select name="years" id="years">
                        <option>9 Years</option>
                        <option>10 Years</option>
                        <option selected>11 Years</option>
                     </select>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <a href="#" class="bd-primary-btn btn-style is-bg radius-60">
                  <span class="bd-primary-btn-text">Continue</span>
                  <span class="bd-primary-btn-circle"></span>
               </a>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- modal booking form end -->

<!-- Body main wrapper start -->
<main class="main-area fix">


   <?php if (!empty($banners_data)): ?>
      <!-- Banner area start -->
      <section class="bd-banner-area banner-style-two banner-slider-mask">

         <div class="swiper banner-two-active p-relative">
            <div class="swiper-wrapper">

               <?php foreach ($banners_data as $item): ?>
                  <div class="swiper-slide">
                     <div class="banner-slider-wrapper">
                        <div class="banner-two-image" data-background="<?= _uploaded_files_ ?>banner/<?= $item->image ?>">
                        </div>
                        <div class="container">
                           <div class="row justify-content-center">
                              <div class="col-xxl-9 col-xl-9 col-lg-10">
                                 <div class="banner-two-content">
                                    <h1 class="banner-title medium fw-7 mb-20 white-text">
                                       <?= $item->title1 ?> <span class="yellow-shape"><?= $item->title2 ?> <img
                                             src="<?= IMAGE ?>shapes/yellow-shape.png"
                                             alt="yellow-shape"></span><?= $item->title3 ?>
                                    </h1>
                                    <p class="banner-description mb-20"><?= $item->title4 ?></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               <?php endforeach; ?>



            </div>
            <!-- navigation button start -->
            <div class="banner-nav-btn  d-md-block">
               <div class="banner-navigation-btn-2">
                  <button class="banner-navigation-prev"><i class="fa-regular fa-angle-left"></i></button>
                  <button class="banner-navigation-next"><i class="fa-regular fa-angle-right"></i></button>
               </div>
            </div>
            <!-- navigation button end -->
         </div>
      </section>
      <!-- Banner area start -->
   <?php endif; ?>




   <section class="bd-team-area section-space ">
      <div class="container">

         <div class="row gy-24 align-items-center justify-content-between section-title-space">
            <div class="col-xl-6 col-md-8">
               <div class="section-title-wrapper">
                  <span class="section-subtitle mb-10">Upcoming</span>
                  <h2 class="section-title">Upcoming Adventure</h2>
               </div>
            </div>
            <div class="col-xl-2 col-md-4">
               <div class="destination-btn text-md-end">
                  <a href="<?= MAINSITE ?>upcoming-adventures" class="bd-primary-btn btn-style has-arrow radius-60">
                     <span class="bd-primary-btn-arrow arrow-right"><i class="fa-regular fa-arrow-right"></i></span>
                     <span class="bd-primary-btn-text">View More</span>
                     <span class="bd-primary-btn-circle"></span>
                     <span class="bd-primary-btn-arrow arrow-left"><i class="fa-regular fa-arrow-right"></i></span>
                  </a>

               </div>
            </div>
         </div>
         <div class="row gy-24">
            <div class="col-xxl-9 col-xl-9 col-lg-7">
               <div class="row gy-24">

                  <?php foreach ($upcoming_adventures_data as $item): ?>
                     <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6">
                        <div class="tour-wrapper style-one">
                           <div class="p-relative">
                              <div class="tour-thumb image-overly">
                                 <a href="<?= MAINSITE ?>upcoming-adventures-details/<?= $item->tour_id ?>"><img
                                       src="<?= _uploaded_files_ ?>cover_image/<?= $item->cover_image ?>" alt="image"></a>
                              </div>
                              <div class="trip-tag">
                                 <a class="trip-tag-border" href="#"><?= $item->available_slots ?> Slots Available</a>
                              </div>
                              <div class="tour-meta d-flex align-items-center justify-content-between">
                                 <!-- <button class="tour-favorite tour-like">
                        <i class="fa-solid fa-heart"></i>
                      </button> -->
                                 <div class="tour-location">
                                    <span><a href="#">
                                          <?php if (!empty($item->duration_day)) {
                                             $dayLabel = 'D';
                                             echo $item->duration_day . '' . $dayLabel . ' ';
                                          }
                                          ?>
                                          <?php if (!empty($item->duration_night)) {
                                             $nightLabel = 'N';
                                             echo $item->duration_night . '' . $nightLabel;
                                          }
                                          ?>

                                       </a></span>
                                 </div>
                              </div>
                           </div>
                           <div class="tour-content">

                              <h5 class="tour-title fw-5 underline "><a
                                    href="<?= MAINSITE ?>upcoming-adventures-details/<?= $item->tour_id ?>"><?= $item->name ?></a>
                              </h5>


                              <?php if (!empty($item->tour_date)): ?>
                                 <section>
                                    <div class="btn-group" style="width:100%">
                                       <button id="dropdownMenuButton" type="button" style="width:100%"
                                          class="btn bg-white dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                          aria-expanded="false">
                                          <a class="dropdown-item d-flex justify-content-between align-items-center" href="#"
                                             onclick="updateButtonText('<?php echo $item->tour_date[0]->start_date_time; ?>', 
                              '<?php echo formatIndianCurrency($item->tour_date[0]->actual_price); ?>')">
                                             <div class="blog-meta-item">
                                                <span class="meta-icon">
                                                   <i class="fa-solid fa-calendar-check"></i>
                                                </span>
                                                <span
                                                   class="meta-text"><?php echo $item->tour_date[0]->start_date_time; ?></span>
                                             </div>
                                             <?php if (empty($item->tour_date[0]->is_discount)): ?>
                                                <span style="font-size:1.3rem;font-weight:bold;color: green;">
                                                   ₹<?= formatIndianCurrency($item->tour_date[0]->actual_price) ?></span>
                                             <?php else: ?>
                                                <div class="p-0">
                                                   <div class="text-muted p-0">
                                                      <del
                                                         style="font-size:1rem">₹<?= formatIndianCurrency($item->tour_date[0]->actual_price) ?></del>
                                                   </div>
                                                   <div class=" font-weight-bold p-0"
                                                      style="font-size:1.3rem;font-weight:bold;color: green;">
                                                      ₹<?= formatIndianCurrency($item->tour_date[0]->discounted_price) ?>
                                                   </div>


                                                </div>

                                             <?php endif; ?>

                                          </a>
                                       </button>
                                       <div class="dropdown-menu" style="width:100%" aria-labelledby="dropdownMenuButton">
                                          <?php foreach ($item->tour_date as $item1): ?>
                                             <a class="dropdown-item d-flex justify-content-between align-items-center"
                                                href="<?= MAINSITE ?>upcoming-adventures-details/<?= $item->tour_id ?>?tour_date_id=<?= $item1->tour_date_id ?>"
                                                onclick="updateButtonText('<?php echo $item1->start_date_time; ?>', '<?php echo formatIndianCurrency($item1->discounted_price); ?>')">
                                                <div class="blog-meta-item">
                                                   <span class="meta-icon">
                                                      <i class="fa-solid fa-calendar-check"></i>
                                                   </span>
                                                   <span class="meta-text"><?php echo $item1->start_date_time; ?></span>
                                                </div>
                                                <?php if (empty($item1->is_discount)): ?>
                                                   <span class="" style="font-size:1.3rem;font-weight:bold;color: green;">
                                                      ₹<?= formatIndianCurrency($item1->actual_price) ?></span>
                                                <?php else: ?>
                                                   <div>
                                                      <div class="text-muted ">
                                                         <del
                                                            style="font-size:1rem;">₹<?= formatIndianCurrency($item1->actual_price) ?></del>
                                                      </div>
                                                      <div class=" font-weight-bold"
                                                         style="font-size:1.3rem;font-weight:bold;color: green;">
                                                         ₹<?= formatIndianCurrency($item1->discounted_price) ?>
                                                      </div>
                                                   </div>

                                                <?php endif; ?>
                                             </a>
                                          <?php endforeach; ?>
                                       </div>
                                    </div>
                                 </section>
                              <?php endif; ?>





                           </div>
                        </div>
                     </div>
                  <?php endforeach; ?>

               </div>
            </div>
            <div class="col-xxl-3 col-xl-3 col-lg-5">
               <aside class="sidebar-wrapper sidebar-sticky">

                  <div class="sidebar-widget-banner p-relative">
                     <div class="sidebar-widget-thumb p-relative">
                        <img src="<?= IMAGE ?>sidebar-img.png" alt="img">
                     </div>
                     <div class="sidebar-widget-content">
                        <span class="bd-play-btn pulse-white mb-40"><i class="fa fa-phone"></i></span>
                        <p class="b3 mb-0">Free Call</p>
                        <h5 class="mb-25"><a href="tel:+919980808500">99808 08500</a></h5>
                        <div class="sidebar-btn">
                           <a class="bd-text-btn style-two" href="<?= MAINSITE ?>contact">Contact
                              <span class="icon__box">
                                 <i class="fa-light fa-angle-right icon__first"></i>
                                 <i class="fa-light fa-angle-right icon__second"></i>
                              </span>
                           </a>
                        </div>
                     </div>
                  </div>
               </aside>
            </div>
         </div>



      </div>
      </div>
   </section>


   <section class="bd-team-area section-space flash-white">
      <div class="container">
         <div class="row gy-24 align-items-center justify-content-between section-title-space">
            <div class="col-xl-6 col-md-8 col-sm-7">
               <div class="section-title-wrapper">
                  <span class="section-subtitle mb-10">Activities</span>
                  <h2 class="section-title">Activities</h2>
               </div>
            </div>
            <div class="col-xl-3 col-md-3 col-sm-3">
               <div class="tour-navigation btn-navigation p-relative style-three d-flex justify-content-md-end">
                  <button class="tourigo-navigation-prev" style="background: #fff"><i
                        class="fa-regular fa-angle-left"></i></button>
                  <button class="tourigo-navigation-next" style="background: #fff"><i
                        class="fa-regular fa-angle-right"></i></button>
               </div>
            </div>
         </div>

         <div class="tour-slide-wrapper p-relative">
            <div class="swiper tour-three-active">
               <div class="swiper-wrapper">
                  <?php if (!empty($activites_data)): ?>
                     <?php foreach ($activites_data as $item): ?>
                        <div class="swiper-slide">
                           <div class="tour-wrapper style-one">
                              <div class="p-relative">
                                 <div class="tour-thumb image-overly">
                                    <a href="<?= MAINSITE ?>activities-details/<?= $item->tour_id ?>"><img
                                          src="<?= _uploaded_files_ ?>cover_image/<?= $item->cover_image ?>" alt="image"></a>
                                 </div>
                                 <div class="trip-tag">
                                    <a class="trip-tag-border" href="#"><?= $item->available_slots ?> Slots Available</a>
                                 </div>
                                 <div class="tour-meta d-flex align-items-center justify-content-between">
                                    <!-- <button class="tour-favorite tour-like">
                        <i class="fa-solid fa-heart"></i>
                      </button> -->
                                    <div class="tour-location">
                                       <span><a href="#">
                                             <?php if (!empty($item->duration_day)) {
                                                $dayLabel = 'D';
                                                echo $item->duration_day . '' . $dayLabel . ' ';
                                             }
                                             ?>
                                             <?php if (!empty($item->duration_night)) {
                                                $nightLabel = 'N';
                                                echo $item->duration_night . '' . $nightLabel;
                                             }
                                             ?>

                                          </a></span>
                                    </div>
                                 </div>
                              </div>
                              <div class="tour-content">

                                 <h5 class="tour-title fw-5 underline "><a
                                       href="<?= MAINSITE ?>activities-details/<?= $item->tour_id ?>"><?= $item->name ?></a>
                                 </h5>




                                 <?php if (!empty($item->tour_date)): ?>
                                    <section>
                                       <div class="btn-group dropup" style="width:100%">
                                          <button id="dropdownMenuButton" type="button" style="width:100%"
                                             class="btn bg-white dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                             aria-expanded="false">
                                             <a class="dropdown-item d-flex justify-content-between align-items-center" href="#"
                                                onclick="updateButtonText('<?php echo $item->tour_date[0]->start_date_time; ?>', 
                              '<?php echo formatIndianCurrency($item->tour_date[0]->actual_price); ?>')">
                                                <div class="blog-meta-item">
                                                   <span class="meta-icon">
                                                      <i class="fa-solid fa-calendar-check"></i>
                                                   </span>
                                                   <span
                                                      class="meta-text"><?php echo $item->tour_date[0]->start_date_time; ?></span>
                                                </div>
                                                <?php if (empty($item->tour_date[0]->is_discount)): ?>
                                                   <span style="font-size:1.3rem;font-weight:bold;color: green;">
                                                      ₹<?= formatIndianCurrency($item->tour_date[0]->actual_price) ?></span>
                                                <?php else: ?>
                                                   <div>
                                                      <div class="text-muted ">
                                                         <del
                                                            style="font-size:1rem">₹<?= formatIndianCurrency($item->tour_date[0]->actual_price) ?></del>
                                                      </div>
                                                      <div class=" font-weight-bold"
                                                         style="font-size:1.3rem;font-weight:bold;color: green;">
                                                         ₹<?= formatIndianCurrency($item->tour_date[0]->discounted_price) ?>
                                                      </div>
                                                   </div>

                                                <?php endif; ?>

                                             </a>
                                          </button>
                                          <div class="dropdown-menu" style="width:100%" aria-labelledby="dropdownMenuButton">
                                             <?php foreach ($item->tour_date as $item1): ?>
                                                <a class="dropdown-item d-flex justify-content-between align-items-center"
                                                   href="<?= MAINSITE ?>activities-details/<?= $item->tour_id ?>?tour_date_id=<?= $item1->tour_date_id ?>"
                                                   onclick="updateButtonText('<?php echo $item1->start_date_time; ?>', '<?php echo formatIndianCurrency($item1->discounted_price); ?>')">
                                                   <div class="blog-meta-item">
                                                      <span class="meta-icon">
                                                         <i class="fa-solid fa-calendar-check"></i>
                                                      </span>
                                                      <span class="meta-text"><?php echo $item1->start_date_time; ?></span>
                                                   </div>
                                                   <?php if (empty($item1->is_discount)): ?>
                                                      <span class="" style="font-size:1.3rem;font-weight:bold;color:green;">
                                                         ₹<?= formatIndianCurrency($item1->actual_price) ?></span>
                                                   <?php else: ?>
                                                      <div>
                                                         <div class="text-muted ">
                                                            <del
                                                               style="font-size:1rem;">₹<?= formatIndianCurrency($item1->actual_price) ?></del>
                                                         </div>
                                                         <div class=" font-weight-bold"
                                                            style="font-size:1.3rem;font-weight:bold;color: green;">
                                                            ₹<?= formatIndianCurrency($item1->discounted_price) ?>
                                                         </div>

                                                      </div>

                                                   <?php endif; ?>
                                                </a>
                                             <?php endforeach; ?>
                                          </div>
                                       </div>
                                    </section>
                                 <?php endif; ?>




                              </div>
                           </div>
                        </div>
                     <?php endforeach; ?>
                  <?php endif; ?>

               </div>
            </div>
         </div>
         <div class="slider-pagination bd-pagination mt-20 justify-content-center"></div>


      </div>
      </div>
   </section>


   <!-- activities area start -->
   <section class="bd-activities-area section-space  p-relative">
      <div class="container">
         <div class="row gy-24 align-items-center justify-content-between section-title-space">
            <div class="col-xl-6 col-md-8">
               <div class="section-title-wrapper">
                  <span class="section-subtitle mb-10">Tours</span>
                  <h2 class="section-title">Domestic Tours</h2>
               </div>
            </div>
            <div class="col-xl-2 col-md-4">
               <div class="destination-btn text-md-end">
                  <a href="<?= MAINSITE ?>domestic-tours" class="bd-primary-btn btn-style has-arrow radius-60">
                     <span class="bd-primary-btn-arrow arrow-right"><i class="fa-regular fa-arrow-right"></i></span>
                     <span class="bd-primary-btn-text">View More</span>
                     <span class="bd-primary-btn-circle"></span>
                     <span class="bd-primary-btn-arrow arrow-left"><i class="fa-regular fa-arrow-right"></i></span>
                  </a>

               </div>
            </div>
         </div>
         <div class="row gy-24">
            <div class="col-xxl-9 col-xl-9 col-lg-7">
               <div class="row gy-24">

                  <?php foreach ($domestic_tours_data as $item): ?>
                     <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6">
                        <div class="tour-wrapper style-one">
                           <div class="p-relative">
                              <div class="tour-thumb image-overly">
                                 <a href="<?= MAINSITE ?>domestic-tours-details/<?= $item->di_tour_id ?>"><img
                                       src="<?= _uploaded_files_ ?>di_tour_cover_image/<?= $item->cover_image ?>"
                                       alt="image"></a>
                              </div>
                              <!-- <div class="trip-tag">
                                 <a class="trip-tag-border" href="#"><?= $item->available_slots ?> Slots Available</a>
                              </div> -->
                              <div class="tour-meta d-flex align-items-center justify-content-between">

                                 <div class="tour-price tour-favorite2 text-white">
                                    <?php if (empty($item->is_discount)): ?>
                                       <span style="color: #FFB700;font-size:1.3rem">
                                          ₹<?= formatIndianCurrency($item->actual_price) ?></span>
                                    <?php else: ?>
                                       <div>
                                          <span class="">
                                             <del
                                                style="font-size:1rem;color:#C2C3C2">₹<?= formatIndianCurrency($item->actual_price) ?></del>
                                          </span>
                                          <span class=" font-weight-bold"
                                             style="font-size:1.3rem;font-weight:bold;color: #FFB700;">
                                             ₹<?= formatIndianCurrency($item->discounted_price) ?>
                                          </span>
                                       </div>

                                    <?php endif; ?>
                                 </div>
                                 <div class="tour-location">
                                    <span><a href="#">
                                          <?php if (!empty($item->duration_day)) {
                                             $dayLabel = 'D';
                                             echo $item->duration_day . '' . $dayLabel . ' ';
                                          }
                                          ?>
                                          <?php if (!empty($item->duration_night)) {
                                             $nightLabel = 'N';
                                             echo $item->duration_night . '' . $nightLabel;
                                          }
                                          ?>

                                       </a></span>
                                 </div>
                              </div>
                           </div>
                           <div class="tour-content">

                              <h5 class="tour-title fw-5 underline "><a
                                    href="<?= MAINSITE ?>domestic-tours-details/<?= $item->di_tour_id ?>"><?= $item->name ?></a>
                              </h5>





                           </div>
                        </div>
                     </div>
                  <?php endforeach; ?>


               </div>
            </div>
            <div class="col-xxl-3 col-xl-3 col-lg-5">
               <aside class="sidebar-wrapper sidebar-sticky">

                  <div class="sidebar-widget-banner p-relative">
                     <div class="sidebar-widget-thumb p-relative">
                        <img src="<?= IMAGE ?>sidebar-img.png" alt="img">
                     </div>
                     <div class="sidebar-widget-content">
                        <span class="bd-play-btn pulse-white mb-40"><i class="fa fa-phone"></i></span>
                        <p class="b3 mb-0">Free Call</p>
                        <h5 class="mb-25"><a href="tel:+919980808500">99808 08500</a></h5>
                        <div class="sidebar-btn">
                           <a class="bd-text-btn style-two" href="<?= MAINSITE ?>contact">Contact
                              <span class="icon__box">
                                 <i class="fa-light fa-angle-right icon__first"></i>
                                 <i class="fa-light fa-angle-right icon__second"></i>
                              </span>
                           </a>
                        </div>
                     </div>
                  </div>
               </aside>
            </div>
         </div>
      </div>
   </section>
   <!-- activities area start -->
   <!-- destination area start -->
   <section class="bd-destination-area section-space p-relative half-bg">
      <div class="container">
         <div class="row gy-24 align-items-center justify-content-between section-title-space">
            <div class="col-xl-6 col-md-7">
               <div class="section-title-wrapper">
                  <span class="section-subtitle white-text mb-10">Tours</span>
                  <h2 class="section-title white-text">International Tours</h2>
               </div>
            </div>
            <div class="col-xl-2 col-md-3">
               <div class="destination-btn text-md-end">
                  <a href="<?= MAINSITE ?>international-tours"
                     class="bd-primary-btn btn-style has-arrow is-bg btn-tertiary is-white radius-60">
                     <span class="bd-primary-btn-arrow arrow-right"><i class="fa-regular fa-arrow-right"></i></span>
                     <span class="bd-primary-btn-text">See all</span>
                     <span class="bd-primary-btn-circle"></span>
                     <span class="bd-primary-btn-arrow arrow-left"><i class="fa-regular fa-arrow-right"></i></span>
                  </a>

               </div>
            </div>
         </div>
         <div class="row gy-24">
            <?php foreach ($international_tours_data as $item): ?>
               <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                  <div class="tour-wrapper style-one">
                     <div class="p-relative">
                        <div class="tour-thumb image-overly" style="max-height:250px;">
                           <a href="<?= MAINSITE ?>international-tours-details/<?= $item->di_tour_id ?>"><img
                                 src="<?= _uploaded_files_ ?>di_tour_cover_image/<?= $item->cover_image ?>"
                                 alt="image"></a>
                        </div>
                        <!-- <div class="trip-tag">
                              <a class="trip-tag-border" href="#"><?= $item->available_slots ?> Slots Available</a>
                           </div> -->
                        <div class="tour-meta d-flex align-items-center justify-content-between">

                           <span class="tour-price tour-favorite2 text-white">
                              <?php if (empty($item->is_discount)): ?>
                                 <span style="color: #FFB700;font-size:1.3rem">
                                    ₹<?= formatIndianCurrency($item->actual_price) ?></span>
                              <?php else: ?>
                                 <div>
                                    <span class="">
                                       <del
                                          style="font-size:1rem;color:#C2C3C2">₹<?= formatIndianCurrency($item->actual_price) ?></del>
                                    </span>
                                    <span class=" font-weight-bold" style="font-size:1.3rem;font-weight:bold;color: #FFB700;">
                                       ₹<?= formatIndianCurrency($item->discounted_price) ?>
                                    </span>
                                 </div>

                              <?php endif; ?>
                           </span>
                           <div class="tour-location">
                              <span><a href="#">
                                    <?php if (!empty($item->duration_day)) {
                                       $dayLabel = 'D';
                                       echo $item->duration_day . '' . $dayLabel . ' ';
                                    }
                                    ?>
                                    <?php if (!empty($item->duration_night)) {
                                       $nightLabel = 'N';
                                       echo $item->duration_night . '' . $nightLabel;
                                    }
                                    ?>

                                 </a></span>
                           </div>
                        </div>
                     </div>
                     <div class="tour-content">

                        <h5 class="tour-title fw-5 underline "><a
                              href="<?= MAINSITE ?>international-tours-details/<?= $item->di_tour_id ?>"><?= $item->name ?></a>
                        </h5>





                     </div>
                  </div>
               </div>
            <?php endforeach; ?>
         </div>

      </div>
   </section>
   <!-- destination area end -->

   <!-- section divider start -->
   <div class="section-divider"></div>
   <!-- section divider start -->


   <!-- tour area start -->
   <section class="bd-tour-area section-space">
      <div class="container">
         <div class="row gy-24 align-items-center justify-content-between section-title-space">
            <div class="col-lg-6 col-md-8">
               <div class="section-title-wrapper">
                  <span class="section-subtitle mb-10">Group Tours</span>
                  <h2 class="section-title">Upcoming Tours</h2>
               </div>
            </div>
            <div class="col-xl-3 col-md-3 col-sm-3">
               <div class="tour-navigation btn-navigation p-relative style-three d-flex justify-content-md-end">
                  <button class="tourigo-navigation-prev"><i class="fa-regular fa-angle-left"></i></button>
                  <button class="tourigo-navigation-next"><i class="fa-regular fa-angle-right"></i></button>
               </div>
            </div>
         </div>
         <div class="row gy-24">
            <div class="col-xxl-3 col-xl-3 col-lg-4 order-lg-0 order-1">
               <div class="cta-wrapper cta-style-four">
                  <div class="cta-thumb-four">
                     <img src="<?= IMAGE ?>cta/cta-img-4.jpg" alt="image">
                  </div>
                  <div class="cta-content">
                     <span class="cta-subtitle">Get Dubai Desert Deal</span>
                     <h3 class="cta-title white-text mb-25">Book Your Tickets Now</h3>

                  </div>
               </div>
            </div>
            <div class="col-xxl-9 col-xl-9 col-lg-8 order-lg-1 order-0">
               <div class="tour-slide-wrapper p-relative">
                  <div class="swiper tour-three-active">
                     <div class="swiper-wrapper">
                        <?php foreach ($upcoming_tours_data as $item): ?>
                           <div class="swiper-slide">
                              <div class="tour-wrapper style-one">
                                 <div class="p-relative">
                                    <div class="tour-thumb image-overly">
                                       <a href="<?= MAINSITE ?>upcoming-tours-details/<?= $item->tour_id ?>"><img
                                             src="<?= _uploaded_files_ ?>cover_image/<?= $item->cover_image ?>"
                                             alt="image"></a>
                                    </div>
                                    <div class="trip-tag">
                                       <a class="trip-tag-border" href="#"><?= $item->available_slots ?> Slots
                                          Available</a>
                                    </div>
                                    <div class="tour-meta d-flex align-items-center justify-content-between">
                                       <!-- <button class="tour-favorite tour-like">
                        <i class="fa-solid fa-heart"></i>
                      </button> -->
                                       <div class="tour-location">
                                          <span><a href="#">
                                                <?php if (!empty($item->duration_day)) {
                                                   $dayLabel = 'D';
                                                   echo $item->duration_day . '' . $dayLabel . ' ';
                                                }
                                                ?>
                                                <?php if (!empty($item->duration_night)) {
                                                   $nightLabel = 'N';
                                                   echo $item->duration_night . '' . $nightLabel;
                                                }
                                                ?>

                                             </a></span>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="tour-content">

                                    <h5 class="tour-title fw-5 underline "><a
                                          href="<?= MAINSITE ?>upcoming-tours-details/<?= $item->tour_id ?>"><?= $item->name ?></a>
                                    </h5>


                                    <?php if (!empty($item->tour_date)): ?>
                                       <section>
                                          <div class="btn-group dropup" style="width:100%">
                                             <button id="dropdownMenuButton" type="button" style="width:100%"
                                                class="btn bg-white dropdown-toggle" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <a class="dropdown-item d-flex justify-content-between align-items-center"
                                                   href="#" onclick="updateButtonText('<?php echo $item->tour_date[0]->start_date_time; ?>', 
                              '<?php echo formatIndianCurrency($item->tour_date[0]->actual_price); ?>')">
                                                   <div class="blog-meta-item">
                                                      <span class="meta-icon">
                                                         <i class="fa-solid fa-calendar-check"></i>
                                                      </span>
                                                      <span
                                                         class="meta-text"><?php echo $item->tour_date[0]->start_date_time; ?></span>
                                                   </div>
                                                   <?php if (empty($item->tour_date[0]->is_discount)): ?>
                                                      <span style="font-size:1.3rem;font-weight:bold;color: green;">
                                                         ₹<?= formatIndianCurrency($item->tour_date[0]->actual_price) ?></span>
                                                   <?php else: ?>
                                                      <div>
                                                         <div class="text-muted ">
                                                            <del
                                                               style="font-size:1rem">₹<?= formatIndianCurrency($item->tour_date[0]->actual_price) ?></del>
                                                         </div>
                                                         <div class=" font-weight-bold"
                                                            style="font-size:1.3rem;font-weight:bold;color: green;">
                                                            ₹<?= formatIndianCurrency($item->tour_date[0]->discounted_price) ?>
                                                         </div>
                                                      </div>

                                                   <?php endif; ?>

                                                </a>
                                             </button>
                                             <div class="dropdown-menu" style="width:100%"
                                                aria-labelledby="dropdownMenuButton">
                                                <?php foreach ($item->tour_date as $item1): ?>
                                                   <a class="dropdown-item d-flex justify-content-between align-items-center"
                                                      href="<?= MAINSITE ?>upcoming-tours-details/<?= $item->tour_id ?>?tour_date_id=<?= $item1->tour_date_id ?>"
                                                      onclick="updateButtonText('<?php echo $item1->start_date_time; ?>', '<?php echo formatIndianCurrency($item1->discounted_price); ?>')">
                                                      <div class="blog-meta-item">
                                                         <span class="meta-icon">
                                                            <i class="fa-solid fa-calendar-check"></i>
                                                         </span>
                                                         <span class="meta-text"><?php echo $item1->start_date_time; ?></span>
                                                      </div>
                                                      <?php if (empty($item1->is_discount)): ?>
                                                         <span class="" style="font-size:1.3rem;font-weight:bold;color:green;">
                                                            ₹<?= formatIndianCurrency($item1->actual_price) ?></span>
                                                      <?php else: ?>
                                                         <div>
                                                            <div class="text-muted ">
                                                               <del
                                                                  style="font-size:1rem;">₹<?= formatIndianCurrency($item1->actual_price) ?></del>
                                                            </div>
                                                            <div class=" font-weight-bold"
                                                               style="font-size:1.3rem;font-weight:bold;color: green;">
                                                               ₹<?= formatIndianCurrency($item1->discounted_price) ?>
                                                            </div>
                                                         </div>

                                                      <?php endif; ?>
                                                   </a>
                                                <?php endforeach; ?>
                                             </div>
                                          </div>
                                       </section>
                                    <?php endif; ?>





                                 </div>
                              </div>
                           </div>
                        <?php endforeach; ?>

                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- tour area end -->



   <!-- testimonial area start -->
   <section class="bd-testimonial-area testimonial-space section-space-top flash-white p-relative">
      <div class="container">
         <div class="row gy-24 align-items-center justify-content-between section-title-space">
            <div class="col-lg-6 col-md-8">
               <div class="section-title-wrapper">
                  <span class="section-subtitle mb-10">Testimonials </span>
                  <h2 class="section-title">Customers Feedback</h2>
               </div>
            </div>
            <div class="col-xl-3 col-md-3 col-sm-3">
               <div class="tour-navigation btn-navigation p-relative style-three d-flex justify-content-md-end">
                  <button class="tourigo-navigation-prev" style="    background: #fff;"><i
                        class="fa-regular fa-angle-left"></i></button>
                  <button class="tourigo-navigation-next" style="    background: #fff;"><i
                        class="fa-regular fa-angle-right"></i></button>
               </div>
            </div>
         </div>
         <!-- <div class="row gy-24 align-items-center text-center justify-content-center section-title-space">
                    <div class="col-xl-6">
                        <div class="section-title-wrapper">
                            <span class="section-subtitle mb-10">Testimonials</span>
                            <h2 class="section-title">Customers Feedback</h2>
                        </div>
                    </div>
                </div> -->
      </div>
      <div class="container">
         <div class="swiper testimonial-active-two">
            <div class="swiper-wrapper">
               <div class="swiper-slide">
                  <div class="testimonial-card testimonial-card-alpha">
                     <div class="testimonial-overlay-img">
                        <img src="<?= IMAGE ?>reviewer-1.png" alt="">
                     </div>
                     <div class="testimonial-card-top">
                        <div class="qoute-icon"><i class="bx bxs-quote-left"></i></div>
                        <div class="testimonial-thumb"><img src="<?= IMAGE ?>r-sm2.png" alt=""></div>
                        <h3 class="testimonial-count">01</h3>
                     </div>
                     <div class="testimonial-body">
                        <p>Prachi Tourism's arrangements were thorough and well-executed, ensuring that the entire trip was hassle-free and enjoyable. </p>
                        <div class="testimonial-bottom">
                           <div class="reviewer-info">
                              <h4 class="reviewer-name">Vathsala A</h4>
                              <h6>Traveller</h6>
                           </div>
                           <ul class="testimonial-rating">
                              <li><i class="bi bi-star-fill"></i></li>
                              <li><i class="bi bi-star-fill"></i></li>
                              <li><i class="bi bi-star-fill"></i></li>
                              <li><i class="bi bi-star-fill"></i></li>
                              <li><i class="bi bi-star-fill"></i></li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="swiper-slide">
                  <div class="testimonial-card testimonial-card-alpha">
                     <div class="testimonial-overlay-img">
                        <img src="<?= IMAGE ?>reviewer-1.png" alt="">
                     </div>
                     <div class="testimonial-card-top">
                        <div class="qoute-icon"><i class="bx bxs-quote-left"></i></div>
                        <div class="testimonial-thumb"><img src="<?= IMAGE ?>r-sm2.png" alt=""></div>
                        <h3 class="testimonial-count">02</h3>
                     </div>
                     <div class="testimonial-body">
                        <p>The personalized care from the tour guides and drivers was particularly appreciated, making the overall experience memorable and worth recommending​.</p>
                        <div class="testimonial-bottom">
                           <div class="reviewer-info">
                              <h4 class="reviewer-name">Ranjan Thiru</h4>
                              <h6>Traveller</h6>
                           </div>
                           <ul class="testimonial-rating">
                              <li><i class="bi bi-star-fill"></i></li>
                              <li><i class="bi bi-star-fill"></i></li>
                              <li><i class="bi bi-star-fill"></i></li>
                              <li><i class="bi bi-star-fill"></i></li>
                              <li><i class="bi bi-star-fill"></i></li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="swiper-slide">
                  <div class="testimonial-card testimonial-card-alpha">
                     <div class="testimonial-overlay-img">
                        <img src="<?= IMAGE ?>reviewer-1.png" alt="">
                     </div>
                     <div class="testimonial-card-top">
                        <div class="qoute-icon"><i class="bx bxs-quote-left"></i></div>
                        <div class="testimonial-thumb"><img src="<?= IMAGE ?>r-sm2.png" alt=""></div>
                        <h3 class="testimonial-count">03</h3>
                     </div>
                     <div class="testimonial-body">
                        <p>Prachi Tourism seems to have a solid reputation for delivering high-quality travel experiences with a strong focus on customer satisfaction.</p>
                        <div class="testimonial-bottom">
                           <div class="reviewer-info">
                              <h4 class="reviewer-name">Haindavi </h4>
                              <h6>Traveller</h6>
                           </div>
                           <ul class="testimonial-rating">
                              <li><i class="bi bi-star-fill"></i></li>
                              <li><i class="bi bi-star-fill"></i></li>
                              <li><i class="bi bi-star-fill"></i></li>
                              <li><i class="bi bi-star-fill"></i></li>
                              <li><i class="bi bi-star-fill"></i></li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
               
               
            </div>
            <div class="slider-pagination-wrapper">
               <div class="slider-pagination bd-pagination mt-50 justify-content-center"></div>
            </div>
         </div>
      </div>
   </section>
   <!-- testimonial area start -->
   <div class="it-work-area it-work-bg grey-bg pt-120 pb-120" data-background="<?= IMAGE ?>work-bg.jpg"
      style="background-image: url(&quot;assets/img/home-2/work/work-bg.jpg&quot;);">
      <div class="container">
         <div class="row align-items-center justify-content-center section-title-space">
            <div class="col-xl-6">
               <div class="section-title-wrapper text-center">
                  <span class="section-subtitle mb-10">Offers</span>
                  <h2 class="section-title">Services Offered</h2>
               </div>
            </div>
         </div>
         <div class="it-work-wrap p-relative">

            <div class="row counter-row">
               <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                  <div class="it-work-item text-center p-relative">
                     <div class="it-work-quantity fix p-relative">
                     </div>
                     <div class="it-work-box">
                        <h3 class="it-work-title">
                           <a href="#">Adventure Tours</a>
                        </h3>
                        <p>Explore offbeat destinations with our carefully crafted adventure tours, including activities
                           such as trekking, camping, water sports, and wildlife excursions.</p>
                     </div>
                  </div>
               </div>
               <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                  <div class="it-work-item text-center p-relative">
                     <div class="it-work-quantity fix p-relative">
                     </div>
                     <div class="it-work-box">
                        <h3 class="it-work-title">
                           <a href="#">Customized Packages</a>
                        </h3>
                        <p>Tailor your adventure according to your preferences with our customizable packages, ensuring
                           a personalized and memorable experience.</p>
                     </div>
                  </div>
               </div>
               <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                  <div class="it-work-item text-center p-relative">
                     <div class="it-work-quantity fix p-relative">
                     </div>
                     <div class="it-work-box">
                        <h3 class="it-work-title">
                           <a href="#">Environmental Workshops</a>
                        </h3>
                        <p>Engage in educational workshops focused on sustainable travel practices, environmental
                           conservation, and responsible tourism.</p>
                     </div>
                  </div>
               </div>
               <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                  <div class="it-work-item text-center p-relative">
                     <div class="it-work-quantity fix p-relative">
                     </div>
                     <div class="it-work-box">
                        <h3 class="it-work-title">
                           <a href="#">Corporate Retreats</a>
                        </h3>
                        <p>Plan team-building and corporate retreats with a touch of adventure, fostering teamwork and
                           rejuvenation.</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- download area end -->
   <!-- <section class="bd-chose-area section-space">
            <div class="container">
                <div class="row align-items-center justify-content-center section-title-space">
                    <div class="col-xl-6">
                        <div class="section-title-wrapper text-center">
                            <span class="section-subtitle mb-10">Offers</span>
                            <h2 class="section-title">Services Offered</h2>
                        </div>
                    </div>
                </div>
                <div class="row gy-24">
                    <ol>
  <li style="--accent-color: #7f3d5a">
    
     <div class="chose-wrapper">
                            <div class="chose-item">
                                <div class="chose-icon"><span><i class="fa-regular fa-user"></i></span></div>
                                <h6 class="chose-title">Adventure Tours</h6>
                                <p class="chose-desc">Explore offbeat destinations with our carefully crafted adventure tours, including activities such as trekking, camping, water sports, and wildlife excursions.</p>
                            </div>
                        </div>
  </li>
  <li style="--accent-color: #7f3d5a">
     <div class="chose-wrapper">
                            <div class="chose-item">
                                <div class="chose-icon"><i class="fa-solid fa-hourglass"></i></div>
                                <h6 class="chose-title">Customized Packages </h6>
                                <p class="chose-desc">Tailor your adventure according to your preferences with our
customizable packages, ensuring a personalized and memorable experience.</p>
                            </div>
                        </div>
  </li>
  <li style="--accent-color: #7f3d5a">
     <div class="chose-wrapper">
                            <div class="chose-item">
                                <div class="chose-icon"><i class="fa-sharp fa-light fa-face-smile"></i></div>
                                <h6 class="chose-title">Environmental Workshops </h6>
                                <p class="chose-desc">Engage in educational workshops focused on sustainable
travel practices, environmental conservation, and responsible tourism.</p>
                            </div>
                        </div>
  </li>
  <li style="--accent-color: #7f3d5a">
    <div class="chose-wrapper">
                            <div class="chose-item">
                                <div class="chose-icon"><i class="fa-sharp fa-regular fa-lock"></i></div>
                                <h6 class="chose-title">Corporate Retreats</h6>
                                <p class="chose-desc">Plan team-building and corporate retreats with a touch of adventure,
fostering teamwork and rejuvenation.</p>
                            </div>
                        </div>
  </li>
</ol>
                    
                   
                    
                </div>
            </div>
        </section> -->
   <!-- chose area end -->
   <section class="bd-offer-area section-space" id="offer">
      <div class="container">
         <div class="row gy-24">
            <div class="col-xxl-6 col-xl-6 col-xl-6 col-lg-6 col-md-12 wow fadeInLeft"
               style="visibility: visible; animation-name: fadeInLeft;">
               <div class="offer-wrapper offer-style-four theme-bg">
                  <div class="offer-content-wrapper">
                     <div class="offer-content mb-25">
                        <h2 class="section-title white-text mb-10">Get Upto 50% Off</h2>
                        <h5 class="offer-subtitle color-warning mb-10">On Yearly Tour Pass</h5>
                        <p>Enjoy Seamless Adventure Through Out the year "Let Escape to Reality"</p>
                     </div>
                     <div class="offer-btn">
                        <a href="<?= MAINSITE ?>contact"
                           class="bd-primary-btn btn-style has-arrow is-bg btn-tertiary is-white radius-60">
                           <span class="bd-primary-btn-arrow arrow-right"><i
                                 class="fa-regular fa-arrow-right"></i></span>
                           <span class="bd-primary-btn-text">Know More</span>
                           <span class="bd-primary-btn-circle"></span>
                           <span class="bd-primary-btn-arrow arrow-left"><i
                                 class="fa-regular fa-arrow-right"></i></span>
                        </a>

                     </div>
                  </div>
                  <div class="offer-image">
                     <img src="<?= IMAGE ?>offer/offer-img-4.png" alt="image">
                  </div>
               </div>
            </div>
            <div class="col-xxl-6 col-xl-6 col-xl-6 col-lg-6 col-md-12 wow fadeInRight"
               style="visibility: visible; animation-name: fadeInRight;">
               <div class="offer-wrapper offer-style-four warning-bg">
                  <div class="offer-content-wrapper">
                     <div class="offer-content mb-25">
                        <h2 class="section-title white-text mb-10">Get 20% off</h2>
                        <span class="b4">Lets Explore the World</span>
                     </div>
                     <div class="offer-btn">
                        <a href="<?= MAINSITE ?>contact" class="bd-primary-btn btn-style has-arrow is-bg is-white radius-60">
                           <span class="bd-primary-btn-arrow arrow-right"><i
                                 class="fa-regular fa-arrow-right"></i></span>
                           <span class="bd-primary-btn-text">Know More</span>
                           <span class="bd-primary-btn-circle"></span>
                           <span class="bd-primary-btn-arrow arrow-left"><i
                                 class="fa-regular fa-arrow-right"></i></span>
                        </a>

                     </div>
                  </div>
                  <div class="offer-image">
                     <img src="<?= IMAGE ?>offer/offer-img-5.png" alt="image">
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>


   <section class="bd-cta-area section-space-small cta-image-bg image-bg p-relative fix"
      data-background="<?= IMAGE ?>cta/cta-img-3.png"
      style="background-image: url(&quot;<?= IMAGE ?>cta/cta-img-3.png&quot;);">
      <div class="container">
         <div class="cta-three-shape">
            <div class="cta-three-shape-one p-absolute">
               <img src="<?= IMAGE ?>shapes/cta-star.png" alt="shape">
            </div>
            <div class="cta-three-shape-two p-absolute">
               <img src="<?= IMAGE ?>shapes/cta-eye.png" alt="shape">
            </div>
            <div class="cta-three-shape-three p-absolute">
               <img src="<?= IMAGE ?>shapes/cta-x.png" alt="shape">
            </div>
            <div class="cta-three-shape-four p-absolute">
               <img src="<?= IMAGE ?>shapes/cta-star.png" alt="shape">
            </div>
            <div class="cta-three-shape-five p-absolute">
               <img src="<?= IMAGE ?>shapes/cta-eye.png" alt="shape">
            </div>
            <div class="cta-three-shape-six p-absolute">
               <img src="<?= IMAGE ?>shapes/cta-x.png" alt="shape">
            </div>
            <div class="cta-three-shape-seven p-absolute">
               <img src="<?= IMAGE ?>shapes/cta-line.png" alt="shape">
            </div>
            <div class="cta-three-shape-eight p-absolute">
               <img src="<?= IMAGE ?>shapes/plane-6.png" alt="shape">
            </div>
         </div>
         <div class="row gy-24 align-items-center justify-content-center">
            <div class="col-xl-6 col-md-8">
               <div class="cta-content-wrapper cta-style-three text-center position-relative z-index-5">
                  <span class="section-subtitle color-warning mb-15">Find New Places To Visit</span>
                  <h2 class="section-title white-text mb-20">Get Ready to Escape from Reality!</h2>
                  <p>Escape from Reality is not just a travel experience; It's a journey into the extraordinary. Join us
                     on an adventure where you can escape the mundane, embrace the thrill, and leave a positive impact
                     on the world. Travel with purpose; Travel with Escape from Reality.
                  </p>
                  <div class="cta-btn">
                     <a href="<?= MAINSITE ?>contact"
                        class="bd-primary-btn btn-style has-arrow is-bg btn-tertiary is-white radius-60">
                        <span class="bd-primary-btn-arrow arrow-right"><i class="fa-regular fa-arrow-right"></i></span>
                        <span class="bd-primary-btn-text">Explore Now</span>
                        <span class="bd-primary-btn-circle"></span>
                        <span class="bd-primary-btn-arrow arrow-left"><i class="fa-regular fa-arrow-right"></i></span>
                     </a>

                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>

   <!-- blog area start -->
   <!-- <section class="bd-blog-area section-space">
      <div class="container">
         <div class="row gy-24 align-items-center justify-content-between section-title-space">
            <div class="col-xl-8 col-lg-8">
               <div class="section-title-wrapper">
                  <span class="section-subtitle mb-10">Our Blog</span>
                  <h2 class="section-title">Blog </h2>
               </div>
            </div>
            <div class="col-xl-3 col-lg-3">
               <div class="blog-btn text-md-end">
                  <a href="#" class="bd-primary-btn btn-style has-arrow is-bg radius-60">
                     <span class="bd-primary-btn-arrow arrow-right"><i class="fa-regular fa-arrow-right"></i></span>
                     <span class="bd-primary-btn-text">See More</span>
                     <span class="bd-primary-btn-circle"></span>
                     <span class="bd-primary-btn-arrow arrow-left"><i class="fa-regular fa-arrow-right"></i></span>
                  </a>

               </div>
            </div>
         </div>
         <div class="swiper blog_activation">
            <div class="swiper-wrapper">
               <div class="swiper-slide">
                  <article class="bd-blog-wrapper blog-default blog-style-three">
                     <div class="blog-thumb image-hover-effect">
                        <a href="#"><img src="<?= IMAGE ?>blog/blog-image-5.png" alt="img"></a>
                     </div>
                     <div class="blog-tag">
                        <span><a href="#">Travel</a></span>
                     </div>
                     <div class="blog-content">
                        <div class="blog-meta-list">
                           <div class="blog-meta-item">
                              <span class="meta-icon">
                                 <i class="fa-solid fa-person"></i>
                              </span>
                              <span class="meta-text">By <a class="meta-author" href="#">Admin</a></span>
                           </div>
                           <div class="blog-meta-item">
                              <span class="meta-icon">
                                 <i class="fa-solid fa-calendar-check"></i>
                              </span>
                              <span class="meta-text"><a href="#">Jan 25 2024</a></span>
                           </div>
                        </div>
                        <h5 class="blog-title mb-30 underline"><a href="#">Exploring the World, One Adventure at a
                              Time</a></h5>
                        <div class="blog-btn">
                           <a href="#" class="bd-primary-btn btn-style has-arrow radius-60">
                              <span class="bd-primary-btn-arrow arrow-right"><i
                                    class="fa-regular fa-arrow-right"></i></span>
                              <span class="bd-primary-btn-text">Read More</span>
                              <span class="bd-primary-btn-circle"></span>
                              <span class="bd-primary-btn-arrow arrow-left"><i
                                    class="fa-regular fa-arrow-right"></i></span>
                           </a>

                        </div>
                     </div>
                  </article>
               </div>
               <div class="swiper-slide">
                  <article class="bd-blog-wrapper blog-default blog-style-three">
                     <div class="blog-thumb image-hover-effect">
                        <a href="#"><img src="<?= IMAGE ?>blog/blog-image-6.png" alt="img"></a>
                     </div>
                     <div class="blog-tag">
                        <span><a href="#">Travel</a></span>
                     </div>
                     <div class="blog-content">
                        <div class="blog-meta-list">
                           <div class="blog-meta-item">
                              <span class="meta-icon">
                                 <i class="fa-solid fa-person"></i>
                              </span>
                              <span class="meta-text">By <a class="meta-author" href="#">Admin </a></span>
                           </div>
                           <div class="blog-meta-item">
                              <span class="meta-icon">
                                 <i class="fa-solid fa-calendar-check"></i>
                              </span>
                              <span class="meta-text"><a href="#">Jan 25 2024</a></span>
                           </div>
                        </div>
                        <h5 class="blog-title mb-30 underline"><a href="#">Unveiling Hidden Gems Around the Globe</a>
                        </h5>
                        <div class="blog-btn">
                           <a href="#" class="bd-primary-btn btn-style has-arrow radius-60">
                              <span class="bd-primary-btn-arrow arrow-right"><i
                                    class="fa-regular fa-arrow-right"></i></span>
                              <span class="bd-primary-btn-text">Read More</span>
                              <span class="bd-primary-btn-circle"></span>
                              <span class="bd-primary-btn-arrow arrow-left"><i
                                    class="fa-regular fa-arrow-right"></i></span>
                           </a>

                        </div>
                     </div>
                  </article>
               </div>
               <div class="swiper-slide">
                  <article class="bd-blog-wrapper blog-default blog-style-three">
                     <div class="blog-thumb image-hover-effect">
                        <a href="#"><img src="<?= IMAGE ?>blog/blog-image-2.png" alt="img"></a>
                     </div>
                     <div class="blog-tag">
                        <span><a href="#">Wellness</a></span>
                     </div>
                     <div class="blog-content">
                        <div class="blog-meta-list">
                           <div class="blog-meta-item">
                              <span class="meta-icon">
                                 <i class="fa-solid fa-person"></i>
                              </span>
                              <span class="meta-text">By <a class="meta-author" href="#">Admin </a></span>
                           </div>
                           <div class="blog-meta-item">
                              <span class="meta-icon">
                                 <i class="fa-solid fa-calendar-check"></i>
                              </span>
                              <span class="meta-text"><a href="#">Jan 25 2024</a></span>
                           </div>
                        </div>
                        <h5 class="blog-title mb-30 underline"><a href="#">Where Every Destination Tells a Story</a>
                        </h5>
                        <div class="blog-btn">
                           <a href="#" class="bd-primary-btn btn-style has-arrow radius-60">
                              <span class="bd-primary-btn-arrow arrow-right"><i
                                    class="fa-regular fa-arrow-right"></i></span>
                              <span class="bd-primary-btn-text">Read More</span>
                              <span class="bd-primary-btn-circle"></span>
                              <span class="bd-primary-btn-arrow arrow-left"><i
                                    class="fa-regular fa-arrow-right"></i></span>
                           </a>

                        </div>
                     </div>
                  </article>
               </div>
               <div class="swiper-slide">
                  <article class="bd-blog-wrapper blog-default blog-style-three">
                     <div class="blog-thumb image-hover-effect">
                        <a href="#"><img src="<?= IMAGE ?>blog/blog-image-4.png" alt="img"></a>
                     </div>
                     <div class="blog-tag">
                        <span><a href="#">Trip</a></span>
                     </div>
                     <div class="blog-content">
                        <div class="blog-meta-list">
                           <div class="blog-meta-item">
                              <span class="meta-icon">
                                 <i class="fa-solid fa-person"></i>
                              </span>
                              <span class="meta-text">By <a class="meta-author" href="#">Admin </a></span>
                           </div>
                           <div class="blog-meta-item">
                              <span class="meta-icon">
                                 <i class="fa-solid fa-calendar-check"></i>
                              </span>
                              <span class="meta-text"><a href="#">January 02 2024</a></span>
                           </div>
                        </div>
                        <h5 class="blog-title mb-30 underline"><a href="#">Embark on Your Next Adventure with Us</a>
                        </h5>
                        <div class="blog-btn">
                           <a href="#" class="bd-primary-btn btn-style has-arrow radius-60">
                              <span class="bd-primary-btn-arrow arrow-right"><i
                                    class="fa-regular fa-arrow-right"></i></span>
                              <span class="bd-primary-btn-text">Read More</span>
                              <span class="bd-primary-btn-circle"></span>
                              <span class="bd-primary-btn-arrow arrow-left"><i
                                    class="fa-regular fa-arrow-right"></i></span>
                           </a>

                        </div>
                     </div>
                  </article>
               </div>
            </div>
         </div>
         <div class="blog-slider-pagination bd-pagination mt-20 justify-content-center"></div>
      </div>
   </section> -->
   <!-- blog area end -->


   <!-- cta area start -->
   <section class="bd-cta-section theme-bg fix p-relative">
      <div class="cta-shape-bg" data-background="<?= IMAGE ?>cta/cta-img-2-bg.png">
      </div>
      <div class="container">
         <div class="cta-three-shape">
            <div class="cta-three-shape-one p-absolute">
               <img src="<?= IMAGE ?>shapes/cta-star.png" alt="shape">
            </div>
            <div class="cta-three-shape-two p-absolute">
               <img src="<?= IMAGE ?>shapes/cta-eye.png" alt="shape">
            </div>
            <div class="cta-three-shape-three p-absolute">
               <img src="<?= IMAGE ?>shapes/cta-x.png" alt="shape">
            </div>
            <div class="cta-three-shape-four p-absolute">
               <img src="<?= IMAGE ?>shapes/cta-star.png" alt="shape">
            </div>
            <div class="cta-three-shape-six p-absolute">
               <img src="<?= IMAGE ?>shapes/cta-x.png" alt="shape">
            </div>
         </div>
         <div class="row align-items-center">
            <div class="col-xl-6 col-lg-4 order-lg-0 order-1 wow fadeInLeft">
               <div class="cta-thumb-wrap cta-style-two p-relative">
                  <div class="cta-thumb-two">
                     <img src="<?= IMAGE ?>cta/cta-img-2.png" alt="image">
                  </div>
               </div>
            </div>
            <div class="col-xl-5 col-lg-6 order-lg-1 order-0">
               <div class="cta-wrapper cta-style-two">
                  <div class="section-title-wrapper mb-35">
                     <h2 class="section-title small white-text mb-15">Subscribe To Our Mailing List & Stay Up To Date
                     </h2>
                     <p class="white-text">Share the core values and principles that drive your company Emphasize a
                        commitment to customer satisfaction</p>
                     <div class="cta-form">
                        <form action="#">
                           <div class="cta-input white-button">
                              <input type="text" placeholder="Your email address">
                              <button type="submit" class="bd-primary-btn btn-style has-arrow is-bg radius-8">
                                 <span class="bd-primary-btn-arrow arrow-right"><i
                                       class="fa-regular fa-arrow-right"></i></span>
                                 <span class="bd-primary-btn-text">Subscribe Now</span>
                                 <span class="bd-primary-btn-circle"></span>
                                 <span class="bd-primary-btn-arrow arrow-left"><i
                                       class="fa-regular fa-arrow-right"></i></span>
                              </button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- cta area end -->



</main>
<!-- Body main wrapper end -->

<!-- Ensure you include the necessary Bootstrap 4 JS and jQuery files -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>