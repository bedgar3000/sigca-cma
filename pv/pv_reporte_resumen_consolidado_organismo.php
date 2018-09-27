<?php
$fCodOrganismo = $_SESSION["FILTRO_ORGANISMO_ACTUAL"];
$fPeriodoD = "01-01-" . $AnioActual;
$fPeriodoH = getDiasMes($PeriodoActual) . "-" . $MesActual . "-" . $AnioActual;
//	------------------------------------
$_titulo = "Resumen Estad&iacute;stico de Partidas Consolidado por Organismo";
$_width = 900;
?>
<div class="ui-layout-north">
	<div style="padding:5px;">
        <table width="100%" cellspacing="0" cellpadding="0">
            <tr>
                <td class="titulo"><?=$_titulo?></td>
                <td align="right"><a class="cerrar" href="../framemain.php">[cerrar]</a></td>
            </tr>
        </table><hr width="100%" color="#333333" />
        <form name="frmentrada" id="frmentrada" action="pv_reporte_resumen_consolidado_organismo_pdf.php" method="post" autocomplete="off" target="pdf" onsubmit="return validar();">
            <input type="hidden" name="_APLICACION" id="_APLICACION" value="<?=$_APLICACION?>" />
            <input type="hidden" name="concepto" id="concepto" value="<?=$concepto?>" />
            
            <!--FILTRO-->
            <div class="divBorder" style="width:100%; min-width:<?=$_width?>px;">
                <table class="tblFiltro" style="width:100%; min-width:<?=$_width?>px;">
                    <tr>
                        <td align="right">Organismo:</td>
                        <td>
                            <input type="checkbox" checked onclick="this.checked=!this.checked;" />
                            <select name="fCodOrganismo" id="fCodOrganismo" style="width:225px;" onChange="loadSelect($('#fCodUnidadEjec'), 'tabla=pv_unidadejecutora&CodOrganismo='+$(this).val(), 1); loadSelect($('#fCodDependencia'), 'tabla=dependencia_filtro&opcion='+$(this).val(), 1);">
                                <?=getOrganismos($fCodOrganismo, 3);?>
                            </select>
                        </td>
                        <td align="right">Unidad Ejecutora: </td>
                        <td>
                            <input type="checkbox" onclick="chkFiltro(this.checked, 'fCodUnidadEjec');" />
                            <select name="fCodUnidadEjec" id="fCodUnidadEjec" style="width:225px;" disabled>
                                <option value="">&nbsp;</option>
                                <?=loadSelect2('pv_unidadejecutora','CodUnidadEjec','Denominacion',$fCodUnidadEjec,10,['CodOrganismo'],[$fCodOrganismo]);?>
                            </select>
                        </td>
                        <td align="right">Fecha:</td>
                        <td>
                            <input type="checkbox" checked onclick="this.checked=!this.checked;" />
                            <input type="text" name="fPeriodoD" id="fPeriodoD" value="<?=$fPeriodoD?>" class="datepicker" style="width:60px;" maxlength="10" />
                            <input type="text" name="fPeriodoH" id="fPeriodoH" value="<?=$fPeriodoH?>" class="datepicker" style="width:60px;" maxlength="10" />
                        </td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="right">Dependencia: </td>
                        <td>
                            <input type="checkbox" onclick="chkFiltro(this.checked, 'fCodDependencia');" />
                            <select name="fCodDependencia" id="fCodDependencia" style="width:225px;" disabled>
                                <option value="">&nbsp;</option>
                                <?=getDependencias('', $fCodOrganismo, 0);?>
                            </select>
                        </td>
                        <td align="right">Categoria Prog.:</td>
                        <td class="gallery clearfix">
                            <input type="checkbox" onclick="ckLista(this.checked, ['fCategoriaProg'], ['aCategoriaProg']);" />
                            <input type="text" name="fCategoriaProg" id="fCategoriaProg" style="width:100px;" readonly="readonly" />
                            <a href="../lib/listas/gehen.php?anz=lista_pv_categoriaprog&filtrar=default&ventana=pv_metas&campo1=fCategoriaProg&FlagOrganismo=S&fCodOrganismo=<?=$fCodOrganismo?>&iframe=true&width=100%&height=100%" rel="prettyPhoto[iframe1]" id="aCategoriaProg" style="visibility:hidden;">
                                <img src="../imagenes/f_boton.png" width="20" title="Seleccionar" align="absbottom" style="cursor:pointer;" />
                            </a>
                        </td>
                        <td align="right">Partida:</td>
                        <td>
                            <input type="checkbox" onclick="chkCampos2(this.checked, ['fPar','fGen','fEsp','fSub']);" />
                            <input type="text" name="fPar" id="fPar" style="width:27px;" disabled /> .
                            <input type="text" name="fGen" id="fGen" style="width:22px;" disabled /> .
                            <input type="text" name="fEsp" id="fEsp" style="width:22px;" disabled /> .
                            <input type="text" name="fSub" id="fSub" style="width:22px;" disabled />
                        </td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <input type="checkbox" name="fFlagDisponible" id="fFlagDisponible" value="S" /> Mostrar Disponible p/ Traslado
                        </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td align="right"><input type="submit" value="Buscar"></td>
                    </tr>
                </table>
            </div>
            <div class="sep"></div>
        </form>
    </div>
</div>

<iframe class="ui-layout-center" id="pdf" name="pdf"></iframe>

<script type="text/javascript" src="../js/jquery.layout.js" charset="utf-8"></script>
<script type="text/javascript" language="javascript">
    $(document).ready(function() {
    	$('body').layout({ applyDemoStyles: true });
    });
    function validar() {
        if ($('#fCodOrganismo').val() == '') {cajaModal('Debe seleccionar el Organismo','error'); return false;}
        else if ($('#fPeriodoD').val() == '') {cajaModal('Debe ingresar el Periodo','error'); return false;}
        else if ($('#fPeriodoH').val() == '') {cajaModal('Debe ingresar el Periodo','error'); return false;}
        else return true;
    }
</script>