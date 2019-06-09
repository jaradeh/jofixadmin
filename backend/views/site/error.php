<?php
/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="page  has-sidebar-left height-full">
    <div class="container-fluid animatedParent ">
        <div class="tab-content my-3" id="v-pills-tabContent">
            <div class="tab-pane animated fadeInUpShort show active" id="v-pills-all" role="tabpanel" aria-labelledby="v-pills-all-tab">
                <div class="row my-3">
                    <div class="col-md-12">
                        <div class="card r-0 shadow">
                            <div class="table-responsive">
                                <main class="parallel">
                                    <div class="row grid">
                                        <div class="col-md-6 white">
                                            <div class="p-5">
                                                <div class="p-5">
                                                    <div class="text-center p-t-100">
                                                        <p class="s-128 bolder p-t-b-100">Opps!</p>
                                                        <p class="s-18">oh dear! you are lost don't try to hard.</p>
                                                        <div class="p-t-b-20"><a href="/backend/web" class="btn  btn-outline-primary btn-lg"><i class="icon icon-arrow_back"></i> Go Back
                                                                To Home</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 height-full" data-bg-repeat="false" data-bg-possition="center" style="background: url('/backend/web/img/dummy/cs3.gif') #FFEFE4">
                                        </div>
                                    </div>
                                </main>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>