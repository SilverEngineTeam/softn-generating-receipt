<?php
use Softn\models\OptionsManager;
use Softn\controllers\ViewController;

$valueName                   = ViewController::getViewData('name');
$valueIdentificationDocument = ViewController::getViewData('identificationDocument');
$valueAddress                = ViewController::getViewData('address');
$valuePhoneNumber            = ViewController::getViewData('phoneNumber');
$valueWebSite                = ViewController::getViewData('webSite');
$valueIVA                    = ViewController::getViewData('IVA');
?>
<div>
    <h1>Opciones</h1>
</div>
<div>
    <form method="get">
        <div class="panel panel-default">
            <div class="panel-heading">Datos de la factura</div>
            <div class="panel-body form-table">
                <div class="form-group input-group">
                    <span id="span-option-name" class="input-group-addon">Nombre:</span>
                    <input id="option-name" class="form-control" type="text" aria-describedby="span-option-name" name="<?php echo OptionsManager::OPTION_KEY_NAME; ?>" value="<?php echo $valueName->getOptionValue(); ?>">
                </div>
                <span class="form-table-cell-hidden"></span>
                <div class="form-group input-group">
                    <span id="span-option-identification-document" class="input-group-addon">Documento de identificación:</span>
                    <input id="option-name" class="form-control" type="text" aria-describedby="span-option-identification-document" name="<?php echo OptionsManager::OPTION_KEY_IDENTIFICATION_DOCUMENT; ?>" value="<?php echo $valueIdentificationDocument->getOptionValue(); ?>">
                </div>
                <span class="form-table-cell-hidden"></span>
                <div class="form-group input-group">
                    <span id="span-option-address" class="input-group-addon">Dirección:</span>
                    <input id="option-address" class="form-control" type="text" aria-describedby="span-option-address" name="<?php echo OptionsManager::OPTION_KEY_ADDRESS; ?>" value="<?php echo $valueAddress->getOptionValue(); ?>">
                </div>
                <span class="form-table-cell-hidden"></span>
                <div class="form-group input-group">
                    <span id="span-option-phone-number" class="input-group-addon">Teléfono:</span>
                    <input id="option-phone-number" class="form-control" type="tel" aria-describedby="span-option-phone-number" name="<?php echo OptionsManager::OPTION_KEY_PHONE_NUMBER; ?>" value="<?php echo $valuePhoneNumber->getOptionValue(); ?>">
                </div>
                <span class="form-table-cell-hidden"></span>
                <div class="form-group input-group">
                    <span id="span-option-web-site" class="input-group-addon">Pagina web:</span>
                    <input id="option-web-site" class="form-control" type="text" aria-describedby="span-option-web-site" name="<?php echo OptionsManager::OPTION_KEY_WEB_SITE; ?>" value="<?php echo $valueWebSite->getOptionValue(); ?>">
                </div>
                <span class="form-table-cell-hidden"></span>
                <div class="form-group input-group">
                    <span id="span-option-iva" class="input-group-addon">I.V.A.:</span>
                    <input id="option-iva" class="form-control" type="number" aria-describedby="span-option-iva" name="<?php echo OptionsManager::OPTION_KEY_IVA; ?>" value="<?php echo $valueIVA->getOptionValue(); ?>">
                </div>
            </div>
        </div>
        <input type="hidden" name="method" value="update">
        <button class="btn btn-primary" type="submit">Guardar</button>
    </form>
</div>
