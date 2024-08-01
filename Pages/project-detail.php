<?php
// Database connection
include './Components/Func/dbcon.php';

// Check if ID is provided in the URL
if (isset($_GET['id'])) {
    $postId = $_GET['id'];
    
    // Fetch the specific blog post
    $sql = "SELECT * FROM properties WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $postId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $post = $result->fetch_assoc();
    } else {
        // Redirect to the main blog page if post not found
        header("Location: Project.php");
        exit();
    }
} else {
    // Redirect to the main blog page if no ID provided
    header("Location: Project.php");
    exit();
}
$conn->close();
?>

<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>SQFTINFRA | <?= htmlspecialchars($post['title']) ?></title>
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
      height: 40vh;
      width: 60vh;
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
      <img src="../Assets/Images/Property/<?= htmlspecialchars($post['image_url']) ?>" class="rounded-lg shadow-lg" alt="">
      <h2 class="text-3xl bg-gradient-to-r from-purple-600 to-pink-600 mt-5 font-bold text-white text-transparent bg-clip-text text-center mb-5"><?= htmlspecialchars($post['title']) ?></h2>

      <div class="block md:hidden p-2">
    <div class="flex flex-row">
        <div class="w-1/2 p-2">
           <a href="tel:<?= htmlspecialchars($post['phone']) ?>">
           <button class="w-full  bg-gradient-to-r from-purple-600 to-pink-600 hover:bg-gradient-to-r hover:from-purple-900 hover:to-pink-900 text-white transition-colors duration-300 text-center flex  justify-center font-bold p-5 rounded-full font-bold" style="font-size:20px;">
            Call Now</button>
           </a>
        </div>
        <div class="w-1/2 p-2">
            <a href="<?= htmlspecialchars($post['whatsapp']) ?>">
            <button class="w-full bg-green-500 hover:bg-green-700 text-white p-5 rounded-full font-bold" style="font-size:20px;"> 
            Whatsapp</button>
            </a>
        </div>
    </div>
</div>


      
      <div class="grid grid-cols-2 gap-4 p-4 sm:grid-cols-3 sm:grid-rows-2">
        <!-- Reuse the card HTML here for brevity -->
        <div class="p-4 bg-gradient-to-r from-purple-200 to-pink-200 rounded-lg">
          <h4 class="text-xl font-bold flex justify-center">
          Price Range
          </h4>
          <p class="text-center mt-2 text-sm"><?= htmlspecialchars($post['price_range']) ?></p>
        </div>
        <div class="p-4 bg-gradient-to-r from-purple-200 to-pink-200 rounded-lg">
          <h4 class="text-xl font-bold flex justify-center">
          Finance
          </h4>
          <p class="text-center mt-2 text-sm"><?= htmlspecialchars($post['finance']) ?></p>
        </div>
        <div class="p-4 bg-gradient-to-r from-purple-200 to-pink-200 rounded-lg">
          <h4 class="text-xl font-bold flex justify-center">
          Sanction
          </h4>
          <p class="text-center mt-2 text-sm"><?= htmlspecialchars($post['Sanction']) ?></p>
        </div>
        <div class="p-4 bg-gradient-to-r from-purple-200 to-pink-200 rounded-lg">
          <h4 class="text-xl font-bold flex justify-center">
            Location
          </h4>
          <p class="text-center mt-2 text-sm"><?= htmlspecialchars($post['location']) ?></p>
        </div>
        <div class="p-4 bg-gradient-to-r from-purple-200 to-pink-200 rounded-lg">
          <h4 class="text-xl font-bold flex justify-center">
          Dimensions
          </h4>
          <p class="text-center mt-2 text-sm"><?= htmlspecialchars($post['dimensions']) ?></p>
        </div>
        <div class="p-4 bg-gradient-to-r from-purple-200 to-pink-200 rounded-lg">
          <h4 class="text-xl font-bold flex justify-center">
          Construction
          </h4>
          <p class="text-center mt-2 text-sm"><?= htmlspecialchars($post['construction']) ?></p>
        </div>
        <div class="p-4 bg-gradient-to-r from-purple-200 to-pink-200 rounded-lg">
          <h4 class="text-xl font-bold flex justify-center">
          Boundary Wall
          </h4>
          <p class="text-center mt-2 text-sm"><?= htmlspecialchars($post['boundary_wall']) ?></p>
        </div>
        <div class="p-4 bg-gradient-to-r from-purple-200 to-pink-200 rounded-lg">
          <h4 class="text-xl font-bold flex justify-center">
          Ownership
          </h4>
          <p class="text-center mt-2 text-sm"><?= htmlspecialchars($post['ownership']) ?></p>
        </div>
        <div class="p-4 bg-gradient-to-r from-purple-200 to-pink-200 rounded-lg">
          <h4 class="text-xl font-bold flex justify-center">
          Overlooking
          </h4>
          <p class="text-center mt-2 text-sm"><?= htmlspecialchars($post['overlooking']) ?></p>
        </div><div class="p-4 bg-gradient-to-r from-purple-200 to-pink-200 rounded-lg">
          <h4 class="text-xl font-bold flex justify-center">
          Transaction
          </h4>
          <p class="text-center mt-2 text-sm"><?= htmlspecialchars($post['transaction']) ?></p>
        </div>
        <!-- Repeat other cards similarly -->
      </div>
      <h3 class="text-2xl text-center font-bold mt-2">Google Map Location</h3>
      <div class="md:h-36 md:w-64 h-64 w-full p-4 rounded-lg">
          <iframe src="<?= htmlspecialchars($post['GML']) ?>" 
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

