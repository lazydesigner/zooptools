<?php
include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/routes.php')
  ? $_SERVER['DOCUMENT_ROOT'] . '/routes.php'
  : $_SERVER['DOCUMENT_ROOT'] . '/zoop/routes.php';
$canonical = 'compound-interest-calculator';
$title = 'Compound Interest Calculator - Monthly, Quarterly, Yearly';
$description = 'Try our Free online Compound Interest Calculator helpful for your saving and investment calculations. See the power of compounding in just a few steps.';
ob_start(); ?>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">-->
<!-- Include Material JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<!-- Include Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style> 
  .form-group {
    margin-bottom: 15px;
  }

  label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
  }

  input,
  select {
    width: 100%;
    padding: 8px;
    font-size: 1rem;
  }

  canvas {
    margin-top: 20px;
  }

  .card {
    width: 100%;
    height: auto;
    padding: 3%;
    box-shadow: 0 0 5px 1px lightgrey;
    border-radius: 4px;
    margin: 4% 0;
  }

  .form-group {
    width: 100%;
  }

  .form-group input,
  select {
    width: 100%;
    padding: 0 5px;
    height: 30px;
    border: 0;
    border-bottom: 1px solid grey;
    outline: 0;
  }

  ::-webkit-inner-spin-button,
  ::-webkit-outer-spin-button {
    display: none;
  }

  .form-group {
    margin: 30px 0;
  }

  .card {
    width: 100%;
    height: auto;
    padding: 3%;
    box-shadow: 0 0 5px 1px lightgrey;
    border-radius: 4px;
    margin: 4% 0;
  }
  .btn{
    cursor: pointer;
    border: 0;
    display: block;
    background-color: var(--primary-accent);
    color: white;
    border-radius: 3px;
    padding: 10px 15px;
  }
</style>
<?php
$style = ob_get_clean();

ob_start();
?>

<div class="" style="max-width: 800px; margin:5% auto;padding:2%">
  <div class="grey darken-4 white-text center-align">
    <h1>Compound Interest Calculator</h1>
  </div>
  <!-- Content -->
  <div class="card">
  <main class="containerss">
    <form id="ciForm">
      <div class="form-group">
        <label for="principal">Principal Amount (₹):</label>
        <input type="number" id="principal" name="principal" required>
      </div>
      <div class="form-group">
        <label for="rate">Rate of Interest (% per annum):</label>
        <input type="number" id="rate" name="rate" required>
      </div>
      <div class="form-group">
        <label for="frequency">Compounding Frequency:</label>
        <select id="frequency" name="frequency" required>
          <option value="1">Yearly</option>
          <option value="2">Half-Yearly</option>
          <option value="4">Quarterly</option>
          <option value="12">Monthly</option>
        </select>
      </div>
      <div class="form-group">
        <label for="duration">Duration (years):</label>
        <input type="number" id="duration" name="duration" required>
      </div>
      <button class="btn" type="button" onclick="calculate()">Calculate</button>
    </form>
  </main>
</div>
  <div class="card">
  <div>Results</div>
  <p id="result"></p>
  <canvas id="growthChart"></canvas>
</div>
</div>


