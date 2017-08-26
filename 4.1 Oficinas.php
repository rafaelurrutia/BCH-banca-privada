<?php include "header.php" ?>


    <div id="content" class="wrapper">
        <div class="heading-banner bg-cover col-xs-12 col-md-12" style="background-image: url(img/img-canal.png)">
            <div class="caption">
                <div class="v-center">
                    <div>
                        <h1>Canales de atención</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                    </div>
                </div>
            </div>
        </div>

        <div id="tab-container" class="tab-container">
            <ul class='etabs canales'>
                <li class='tab col-sm-2 col-md-2'><a href="#tab1">OFICINAS</a></li>
                <li class='tab col-sm-3 col-md-3'><a href="#tab2">EJECUTIVO Y ASISTENTE PERSONALIZADO</a></li>
                <li class='tab col-sm-2 col-md-2'><a href="#tab3">SITIO WEB</a></li>
                <li class='tab col-sm-3 col-md-3'><a href="#tab4">APLICACIONES MÓVILES</a></li>
                <li class='tab col-sm-2 col-md-2 special-tab'><a href="#tab5">FONOBANK</a></li>
            </ul>

            <div id="tab1" class="tab-content">
                <div class="layout-2 layout">
                    <div class="heading style-2">
                        <h2>Oficinas</h2>
                        <p>Porque queremos entregarle una atención distintiva e inspiradora, le brindamos un lugar exclusivo, moderno y confidencial por medio de nuestros Centros de Banca Privada.</p>
                    </div>
                    <div class="inner">
                        <div class="mapa-box">
                            <div style="position: relative;">

                                <ul class="mapa-accordion">
                                </ul>
                                <script>
                                    var dataJson;
                                    var map;
                                    var mapa = {};
                                    var json;
                                    var arregloFiltrado;
                                    var contentString = '' +
                                        '<div>nombre</div>' +
                                        ' <div>' + '<p><strong>NombreSucursal: </strong></p>' + '<p>nombre_sucursal' + '</p>' + '<p><strong>Dirección:  </strong></p>' + '<p>direcciondetalle</p>' + '<p><strong>Telefono: </strong></p>' + '<p>detalleTelefono</p>' + '<p><strong>Nombre Gerente: </strong></p>' + '<p>detalleGerente</p>' + '<p><strong>Teléfono Gerente: </strong></p>' + '<p>detalleTelefonoGerente</p>' + '<p><strong>E-mail Gerente:</strong></p>' + '<p>emailGerente</p>' + '';

                                    function addMarker(location, map, val) {
                                        var marker = new google.maps.Marker({
                                            position: location,
                                            title: val.nombre,
                                            map: map
                                        });


                                    }
                                    /**
                                     *
                                     * Metodo que carga la informacion del punto y centra el mapa
                                     *
                                     * */
                                    function ira(nombre, direccion) {
                                        coordenada = {
                                            lat: mapa[nombre][0].latitud,
                                            lng: mapa[nombre][0].longitud
                                        };
                                        map = new google.maps.Map(document.getElementById('_map'), {
                                            zoom: 20,
                                            center: coordenada
                                        });
                                        $.each(arregloFiltrado, function (key, val) {
                                            coordenada = {
                                                lat: val.latitud,
                                                lng: val.longitud
                                            };
                                            addMarker(coordenada, map, val);
                                        });

                                        $('div.mapa-place').html("");
                                        $.each(mapa[nombre], function (key, val) {


                                            if (val.direccion = direccion) {
                                                $('div.mapa-place').css("display", "block");
                                                $('div.mapa-place').html(contentString.replace("nombre", nombre).replace("direcciondetalle", val.direccion).replace("detalleGerente", val.gerente).replace("emailGerente", val.correo_gerente).replace("detalleTelefono", val.telefono).replace("nombre_sucursal", val.nombre).replace("detalleTelefonoGerente", val.telefono_gerente));

                                            }


                                        });


                                    }
                                    /**
                                     * Metodo que inicia el mapa con sus valores.
                                     */
                                    function initMap() {



                                        //TODO aqui colocar ruta json servidor
                                        $.getJSON("./json/BancaBP.json", function (data) {
                                            dataJson = data;

                                            $.each(dataJson, function (key, val) {
                                                json = val;
                                                if (mapa[val.comuna] != null)
                                                    mapa[val.comuna].push(val);
                                                else
                                                    mapa[val.comuna] = [];
                                                mapa[val.comuna].push(val);

                                            });

                                            arregloFiltrado = jQuery.grep(dataJson, function (n, i) {
                                                return (n.marca == "BEC");
                                            });

                                            var puntoCentral = {
                                                lat: -33.4142746,
                                                lng: -70.60088129999997
                                            };


                                            map = new google.maps.Map(document.getElementById('_map'), {
                                                zoom: 10,
                                                center: puntoCentral
                                            });
                                            $.each(arregloFiltrado, function (key, val) {
                                                coordenada = {
                                                    lat: val.latitud,
                                                    lng: val.longitud
                                                };
                                                addMarker(coordenada, map, val);


                                            });




                                            $.each(mapa, function (keyPadre, val) {
                                                $.each(mapa[keyPadre], function (key, val) {


                                                    $('.mapa-accordion').append(
                                                        $("<li class=" + keyPadre.replace(/\s+/g, "") + ">").append(

                                                            $('<a>').attr('class', keyPadre).attr('onclick', 'ira("' + keyPadre + '","' + val.direccion + '")').append($('<i>').append(keyPadre)).append(val.direccion)

                                                        )

                                                    )
                                                })

                                            });
                                        }); // cierre getJson


                                    }
                                </script>
                                <!--                            <img src="img/maps.gif" alt="" width="100%;">-->
                                <div id='_map'></div>
                                <div class="mapa-place" style="display: none">

                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <div id="tab2" class="tab-content">
                <div class="layout-3 layout">
                    <div class="inner">
                        <div class="col-md-6">
                            <h2>Ejecutivo y Asistente Personalizado</h2>
                            <br>
                            <br>
                            <p>En Banca Privada de Banco de Chile contamos con ejecutivos y asistentes especializados, capaces de dar respuestas oportunas a sus necesidades y requerimientos.
                            </p>

                            <p>
                                Adicionalmente, usted contará con un ejecutivo telefónico asignado que podrá atender sus solicitudes de manera integral.
                            </p>

                        </div>
                        <div class="col-md-6">
                            <img src="img/img-canal-2.png">
                        </div>
                    </div>
                </div>
            </div>
            <div id="tab3" class="tab-content">
                <div class="layout-2 layout">
                    <div class="heading style-2">
                        <h2>Sitio Web</h2>
                        <p>Como cliente de nuestra Banca Privada, usted contará con acceso a <strong>Banco en Línea</strong>, una moderna plataforma web que le permitirá aprovechar al máximo los distintos servicios ofrecidos por Banco de Chile, de manera segura y cómoda.</p>
                    </div>
                    <div class="inner">
                        <img src="img/img-canal-3.png">
                        <br>
                        <br>
                        <p class="text-center">A través de esta plataforma, usted podrá:</p>
                        <ul class="col-md-6 list-style-2">
                            <li>
                                Gestionar todas sus inversiones en forma simple y centralizada.
                            </li>
                            <li>
                                Personalizar sus notificaciones al realizar compras, giros o avances con sus tarjetas.
                            </li>
                        </ul>

                        <ul class="col-md-6 list-style-2">

                            <li>
                                Autorizar transacciones con su celular usando la aplicación Mi Pass.
                            </li>
                            <li>
                                Revisar los saldos y movimientos de su cuenta.
                            </li>
                            <li>
                                Y mucho más.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="tab4" class="tab-content">
                <div class="layout-2 layout">
                    <div class="heading style-2">
                        <h2>Aplicaciones móviles</h2>
                        <p>Desde su Smartphone, tendrá acceso en línea a sus cuentas y productos por medio de las siguientes aplicaciones:</p>
                    </div>
                    <div class="inner">
                        <img src="img/img-canal-4.png">
                        <ul class="col-md-6 list-style-1">
                            <li>
                                <h4>Mi Banco:</h4>
                                <p>Conozca sus movimientos, revise su saldo y realice transferencia a terceros en el momento que lo necesite.</p>
                            </li>
                            <li>
                                <h4>Mi Cuenta:</h4>
                                <p>Rápido y sencillo, con Mi Cuenta podrá pagar sus cuentas de servicios (luz, agua, gas, telefonía, etc.).</p>
                            </li>
                            <li>
                                <h4>Mi Pass:</h4>
                                <p>Registrándose por única vez, podrá autorizar transacciones desde su móvil en todas las aplicaciones de Banco de Chile, sin utilizar otro dispositivo de seguridad.</p>
                            </li>
                        </ul>

                        <ul class="col-md-6 list-style-1">

                            <li>
                                <h4>Mi Pago:</h4>
                                <p>Transfiera con rapidez y seguridad entre clientes Banco de Chile, Banco Edwards | Citi y Banco CrediChile.</p>
                            </li>
                            <li>
                                <h4>Mi Beneficio:</h4>
                                <p>Mensualmente, revise las promociones y descuentos que tenemos para usted, pagando con sus tarjetas Banco de Chile.
                                </p>
                            </li>
                            <li>
                                <h4>Mi Seguro:</h4>
                                <p>Acceda a asistencia en línea en caso de siniestro de auto, hogar o viaje, revisando el detalle de sus seguros contratados.</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="tab5" class="tab-content">
                <div class="layout-3 layout">
                    <div class="inner">
                        <div class="col-md-6">
                            <h2>Fonobank</h2>
                            <br>
                            <br>
                            <p>Usted podrá acceder a un equipo de soporte especializado, el que está disponible para responder a sus consultas o ante cualquier emergencia bancaria durante las 24 horas, los 7 días de la semana. Contáctenos al <strong>600 637 4000.</strong>
                            </p>

                        </div>
                        <div class="col-md-6">
                            <img src="img/img-canal-5.png">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



    <script>
        $(window).load(function () {
            $(".mapa-accordion>li>a").click(function (e) {
                e.preventDefault();
                $(this).parent().toggleClass("active").siblings().removeClass('active');
            });

        });
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC05MjrSwqw_ZAQkittrLYIhWFqzl0lOM&callback=initMap" async defer></script>


    <?php include "footer.php" ?>


        