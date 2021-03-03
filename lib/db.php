<?php 
try {
    $db = new PDO("mysql: hostname=localhost; dbname=card;", "root", "123456");
} catch (PDOException $e) {
    echo $e->getMessage();
};

?>