<div class="container">
  <p>Get the most from your savings and investments with our free Compound Interest Calculator. Knowing that money grows over time with compounding interest is the key to managing your finances and being well-informed to make future financial decisions.</p>

  <h2>What is Compound Interest?</h2>
  <p>Compound interest is the interest earned on both the principal amount and the interest that accumulates over time. It motivates the savings to grow faster.</p>

  <h2>Compound Interest Formula</h2>
  <p>The formula to calculate compound interest is:</p>

  <p><strong>A = P × (1 + r/n)^(n × t)</strong></p>
  <p><strong>Where:</strong></p>
  <ul>
    <li><strong>A</strong> = Final amount (principal + interest)</li>
    <li><strong>P</strong> = Principal amount (initial deposit or investment)</li>
    <li><strong>r</strong> = Annual interest rate (in decimal form, e.g., 5% = 0.05)</li>
    <li><strong>n</strong> = Number of compounding periods per year</li>
    <li><strong>t</strong> = Time in years</li>
  </ul>

  <p><strong>Compound Interest (CI) = A - P</strong></p>
  <p><b>Example Without Contributions</b></p>
  <p><b>Scenario:</b> You invest 10,000 with an annual interest rate of 6% compounded monthly for 5 years.</p>
  <p>Using the formula:</p>
  <ul>
    <li><b>P = 10,000</b></li>
    <li><b>r = 0.06</b></li>
    <li><b>n = 12 (monthly compounding)</b></li>
    <li><b>t = 5 years</b></li>
  </ul>

  <p><b>A = 10,000 × (1 + 0.06/12)^(12 × 5)</b></p>
  <p><b>A = 10,000 × (1 + 0.005)^(60)</b></p>
  <p><b>A ≈ 10,000 × 1.34885</b></p>
  <p><b>A ≈ 13,488.50</b></p>

  <p><strong>Compound Interest = A - P = 13,488.50 - 10,000 = 3,488.50</strong></p>
  <p>So, the total amount after 5 years will be <strong>13,488.50</strong>, and the interest earned is <strong>3,488.50</strong>.</p>

  <p><b>Example With Monthly Contributions</b></p>
  <p><b>Scenario:</b> You start with 5,000 and contribute 500 each month for 3 years at an annual interest rate of 4%, compounded monthly.</p>
  <p>To calculate this, we use the future value of a series formula:</p>
  <p><strong>A = P × (1 + r/n)^(n × t) + (C × [(1 + r/n)^(n × t) - 1] / (r/n))</strong></p>

  <p>Where:</p>
  <ul>
    <li><b>P = 5,000 (initial amount)</b></li>
    <li><b>C = 500 (monthly contribution)</b></li>
    <li><b>r = 0.04</b></li>
    <li><b>n = 12 (monthly compounding)</b></li>
    <li><b>t = 3 years</b></li>
  </ul>

  <p>Step 1: Calculate the growth of the initial investment:</p>
  <p><strong>A_initial = 5,000 × (1 + 0.04/12)^(12 × 3)</strong></p>
  <p><strong>A_initial ≈ 5,000 × 1.12749 ≈ 5,637.45</strong></p>

  <p>Step 2: Calculate the growth of monthly contributions:</p>
  <p><b>A_contributions = 500 × [(1 + 0.04/12)^(12 × 3) - 1] / (0.04/12)</b></p>
  <p><b>A_contributions ≈ 500 × [1.12749 - 1] / 0.003333</b></p>
  <p><b>A_contributions ≈ 500 × 38.247 ≈ 19,123.50</b></p>
  <p><b>Total Amount = A_initial + A_contributions ≈ 5,637.45 + 19,123.50 = 24,760.95</b></p>




</div>

<?php $tool_container = ob_get_clean();
ob_start();
?>
<script>
  function calculate() {
    const principal = parseFloat(document.getElementById('principal').value);
    const rate = parseFloat(document.getElementById('rate').value);
    const frequency = parseInt(document.getElementById('frequency').value);
    const duration = parseFloat(document.getElementById('duration').value);

    if (isNaN(principal) || isNaN(rate) || isNaN(frequency) || isNaN(duration)) {
      alert('Please fill out all fields correctly.');
      return;
    }

    const periods = frequency * duration;
    const interestRate = rate / (100 * frequency);
    let amount = principal * Math.pow((1 + interestRate), periods);

    let growth = [];
    let labels = [];
    for (let i = 0; i <= periods; i++) {
      let partialAmount = principal * Math.pow((1 + interestRate), i);
      growth.push(partialAmount.toFixed(2));
      labels.push(i / frequency);
    }

    document.getElementById('result').innerHTML = `
            Total Amount: ₹${amount.toFixed(2)} <br>
            Interest Earned: ₹${(amount - principal).toFixed(2)}
        `;

    renderChart(labels, growth);
  }

  function renderChart(labels, data) {
    const ctx = document.getElementById('growthChart').getContext('2d');
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: labels,
        datasets: [{
          label: 'Investment Growth',
          data: data,
          borderColor: 'blue',
          fill: false,
          tension: 0.1,
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            display: true,
          }
        },
        scales: {
          x: {
            title: {
              display: true,
              text: 'Time (Years)'
            }
          },
          y: {
            title: {
              display: true,
              text: 'Amount (₹)'
            }
          }
        }
      }
    });
  }
</script>
<?php $script = ob_get_clean();
include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/inc/base.php')
  ? $_SERVER['DOCUMENT_ROOT'] . '/inc/base.php'
  : $_SERVER['DOCUMENT_ROOT'] . '/zoop/inc/base.php';
?>