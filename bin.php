<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bin - Drive Space</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <h2 class="text-center mb-4">Bin</h2>
    <p class="text-center text-muted">Manage your deleted files.</p>

    <!-- Bin Table -->
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead class="table-light">
          <tr>
            <th>#</th>
            <th>File Name</th>
            <th>Size</th>
            <th>Date Deleted</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody id="bin-list">
          <tr>
            <td colspan="5" class="text-center text-muted">No files in bin.</td>
          </tr>
        </tbody>
      </table>
    </div>
    <!-- End of Bin Table -->
  </div>

  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Icons (Optional) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
  <script>
    const binList = document.getElementById('bin-list');

    // Load bin files from localStorage
    const binFiles = JSON.parse(localStorage.getItem('binFiles')) || [];
    if (binFiles.length > 0) {
      binList.innerHTML = ''; // Clear the existing content
      binFiles.forEach((file, index) => {
        const row = `
          <tr>
            <td>${index + 1}</td>
            <td>${file.fileName}</td>
            <td>${file.fileSize}</td>
            <td>${file.dateDeleted}</td>
            <td>
              <button class="btn btn-danger btn-sm permanent-delete-btn">
                <i class="bi bi-trash"></i> Permanent Delete
              </button>
            </td>
          </tr>
        `;
        binList.insertAdjacentHTML('beforeend', row);
      });
      addPermanentDeleteEventListeners();
    }

    function addPermanentDeleteEventListeners() {
      const permanentDeleteButtons = document.querySelectorAll('.permanent-delete-btn');
      permanentDeleteButtons.forEach((button, index) => {
        button.addEventListener('click', () => {
          const row = button.closest('tr');
          row.remove();
          binFiles.splice(index, 1);
          localStorage.setItem('binFiles', JSON.stringify(binFiles));
          if (binList.children.length === 0) {
            binList.innerHTML = '<tr><td colspan="5" class="text-center text-muted">No files in bin.</td></tr>';
          }
        });
      });
    }
  </script>
</body>
</html>
