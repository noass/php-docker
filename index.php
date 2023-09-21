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
echo $person->getName();

echo "<br><br>";

$employee = new Employee();
$manager = new Manager();
$employee->setAccess("Level: 3");
$manager->setAccess("Level: 5");
echo "Employee access - ";
echo $employee->getAccess();
echo "<br>";
echo "Manager access - "; 
echo $manager->getAccess();

$connect = mysqli_connect(
    'db',
    'lamp_demo',
    'password',
    'lamp_demo'
);

$query1 = 'SELECT e.employee_id, e.first_name, e.last_name, e.job_title, m.first_name AS manager
    FROM employees e left JOIN employees m ON e.reports_to = m.employee_id;';
$query2 = 'SELECT o.order_id, c.customer_id AS customer, o.order_date FROM orders o left JOIN customers c ON o.customer_id = c.customer_id;';
$result1 = mysqli_query($connect, $query1);
$result2 = mysqli_query($connect, $query2);

echo '<h1>Employees data</h1>';

while($record = mysqli_fetch_assoc($result1))
{
    //echo var_dump("$record");
    echo '<h2>Employee ID: '.$record['employee_id'].'</h2>';
    echo '<p>First name: '.$record['first_name'].'</p>';
    echo '<p>Last name: '.$record['last_name'].'</p>';
    echo '<p>Job title: '.$record['job_title'].'</p>';
    if($record['manager'] != NULL){
        echo '<p>Manager: '.$record['manager'].'</p>';
    }else{
        echo '<p>Manager: NO MANAGER</p>';
    }
    echo '<hr>';
}

echo '<hr>';
echo '<hr>';
echo '<hr>';
echo '<h1>Order data</h1>';

while($record = mysqli_fetch_assoc($result2))
{
    echo '<h2>Order ID: '.$record['order_id'].'</h2>';
    echo '<p>Customer ID: '.$record['customer'].'</p>';
    echo '<p>Order date: '.$record['order_date'].'</p>';
    echo '<hr>';
}

?>
</body>
</html>