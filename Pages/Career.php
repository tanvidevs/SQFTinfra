<?php
include './Components/Func/dbcon.php';

// Handle search
$keyword = $_GET['keyword'] ?? '';
$location = $_GET['location'] ?? '';
$searchPerformed = isset($_GET['search']);

// Prepare the base query
$query = "SELECT id, title, company, job_type, employment_type, salary, location FROM job_listings WHERE is_active = TRUE";

// Add search conditions if a search was performed
if ($searchPerformed) {
    $query .= " AND (title LIKE ? OR company LIKE ?) AND location LIKE ?";
}

$query .= " ORDER BY created_at DESC";

// Prepare and execute the query
$stmt = mysqli_prepare($conn, $query);

if ($searchPerformed) {
    $keyword = "%$keyword%";
    $location = "%$location%";
    mysqli_stmt_bind_param($stmt, "sss", $keyword, $keyword, $location);
}

mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Check if it's an AJAX request
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    // If it's an AJAX request, only return the job listings
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <a href="job_details.php?id=<?php echo $row['id']; ?>">
                <div class="bg-gradient-to-r from-purple-50 to-pink-50 p-4 w-full rounded-lg shadow-md mb-6">
                    <h3 class="text-lg font-semibold"><?php echo htmlspecialchars($row['title']); ?></h3>
                    <p class="text-gray-600"><?php echo htmlspecialchars($row['company']); ?> <span class="text-green-500 ml-2">Actively hiring</span></p>
                    <div class="flex items-center mt-2 flex-wrap">
                        <span class="flex items-center text-gray-500 mr-4 mb-2 md:mb-0">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3M16 7V3M3 11H21M5 19H19M7 7H17M7 15H17"></path>
                            </svg>
                            <?php echo htmlspecialchars($row['job_type']); ?>
                        </span>
                        <span class="flex items-center text-gray-500 mr-4 mb-2 md:mb-0">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8V4M12 8L9 5M12 8L15 5M12 8L12 12M12 16C14.7614 16 17 13.7614 17 11C17 8.23858 14.7614 6 12 6C9.23858 6 7 8.23858 7 11C7 13.7614 9.23858 16 12 16Z"></path>
                            </svg>
                            <?php echo htmlspecialchars($row['employment_type']); ?>
                        </span>
                        <span class="flex items-center text-gray-500 mb-2 md:mb-0">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14L16 10M12 14L8 10M12 14V20"></path>
                            </svg>
                            <?php echo htmlspecialchars($row['salary']); ?>
                        </span>
                    </div>
                </div>
            </a>
            <?php
        }
    } else {
        echo "<p>No job listings found.</p>";
    }
    exit;
}
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>SQFTINFRA | Careers</title>
    <style>
        /* Your existing styles here */
    </style>
</head>
<body>
    <!-- Header -->
    <?php include './Components/Navbar.php'; ?>

    <!-- Fix Banner Image -->
    <div class="p-2 md:p-0 mr-0 md:mr-36 ml-0 md:ml-36 mt-0 md:mt-10">
        <img src="../Assets/Images/Page_Banner/Desktop/career-bg.png" alt="" class="mt-2 rounded-lg hidden md:block">
        <img src="../Assets/Images/Page_Banner/Mobile/m-career-bg.png" alt="" class="mt-2 rounded-lg md:hidden">
    </div>

    <div class="flex flex-col items-center justify-center mt-10 px-4">
        <form id="job-search-form" action="" method="GET" class="bg-white shadow-md rounded-lg sm:rounded-full flex flex-col sm:flex-row items-center p-4 sm:p-2 w-full max-w-4xl border">
            <div class="flex items-center px-4 w-full mb-4 sm:mb-0">
                <svg class="w-6 h-6 text-gray-400 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16c4.418 0 8-3.582 8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8zM21 21l-4.35-4.35"></path>
                </svg>
                <input id="keyword" name="keyword" class="outline-none text-gray-700 w-full" type="text" placeholder="Job title, keywords, or company" value="<?php echo htmlspecialchars($keyword); ?>" />
            </div>
            <div class="hidden sm:block h-8 border-l border-gray-300 mx-2"></div>
            <div class="flex items-center px-4 w-full mb-4 sm:mb-0">
                <svg class="w-6 h-6 text-gray-400 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 10c0 7.732-9 13-9 13s-9-5.268-9-13a9 9 0 1118 0zM13 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
                <input id="location" name="location" class="outline-none text-gray-700 w-full" type="text" placeholder="nagpur, maharashtra" value="<?php echo htmlspecialchars($location); ?>" />
            </div>
            <input type="hidden" name="search" value="1">
            <button type="submit" class="bg-gradient-to-r from-purple-600 to-pink-600 hover:bg-gradient-to-r hover:from-purple-900 hover:to-pink-900 text-white transition-colors duration-300 text-center rounded-full px-6 py-2 w-full sm:w-auto">
                <span class="sm:hidden">Search</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 hidden sm:block">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
            </button>
        </form>
    </div>

