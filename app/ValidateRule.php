<?php
/**
 * Created by SF.
 * User: SF
 * Date: 2017/9/27
 * Time: 10:44
 */

namespace App;

class ValidateRule
{
    protected $rules = [
        'integergoods.speckeyadd'=>[
            'goods_id' => 'required|integer',
            'attr_name' => 'required|string|max:50',
        ],
        'integergoods.specvalueadd'=>[
            'attr_key_id' => 'required|integer',
            'goods_id' => 'required|integer',
            'symbol' => 'required|integer',
            'attr_value' => 'required|string|max:100',
        ],
        'item.store'=>[
            'item_ref' => 'required|string|max:50',
            'name' => 'string|max:100',
//            'unit_number' => 'required|integer',
//            'unit_name' => 'required|string|max:50',
            //'shelve' => 'required|integer',
            //'disable' => 'required|integer',
            //'itemgroups' => 'required|array',
            'skus' => 'required|array',
//            'shops' => 'required|array',
        ],
        'item.update'=>[
            'item_ref' => 'required|string|max:50',
            'name' => 'string|max:100',
            'unit_number' => 'required|integer',
            'unit_name' => 'required|string|max:50',
            'shelve' => 'required|integer',
            'disable' => 'required|integer',
            'itemgroups' => 'required|array',
            'skus' => 'required|array',
            'shops' => 'required|array',
        ],
        'item.createSkusAttributes'=>[
            'name' => 'required|string',
            'skuattributetype_id' => 'required|integer',
        ],
        'itemgroup.store'=>[
            'name' => 'required|string',
            'sort' => 'integer',
            'parent_id' => 'integer',
        ],
        'item.createUnit'=>[
            'name' => 'required|string',
            'number' => 'required|integer',
        ],
        'auth.store'=>[
            'phone' => 'required|string',
            'code' => 'required|string',
            'device_sn' => 'required|string'
        ],
        'account.login'=>[
            'phone' => 'required|string',
            'code' => 'required|string',
            'device_sn' => 'required|string'
        ],
        'account.update'=>[
            'nickname' => 'string',
            'email' => 'string',
        ],
        'account.getVerifyCode'=>[
            'phone' => 'required|string',
            'service_type' => 'required|string',
            'type' => 'required|integer',
            'max_times' => 'required|integer',
        ],
        'account.unbindUser'=>[
            'user_id' => 'required|integer',
        ],
        'account.bindUser'=>[
            'password' => 'required|string',
            'device_sn' => 'required|string'
        ],
        'account.apply'=>[
            'approval' => 'required|integer',
            'account_id' => 'required|integer',
            'type' => 'required|integer',
            'name' => 'string',
            'sex' => 'integer',
            'company_name' => 'required|string',
            'company_type' => 'required|integer',
            'industry' => 'required|string',
            'address' => 'required|string',
            'city_id' => 'required|integer',
            'province_id' => 'required|integer',
            'country_id' => 'required|integer',
            'phone' => 'required|string',
            'email' => 'string',
            'inviter' => 'string',
            'remark' => 'string',
        ],
        'salesorder.store'=>[
            'warehouse_id' => 'required|integer',
            'customer_id' => 'required|integer',
            'address_id' => 'required|integer',
            'seller_id' => 'required|integer',
            'delivery_way' => 'required|integer',
            'settle_way' => 'required|integer',
            'remark' => 'string',
            'salesorderskus' => 'required|array',
            'salesorderskus.*.item_id' => 'required|integer',
            'salesorderskus.*.sku_id' => 'required|integer',
            'salesorderskus.*.warehouse_id' => 'required|integer',
            'salesorderskus.*.unit_number' => 'required|integer',
            'salesorderskus.*.quantity' => 'required|integer',
            'salesorderskus.*.delivery_quantity' => 'required|integer',
            'salesorderskus.*.price' => 'required|numeric',
            'salesorderskus.*.deal_price' => 'required|numeric',
            'salesorderskus.*.sale' => 'required|numeric',
            'salesorderskus.*.doc_sale' => 'required|numeric',
            'salesorderskus.*.remark' => 'string',
            'orderfees' => 'required|array',
            'orderfees.*.docfeetype_id' => 'required|integer',
            'orderfees.*.percent' => 'numeric|min:0|max:1',
            'orderfees.*.value' => 'numeric',
            'payments' => 'array',
            'payments.*.type' => 'required|integer',
            'payments.*.paymentmethod_id' => 'required|integer',
            'payments.*.value' => 'required|numeric',
            'payments.*.enable_value' => 'required|numeric',
            'payments.*.payer_id' => 'required|integer',
            'payments.*.payer_type' => 'required|string',
            'payments.*.remark' => 'string',
        ],
        'salesorder.update'=>[
            'number' => 'integer',
            'from' => 'integer',
            'shop_id' => 'integer',
            'warehouse_id' => 'integer',
            'customer_id' => 'integer',
            'address_id' => 'integer',
            'user_id' => 'integer',
            'seller_id' => 'integer',
            'quantity' => 'integer',
            'delivery_way' => 'integer',
            'settle_way' => 'integer',
            'remark' => 'string',
            'pay_status' => 'integer',
            'delivery_status' => 'integer',
            'lock' => 'integer',
            'status' => 'integer',
            'salesorderskus' => 'array',
            'salesorderskus.*.id' => 'integer',
            'salesorderskus.*.item_id' => 'integer',
            'salesorderskus.*.sku_id' => 'integer',
            'salesorderskus.*.warehouse_id' => 'integer',
            'salesorderskus.*.unit_number' => 'integer',
            'salesorderskus.*.quantity' => 'integer',
            'salesorderskus.*.delivery_quantity' => 'integer',
            'salesorderskus.*.price' => 'numeric',
            'salesorderskus.*.deal_price' => 'numeric',
            'salesorderskus.*.sale' => 'numeric',
            'salesorderskus.*.doc_sale' => 'numeric',
            'salesorderskus.*.remark' => 'string',
            'orderfees' => 'array',
            'orderfees.*.id' => 'integer',
            'orderfees.*.docfeetype_id' => 'integer',
            'orderfees.*.percent' => 'numeric|min:0|max:1',
            'orderfees.*.value' => 'numeric',
        ],
        'instockdoc.store'=>[
            'warehouse_id' => 'required|integer',
            'user_id' => 'required|integer',
            'quantity' => 'required|integer',
            'instockdocskus' => 'required|array'
        ],
        'outstockdoc.store'=>[
            'warehouse_id' => 'required|integer',
            'user_id' => 'required|integer',
            'quantity' => 'required|integer',
            'outstockdocskus' => 'required|array'
        ],
        'transferdoc.store'=>[
            'from_warehouse_id' => 'required|integer',
            'to_warehouse_id' => 'required|integer',
            'user_id' => 'required|integer',
            'number'  => 'required|string',
            'transferdocskus' => 'required|array'
        ],
        'expenditureitem.store'=>[
            'parent_id' => 'integer',
            'name'  => 'required|string',
            'price'  => 'string',
            'sort' => 'integer'
        ],
        'expendituredoc.store'=>[
            'number'  => 'required|string',
            'shop_id' => 'required|integer',
            'user_id' => 'required|integer',
            'pay_status' => 'required|integer',
            'expendituredocdetails' => 'required|array'
        ],
        'purchaseorder.store'=>[
            'number'  => 'required|string',
            'shop_id' => 'required|integer',
            'warehouse_id' => 'required|integer',
            'supplier_id' => 'required|integer',
            'user_id' => 'required|integer',
            'pay_status' => 'required|integer',
            'purchaseorderskus' => 'required|array',
            'orderfees' => 'required|array'
        ],
        'company.store'=>[
            'type' => 'required|integer',
            'project' => 'required|integer',
            'account_id' => 'required|integer',
            'industry' => 'required|string',
            'sale_type' => 'required|string',
            'agent_id' => 'required|integer',
            'db_id' => 'required|integer',
            'api_host' => 'string',
            'inviter' => 'string',
            'expire' => 'integer',
            'wallet_sn' => 'string',
            'used_by' => 'integer',
            'maintain' => 'integer',
            'account' => 'required|string',
            'company_name' => 'required|string',
            'company_address' => 'required|string',
            'city_id' => 'required|integer',
            'province_id' => 'required|integer',
            'country_id' => 'required|integer',
            'company_zip' => 'string',
            'company_email' => 'string',
            'company_site' => 'string',
            'company_tel' => 'string',
            'company_fax' => 'string',
            'company_vatnumber' => 'string',
            'company_tariff' => 'string',
            'company_principle' => 'string',
            'company_symbol' => 'string',
            'company_remark' => 'string'
        ],
        'shop.store'=>[
            'company_id' => 'required|integer',
            'agent_id' => 'required|integer',
            'name' => 'required|string',
            'type' => 'integer',
            'status' => 'integer',
            'expire' => 'integer',
            'region' => 'string',
            'remark' => 'string',
            'sys_remark' => 'string'
        ],
        'shop.update'=>[
            'company_id' => 'integer',
            'agent_id' => 'integer',
            'name' => 'required|string',
            'type' => 'integer',
            'status' => 'integer',
            'expire' => 'integer',
            'region' => 'string',
            'remark' => 'string',
            'sys_remark' => 'string'
        ],
        'warehouse.store'=>[
            'company_id' => 'required|integer',
            'name' => 'required|string',
            'status' => 'integer',
            'remark' => 'string',
        ],
        'warehouse.update'=>[
            'company_id' => 'integer',
            'name' => 'required|string',
            'status' => 'integer',
            'remark' => 'string',
        ],
        'user.store'=>[
            'company_id' => 'required|integer',
            'shop_id' => 'required|integer',
            'role_id' => 'required|integer',
            'account' => 'required|string',
            'password' => 'required|string',
            'name' => 'required|string',
            'email' => 'string',
            'headimg' => 'string',
            'language' => 'string',
            'status' => 'integer',
            'allow_bind' => 'integer',
            'binded' => 'integer',
            'account_user' => 'required|array'
        ],
        'role.store'=>[
            'name' => 'required|string'
        ],
        'warehouse.update'=>[
            'company_id' => 'integer',
            'name' => 'string',
            'status' => 'integer',
            'remark' => 'string',
        ],
        'unit.store'=>[
            'name' => 'required|string',
            'number' => 'required|integer',
            'sort' => 'integer',
            'default' => 'integer',
        ],
        'pricelevel.store'=>[
            'name' => 'required|string',
            'sort' => 'required|integer',
        ],
        'quantityrangegroup.store'=>[
            'name' => 'string',
            'sort' => 'integer',
            'quantityranges' => 'required|array',
        ],
        'coupon.store'=>[
            'owner_account_id' => 'required|integer',
            'owner_company_id' => 'required|integer',
            'user_account_id' => 'integer',
            'gunmaitem_id' => 'required|integer',
            'enable_price'  => 'required|string',
            'value'  => 'required|string',
            'start_time'  => 'string',
            'end_time'  => 'string',
            'quantity' => 'required|integer',
            'code' => 'required|string',
            'remark' => 'string',
            'deal_price' => 'integer',
            'used_at' => 'string'
        ],
        'gunmaorder.store'=>[
            'type'  => 'required|string',
            'number'  => 'required|string',
            'apply_id' => 'required|integer',
            'account_id' => 'required|integer',
            'company_id' => 'required|integer',
            'user_id' => 'required|integer',
            'gunmaitem_id' => 'required|integer',
            'quantity' => 'required|integer',
            'total_price' => 'required|string',
            'discount'  => 'string',
            'coupon_pay'  => 'string',
            'due_price' => 'required|string',
            'paid_price' => 'required|string',
            'coupon_id' => 'integer',
            'pay_channel' => 'required|string',
            'remark' => 'string',
            'system_remark' => 'string',
            'transaction_status' => 'required|integer'
        ],
        'supplier.store'=>[
            'name'  => 'required|string',
            'phone'  => 'required|string',
            'tel' => 'string',
            'fax' => 'string',
            'email' => 'string',
            'site' => 'string',
            'city_id' => 'integer',
            'province_id' => 'integer',
            'country_id' => 'integer',
            'zip'  => 'string',
            'remark1'  => 'string',
            'remark2'  => 'string',
            'remark3'  => 'string',
            'debt'  => 'string',
            'addresses' => 'array'
        ],
        'verifycode.store'=>[
            'phone'  => 'required|string',
            'service_type'  => 'required|string',
            'notice_type' => 'required|string'
        ],
        'openid.store'=>[
            'from'  => 'required|string',
            'openid'  => 'required|string',
            'name' => 'string',
            'headimg' => 'string',
            'company_id' => 'required|integer',
            'shop_id' => 'required|integer'
        ],
        'customer.search'=>[
            'keywords' => 'required|string'
        ]
    ];

    public function getRule($ruleName='')
    {
        if (isset($this->rules[$ruleName])){
            return $this->rules[$ruleName];
        }else{
            return [];
        }
    }
}
