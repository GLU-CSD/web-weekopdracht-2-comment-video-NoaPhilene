<?php
include("config.php");
include("reactions.php");

$getReactions = Reactions::getReactions();
//uncomment de volgende regel om te kijken hoe de array van je reactions eruit ziet

//echo "<pre>".var_dump($getReactions)."</pre>";

if(!empty($_POST)){

    //dit is een voorbeeld array.  Deze waardes moeten erin staan.
    $postArray = [
        'name' => $_POST["name"],
        'email' => $_POST["email"],
        'message' => $_POST["comment"]
    ];

    $setReaction = Reactions::setReaction($postArray);

    if(isset($setReaction['error']) && $setReaction['error'] != ''){
        prettyDump($setReaction['error']);
    }
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youtube remake</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <iframe width="560" height="315" src="https://www.youtube.com/embed/6_hl8AB7Uf0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

    <h2>Hieronder komen reacties</h2>

    <form action="" method="POST">
    <div>name:</div>
    <div>
        <input type="text" name="name" value="">
    </div>
    <div>email:</div>
    <div>
         <input type="text" name="email" value="">
    </div>
    <div>comment:</div>
    <div>
         <textarea name="comment" cols= "26" rows="4"></textarea>
    </div>
    <input type="submit" value="Verzenden">

    </form>

    <p></p>

    <?php 

    foreach($getReactions as $reaction){
        echo("<div class='comment'>");
        echo"<h3>".$reaction['name']."</h3>";
        echo "<p>".$reaction['comment']."</p>";
        echo ("</div>");
    }

    
    ?>

</body>
</html>

<?php
$con->close();
?>