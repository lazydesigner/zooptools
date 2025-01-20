<?php
include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/routes.php')
    ? $_SERVER['DOCUMENT_ROOT'] . '/routes.php'
    : $_SERVER['DOCUMENT_ROOT'] . '/zoop/routes.php';
$canonical = 'whats-my-ip';

$title = 'What Is My IP Address? (IPv4 & IPv6) -  Find your IP';
$description = 'Our tool displays the public IP address that your computer or router is using, which has been assigned by your ISP. Find my ip address with our IP Finder online.';


ob_start();
?>
<style>
    .image-container {
        width: 100%; 
        min-height: 85vh; 
        display: grid; 
        place-items: center; 
    }

    .outer-upload-container {
        max-width: 500px;
    }
    .grid{
        width: 100%;
        display: grid;
        place-items: center;
    }
    #table{  
        display: none; 
        margin: auto;
        border-spacing: 0;
    }
    #table th{width: 40%;text-align: start;padding:1%;border:1px solid black}
    #table td{width: 60%;text-align: start;padding:1%;border:1px solid black}
</style>
<div class="image-container">
    <div class="outer-upload-container" id="outer-upload" style='text-align:center'>
        <h1 style="text-align: center;" id='whatmyip'></h1>
    </div>
    <div class="grid">
    <table  id="table">
        <tr>
            <th>Internet Provide</th>
            <td>
                <div id="provide"></div>
            </td>
        </tr>
        <tr>
            <th>counrty</th>
            <td>
                <div id="country"></div>
            </td>
        </tr>
        <tr>
            <th>Region Name</th>
            <td>
                <div id="region"></div>
            </td>
        </tr>
        <tr>
            <th>City</th>
            <td>
                <div id="city"></div>
            </td>
        </tr>
        <tr>
            <th>Zipcode</th>
            <td>
                <div id="zip"></div>
            </td>
        </tr>
        <tr>
            <th>ISP</th>
            <td>
                <div id="isp"></div>
            </td>
        </tr>
        <tr>
            <th>Latitude</th>
            <td>
                <div id="lat"></div>
            </td>
        </tr>
        <tr>
            <th>Longitude</th>
            <td>
                <div id="long"></div>
            </td>
        </tr>
        <tr>
            <th>TimeZone</th>
            <td>
                <div id="time"></div>
            </td>
        </tr>
    </table>
    </div>
</div>
<div class="container">
     
    <h2>What Is My IP Address? – Find My IP Instantly</h2>
    <p>The IP address of yours is something that differentiates your device on the web. With our IP Address Lookup Tool, you can easily find out my IP address and also other important details about your connection. Whether you are fixing a network problem or just curious, you will love how simple and fast you get your IP address information through this tool.</p>

    <h3>What Can You Learn?</h3>
    <ul>
        <li><b>Your Public IP Address:</b> Instantly see your current public IP address.</li>
        <li><b>Geolocation Data:</b> Find approximate location details like country, city, and region.</li>
        <li><b>ISP Information:</b> Identify the Internet Service Provider associated with your IP.</li>
        <li><b>Connection Details:</b> View additional details such as the browser and operating system you're using.</li>
    </ul>

    <h2>Why Check Your IP Address?</h2>
    <ul>
        <li><b>Troubleshoot Network Issues:</b> Identify if your connection is configured correctly.</li>
        <li><b>Secure Your Privacy:</b> Be aware of the information websites and services can detect.</li>
        <li><b>Verify Geolocation:</b> Confirm your location when using VPNs or proxy servers.</li>
    </ul>

    <h2>What is an IP Address?    </h2>
    <p>An IP address (Internet Protocol address) is a unique digital number given to the devices that are attached to a network. It is used to ensure that the device communicates with other devices and at the same time tells your connection to the internet. They might be dynamic (changing), or on the contrary, static (fixed), and they contain important information about your link.</p>



</div>

<script>
    // Get browser information using JavaScript
    const userInfoDiv = document.getElementById('userInfo');
    const userAgent = navigator.userAgent;
    const platform = navigator.platform;
    const language = navigator.language;


    // Fetch the IP address using an external API
    fetch('https://api.ipify.org?format=json')
        .then(response => response.json())
        .then(data => {
            console.log(data)
            getIPInformation2(data.ip)
            document.getElementById('outer-upload').innerHTML = `<h1 style="text-align: center;" id='whatmyip'>YOUR IP: ${data.ip}</h1><p><strong>User Agent:</strong> ${userAgent}</p>`

        })
        .catch(error => console.error('Error fetching IP:', error));


    function getIPInformation2(ipAddress) {
        fetch(`http://ip-api.com/json/${ipAddress}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('table').style.display='block';
                document.getElementById('provide').innerText = data.as;
                document.getElementById('country').innerText = data.country;
                document.getElementById('region').innerText = data.regionName;
                document.getElementById('city').innerText = data.city;
                document.getElementById('zip').innerText = data.zip;
                document.getElementById('isp').innerText = data.isp;
                document.getElementById('lat').innerText = data.lat;
                document.getElementById('long').innerText = data.lon;
                document.getElementById('time').innerText = data.timezone;   
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }
</script>

<?php $tool_container = ob_get_clean();


?>
<?php
include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/inc/base.php')
    ? $_SERVER['DOCUMENT_ROOT'] . '/inc/base.php'
    : $_SERVER['DOCUMENT_ROOT'] . '/zoop/inc/base.php';
?>
 