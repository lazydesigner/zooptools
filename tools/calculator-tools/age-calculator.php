<?php
include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/routes.php')
    ? $_SERVER['DOCUMENT_ROOT'] . '/routes.php'
    : $_SERVER['DOCUMENT_ROOT'] . '/zoop/routes.php';


$title = 'Convert JPG to PNG Online - Free & Easy JPG to PNG Converter';
$description = 'Use our Free Online Bulk Image Converter JPG images to PNG format with proper compression methods. Zooptools also have other converter tools. Try them now.';
$canonical = 'age-calculator';

$style = '';

ob_start();
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get input values from the form
    $dob = $_POST['dob']; // Date of birth (YYYY-MM-DD)
    $given_date = $_POST['given_date']; // Given date (YYYY-MM-DD)

    // Convert the input dates to DateTime objects
    $dob_date = new DateTime($dob);
    $given_date_obj = new DateTime($given_date);

    // Calculate the difference between the two dates
    $interval = $dob_date->diff($given_date_obj);

    // Calculate total age in months, weeks, days, minutes, and seconds
    $years = $interval->y;
    $months = $interval->m;
    $days = $interval->d;

    // Calculate the total age in months
    $total_months = ($years * 12) + $months;

    // Calculate total weeks (approximate by dividing days by 7)
    $total_weeks = floor($interval->days / 7);

    // Get total days
    $total_days = $interval->days;

    $total_hours = $total_days * 24;

    // Calculate total minutes
    $total_minutes = $total_days * 24 * 60;

    // Calculate total seconds
    $total_seconds = $total_days * 24 * 60 * 60;

    // ========================================================= //

    $currentDate = new DateTime();

    // Create a DateTime object for the upcoming birthday
    $birthday = new DateTime($dob);
    $birthday->setDate($currentDate->format('Y'), $birthday->format('m'), $birthday->format('d'));

    // If the birthday has already passed this year, calculate the next year's birthday
    if ($currentDate > $birthday) {
        $birthday->setDate($currentDate->format('Y') + 1, $birthday->format('m'), $birthday->format('d'));
    }

    // Calculate the difference
    $dobinterval = $currentDate->diff($birthday);

    // Get the remaining months and days
    $remainingMonths = $dobinterval->m;
    $remainingDays = $dobinterval->d;

    $youbirthday = "Your next birthday is in " . $dobinterval->format('%m months and %d days') . ".";
}
?>

<style>
    .containerx-flex{
        margin: 5% 0;
        width: 100%;
        gap: 2%;
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
        padding: 5px 20px;
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
    .year-list{
        display: block;
        width: 100%;
    }
    .year-list a{
        display: block;
        width: 100%;
        text-align: center;
        height: 40px;
        line-height: 40px;
    }
    .year-list a:hover{background-color: var(--primary-accent);color: white;}
    .scrollyears{
        width: 100%;
        max-height: 800px;
        overflow: auto;
    }

</style>
<div class="container">
<div class="containerx-flex">
    <div class="containerxr1">
        <div class="scrollyears">
        <?php for ($year = 1925; $year <= date('Y'); $year++) { ?>
            <div class="year-list"><a href="<?=base_url() ?>year/<?php echo $year; ?>"><?php echo 'Born In '.$year.' my age ?'; ?></a></div>
        <?php } ?>
        </div>
    </div>
    <div class="containerxr2">
        <h1>Age Calculator</h1>
        <form method="POST">
            <label for="dob">Date of Birth:</label>
            <input type="date" name="dob" id="dob" required><br>

            <label for="given_date">Given Date:</label>
            <input type="date" name="given_date" id="given_date" required><br>

            <button type="submit">Calculate Age</button>
        </form>

        <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
            <div class="ageresult">
                <div class="box-age">
                    <strong>Your Age is</strong>
                    <p><?php echo $years . " Years, " . $months . " Months, " . $days . " Days"; ?></p>
                </div>

                <table>
                    <tr>
                        <th colspan="2" style="text-align: center;">You Already Lived</th>
                    </tr>
                    <tr>
                        <th>Next B'Day after</th>
                        <td><?= $youbirthday ?></td>
                    </tr>
                    <tr>
                        <th>In Years: </th>
                        <td><?php echo $years . " Years, " ?></td>
                    </tr>
                    <tr>
                        <th>In Months: </th>
                        <td><?php echo $total_months . " Months, "  ?></td>
                    </tr>
                    <tr>
                        <th>In Weeks: </th>
                        <td><?= $total_weeks . ' Weeks' ?></td>
                    </tr>
                    <tr>
                        <th>In Days: </th>
                        <td><?php echo $total_days . " Days"; ?></td>
                    </tr>
                    <tr>
                        <th>In Hours: </th>
                        <td><?= $total_hours . ' Hours' ?></td>
                    </tr>
                    <tr>
                        <th>In Minutes: </th>
                        <td><?php echo $total_minutes . " Minutes"; ?></td>
                    </tr>
                    <tr>
                        <th>In Seconds: </th>
                        <td><?php echo $total_seconds . " Seconds"; ?></td>
                    </tr>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>
</div>


<?php
$tool_container = ob_get_clean();
include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/inc/base.php')
    ? $_SERVER['DOCUMENT_ROOT'] . '/inc/base.php'
    : $_SERVER['DOCUMENT_ROOT'] . '/zoop/inc/base.php';
?>