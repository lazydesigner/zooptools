<?php
include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/routes.php')
    ? $_SERVER['DOCUMENT_ROOT'] . '/routes.php'
    : $_SERVER['DOCUMENT_ROOT'] . '/zoop/routes.php';

    $title = 'Online PPF Calculator – Public Provident Fund Calculator';
    $description = 'Use the PPF calculator to estimate the return on your Public Provident Fund investment scheme.';
    $canonical = 'ppf-calculator';

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

<div style="max-width: 800px;margin:auto;padding:2%">
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
            <p style="font-weight: bolder;font-size:1.2rem">₹<span id="investedAmount">0</span></p>
        </div>
        <div class="interest-box investement-box">
            <small>Total Interest</small>
            <p style="font-weight: bolder;font-size:1.2rem">₹<span id="totalInterest">0</span></p>
        </div>
        <div class="maturity-box investement-box">
            <small>Maturity Amount</small>
            <p style="font-weight: bolder;font-size:1.2rem">₹<span id="maturityValue">0</span></p>
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

<div class="container">
    <h2>The Public Provident Fund (PPF): A Trusted Investment Scheme</h2>
    <p>The Public Provident Fund (PPF), a savings scheme launched by the Government of India in 1968, and a much-beloved eternity one of them, is aimed at promoting long-term investments. Scenario allowed to both young and old (age limit dependent on the bank) offer the interest-earning accounts with the least to a whopping Rs. 500 per year deposit. </p>
    <p>PPF with a lock-in period of 15 years, provides guaranteed, risk-free returns, concessional interest rates, which the government has monthly review and revise. Relatedly, the process is a great way of tax planning and as such, has become the second most common process for retirements.</p>

    <img src="<?=base_url() ?>assets/images/ppf-formula.png" width="250px" alt="">

    <h2>How to calculate PPF returns?</h2>
    <p>Finding the PPF returns of an investment can be achieved by using the following formula:</p>
    <p>Where:    </p>
    <ul>
        <li>FV = Future value or maturity value of the investment</li>
        <li>P = Annual installments</li>
        <li>n = The number of years the investment is made for</li>
        <li>r = The annual interest rate</li>
    </ul>

    <h2>How the PPF Interest Calculator Works?</h2>
    <p>PPF Calculator is the easiest tool for the estimation of your Public Provident Fund investments. Here is a step-by-step guide teaching one on how to effectively use the tool:</p>
    <p><b>Deposit Frequency:</b> You can choose the deposit frequency that fits your plans best, i.e., monthly, quarterly, semi-annually, or annually. The frequency you set will have a significant effect on the maturity value; thus, monthly deposits are the best for salaried people who search for accurate results.</p>
    <p><b>Investment Amount:</b> Clearly define the total of your PPF account that you are ready and want to put. (a) The amount you invest annually should be limited to ₹1.5 lakh or ₹12,500 per month only.</p>
    <p><b>Investment Period:</b> You should select the period during which you plan to invest. The shortest period is 15 years; however, you may increase it by five more years, once the first period ends. The calculator works on the assumption that you will deposit the same amount throughout the term.
    </p>
    <p><b>Future Value:</b> Once you key in all that is required, the calculator will automatically show the maturity value of your investment. This number is the total payment you will receive on your investment by the end of the term along with the earned interest.</p>
    <p>These steps will help you easily calculate how fast your PPF investment will grow and subsequently plan well for the necessary financial goal. The calculator is quick and accurate, thus it will aid you to remain consistent with your long-term savings plan.</p>
    <h3>Facts About PPF</h3>
    <ul>
        <li>Current interest rate : 7.10%</li>
        <li>Duration of scheme : 15 years</li>
        <li>Minimum deposit amount (per year) :  500</li>
        <li>Maximum deposit amount (per year) :  1,50,000</li>
        <li>Number of installments every year : 1 (Min) to 12 (Max)</li>
        <li>Number of accounts one can open : Only One</li>
        <li>Lock-in period : 15 years (partial withdrawals can be made from the sixth year)        </li>
        <li>Extension of PPF Account : After the maturity period (15 years), it can be extended for a period of 5 years</li>
        <li>Tax savings (contribution) : under section 80C (upto 1.5 L)</li>
        <li>Tax savings (interest earned and final amount) : fully exempted from wealth tax</li>
    </ul>

    <h2>Advantages of Using Zooptools’ PPF Calculator</h2>
    <p><b>User-Friendly:</b> The application is simple to use and thus possible for everyone to access.</p>
    <p><b>Shows Yearly Returns:</b> It aggregates the returns based on the amounts annually, so the concept of returns is getting simplified.</p>
    <p><b>Tracks Total Investment:</b> An investor can see the cash flows of the portfolio.</p>
    <p><b>Supports Tax Planning:</b> The calculator helps you by giving knowledge of tax-saving benefits from investing in PPF, and thus providing a way to better planning.</p>
    <p><b>Estimates Interest Earned:</b> The interest calculator will inform you of the amount of interest you will gain and thereby show the benefit of your investment.</p>
    <p><b>Helps Adjust Investment Plans:</b> If the returns are short of the target, the solution is easy as you can now select the needed amount of your investment by doing simple calculations.</p>
    <p><b>Displays Total Interest and Maturity Value:</b> The calculator demonstrates the total interest earned and your maturity amount afterwards.</p>
    <p>The Zooptools PPF calculator is a “strong and powerful support device” for your PPF investments and their easy management and efficiency track.</p>

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