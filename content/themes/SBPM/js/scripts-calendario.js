jQuery(document).ready(function() {
	jQuery("#detalle-calendario").hide();
	jQuery('#evento-calendario').dataTable( {
        "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
            var c2 = 0;

            api.column(4, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
                    jQuery(rows).eq( i ).before(
                        '<tr class="group"><td colspan="5"><h1 class="h-no-estyle" style="font-family: roboto; font-size: 30px; font-weight: bold; background-color: #2b3057; color: white; width: 100%; padding-left: 6px;">'+group+'</h1></td></tr>'
                    );

            	    var x = document.getElementsByClassName(group.replace("/", "-")).length;
            	    var c = 0;
            	    c2 = c2 + x;

                	jQuery("." + group.replace("/", "-")).each(function(i, obj) 
                	{
                		if (c == (x-1))
                		{
                			jQuery(this).addClass("ultimo-evento-mes");
						   	htmlstr = '<p style="display:none;">si</p>';
	                	    jQuery(htmlstr).insertAfter(obj);
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
                	jQuery("." + group).each(function(i, obj) {
                		if (c == (x-1))
                		{
                			if (!(jQuery(this).hasClass("ultimo-evento-mes")) || c2 == c3)
                			{
							   	htmlstr = '<tr id="azul-'+ group +'" class="group"><td colspan="5"><p class="h-no-estyle" style="font-family: roboto; font-size: 30px; font-weight: bold; width: 100%; padding-left: 6px;border-bottom: 3px solid #4a5eaf;"></p></td></tr>';
		                	    jQuery(htmlstr).insertAfter(obj);
		                	}
		                	else
		                	{
							   	htmlstr = '<tr id="no-'+ group +'" class="group"><td colspan="5"><p class="h-no-estyle" style="font-family: roboto; font-size: 30px; font-weight: bold; width: 100%; padding-left: 6px;border-bottom: 3px solid none;"></p></td></tr>';
		                	    jQuery(htmlstr).insertAfter(obj);
		                	}
	                	}
	                	c = c + 1;
					});
                    last = group;
                }
                else
                {
            		//htmlstr = '<tr class="group"><td colspan="5"><p class="h-no-estyle" style="font-family: roboto; font-size: 30px; font-weight: bold; width: 100%; padding-left: 6px;border-bottom: 10px solid gray;"></p></td></tr>';
            	    //jQuery(htmlstr).insertAfter("." + group);
            	    var x = document.getElementsByClassName(group).length;
            	    var c = 0;
					if(!(jQuery("#gris-"+ group).length ))
					{
	                	jQuery("." + group).each(function(i, obj) {
	                		if (c < (x-1))
	                		{
							   	htmlstr = '<tr id="gris-'+ group +'" class="group"><td colspan="5"><p class="h-no-estyle" style="font-family: roboto; font-size: 30px; font-weight: bold; width: 100%; padding-left: 6px;border-bottom: 2px solid #cbcbcb;"></p></td></tr>';
		                	    jQuery(htmlstr).insertAfter(obj);
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
	jQuery("body").append( '<input type="hidden" placeholder="Search '+title+'" name="buscar'+title+'" id="buscar'+title+'" />' );
	var title = "Categoria";
	jQuery("body").append( '<input type="hidden" placeholder="Search '+title+'" name="buscar'+title+'" id="buscar'+title+'" />' );
	var title = "Fecha";
	jQuery("body").append( '<input type="hidden" placeholder="Search '+title+'" name="buscar'+title+'" id="buscar'+title+'" />' );
	var title = "Biblioteca";
	jQuery("body").append( '<input type="hidden" placeholder="Search '+title+'" name="buscar'+title+'" id="buscar'+title+'" />' );

	// DataTable
	var table = jQuery('#evento-calendario').DataTable();

	var d = new Date();
	var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
	var n = d.getMonth();
	var anio = 	d.getFullYear().toString();
	var mesactual = meses[n].toUpperCase();
	
	table.page.jumpToData( mesactual + "/" + anio, 4);

	jQuery(function(){
		jQuery("[class*='publico-swap']").click(function() 
		{
			if (jQuery(this).hasClass("on"))
			{
				this.src = this.src.replace("_over.png",".png");
			} 
			else 
			{
				jQuery("[class*='publico-swap']").removeClass("on");

		 		jQuery("[class*='publico-swap']").each(function(e)
				{
					this.src = this.src.replace("_over.png",".png");
				});
				this.src = this.src.replace(".png","_over.png");
			}
			jQuery(this).toggleClass("on");
		});

		jQuery("[class*='evento-swap']").click(function() 
		{
			if (jQuery(this).hasClass("on"))
			{
				this.src = this.src.replace("_over.png",".png");
			} 
			else 
			{
				jQuery("[class*='evento-swap']").removeClass("on");

				jQuery("[class*='evento-swap']").each(function(e)
				{
					this.src = this.src.replace("_over.png",".png");
				});
				this.src = this.src.replace(".png","_over.png");
			}
			jQuery(this).toggleClass("on");
		});

		if( jQuery('#nombreBiblioteca').length > 0)
		{
		    biblioteca = jQuery('#nombreBiblioteca').text();
			if( jQuery('#bibliotecaSelect').length > 0)
			{
				if (!(jQuery('#bibliotecaSelect option:contains('+ biblioteca +')').length))
		     	{
		     		var numb = jQuery('#bibliotecaSelect > option').size();
		     		//jQuery('#input1 option').size();
				    jQuery('#bibliotecaSelect').append(jQuery("<option></option>").attr("value","biblioteca" + numb.toString()).text(biblioteca));
			    }
			    jQuery('#bibliotecaSelect option:contains('+ biblioteca +')').prop('selected', true);
			    jQuery('#buscarBiblioteca').val(biblioteca);
			    jQuery('#nombreBibliotecaTabla').text(biblioteca);
			    jQuery('#evento-calendario').DataTable().column(0).search(jQuery('#buscarBiblioteca').val()).draw();
		    }
		}

		jQuery('#bibliotecaSelect').on('change', function (e) {
			var optionSelected = jQuery('#bibliotecaSelect').find("option:selected").text();
			jQuery('#nombreBibliotecaTabla').text(optionSelected);
			//console.log(optionSelected);
			if (optionSelected == "-TODAS-")
			//if (optionSelected == "")
			{
				//console.log("En el if");
				optionSelected = "";
				
				jQuery('#nombreBibliotecaTabla').text("Todas las bibliotecas");
			}
			//console.log(optionSelected);
			jQuery('#buscarBiblioteca').val(optionSelected);
			jQuery('#evento-calendario').DataTable().column(0).search(jQuery('#buscarBiblioteca').val()).draw();
		});

		jQuery('#infantil').click(function(){
			if (jQuery('#buscarPublico').val() == "infantil")
			{
				jQuery('#buscarPublico').val("");
			}
			else
			{
				jQuery('#buscarPublico').val("infantil");
			}

			jQuery('#evento-calendario').DataTable().column(1).search(jQuery('#buscarPublico').val()).draw();
		});
		
		jQuery('#jovenes').click(function(){
			if (jQuery('#buscarPublico').val() == "jovenes")
			{
				jQuery('#buscarPublico').val("");
			}
			else
			{
				jQuery('#buscarPublico').val("jovenes");
			}
			
			
			jQuery('#evento-calendario').DataTable().column(1).search(jQuery('#buscarPublico').val()).draw();
		});

		jQuery('#adultos').click(function(){
			if (jQuery('#buscarPublico').val() == "adulto")
			{
				jQuery('#buscarPublico').val("");
			}
			else
			{
				jQuery('#buscarPublico').val("adulto");
			}


			jQuery('#evento-calendario').DataTable().column(1).search(jQuery('#buscarPublico').val()).draw();
		});

		jQuery('#adultosmayores').click(function(){
			if (jQuery('#buscarPublico').val() == "adulto mayor")
			{
				jQuery('#buscarPublico').val("");
			}
			else
			{
				jQuery('#buscarPublico').val("adulto mayor");
			}

			
			jQuery('#evento-calendario').DataTable().column(1).search(jQuery('#buscarPublico').val()).draw();
		});


		jQuery('#familiar').click(function(){
			if (jQuery('#buscarPublico').val() == "familiar")
			{
				jQuery('#buscarPublico').val("");
			}
			else
			{
				jQuery('#buscarPublico').val("familiar");
			}

			
			jQuery('#evento-calendario').DataTable().column(1).search(jQuery('#buscarPublico').val()).draw();
		});
		
		jQuery('#general').click(function(){
			if (jQuery('#buscarPublico').val() == "general")
			{
				jQuery('#buscarPublico').val("");
			}
			else
			{
				jQuery('#buscarPublico').val("general");
			}


			jQuery('#evento-calendario').DataTable().column(1).search(jQuery('#buscarPublico').val()).draw();
		});

		jQuery('#femenino').click(function(){
			if (jQuery('#buscarPublico').val() == "femenino")
			{
				jQuery('#buscarPublico').val("");
			}
			else
			{
				jQuery('#buscarPublico').val("femenino");
			}
			

			jQuery('#evento-calendario').DataTable().column(1).search(jQuery('#buscarPublico').val()).draw();
		});

		jQuery('#personascondiscapacidad').click(function(){
			if (jQuery('#buscarPublico').val() == "discapacidad")
			{
				jQuery('#buscarPublico').val("");
			}
			else
			{
				jQuery('#buscarPublico').val("discapacidad");
			}


			jQuery('#evento-calendario').DataTable().column(1).search(jQuery('#buscarPublico').val()).draw();
		});

		jQuery('#academico').click(function(){
			if (jQuery('#buscarCategoria').val() == "academico")
			{
				jQuery('#buscarCategoria').val("");
			}
			else
			{
				jQuery('#buscarCategoria').val("academico");
			}

			
			jQuery('#evento-calendario').DataTable().column(2).search(jQuery('#buscarCategoria').val()).draw();
		});
		
		jQuery('#audiovisual').click(function(){
			if (jQuery('#buscarCategoria').val() == "audiovisual")
			{
				jQuery('#buscarCategoria').val("");
			}
			else
			{
				jQuery('#buscarCategoria').val("audiovisual");
			}

			
			jQuery('#evento-calendario').DataTable().column(2).search(jQuery('#buscarCategoria').val()).draw();
		});

		jQuery('#cultural').click(function(){
			if (jQuery('#buscarCategoria').val() == "cultural")
			{
				jQuery('#buscarCategoria').val("");
			}
			else
			{
				jQuery('#buscarCategoria').val("cultural");
			}


			jQuery('#evento-calendario').DataTable().column(2).search(jQuery('#buscarCategoria').val()).draw();
		});

		jQuery('#deporteyrecreacion').click(function(){
			if (jQuery('#buscarCategoria').val() == "deporte y recreacion")
			{
				jQuery('#buscarCategoria').val("");
			}
			else
			{
				jQuery('#buscarCategoria').val("deporte y recreacion");
			}

			
			jQuery('#evento-calendario').DataTable().column(2).search(jQuery('#buscarCategoria').val()).draw();
		});

		jQuery('#digital').click(function(){
			if (jQuery('#buscarCategoria').val() == "digital")
			{
				jQuery('#buscarCategoria').val("");
			}
			else
			{
				jQuery('#buscarCategoria').val("digital");
			}

			
			jQuery('#evento-calendario').DataTable().column(2).search(jQuery('#buscarCategoria').val()).draw();
		});

		jQuery('#formaciondeusuarios').click(function(){
			if (jQuery('#buscarCategoria').val() == "formacion")
			{
				jQuery('#buscarCategoria').val("");
			}
			else
			{
				jQuery('#buscarCategoria').val("formacion");
			}

			
			jQuery('#evento-calendario').DataTable().column(2).search(jQuery('#buscarCategoria').val()).draw();
		});

		jQuery('#lecturayescritura').click(function(){
			if (jQuery('#buscarCategoria').val() == "lectura y escritura")
			{
				jQuery('#buscarCategoria').val("");
			}
			else
			{
				jQuery('#buscarCategoria').val("lectura y escritura");
			}

			
			jQuery('#evento-calendario').DataTable().column(2).search(jQuery('#buscarCategoria').val()).draw();
		});

		jQuery('#memoria').click(function(){
			if (jQuery('#buscarCategoria').val() == "memoria")
			{
				jQuery('#buscarCategoria').val("");
			}
			else
			{
				jQuery('#buscarCategoria').val("memoria");
			}


			jQuery('#evento-calendario').DataTable().column(2).search(jQuery('#buscarCategoria').val()).draw();
		});

		jQuery('#tallercreativo').click(function(){
			if (jQuery('#buscarCategoria').val() == "taller creativo")
			{
				jQuery('#buscarCategoria').val("");
			}
			else
			{
				jQuery('#buscarCategoria').val("taller creativo");
			}

			
			jQuery('#evento-calendario').DataTable().column(2).search(jQuery('#buscarCategoria').val()).draw();
		});

		jQuery('#vacacionescreativas').click(function(){
			if (jQuery('#buscarCategoria').val() == "vacaciones creativas")
			{
				jQuery('#buscarCategoria').val("");
			}
			else
			{
				jQuery('#buscarCategoria').val("vacaciones creativas");
			}

			
			jQuery('#evento-calendario').DataTable().column(2).search(jQuery('#buscarCategoria').val()).draw();
		});

		jQuery('#buscador').click(function(){
			jQuery('#evento-calendario').DataTable().search(jQuery('#buscarTodo').val()).draw();
		});

		jQuery('#buscarTodo').keyup(function (e) {
		    if (e.keyCode == 13) {
		        jQuery('#evento-calendario').DataTable().search(jQuery('#buscarTodo').val()).draw();
		    }
		});

		jQuery('#buscarTodo').blur(function()
		{
		    if( jQuery(this).val().length === 0 ) {
		        jQuery('#evento-calendario').DataTable().search(jQuery('#buscarTodo').val()).draw();
		    }
		});

	});

	jQuery.datepicker.regional['es'] = {
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
	jQuery.datepicker.setDefaults(jQuery.datepicker.regional['es']);

	jQuery('#datepicker').datepicker({
		inline: true,
		sideBySide: true,
	    showOtherMonths: true,
	    selectOtherMonths: true,
		onSelect: function(dateText, inst) { 
			if (dateText == jQuery('#buscarFecha').val())
			{
				jQuery('#buscarFecha').val("");
				jQuery(this).datepicker( 'setDate', null);
			}
			else
			{
				var dateAsString = dateText; //the first parameter of this function
				var dateAsObject = jQuery(this).datepicker( 'getDate' ); //the getDate method
				jQuery('#buscarFecha').val(dateAsString);
			}
			jQuery('#evento-calendario').DataTable().column(3).search(jQuery('#buscarFecha').val()).draw();
		}
	});
});
