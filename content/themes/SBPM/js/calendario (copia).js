function vista_anual(ano)
{
      var rano = ano;
      jQuery(".calendar-months").html('');
      var meses = new Array ("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
      var dias = new Array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
      var anio = data[ano];
      var biblios = Array();
      if(anio)
      {
        var html = ""; 
        html += '<table id="evento-calendario" class="tabla-no-borde" border="0" cellspacing="0" width="100%">';
        html += '     <thead>';
        html += '        <tr style="background-color: white;">';
        html += '          <th>Biblioteca</th>';
        html += '          <th>Publico</th>';
        html += '          <th>Evento</th>';
        html += '          <th>Fecha</th>';
        html += '          <th>MesAnio</th>'
        html += '          <th><h2 style="font-family: Roboto; font-weight:300; color: #8b9094">Todas las bibliotecas</h2></th>';
        html += '        </tr>';
        html += '      </thead>';
        html += '      <tbody>';

        for(h in anio)
        {
          var aniomes = h;
          if(aniomes)
          {
            for(i in anio[aniomes])
            {
              var aniomesdia = i;
              if(aniomesdia)
              {
                var d = new Date(parseInt(ano),parseInt(aniomes)-1, parseInt(aniomesdia));
                var diaoficial = dias[d.getDay()];

                for( j in anio[aniomes][aniomesdia] )
                {
                  var html2 = '';
                  var campo = false;
                  var campos = [];
                  titulo = "";
                  descripcion = "";
                  biblioteca = "";
                  tipo = "";
                  publico = "";
                  fecha = "";
                  hora = "";
                  dia = "";
                  mes = "";
                  espacio = "";
                  categoria = "";
                  mapa = "";
                  Longitud = "";
                  Latitud = "";
                  Altitud = "";
                  otros = "";
                  imagen = "";
                  hashtag = '';
                  twitter_bib = "";
                  cont_fecha = 0;
                  for ( k in anio[aniomes][aniomesdia][j] ) 
                  {
                    if( anio[aniomes][i][j][k]['id_campo'] == 8 && !campo)
                    {
                      titulo = anio[aniomes][aniomesdia][j][k]['contenido'];
                      campo = true;
                    }
                    else
                    {
                      if(campos.indexOf(anio[aniomes][aniomesdia][j][k]['campo_nombre']) == -1)
                      {
                        if(anio[aniomes][aniomesdia][j][k]['campo_nombre'] == "Actividad")
                        {
                          titulo = anio[aniomes][aniomesdia][j][k]['contenido'];
                        }
                        else if(anio[aniomes][aniomesdia][j][k]['campo_nombre'] == "Descripción breve")
                        {
                          descripcion = anio[aniomes][aniomesdia][j][k]['contenido'];
                        }
                        else if(anio[aniomes][aniomesdia][j][k]['campo_nombre'] == "Biblioteca")
                        {
                          biblioteca = anio[aniomes][aniomesdia][j][k]['contenido'];
                          biblioteca = biblioteca.replace(/\\n/g, "")
                                .replace("^\"|\"$", "")
                                .replace(/"/g,"")
                                .replace(/'/g,"")
                                .replace(/\\'/g, "")
                                .replace(/\\"/g, '')
                                .replace(/\\&/g, "")
                                .replace(/\\r/g, "")
                                .replace(/\\t/g, "")
                                .replace(/\\b/g, "")
                                .replace(/\\f/g, "")
                                .replace(/^\s+|\s+$/g, '')
                                .replace("\n", '')
                                .replace(/(?:\r\n|\r|\n)/g, '')
                                .replace(/[\r\n]/g, '').trim();
                          if ((biblios.indexOf(biblioteca))==-1)
                          {
                            biblios.push(biblioteca);
                          }

                          if (biblioteca == 'Parque Biblioteca Tomás Carrasquilla, La Quintana' || biblioteca == 'Parque Biblioteca Tomás Carrasquilla - La Quintana')
                          {

                             hashtag     = "PBLaQuintana";
                             twitter_bib = "";
                          }
                          else if (biblioteca == 'Parque Biblioteca León de Greiff, La Ladera' || biblioteca == 'Parque Biblioteca León de Greiff - La Ladera')
                           {
                              hashtag = "PBLaLadera";
                              twitter_bib = "";
                           }
                           else if (biblioteca == 'Parque Biblioteca Belén')
                           {
                              hashtag = 'PBBelen';
                              twitter_bib = "";
                           }
                           else if ((biblioteca == 'Parque Biblioteca Manuel Mejía Vallejo, Guayabal') || (biblioteca == 'Parque Biblioteca Manuel Mejía Vallejo - Guayabal'))
                           {
                              hashtag = 'PBGuayabal';
                              twitter_bib = "";
                           }
                           else if (biblioteca == 'Parque Biblioteca José Horacio Betancur, San Antonio de Prado' || biblioteca == 'Parque Biblioteca José Horacio Betancur - San Antonio de Prado')
                           {
                              hashtag = 'PBSanAntoniodePrado';
                              twitter_bib = "";
                           }
                           else if (biblioteca == 'Parque Biblioteca España, Santo Domingo' || biblioteca == 'Parque Biblioteca España - Santo Domingo')
                           {
                              hashtag = 'PBEspana';
                              twitter_bib = "";
                           }
                           else if (biblioteca == 'Parque Biblioteca Doce de Octubre')
                           {
                              hashtag = 'PBDocedeOctubre';
                              twitter_bib = "";
                           }
                           else if (biblioteca == 'Parque Biblioteca Presbítero José Luis Arroyave, San Javier' || biblioteca == 'Parque Biblioteca Presbítero José Luis Arroyave - San Javier')
                           {
                              hashtag = 'PBSanJavier';
                              twitter_bib = "";
                           }
                           else if (biblioteca == 'Parque Biblioteca Fernando Botero, San Cristóbal' || biblioteca == 'Parque Biblioteca Fernando Botero - San Cristóbal')
                           {
                              hashtag = 'PBSanCristobal';
                              twitter_bib = "";
                           }
                           else if ((biblioteca == 'Biblioteca Público Escolar Popular No.2') || (biblioteca == 'Biblioteca Público Escolar Popular No. 2'))
                           {
                              hashtag = 'BibliotecaPopular2';
                              twitter_bib = "";
                           }
                           else if (biblioteca == 'Biblioteca Público Escolar Granizal')
                           {
                              hashtag = 'BibliotecaGranizal';
                              twitter_bib = "";
                           }
                           else if (biblioteca == 'Biblioteca Público Escolar Santa Cruz')
                           {
                              hashtag = 'BibliotecaSantaCruz';
                              twitter_bib = "";
                           }
                           else if (biblioteca == 'Biblioteca Público Corregimental Santa Elena')
                           {

                              hashtag = 'BibliotecaSantaElena';
                              twitter_bib = "";
                           }
                           else if (biblioteca == 'Biblioteca Público Corregimental El Limonar')
                           {
                              hashtag = 'BibliotecaElLimonar';
                              twitter_bib = "";
                           }
                           else if (biblioteca == 'Biblioteca Público Corregimental San Sebastián de Palmitas')
                           {
                              hashtag = 'BibliotecaPalmitas';
                              twitter_bib = "";
                           }
                           else if (biblioteca == 'Biblioteca Público Barrial La Floresta')
                           {
                              hashtag = 'BibliotecaFloresta';
                              twitter_bib = "";
                           }
                           else if (biblioteca == 'Biblioteca Público Barrial Fernando Gómez Martínez')
                           {
                              hashtag = 'bibliotecaFernandoGomez';
                              twitter_bib = "";
                           }
                           else if (biblioteca == 'Biblioteca Centro Occidental')
                           {
                              hashtag = 'bibliotecaCentrooccidental';
                              twitter_bib = "";
                           }
                           else if ((biblioteca == 'Centro de Documentación Museo Casa de la Memoria') || (biblioteca == 'Centro de Documentación Casa de la Memoria'))
                           {
                              hashtag = '';
                              twitter_bib = "CasadelaMemoria";
                           }
                           else if (biblioteca == 'Centro de Documentación en Primera Infancia Buen Comienzo')
                           {
                              hashtag = 'CDBuencomienzo';
                              twitter_bib = "";
                           }
                           else if (biblioteca == 'Centro de Documentación de Medio Ambiente')
                           {
                              hashtag = 'CDMedioambiente';
                              twitter_bib = "";
                           }
                           else if (biblioteca == 'Centro de Documentación de Planeación')
                           {
                              hashtag = 'CDPlaneacion';
                              twitter_bib = "";
                           }
                           else if (biblioteca == 'Archivo Histórico de Medellín')
                           {
                              hashtag = 'CDHistoricoDeMedellin';
                              twitter_bib = "";
                           }
                           else if (biblioteca == 'Casa de la Lectura Infantil')
                           {
                              hashtag = 'CasadelaLecturaInfantil';
                              twitter_bib = "";
                           }
                           else if (biblioteca == 'Biblioteca Pública Piloto')
                           {
                              hashtag = '';
                              twitter_bib = "bppiloto";
                           }
                           else
                           {
                              hashtag = '';
                              twitter_bib = "";
                           }
                           hashtag = hashtag.replace(/\\n/g, "")
                                .replace("^\"|\"$", "")
                                .replace(/"/g,"")
                                .replace(/'/g,"")
                                .replace(/\\'/g, "")
                                .replace(/\\"/g, '')
                                .replace(/\\&/g, "")
                                .replace(/\\r/g, "")
                                .replace(/\\t/g, "")
                                .replace(/\\b/g, "")
                                .replace(/\\f/g, "")
                                .replace(/^\s+|\s+$/g, '')
                                .replace("\n", '')
                                .replace(/(?:\r\n|\r|\n)/g, '')
                                .replace(/[\r\n]/g, '').trim();

                            twitter_bib = twitter_bib.replace(/\\n/g, "")
                                .replace("^\"|\"$", "")
                                .replace(/"/g,"")
                                .replace(/'/g,"")
                                .replace(/\\'/g, "")
                                .replace(/\\"/g, '')
                                .replace(/\\&/g, "")
                                .replace(/\\r/g, "")
                                .replace(/\\t/g, "")
                                .replace(/\\b/g, "")
                                .replace(/\\f/g, "")
                                .replace(/^\s+|\s+$/g, '')
                                .replace("\n", '')
                                .replace(/(?:\r\n|\r|\n)/g, '')
                                .replace(/[\r\n]/g, '').trim();
                        }
                        else if(anio[aniomes][aniomesdia][j][k]['campo_nombre'] == "Tipo de programación")
                        {
                          tipo = anio[aniomes][aniomesdia][j][k]['contenido'];
                          tipo = tipo.replace(/\\n/g, "")
                                .replace("^\"|\"$", "")
                                .replace(/"/g,"")
                                .replace(/'/g,"")
                                .replace(/\\'/g, "")
                                .replace(/\\"/g, '')
                                .replace(/\\&/g, "")
                                .replace(/\\r/g, "")
                                .replace(/\\t/g, "")
                                .replace(/\\b/g, "")
                                .replace(/\\f/g, "")
                                .replace(/^\s+|\s+$/g, '')
                                .replace("\n", '')
                                .replace(/(?:\r\n|\r|\n)/g, '')
                                .replace(/[\r\n]/g, '').trim();
                        }
                        else if(anio[aniomes][aniomesdia][j][k]['campo_nombre'] == "Públicos")
                        {
                          publico = anio[aniomes][aniomesdia][j][k]['contenido'];
                          publico = publico.replace(/\\n/g, "")
                                .replace("^\"|\"$", "")
                                .replace(/"/g,"")
                                .replace(/'/g,"")
                                .replace(/\\'/g, "")
                                .replace(/\\"/g, '')
                                .replace(/\\&/g, "")
                                .replace(/\\r/g, "")
                                .replace(/\\t/g, "")
                                .replace(/\\b/g, "")
                                .replace(/\\f/g, "")
                                .replace(/^\s+|\s+$/g, '')
                                .replace("\n", '')
                                .replace(/(?:\r\n|\r|\n)/g, '')
                                .replace(/[\r\n]/g, '').trim();
                        }
                        else if(anio[aniomes][aniomesdia][j][k]['campo_nombre'] == "Fecha")
                        {
                          cont_fecha = cont_fecha + 1;
                          fecha = anio[aniomes][aniomesdia][j][k]['contenido'];
                          fecha = fecha.replace(/\\n/g, "")
                                .replace("^\"|\"$", "")
                                .replace(/"/g,"")
                                .replace(/'/g,"")
                                .replace(/\\'/g, "")
                                .replace(/\\"/g, '')
                                .replace(/\\&/g, "")
                                .replace(/\\r/g, "")
                                .replace(/\\t/g, "")
                                .replace(/\\b/g, "")
                                .replace(/\\f/g, "")
                                .replace(/^\s+|\s+$/g, '')
                                .replace("\n", '')
                                .replace(/(?:\r\n|\r|\n)/g, '')
                                .replace(/[\r\n]/g, '').trim();
                        }
                        else if(anio[aniomes][aniomesdia][j][k]['campo_nombre'] == "Horario")
                        {
                          hora = anio[aniomes][aniomesdia][j][k]['contenido'];
                          hora = hora.replace(/\\n/g, "")
                                .replace("^\"|\"$", "")
                                .replace(/"/g,"")
                                .replace(/'/g,"")
                                .replace(/\\'/g, "")
                                .replace(/\\"/g, '')
                                .replace(/\\&/g, "")
                                .replace(/\\r/g, "")
                                .replace(/\\t/g, "")
                                .replace(/\\b/g, "")
                                .replace(/\\f/g, "")
                                .replace(/^\s+|\s+$/g, '')
                                .replace("\n", '')
                                .replace(/(?:\r\n|\r|\n)/g, '')
                                .replace(/[\r\n]/g, '').trim();
                        }
                        else if(anio[aniomes][aniomesdia][j][k]['campo_nombre'] == "Día")
                        {
                          dia = anio[aniomes][aniomesdia][j][k]['contenido'];
                          dia = dia.replace(/\\n/g, "")
                                .replace("^\"|\"$", "")
                                .replace(/"/g,"")
                                .replace(/'/g,"")
                                .replace(/\\'/g, "")
                                .replace(/\\"/g, '')
                                .replace(/\\&/g, "")
                                .replace(/\\r/g, "")
                                .replace(/\\t/g, "")
                                .replace(/\\b/g, "")
                                .replace(/\\f/g, "")
                                .replace(/^\s+|\s+$/g, '')
                                .replace("\n", '')
                                .replace(/(?:\r\n|\r|\n)/g, '')
                                .replace(/[\r\n]/g, '').trim();
                        }
                        else if(anio[aniomes][aniomesdia][j][k]['campo_nombre'] == "Mes")
                        {
                          mes = anio[aniomes][aniomesdia][j][k]['contenido'];
                          mes = mes.replace(/\\n/g, "")
                                .replace("^\"|\"$", "")
                                .replace(/"/g,"")
                                .replace(/'/g,"")
                                .replace(/\\'/g, "")
                                .replace(/\\"/g, '')
                                .replace(/\\&/g, "")
                                .replace(/\\r/g, "")
                                .replace(/\\t/g, "")
                                .replace(/\\b/g, "")
                                .replace(/\\f/g, "")
                                .replace(/^\s+|\s+$/g, '')
                                .replace("\n", '')
                                .replace(/(?:\r\n|\r|\n)/g, '')
                                .replace(/[\r\n]/g, '').trim();
                        }
                        else if(anio[aniomes][aniomesdia][j][k]['campo_nombre'] == "Espacios de la biblioteca")
                        {
                          espacio = anio[aniomes][aniomesdia][j][k]['contenido'];
                          espacio = espacio.replace(/\\n/g, "")
                                .replace("^\"|\"$", "")
                                .replace(/"/g,"")
                                .replace(/'/g,"")
                                .replace(/\\'/g, "")
                                .replace(/\\"/g, '')
                                .replace(/\\&/g, "")
                                .replace(/\\r/g, "")
                                .replace(/\\t/g, "")
                                .replace(/\\b/g, "")
                                .replace(/\\f/g, "")
                                .replace(/^\s+|\s+$/g, '')
                                .replace("\n", '')
                                .replace(/(?:\r\n|\r|\n)/g, '')
                                .replace(/[\r\n]/g, '').trim();
                        }
                        else if(anio[aniomes][aniomesdia][j][k]['campo_nombre'] == "Categoría en la agenda")
                        {
                          categoria = anio[aniomes][aniomesdia][j][k]['contenido'];
                          categoria = categoria.replace(/\\n/g, "")
                                .replace("^\"|\"$", "")
                                .replace(/"/g,"")
                                .replace(/'/g,"")
                                .replace(/\\'/g, "")
                                .replace(/\\"/g, '')
                                .replace(/\\&/g, "")
                                .replace(/\\r/g, "")
                                .replace(/\\t/g, "")
                                .replace(/\\b/g, "")
                                .replace(/\\f/g, "")
                                .replace(/^\s+|\s+$/g, '')
                                .replace("\n", '')
                                .replace(/(?:\r\n|\r|\n)/g, '')
                                .replace(/[\r\n]/g, '').trim();
                        }
                        else if(anio[aniomes][aniomesdia][j][k]['campo_nombre'] == "Mapa")
                        {
                          mapa = anio[aniomes][aniomesdia][j][k]['contenido'];
                          mapa = mapa.replace(/\\n/g, "")
                                .replace("^\"|\"$", "")
                                .replace(/"/g,"")
                                .replace(/'/g,"")
                                .replace(/\\'/g, "")
                                .replace(/\\"/g, '')
                                .replace(/\\&/g, "")
                                .replace(/\\r/g, "")
                                .replace(/\\t/g, "")
                                .replace(/\\b/g, "")
                                .replace(/\\f/g, "")
                                .replace(/^\s+|\s+$/g, '')
                                .replace("\n", '')
                                .replace(/(?:\r\n|\r|\n)/g, '')
                                .replace(/[\r\n]/g, '').trim();
                          mapa = mapa.replace(" , ", " ");
                          cords = mapa.split(" ");
                          Longitud = cords[0];
                          Latitud = cords[1];
                        }
                        else if(anio[aniomes][aniomesdia][j][k]['campo_nombre'] == "imagen")
                        {
                          imagen = anio[aniomes][aniomesdia][j][k]['contenido'];
                          imagen = imagen.replace(/\\n/g, "")
                                .replace("^\"|\"$", "")
                                .replace(/"/g,"")
                                .replace(/'/g,"")
                                .replace(/\\'/g, "")
                                .replace(/\\"/g, '')
                                .replace(/\\&/g, "")
                                .replace(/\\r/g, "")
                                .replace(/\\t/g, "")
                                .replace(/\\b/g, "")
                                .replace(/\\f/g, "")
                                .replace(/^\s+|\s+$/g, '')
                                .replace("\n", '')
                                .replace(/(?:\r\n|\r|\n)/g, '')
                                .replace(/[\r\n]/g, '').trim();
                        }
                        else
                        {
                          otros = otros + "_NEGRILLAINICIO_" + $.trim(anio[aniomes][aniomesdia][j][k]['campo_nombre']) + ":_NEGRILLAFIN_" + $.trim(anio[aniomes][aniomesdia][j][k]['contenido']) + '---';
                        }
                        campos.push(anio[aniomes][i][j][k]['campo_nombre']);
                      }
                    }
                  }
/* */
                  var TodayDate = new Date();
                  var diahoy = TodayDate.getDay();
                  var meshoy = TodayDate.getMonth()+1;

                  if (fecha != "")
                  {
                    fechaAux = new Date(fecha);
                    //diames   = fechaAux.getDay();

                    var weekday = new Array(7);
                    weekday[6]=  "DOMINGO";
                    weekday[0] = "LUNES";
                    weekday[1] = "MARTES";
                    weekday[2] = "MIERCOLES";
                    weekday[3] = "JUEVES";
                    weekday[4] = "VIERNES";
                    weekday[5] = "SABADO";
                    var diaSemana = weekday[fechaAux.getDay()];

                    var diames = fecha.slice(-2) + "/" + diaSemana;
                    mes = parseInt(fecha.slice(-5).substring(0,2));
                    anooficial = parseInt(fecha.substring(0,4));
                    mesoficial = mes;
                    mes = meses[mes];
                    diaevento = parseInt(fecha.slice(-2));
                    mesanio = mes + "/" + fecha.substring(0,4);
                    mesanio = mesanio.toUpperCase();
                    auxanio = fecha.substring(0,4);
                    auxmes  = fecha.substring(5,7);
                    auxdia  = fecha.substring(8,10);
                    fecha2  = auxanio + auxmes + auxdia;
                    fecha   = fecha2;
                    hora2   = hora.split(" ")[0];//hora.substring(0,hora.indexOf(':'));
                    hora2   = hora2.split(":")[0];
                    minutos = hora.split(" ")[0].split(":")[1];

//                    alert(hora);
//                    alert(fecha.substring(0,4))
//                    alert(mesoficial);
//                    alert(diaevento);
//                    alert(hora2);
//                    alert(minutos);
                    var fechainicial = new Date(parseInt(fecha.substring(0,4)), mesoficial, diaevento, hora2, minutos, 0);
                    if(hora.split(" ")[1] == "p.m.")
                    {
                      fechainicial.setHours(fechainicial.getHours()+12);
                    }
                    fechainicial = fechainicial.getUTCFullYear() + "" + pad(fechainicial.getUTCMonth().toString(), 2) + "" + pad(fechainicial.getUTCDate().toString(), 2) + "T" + pad(fechainicial.getUTCHours().toString(), 2) + "" + pad(fechainicial.getUTCMinutes().toString(), 2) + "00Z";
                  }
                  else
                  {
                    var diames = "";
                    anooficial = ano;
                    mesoficial = meshoy;
                    diaevento  = diahoy;
                  }

                  if ( anooficial >= parseInt(ano))
                  {
//                    if (mesoficial >= parseInt(meshoy))
//                    {
                        icono_categoria = "";
                        categoria = categoria.toLowerCase();
                        categoria = categoria.replace(/\\n/g, "")
                                .replace("^\"|\"$", "")
                                .replace(/"/g,"")
                                .replace(/'/g,"")
                                .replace(/\\'/g, "")
                                .replace(/\\"/g, '')
                                .replace(/\\&/g, "")
                                .replace(/\\r/g, "")
                                .replace(/\\t/g, "")
                                .replace(/\\b/g, "")
                                .replace(/\\f/g, "")
                                .replace(/^\s+|\s+$/g, '')
                                .replace("\n", '')
                                .replace(/(?:\r\n|\r|\n)/g, '')
                                .replace(/[\r\n]/g, '').trim();
                        if (categoria == "audiovisual")
                        {
                          icono_categoria = "i_audiovisual.png";
                        }
                        else if (categoria == "agenda cultural" || categoria == "programación cultural" || categoria == "cultural")
                        {
                          icono_categoria = "i_cultural.png";  
                          categoria = "cultural";
                        }
                        else if (categoria == "deporte y recreación")
                        {
                          icono_categoria = "i_deportes.png";  
                          categoria = "deporte y recreacion";
                        }
                        else if (categoria == "cultura digital" || categoria == "tecnología" || categoria == "cultura digital")
                        {
                          icono_categoria = "i_digital.png";  
                          categoria = "digital";
                        }
                        else if (categoria == "formación ciudadana" || categoria == "formación de usuarios" || categoria == "formación")
                        {
                          icono_categoria = "i_formacion.png";  
                          categoria = "formacion";
                        }
                        else if (categoria == "lectura y escritura")
                        {
                          icono_categoria = "i_lectura.png";
                        }
                        else if (categoria == "memoria local")
                        {
                          icono_categoria = "i_memoria.png";
                          categoria = "memoria";
                        }
                        else if (categoria == "taller creativo")
                        {
                          icono_categoria = "i_taller.png";
                        }
                        else if (categoria == "vacaciones creativas")
                        {
                          icono_categoria = "i_vacaciones.png";
                        }
                        else if (categoria == "académico")
                        {
                          icono_categoria = "i_academico.png";
                          categoria = "academico";
                        }
                        else
                        {
                          icono_categoria = "i_academico.png";    
                          categoria = "academico";
                        }

                        icono_publico = "";
                        publico = publico.toLowerCase();
                        publico = publico.replace(/\\n/g, "")
                                .replace("^\"|\"$", "")
                                .replace(/"/g,"")
                                .replace(/'/g,"")
                                .replace(/\\'/g, "")
                                .replace(/\\"/g, '')
                                .replace(/\\&/g, "")
                                .replace(/\\r/g, "")
                                .replace(/\\t/g, "")
                                .replace(/\\b/g, "")
                                .replace(/\\f/g, "")
                                .replace(/^\s+|\s+$/g, '')
                                .replace("\n", '')
                                .replace(/(?:\r\n|\r|\n)/g, '')
                                .replace(/[\r\n]/g, '').trim();
                        if (publico == "niños(as)" || publico == "público infantil")
                        {
                          icono_publico = "i_infantil.png";
                          publico = "infantil";
                        }
                        else if (publico == "jóvenes" || publico == "público joven")
                        {
                          icono_publico = "i_jovenes.png";
                          publico = "jovenes";
                        }
                        else if (publico == "adultos" || publico == "público adulto")
                        {
                          icono_publico = "i_adulto.png";  
                          publico = "adulto";
                        }
                        else if (publico == "adultos mayores" || publico=="público adulto mayor")
                        {
                          icono_publico = "i_amayor.png";  
                          publico = "adulto mayor";
                        }
                        else if (publico == "público familiar")
                        {
                          icono_publico = "i_familia.png";  
                          publico = "familiar";
                        }
                        else if (publico == "comunidad en general" || publico == "todos" || publico =="público general")
                        {
                          icono_publico = "i_general.png";
                          publico = "general";
                        }
                        else if (publico == "público femenino" || publico == "femenino")
                        {
                          icono_publico = "i_femenino.png";
                          publico = "femenino";
                        }
                        else if (publico == "público con discapacidad")
                        {
                          icono_publico = "i_handicap.png";  
                          publico = "discapacidad";
                        }
                        else
                        {
                          icono_publico = "i_general.png";    
                          publico = "general";
                        }

                        html2 += '        <tr class="'+fecha+' '+mesanio.replace("/", "-")+'" style="background-color: white;">';
                        html2 += '          <td>'+ biblioteca +'</td>';
                        html2 += '          <td>'+ publico +'</td>';
                        html2 += '          <td>'+ categoria +'</td>';
                        html2 += '          <td>'+ fecha +'</td>';
                        html2 += '          <td>'+ mesanio +'</td>';
                        html2 += '          <td>';
                        html2 += '            <table class="tabla-no-borde" cellspacing="0" width="100%">';
                        html2 += '              <tr style="background-color: white;" width="100%">';
                        html2 += '                <td width="3%" style="background-color:#5268c2;"></td>';
                        html2 += '                <td colspan="2" width="97%">';
                        html2 += '                  <table class="tabla-no-borde" cellspacing="0" width="100%">';
                        html2 += '                    <tr style="background-color: white;">';
                        html2 += '                      <td width="35%"><h2 class="h-no-estyle" style="color:#636567;padding: 0px;margin: 0px;padding-left:10px; font-family: roboto; font-weight: bold; font-size:30px;">' + diames.toUpperCase() +'</h2></td>';

/*                        
                        tit = titulo=="" ? "nothing" : titulo;
                        des = descripcion=="" ? "nothing" : descripcion;
                        dms = diames=="" ? "nothing" : diames;
                        sem = mes=="" ? "nothing" : mes;
                        hra = hora=="" ? "nothing" : hora;
                        spc = espacio=="" ? "nothing" : espacio;
                        bbt = biblioteca=="" ? "nothing" : biblioteca;
                        icp = icono_publico=="" ? "nothing" : icono_publico;
                        ict = icono_categoria=="" ? "nothing" : icono_categoria;
                        lat = Latitud=="" ? "nothing" : Latitud;
                        lng = Longitud=="" ? "nothing" : Longitud;
                        alt = Altitud=="" ? "nothing" : Altitud;
                        fci = fechainicial=="" ? "nothing" : fechainicial;
*/

                        tit = titulo.replace(/\\n/g, "")
                                .replace("^\"|\"$", "")
                                .replace(/"/g,"")
                                .replace(/'/g,"")
                                .replace(/\\'/g, "")
                                .replace(/\\"/g, '')
                                .replace(/\\&/g, "")
                                .replace(/\\r/g, "")
                                .replace(/\\t/g, "")
                                .replace(/\\b/g, "")
                                .replace(/\\f/g, "")
                                .replace(/^\s+|\s+$/g, '')
                                .replace("\n", '')
                                .replace(/(?:\r\n|\r|\n)/g, '')
                                .replace(/[\r\n]/g, '').trim();
                        des = descripcion.replace(/\\n/g, "")
                                .replace("^\"|\"$", "")
                                .replace(/"/g,"")
                                .replace(/'/g,"")
                                .replace(/\\'/g, "")
                                .replace(/\\"/g, '')
                                .replace(/\\&/g, "")
                                .replace(/\\r/g, "")
                                .replace(/\\t/g, "")
                                .replace(/\\b/g, "")
                                .replace(/\\f/g, "")
                                .replace(/^\s+|\s+$/g, '')
                                .replace("\n", '')
                                .replace(/(?:\r\n|\r|\n)/g, '')
                                .replace(/[\r\n]/g, '').trim();
                        dms = diames.replace(/\\n/g, "")
                                .replace("^\"|\"$", "")
                                .replace(/"/g,"")
                                .replace(/'/g,"")
                                .replace(/\\'/g, "")
                                .replace(/\\"/g, '')
                                .replace(/\\&/g, "")
                                .replace(/\\r/g, "")
                                .replace(/\\t/g, "")
                                .replace(/\\b/g, "")
                                .replace(/\\f/g, "")
                                .replace(/^\s+|\s+$/g, '')
                                .replace("\n", '')
                                .replace(/(?:\r\n|\r|\n)/g, '')
                                .replace(/[\r\n]/g, '').trim();
                        sem = mes.replace(/\\n/g, "")
                                .replace("^\"|\"$", "")
                                .replace(/"/g,"")
                                .replace(/'/g,"")
                                .replace(/\\'/g, "")
                                .replace(/\\"/g, '')
                                .replace(/\\&/g, "")
                                .replace(/\\r/g, "")
                                .replace(/\\t/g, "")
                                .replace(/\\b/g, "")
                                .replace(/\\f/g, "")
                                .replace(/^\s+|\s+$/g, '')
                                .replace("\n", '')
                                .replace(/(?:\r\n|\r|\n)/g, '')
                                .replace(/[\r\n]/g, '').trim();
                        hra = hora.replace(/\\n/g, "")
                                .replace("^\"|\"$", "")
                                .replace(/"/g,"")
                                .replace(/'/g,"")
                                .replace(/\\'/g, "")
                                .replace(/\\"/g, '')
                                .replace(/\\&/g, "")
                                .replace(/\\r/g, "")
                                .replace(/\\t/g, "")
                                .replace(/\\b/g, "")
                                .replace(/\\f/g, "")
                                .replace(/^\s+|\s+$/g, '')
                                .replace("\n", '')
                                .replace(/(?:\r\n|\r|\n)/g, '')
                                .replace(/[\r\n]/g, '').trim();
                        spc = espacio.replace(/\\n/g, "")
                                .replace("^\"|\"$", "")
                                .replace(/"/g,"")
                                .replace(/'/g,"")
                                .replace(/\\'/g, "")
                                .replace(/\\"/g, '')
                                .replace(/\\&/g, "")
                                .replace(/\\r/g, "")
                                .replace(/\\t/g, "")
                                .replace(/\\b/g, "")
                                .replace(/\\f/g, "")
                                .replace(/^\s+|\s+$/g, '')
                                .replace("\n", '')
                                .replace(/(?:\r\n|\r|\n)/g, '')
                                .replace(/[\r\n]/g, '').trim();
                        bbt = biblioteca.replace(/\\n/g, "")
                                .replace("^\"|\"$", "")
                                .replace(/"/g,"")
                                .replace(/'/g,"")
                                .replace(/\\'/g, "")
                                .replace(/\\"/g, '')
                                .replace(/\\&/g, "")
                                .replace(/\\r/g, "")
                                .replace(/\\t/g, "")
                                .replace(/\\b/g, "")
                                .replace(/\\f/g, "")
                                .replace(/^\s+|\s+$/g, '')
                                .replace("\n", '')
                                .replace(/(?:\r\n|\r|\n)/g, '')
                                .replace(/[\r\n]/g, '').trim();
                        icp = icono_publico.replace(/\\n/g, "")
                                .replace("^\"|\"$", "")
                                .replace(/"/g,"")
                                .replace(/'/g,"")
                                .replace(/\\'/g, "")
                                .replace(/\\"/g, '')
                                .replace(/\\&/g, "")
                                .replace(/\\r/g, "")
                                .replace(/\\t/g, "")
                                .replace(/\\b/g, "")
                                .replace(/\\f/g, "")
                                .replace(/^\s+|\s+$/g, '')
                                .replace("\n", '')
                                .replace(/(?:\r\n|\r|\n)/g, '')
                                .replace(/[\r\n]/g, '').trim();
                        ict = icono_categoria.replace(/\\n/g, "")
                                .replace("^\"|\"$", "")
                                .replace(/"/g,"")
                                .replace(/'/g,"")
                                .replace(/\\'/g, "")
                                .replace(/\\"/g, '')
                                .replace(/\\&/g, "")
                                .replace(/\\r/g, "")
                                .replace(/\\t/g, "")
                                .replace(/\\b/g, "")
                                .replace(/\\f/g, "")
                                .replace(/^\s+|\s+$/g, '')
                                .replace("\n", '')
                                .replace(/(?:\r\n|\r|\n)/g, '')
                                .replace(/[\r\n]/g, '').trim();

                        lat = Latitud.replace(/\\n/g, "")
                                .replace("^\"|\"$", "")
                                .replace(/"/g,"")
                                .replace(/'/g,"")
                                .replace(/\\'/g, "")
                                .replace(/\\"/g, '')
                                .replace(/\\&/g, "")
                                .replace(/\\r/g, "")
                                .replace(/\\t/g, "")
                                .replace(/\\b/g, "")
                                .replace(/\\f/g, "")
                                .replace(/^\s+|\s+$/g, '')
                                .replace("\n", '')
                                .replace(/(?:\r\n|\r|\n)/g, '')
                                .replace(/[\r\n]/g, '').trim();

                        lng = Longitud.replace(/\\n/g, "")
                                .replace("^\"|\"$", "")
                                .replace(/"/g,"")
                                .replace(/'/g,"")
                                .replace(/\\'/g, "")
                                .replace(/\\"/g, '')
                                .replace(/\\&/g, "")
                                .replace(/\\r/g, "")
                                .replace(/\\t/g, "")
                                .replace(/\\b/g, "")
                                .replace(/\\f/g, "")
                                .replace(/^\s+|\s+$/g, '')
                                .replace("\n", '')
                                .replace(/(?:\r\n|\r|\n)/g, '')
                                .replace(/[\r\n]/g, '').trim();

                        alt = Altitud.replace(/\\n/g, "")
                                .replace("^\"|\"$", "")
                                .replace(/"/g,"")
                                .replace(/'/g,"")
                                .replace(/\\'/g, "")
                                .replace(/\\"/g, '')
                                .replace(/\\&/g, "")
                                .replace(/\\r/g, "")
                                .replace(/\\t/g, "")
                                .replace(/\\b/g, "")
                                .replace(/\\f/g, "")
                                .replace(/^\s+|\s+$/g, '')
                                .replace("\n", '')
                                .replace(/(?:\r\n|\r|\n)/g, '')
                                .replace(/[\r\n]/g, '').trim();

                        fci = fechainicial.replace(/\\n/g, "")
                                .replace("^\"|\"$", "")
                                .replace(/"/g,"")
                                .replace(/'/g,"")
                                .replace(/\\'/g, "")
                                .replace(/\\"/g, '')
                                .replace(/\\&/g, "")
                                .replace(/\\r/g, "")
                                .replace(/\\t/g, "")
                                .replace(/\\b/g, "")
                                .replace(/\\f/g, "")
                                .replace(/^\s+|\s+$/g, '')
                                .replace("\n", '')
                                .replace(/(?:\r\n|\r|\n)/g, '')
                                .replace(/[\r\n]/g, '').trim();

                        twt = ano + '-' + pad(mesoficial.toString(), 2) + '-' + diames.substring(0,2) + ' ' + hora;
                        twt = twt.replace(/\\n/g, "")
                                .replace("^\"|\"$", "")
                                .replace(/"/g,"")
                                .replace(/'/g,"")
                                .replace(/\\'/g, "")
                                .replace(/\\"/g, '')
                                .replace(/\\&/g, "")
                                .replace(/\\r/g, "")
                                .replace(/\\t/g, "")
                                .replace(/\\b/g, "")
                                .replace(/\\f/g, "")
                                .replace(/^\s+|\s+$/g, '')
                                .replace("\n", '')
                                .replace(/(?:\r\n|\r|\n)/g, '')
                                .replace(/[\r\n]/g, '').trim();

//                        ots = otros=="" ? "nothing" : otros;
                        ots = otros.substring(0, otros.length-3);

                        ots = ots.replace(/\\n/g, "")
                                .replace("^\"|\"$", "")
                                .replace(/"/g,"")
                                .replace(/'/g,"")
                                .replace(/\\'/g, "")
                                .replace(/\\"/g, '')
                                .replace(/\\&/g, "")
                                .replace(/\\r/g, "")
                                .replace(/\\t/g, "")
                                .replace(/\\b/g, "")
                                .replace(/\\f/g, "")
                                .replace(/^\s+|\s+$/g, '')
                                .replace("\n", '')
                                .replace(/(?:\r\n|\r|\n)/g, '')
                                .replace(/[\r\n]/g, '').trim();


                        img = imagen.replace(/\\n/g, "")
                                .replace("^\"|\"$", "")
                                .replace(/"/g,"")
                                .replace(/'/g,"")
                                .replace(/\\'/g, "")
                                .replace(/\\"/g, '')
                                .replace(/\\&/g, "")
                                .replace(/\\r/g, "")
                                .replace(/\\t/g, "")
                                .replace(/\\b/g, "")
                                .replace(/\\f/g, "")
                                .replace(/^\s+|\s+$/g, '')
                                .replace("\n", '')
                                .replace(/(?:\r\n|\r|\n)/g, '')
                                .replace(/[\r\n]/g, '').trim();                    

                        //alert(ots);

                        if (hashtag == "")
                        {
                          hashtag == twitter_bib;
                        }

                        hst = hashtag;
                        tbi = twitter_bib;

                        html2 += '                    <td width="62%"><a><h3 class="header-hover" style="color:#8b9094;padding: 0px;margin: 0px;font-weight:bold;padding-left:10px; font-family: roboto; font-weight: bold; font-size:30px;" onClick="Javascript:ver_detalles(' + "'" +tit + "'" + ',\
' + "'" + dms + "'" + ', ' + "'" + sem + "'" + ', ' + "'" + hra + "'" + ', ' + "'" + des + "'" + ',\
' + "'" + spc + "'" + ', ' + "'" + bbt + "'" + ', ' + "'" + icp + "'" + ', ' + "'" + ict + "'" + ',\
' + "'" + lat + "'" + ', ' + "'" + lng + "'" + ', ' + "'" + alt + "'" + ', ' + "'" + fci + "'" + ',\
' + "'" + twt + "'" + ', ' + "'" + ots + "'" + ', ' + "'" + img + "'" + ', ' + "'" + hst + "'" + ',\
' + "'" + tbi + "'" + ');">'+ titulo +'</h3></a></td>';
                        html2 += '                    </tr>';
                        html2 += '                    <tr style="background-color: white;">';
                        html2 += '                      <td width="35%"><h3 style="color:#8b9094;padding: 0px;margin: 0px;padding-left:10px; font-family: roboto; font-size:20px;">'+ hora +'</h3></td>';
                        html2 += '                      <td width="62%"><h4 class="h-no-estyle" style="color:#626567;padding: 0px;margin: 0px;padding-left:10px; font-family: roboto; font-size:17px;font-weight: italic; text-align: justify;">'+ descripcion +'</h4></td>';
                        html2 += '                    </tr>';
                        html2 += '                    <tr style="background-color: white;">';
                        html2 += '                      <td><div><h3 style="color:#5268c2;padding: 0px;margin: 0px;font-weight:bold;padding-left:10px; font-family: roboto; font-weight: bold; font-size:20px;">'+ mes.toUpperCase() +'</h3></div></td>';
                        html2 += '                      <td><h4 class="h-no-estyle" style="color:#626567;padding: 0px;margin: 0px;padding-left:10px; font-family: roboto; font-size:17px;">'+ espacio +'</h4></td>';
                        html2 += '                    </tr>';
                        html2 += '                  </table>';
                        html2 += '                </td>';

                        html2 += '              </tr>';
                        html2 += '              <tr style="background-color: white;" width="100%">';
                        html2 += '                <td width="3%"></td>';
                        html2 += '                <td width="35%">';
                        html2 += '                  <table class="tabla-no-borde" cellspacing="0" width="55%">';
                        html2 += '                    <tr style="background-color: white;">';
                        html2 += '                      <td colspan="2"><a id="calendario" href="http://www.google.com/calendar/event?action=TEMPLATE&text='+ tit +'&dates='+fechainicial + '/'+fechainicial+'&details='+descripcion+'&location='+biblioteca+'&trp=false&sprop=&sprop=name:" target="_blank" rel="nofollow"><img src="/content/themes/SBPM/images/iconos_nuevos/icons/i_calendar.png"></a> </td>';
                        html2 += '                    </tr>';
                        html2 += '                    <tr style="background-color: white;">';

                        url_twitt = 'http://goo.gl/CcZVH4';

                        html2 += '                      <td><a target="_blank" href="https://twitter.com/intent/tweet?text=¡Asiste, participa e interactúa! '+ tit + ' en %23'+ hashtag +' %7C ;via=BibliotecasMed;url='+url_twitt+'"><img src="/content/themes/SBPM/images/iconos_nuevos/icons/i_twitter.png"></a></td>';
                        html2 += '                      <td><a onClick="document.title = ' + "'" + tit + "'" + ';window.open(' + "'http://www.facebook.com/sharer.php?s=100&amp;p[title]=Compartir Evento&amp;p[summary]=Evento de lo que sea&amp;p[url]=http://bibliotecasmedellin.gov.co/cms/calendario/&amp;p[images][0]=http://www.bibliolabs.cc/sbpm.png', 'sharer', 'toolbar=0,status=0,width=620,height=280'" + ');" href="javascript: void(0)"><img src="/content/themes/SBPM/images/iconos_nuevos/icons/i_facebook.png"></a></td>';
                        html2 += '                    </tr>';
                        html2 += '                  </table>';
                        html2 += '                </td>';
                        html2 += '                <td width="62%">';
                        html2 += '                  <table class="tabla-no-borde" cellspacing="0" width="100%">';
                        html2 += '                    <tr style="background-color: white;">';
                        html2 += '                      <td><h4 class="h-no-estyle" style="color:#8b9094;padding: 0px;margin: 0px;padding-left:10px; font-family: roboto; font-size:15px;">CATEGORÍAS</h4></td>';
                        html2 += '                    </tr>';
                        html2 += '                    <tr style="background-color: white;">';
                        html2 += '                      <td><h4 class="h-no-estyle" style="color:#5069b0;padding: 0px;margin: 0px;padding-left:10px; font-family: roboto; font-size:14px;">'+ biblioteca +'</h4></td>';
                        html2 += '                    </tr>';
                        html2 += '                    <tr style="background-color: white;">';
                        html2 += '                      <td>';
                        html2 += '                        <table class="tabla-no-borde" cellspacing="0" width="40%">';
                        html2 += '                          <tr>';

                        html2 += '                            <!-- PUBLICO --> <td><a><img src="/content/themes/SBPM/images/iconos_nuevos/icons/'+icono_publico+'"></a></td>';
                        html2 += '                            <!-- EVENTO  --> <td><a><img src="/content/themes/SBPM/images/iconos_nuevos/icons/'+icono_categoria+'"></a></td>';
                        html2 += '                          </tr>';
                        html2 += '                        </table>';
                        html2 += '                      </td>';
                        html2 += '                    </tr>';
                        html2 += '                  </table>';
                        html2 += '                </td>';
                        html2 += '              </tr>';
                        html2 += '            </table>';
                        html2 += '          </td>';
                        html2 += '        </tr>';
                        html += html2;
//                    }
                  }
/* */
                }
              }
            }
          }
/*          if(aniomes){var aniomesdia = aniomes[i];}
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
              }*/
//              html += '<ul class="no-bullet">';
//              html += '<li><p></p></li>';
//              html += html2;
//              html += '</ul></div></div>'; 
        }
        html += '      </tbody>';
        html += '    </table>';
        jQuery(".calendar-months").html(html);

        biblios.sort();
        //alert(biblios);

        for (index = 0; index < biblios.length; index++) {
            var numb = $('#bibliotecaSelect > option').size();
            biblioteca = $.trim(biblios[index]);
            
            $('#bibliotecaSelect').append($("<option></option>").attr("value","biblioteca" + numb.toString()).text(biblioteca));
            //alert(numb.toString()+" "+biblioteca);
        } 

//            jQuery("#nombre_dia").html('<h3>'+meses[parseInt(h)]+'</h3>');
      }
      else
      {
        html = "<h1 style='color: #4a5eaf; font-family: roboto; font-weight: 300; font-style: Italic; font-size:20px'>No hay eventos programados</h1>";
        jQuery(".calendar-months").html(html);
      }
}

function cambiar_meta(titulo, descripcion)
{
  document.title = titulo;
/*
FB.ui({
method: 'feed',
name: 'This is the content of the "name" field.',
link: ' http://www.hyperarts.com/',
picture: 'http://www.hyperarts.com/external-xfbml/share-image.gif',
caption: 'This is the content of the "caption" field.',
description: 'This is the content of the "description" field, below the caption.',
message: ''
});*/

  window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=Compartir Evento&amp;p[summary]=Evento de lo que sea&amp;p[url]=http://bibliotecasmedellin.gov.co/cms/calendario/&amp;p[images][0]=http://www.bibliolabs.cc/sbpm.png', 'sharer', 'toolbar=0,status=0,width=620,height=280');
}

function pad(n, width, z) {
  z = z || '0';
  n = n + '';
  return n.length >= width ? n : new Array(width - n.length + 1).join(z) + n;
}

function regresar_calendario()
{
    window.scrollTo(0, 0);
    $("#calendario-principal").show();
    $("#detalle-calendario").empty();  
    $("#detalle-calendario").hide();
}

function ver_detalles(titulo, dia, mes, hora, descripcion, espacio, biblioteca, publico, tipo, latitud, longitud, altitud, calendario, twitter, otros, imagen, hashtag, twitter_bib)
{
    window.scrollTo(0, 0);

    url_twitt = 'http://goo.gl/CcZVH4';

    calendario = '<td style="display: inline-block; float: right;"><a id="calendario" href="http://www.google.com/calendar/event?action=TEMPLATE&text='+ titulo +'&dates='+calendario+ '/'+calendario+'&details='+descripcion+'&location='+biblioteca+'&trp=false&sprop=&sprop=name:" target="_blank" rel="nofollow"><img src="/content/themes/SBPM/images/iconos_nuevos/icons/i_calendar.png"></a> </td>';
    twitter    = '<td style="display: inline-block; padding-left:10px; float: right;"><a target="_blank" href="https://twitter.com/intent/tweet?text=¡Asiste, participa e interactúa! '+ tit + ' en %23'+ hashtag +' %7C ;via=BibliotecasMed;url='+url_twitt+'"><img src="/content/themes/SBPM/images/iconos_nuevos/icons/i_twitter.png"></a></td>';
    facebook   = '<td style="display: inline-block; padding-left:10px; float: right;"><a onClick="document.title = ' + "'" + titulo + "'" + ';window.open(' + "'http://www.facebook.com/sharer.php?s=100&amp;p[title]=Compartir Evento&amp;p[summary]=Evento de lo que sea&amp;p[url]=http://bibliotecasmedellin.gov.co/cms/calendario/&amp;p[images][0]=http://www.bibliolabs.cc/sbpm.png', 'sharer', 'toolbar=0,status=0,width=620,height=280'" + ');" href="javascript: void(0)"><img src="/content/themes/SBPM/images/iconos_nuevos/icons/i_facebook.png"></a></td>';
    regresar   = '<td colspan="3"><a onClick="regresar_calendario();"><span style="display:inline-block; font-size:20px; color:#636567; padding-bottom: 20px;"><img style="padding-right: 10px; padding-left: 5px;" src="/content/themes/SBPM/images/iconos_nuevos/icons/i_back.png" />Regresar a la programación</span></a></td>';

    tabla_compartir = '<td colspan="3">';
    tabla_compartir += '<table class="tabla-no-borde" width="100%" cellspacing="0">';
    tabla_compartir += '<tr width="100%">';
    tabla_compartir += regresar;
    tabla_compartir += facebook;
    tabla_compartir += twitter;
    tabla_compartir += calendario;
    tabla_compartir += '</tr>';
    tabla_compartir += '</table>';
    tabla_compartir += '</td>';

//    calendario = '';
//    twitter    = '';
//    facebook   = '';
    tip        = '<td style="display: inline-block; padding-left:10px; float: right;"><a><img src="/content/themes/SBPM/images/iconos_nuevos/icons/'+tipo+'"></a></td>';
    pub        = '<td style="display: inline-block; padding-left:10px; float: right;"><a><img src="/content/themes/SBPM/images/iconos_nuevos/icons/'+publico+'"></a></td>';
    categorias = '<td style="vertical-align: middle; text-align: right; align: right;"><h4 class="h-no-estyle" style="color:#8b9094;padding: 0px;margin: 0px; font-family: roboto; font-size:17px; ">CATEGORÍAS</h4></td>';

    otros      =  otros.split("---");
    todos      = '          <tr style="background-color: white;">';

    for (index = 0; index < otros.length; index++) {
        var numb = $('#bibliotecaSelect > option').size();
        //alert(numb) Este mostró cuando entró a detalle
        otros_negrilla = $.trim(otros[index]).replace(/_NEGRILLAINICIO_/g,"<b>").replace(/_NEGRILLAFIN_/g,"</b>");
        todos += '<tr><td colspan="6"><h4 class="h-no-estyle" style="color:#626567;padding: 0px;margin: 0px; font-family: roboto; font-size:17px;">'+ otros_negrilla +'</h4></td></tr>';
    } 
    todos += '          </tr>';

    $("#calendario-principal").hide();
    $("#detalle-calendario").empty();

    if(imagen != "")
    {
      var img = new Image();

      img.url = 'http://bibliotecasmedellin.gov.co/agenda/images/secure/?file=full/'+imagen;

      html = "";
      html += '<table class="columns medium-12 tabla-no-borde">';
      html += '  <tr width="100%">';
      html += tabla_compartir;
      html += '  </tr>';
      html += '  <tr style="background-color: white;" width="100%">';
      html += '    <td width="2%" height="100%"><table height="100%"><tbody height="100%"><tr height="50%"><td style="background-color:#5268c2; min-width:20px; height:50%"></td></tr><tr height="50%"><td style="background-color:white; height:50%; min-width:20px;"></td></tr></tbody></table></td>';
      html += '    <td style="width:3%;"></td>';
      html += '    <td style="display: inline-block; max-width: 80%"><a><img src="http://bibliotecasmedellin.gov.co/agenda/images/secure/?file=full/'+imagen+'" style="display: max-width: 80%"></a></td>';
      html += '</tr>';
      html += '<tr>';
      html += '<td style="background-color:white; width:2%; min-width:20px;"></td>';
      html += '<td style="background-color:white; width:3%; min-width:20px;"></td>';
      html += '</tr>';
      html += '<tr style="background-color: white;" width="100%">';
      html += '<td style="background-color:white; width:2%; min-width:20px;"></td>';
      html += '<td style="background-color:white; width:3%; min-width:20px;"></td>';
      html += '    <td width="95%">';
      html += '      <table class="tabla-no-borde" width="100%" cellspacing="0">';
      html += '        <tbody>';      
    }
    else
    {
      html = "";
      html += '<table class="columns medium-12 tabla-no-borde">';
      html += '  <tr width="100%">';
      html += tabla_compartir;
      html += '  </tr>';
      html += '  <tr style="background-color: white;" width="100%">';
      html += '    <td style="background-color:#5268c2; width:2%; min-width:20px;"></td>';
      html += '    <td style="width:3%;"></td>';
      html += '    <td width="95%">';
      html += '      <table class="tabla-no-borde" width="100%" cellspacing="0">';
      html += '        <tbody>';
    }
    if (titulo != "")
    {
      html += '          <tr>';
      html += '            <td colspan="6"><h3 style="color:#5268c2;padding: 0px;margin: 0px;font-family: roboto; font-size:30px;">'+titulo+'</h3></td>';
      html += '          </tr>';
    }
    if (dia != "")
    {
      html += '          <tr style="background-color: white;">';
      html += '            <td colspan="6"><h2 class="h-no-estyle" style="color:#636567;padding: 0px;margin: 0px; font-family: roboto; font-weight: bold; font-size:30px;">'+dia.toUpperCase()+'</h2></td>';
      html += '          </tr>';
    }
    if (mes != "")
    {
      html += '          <tr>';
      html += '            <td colspan="6"><div><h3 style="color:#5268c2;padding: 0px;margin: 0px;font-weight:bold; font-family: roboto; font-weight: bold; font-size:20px;">'+mes.toUpperCase()+'</h3></div></td>';
      html += '          </tr>';
    }
    if (hora != "")
    {
      html += '          <tr style="background-color: white;">';
      html += '            <td colspan="6"><h3 style="color:#8b9094;padding: 0px;margin: 0px; font-family: roboto; font-size:22px;">'+hora+'</h3></td>';
      html += '          </tr>';
    }
    if (biblioteca != "")
    {
      tabla_categoria = '<td colspan="6" width="100%">';
      tabla_categoria += '<table class="tabla-no-borde" width="100%" cellspacing="0">';
      tabla_categoria += '<tr width="100%">';
      tabla_categoria += '   <td colspan="3" width="75%"><h4 class="h-no-estyle" style="color:#5268c2;padding: 0px;margin: 0px; font-family: roboto; font-size:20px;">'+biblioteca+'</h4></td>';
      tabla_categoria += categorias;
      tabla_categoria += pub;
      tabla_categoria += tip;
      tabla_categoria += '</tr>';
      tabla_categoria += '</table>';
      tabla_categoria += '</td>';
      html += '          <tr style="background-color: white;">';
      html += tabla_categoria;
      html += '          </tr>';
    }
    html += '        </tbody>';
    html += '      </table>';
    html += '    </td>';
    html += '  </tr>';
    html += '  <tr width="100%"><td width="2%"></td><td width="3%"></td><td width="95%"><p class="h-no-estyle" style="font-family: roboto; font-size: 30px; font-weight: bold; width: 100%; padding-left: 20px; padding-top: 10px;border-bottom: 3px solid #cbcbcb;"></p></td></tr>';
    html += '  <tr style="background-color: white;" width="100%">';
    html += '    <td style="width: 2%; min-width:20px;"></td>';
    html += '    <td style="width:3%;"></td>';
    html += '    <td width="95%">';
    html += '      <table class="tabla-no-borde" width="100%" cellspacing="0">';
    html += '        <tbody>';
    if (descripcion != "")
    {
      html += '          <tr style="background-color: white;">';
      html += '            <td colspan="6"><h4 class="h-no-estyle" style="color:#626567;padding: 0px;margin: 0px; font-family: roboto; font-size:20px;font-weight: 300; font-style: Italic; text-align: justify;">'+descripcion+'</h4></td> ';
      html += '          </tr>';
    }
    if (espacio != "")
    {
      html += '          <tr style="background-color: white;">';
      html += '            <td colspan="6"><h4 class="h-no-estyle" style="color:#626567;padding: 0px;margin: 0px; font-family: roboto; font-size:17px;"><b>Lugar: </b>'+ espacio +'</h4></td>';
      html += '          </tr>';
    }
    html += todos;
    if(latitud != "")
    {
      html += '          <tr><td colspan="6"><div><h3 style="color:#5268c2;padding: 0px;margin: 0px; font-family: roboto; font-size:30px;">Mapa de Ubicación</h3></div></td><tr>';
      html += '          <tr><td colspan="6"><div id="map-event-canvas"></div></td><tr>';
    }
    html += '        </tbody>';
    html += '      </table>';
    html += '    </td>';
    html += '  </tr>';
    html += '</table>';

    jQuery("#detalle-calendario").html(html);
    $("#detalle-calendario").show();
    if(latitud!="nothing")
    {
      iniciar_mapa(latitud, longitud);
    }
}

function iniciar_mapa(lat, lng)
{
  var myLatlng = new google.maps.LatLng(lat,lng);
  var mapOptions = {
    zoom: 17,
    center: myLatlng
  }
  var map = new google.maps.Map(document.getElementById('map-event-canvas'), mapOptions);

  var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      icon: '/content/themes/SBPM/images/iconos_nuevos/marker.png'
  });

}

function vista_anual2(ano){
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
