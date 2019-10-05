<?php
    session_start();
?>
<!DOCTYPE html5>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="../assets/css/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Product info</title>
</head>

<body>
    <!-- NAV SECTION -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Mungmee Headphone</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link text-uppercase" href="../index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase" href="product.php">Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase" href="contact.php">Contact us</a>
                </li>
            </ul>
            <form action="../querys/search.php" method="POST" class="form-inline my-lg-0 mr-2">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"
                    name="keyword">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search">
                    <i class="fa fa-search pr-2" aria-hidden="true"></i>Search
                </button>
            </form>
            <?php
                if(!empty($_SESSION['user_login']) and $_SESSION['status'] == 'Admin'){
                    $user_name = $_SESSION['user'];
                    $user_name_de = $_SESSION['user_login'];
                    $user_id =$_SESSION['user_id'];
                    $user_item = $_SESSION['user_item'];
                    
                    echo "<form action='adminPages/index_admin.php' class='form-inline my-lg-0 mr-2'>
                            <button class='btn btn-success my-2 my-sm-0 text-uppercase' type='submit'>
                                <i class='fa fa-home pr-2' aria-hidden='true'></i>Go to Admin Page</button>
                        </form>
                        <form class='form-inline my-lg-0 mr-2'>
                            <a href='cartinfo.php?id=$user_id' class='btn btn-outline-primary my-2 my-sm-0 text-uppercase'>
                                <spane class='h5'>
                                    <i class='fa fa-shopping-cart pr-2' aria-hidden='true'></i>
                                    <span class='badge badge-success'>$user_item</span>
                                </spane>
                            </a>
                        </form>
                        <form class='form-inline my-lg-0 mr-2'>
                            <a href='accountdetail.php?user=$user_name' class='btn btn-primary my-2 my-sm-0 text-uppercase'>$user_name_de</a>
                        </form>";
                }else if(!empty($_SESSION['user_login'])){
                    $user_name = $_SESSION['user'];
                    $user_name_de = $_SESSION['user_login'];
                    $user_item = $_SESSION['user_item'];
                    $user_id =$_SESSION['user_id'];

                    echo "<form class='form-inline my-lg-0 mr-2'>
                            <a href='cartinfo.php?id=$user_id' class='btn btn-outline-primary my-2 my-sm-0 text-uppercase'>
                                <spane class='h5'>
                                    <i class='fa fa-shopping-cart pr-2' aria-hidden='true'></i>
                                    <span class='badge badge-success'>$user_item</span>
                                </spane>
                            </a>
                        </form>
                        <form class='form-inline my-lg-0 mr-2'>
                            <a href='accountdetail.php?user=$user_name' class='btn btn-primary my-2 my-sm-0 text-uppercase'>$user_name_de</a>
                        </form>";
                }else{
                    echo "<form action='accountdetail.php' class='form-inline my-lg-0 mr-2'>
                            <button class='btn btn-outline-primary my-2 my-sm-0 text-uppercase' type='submit'>Account</button>
                        </form>
                        <form action='register.php' class='form-inline my-lg-0'>
                            <button class='btn btn-outline-primary my-2 my-sm-0 text-uppercase' type='submit'>Register</button>
                        </form>";
                }
            ?>
        </div>
    </nav>
    <!-- END NAV SECTION -->
    <div class="col-12">
        <div class="row">
            <div class="container-fluid mt-3">
                <div class="col-12 col-md-12 banner jumbotron h-100">
                    <div class="row">
                        <button class="btn btn-primary mt-2 ml-3" type="submit">Read more</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-4 col-lg-3">
                <div class="container-fluid">
                    <?php
                            if(empty($_SESSION['user_login'])){
                                echo"<div class='login-form'>
                                    <div class='row justify-content-center'>
                                        <div class='col-12 col-md-12 col-lg-12'>
                                            <div class='card'>
                                                <div class='card-header border-left border-right border-top border-dark'>
                                                    <h3 class='text-uppercase text-center font-weight-bold'>login</h3>
                                                </div>
                                                <div class='card-body bg-light border-bottom border-left border-right border-top border-dark'>
                                                    <form action='../querys/login_process.php' method='POST'>
                                                        <div class='form-group row'>
                                                            <label for='user_name'
                                                                class='col-12 col-md-12 col-lg-12 col-form-label text-md-left'>
                                                                Username / E-mail
                                                            </label>
                                                            <div class='col-12 col-md-12 col-lg-12'>
                                                                <input type='text' id='user_name' class='form-control'
                                                                name='user' required autofocus>
                                                            </div>
                                                        </div>
                                                        <div class='form-group row'>
                                                            <label for='user_name'
                                                                class='col-12 col-md-12 col-lg-12 col-form-label text-md-left'>
                                                                Password
                                                            </label>
                                                        <div class='col-12 col-md-12 col-lg-12'>
                                                            <input type='password' id='password' class='form-control'
                                                                name='pass' required autofocus>
                                                        </div>
                                                    </div>
                                                    <div class='form-group row mt-4'>
                                                        <div class='col-12 col-md-12 col-lg-12'>
                                                            <button class='btn btn-primary text-center text-uppercase form-control' name='login'>
                                                                <i class='fa fa-sign-in pr-2' aria-hidden='true'></i>login
                                                            </button>
                                                        </div>  
                                                    </div>
                                                </form>
                                            </div>
                                            <div class='card-body'>
                                                <a href='login.php' class='btn btn-success text-center text-uppercase form-control'>
                                                    <i class='fa fa-shopping-cart pr-2' aria-hidden='true'></i>My cart
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>";
                            }else{
                                $gretting = "";
                                $filter_user = "";
                                $name = $_SESSION['user_login'];
                                $status = $_SESSION['status'];
                                $user = $_SESSION['user'];
                                $user_id =$_SESSION['user_id'];
                                    
                                if($_SESSION['gender'] == 'male'){
                                    $gretting = "<label for='greting'
                                                    class='col-12 col-md-12 col-lg-12 col-form-label text-center'>
                                                    Mr.$name
                                                </label>";
                                }else{
                                    $gretting = "<label for='greting'
                                                    class='col-12 col-md-12 col-lg-12 col-form-label text-center'>
                                                    Ms.$name
                                                </label>";
                                }
                                if($_SESSION['status'] == 'Admin'){
                                    $filter_user = "<label for='user_name'
                                                        class='col-12 col-md-12 col-lg-12 col-form-label text-center font-weight-bold text-uppercase'>
                                                        Welcome back $status 
                                                    </label>";
                                }else{
                                    $filter_user = "<label for='user_name'
                                                        class='col-12 col-md-12 col-lg-12 col-form-label text-center font-weight-bold text-uppercase'>
                                                        Welcome back
                                                    </label>";
                                }

                                echo"<div class='login-form'>
                                    <div class='row justify-content-center'>
                                        <div class='col-12 col-md-12 col-lg-12'>
                                            <div class='card'>
                                                <div class='card-header border-left border-right border-top border-dark'>
                                                    <h3 class='text-uppercase text-center font-weight-bold'>Welcome back</h3>
                                                </div>
                                                <div class='card-body bg-light border-bottom border-left border-right border-top border-dark'>
                                                    <form action='querys/login_process.php' method='POST'>
                                                        <div class='form-group row'>
                                                            $filter_user
                                                        </div>
                                                        <div class='form-group row'>
                                                            $gretting
                                                        </div>
                                                    <div class='form-group row mt-4'>
                                                        <div class='col-12 col-md-12 col-lg-12'>
                                                            <a href='accountdetail.php?user=$user' class='btn btn-primary text-center text-uppercase form-control'>
                                                                <i class='fa fa-user pr-2' aria-hidden='true'></i>profile
                                                            </a>
                                                        </div> 
                                                        <div class='col-12 col-md-12 col-lg-12 mt-2'>
                                                            <a href='../querys/logoff_process.php' class='btn btn-danger text-center text-uppercase form-control'>
                                                                <i class='fa fa-sign-out pr-2' aria-hidden='true'></i>log off
                                                            </a>
                                                        </div>  
                                                    </div>
                                                </form>
                                            </div>
                                            <div class='card-body'>
                                                <a href='cartinfo.php?id=$user_id' class='btn btn-success text-center text-uppercase form-control'>
                                                    <i class='fa fa-shopping-cart pr-2' aria-hidden='true'></i>My cart
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>";
                            }
                        ?>
                </div>
            </div>
            <div class="col-12 col-md-8 col-lg-9">
                <?php
                require('../assets/config/config.php');
                /*Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                } else {
                    echo "<center>" . "Server is ready to go" . "</center>" . "<br>";
                }*/
                mysqli_set_charset($conn, "utf8");
                $id = $_REQUEST['id'];
                $sql = "SELECT * FROM `product` WHERE id = $id";
                $result = mysqli_query($conn, $sql);
                $img_path = "../assets/uploads/";

                if (mysqli_num_rows($result) > 0) {
                    //echo "<b>Item Detail</b><hr>";
                    $fetcharr       = mysqli_fetch_array($result);
                    $id             = $fetcharr['id'];
                    $header         = $fetcharr['header'];
                    $sub_header     = $fetcharr['sub_header'];
                    $header_text    = $fetcharr['header_text'];
                    $title          = $fetcharr['title'];
                    $description    = $fetcharr['description'];
                    $img            = $fetcharr['img'];
                    $nomal_price    = $fetcharr['nomal_price'];
                    $new_price      = $fetcharr['new_price'];
                    $thumnail       = $fetcharr['thumnail'];

                    //echo "id no: $id <br> Name: $name <br> Email: $email <br> Address: $address <br><br>";
                    
                    $check_price = "";

                    if($new_price == null){
                        $check_price = "<div class='card-body border-top'>
                                            <div class='mt-3 mb-3'>
                                                <span class='col-md-4 h5'>Price : ".number_format($nomal_price)."</span>
                                            </div>
                                        </div>";
                        
                    }else{
                        $check_price = "<div class='card-body border-top'>
                                            <div class='mt-4'>
                                                <span class='col-md-4'><del class='price-old h5'>Price : ".   number_format($nomal_price)."</del></span>
                                            </div>
                                            <div class='mt-4'>
                                                <span class='col-md-4 h5' style='color: #fc0303;'>Price : ".number_format($new_price)."</span>
                                            </div>
                                        </div>";
                    }

                    echo "<div class='row'>
                            <div class='col-12 col-md-8 col-lg-8'>
                                <div class='card'>
                                    <div class='card-body text-center'>
                                        <img src='$img_path$img' alt='$header' class='img-thumnail img-fluid'/>
                                    </div>
                                </div>
                            </div>
                            <div class='col-12 col-md-4 col-lg-4'>
                            <form action='../querys/addtocart.php?id=$id' method='POST'>   
                                <div class='card'>
                                    <header class='card-header'>
                                        <h4 class='card-title mt-2 text-uppercase text-center'>$header</h4>
                                    </header>
                                    $check_price
                                    <div class='card-body border-top'>
                                        <div class='input-group'>
                                            <span class='input-group-btn'>
                                                <button type='button' class='quantity-left-minus btn-lg btn btn-danger btn-number'  data-type='minus' data-field=''>
                                                    <i class='fa fa-minus' aria-hidden='true'></i>
                                                </button>
                                            </span>
                                            <input type='text' id='quantity' name='quantity' 
                                               class='form-control input-number text-center font-weight-bold' 
                                               value='1' min='1' max='100'>
                                            <span class='input-group-btn'>
                                                <button type='button' class='quantity-right-plus btn-lg btn btn-success btn-number' data-type='plus' data-field=''>
                                                    <i class='fa fa-plus' aria-hidden='true'></i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                    <div class='card-body border-top text-right'>
                                        <a class='btn btn-primary'>Buy now</a>
                                        <button type='submit' name='addtocart' class='btn btn-success ml-2'>
                                            <i class='fa fa-shopping-cart pr-2' aria-hidden='true'></i>Add to card
                                        </button>
                                    </div>
                                </div>
                                </form> 
                            </div>
                         </div>
                         <div class='row mt-5'>
                            <div class='container-fluid'>
                                <ul class='nav nav-tabs'>
                                    <li class='nav-item'>
                                        <a
                                            href='#aboutPlace'
                                            class='nav-link active'
                                            role='tab'
                                            data-toggle='tab'>
                                            About</a>
                                    </li>
                                </ul>
                                <div class='tab-content mb-5'>
                                    <div id='aboutPlace' class='tab-pane in active mt-5' role='tabpanel1'>
                                        <h3 class='mt-2 mb-3 text-center'>$title</h3>
                                        <div class='text-center'> 
                                            <p>$header_text</p>    
                                            <img src='$img_path$img' alt='$header' class='img-thumnail img-fluid'/>
                                        </div>   
                                        <div class='row mt-5'>
                                            <div class='col-12 col-md-5 col-lg-5 mt-4'>
                                                <div ><h4 class='text-center font-weight-bold'>การออกแบบและบรรจุภัณฑ์</h4></div>
                                                <div class='mt-4 ml-3'><p class='text-left'>$description</p></div>
                                            </div>
                                            <div class='col-12 col-md-7 col-lg-7 text-center'>
                                                <img src='$img_path$thumnail' alt='$header' class='img-thumnail img-fluid'/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         </div>";
                } else {
                    echo "<center>" . "No data inside</center>";
                }
                mysqli_close($conn);
                ?>
            </div>
        </div>
    </div>
    <script src="https://use.fontawesome.com/4283dcca0d.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <footer id="sticky-footer" class="py-4 bg-dark text-white-50">
        <div class="container text-center">
            <small>Copyright &copy; Mungmee Headphone</small>
            <small class="ml-2"><?php echo date("d-m-Y H:i:s"); ?></small>
        </div>
    </footer>
    <script>
    $(document).ready(function() {
        var quantitiy = 0;
        $('.quantity-right-plus').click(function(e) {

            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());

            // If is not undefined

            $('#quantity').val(quantity + 1);


            // Increment

        });

        $('.quantity-left-minus').click(function(e) {
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());

            // If is not undefined

            // Increment
            if (quantity > 0) {
                $('#quantity').val(quantity - 1);
            }
        });

    });
    </script>
</body>

</html>