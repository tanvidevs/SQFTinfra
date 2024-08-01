<?php
include './Components/Func/dbcon.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialize an array to store validation errors
    $errors = [];

    // Validate each field
    $required_fields = ['name', 'email', 'Phone', 'wur', 'ref_name', 'ref_email', 'ref_number', 'reftype'];
    
    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            $errors[] = ucfirst($field) . " is required.";
        }
    }

    // If there are no errors, proceed with form submission
    if (empty($errors)) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $number = $_POST['Phone'];
        $wur = $_POST['wur'];
        $ref_name = $_POST['ref_name'];
        $ref_email = $_POST['ref_email'];
        $ref_number = $_POST['ref_number'];
        $reftype = $_POST['reftype'];
        $message = $_POST['message'];

        // SQL query to insert data into the database
        $sql = "INSERT INTO referrals (name, email, number, wur, ref_name, ref_email, ref_number, reftype, message) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("sssssssss", $name, $email, $number, $wur, $ref_name, $ref_email, $ref_number, $reftype, $message);

            if ($stmt->execute()) {
                // Redirect to thank-you page after successful submission
                header("Location: thankyou.php");
                exit();
            } else {
                echo "<script>alert('Error: Could not submit your referral. Please try again later.');</script>";
            }

            $stmt->close();
        } else {
            echo "<script>alert('Error: Could not prepare statement. Please try again later.');</script>";
        }
        $conn->close();
    } else {
        // Display validation errors
        $error_message = implode("\\n", $errors);
        echo "<script>alert('Please correct the following errors:\\n" . $error_message . "');</script>";
    }
}
?>

<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>SQFTINFRA | Rewards & Loyalty</title>
</head>
<body>
 <!-- Header -->
 <?php include './Components/Navbar.php';  ?>

 <!-- Fix Banner Image  -->
 <div class="p-2 md:p-0 mr-0 md:mr-36 ml-0 md:ml-36 mt-0 md:mt-10">
    <!-- visible on desktop only -->
    <img src="../Assets/Images/Page_Banner/Desktop/R&L-bg.png" alt="" class="mt-2 rounded-lg hidden md:block">    
    
    <!-- visible on mobile only -->
    <img  src="../Assets/Images/Page_Banner/Mobile/m-R&L-bg.png" alt="" class="mt-2 rounded-lg md:hidden">
</div>


<section class="text-gray-600 body-font mr-0 md:mr-36 ml-0 md:ml-36">
<h2 class="text-center mt-20 -mb-0 md:-mb-10 text-5xl text-gray-900 font-extrabold">Our <span class='bg-gradient-to-r from-purple-600 to-pink-600 hover:bg-gradient-to-r hover:from-purple-900 hover:to-pink-900 text-white text-transparent bg-clip-text'>Rewards</span></h2>
  <div class="container px-5 py-10 md:py-24 mx-auto">
    <div class="flex flex-wrap -m-4">
      <div class="p-4 lg:w-1/3">
        <div class="h-full bg-gradient-to-r from-purple-200 to-pink-200 bg-opacity-75 px-8 pt-16 pb-24 rounded-lg overflow-hidden text-center relative">
        <div class="flex justify-center">
            <img src="../Assets/Images/Icons/1.png" class="mb-2 w-36" alt="">
        </div>
          <h1 class="title-font sm:text-lg text-xl font-bold text-gray-900 mb-3">You Are Eligible For A Loyalty Discount If You Are</h1>
          <div class="pl-4 pr-4">
            <p class="leading-relaxed mb-3">
              <ol class="list-disc text-justify">
                  <li>Referring valid name</li>
                  <li>Referral purchases SQFT Infra property</li>
                  <li>Attend programs and events by SQFT Infra</li>
              </ol>
            </p>
          </div>
        </div>
      </div>
      <div class="p-4 lg:w-1/3">
        <div class="h-full bg-gradient-to-r from-purple-200 to-pink-200 bg-opacity-75 px-8 pt-16 pb-24 rounded-lg overflow-hidden text-center relative">
        <div class="flex justify-center">
            <img src="../Assets/Images/Icons/2.png" class="mb-2 w-36" alt="">
        </div>
        <h1 class="title-font sm:text-lg text-xl font-bold text-gray-900 mb-3">Referral Program</h1>
        <div class="pl-4 pr-4">
            <p class="text-justify mb-3">
            Get the privilege of being Engineers Horizon’s esteemed customer and experience unique rewards and benefits.
            </p>
          </div>
        </div>
      </div>
      <div class="p-4 lg:w-1/3">
        <div class="h-full bg-gradient-to-r from-purple-200 to-pink-200 bg-opacity-75 px-8 pt-16 pb-24 rounded-lg overflow-hidden text-center relative">
        <div class="flex justify-center">
            <img src="../Assets/Images/Icons/3.png" class="mb-2 w-36" alt="">
        </div>
        <h1 class="title-font sm:text-lg text-xl font-bold text-gray-900 mb-3">Terms And Conditions</h1>
        <div class="pl-4 pr-4">
            <p class="leading-relaxed mb-3">
              <ol class="list-disc text-justify">
                  <li><b>Referee :</b> Any customer who books a new flat with us.</li>
                  <li><b>Referrer :</b> Anyone who refers a new prospect.</li>
                  <li><b>Vendor :</b> Any registered contractor, Sub-contractor, vendor, supplier, or any current employee of a contractor, sub-contractor, supplier, or vendor associated with SQFT Infra group.</li>
              </ol>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- application form -->
