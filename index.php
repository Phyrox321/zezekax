<html>
<head>
	<title>𝓤𝓬𝓱𝓲𝓱𝓪 𝓘𝓽𝓪𝓬𝓱𝓲</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=gb18030">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="files/nucleo.css" rel="stylesheet">
	<link href="files/all.min.css" rel="stylesheet">
	<link href="files/argon-dashboard.css" rel="stylesheet">
	<link href="files/style.css" rel="stylesheet">
	<link href="assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
	<script src="files/jquery.min.js"></script>
	<script src="files/bootstrap.bundle.min.js"></script>
	<script src="files/argon-dashboard.min.js"></script>
	<script src="files/cc-gen.js"></script>
	<script type="text/javascript">
            var element = new Image;
            var devtoolsOpen = false;
            element.__defineGetter__("id", function(){
                devtoolsOpen = true;
                window.location.href = "about:blank";
            });
            setInterval(function(){
                devtoolsOpen = false;
                console.log(element);
                document.getElementById('output').innerHTML += (devtoolsOpen ? "dev tools is open\n" : "dev tools is closed\n");
            }, 1000);
        </script>
</head>
<body onload="Abstract();" style="background-color: white">
	<div class="main-content">
		<div class="header pb-7 pt-5 pt-lg-8 d-flex align-items-center">
			<span class="mask bg-default opacity-5"></span>
			<div class="container-fluid d-flex align-items-center"></div>
		</div>
		<div class="container-fluid mt--7">
			<div class="row">
				<div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
					<div class="card card-profile shadow">
						<div class="row justify-content-center">
							<div class="col-lg-3 order-lg-2">
								<div class="card-profile-image">
									<img class="rounded-square" src="https://media1.tenor.com/images/09138251ca37378ad3ac4fc9f708924f/tenor.gif?itemid=13199961" style="width: 250px">
								</div>
							</div>
						</div><div class="card-header"></div>
						<center>
							<br>
								<br><p classs="align-center"><span class="badge badge-purple" style="font-size: 30px;"> ♛𝓘𝓽𝓪𝓬𝓱𝓲 𝓤𝓬𝓱𝓲𝓱𝓪 ♛ </span></p>
								<button id="ccgen" class="btn btn-sm btn-dark" data-toggle="modal" style="width: 100px;" data-target="#myModal"><i class="fa fa-cog"></i> GEN</button>
								<button id="start" class="btn btn-sm btn-info" style="width: 100px;"><i class="fa fa-play"></i> START</button>
						<button id="stop" class="btn btn-sm btn-default -right" style="width: 100px;" disabled=""><i class="fa fa-pause"></i> STOP</button>
					</center>
						<div class="card-body pt-0 pt-md-4">
							<div class="row">
								<div class="col">
									<div class="card-profile-stats d-flex justify-content-center mt-md-5">
										<div>
											<span class="heading" id="total_ccs">0</span>
											<span class="description">Loaded</span>
										</div>
										<div>
											<span class="heading" id="checked_ccs">0</span>
											<span class="description">Checked</span>
										</div>
										<div>
											<span class="heading" id="lives_ccs">0</span>
											<span class="description">Live</span>
										</div>
										<div>
											<span class="heading" id="lives_ccns">0</span>
											<span class="description">CCN</span>
										</div>
										<div>
											<span class="heading" id="dead_ccs">0</span>
											<span class="description">Declined</span>
										</div>
									</div>
								</div>
							</div>
							<div class="text-center">
								<hr class="my-4">
								<span id="status_ccs"></span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-8 order-xl-1">
					<div class="card bg-secondary shadow">
						<div class="card-header bg-white border-0">
							<div class="row align-items-center">
								<div class="col-8">
									<h3 class="mb-0">[𝓘𝓽𝓪𝓬𝓱𝓲 𝓒𝓱𝓮𝓬𝓴𝓮𝓻]<small>  (3 REQ)</b></small></b> -  Accept :&nbsp;&nbsp;<small><i class="fa fa-cc-visa"></i> <i class="fa fa-cc-mastercard"></i> </small><small></i><i class="fa fa-cc-Amex"></i></small>
								</div>
							</div>
						</div>
						<div class="card-body">
							<div class="pl-lg-4">
								<div class="form-group">
									<textarea class="form-control form-control-alternative" rows="7" id="ccs_list" placeholder="INSERT YOUR CCS HERE" rows="3" style="height: 50%; resize: none;"></textarea>
								</div>
								<div class="form-group">
									<textarea class="form-control form-control-alternative" rows="4" id="prx_list" placeholder="INSERT YOUR PROXYS HERE" rows="3" style="height: 50%; resize: none;"></textarea>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="nav-wrapper">
				<ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
					<li class="nav-item">
						<a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="ni ni-check-bold"></i> Live CVV</a>
					</li>
					<li class="nav-item">
						<a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab" href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3" aria-selected="true"><i class="ni ni-check-bold"></i> Live CCN</a>
					</li>
					<li class="nav-item">
						<a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="true"><i class="ni ni-fat-remove"></i> Dead</a>
					</li>
				</ul>
			</div>
			<div class="card shadow">
				<div class="card-body">
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
							<h4 class="card-title" align="left">Approved -&nbsp;<span id="lives_cs" class="badge badge-success">0</span></h4>
							<p class="description" id="approved_ccs">
								
							</p>
						</div>
						<div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel3" aria-labelledby="tabs-icons-text-1-tab">
							<h4 class="card-title" align="left">Approved -&nbsp;<span id="lives_ccn" class="badge badge-success">0</span></h4>
							<p class="description" id="approved_ccn">
							</p>
						</div>
						<div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel2" aria-labelledby="tabs-icons-text-2-tab">
							<h4 class="card-title" align="left">Declined -&nbsp;<span id="dies_cs" class="badge badge-danger">0</span></h4>
							<p class="description" id="declined_ccs">
								
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" role="dialog" id="myModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<form role="form" name="console" id="console" method="POST">
					<div class="modal-header">
						<h4 class="modal-title">Card Generator - Abstract</h4>
						<button type="button" class="close" data-dismiss="modal">×</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<p class="text-main text-bold"><b>BIN:</b></p>
							<input type="text" class="form-control" name="ccp" id="ccpN" placeholder="453590xxxxxxxxxx">
							<select class="input_text" name="ccnsp" style="display: none">
								<option selected="selected">Ninguno</option>
							</select>
							<div type="hidden" class="p" style="visibility: hidden; display: none">
								<input checked="checked" name="ccexpdat" id="ccexpdat">
								<input checked="checked" name="ccvi" id="ccvi">
								<input name="ccbank" id="ccbank">
							</div>
							<hr>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-6">
									<p class="text-main text-bold"><b>Month:</b></p>
									<div class="input-group-field">
										<select class="form-control" name="emeses">
											<option value="rnd">Random</option>
											<option value="01">01</option>
											<option value="02">02</option>
											<option value="03">03</option>
											<option value="04">04</option>
											<option value="05">05</option>
											<option value="06">06</option>
											<option value="07">07</option>
											<option value="08">08</option>
											<option value="09">09</option>
											<option value="10">10</option>
											<option value="11">11</option>
											<option value="12">12</option>
										</select>
									</div>
									<hr>
								</div>
								<div class="col-md-6">
									<p class="text-main text-bold"><b>Year:</b></p>
									<div class="input-group-field">
										<select class="form-control" name="eyear">
											<option value="rnd">Random</option>
											<option value="2020">2020</option>
											<option value="2021">2021</option>
											<option value="2022">2022</option>
											<option value="2023">2023</option>
											<option value="2024">2024</option>
											<option value="2025">2025</option>
											<option value="2026">2026</option>
											<option value="2027">2027</option>
											<option value="2028">2028</option>
											<option value="2029">2029</option>
											<option value="2030">2030</option>
										</select>
									</div>
									<hr>
									<div type="hidden" class="col-md-3" style="visibility: hidden; display: none">
										<input name="tr" value="1000">
										<input name="L" value="1L">
									</div>
									<div type="hidden" class="col-md-3" style="visibility: hidden; display: none">
										<select class="input_text" name="ccoudatfmt" value="CHECKER">
											<option selected="selected" value="CHECKER">CHECKER</option>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-6">
									<p class="text-main text-bold"><b>CVV:</b></p>
									<input type="text" class="form-control" name="eccv" id="eccv" placeholder="CVV2" value="rnd">
									<hr>
								</div>
								<div class="col-md-6">
									<p class="text-main text-bold"><b>Quantity:</b></p>
									<input type="number" class="form-control" name="ccghm" value="10">
									<hr>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<a name="generar" id="generar">
							<button type="button" class="btn btn-inverse" data-dismiss="modal"><i class="fa fa-credit-card"></i>&nbsp&nbspGenerate</button>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	<br>
	<br>
	<br>
	<br>
	<script type="text/javascript">
		var inicio_mp3 = new Audio("api/blop.mp3");
		var error_mp3 = new Audio("api/error.wav");
		var aprobada_mp3 = new Audio("api/aprobada.mp3");
		var proxy_type = $("#prx_type").val();
		$(document).ready(function(){
			$("#start").click(function(){
				proxy_type = $("#prx_type").val();
				limpiar_ccs();
				limpiar_proxies();
				running = true;

				if($("#ccs_list").val().length == 0){
					error_mp3.play();
					$("#status_ccs").html("<i class='fa fa-exclamation-triangle'></i> Enter your card list to continue.");
					return;
				}

				if($("#prx_list").val().length == 0){
					error_mp3.play();
					$("#status_ccs").html("<i class='fa fa-exclamation-triangle'></i> Enter your proxy list to continue.");
					return;
				}

				$(this).attr("disabled", true);
				$("#stop").attr("disabled", false);
				iniciar();
			});

			$("#stop").click(function(){
				$("#status_ccs").html("<i class='fa fa-stop'></i> Gateway stoppped.");
				if(running == true){
					running = false;
					$(this).attr("disabled", true);
					$("#start").attr("disabled", false);
					document.getElementById("ccs_list").disabled = false;
					document.getElementById("prx_list").disabled = false;
				}else{
					$(this).attr("disabled", true);
					$("#start").attr("disabled", false);
				}
			});

			function iniciar(){
				inicio_mp3.play();
				$("#status_ccs").html("<i class='fa fa-spinner fa-spin fa-fw'></i> Gateway started.");
				document.getElementById("ccs_list").disabled = true;
				document.getElementById("prx_list").disabled = true;
				limpiar_contadores();
				eliminar_lineas_vacias();
				var output2 = document.getElementById("ccs_list").value;
				var proxys = document.getElementById("prx_list").value;
				get_total = true;
				start();
			}

			function start(){
				if(!running){
					return false;
				}

				var socks = document.getElementById("prx_list").value.split("\n");
				if(socks.length == "1" && socks[0] == ""){
					setTimeout(function(){
						error_mp3.play();
						document.getElementById("start").disabled = false;
						document.getElementById("stop").disabled = true;
						document.getElementById("prx_list").disabled = false;
						document.getElementById("ccs_list").disabled = false;
						$("#status_ccs").html("");
						delete array;
					}, 1001);
					return;

					$("#status_ccs").html("<i class='fa fa-exclamation-triangle'></i> Enter more proxies to continue.");
					return;
				}

				var array = document.getElementById("ccs_list").value.split("\n");
				if(array.length == "1" && array[0] == ""){
					setTimeout(function(){
						document.getElementById("start").disabled = false;
						document.getElementById("stop").disabled = true;
						document.getElementById("prx_list").disabled = false;
						document.getElementById("ccs_list").disabled = false;
						document.getElementById("ccs_list").value = "";
						$("#status_ccs").html("<i class='fa fa-check'></i> Gateway ended successful.");
						delete array;
					}, 1001);
					return;

					$("#status_ccs").html("<i class='fa fa-check'></i> Gateway ended successful.");
					return;					
				}

				if(get_total == true){
					get_total = false;
					$("#total_ccs").html(array.length);
				}
				startchk(array[0]);
				delete array[0];
				return;
			}

			function startchk(url){
				var proxy = $("#prx_list").val().split("\n");
				proxy = proxy[0];
				$.ajax({
					url: "api.php",
					type: "GET",
					data: "card=" + encodeURIComponent(url) + "&proxy=" + proxy + "&type=" + proxy_type,
					timeout: 20000,
					async: true,
					success: function(data){
						if(data.indexOf("Approved") >= 0){
							aprobada_mp3.play();
							var cc = url.split("|")[0];
							eliminar_linea("#ccs_list");
							$("#approved_ccs").append(data);
							document.getElementById("lives_ccs").innerHTML = (eval(document.getElementById("lives_ccs").innerHTML) + 1);
							document.getElementById("lives_cs").innerHTML = (eval(document.getElementById("lives_cs").innerHTML) + 1);
							document.getElementById("checked_ccs").innerHTML = (eval(document.getElementById("checked_ccs").innerHTML) + 1);
							$("#status_ccs").html("<i class='fa fa-check'></i> " + cc + " has been approved.");
						}else if(data.indexOf("CCN") >= 0){
							aprobada_mp3.play();
							var cc = url.split("|")[0];
							eliminar_linea("#ccs_list");
							$("#approved_ccn").append(data);
							document.getElementById("lives_ccns").innerHTML = (eval(document.getElementById("lives_ccns").innerHTML) + 1);
							document.getElementById("lives_ccn").innerHTML = (eval(document.getElementById("lives_ccn").innerHTML) + 1);
							document.getElementById("checked_ccs").innerHTML = (eval(document.getElementById("checked_ccs").innerHTML) + 1);
							$("#status_ccs").html("<i class='fa fa-check'></i> " + cc + " has been approved.");
						}else if(data.includes("DIE")){
							var cc = url.split("|")[0];
							eliminar_linea("#ccs_list");
							$("#declined_ccs").append(data);
							document.getElementById("dead_ccs").innerHTML = (eval(document.getElementById("dead_ccs").innerHTML) + 1);
							document.getElementById("dies_cs").innerHTML = (eval(document.getElementById("dies_cs").innerHTML) + 1);
							document.getElementById("checked_ccs").innerHTML = (eval(document.getElementById("checked_ccs").innerHTML) + 1);
							$("#status_ccs").html("<i class='fa fa-times'></i> " + cc + " has been declined.");
						}else if(data.includes("Unknown Card")){
							var cc = url.split("|")[0];
							eliminar_linea("#ccs_list");
							$("#declined_ccs").append(data);
							document.getElementById("dead_ccs").innerHTML = (eval(document.getElementById("dead_ccs").innerHTML) + 1);
							document.getElementById("dies_cs").innerHTML = (eval(document.getElementById("dies_cs").innerHTML) + 1);
							document.getElementById("checked_ccs").innerHTML = (eval(document.getElementById("checked_ccs").innerHTML) + 1);
							$("#status_ccs").html("<i class='fa fa-times'></i> " + cc + " has been declined.");
						}else if(data.includes("Proxy dead")){
							eliminar_linea("#prx_list");
							$("#status_ccs").html("<i class='fa fa-times'></i> " + proxy + " dead.");
						}else{
							var cc = url.split("|")[0];
							eliminar_linea("#ccs_list");
							$("#declined_ccs").append(data);
							document.getElementById("dead_ccs").innerHTML = (eval(document.getElementById("dead_ccs").innerHTML) + 1);
							document.getElementById("dies_cs").innerHTML = (eval(document.getElementById("dies_cs").innerHTML) + 1);
							document.getElementById("checked_ccs").innerHTML = (eval(document.getElementById("checked_ccs").innerHTML) + 1);
							$("#status_ccs").html("<i class='fa fa-times'></i> " + cc + " has been declined.");
						}
						start();
					},
					error: function(){
						eliminar_linea("#prx_list");
						$("#status_ccs").html("<i class='fa fa-times'></i> " + proxy + " dead.");
						start();
					}
				});
			}
// edited by blackcloud
			function unique(array){
				return array.filter(function(el, index, arr){
					return index == arr.indexOf(el);
				});
			}

			function eliminar_linea(id){
				var lines = $(id).val().split("\n");
				lines.splice(0, 1);
				$(id).val(lines.join("\n"));
			}

			function eliminar_lineas_vacias(){
				var array = $("#ccs_list").val().split("\n");
				var array_sock = $("#prx_list").val().split("\n");
				array = unique(array);
				array_sock = unique(array_sock);
				for(i = 0; i < array.length; i++){
					array[i] = array[i].trim();
					array[i] = array[i].replace("   ", "");
					if(array[i].length === 0){
						array.splice(i, 1);
					}

				}
				for(i = 0; i < array_sock.length; i++){
					array_sock[i] = array_sock[i].trim();
					array_sock[i] = array_sock[i].replace("   ", "");
					if(array_sock[i].length === 0){
						array_sock.splice(i, 1);
					}

				}
				$("#ccs_list").val(array.join("\n"));
				$("#prx_list").val(array_sock.join("\n"));
			}

			function limpiar_contadores(){
				$("#total_ccs").html("0");
				$("#checked_ccs").html("0");
				$("#lives_ccs").html("0");
				$("#lives_ccns").html("0");
				$("#dead_ccs").html("0");
			}

			function limpiar_ccs(){
				var ccs_lista = $("#ccs_list").val();
				var limpio = ccs_lista.match(/4[0-9]{15}[^\d][0-9]{1,4}[^\d][0-9]{1,4}[^\d][0-9]{3}|5[0-9]{15}[^\d][0-9]{1,4}[^\d][0-9]{1,4}[^\d][0-9]{3}|3[0-9]{14}[^\d][0-9]{1,4}[^\d][0-9]{1,4}[^\d][0-9]{4}|6[0-9]{15}[^\d][0-9]{1,4}[^\d][0-9]{1,4}[^\d][0-9]{3}/g);
				if(limpio){
					var lista = "";
					for(var i = 0; i < limpio.length; i++){
						lista = lista + limpio[i];
						if(i!=(limpio.length - 1)){
							lista = lista + "\n";
						}
					}
					$("#ccs_list").val(lista);
				}else{
					$("#ccs_list").val("");
				}
			}

			function limpiar_proxies(){
				var proxy_lista = $("#prx_list").val();
				var limpio = proxy_lista.match(/\d{1,3}([.])\d{1,3}([.])\d{1,3}([.])\d{1,3}((:)|(\s)+)\d{1,8}/g);
				if(limpio){
					var lista = "";
					for(var i = 0; i < limpio.length; i++){
						if(limpio[i].match(/\d{1,3}([.])\d{1,3}([.])\d{1,3}([.])\d{1,3}(\s)+\d{1,8}/g)){
							limpio[i] = limpio[i].replace(/(\s)+/, ":");
						}
						lista = lista + limpio[i];
						if(i!=(limpio.length - 1)){
							lista = lista + "\n";
						}
					}
					$("#prx_list").val(lista);
				}else{
					$("#prx_list").val("");
				}
			}
		});
	</script>
</body>
</html>