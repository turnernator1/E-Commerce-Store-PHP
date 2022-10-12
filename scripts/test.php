<?php

@session_start();
//Authors - Jack Turner & Aziah Miller
$showAlert = false;
$showError = false;
$exists=false;


print_r($_COOKIE);




if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include file which makes the
    // Database Connection.
    global $conn;
    require_once 'dbconnect.php';

    $data = array(
        'phone' => $_POST["phnumber"],
        'surname' => $_POST["surname"],
        'preferred' => $_POST["preferred"],
        'email' => $_POST["cemail"],
        'password' => $_POST["npass"],      
    );



    //checking if the phone/email are unqiue (not in the table)

    $unique_email = true;
    $unique_phone = true;
    if(!empty($data['email'])){

    
    $sql = "Select * from users where email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $data['cemail']);
    $stmt->execute();
    $result = $stmt->get_result();
    $num = mysqli_num_rows($result);

    echo "Value of num: " .$num;


    if($num>0){
        $unique_email = false;
    }
    }

    if(!empty($data['phone'])){

    
    $sql = "Select * from users where phone=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $data['phone']);
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
        '<input type="hidden" name="unique_phone" value="'.htmlentities($data['unique_phone']).'">
        <input type="hidden" name="unique_email" value="'.htmlentities($data['unique_email']).'">
        </form>
            <script type="text/javascript">
            document.getElementById("myForm").submit();
            </script>';
            exit();
    }

    if($unique_email and $unique_phone){
        for($i=0; $i <2; $i++){
            if($i=0){
                $data = array(
                    'phone' => $_POST["phnumber"],
                    'surname' => $_POST["surname"],
                    'preferred' => $_POST["preferred"],
                    'email' => $_POST["cemail"],
                    'password' => $_POST["npass"],      
                );
            }else{
                $data = array(
                    'suburb' => $_POST["suburb"],
                    'postcode' => $_POST["postcode"],
                    'address' => $_POST["street"],     
                );
            }
            //ripping the selected and values input
            foreach($data as $key=>$val)
            {
                if(!empty($val)){
                    $columnNames[] = '`' . $key. '`';
                    $placeHolders[] = '?';
                    $values[] = $val;
            }
            }

            //setting user ID (to be appended later)
            $user_id = $_SESSION['user_id'];
            //Dynamically Creating the SQL statement depending on the columns
            if($i == 0 and isset($columnNames)){
                $sql = "UPDATE `users` SET " . join('= ?, ', $columnNames) ."=?" ." WHERE user_id = ?";
            }elseif($i == 1 and isset($columnNames)){
                $sql = "UPDATE `useraddress` SET " . join('= ?, ', $columnNames) ."=?" ." WHERE user_id = ?";
            }else{
                continue;
            }

            
             //array to contain the first variable input type param and values for columns
            $bindString = array();
            $bindValues = array();

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
                        $bindString[] = 's';
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

            $statement->execute();  
            $statement->close();

        }
    }}
    

    ?>