<div class="container mt-10 mx-auto px-4 md:px-36 flex flex-col md:flex-row">
    <!-- Job Cards with internal scroll -->
    <div class="w-full md:w-3/5 md:h-[calc(85vh-180px)] md:overflow-y-auto p-2">
        <div id="job-listings">
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <a href="job_details.php?id=<?php echo $row['id']; ?>">
                    <div class="bg-gradient-to-r from-purple-50 to-pink-50 p-4 w-full rounded-lg shadow-md mb-6">
                        <h3 class="text-lg font-semibold"><?php echo htmlspecialchars($row['title']); ?></h3>
                        <p class="text-gray-600"><?php echo htmlspecialchars($row['company']); ?> <span class="text-green-500 ml-2">Actively hiring</span></p>
                        <div class="flex items-center mt-2 flex-wrap">
                            <span class="flex items-center text-gray-500 mr-4 mb-2 md:mb-0">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3M16 7V3M3 11H21M5 19H19M7 7H17M7 15H17"></path>
                                </svg>
                                <?php echo htmlspecialchars($row['job_type']); ?>
                            </span>
                            <span class="flex items-center text-gray-500 mr-4 mb-2 md:mb-0">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8V4M12 8L9 5M12 8L15 5M12 8L12 12M12 16C14.7614 16 17 13.7614 17 11C17 8.23858 14.7614 6 12 6C9.23858 6 7 8.23858 7 11C7 13.7614 9.23858 16 12 16Z"></path>
                                </svg>
                                <?php echo htmlspecialchars($row['employment_type']); ?>
                            </span>
                            <span class="flex items-center text-gray-500 mb-2 md:mb-0">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14L16 10M12 14L8 10M12 14V20"></path>
                                </svg>
                                <?php echo htmlspecialchars($row['salary']); ?>
                            </span>
                        </div>
                    </div>
                    </a>
                    <?php
                }
            } else {
                echo "<p>No job listings found.</p>";
            }
            ?>
        </div>
    </div>
    <!-- Static image section -->
    <div class="mt-6 md:mt-0 ml-0 md:ml-5 w-full md:w-2/5">
        <img src="../Assets/Images/General/Job.svg" class="rounded-lg" alt="">
    </div>
</div>

    <!-- footer -->
    <div class="h-10"></div>
    <?php include './Components/Footer.php'; ?>
    <?php include './Components/Whatsapp.php' ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#job-search-form').on('submit', function(e) {
            e.preventDefault();
            var keyword = $('#keyword').val();
            var location = $('#location').val();
            $.ajax({
                url: window.location.href,
                method: 'GET',
                data: {
                    keyword: keyword,
                    location: location,
                    search: 1
                },
                success: function(response) {
                    $('#job-listings').html(response);
                },
                error: function() {
                    $('#job-listings').html('<p>Error loading job listings. Please try again.</p>');
                }
            });
        });
    });
    </script>

</body>
</html>

<?php
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>