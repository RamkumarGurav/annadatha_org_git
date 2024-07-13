<?php
$tour_date_id = 0;

// Check if the 'tour_date_id' query parameter exists in the URL
if (!empty($this->input->get('tour_date_id'))) {
  $tour_date_id = intval($this->input->get('tour_date_id')); // Update the value and ensure it's an integer
}



?>

<!-- Body main wrapper start -->
<main class="main-area fix">
  <section class="bd-breadcrumb-area p-relative fix">
    <!-- breadcrumb background image -->
    <div class="bd-breadcrumb-bg" data-background="<?= _uploaded_files_ . 'banner_image/' . $tour_data->banner_image ?>"
      style="background-image: url(&quot;<?= _uploaded_files_ . 'banner_image/' . $tour_data->banner_image ?>&quot;);">
    </div>
    <div class="bd-breadcrumb-wrapper p-relative">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-12">
            <div class=" d-flex align-items-center justify-content-center">
              <div class="bd-breadcrumb-content text-center">
                <h1 class="bd-breadcrumb-title"><?= $tour_data->name ?></h1>
                <div class="bd-breadcrumb-list" style="margin-bottom:50px;">
                  <span><a href="<?= MAINSITE ?>"><i class="fa fa-home"></i>Home</a></span>
                  <span><?= $tour_data->name ?></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section class="bd-destinations-details-area section-space">
    <div class="container">
      <div class="row gy-24">
        <div class="col-xxl-8 col-xl-8 col-lg-8">
          <div class="tour-details-wrapper">
            <div class="tour-details mb-25">
              <?php if (!empty($tour_data->carousel_image)): ?>
                <div class="destinations-details-slider details-slide p-relative mb-30">
                  <div
                    class="swiper details-slide-activation swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden">
                    <div class="swiper-wrapper" id="swiper-wrapper-a76d7374f56fc2a4" aria-live="polite"
                      style="transform: translate3d(0px, 0px, 0px);">
                      <?php foreach ($tour_data->carousel_image as $item): ?>
                        <div class="swiper-slide swiper-slide-active" role="group" aria-label="1 / 3"
                          style="width: 856px; margin-right: 24px;">
                          <img src="<?= _uploaded_files_ . 'carousel_image/' . $item->file ?>" alt="image">
                        </div>
                      <?php endforeach; ?>


                    </div>
                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                  </div>
                  <div class="details-slide-navigation btn-navigation">
                    <button class="tourigo-navigation-prev swiper-button-disabled" disabled="" tabindex="-1"
                      aria-label="Previous slide" aria-controls="swiper-wrapper-a76d7374f56fc2a4" aria-disabled="true"><i
                        class="fa-regular fa-angle-left"></i></button>
                    <button class="tourigo-navigation-next" tabindex="0" aria-label="Next slide"
                      aria-controls="swiper-wrapper-a76d7374f56fc2a4" aria-disabled="false"><i
                        class="fa-regular fa-angle-right"></i></button>
                  </div>
                </div>
              <?php endif; ?>

              <div class="tour-details-content">
                <!-- <div class="tour-details-badge d-flex gap--5 mb-10">
                  <span class="bd-badge warning fw-5">Featured</span>
                  <span class="bd-badge danger fw-5">15% Off</span>
                </div> -->
                <h3 class="tour-details-title mb-15"><?= $tour_data->name ?></h3>
                <div class="tour-details-meta d-flex flex-wrap gap-10 align-items-center justify-content-between mb-20">
                  <div class="tour-details-price">
                    <h4 class="price-title">Upcoming Tours<span></span></h4>
                  </div>
                  <!-- <div
                    class="tour-details-meta-right d-flex flex-wrap gap-10 align-items-center justify-content-between">
                    <div class="rating-badge border-badge"><span><i class="fa fa-star"></i>4.4</span></div>
                    <div class="theme-social">
                      <a href="#"><svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                          xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                          viewBox="0 0 24 24">
                          <path fill-rule="evenodd"
                            d="M13.135 6H15V3h-1.865a4.147 4.147 0 0 0-4.142 4.142V9H7v3h2v9.938h3V12h2.021l.592-3H12V6.591A.6.6 0 0 1 12.592 6h.543Z"
                            clip-rule="evenodd"></path>
                        </svg></a>
                      <a href="#"><svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                          xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                          viewBox="0 0 24 24">
                          <path fill-rule="evenodd"
                            d="M22 5.892a8.178 8.178 0 0 1-2.355.635 4.074 4.074 0 0 0 1.8-2.235 8.343 8.343 0 0 1-2.605.981A4.13 4.13 0 0 0 15.85 4a4.068 4.068 0 0 0-4.1 4.038c0 .31.035.618.105.919A11.705 11.705 0 0 1 3.4 4.734a4.006 4.006 0 0 0 1.268 5.392 4.165 4.165 0 0 1-1.859-.5v.05A4.057 4.057 0 0 0 6.1 13.635a4.192 4.192 0 0 1-1.856.07 4.108 4.108 0 0 0 3.831 2.807A8.36 8.36 0 0 1 2 18.184 11.732 11.732 0 0 0 8.291 20 11.502 11.502 0 0 0 19.964 8.5c0-.177 0-.349-.012-.523A8.143 8.143 0 0 0 22 5.892Z"
                            clip-rule="evenodd"></path>
                        </svg></a>
                      <a href="#"><svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                          xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                          viewBox="0 0 24 24">
                          <path fill-rule="evenodd"
                            d="M12.51 8.796v1.697a3.738 3.738 0 0 1 3.288-1.684c3.455 0 4.202 2.16 4.202 4.97V19.5h-3.2v-5.072c0-1.21-.244-2.766-2.128-2.766-1.827 0-2.139 1.317-2.139 2.676V19.5h-3.19V8.796h3.168ZM7.2 6.106a1.61 1.61 0 0 1-.988 1.483 1.595 1.595 0 0 1-1.743-.348A1.607 1.607 0 0 1 5.6 4.5a1.601 1.601 0 0 1 1.6 1.606Z"
                            clip-rule="evenodd"></path>
                          <path d="M7.2 8.809H4V19.5h3.2V8.809Z"></path>
                        </svg></a>
                      <a href="#"><svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                          xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                          viewBox="0 0 24 24">
                          <path fill-rule="evenodd"
                            d="M21.7 8.037a4.26 4.26 0 0 0-.789-1.964 2.84 2.84 0 0 0-1.984-.839c-2.767-.2-6.926-.2-6.926-.2s-4.157 0-6.928.2a2.836 2.836 0 0 0-1.983.839 4.225 4.225 0 0 0-.79 1.965 30.146 30.146 0 0 0-.2 3.206v1.5a30.12 30.12 0 0 0 .2 3.206c.094.712.364 1.39.784 1.972.604.536 1.38.837 2.187.848 1.583.151 6.731.2 6.731.2s4.161 0 6.928-.2a2.844 2.844 0 0 0 1.985-.84 4.27 4.27 0 0 0 .787-1.965 30.12 30.12 0 0 0 .2-3.206v-1.516a30.672 30.672 0 0 0-.202-3.206Zm-11.692 6.554v-5.62l5.4 2.819-5.4 2.801Z"
                            clip-rule="evenodd"></path>
                        </svg></a>
                    </div>
                  </div> -->
                </div>
                <div class="tour-details-destination-wrapper">
                  <div class="tour-details-destination-info">
                    <div class="search-icon-bg is-big">
                      <span><i class="fa-light fa-clock"></i></span>
                    </div>
                    <div class="tour-details-destination-info-title">
                      <p class="tour-details-destination-info-top mb-0">Duration</p>
                      <span class="tour-details-destination-info-bottom small">
                        <?php if (!empty($tour_data->duration_day)) {
                          $dayLabel = ($tour_data->duration_day == 1) ? 'Day' : 'Days';
                          echo $tour_data->duration_day . ' ' . $dayLabel . ' ';
                        }
                        ?>
                        <?php if (!empty($tour_data->duration_night)) {
                          $nightLabel = ($tour_data->duration_night == 1) ? 'Night' : 'Nights';
                          echo $tour_data->duration_night . ' ' . $nightLabel;
                        }
                        ?>
                      </span>
                    </div>
                  </div>
                  <div class="tour-details-destination-info">
                    <div class="search-icon-bg is-big">
                      <span><i class="fa-light fa-user"></i></span>
                    </div>
                    <div class="tour-details-destination-info-title">
                      <p class="tour-details-destination-info-top mb-0">Min Age</p>
                      <span class="tour-details-destination-info-bottom small"><?= $tour_data->minimum_age ?></span>
                    </div>
                  </div>
                  <div class="tour-details-destination-info">
                    <div class="search-icon-bg is-big">
                      <span><i class="fa-sharp fa-light fa-moped"></i></span>
                    </div>
                    <div class="tour-details-destination-info-title">
                      <p class="tour-details-destination-info-top mb-0">Tour Type</p>
                      <span class="tour-details-destination-info-bottom small"><?= $tour_data->tour_type ?></span>
                    </div>
                  </div>
                  <div class="tour-details-destination-info">
                    <div class="search-icon-bg is-big">
                      <span><i class="fa-light fa-location-dot"></i></span>
                    </div>
                    <div class="tour-details-destination-info-title">
                      <p class="tour-details-destination-info-top mb-0">Location</p>
                      <span class="tour-details-destination-info-bottom"><?= $tour_data->location ?></span>
                    </div>
                  </div>
                </div>

                <?php if (!empty($tour_data->description)): ?>
                  <?= $tour_data->description ?>
                <?php endif; ?>

                <?php if (!empty($tour_data->tour_plan)): ?>
                  <div class="tour-details-faq mb-35">
                    <h4 class="mb-20">Tour Plan</h4>
                    <div class="accordion-wrapper faq-style-3">
                      <div class="accordion" id="accordionExampleThree">

                        <?php if (!empty($tour_data->tour_plan)): ?>
                          <?php foreach ($tour_data->tour_plan as $item): ?>
                            <div class="accordion-item">
                              <h6 class="accordion-header" id="heading<?= $item->day_number ?>">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                  data-bs-target="#collapse<?= $item->day_number ?>" aria-expanded="true"
                                  aria-controls="collapse<?= $item->day_number ?>">
                                  <span>Day <?= $item->day_number ?>:</span> <?= $item->day_name ?>
                                </button>
                              </h6>
                              <div id="collapse<?= $item->day_number ?>" class="accordion-collapse collapse "
                                aria-labelledby="heading<?= $item->day_number ?>" data-bs-parent="#accordionExampleThree">
                                <div class="accordion-body">
                                  <div class="accordion-body-list">
                                    <?= $item->day_plan ?>
                                  </div>
                                </div>
                              </div>
                            </div>
                          <?php endforeach; ?>
                        <?php else: ?>

                          <p>-</p>
                        <?php endif; ?>



                      </div>
                    </div>
                  </div>
                <?php endif; ?>

                <?php if (!empty($tour_data->gallery_image)): ?>
                  <div class="tour-details-gallery mb-35">
                    <h4 class="mb-20">Tour Galley</h4>
                    <div class="row gy-24">
                      <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                        <a class="fancybox-buttons" data-fancybox-group="button" class="thumbnail"
                          href="<?= _uploaded_files_ . 'gallery_image/' . $tour_data->gallery_image[0]->file ?>">
                          <div class="tour-details-gallery-thumb image-hover-effect-two position-relative h-100">
                            <img class="h-100 w-100"
                              src="<?= _uploaded_files_ . 'gallery_image/' . $tour_data->gallery_image[0]->file ?>"
                              alt="image">
                          </div>
                        </a>
                      </div>
                      <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                        <div class="row gy-24">
                          <div class="col-xxl-12">
                            <a class="fancybox-buttons" data-fancybox-group="button" class="thumbnail" target="_blank"
                              href="<?= _uploaded_files_ . 'gallery_image/' . $tour_data->gallery_image[1]->file ?>">
                              <div class="tour-details-gallery-thumb image-hover-effect-two position-relative">
                                <img src="<?= _uploaded_files_ . 'gallery_image/' . $tour_data->gallery_image[1]->file ?>"
                                  alt="image">
                              </div>
                            </a>
                          </div>
                          <div class="col-xxl-12">
                            <a class="fancybox-buttons" data-fancybox-group="button" class="thumbnail"
                              href="<?= _uploaded_files_ . 'gallery_image/' . $tour_data->gallery_image[2]->file ?>">
                              <div class="tour-details-gallery-thumb image-hover-effect-two position-relative">
                                <img src="<?= _uploaded_files_ . 'gallery_image/' . $tour_data->gallery_image[2]->file ?>"
                                  alt="image">
                              </div>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endif; ?>

                <?php if (!empty($tour_data->things_to_carry)): ?>
                  <div class="tour-details-list-wrap mb-35">
                    <h4 class="mb-20">Things to Carry</h4>
                    <div class="tour-details-list-box">
                      <div class="tour-details-list-include">
                        <ul>
                          <?php foreach ($tour_data->things_to_carry as $item): ?>
                            <li>
                              <span class="list-icon success">
                                <i class="fa-solid fa-check"></i>
                              </span>
                              <?= $item->name ?>
                            </li>
                          <?php endforeach; ?>



                        </ul>
                      </div>

                    </div>
                  </div>
                <?php endif; ?>

                <?php if (!empty($tour_data->inclusion)): ?>
                  <div class="tour-details-list-wrap mb-35">
                    <h4 class="mb-20">Inclusion</h4>
                    <div style="padding-left:30px;">
                      <?= $tour_data->inclusion ?>

                    </div>
                  </div>
                <?php endif; ?>

                <?php if (!empty($tour_data->exclusion)): ?>
                  <div class="tour-details-list-wrap mb-35">
                    <h4 class="mb-20">Exclusion</h4>
                    <div style="padding-left:30px;">
                      <?= $tour_data->exclusion ?>

                    </div>
                  </div>

                <?php endif; ?>

                <?php if (!empty($tour_data->important_notes)): ?>
                  <div class="tour-details-list-wrap mb-35">
                    <h4 class="mb-20">Important Notes</h4>
                    <div style="padding-left:30px;">

                      <?= $tour_data->important_notes ?>
                    </div>
                  </div>
                <?php endif; ?>

                <?php if (!empty($tour_data->additional_info)): ?>
                  <div class="tour-details-list-wrap mb-35">
                    <h4 class="mb-20">Additional Info</h4>
                    <div style="padding-left:30px;">
                      <?= $tour_data->additional_info ?>

                    </div>
                  </div>
                <?php endif; ?>

                <?php if (!empty($tour_data->google_map_address)): ?>
                  <div class="tour-details-location mb-35">
                    <h4 class="mb-20">Tour Location</h4>
                    <div class="tour-details-location-map">
                      <iframe src="https://maps.google.com/maps?q=<?= $tour_data->google_map_address ?>&output=embed"
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                  </div>
                <?php endif; ?>

                <!-- <div class="tour-details-related-tour mb-35">
                  <h4 class="mb-20">Related Tour</h4>
                  <div class="row gy-24">
                    <div class="col-xxl-6 col-xl-6 col-md-6">
                      <div class="tour-wrapper style-one">
                        <div class="p-relative">
                          <div class="tour-thumb image-overly">
                            <a href="tour-details.html"><img src="<?= IMAGE ?>tour/tour-img-11.png" alt="image"></a>
                          </div>
                          <div class="trip-tag">
                            <a class="trip-tag-border" href="#">3 Slots
                              Available</a>
                          </div>
                          <div class="tour-meta d-flex align-items-center justify-content-between">
                            <button class="tour-favorite tour-like">
                              <i class="fa fa-heart"></i>
                            </button>
                            <div class="tour-location">
                              <span><a href="tour-details.html"><i class="fa-regular fa-location-dot"></i>
                                  India</a></span>
                            </div>
                          </div>
                        </div>
                        <div class="tour-content">
                          <div class="tour-rating d-flex align-items-center gap-10 mb-10">
                            <div class="tour-rating-icon fs-14 d-flex rating-color">
                              <i class="fa-solid fa-star"></i>
                              <i class="fa-solid fa-star"></i>
                              <i class="fa-solid fa-star"></i>
                              <i class="fa-solid fa-star"></i>
                              <i class="fa-solid fa-star"></i>
                            </div>
                            <div class="tour-rating-text">
                              <span>4.8 (320 Ratings)</span>
                            </div>
                          </div>

                          <h5 class="tour-title fw-5 underline "><a href="tour-details.html">Mystic Meghalaya</a></h5>
                          <div class="tour-divider"></div>
                          <div class="blog-meta-item ">
                            <span class="meta-icon">
                              <i class="fa-solid fa-calendar-check"></i>
                            </span>Last date to join
                            <span class="meta-text"><a href="#">Jan 25 2024</a></span>
                          </div>



                        </div>
                      </div>
                    </div>
                    <div class="col-xxl-6 col-xl-6 col-md-6">
                      <div class="tour-wrapper style-one">
                        <div class="p-relative">
                          <div class="tour-thumb image-overly">
                            <a href="tour-details.html"><img src="<?= IMAGE ?>tour/tour-img-12.png" alt="image"></a>
                          </div>
                          <div class="trip-tag">
                            <a class="trip-tag-border" href="#">3 Slots Available</a>
                          </div>
                          <div class="tour-meta d-flex align-items-center justify-content-between">
                            <button class="tour-favorite tour-like">
                              <i class="fa fa-heart"></i>
                            </button>
                            <div class="tour-location">
                              <span><a href="tour-details.html"><i class="fa-regular fa-location-dot"></i>
                                  India</a></span>
                            </div>
                          </div>
                        </div>
                        <div class="tour-content">
                          <div class="tour-rating d-flex align-items-center gap-10 mb-10">
                            <div class="tour-rating-icon fs-14 d-flex rating-color">
                              <i class="fa-solid fa-star"></i>
                              <i class="fa-solid fa-star"></i>
                              <i class="fa-solid fa-star"></i>
                              <i class="fa-solid fa-star"></i>
                              <i class="fa-solid fa-star"></i>
                            </div>
                            <div class="tour-rating-text">
                              <span>4.8 (320 Ratings)</span>
                            </div>
                          </div>
                          <h5 class="tour-title fw-5 underline "><a href="tour-details.html">Mesmerising Malvanthige</a>
                          </h5>
                          <div class="tour-divider"></div>
                          <div class="blog-meta-item ">
                            <span class="meta-icon">
                              <i class="fa-solid fa-calendar-check"></i>
                            </span>Last date to join
                            <span class="meta-text"><a href="#">Jan 25 2024</a></span>
                          </div>



                        </div>
                      </div>
                    </div>
                  </div>
                </div> -->

              </div>
            </div>
          </div>

        </div>
        <div class="col-xxl-4 col-xl-4 col-lg-4">
          <aside class="sidebar-wrapper sidebar-sticky">
            <div class="sidebar-widget-wrapper mb-30">
              <!-- <div class="sidebar-widget widget">
                <h6 class="sidebar-widget-title small mb-15">Search Here</h6>
                <div class="sidebar-search">
                  <form class="sidebar-search-form" action="#" method="get">
                    <input type="text" value="" required="" name="s" placeholder="Search">
                    <button type="submit"> <i class="far fa-search"></i> </button>
                  </form>
                </div>
              </div> 
              <<div class="sidebar-widget-divider"></div> -->
              <div class="sidebar-widget widget">
                <h6 class="sidebar-widget-title small mb-15">Contact for Booking</h6>
                <div class="sidebar-booking">
                  <div id="enquiry-form" class="sidebar-booking-form">
                    <input type="hidden" name="tour_id" id="tour_id" value="<?= $tour_data->tour_id ?>" />

                    <!-- <div class="">
                      <select type="text" class="" id="tour_date_id" name="tour_date_id">
                        <option value="" style="font-size:1.8rem;">Select Tour Date</option>
                        <? foreach ($tour_data->tour_date as $item) {

                          ?>
                          <option value="<?= $item->tour_date_id ?>">
                            <?= $item->start_date_time ?> to <?= $item->end_date ?>

                          </option>
                        <? } ?>
                      </select>
                    </div> -->

                    <div class="form-group mb-4 " style="background:#F2F2F2;">
                      <select class="form-control" id="tour_date_id" name="tour_date_id"
                        style="font-size: 1.5rem; padding: 2rem; border-radius: 0.3rem;background:#F2F2F2;">
                        <option class="p-4" value="" style="font-size: 1.8rem;background:#F2F2F2;">Select Tour Date
                        </option>
                        <?php if (!empty($tour_data->tour_date)): ?>
                          <?php foreach ($tour_data->tour_date as $item) {
                            $selected = "";
                            if ($item->tour_date_id == $tour_date_id) {
                              $selected = "selected";
                              $selected_tour_date_id = $item->tour_date_id;
                            }
                            ?>

                            <option class="p-4" value="<?= $item->tour_date_id ?>" <?= $selected ?>>
                              <?= $item->start_date_time ?> to
                              <?= $item->end_date ?>
                            </option>
                          <?php } ?>
                        <?php endif; ?>

                      </select>
                    </div>


                    <div class=" input-box">
                      <input required type="text" placeholder="Name" name="name" id="name">
                    </div>
                    <div class="input-box">
                      <input required type="text" placeholder="Contact Number" name="contactno" id="contactno">
                    </div>
                    <div class="input-box">
                      <input required type="email" placeholder="Email" name="email" id="email">
                    </div>
                    <div class="input-box">
                      <textarea required cols="30" rows="10" placeholder="Type Comment here" name="description"
                        id="description"></textarea>
                    </div>
                    <div class="booking-btn">
                      <button onclick="ajax_insert_tour_booking_enquiry()" class="bd-btn btn-style radius-4 w-100">Book
                        Now<span><i class="fa-regular fa-arrow-right"></i></span></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- <div class="sidebar-widget-divider"></div> -->
              <!-- <div class="sidebar-widget widget">
                <h6 class="sidebar-widget-title small mb-15">Recent Tour List</h6>
                <div class="sidebar-widget-post">
                  <div class="recent-post">
                    <div class="recent-post-thumb mr-10">
                      <a href="blog-details.html">
                        <img src="<?= IMAGE ?>blog/blog-image-14.png" alt="image">
                      </a>
                    </div>
                    <div class="recent-post-content">
                      <h6 class="recent-post-title small underline">
                        <a href="blog-details.html">Mystic Meghalaya</a>
                      </h6>

                    </div>
                  </div>
                  <div class="recent-post">
                    <div class="recent-post-thumb mr-10">
                      <a href="blog-details.html">
                        <img src="<?= IMAGE ?>blog/blog-image-15.png" alt="image">
                      </a>
                    </div>
                    <div class="recent-post-content">
                      <h6 class="recent-post-title small underline">
                        <a href="blog-details.html">Mesmerising Malvanthige</a>
                      </h6>

                    </div>
                  </div>

                </div>
              </div> -->
            </div>
            <div class="sidebar-widget-banner p-relative">
              <div class="sidebar-widget-thumb p-relative">
                <img src="<?= IMAGE ?>sidebar-img.png" alt="img">
              </div>
              <div class="sidebar-widget-content">
                <span class="bd-play-btn pulse-white mb-40"><i class="fa fa-phone"></i></span>
                <p class="b3 mb-0">Free Call</p>
                <h5 class="mb-25"><a href="tel:+919980808500">99808 08500</a></h5>
                <div class="offer-btn">
                  <a href="<?= MAINSITE ?>contact"
                    class="bd-primary-btn btn-style has-arrow is-bg btn-tertiary is-white radius-60">
                    <span class="bd-primary-btn-arrow arrow-right"><i class="fa-regular fa-arrow-right"></i></span>
                    <span class="bd-primary-btn-text">contact</span>
                    <span class="bd-primary-btn-circle"></span>
                    <span class="bd-primary-btn-arrow arrow-left"><i class="fa-regular fa-arrow-right"></i></span>
                  </a>

                </div>
                <!-- <div class="sidebar-btn">
                  <a class="bd-text-btn style-two " href="<?= MAINSITE ?>contact">Contact
                    <span class="icon__box">
                      <i class="fa-light fa-angle-right icon__first"></i>
                      <i class="fa-light fa-angle-right icon__second"></i>
                    </span>
                  </a>
                </div> -->
              </div>
            </div>
          </aside>
        </div>
      </div>
    </div>
  </section>






