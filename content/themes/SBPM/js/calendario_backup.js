function vista_anual(ano){
      var rano = ano;
      jQuery(".calendar-months").html('');
      var meses = new Array ("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
      var anio = data[ano];
      if(anio){
        var html = ""; 
        for(h in anio){
          contEventos = 0;
          for(i in anio[h]){
            contEventos += anio[h][i].length;
          }
          html += '<div class="calendar_items calendar_items-months">';
          html += '<a href="#weeks" name="Enero" onClick="vista_mes(\''+ano+'\',\''+h+'\')"><div class="medium-text-center">';
          html += '<big>'+meses[parseInt(h)]+' '+contEventos+' eventos'+'</big>';
          html += '<p class="weight-thin">En todas nuestras bibliotecas</p></div></a></div>'; 

          jQuery(".calendar-months").html(html);
          jQuery("#text-anio").html('<h3>'+ano+'</h3>');
        }
      }else{
        html = '<h2>No hay eventos en este año.</h2>';
        jQuery(".calendar-months").html(html);
        jQuery("#text-anio").html('<h3>'+ano+'</h3>');
      }
      jQuery("#vista_anos_button").attr("ir-hacia", 'vista_anual(\''+rano+'\')');
}
function vista_mes(ano,h){
      var rano = ano; 
      var rh = h;
      jQuery(".calendar-mes").html('');
        var meses = new Array ("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        var anio = data[ano];
        if(anio){var aniomes = anio[h];}
        if(aniomes){
          var html = ""; 
          contEventos = 0;
          for(i in anio[h]){
            contEventos = anio[h][i].length;
            html += '<div class="calendar_items calendar_items-months">';
            html += '<a href="#days" name="Enero" onClick="vista_dia(\''+ano+'\',\''+h+'\',\''+i+'\')"><div class="medium-text-center">';
            html += '<big> '+parseInt(i)+' '+meses[parseInt(h)]+' '+contEventos+' eventos'+'</big>';
            html += '<p class="weight-thin">En todas nuestras bibliotecas</p></div></a></div>'; 

            jQuery(".calendar-mes").html(html);
            jQuery("#nombre_mes").html('<h3>'+meses[parseInt(h)]+' del '+ano+'</h3>');
          }
        }else{
          html = '<h2>No hay eventos en este mes.</h2>';
          jQuery(".calendar-mes").html(html);
           jQuery("#nombre_mes").html('<h3>'+meses[parseInt(h)]+' del '+ano+'</h3>');
        }
        if(h == '01'){
          ano = parseInt(ano) -1;
          jQuery('#ant-mes').attr("ir-ano", String(ano));
          jQuery('#ant-mes').attr("ir-mes", "12");

          jQuery('#sig-mes').attr("ir-ano", String(ano+1));
          jQuery('#sig-mes').attr("ir-mes", "02");

        }else if(h == '12'){
          ano = parseInt(ano);
          jQuery('#ant-mes').attr("ir-ano", String(ano));
          jQuery('#ant-mes').attr("ir-mes", "11");

          jQuery('#sig-mes').attr("ir-ano", String(ano+1));
          jQuery('#sig-mes').attr("ir-mes", "01");

        }else{
          ano = parseInt(ano);
          jQuery('#ant-mes').attr("ir-ano", String(ano));
          mes = parseInt(h);
          mes = mes-1;
          if (mes < 10) { mes = String("0"+mes)}else{  mes = String(mes) };
          jQuery('#ant-mes').attr("ir-mes", mes);

          jQuery('#sig-mes').attr("ir-ano", String(ano));
          mes = parseInt(h);
          mes = mes+1;
          if (mes < 10) { mes = String("0"+mes)}else{  mes = String(mes) };
          jQuery('#sig-mes').attr("ir-mes", mes);
        }
        jQuery("#vista_meses_button").attr("ir-hacia", 'vista_mes(\''+rano+'\',\''+rh+'\')');
}
function vista_dia(ano,h,i){
      var rano = ano;
      var rh = h;
      var ri = i; 
      jQuery(".calendar-dia").html('');
        var meses = new Array ("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        var dias = new Array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
        var anio = data[ano];
        if(anio){var aniomes = anio[h];}
        if(aniomes){var aniomesdia = aniomes[i];}
        if(aniomesdia){
          var html = ""; 
          contEventos = 0;
          html += '<div class="calendar_content_title">';
          var d = new Date(parseInt(ano),parseInt(h)-1, parseInt(i));
          var dia = dias[d.getDay()];
          html += '<h3>'+dia+' '+i+' de '+meses[parseInt(h)]+' del '+ano+' </h3>';
          html += '</div>';
          for( j in aniomes[i] ){
            html += '<div class="calendar_items calendar_items-days">';
            html += '<div class="medium-text-left">';
            var html2 = '';
            var campo = false;
            var campos = [];
            for ( k in aniomes[i][j] ) {
              if( aniomes[i][j][k]['id_campo'] == 8 && !campo){
                html += '<big>'+ aniomes[i][j][k]['contenido']+'</big>';
                campo = true;
              }else{
                if(campos.indexOf(aniomes[i][j][k]['campo_nombre']) == -1){
                  html2 += '<li>';
                  html2 += '<span><strong>'+ aniomes[i][j][k]['campo_nombre']+':</strong> '+aniomes[i][j][k]['contenido']+'</span>';
                  html2 += '</li>';
                  campos.push(aniomes[i][j][k]['campo_nombre']);
                }
              }
            }
            html += '<ul class="no-bullet">';
            html += '<li><p></p></li>';
            html += html2;
            html += '</ul></div></div>'; 
          }
          jQuery(".calendar-dia").html(html);
          jQuery("#nombre_dia").html('<h3>'+meses[parseInt(h)]+'</h3>');
        }else{
          var d = new Date(parseInt(ano),parseInt(h)-1, parseInt(i));
          var dia = dias[d.getDay()];
          html = '<h2>No hay eventos en este día.</h2>';
          html += '<h3>'+dia+' '+i+' de '+meses[parseInt(h)]+' del '+ano+' </h3>';
          jQuery(".calendar-dia").html(html);
           jQuery("#nombre_dia").html('<h3>'+meses[parseInt(h)]+'</h3>');
        }
        ano = parseInt(ano);
        if(i == 01){
            
          if(h == '01'){
            ano = parseInt(ano) -1;
            var ultimoDiaAnt = new Date(parseInt(ano), 12, 0).getDate();
            if (ultimoDiaAnt < 10) { ultimoDiaAnt = String("0"+ultimoDiaAnt)}else{  ultimoDiaAnt = String(ultimoDiaAnt) };
            jQuery('#ant-dia').attr("ir-ano", String(ano));
            jQuery('#ant-dia').attr("ir-mes", "12");
            jQuery('#ant-dia').attr("ir-dia", ultimoDiaAnt);

            jQuery('#sig-dia').attr("ir-ano", String(ano+1));
            jQuery('#sig-dia').attr("ir-mes", "01");
            jQuery('#sig-dia').attr("ir-dia", "02");

          }else{
            ano = parseInt(ano);
            var ultimoDia = new Date(parseInt(ano), parseInt(h-1), 0).getDate();
            if (ultimoDia < 10) { ultimoDia = String("0"+ultimoDia)}else{  ultimoDia = String(ultimoDia) };
            jQuery('#ant-dia').attr("ir-ano", String(ano));
            mes = parseInt(h);
            mes = mes-1;
            if (mes < 10) { mes = String("0"+mes)}else{  mes = String(mes) };
            jQuery('#ant-dia').attr("ir-mes", mes);
            jQuery('#ant-dia').attr("ir-dia", ultimoDia);


            jQuery('#sig-dia').attr("ir-ano", String(ano));
            jQuery('#sig-dia').attr("ir-mes", h);
            dia = parseInt(i);
            dia = dia+1;
            if (dia < 10) { dia = String("0"+dia)}else{  dia = String(dia) };
            jQuery('#sig-dia').attr("ir-dia", "02");
          }
        }else{
          var ultimoDia = new Date(parseInt(ano), parseInt(h), 0).getDate();
          if (ultimoDia < 10) { ultimoDia = String("0"+ultimoDia)}else{  ultimoDia = String(ultimoDia) };
          if (i == ultimoDia) {
            if(h == '12'){
              jQuery('#ant-dia').attr("ir-ano", String(ano));
              jQuery('#ant-dia').attr("ir-mes", "12");
              jQuery('#ant-dia').attr("ir-dia", '30');

              
              jQuery('#sig-dia').attr("ir-ano", String(ano+1));
              jQuery('#sig-dia').attr("ir-mes", "01");
              jQuery('#sig-dia').attr("ir-dia", "01");

            }else{
              jQuery('#ant-dia').attr("ir-ano", String(ano));
              jQuery('#ant-dia').attr("ir-mes", h);
              dia = parseInt(i);
              dia = dia-1;
              if (dia < 10) { dia = String("0"+dia)}else{  dia = String(dia) };
              jQuery('#ant-dia').attr("ir-dia", dia);
              

              jQuery('#sig-dia').attr("ir-ano", String(ano));
              mes = parseInt(h);
              mes = mes+1;
              if (mes < 10) { mes = String("0"+mes)}else{  mes = String(mes) };
              jQuery('#sig-dia').attr("ir-mes", mes);
              jQuery('#sig-dia').attr("ir-dia", "01");
            }
          }else{
              jQuery('#ant-dia').attr("ir-ano", String(ano));
              jQuery('#ant-dia').attr("ir-mes", h);
              dia = parseInt(i);
              dia = dia-1;
              if (dia < 10) { dia = String("0"+dia)}else{  dia = String(dia) };
              jQuery('#ant-dia').attr("ir-dia", dia);

              jQuery('#sig-dia').attr("ir-ano", String(ano));
              jQuery('#sig-dia').attr("ir-mes", h);
              dia = parseInt(i);
              dia = dia+1;
              if (dia < 10) { dia = String("0"+dia)}else{  dia = String(dia) };
              jQuery('#sig-dia').attr("ir-dia", dia);
          }
        }
        jQuery("#vista_dias_button").attr("ir-hacia", 'vista_dia(\''+rano+'\',\''+rh+'\',\''+ri+'\')');
}
function buscar(){
  var palabraBuscar = jQuery("#buscar").val();
  var pb1 = omitirAcentos(palabraBuscar);
  var pb2 = palabraBuscar.toLowerCase();
  jQuery(".calendar-search").html('');
  var meses = new Array ("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
  var dias = new Array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
  for (ano in data){
    anio = data[ano];
    for (h in anio){
      var aniomes = anio[h];
      for (i in aniomes){
            var aniomesdia = aniomes[i];
            for( j in aniomes[i] ){
              var html2 = '';
              var campo = false;
              var filtrados = [];
              for ( l in aniomes[i][j] ) { 
                var p1 = omitirAcentos(aniomes[i][j][l]['contenido']);
                var p2 = aniomes[i][j][l]['contenido'].toLowerCase();
                if (aniomes[i][j][l]['contenido'].indexOf(palabraBuscar) != -1 || p1.indexOf(pb1) != -1 || p2.indexOf(pb2) != -1 ) {
                  filtrados.push(aniomes[i][j]);
                  break;
                }
              }
              var campos = [];
                var html = "";
              for ( k in filtrados ) {
                html += '<div class="calendar_content_title">';
                var d = new Date(parseInt(ano),parseInt(h)-1, parseInt(i));
                var dia = dias[d.getDay()];
                html += '<h3>'+dia+' '+i+' de '+meses[parseInt(h)]+' del '+ano+' </h3>';
                html += '</div>';
                html += '<div class="calendar_items calendar_items-days">';
                html += '<div class="medium-text-left">';
                for ( m in filtrados[k] ) {
                  if( filtrados[k][m]['id_campo'] == 8 && !campo){
                    html += '<big>'+ filtrados[k][m]['contenido']+'</big>';
                    campo = true;
                  }else{
                    if(campos.indexOf(filtrados[k][m]['campo_nombre']) == -1){
                      html2 += '<li>';
                      html2 += '<span><strong>'+ filtrados[k][m]['campo_nombre']+':</strong> '+filtrados[k][m]['contenido']+'</span>';
                      html2 += '</li>';
                      campos.push(filtrados[k][m]['campo_nombre']);
                    }
                  }
                }
              }
              html += '<ul class="no-bullet">';
              html += '<li><p></p></li>';
              html += html2;
              html += '</ul></div></div>'; 
            }
            jQuery(".calendar-search").append(html);
        }

      }
    }
}
function omitirAcentos(text) {
    var acentos = "ÃÀÁÄÂÈÉËÊÌÍÏÎÒÓÖÔÙÚÜÛãàáäâèéëêìíïîòóöôùúüûÑñÇç";
    var original = "AAAAAEEEEIIIIOOOOUUUUaaaaaeeeeiiiioooouuuunncc";
    for (var i=0; i<acentos.length; i++) {
        text = text.replace(acentos.charAt(i), original.charAt(i));
    }
    return text;
}      
jQuery('#ant-ano').click(function(){

  var ano = jQuery(this).attr("ir");
  vista_anual(ano);
  jQuery(this).attr("ir", parseInt(ano)-1);
  jQuery('#sig-ano').attr("ir", parseInt(ano)+1);

});
jQuery('#sig-ano').click(function(){

  var ano = jQuery(this).attr("ir");
  vista_anual(ano);
  jQuery(this).attr("ir", parseInt(ano)+1);
  jQuery('#ant-ano').attr("ir", parseInt(ano)-1);

});

jQuery('.ir-hacia-mes').click(function(){

  var ano = jQuery(this).attr("ir-ano");
  var mes = jQuery(this).attr("ir-mes");

  vista_mes(ano,mes);

});
jQuery('.ir-hacia-dia').click(function(){

  var ano = jQuery(this).attr("ir-ano");
  var mes = jQuery(this).attr("ir-mes");
  var dia = jQuery(this).attr("ir-dia");

  vista_dia(ano,mes,dia);

});
jQuery('#vista_anos_button').click(function(){

  var ir = jQuery(this).attr("ir-hacia");
  eval(ir);

});
jQuery('#vista_meses_button').click(function(){

  var ir = jQuery(this).attr("ir-hacia");
  eval(ir);

});
jQuery('#vista_dias_button').click(function(){

  var ir = jQuery(this).attr("ir-hacia");
  eval(ir);

});
