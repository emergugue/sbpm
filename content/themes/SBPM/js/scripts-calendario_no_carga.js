$(document).ready(function() {
	
	//alert("En este momento estamos realizando ajustes sobre la plataforma. Ofrecemos disculpas por las molestias ocasionadas");
	//
	$("#detalle-calendario").hide();
	/*$('#evento-calendario').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": "http://bibliotecasmedellin.gov.co/content/themes/SBPM/server_processing.php"
    } );*/
	$('#evento-calendario').dataTable( {
		/*"processing": true,
        "serverSide": true,
        "ajax": "http://bibliotecasmedellin.gov.co/content/themes/SBPM/server_processing.php",*/
        "drawCallback": function ( settings ) {
            var api = this.api();
            
            var rows = api.rows( {page:'current'} ).nodes();
            //alert(rows);
            var last=null;
            var c2 = 0;

            api.column(4, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
					//alert(i);
					//alert(group);
                    $(rows).eq( i ).before(
                        '<tr class="group"><td colspan="5"><h1 class="h-no-estyle" style="font-family: roboto; font-size: 30px; font-weight: bold; background-color: #2b3057; color: white; width: 100%; padding-left: 6px;">'+group+'</h1></td></tr>'
                    );

            	    var x = document.getElementsByClassName(group.replace("/", "-")).length;
            	    var c = 0;
            	    c2 = c2 + x;

                	$("." + group.replace("/", "-")).each(function(i, obj) 
                	{
                		if (c == (x-1))
                		{
                			$(this).addClass("ultimo-evento-mes");
						   	htmlstr = '<p style="display:none;">si</p>';
	                	    $(htmlstr).insertAfter(obj);
	                	}
	                	c = c + 1;
					});
                    last = group;
                }
            } );

			grupos = [];

			var c3 = 0;

            api.column(3, {page:'current'} ).data().each( function (group, i ) {
                if ( last !== group) 
                {
            	    var x = document.getElementsByClassName(group).length;
            	    c3 = c3 + x;
            	    var c = 0;
                	$("." + group).each(function(i, obj) {
						//alert(i);
						//alert(group);
                		if (c == (x-1))
                		{
                			if (!($(this).hasClass("ultimo-evento-mes")) || c2 == c3)
                			{
							   	htmlstr = '<tr id="azul-'+ group +'" class="group"><td colspan="5"><p class="h-no-estyle" style="font-family: roboto; font-size: 30px; font-weight: bold; width: 100%; padding-left: 6px;border-bottom: 3px solid #4a5eaf;"></p></td></tr>';
		                	    $(htmlstr).insertAfter(obj);
		                	}
		                	else
		                	{
							   	htmlstr = '<tr id="no-'+ group +'" class="group"><td colspan="5"><p class="h-no-estyle" style="font-family: roboto; font-size: 30px; font-weight: bold; width: 100%; padding-left: 6px;border-bottom: 3px solid none;"></p></td></tr>';
		                	    $(htmlstr).insertAfter(obj);
		                	}
	                	}
	                	c = c + 1;
					});
                    last = group;
                }
                else
                {
            		//htmlstr = '<tr class="group"><td colspan="5"><p class="h-no-estyle" style="font-family: roboto; font-size: 30px; font-weight: bold; width: 100%; padding-left: 6px;border-bottom: 10px solid gray;"></p></td></tr>';
            	    //$(htmlstr).insertAfter("." + group);
            	    var x = document.getElementsByClassName(group).length;
            	    var c = 0;
					if(!($("#gris-"+ group).length ))
					{
	                	$("." + group).each(function(i, obj) {
	                		if (c < (x-1))
	                		{
							   	htmlstr = '<tr id="gris-'+ group +'" class="group"><td colspan="5"><p class="h-no-estyle" style="font-family: roboto; font-size: 30px; font-weight: bold; width: 100%; padding-left: 6px;border-bottom: 2px solid #cbcbcb;"></p></td></tr>';
		                	    $(htmlstr).insertAfter(obj);
	                		}
	                		c = c + 1;
						});
					}
                }
            } );

        },
		"info":     false,
		"bLengthChange": false,
		"bInfo": false,
		"order": [[3, 'asc']],
		"aaSorting": [[3, 'asc']],
		"columnDefs": [
		{
			"targets": [ 0, 1, 2, 3, 4],
			"visible": false,
			"searchable": true
		}]
	} );



	// Setup - add a text input to each footer cell
	var title = "Publico";
	$("body").append( '<input type="hidden" placeholder="Search '+title+'" name="buscar'+title+'" id="buscar'+title+'" />' );
	var title = "Categoria";
	$("body").append( '<input type="hidden" placeholder="Search '+title+'" name="buscar'+title+'" id="buscar'+title+'" />' );
	var title = "Fecha";
	$("body").append( '<input type="hidden" placeholder="Search '+title+'" name="buscar'+title+'" id="buscar'+title+'" />' );
	var title = "Biblioteca";
	$("body").append( '<input type="hidden" placeholder="Search '+title+'" name="buscar'+title+'" id="buscar'+title+'" />' );

	// DataTable
	var table = $('#evento-calendario').DataTable();

	var d = new Date();
	var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
	var n = d.getMonth();
	var anio = 	d.getFullYear().toString();
	var mesactual = meses[n].toUpperCase();
	
	table.page.jumpToData( mesactual + "/" + anio, 4);
	
	$(function(){
		$("[class*='publico-swap']").click(function() 
		{
			if ($(this).hasClass("on"))
			{
				this.src = this.src.replace("_over.png",".png");
			} 
			else 
			{
				$("[class*='publico-swap']").removeClass("on");

		 		$("[class*='publico-swap']").each(function(e)
				{
					this.src = this.src.replace("_over.png",".png");
				});
				this.src = this.src.replace(".png","_over.png");
			}
			$(this).toggleClass("on");
		});

		$("[class*='evento-swap']").click(function() 
		{
			if ($(this).hasClass("on"))
			{
				this.src = this.src.replace("_over.png",".png");
			} 
			else 
			{
				$("[class*='evento-swap']").removeClass("on");

				$("[class*='evento-swap']").each(function(e)
				{
					this.src = this.src.replace("_over.png",".png");
				});
				this.src = this.src.replace(".png","_over.png");
			}
			$(this).toggleClass("on");
		});

		if( $('#nombreBiblioteca').length > 0)
		{
		    biblioteca = $('#nombreBiblioteca').text();
			if( $('#bibliotecaSelect').length > 0)
			{
				if (!($('#bibliotecaSelect option:contains('+ biblioteca +')').length))
		     	{
		     		var numb = $('#bibliotecaSelect > option').size();
		     		//$('#input1 option').size();
				    $('#bibliotecaSelect').append($("<option></option>").attr("value","biblioteca" + numb.toString()).text(biblioteca));
			    }
			    $('#bibliotecaSelect option:contains('+ biblioteca +')').prop('selected', true);
			    $('#buscarBiblioteca').val(biblioteca);
			    $('#nombreBibliotecaTabla').text(biblioteca);
			    $('#evento-calendario').DataTable().column(0).search($('#buscarBiblioteca').val()).draw();
		    }
		}

		$('#bibliotecaSelect').on('change', function (e) {
			var optionSelected = $('#bibliotecaSelect').find("option:selected").text();
			$('#nombreBibliotecaTabla').text(optionSelected);
			//console.log(optionSelected);
			if (optionSelected == "-TODAS-")
			//if (optionSelected == "")
			{
				//console.log("En el if");
				optionSelected = "";
				
				$('#nombreBibliotecaTabla').text("Todas las bibliotecas");
			}
			//console.log(optionSelected);
			$('#buscarBiblioteca').val(optionSelected);
			$('#evento-calendario').DataTable().column(0).search($('#buscarBiblioteca').val()).draw();
		});

		$('#infantil').click(function(){
			if ($('#buscarPublico').val() == "infantil")
			{
				$('#buscarPublico').val("");
			}
			else
			{
				$('#buscarPublico').val("infantil");
			}

			$('#evento-calendario').DataTable().column(1).search($('#buscarPublico').val()).draw();
		});
		
		$('#jovenes').click(function(){
			if ($('#buscarPublico').val() == "jovenes")
			{
				$('#buscarPublico').val("");
			}
			else
			{
				$('#buscarPublico').val("jovenes");
			}
			
			
			$('#evento-calendario').DataTable().column(1).search($('#buscarPublico').val()).draw();
		});

		$('#adultos').click(function(){
			if ($('#buscarPublico').val() == "adulto")
			{
				$('#buscarPublico').val("");
			}
			else
			{
				$('#buscarPublico').val("adulto");
			}


			$('#evento-calendario').DataTable().column(1).search($('#buscarPublico').val()).draw();
		});

		$('#adultosmayores').click(function(){
			if ($('#buscarPublico').val() == "adulto mayor")
			{
				$('#buscarPublico').val("");
			}
			else
			{
				$('#buscarPublico').val("adulto mayor");
			}

			
			$('#evento-calendario').DataTable().column(1).search($('#buscarPublico').val()).draw();
		});


		$('#familiar').click(function(){
			if ($('#buscarPublico').val() == "familiar")
			{
				$('#buscarPublico').val("");
			}
			else
			{
				$('#buscarPublico').val("familiar");
			}

			
			$('#evento-calendario').DataTable().column(1).search($('#buscarPublico').val()).draw();
		});
		
		$('#general').click(function(){
			if ($('#buscarPublico').val() == "general")
			{
				$('#buscarPublico').val("");
			}
			else
			{
				$('#buscarPublico').val("general");
			}


			$('#evento-calendario').DataTable().column(1).search($('#buscarPublico').val()).draw();
		});

		$('#femenino').click(function(){
			if ($('#buscarPublico').val() == "femenino")
			{
				$('#buscarPublico').val("");
			}
			else
			{
				$('#buscarPublico').val("femenino");
			}
			

			$('#evento-calendario').DataTable().column(1).search($('#buscarPublico').val()).draw();
		});

		$('#personascondiscapacidad').click(function(){
			if ($('#buscarPublico').val() == "discapacidad")
			{
				$('#buscarPublico').val("");
			}
			else
			{
				$('#buscarPublico').val("discapacidad");
			}


			$('#evento-calendario').DataTable().column(1).search($('#buscarPublico').val()).draw();
		});

		$('#academico').click(function(){
			if ($('#buscarCategoria').val() == "academico")
			{
				$('#buscarCategoria').val("");
			}
			else
			{
				$('#buscarCategoria').val("academico");
			}

			
			$('#evento-calendario').DataTable().column(2).search($('#buscarCategoria').val()).draw();
		});
		
		$('#audiovisual').click(function(){
			if ($('#buscarCategoria').val() == "audiovisual")
			{
				$('#buscarCategoria').val("");
			}
			else
			{
				$('#buscarCategoria').val("audiovisual");
			}

			
			$('#evento-calendario').DataTable().column(2).search($('#buscarCategoria').val()).draw();
		});

		$('#cultural').click(function(){
			if ($('#buscarCategoria').val() == "cultural")
			{
				$('#buscarCategoria').val("");
			}
			else
			{
				$('#buscarCategoria').val("cultural");
			}


			$('#evento-calendario').DataTable().column(2).search($('#buscarCategoria').val()).draw();
		});

		$('#deporteyrecreacion').click(function(){
			if ($('#buscarCategoria').val() == "deporte y recreacion")
			{
				$('#buscarCategoria').val("");
			}
			else
			{
				$('#buscarCategoria').val("deporte y recreacion");
			}

			
			$('#evento-calendario').DataTable().column(2).search($('#buscarCategoria').val()).draw();
		});

		$('#digital').click(function(){
			if ($('#buscarCategoria').val() == "digital")
			{
				$('#buscarCategoria').val("");
			}
			else
			{
				$('#buscarCategoria').val("digital");
			}

			
			$('#evento-calendario').DataTable().column(2).search($('#buscarCategoria').val()).draw();
		});

		$('#formaciondeusuarios').click(function(){
			if ($('#buscarCategoria').val() == "formacion")
			{
				$('#buscarCategoria').val("");
			}
			else
			{
				$('#buscarCategoria').val("formacion");
			}

			
			$('#evento-calendario').DataTable().column(2).search($('#buscarCategoria').val()).draw();
		});

		$('#lecturayescritura').click(function(){
			if ($('#buscarCategoria').val() == "lectura y escritura")
			{
				$('#buscarCategoria').val("");
			}
			else
			{
				$('#buscarCategoria').val("lectura y escritura");
			}

			
			$('#evento-calendario').DataTable().column(2).search($('#buscarCategoria').val()).draw();
		});

		$('#memoria').click(function(){
			if ($('#buscarCategoria').val() == "memoria")
			{
				$('#buscarCategoria').val("");
			}
			else
			{
				$('#buscarCategoria').val("memoria");
			}


			$('#evento-calendario').DataTable().column(2).search($('#buscarCategoria').val()).draw();
		});

		$('#tallercreativo').click(function(){
			if ($('#buscarCategoria').val() == "taller creativo")
			{
				$('#buscarCategoria').val("");
			}
			else
			{
				$('#buscarCategoria').val("taller creativo");
			}

			
			$('#evento-calendario').DataTable().column(2).search($('#buscarCategoria').val()).draw();
		});

		$('#vacacionescreativas').click(function(){
			if ($('#buscarCategoria').val() == "vacaciones creativas")
			{
				$('#buscarCategoria').val("");
			}
			else
			{
				$('#buscarCategoria').val("vacaciones creativas");
			}

			
			$('#evento-calendario').DataTable().column(2).search($('#buscarCategoria').val()).draw();
		});

		$('#buscador').click(function(){
			
			$('#evento-calendario').DataTable().search($('#buscarTodo').val()).draw();
			//$('#evento-calendario').DataTable().search(parabuscar).draw();
		});

		$('#buscarTodo').keyup(function (e) {
		    if (e.keyCode == 13) {
		        $('#evento-calendario').DataTable().search($('#buscarTodo').val()).draw();
		    }
		});

		$('#buscarTodo').blur(function()
		{
		    if( $(this).val().length === 0 ) {
		        $('#evento-calendario').DataTable().search($('#buscarTodo').val()).draw();
		    }
		});

	});
	
	

	$.datepicker.regional['es'] = {
		closeText: 'Cerrar',
		prevText: '<',
		nextText: '>',
		currentText: 'Hoy',
		monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
		monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
		dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
		dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
		dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
		weekHeader: 'Sm',
		dateFormat: 'yymmdd',
		firstDay: 0,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: '',
	};
	$.datepicker.setDefaults($.datepicker.regional['es']);

	$('#datepicker').datepicker({
		inline: true,
		sideBySide: true,
	    showOtherMonths: true,
	    selectOtherMonths: true,
		onSelect: function(dateText, inst) { 
			if (dateText == $('#buscarFecha').val())
			{
				$('#buscarFecha').val("");
				$(this).datepicker( 'setDate', null);
			}
			else
			{
				var dateAsString = dateText; //the first parameter of this function
				var dateAsObject = $(this).datepicker( 'getDate' ); //the getDate method
				$('#buscarFecha').val(dateAsString);
			}
			$('#evento-calendario').DataTable().column(3).search($('#buscarFecha').val()).draw();
		}
	});
	
	
	
});
