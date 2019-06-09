<?php

use backend\models\Quotation;
use backend\models\Technicians;

$getAllTechs = Technicians::find()->all();
$totalPrice = 0;
//die(var_dump($data));
?>
<div class="has-sidebar-left">
    <div class="sticky">
        <div class="navbar navbar-expand navbar-dark d-flex justify-content-between bd-navbar blue accent-3">
            <div class="relative">
                <a href="#" data-toggle="push-menu" class="paper-nav-toggle pp-nav-toggle">
                    <i></i>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="page  has-sidebar-left height-full">
    <header class="blue accent-3 relative">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon fa fa-home"></i>
                        Finance
                    </h4>
                </div>
            </div>
            <div class="row justify-content-between">
                <ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
                    <li>
                        <a class="nav-link active" id="v-pills-all-tab" data-toggle="pill" href="#v-pills-all" role="tab" aria-controls="v-pills-all"><i class="icon icon-home2"></i>Finance</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="container-fluid animatedParent ">
        <div class="tab-content my-3" id="v-pills-tabContent">
            <div class="tab-pane animated fadeInUpShort show active go" id="v-pills-all" role="tabpanel" aria-labelledby="v-pills-all-tab">
                <div class="row my-3">
                    <div class="col-md-12">
                        <div class="card r-0 shadow">
                            <div class="table-responsive">
                                <div id="w0" class="grid-view">
                                    <table class="table table-striped table-bordered table-hover"><thead>
                                            <tr>
                                                <td colspan="2">
                                                    <select class="form-control" name="tech" id="SearchTech">
                                                        <option value="0"> -- Select Technician -- </option>
                                                        <?php foreach ($getAllTechs as $techs => $tech) { ?>
                                                            <option value="<?php echo $tech['id'] ?>"><?php echo $tech['name'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </td>
                                                <td><input type="date" value="Date From" class="form-control" id="SearchFrom"></td>
                                                <td><input type="date" value="Date To" class="form-control" id="SearchTo"></td>
                                                <td>
                                                    <input type="submit" class="btn btn-primary" value="Search" id="searchBtn">
                                                    <a href="/backend/web/technicians/finance" class="btn btn-success">Reset</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th><a href="#" data-sort="name">Technician Name</a></th>
                                                <th><a href="#" data-sort="status">Orders</a></th>
                                                <th><a href="#" data-sort="phone">Client Phone</a></th>
                                                <th><a href="#" data-sort="status">Date</a></th>
                                                <th><a href="#" data-sort="status">Total Amount</a></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($data as $infoData => $info) { ?>
                                                <tr data-key="1">
                                                    <?php $getTech = Technicians::find()->where(['id' => $info['technician_id']])->one(); ?>
                                                    <td><a href="/backend/web/technicians/<?php echo $getTech['id'] ?>"><?php echo $getTech['name'] ?></a></td>
                                                    <td><a href="/backend/web/requests/<?php echo $info['id'] ?>"><?php echo $info['id'] ?></a></td>
                                                    <td><a href="tel:<?php echo $info['phone'] ?>"><?php echo $info['phone'] ?></a></td>
                                                    <td><?php echo date('Y-m-d H:i:s A', $info['date_created']) ?></td>
                                                    <?php $getQoutation = Quotation::find()->where(['id' => $info['quotation_id']])->one(); ?>
                                                    <td><?php echo $getQoutation['price'] ?> JOD</td>
                                                    <?php $totalPrice = $totalPrice + $getQoutation['price']; ?>
                                                </tr>
                                            <?php } ?>
                                            <tr>
                                                <td colspan="5"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4"></td>
                                                <th><center>Total Amount</center></th>
                                        </tr>
                                        <tr>
                                            <td colspan="4"></td>
                                            <td><center><?php echo $totalPrice ?> JOD</center></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>