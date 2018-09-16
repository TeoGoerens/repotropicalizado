<div class="row w-100 mr-0 ml-0">

    <div class="col-lg-12 header-container">
        <div class="row">
            <div class="headernaming col-sm-12 col-md-5 offset-md-1 col-lg-5 offset-lg-1">
                <img class= "logo" src="images/logo.jpg" alt="logo">
                <h1><strong>SoundClub</strong></h1>
            </div>
            <div class="headerbuttons col-md-5 col-lg-5">
            <a href="login.php"><button class="<?= (isset($_SESSION)) ? "d-none" : "buttonsignin";?>">Sign In</button></a>
                <button class="<?= (isset($_SESSION)) ? "d-none" : "buttonsignup";?>">Sign Up</button>
                <a href="logout.php"><button class="<?= (isset($_SESSION)) ? "buttonsignin" : "d-none";?>">Logout</button></a>
            </div>
        </div>
    </div>
</div>