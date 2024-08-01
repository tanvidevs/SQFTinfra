<?php
// Database connection
include './Components/Func/dbcon.php';

// Fetch all blog posts instead of just one
$sql = "SELECT * FROM properties LIMIT 6"; // Fetch 6 most recent posts
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $property = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $property = []; // Initialize as empty array if no posts found
}

$conn->close();
?>

<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>SQFTINFRA | Projects</title>
  <style>
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
    <img src="../Assets/Images/Page_Banner/Desktop/Pro-bg.png" alt="" class="mt-2 rounded-lg hidden md:block">    
    
    <!-- visible on mobile only -->
    <img src="../Assets/Images/Page_Banner/Mobile/m-Pro-bg.png" alt="" class="mt-2 rounded-lg md:hidden">
</div>

<!-- Recent project -->
<section class="text-gray-600 body-font mr-0 md:mr-36 ml-0 md:ml-36 mt-20">
        <h2 class="text-center -mb-0 md:-mb-10 text-5xl text-gray-900 font-extrabold">Recent <span class='bg-gradient-to-r from-purple-600 to-pink-600 hover:bg-gradient-to-r hover:from-purple-900 hover:to-pink-900 text-white text-transparent bg-clip-text'>Projects</span></h2>
        <div class="container px-5 py-20 mx-auto">
            <div class="horizontal-scroll p-5">
                <?php 
                // Display the remaining blog posts
                for ($i = 0; $i < count($property); $i++) : 
                    $post = $property[$i];
                ?>
                <a href="project-detail.php?id=<?= $post['id'] ?>">
                <div class="item p-4 md:w-1/3 sm:mb-0 mb-6">
                    <div class="rounded-lg h-64 overflow-hidden">
                        <img alt="content" class="object-cover object-center h-full w-full" src="../Assets/Images/Property/<?= htmlspecialchars($post['image_url']) ?>">
                    </div>
                    <h2 class="text-xl font-medium title-font text-gray-900 mt-5"><?= htmlspecialchars($post['title']) ?></h2>
                    <p class="text-base leading-relaxed mt-2"><?= htmlspecialchars(substr($post['Project_Desc'], 0, 100)) ?>...</p>
                    <a href="project-detail.php?id=<?= $post['id'] ?>" class="text-indigo-500 inline-flex items-center mt-3">Learn More
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                        </svg>
                    </a>    
                </div>
                </a>
                <?php endfor; ?>
            </div>
        </div>
</section>

<!-- Completed project -->
<section class="text-gray-600 body-font mr-0 md:mr-36 ml-0 md:ml-36 mt-20">
        <h2 class="text-center -mb-0 md:-mb-10 text-5xl text-gray-900 font-extrabold">Past <span class='bg-gradient-to-r from-purple-600 to-pink-600 hover:bg-gradient-to-r hover:from-purple-900 hover:to-pink-900 text-white text-transparent bg-clip-text'>Projects</span></h2>
        <div class="container px-5 py-10 md:py-20 mx-auto">
            <div class="horizontal-scroll p-5">
                <?php 
                // Display the remaining project posts
                for ($i = 3; $i < count($property); $i++) : 
                    $post = $property[$i];
                ?>
                <a href="project-detail.php?id=<?= $post['id'] ?>">
                <div class="item p-4 md:w-1/3 sm:mb-0 mb-6">
                    <div class="rounded-lg h-64 overflow-hidden">
                        <img alt="content" class="object-cover object-center h-full w-full" src="../Assets/Images/Property/<?= htmlspecialchars($post['image_url']) ?>">
                    </div>
                    <h2 class="text-xl font-medium title-font text-gray-900 mt-5"><?= htmlspecialchars($post['title']) ?></h2>
                    <p class="text-base leading-relaxed mt-2"><?= htmlspecialchars(substr($post['Project_Desc'], 0, 100)) ?>...</p>
                    <a href="project-detail.php?id=<?= $post['id'] ?>" class="text-indigo-500 inline-flex items-center mt-3">Learn More
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                        </svg>
                    </a>    
                </div>
                </a>
                <?php endfor; ?>
            </div>
        </div>
</section>


 <!-- footer -->
 <div class="h-10"></div>
 <?php include './Components/Footer.php';  ?>
 <?php include './Components/Whatsapp.php' ?>

</body>
</html>