<section class="text-gray-600 body-font p-10">
  <h2 class="text-center text-5xl text-gray-900 font-extrabold">Apply  <span class='bg-gradient-to-r from-purple-600 to-pink-600 hover:bg-gradient-to-r hover:from-purple-900 hover:to-pink-900 text-white text-transparent bg-clip-text'>Referral</span></h2>
  <div class="mr-0 md:mr-36 ml-0 md:ml-36 mt-10">
    <form action="" method="POST">
      <div class="flex flex-wrap -m-2">
        <div class="p-2 w-1/2">
          <div class="relative">
            <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
            <input type="text" id="name" name="name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
          </div>
        </div>
        <div class="p-2 w-1/2">
          <div class="relative">
            <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
            <input type="email" id="email" name="email" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
          </div>
        </div>
        <div class="p-2 w-1/2">
          <div class="relative">
            <label for="Phone" class="leading-7 text-sm text-gray-600">Phone</label>
            <input type="text" id="Phone" name="Phone" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
          </div>
        </div>
        <div class="p-2 w-1/2">
          <div class="relative">
            <label for="wur" class="leading-7 text-sm text-gray-600">Working Under Role</label>
            <select id="wur" name="wur" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              <option>Referrer</option>
              <option>Referee</option>
              <option>Vendor</option>
            </select>
          </div>
        </div>
        <div class="p-2 w-1/2">
          <div class="relative">
            <label for="ref_name" class="leading-7 text-sm text-gray-600">Referral's Name</label>
            <input type="text" id="ref_name" name="ref_name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
          </div>
        </div>
        <div class="p-2 w-1/2">
          <div class="relative">
            <label for="ref_email" class="leading-7 text-sm text-gray-600">Referral's Email</label>
            <input type="email" id="ref_email" name="ref_email" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
          </div>
        </div>
        <div class="p-2 w-1/2">
          <div class="relative">
            <label for="ref_number" class="leading-7 text-sm text-gray-600">Referral's Phone</label>
            <input type="text" id="ref_number" name="ref_number" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
          </div>
        </div>
        <div class="p-2 w-1/2">
          <div class="relative">
            <label for="reftype" class="leading-7 text-sm text-gray-600">Referral Type</label>
            <select id="reftype" name="reftype" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              <option>Customer</option>
              <option>Contractor</option>
              <option>Vendor</option>
              <option>Employee</option>
            </select>
          </div>
        </div>
        <div class="p-2 w-full">
          <div class="relative">
            <label for="message" class="leading-7 text-sm text-gray-600">Message</label>
            <textarea id="message" name="message" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
          </div>
        </div>
        <div class="p-2 w-full">
          <button class="flex mx-auto text-white bg-gradient-to-r from-purple-600 to-pink-600 border-0 py-2 px-8 focus:outline-none hover:bg-gradient-to-r hover:from-purple-900 hover:to-pink-900 rounded-full text-lg">Submit Referral</button>
        </div>
      </div>
    </form>
  </div>
</section>

 <!-- Footer -->
 <?php include './Components/Footer.php';  ?>
 <?php include './Components/Whatsapp.php' ?>

</body>
</html>
