<html>
<head>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

</head>
<body>
<?php
require_once 'config.php';

// Create connection
$conn = new mysqli($config['db']['servername'], $config['db']['username'], $config['db']['password'],$config['db']['dbname']);
mysqli_set_charset($conn,'UTF-8');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
</body>

</html>