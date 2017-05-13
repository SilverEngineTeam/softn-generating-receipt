<?php
/**
 * ProductsController.php
 */

namespace Softn\controllers;

use Softn\models\Product;
use Softn\models\ProductsManager;
use Softn\util\Arrays;

/**
 * Class ProductsController
 * @author Nicolás Marulanda P.
 */
class ProductsController extends ControllerAbstract implements ControllerCRUDInterface {
    
    /**
     * ProductsController constructor.
     */
    public function __construct() {
        ViewController::setDirectory('products');
    }
    
    public static function init() {
        parent::method(new ProductsController());
    }
    
    public function insert() {
        ViewController::sendViewData('product', new Product());
        ViewController::view('insert');
    }
    
    public function update() {
        $objectManager = new ProductsManager();
        $object        = $this->getViewForm();
        $id            = Arrays::get($_GET, 'update');
        
        if ($object->getId() == 0) {
            if ($id !== FALSE) {
                $object = $objectManager->getByID($id);
            } else {
                $objectManager->insert($object);
            }
        } else {
            $objectManager->update($object);
        }
        
        ViewController::sendViewData('product', $object);
        ViewController::view('insert');
    }
    
    protected function getViewForm() {
        $product = new Product();
        $product->setId(Arrays::get($_GET, ProductsManager::ID));
        $product->setProductPriceUnit(Arrays::get($_GET, ProductsManager::PRODUCT_PRICE_UNIT));
        $product->setProductReference(Arrays::get($_GET, ProductsManager::PRODUCT_REFERENCE));
        $product->setProductName(Arrays::get($_GET, ProductsManager::PRODUCT_NAME));
        
        return $product;
    }
    
    public function delete() {
        $id = Arrays::get($_GET, 'delete');
        
        //TODO: no se puede borrar un producto si fue agregado en una factura.
        if ($id !== FALSE) {
            $objectManager = new ProductsManager();
            $objectManager->delete($id);
        }
        
        $this->index();
    }
    
    public function index() {
        ViewController::sendViewData('products', $this->getProducts());
        ViewController::view('index');
    }
    
    public static function getProducts() {
        $search        = Arrays::get($_GET, 'search');
        $objectManager = new ProductsManager();
        
        if ($search === FALSE) {
            $objects = $objectManager->getAll();
        } else {
            $objects = $objectManager->filter($search);
        }
        
        return $objects;
    }
    
    public function getProductsJSON() {
        echo json_encode($this->getProducts());
    }
}
