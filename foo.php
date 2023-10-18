<!DOCTYPE html>
<html lang="en">
<head>
  	<title>How To Create Simple Website Footer Design HTML</title>
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">
  	<!-- Bootstrap CSS -->
  	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  	<!-- Bootstrap JS -->
  	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>

    <!-- Footer -->
    <footer>
        <div class="container5">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="social-links3">
                        <a class="s-b" href="#">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="s-b" href="#">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a class="s-b" href="#">
                            <i class="fab fa-youtube"></i>
                        </a>
                        <a class="s-b" href="#">
                            <i class="fab fa-google"></i>
                        </a>
                        <a class="s-b" href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </div>

                    <p class="text-center">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry <a href="#">Terms of Service</a> and <a href="#"> Privacy Policy</a> Copyright © 2019 - 2020. <a href="https://www.markuptag.com/">markuptag.com</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->
<style>
    footer {
    border-top: 1px solid #ddd;
    border-bottom: 1px solid #ddd;
    padding: 10px 0px;
    margin-top: 50px;
    background-color: #fafafa;
}
footer .social-links3 {
    text-align: center;
    margin: 20px 0px;
}
footer .s-b {
    display: inline-block;
    width: 50px;
    height: 50px;
    background: #2f4f4f;
    margin: 10px;
    border-top-left-radius: 20px;
    border-bottom-right-radius: 20px;
    box-shadow: 0px 5px 10px 0px #909090;
    color: #ffffff;
    overflow: hidden;
    position: relative;
    border: 1px dotted #fff;
}
footer .s-b i {
    line-height: 50px;
    font-size: 22px;
    transition: 0.2s linear;
}
footer .s-b:hover i {
    transform: scale(1.3);
    color: #ff5722;
}
footer .s-b::before {
    content: "";
    position: absolute;
    width: 120%;
    height: 120%;
    background: #ffffff;
    transform: rotate(45deg);
    left: -110%;
    top: 90%;
}
footer .s-b:hover::before {
    animation: effect 0.6s 1;
    top: -10%;
    left: -10%;
}
footer p a {
    color: #ff5722;
}

/*-- Hover Animation Effect --*/
@keyframes effect {
    0% {
        left: -120%;
        top: 100%;
    }
    50% {
        left: 10%;
        top: -30%;
    }
    100% {
        top: -10%;
        left: -10%;
    }
}


/*-- Footer Responsive CSS --*/
@media (max-width: 576px){
footer .s-b {
    width: 40px;
    height: 40px;
    margin: 5px;
}
footer .s-b i {
    line-height: 40px;
    font-size: 18px;
}
}
</style>
</body>
</html>