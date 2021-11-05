// Only where #visitsChart exists
if (document.getElementById('visitsChart')) {
  // Setup
  const data = {
    labels: dates,
    datasets: [{
      label: "# of landing pages loaded",
      data: counts,
      lineTension: 0,
      backgroundColor: '#transparent',
      borderColor: '#007bff',
      borderWidth: 4,
      pointBackgroundColor: '#454d55'
    }]
  };

  const options = {
    responsive: true,
    plugins: {
      legend: {
        position: 'top',
      },
      title: {
        display: false,
        text: 'Visits counter',
        color: '#007bff',
        font: {
          family: 'Segoe UI',
          size: 30,
          style: 'normal',
          lineHeight: 1.5
        },
      }
    }
  };

  // Config
  const config = {
    type: 'line',
    data: data,
    options: options,
  };

  // Chart instantiation
  const myChart = new Chart(
    document.getElementById('visitsChart'),
    config
  );

}
