
    <div class="co">
  
      <div class="main-content">
       
        <div class="text-area">
          <span class="quote">"Life is what happens when you're busy making other plans"</span>
        </div>
        
        <div class="writer">– John Lennon</div>
  
        <div class="button-area">  
          <div class="btn">
            <button id="Qbtn">Next</button>
          </div>
        </div>
        
      </div>
  
    </div>
    
    <style>
.co{
	width: 550px;

}
.main-content {
    width: 550px;
    background: var(--secondary);
    box-shadow: 0 0 30px #2121216b;
    padding: 1.5em 1.5em;
    color: white;
    position: relative;
    display: flex;
    align-items: center;
    flex-direction: column;
    border-radius:30px;
}

.text-area {
	text-align: center;
	font-size: 25px;
	color: #262626;
	line-height: 1.5;
    color:#fff;
    
}
.text-area .icon {
    margin-right: 5px;
}
.main-content .writer {
    margin-top: 1em;
    background: linear-gradient(to right, #eecda3, #ef629f);
    background-clip: text;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
	
}
.main-content .button-area {
	display: grid;
	place-items: center;
	margin-top: 20px;
	padding: 10px 0;
}
.button-area .btn button {
    width: 150px;
    height: 40px;
    position: absolute;
    bottom: -10%;
    background: linear-gradient(to right, #eecda3, #ef629f);
    color: white;
    border: none;
    cursor: pointer;
    font-size: 1.3em;
    box-shadow: -10px 20px 50px #eecda3, 10px 20px 50px #ef629f;
}.button-area button:active {
    background-color: deepskyblue;
} </style>
    <script>
    const quotes = [{
    quote: `"You only live once, but if you do it right, once is enough."`,
    writer: `– Mae West`
}, {
    quote: `"If you want to live a happy life, tie it to a goal, not to people or things."`,
    writer: `– Albert Einstein`
}, {
    quote: `"Never let the fear of striking out keep you from playing the game."`,
    writer: `– Babe Ruth`
}, {
    quote: `"Your time is limited, so don’t waste it living someone else’s life."`,
    writer: `– Steve Jobs`
}, {
    quote: `"In order to write about life first you must live it."`,
    writer: `– Ernest Hemingway`
}, {
    quote: `"Life is not a problem to be solved, but a reality to be experienced."`,
    writer: `– Soren Kierkegaard`
}, {
    quote: `"The unexamined life is not worth living."`,
    writer: `– Socrates`
}, {
    quote: `"Turn your wounds into wisdom."`,
    writer: `– Oprah Winfrey`
}, {
    quote: `"The purpose of our lives is to be happy."`,
    writer: `- Dalai Lama`
}, {
    quote: `"Live for each second without hesitation."`,
    writer: `- Elton John`
}, ]





let btn = document.querySelector("#Qbtn");

let quote = document.querySelector(".quote");

let writer = document.querySelector(".writer");






btn.addEventListener("click", function() {
    let random = Math.floor(Math.random() * quotes.length);
    
    
    quote.innerHTML = quotes[random].quote;

    
    writer.innerHTML = quotes[random].writer;
})

    </script>

