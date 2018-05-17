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
                <h1 class="page-header">Продукты</h1>
                <div class="row">
                    <div class="col-lg-12">
                        <!-- /.panel -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-bar-chart-o fa-fw"></i> Продукты
                            </div>
                            <button id="add-product" value="Создать">Создать</button>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table-responsive">
<!--                                            <form action="/product/addProduct" method="POST">-->
<!--                                                <input type="text" name="name" >-->
<!--                                                <input type="text" name="cost" >-->
<!--                                                <input type="submit" name="submit" >-->
<!--                                            </form>-->
                                            <table class="table table-bordered table-hover table-striped">
                                                <thead>
                                                <tr>
                                                    <th>ID продукта</th>
                                                    <th>Наименование</th>
                                                    <th>Стоимость</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                foreach ($pageData['products'] as $key => $value) {
                                                    echo "<tr>";
                                                    echo "<td>" . $value['id'] . "</td>";
                                                    echo "<td>" . $value['name'] . "</td>";
                                                    echo "<td>" . $value['cost'] . "</td>";
                                                    echo "<tr>";
                                                }
                                                ?>
                                                <?php foreach ($pageData['errors'] as $value) {
                                                    echo "</br><span class='form-error'>*$value</span>";
                                                } ?>
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
        </div>
        <script src="/js/admin/sb-admin-2.js"></script>
        <script src="/js/jquery.min.js"></script>
        <script src="/js/sifter.js"></script>
        <script src="/js/microplugin.js"></script>
        <script src="/js/admin/metisMenu.js"></script>
        <link rel="stylesheet" href="/dist/css/selectize.default.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript">

            $(document).ready(function(){
                $("#add-product").click(function(){
                    form = "<form action='/product/addProduct' method='post'></form>"
                    name = "<input type='text' placeholder='Наименование' name='name' />";
                    cost = "<input type='text' placeholder='Стоимость за единицу' name='cost'/>";
                    submit = "<input type='submit' name='submit' value='Сформировать'/>";
                    hr = "<hr/>";
                    $(this).after($(form).append(name).append(cost).append(submit).append(hr));
                     return false;
                });             });
        </script>

</body>

</html>



