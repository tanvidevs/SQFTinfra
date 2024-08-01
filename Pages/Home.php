<?php
// Database connection
include './Components/Func/dbcon.php';

// Fetch all blog posts instead of just one
$sql = "SELECT * FROM blogpost ORDER BY Created_At DESC LIMIT 6"; // Fetch 6 most recent posts
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $blogposts = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $blogposts = []; // Initialize as empty array if no posts found
}

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

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>SQFTINFRA | Home</title>
  <link rel="icon" type="image/x-icon" href="./Assets/Images/Icons/Icon.png">

  <!-- Banner CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"/>
    <link rel="stylesheet" href="../Assets/Styles/Banner.css">
    <style>
      .scroll-container {
      display: flex;
      overflow-x: auto;
      scroll-snap-type: x mandatory;
    }
    .scroll-item {
      flex: 0 0 auto;
      scroll-snap-align: center;
    }

    .testimonial-slider {
    display: flex;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    scrollbar-width: none; /* Firefox */
  }
  .testimonial-slider::-webkit-scrollbar {
    display: none; /* Safari and Chrome */
  }
  .testimonial-slide {
    flex-shrink: 0;
    width: 100%;
    max-width: 300px;
  }

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
<body class="h-screen bg-white">

<?php include './Components/Navbar.php';  ?>


<div class="container mx-auto p-4">
        <!-- Mobile Slider -->
        <div class="slider mobile-slider">
            <div>
                <img src="../Assets/Images/Mobile_Banner/m-bg-1.png" alt="Mobile Image 1" class="w-full rounded-md">
            </div>
            <div>
                <img src="../Assets/Images/Mobile_Banner/m-bg-2.png" alt="Mobile Image 2" class="w-full rounded-md">
            </div>
            <div>
                <img src="../Assets/Images/Mobile_Banner/m-bg-3.png" alt="Mobile Image 3" class="w-full rounded-md">
            </div>
        </div>
        <!-- Desktop Slider -->
        <div class="slider desktop-slider">
            <div>
                <img src="../Assets/Images/Desktop_Banner/bg-1.png" alt="Desktop Image 1" class="w-full rounded-md">
            </div>
            <div>
                <img src="../Assets/Images/Desktop_Banner/bg-2.png" alt="Desktop Image 2" class="w-full rounded-md">
            </div>
            <div>
                <img src="../Assets/Images/Desktop_Banner/bg-3.png" alt="Desktop Image 3" class="w-full rounded-md">
            </div>
        </div>
    </div>


    <!-- About -->
  <section class="text-gray-600 body-font mr-0 md:mr-36 ml-0 md:ml-36">
    <h2 class="text-center mt-20 text-5xl text-gray-900 font-extrabold">About <span class='bg-gradient-to-r from-purple-600 to-pink-600 text-white text-transparent bg-clip-text'>Us</span></h2>
  <div class="container mx-auto flex px-5 py-10 md:py-20 md:flex-row flex-col items-center">
    <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
      <img class="object-cover object-center rounded" alt="hero" src="../Assets/Images/General/about_1.png">
    </div>
    <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
      
      <p class="mb-8 leading-relaxed text-justify">At SQFT INFRA, we understand that buying property is a significant milestone in life. Our mission is to make this journey seamless and fulfilling for you. With a team of dedicated professionals, we offer a range of real estate solutions tailored to meet your unique needs. Whether you are looking to buy, sell, or invest, we are here to guide you every step of the way.</p>
      <p class="mb-8 leading-relaxed text-justify">Our extensive experience in the industry ensures that we provide accurate, up-to-date information and advice, empowering you to make informed decisions. We pride ourselves on our integrity, transparency, and commitment to customer satisfaction. At SQFT INFRA, your dream property is just a step away. Let us help you find the perfect place to call home.</p>
      <div class="flex justify-center">
        <a href="../Pages/About.php">
        <button class="inline-flex text-white  bg-gradient-to-r from-purple-600 to-pink-600 hover:bg-gradient-to-r hover:from-purple-900 hover:to-pink-900 text-white  border-0 py-2 px-6 focus:outline-none rounded-full text-lg">Know More</button>
        </a>
      </div>
    </div>
  </div>
</section>


