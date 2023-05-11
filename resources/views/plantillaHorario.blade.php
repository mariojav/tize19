
        <!-- bloque de php -->
        <?php

            $matrix = array();

            $matrix[0][0]='Dia/Hora';

            $matrix[0][1]='Lunes';
            $matrix[0][2]='Martes';
            $matrix[0][3]='Miercoles';
            $matrix[0][4]='Jueves';
            $matrix[0][5]='Viernes';
            $matrix[0][6]='Sabado';

            $matrix[1][0]='6:45-8:15';
            $matrix[2][0]='8:15-9:45';
            $matrix[3][0]='9:45-11:15';
            $matrix[4][0]='11:15-12:45';
            $matrix[5][0]='12:45-14:15';
            $matrix[6][0]='14:15-15:45';
            $matrix[7][0]='15:45-17:15';
            $matrix[8][0]='17:15-18:45';
            $matrix[9][0]='18:45-20:15';
            $matrix[10][0]='20:15-21:45';

            for ($i=1; $i < 11; $i++) { // Ingresa los guines para que se marquen las lineas de la tabla
                for ($j=1; $j < 7; $j++) { 
                    // if  ($matrix[$i][$j] == ""){
                        $matrix[$i][$j] = "    ";
                    // }    
                }
            }

            // if (strcasecmp(($gruposLabo[0]->diagrupo), $matrix[0][1]) == 0) {
            //     echo " Son iguales";
            // }else echo "No son iguales";

            $indice=0;
            foreach ($gruposLabo as $elemento) {
                
                $indiceX = 1;
                $indiceY = 1;

                    while(strcasecmp(($gruposLabo[$indice]->diagrupo), $matrix[0][$indiceY]) <> 0){//Encuentra coordenada x de dia
                            $indiceY = $indiceY + 1;
                    }  
                    // echo $matrix[$indiceX][0];
                    while(strcasecmp(($gruposLabo[$indice]->horagrupo), $matrix[$indiceX][0]) <> 0){ // encuentra coordenada y de hora
                        $indiceX = $indiceX + 1;
                    }
                    // $matrix[$indiceX][$indiceY] = $elemento->nombremateria . " Grupo Lab: " . $elemento->nombregrupolab ." Grupo Mat: $elemento->nombregrupomat";
                    $matrix[$indiceX][$indiceY] = $elemento->nombremateria ." $elemento->nombregrupomat";
                    $indice ++;
            }
            
        ?>

<!-- otra tabla -->

<h3 class="page-title"><center> HORARIOS DEL <?php echo strtoupper($nombrelaboratorio); ?> </center></h3>    
    <div class="panel panel-default">
        
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped  dt-select w-auto">
            <p>
                <table border="2" rules=all width='100%' class="table table-responsive  table-striped dt-select w-auto" >  <!-- Clases quitadas: table-bordered-->
                    <tr>
                        @for ($i=0; $i< count($matrix); $i++ )
                            <tr>
                            @for ($j=0; $j< count($matrix[$i]); $j++ )

                                @if($i == 0)

                                    <th><center> {{ $matrix[$i][$j] }} </center></th> 
                                
                                @else
                                    @if( $j == 0)
                                    <th><center>{{  $matrix[$i][$j] }} </center></th> 
                                    @else
                                    <td><center>{{ $matrix[$i][$j] }} </center></td>
                                    @endif
                                @endif
                            @endfor
                            </tr>
                        @endfor
                    </tr>
                </table>
            </p>        
                
        
            </table>
        </div>
    </div>