<div class="overflow-y-scroll" style="height: 170vh;">
      <!-- Offer & Discount -->
      <!-- <div class="flex flex-col md:flex-row">
        <img src="https://dummyimage.com/400x200/000/fff&text=ad" class="mt-5 rounded-lg shadow-lg w-full h-64 mr-0 md:mr-2 mb-2 md:mb-0" alt="">
      </div> -->
      <div class="mt-5 p-1 text-justify">
        <h3 class="text-2xl font-bold mb-5 text-center">Property Details</h3>
        <p><?= htmlspecialchars($post['Project_Desc']) ?></p>
        <br>
        <h3 class="text-2xl font-bold mt-5 mb-5 text-center">Amenities</h3>
        <div class="grid grid-cols-2 gap-4 p-2 sm:grid-cols-3 sm:grid-rows-2">
        <!-- Reuse the card HTML here for brevity -->
              <div class="p-4 bg-gradient-to-r from-purple-200 to-pink-200 rounded-lg">
                <h4 class="text-xl font-bold flex justify-center">
                Tar Road
                </h4>
              </div>
              <div class="p-4 bg-gradient-to-r from-purple-200 to-pink-200 rounded-lg">
                <h4 class="text-xl font-bold flex justify-center">
                Sewer Line
                </h4>
              </div>
              <div class="p-4 bg-gradient-to-r from-purple-200 to-pink-200 rounded-lg">
                <h4 class="text-xl font-bold flex justify-center">
                Kid Area
                </h4>
              </div>
              <div class="p-4 bg-gradient-to-r from-purple-200 to-pink-200 rounded-lg">
                <h4 class="text-xl font-bold flex justify-center">
                Street light
                </h4>
              </div>
              <div class="p-4 bg-gradient-to-r from-purple-200 to-pink-200 rounded-lg">
                <h4 class="text-xl font-bold flex justify-center">
                Garden
                </h4>
              </div>
              
              <div class="p-4 bg-gradient-to-r from-purple-200 to-pink-200 rounded-lg">
                <h4 class="text-xl font-bold flex justify-center">
                Drinkn Water
                </h4>
              </div>
        <!-- Repeat other cards similarly -->
      </div>
      <h3 class="text-2xl mt-10 font-bold mb-5 text-center">Location Nearby</h3>

        <ul class="list-disc list-inside text-gray-700 text-justify pr-8 pl-8">
            <?php
                  $Nearby_Locations = explode("\n", $post['Nearby_Location']);
                  foreach ($Nearby_Locations as $Nearby_Location) {
                      echo "<li>" . htmlspecialchars(trim($Nearby_Location)) . "</li>";
                  }
            ?>
        </ul>
        <h3 class="text-2xl mt-10 font-bold text-center">Finance Available From</h3>
        <div class="flex flex-col md:flex-row">
        <img src="../Assets/Images/General/Bank_Fin.png" class="mt-5 rounded-lg shadow-lg w-full h-28 md:h-44 mr-0 md:mr-2 mb-2 md:mb-0" alt="">
      </div>
      </div>
    </div>
</div>
</div>


<!-- gallery -->
<section class="mr-0 md:mr-36 ml-0 md:ml-36 mt-0 md:mt-20">
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
