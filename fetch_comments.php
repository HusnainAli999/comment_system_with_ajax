<?php

include 'config.php';
include 'cdn.php';

session_start();

if (!isset($_SESSION['logins'])) {
    echo "<script> window.location.href='login.php'; </script>";
    exit;
}

function display_comments($comments, $parent_id = 0)
{
    foreach ($comments as $comment) {
        if ($comment['parent_id'] == $parent_id) {
            echo "<div class='comment-box'>";

            // Show who the comment is directed to
            if ($comment['receiver_name'] != '') {
                echo "<strong class='comment-user'>" . ucfirst($comment['username']) . " to " . ucfirst($comment['receiver_name']) . "</strong>";
            } else {
                echo "<strong class='comment-user'>" . ucfirst($comment['username']) . "</strong>";
            }

            echo "<p class='comment-text'>{$comment['comment']}</p>";

            // Reply form
            echo "<form class='reply-form' method='post'>";
            echo "<button type='button' class='open_reply_btn' >Reply</button>";
            echo "<input type='hidden' name='user_id' value='{$_SESSION['logins']}'>";
            echo "<input type='hidden' name='username' value='{$_SESSION['logins_name']}'>";
            echo "<input type='hidden' name='parent_id' value='{$comment['id']}'>";
            echo "<input type='hidden' name='receiver_name' value='{$comment['username']}'>"; // Capture the receiver name

            echo "<div class='form_reply_data_div'>";
            echo "<input type='text' name='comment' class='real_reply_input' placeholder='Reply To ({$comment['username']})' required>";
            echo "<button type='submit' class='real_reply_submit_btn'>Submit</button>";
            echo "</div>";

            echo "</form>";

            // Recursive call for replies
            display_comments($comments, $comment['id']);
            echo "</div>";
        }
    }
}

// Fetch comments
$result = $conn->query("SELECT * FROM comments ORDER BY created_at DESC");
$comments = $result->fetch_all(MYSQLI_ASSOC);

echo display_comments($comments);

?>
<script>
    $(document).ready(function() {
        // Attach a submit event handler to the form
        $(".reply-form").on("submit", function(e) {
            e.preventDefault(); // Prevent the default form submission

            // Send an AJAX request
            $.ajax({
                url: "add_comment.php", // The PHP script that will process the data
                method: "POST", // Use the POST method
                data: $(this).serialize(), // The data to send
                success: function(response) {
                    alert(response);
                    $(".reply-form")[0].reset();
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
    });

    var open_reply_btn = document.querySelectorAll(".open_reply_btn");
    var form_reply_data_div = document.querySelectorAll(".form_reply_data_div");

    for (var i = 0; i < open_reply_btn.length; i++) {
        open_reply_btn[i].addEventListener("click", function(index) {
            return function() {
                if (form_reply_data_div[index].style.display == "none" || form_reply_data_div[index].style.display == "") {
                    form_reply_data_div[index].style.display = "block";
                } else {
                    form_reply_data_div[index].style.display = "none";
                }
            }
        }(i))
    }
</script>