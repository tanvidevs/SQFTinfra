<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>SQFTINFRA | NRI Corner</title>
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

  </style>
</head>
<body>
 <!-- Header -->
 <?php include './Components/Navbar.php';  ?>

 <!-- Fix Banner Image  -->
 <div class="p-2 md:p-0 mr-0 md:mr-36 ml-0 md:ml-36 mt-0 md:mt-10">
    <!-- visible on desktop only -->
    <img src="../Assets/Images/Page_Banner/Desktop/NRI-bg.png" alt="" class="mt-2 rounded-lg hidden md:block">    
    
    <!-- visible on mobile only -->
    <img  src="../Assets/Images/Page_Banner/Mobile/m-NRI-bg.png" alt="" class="mt-2 rounded-lg md:hidden">
 </div>

<!-- events -->
<section class="text-gray-600 body-font mr-0 md:mr-36 ml-0 md:ml-36 mt-10">
<h2 class="text-center mt-20 -mb-0 md:-mb-10 text-5xl text-gray-900 font-extrabold">NRI <span class='bg-gradient-to-r from-purple-600 to-pink-600 hover:bg-gradient-to-r hover:from-purple-900 hover:to-pink-900 text-white text-transparent bg-clip-text'>Meetup</span></h2>
  <div class="container px-5 py-10 md:py-20 mx-auto">
    <div class="flex flex-wrap -mx-4 -mb-10 text-center">
      <div class="sm:w-1/2 mb-10 px-4">
        <div class="rounded-lg h-64 overflow-hidden">
          <img alt="content" class="object-cover object-center h-full w-full" src="https://dummyimage.com/1201x501">
        </div>
        <h2 class="title-font text-2xl font-medium text-gray-900 mt-6 mb-3">Buy YouTube Videos</h2>
        <p class="leading-relaxed text-base">Williamsburg occupy sustainable snackwave gochujang. Pinterest cornhole brunch, slow-carb neutra irony.</p>
        <button class="flex mx-auto mt-6 bg-gradient-to-r from-purple-600 to-pink-600 hover:bg-gradient-to-r hover:from-purple-900 hover:to-pink-900 text-white  border-0 py-2 px-6 focus:outline-none rounded-full text-lg">Check Event</button>
      </div>
      <div class="sm:w-1/2 mb-10 px-4">
        <div class="rounded-lg h-64 overflow-hidden">
          <img alt="content" class="object-cover object-center h-full w-full" src="https://dummyimage.com/1202x502">
        </div>
        <h2 class="title-font text-2xl font-medium text-gray-900 mt-6 mb-3">The Catalyzer</h2>
        <p class="leading-relaxed text-base">Williamsburg occupy sustainable snackwave gochujang. Pinterest cornhole brunch, slow-carb neutra irony.</p>
        <button class="flex mx-auto mt-6 bg-gradient-to-r from-purple-600 to-pink-600 hover:bg-gradient-to-r hover:from-purple-900 hover:to-pink-900 text-white  border-0 py-2 px-6 focus:outline-none rounded-full text-lg">Check Event</button>
      </div>
    </div>
  </div>
</section>

<!-- Completed project -->
<section class="text-gray-600 body-font mr-0 md:mr-36 ml-0 md:ml-36 mt-20">
  <h2 class="text-center -mb-0 md:-mb-10 text-5xl text-gray-900 font-extrabold">NRI <span class='bg-gradient-to-r from-purple-600 to-pink-600 hover:bg-gradient-to-r hover:from-purple-900 hover:to-pink-900 text-white text-transparent bg-clip-text'>Reviews  </span></h2>
  <div class="container px-5 py-10 md:py-20 mx-auto">
    <div class="horizontal-scroll">
      <div class="item p-4 md:w-1/3 sm:mb-0 mb-6">
        <div class="rounded-lg h-64 overflow-hidden">
          <img alt="content" class="object-cover object-center h-full w-full" src="https://dummyimage.com/500x400">
        </div>
        <h2 class="text-xl font-medium title-font text-gray-900 mt-5">Shooting Stars</h2>
        <p class="text-base leading-relaxed mt-2">Swag shoivdigoitch literally shoivdigoitch </p>
        <a class="text-indigo-500 inline-flex items-center mt-3">Learn More
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
            <path d="M5 12h14M12 5l7 7-7 7"></path>
          </svg>
        </a>
      </div>
      <div class="item p-4 md:w-1/3 sm:mb-0 mb-6">
        <div class="rounded-lg h-64 overflow-hidden">
          <img alt="content" class="object-cover object-center h-full w-full" src="https://dummyimage.com/500x400">
        </div>
        <h2 class="text-xl font-medium title-font text-gray-900 mt-5">The Catalyzer</h2>
        <p class="text-base leading-relaxed mt-2">Swag shoivdigoitch literally shoivdigoitch </p>
        <a class="text-indigo-500 inline-flex items-center mt-3">Learn More
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
            <path d="M5 12h14M12 5l7 7-7 7"></path>
          </svg>
        </a>
      </div>
      <div class="item p-4 md:w-1/3 sm:mb-0 mb-6">
        <div class="rounded-lg h-64 overflow-hidden">
          <img alt="content" class="object-cover object-center h-full w-full" src="https://dummyimage.com/500x400">
        </div>
        <h2 class="text-xl font-medium title-font text-gray-900 mt-5">The Catalyzer</h2>
        <p class="text-base leading-relaxed mt-2">Swag shoivdigoitch literally shoivdigoitch </p>
        <a class="text-indigo-500 inline-flex items-center mt-3">Learn More
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
            <path d="M5 12h14M12 5l7 7-7 7"></path>
          </svg>
        </a>
      </div>
      <div class="item p-4 md:w-1/3 sm:mb-0 mb-6">
        <div class="rounded-lg h-64 overflow-hidden">
          <img alt="content" class="object-cover object-center h-full w-full" src="https://dummyimage.com/500x400">
        </div>
        <h2 class="text-xl font-medium title-font text-gray-900 mt-5">The 400 Blows</h2>
        <p class="text-base leading-relaxed mt-2">Swag shoivdigoitch literally shoivdigoitch </p>
        <a class="text-indigo-500 inline-flex items-center mt-3">Learn More
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
            <path d="M5 12h14M12 5l7 7-7 7"></path>
          </svg>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- gallery -->
<section class="mr-0 md:mr-36 ml-0 md:ml-36 mt-20">
  <h2 class="text-center mt-10 -mb-0 md:-mb-10 text-5xl text-gray-900 font-extrabold">
    Event <span class='bg-gradient-to-r from-purple-600 to-pink-600 hover:bg-gradient-to-r hover:from-purple-900 hover:to-pink-900 text-white text-transparent bg-clip-text'>Gallery</span>
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
 <div class="h-10"></div>
 <?php include './Components/Footer.php';  ?>

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
<?php include './Components/Whatsapp.php' ?>

</body>
</html>