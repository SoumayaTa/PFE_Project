                                    <?php
                                    ob_start();
                                        session_start();
                                        if(isset($_SESSION['username'])){
                                        include 'functions.php';
                                            include 'connect.php';
                                            include 'h.php';
                                            $sessionUser = '';
                                            if(isset($_SESSION['username'])){
                                                $sessionUser = $_SESSION['username'];
                                            }
                                    $getUser = $con ->prepare("SELECT * FROM users WHERE username = ? ");
                                    $getUser ->execute(array($sessionUser));
                                    $info = $getUser->fetch();
                                        
                                    ?>
                                    <html>
                                        <head>
                                            <title>Profile</title>
                                            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
                                            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">
                                            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
                                            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css">
                                        </head>
                                    <body>
                                        <br><br><br>
                                    <div class="page-content page-container" id="page-content">
                                        <div class="padding">
                                            <div class="row">
                                    <div class="col-xl-6 col-md-12">
                                    <div class="card user-card-full">
                                        <div class="row m-l-0 m-r-0">
                                            <div class="col-sm-4 bg-c-lite-green user-profile">
                                            <div class="card-block text-center text-white">
                                                <div class="m-b-25">
                                                <img src="jennate/user.jpg" class="img-radius" alt="User-Profile-Image">
                                                </div>
                                                <h6 class="f-w-600"><?php echo $info['username']?></h6>
                                                    <p>User</p>
                                                    <?php echo '<a href="members1.php?do=Edit&userid=' . $info['UserID'].'">'?><i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i></a>
                                            </div>
                                        </div>
                                    <div class="col-sm-8">
                                        <div class="card-block">
                                                                <h5 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h5>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <p class="m-b-10 f-w-600">Email</p>
                                                                        <h6 class="text-muted f-w-400"><?php echo $info['email']?></h6>
                                                                    </div></div><h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600"></h6><div class="row">
                                                                    
                                                                    <div class="col-sm-6">
                                                                        <p class="m-b-10 f-w-600">Full Name</p>
                                                                        <h6 class="text-muted f-w-400"><?php echo $info['FullName']?></h6>
                                                                    </div></div>
                                                                
                                                                <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600"></h6>
                                                                <div class="row">
                                                            
                                                                    <div class="col-sm-6">
                                                                        <p class="m-b-10 f-w-600">Registered date</p>
                                                                        <h6 class="text-muted f-w-400"><?php echo $info['Date']?></h6>
                                                                    </div></div>
                                                                
                                                            
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             </div>
                                                </div><div class="but">
                                                <?php echo '<a href="order.php?do=Manage&username=' . $info['username'].'">';?><button class="btn">My orders</button></a>
                                              <?php  echo '<a href="wish.php?do=Manage&username=' . $info['username'].'">';?> <button class="btn" style="background-color:#ff878d;">My favorites</button></div>
                                            </div><?php }include 'footer.php';?>
                                            <style>
                                            body{
                                                background-color: #f9f9fa;
                                                font-family: cursive;
                                            }
                                            .padding {
                                                padding: 3rem !important;
                                            }.but{
                                                padding-bottom: 20px;
                                                padding-left: 180px;
                                            }.but .btn {
                                            
                                            text-align: center;
                                        }

                                        .but .btn {
                                            width: 200px;
                                            font-size: 16px;
                                            font-weight: 600;
                                            color: #fff;
                                            cursor: pointer;
                                            margin: 20px;
                                            height: 55px;
                                            text-align:center;
                                            border: none;
                                            background-size: 300% 100%;

                                            border-radius: 50px;
                                            moz-transition: all .4s ease-in-out;
                                            -o-transition: all .4s ease-in-out;
                                            -webkit-transition: all .4s ease-in-out;
                                            transition: all .4s ease-in-out;
                                        }

                                        .but .btn:hover {
                                            background-position: 100% 0;
                                            moz-transition: all .4s ease-in-out;
                                            -o-transition: all .4s ease-in-out;
                                            -webkit-transition: all .4s ease-in-out;
                                            transition: all .4s ease-in-out;
                                        }

                                        .but .btn:focus {
                                            outline: none;
                                        }

                                        .but .btn{
                                            background-image: linear-gradient(to right,#6495ed ,#87cefa );
                                           
                                        }
                                        /*.but .button {
                                            background-image: linear-gradient(to right, #f5ce62, #e43603, #fa7199, #e85a19);
                                            box-shadow: 0 4px 15px 0 rgba(229, 66, 10, 0.75);
                                        }*/

                                            .user-card-full {
                                                overflow: hidden;
                                            }.page-content{
                                                width: 1600PX;
                                                margin-left: 300px ;
                                            }

                                            .card {
                                                border-radius: 5px;
                                                -webkit-box-shadow: 0 1px 20px 0 rgba(69,90,100,0.08);
                                                box-shadow: 0 1px 20px 0 rgba(69,90,100,0.08);
                                                border: none;
                                                margin-bottom: 30px;
                                            }

                                            .m-r-0 {
                                                margin-right: 0px;
                                            }

                                            .m-l-0 {
                                                margin-left: 0px;
                                            }

                                            .user-card-full .user-profile {
                                                border-radius: 5px 0 0 5px;
                                            }

                                            .bg-c-lite-green {
                                                    background: -webkit-gradient(linear, left top, right top, from(#87cefa), to(#6495ed));
                                                background: linear-gradient(to right, #6495ed, #87cefa);
                                            }p{
                                                font-size: 20px;
                                            }

                                            .user-profile {
                                                padding: 30px 0;
                                            }

                                            .card-block {
                                                padding: 1.25rem;
                                                
                                            }

                                            .m-b-25 {
                                                margin-bottom: 25px;
                                            }.m-b-25 img{
                                                width: 70px;
                                                height: 70px;
                                                border-radius: 60%;
                                            }.card-block i{
                                                color: #f9f9fa;
                                                font-size: 25px;
                                            }

                                            .img-radius {
                                                border-radius: 5px;
                                            }
                                            h5 {
                                                font-size: 20px;
                                            }

                                            .card .card-block p {
                                                line-height: 25px;
                                            }

                                            @media only screen and (min-width: 1400px){
                                            p {
                                                font-size: 14px;
                                            }
                                            }

                                            .card-block {
                                                padding: 1.25rem;
                                            }

                                            .b-b-default {
                                                border-bottom: 1px solid #e0e0e0;
                                            }

                                            .m-b-20 {
                                                margin-bottom: 20px;
                                            }

                                            .p-b-5 {
                                                padding-bottom: 5px !important;
                                            }

                                            .card .card-block p {
                                                line-height: 25px;
                                            }

                                            .m-b-10 {
                                                margin-bottom: 10px;
                                            }

                                            .text-muted {
                                                color: #919aa3 !important;
                                            }

                                            .b-b-default {
                                                border-bottom: 1px solid #e0e0e0;
                                            }

                                            .f-w-600 {
                                                font-weight: 600;
                                            }

                                            .m-b-20 {
                                                margin-bottom: 20px;
                                            }

                                            .m-t-40 {
                                                margin-top: 20px;
                                            }

                                            .p-b-5 {
                                                padding-bottom: 5px !important;
                                            }

                                            .m-b-10 {
                                                margin-bottom: 10px;
                                            }

                                            .m-t-40 {
                                                margin-top: 20px;
                                            }

                                            .user-card-full .social-link li {
                                                display: inline-block;
                                            }

                                            .user-card-full .social-link li a {
                                                font-size: 20px;
                                                margin: 0 10px 0 0;
                                                -webkit-transition: all 0.3s ease-in-out;
                                                transition: all 0.3s ease-in-out;
                                            }
                                            </style>
                                            </body>
                                            </html>