
		<!-- BEGIN HOME MAP -->
		<?php

		error_reporting(E_ALL);
		    ini_set('display_errors', 1);
				require_once 'vendor/autoload.php';
				require_once 'generated-conf/config.php';
				  $filtroTexto = isset($_COOKIE['filtroTexto']) ? $_COOKIE['filtroTexto'] : "" ;
				  $filtroMin = isset($_COOKIE['filtroMin']) ? $_COOKIE['filtroMin'] : "" ;
				  $filtroMax = isset($_COOKIE['filtroMax']) ? $_COOKIE['filtroMax'] : "" ;
					$filtroOperacion = isset($_COOKIE['filtroOperacion']) ? $_COOKIE['filtroOperacion'] : "" ;




					$filtroBanios = isset($_COOKIE['filtroBanios']) ? $_COOKIE['filtroBanios'] : "" ;
					$filtroRecamaras = isset($_COOKIE['filtroRecamaras']) ? $_COOKIE['filtroRecamaras'] : "" ;
					$filtroMinTerre = isset($_COOKIE['filtroMinTerre']) ? $_COOKIE['filtroMinTerre'] : "" ;
					$filtroMaxTerre = isset($_COOKIE['filtroMaxTerre']) ? $_COOKIE['filtroMaxTerre'] : "" ;
					$filtroMinConst = isset($_COOKIE['filtroMinConst']) ? $_COOKIE['filtroMinConst'] : "" ;
					$filtroMaxConst = isset($_COOKIE['filtroMaxConst']) ? $_COOKIE['filtroMaxConst'] : "" ;
					$filtroPlantas = isset($_COOKIE['filtroPlantas']) ? $_COOKIE['filtroPlantas'] : "" ;

				?>

		<div id="home-map">

			<div id="properties_map"></div>

			<!-- BEGIN MAP PROPERTY FILTER -->
			<div id="map-property-filter">

				<div class="contain+er">
					<div class="row">
						<div class="col-sm-12" style="padding: 0;">
							<i id="filter-close" class="fa fa-minus"></i>
							<form name="filterForm" onsubmit="return false" action="return false">
								<div class="form-group">

									<div class="col-xs-12 col-md-5">
										<input id="filtroTexto" autocomplete="off" type="text" class="form-control" value="<?php echo $filtroTexto;  ?>" name="location" placeholder="Ciudad, Estado, Pais, etc...">
										<div id="results">
										</div>


											<select id="search_status" name="search_status" data-placeholder="Operacion">
												<option value=""> </option>
												<option value="Venta" <?php if($filtroOperacion == "Venta") echo 'selected'?>>Venta</option>
												<option value="Renta" <?php if($filtroOperacion == "Renta") echo 'selected'?>>Renta</option>
											</select>

									</div>

									<div class="col-xs-12 col-md-2" >
										<div id="minDivSelect"  style="padding-left: 0;">
											<select id="filtroMin"  name="search_minprice" data-placeholder="Min. Precio">
												<option value=""> </option>
												<option value="25000" <?php if($filtroMin == "25000") echo 'selected'?> >$25000</option>
												<option value="50000" <?php if($filtroMin == "50000") echo 'selected'?> >$50000</option>
												<option value="75000" <?php if($filtroMin == "75000") echo 'selected'?> >$75000</option>
												<option value="100000" <?php if($filtroMin == "100000") echo 'selected'?> >$100000</option>
												<option value="150000" <?php if($filtroMin == "150000") echo 'selected'?> >$150000</option>
												<option value="200000" <?php if($filtroMin == "200000") echo 'selected'?> >$200000</option>
												<option value="300000" <?php if($filtroMin == "300000") echo 'selected'?> >$300000</option>
												<option value="500000" <?php if($filtroMin == "500000") echo 'selected'?> >$500000</option>
												<option value="750000" <?php if($filtroMin == "750000") echo 'selected'?> >$750000</option>
												<option value="1000000" <?php if($filtroMin == "1000000") echo 'selected'?> >$1000000</option>
											</select>
										</div>

										<div id="maxDivSelect" style="padding-right: 0;">
											<select id="filtroMax" name="search_maxprice" data-placeholder="Max. Precio">
												<option value=""> </option>
												<option value="25000" <?php if($filtroMax == "25000") echo 'selected'?> >$25000</option>
												<option value="50000" <?php if($filtroMax == "50000") echo 'selected'?> >$50000</option>
												<option value="75000" <?php if($filtroMax == "75000") echo 'selected'?> >$75000</option>
												<option value="100000" <?php if($filtroMax == "100000") echo 'selected'?> >$100000</option>
												<option value="150000" <?php if($filtroMax == "150000") echo 'selected'?> >$150000</option>
												<option value="200000" <?php if($filtroMax == "200000") echo 'selected'?> >$200000</option>
												<option value="300000" <?php if($filtroMax == "300000") echo 'selected'?> >$300000</option>
												<option value="500000" <?php if($filtroMax == "500000") echo 'selected'?> >$500000</option>
												<option value="750000" <?php if($filtroMax == "750000") echo 'selected'?> >$750000</option>
												<option value="1000000" <?php if($filtroMax == "1000000") echo 'selected'?> >$1000000</option>
											</select>
										</div>

									</div>
									<div id="tipo_propiedad" class="col-xs-12 col-md-5" style="margin-top:0px;" >
									<!--<h3 class="pull-left">Propiedades: <span id="total_propiedades" ><span></h3>-->
										<select id="tipo_propiedad_select"class="pull-left otro" multiple name="tipo_propiedad" data-placeholder="Selecciona tipos de propiedad +">
											<option value=""> </option>
											<?php
											$tipos_propiedad_p = TipoPropiedadQuery::create()->find();
											if(count($tipos_propiedad_p) > 0){
												foreach ($tipos_propiedad_p as $tipo) {
													if(in_array($tipo->getId(), explode(",",$_COOKIE['filtroTipo']))){
														echo '<option value="'.$tipo->getId().'" selected >'.$tipo->getNombre().'</option>';
													} else {
														echo '<option value="'.$tipo->getId().'">'.$tipo->getNombre().'</option>';
													}
												}
											}
											?>
										</select>


									</div>


									<div class="col-xs-12 col-md-12" >
										<button onclick="Filter(); " class="btn btn-block btn-fullcolor">Buscar</button>
									</div>


								</div>
							</form>

						</div>
					</div>
				</div>
			</div>
			<!-- END MAP PROPERTY FILTER -->

		</div>
		<!-- END HOME MAP -->
	<!-- Properties list -->
	<script src="js/properties.js"></script>

	<script type="text/javascript">
		(function($){
			"use strict";

			$(document).ready(function(){
				$('#filtroTexto').keyup(autocomplete);

				$('#search_status').change(changeRangePrice);

				// $('#tipo_propiedad_select_chzn').focus(function(){
				// 	if($("ul.chzn-choices").children().length > 1) {
				// 		$("#tipo_propiedad").removeClass("form-control-tipo-propiedad");
				// 	} else {
				// 		$("#tipo_propiedad").addClass("form-control-tipo-propiedad");
				// 	}
				// });

				$("#filtroTexto").blur(function(){
					$("#results").fadeOut(500);
				}).focus(function() {
					if(keyword != $("#results").val()){
						$("#results").show();
					}
				});

				<?php require 'PHP/propiedades/get_all_propiedades.php';?>
			});
		})(jQuery);

		function changeRangePrice(){
			var selected = $("#search_status option:selected").val();
			var minPriceSelect = $('#minDivSelect');
			var maxPriceSelect = $('#maxDivSelect');


			if(selected == "Venta"){

				var html = '<option value=""></option>';
				html += '<option value="300000">$300,000</option>';
				html += '<option value="600000">$600,000</option>';
				html += '<option value="900000">$900,000</option>';
				html += '<option value="1200000">$1,200,000</option>';
				html += '<option value="1500000">$1,500,000</option>';
				html += '<option value="2000000">$2,000,000</option>';
				html += '<option value="2500000">$2,500,000</option>';
				html += '<option value="3000000">$3,000,000</option>';
				html += '<option value="4000000">$4,000,000</option>';
				html += '<option value="5000000">$5,000,000</option>';
				html += '<option value="10000000">$10,000,000</option>';
				html += '<option value="20000000">$20,000,000</option>';
				html += '<option value="30000000">$30,000,000</option>';
				html += '<option value="50000000">$50,000,000</option>';

				$('#filtroMin').html(html);
				$('#search_minprice').trigger('liszt:updated');


				html = '<option value=""></option>';
				html += '<option value="300000">$300,000</option>';
				html += '<option value="600000">$600,000</option>';
				html += '<option value="900000">$900,000</option>';
				html += '<option value="1200000">$1,200,000</option>';
				html += '<option value="1500000">$1,500,000</option>';
				html += '<option value="2000000">$2,000,000</option>';
				html += '<option value="2500000">$2,500,000</option>';
				html += '<option value="3000000">$3,000,000</option>';
				html += '<option value="4000000">$4,000,000</option>';
				html += '<option value="5000000">$5,000,000</option>';
				html += '<option value="10000000">$10,000,000</option>';
				html += '<option value="20000000">$20,000,000</option>';
				html += '<option value="30000000">$30,000,000</option>';
				html += '<option value="50000000">$50,000,000+</option>';


				$('#filtroMax').html(html);
				$('#search_maxprice').trigger('liszt:updated');

			} else if(selected == "Renta") {

				var html = '<option value=""></option>';
				html += '<option value="3000">$3,000</option>';
				html += '<option value="6000">$6,000</option>';
				html += '<option value="9000">$9,000</option>';
				html += '<option value="12000">$12,000</option>';
				html += '<option value="15000">$15,000</option>';
				html += '<option value="20000">$20,000</option>';
				html += '<option value="25000">$25,000</option>';
				html += '<option value="30000">$30,000</option>';
				html += '<option value="40000">$40,000</option>';
				html += '<option value="50000">$50,000</option>';
				html += '<option value="100000">$100,000</option>';
				html += '<option value="200000">$200,000</option>';
				html += '<option value="300000">$300,000</option>';
				html += '<option value="500000">$500,000</option>';


				$('#filtroMin').html(html);
				$('#search_minprice').trigger('liszt:updated');


				html = '<option value=""></option>';
				html += '<option value="3000">$3,000</option>';
				html += '<option value="6000">$6,000</option>';
				html += '<option value="9000">$9,000</option>';
				html += '<option value="12000">$12,000</option>';
				html += '<option value="15000">$15,000</option>';
				html += '<option value="20000">$20,000</option>';
				html += '<option value="25000">$25,000</option>';
				html += '<option value="30000">$30,000</option>';
				html += '<option value="40000">$40,000</option>';
				html += '<option value="50000">$50,000</option>';
				html += '<option value="100000">$100,000</option>';
				html += '<option value="200000">$200,000</option>';
				html += '<option value="300000">$300,000</option>';
				html += '<option value="500000">$500,000+</option>';


				$('#filtroMax').html(html);
				$('#search_maxprice').trigger('liszt:updated');
			}

			$('#filtroMax').trigger("liszt:updated");
			$('#filtroMin').trigger("liszt:updated");



		}

		function Filter(){
			var tipoSelected = $("#tipo_propiedad_select option:selected");
			var tipoIds = [];
			for(var i = 0; i < tipoSelected.length; i++){
				tipoIds[i] = tipoSelected[i].value;
			}


			var ids = tipoIds.join();
			var filtroTexto = $('#filtroTexto').val();
			var	filtroMin = $('#filtroMin').val();
			var	filtroMax = $('#filtroMax').val();
			var filtroOperacion = $('#filtroOperacion').val();

			$.cookie("filtroTexto", filtroTexto, {path: '/'});
			$.cookie("filtroMin", filtroMin, {path: '/'});
			$.cookie("filtroMax", filtroMax, {path: '/'});
			$.cookie("filtroOperacion", filtroOperacion, {path: '/'});
			$.cookie("filtroTipo", ids, {path: '/'});

			$.ajax({
		        url: 'PHP/propiedades/get_filtered_propiedades.php',
		        type: 'POST',
		        dataType: "json",
		        data: {
								filtroTexto: filtroTexto,
		            filtroBanios: filtroMin,
								filtroMax: filtroMax,
		            filtroMin: filtroMin,
		            filtroTipo: ids
		        },
		        success: function(data){
		            Cozy.propertiesMap(data, 'properties_map');
								//alert(data.length);

		            //$("#total_propiedades").html(data.length);
		        }
		    });
		}

		function autocomplete(){
			var keyword = $('#filtroTexto').val();

			if(keyword != ""){
				$.get( "PHP/propiedades/get_autocomplete_words.php", { keyword: keyword } )
				  .done(function( data ) {
						$("#results").show();
				    $('#results').html('');
						var results = jQuery.parseJSON(data);
						$(results).each(function(key, value) {
							$('#results').append('<div class="list-item">' + value + '</div>');
						});

						$('.list-item').click(function(){
							var text = $(this).html();
							// Eliminamos los tags del string que pusimos al traerlos del server
							text = text.replace('<strong>', '');
							text = text.replace('</strong>', '');
							$('#filtroTexto').val(text);
						});
			  });
			} else {
				$('#results').html('');
				$("#results").fadeOut(500);
			}
		}

	</script>
