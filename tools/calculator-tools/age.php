<?php
// Function to calculate detailed time differences
function calculateTimeDetails($date)
{
    // Get the current date and calculate the difference in seconds
    $currentDate = new DateTime();
    $targetDate = new DateTime($date);
    $interval = $currentDate->diff($targetDate);

    // Get the years, months, days, weeks, minutes, and seconds
    $years = $interval->y;
    $months = $interval->m;
    $days = $interval->d;

    // Additional time details
    $totalMonths = ($years * 12) + $months;
    $totalWeeks = floor($interval->days / 7);
    $totalDays = $interval->days;
    $totalMinutes = $totalDays * 24 * 60;
    $totalSeconds = $totalDays * 24 * 60 * 60;

    return [
        'years' => $years,
        'months' => $months,
        'days' => $days,
        'totalMonths' => $totalMonths,
        'totalWeeks' => $totalWeeks,
        'totalDays' => $totalDays,
        'totalMinutes' => $totalMinutes,
        'totalSeconds' => $totalSeconds
    ];
}

// Function to generate all months of a selected year and their detailed age information
function generateMonthDetails($year)
{
    $months = [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December"
    ];

    $monthDetails = [];

    foreach ($months as $index => $month) {
        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $index + 1, $year);

        $monthDetails[$month] = [];

        // Calculate details for each day of the month
        for ($day = 1; $day <= $daysInMonth; $day++) {
            $date = "$year-" . str_pad($index + 1, 2, "0", STR_PAD_LEFT) . "-" . str_pad($day, 2, "0", STR_PAD_LEFT);
            $details = calculateTimeDetails($date);
            $monthDetails[$month][] = [
                'date' => $date,
                'details' => $details
            ];
        }
    }

    return $monthDetails;
}

// Get the year from the user input (default to current year)
$selectedYear = isset($_GET['year']) ? $_GET['year'] : date('Y');

// Generate the details for the selected year
$monthDetails = generateMonthDetails($selectedYear);
?>



<?php
include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/routes.php')
    ? $_SERVER['DOCUMENT_ROOT'] . '/routes.php'
    : $_SERVER['DOCUMENT_ROOT'] . '/zoop/routes.php';


$title = 'Convert JPG to PNG Online - Free & Easy JPG to PNG Converter';
$description = 'Use our Free Online Bulk Image Converter JPG images to PNG format with proper compression methods. Zooptools also have other converter tools. Try them now.';
$canonical = 'jpg-to-png';

$style = '';

ob_start();
?>


<style>
    .month-header {
        font-size: 24px;
        margin: 20px auto;
        text-align: center;
    }

    .day-details {
        margin-left: 20px;
        font-size: 16px;
        margin-bottom: 10px;
    }

    .day-details strong {
        font-size: 18px;
    }

    .month-details-container {
        margin-bottom: 30px;
    }

    table {
        width: 100%;
        border-spacing: 0;
    }

    table tr td {
        padding: 1%;
        border: .5px solid grey;
    }

    table tr td p {
        margin: 0;
    }
