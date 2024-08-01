<?php
include './Components/Func/dbcon.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Collect form data
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  // Validate form data (you can add more validation)
  if (!empty($name) && !empty($phone) && !empty($email) && !empty($message)) {
    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO contact_form (name, phone, email, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $phone, $email, $message);

    // Execute the statement
    if ($stmt->execute()) {
      echo '
       <script>
          function submitButton() {
            alert("Thank you for your submission!");
          }
      </script>
      ';
    } else {
      echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
  } else {
    echo "All fields are required!";
  }
}

// Close connection
$conn->close();
?>


<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>SQFTINFRA | Contact</title>
</head>
<body>
 <!-- Header -->
 <?php include './Components/Navbar.php';  ?>

 <!-- Fix Banner Image  -->
 <div class="p-2 md:p-0 mr-0 md:mr-36 ml-0 md:ml-36 mt-0 md:mt-10">
    <!-- visible on desktop only -->
    <img src="../Assets/Images/Page_Banner/Desktop/Contact-bg.png" alt="" class="mt-2 rounded-lg hidden md:block">    
    
    <!-- visible on mobile only -->
    <img src="../Assets/Images/Page_Banner/Mobile/m-Contact-bg.png" alt="" class="mt-2 rounded-lg md:hidden">
</div>

<section class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
  <h2 class="text-center mt-10 mb-5 text-3xl sm:text-4xl md:text-5xl text-gray-900 font-extrabold">
    Request for <span class='bg-gradient-to-r from-purple-600 to-pink-600 hover:bg-gradient-to-r hover:from-purple-900 hover:to-pink-900 text-white text-transparent bg-clip-text'>Callback</span>
  </h2>
  <div class="container py-10 mx-auto flex flex-col lg:flex-row">
    <div class="w-full lg:w-2/3 bg-gray-50 rounded-lg overflow-hidden mb-10 lg:mb-0 lg:mr-10 p-6 flex items-end justify-start relative">
      <iframe width="100%" height="100%" class="absolute inset-0" frameborder="0" title="map" marginheight="0" marginwidth="0" scrolling="no" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3722.449323923748!2d79.096457274771!3d21.094645285513373!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bd4bfaf651a68fd%3A0x3bb0086c92a7f723!2sSQFT%20INFRA!5e0!3m2!1sen!2sin!4v1721584954395!5m2!1sen!2sin"></iframe>
      <div class="bg-white relative flex flex-wrap py-6 rounded shadow-md">
        <div class="lg:w-1/2 px-6">
          <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs">ADDRESS</h2>
          <p class="mt-1">Bhavani market, F 10 &11, behind Bhavani sabhagruh, Manewada besa road, Nagpur 440034</p>
        </div>
        <div class="lg:w-1/2 px-6 mt-4 lg:mt-0">
          <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs">EMAIL</h2>
          <a class="text-indigo-500 leading-relaxed">sqftinfra049@gmail.com</a>
          <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs mt-4">PHONE</h2>
          <p class="leading-relaxed">+91 9527151078</p>
        </div>
      </div>
    </div>
    <div class="w-full lg:w-1/3 bg-white flex flex-col md:ml-auto mt-8 lg:mt-0">
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h2 class="text-gray-900 text-lg mb-1 font-bold title-font">Ask For More Details</h2>
        <p class="leading-relaxed mb-5 text-gray-600">SqftInfra Team will get back to you within 48 hrs</p>
        <div class="relative mb-4">
          <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
          <input type="text" id="name" name="name" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
        </div>
        <div class="relative mb-4">
          <label for="phone" class="leading-7 text-sm text-gray-600">Phone</label>
          <input type="tel" id="phone" name="phone" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
        </div>
        <div class="relative mb-4">
          <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
          <input type="email" id="email" name="email" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
        </div>
        <div class="relative mb-4">
          <label for="message" class="leading-7 text-sm text-gray-600">Message</label>
          <textarea id="message" name="message" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
        </div>
        <button type="submit"  onclick="submitButton()" class="text-white bg-gradient-to-r from-purple-600 to-pink-600 hover:bg-gradient-to-r hover:from-purple-900 hover:to-pink-900 border-0 py-2 px-6 focus:outline-none rounded-full text-lg">Submit</button>
      </form>
    </div>
  </div>
</section>

 <!-- footer -->
 <div class="h-10"></div>
 <?php include './Components/Footer.php';  ?>
 <?php include './Components/Whatsapp.php' ?>

</body>
</html>