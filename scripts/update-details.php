<?php

@session_start();
//Authors  Aziah Miller
$showAlert = false;
$showError = false;
$exists=false;


print_r($_COOKIE);




if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include file which makes the
    // Database Connection.
    global $conn;
    require_once 'dbconnect.php';



    print_r($_POST);

    //checking if the phone/email are unqiue (not in the table)

    $unique_email = true;
    $unique_phone = true;
    if(!empty($_POST['email'])){

    $num=0;
    $sql = "Select * from users where email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_POST['email']);
    $stmt->execute();
    $result = $stmt->get_result();
    $num = mysqli_num_rows($result);

    echo "Value of num: " .$num;


    if($num>0){
        echo "UNIQUE EMAILS FALSE";
        $unique_email = false;
    }
    }

    if(!empty($_POST['phnumber'])){

        $num=0;
        $sql = "Select * from users where phone=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $_POST['phnumber']);
        $stmt->execute();
        $result = $stmt->get_result();
        $num = mysqli_num_rows($result);
        
        echo "Value of num: " .$num;
    if($num>0){
        $unique_phone = false;
    }
    }
    // if the email or phone number are not unique, a post request will be sent back to the 
    // update details page, this will include the non-unique fields and all of the user's past input  
    if(!$unique_email || !$unique_phone){

        echo '<form id="myForm" action="../account-details.php" method="post">';
        //for each script credit to stackoverflow user "Peeter"
        foreach ($_POST as $a => $b) {
            echo '<input type="hidden" name="'.htmlentities($a).'" value="'.htmlentities($b).'">';
        }
        echo 
        '<input type="hidden" name="unique_phone" value="'.htmlentities($unique_phone).'">
        <input type="hidden" name="unique_email" value="'.htmlentities($unique_email).'">
        </form>
            <script type="text/javascript">
            document.getElementById("myForm").submit();
            </script>';
            exit();
    }

    function update($arr, $table){


        global $conn;
        require_once 'dbconnect.php';

        $data = $arr;
        $temp = $_POST['cpass'];
        if(isset($temp) and !empty($temp)){
            $data['password'] = password_hash($temp,
                PASSWORD_DEFAULT);
        }

        //ripping the selected and values input
        foreach($data as $key=>$val)
        {
            if(isset($val) and !empty($val)){
                $columnNames[] = '`' . $key. '`';
                $placeHolders[] = '?';
                $values[] = $val;
        }
        }
        if(!isset($columnNames)){
            return;
        }

        //setting user ID (to be appended later)
        $user_id = $_SESSION['user_id'];
        //Dynamically Creating the SQL statement depending on the columns
        if($table = "users"){
            $sql = "UPDATE `users` SET " . join('= ?, ', $columnNames) ."=?" ." WHERE user_id = ?";
        }elseif($table = "useraddresses"){
            $sql = "UPDATE `useraddresses` SET " . join('= ?, ', $columnNames) ."=?" ." WHERE user_id = ?";
        }

        
        //array to contain the first variable input type param and values for columns
        $bindString = array();
        $bindValues = array();
        echo $sql;
        // build bind type mapping
        foreach($values as $value) {
            switch ($key) {
                case "phone":
                    $bindString[] = 'i';
                    break;
                case "surname":
                    $bindString[] = 's';
                    break;
                case "preferred":
                    $bindString[] = 's';
                    break;
                case "postcode":
                    $bindString[] = 'i';
                    break;
                case "password":
                    $bindString[] = 's';
                    break;
                default:
                    $bindString[] = 's';
            }

            $bindValues[] = $value;
        }


        //append user ID/int bind mapping
        $bindValues[] = $user_id;
        $bindString[] = 'i';

        // prepend the bind mapping to the beginning of the array
        array_unshift($bindValues, join('', $bindString));

        // convert the array to an array of references
        $bindReferences = array();
        foreach($bindValues as $k => $v) {
            $bindReferences[$k] = &$bindValues[$k];
        }


        //calling functions to execute

        $statement = $conn->stmt_init();
        if (!$statement->prepare($sql)) {
            die("Error message: " . $conn->error);
            
            return;
    }



    //passing the paramater array to the bind_param function 
    call_user_func_array(array($statement, "bind_param"), $bindReferences);

    echo "Returning";
    $statement->execute();  
    $statement->close();
    echo "Returning";
    return 1;
    }

    if($unique_email and $unique_phone){
        $updateCount = 0;
            $data_users = array(
                'phone' => $_POST["phnumber"],
                'surname' => $_POST["surname"],
                'preferred' => $_POST["preferred"],
                'password' => $_POST["cpass"],
                'email' => $_POST["cemail"]                        
            );
            

        $updateCount += update($data_users, "users");
        echo $updateCount;

            $data_address = array(
                    'suburb' => $_POST["suburb"],
                    'postcode' => $_POST["postcode"],
                    'address' => $_POST["street"],
            );


        $updateCount += update($data_address, "useraddresses");
        echo $updateCount;
        if($updateCount > 0){
            echo '<form id="myForm" action="../account-details.php" method="post">
           <input type="hidden" name="success" value="1">
            </form>
            <script type="text/javascript">
            document.getElementById("myForm").submit();
            </script>';
        }else{
            header("Location: ../account-details.php");
        }
    }
            
        }
    


    ?>