</style>
<style>
    .containerx-flex {
        margin: 5% 0;
        width: 100%;
        gap: 1%;
        display: flex;
    }

    .containerxr1 {
        flex: 30%;
        /* max-width: 600px; */
        margin: 0 auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .containerxr2 {
        flex: 70%;
        margin: 0 auto;
        background-color: #fff;
        padding: 5px 10px;
        border-radius: 8px;
    }

    input[type="date"] {
        padding: 8px;
        font-size: 16px;
        margin: 10px 0;
        width: 100%;
        border-bottom: 1px solid #ccc;
        border-radius: 4px;
    }

    button {
        padding: 10px 20px;
        font-size: 16px;
        background-color: var(--primary-accent);
        color: white;
        border-bottom: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button:hover {
        background-color: var(--primary-accent);
    }

    .ageresult {
        margin-top: 2%;
        padding: 10px;
        background-color: rgb(255, 255, 255);
        border-radius: 4px;
    }

    .ageresult h3 {
        margin: 0;
        color: #333;
    }

    .ageresult table {
        border-collapse: collapse;
        width: 100%;
        margin-top: 5%;
    }

    .ageresult table tr th {
        text-align: start;
        padding: 2% 1%;
        border-bottom: 2px solid black;
    }

    .ageresult table tr td {
        text-align: start;
        padding: 2% 1%;
        border-bottom: 2px solid black;
    }

    .box-age {
        border: 1px solid black;
        border-radius: 5px;
        padding: 1.5%;
    }

    .box-age p {
        margin: 0;
    }

    .year-list {
        display: block;
        width: 100%;
    }

    .year-list a {
        display: block;
        width: 100%;
        text-align: center;
        height: 40px;
        line-height: 40px;
    }

    .year-list a:hover {
        background-color: var(--primary-accent);
        color: white;
    }

    .scrollyears {
        width: 100%;
        max-height: 800px;
        overflow: auto;
    }

    .list-of-months {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .list-of-months a {
        display: block;
        padding: 10px 25px;
        border: 1px solid var(--primary-accent);
        color: var(--primary-accent);
        border-radius: 10px;
    }

    .list-of-months a:hover {
        color: white;
        background-color: var(--primary-accent);
        border-radius: 10px;
    }
    .td{
        background-color: var(--primary-accent);
        color: white;
        border-color: #fff;
    }
</style>
<div class="container">
    <div class="containerx-flex">
        <div class="containerxr1">
            <div class="scrollyears">
                <?php for ($year = 1925; $year <= date('Y'); $year++) { ?>
                    <div class="year-list"><a href="<?= base_url() ?>year/<?php echo $year; ?>"><?php echo 'Born In ' . $year . ' my age ?'; ?></a></div>
                <?php } ?>
            </div>
        </div>
        <div class="containerxr2">
            <div class="list-of-months">
                <a href="#january">January</a>
                <a href="#febrary">Febrary</a>
                <a href="#march">March</a>
                <a href="#april">April</a>
                <a href="#may">May</a>
                <a href="#june">June</a>
                <a href="#july">July</a>
                <a href="#august">August</a>
                <a href="#september">September</a>
                <a href="#october">October</a>
                <a href="#november">November</a>
                <a href="#december">December</a>
            </div>
            <?php foreach ($monthDetails as $month => $details) { ?>

                <div class="month-details-container" id="<?= strtolower($month) ?>">
                    <div class="month-header"><?php echo $month; ?> - <?php echo $selectedYear; ?></div>

                    <table>
                    <?php foreach ($details as $dayDetail) { ?>
                            <tr  >
                                <td class="td"><b style="font-size: .9rem;"><?php echo date('d F Y, l', strtotime($dayDetail['date'])); ?></b></td>
                                <td>
                                    <p style="font-size: 1rem;"><b><?php echo $dayDetail['details']['years']; ?> Years, <?php echo $dayDetail['details']['months']; ?> Months, <?php echo $dayDetail['details']['days']; ?> Days</b></p>
                                    or <small><b><?php echo $dayDetail['details']['totalMonths']; ?></b> months, or <b><?php echo $dayDetail['details']['totalWeeks']; ?></b> weeks, or <b><?php echo $dayDetail['details']['totalDays']; ?></b> days, or <b><?php echo $dayDetail['details']['totalMinutes']; ?></b> minutes, or <b><?php echo $dayDetail['details']['totalSeconds']; ?></b> seconds</small>
                                </td>
                            </tr>
                    <?php } ?>
                    </table> 
                </div>
            <?php } ?>
        </div>
    </div>
</div>


<?php
$tool_container = ob_get_clean();
include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/inc/base.php')
    ? $_SERVER['DOCUMENT_ROOT'] . '/inc/base.php'
    : $_SERVER['DOCUMENT_ROOT'] . '/zoop/inc/base.php';
?>