<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Bracket Plus">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/bracketplus/img/bracketplus-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/bracketplus">
    <meta property="og:title" content="Bracket Plus">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/bracketplus/img/bracketplus-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/bracketplus/img/bracketplus-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>263 Lyrics Administration Dashboard</title>

    <!-- vendor css -->
    <link href="app/lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="app/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="app/lib/rickshaw/rickshaw.min.css" rel="stylesheet">
    <link href="app/lib/select2/css/select2.min.css" rel="stylesheet">
    <link href="app/lib/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="app/lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="app/css/bracket.css">
</head>

<body>

<?php 
if(isset($_SESSION['auth'])){
?>
    <!-- ########## START: LEFT PANEL ########## -->
    <div class="br-logo"><a href=""><span>[</span>263 <i>Lyrics</i><span>]</span></a></div>
    <div class="br-sideleft sideleft-scrollbar">
        <label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
        <ul class="br-sideleft-menu">
            <li class="br-menu-item">
                <a href="#" class="br-menu-link with-sub">
                    <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
                    <span class="menu-item-label">Home</span>
                </a><!-- br-menu-link -->
                <ul class="br-menu-sub">
                    <li class="sub-item"><a href="sliders" class="sub-link">Sliders</a></li>
                    <li class="sub-item"><a href="posts" class="sub-link">Posts</a></li>
                </ul>
            </li>
            <li class="br-menu-item">
                <a href="#" class="br-menu-link with-sub">
                    <i class="menu-item-icon icon ion-ios-paper-outline tx-22"></i>
                    <span class="menu-item-label">News</span>
                </a><!-- br-menu-link -->
                <ul class="br-menu-sub">
                   <li class="sub-item"><a href="news" class="sub-link">New Article</a></li>
                   <li class="sub-item"><a href="categories" class="sub-link">Categories</a></li>
                </ul>
            </li><!-- br-menu-item -->
            <li class="br-menu-item">
                <a href="#" class="br-menu-link with-sub">
                    <i class="menu-item-icon ion-ios-person-outline tx-24"></i>
                    <span class="menu-item-label">Users</span>
                </a><!-- br-menu-link -->
                <ul class="br-menu-sub">
                    <li class="sub-item"><a href="artistes" class="sub-link">Artistes</a></li>
                    <li class="sub-item"><a href="users" class="sub-link">Users</a></li>
                </ul>
            </li><!-- br-menu-item -->
            <li class="br-menu-item">
                <a href="#" class="br-menu-link with-sub">
                    <i class="menu-item-icon ion-ios-star-outline tx-20"></i>
                    <span class="menu-item-label">Content</span>
                </a><!-- br-menu-link -->
                <ul class="br-menu-sub">
                    <li class="sub-item"><a href="contact" class="sub-link">Contact Us</a></li>
                    <li class="sub-item"><a href="about" class="sub-link">About Us</a></li>
                </ul>
        </ul><!-- br-sideleft-menu -->
        <br>
    </div><!-- br-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    <div class="br-header">
        <div class="br-header-left">
            <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a>
            </div>
            <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i
                            class="icon ion-navicon-round"></i></a></div>

        </div><!-- br-header-left -->
        <div class="br-header-right">
            <nav class="nav">
                <div class="dropdown">
                </div><!-- dropdown -->
                <div class="dropdown">
                    <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
                        <span class="logged-name hidden-md-down">
                        <?php echo $_SESSION['email']; ?>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-header wd-250">
                        <div class="tx-center">
                            <h6 class="logged-fullname">Admin : <?php echo $_SESSION['email']; ?></h6>
                        </div>
                        <hr>
                        <div class="tx-center">
                        </div>
                        <hr>
                        <ul class="list-unstyled user-profile-nav">
                            <li><a href="change"><i class="icon ion-ios-person"></i> change pass</a></li>
                            <li><a href="admins"><i class="icon ion-ios-gear"></i> Administrators</a></li>
                            <li><a href="logout"><i class="icon ion-power"></i> Sign Out</a></li>
                        </ul>
                    </div><!-- dropdown-menu -->
                </div><!-- dropdown -->
            </nav>
        </div><!-- br-header-right -->
    </div><!-- br-header -->
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: RIGHT PANEL ########## -->
    <div class="br-sideright">
        <ul class="nav nav-tabs sidebar-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" role="tab" href="#contacts"><i
                            class="icon ion-ios-contact-outline tx-24"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" role="tab" href="#attachments"><i
                            class="icon ion-ios-folder-outline tx-22"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" role="tab" href="#calendar"><i
                            class="icon ion-ios-calendar-outline tx-24"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" role="tab" href="#settings"><i
                            class="icon ion-ios-gear-outline tx-24"></i></a>
            </li>
        </ul><!-- sidebar-tabs -->

        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane pos-absolute a-0 mg-t-60 contact-scrollbar active" id="contacts" role="tabpanel">
                <label class="sidebar-label pd-x-25 mg-t-25">Online Contacts</label>
                <div class="contact-list pd-x-10">
                    <a href="" class="contact-list-link new">
                        <div class="d-flex">
                            <div class="pos-relative">
                                <img src="https://via.placeholder.com/500" alt="">
                                <div class="contact-status-indicator bg-success"></div>
                            </div>
                            <div class="contact-person">
                                <p>Marilyn Tarter</p>
                                <span>Clemson, CA</span>
                            </div>
                            <span class="tx-info tx-12"><span
                                        class="square-8 bg-info rounded-circle"></span> 1 new</span>
                        </div><!-- d-flex -->
                    </a><!-- contact-list-link -->
                    <a href="" class="contact-list-link">
                        <div class="d-flex">
                            <div class="pos-relative">
                                <img src="https://via.placeholder.com/500" alt="">
                                <div class="contact-status-indicator bg-success"></div>
                            </div>
                            <div class="contact-person">
                                <p class="mg-b-0 ">Belinda Connor</p>
                                <span>Fort Kent, ME</span>
                            </div>
                        </div><!-- d-flex -->
                    </a><!-- contact-list-link -->
                    <a href="" class="contact-list-link new">
                        <div class="d-flex">
                            <div class="pos-relative">
                                <img src="https://via.placeholder.com/500" alt="">
                                <div class="contact-status-indicator bg-success"></div>
                            </div>
                            <div class="contact-person">
                                <p>Britanny Cevallos</p>
                                <span>Shiboygan Falls, WI</span>
                            </div>
                            <span class="tx-info tx-12"><span
                                        class="square-8 bg-info rounded-circle"></span> 3 new</span>
                        </div><!-- d-flex -->
                    </a><!-- contact-list-link -->
                    <a href="" class="contact-list-link new">
                        <div class="d-flex">
                            <div class="pos-relative">
                                <img src="https://via.placeholder.com/500" alt="">
                                <div class="contact-status-indicator bg-success"></div>
                            </div>
                            <div class="contact-person">
                                <p>Brandon Lawrence</p>
                                <span>Snohomish, WA</span>
                            </div>
                            <span class="tx-info tx-12"><span
                                        class="square-8 bg-info rounded-circle"></span> 1 new</span>
                        </div><!-- d-flex -->
                    </a><!-- contact-list-link -->
                    <a href="" class="contact-list-link">
                        <div class="d-flex">
                            <div class="pos-relative">
                                <img src="https://via.placeholder.com/500" alt="">
                                <div class="contact-status-indicator bg-success"></div>
                            </div>
                            <div class="contact-person">
                                <p>Andrew Wiggins</p>
                                <span>Springfield, MA</span>
                            </div>
                        </div><!-- d-flex -->
                    </a><!-- contact-list-link -->
                    <a href="" class="contact-list-link">
                        <div class="d-flex">
                            <div class="pos-relative">
                                <img src="https://via.placeholder.com/500" alt="">
                                <div class="contact-status-indicator bg-success"></div>
                            </div>
                            <div class="contact-person">
                                <p>Theodore Gristen</p>
                                <span>Nashville, TN</span>
                            </div>
                        </div><!-- d-flex -->
                    </a><!-- contact-list-link -->
                    <a href="" class="contact-list-link">
                        <div class="d-flex">
                            <div class="pos-relative">
                                <img src="https://via.placeholder.com/500" alt="">
                                <div class="contact-status-indicator bg-success"></div>
                            </div>
                            <div class="contact-person">
                                <p>Deborah Miner</p>
                                <span>North Shore, CA</span>
                            </div>
                        </div><!-- d-flex -->
                    </a><!-- contact-list-link -->
                </div><!-- contact-list -->


                <label class="sidebar-label pd-x-25 mg-t-25">Offline Contacts</label>
                <div class="contact-list pd-x-10">
                    <a href="" class="contact-list-link">
                        <div class="d-flex">
                            <div class="pos-relative">
                                <img src="https://via.placeholder.com/500" alt="">
                                <div class="contact-status-indicator bg-gray-500"></div>
                            </div>
                            <div class="contact-person">
                                <p>Marilyn Tarter</p>
                                <span>Clemson, CA</span>
                            </div>
                        </div><!-- d-flex -->
                    </a><!-- contact-list-link -->
                    <a href="" class="contact-list-link">
                        <div class="d-flex">
                            <div class="pos-relative">
                                <img src="https://via.placeholder.com/500" alt="">
                                <div class="contact-status-indicator bg-gray-500"></div>
                            </div>
                            <div class="contact-person">
                                <p>Belinda Connor</p>
                                <span>Fort Kent, ME</span>
                            </div>
                        </div><!-- d-flex -->
                    </a><!-- contact-list-link -->
                    <a href="" class="contact-list-link">
                        <div class="d-flex">
                            <div class="pos-relative">
                                <img src="https://via.placeholder.com/500" alt="">
                                <div class="contact-status-indicator bg-gray-500"></div>
                            </div>
                            <div class="contact-person">
                                <p>Britanny Cevallos</p>
                                <span>Shiboygan Falls, WI</span>
                            </div>
                        </div><!-- d-flex -->
                    </a><!-- contact-list-link -->
                    <a href="" class="contact-list-link">
                        <div class="d-flex">
                            <div class="pos-relative">
                                <img src="https://via.placeholder.com/500" alt="">
                                <div class="contact-status-indicator bg-gray-500"></div>
                            </div>
                            <div class="contact-person">
                                <p>Brandon Lawrence</p>
                                <span>Snohomish, WA</span>
                            </div>
                        </div><!-- d-flex -->
                    </a><!-- contact-list-link -->
                    <a href="" class="contact-list-link">
                        <div class="d-flex">
                            <div class="pos-relative">
                                <img src="https://via.placeholder.com/500" alt="">
                                <div class="contact-status-indicator bg-gray-500"></div>
                            </div>
                            <div class="contact-person">
                                <p>Andrew Wiggins</p>
                                <span>Springfield, MA</span>
                            </div>
                        </div><!-- d-flex -->
                    </a><!-- contact-list-link -->
                    <a href="" class="contact-list-link">
                        <div class="d-flex">
                            <div class="pos-relative">
                                <img src="https://via.placeholder.com/500" alt="">
                                <div class="contact-status-indicator bg-gray-500"></div>
                            </div>
                            <div class="contact-person">
                                <p>Theodore Gristen</p>
                                <span>Nashville, TN</span>
                            </div>
                        </div><!-- d-flex -->
                    </a><!-- contact-list-link -->
                    <a href="" class="contact-list-link">
                        <div class="d-flex">
                            <div class="pos-relative">
                                <img src="https://via.placeholder.com/500" alt="">
                                <div class="contact-status-indicator bg-gray-500"></div>
                            </div>
                            <div class="contact-person">
                                <p>Deborah Miner</p>
                                <span>North Shore, CA</span>
                            </div>
                        </div><!-- d-flex -->
                    </a><!-- contact-list-link -->
                </div><!-- contact-list -->

            </div><!-- #contacts -->
            <div class="tab-pane pos-absolute a-0 mg-t-60 attachment-scrollbar" id="attachments" role="tabpanel">
                <label class="sidebar-label pd-x-25 mg-t-25">Recent Attachments</label>
                <div class="media-file-list">
                    <div class="media">
                        <div class="pd-10 bg-gray-500 bg-mojito wd-50 ht-60 tx-center d-flex align-items-center justify-content-center">
                            <i class="far fa-file-image tx-28 tx-white"></i>
                        </div>
                        <div class="media-body">
                            <p class="mg-b-0 tx-13">IMG_43445</p>
                            <p class="mg-b-0 tx-12 op-5">JPG Image</p>
                            <p class="mg-b-0 tx-12 op-5">1.2mb</p>
                        </div><!-- media-body -->
                        <a href="" class="more"><i class="icon ion-android-more-vertical tx-18"></i></a>
                    </div><!-- media -->
                    <div class="media mg-t-20">
                        <div class="pd-10 bg-gray-500 bg-purple wd-50 ht-60 tx-center d-flex align-items-center justify-content-center">
                            <i class="far fa-file-video tx-28 tx-white"></i>
                        </div>
                        <div class="media-body">
                            <p class="mg-b-0 tx-13">VID_6543</p>
                            <p class="mg-b-0 tx-12 op-5">MP4 Video</p>
                            <p class="mg-b-0 tx-12 op-5">24.8mb</p>
                        </div><!-- media-body -->
                        <a href="" class="more"><i class="icon ion-android-more-vertical tx-18"></i></a>
                    </div><!-- media -->
                    <div class="media mg-t-20">
                        <div class="pd-10 bg-gray-500 bg-reef wd-50 ht-60 tx-center d-flex align-items-center justify-content-center">
                            <i class="far fa-file-word tx-28 tx-white"></i>
                        </div>
                        <div class="media-body">
                            <p class="mg-b-0 tx-13">Tax_Form</p>
                            <p class="mg-b-0 tx-12 op-5">Word Document</p>
                            <p class="mg-b-0 tx-12 op-5">5.5mb</p>
                        </div><!-- media-body -->
                        <a href="" class="more"><i class="icon ion-android-more-vertical tx-18"></i></a>
                    </div><!-- media -->
                    <div class="media mg-t-20">
                        <div class="pd-10 bg-gray-500 bg-firewatch wd-50 ht-60 tx-center d-flex align-items-center justify-content-center">
                            <i class="far fa-file-pdf tx-28 tx-white"></i>
                        </div>
                        <div class="media-body">
                            <p class="mg-b-0 tx-13">Getting_Started</p>
                            <p class="mg-b-0 tx-12 op-5">PDF Document</p>
                            <p class="mg-b-0 tx-12 op-5">12.7mb</p>
                        </div><!-- media-body -->
                        <a href="" class="more"><i class="icon ion-android-more-vertical tx-18"></i></a>
                    </div><!-- media -->
                    <div class="media mg-t-20">
                        <div class="pd-10 bg-gray-500 bg-firewatch wd-50 ht-60 tx-center d-flex align-items-center justify-content-center">
                            <i class="far fa-file-pdf tx-28 tx-white"></i>
                        </div>
                        <div class="media-body">
                            <p class="mg-b-0 tx-13">Introduction</p>
                            <p class="mg-b-0 tx-12 op-5">PDF Document</p>
                            <p class="mg-b-0 tx-12 op-5">7.7mb</p>
                        </div><!-- media-body -->
                        <a href="" class="more"><i class="icon ion-android-more-vertical tx-18"></i></a>
                    </div><!-- media -->
                    <div class="media mg-t-20">
                        <div class="pd-10 bg-gray-500 bg-mojito wd-50 ht-60 tx-center d-flex align-items-center justify-content-center">
                            <i class="far fa-file-image tx-28 tx-white"></i>
                        </div>
                        <div class="media-body">
                            <p class="mg-b-0 tx-13">IMG_43420</p>
                            <p class="mg-b-0 tx-12 op-5">JPG Image</p>
                            <p class="mg-b-0 tx-12 op-5">2.2mb</p>
                        </div><!-- media-body -->
                        <a href="" class="more"><i class="icon ion-android-more-vertical tx-18"></i></a>
                    </div><!-- media -->
                    <div class="media mg-t-20">
                        <div class="pd-10 bg-gray-500 bg-mojito wd-50 ht-60 tx-center d-flex align-items-center justify-content-center">
                            <i class="far fa-file-image tx-28 tx-white"></i>
                        </div>
                        <div class="media-body">
                            <p class="mg-b-0 tx-13">IMG_43447</p>
                            <p class="mg-b-0 tx-12 op-5">JPG Image</p>
                            <p class="mg-b-0 tx-12 op-5">3.2mb</p>
                        </div><!-- media-body -->
                        <a href="" class="more"><i class="icon ion-android-more-vertical tx-18"></i></a>
                    </div><!-- media -->
                    <div class="media mg-t-20">
                        <div class="pd-10 bg-gray-500 bg-purple wd-50 ht-60 tx-center d-flex align-items-center justify-content-center">
                            <i class="far fa-file-video tx-28 tx-white"></i>
                        </div>
                        <div class="media-body">
                            <p class="mg-b-0 tx-13">VID_6545</p>
                            <p class="mg-b-0 tx-12 op-5">AVI Video</p>
                            <p class="mg-b-0 tx-12 op-5">14.8mb</p>
                        </div><!-- media-body -->
                        <a href="" class="more"><i class="icon ion-android-more-vertical tx-18"></i></a>
                    </div><!-- media -->
                    <div class="media mg-t-20">
                        <div class="pd-10 bg-gray-500 bg-reef wd-50 ht-60 tx-center d-flex align-items-center justify-content-center">
                            <i class="far fa-file-word tx-28 tx-white"></i>
                        </div>
                        <div class="media-body">
                            <p class="mg-b-0 tx-13">Secret_Document</p>
                            <p class="mg-b-0 tx-12 op-5">Word Document</p>
                            <p class="mg-b-0 tx-12 op-5">4.5mb</p>
                        </div><!-- media-body -->
                        <a href="" class="more"><i class="icon ion-android-more-vertical tx-18"></i></a>
                    </div><!-- media -->
                </div><!-- media-list -->
            </div><!-- #history -->
            <div class="tab-pane pos-absolute a-0 mg-t-60 schedule-scrollbar" id="calendar" role="tabpanel">
                <label class="sidebar-label pd-x-25 mg-t-25">Time &amp; Date</label>
                <div class="pd-x-25">
                    <h2 id="brTime" class="br-time"></h2>
                    <h6 id="brDate" class="br-date"></h6>
                </div>

                <label class="sidebar-label pd-x-25 mg-t-25">Events Calendar</label>
                <div class="datepicker sidebar-datepicker"></div>


                <label class="sidebar-label pd-x-25 mg-t-25">Event Today</label>
                <div class="pd-x-25">
                    <div class="list-group sidebar-event-list mg-b-20">
                        <div class="list-group-item">
                            <div>
                                <h6>Roven's 32th Birthday</h6>
                                <p>2:30PM</p>
                            </div>
                            <a href="" class="more"><i class="icon ion-android-more-vertical tx-18"></i></a>
                        </div><!-- list-group-item -->
                        <div class="list-group-item">
                            <div>
                                <h6>Regular Workout Schedule</h6>
                                <p>7:30PM</p>
                            </div>
                            <a href="" class="more"><i class="icon ion-android-more-vertical tx-18"></i></a>
                        </div><!-- list-group-item -->
                    </div><!-- list-group -->

                    <a href="" class="btn btn-block btn-outline-secondary tx-uppercase tx-12 tx-spacing-2">+ Add
                        Event</a>
                    <br>
                </div>

            </div>
            <div class="tab-pane pos-absolute a-0 mg-t-60 settings-scrollbar" id="settings" role="tabpanel">
                <label class="sidebar-label pd-x-25 mg-t-25">Quick Settings</label>

                <div class="sidebar-settings-item">
                    <h6 class="tx-13 tx-normal">Sound Notification</h6>
                    <p class="op-5 tx-13">Play an alert sound everytime there is a new notification.</p>
                    <div class="br-switchbutton checked">
                        <input type="hidden" name="switch1" value="true">
                        <span></span>
                    </div><!-- br-switchbutton -->
                </div>
                <div class="sidebar-settings-item">
                    <h6 class="tx-13 tx-normal">2 Steps Verification</h6>
                    <p class="op-5 tx-13">Sign in using a two step verification by sending a verification code to your
                        phone.</p>
                    <div class="br-switchbutton">
                        <input type="hidden" name="switch2" value="false">
                        <span></span>
                    </div><!-- br-switchbutton -->
                </div>
                <div class="sidebar-settings-item">
                    <h6 class="tx-13 tx-normal">Location Services</h6>
                    <p class="op-5 tx-13">Allowing us to access your location</p>
                    <div class="br-switchbutton">
                        <input type="hidden" name="switch3" value="false">
                        <span></span>
                    </div><!-- br-switchbutton -->
                </div>
                <div class="sidebar-settings-item">
                    <h6 class="tx-13 tx-normal">Newsletter Subscription</h6>
                    <p class="op-5 tx-13">Enables you to send us news and updates send straight to your email.</p>
                    <div class="br-switchbutton checked">
                        <input type="hidden" name="switch4" value="true">
                        <span></span>
                    </div><!-- br-switchbutton -->
                </div>
                <div class="sidebar-settings-item">
                    <h6 class="tx-13 tx-normal">Your email</h6>
                    <div class="pos-relative">
                        <input type="email" name="email" class="form-control" value="janedoe@domain.com">
                    </div>
                </div>

                <div class="pd-y-20 pd-x-25">
                    <h6 class="tx-13 tx-normal tx-white mg-b-20">More Settings</h6>
                    <a href="" class="btn btn-block btn-outline-secondary tx-uppercase tx-11 tx-spacing-2">Account
                        Settings</a>
                    <a href="" class="btn btn-block btn-outline-secondary tx-uppercase tx-11 tx-spacing-2">Privacy
                        Settings</a>
                </div>
            </div>
        </div><!-- tab-content -->
        
    </div><!-- br-sideright -->
    <!-- ########## END: RIGHT PANEL ########## --->
<?php 
}
?>