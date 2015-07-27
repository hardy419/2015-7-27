<?



    // Connect Database

    require("../../php-bin/function.php");

    require("../../php-bin/get_class_selection.php");

    // Initial variables

    $msg = "";



    // Insert new data if data was posted, Return status message


    if (isset($_GET["msg"])){  // GET status message

      $msg = $_GET["msg"];

    }



    mysql_close();



?>

