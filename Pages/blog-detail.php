<?php
// Database connection
include './Components/Func/dbcon.php';

// Check if Post_ID is provided in the URL
if (isset($_GET['id'])) {
    $postId = $_GET['id'];
    
    // Fetch the specific blog post
    $sql = "SELECT * FROM blogpost WHERE Post_ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $postId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $post = $result->fetch_assoc();
    } else {
        // Redirect to the main blog page if post not found
        header("Location: blog.php");
        exit();
    }
} else {
    // Redirect to the main blog page if no ID provided
    header("Location: blog.php");
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
  <title>SQFTINFRA | <?= htmlspecialchars($post['Post_Name']) ?></title>
</head>
<body>
    <!-- Header -->
    <?php include './Components/Navbar.php';  ?>

    <!-- Blog Post Details -->
    <section class="text-gray-600 body-font mr-0 md:mr-36 ml-0 md:ml-36">
        <div class="container px-5 py-5 mx-auto">
            <div class="flex flex-col items-center">
                <img class="lg:w-2/3 md:w-3/4 w-full mb-10 object-cover object-center rounded" alt="hero" src="<?= htmlspecialchars($post['Post_Image_URL']) ?>">
                <div class="lg:w-2/3 w-full">
                                        
                    <h1 class="title-font sm:text-4xl text-center md:text-justify text-3xl mb-4 font-medium text-gray-900"><?= htmlspecialchars($post['Post_Name']) ?></h1>
                    <p class="text-sm text-gray-500 mb-2 text-center md:text-justify"><span class="bg-gradient-to-r from-purple-600 to-pink-600 text-white text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900"><?= htmlspecialchars($post['Post_Category']) ?></span></p>
                    <p class="text-sm bg-gradient-to-r from-purple-600 to-pink-600 text-white text-transparent bg-clip-text mb-2 text-center md:text-justify mt-5">Published on <?= date("F j, Y", strtotime($post['Created_At']))?></p>
                    <p class="mb-8 leading-relaxed text-justify p-2 md:p-0"><?= nl2br(htmlspecialchars($post['Post_Desc'])) ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include './Components/Footer.php';  ?>
    <?php include './Components/Whatsapp.php' ?>

</body>
</html>