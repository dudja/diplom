<!DOCTYPE html>
<html lang="ru">

<?php
    include_once "conf/header.php";
?>

<body>

<div id="wrapper">

<?php
    include_once "conf/nav.php";
?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Статистика</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-money fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">
                                    <?php echo $pageData['ordersCount']; ?>
                                </div>
                                <div>заказов</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-cart-plus fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">
                                    <?php echo $pageData['productsCount']; ?>
                                </div>
                                <div>товаров</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-user-o fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">
                                    <?php echo $pageData['customerCount']; ?>
                                </div>
                                <div>заказчиков</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <!-- /.panel -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-bar-chart-o fa-fw"></i> Статистика
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <div id="chartContainer" style="width:40%;height: 400px" >
                                                <canvas id="myChart"></canvas>
                                        </div>
<!--                                        --><?php //foreach ($pageData['orders'] as $key => $value) {
//                                            echo "<tr>";
//                                            echo "<td>" . $value['id'] . "</td>";
//                                            echo "<td>" . $value['total'] . "</td>";
//                                            echo "<td>" . $value['login'] . "</td>";
//                                            echo "<td>" . $value['email']  . "</td>";
//                                            echo "<tr>";
//                                        }
//                                        ?>
                                        </tbody>
                                        <tbody>
                                    </table>
<!--                                    <td>-->
<!--                                        <button>Количество заказов в месяцах</button>-->
<!--                                    </td>-->
<!--                                    <td>-->
<!--                                        <button>Количество заказчиков в месяцах</button>-->
<!--                                    </td>-->
<!--                                    <td>-->
<!--                                        <button>Количество заказов</button>-->
<!--                                    </td>-->
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.col-lg-4 (nested) -->
                            <!-- /.col-lg-8 (nested) -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-8 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<!-- jQuery -->
<script src="/js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="/js/admin/metisMenu.js"></script>

<!-- Chart Plugin JavaScript -->
<script src="/js/charttest.js"></script>

<!-- Custom Theme JavaScript -->
<script src="/js/admin/sb-admin-2.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>

</body>

</html>