<div class="flex items-center justify-center bg-gradient-to-r from-purple-600 to-pink-600">
        <div class="text-center bg-tramsparent text-white pt-10 pb-20">
            <h2 class="text-3xl font-bold mb-8">Mapping Our Journey</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="bg-white text-gray-900 p-8 rounded-lg shadow-md">
                    <p class="text-4xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 text-white text-transparent bg-clip-text">1.5+</p>
                    <p>Years Of Experience</p>
                </div>
                <div class="bg-white text-gray-900 p-8 rounded-lg shadow-md">
                    <p class="text-4xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 text-white text-transparent bg-clip-text">600+</p>
                    <p>Happy Families</p>
                </div>
                <div class="bg-white text-gray-900 p-8 rounded-lg shadow-md">
                    <p class="text-4xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 text-white text-transparent bg-clip-text">4+</p>
                    <p>Ongoing Projects</p>
                </div>
                <div class="bg-white text-gray-900 p-8 rounded-lg shadow-md">
                    <p class="text-4xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 text-white text-transparent bg-clip-text">100%</p>
                    <p>Happiness Guaranteed</p>
                </div>
            </div>
        </div>
    </div>


<section class="text-gray-600 body-font mr-0 md:mr-36 ml-0 md:ml-36">
<h2 class="text-center mt-20 text-5xl text-gray-900 font-extrabold leading-none">Why Choose  <span class='bg-gradient-to-r from-purple-600 to-pink-600 hover:bg-gradient-to-r hover:from-purple-900 hover:to-pink-900 text-white text-transparent bg-clip-text'>Us</span></h2>
  <div class="container px-5 py-10 md:py-20 mx-auto">
    
    <div class="flex flex-wrap sm:-m-4 -mx-4 -mb-10 -mt-4 md:space-y-0 space-y-6 p-4">
      <div class="p-10 md:w-1/3 flex flex-col text-center items-center hover:border-2  hover:rounded-md  hover:border-indigo-500 hover:shadow-2xl">
        <div class="w-20 h-20 inline-flex items-center justify-center text-indigo-500 mb-5 flex-shrink-0">
          <img src="../Assets/Images/Icons/Simplicity.png" alt="">
        </div>
        <divmass="flex-grow">
          <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Simplicity</h2>
          <p class="leading-relaxed text-base">We offer a wide range of services to assist you during the purchase of your home. Simply put, we assure your home buying process is hassle-free.</p>
          
        </divmass=>
      </div>
      <div class="p-10 md:w-1/3 flex flex-col text-center items-center hover:border-2  hover:rounded-md  hover:border-indigo-500 hover:shadow-2xl">
      <div class="w-20 h-20 inline-flex items-center justify-center text-indigo-500 mb-5 flex-shrink-0">
          <img src="../Assets/Images/Icons/Luxury.png" alt="">
        </div>
        <div class="flex-grow">
          <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Luxury</h2>
          <p class="leading-relaxed text-base">The luxury flats in Nagpur for sale at one of Engineers Horizon’s projects comes embellished with state-of-the design and finish.</p>
        </div>
      </div>
      <div class="p-10 md:w-1/3 flex flex-col text-center items-center hover:border-2  hover:rounded-md  hover:border-indigo-500 hover:shadow-2xl">
      <div class="w-20 h-20 inline-flex items-center justify-center text-indigo-500 mb-5 flex-shrink-0">
          <img src="../Assets/Images/Icons/Affordable_Rates.png" alt="">
        </div>
        <div class="flex-grow">
          <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Affordable Rates</h2>
          <p class="leading-relaxed text-base">We offer you the opportunity to buy a luxury and spacious apartment in the heart of Pune without breaking the bank.</p>
        </div>
      </div>
      <div class="p-10 md:w-1/3 flex flex-col text-center items-center hover:border-2  hover:rounded-md  hover:border-indigo-500 hover:shadow-2xl">
      <div class="w-20 h-20 inline-flex items-center justify-center text-indigo-500 mb-5 flex-shrink-0">
          <img src="../Assets/Images/Icons/Distinguished_Architecture.png" alt="">
        </div>
        <div class="flex-grow">
          <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Distinguished Architecture</h2>
          <p class="leading-relaxed text-base">We offer homes designed meticulously by seasoned architects and engineers using the most advanced technologies and scientific methodologies.</p>
          
        </div>
      </div>
      <div class="p-10 md:w-1/3 flex flex-col text-center items-center hover:border-2  hover:rounded-md  hover:border-indigo-500 hover:shadow-2xl">
      <div class="w-20 h-20 inline-flex items-center justify-center text-indigo-500 mb-5 flex-shrink-0">
          <img src="../Assets/Images/Icons/Community_Living.png" alt="">
        </div>
        <div class="flex-grow">
          <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Community Living</h2>
          <p class="leading-relaxed text-base">We’ve constructed residential projects in some of Pune’s most popular neighborhoods to house a community of welcoming, like-minded residents.</p>
          
        </div>
      </div><div class="p-10 md:w-1/3 flex flex-col text-center items-center hover:border-2  hover:rounded-md  hover:border-indigo-500 hover:shadow-2xl">
      <div class="w-20 h-20 inline-flex items-center justify-center text-indigo-500 mb-5 flex-shrink-0">
          <img src="../Assets/Images/Icons/Location.png" alt="">
        </div>
        <div class="flex-grow">
          <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Strategic Locations</h2>
          <p class="leading-relaxed text-base">Our residential projects are situated in Prime Locations across Pune, thus offering residents easy access to hospitals, schools, shopping malls, etc.</p>
        </div>
      </div>
    </div>
    <!-- <div class="mt-10 flex justify-center">
        <button class="inline-flex bg-gradient-to-r from-purple-600 to-pink-600 hover:bg-gradient-to-r hover:from-purple-900 hover:to-pink-900 text-white  border-0 py-2 px-6 focus:outline-none rounded text-lg">Know More</button>
      </div> -->
  </div>
