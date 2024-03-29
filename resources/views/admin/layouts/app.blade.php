<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>Title Here</title>

        <meta name="description" content="OneUI - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">

        <!-- Open Graph Meta -->
        <meta property="og:title" content="OneUI - Bootstrap 4 Admin Template &amp; UI Framework">
        <meta property="og:site_name" content="OneUI">
        <meta property="og:description" content="OneUI - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta property="og:type" content="website">
        <meta property="og:url" content="">
        <meta property="og:image" content="">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="{{asset('assets/media/favicons/favicon.png')}}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{asset('assets/media/favicons/favicon-192x192.png')}}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/media/favicons/apple-touch-icon-180x180.png')}}">
        <!-- END Icons -->
        <link
            rel="stylesheet"
            href="https://unpkg.com/polipop/dist/css/polipop.core.min.css"
        />
        <link
            rel="stylesheet"
            href="https://unpkg.com/polipop/dist/css/polipop.default.min.css"
        />
        <!-- Stylesheets -->
        <!-- Fonts and OneUI framework -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
        <link rel="stylesheet" id="css-main" href="{{asset('assets/css/oneui.css')}}">

{{--    @if(App::isLocale('en'))--}}
{{--        @else--}}
{{--            <link rel="stylesheet" id="css-main" href="{{asset('assets/css/oneuiAr.css')}}">--}}
{{--        @endif--}}
        <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
        <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/amethyst.min.css"> -->
        <!-- END Stylesheets -->
    </head>
    <body>
        <!-- Page Container -->
        <!--
            Available classes for #page-container:

        GENERIC

            'enable-cookies'                            Remembers active color theme between pages (when set through color theme helper Template._uiHandleTheme())

        SIDEBAR & SIDE OVERLAY

            'sidebar-r'                                 Right Sidebar and left Side Overlay (default is left Sidebar and right Side Overlay)
            'sidebar-mini'                              Mini hoverable Sidebar (screen width > 991px)

            'sidebar-o'                                 Visible Sidebar by default (screen width > 991px)
            'sidebar-o-xs'                              Visible Sidebar by default (screen width < 992px)
            'sidebar-dark'                              Dark themed sidebar

            'side-overlay-hover'                        Hoverable Side Overlay (screen width > 991px)
            'side-overlay-o'                            Visible Side Overlay by default

            'enable-page-overlay'                       Enables a visible clickable Page Overlay (closes Side Overlay on click) when Side Overlay opens

            'side-scroll'                               Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling (screen width > 991px)

        HEADER

            ''                                          Static Header if no class is added
            'page-header-fixed'                         Fixed Header

        HEADER STYLE

            ''                                          Light themed Header
            'page-header-dark'                          Dark themed Header

        MAIN CONTENT LAYOUT

            ''                                          Full width Main Content if no class is added
            'main-content-boxed'                        Full width Main Content with a specific maximum width (screen width > 1200px)
            'main-content-narrow'                       Full width Main Content with a percentage width (screen width > 1200px)
        -->
        <div id="page-container" class="@if(App::isLocale('ar')) sidebar-r @endif sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-boxed">
            <!-- Side Overlay-->
            <aside id="side-overlay">
                <!-- Side Header -->
                <div class="content-header border-bottom">
                    <!-- User Avatar -->
                    <a class="img-link mr-1" href="javascript:void(0)">
                        <img class="img-avatar img-avatar32" src="{{asset('assets/media/avatars/avatar10.jpg')}}" alt="">
                    </a>
                    <!-- END User Avatar -->

                    <!-- User Info -->
                    <div class="ml-2">
                        <a class="text-dark font-w600 font-size-sm" href="javascript:void(0)">Adam McCoy</a>
                    </div>
                    <!-- END User Info -->

                    <!-- Close Side Overlay -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <a class="ml-auto btn btn-sm btn-alt-danger" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_close">
                        <i class="fa fa-fw fa-times"></i>
                    </a>
                    <!-- END Close Side Overlay -->
                </div>
                <!-- END Side Header -->

                <!-- Side Content -->
                <div class="content-side">
                    <!-- Side Overlay Tabs -->
                    <div class="block block-transparent pull-x pull-t">
                        <ul class="nav nav-tabs nav-tabs-alt nav-justified" data-toggle="tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" href="#so-overview">
                                    <i class="fa fa-fw fa-coffee text-gray mr-1"></i> Overview
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#so-sales">
                                    <i class="fa fa-fw fa-chart-line text-gray mr-1"></i> Sales
                                </a>
                            </li>
                        </ul>
                        <div class="block-content tab-content overflow-hidden">
                            <!-- Overview Tab -->
                            <div class="tab-pane pull-x fade fade-left show active" id="so-overview" role="tabpanel">
                                <!-- Activity -->
                                <div class="block">
                                    <div class="block-header block-header-default">
                                        <h3 class="block-title">Recent Activity</h3>
                                        <div class="block-options">
                                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                                <i class="si si-refresh"></i>
                                            </button>
                                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                                        </div>
                                    </div>
                                    <div class="block-content">
                                        <!-- Activity List -->
                                        <ul class="nav-items mb-0">
                                            <li>
                                                <a class="text-dark media py-2" href="javascript:void(0)">
                                                    <div class="mr-3 ml-2">
                                                        <i class="si si-wallet text-success"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="font-size-sm font-w600">New sale ($15)</div>
                                                        <div class="text-success">Admin Template</div>
                                                        <small class="font-size-sm text-muted">3 min ago</small>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="text-dark media py-2" href="javascript:void(0)">
                                                    <div class="mr-3 ml-2">
                                                        <i class="si si-pencil text-info"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="font-size-sm font-w600">You edited the file</div>
                                                        <div class="text-info">
                                                            Documentation.doc
                                                        </div>
                                                        <small class="font-size-sm text-muted">15 min ago</small>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="text-dark media py-2" href="javascript:void(0)">
                                                    <div class="mr-3 ml-2">
                                                        <i class="si si-close text-danger"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="font-size-sm font-w600">Project deleted</div>
                                                        <div class="text-danger">Line Icon Set</div>
                                                        <small class="font-size-sm text-muted">4 hours ago</small>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                        <!-- END Activity List -->
                                    </div>
                                </div>
                                <!-- END Activity -->

                                <!-- Online Friends -->
                                <div class="block">
                                    <div class="block-header block-header-default">
                                        <h3 class="block-title">Online Friends</h3>
                                        <div class="block-options">
                                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                                <i class="si si-refresh"></i>
                                            </button>
                                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                                        </div>
                                    </div>
                                    <div class="block-content">
                                        <!-- Users Navigation -->
                                        <ul class="nav-items mb-0">
                                            <li>
                                                <a class="media py-2" href="javascript:void(0)">
                                                    <div class="mr-3 ml-2 overlay-container overlay-bottom">
                                                        <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar3.jpg" alt="">
                                                        <span class="overlay-item item item-tiny item-circle border border-2x border-white bg-success"></span>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="font-w600">Amber Harvey</div>
                                                        <div class="font-size-sm text-muted">Copywriter</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="media py-2" href="javascript:void(0)">
                                                    <div class="mr-3 ml-2 overlay-container overlay-bottom">
                                                        <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar10.jpg" alt="">
                                                        <span class="overlay-item item item-tiny item-circle border border-2x border-white bg-success"></span>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="font-w600">Jack Estrada</div>
                                                        <div class="font-size-sm text-muted">Web Developer</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="media py-2" href="javascript:void(0)">
                                                    <div class="mr-3 ml-2 overlay-container overlay-bottom">
                                                        <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar7.jpg" alt="">
                                                        <span class="overlay-item item item-tiny item-circle border border-2x border-white bg-success"></span>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="font-w600">Melissa Rice</div>
                                                        <div class="font-size-sm text-muted">Web Designer</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="media py-2" href="javascript:void(0)">
                                                    <div class="mr-3 ml-2 overlay-container overlay-bottom">
                                                        <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar6.jpg" alt="">
                                                        <span class="overlay-item item item-tiny item-circle border border-2x border-white bg-warning"></span>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="font-w600">Lori Grant</div>
                                                        <div class="font-size-sm text-muted">Photographer</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="media py-2" href="javascript:void(0)">
                                                    <div class="mr-3 ml-2 overlay-container overlay-bottom">
                                                        <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar12.jpg" alt="">
                                                        <span class="overlay-item item item-tiny item-circle border border-2x border-white bg-warning"></span>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="font-w600">Henry Harrison</div>
                                                        <div class="font-size-sm text-muted">Graphic Designer</div>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                        <!-- END Users Navigation -->
                                    </div>
                                </div>
                                <!-- END Online Friends -->

                                <!-- Quick Settings -->
                                <div class="block mb-0">
                                    <div class="block-header block-header-default">
                                        <h3 class="block-title">Quick Settings</h3>
                                        <div class="block-options">
                                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                                        </div>
                                    </div>
                                    <div class="block-content">
                                        <!-- Quick Settings Form -->
                                        <form action="be_pages_dashboard.html" method="POST" onsubmit="return false;">
                                            <div class="form-group">
                                                <p class="font-size-sm font-w600 mb-2">
                                                    Online Status
                                                </p>
                                                <div class="custom-control custom-switch mb-1">
                                                    <input type="checkbox" class="custom-control-input" id="so-settings-check1" name="so-settings-check1" checked>
                                                    <label class="custom-control-label" for="so-settings-check1">Show your status to all</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <p class="font-size-sm font-w600 mb-2">
                                                    Auto Updates
                                                </p>
                                                <div class="custom-control custom-switch mb-1">
                                                    <input type="checkbox" class="custom-control-input" id="so-settings-check2" name="so-settings-check2" checked>
                                                    <label class="custom-control-label" for="so-settings-check2">Keep up to date</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <p class="font-size-sm font-w600 mb-1">
                                                    Application Alerts
                                                </p>
                                                <div class="custom-control custom-switch mb-1">
                                                    <input type="checkbox" class="custom-control-input" id="so-settings-check3" name="so-settings-check3" checked>
                                                    <label class="custom-control-label" for="so-settings-check3">Email Notifications</label>
                                                </div>
                                                <div class="custom-control custom-switch mb-1">
                                                    <input type="checkbox" class="custom-control-input" id="so-settings-check4" name="so-settings-check4" checked>
                                                    <label class="custom-control-label" for="so-settings-check4">SMS Notifications</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <p class="font-size-sm font-w600 mb-1">
                                                    API
                                                </p>
                                                <div class="custom-control custom-switch mb-1">
                                                    <input type="checkbox" class="custom-control-input" id="so-settings-check5" name="so-settings-check5" checked>
                                                    <label class="custom-control-label" for="so-settings-check5">Enable access</label>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- END Quick Settings Form -->
                                    </div>
                                </div>
                                <!-- END Quick Settings -->
                            </div>
                            <!-- END Overview Tab -->

                            <!-- Sales Tab -->
                            <div class="tab-pane pull-x fade fade-right" id="so-sales" role="tabpanel">
                                <div class="block mb-0">
                                    <!-- Stats -->
                                    <div class="block-content">
                                        <div class="row items-push pull-t">
                                            <div class="col-6">
                                                <div class="font-size-sm font-w600 text-uppercase">Sales</div>
                                                <a class="font-size-lg" href="javascript:void(0)">22.030</a>
                                            </div>
                                            <div class="col-6">
                                                <div class="font-size-sm font-w600 text-uppercase">Balance</div>
                                                <a class="font-size-lg" href="javascript:void(0)">$4.589,00</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END Stats -->

                                    <!-- Today -->
                                    <div class="block-content block-content-full block-content-sm bg-body-light">
                                        <div class="row">
                                            <div class="col-6">
                                                <span class="font-size-sm font-w600 text-uppercase">Today</span>
                                            </div>
                                            <div class="col-6 text-right">
                                                <span class="ext-muted">$996</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="block-content">
                                        <ul class="nav-items push">
                                            <li>
                                                <a class="text-dark media py-2" href="javascript:void(0)">
                                                    <div class="mr-3 ml-2">
                                                        <i class="fa fa-fw fa-circle text-success"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="font-w600">New sale! + $249</div>
                                                        <small class="text-muted">3 min ago</small>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="text-dark media py-2" href="javascript:void(0)">
                                                    <div class="mr-3 ml-2">
                                                        <i class="fa fa-fw fa-circle text-success"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="font-w600">New sale! + $129</div>
                                                        <small class="text-muted">50 min ago</small>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="text-dark media py-2" href="javascript:void(0)">
                                                    <div class="mr-3 ml-2">
                                                        <i class="fa fa-fw fa-circle text-success"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="font-w600">New sale! + $119</div>
                                                        <small class="text-muted">2 hours ago</small>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="text-dark media py-2" href="javascript:void(0)">
                                                    <div class="mr-3 ml-2">
                                                        <i class="fa fa-fw fa-circle text-success"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="font-w600">New sale! + $499</div>
                                                        <small class="text-muted">3 hours ago</small>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- END Today -->

                                    <!-- Yesterday -->
                                    <div class="block-content block-content-full block-content-sm bg-body-light">
                                        <div class="row">
                                            <div class="col-6">
                                                <span class="font-size-sm font-w600 text-uppercase">Yesterday</span>
                                            </div>
                                            <div class="col-6 text-right">
                                                <span class="text-muted">$765</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="block-content">
                                        <ul class="nav-items push">
                                            <li>
                                                <a class="text-dark media py-2" href="javascript:void(0)">
                                                    <div class="mr-3 ml-2">
                                                        <i class="fa fa-fw fa-circle text-success"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="font-w600">New sale! + $249</div>
                                                        <small class="text-muted">26 hours ago</small>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="text-dark media py-2" href="javascript:void(0)">
                                                    <div class="mr-3 ml-2">
                                                        <i class="fa fa-fw fa-circle text-danger"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="font-w600">Product Purchase - $50</div>
                                                        <small class="text-muted">28 hours ago</small>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="text-dark media py-2" href="javascript:void(0)">
                                                    <div class="mr-3 ml-2">
                                                        <i class="fa fa-fw fa-circle text-success"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="font-w600">New sale! + $119</div>
                                                        <small class="text-muted">29 hours ago</small>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="text-dark media py-2" href="javascript:void(0)">
                                                    <div class="mr-3 ml-2">
                                                        <i class="fa fa-fw fa-circle text-danger"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="font-w600">Paypal Withdrawal - $300</div>
                                                        <small class="text-muted">37 hours ago</small>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="text-dark media py-2" href="javascript:void(0)">
                                                    <div class="mr-3 ml-2">
                                                        <i class="fa fa-fw fa-circle text-success"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="font-w600">New sale! + $129</div>
                                                        <small class="text-muted">39 hours ago</small>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="text-dark media py-2" href="javascript:void(0)">
                                                    <div class="mr-3 ml-2">
                                                        <i class="fa fa-fw fa-circle text-success"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="font-w600">New sale! + $119</div>
                                                        <small class="text-muted">45 hours ago</small>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="text-dark media py-2" href="javascript:void(0)">
                                                    <div class="mr-3 ml-2">
                                                        <i class="fa fa-fw fa-circle text-success"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="font-w600">New sale! + $499</div>
                                                        <small class="text-muted">46 hours ago</small>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>

                                        <!-- More -->
                                        <div class="text-center">
                                            <a class="btn btn-sm btn-light" href="javascript:void(0)">
                                                <i class="fa fa-arrow-down mr-1"></i> Load More..
                                            </a>
                                        </div>
                                        <!-- END More -->
                                    </div>
                                    <!-- END Yesterday -->
                                </div>
                            </div>
                            <!-- END Sales Tab -->
                        </div>
                    </div>
                    <!-- END Side Overlay Tabs -->
                </div>
                <!-- END Side Content -->
            </aside>
            <!-- END Side Overlay -->

            <!-- Sidebar -->
            <!--
                Sidebar Mini Mode - Display Helper classes

                Adding 'smini-hide' class to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
                Adding 'smini-show' class to an element will make it visible (opacity: 1) when the sidebar is in mini mode
                    If you would like to disable the transition animation, make sure to also add the 'no-transition' class to your element

                Adding 'smini-hidden' to an element will hide it when the sidebar is in mini mode
                Adding 'smini-visible' to an element will show it (display: inline-block) only when the sidebar is in mini mode
                Adding 'smini-visible-block' to an element will show it (display: block) only when the sidebar is in mini mode
            -->
            <nav id="sidebar" aria-label="Main Navigation">
                <!-- Side Header -->
                <div class="content-header bg-white-5">
                    <!-- Logo -->
                    <a class="font-w600 text-dual" href="index.html">
                        <span class="smini-visible">
                            <i class="fa fa-circle-notch text-primary"></i>
                        </span>
                        <span class="smini-hide font-size-h5 tracking-wider">
                            One<span class="font-w400">UI</span>
                        </span>
                    </a>
                    <!-- END Logo -->

                    <!-- Extra -->
                    <div>
                        <!-- Options -->
                        <div class="dropdown d-inline-block ml-2">
                            <a class="btn btn-sm btn-dual" id="sidebar-themes-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
                                <i class="si si-drop"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right font-size-sm smini-hide border-0" aria-labelledby="sidebar-themes-dropdown">
                                <!-- Color Themes -->
                                <!-- Layout API, functionality initialized in Template._uiHandleTheme() -->
                                <a class="dropdown-item d-flex align-items-center justify-content-between font-w500" data-toggle="theme" data-theme="default" href="#">
                                    <span>Default</span>
                                    <i class="fa fa-circle text-default"></i>
                                </a>
                                <a class="dropdown-item d-flex align-items-center justify-content-between font-w500" data-toggle="theme" data-theme="assets/css/themes/amethyst.min.css" href="#">
                                    <span>Amethyst</span>
                                    <i class="fa fa-circle text-amethyst"></i>
                                </a>
                                <a class="dropdown-item d-flex align-items-center justify-content-between font-w500" data-toggle="theme" data-theme="assets/css/themes/city.min.css" href="#">
                                    <span>City</span>
                                    <i class="fa fa-circle text-city"></i>
                                </a>
                                <a class="dropdown-item d-flex align-items-center justify-content-between font-w500" data-toggle="theme" data-theme="assets/css/themes/flat.min.css" href="#">
                                    <span>Flat</span>
                                    <i class="fa fa-circle text-flat"></i>
                                </a>
                                <a class="dropdown-item d-flex align-items-center justify-content-between font-w500" data-toggle="theme" data-theme="assets/css/themes/modern.min.css" href="#">
                                    <span>Modern</span>
                                    <i class="fa fa-circle text-modern"></i>
                                </a>
                                <a class="dropdown-item d-flex align-items-center justify-content-between font-w500" data-toggle="theme" data-theme="assets/css/themes/smooth.min.css" href="#">
                                    <span>Smooth</span>
                                    <i class="fa fa-circle text-smooth"></i>
                                </a>
                                <!-- END Color Themes -->

                                <div class="dropdown-divider"></div>

                                <!-- Sidebar Styles -->
                                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                                <a class="dropdown-item font-w500" data-toggle="layout" data-action="sidebar_style_light" href="#">
                                    <span>Sidebar Light</span>
                                </a>
                                <a class="dropdown-item font-w500" data-toggle="layout" data-action="sidebar_style_dark" href="#">
                                    <span>Sidebar Dark</span>
                                </a>
                                <!-- Sidebar Styles -->

                                <div class="dropdown-divider"></div>

                                <!-- Header Styles -->
                                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                                <a class="dropdown-item font-w500" data-toggle="layout" data-action="header_style_light" href="#">
                                    <span>Header Light</span>
                                </a>
                                <a class="dropdown-item font-w500" data-toggle="layout" data-action="header_style_dark" href="#">
                                    <span>Header Dark</span>
                                </a>
                                <!-- Header Styles -->
                            </div>
                        </div>
                        <!-- END Options -->

                        <!-- Close Sidebar, Visible only on mobile screens -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <a class="d-lg-none btn btn-sm btn-dual ml-1" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                            <i class="fa fa-fw fa-times"></i>
                        </a>
                        <!-- END Close Sidebar -->
                    </div>
                    <!-- END Extra -->
                </div>
                <!-- END Side Header -->

                <!-- Sidebar Scrolling -->
                <div class="js-sidebar-scroll">
                    <!-- Side Navigation -->
                    <div class="content-side">
                        @if(\Illuminate\Support\Facades\Auth::user()->email=='admin@gmail.com')
                            <ul class="nav-main {{App::isLocale('ar') ? 'text-right' : ''}}" >
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="#">
                                        <i class="nav-main-link-icon si si-speedometer"></i>
                                        <span class="nav-main-link-name">{{trans('sidebar.Dashboard')}}</span>
                                    </a>
                                </li>

                                        <li class="nav-main-item">
                                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"  href="#">
                                                <i class="nav-main-link-icon si si-layers"></i>
                                                <span class="nav-main-link-name">{{trans('sidebar.SiteSettings')}}</span>
                                            </a>
                                            <ul class="nav-main-submenu">
                                                <li class="nav-main-item">

                                                        <a class="nav-main-link "  aria-haspopup="true" aria-expanded="false" href="{{ route('Admin.EditSettings') }}">
                                                            <i class="nav-main-link-icon si si-bag"></i>
                                                            <span class="nav-main-link-name">{{trans('sidebar.HeaderSettings')}}</span>
                                                        </a>

                                                            <a class="nav-main-link "  aria-haspopup="true" aria-expanded="false" href="{{ route('Admin.listSocialMedia') }}">
                                                                <i class="nav-main-link-icon si si-bag"></i>
                                                                <span class="nav-main-link-name">{{trans('sidebar.SocialMedia')}}</span>
                                                            </a>


                                                        <a class="nav-main-link "  aria-haspopup="true" aria-expanded="false" href="{{ route('Admin.MenuList') }}">
                                                            <i class="nav-main-link-icon si si-bag"></i>
                                                            <span class="nav-main-link-name">{{trans('sidebar.MenuSettings')}}</span>
                                                        </a>
                                                    {{--                                        <a class="nav-main-link "  aria-haspopup="true" aria-expanded="false" href="{{ route('Admin.EditSettings') }}">--}}
                                                    {{--                                            <i class="nav-main-link-icon si si-bag"></i>--}}
                                                    {{--                                            <span class="nav-main-link-name">{{trans('sidebar.FooterSettings')}}</span>--}}
                                                    {{--                                        </a>--}}
                                                </li>

                                            </ul>
                                        </li>

                                    <li class="nav-main-item">
                                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"  href="#">
                                                <i class="nav-main-link-icon si si-layers"></i>
                                                <span class="nav-main-link-name">{{trans('sidebar.EmployeeManagemet')}}</span>
                                            </a>
                                            <ul class="nav-main-submenu">
                                                <li class="nav-main-item">
                                                        <a class="nav-main-link "  aria-haspopup="true" aria-expanded="false" href="{{ route('Admin.Addemployee') }}">
                                                            <i class="nav-main-link-icon si si-bag"></i>
                                                            <span class="nav-main-link-name">{{trans('sidebar.AddEmployee')}}</span>
                                                        </a>
                                                        <a class="nav-main-link "  aria-haspopup="true" aria-expanded="false" href="{{ route('Admin.listEmployees') }}">
                                                            <i class="nav-main-link-icon si si-bag"></i>
                                                            <span class="nav-main-link-name">{{trans('sidebar.ViewEmployees')}}</span>
                                                        </a>
                                                </li>

                                            </ul>
                                        </li>


                                        <li class="nav-main-item">
                                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"  href="#">
                                                <i class="nav-main-link-icon si si-layers"></i>
                                                <span class="nav-main-link-name">{{trans('sidebar.Permission')}}</span>
                                            </a>
                                            <ul class="nav-main-submenu">
                                                <li class="nav-main-item">
                                                        <a class="nav-main-link "  aria-haspopup="true" aria-expanded="false" href="{{ route('Admin.CreatePermission') }}">
                                                            <i class="nav-main-link-icon si si-bag"></i>
                                                            <span class="nav-main-link-name">{{trans('sidebar.AddPermission')}}</span>
                                                        </a>
                                                        <a class="nav-main-link "  aria-haspopup="true" aria-expanded="false" href="{{ route('Admin.GetAllPermissions') }}">
                                                            <i class="nav-main-link-icon si si-bag"></i>
                                                            <span class="nav-main-link-name">{{trans('sidebar.ViewPermissions')}}</span>
                                                        </a>
                                                </li>
                                            </ul>
                                        </li>



                                    <li class="nav-main-item">
                                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"  href="#">
                                            <i class="nav-main-link-icon si si-layers"></i>
                                            <span class="nav-main-link-name">{{trans('sidebar.GroupManagement')}}</span>
                                        </a>
                                        <ul class="nav-main-submenu">
                                            <li class="nav-main-item">
                                                <a class="nav-main-link "  aria-haspopup="true" aria-expanded="false" href="{{ route('Admin.AddGroup') }}">
                                                    <i class="nav-main-link-icon si si-bag"></i>
                                                    <span class="nav-main-link-name">{{trans('sidebar.AddGroup')}}</span>
                                                </a>
                                                <a class="nav-main-link "  aria-haspopup="true" aria-expanded="false" href="{{route('Admin.ViewAllGroups')}}">
                                                    <i class="nav-main-link-icon si si-bag"></i>
                                                    <span class="nav-main-link-name">{{trans('sidebar.ViewGroups')}}</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>



                                    <li class="nav-main-item">
                                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"  href="#">
                                            <i class="nav-main-link-icon si si-layers"></i>
                                            <span class="nav-main-link-name">{{ trans('sidebar.UsersManagement') }}</span>
                                        </a>
                                        <ul class="nav-main-submenu">

                                                <li class="nav-main-item">
                                                    <a class="nav-main-link "  aria-haspopup="true" aria-expanded="false" href="{{ route('Admin.AddUser') }}">
                                                        <i class="nav-main-link-icon si si-bag"></i>
                                                        <span class="nav-main-link-name">{{ trans('sidebar.AddUser') }}</span>
                                                    </a>
                                                </li>
                                                <li class="nav-main-item">
                                                    <a class="nav-main-link "  aria-haspopup="true" aria-expanded="false" href="{{ route('Admin.listUsers') }}">
                                                        <i class="nav-main-link-icon si si-bag"></i>
                                                        <span class="nav-main-link-name">{{ trans('sidebar.ViewUsers') }}</span>
                                                    </a>
                                                </li>

                                        </ul>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"  href="#">
                                            <i class="nav-main-link-icon si si-layers"></i>
                                            <span class="nav-main-link-name">{{trans('sidebar.AddonesManagement')}}</span>
                                        </a>
                                        <ul class="nav-main-submenu">
                                            <li class="nav-main-item">
                                                <a class="nav-main-link "  aria-haspopup="true" aria-expanded="false" href="{{ route('Admin.AddAddone') }}">
                                                    <i class="nav-main-link-icon si si-bag"></i>
                                                    <span class="nav-main-link-name">{{trans('sidebar.AddAddones')}}</span>
                                                </a>
                                                <a class="nav-main-link "  aria-haspopup="true" aria-expanded="false" href="{{route('Admin.ViewAllAddons')}}">
                                                    <i class="nav-main-link-icon si si-bag"></i>
                                                    <span class="nav-main-link-name">{{trans('sidebar.ViewAddones')}}</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"  href="#">
                                            <i class="nav-main-link-icon si si-layers"></i>
                                            <span class="nav-main-link-name">{{trans('sidebar.ProductsManagement')}}</span>
                                        </a>
                                        <ul class="nav-main-submenu">
                                            <li class="nav-main-item">
                                                <a class="nav-main-link "  aria-haspopup="true" aria-expanded="false" href="{{route('Admin.AddProduct')}}">
                                                    <i class="nav-main-link-icon si si-bag"></i>
                                                    <span class="nav-main-link-name">{{trans('sidebar.AddProducts')}}</span>
                                                </a>
                                                <a class="nav-main-link "  aria-haspopup="true" aria-expanded="false" href="{{route('Admin.ViewAllProducts')}}">
                                                    <i class="nav-main-link-icon si si-bag"></i>
                                                    <span class="nav-main-link-name">{{trans('sidebar.ViewProducts')}}</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"  href="#">
                                            <i class="nav-main-link-icon si si-layers"></i>
                                            <span class="nav-main-link-name">{{trans('sidebar.CategoriesManagement')}}</span>
                                        </a>
                                        <ul class="nav-main-submenu">
                                            <li class="nav-main-item">
                                                <a class="nav-main-link "  aria-haspopup="true" aria-expanded="false" href="{{route('Admin.AddCategory')}}">
                                                    <i class="nav-main-link-icon si si-bag"></i>
                                                    <span class="nav-main-link-name">{{trans('sidebar.AddCategory')}}</span>
                                                </a>
                                                <a class="nav-main-link "  aria-haspopup="true" aria-expanded="false" href="{{route('Admin.ViewAllCategories')}}">
                                                    <i class="nav-main-link-icon si si-bag"></i>
                                                    <span class="nav-main-link-name">{{trans('sidebar.ViewCategories')}}</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"  href="#">
                                            <i class="nav-main-link-icon si si-layers"></i>
                                            <span class="nav-main-link-name">{{trans('sidebar.OrdersManagement')}}</span>
                                        </a>
                                        <ul class="nav-main-submenu">
                                            <li class="nav-main-item">
                                                <a class="nav-main-link "  aria-haspopup="true" aria-expanded="false" href="{{route('Admin.AddOrder')}}">
                                                    <i class="nav-main-link-icon si si-bag"></i>
                                                    <span class="nav-main-link-name">{{trans('sidebar.AddOrder')}}</span>
                                                </a>
                                                <a class="nav-main-link "  aria-haspopup="true" aria-expanded="false" href="{{route('Admin.ViewAllOrders')}}">
                                                    <i class="nav-main-link-icon si si-bag"></i>
                                                    <span class="nav-main-link-name">{{trans('sidebar.ViewOrders')}}</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"  href="#">
                                            <i class="nav-main-link-icon si si-layers"></i>
                                            <span class="nav-main-link-name">{{trans('sidebar.DriversManagement')}}</span>
                                        </a>
                                        <ul class="nav-main-submenu">
                                            <li class="nav-main-item">
                                                <a class="nav-main-link "  aria-haspopup="true" aria-expanded="false" href="{{route('Admin.AddDriver')}}">
                                                    <i class="nav-main-link-icon si si-bag"></i>
                                                    <span class="nav-main-link-name">{{trans('sidebar.AddDriver')}}</span>
                                                </a>
                                                <a class="nav-main-link "  aria-haspopup="true" aria-expanded="false" href="{{route('Admin.ViewAllDrivers')}}">
                                                    <i class="nav-main-link-icon si si-bag"></i>
                                                    <span class="nav-main-link-name">{{trans('sidebar.ViewDrivers')}}</span>
                                                </a>
                                                <a class="nav-main-link "  aria-haspopup="true" aria-expanded="false" href="{{route('Admin.AssignOrders')}}">
                                                    <i class="nav-main-link-icon si si-bag"></i>
                                                    <span class="nav-main-link-name">{{trans('sidebar.AssignOrders')}}</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link"   href="{{route('Admin.ViewAllDoneOrders')}}">
                                            <i class="nav-main-link-icon si si-layers"></i>
                                            <span class="@if(App::isLocale('ar')) mr-3 @endif nav-main-link-name">{{trans('sidebar.report')}}</span>
                                        </a>
                                    </li>



                            </ul>
                        @else
                            <ul class="nav-main {{App::isLocale('ar') ? 'text-right' : ''}}" >
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="#">
                                        <i class="nav-main-link-icon si si-speedometer"></i>
                                        <span class="nav-main-link-name">{{trans('sidebar.Dashboard')}}</span>
                                    </a>
                                </li>
                                <?php
                                $setting = 0;
                                $social = 0;
                                $flag2 = 0;
                                ?>
                                @foreach(auth()->user()->group->permissions as $p)
                                    @if($p->ControllerName == 'SettingsController' && $p->status == 1)
                                        <?php $flag2 = 1;
                                        if($p->MethodName == 'edit'){
                                            $setting =1;
                                        }
                                        if($p->MethodName == 'addSocial')
                                        {
                                            $social = 1;
                                        }
                                        ?>
                                    @endif
                                @endforeach
                                @if($flag2 == 1)
                                    <?php
                                    $res = \App\Models\Employee::checkAuthority('SettingsController');

                                    ?>
                                    @if($res->result == 1)
                                        <li class="nav-main-item">
                                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"  href="#">
                                                <i class="nav-main-link-icon si si-layers"></i>
                                                <span class="nav-main-link-name">{{trans('sidebar.SiteSettings')}}</span>
                                            </a>
                                            <ul class="nav-main-submenu">
                                                <li class="nav-main-item">
                                                    @if($setting == 1)
                                                        <a class="nav-main-link "  aria-haspopup="true" aria-expanded="false" href="{{ route('Admin.EditSettings') }}">
                                                            <i class="nav-main-link-icon si si-bag"></i>
                                                            <span class="nav-main-link-name">{{trans('sidebar.HeaderSettings')}}</span>
                                                        </a>
                                                    @endif
                                                    @if($social == 1)
                                                        @if(in_array('list', $res->data) || in_array('addSocial', $res->data) )
                                                            <a class="nav-main-link "  aria-haspopup="true" aria-expanded="false" href="{{ route('Admin.listSocialMedia') }}">
                                                                <i class="nav-main-link-icon si si-bag"></i>
                                                                <span class="nav-main-link-name">{{trans('sidebar.SocialMedia')}}</span>
                                                            </a>
                                                        @endif
                                                    @endif
                                                    @if(in_array('listMenus', $res->data))
                                                        <a class="nav-main-link "  aria-haspopup="true" aria-expanded="false" href="{{ route('Admin.MenuList') }}">
                                                            <i class="nav-main-link-icon si si-bag"></i>
                                                            <span class="nav-main-link-name">{{trans('sidebar.MenuSettings')}}</span>
                                                        </a>
                                                    @endif
                                                    {{--                                        <a class="nav-main-link "  aria-haspopup="true" aria-expanded="false" href="{{ route('Admin.EditSettings') }}">--}}
                                                    {{--                                            <i class="nav-main-link-icon si si-bag"></i>--}}
                                                    {{--                                            <span class="nav-main-link-name">{{trans('sidebar.FooterSettings')}}</span>--}}
                                                    {{--                                        </a>--}}
                                                </li>

                                            </ul>
                                        </li>
                                    @endif

                                    <?php
                                    $e = \App\Models\Employee::checkAuthority('EmployeeController');
                                    ?>
                                    @if($e->result == 1)
                                        <li class="nav-main-item">
                                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"  href="#">
                                                <i class="nav-main-link-icon si si-layers"></i>
                                                <span class="nav-main-link-name">{{trans('sidebar.EmployeeManagemet')}}</span>
                                            </a>
                                            <ul class="nav-main-submenu">
                                                <li class="nav-main-item">
                                                    @if(in_array('AddEmployee',$e->data))
                                                        <a class="nav-main-link "  aria-haspopup="true" aria-expanded="false" href="{{ route('Admin.Addemployee') }}">
                                                            <i class="nav-main-link-icon si si-bag"></i>
                                                            <span class="nav-main-link-name">{{trans('sidebar.AddEmployee')}}</span>
                                                        </a>
                                                    @endif
                                                    @if(in_array('listEmployees',$e->data))
                                                        <a class="nav-main-link "  aria-haspopup="true" aria-expanded="false" href="{{ route('Admin.listEmployees') }}">
                                                            <i class="nav-main-link-icon si si-bag"></i>
                                                            <span class="nav-main-link-name">{{trans('sidebar.ViewEmployees')}}</span>
                                                        </a>
                                                    @endif
                                                </li>

                                            </ul>
                                        </li>
                                    @endif

                                    <?php
                                    $p = \App\Models\Employee::checkAuthority('PermissionController');
                                    ?>
                                    @if($p->result == 1)
                                        <li class="nav-main-item">
                                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"  href="#">
                                                <i class="nav-main-link-icon si si-layers"></i>
                                                <span class="nav-main-link-name">{{trans('sidebar.Permission')}}</span>
                                            </a>
                                            <ul class="nav-main-submenu">
                                                <li class="nav-main-item">
                                                    @if(in_array('add',$p->data))
                                                        <a class="nav-main-link "  aria-haspopup="true" aria-expanded="false" href="{{ route('Admin.CreatePermission') }}">
                                                            <i class="nav-main-link-icon si si-bag"></i>
                                                            <span class="nav-main-link-name">{{trans('sidebar.AddPermission')}}</span>
                                                        </a>
                                                    @endif
                                                    @if(in_array('listPermissions',$p->data))
                                                        <a class="nav-main-link "  aria-haspopup="true" aria-expanded="false" href="{{ route('Admin.GetAllPermissions') }}">
                                                            <i class="nav-main-link-icon si si-bag"></i>
                                                            <span class="nav-main-link-name">{{trans('sidebar.ViewPermissions')}}</span>
                                                        </a>
                                                    @endif
                                                </li>
                                            </ul>
                                        </li>
                                    @endif

                                    <?php
                                    $g = \App\Models\Employee::checkAuthority('PermissionController');
                                    ?>
                                    @if($g->result == 1)
                                    <li class="nav-main-item">
                                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"  href="#">
                                            <i class="nav-main-link-icon si si-layers"></i>
                                            <span class="nav-main-link-name">{{trans('sidebar.GroupManagement')}}</span>
                                        </a>
                                        <ul class="nav-main-submenu">
                                            <li class="nav-main-item">
                                                @if(in_array('AddGroup',$g->data))
                                                <a class="nav-main-link "  aria-haspopup="true" aria-expanded="false" href="{{ route('Admin.AddGroup') }}">
                                                    <i class="nav-main-link-icon si si-bag"></i>
                                                    <span class="nav-main-link-name">{{trans('sidebar.AddGroup')}}</span>
                                                </a>
                                                @endif
                                                @if(in_array('viewGroups',$g->data))
                                                <a class="nav-main-link "  aria-haspopup="true" aria-expanded="false" href="{{route('Admin.ViewAllGroups')}}">
                                                    <i class="nav-main-link-icon si si-bag"></i>
                                                    <span class="nav-main-link-name">{{trans('sidebar.ViewGroups')}}</span>
                                                </a>
                                                @endif
                                            </li>
                                        </ul>
                                    </li>
                                    @endif
                                @endif

                                <?php
                                $add = 0;
                                $list = 0;
                                $listE = 0;
                                $perm = 0;
                                $a = 0?>
                                @foreach(auth()->user()->group->permissions as $p)
                                    @if($p->ControllerName == 'UserController' && $p->status == 1)
                                        <?php $a = 1;
                                        if($p->MethodName == 'AddUser'){
                                            $add =1;
                                        }
                                        if($p->MethodName == 'listUsers')
                                        {
                                            $list = 1;
                                        }
                                        if($p->MethodName == 'listEmployees')
                                        {
                                            $listE = 1;
                                        }

                                        ?>
                                    @endif
                                @endforeach
                                @if($a == 1)
                                    <li class="nav-main-item">
                                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"  href="#">
                                            <i class="nav-main-link-icon si si-layers"></i>
                                            <span class="nav-main-link-name">{{ trans('sidebar.UsersManagement') }}</span>
                                        </a>
                                        <ul class="nav-main-submenu">
{{--                                            @if($add == 1)--}}
                                                <li class="nav-main-item">
                                                    <a class="nav-main-link "  aria-haspopup="true" aria-expanded="false" href="{{ route('Admin.AddUser') }}">
                                                        <i class="nav-main-link-icon si si-bag"></i>
                                                        <span class="nav-main-link-name">{{ trans('sidebar.AddUser') }}</span>
                                                    </a>
                                                </li>
                                                <li class="nav-main-item">
                                                    <a class="nav-main-link "  aria-haspopup="true" aria-expanded="false" href="{{ route('Admin.listUsers') }}">
                                                        <i class="nav-main-link-icon si si-bag"></i>
                                                        <span class="nav-main-link-name">{{ trans('sidebar.ViewUsers') }}</span>
                                                    </a>
                                                </li>
{{--                                            @endif--}}


                                            @endif
                                        </ul>
                                    </li>

                                    <?php
                                    $addon = \App\Models\Employee::checkAuthority('AddonController');
                                    ?>
                                    @if($addon->result == 1)
                                    <li class="nav-main-item">
                                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"  href="#">
                                            <i class="nav-main-link-icon si si-layers"></i>
                                            <span class="nav-main-link-name">{{trans('sidebar.AddonesManagement')}}</span>
                                        </a>
                                        <ul class="nav-main-submenu">
                                            <li class="nav-main-item">
                                                @if(in_array('create',$addon->data))
                                                <a class="nav-main-link "  aria-haspopup="true" aria-expanded="false" href="{{ route('Admin.AddAddone') }}">
                                                    <i class="nav-main-link-icon si si-bag"></i>
                                                    <span class="nav-main-link-name">{{trans('sidebar.AddAddones')}}</span>
                                                </a>
                                                @endif
                                                    @if(in_array('listAddons',$addon->data))
                                                    <a class="nav-main-link "  aria-haspopup="true" aria-expanded="false" href="{{route('Admin.ViewAllAddons')}}">
                                                    @endif
                                                    <i class="nav-main-link-icon si si-bag"></i>
                                                    <span class="nav-main-link-name">{{trans('sidebar.ViewAddones')}}</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    @endif
                                    <?php
                                    $prod = \App\Models\Employee::checkAuthority('ProductController');
                                    ?>
                                    @if($prod->result == 1)
                                    <li class="nav-main-item">
                                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"  href="#">
                                            <i class="nav-main-link-icon si si-layers"></i>
                                            <span class="nav-main-link-name">{{trans('sidebar.ProductsManagement')}}</span>
                                        </a>
                                        <ul class="nav-main-submenu">
                                            <li class="nav-main-item">
                                                @if(in_array('createProduct',$prod->data))
                                                <a class="nav-main-link "  aria-haspopup="true" aria-expanded="false" href="{{route('Admin.AddProduct')}}">
                                                    <i class="nav-main-link-icon si si-bag"></i>
                                                    <span class="nav-main-link-name">{{trans('sidebar.AddProducts')}}</span>
                                                </a>
                                                @endif
                                                @if(in_array('listProducts',$prod->data))
                                                <a class="nav-main-link "  aria-haspopup="true" aria-expanded="false" href="{{route('Admin.ViewAllProducts')}}">
                                                    <i class="nav-main-link-icon si si-bag"></i>
                                                    <span class="nav-main-link-name">{{trans('sidebar.ViewProducts')}}</span>
                                                </a>
                                                @endif
                                            </li>
                                        </ul>
                                    </li>
                                    @endif

                                    <?php
                                    $catg = \App\Models\Employee::checkAuthority('CategoryController');
                                    ?>
                                    @if($catg->result == 1)
                                    <li class="nav-main-item">
                                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"  href="#">
                                            <i class="nav-main-link-icon si si-layers"></i>
                                            <span class="nav-main-link-name">{{trans('sidebar.CategoriesManagement')}}</span>
                                        </a>
                                        <ul class="nav-main-submenu">
                                            <li class="nav-main-item">
                                                @if(in_array('createCategory',$catg->data))
                                                <a class="nav-main-link "  aria-haspopup="true" aria-expanded="false" href="{{route('Admin.AddCategory')}}">
                                                    <i class="nav-main-link-icon si si-bag"></i>
                                                    <span class="nav-main-link-name">{{trans('sidebar.AddCategory')}}</span>
                                                </a>
                                                @endif
                                                @if(in_array('listCategories',$catg->data))
                                                <a class="nav-main-link "  aria-haspopup="true" aria-expanded="false" href="{{route('Admin.ViewAllCategories')}}">
                                                    <i class="nav-main-link-icon si si-bag"></i>
                                                    <span class="nav-main-link-name">{{trans('sidebar.ViewCategories')}}</span>
                                                </a>
                                                @endif
                                            </li>
                                        </ul>
                                    </li>
                                    @endif
                                    <?php
                                    $orders = \App\Models\Employee::checkAuthority('OrderController');
                                    ?>
                                    @if($orders->result == 1)
                                    <li class="nav-main-item">
                                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"  href="#">
                                            <i class="nav-main-link-icon si si-layers"></i>
                                            <span class="nav-main-link-name">{{trans('sidebar.OrdersManagement')}}</span>
                                        </a>
                                        <ul class="nav-main-submenu">
                                            <li class="nav-main-item">
                                                @if(in_array('createOrder',$orders->data))
                                                <a class="nav-main-link "  aria-haspopup="true" aria-expanded="false" href="{{route('Admin.AddOrder')}}">
                                                    <i class="nav-main-link-icon si si-bag"></i>
                                                    <span class="nav-main-link-name">{{trans('sidebar.AddOrder')}}</span>
                                                </a>
                                                @endif
                                                @if(in_array('listAllOrders',$orders->data))
                                                <a class="nav-main-link "  aria-haspopup="true" aria-expanded="false" href="{{route('Admin.ViewAllOrders')}}">
                                                    <i class="nav-main-link-icon si si-bag"></i>
                                                    <span class="nav-main-link-name">{{trans('sidebar.ViewOrders')}}</span>
                                                </a>
                                                @endif
                                            </li>
                                        </ul>
                                    </li>
                                    @endif

                                    <?php
                                    $da = \App\Models\Employee::checkAuthority('DriverController');
                                    ?>
                                    @if($da->result == 1)
                                    <li class="nav-main-item">
                                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"  href="#">
                                            <i class="nav-main-link-icon si si-layers"></i>
                                            <span class="nav-main-link-name">{{trans('sidebar.DriversManagement')}}</span>
                                        </a>
                                        <ul class="nav-main-submenu">
                                            <li class="nav-main-item">
                                                @if(in_array('createDriver',$da->data))
                                                <a class="nav-main-link "  aria-haspopup="true" aria-expanded="false" href="{{route('Admin.AddDriver')}}">
                                                    <i class="nav-main-link-icon si si-bag"></i>
                                                    <span class="nav-main-link-name">{{trans('sidebar.AddDriver')}}</span>
                                                </a>
                                                @endif
                                                @if(in_array('listAllDrivers',$da->data))
                                                <a class="nav-main-link "  aria-haspopup="true" aria-expanded="false" href="{{route('Admin.ViewAllDrivers')}}">
                                                    <i class="nav-main-link-icon si si-bag"></i>
                                                    <span class="nav-main-link-name">{{trans('sidebar.ViewDrivers')}}</span>
                                                </a>
                                                @endif
                                                @if(in_array('show_new_orders',$da->data))
                                                <a class="nav-main-link "  aria-haspopup="true" aria-expanded="false" href="{{route('Admin.AssignOrders')}}">
                                                    <i class="nav-main-link-icon si si-bag"></i>
                                                    <span class="nav-main-link-name">{{trans('sidebar.AssignOrders')}}</span>
                                                </a>
                                                @endif
                                            </li>
                                        </ul>
                                    </li>
                                    @endif
                                    <li class="nav-main-item">
                                        <a class="nav-main-link"   href="{{route('Admin.ViewAllDoneOrders')}}">
                                            <i class="nav-main-link-icon si si-layers"></i>
                                            <span class="@if(App::isLocale('ar')) mr-3 @endif nav-main-link-name">{{trans('sidebar.report')}}</span>
                                        </a>
                                    </li>



                            </ul>
                        @endif
                    </div>
                    <!-- END Side Navigation -->
                </div>
                <!-- END Sidebar Scrolling -->
            </nav>
            <!-- END Sidebar -->

            <!-- Header -->
            <header id="page-header" dir="{{App::isLocale('ar')? 'rtl' : ''}}">
                <!-- Header Content -->
                <div class="content-header">
                    <!-- Left Section -->
                    <div class="d-flex align-items-center">
                        <!-- Toggle Sidebar -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
                        <button type="button" class="btn btn-sm btn-dual mr-2 d-lg-none"  data-toggle="layout" data-action="sidebar_toggle">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>

                        <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
                        <button type="button" class="btn btn-sm btn-dual mr-2 d-none d-lg-inline-block"  data-toggle="layout" data-action="sidebar_mini_toggle">
                            <i class="fa fa-fw fa-ellipsis-v"></i>
                        </button>
                        <!-- END Toggle Mini Sidebar -->




                    </div>
                    <!-- END Left Section -->

                    <!-- Right Section -->
                    <div class="d-flex align-items-center" @if(App::isLocale('en')) dir="rtl" @else dir="ltr" @endif>
                        <!-- User Dropdown -->
                        <div class="dropdown d-inline-block ml-2">
                            <button type="button" class="btn btn-sm btn-dual d-flex align-items-center" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle" src="{{asset('assets/media/avatars/avatar10.jpg') }}" alt="Header Avatar" style="width: 21px;">
                                <span class="d-none d-sm-inline-block ml-2">{{ auth()->user()->name }}</span>
                                <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block ml-1 mt-1"></i>
                            </button>

                            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right p-0 border-0" aria-labelledby="page-header-user-dropdown">
                                <div class="p-3 text-center bg-primary-dark rounded-top">
                                    <img class="img-avatar img-avatar48 img-avatar-thumb" src="{{asset(auth()->user()->image)}}" alt="">
                                    <p class="mt-2 mb-0 text-white font-w500">{{ auth()->user()->name }}</p>
                                    <p class="mb-0 text-white-50 font-size-sm">Admin</p>
                                </div>
                                <div class="p-2" >
                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="be_pages_generic_inbox.html">
                                        <span class="font-size-sm font-w500">الرسائل</span>
                                        <span class="badge badge-pill badge-primary ml-2">3</span>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="be_pages_generic_profile.html">
                                        <span class="font-size-sm font-w500">الملف الشخصي</span>
                                        <span class="badge badge-pill badge-primary ml-2">1</span>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                        <span class="font-size-sm font-w500">الإعدادات</span>
                                    </a>
                                    <div role="separator" class="dropdown-divider"></div>
                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="op_auth_lock.html">
                                        <span class="font-size-sm font-w500">إغلاق الحساب</span>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <span class="font-size-sm font-w500">تسجيل الخروج</span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- END User Dropdown -->

                        <!-- Notifications Dropdown -->
                        <div class="dropdown d-inline-block ml-2">
                            <button type="button" class="btn btn-sm btn-dual" id="page-header-notifications-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-language"></i>
                                <span class="text-primary"><span class="badge badge-primary">{{App::getLocale()}}</span></span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0 border-0 font-size-sm" aria-labelledby="page-header-notifications-dropdown">
                                <div class="p-2 bg-primary-dark text-center rounded-top">
                                    <h5 class="dropdown-header text-uppercase text-white">Language</h5>
                                </div>
                                <ul class="nav-items mb-0">
                                    <li>
                                        <div class="p-2 border-top">
                                            <a class="btn btn-sm btn-light btn-block text-center" href="{{ route('changeSiteLanguage', 'en') }}">
                                                English
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="p-2 border-top">
                                            <a class="btn btn-sm btn-light btn-block text-center" href="{{ route('changeSiteLanguage', 'ar') }}">
                                                Arabic
                                            </a>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <!-- END Notifications Dropdown -->


                        <!-- Notifications Dropdown -->
                        <div class="dropdown d-inline-block ml-2">
                            <button type="button" class="btn btn-sm btn-dual" id="page-header-notifications-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-fw fa-bell"></i>
                                <span class="text-primary"><span class="badge badge-primary">12</span></span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0 border-0 font-size-sm" aria-labelledby="page-header-notifications-dropdown">
                                <div class="p-2 bg-primary-dark text-center rounded-top">
                                    <h5 class="dropdown-header text-uppercase text-white">Notifications</h5>
                                </div>
                                <ul class="nav-items mb-0">
                                    <li>
                                        <a class="text-dark media py-2" href="javascript:void(0)">
                                            <div class="mr-2 ml-3">
                                                <i class="fa fa-fw fa-check-circle text-success"></i>
                                            </div>
                                            <div class="media-body pr-2">
                                                <div class="font-w600">You have a new follower</div>
                                                <span class="font-w500 text-muted">15 min ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="text-dark media py-2" href="javascript:void(0)">
                                            <div class="mr-2 ml-3">
                                                <i class="fa fa-fw fa-plus-circle text-primary"></i>
                                            </div>
                                            <div class="media-body pr-2">
                                                <div class="font-w600">1 new sale, keep it up</div>
                                                <span class="font-w500 text-muted">22 min ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="text-dark media py-2" href="javascript:void(0)">
                                            <div class="mr-2 ml-3">
                                                <i class="fa fa-fw fa-times-circle text-danger"></i>
                                            </div>
                                            <div class="media-body pr-2">
                                                <div class="font-w600">Update failed, restart server</div>
                                                <span class="font-w500 text-muted">26 min ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="text-dark media py-2" href="javascript:void(0)">
                                            <div class="mr-2 ml-3">
                                                <i class="fa fa-fw fa-plus-circle text-primary"></i>
                                            </div>
                                            <div class="media-body pr-2">
                                                <div class="font-w600">2 new sales, keep it up</div>
                                                <span class="font-w500 text-muted">33 min ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="text-dark media py-2" href="javascript:void(0)">
                                            <div class="mr-2 ml-3">
                                                <i class="fa fa-fw fa-user-plus text-success"></i>
                                            </div>
                                            <div class="media-body pr-2">
                                                <div class="font-w600">You have a new subscriber</div>
                                                <span class="font-w500 text-muted">41 min ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="text-dark media py-2" href="javascript:void(0)">
                                            <div class="mr-2 ml-3">
                                                <i class="fa fa-fw fa-check-circle text-success"></i>
                                            </div>
                                            <div class="media-body pr-2">
                                                <div class="font-w600">You have a new follower</div>
                                                <span class="font-w500 text-muted">42 min ago</span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                <div class="p-2 border-top">
                                    <a class="btn btn-sm btn-light btn-block text-center" href="javascript:void(0)">
                                        <i class="fa fa-fw fa-arrow-down mr-1"></i> Load More..
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- END Notifications Dropdown -->

                        <!-- Toggle Side Overlay -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <!-- <button type="button" class="btn btn-sm btn-dual ml-2" data-toggle="layout" data-action="side_overlay_toggle">
                            <i class="fa fa-fw fa-list-ul fa-flip-horizontal"></i>
                        </button> -->
                        <!-- END Toggle Side Overlay -->
                    </div>
                    <!-- END Right Section -->
                </div>
                <!-- END Header Content -->

                <!-- Header Search -->
                <div id="page-header-search" class="overlay-header bg-white">
                    <div class="content-header">
                        <form class="w-100" action="be_pages_generic_search.html" method="POST">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END Header Search -->

                <!-- Header Loader -->
                <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
                <div id="page-header-loader" class="overlay-header bg-white">
                    <div class="content-header">
                        <div class="w-100 text-center">
                            <i class="fa fa-fw fa-circle-notch fa-spin"></i>
                        </div>
                    </div>
                </div>
                <!-- END Header Loader -->
            </header>
            <!-- END Header -->

            <!-- Main Container -->
            <main id="main-container">


                <!-- Page Content -->
                <div class="content content-boxed" >
                    <!-- <div class="row" dir="rtl"> -->

                @yield('content')
                <!--  </div> -->

                </div>
                <!-- END Page Content -->

            </main>
            <!-- END Main Container -->

            <!-- Footer -->
            <footer id="page-footer" class="bg-body-light">
                <div class="content py-3">
                    <div class="row font-size-sm">

                        <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-left">
                            <a class="font-w600" href="https://1.envato.market/AVD6j" target="_blank">LogApps</a> &copy; <span data-toggle="year-copy"></span>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- END Footer -->

            <!-- Apps Modal -->
            <!-- Opens from the modal toggle button in the header -->
            <div class="modal fade" id="one-modal-apps" tabindex="-1" role="dialog" aria-labelledby="one-modal-apps" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="block block-rounded block-themed block-transparent mb-0">
                            <div class="block-header bg-primary-dark">
                                <h3 class="block-title">Apps</h3>
                                <div class="block-options">
                                    <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                        <i class="si si-close"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="block-content block-content-full">
                                <div class="row gutters-tiny">
                                    <div class="col-6">
                                        <!-- CRM -->
                                        <a class="block block-rounded block-link-shadow bg-body" href="javascript:void(0)">
                                            <div class="block-content text-center">
                                                <i class="si si-speedometer fa-2x text-primary"></i>
                                                <p class="font-w600 font-size-sm mt-2 mb-3">
                                                    CRM
                                                </p>
                                            </div>
                                        </a>
                                        <!-- END CRM -->
                                    </div>
                                    <div class="col-6">
                                        <!-- Products -->
                                        <a class="block block-rounded block-link-shadow bg-body" href="javascript:void(0)">
                                            <div class="block-content text-center">
                                                <i class="si si-rocket fa-2x text-primary"></i>
                                                <p class="font-w600 font-size-sm mt-2 mb-3">
                                                    Products
                                                </p>
                                            </div>
                                        </a>
                                        <!-- END Products -->
                                    </div>
                                    <div class="col-6">
                                        <!-- Sales -->
                                        <a class="block block-rounded block-link-shadow bg-body mb-0" href="javascript:void(0)">
                                            <div class="block-content text-center">
                                                <i class="si si-plane fa-2x text-primary"></i>
                                                <p class="font-w600 font-size-sm mt-2 mb-3">
                                                    Sales
                                                </p>
                                            </div>
                                        </a>
                                        <!-- END Sales -->
                                    </div>
                                    <div class="col-6">
                                        <!-- Payments -->
                                        <a class="block block-rounded block-link-shadow bg-body mb-0" href="javascript:void(0)">
                                            <div class="block-content text-center">
                                                <i class="si si-wallet fa-2x text-primary"></i>
                                                <p class="font-w600 font-size-sm mt-2 mb-3">
                                                    Payments
                                                </p>
                                            </div>
                                        </a>
                                        <!-- END Payments -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Apps Modal -->
        </div>
        <!-- END Page Container -->


        <script src="{{asset('assets/js/oneui.core.min.js')}}"></script>


        <script src="{{asset('assets/js/oneui.app.min.js')}}"></script>
        <script src="https://unpkg.com/polipop/dist/polipop.min.js"></script>


        <script>
            var polipop = new Polipop('mypolipop', {
                layout: 'popups',
                insert: 'before',
                pool: 5,
                progressbar: true,
                @if(App::isLocale('ar'))
                position:"bottom-left"
                @else
                position:"bottom-right"
                @endif
            });
            @if($errors->any())
                @foreach($errors->all() as $error)
                polipop.add({
                    content: '{{$error}}',
                    title: '{{__('alert.titleval')}}',
                    type: 'error',
                    life: 500
                });
                @endforeach
            @endif
            @if(session()->has('successM'))
            polipop.add({
                content: '{{session()->get('successM')}}',
                title: '{{__('alert.titlesuc')}}',
                type: 'success',
                life: 500
            });
            @endif
        </script>

    </body>
</html>
