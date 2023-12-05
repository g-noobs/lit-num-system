<!DOCTYPE html>

<html>
<?php session_start(); 
$_SESSION['loggedin'] = false; 
$_SESSION['admin'] = false;
$_SESSION['teacher'] = false;

error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tagakaulo Edu</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.tagakauloedu.com/landingpage.css">
</head>

<body>
    <header>
        <button type="button" class="btn btn-primary" id="header-btn" data-toggle="modal" data-target="#login-modal">
            Login
        </button>
    </header>

    <div class="page row" id="first-page">
        <div id="left-first-page" class="col-sm-6">
            <h1 id="h1-first-page"> Learn Tagakaulo <br> with <span class="emphasis">Ka-Ede</span> </h1>
            <p> Nurture yourself with the rich tribal language using Ka-ede <br> to seamlessly learn and understand the
                Tagakaulo language. </p>

            <form method="post">
                <input id="download-btn" type="submit" name="download" value="Download Now" />
            </form>
        </div>

        <div id="right-first-page" class="col-sm-6">
            <img src="https://www.tagakauloedu.com/logo.png" alt="logo" id="hero-image">
        </div>
    </div>


    <div class="page" id="second-page">
        <h1>Benefits of Ka-Ede</h1>
        <div class="benefits">
            <div id="first-benefits">
                <img src="https://www.tagakauloedu.com/logo.png" alt="logo" class="benefits-image">
                <h5 class="benefits-title">Personal Growth</h5>
                <p class="benefits-body">Build confidence and adaptability by learning another language.</p>
            </div>
            <div>
                <img src="https://www.tagakauloedu.com/logo.png" alt="logo" class="benefits-image">
                <h5 class="benefits-title">Preserve Culture</h5>
                <p class="benefits-body">Contributing on the preservation of indigenous knowledge.</p>
            </div>
            <div>
                <img src="https://www.tagakauloedu.com/logo.png" alt="logo" class="benefits-image">
                <h5 class="benefits-title">Enhance Brain</h5>
                <p class="benefits-body">Improves memory by challenging the brain in terms of mental agility.</p>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <div class="modal" id="login-modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">What are you?</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form id="login-form" method="post">
                        <button type="submit" class="btn btn-danger" name="admin">Admin</button>
                        <button type="submit" class="btn btn-danger" name="teacher">Teacher</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
        if (isset($_POST['download'])) {
            header("Location: https://www.tagakauloedu.com/Mobile/ka-ede.apk");
            exit;
        }
        
        if (isset($_POST['admin'])) {
            header("Location: https://www.tagakauloedu.com/admin.php");
            exit;
        } else if (isset($_POST['teacher'])) {
            header("Location: https://www.tagakauloedu.com/teacher.php");
            exit;
        }    
    ?>
</body>

</html>