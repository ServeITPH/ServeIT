<?php
//Page Visits
$pagesQuery = "SELECT page, COUNT(visitID) AS visitCount FROM visits GROUP BY page";
$pagesResult = executeQuery($pagesQuery);

$chartLabels = array();
$chartData = array();

while ($pagesRow = mysqli_fetch_assoc($pagesResult)) {

	array_push($chartLabels, $pagesRow['page']);
	array_push($chartData, $pagesRow['visitCount']);
} ?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Visits per Page Bar Chart</title>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
	<div style="width: 100%; margin: 0 auto;">
		<canvas id="visitsChart"></canvas>
	</div>

	<script>
		// Create chart
		var ctx = document.getElementById('visitsChart').getContext('2d');
		var visitsChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: [<?php echo '"' . implode('","', $chartLabels) . '"' ?>], // Pages as labels for the x-axis
				datasets: [{
					label: 'Number of Visits',
					data: [<?php echo implode(',', $chartData) ?>],
					backgroundColor: 'rgba(75, 192, 192, 0.5)',
					borderColor: 'rgba(75, 192, 192, 1)',
					borderWidth: 1
				}]
			},
			options: {
				responsive: true,
				plugins: {
					legend: {
						display: false, // Hide the legend as it's not necessary
					},
					tooltip: {
						mode: 'index',
						intersect: false,
					}
				},
				scales: {
					x: {
						title: {
							display: true,
							text: 'Pages'
						}
					},
					y: {
						beginAtZero: true,
						title: {
							display: true,
							text: 'Number of Visits'
						}
					}
				}
			}
		});
	</script>
</body>

</html>