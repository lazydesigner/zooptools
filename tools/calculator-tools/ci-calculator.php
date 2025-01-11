<?php 
include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/routes.php')
? $_SERVER['DOCUMENT_ROOT'] . '/routes.php'
: $_SERVER['DOCUMENT_ROOT'] . '/zoop/routes.php';
$canonical = 'compound-interest-calculator';
$title = 'Compound Interest Calculator - Monthly, Quarterly, Yearly';
$description = 'Try our Free online Compound Interest Calculator helpful for your saving and investment calculations. See the power of compounding in just a few steps with accurate data.';
ob_start(); ?>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">-->
  <!-- Include Material JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <!-- Include Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <!-- Custom CSS -->
  <style>
    #chart-container {
      max-width: 600px;
      margin: 30px auto;
    }
    .card{
        width:100%;
        height:auto;
        padding:3%;
        box-shadow:0 0 5px 1px lightgrey;
        border-radius:4px;
        margin:4% 0;
    }
    .s12{
        width:100%;
    }
    .s12 input{
        width:100%;
        padding:2px 5px;
        height:60px;
        border:0;
        border-bottom:1px solid grey;
        outline:0;
    }
    .input-field{
        margin:10px 0;
    }
  </style>
<?php 
$style = ob_get_clean();

ob_start();
?>

<div class="" style="max-width: 60%;margin:5% auto">
<div class="grey darken-4 white-text center-align">
    <h1>Compound Interest Calculator</h1>
  </div>
  <!-- Content -->
  <main class="containerss">
    <div class="row">
      <div class="col s12">
        <div class="card">
          <div class="card-content">
            <span class="card-title">Calculator</span>
            <div class="input-field">
              <label for="principal">Principal Amount</label>
              <input type="number" id="principal" min="0" step="1000" required>
            </div>
            <div class="input-field">
              <label for="interest">Interest Rate (%)</label>
              <input type="number" id="interest" min="0" step="0.1" required>
            </div>
            <div class="input-field">
              <label for="time">Time (years)</label>
              <input type="number" id="time" min="0" step="1" required>
            </div>
            <div class="input-field center-align">
              <button class="btn waves-effect waves-light" onclick="calculate()">Calculate</button>
            </div>
          </div>
        </div>
      </div>
      <div class="col s12">
        <div class="card">
          <div class="card-content">
            <span class="card-title">Results</span>
            <canvas id="chart"></canvas>
            <h5 id="total-amount"></h5>
            <h5 id="interest-earned"></h5>
          </div>
        </div>
      </div>
    </div>
  </main>
</div>

<?php $tool_container = ob_get_clean(); 
ob_start();
?>
<script>
    function calculate() {
      const principal = Number(document.getElementById('principal').value);
      const interestRate = Number(document.getElementById('interest').value);
      const time = Number(document.getElementById('time').value);

      const interestEarned = principal * (Math.pow(1 + interestRate / 100, time) - 1);
      const totalAmount = principal + interestEarned;

      document.getElementById('total-amount').textContent = `Total Amount: Rs${totalAmount.toFixed(2)}`;
      document.getElementById('interest-earned').textContent = `Interest Earned: Rs${interestEarned.toFixed(2)}`;

      // Chart.js
      const ctx = document.getElementById('chart').getContext('2d');
      new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ['Principal', 'Interest Earned'],
          datasets: [{
            label: 'Amount (Rs)',
            data: [principal, interestEarned],
            backgroundColor: [
              'rgba(54, 162, 235, 0.7)',
              'rgba(75, 192, 192, 0.7)',
            ],
            borderColor: [
              'rgba(54, 162, 235, 1)',
              'rgba(75, 192, 192, 1)',
            ],
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
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