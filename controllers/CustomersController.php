<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\customer\Phone;
use yii\data\ArrayDataProvider;
use app\models\customer\Customer;
use app\models\customer\PhoneRecord;
use app\models\customer\CustomerRecord;

class CustomersController extends Controller {

    /**
     * Customers index
     *
     * @return string
     */
    public function actionIndex()
    {
        $records = $this->findRecordsByQuery();

        return $this->render('index', compact('records'));
    }


    /**
     * Query records by phone number
     *
     * @return mixed
     */
    private function findRecordsByQuery()
    {
        $number = request()->get('phone_number');
        $records = $this->getRecordsByPhoneNumber($number);
        $dataProvider = $this->wrapIntoDataProvider($records);

        return $dataProvider;
    }


    /**
     * Feed customer records into ArrayDataProvider
     *
     * @param $data
     * @return ArrayDataProvider
     */
    private function wrapIntoDataProvider($data)
    {
        return new ArrayDataProvider([
            'allModels'  => $data,
            'pagination' => false
        ]);
    }


    /**
     * Get records by phone number
     *
     * @param $number
     * @return array
     */
    private function getRecordsByPhoneNumber($number)
    {
        $phoneRecord = PhoneRecord::findOne(['number' => $number]);

        if (!$phoneRecord) return [];

        $customerRecord = CustomerRecord::findOne($phoneRecord->customer_id);

        if (!$customerRecord) return[];

        return [$this->makeCustomer($customerRecord, $phoneRecord)];
    }


    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionAdd()
    {
        $customer = new CustomerRecord;
        $phone = new PhoneRecord;

        dump(app()->layout);die;

        if (request()->post('CustomerRecord')) {

            if ($this->load($customer, $phone, $_POST))
            {
                $this->store($this->makeCustomer($customer, $phone));

                return $this->redirect('/customers');
            }
        }

        return $this->render('add', compact('customer', 'phone'));
    }


    /**
     *
     *
     * @param CustomerRecord $customer
     * @param PhoneRecord $phone
     * @param array $post
     * @return bool
     */
    private function load(CustomerRecord $customer, PhoneRecord $phone, array $post)
    {


        return $customer->load($post)
        && $phone->load($post)
        && $customer->validate()
        && $phone->validate(['number']);
    }


    /**
     * Store a CustomerRecord using Customer attrs
     *
     * @param Customer $customer
     */
    private function store(Customer $customer)
    {
        $customerRecord = new CustomerRecord();
        $customerRecord->name = $customer->name;
        $customerRecord->birth_date = $customer->birth_date->format('Y-m-d');
        $customerRecord->notes = $customer->notes;

        $customerRecord->save();

        foreach ($customer->phones as $phone)
        {
            $phoneRecord = new PhoneRecord();
            $phoneRecord->number = $phone->number;
            $phoneRecord->customer_id = $customerRecord->id;
            $phoneRecord->save();
        }
    }


    /**
     * Return a Customer created with CustomerRecord props.
     *
     * @param CustomerRecord $customerRecord
     * @param PhoneRecord $phoneRecord
     * @return Customer
     */
    public function makeCustomer(CustomerRecord $customerRecord, PhoneRecord $phoneRecord)
    {
        $name = $customerRecord->name;
        $birth_date = new \DateTime($customerRecord->birth_date);

        $customer = new Customer($name, $birth_date);
        $customer->notes = $customerRecord->notes;

        $customer->phones[] = new Phone($phoneRecord->number);

        return $customer;
    }


    /**
     * REnder the query page
     *
     * @return string
     */
    public function actionQuery()
    {
        return $this->render('query');
    }
}
