<?php
session_start();
$session_value = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : ''; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Styles/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="scripts/page_init.js" user_id="<?php echo $session_value; ?>" async></script>
    <title>Upload your Item</title>
</head>
<?php require_once "inc/secondheader.inc.php"; ?>
<body>
    <div class="row">
    <h1>Create a new listing here</h1>
    <p> Please be careful to accurately describe your item and be sure to include details on its condition. </p>
    </div>
    <div>
        <form action="scripts/upload.php" enctype="multipart/form-data" method="post">
            <input name="brand" type="text" placeholder="Brand" required>
            <span class="sideBySide">
                                <input name="name" class="left" type="text" placeholder="Product Name" required>
                                <input name="price" class="right" type="number" step="0.01" placeholder="Price ($)" required>
            </span>
            <textarea name="descr" required>Please write a short description of your product here.</textarea>
            <input name="bytes" type="file" accept="image/*"  required>

            <button type="submit" class="BTN login_button register_button">Upload</button>
        </form>
    </div>

</body>
</html>