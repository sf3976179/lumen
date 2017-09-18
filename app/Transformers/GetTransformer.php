<?php

namespace App\Transformers;

use App\Models\Itemprice;
use App\Models\Itemstate;
use App\Models\Itemstatetype;
use App\Repositories\ConfigsettingRepository;
use Illuminate\Database\Eloquent\Model;
use League\Fractal\TransformerAbstract;

class GetTransformer extends TransformerAbstract
{
    public function transform(Model $object)
    {
        return $object->attributesToArray();
    }

    public function getByName($name)
    {
        $transformer_map = [
            'apply'       => 'ApplyTransformer',
            'account'       => 'AccountTransformer',
            'accounttoken'       => 'AccounttokenTransformer',
            'accountuser'       => 'AccountuserTransformer',
            'agent'       => 'AgentTransformer',
            'city'       => 'CityTransformer',
            'company'       => 'CompanyTransformer',
            'configgroups'       => 'ConfiggroupTransformer',
            'config'       => 'ConfigTransformer',
            'configsetting'       => 'ConfigsettingTransformer',
            'country'       => 'CountryTransformer',
            'coupon'       => 'CouponTransformer',
            'docfeetype'       => 'DocfeetypeTransformer',
            'file'       => 'FileTransformer',
            'gunmaitem'       => 'GunmaitemTransformer',
            'gunmaorder'       => 'GunmaorderTransformer',
            'openid'       => 'OpenidTransformer',
            'password'     => 'PasswordTransformer',
            'permission'       => 'PermissionTransformer',
            'pluginexpire'       => 'PluginexpireTransformer',
            'plugin'       => 'PluginTransformer',
            'pluginsetting'       => 'PluginsettingTransformer',
            'province'       => 'ProvinceTransformer',
            'role'          => 'RoleTransformer',
            'shop'          => 'ShopTransformer',
            'user'          => 'UserTransformer',
            'verifycode'    => 'VerifycodeTransformer',
            'verifycodenotice'    => 'VerifycodenoticeTransformer',
            'warehouse'     => 'WarehouseTransformer',



            'customergroup'      => 'CustomergroupTransformer',
            'customer'      => 'CustomerTransformer',
            'suppliergroup'  => 'SuppliergroupTransformer',
            'supplier'  => 'SupplierTransformer',
            'address'       => 'AddressTransformer',

            'doctype'      => 'DoctypeTransformer',
            'doctag'      => 'DoctagTransformer',
            'docdetailtag'      => 'DocdetailtagTransformer',
            'docnumber'      => 'DocnumberTransformer',
            'deliverydoc'      => 'DeliverydocTransformer',
            'image'      => 'ImageTransformer',
            'instockdoc'      => 'InstockdocTransformer',
            'instockdocsku'      => 'InstockdocskuTransformer',
            'inventorydoc'      => 'InventorydocTransformer',
            'inventorydocsku'      => 'InventorydocskuTransformer',

            'quantityrangegroup'     => 'QuantityrangegroupTransformer',
            'quantityrange'     => 'QuantityrangeTransformer',
            'pricelevel'     => 'PricelevelTransformer',
            'unit'       => 'UnitTransformer',
            'itemgroup'     => 'ItemgroupTransformer',
            'itemgrouppath'     => 'ItemgrouppathTransformer',
            'itemlog'     => 'ItemlogTransformer',
            'itemprice'     => 'ItempriceTransformer',
            'item'          => 'ItemTransformer',
            'itemstatetype'     => 'ItemstatetypeTransformer',
            'itemstate'     => 'ItemstateTransformer',

            'expenditureitem' => 'ExpenditureitemTransformer',
            'expendituredoc' => 'ExpendituredocTransformer',
            'expendituredocdetail' => 'ExpendituredocdetailTransformer',

            'outstockdoc'     => 'OutstockdocTransformer',
            'outstockdocsku'     => 'OutstockdocskuTransformer',
            'paymentmethod'     => 'PaymentmethodTransformer',
            'paymentorder'     => 'PaymentorderTransformer',
            'payment'     => 'PaymentTransformer',
            'point'     => 'PointTransformer',
            'purchaseorder'    => 'PurchaseorderTransformer',
            'purchaseordersku'    => 'PurchaseorderskuTransformer',
            'salesordercommission'    => 'SalesordercommissionTransformer',
            'orderfee'    => 'OrderfeeTransformer',
            'salesorderlog'    => 'SalesorderlogTransformer',
            'salesorder'    => 'SalesorderTransformer',
            'salesordersku'    => 'SalesorderskuTransformer',
            'skuattributegroup'  => 'SkuattributegroupTransformer',
            'skuattribute'  => 'SkuattributeTransformer',
            'skuattributetype'  => 'SkuattributetypeTransformer',
            'skuimage'  => 'SkuimageTransformer',
            'skulog'  => 'SkulogTransformer',
            'skuprice'  => 'SkupriceTransformer',
            'sku'       => 'SkuTransformer',
            'skustock'  => 'SkustockTransformer',
            'stockevent'  => 'StockeventTransformer',
            'stockrecord'  => 'StockrecordTransformer',

            'transferdoc'     => 'TransferdocTransformer',
            'transferdocsku'     => 'TransferdocskuTransformer',
            'vipcard'     => 'VipcardTransformer',

            'attribute'     => 'AttributeTransformer',
            'attributegroup'  => 'AttributegroupTransformer',
            'attributetype'  => 'AttributetypeTransformer',
            'price'     => 'PriceTransformer',

            'vip' => 'VipTransformer',
            'recordskustock' => 'SkustockrecordTransformer',

            'transportway' =>  'TransportwayTransformer',


            // lumen 新增
            'member' => 'MemberTransformer',
        ];

        if (isset($transformer_map[$name])) {
            $class_name = 'App\Transformers\\' . $transformer_map[$name];
            $class = new \ReflectionClass($class_name);
            return $class->newInstance();
        } else {
            return false;
        }
    }
}
