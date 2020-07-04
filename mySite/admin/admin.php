<?php if(!isset($_COOKIE['usa'])){
    header('Location: /mySite/blocks/404.php');
}else{ ?>
    <title>Admin Page</title>
    <?php require '..\blocks\header.php'/*'../blocks/header.php'*/;
    require '..\config\connect_to_red.php';
    $sql = "SELECT category,id,title,author,views FROM articles order by date_time desc";
    $result=mysqli_query($conn,$sql);
    ?><div class="container text-center">
    <div class="row">
        <div class="col">
            <h2 ><?php echo 'Добро пожаловать в Панель Администратора' ?></h2><br/>
            <div class="alert-heading col-12 mb"style="color: #0056b3">
                <p class="mb-1" ><i><?php echo 'Дружите с умными, ибо друг дурак Порой опаснее, чем умный враг.'?></i></p>
                <div class="blockquote-footer mb-2">Джалаледдин Руми<br/><hr></div>
            </div>
            <div  class="alert-heading col-12 mb"style="color: green ">
                <p class="mb-2"><i>Чтобы добавить новую статью нажмите ниже приведённую кнопку</i></p>
                <a href="add.php" class="btn btn-outline-primary">Add New Article</a>
            </div>
            <img src="../img/konoha/Konoha32.png" width="112" height="170">
        </div>

        <div class="col"><table  style="text-align: center" border="1" cellpadding="10">
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>ID</th>
                    <th>Category</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr><?php
                while ($row = mysqli_fetch_assoc($result))
                {
                    $title=$row["title"] ;
                    $category=$row["category"] ;
                    $author=$row["author"];
                    $id=$row["id"];?><tr><?php
                    echo '<td width="50px">'.$title.'</td>';
                    echo '<td width="50px">'.$author.'</td>' ;
                    echo '<td width="50px">'.$id.'</td>' ;
                    echo '<td width="50px">'.$category.'</td>' ;
                    echo '<td width="50px"><a href="delete.php?id='.$id.'" class="btn btn-outline-danger">Delete</a></td>' ;
                    echo '<td width="50px"><a href="edit.php?id='.$id.'" class="btn btn-outline-warning">Edit</a></td>' ;
                    ?> </tr><?php
                }
                ?>
            </table>
        </div>
    </div>
    <div class="row text-center">
        <div class="col"><?php
            $sqll = "SELECT title,views FROM articles order by date_time desc";
            $resultt=mysqli_query($conn,$sqll);
            ?>
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
                google.charts.load("current", {packages:["corechart"]});
                google.charts.setOnLoadCallback(drawChart);
                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ['Articles', 'Views'],
                        <?php
                        while ($roww = mysqli_fetch_assoc($resultt)){
                            $views=$roww["views"];
                            $title=$roww["title"];
                            echo "['$title', $views],";
                        }
                        ?>
                    ]);
                    var options = {
                        title: 'Articles',
                        legend: { position : 'bottom' },
                        colors: ['green']
                    };
                    var chart = new google.visualization.Histogram(document.getElementById('chart_div'));
                    chart.draw(data, options);
                }
            </script>
            <div id="chart_div" style="width: 900px; height: 500px; position: center "></div>
        </div>
    </div>
    </div>
    <?php require $_SERVER['DOCUMENT_ROOT'] .'/blocks/footer.php' ;
}
?>
