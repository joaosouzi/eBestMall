<?php
/**
 * HongYuKeJi
 * ============================================================================
 * Copyright © 2016-2017 HongYuKeJi.Co.Ltd. All rights reserved.
 * Http://www.hongyuvip.com
 * ----------------------------------------------------------------------------
 * 仅供学习交流使用，如需商用请购买商用版权。
 * 堂堂正正做人，踏踏实实做事。
 * ----------------------------------------------------------------------------
 * Author: Shadow  QQ: 1527200768  Time: 2017/7/18 20:58
 * E-mail: admin@hongyuvip.com
 * ============================================================================
 */


namespace frontend\controllers;

use common\models\ProductAttribute;
use common\models\ProductSku;
use Yii;
use common\models\Product;
use yii\helpers\Url;

class ProductController extends BaseController
{

    /**
     * 商品详情页
     * @param string $id
     * @return mixed
     * 名称/简介/详细介绍
     * 价格/市场价格
     * 累计评价条数/累计销量
     * 图片/属性/评价内容
     * 商家信息: 店铺名称/联系方式/地址/评分
     */
    public function actionIndex($id)
    {
        $model = new Product();
        $product = $model->find()->joinWith(['cat', 'store', 'productSku', 'productAttributeExtends'])->where(['{{%product}}.id' => $id, 'status' => 1])->asArray()->one();
        if ($product && !empty($product['productSku'])) {
            $product['on_sku'] = !empty($product['sku_id_default']) ? $product['sku_id_default'] : $product['productSku'][0]['id'];
            $product['sku'] = !empty(ProductSku::findOne($product['on_sku'])) ? ProductSku::findOne($product['on_sku']) : ProductSku::findOne($product['productSku'][0]['id']);

            $product_attribute = [];
            $attribute = [];
            foreach ($product['productAttributeExtends'] as $key => $value) {
                array_push($attribute, $value['product_attribute_id']);
            }

            // 属性id去重
            $attribute_list = array_values(array_unique($attribute));

            if (!empty($attribute_list)) {
                for ($i = 0; $i < count($attribute_list); $i++) {
                    $product_attribute[$attribute_list[$i]] = [
                        'attribute_id' => $attribute_list[$i],
                        'attribute_name' => ProductAttribute::findOne($attribute_list[$i])->name,
                    ];
                    $product_attribute[$attribute_list[$i]]['attribute_list'] = [];
                    for ($n = 0; $n < count($product['productAttributeExtends']); $n++) {
                        if ($attribute_list[$i] === $product['productAttributeExtends'][$n]['product_attribute_id']) {
                            $attribute = [
                                'id' => $product['productAttributeExtends'][$n]['id'],
                                'value' => $product['productAttributeExtends'][$n]['product_attribute_value'],
                                'default' => '',
                            ];
                            if (in_array($product['productAttributeExtends'][$n]['id'], json_decode($product['sku']['sku_attribute']))) {
                                $attribute['default'] = 'active';
                            }
                            array_push($product_attribute[$attribute_list[$i]]['attribute_list'], $attribute);
                        }
                    }
                }
                $product['attribute'] = (array_values($product_attribute));
            }
            return $this->render('index', [
                'model' => $product,
            ]);
        } else {
            return $this->redirect(Url::to(['site/error']));
        }
    }

    public function actionView()
    {
        return $this->render('view');
    }

    public function actionQuerySku()
    {
        if (Yii::$app->request->isPost) {
            $model = new ProductSku();
            $result = $model->find()->where(['product_id' => Yii::$app->request->post('id'), 'sku_attribute' => Yii::$app->request->post('sku')])->asArray()->one();
            if ($result) {
                return json_encode($result);
            }
        }
    }

    public function actionTest()
    {
        $cats = [
            ['classid' => 1, 'bclassid' => 0, 'classname' => 'classid_1', 'islast' => 0],
            ['classid' => 2, 'bclassid' => 0, 'classname' => 'classid_2', 'islast' => 0],
            ['classid' => 3, 'bclassid' => 1, 'classname' => 'classid_3', 'islast' => 0],
            ['classid' => 4, 'bclassid' => 6, 'classname' => 'classid_4', 'islast' => 1],
            ['classid' => 5, 'bclassid' => 1, 'classname' => 'classid_5', 'islast' => 1],
            ['classid' => 6, 'bclassid' => 2, 'classname' => 'classid_6', 'islast' => 0],
        ];

        /*
        需求：最终呈现

        ---|classid_1
        ---|---|classid_3
        ---|---|---|classid_4
        ---|---|classid5
        ---|classid_2
        ---|---|classid_6


        */


        function getCatTree($cats, $bclassid = 0, $nu = 0)
        {
            $bx = '---|';
            $nu++;
            foreach ($cats as $cat) {
                $catid = $cat['classid'];
                $catname = $cat['classname'];
                $catbid = $cat['bclassid'];
                $islast = $cat['islast'];
                if ($catbid == $bclassid) {
                    echo str_repeat($bx, $nu) . $catname . ($islast ? '_last' : '') . '<br />' . PHP_EOL;
                    getCatTree($cats, $catid, $nu);
                }
            }
        }

        getCatTree($cats);
    }
}