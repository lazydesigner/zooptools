<?php
include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/routes.php')
    ? $_SERVER['DOCUMENT_ROOT'] . '/routes.php'
    : $_SERVER['DOCUMENT_ROOT'] . '/zoop/routes.php';
    $canonical = 'sip-calculator';
ob_start(); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<style>
    .tab-container {
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
    }

    .tab {
        cursor: pointer;
        padding: 10px 20px;
        border: 1px solid #007bff;
    }

    .tab.active {
        background-color: #007bff;
        color: white;
    }

    .results p {
        font-size: 1.1rem;
    }
 
</style>
<?php
$style = ob_get_clean();


ob_start();
?>
<div class="" style="max-width: 800px;margin:5% auto;padding:2%">
    <h2 class="text-center">SIP & Lumpsum Calculator</h2>

    <div class="tab-container my-3">
        <div class="tab active" onclick="switchTab('sip')">SIP</div>
        <div class="tab" onclick="switchTab('lumpsum')">Lumpsum</div>
    </div>

    <div class="calculator-form">
        <div id="sip-form" class="form-content">
            <div class="mb-3">
                <label for="monthlyInvestment" class="form-label">Monthly Investment (₹)</label>
                <input type="number" id="monthlyInvestment" class="form-control" onkeyup="calculateSIP()">
            </div>
            <div class="mb-3">
                <label for="sipRate" class="form-label">Expected Return Per Annum (%)</label>
                <input type="number" id="sipRate" class="form-control" onkeyup="calculateSIP()">
            </div>
            <div class="mb-3">
                <label for="sipPeriod" class="form-label">Time Period (Years)</label>
                <input type="number" id="sipPeriod" class="form-control" onkeyup="calculateSIP()">
            </div>
        </div>

        <div id="lumpsum-form" class="form-content" style="display: none;">
            <div class="mb-3">
                <label for="lumpsumInvestment" class="form-label">Total Investment (₹)</label>
                <input type="number" id="lumpsumInvestment" class="form-control" onkeyup="calculateLumpsum()">
            </div>
            <div class="mb-3">
                <label for="lumpsumRate" class="form-label">Expected Return Per Annum (%)</label>
                <input type="number" id="lumpsumRate" class="form-control" onkeyup="calculateLumpsum()">
            </div>
            <div class="mb-3">
                <label for="lumpsumPeriod" class="form-label">Time Period (Years)</label>
                <input type="number" id="lumpsumPeriod" class="form-control" onkeyup="calculateLumpsum()">
            </div>
        </div>
    </div>

    <div class="results mt-4">
        <h4>Results</h4>
        <p>Investment Amount: ₹<span id="investmentAmount">0</span></p>
        <p>Estimated Returns: ₹<span id="estimatedReturns">0</span></p>
        <p>Total Amount: ₹<span id="totalAmount">0</span></p>
    </div>

    <div id="chart_div" style="width: 100%; height: 400px; margin: auto;"></div>

</div>


<?php
$tool_container = ob_get_clean();
ob_start(); ?>
<script>
    let activeTab = 'sip';

    google.charts.load('current', {
        packages: ['corechart']
    });

    function switchTab(tab) {
        activeTab = tab;
        document.querySelectorAll('.tab').forEach(tabElement => tabElement.classList.remove('active'));
        document.querySelector('.tab-container .tab:nth-child(' + (tab === 'sip' ? 1 : 2) + ')').classList.add('active');
        document.getElementById('sip-form').style.display = tab === 'sip' ? 'block' : 'none';
        document.getElementById('lumpsum-form').style.display = tab === 'lumpsum' ? 'block' : 'none';
        if (tab === 'sip') {
            calculateSIP();
        } else {
            calculateLumpsum();
        }
    }

    function calculateSIP() {
        const monthlyInvestment = parseFloat(document.getElementById('monthlyInvestment').value) || 0;
        const rate = parseFloat(document.getElementById('sipRate').value) || 0;
        const period = parseFloat(document.getElementById('sipPeriod').value) || 0;

        const months = period * 12;
        const monthlyRate = rate / 100 / 12;

        const maturityAmount = monthlyInvestment * ((Math.pow(1 + monthlyRate, months) - 1) / monthlyRate) * (1 + monthlyRate);
        const investmentAmount = monthlyInvestment * months;
        const estimatedReturns = maturityAmount - investmentAmount;

        updateResults(Math.round(investmentAmount), Math.round(estimatedReturns), Math.round(maturityAmount));
        drawChart(investmentAmount, estimatedReturns);
    }

    function calculateLumpsum() {
        const lumpsumInvestment = parseFloat(document.getElementById('lumpsumInvestment').value) || 0;
        const rate = parseFloat(document.getElementById('lumpsumRate').value) || 0;
        const period = parseFloat(document.getElementById('lumpsumPeriod').value) || 0;

        const investmentAmount = lumpsumInvestment;
        const estimatedReturns = lumpsumInvestment * Math.pow(1 + rate / 100, period) - lumpsumInvestment;
        const totalAmount = investmentAmount + estimatedReturns;

        updateResults(Math.round(investmentAmount), Math.round(estimatedReturns), Math.round(totalAmount));
        drawChart(investmentAmount, estimatedReturns);
    }

    function updateResults(investment, returns, total) {
        document.getElementById('investmentAmount').textContent = investment.toLocaleString();
        document.getElementById('estimatedReturns').textContent = returns.toLocaleString();
        document.getElementById('totalAmount').textContent = total.toLocaleString();
    }

    function drawChart(investment, returns) {
        const data = google.visualization.arrayToDataTable([
            ['Category', 'Amount'],
            ['Investment', investment],
            ['Returns', returns]
        ]);

        const options = {
            title: 'Investment vs Returns',
            pieHole: 0.4,
            colors: ['#007bff', '#ff7043'],
        };

        const chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script>
<?php $script = ob_get_clean();
include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/inc/base.php')
    ? $_SERVER['DOCUMENT_ROOT'] . '/inc/base.php'
    : $_SERVER['DOCUMENT_ROOT'] . '/zoop/inc/base.php';
?>