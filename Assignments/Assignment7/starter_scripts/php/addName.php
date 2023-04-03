<?php
    require_once ('../classes/Pdo_methods.php');

    $data = json_decode($_POST['data']);

    $pdo = new Pdomethods();

    $sql = "INSERT INTO names (name) VALUES (:name)";
    $name_arr = explode(" ", $data->name);
    $name = $name_arr[1].", ".$name_arr[0];
    ("name: $name");

    $bindings = [
        [':name',$name,'str']
    ];

    $result = $pdo->otherBinded($sql, $bindings);

    if($result === 'error'){
        $response = (object)[
            'masterstatus'=>'error',
            'resp'=>"There was an error entering the name"
        ];
    }
    else{
        $response = (object)[
            'masterstatus'=>'success',
            'resp'=>"Name has been added"
        ];
    }

    $output = "{$data->fname}";
    $output .= "{$data->lname}<br>";

    $response = (object)[
        'masterstatus'=>'success',
        'resp'=>$output
    ];

    echo json_encode($response);

    $conn->close;
?>
