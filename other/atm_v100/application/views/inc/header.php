<?
$CI =& get_instance();
if (empty($meta_title)) {
   $meta_title = _project_name_;
}

if (empty($meta_description)) {
   $meta_description = _project_name_;
}

if (empty($meta_keywords)) {
   $meta_keywords = _project_name_;
}

if (empty($meta_others)) {
   $meta_others = "";
}

function formatIndianCurrency($amount)
{
   $decimal = "";
   if (strpos($amount, '.') !== false) {
      list($amount, $decimal) = explode('.', $amount);
      $decimal = '.' . substr($decimal, 0, 2); // Keep up to two decimal places
   }
   $amount = preg_replace('/\B(?=(\d{3})+(?!\d))/', ',', $amount);
   return $amount . $decimal;
}

?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
   <meta charset="utf-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <meta name="description" content="">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <base href="<?= base_url() ?>">
   <meta property="og:type" content="object" />
   <meta property="og:site_name" content="<?= _project_complete_name_ ?>" />
   <title><?= $meta_title ?></title>
   <meta name="description" content="<?= $meta_description ?>">
   <meta name="keywords" content="<?= $meta_keywords ?>">
   <link rel="shortcut icon" type="image/x-icon" href="<?= IMAGE ?>prachi-logo.png">
   <link href="<?= CSS ?>main.css" rel="stylesheet">
   <link href="<?= CSS ?>common.min.css" rel="stylesheet">
   <link href="<?= CSS ?>fontawsome/fontawesome-pro.css" rel="stylesheet">
   <link rel="stylesheet" href="<?= _lte_files_ ?>plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
   <!-- Toastr -->
   <link rel="stylesheet" href="<?= _lte_files_ ?>plugins/toastr/toastr.min.css">
</head>



