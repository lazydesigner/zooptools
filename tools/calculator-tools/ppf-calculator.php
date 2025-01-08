<?php
include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/routes.php')
    ? $_SERVER['DOCUMENT_ROOT'] . '/routes.php'
    : $_SERVER['DOCUMENT_ROOT'] . '/zoop/routes.php';

ob_start(); ?>
<style>
    .ppf {
        width: 100%;
        margin: auto;
        border-radius: 10px;
    }

    .ppf-body {
        padding: 3% 2%;
        background-color: lightgrey;
        display: flex;
        flex-wrap: wrap;
    }

    .ppf-form,
    .ppf-graph {
        flex: 1;
    }

    .form-group {
        width: 300px;
        margin: 3% 0;
    }

    .form-group span {
        display: none;
    }

    .ppf-value {
        border: 1px solid grey;
        border-radius: 3px;
        padding: 3px;
        display: flex;
        width: 100%;
        justify-content: space-between;
        align-items: center;
        background-color: lightgrey;
    }

    .ppf-value div {
        width: 40%;
        height: 30px;
        display: flex;
        gap: 10px;
        border-radius: 3px;
        align-items: center;
        padding: 0 15px;
        background-color: white;
    }

    .ppf-value div input {
        width: 100%;
        border: 0;
        outline: 0;
    }

    .form-group input[type="range"] {
        width: 100%;
        height: 4px;
    }

    .ppf-result {
        width: 100%;
        box-sizing: border-box;
        padding: 3%;
        background-color: lightgrey;
        display: flex;
        justify-content: center;
    }

    .investement-box {
        flex: 1;
        text-align: center;
        padding: 1%;
    }

    .investement-box small {
        font-size: 1rem;
        display: block;
        margin-bottom: 3%;
    }

    .interest-box {
        border-left: 1px solid grey;
        border-right: 1px solid grey;
    }

    table {
        margin: 20px auto;
        max-width: 100%;
        border: 1px solid #ddd;
        border-radius: 8px;
        overflow: hidden;
        background: #ffffff;
    }

    th,
    td {
        padding: 10px;
        text-align: center;
        border: 1px solid #ddd;
    }

    th {
        background-color: #f5f5f5;
        font-weight: bold;
    }

    canvas {
        max-width: 100%;
        margin: auto;
    }

    @media screen and (max-width: 768px) {
        .form-group {
            width: 95%;
            margin: 4% 0;
        }

        .ppf-form,
        .ppf-graph {
            flex: 100%;
        }

        table {
            max-width: 100%;
        }

        .scrollthetable {
            width: 100%;
            overflow: auto;
        }

        .ppf {
            width: 100%;
        }
    }
</style>
<?php $style = ob_get_clean();
ob_start();
?>

<div style="max-width: 60%;margin:auto">
<h1 class="center-align">Calculate Your PPF Returns Instantly</h1>
    <div class="ppf">
    <div class="ppf-body">
        <div class="ppf-form">
            <div class="form-group">
                <div class="ppf-value">
                    <small>Yearly Investement</small>
                    <div>
                        Rs.
                        <input type="text" readonly value="10000" id="investementvalue">
                    </div>
                </div>
                <input type="range" name="" id="yearlyInvestment" min="500" max="150000" value="10000">
            </div>
            <div class="form-group">
                <div class="ppf-value">
                    <small>Time Period (In Years)</small>
                    <div>
                        Yr
                        <input type="text" value="15" readonly id="yearvalue">
                    </div>
                </div>
                <input type="range" name="" id="timePeriod" min="15" value="15" max="50">
            </div>
            <div class="form-group">
                <div class="ppf-value">
                    <small>Rate of Interest</small>
                    <div>
                        %
                        <input type="text" id="roi" readonly value="7.1">
                    </div>
                </div>
            </div>
        </div>
        <div class="ppf-graph">
        <canvas id="ppfChart" width="200" height="150"></canvas>
        </div>
    </div>
    <div class="ppf-result">
        <div class="investement-box">
            <small>Invested Amount</small>
            <p style="font-weight: bolder;font-size:1.3rem">₹<span id="investedAmount">0</span></p>
        </div>
        <div class="interest-box investement-box">
            <small>Total Interest</small>
            <p style="font-weight: bolder;font-size:1.3rem">₹<span id="totalInterest">0</span></p>
        </div>
        <div class="maturity-box investement-box">
            <small>Maturity Amount</small>
            <p style="font-weight: bolder;font-size:1.3rem">₹<span id="maturityValue">0</span></p>
        </div>
    </div>
    </div>
        <!-- Table -->
        <div class="row scrollthetable">
      <table style="width:100%">
        <thead>
          <tr>
            <th>Year</th>
            <th>Opening Balance (₹)</th>
            <th>Deposit (₹)</th>
            <th>Interest Earned (₹)</th>
            <th>Closing Balance (₹)</th>
          </tr>
        </thead>
        <tbody id="ppfTableBody"></tbody>
      </table>
    </div>
  </div>
