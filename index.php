<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
    <title>php-docker website</title>
</head>
<body>
    
<?php
include 'includes/newclass.inc.php';

$person = new Person();
$person->setName("Rihins");
echo $person->name;

$connect = mysqli_connect(
    'db',
    'lamp_demo',
    'password',
    'lamp_demo'
);


$query = 'SELECT *
    FROM blog';
$result = mysqli_query($connect, $query);

echo '<h1>MySQL Content:</h1>';

while($record = mysqli_fetch_assoc($result))
{
    echo '<h2>'.$record['title'].'</h2>';
    echo '<p>'.$record['content'].'</p>';
    echo 'Posted: '.$record['date'];
    echo '<hr>';
}

?>

</body>
</html>