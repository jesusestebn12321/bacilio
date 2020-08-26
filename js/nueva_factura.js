
		$(document).ready(function(){
			load(1);
		});

		function load(page){
			var q= $("#q").val();
			var id_categoria=$('#id_categoria').val();
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'./ajax/productos_factura.php?action=ajax&page='+page+'&q='+q+'&id_categoria='+id_categoria,
				 beforeSend: function(objeto){
				 $('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
			  },
				success:function(data){
					$(".outer_div").html(data).fadeIn('slow');
					$('#loader').html('');
					
				}
			})
		}

	function agregar (id,stock){
		var precio_venta=document.getElementById('precio_venta_'+id).value;
		var cantidad=$('#cantidad_'+id).val();
		//Inicia validacion
		if(stock==0){
			console.log('el stock es menor a la cantidad');
			toastr['error']('El producto no tiene stock.','Error');
			document.getElementById('cantidad_'+id).focus();
			return false;
		}
		if(cantidad==0){
			document.getElementById('cantidad_'+id).focus();
			toastr['error']('No tiene una cantidad asignada.','Error');
			return false;
		}
		if(isNaN(cantidad)){
			toastr['error']('Esto no es un numero','Error');
			document.getElementById('cantidad_'+id).focus();
			return false;
		}
		if(isNaN(precio_venta)){
			toastr['error']('Esto no es un numero','Error');
			document.getElementById('precio_venta_'+id).focus();
			return false;
		//Fin validacion
		}		
		$.ajax({
	        type: "POST",
	        url: "./ajax/agregar_facturacion.php",
	        data: "id="+id+"&precio_venta="+precio_venta+"&cantidad="+cantidad,
			beforeSend: function(objeto){
				$("#resultados").html("Mensaje: Cargando...");
			},
	        success: function(datos){
				$("#resultados").html(datos);
				toastr['success']('Se agrego un producto con exito.','Exito');
			}
		});
			
	}
		
	function eliminar (id){
		$.ajax({
	        type: "GET",
	        url: "./ajax/agregar_facturacion.php",
	        data: "id="+id,
			beforeSend: function(objeto){
				$("#resultados").html("Mensaje: Cargando...");
		  	},
        	success: function(datos){
				$("#resultados").html(datos);
			}
		});
	}	
	
	$("#datos_factura").submit(function(){
		var id_cliente = $("#id_cliente").val();
		var id_vendedor = $("#id_vendedor").val();
		var condiciones = $("#condiciones").val();
		  
		if (id_cliente==""){
			alert("Debes seleccionar un cliente");
			$("#nombre_cliente").focus();
			return false;
		}
		VentanaCentrada('./pdf/documentos/factura_pdf.php?id_cliente='+id_cliente+'&id_vendedor='+id_vendedor+'&condiciones='+condiciones,'Factura','','1024','768','true');
	});
		
		$( "#guardar_cliente" ).submit(function( event ) {
		  $('#guardar_datos').attr("disabled", true);
		  
		 var parametros = $(this).serialize();
			 $.ajax({
					type: "POST",
					url: "ajax/nuevo_cliente.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados_ajax").html("Mensaje: Cargando...");
					  },
					success: function(datos){
					$("#resultados_ajax").html(datos);
					$('#guardar_datos').attr("disabled", false);
					load(1);
				  }
			});
		  event.preventDefault();
		})
		
		$( "#guardar_producto" ).submit(function( event ) {
		  $('#guardar_datos').attr("disabled", true);
		  
		 var parametros = $(this).serialize();
			 $.ajax({
					type: "POST",
					url: "ajax/nuevo_producto.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados_ajax_productos").html("Mensaje: Cargando...");
					  },
					success: function(datos){
					$("#resultados_ajax_productos").html(datos);
					$('#guardar_datos').attr("disabled", false);
					load(1);
				  }
			});
		  event.preventDefault();
		})
