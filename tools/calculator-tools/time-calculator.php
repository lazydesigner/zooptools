<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Time Difference Calculator</title>
    <style>
        .timecontainer {
            max-width: 500px;
            margin: 20px auto;
            background: #ffffff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
        }

        h1 {
            text-align: center;
            font-size: 24px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-size: 14px;
            margin-bottom: 5px;
        }

        select,
        button {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            margin-bottom: 10px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .result {
            margin-top: 20px;
            font-size: 16px;
            text-align: center;
            color: #28a745;
        }
    </style>
</head>

<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['time_range'])) {
            $timeRange = $_GET['time_range']; // e.g., '7am-9am'


            // Validate input
            if (empty($timeRange)) {
                echo json_encode(['error' => 'Time range is required.']);
                exit;
            }

            // Split the time range
            $timeParts = explode('-', $timeRange);
            if (count($timeParts) !== 2) {
                echo json_encode(['error' => 'Invalid time range format. Use format like 7am-9am.']);
                exit;
            }

            // Parse individual times
            $startTime = DateTime::createFromFormat('gA', trim($timeParts[0]));
            $endTime = DateTime::createFromFormat('gA', trim($timeParts[1]));
            // echo $startTime;

            $startTimeFormatted = $startTime->format('H:i');
            $startTimeFormatted2 = $endTime->format('H:i');

            $readableStartTime = $startTime->format('g:i A'); // Outputs: 7:00 AM
            $readableEndTime = $endTime->format('g:i A');

            // Validate parsed times
            if (!$startTime || !$endTime) {
                echo json_encode(['error' => 'Invalid time format. Use format like 7am or 9pm.']);
                exit;
            }

            // Handle cases where the end time is earlier than the start time (crossing midnight)
            if ($endTime < $startTime) {
                $endTime->modify('+1 day');
            }

            // Calculate the difference
            $interval = $startTime->diff($endTime);

            // Format the results
            $hours2 = $interval->h + ($interval->days * 24);
            $minutes = $interval->i + ($hours2 * 60);
            $seconds = $interval->s + ($minutes * 60);
        }
    }

    // ================================================
    function generateHours()
    {
        $hours = [];
        // Generate hours from 1 AM to 12 PM
        for ($i = 1; $i <= 12; $i++) {
            $hours[] = $i . "am";
        }
        // Generate hours from 1 PM to 12 PM
        for ($i = 1; $i <= 12; $i++) {
            $hours[] = $i . "pm";
        }
        return $hours;
    }

    function generatePermutations($hours)
    {
        $permutations = [];
        // Loop through each hour for permutations
        foreach ($hours as $hour1) {
            foreach ($hours as $hour2) {
                $permutations[] = "$hour1-$hour2";
            }
        }
        return $permutations;
    }

    function getRandomSelections($permutations, $count = 21)
    {
        // Shuffle and pick a random subset of permutations
        shuffle($permutations); // Shuffle the array for randomness
        return array_slice($permutations, 0, $count); // Return the first $count items
    }

    // Generate hours
    $hours = generateHours();

    // Generate permutations
    $permutations = generatePermutations($hours);

    $randomSelections = getRandomSelections($permutations, 21);
    // ================================================

    // print_r($permutations);


    ?>
    <style>
        .form-flex {
            width: 100%;
            display: flex;
            gap: 20px;
        }

        .form-group {
            flex: 1;
        }

        .form-flex input {
            width: 100%;
            height: 40px;
            outline: 0;
            border: 1px solid lightgrey;
            border-radius: 5px;
            padding: 3px;
        }
        .flex-all{
            display: flex;
            gap: 5%;
            flex-wrap: wrap;
        }
        .flex-all a{
            width:30%;
            margin: 1% 0;
            text-decoration: none;
        }
    </style>
    <?php if (isset($readableStartTime)) {
        echo '<h1>' . $readableStartTime . ' to ' . $readableEndTime . '</h1>';
    } else { ?> <h1>Hours Calculator</h1> <?php } ?>
    <?php if (isset($_GET['time_range'])) { ?>
        <div class="timecontainer">
            <div>
                <p>How many hours between <?= explode('-', $_GET['time_range'])[0] ?> to <?= explode('-', $_GET['time_range'])[1] ?>?</p>

                <p style="background-color: lightblue;padding:1%">There are <?= $hours2 ?> hours from <?= explode('-', $_GET['time_range'])[0] ?> to <?= explode('-', $_GET['time_range'])[1] ?></p>
            </div>
            <hr>
            <div>
                <p>How many hours between <?= explode('-', $_GET['time_range'])[0] ?> to <?= explode('-', $_GET['time_range'])[1] ?>?</p>

                <p style="background-color: lightblue;padding:1%">There are <?= $minutes ?> minutes from <?= explode('-', $_GET['time_range'])[0] ?> to <?= explode('-', $_GET['time_range'])[1] ?></p>
            </div>
        </div>
    <?php } ?>
    <div class="timecontainer">

        <form id="timeForm">
            <div class="form-flex">
                <div class="form-group">
                    <label for="time1">Select Start Time:</label>
                    <?php if (isset($startTime)) { ?><input type="time" id="time1" value="<?= $startTimeFormatted ?>" required> <?php } else { ?><input type="time" id="time1" required> <?php } ?>

                </div>
                <div class="form-group">
                    <label for="time2">Select End Time:</label>
                    <?php if (isset($startTime)) { ?><input type="time" id="time2" value="<?= $startTimeFormatted2 ?>" required> <?php } else { ?><input type="time" id="time2" required> <?php } ?>

                </div>
            </div>
            <button type="submit">Calculate Difference</button>
        </form>
        <div class="result" id="result"></div>
    </div>

    <div class="timecontainer">
    <h2>How Many Hours Between</h2>
        <div class="flex-all">

            <?php
            // Display random selections
            foreach ($randomSelections as $pair) {
                echo "<a href='http://localhost/zoop/time-calculator/".$pair."'>".explode('-',$pair)[0]." to ".explode('-',$pair)[1]."</a>";
            } 
            ?>
        </div>
    </div>

    <script>
        document.getElementById('timeForm').addEventListener('submit', function(event) {
            event.preventDefault();

            // Get input times
            const time1 = document.getElementById('time1').value;
            const time2 = document.getElementById('time2').value;

            if (!time1 || !time2) {
                alert("Please select both times.");
                return;
            }

            // Convert time to Date objects
            const [hours1, minutes1] = time1.split(':').map(Number);
            const [hours2, minutes2] = time2.split(':').map(Number);

            const date1 = new Date(0, 0, 0, hours1, minutes1);
            const date2 = new Date(0, 0, 0, hours2, minutes2);

            // Calculate the difference in milliseconds
            let diff = date2 - date1;

            if (diff < 0) {
                // If time2 is on the next day
                diff += 24 * 60 * 60 * 1000;
            }

            // Convert difference to hours, minutes, and seconds
            const hours = Math.floor(diff / (1000 * 60 * 60));
            const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((diff % (1000 * 60)) / 1000);

            // Display the result
            document.getElementById('result').innerText = `
                Difference: ${hours} Hours, ${minutes} Minutes, ${seconds} Seconds
            `;
        });
    </script>
    <?php



    ?>

</body>

</html>