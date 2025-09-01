// SIDEBAR TOGGLE
let sidebarOpen = false;
const sidebar = document.getElementById('sidebar');

function openSidebar() {
  if (!sidebarOpen) {
    sidebar.classList.add('sidebar-responsive');
    sidebarOpen = true;
  }
}

function closeSidebar() {
  if (sidebarOpen) {
    sidebar.classList.remove('sidebar-responsive');
    sidebarOpen = false;
  }
}

// ---------- CHARTS ----------

// Get data from hidden inputs
const topServicesInput = document.getElementById('topServices');
const monthlyBookingsInput = document.getElementById('monthlyBookings');

const topServices = topServicesInput ? JSON.parse(topServicesInput.value) : [];
const monthlyBookings = monthlyBookingsInput ? JSON.parse(monthlyBookingsInput.value) : [];

// BAR CHART → Top Services
if(topServices.length > 0){
    const barChartOptions = {
        series: [{ name: 'Bookings', data: topServices.map(s => s.count) }],
        chart: { type: 'bar', height: 350, toolbar: { show: false } },
        colors: ['#f5b74f','#246dec','#cc3c43','#367952','#4f35a1'],
        plotOptions: { bar: { distributed: true, borderRadius: 4, columnWidth: '40%' } },
        dataLabels: { enabled: true },
        legend: { show: false },
        xaxis: { categories: topServices.map(s => s.name) },
        yaxis: { title: { text: 'Bookings' } },
    };

    const barChart = new ApexCharts(document.querySelector('#bar-chart'), barChartOptions);
    barChart.render();
}

// AREA CHART → Monthly Bookings
if(monthlyBookings.length > 0){
    const areaChartOptions = {
        series: [{ name: 'Bookings', data: monthlyBookings.map(m => m.count) }],
        chart: { height: 350, type: 'area', toolbar: { show: false } },
        colors: ['#4f35a1'],
        dataLabels: { enabled: false },
        stroke: { curve: 'smooth' },
        labels: monthlyBookings.map(m => m.month),
        markers: { size: 4 },
        tooltip: { shared: true, intersect: false },
    };

    const areaChart = new ApexCharts(document.querySelector('#area-chart'), areaChartOptions);
    areaChart.render();
}
  