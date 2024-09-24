<?php

include 'config.php';

session_start();

if (!isset($_SESSION['logins'])) {
    echo "<script> window.location.href='login.php'; </script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment System</title>
    <?php
    include 'css.php';

    ?>
</head>

<body>
    <?php include "navBar.php"; ?>
    <h1 class="main_h1">Welcome (<?php echo ucfirst($_SESSION['logins_name']) . " User Id : " . $_SESSION['logins']; ?>)</h1>

    <!-- Comment form -->
    <form action="" class="comment-form" id="comment-form" method="post">
        <input type="hidden" name="user_id" value="<?php echo $_SESSION['logins']; ?>">
        <input type="hidden" name="username" value="<?php echo $_SESSION['logins_name']; ?>">
        <input type="text" name="comment" placeholder="Add a comment...">
        <button type="submit">Comment</button>
    </form>

    <!-- Display comments -->
    <div id="response"></div>

    <script>
        $(document).ready(function() {
            // Attach a submit event handler to the form
            $("#comment-form").on("submit", function(e) {
                e.preventDefault(); // Prevent the default form submission

                // Send an AJAX request
                $.ajax({
                    url: "add_comment.php", // The PHP script that will process the data
                    method: "POST", // Use the POST method
                    data: $(this).serialize(), // The data to send
                    success: function(response) {
                        alert(response);
                        $("#comment-form")[0].reset();
                        show_data();

                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        // Handle any errors
                        alert("An error occurred: " + textStatus);
                    }
                });
            });


            function show_data() {
                $.ajax({
                    url: "fetch_comments.php",
                    method: "POST",
                    success: function(comment_response) {
                        $("#response").html(comment_response);
                    },
                    error: function() {
                        alert("Error in ajax while fetching comments");
                    }
                });
            }

            show_data();
        });
    </script>

</body>

</html>