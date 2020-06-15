<?php
$current_month = date('M');
$last_month_1 = date('M',strtotime("-1 month"));
$last_month_2 = date('M',strtotime("-2 month"));
$last_month_3 = date('M',strtotime("-3 month"));
$last_month_4 = date('M',strtotime("-4 month"));
$last_month_5 = date('M',strtotime("-5 month"));
$last_month_6 = date('M',strtotime("-6 month"));
$last_month_7 = date('M',strtotime("-7 month"));
$last_month_8 = date('M',strtotime("-8 month"));
$last_month_9 = date('M',strtotime("-9 month"));
$last_month_10 = date('M',strtotime("-10 month"));
$last_month_11 = date('M',strtotime("-11 month"));
$dataPoints = array(
  array("y" => $last_total_books_5, "label" => $last_month_5),
  array("y" => $last_total_books_4, "label" => $last_month_4),
  array("y" => $last_total_books_3, "label" => $last_month_3),
  array("y" => $last_total_books_2, "label" => $last_month_2),
  array("y" => $last_total_books_1, "label" => $last_month_1),
  array("y" => $current_total_books, "label" => $current_month),
  array("y" => $last_total_books_11, "label" => $last_month_11),
  array("y" => $last_total_books_10, "label" => $last_month_10),
  array("y" => $last_total_books_9, "label" => $last_month_9),
  array("y" => $last_total_books_8, "label" => $last_month_8),
  array("y" => $last_total_books_7, "label" => $last_month_7),
  array("y" => $last_total_books_6, "label" => $last_month_6),
);
?>

<?php
$Points = array(
  array("y" => $users[1]['count'], "label" => 'Online',"color" => '#33FFA8'),
  array("y" => $users[0]['count'], "label" => 'Offline',"color" => '#565957'),
);
 
?>
@extends('layouts.admin')

@section('title')
<title>{{ __('Dashboard') }}</title>
@endsection

@section('isi')
<script>
window.onload = function () {
var chart1 = new CanvasJS.Chart("chartContainer", {
  animationEnabled: true,
	data: [{
		type: "area",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
var chart2 = new CanvasJS.Chart("PieChart", {
  animationEnabled: true,
	data: [{
		type: "pie",
		dataPoints: <?php echo json_encode($Points, JSON_NUMERIC_CHECK); ?>
	}]
});
chart1.render();
chart2.render();
}
</script>
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>
          <div class="row">
            <div class="col-xl-3 col-md-6 mb-4"><a href="{{ route('admin.showbooks') }}">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{__('Overall books')}}</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $all_books ?? '' }}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-book fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div></a>
            <div class="col-xl-3 col-md-6 mb-4"><a href="{{ route('admin.showlibrarians') }}">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">{{__('Overall Librarians')}}</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $all_users }}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-book-reader fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div></a>
        </div>
          <div class="row">
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">{{ __('
Number Of Books Releases Per Month') }}</h6>
                  <div class="dropdown no-arrow">                
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart-area">
                    <div id="chartContainer" style="height: 100%; width: 100%;"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                </div>
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <div id="PieChart" style="height: 100%; width: 100%;"></div>
                  </div>
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> {{ __('Online') }}
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle"style='color=black;'></i> {{ __('Offline') }}
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection
   