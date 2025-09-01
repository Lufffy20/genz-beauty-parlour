@extends('admin1.sidebar')

@section('main-section')

<div class="main-title">
  <p class="font-weight-bold">BEAUTY PARLOUR DASHBOARD</p>
</div>

<!-- Cards -->
<div class="main-cards">
  <div class="card">
    <div class="card-inner">
      <p class="text-primary">TOTAL BOOKINGS</p>
      <span class="text-primary font-weight-bold">{{ $totalBookings }}</span>
    </div>
  </div>

  <div class="card">
    <div class="card-inner">
      <p class="text-primary">TOTAL SERVICES</p>
      <span class="text-primary font-weight-bold">{{ $totalServices }}</span>
    </div>
  </div>

  <div class="card">
    <div class="card-inner">
      <p class="text-primary">TOTAL PAYMENTS</p>
      <span class="text-primary font-weight-bold">₹{{ number_format($totalPayments, 2) }}</span>
    </div>
  </div>

  <div class="card">
    <div class="card-inner">
      <p class="text-primary">PENDING BOOKINGS</p>
      <span class="text-primary font-weight-bold">{{ $pendingBookings }}</span>
    </div>
  </div>
</div>

<!-- Charts -->
<div class="charts">
  <!-- Bar Chart -->
  <div class="charts-card">
    <p class="chart-title">🍀 Top 5 Booked Services</p>
    <div id="bar-chart"></div>
  </div>

  <!-- Area Chart -->
  <div class="charts-card mt-4">
    <p class="chart-title">📅 Monthly Bookings</p>
    <div id="area-chart"></div>
  </div>
</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

  // Sidebar Toggle (optional)
  let sidebarOpen = false;
  const sidebar = document.getElementById('sidebar');
  window.openSidebar = function () { if (!sidebarOpen) { sidebar.classList.add('sidebar-responsive'); sidebarOpen = true; } }
  window.closeSidebar = function () { if (sidebarOpen) { sidebar.classList.remove('sidebar-responsive'); sidebarOpen = false; } }

  // ------------------- Charts -------------------

  const top5ServicesData = @json($top5ServicesData);
  const top5ServicesNames = @json($top5ServicesNames);
  const monthlyBookingsData = @json($monthlyBookingsData);

  // Bar Chart
  if(top5ServicesData.length > 0){
    new ApexCharts(document.querySelector('#bar-chart'), {
      series: [{ data: top5ServicesData }],
      chart: { type: 'bar', height: 350, toolbar: { show: false } },
      colors: ['#246dec', '#cc3c43', '#367952', '#f5b74f', '#4f35a1'],
      plotOptions: { bar: { distributed: true, borderRadius: 4, columnWidth: '40%' } },
      dataLabels: { enabled: false },
      legend: { show: false },
      xaxis: { categories: top5ServicesNames },
      yaxis: { title: { text: 'Number of Bookings' } }
    }).render();
  } else {
    document.querySelector('#bar-chart').innerHTML = '<p class="text-center text-muted mt-4">No bookings yet.</p>';
  }

  // Area Chart
  if(monthlyBookingsData.length > 0){
    new ApexCharts(document.querySelector('#area-chart'), {
      series: [{ name: 'Bookings', data: monthlyBookingsData }],
      chart: { height: 350, type: 'area', toolbar: { show: false } },
      colors: ['#246dec'],
      dataLabels: { enabled: false },
      stroke: { curve: 'smooth' },
      labels: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
      markers: { size: 0 },
      yaxis: { title: { text: 'Number of Bookings' } },
      tooltip: { shared: true, intersect: false }
    }).render();
  } else {
    document.querySelector('#area-chart').innerHTML = '<p class="text-center text-muted mt-4">No bookings yet.</p>';
  }

});
</script>
@endpush
