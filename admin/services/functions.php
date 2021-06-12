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

function show_mail($pdo){
    $query = "SELECT * FROM `mail`";
    $stmt = $pdo->query($query);
    $output = '
    <table class="rwd-table table table-borderless table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Message</th>
            </tr>
        </thead>
        <tbody>
    ';
    $number = 1;
    while($row = $stmt->fetch()){
        $output .= '
            <tr>
                <td scope="row">' . $number++ . '</td>
                <td>' . $row['name'] . '</td>
                <td>' . $row['phone'] . '</td>
                <td>' . $row['email'] . '</td>
                <td>' . $row['message'] . '</td>
            </tr>
        ';
    }
    $output .= '
        </tbody>
    </table>
    ';
    echo $output;
}