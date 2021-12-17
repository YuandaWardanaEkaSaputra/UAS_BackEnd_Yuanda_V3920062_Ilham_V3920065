<?php 
include 'koneksi.php';
$get1 = mysqli_query($koneksi,"select * from sipesan_pengguna where pengguna_level ='administrator'" );
$count1 = mysqli_num_rows($get1);

$get2 = mysqli_query($koneksi,"select * from sipesan_pengguna where pengguna_level ='pemesan'" );
$count2 = mysqli_num_rows($get2);
?>
<div class="col-12">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">
				Data Pelanggan
			</h4>
			<div class="table-responsive">
				<table id="order-listing" class="table table-bordered">
					<thead>
					<tr>
						<th style="width: 1%;">No</th>
						<th>Username</th>
						<th>Email</th>
						<th style="text-align: center"><i class="icon-settings"></i></th>
					</tr>
					</thead>
					<tbody>
					<?php
					$no = 1;
					foreach ($pelanggan as $ket=>$value):
					?>
					<tr>
						<td><?=$no?></td>
						<td><?=$value['pengguna_username']?></td>
						<td><?=$value['pengguna_email']?></td>
						<td class="text-center">
							<a href="#" class="btn social-btn btn-rounded btn-primary" title="Lihat"><i class="icon-eye"></i></a>
						</td>
					</tr>
					<?php
					$no++;
					endforeach;
					?>
					</tbody>
				</table>
			</div>
		</div>
		<div id="piechart" style="width: auto; height: 500px;"></div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['List Pengguna', 'Jumlah Pengguna'],
          ['administrator',    <?php echo $count1 ?>],
          ['pemesan',   <?php echo $count2 ?>],

        ]);

        var options = {
          title: 'Jumlah Pengguna'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
	</div>
</div>
