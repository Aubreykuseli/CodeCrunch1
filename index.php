<?php include('script.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SIMPLE HTML, PHP, MYSQL PAGINATION SYSTEM - CodeCrunch</h1></title>
<style>
body{
background: #fff;
color: #333;
font-family:arial;

}
.content{
width: 80%;
margin: auto;

}
.pagination a{
padding: 6px;
border: solid #333 thin;
text-decoration: none;
border-radius: 3px;
color: #333; 

}
h1{
color:deepskyblue;

}
a.active{
background: #333;
color: deepskyblue;
}
</style>
<?php 
if(isset($_GET['page-nr'])){
$id = $_GET['page-nr'];
}
else{
$id = 1;
}
?>
</head>
<body id=<?php echo $id ?>>
<div class="content">
<center><h1>SIMPLE HTML, PHP, MYSQL PAGINATION SYSTEM - CodeCrunch</h1></center>
<h4>All Posts</h4>
<?php 
while($row = $result->fetch_assoc()){
?>
    <p><?php echo $row['id']?> -  <?php echo $row['title']?></p>
<?php
}
?>
<div class="page_info">
<?php
if(!isset($_GET['page-nr'])){
$page = 1;
}
else{
$page = $_GET['page-nr'];
}?>
Showing <?php echo $page ?> of <?php echo $pages ?> Pages
</div>
<br>   
<div class="pagination">
<a href="?page-nr=1">First</a>
<?php 
if(isset($_GET['page-nr']) && $_GET['page-nr'] > 1){
        ?>
            <a href="?page-nr=<?php echo $_GET['page-nr'] - 1 ?>"><<</a>

            <?php 
} else{
?>
<a><<</a>
<?php 
}
?> 
<span class="page-numbers">
<?php
for($counter = 1; $counter <= $pages; $counter ++){
    ?>
        <a href="?page-nr=<?php echo $counter ?>"><?php echo $counter ?></a>
    <?php
}
?>    
<?php
if(!isset($_GET['page-nr'])){
    ?>
<a href="?page-nr=2">>></a>
<?php
} else{
if($_GET['page-nr'] >= $pages){
    ?>
    <a>>></a>
<?php
}
else{
    ?>
    <a href="?page-nr=<?php echo $_GET['page-nr'] +1?>">>></a>
<?php
}
}
?>
</span>
<a href="?page-nr=<?php echo $pages?>">Last</a>
</div>
</div>
<script>
let links = document.querySelectorAll('.page-numbers > a');
let bodyId = parseInt(document.body.id) - 1;
links[bodyId].classList.add("active");
</script>
</body>
</html>