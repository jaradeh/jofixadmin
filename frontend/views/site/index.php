<?php
/* @var $this yii\web\View */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>
<section class="login-block">
    <div class="container">
        <div class="row">
            <div class="col-md-4 login-sec">
                <center>
                    <img src='/backend/web/images/home-logo.png' class='img-responsive' style='width:100px;'>
                </center>
                <h2 class="text-center">Login Now</h2>
                <form id="login-form" action="/login" method="post">
                    <input type="hidden" name="_csrf" value="FOcikspxBUiMSyk6rr2Z7z9NAKBaTx5TGctt3lPIFjtCmJhE2yyRpHJoZ-vQ9U6Ou0rRTcN268Wj1B8rnZNSsw==">
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="text-uppercase">Username</label>
                        <input type="text" name='LoginForm[username]' class="form-control" placeholder="" value='admin1'>

                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" class="text-uppercase">Password</label>
                        <input type="password" name="LoginForm[password]" class="form-control" placeholder="" value='admin1'>
                    </div>


                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">
                            <small>Remember Me</small>
                        </label>
                        <br />
                        <button type="submit" class="btn btn-login float-right">Login</button>
                    </div>

                </form>
            </div>
            <div class="col-md-8 banner-sec">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img class="d-block img-fluid" src="/backend/web/images/background-image.jpg" alt="First slide">
                            <div class="carousel-caption d-none d-md-block">
                                <div class="banner-text">
                                    <h2>JOFIX</h2>
                                    <p>Login to manage your App controllers</p>
                                </div>	
                            </div>
                        </div>

                    </div>	   

                </div>
            </div>
        </div>
</section>