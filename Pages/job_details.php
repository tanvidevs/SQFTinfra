<?php
include './Components/Func/dbcon.php';

$job_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($job_id > 0) {
    $query = "SELECT * FROM job_listings WHERE id = ? AND is_active = TRUE";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $job_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($job = mysqli_fetch_assoc($result)) {
        // Job details found, display them
        ?>
        <!doctype html>
        <html>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <script src="https://cdn.tailwindcss.com"></script>
            <title><?php echo htmlspecialchars($job['title']); ?> - SQFTINFRA</title>
        </head>
        <body>
            <?php include './Components/Navbar.php'; ?>

            <div class="container mx-auto px-4 py-8">
                <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
                    <div class="px-6 py-8">
                        <h1 class="text-3xl font-bold mb-4"><?php echo htmlspecialchars($job['title']); ?></h1>
                        <p class="text-xl mb-2"><?php echo htmlspecialchars($job['company']); ?></p>
                        <p class="text-gray-600 mb-4"><?php echo htmlspecialchars($job['location']); ?></p>
                        <div class="flex flex-wrap mb-6">
                            <div class="w-full sm:w-1/2 mb-4">
                                <span class="font-bold">Job Type:</span> <?php echo htmlspecialchars($job['job_type']); ?>
                            </div>
                            <div class="w-full sm:w-1/2 mb-4">
                                <span class="font-bold">Employment Type:</span> <?php echo htmlspecialchars($job['employment_type']); ?>
                            </div>
                            <div class="w-full sm:w-1/2 mb-4">
                                <span class="font-bold">Salary:</span> <?php echo htmlspecialchars($job['salary']); ?>
                            </div>
                        </div>
                        <div class="mb-6">
                            <h2 class="text-2xl font-bold mb-2">Job Description</h2>
                            <p class="text-gray-700 text-justify"><?php echo nl2br(htmlspecialchars($job['description'])); ?></p>
                        </div>
                        <div class="mb-6">
                            <h2 class="text-2xl font-bold mb-2">Requirements</h2>
                            <ul class="list-disc list-inside text-gray-700 text-justify">
                                <?php
                                $requirements = explode("\n", $job['requirements']);
                                foreach ($requirements as $requirement) {
                                    echo "<li>" . htmlspecialchars(trim($requirement)) . "</li>";
                                }
                                ?>
                            </ul>
                        </div>
                        <div>
                            <a href="#" class="text-white bg-gradient-to-r from-purple-600 to-pink-600 border-0 py-2 px-8 focus:outline-none hover:bg-gradient-to-r hover:from-purple-900 hover:to-pink-900 rounded text-lg rounded-full">
                                Apply Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <?php include './Components/Footer.php'; ?>
            <?php include './Components/Whatsapp.php' ?>
        </body>
        </html>
        <?php
    } else {
        // Job not found
        ?>
        <!doctype html>
        <html>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <script src="https://cdn.tailwindcss.com"></script>
            <title>Job Not Found - SQFTINFRA</title>
        </head>
        <body>
            <?php include './Components/Navbar.php'; ?>

            <div class="container mx-auto px-4 py-8">
                <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
                    <div class="px-6 py-8">
                        <h1 class="text-3xl font-bold mb-4">Job Not Found</h1>
                        <p class="text-gray-700">Sorry, the job you're looking for doesn't exist or has been removed.</p>
                        <div class="mt-6">
                            <a href="index.php" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                                Back to Job Listings
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <?php include './Components/Footer.php'; ?>
            <?php include './Components/Whatsapp.php' ?>
        </body>
        </html>
        <?php
    }

    mysqli_stmt_close($stmt);
} else {
    // Invalid job ID
    ?>
    <!doctype html>
    <html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <title>Invalid Job ID - SQFTINFRA</title>
    </head>
    <body>
        <?php include './Components/Navbar.php'; ?>

        <div class="container mx-auto px-4 py-8">
            <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="px-6 py-8">
                    <h1 class="text-3xl font-bold mb-4">Invalid Job ID</h1>
                    <p class="text-gray-700">The job ID provided is invalid. Please try again with a valid job ID.</p>
                    <div class="mt-6">
                        <a href="index.php" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                            Back to Job Listings
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <?php include './Components/Footer.php'; ?>
        <?php include './Components/Whatsapp.php' ?>
    </body>
    </html>
    <?php
}

mysqli_close($conn);
?>