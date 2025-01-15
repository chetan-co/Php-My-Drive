<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Computer - Drive Space</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <h2 class="text-center mb-4">Computer</h2>
    <p class="text-center text-muted">Browse and manage files from your computer.</p>
    
    <!-- File Upload Section -->
    <div class="card mb-4 shadow-sm">
      <div class="card-body text-center">
        <h5 class="card-title">Upload Files</h5>
        <p class="card-text">Select files from your computer to upload to Drive Space.</p>
        <button class="btn btn-primary" id="upload-btn">
          <i class="bi bi-cloud-arrow-up"></i> Upload Files
        </button>
        <input type="file" id="file-input" class="d-none" multiple>
      </div>
    </div>

    <!-- File List Section -->
    <div class="card shadow-sm">
      <div class="card-body">
        <h5 class="card-title">Your Computer Files</h5>
        <p class="text-muted">These are the files you have recently uploaded or synced.</p>

        <!-- File List Table -->
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead class="table-light">
              <tr>
                <th>#</th>
                <th>File Name</th>
                <th>Size</th>
                <th>Date Uploaded</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody id="file-list">
              <tr>
                <td colspan="5" class="text-center text-muted">No files uploaded yet.</td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- End of File List Table -->
      </div>
    </div>
  </div>

  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Icons (Optional) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
  <script>
    const uploadBtn = document.getElementById('upload-btn');
    const fileInput = document.getElementById('file-input');
    const fileList = document.getElementById('file-list');

    // Handle file upload
    uploadBtn.addEventListener('click', () => fileInput.click());

    fileInput.addEventListener('change', () => {
      const files = fileInput.files;
      if (files.length > 0) {
        fileList.innerHTML = ''; // Clear the existing content
        Array.from(files).forEach((file, index) => {
          const row = `
            <tr>
              <td>${index + 1}</td>
              <td>${file.name}</td>
              <td>${(file.size / 1024).toFixed(2)} KB</td>
              <td>${new Date().toLocaleDateString()}</td>
              <td>
                <button class="btn btn-primary btn-sm view-btn">
                  <i class="bi bi-eye"></i> View
                </button>
                <button class="btn btn-danger btn-sm delete-btn">
                  <i class="bi bi-trash"></i> Delete
                </button>
              </td>
            </tr>
          `;
          fileList.insertAdjacentHTML('beforeend', row);
        });
        addDeleteEventListeners();
        addViewEventListeners();
      }
    });

    function addDeleteEventListeners() {
      const deleteButtons = document.querySelectorAll('.delete-btn');
      deleteButtons.forEach((button, index) => {
        button.addEventListener('click', () => {
          const row = button.closest('tr');
          const fileName = row.children[1].textContent;
          const fileSize = row.children[2].textContent;
          const dateDeleted = new Date().toLocaleDateString();
          row.remove();
          if (fileList.children.length === 0) {
            fileList.innerHTML = '<tr><td colspan="5" class="text-center text-muted">No files uploaded yet.</td></tr>';
          }
          // Store deleted file information in localStorage
          const binFiles = JSON.parse(localStorage.getItem('binFiles')) || [];
          binFiles.push({ fileName, fileSize, dateDeleted });
          localStorage.setItem('binFiles', JSON.stringify(binFiles));
        });
      });
    }

    function addViewEventListeners() {
      const viewButtons = document.querySelectorAll('.view-btn');
      viewButtons.forEach((button) => {
        button.addEventListener('click', () => {
          const row = button.closest('tr');
          const fileName = row.children[1].textContent;
          alert(`Viewing file: ${fileName}`);
          // Implement actual file viewing logic here
        });
      });
    }
  </script>
</body>
</html>
