 jssor_slider1_starter = function (containerId) {
            var options = {
                $AutoPlay: true,                                    //[Optional] Auto Play
                $AutoPlaySteps: 1,                                  //[Optional] default = 1
                $AutoPlayInterval: 4000,                            //[Optional] Intervalo de Autoplay
                $PauseOnHover: 1,                                   /*[Optional]    0 = no pause,
                                                                                    1 = pause for desktop, 
                                                                                    2 = pause for touch device, 
                                                                                    3 = pause for desktop and touch device, 
                                                                                    4 = freeze for desktop, 
                                                                                    8 = freeze for touch device, 
                                                                                    12= freeze for desktop and touch device, 
                                                                                    default = 1*/
                $Loop: 0,                                           /*[Optional]Ativar Loop, 
                                                                                0 = stop, 
                                                                                1 = loop, 
                                                                                2 = rewind, 
                                                                                default value is= 1*/

                $ArrowKeyNavigation: true,   			            //[Optional] Controle pro Teclado
                $SlideDuration: 500,                                //[Optional] Velocidade
                $MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide , default value is 20
                
                //$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
                //$SlideHeight: 300,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
                
                $DisplayPieces: 1,                                  //[Optional] Conteúdo por display, default = 1
                $ParkingPosition: 0,                                //[Optional] default = 0.
                $UISearchMode: 1,                                   /*[Optional] Caminho 
                                                                                0 = parellel, 
                                                                                1 = recursive, 
                                                                                default = 1)*/
                $PlayOrientation: 1,                                /*[Optional] Sentido 
                                                                                1 = horizental, 
                                                                                2 = vertical, 
                                                                                5 = horizental reverse, 
                                                                                6 = vertical reverse, 
                                                                                default = 1*/
                $DragOrientation: 3,                                /*[Optional] Orientation to drag slide, 
                                                                                0 = no drag, 
                                                                                1 = horizental, 
                                                                                2 = vertical, 
                                                                                3 = either, 
                                                                                default = 1*/

                $ThumbnailNavigatorOptions: {
                $Class: $JssorThumbnailNavigator$,              //[Required] Class to create thumbnail navigator instance
                $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always

                $Loop: 2,                                       //[Optional] Enable loop(circular) of carousel or not, 0: stop, 1: loop, 2 rewind, default value is 1
                $AutoCenter: 3,                                 //[Optional] Auto center thumbnail items in the thumbnail navigator container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 3
                $Lanes: 1,                                      //[Optional] Specify lanes to arrange thumbnails, default value is 1
                $SpacingX: 4,                                   //[Optional] Horizontal space between each thumbnail in pixel, default value is 0
                $SpacingY: 4,                                   //[Optional] Vertical space between each thumbnail in pixel, default value is 0
                $DisplayPieces:5,                              //[Optional] Number of pieces to display, default value is 1
                $ParkingPosition: 0,                            //[Optional] The offset position to park thumbnail
                $Orientation: 2,                                //[Optional] Orientation to arrange thumbnails, 1 horizental, 2 vertical, default value is 1
                $DisableDrag: false                             //[Optional] Disable drag or not, default value is false
                }
            };

            var jssor_slider1 = new $JssorSlider$(containerId, options);



            $Jssor$.$AddEvent(window, "resize", $Jssor$.$WindowResizeFilter(window, ScaleSlider));
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            //responsive code end
        };