</main>
<!-- Body main wrapper end -->
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
                    <span class="bd-primary-btn-arrow arrow-right"><i class="fa-regular fa-arrow-right"></i></span>
                    <span class="bd-primary-btn-text">Subscribe Now</span>
                    <span class="bd-primary-btn-circle"></span>
                    <span class="bd-primary-btn-arrow arrow-left"><i class="fa-regular fa-arrow-right"></i></span>
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
<script>


  function validateForm() {
    var isValid = true;

    $('#enquiry-form .input-box input, #enquiry-form .input-box textarea, #enquiry-form select').each(function () {
      if ($(this).val() === "" || $(this).val() === null) {
        isValid = false;
        $(this).css('border-color', 'red');
      } else {
        $(this).css('border-color', '');
      }
    });

    return isValid;
  }

  function clearForm() {
    $('#tour_date_id').val("");
    $('#name').val("");
    $('#contactno').val("");
    $('#email').val("");
    $('#description').val("");
  }

  function ajax_insert_tour_booking_enquiry() {
    if (!validateForm()) {
      alert('Please fill in all the fields.');
      return;
    }

    var formData = {
      tour_id: $('#tour_id').val(),
      tour_date_id: $('#tour_date_id').val(),
      name: $('#name').val(),
      contactno: $('#contactno').val(),
      email: $('#email').val(),
      subject: "upcoming tours booking",
      description: $('#description').val(),
    };

    $.ajax({
      url: "<?= MAINSITE . 'ajax_insert_tour_booking_enquiry' ?>",
      type: 'post',
      data: formData,
      success: function (response) {
        toastrDefaultSuccessFunc("Booking Success!");
        clearForm();


      },
      error: function (request, error) {
        // Handle any errors
        toastrDefaultErrorFunc("Unknown Error. Please Try Again");
      }
    });
  }




</script>