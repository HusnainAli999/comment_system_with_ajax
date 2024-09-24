<?php include "cdn.php"; ?>

<style>
    body {
        overflow-x: hidden;
    }

    /* main h1 code start */

    .main_h1 {
        font-size: 28px;
        color: #333;
        text-align: left;
        border-bottom: 2px solid #ddd;
        padding-bottom: 10px;
        margin: 20px 20px 20px 20px;
        font-weight: bold;
        letter-spacing: 1px;
    }

    /* main h1 code end */

    /* Comment Form Code Start*/

    .comment-form {
        background-color: #f9f3d8;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        max-width: 400px;
        width: 100%;
        margin: 20px 10px 20px 20px;
    }

    .comment-form input[type="text"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        margin-bottom: 15px;
        font-size: 16px;
    }

    .comment-form button {
        background-color: #5cb85c;
        color: white;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 5px;
        cursor: pointer;
        width: 100%;
    }

    .comment-form button:hover {
        background-color: #4cae4c;
    }

    /* Comment Form Code End*/

    /* Reply Div Code Start */

    .comment-box {
        margin-left: 20px;
        padding: 10px;
        background-color: #f3e5ab;
        border-left: 3px solid white;
        margin-bottom: 10px;
        border-radius: 5px;
        box-shadow: 0 4px 6px white;
        max-width: 600px;
    }

    .comment-user {
        font-weight: bold;
        color: #333;
        display: block;
        margin-bottom: 5px;
    }

    .comment-text {
        font-size: 16px;
        color: #555;
        margin-bottom: 10px;
    }

    .reply-form {
        margin-top: 10px;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
    }

    .reply-form input[type="text"] {
        width: 70%;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 5px;
        margin-right: 10px;
        font-size: 14px;
    }

    .reply-form button {
        padding: 8px 15px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .reply-form .open_reply_btn {
        margin: 10px 10px 10px 0px;
    }

    .reply-form .form_reply_data_div {
        display: none;
    }

    .reply-form .form_reply_data_div {
        width: 100%;
    }

    .reply-form button:hover {
        background-color: #0056b3;
    }

    .comment-box .reply-form input[type="text"]::placeholder {
        color: #999;
    }
</style>