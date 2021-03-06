<?php
function print_title(){
    if(isset($_GET['id']))
        echo $_GET['id'];
    else
        echo "Welcome";
}

function print_list(){
    $base_dir = "./data";
    $list = scandir("$base_dir");
    //var_dump($list);

    $cnt=count($list);
    for($i=2; $i<$cnt; $i++){
        echo "<li><a href=\"index.php?id=$list[$i]\">$list[$i]</a></li>\n";
    }
}

function print_description(){
    if(isset($_GET['id']))
        echo file_get_contents("data/".$_GET['id']);
    else
        echo "Hello, PHP";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>
            <?php
            print_title();
            ?>
        </title>
    </head>
    <body>
        <h1><a href="index.php">WEB</a></h1>
        <ol>
            <?php
            print_list();
            ?>
        </ol>
        <p>
            <a href="create.php">create</a>
            <?php if(isset($_GET['id'])) { ?>
                <a href="update.php?id=<?=$_GET['id']?>">update</a>
            <?php } ?>
        </p>

        <h2>
            <?php
            print_title();
            ?>
        </h2>
        <?php
            print_description()
        ?>

    </body>
</html>