<body>

   <!-- Offcanvas area start -->
   <div class="fix">
      <div class="offcanvas-area">
         <div class="offcanvas-wrapper">
            <div class="offcanvas-content">
               <div class="offcanvas-top d-flex justify-content-between align-items-center mb-25">
                  <div class="offcanvas-logo">
                     <a href="<?= MAINSITE ?>">
                        <img src="<?= IMAGE ?>prachi-logo.png" alt="logo not found">
                     </a>
                  </div>
                  <div class="offcanvas-close">
                     <button class="offcanvas-close-icon animation--flip">
                        <span class="offcanvas-m-lines">
                           <span class="offcanvas-m-line line--1"></span><span
                              class="offcanvas-m-line line--2"></span><span class="offcanvas-m-line line--3"></span>
                        </span>
                     </button>
                  </div>
               </div>
               <div class="offcanvas-search mb-0">
                  <form action="#">
                     <input type="text" name="offcanvasSearch" placeholder="Search here">
                     <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                  </form>
               </div>
               <div class="mobile-menu fix mb-25"></div>
               <img src="<?= IMAGE ?>prachi2.png" style="width: 120px;filter: drop-shadow(0 2px);" class="dsknn">
            </div>
         </div>
      </div>
   </div>
   <div class="offcanvas-overlay"></div>
   <div class="offcanvas-overlay-white"></div>
   <!-- Offcanvas area start -->



   <!-- Header area start -->
   <header>
      <div class="header-top-area bg-theme-primary d-none d-sm-block">
         <div class="container">
            <div class="header-top-main">
               <div class="header-top-left d-flex align-items-center">
                  <div class="header-top-left-item">
                     <span><i class="fa-solid fa-location-dot"></i></span>
                     <a href="#">1762, 41st cross, 18 Main Road, Jayanagar 4th T Block , Bengaluru</a>
                  </div>
                  <div class="header-top-left-item">
                     <span><i class="fa-solid fa-envelope"></i></span>
                     <a href="#"><span class="__cf_email__"
                           data-cfemail="98fbf7f6ecf9fbecd8ecf7edeaf1fff7b6fbf7f5">info@prachitourism.com</span></a>
                  </div>
               </div>
               <div class="heder-top-right d-none d-md-flex align-items-center gap-3">
                  <div class="topbar-social">
                     <ul>
                        <li><a href="https://www.facebook.com/profile.php?id=61555534820918&mibextid=ZbWKwL"
                              target="_blank"><i><svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                       d="M13.135 6H15V3h-1.865a4.147 4.147 0 0 0-4.142 4.142V9H7v3h2v9.938h3V12h2.021l.592-3H12V6.591A.6.6 0 0 1 12.592 6h.543Z"
                                       clip-rule="evenodd" />
                                 </svg>
                              </i></a></li>

                        <li><a href="https://www.instagram.com/escapefromreality_99?igsh=MXYxYXE4YndzMXphcA=="
                              target="_blank"><svg width="24px" height="24px" viewBox="0 0 24 24" fill="#fff" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M7.46494 1.066C8.63828 1.01222 9.01228 1 12 1C14.9883 1 15.3617 1.01283 16.5344 1.066C17.7059 1.11917 18.5059 1.30556 19.2056 1.5775C19.9395 1.85381 20.6043 2.28674 21.1538 2.84617C21.7133 3.3956 22.1463 4.06046 22.4225 4.79439C22.6944 5.49411 22.8802 6.29406 22.934 7.46494C22.9878 8.63828 23 9.01228 23 12C23 14.9877 22.9872 15.3617 22.934 16.5351C22.8808 17.7059 22.6944 18.5059 22.4225 19.2056C22.1414 19.9286 21.7649 20.5427 21.1538 21.1538C20.6044 21.7133 19.9395 22.1463 19.2056 22.4225C18.5059 22.6944 17.7059 22.8802 16.5351 22.934C15.3617 22.9878 14.9877 23 12 23C9.01228 23 8.63828 22.9872 7.46494 22.934C6.29406 22.8808 5.49411 22.6944 4.79439 22.4225C4.07144 22.1414 3.45728 21.7649 2.84617 21.1538C2.28664 20.6044 1.85368 19.9395 1.5775 19.2056C1.30556 18.5059 1.11978 17.7059 1.066 16.5351C1.01222 15.3617 1 14.9883 1 12C1 9.01167 1.01283 8.63828 1.066 7.46556C1.11917 6.29406 1.30556 5.49411 1.5775 4.79439C1.85381 4.06051 2.28674 3.39568 2.84617 2.84617C3.39559 2.28664 4.06045 1.85368 4.79439 1.5775C5.49411 1.30556 6.29406 1.11978 7.46494 1.066ZM16.4452 3.046C15.2853 2.99344 14.937 2.98183 12 2.98183C9.063 2.98183 8.71467 2.99344 7.55478 3.046C6.48228 3.09489 5.89989 3.27394 5.51244 3.42489C4.99911 3.62411 4.63244 3.86244 4.24744 4.24744C3.86306 4.63244 3.62411 4.99911 3.42489 5.51244C3.27394 5.89989 3.09489 6.48228 3.046 7.55478C2.99344 8.71467 2.98183 9.063 2.98183 12C2.98183 14.937 2.99344 15.2853 3.046 16.4452C3.09489 17.5177 3.27394 18.1001 3.42489 18.4876C3.60111 18.9654 3.88219 19.3976 4.24744 19.7526C4.60234 20.1178 5.03461 20.3989 5.51244 20.5751C5.89989 20.7261 6.48228 20.9051 7.55478 20.954C8.71467 21.0066 9.06239 21.0182 12 21.0182C14.9376 21.0182 15.2853 21.0066 16.4452 20.954C17.5177 20.9051 18.1001 20.7261 18.4876 20.5751C19.0009 20.3759 19.3676 20.1376 19.7526 19.7526C20.1178 19.3977 20.3989 18.9654 20.5751 18.4876C20.7261 18.1001 20.9051 17.5177 20.954 16.4452C21.0066 15.2853 21.0182 14.937 21.0182 12C21.0182 9.063 21.0066 8.71467 20.954 7.55478C20.9051 6.48228 20.7261 5.89989 20.5751 5.51244C20.3759 4.99911 20.1376 4.63244 19.7526 4.24744C19.3676 3.86306 19.0009 3.62411 18.4876 3.42489C18.1001 3.27394 17.5177 3.09489 16.4452 3.046ZM10.5955 15.3909C11.0408 15.5754 11.518 15.6703 12 15.6703C12.9735 15.6703 13.907 15.2836 14.5953 14.5953C15.2837 13.907 15.6704 12.9734 15.6704 12C15.6704 11.0266 15.2837 10.093 14.5953 9.40468C13.907 8.71636 12.9735 8.32966 12 8.32966C11.518 8.32966 11.0408 8.4246 10.5955 8.60905C10.1501 8.7935 9.74553 9.06385 9.40471 9.40468C9.06389 9.7455 8.79353 10.1501 8.60908 10.5954C8.42463 11.0407 8.3297 11.518 8.3297 12C8.3297 12.482 8.42463 12.9593 8.60908 13.4046C8.79353 13.8499 9.06389 14.2545 9.40471 14.5953C9.74553 14.9361 10.1501 15.2065 10.5955 15.3909ZM8.00205 8.00201C9.06238 6.94168 10.5005 6.34599 12 6.34599C13.4996 6.34599 14.9377 6.94168 15.998 8.00201C17.0583 9.06234 17.654 10.5005 17.654 12C17.654 13.4995 17.0583 14.9376 15.998 15.998C14.9377 17.0583 13.4996 17.654 12 17.654C10.5005 17.654 9.06238 17.0583 8.00205 15.998C6.94172 14.9376 6.34603 13.4995 6.34603 12C6.34603 10.5005 6.94172 9.06234 8.00205 8.00201ZM18.9077 7.18838C19.1583 6.93773 19.2991 6.59779 19.2991 6.24333C19.2991 5.88886 19.1583 5.54892 18.9077 5.29828C18.657 5.04764 18.3171 4.90683 17.9626 4.90683C17.6082 4.90683 17.2682 5.04764 17.0176 5.29828C16.7669 5.54892 16.6261 5.88886 16.6261 6.24333C16.6261 6.59779 16.7669 6.93773 17.0176 7.18838C17.2682 7.43902 17.6082 7.57983 17.9626 7.57983C18.3171 7.57983 18.657 7.43902 18.9077 7.18838Z" fill="#fff"></path>
