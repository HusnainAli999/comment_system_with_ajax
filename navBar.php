<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .nav {
        background: black;
        color: white;
        height: 80px;
        width: 100vw;
        padding-top: 20px;
        padding-right: 30px;
    }

    .nav div:nth-child(1) {
        position: absolute;
        margin: 10px 10px 10px 10px;
    }

    .nav a {
        float: right;
        background: darkred;
        color: white;
        font-size: 20px;
        padding: 10px;
        border-radius: 5px;
        text-decoration: none;
        margin-left: 10px;
        margin-right: 10px;
    }

    .nav a:hover {
        background: orange;
    }
</style>
<div class="nav">
    <div>
        <h3>Husnain Development</h3>
    </div>
    <div>
        <a href="index.php">Index</a>
        <a href="logout.php">Logout</a>
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
    </div>
</div>