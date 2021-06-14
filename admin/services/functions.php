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

function show_product($pdo){
    $query = "SELECT * FROM produk_belgindo WHERE status=1";
    $stmt = $pdo->query($query);
    $output = '
    <table class="rwd-table table table-borderless table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Description</th>
                <th>Picture</th>
                <th>Category</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>

    ';
    $number = 1;
    while ($row = $stmt->fetch()) {
        $output .= '
        <tr>
            <td scope="row" class="text-center">' . $number++ . '</td>
            <td>' . $row['nama_produk'] . '</td>
            <td>' . $row['deskripsi_produk'] . '</td>
            <td><button type="button" class="btn btn-outline-primary" data-src="' . $row['foto_produk'] . '" id="preview-image">View</button></td>
            <td>' . $row['kategori_produk'] . '</td>
            <td nowrap="nowrap">
                <button id="edit-whatwedo-btn" class="btn btn-warning" data-id="' . $row['id'] . '">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                    </svg>
                </button>
            </td>
        </tr>
        ';
    }
    $output .= '
        </tbody>
    </table>
    ';
    echo $output;
}