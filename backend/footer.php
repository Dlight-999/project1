    <!-- Scripts -->
    <!-- ApexCharts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
    <!-- Custom JS -->
	<script>
		// SIDEBAR TOGGLE

var sidebarOpen = false;
var sidebar = document.getElementById("sidebar");

function openSidebar() {
  if(!sidebarOpen) {
    sidebar.classList.add("sidebar-responsive");
    sidebarOpen = true;
  }
}

function closeSidebar() {
  if(sidebarOpen) {
    sidebar.classList.remove("sidebar-responsive");
    sidebarOpen = false;
  }
}


//ae//
            // Get the search input element
            const searchInput = document.getElementById('searchInput');

// Add event listener for input change
searchInput.addEventListener('input', function() {
  const searchValue = this.value.toLowerCase();
  const table = document.getElementById('dataTable');
  const rows = table.getElementsByTagName('tr');

  // Loop through all table rows and hide/show based on search input
  for (let i = 1; i < rows.length; i++) { // Start from index 1 to skip the table header row
    const row = rows[i];
    const columns = row.getElementsByTagName('td');
    let found = false;

    for (let j = 0; j < columns.length; j++) {
      const column = columns[j];
      if (column.innerHTML.toLowerCase().indexOf(searchValue) > -1) {
        found = true;
        break;
      }
    }

    if (found) {
      row.style.display = '';
    } else {
      row.style.display = 'none';
    }
  }
});

	</script>
  </body>
</html>