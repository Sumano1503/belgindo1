<?PHP

function insert_logout($pdo, $id){
    $query = "UPDATE `login_activity` SET end_date = NOW() WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);
}



function json_response($code = 200, $message = null)
{
    header_remove();
    http_response_code($code);
    header("Cache-Control: no-transform,public,max-age=300,s-maxage=900");
    header('Content-Type: application/json');
    $status = array(
        200 => '200 OK',
        400 => '400 Bad Request',
        422 => 'Unprocessable Entity',
        500 => '500 Internal Server Error'
    );
    header('Status: '.$status[$code]);
    return json_encode(array(
        'status' => $code < 300, // success or not?
        'msg' => $message
    ));
}





?>