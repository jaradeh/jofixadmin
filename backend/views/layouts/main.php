<?php
/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use backend\models\Requests;

$getAllRequests = Requests::find()->where(['status' => 1])->all();
$getNumberOfRequests = sizeof($getAllRequests);

$this->title = "JoFix Admin";
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>


        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="/backend/web/images/fav.png" type="image/x-icon">
        <!-- CSS -->
        <link rel="stylesheet" href="/backend/web/css/app.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <style>
            .loader {
                position: fixed;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                background-color: #F5F8FA;
                z-index: 9998;
                text-align: center;
            }

            .plane-container {
                position: absolute;
                top: 50%;
                left: 50%;
            }
        </style>
        <!-- Js -->
        <!--
        --- Head Part - Use Jquery anywhere at page.
        --- http://writing.colin-gourlay.com/safely-using-ready-before-including-jquery/
        -->
        <script>(function (w, d, u) {
                w.readyQ = [];
                w.bindReadyQ = [];
                function p(x, y) {
                    if (x == "ready") {
                        w.bindReadyQ.push(y);
                    } else {
                        w.readyQ.push(x);
                    }
                }
                ;
                var a = {ready: p, bind: p};
                w.$ = w.jQuery = function (f) {
                    if (f === d || f === u) {
                        return a
                    } else {
                        p(f)
                    }
                }
            })(window, document)</script>

        <?php $this->head() ?>
    </head>
    <body class="light">
        <?php $this->beginBody() ?>


        <!-- Pre loader -->
        <div id="loader" class="loader">
            <div class="plane-container">
                <div class="preloader-wrapper small active">
                    <div class="spinner-layer spinner-blue">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div><div class="gap-patch">
                            <div class="circle"></div>
                        </div><div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>

                    <div class="spinner-layer spinner-red">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div><div class="gap-patch">
                            <div class="circle"></div>
                        </div><div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>

                    <div class="spinner-layer spinner-yellow">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div><div class="gap-patch">
                            <div class="circle"></div>
                        </div><div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>

                    <div class="spinner-layer spinner-green">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div><div class="gap-patch">
                            <div class="circle"></div>
                        </div><div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="app">
            <aside class="main-sidebar fixed offcanvas shadow" data-toggle='offcanvas'>
                <section class="sidebar">
                    <div class="w-80px mt-3 mb-3 ml-3">
                        <center>
                            <a href='/backend/web'><img src="/backend/web/images/logo.jpg" alt="JoFix Admin"></a>
                        </center>
                    </div>
                    <div class="relative">
                        <a data-toggle="collapse" href="#userSettingsCollapse" role="button" aria-expanded="false"
                           aria-controls="userSettingsCollapse" class="btn-fab btn-fab-sm absolute fab-right-bottom fab-top btn-primary shadow1 ">
                            <i class="icon icon-cogs"></i>
                        </a>
                        <div class="user-panel p-3 light mb-2">
                            <div>
                                <div class="float-left image">
                                    <img class="user_avatar" src="/backend/web/img/dummy/u1.png" alt="User Image">
                                </div>
                                <div class="float-left info">
                                    <?php if(!\Yii::$app->user->isGuest){ ?>
                                    <h6 class="font-weight-light mt-2 mb-1"><?php echo Yii::$app->user->identity->username ?></h6>
                                    <?php }else{ ?>
                                    <h6 class="font-weight-light mt-2 mb-1">Admin</h6>
                                    <?php } ?>
                                    <a href="#"><i class="icon-circle text-success blink"></i> Online</a>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="collapse multi-collapse" id="userSettingsCollapse">
                                <div class="list-group mt-3 shadow">
                                    <a href="/backend/web/site/logout" data-method="post" class="list-group-item list-group-item-action">
                                        <i class="mr-2 icon-security text-purple"></i>Sign out
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="header"><strong>MAIN NAVIGATION</strong></li>
                        <li class="treeview">
                            <a href="/backend/web">
                                <i class="icon icon-sailing-boat-water purple-text s-18"></i>
                                <span>Dashboard</span> 
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="/backend/web/users">
                                <i class="icon icon-user blue-text s-18"></i>
                                <span>System Users</span> 
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="/backend/web/requests">
                                <i class="icon icon-package green-text s-18"></i>
                                <span>Manage Requests</span> 
                                <?php if ($getNumberOfRequests > 0) { ?>
                                    <span class="badge r-3 badge-warning pull-right"><?php echo $getNumberOfRequests ?></span>
                                <?php } ?>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="/backend/web/quotation">
                                <i class="icon fa fa-file-pdf fa-home blue-text s-18"></i>
                                <span>Quotation</span> 
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="/backend/web/services">
                                <i class="icon fa fa-concierge-bell fa-home package blue-text s-18"></i>
                                <span>Manage Services</span> 
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="/backend/web/questions">
                                <i class="icon fa fa-list package fa-home green-text s-18"></i>
                                <span>Manage Services Questions</span> 
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="/backend/web/technicians">
                                <i class="icon fa fa-users package fa-home blue-text s-18"></i>
                                <span>Manage Technicians</span> 
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="/backend/web/technicians/finance">
                                <i class="icon package fa-home blue-text fa fa-dollar  s-18"></i>
                                <span>Finance</span> 
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="/backend/web/equipments">
                                <i class="icon fa fa-wrench package fa-home green-text s-18"></i>
                                <span>Manage Equipments</span> 
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="/backend/web/contact">
                                <i class="icon fa fa-headset package fa-home purple-text s-18"></i>
                                <span>Manage Customer Support</span> 
                            </a>
                        </li>
                    </ul>
                </section>
            </aside>
            <!--Sidebar End-->

            <?= $content ?>

            <!-- Add the sidebar's background. This div must be placed
                     immediately after the control sidebar -->
            <div class="control-sidebar-bg shadow white fixed"></div>
        </div>
        <!--/#app -->
        <script src="/backend/web/js/app.js"></script>




        <!--
        --- Footer Part - Use Jquery anywhere at page.
        --- http://writing.colin-gourlay.com/safely-using-ready-before-including-jquery/
        -->
        <script>(function ($, d) {
                $.each(readyQ, function (i, f) {
                    $(f)
                });
                $.each(bindReadyQ, function (i, f) {
                    $(d).bind("ready", f)
                })
            })(jQuery, document)</script>
        <?php $this->endBody() ?>

    </body>
</html>
<?php $this->endPage() ?>
