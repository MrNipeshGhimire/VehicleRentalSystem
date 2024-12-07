
<!------------------------------Slider---------------------------------------->
<div class="slider">
                <!--------------------------------------------------------->
                <div class="myslider fade" style="display: block;">
                    <div class="txt">
                        <h1>Welcome to our</h1> <h1>Online Vehicle Renting System</h1>
                        <p>Make your tour easy</p>
                    </div>
                    <img src="admin/images/honda2.webp" alt="" style="width:100%; height:100%; filter:brightness(0.6)">
                </div>
            <!---------------------------------------------------------->
            <!--------------------------------------------------------->
            <div class="myslider fade">
                <div class="txt">
                        <h1>Best Service, best value</h1>
                        <p>When you're ready,<br>we're ready</p>
                </div>
                <img src="cssFile/image/img.jpg" alt="" style="width:100%; height:100%; filter:brightness(0.6)">
            </div>
        <!---------------------------------------------------------->
        <!--------------------------------------------------------->
        <div class="myslider fade">
            <div class="txt">
                <h1>Rental Service</h1>
                <p>Your Journey, Our Wheels</p>
            </div>
            <img src="cssFile/image/car1.jpg" alt="" style="width:100%; height:100%; filter:brightness(0.6)">
        </div>
        <!---------------------------------------------------------->
        <!--------------------------------------------------------->
        <div class="myslider fade">
            <div class="txt">
                <h1>Drive your Dreams, Rent Today</h1>
                <p>The Perfect Ride for your Next Journey</p>
            </div>
            <img src="cssFile/image/peakpx.jpg" alt="" style="width:100%; height:100%; filter:brightness(0.6)">
        </div>
        <!---------------------------------------------------------->
        <!--------------------------------------------------------->
        <div class="myslider fade">
            <div class="txt">
                <h1>Vehicle Rental</h1>
                <p>Find the Best Vehicle For you</p>
            </div>
            <img src="admin/images/maruti-suzuki3.avif" alt="" style="width:100%; height:100%; filter:brightness(0.6)">
        </div>
        <!---------------------------------------------------------->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
        <div class="dotsbox" style="text-align: center;">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
            <span class="dot" onclick="currentSlide(4)"></span>
            <span class="dot" onclick="currentSlide(5)"></span>
        </div>
    </div>
    
    <!----------------JavaScript----------------------->
    <script>
        const myslide = document.querySelectorAll('.myslider'),
        dot= document.querySelectorAll('.dot');

        let counter =1;
        slidefun(counter);
        let timer = setInterval(autoslide, 8000);
        function autoslide(){
            counter+=1;
            slidefun(counter);
        }
        function plusSlides(n){
            counter+=n;
            slidefun(counter);
            resetTimer();
        }
        function currentSlide(n){
            counter = n;
            slidefun(counter);
            resetTimer();
        }
        function resetTimer(){
            clearInterval(timer);
            timer= setInterval(autoslide,8000);
        }
        function slidefun(n){
            let i;
            for(i=0; i<myslide.length; i++)
            {
                myslide[i].style.display = "none";
            }
            for(i=0; i<dot.length; i++){
                dot[i].classList.remove('active');
            }
            if(n> myslide.length){
                counter =1 ;
            }
            if(n < 1){
               counter = myslide.length;
            }
            myslide[counter -1 ].style.display = "block";
            dot[counter -1 ].classList.add('active');
        }
    </script>
    <!---------------------------------------------------------------------------->