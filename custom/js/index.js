      
$(document).ready(function(){

  // Slider item Data
  $.get("./php_action/fetchSliderItems.php",
    function (data) {
      var _data = JSON.parse(data);

      _data.data.forEach(element => {

        var car_item = parseInt(element[0]);
        
        $(".carousel-indicators").append(`
        <li data-target="#myCarousel" data-slide-to=`+car_item+`></li>
        `);

        if(element[4] == "") {
          $('.carousel-inner').append(`
            <div class="carousel-item" data-interval="5000">
              <!-- Carousel content -->
              <div class="carousel-text-item">
                <strong><h1 class="display-header">`
                +element[2]+
                `</h1></strong><br>
                <p>`
                 +element[3]+
                `</p>
              </div>`
              + element[1] +
              `
            </div>
        `);
        } else{
          $('.carousel-inner').append(`
            <div class="carousel-item" data-interval="5000">
              <!-- Carousel content -->
              <div class="carousel-text-item">
                <strong><h1 class="display-header">`
                +element[2]+
                `</h1></strong><br>
                <p>`
                 +element[3]+
                `</p>
                <p><a class="btn btn-lg btn-daruso" href="`+element[4]+`" role="button">Learn More »</a></p>
              </div>`
              + element[1] +
              `
            </div>
        `);
        }
        
      });   
    }
  );

  // About item Data
  $.get("./php_action/fetchAboutItems.php",
    function (data) {
      var _data = JSON.parse(data);
      _data.data.forEach(element => {
        if(element[0]%2 === 0) {
          $('.about').append(`
          <div class="row">
            <div class="col-md-6">
            `+element[1]+`
            </div>
            <div class="col-md-6 pt-4 about-paragraph">
              <h3 class="about-heading px-4 pt-4">`
              +element[2]
              +`</h3><br>
              <p class="px-4">`
              +element[3]+
              `</p>
            </div>
            
          </div>
        `);
        }
        else{
          $('.about').append(`
          <div class="row">
            <div class="col-md-6 pt-4 about-paragraph">
              <b><h3 class="about-heading px-4 pt-4 font-weight-bolde">`
              +element[2]
              +`</h3></b><br>
              <p class="px-4 text-justify">`
              +element[3]+
              `</p>
            </div>
            <div class="col-md-6">
            `+element[1]+`
            </div>
          </div>
        `);
        }
        
      });   
    }
  );

  // Gallery item Data
  $.get("./php_action/fetchGallery.php",
    function (data) {
      var _data = JSON.parse(data);
      _data.data.forEach(element => {
        var image = element[1];
        var img = element[6];
        var date = element[2];
        var caption = element[3];
        var govt = element[4];

        if(govt == "cabinet"){
          $(".gallery-container .row .cabinet-gallery").html(
            `<div class="mb-4">
              `+image+`<div class="card-body">
            <center><p class="card-text p-2"><b>Cabinet</b></p></center>
            <div class="d-flex justify-content-center align-items-center">
              <div class="btn-group">
                <a href="`+img+`" class="btn btn-daruso-outline fresco" data-fresco-caption="`+date+` : `+ caption +`" data-fresco-group="cabinet" data-fresco-group-options="ui: 'outside'">View More</a>
            </div>
          </div>
            </div>`
          );
          
        }
        if(govt == "judicial"){
          $(".gallery-container .row .judicial-gallery").html(
            `<div class="mb-4">
              `+image+`<div class="card-body">
            <center><p class="card-text p-2"><b>Judicial</b></p></center>
            <div class="d-flex justify-content-center align-items-center">
              <div class="btn-group">
                <a href="`+img+`" class="btn btn-daruso-outline fresco" data-fresco-caption="`+date+` : `+ caption +`" data-fresco-group="judicial" data-fresco-group-options="ui: 'outside'">View More</a>
            </div>
          </div>
            </div>`
          );
        }
        if(govt == "uscr"){
          $(".gallery-container .row .uscr-gallery").html(
            `<div class="mb-4">
              `+image+`<div class="card-body">
            <center><p class="card-text p-2"><b>USCR</b></p></center>
            <div class="d-flex justify-content-center align-items-center">
              <div class="btn-group">
                <a href="`+img+`" class="btn btn-daruso-outline fresco" data-fresco-caption="`+date+` : `+ caption +`" data-fresco-group="uscr" data-fresco-group-options="ui: 'outside'">View More</a>
            </div>
          </div>
            </div>`
          );
        }
        
      }); 
      
      _data.data.forEach(element => {
        var img = element[6];
        var date = element[2];
        var caption = element[3];
        var govt = element[4];

        if(govt == "cabinet"){
          $(".gallery-container .row .cabinet-gallery .btn-group").append(
          `<a href="`+img+`" class="fresco" data-fresco-caption="`+date+` : `+ caption +`" data-fresco-group="cabinet"></a>`
          );
        }

        if(govt == "judicial"){
          $(".gallery-container .row .judicial-gallery .btn-group").append(
          `<a href="`+img+`" class="fresco" data-fresco-caption="`+date+` : `+ caption +`" data-fresco-group="judicial"></a>`
          );
        }

        if(govt == "uscr"){
          $(".gallery-container .row .uscr-gallery .btn-group").append(
          `<a href="`+img+`" class="fresco" data-fresco-caption="`+date+` : `+ caption +`" data-fresco-group="uscr"></a>`
          );
        }
      });
    }
  );

  // Leaders Data
  $.get("./php_action/fetchLeaders.php",
    function (data) {
      var _data = JSON.parse(data);
      _data.data.forEach(element => {
          var div = element[6];
          var govt = element[7];
          var img = element[1];
          var first = element[2];
          var second = element[3];
          var pos = element[4];
          var year = element[5];

        if(div != "" && govt == "cabinet" && div <= 3){
          $(".leaders-cabinet").append(
            `<div class='div`+div+ ` leader-container'> 
                `+img+`
                <div class='middle'>
                  <div class='text'>
                  ` + "<span style='font-size: 2em'><b>" + pos + "</b></span><br><br>" +"<b>Hon. </b>"+ first + " <b>" +second+ "</b><br><br><span style='font-size: 1.2em'>" +year+ "</span>"+`
                  </div>
                </div>
              </div>`);
        }

        if(div != "" && govt == "judicial"){
          $(".leaders-judicial").append(
            `<div class='div`+div+ ` leader-container'> 
                `+img+`
                <div class='middle'>
                  <div class='text'>
                  ` + "<span style='font-size: 2em'><b>" + pos + "</b></span>" +"<b>Hon. </b>"+ first + " <b>" +second+ "</b><br><br><span style='font-size: 2em'>" +year+ "</span>" +`
                  </div>
                </div>
              </div>`);
        }
        if(div != "" && govt == "uscr"){
          $(".leaders-uscr").append(
            `<div class='div`+div+ ` leader-container'> 
                `+img+`
                <div class='middle'>
                  <div class='text'>
                  ` + "<span style='font-size: 2em'><b>" + pos + "</b></span>" +"<b>Hon. </b>"+ first + " <b>" +second+ "</b><br><br><span style='font-size: 2em'>" +year+ "</span>" +`
                  </div>
                </div>
              </div>`);
        }
      });  
      
      // Appending the abbreviation Full forms
      $(".leaders-cabinet").after(`
        <div class="p-3 m-3"><button class="btn btn-daruso-outline round" onclick="toggleMinistry()"> See Ministries <br> </button></div>
        <div class="row leaders-links">
          <div id="constitution" class="col-"><a href="https://udsm.ac.tz/web/index.php/offices/daruso/ministry-of-constitution-and-good-governance-(chief-protocols-office)" class="badge badge-pill badge-primary">Ministry of Constitution and <br> Good Governance</a></div>
          <div id="education" class="col-"><a href="https://udsm.ac.tz/web/index.php/offices/daruso/ministry-of-education" class="badge badge-pill badge-primary">Ministry of Education</a></div>
          <div id="loans" class="col-"><a href="https://udsm.ac.tz/web/index.php/offices/daruso/ministry-of-loans" class="badge badge-pill badge-primary">Ministry of Loans</a></div>
          <div id="finance" class="col-"><a href="https://udsm.ac.tz/web/index.php/offices/daruso/ministry-of-finance-and-investment" class="badge badge-pill badge-primary">Ministry of Finance and Investment</a></div>
          <div id="communication" class="col-"><a href="https://udsm.ac.tz/web/index.php/offices/daruso/ministry-of-information-communication-students-associations-and-external-affairs" class="badge badge-pill badge-primary">Ministry of Information, <br>Communication, Student's Associations, <br>and External Affairs</a></div>
          <div id="health" class="col-"><a href="https://udsm.ac.tz/web/index.php/offices/daruso/ministry-of-health-and-cafeteria" class="badge badge-pill badge-primary">Ministry of Health and Cafeteria</a></div>
          <div id="security" class="col-"><a href="https://udsm.ac.tz/web/index.php/offices/daruso/ministry-of-security-and-defence" class="badge badge-pill badge-primary">Ministry of Security and Defence</a></div>
          
          <div id="water" class="col-md-auto"><a href="https://udsm.ac.tz/web/index.php/offices/daruso/ministry-of-water-environment-and-accommodation" class="badge badge-pill badge-primary">Ministry of Water, Environment, <br>and Accommodation</a></div>
          <div id="transport" class="col-md-auto"><a href="https://udsm.ac.tz/web/index.php/offices/daruso/ministry-of-infrastructure-and-transportation" class="badge badge-pill badge-primary">Ministry of Infrastructure and <br>Transportation</a></div>
          <div id="gender" class="col-md-auto"><a href="https://udsm.ac.tz/web/index.php/offices/daruso/ministry-of-gender-and-special-groups" class="badge badge-pill badge-primary">Ministry of Gender and Special Groups</a></div>
          <div id="sports" class="col-md-auto"><a href="https://udsm.ac.tz/web/index.php/offices/daruso/ministry-of-sports-and-entertainment" class="badge badge-pill badge-primary">Ministry of Sports and Entertainment</a></div>
        </div>
      `);
    }
  );

  // Events Data
  $.get("./php_action/fetchEventItems.php",
    function (data) {
      var _data = JSON.parse(data);
      _data.data.forEach(element => {
          var raw_date = element[1];
          var date = new Date(element[1]);
          var title = element[2];
          var details = element[3];

        $("#pills-events .event-list").append(
          `<div class="col-md-3 event-item m-2">
          <div class="row">
            <div class="col-md-12 border p-4 event-date"><span>`+date.getDate()+`</span> <b><br>`+title+`<br></b>`+raw_date+`</div>
            <div class="col-md-12 border p-4 event-details">`+details+`</div>
          </div>
        </div>`
        );
      });  
    }
  );

  //activate nav on scroll
  var $win = $(window);
  var home = $('#home'); 
  var about = $('#about');
  var leaders = $('#leaders');
  var gallery = $('#gallery');
  var news = $('#news');

  var prevScrollpos = window.pageYOffset;
  window.onscroll = function() {
    var currentScrollPos = window.pageYOffset;
    if (prevScrollpos > currentScrollPos) {
      document.getElementById("nav-list").style.top = "0";
    } else {
      document.getElementById("nav-list").style.top = "-500px";
    }
    prevScrollpos = currentScrollPos;

    if (window.pageYOffset >= 10) {
      document.getElementById("nav-list").style.top = "-500px";
    }
  }

  $("#myNavbar").click(function(){
    $(".nav-list").slideDown(300);
  });

  $(".carousel-item").click(function(){
    $(".nav-list").slideUp(300);
  });

  $win.on('scroll', function () {
  });  

  // Pannellum 360 panorama
  pannellum.viewer('panorama', {
    "type": "equirectangular",
    "panorama": "https://pannellum.org/images/alma.jpg"
  });

  $(".btn-panorama").click(function(){
    $(".overlay-panorama").show();
    $("#panorama").show();
  });
  $(".overlay-panorama").click(function(){
    $("#panorama").css({"display":"none"});
    $(this).css({"display":"none"});
  });

  // MapBox
  mapboxgl.accessToken = 'pk.eyJ1Ijoid2luc2tpZG8iLCJhIjoiY2s1YTJ3NmF5MHI0NDNlcWh6Nm93dWw3eiJ9._qeNuCuXVELGurRpisHdig';
  var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/streets-v11'
  });

  mapboxgl.accessToken = 'pk.eyJ1Ijoid2luc2tpZG8iLCJhIjoiY2s1YXd3dTQ3MHpvODNrcmZtenp2bG5yOCJ9.QDVXOYau3xqCvYYiw0QAxw';
  var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/dark-v10',
    zoom: 11,
    center: [39.2026, -6.7766]
  });
  var marker = new mapboxgl.Marker()
  .setLngLat([39.2026, -6.7766])
  .addTo(map);
});


function toggleMinistry() {
  jQuery(function(){
    $(".leaders-links").toggle(300);
  });
}





