<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
    <meta http-equiv = "refresh" content = "2; url = ././Rewards_&_Loyalty.php" />
  <title>Thank You</title>
</head>
<body>
  <!-- Header -->
  <?php include './Components/Navbar.php'; ?>

  <!-- Thank You Message -->
  <section class="text-gray-600 body-font p-10 flex flex-col items-center">
    <img src="https://media.tenor.com/WsmiS-hUZkEAAAAj/verify.gif" class="w-20 mb-5" alt="Verification GIF">
    <h2 class="text-center text-5xl text-gray-900 font-extrabold">Thank You!</h2>
    <div class="mt-10">
      <p class="text-center text-xl text-gray-700">Your referral has been submitted successfully.</p>
    </div>
    <a href="./Rewards_&_Loyalty.php">
          <button class="flex mx-auto text-white bg-gradient-to-r from-purple-600 to-pink-600 hover:bg-gradient-to-r hover:from-purple-900 hover:to-pink-900 border-0 py-2 px-8 focus:outline-none rounded text-lg flex mt-10">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 pr-2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
          </svg>  
          Back to Referral</button>
          </a>
  </section>

  <!-- Footer -->
  <?php include './Components/Footer.php'; ?>
  <?php include './Components/Whatsapp.php'; ?>
</body>
</html>
