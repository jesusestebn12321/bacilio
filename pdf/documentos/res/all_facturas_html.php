<style type="text/css">
<!--
table { vertical-align: top; }
tr    { vertical-align: top; }
td    { vertical-align: top; }
th    { vertical-align: top; }
.midnight-blue{
	background:#2c3e50;
	padding: 4px 4px 4px;
	color:white;
	font-weight:bold;
	font-size:12px;
}
.silver{
	background:white;
	padding: 3px 4px 3px;
}
.clouds{
	background:#ecf0f1;
	padding: 3px 4px 3px;
}
.border-top{
	border-top: solid 1px #bdc3c7;
	
}
.border-left{
	border-left: solid 1px #bdc3c7;
}
.border-right{
	border-right: solid 1px #bdc3c7;
}
.border-bottom{
	border-bottom: solid 1px #bdc3c7;
}
table.page_footer {width: 100%; border: none; background-color: white; padding: 2mm;border-collapse:collapse; border: none;}
}
-->
</style>
<page backtop="15mm" backbottom="15mm" backleft="15mm" backright="15mm" style="font-size: 12pt; font-family: arial">
	<page_footer>
		<table class="page_footer">
		    <tr>

		        <td style="width: 50%; text-align: left">
		            P&aacute;gina [[page_cu]]/[[page_nb]]
		        </td>
		        <td style="width: 50%; text-align: right">
		            &copy; <?php echo ""; echo  $anio=date('m/d/Y'); ?>
		        </td>
		    </tr>
		</table>
	</page_footer>
    <table cellspacing="0" style="width: 100%;">
        <tbody>
        <tr>
           <td style="width: 50%; color: #444444;font-family: Helvetica">
                <img style="width: 40%;" src="../../img/logo.jpg" alt="Logo">                
                <br>
                <br>
                <span style="font-size:14px;font-weight:bold;font-family: Helvetica"><?php echo "VAZQUEZ VAZQUEZ EFRAIN SANTIAGO";?></span>
                <br>
                <span style="font-size:14px;font-weight:bold;font-family: Helvetica"><?php echo "CENTRO FERRETERO 'BACILIO'";?></span>
				<br>
				<span style="font-size:9.5px;font-weight:bold;font-family: Helvetica"><?php echo "FERRETERIA EN GENERAL-VENTAS POR MAYOR Y MENOR";?></span>
				<br> 
				<span style="font-size:12px;font-family: Helvetica">Teléfono: <?php echo "24975159 * Cel: 0990151449";?></span>
				<br> 
				<span style="font-size:12px;font-family: Helvetica">Email: <?php echo "bacichato@hotmail.com";?></span>
				<br>
                <span style="font-size:12px;font-family: Helvetica"><?php echo "Guayaquil-Ecuador";?></span>
				<br> 
				 <span style="font-size:12px;font-family: Helvetica"><?php echo "R.U.C. 0916593338001";?></span>
				<br> 
				<span style="font-size:12px;font-family: Helvetica"><?php echo "DOCUMENTO CATEGORIZADO: NO";?></span>
				<br> 
				<span style="font-size:12px;font-family: Helvetica"><?php echo "FECHA DE AUT. 10/03/2020";?></span>
				<br> 
				<span style="font-size:12px;font-family: Helvetica"><?php echo "AUT. S.R.L.:1126391281";?></span>
				<br> 
				<span style="font-size:12px;font-family: Helvetica"><?php echo "'OBLIGADO A LEVAR CONTABILIDAD'";?></span>
            </td>
        </tr>
        </tbody>	
    </table>
	<hr>
	<table cellspacing="1" style="width: 100%; text-align: left; font-size: 11pt;">
        <thead>
			<tr>
				<th style="width:1%;text-align:center;font-size: 12pt;" class='midnight-blue'>#</th>
				<th style="width:14%;text-align:center;font-size: 12pt;" class='midnight-blue'>Fecha</th>
				<th style="width:25%;text-align:center;font-size: 12pt;" class='midnight-blue'>R.U.C</th>
				<th style="width:39%;text-align:center;font-size: 12pt;" class='midnight-blue'>Vendedor</th>
				<th style="width:1%;text-align:center;font-size: 12pt;" class='midnight-blue'>Estado</th>
				<th style="width:10%;text-align:center;font-size: 12pt;" class='midnight-blue'>Total</th>
			</tr>
		</thead>
		<tbody style="width: 100% !important; text-align: left; font-size: 9pt;">
		<?php
 		$q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		$sTable = "facturas, clientes, users";
		$sWhere = "";
		$sWhere.=" WHERE facturas.id_cliente=clientes.id_cliente and facturas.id_vendedor=users.user_id";
		$sWhere.=" order by facturas.id_factura desc";
		//main query to fetch the data
		$sql="SELECT * FROM  $sTable $sWhere";
		$query = mysqli_query($con, $sql);
		$nConfig = mysqli_num_rows ($query);  
  
        if ($nConfig > 0)  
        {  
            for($i=0; $i<$nConfig; $i++)  
            {  
                $verConfig = mysqli_fetch_array($query);  
               	
                $CargaConfig[$i] = array('id_factura'=>$verConfig['id_factura'],
			'numero_factura'=>$verConfig['numero_factura'],
			'fecha'=>date("d/m/Y", strtotime($verConfig['fecha_factura'])),
			'RUC_cliente'=>$verConfig['RUC_cliente'],
			'ciudad_cliente'=>$verConfig['ciudad_cliente'],
			'telefono_cliente'=>$verConfig['telefono_cliente'],
			'nombre_vendedor'=>$verConfig['firstname']." ".$verConfig['lastname'],
			'estado_factura'=>$verConfig['estado_factura'],
			'total_venta'=>$verConfig['total_venta'],);
            }
            foreach ($CargaConfig as $key=>$item) {
            	$cadena=$item['fecha'].'-id'.$item['id_factura'];
            	$array_tmp[$key]=$cadena;
            }
            //setlocale(LC_COLLATE, 'es_ES.utf8');
			asort($array_tmp, SORT_LOCALE_STRING);
			
			foreach($array_tmp as $item) {
				# code...
				//echo $item.'<br>';
				$split=explode('-id', $item);
				//var_dump($split);
				//echo '<br>';
				$cont=0;
				foreach ($CargaConfig as $value) {
					# code...
					$count++;
					if($value['id_factura']==$split[1]){
						$obj[$count]=$value;

					}
				}
			} 
            //var_dump($obj);
        }
		foreach ($obj as $row){
			$numero_factura=$row['numero_factura'];
			$fecha=$row['fecha'];
			$RUC_cliente=$row['RUC_cliente'];
			$nombre_vendedor=$row['nombre_vendedor'];
			$estado_factura=$row['estado_factura'];
			$total_venta=$row['total_venta'];
			if ($estado_factura==1){$text_estado="Pagada";$label_class='label-success';}
			else{$text_estado="Pendiente";$label_class='label-warning';}

		?>
			<tr>
				<td style="width: 1%;text-align: center;font-size: 11pt;" class="silver">
					<?php echo $numero_factura; ?>		
				</td>
				<td style="width: 14%;text-align:center; font-size: 11pt;" class="silver">
					<?php echo $fecha; ?>		
				</td>
				<td style="width: 25%;text-align: right;font-size: 11pt;" class="silver">
					<?php echo $RUC_cliente; ?>		
				</td>
				<td style="width: 39%;text-align: center;font-size: 11pt;" class="silver">
					<?php echo $nombre_vendedor; ?>		
				</td>
				<td style="width: 1%;text-align: center;font-size: 11pt;" class="silver">
					<?php echo $text_estado; ?>		
				</td>
				<td style="width: 10%;text-align: right;font-size: 11pt;" class="silver">
					<?php echo $total_venta; ?>		
				</td>
			</tr>
		<?php
		}
		?>
		</tbody>
		
        
   
    </table>
	
	<hr>
	<page_footer>
		<div style="font-size:11pt;text-align:center;font-weight:bold">________________</div>
		<div style="font-size:11pt;text-align:center;font-weight:bold">Firma Autorizada</div>
		<br>
		<br>
		<div style="font-size:11pt;text-align:center;font-weight:bold">_______________</div>
		<div style="font-size:11pt;text-align:center;font-weight:bold">Recibe Conforme</div>
		<br>
		<br>
	</page_footer>
</page>