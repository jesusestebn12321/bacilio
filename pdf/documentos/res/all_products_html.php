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
				<th style="text-align:center;font-size: 10pt;" class='midnight-blue'>Código</th>
				<th style="text-align:center;font-size: 10pt;" class='midnight-blue'>Producto</th>
				<th style="text-align:center;font-size: 10pt;" class='midnight-blue'>Descripción</th>
				<th style="text-align:center;font-size: 10pt;" class='midnight-blue'>Proveedor</th>
				<th style="text-align:center;font-size: 10pt;" class='midnight-blue'>Cantidad</th>
				<th style="text-align:center;font-size: 10pt;" class='midnight-blue'>Agregado</th>
				<th style="text-align:center;font-size: 10pt;" class='midnight-blue'>Precio Venta</th>
				<th style="text-align:center;font-size: 10pt;" class='midnight-blue'>Precio Compra</th>
			</tr>
		</thead>
		<tbody style="width: 100% !important; text-align: left; font-size: 9pt;">
		<?php
        	$q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
	        	$id_categoria =intval($_REQUEST['id_categoria']);
				$aColumns = array('codigo_producto', 'nombre_producto','proveedor_producto','cantidad');
				$sTable = "products";
				
				$sWhere.=" order by id_producto desc";
				$sql="SELECT * FROM  products";
				$query = mysqli_query($con, $sql);
				$nConfig = mysqli_num_rows ($query);  
          
		        if ($nConfig > 0)  
		        {  
		            for($i=0; $i<$nConfig; $i++)  
		            {  
		                $verConfig = mysqli_fetch_array($query);  
		               	
		                $CargaConfig[$i] = array('id_producto'=>$verConfig['id_producto'],
						'codigo_producto'=>$verConfig['codigo_producto'],
						'nombre_producto'=>$verConfig['nombre_producto'],
						'descripcion_producto'=>$verConfig['descripcion_producto'],
						'proveedor_producto'=>$verConfig['proveedor_producto'],
						'cantidad'=>$verConfig['cantidad'],
						'date_added'=> date('d/m/Y', strtotime($verConfig['date_added'])),
						'precio_producto'=>$verConfig['precio_producto']);
		            }  
		            foreach ($CargaConfig as $key=>$item) {
		            	$cadena=$item['nombre_producto'].'-id'.$item['id_producto'];
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
							if($value['id_producto']==$split[1]){
								$obj[$count]=$value;

							}
						}
					} 
		        }
				
			foreach ($obj as $key => $row) {
			 	
						$codigo_producto=$row['codigo_producto'];
						$nombre_producto=$row['nombre_producto'];
						$descripcion_producto=$row['descripcion_producto'];
						$proveedor_producto=$row['proveedor_producto'];
						$cantidad=$row['cantidad'];
						$date_added= date('d/m/Y', strtotime($row['date_added']));
						$precio_producto=$row['precio_producto'];
					?>
			<tr>
				<td style="width: 1%;text-align: center;font-size: 8pt;" class="silver">
					<?php echo $codigo_producto; ?>		
				</td>
				<td style="width: 20%;text-align:center; font-size: 8pt;" class="silver">
					<?php echo $nombre_producto; ?>		
				</td>
				<td style="width: 30%;text-align: right;font-size: 8pt;" class="silver">
					<?php echo $descripcion_producto; ?>		
				</td>
				<td style="width: 10%;text-align: center;font-size: 8pt;" class="silver">
					<?php echo  $proveedor_producto;?>		
				</td>
				<td style="width: 1%;text-align: center;font-size: 8pt;" class="silver">
					<?php echo $cantidad; ?>		
				</td>
				<td style="width: 5%;text-align: center;font-size: 8pt;" class="silver">
					<?php echo $date_added; ?>		
				</td>
				<td style="width: 10%;text-align: right;font-size: 8pt;" class="silver">
					$ <?php echo $precio_producto; ?>		
				</td>
				<td style="width: 10%;text-align: right;font-size: 8pt;" class="silver">
					$ <?php echo $precio_producto; ?>		
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