</svg></a></li>
                        <li><a href="https://www.youtube.com/@EscapeFromReality922" target="_blank"><i><svg
                                    class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                       d="M21.7 8.037a4.26 4.26 0 0 0-.789-1.964 2.84 2.84 0 0 0-1.984-.839c-2.767-.2-6.926-.2-6.926-.2s-4.157 0-6.928.2a2.836 2.836 0 0 0-1.983.839 4.225 4.225 0 0 0-.79 1.965 30.146 30.146 0 0 0-.2 3.206v1.5a30.12 30.12 0 0 0 .2 3.206c.094.712.364 1.39.784 1.972.604.536 1.38.837 2.187.848 1.583.151 6.731.2 6.731.2s4.161 0 6.928-.2a2.844 2.844 0 0 0 1.985-.84 4.27 4.27 0 0 0 .787-1.965 30.12 30.12 0 0 0 .2-3.206v-1.516a30.672 30.672 0 0 0-.202-3.206Zm-11.692 6.554v-5.62l5.4 2.819-5.4 2.801Z"
                                       clip-rule="evenodd" />
                                 </svg>
                              </i></a></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="header-area header-style-four" id="header-sticky">
         <div class="container">
            <div class="mega-menu-wrapper p-relative">
               <div class="header-main">
                  <div class="header-left">
                     <div class="header-logo">
                        <a href="<?= MAINSITE ?>"><img src="<?= IMAGE ?>prachi-logo.png" alt="logo not found"></a>
                     </div>

                  </div>
                  <div class="header-right">
                     <div class="header-action d-flex align-items-center">
                        <div class="mean-menu-wrapper d-none d-xl-block">
                           <div class="main-menu">
                              <nav class="main-menu main-menu-three" id="mobile-menu">
                                 <ul>
                                    <li class="has-mega-menu">
                                       <a href="<?= MAINSITE ?>">Home</a>

                                    </li>
                                    <li class="menu-item-has-children">
                                       <a href="javascript:void(0)">Escape from Reality</a>
                                       <ul class="submenu">
                                          <li class="menu-item-has-children has-arrow">
                                             <a href="<?= MAINSITE ?>story">Story</a>

                                          </li>
                                          <li class="menu-item-has-children has-arrow">
                                             <a href="<?= MAINSITE ?>upcoming-adventures">Upcoming Adventures</a>

                                          </li>
                                          <li class="menu-item-has-children has-arrow">
                                             <a href="<?= MAINSITE ?>activities">Activities</a>

                                          </li>
                                          <li class="menu-item-has-children has-arrow">
                                             <a href="<?= MAINSITE ?>gallery">Gallery </a>

                                          </li>
                                          <li class="menu-item-has-children has-arrow">
                                             <a href="<?= MAINSITE ?>videos">Videos </a>

                                          </li>

                                       </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                       <a href="javascript:void(0)">Tours</a>
                                       <ul class="submenu">
                                          <li class="menu-item-has-children has-arrow">
                                             <a href="<?= MAINSITE ?>domestic-tours">Domestic Tours</a>

                                          </li>
                                          <li class="menu-item-has-children has-arrow">
                                             <a href="<?= MAINSITE ?>international-tours">International Tours</a>

                                          </li>

                                       </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                       <a href="javascript:void(0)">Group Tours</a>
                                       <ul class="submenu">
                                          <li class="menu-item-has-children has-arrow">
                                             <a href="<?= MAINSITE ?>upcoming-tours">Upcoming Tours </a>

                                          </li>

                                       </ul>
                                    </li>

                                    <li class="menu-item-has-children">
                                       <a href="<?= MAINSITE ?>blog">Blog</a>

                                    </li>
                                    <li><a href="<?= MAINSITE ?>contact">Contact</a></li>

                                 </ul>
                              </nav>
                           </div>
                        </div>
                        <div class="header-hamburger ml-20 ">
                           <div class="sidebar-toggle">
                              <a class="bar-icon style-two dsknn" href="javascript:void(0)">
                                 <span></span>
                                 <span></span>
                                 <span></span>
                              </a>
                              <img src="<?= IMAGE ?>prachi2.png" style="width: 120px;filter: drop-shadow(0 2px);"
                                 class="mbnn">
                           </div>
                        </div>
                        <!-- for wp -->
                        <div class="header-hamburger ml-20 d-none">
                           <button type="button" class="hamburger-btn offcanvas-open-btn">
                              <span>01</span>
                              <span>01</span>
                              <span>01</span>
                           </button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </header>
   <!-- Header area end -->