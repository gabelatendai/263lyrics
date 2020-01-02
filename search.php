<?php
include 'includes/header.php';
include 'rb.php';
require 'includes/functions.php';
R::setup('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);

?><?php
$conn = mysqli_connect("localhost", "root", "", "263lyrics");
$keyword = "";
$queryCondition = "";
if(!empty($_POST["keyword"])) {
    $keyword = $_POST["keyword"];
    $wordsAry = explode(" ", $keyword);
    $wordsCount = count($wordsAry);
    $queryCondition = " WHERE ";
    for ($i = 0; $i < $wordsCount; $i++) {
        $queryCondition .= "name LIKE '%" . $wordsAry[$i] . "%' OR lyrics LIKE '%" . $wordsAry[$i] . "%'";
        if ($i != $wordsCount - 1) {
            $queryCondition .= " OR ";
        }
    }
}
$orderby = " ORDER BY id desc";
$sql = "SELECT * FROM lyrics " . $queryCondition;
$result = mysqli_query($conn, $sql);

?>
<?php
function highlightKeywords($text, $keyword) {
    $wordsAry = explode(" ", $keyword);
    $wordsCount = count($wordsAry);

    for($i=0;$i<$wordsCount;$i++) {
        $highlighted_text = "<span style= 'font-weight:bold; background-color: #FF0'>$wordsAry[$i]</span>";
        $text = str_ireplace($wordsAry[$i], $highlighted_text, $text);
    }

    return $text;
}
?>
	<html>
	<head>
		<title></title>
		<style>
			body{
				width: 100%;
				font-family: "Segoe UI",Optima,Helvetica,Arial,sans-serif;
				line-height: 25px;
			}
			.search-box {
				padding: 30px;
				background-color: #C0FBDA;
				border-radius: 5px;
				height: 100px;
			}
			.search-label{
				margin:2px;
			}
			.demoInputBox {
				padding: 10px;
				border: 0;
				border-radius: 4px;
				margin: 0px 5px 15px;
				width: 550px;
				float: left;
			}
			.btnSearch{
				padding: 10px;
				background: #8A8A8A;
				border: 0;
				border-radius: 4px;
				margin-right: 200px;
				color: #FFF;
				float: right;
				width: 250px;
			}
			.result-title {
				color: #AA00FF;
			}
			.result-description{
				margin: 5px 0px 15px;
			}
		</style>
	</head>
<body>
	<h2 align="left">Your Search Results</h2>
<div>
	<hr />
<?php

$numrows = mysqli_num_rows($result);
if ($numrows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $new_title = $row["name"];
        if (!empty($_POST["keyword"])) {
            $new_title = highlightKeywords($row["name"], $_POST["keyword"]);
        }
        $new_description = $row["lyrics"];
        if (!empty($_POST["keyword"])) {
            $new_description = highlightKeywords($row["lyrics"], $_POST["keyword"]);
        }
        $id =$row['id'];
        ?>
		<div>
			<div class="result-title" ><h3><a href="readmore.php?id= <?php echo $id;?>" target="_blank" style="color: #0e90d2;" ><?php echo $new_title; ?></a></h3></div>

			<div class="result-description"><?php

                //  $strpost =$new_description->campaign_post;
                $new_description;
                if (strlen($new_description) > 500) {

                    // truncate string
                    $stringCut = substr($new_description, 0, 500);
                    $new_description = substr($stringCut, 0, strrpos($stringCut, ' ')).'..........  ';
                }

                echo nl2br($new_description); ?> </div>
			<div class="clear10"></div>
            <?php if ($new_description=='1'){ ?>

				<div class="col-sm-12 col-xs-12 bdr-boxright pgd_right_view" style="padding-right: 0px;">
					<a href="readmore.php?id=<?php echo $id;?>"  class="btn_box_website" data-toggle="model" data-target="#myModel" style="width: 100%;"
					> read more</a></div>
            <?php  }

            ?>
		</div>
        <?php
    }
}
else {
    echo "NO results found for \"<b> $keyword</b>\"";
}

?>


<?php
include 'includes/footer.php'
?>