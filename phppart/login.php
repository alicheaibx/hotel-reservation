
<?php
include 'conc.php';

if ( isset( $_POST['Email'] ) && isset( $_POST['Password'] ) )
{
    if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
        $Email = $_POST['Email'];
        $Password= $_POST['Password'];
        if ( empty( $Email ) ||  empty( $Password ) )
        {
            echo 'Either Email,  or password is empty';
        } else {
            $sql = "SELECT `Email`,`Password`FROM customer WHERE `Email`='$Email' AND `Password`='$Password'";
            
        }
    }

    $result = mysqli_query( $con, $sql );
    if ( !$result ) {
        echo "query didn't work, so killing.\n";
        die( 'query failed' );
    }
    $resultCheck = mysqli_num_rows( $result );
    $response = array();

    if ( mysqli_num_rows( $result ) > 0 )
    {
        $row = mysqli_fetch_row( $result );
        $Email = $row[0];

        $code = 'login_success';
        header("Location: ../htmlpart/home.html ");
			exit();

    } else {
        $code = 'login_failed';
        $message = 'Wrong Credentials.';
        // Warning is from line 32 an33
        header("Location: ../htmlpart/login.html ");
			exit();
    }
} else {
    echo 'please enter both Email and Password.';
}

mysqli_close( $con );

?>