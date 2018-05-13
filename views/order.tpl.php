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

    <div id="page-wrapper" data-ng-app="orders" data-ng-controller="orderController">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Заказы</h1>
                <button id="add-order" value="Создать">Создать</button>
                <div class="row">
                    <div class="col-lg-12">
                        <!-- /.panel -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-bar-chart-o fa-fw"></i> Заказы
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover table-striped">
                                                <thead>
                                                <tr>
                                                    <th>Имя заказчика</th>
                                                    <th>Наименование компании</th>
                                                    <th>Стоимость</th>
                                                    <th>Дата формирования</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                foreach ($pageData['orders'] as $value) {
                                                    echo "<tr>";
                                                    echo "<td>" . $value['customers_first_name'] ." ". $value['customers_last_name'] . "</td>";
                                                    echo "<td>" . $value['customers_company_name'] . "</td>";
                                                    echo "<td>" . $value['total'] . "</td>";
                                                    echo "<td>" . date("m.d.y", strtotime($value['date_creating'])) . "</td>";
                                                    echo "<tr>";

                                                }
                                                ?>
                                                </tbody>
                                            </table>
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
<!--        <script src="/dist/css/selectize.default.css"></script>-->
        <script src="/dist/js/standalone/selectize.min.js"></script>
        <script src="/js/sifter.js"></script>
        <script src="/js/microplugin.js"></script>
<!--        <script src="/dist/less/plugins/dropdown_header.less"></script>-->

<!--        <script src="sifter.js/sifter.js"></script>-->
        <!-- Metis Menu Plugin JavaScript -->
        <script src="/js/admin/metisMenu.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="/js/admin/sb-admin-2.js"></script>

<!--        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
        <link rel="stylesheet" href="/dist/css/selectize.default.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="/js/bootstrap.min.js"></script>
        <script type= "text/javascript">
             $(document).ready(function(){
                 function maping(products){
                     data = [];
                     for (product in products) {
                         element = products[product];
                         data.push({name: element.name, id:element.id });
                     }
                     return data;
                 }

                 $.ajax("/product/getProducts", {
                     data: {
                     },
                     dataType: "json",
                     method: "post",
                     success: function(responcive){
                         data = responcive;
                         data = maping(data);
                     }
                 });

                 $("#add-order").click(function(){
                     form="<form action='/order/addOrder' method='post'></form>"
                     customerF = "<input type='text' placeholder='Имя' name='customerF' />";
                     customerL = "<input type='text' placeholder='Фамилия' name='customerL'/>";
                     customerC = "<input type='text' placeholder='Компания' name = 'customerC'/>";
                     submit = "<input type='submit' name='submit' value='Сформировать'/>";
                     button = "<button class='add-product' >+</input>";
                     hr = "<hr/>";
                     $(this).after($(form).append(customerF).append(customerL).append(customerC).append(button).append(submit).append(hr));
                     $(document).ready(function(){
                         $(".add-product").click(function(){
                             product = "<input placeholder='Продукт' class='selectize' name='product[]'/>";
                             quantity = "<input type='number' placeholder='Количество' value='0' min-value='0' name='quantity[]'/>";
                              $(this).after("<br/>"+"<div class='line'>"+product+quantity+"</div'>");

                             $('.selectize').first().selectize({
                                 delimiter: ',',
                                 persist: false,
                                 create:true,
                                 maxItems:1,
                                 options: data,
                                 labelField: "name",
                                 valueField: "id"
                             });

                             return false;
                         });
                     });
                     return false;
                 });

             });
        </script>


</body>

</html>



