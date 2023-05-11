<?php

    if(!empty($_GET['groupe'])) {
        $groupe = checkerInp($_GET['groupe']);
    }

    function checkerInp($x){

        $x = trim($x);
        $x = stripcslashes($x);
        $x = htmlspecialchars($x);
        return $x;
    }

    $date_prod = shell_exec('python emplois/scrapDate.py');
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emplois</title>
    <link
      rel="shortcut icon"
      href="https://ismo.ma/images/LogoOFPPTVF.png"
      type="image/x-icon"
    />
    <meta
      name="description"
      content="scraping program ismo"
    />
    <meta 
        name="keywords" content="Scrap data using Python/PHP"
    >
    <meta name="author" name="Ayoub Bd">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
       <!-- JavaScript Bundle with Popper -->
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<style>
    
    body{
        position: relative;
        width:100% !important;
        height:100vh !important;
    }
    .main{
        position: absolute !important;
        top:20%;
        left:50%;
        transform:translate(-50%,-5%);
        width:70%;
        display:flex;
        flex-direction:column;
        gap:30px;
        box-shadow: inset 10px 10px 10px rgba(0, 0, 0, 0.05),
        15px 20px 10px rgba(0, 0, 0, 0.05),
        15px 17px 17px rgba(0, 0, 0, 0.05),
        -15px -15px 20px rgba(255, 255, 255, 0.9) ;
        padding:20px !important;
        border-radius:20px;
        margin-bottom:30px !important; 
    }
    .alert{
        position: absolute;
        top:-300%;
        filter:blur(10px);
        opacity: 0;
        transition:all 600ms;
        left:50%;
        transform:translateX(-50%);
        font-size:22px;
        letter-spacing:1px;
        text-align:center;
        z-index: 100;
    }
    .alert-danger , .alert-success{
        top:0%;
        filter:blur(0);
        opacity: 1;
    }
    button#sub{
        position:relative !important;
        letter-spacing:2px;
        font-weight:600;
        letter-spacing: 3px;
        font-size: 18px;
        padding: 10px 30px;
        color: #444;
        background: radial-gradient(circle,#0059a1 10%, #fff 50%);
        cursor: pointer;
        border: 2px solid #fff ;
        border-radius:60%;
        outline: none; 
        border-bottom: 2px solid  rgb(32, 184, 90); 
        margin:5px auto !important;
        
    }
   
    .nav{
        width:100%;
        justify-content:space-around;
        align-items:center;
        padding: 10px auto !important;
    }
    .nav ul{
        list-style: none;
        padding:0 !important;
        margin:0 !important;
    }
    header{
        box-shadow: inset 10px 10px 10px rgba(0, 0, 0, 0.05),
        15px 20px 10px rgba(0, 0, 0, 0.05),
        15px 17px 17px rgba(0, 0, 0, 0.05),
        -15px -15px 20px rgba(255, 255, 255, 0.9) ;
        width:100%;
        z-index: 5000 !important;
        transition:all 600ms;
    }
       
    @media screen and (max-width:450px) {
        .main{
            width:90%;
        }
        .lzy{
            width:40px !important;
            height:40px !important;
        }
        .logo__img{
            width:90px !important;
            height:30px !important;
        }
        
    }
    header.fixed__nav{
        position:fixed !important;
        top:0;
        left:0;
    }

    #sub:before{
        content: "";
        position: absolute;
        top: 16px;
        right: 2px;
        width: 20px;
        height: 20px;
        background:#aba9a9;
        border-radius: 50%;
        animation: Amb 300ms ease-in-out 1s infinite;
    }
    #sub:after{
        content: "";
        position: absolute;
        top: 16px;
        left: 2px;
        width: 20px;
        height: 20px;
        background:#aba9a9;
        border-radius: 50%;
        animation: Amb 300ms ease-in-out 1s infinite;
    }
    @keyframes Amb {
        to{
            background-image: linear-gradient(to right, #0059a1,rgb(32, 184, 90));
        }
    }
    #date_production > p{
        border-bottom:1px solid rgb(32, 184, 90);
        padding-bottom:5px;
    } 
    .main h2{
        letter-spacing: 4px;
        color:#aba9a9;
    }
    .loader{
        display:none;
    }
    .loader.show{
        display:flex;
        justify-content:center;
    }
    .kkb-footer{
        position:absolute;
        bottom:0 ;
        left:0;
        width:100%;
        box-shadow: inset 10px 10px 10px rgba(0, 0, 0, 0.05),
        15px 20px 10px rgba(0, 0, 0, 0.05),
        15px 17px 17px rgba(0, 0, 0, 0.05),
        -15px -15px 20px rgba(255, 255, 255, 0.9) ;
    }
    .reverse{
        position:relative !important;
        border-radius:10px;
    }

    .kkb-footer p {
        color:#000;
        letter-spacing:2px;
    }
</style>
<body>

    <div class="kbb-header">
        <header class="header__box">
            <div class="nav d-flex">
                <div class="logo"><a href="index.php"><img src="assets/logo.png" alt="OFPPT ISMO" width="140" height="50" class="logo__img"></a></div>
                <ul>
                    <li><a href="index.php"><img src="https://cdn-icons-png.flaticon.com/128/10532/10532530.png" data-src="https://cdn-icons-png.flaticon.com/128/10532/10532530.png" alt="Back HOME" title="BACK TO HOME" width="64" height="64" class="lzy lazyload--done" srcset="https://cdn-icons-png.flaticon.com/128/10532/10532530.png 4x"></a></li>
                </ul>
            </div>
        </header>
    </div>
  
    <div class="main">
        <p class="alert mx-auto d-flex"></p>
        <h2 class="text-center">Programs Search</h2>
        <form action="" method="post" id="form_____emp" class="myForm">
            <label for="" class="form-label fs-5">Enter the name for yr filiere <span style="color:red;">*</span></label>
            <input type="text" name='groupe' id="groupe" value="<?php if(isset($groupe)){echo $groupe;}?>" class="form-control mb-2" placeholder="DEV103">
            <button type="submit" class="btn sub text-light w-100" id="sub">Search</button>
        </form>

        <section id="emplois" class="container">
            <div class="row">
                <div class="card">
                    <div class="title mb-2 fs-5" id="date_production"><?php if(isset($date_prod)){echo $date_prod;};?></div>
                    <div id="box_emplois"><?php include 'emplois/loader.php'; ?></div>
                </div>
            </div>
        </section>
    </div>

    <footer class="kkb-footer">
        <p class="text-center mt-2">Software Scraping Progarm <span><a href="https://www.ismo.ma" target="_blank">ismo.ma</a></span>  By @AYOUB_HOES </p>
    </footer>
    <script src="assets/sender.js"></script>
</body>
</html>