</div>

<?php $tool_container = ob_get_clean();
ob_start(); ?>
<script>
    var investement = document.getElementById("yearlyInvestment");
    var investementvalue = document.getElementById("investementvalue");
    investement.addEventListener("input", function() {
        investementvalue.value = investement.value;
    })


    var year = document.getElementById("timePeriod");
    var yearvalue = document.getElementById("yearvalue");
    year.addEventListener("input", function() {
        yearvalue.value = year.value;
    })
</script>

<!-- Materialize JS and Chart.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const yearlyInvestmentInput = document.getElementById("yearlyInvestment");
        const timePeriodInput = document.getElementById("timePeriod");
        const roiInput = document.getElementById("roi");

        yearlyInvestmentInput.addEventListener("change", calculatePPF);
        timePeriodInput.addEventListener("change", calculatePPF);
        roiInput.addEventListener("keyup", calculatePPF);

        function calculatePPF() {
            const P = parseFloat(yearlyInvestmentInput.value) || 0;
            const N = parseInt(timePeriodInput.value) || 0;
            const i = (parseFloat(roiInput.value) || 0) / 100;

            let F = 0;
            let totalInvestment = 0;
            const tableBody = document.getElementById("ppfTableBody");
            tableBody.innerHTML = "";

            let openingBalance = 0;

            for (let year = 1; year <= N; year++) {
                F += P * Math.pow(1 + i, year);
                totalInvestment += P;

                const interest = openingBalance * i;
                const closingBalance = openingBalance + P + interest;

                // Populate table
                const row = `<tr>
            <td>${year}</td>
            <td>₹${formatNumber(openingBalance)}</td>
            <td>₹${formatNumber(P)}</td>
            <td>₹${formatNumber(interest)}</td>
            <td>₹${formatNumber(closingBalance)}</td>
          </tr>`;
                tableBody.innerHTML += row;

                openingBalance = closingBalance;
            }

            const totalInterest = F - totalInvestment;

            // Display results
            document.getElementById("investedAmount").innerText = formatNumber(totalInvestment);
            document.getElementById("totalInterest").innerText = formatNumber(totalInterest);
            document.getElementById("maturityValue").innerText = formatNumber(F);

            // Update Pie Chart
            updateChart(totalInvestment, totalInterest);
        }

        function formatNumber(number) {
            return new Intl.NumberFormat("en-IN", {
                maximumFractionDigits: 0
            }).format(number);
        }

        let chart;

        function updateChart(investment, interest) {
            const ctx = document.getElementById("ppfChart").getContext("2d");
            if (chart) chart.destroy();

            chart = new Chart(ctx, {
                type: "pie",
                data: {
                    labels: [
                        `Total Investment: ₹${formatNumber(Math.round(investment))}`,
                        `Total Interest: ₹${formatNumber(Math.round(interest))}`
                    ],
                    datasets: [{
                        data: [Math.round(investment), Math.round(interest)],
                        backgroundColor: ["#42a5f5", "#66bb6a"],
                    }, ],
                },
            });
        }

        calculatePPF();
    });
</script>
<?php $script = ob_get_clean();
include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/inc/base.php')
    ? $_SERVER['DOCUMENT_ROOT'] . '/inc/base.php'
    : $_SERVER['DOCUMENT_ROOT'] . '/zoop/inc/base.php';
?>