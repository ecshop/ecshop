<?php

declare(strict_types=1);

namespace App\Api\Admin\Requests\DeliveryOrder;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'DeliveryOrderCreateRequest',
    required: [
        self::getDeliveryId,
        self::getDeliverySn,
        self::getOrderSn,
        self::getOrderId,
        self::getInvoiceNo,
        self::getAddTime,
        self::getShippingId,
        self::getShippingName,
        self::getUserId,
        self::getActionUser,
        self::getConsignee,
        self::getAddress,
        self::getCountry,
        self::getProvince,
        self::getCity,
        self::getDistrict,
        self::getSignBuilding,
        self::getEmail,
        self::getZipcode,
        self::getTel,
        self::getMobile,
        self::getBestTime,
        self::getPostscript,
        self::getHowOos,
        self::getInsureFee,
        self::getShippingFee,
        self::getUpdateTime,
        self::getSuppliersId,
        self::getStatus,
        self::getAgencyId,
    ],
    properties: [
        new OA\Property(property: self::getDeliveryId, description: '', type: 'integer'),
        new OA\Property(property: self::getDeliverySn, description: '', type: 'string'),
        new OA\Property(property: self::getOrderSn, description: '', type: 'string'),
        new OA\Property(property: self::getOrderId, description: '', type: 'integer'),
        new OA\Property(property: self::getInvoiceNo, description: '', type: 'string'),
        new OA\Property(property: self::getAddTime, description: '', type: 'integer'),
        new OA\Property(property: self::getShippingId, description: '', type: 'integer'),
        new OA\Property(property: self::getShippingName, description: '', type: 'string'),
        new OA\Property(property: self::getUserId, description: '', type: 'integer'),
        new OA\Property(property: self::getActionUser, description: '', type: 'string'),
        new OA\Property(property: self::getConsignee, description: '', type: 'string'),
        new OA\Property(property: self::getAddress, description: '', type: 'string'),
        new OA\Property(property: self::getCountry, description: '', type: 'integer'),
        new OA\Property(property: self::getProvince, description: '', type: 'integer'),
        new OA\Property(property: self::getCity, description: '', type: 'integer'),
        new OA\Property(property: self::getDistrict, description: '', type: 'integer'),
        new OA\Property(property: self::getSignBuilding, description: '', type: 'string'),
        new OA\Property(property: self::getEmail, description: '', type: 'string'),
        new OA\Property(property: self::getZipcode, description: '', type: 'string'),
        new OA\Property(property: self::getTel, description: '', type: 'string'),
        new OA\Property(property: self::getMobile, description: '', type: 'string'),
        new OA\Property(property: self::getBestTime, description: '', type: 'string'),
        new OA\Property(property: self::getPostscript, description: '', type: 'string'),
        new OA\Property(property: self::getHowOos, description: '', type: 'string'),
        new OA\Property(property: self::getInsureFee, description: '', type: 'string'),
        new OA\Property(property: self::getShippingFee, description: '', type: 'string'),
        new OA\Property(property: self::getUpdateTime, description: '', type: 'integer'),
        new OA\Property(property: self::getSuppliersId, description: '', type: 'integer'),
        new OA\Property(property: self::getStatus, description: '', type: 'integer'),
        new OA\Property(property: self::getAgencyId, description: '', type: 'integer'),
    ]
)]
class DeliveryOrderCreateRequest extends FormRequest
{
    const string getDeliveryId = 'deliveryId';

    const string getDeliverySn = 'deliverySn';

    const string getOrderSn = 'orderSn';

    const string getOrderId = 'orderId';

    const string getInvoiceNo = 'invoiceNo';

    const string getAddTime = 'addTime';

    const string getShippingId = 'shippingId';

    const string getShippingName = 'shippingName';

    const string getUserId = 'userId';

    const string getActionUser = 'actionUser';

    const string getConsignee = 'consignee';

    const string getAddress = 'address';

    const string getCountry = 'country';

    const string getProvince = 'province';

    const string getCity = 'city';

    const string getDistrict = 'district';

    const string getSignBuilding = 'signBuilding';

    const string getEmail = 'email';

    const string getZipcode = 'zipcode';

    const string getTel = 'tel';

    const string getMobile = 'mobile';

    const string getBestTime = 'bestTime';

    const string getPostscript = 'postscript';

    const string getHowOos = 'howOos';

    const string getInsureFee = 'insureFee';

    const string getShippingFee = 'shippingFee';

    const string getUpdateTime = 'updateTime';

    const string getSuppliersId = 'suppliersId';

    const string getStatus = 'status';

    const string getAgencyId = 'agencyId';

    public function rules(): array
    {
        return [
            self::getDeliveryId => 'required',
            self::getDeliverySn => 'required',
            self::getOrderSn => 'required',
            self::getOrderId => 'required',
            self::getInvoiceNo => 'required',
            self::getAddTime => 'required',
            self::getShippingId => 'required',
            self::getShippingName => 'required',
            self::getUserId => 'required',
            self::getActionUser => 'required',
            self::getConsignee => 'required',
            self::getAddress => 'required',
            self::getCountry => 'required',
            self::getProvince => 'required',
            self::getCity => 'required',
            self::getDistrict => 'required',
            self::getSignBuilding => 'required',
            self::getEmail => 'required',
            self::getZipcode => 'required',
            self::getTel => 'required',
            self::getMobile => 'required',
            self::getBestTime => 'required',
            self::getPostscript => 'required',
            self::getHowOos => 'required',
            self::getInsureFee => 'required',
            self::getShippingFee => 'required',
            self::getUpdateTime => 'required',
            self::getSuppliersId => 'required',
            self::getStatus => 'required',
            self::getAgencyId => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            self::getDeliveryId.'.required' => '请设置',
            self::getDeliverySn.'.required' => '请设置',
            self::getOrderSn.'.required' => '请设置',
            self::getOrderId.'.required' => '请设置',
            self::getInvoiceNo.'.required' => '请设置',
            self::getAddTime.'.required' => '请设置',
            self::getShippingId.'.required' => '请设置',
            self::getShippingName.'.required' => '请设置',
            self::getUserId.'.required' => '请设置',
            self::getActionUser.'.required' => '请设置',
            self::getConsignee.'.required' => '请设置',
            self::getAddress.'.required' => '请设置',
            self::getCountry.'.required' => '请设置',
            self::getProvince.'.required' => '请设置',
            self::getCity.'.required' => '请设置',
            self::getDistrict.'.required' => '请设置',
            self::getSignBuilding.'.required' => '请设置',
            self::getEmail.'.required' => '请设置',
            self::getZipcode.'.required' => '请设置',
            self::getTel.'.required' => '请设置',
            self::getMobile.'.required' => '请设置',
            self::getBestTime.'.required' => '请设置',
            self::getPostscript.'.required' => '请设置',
            self::getHowOos.'.required' => '请设置',
            self::getInsureFee.'.required' => '请设置',
            self::getShippingFee.'.required' => '请设置',
            self::getUpdateTime.'.required' => '请设置',
            self::getSuppliersId.'.required' => '请设置',
            self::getStatus.'.required' => '请设置',
            self::getAgencyId.'.required' => '请设置',
        ];
    }
}
