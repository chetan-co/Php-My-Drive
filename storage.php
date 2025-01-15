<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Storage</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-8 mx-auto">
        <div class="card">
          <div class="card-body">
            <h3 class="card-title text-center mb-4">My Storage</h3>
            <p class="text-muted text-center">
              View your storage details and manage your space effectively.
            </p>
            <div class="row text-center mb-4">
              <div class="col-md-4">
                <h4 class="text-primary">Total Space</h4>
                <p id="total-space"><strong>50 GB</strong></p>
              </div>
              <div class="col-md-4">
                <h4 class="text-success">Used Space</h4>
                <p id="used-space"><strong>30 GB</strong></p>
              </div>
              <div class="col-md-4">
                <h4 class="text-danger">Free Space</h4>
                <p id="free-space"><strong>20 GB</strong></p>
              </div>
            </div>
            <div class="progress" style="height: 25px;">
              <div 
                class="progress-bar bg-success" 
                role="progressbar" 
                style="width: 60%;" 
                aria-valuenow="60" 
                aria-valuemin="0" 
                aria-valuemax="100" 
                id="progress-bar">
                60% Used
              </div>
            </div>
            <div class="text-center mt-4">
              <button class="btn btn-sm btn-primary" id="upgrade-btn">Upgrade Storage</button>
              <a href="#" class="btn btn-sm btn-outline-secondary" id="free-up-space-btn">Free Up Space</a>
            </div>
            <!-- Remove the payment success alert message -->
            <!-- <div id="payment-success" class="alert alert-success mt-4" style="display: none;">
              Payment completed successfully! Your storage has been upgraded.
            </div> -->
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-5" id="payment-section" style="display: none;">
      <div class="col-md-8 mx-auto">
        <div class="card">
          <div class="card-body">
            <h3 class="card-title text-center mb-4">Payment Method</h3>
            <form id="payment-form">
              <div class="mb-3">
                <label for="paymentMethod" class="form-label">Payment Method</label>
                <select class="form-select" id="paymentMethod" required>
                  <option value="credit">Credit Card</option>
                  <option value="debit">Debit Card</option>
                  <option value="upi">UPI</option>
                  <option value="paypal">PayPal</option>
                  <option value="onlineBanking">Online Banking</option>
                </select>
              </div>
              <div id="payment-details">
                <!-- Payment details will be inserted here based on the selected method -->
              </div>
              <button type="submit" class="btn btn-primary w-100">Submit Payment</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-5" id="otp-section" style="display: none;">
      <div class="col-md-8 mx-auto">
        <div class="card">
          <div class="card-body">
            <h3 class="card-title text-center mb-4">OTP Verification</h3>
            <form id="otp-form">
              <div class="mb-3">
                <label for="otp" class="form-label">Enter OTP</label>
                <input type="text" class="form-control" id="otp" placeholder="123456" required>
              </div>
              <button type="submit" class="btn btn-primary w-100">Verify OTP</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.getElementById('upgrade-btn').addEventListener('click', function() {
      document.getElementById('payment-section').style.display = 'block';
      document.getElementById('otp-section').style.display = 'none';
    });

    document.getElementById('paymentMethod').addEventListener('change', function() {
      const paymentMethod = this.value;
      const paymentDetails = document.getElementById('payment-details');
      paymentDetails.innerHTML = '';

      if (paymentMethod === 'credit' || paymentMethod === 'debit') {
        paymentDetails.innerHTML = `
          <div class="mb-3">
            <label for="cardNumber" class="form-label">Card Number</label>
            <input type="text" class="form-control" id="cardNumber" placeholder="1234 5678 9012 3456" required>
          </div>
          <div class="mb-3">
            <label for="expiryDate" class="form-label">Expiry Date</label>
            <input type="text" class="form-control" id="expiryDate" placeholder="MM/YY" required>
          </div>
          <div class="mb-3">
            <label for="cvv" class="form-label">CVV</label>
            <input type="text" class="form-control" id="cvv" placeholder="123" required>
          </div>
          <div class="mb-3">
            <label for="cardName" class="form-label">Name on Card</label>
            <input type="text" class="form-control" id="cardName" placeholder="John Doe" required>
          </div>
        `;
      } else if (paymentMethod === 'upi') {
        paymentDetails.innerHTML = `
          <div class="mb-3">
            <label for="upiId" class="form-label">UPI ID</label>
            <input type="text" class="form-control" id="upiId" placeholder="example@upi" required>
          </div>
        `;
      } else if (paymentMethod === 'paypal') {
        paymentDetails.innerHTML = `
          <div class="mb-3">
            <label for="paypalEmail" class="form-label">PayPal Email</label>
            <input type="email" class="form-control" id="paypalEmail" placeholder="example@domain.com" required>
          </div>
        `;
      } else if (paymentMethod === 'onlineBanking') {
        paymentDetails.innerHTML = `
          <div class="mb-3">
            <label for="bankName" class="form-label">Bank Name</label>
            <input type="text" class="form-control" id="bankName" placeholder="Bank Name" required>
          </div>
          <div class="mb-3">
            <label for="accountNumber" class="form-label">Account Number</label>
            <input type="text" class="form-control" id="accountNumber" placeholder="1234567890" required>
          </div>
          <div class="mb-3">
            <label for="ifscCode" class="form-label">IFSC Code</label>
            <input type="text" class="form-control" id="ifscCode" placeholder="IFSC0001234" required>
          </div>
        `;
      }
    });

    document.getElementById('payment-form').addEventListener('submit', function(event) {
      event.preventDefault();
      document.getElementById('payment-section').style.display = 'none';
      document.getElementById('otp-section').style.display = 'block';
    });

    document.getElementById('otp-form').addEventListener('submit', function(event) {
      event.preventDefault();
      upgradeStorage();
      // Remove the display of payment success alert message
      // document.getElementById('payment-success').style.display = 'block';
      document.getElementById('otp-section').style.display = 'none';
    });

    document.getElementById('free-up-space-btn').addEventListener('click', function() {
      const totalSpaceElement = document.getElementById('total-space');
      const usedSpaceElement = document.getElementById('used-space');
      const freeSpaceElement = document.getElementById('free-space');
      const progressBar = document.getElementById('progress-bar');

      const totalSpace = 50; // Assuming total space remains the same
      const usedSpace = 0; // Free up all used space
      const freeSpace = totalSpace - usedSpace;

      totalSpaceElement.innerHTML = `<strong>${totalSpace} GB</strong>`;
      usedSpaceElement.innerHTML = `<strong>${usedSpace} GB</strong>`;
      freeSpaceElement.innerHTML = `<strong>${freeSpace} GB</strong>`;

      const usedPercentage = (usedSpace / totalSpace) * 100;
      progressBar.style.width = `${usedPercentage}%`;
      progressBar.setAttribute('aria-valuenow', usedPercentage);
      progressBar.innerHTML = `${usedPercentage.toFixed(2)}% Used`;
    });

    function upgradeStorage() {
      const totalSpaceElement = document.getElementById('total-space');
      const usedSpaceElement = document.getElementById('used-space');
      const freeSpaceElement = document.getElementById('free-space');
      const progressBar = document.getElementById('progress-bar');

      const totalSpace = 100; // New total space after upgrade
      const usedSpace = 30; // Assuming used space remains the same
      const freeSpace = totalSpace - usedSpace;

      totalSpaceElement.innerHTML = `<strong>${totalSpace} GB</strong>`;
      usedSpaceElement.innerHTML = `<strong>${usedSpace} GB</strong>`;
      freeSpaceElement.innerHTML = `<strong>${freeSpace} GB</strong>`;

      const usedPercentage = (usedSpace / totalSpace) * 100;
      progressBar.style.width = `${usedPercentage}%`;
      progressBar.setAttribute('aria-valuenow', usedPercentage);
      progressBar.innerHTML = `${usedPercentage.toFixed(2)}% Used`;

      // Ensure the screen is in default (light) mode
      document.body.classList.remove('dark-mode');
      document.body.classList.add('light-mode');
      document.querySelector('.navbar').classList.remove('navbar-dark-mode');
      document.querySelector('.navbar').classList.add('navbar-light-mode');
    }
  </script>
</body>
</html>
