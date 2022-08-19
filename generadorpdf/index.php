<style>
#tabla_facturas{
width:550px;
text-align: center;
overflow:hidden;
}
#tabla_facturas tr{
border-bottom: 1px solid #C0C0C0;
}
#tabla_facturas button{
background-color: #fff;
color:#7AC143;
border:1px solid #7AC143;
}
.tabla_facturas_archivo{
width:40%;
padding-top:10px;
padding-bottom:10px;
text-align: left;
padding-left: 5px;
}
.tabla_facturas_ver{
width:20%;
}
.tabla_facturas_descargar{
width:20%;
}
.tabla_facturas_imprimir{
width:20%;
}
</style>
 
<table id="tabla_facturas">
<tr><th style="text-align:left;padding-left:10px;padding-bottom:20px;">Nombre del Archivo</th><th><img src="ImagenesSitio/eye.png" width="15" height="15" /></th><th><img src="ImagenesSitio/download.png" width="15" height="15" /></th><th><img src="ImagenesSitio/print.png" width="15" height="15" /></th></tr>
<?php for($i=0;$i<5;$i++){ ?>
<tr>
<td class="tabla_facturas_archivo"><img src="ImagenesSitio/pdf-icon.png" width="15" height="15" />&nbsp;<span>5845268985.pdf</td><td class="tabla_facturas_ver"><form action="procesar-factura.php" method="post" target="_blank"><input type="hidden" name="id" value="5845268985" /><input type="hidden" name="accion" value="ver" /><button type="submit">Ver</button></form></td><td class="tabla_facturas_descargar"><form action="procesar-factura.php" method="post"><input type="hidden" name="id" value="5845268985" /><input type="hidden" name="accion" value="descargar" /><button type="submit">Descargar</button></form></td><td class="tabla_facturas_imprimir"><form action="procesar-factura.php" method="post" target="_blank"><input type="hidden" name="id" value="5845268985" /><input type="hidden" name="accion" value="imprimir" /><button type="submit">Imprimir</button></form></td>
</tr>
<?php } ?>
</table>