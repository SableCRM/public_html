<?php
session_start();

header('Access-Control-Allow-Origin: *');
//header('Access-Control-Allow-Methods: GET, POST');

//require_once '../Integration/DATABASE_CONNECTION.php';
//$query = 'SELECT zones FROM SCHEDULED_JOBS WHERE COMPANY_ID = ? AND JOB_ID = ?';
//$params = array($_POST['company'], $_POST['deal']);
//echo Connect($query, $params, 'array')->zones;

try{
    $handler = new PDO('mysql:dbname=sablrcrm_test; host=50.87.144.13', 'sablrcrm_287f_cg', 'W#(!8l=&%@Na');
    $handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    if($_POST['deal']){
        $sql = "SELECT zones FROM SCHEDULED_JOBS WHERE COMPANY_ID = ? AND JOB_ID = ?";
        
        $query = $handler->prepare($sql);
        
            $query->execute(array(
            $_POST['company'],
            $_POST['deal']
        ));
        
        echo json_encode($query->fetchObject()->zones);
    }
}

catch(PDOException $ex){
    die($ex->getMessage());
}