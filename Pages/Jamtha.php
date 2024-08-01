<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>SQFTINFRA | Jamtha</title>
  <style>

     .modal { display: none; position: fixed; z-index: 50; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0, 0, 0, 0.9); }
    .modal-content { margin: auto; display: block; width: 80%; max-width: 700px; animation: zoom 0.6s; }
    @keyframes zoom { from { transform: scale(0); } to { transform: scale(1); } }
    .close { position: absolute; top: 15px; right: 35px; color: #f1f1f1; font-size: 40px; font-weight: bold; transition: 0.3s; }
    .close:hover { color: #bbb; cursor: pointer; }

    /* Ensure the parent container enables horizontal scrolling */
    .horizontal-scroll {
    display: flex;
    overflow-x: auto;
    scroll-snap-type: x mandatory;
    -webkit-overflow-scrolling: touch; /* Smooth scrolling on iOS */
    }

    .horizontal-scroll::-webkit-scrollbar {
    height: 10px; /* Adjust the height for horizontal scrollbar */
    }

    .horizontal-scroll::-webkit-scrollbar-thumb {
        background-image: linear-gradient(to right, #9732E3,#E52F87);
        /* background-color: #4F46E5; */
    border-radius: 6px;
    }

    .horizontal-scroll::-webkit-scrollbar-track {
    background: #c5c2ff;
    border-radius: 6px;
    }

    .item {
    flex: 0 0 auto; /* Prevent the items from shrinking */
    scroll-snap-align: start; /* Align items at the start of the container */
    margin-right: 16px; /* Optional: Add spacing between items */
    }

    .item:last-child {
    margin-right: 0; /* Remove right margin from the last item */
    }

    ::-webkit-scrollbar {
      color: #fff;
    }

    ::-webkit-scrollbar-track {
      color: #fff;
    }

    ::-webkit-scrollbar-thumb {
      color: #fff;
    }

    .map {
      height: 45vh;
      width: 80vh;
      border-radius: 10px;
    }

    @media only screen and (max-width: 600px) {
      .map {
      height: 25vh;
      width: 40vh;
      border-radius: 10px;
    }
    }

  </style>
</head>
<body>
  <!-- Header -->
  <?php include './Components/Navbar.php';  ?>

  <div class="h-auto py-6 sm:py-8 lg:py-12 mr-0 md:mr-36 ml-0 md:ml-36 flex flex-col md:flex-row">
    <div class="h-auto w-full p-2">
      <img src="https://dummyimage.com/700x400/000/fff" class="rounded-lg shadow-lg" alt="">
      <h2 class="text-3xl bg-gradient-to-r from-purple-600 to-pink-600 mt-5 font-bold text-white text-transparent bg-clip-text text-center mb-5">Jamtha Plot Scheme</h2>

      <div class="block md:hidden p-2">
    <div class="flex flex-row">
        <div class="w-1/2 p-2">
            <button class="w-full  bg-gradient-to-r from-purple-600 to-pink-600 hover:bg-gradient-to-r hover:from-purple-900 hover:to-pink-900 text-white transition-colors duration-300 text-center flex  justify-center font-bold p-5 rounded-full font-bold flex" style="font-size:20px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone size-5 mr-2 mt-1" viewBox="0 0 16 16">
            <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
          </svg>
            Call Now</button>
        </div>
        <div class="w-1/2 p-2">
            <button class="w-full bg-green-500 hover:bg-green-700 text-white p-5 rounded-full font-bold flex" style="font-size:20px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp size-5 mr-2 mt-1" viewBox="0 0 16 16">
              <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/>
            </svg>  
            Whatsapp</button>
        </div>
    </div>
</div>


      
      <div class="grid grid-cols-2 gap-4 p-4 sm:grid-cols-3 sm:grid-rows-2">
        <!-- Reuse the card HTML here for brevity -->
        <div class="p-4 bg-gradient-to-r from-purple-200 to-pink-200 rounded-lg">
          <h4 class="text-xl font-bold flex justify-center">
          Price Range
          </h4>
          <p class="text-center mt-2 text-sm">80L-99L</p>
        </div>
        <div class="p-4 bg-gradient-to-r from-purple-200 to-pink-200 rounded-lg">
          <h4 class="text-xl font-bold flex justify-center">
            Location
          </h4>
          <p class="text-center mt-2 text-sm">Manish Nagar, Nagpur</p>
        </div>
        <div class="p-4 bg-gradient-to-r from-purple-200 to-pink-200 rounded-lg">
          <h4 class="text-xl font-bold flex justify-center">
          Dimensions
          </h4>
          <p class="text-center mt-2 text-sm">26.24 X 60.98</p>
        </div>
        <div class="p-4 bg-gradient-to-r from-purple-200 to-pink-200 rounded-lg">
          <h4 class="text-xl font-bold flex justify-center">
          Construction
          </h4>
          <p class="text-center mt-2 text-sm">No</p>
        </div>
        <div class="p-4 bg-gradient-to-r from-purple-200 to-pink-200 rounded-lg">
          <h4 class="text-xl font-bold flex justify-center">
          Boundary Wall
          </h4>
          <p class="text-center mt-2 text-sm">No</p>
        </div>
        <div class="p-4 bg-gradient-to-r from-purple-200 to-pink-200 rounded-lg">
          <h4 class="text-xl font-bold flex justify-center">
          Ownership
          </h4>
          <p class="text-center mt-2 text-sm">Freehold</p>
        </div>
        <div class="p-4 bg-gradient-to-r from-purple-200 to-pink-200 rounded-lg">
          <h4 class="text-xl font-bold flex justify-center">
          Overlooking
          </h4>
          <p class="text-center mt-2 text-sm">Garden/Park, Main Road</p>
        </div><div class="p-4 bg-gradient-to-r from-purple-200 to-pink-200 rounded-lg">
          <h4 class="text-xl font-bold flex justify-center">
          Transaction
          </h4>
          <p class="text-center mt-2 text-sm">New Property</p>
        </div>
        <!-- Repeat other cards similarly -->
      </div>
      <h3 class="text-2xl text-center font-bold mt-2">Google Map Location</h3>
      <div class="md:h-36 md:w-64 h-64 w-full p-4 rounded-lg">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d119118.39832133087!2d79.01663053644644!3d21.094620402965457!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bd4c06c57e0b3f7%3A0xdee77dff07bb0ad6!2sAmbazari%20Garden!5e0!3m2!1sen!2sin!4v1721398410699!5m2!1sen!2sin" 
          allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="map"></iframe>
      </div>

    </div>

<div class="p-4 w-full">
<div class="flex flex-col md:flex-row">
    <div class="w-full md:w-1/2 p-2">
        <button class="w-full  bg-gradient-to-r from-purple-600 to-pink-600 hover:bg-gradient-to-r hover:from-purple-900 hover:to-pink-900 text-white transition-colors duration-300 text-center flex  justify-center font-bold rounded-full p-5">Connect on Call</button>
    </div>
    <div class="w-full md:w-1/2 p-2">
        <button class="w-full bg-green-500 hover:bg-green-700 text-white p-5 rounded-full font-bold">Connect on Whatsapp</button>
    </div>
</div>

<div class="overflow-y-scroll" style="height: 150vh;">
    <h3 class="text-2xl font-bold mb-2 mt-5">Recent Offer</h3>
      <div class="flex flex-col md:flex-row">
        <img src="https://dummyimage.com/400x200/000/fff" class="rounded-lg shadow-lg w-full h-64 mr-0 md:mr-2 mb-2 md:mb-0" alt="">
      </div>
      <div class="mt-5 p-2 text-justify">
        <h3 class="text-2xl font-bold">Property Details</h3>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nihil inventore aliquam voluptatibus harum dolorum maxime dicta tempore asperiores quos saepe. Reprehenderit accusantium molestias cumque tempore voluptatem modi impedit? Non, magni!</p>
        <br>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque distinctio, modi quas tempora vitae alias earum cum possimus inventore non laudantium vero quia est quis eos, rerum numquam nobis incidunt?Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        <br>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque distinctio, modi quas tempora vitae alias earum cum possimus inventore non laudantium vero quia est quis eos, rerum numquam nobis incidunt?Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        <br>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque distinctio, modi quas tempora vitae alias earum cum possimus inventore non laudantium vero quia est quis eos, rerum numquam nobis incidunt?Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        <br>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque distinctio, modi quas tempora vitae alias earum cum possimus inventore non laudantium vero quia est quis eos, rerum numquam nobis incidunt?Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        <br>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque distinctio, modi quas tempora vitae alias earum cum possimus inventore non laudantium vero quia est quis eos, rerum numquam nobis incidunt?Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        <br>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque distinctio, modi quas tempora vitae alias earum cum possimus inventore non laudantium vero quia est quis eos, rerum numquam nobis incidunt?Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        <br>
        <h3 class="text-2xl font-bold mt-10">Amenities</h3>
        <img src="https://dummyimage.com/600x600/000/fff" class="mt-2 rounded-lg" alt="">
      </div>
    </div>
</div>
</div>


<!-- gallery -->
<section class="mr-0 md:mr-36 ml-0 md:ml-36">
  <h2 class="text-center mt-10 -mb-0 md:-mb-10 text-5xl text-gray-900 font-extrabold">
    Project <span class='bg-gradient-to-r from-purple-600 to-pink-600 hover:bg-gradient-to-r hover:from-purple-900 hover:to-pink-900 text-white text-transparent bg-clip-text'>Gallery</span>
  </h2>
  <div class="container px-5 py-10 mt-0 md:mt-10 mx-auto flex flex-wrap">
    <div class="flex flex-wrap md:-m-2 -m-1">
      <div class="flex flex-wrap w-1/2">
        <div class="md:p-2 p-1 w-1/2">
          <img alt="gallery" class="w-full object-cover h-full object-center block modal-trigger" src="../Assets/Images/Photo_Gallery/1.JPG">
        </div>
        <div class="md:p-2 p-1 w-1/2">
          <img alt="gallery" class="w-full object-cover h-full object-center block modal-trigger" src="../Assets/Images/Photo_Gallery/2.JPG">
        </div>
        <div class="md:p-2 p-1 w-full">
          <img alt="gallery" class="w-full h-full object-cover object-center block modal-trigger" src="../Assets/Images/Photo_Gallery/9.JPG">
        </div>
      </div>
      <div class="flex flex-wrap w-1/2">
        <div class="md:p-2 p-1 w-full">
          <img alt="gallery" class="w-full h-full object-cover object-center block modal-trigger" src="../Assets/Images/Photo_Gallery/8.JPG">
          </div>
        <div class="md:p-2 p-1 w-1/2">
          <img alt="gallery" class="w-full object-cover h-full object-center block modal-trigger" src="../Assets/Images/Photo_Gallery/5.JPG">
        </div>
        <div class="md:p-2 p-1 w-1/2">
          <img alt="gallery" class="w-full object-cover h-full object-center block modal-trigger" src="../Assets/Images/Photo_Gallery/6.JPG">
        </div>
      </div>
    </div>
  </div>
</section>

<!-- gallery model -->
<div id="myModal" class="modal py-24">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption" class="text-center text-white mt-2"></div>
</div>



  

  <!-- footer -->
  <div class="mt-10"></div>
  <?php include './Components/Footer.php';  ?>
  <?php include './Components/Whatsapp.php' ?>

  <script>
document.addEventListener('DOMContentLoaded', function() {
  const modal = document.getElementById("myModal");
  const modalImg = document.getElementById("img01");
  const captionText = document.getElementById("caption");

  document.querySelectorAll('.modal-trigger').forEach(function(img) {
    img.onclick = function() {
      modal.style.display = "block";
      modalImg.src = this.src;
      captionText.innerHTML = this.alt;
    }
  });

  document.querySelector('.close').onclick = function() {
    modal.style.display = "none";
  }
});
</script>
</body>
</html>
