<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
   
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-sclae=1.0">


  </head>
  <body>
      <div class="about-section">
        <div class="inner-width">
          <H1 class="KHOKHO">About Us</H1>
          <div class="border"></div>
          <div class="about-section-row">
            <div class="about-section-col">
              <div class="about">
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga provident ea hic, neque amet sequi temporibus iure aliquid placeat inventore. Quae dolores dolore, cum nulla quas ipsum facere maxime, necessitatibus!
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga provident ea hic, neque amet sequi temporibus iure aliquid placeat inventore. Quae dolores dolore, cum nulla quas ipsum facere maxime, necessitatibus!
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga provident ea hic, neque amet sequi temporibus iure aliquid placeat inventore. Quae dolores dolore, cum nulla quas ipsum facere maxime, necessitatibus!
                </p>
                <a href="#">Read More</a>
              </div>
            </div>
            <div class="about-section-col">
             <img  class = "skill" src="picture/v.jpg" >

              </div>
            </div>
          </div>
        </div>
      </div>
      <style>
        body{
  margin: 0;
   padding: 0;
   font-family: "open sans",sans-serif;
 background: #F4F4F4;
  background-size: cover;
  height: 100%;

}
.about-section{
  width: 70%;
background:#fff;
  padding: 40px 0;
  margin-left: auto;
  margin-right:auto;
  margin-top: 170px;
box-shadow: rgba(0, 0, 0, 0.15) 0px 5px 15px 0px;
border-radius: 30px;
border-left: 50px solid #3CEDA7;
border-right: 50px solid #3CEDA7;


}
.inner-width{
  max-width: 1000px;
  overflow: hidden;
  padding: 0 20px;
  margin: auto;
}
.about-section .KHOKHO{
  text-align: center;
}
.border{
  width: 100px;
  height: 3px;
  background: #3CEDA7;
  margin: 40px auto;
}
.about-section-row{
  display: flex;
  flex-wrap: wrap;
}
.about-section-col{
  flex: 50%;
}
.about{
  padding-right: 30px;
}
.about p{
  text-align: justify;
  margin-bottom: 20px;
  color: #7E7C7A;
  font-size: 17px;
}
.about a{
  display: inline-block;
  color: #7E7C7A;
  text-decoration: none;
  border: 2px solid #3CEDA7;
  border-radius: 24px;
  padding: 8px 40px;
  transition: 0.4s linear;
}
.about a:hover{
  color: #fff;
  background: #3CEDA7;
}
.skills{
  padding-left: 30px;
}
.skill{
  margin-bottom: 10px;
  width: 350px;
  height: 350px;
  border-radius: 20px;
}
.title{
  color: #7E7C7A
}
.progress{
  width: 100%;
  height: 12px;
  background: #ddd;
  border-radius: 12px;
}
.progress-bar{
  height: 12px;
  background: #3CEDA7;
  border-radius: 12px;
}
.p1{
  width: 90%;
}
.p2{
  width: 70%;
}
.p3{
  width: 50%;
}
.progress-bar span{
  float: right;
  margin-right: 6px;
  line-height: 13px;
  color: #fff;
  font-size: 12px;
}
@media screen and (max-width:700px) {
  .about-section-col{
    flex: 100%;
    margin: 10px 0;
  }
  .about,.skills{
    padding: 0;
  }
  .about{
    text-align: center;
  }
}
      </style>
      <?PHP include 'footer.php';?>
  </body>
</html>