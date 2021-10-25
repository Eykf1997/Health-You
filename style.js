// yk nav bar
const app = Vue.createApp({
})
app.component('navbar', {

    // fill in and connect ahref link to about, contact us and login 

    template: `<div>
                    <div id="headerOne">
                        <div id="divLogo">
                            <h2 id="headlineLogo">EATGREENS</h2>
                            <p id="paragLogo">Your personal nutrition tracker</p>
                        </div>
                    
                        <nav id="navUl">
                            <ul id="ulNav">
                                <li class="liNav"><a class="aNav" href="">ABOUT</a></li>        
                                <li class="liNav"><a class="aNav" href="">CONTACT</a></li>
                                <li class="liNav"><a class="aNav" href="">LOG IN</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>`
} )
app.mount('#nav')

app.component('home-navbar', {

    // home trail walking nav bar
    template: `<div>
                    <nav class="navbar navbar-expand-lg navbar-light m-1" id="navbar">
                        <div class="container-fluid">
                            <header id="headerOne">	
                                <div id="divLogo">
                                    <h2 id="headlineLogo" >EATGREENS</h2>           
                                </div>
                            </header>
                        <button class="navbar-toggler  " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="./home.html">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./places.html">Walking-trail</a>
                            </li>
                            </ul>
                        </div>
                        </div>
                    </nav> 
                </div>`
} )
app.mount('#homenav')

// other pages Vendor navigation bar 
app.component('navhead', {
        
    template: `
        <header id="header" class="d-flex align-items-center">
          <div class="container d-flex align-items-center">
        
            <h1 class="logo me-auto"><a href="index.html">HealthYou</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        
            <nav id="navbar" class="navbar">
              <ul>
                <li><a class="nav-link scrollto active" href="index.html#hero">Home</a></li>
                <li><a class="nav-link scrollto" href="#index.htmlservices">Calories Tracker</a></li>
                <li><a class="nav-link scrollto " href="index.html#portfolio">Portfolio</a></li>
                <li><a class="nav-link scrollto" href="index.html#team">Team</a></li>
                <li><a class="nav-link scrollto" href="index.html#contact">Contact</a></li>
                <li><a class="getstarted scrollto" href="index.html#about">Get Started</a></li>
              </ul>
              <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
          </div>
        </header>
            `
} )
app.mount('#navHead')

// index to html calorie tracker section
app.component('trackers-content', {

    props: ['iclass', 'dvalue', 'delayvalue', 'title', 'context', 'iconcolour','link' ],

    template: `
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" :data-aos-delay="delayvalue">
                    <div :class='iconcolour'>
                    <div class="icon">
                        <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                        <path stroke="none" stroke-width="0" fill="#f5f5f5" :d=dvalue></path>
                        </svg>
                        <i :class='iclass'></i>
                    </div>
                    <h4><a :href=link>{{title}}</a></h4>
                    <p>{{context}}</p>
                    </div>
                </div>
            `
} )
app.mount('#content')