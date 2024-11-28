@extends('back.index')
@section('content')

<?php



?>

  	<!-- container -->
      <div class="container-fluid">

        <!-- breadcrumb -->
        <div class="breadcrumb-header justify-content-between">
            <div class="left-content">
                <div>
                  <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">Hi, welcome back!</h2>
                  <p class="mg-b-0">{{Auth()->user()->name}}.</p>
                </div>
            </div>
            {{-- <div class="main-dashboard-header-right">
                <div>
                    <label class="tx-13">Customer Ratings</label>
                    <div class="main-star">
                        <i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i class="typcn typcn-star"></i> <span>(14,873)</span>
                    </div>
                </div>
                <div>
                    <label class="tx-13">Online Sales</label>
                    <h5>563,275</h5>
                </div>
                <div>
                    <label class="tx-13">Offline Sales</label>
                    <h5>783,675</h5>
                </div>
            </div> --}}
        </div>
        <!-- /breadcrumb -->

        @if (auth()->user()->type == 'owner')

     
        <!-- row -->
        <div class="row row-sm">
            {{-- <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
                <div class="card overflow-hidden sales-card bg-primary-gradient">
                    <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                        <div class="">
                            <h6 class="mb-3 tx-12 text-white">Customer statistics by month </h6>
                        </div>
                        <div class="pb-0 mt-0">
                            <div class="d-flex">
                                <div class="">
                                   
                                        <ul>
                                            @foreach ($customersByMonth as $data)
                                                <li>
                                                    Month: {{ $data->month }} - customer count: {{ $data->customer_count }}
                                                </li>
                                            @endforeach
                                        </ul>
                                   
                                </div>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
                <div class="card overflow-hidden sales-card bg-danger-gradient">
                    <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                        <div class="">
                            <h6 class="mb-3 tx-12 text-white">Customer statistics by category</h6>
                        </div>
                        <div class="pb-0 mt-0">
                            
                            <div class="d-flex">
                                <div class="">
                                    <ul>
                                        @foreach ($customersByCategory as $category)
                                            <li>
                                                category: {{ $category->name_en }} - customer count: {{ $category->customer_count }}
                                            </li>
                                        @endforeach
                                    </ul>
                                  
                                </div>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
                <div class="card overflow-hidden sales-card bg-success-gradient">
                    <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                        <div class="">
                            <h6 class="mb-3 tx-12 text-white">count of customers by state </h6>
                        </div>
                        <div class="pb-0 mt-0">
                            <div class="d-flex">
                                <div class="">
                                    <ul>
                                        @foreach ($customersByState as $state)
                                            <li>
                                                state: {{ $state->state }} - customer count: {{ $state->customer_count }}
                                            </li>
                                        @endforeach
                                    </ul>
                                    
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
                <div class="card overflow-hidden sales-card bg-warning-gradient">
                    <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                        <div class="">
                            <h6 class="mb-3 tx-12 text-white">Customer statistics by status</h6>
                        </div>
                        <div class="pb-0 mt-0">
                            <div class="d-flex">
                                <div class="">
                                  <ul>
                                        @foreach ($customersByStatus as $status)
                                            <li>status: {{ $status->status == 1 ? 'Active' : 'Inactive' }} - customer count: {{ $status->customer_count }}</li>
                                        @endforeach
                                </ul>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}



            <div class="col-xl-6 col-lg-6 col-md-6 col-xm-12 card overflow-hidden sales-card -gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <h6 class="mb-3 tx-12 text-white">Customer Statistics by Month</h6>
                    <canvas id="customersByMonthChart"></canvas>
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-6 col-xm-12 card overflow-hidden sales-card bg-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <h6 class="mb-3 tx-12 text-white">Customer Statistics by Product</h6>
                    <canvas id="customersByProductChart"></canvas>
                </div>
            </div>


            <div class="col-xl-6 col-lg-6 col-md-6 col-xm-12 card overflow-hidden sales-card bg-success-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <h6 class="mb-3 tx-12 text-white">Count of Customers by State</h6>
                    <table class="table table-striped table-dark">
                        <thead>
                            <tr>
                                <th class="text-white">State</th>
                                <th class="text-white">Customer Count</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customersByState as $state)
                            <tr>
                                <td class="text-white">{{ $state->state }}</td>
                                <td class="text-white">{{ $state->customer_count }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


            {{-- <div class="col-xl-6 col-lg-6 col-md-6 col-xm-12 card overflow-hidden sales-card ">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <h6 class="mb-3 tx-12 text-white">Customer Statistics by Status</h6>
                    <canvas id="customersByStatusChart"></canvas>
                </div>
            </div> --}}

            <div class="col-xl-6 col-lg-6 col-md-6 col-xm-12">
                <div class="card overflow-hidden sales-card bg-warning-gradient">
                    <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                        <div class="">
                            <h6 class="mb-3 tx-12 text-white">Customer statistics by status</h6>
                        </div>
                        <div class="pb-0 mt-0">
                            <div class="d-flex">
                                <div class="">
                                  <ul>
                                        @foreach ($customersByStatus as $status)
                                            <li>status: {{ $status->status == 1 ? 'Active' : 'Inactive' }} - customer count: {{ $status->customer_count }}</li>
                                        @endforeach
                                </ul>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        @else
        @endif













        <!-- row closed -->

        <!-- row opened -->
        {{-- <div class="row row-sm">
            <div class="col-md-12 col-lg-12 col-xl-7">
                <div class="card">
                    <div class="card-header bg-transparent pd-b-0 pd-t-20 bd-b-0">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title mb-0">Order status</h4>
                            <i class="mdi mdi-dots-horizontal text-gray"></i>
                        </div>
                        <p class="tx-12 text-muted mb-0">Order Status and Tracking. Track your order from ship date to arrival. To begin, enter your order number.</p>
                    </div>
                    <div class="card-body">
                        <div class="total-revenue">
                            <div>
                              <h4>120,750</h4>
                              <label><span class="bg-primary"></span>success</label>
                            </div>
                            <div>
                              <h4>56,108</h4>
                              <label><span class="bg-danger"></span>Pending</label>
                            </div>
                            <div>
                              <h4>32,895</h4>
                              <label><span class="bg-warning"></span>Failed</label>
                            </div>
                          </div>
                        <div id="bar" class="sales-bar mt-4"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-xl-5">
                <div class="card card-dashboard-map-one">
                    <label class="main-content-label">Sales Revenue by Customers in USA</label>
                    <span class="d-block mg-b-20 text-muted tx-12">Sales Performance of all states in the United States</span>
                    <div class="">
                        <div class="vmap-wrapper ht-180" id="vmap2"></div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- row closed -->

        <!-- row opened -->
        {{-- <div class="row row-sm">
            <div class="col-xl-4 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header pb-1">
                        <h3 class="card-title mb-2">Recent Customers</h3>
                        <p class="tx-12 mb-0 text-muted">A customer is an individual or business that purchases the goods service has evolved to include real-time</p>
                    </div>
                    <div class="card-body p-0 customers mt-1">
                        <div class="list-group list-lg-group list-group-flush">
                            <div class="list-group-item list-group-item-action" href="#">
                                <div class="media mt-0">
                                    <img class="avatar-lg rounded-circle mr-3 my-auto" src="../../assets/img/faces/3.jpg" alt="Image description">
                                    <div class="media-body">
                                        <div class="d-flex align-items-center">
                                            <div class="mt-0">
                                                <h5 class="mb-1 tx-15">Samantha Melon</h5>
                                                <p class="mb-0 tx-13 text-muted">User ID: #1234 <span class="text-success ml-2">Paid</span></p>
                                            </div>
                                            <span class="ml-auto wd-45p fs-16 mt-2">
                                                <div id="spark1" class="wd-100p"></div>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item list-group-item-action" href="#">
                                <div class="media mt-0">
                                    <img class="avatar-lg rounded-circle mr-3 my-auto" src="../../assets/img/faces/11.jpg" alt="Image description">
                                    <div class="media-body">
                                        <div class="d-flex align-items-center">
                                            <div class="mt-1">
                                                <h5 class="mb-1 tx-15">Jimmy Changa</h5>
                                                <p class="mb-0 tx-13 text-muted">User ID: #1234 <span class="text-danger ml-2">Pending</span></p>
                                            </div>
                                            <span class="ml-auto wd-45p fs-16 mt-2">
                                                <div id="spark2" class="wd-100p"></div>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item list-group-item-action" href="#">
                                <div class="media mt-0">
                                    <img class="avatar-lg rounded-circle mr-3 my-auto" src="../../assets/img/faces/17.jpg" alt="Image description">
                                    <div class="media-body">
                                        <div class="d-flex align-items-center">
                                            <div class="mt-1">
                                                <h5 class="mb-1 tx-15">Gabe Lackmen</h5>
                                                <p class="mb-0 tx-13 text-muted">User ID: #1234<span class="text-danger ml-2">Pending</span></p>
                                            </div>
                                            <span class="ml-auto wd-45p fs-16 mt-2">
                                                <div id="spark3" class="wd-100p"></div>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item list-group-item-action" href="#">
                                <div class="media mt-0">
                                    <img class="avatar-lg rounded-circle mr-3 my-auto" src="../../assets/img/faces/15.jpg" alt="Image description">
                                    <div class="media-body">
                                        <div class="d-flex align-items-center">
                                            <div class="mt-1">
                                                <h5 class="mb-1 tx-15">Manuel Labor</h5>
                                                <p class="mb-0 tx-13 text-muted">User ID: #1234<span class="text-success ml-2">Paid</span></p>
                                            </div>
                                            <span class="ml-auto wd-45p fs-16 mt-2">
                                                <div id="spark4" class="wd-100p"></div>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item list-group-item-action br-br-7 br-bl-7" href="#">
                                <div class="media mt-0">
                                    <img class="avatar-lg rounded-circle mr-3 my-auto" src="../../assets/img/faces/6.jpg" alt="Image description">
                                    <div class="media-body">
                                        <div class="d-flex align-items-center">
                                            <div class="mt-1">
                                                <h5 class="mb-1 tx-15">Sharon Needles</h5>
                                                <p class="b-0 tx-13 text-muted mb-0">User ID: #1234<span class="text-success ml-2">Paid</span></p>
                                            </div>
                                            <span class="ml-auto wd-45p fs-16 mt-2">
                                                <div id="spark5" class="wd-100p"></div>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-12 col-lg-6">
                <div class="card">
                    <div class="card-header pb-1">
                        <h3 class="card-title mb-2">Sales Activity</h3>
                        <p class="tx-12 mb-0 text-muted">Sales activities are the tactics that salespeople use to achieve their goals and objective</p>
                    </div>
                    <div class="product-timeline card-body pt-2 mt-1">
                        <ul class="timeline-1 mb-0">
                            <li class="mt-0"> <i class="ti-pie-chart bg-primary-gradient text-white product-icon"></i> <span class="font-weight-semibold mb-4 tx-14 ">Total Products</span> <a href="#" class="float-right tx-11 text-muted">3 days ago</a>
                                <p class="mb-0 text-muted tx-12">1.3k New Products</p>
                            </li>
                            <li class="mt-0"> <i class="mdi mdi-cart-outline bg-danger-gradient text-white product-icon"></i> <span class="font-weight-semibold mb-4 tx-14 ">Total Sales</span> <a href="#" class="float-right tx-11 text-muted">35 mins ago</a>
                                <p class="mb-0 text-muted tx-12">1k New Sales</p>
                            </li>
                            <li class="mt-0"> <i class="ti-bar-chart-alt bg-success-gradient text-white product-icon"></i> <span class="font-weight-semibold mb-4 tx-14 ">Toatal Revenue</span> <a href="#" class="float-right tx-11 text-muted">50 mins ago</a>
                                <p class="mb-0 text-muted tx-12">23.5K New Revenue</p>
                            </li>
                            <li class="mt-0"> <i class="ti-wallet bg-warning-gradient text-white product-icon"></i> <span class="font-weight-semibold mb-4 tx-14 ">Toatal Profit</span> <a href="#" class="float-right tx-11 text-muted">1 hour ago</a>
                                <p class="mb-0 text-muted tx-12">3k New profit</p>
                            </li>
                            <li class="mt-0"> <i class="si si-eye bg-purple-gradient text-white product-icon"></i> <span class="font-weight-semibold mb-4 tx-14 ">Customer Visits</span> <a href="#" class="float-right tx-11 text-muted">1 day ago</a>
                                <p class="mb-0 text-muted tx-12">15% increased</p>
                            </li>
                            <li class="mt-0 mb-0"> <i class="icon-note icons bg-primary-gradient text-white product-icon"></i> <span class="font-weight-semibold mb-4 tx-14 ">Customer Reviews</span> <a href="#" class="float-right tx-11 text-muted">1 day ago</a>
                                <p class="mb-0 text-muted tx-12">1.5k reviews</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-12 col-lg-6">
                <div class="card">
                    <div class="card-header pb-0">
                        <h3 class="card-title mb-2">Recent Orders</h3>
                        <p class="tx-12 mb-0 text-muted">An order is an investor's instructions to a broker or brokerage firm to purchase or sell</p>
                    </div>
                    <div class="card-body sales-info ot-0 pb-0 pt-0">
                        <div id="chart" class="ht-150"></div>
                        <div class="row sales-infomation pb-0 mb-0 mx-auto wd-100p">
                            <div class="col-md-6 col">
                                <p class="mb-0 d-flex"><span class="legend bg-primary brround"></span>Delivered</p>
                                <h3 class="mb-1">5238</h3>
                                <div class="d-flex">
                                    <p class="text-muted ">Last 6 months</p>
                                </div>
                            </div>
                            <div class="col-md-6 col">
                                <p class="mb-0 d-flex"><span class="legend bg-info brround"></span>Cancelled</p>
                                    <h3 class="mb-1">3467</h3>
                                <div class="d-flex">
                                    <p class="text-muted">Last 6 months</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card ">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex align-items-center pb-2">
                                    <p class="mb-0">Total Sales</p>
                                </div>
                                <h4 class="font-weight-bold mb-2">$7,590</h4>
                                <div class="progress progress-style progress-sm">
                                    <div class="progress-bar bg-primary-gradient wd-80p" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="78"></div>
                                </div>
                            </div>
                            <div class="col-md-6 mt-4 mt-md-0">
                                <div class="d-flex align-items-center pb-2">
                                    <p class="mb-0">Active Users</p>
                                </div>
                                <h4 class="font-weight-bold mb-2">$5,460</h4>
                                <div class="progress progress-style progress-sm">
                                    <div class="progress-bar bg-danger-gradient wd-75" role="progressbar"  aria-valuenow="45" aria-valuemin="0" aria-valuemax="45"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- row close -->

        <!-- row opened -->
        {{-- <div class="row row-sm row-deck">
            <div class="col-md-12 col-lg-4 col-xl-4">
                <div class="card card-dashboard-eight pb-2">
                    <h6 class="card-title">Your Top Countries</h6><span class="d-block mg-b-10 text-muted tx-12">Sales performance revenue based by country</span>
                    <div class="list-group">
                        <div class="list-group-item border-top-0">
                            <i class="flag-icon flag-icon-us flag-icon-squared"></i>
                            <p>United States</p><span>$1,671.10</span>
                        </div>
                        <div class="list-group-item">
                            <i class="flag-icon flag-icon-nl flag-icon-squared"></i>
                            <p>Netherlands</p><span>$1,064.75</span>
                        </div>
                        <div class="list-group-item">
                            <i class="flag-icon flag-icon-gb flag-icon-squared"></i>
                            <p>United Kingdom</p><span>$1,055.98</span>
                        </div>
                        <div class="list-group-item">
                            <i class="flag-icon flag-icon-ca flag-icon-squared"></i>
                            <p>Canada</p><span>$1,045.49</span>
                        </div>
                        <div class="list-group-item">
                            <i class="flag-icon flag-icon-in flag-icon-squared"></i>
                            <p>India</p><span>$1,930.12</span>
                        </div>
                        <div class="list-group-item border-bottom-0 mb-0">
                            <i class="flag-icon flag-icon-au flag-icon-squared"></i>
                            <p>Australia</p><span>$1,042.00</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-8 col-xl-8">
                <div class="card card-table-two">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mb-1">Your Most Recent Earnings</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    <span class="tx-12 tx-muted mb-3 ">This is your most recent earnings for today's date.</span>
                    <div class="table-responsive country-table">
                        <table class="table table-striped table-bordered mb-0 text-sm-nowrap text-lg-nowrap text-xl-nowrap">
                            <thead>
                                <tr>
                                    <th class="wd-lg-25p">Date</th>
                                    <th class="wd-lg-25p tx-right">Sales Count</th>
                                    <th class="wd-lg-25p tx-right">Earnings</th>
                                    <th class="wd-lg-25p tx-right">Tax Witheld</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>05 Dec 2019</td>
                                    <td class="tx-right tx-medium tx-inverse">34</td>
                                    <td class="tx-right tx-medium tx-inverse">$658.20</td>
                                    <td class="tx-right tx-medium tx-danger">-$45.10</td>
                                </tr>
                                <tr>
                                    <td>06 Dec 2019</td>
                                    <td class="tx-right tx-medium tx-inverse">26</td>
                                    <td class="tx-right tx-medium tx-inverse">$453.25</td>
                                    <td class="tx-right tx-medium tx-danger">-$15.02</td>
                                </tr>
                                <tr>
                                    <td>07 Dec 2019</td>
                                    <td class="tx-right tx-medium tx-inverse">34</td>
                                    <td class="tx-right tx-medium tx-inverse">$653.12</td>
                                    <td class="tx-right tx-medium tx-danger">-$13.45</td>
                                </tr>
                                <tr>
                                    <td>08 Dec 2019</td>
                                    <td class="tx-right tx-medium tx-inverse">45</td>
                                    <td class="tx-right tx-medium tx-inverse">$546.47</td>
                                    <td class="tx-right tx-medium tx-danger">-$24.22</td>
                                </tr>
                                <tr>
                                    <td>09 Dec 2019</td>
                                    <td class="tx-right tx-medium tx-inverse">31</td>
                                    <td class="tx-right tx-medium tx-inverse">$425.72</td>
                                    <td class="tx-right tx-medium tx-danger">-$25.01</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- /row -->
    </div>
    <!-- /Container -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
            const customersByStatusData = @json($customersByStatus);
            let activeCount = 0;
            let inactiveCount = 0;

            // افرز البيانات بناءً على الحالة
            customersByStatusData.forEach(status => {
                if (status.status === 1) {
                    activeCount = status.customer_count;
                } else if (status.status === 0) {
                    inactiveCount = status.customer_count;
                }
            });

            const ctxStatus = document.getElementById('customersByStatusChart').getContext('2d');
            new Chart(ctxStatus, {
                type: 'doughnut',
                data: {
                    labels: ['Active', 'Inactive'],
                    datasets: [{
                        data: [activeCount, inactiveCount],
                        backgroundColor: ['#4caf50', '#f44336']
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top'
                        }
                    }
                }
            });
    </script>

<script>
    const customersByProductData = @json($customersByProduct);
    const ctxProduct = document.getElementById('customersByProductChart').getContext('2d');
    new Chart(ctxProduct, {
        type: 'pie', // تغيير نوع الرسم البياني إلى دائري
        data: {
            labels: customersByProductData.map(data => data.name_en), // أسماء المنتجات
            datasets: [{
                label: 'Customer Count',
                data: customersByProductData.map(data => data.customer_count), // عدد العملاء لكل منتج
                backgroundColor: [
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(54, 162, 235, 0.7)',
                    'rgba(255, 206, 86, 0.7)',
                    'rgba(75, 192, 192, 0.7)',
                    'rgba(153, 102, 255, 0.7)',
                    'rgba(255, 159, 64, 0.7)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top', // تحديد موضع الأسطورة
                },
                tooltip: {
                    enabled: true
                }
            }
        }
    });
</script>

    <script>
        const customersByMonthData = @json($customersByMonth);
        const ctxMonth = document.getElementById('customersByMonthChart').getContext('2d');
        new Chart(ctxMonth, {
            type: 'bar',
            data: {
                labels: customersByMonthData.map(data => `Month ${data.month}`),
                datasets: [{
                    label: 'Customer Count',
                    data: customersByMonthData.map(data => data.customer_count),
                    backgroundColor: 'rgba(54, 162, 235, 0.7)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    </script>
@endsection