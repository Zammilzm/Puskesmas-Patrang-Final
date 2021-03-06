<!DOCTYPE html>
<html>
<head>
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Import materialize.css-->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('asset/css/materialize.min.css') }}">
	<!-- 	<link rel="stylesheet" type="text/css" href="{{ URL::asset('asset/bootstrap/css/bootstrap.min.css') }}"> -->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('asset/css/styleuser.css') }}">
	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>Home User</title>
</head>
<body style="background-color:#cfd8dc;">
	<a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
	<ul id="slide-out" class="side-nav fixed">
		<li>
			<div class="userView">
				<div class="background">
					<img src="{{ URL::asset('/image/angga.jpg') }}">
				</div>
				<a href="#!user"><img class="circle" src="{{ URL::asset('/image/iconperawat.png') }}"></a>
				<a href="#!name"><span class="white-text name">PERAWAT</span></a>
			</div>
		</li>
		<li><a href="{{URL('perawat')}}" class="waves-effect" ><i class="material-icons">home</i>HOME</a></li>
		<li><div class="divider"></div></li>
		<li><a href="{{URL('pemeriksaan')}}" class="waves-effect" ><i class="material-icons">face</i>PELAYANAN PEMERIKSAAN</a></li>
		<li><div class="divider"></div></li>
		<li>
			<a class="waves-effect active" href="{{URL('rujukan')}}">PERUJUKAN PASIEN
				<i class="material-icons">assignment</i>
			</a>
		</li>
		<div class="divider"></div>
		<li>
			<a class="waves-effect" href="{{URL('teslab')}}">LIHAT TES LAB DALAM
				<i class="material-icons">assignment</i>
			</a>
		</li>

		<div class="divider"></div>

		<li>
			<a class="waves-effect" href="{{URL('resep')}}">PENGELOLAAN RESEP OBAT
				<i class="material-icons">assignment</i>
			</a>
		</li>

		<div class="divider"></div>

		<li>
			<a class="waves-effect">PENGELOLAAN RAWAT INAP
				<i class="material-icons">assignment</i>
			</a>
		</li>
		<div class="divider"></div>
		<li><a href="home.php" class="waves-effect" ><i class="material-icons">power_settings_new</i>LOG OUT</a></li>
	</ul>
	<div class="container">
		<div class="row">
			<form class="col s11 offset-s2" method="POST" action="{{ url('/add/rujukans') }}">
				{{ csrf_field() }}
				<h2 style="text-decoration:underline;">DATA RUJUKAN</h2>
				<div class="row">
					<div class="input-field col s10">
						<select name="id_pelayanan">
							@foreach($pelayanans as $pelayanan)
							<option value="{{$pelayanan->id_pelayanan}}">{{$pelayanan->id_pelayanan}}</option>
							@endforeach
						</select>		
						<label for="icon_telephone">PILIH ID PELAYANAN</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s10">
						<p>Tanggal Rujukan</p>
						<input type="date" name="tanggal_rujukan" required>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s10">
						<input id="icon_telephone" type="tel" class="validate" name="keterangan" required>
						<label for="Alamat">keterangan</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s10">
						<input id="icon_telephone" type="tel" class="validate" name="tempat_rujukan" required>
						<label for="icon_telephone">tempat rujukan</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s10">
						<input disabled value="Tidak Tervalidasi" id="disabled" type="text" class="validate" name="status_rujukan">
						<label for="EMail">status rujukan
						</label>
					</div>
				</div>
				<div class="row">
					<div class="col-md-7">
						<button type="submit" class="btn btn-primary btn-block" >SIMPAN</button> <br>
						<button type="reset" class="btn btn-primary btn-block" >BATAL</button>
					</div>
				</div>
			</form>
		</div>
	</div>
<!-- 	<script type="text/javascript" src="{{ URL::asset('asset/js/materialize.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('asset/js/jquery-1.11.1.min.js') }}"></script> -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
	<script type="text/javascript">
		$( document ).ready(function(){$(".button-collapse").sideNav();});
		$(document).ready(function() {
			$('select').material_select();
		});
		$('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
});
</script>
</body>
</html>