</section>


<section class="text-gray-600 body-font mr-0 md:mr-36 ml-0 md:ml-36 mt-20">
        <h2 class="text-center -mb-0 md:-mb-10 text-5xl text-gray-900 font-extrabold">Our <span class='bg-gradient-to-r from-purple-600 to-pink-600 hover:bg-gradient-to-r hover:from-purple-900 hover:to-pink-900 text-white text-transparent bg-clip-text'>Projects</span></h2>
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


  <section class="text-gray-600 body-font mr-0 md:mr-36 ml-0 md:ml-36 mt-20">
        <h2 class="text-center -mb-0 md:-mb-10 text-5xl text-gray-900 font-extrabold">Recent <span class='bg-gradient-to-r from-purple-600 to-pink-600 hover:bg-gradient-to-r hover:from-purple-900 hover:to-pink-900 text-white text-transparent bg-clip-text'>Blog</span></h2>
        <div class="container px-5 py-20 mx-auto">
            <div class="horizontal-scroll p-5">
                <?php 
                // Display the remaining blog posts
                for ($i = 0; $i < count($blogposts); $i++) : 
                    $post = $blogposts[$i];
                ?>
                <a href="blog-detail.php?id=<?= $post['Post_ID'] ?>">
                <div class="item p-4 md:w-1/3 sm:mb-0 mb-6">
                    <div class="rounded-lg h-64 overflow-hidden">
                        <img alt="content" class="object-cover object-center h-full w-full" src="<?= htmlspecialchars($post['Post_Image_URL']) ?>">
                    </div>
                    <h2 class="text-xl font-medium title-font text-gray-900 mt-5"><?= htmlspecialchars($post['Post_Name']) ?></h2>
                    <p class="text-base leading-relaxed mt-2"><?= htmlspecialchars(substr($post['Post_Desc'], 0, 100)) ?>...</p>
                    <a href="blog-detail.php?id=<?= $post['Post_ID'] ?>" class="text-indigo-500 inline-flex items-center mt-3">Learn More
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


  <!-- testimonals -->
  <section class="text-gray-600 body-font mr-0 md:mr-36 ml-0 md:ml-36 -mt-20">
  <div class="container px-5 py-24 mx-auto">
  <h2 class="text-center mb-10 text-5xl text-gray-900 font-extrabold">Our <span class='bg-gradient-to-r from-purple-600 to-pink-600 text-white text-transparent bg-clip-text'>Reviews</span></h2>
    <div class="flex overflow-x-auto space-x-4 pb-10">
      <div class="flex-shrink-0 w-full md:w-1/2">
        <div class="h-full bg-gray-100 p-8 rounded">
          <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="block w-5 h-5 text-gray-400 mb-4" viewBox="0 0 975.036 975.036">
            <path d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z"></path>
          </svg>
          <p class="leading-relaxed mb-6">SQFT INFRA made my dream of owning a property in Nagpur a reality. Their team guided me through every step, ensuring a smooth and transparent process. Highly recommend their services for anyone looking for trustworthy real estate advice.</p>
          <a class="inline-flex items-center">
            <img alt="testimonial" src="../Assets/Images/Clients/1.jfif" class="w-12 h-12 rounded-full flex-shrink-0 object-cover object-center">
            <span class="flex-grow flex flex-col pl-4">
              <span class="title-font font-medium text-gray-900">Rajesh Sharma</span>
              <span class="text-gray-500 text-sm">Customer</span>
            </span>
          </a>
        </div>
      </div>
      <div class="flex-shrink-0 w-full md:w-1/2">
        <div class="h-full bg-gray-100 p-8 rounded">
          <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="block w-5 h-5 text-gray-400 mb-4" viewBox="0 0 975.036 975.036">
            <path d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z"></path>
          </svg>
          <p class="leading-relaxed mb-6">The professionalism and dedication of SQFT INFRA are unparalleled. They helped me find the perfect plot and handled all the paperwork seamlessly. Their commitment to customer satisfaction is commendable.</p>
          <a class="inline-flex items-center">
            <img alt="testimonial" src="../Assets/Images/Clients/4.png" class="w-12 h-12 rounded-full flex-shrink-0 object-cover object-center">
            <span class="flex-grow flex flex-col pl-4">
              <span class="title-font font-medium text-gray-900">Priya Mehta</span>
              <span class="text-gray-500 text-sm">Customer</span>
            </span>
          </a>
        </div>
      </div>
      <div class="flex-shrink-0 w-full md:w-1/2">
        <div class="h-full bg-gray-100 p-8 rounded">
          <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="block w-5 h-5 text-gray-400 mb-4" viewBox="0 0 975.036 975.036">
            <path d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z"></path>
          </svg>
          <p class="leading-relaxed mb-6">Buying property in Nagpur seemed daunting, but SQFT INFRA made it effortless. Their extensive knowledge and expertise in the local market gave me confidence. I appreciate their honesty and integrity in all dealings.</p>
          <a class="inline-flex items-center">
            <img alt="testimonial" src="../Assets/Images/Clients/3.jfif" class="w-12 h-12 rounded-full flex-shrink-0 object-cover object-center">
            <span class="flex-grow flex flex-col pl-4">
              <span class="title-font font-medium text-gray-900">Amit Verma</span>
              <span class="text-gray-500 text-sm">Customer</span>
            </span>
          </a>
        </div>
      </div>
      <div class="flex-shrink-0 w-full md:w-1/2">
        <div class="h-full bg-gray-100 p-8 rounded">
          <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="block w-5 h-5 text-gray-400 mb-4" viewBox="0 0 975.036 975.036">
            <path d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z"></path>
          </svg>
          <p class="leading-relaxed mb-6">मेरी रियल एस्टेट जरूरतों के लिए SQFT INFRA को चुनना सबसे अच्छा निर्णय था। उनकी टीम ज्ञानवान, उत्तरदायी और अपने ग्राहकों की वास्तव में परवाह करती है। उनकी उत्कृष्ट सेवा के लिए मैं आभारी हूँ और उनकी अत्यधिक सिफारिश करता हूँ।</p>
          <a class="inline-flex items-center">
            <img alt="testimonial" src="../Assets/Images/Clients/2.jfif" class="w-12 h-12 rounded-full flex-shrink-0 object-cover object-center">
            <span class="flex-grow flex flex-col pl-4">
              <span class="title-font font-medium text-gray-900">Ravi Patil</span>
              <span class="text-gray-500 text-sm">Customer</span>
            </span>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>




  <!-- footer -->
   <div class="h-10"></div>
  <?php include './Components/Footer.php';  ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="../Assets/Scripts/Banner.js"></script>
  <?php include './Components/Whatsapp.php' ?>
      
</body>
</html>