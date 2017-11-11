<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'cate_id' => '1',
                'cate_name' => '建站服务',
                'short_name' => '建站',
                'parent_id' => '0',
                'cate_level' => '1',
                'cate_keywords' => '建站',
                'cate_desc' => '建站服务类',
                'cate_image' => '',
                'sort_order' => '100',
                'is_show' => '1',
                'is_best' => '1',
                'state' => '1',
            ],
            [
                'cate_id' => '2',
                'cate_name' => '云盘资源',
                'short_name' => '资源',
                'parent_id' => '0',
                'cate_level' => '1',
                'cate_keywords' => '云盘,资源',
                'cate_desc' => '云盘资源类',
                'cate_image' => '',
                'sort_order' => '100',
                'is_show' => '1',
                'is_best' => '1',
                'state' => '1',
            ],
            [
                'cate_id' => '3',
                'cate_name' => '程序源码',
                'short_name' => '源码',
                'parent_id' => '0',
                'cate_level' => '1',
                'cate_keywords' => '程序,源码',
                'cate_desc' => '程序源码类',
                'cate_image' => '',
                'sort_order' => '100',
                'is_show' => '1',
                'is_best' => '1',
                'state' => '1',
            ],
            [
                'cate_id' => '4',
                'cate_name' => '原创系列',
                'short_name' => '原创',
                'parent_id' => '0',
                'cate_level' => '1',
                'cate_keywords' => '原创',
                'cate_desc' => '原创系列类',
                'cate_image' => '',
                'sort_order' => '100',
                'is_show' => '1',
                'is_best' => '1',
                'state' => '1',
            ],
            [
                'cate_id' => '5',
                'cate_name' => '其它',
                'short_name' => '其它',
                'parent_id' => '0',
                'cate_level' => '1',
                'cate_keywords' => '其它',
                'cate_desc' => '其它类',
                'cate_image' => '',
                'sort_order' => '100',
                'is_show' => '0',
                'is_best' => '0',
                'state' => '1',
            ],
            [
                'cate_id' => '20',
                'cate_name' => '网站建设',
                'short_name' => '网站',
                'parent_id' => '1',
                'cate_level' => '2',
                'cate_keywords' => '网站建设',
                'cate_desc' => '',
                'cate_image' => '',
                'sort_order' => '100',
                'is_show' => '1',
                'is_best' => '1',
                'state' => '1',
            ],
            [
                'cate_id' => '21',
                'cate_name' => '二次开发',
                'short_name' => '二开',
                'parent_id' => '1',
                'cate_level' => '2',
                'cate_keywords' => '二开,二次开发',
                'cate_desc' => '',
                'cate_image' => '',
                'sort_order' => '100',
                'is_show' => '1',
                'is_best' => '1',
                'state' => '1',
            ],
            [
                'cate_id' => '30',
                'cate_name' => '视频教程',
                'short_name' => '视频',
                'parent_id' => '2',
                'cate_level' => '2',
                'cate_keywords' => '视频教程',
                'cate_desc' => '',
                'cate_image' => '',
                'sort_order' => '100',
                'is_show' => '1',
                'is_best' => '1',
                'state' => '1',
            ],
            [
                'cate_id' => '31',
                'cate_name' => '图书资源',
                'short_name' => '图书',
                'parent_id' => '2',
                'cate_level' => '2',
                'cate_keywords' => '图书资源',
                'cate_desc' => '',
                'cate_image' => '',
                'sort_order' => '100',
                'is_show' => '1',
                'is_best' => '1',
                'state' => '1',
            ],
            [
                'cate_id' => '32',
                'cate_name' => '电影资源',
                'short_name' => '电影',
                'parent_id' => '2',
                'cate_level' => '2',
                'cate_keywords' => '电影资源',
                'cate_desc' => '',
                'cate_image' => '',
                'sort_order' => '100',
                'is_show' => '1',
                'is_best' => '1',
                'state' => '1',
            ],
            [
                'cate_id' => '40',
                'cate_name' => '商城源码',
                'short_name' => '商城',
                'parent_id' => '3',
                'cate_level' => '2',
                'cate_keywords' => '商城源码',
                'cate_desc' => '',
                'cate_image' => '',
                'sort_order' => '100',
                'is_show' => '1',
                'is_best' => '1',
                'state' => '1',
            ],
            [
                'cate_id' => '41',
                'cate_name' => '论坛源码',
                'short_name' => '论坛',
                'parent_id' => '3',
                'cate_level' => '2',
                'cate_keywords' => '论坛源码',
                'cate_desc' => '',
                'cate_image' => '',
                'sort_order' => '100',
                'is_show' => '1',
                'is_best' => '1',
                'state' => '1',
            ],
            [
                'cate_id' => '42',
                'cate_name' => '博客源码',
                'short_name' => '博客',
                'parent_id' => '3',
                'cate_level' => '2',
                'cate_keywords' => '博客源码',
                'cate_desc' => '',
                'cate_image' => '',
                'sort_order' => '100',
                'is_show' => '1',
                'is_best' => '1',
                'state' => '1',
            ],
            [
                'cate_id' => '50',
                'cate_name' => '开发',
                'short_name' => '开发',
                'parent_id' => '4',
                'cate_level' => '2',
                'cate_keywords' => '开发',
                'cate_desc' => '',
                'cate_image' => '',
                'sort_order' => '100',
                'is_show' => '1',
                'is_best' => '1',
                'state' => '1',
            ],
            [
                'cate_id' => '51',
                'cate_name' => '设计',
                'short_name' => '设计',
                'parent_id' => '4',
                'cate_level' => '2',
                'cate_keywords' => '设计',
                'cate_desc' => '',
                'cate_image' => '',
                'sort_order' => '100',
                'is_show' => '1',
                'is_best' => '1',
                'state' => '1',
            ],
            [
                'cate_id' => '52',
                'cate_name' => '教程',
                'short_name' => '教程',
                'parent_id' => '4',
                'cate_level' => '2',
                'cate_keywords' => '教程',
                'cate_desc' => '',
                'cate_image' => '',
                'sort_order' => '100',
                'is_show' => '1',
                'is_best' => '1',
                'state' => '1',
            ],
            [
                'cate_id' => '53',
                'cate_name' => '系统',
                'short_name' => '系统',
                'parent_id' => '4',
                'cate_level' => '2',
                'cate_keywords' => '系统',
                'cate_desc' => '',
                'cate_image' => '',
                'sort_order' => '100',
                'is_show' => '1',
                'is_best' => '1',
                'state' => '1',
            ],
            [
                'cate_id' => '60',
                'cate_name' => '其它',
                'short_name' => '其它',
                'parent_id' => '5',
                'cate_level' => '2',
                'cate_keywords' => '其它',
                'cate_desc' => '',
                'cate_image' => '',
                'sort_order' => '100',
                'is_show' => '1',
                'is_best' => '1',
                'state' => '1',
            ],
            [
                'cate_id' => '100',
                'cate_name' => '电商系统',
                'short_name' => '电商',
                'parent_id' => '20',
                'cate_level' => '3',
                'cate_keywords' => '电商系统',
                'cate_desc' => '',
                'cate_image' => '',
                'sort_order' => '100',
                'is_show' => '1',
                'is_best' => '1',
                'state' => '1',
            ],
            [
                'cate_id' => '101',
                'cate_name' => '企业官网',
                'short_name' => '电商',
                'parent_id' => '20',
                'cate_level' => '3',
                'cate_keywords' => '企业官网',
                'cate_desc' => '',
                'cate_image' => '',
                'sort_order' => '100',
                'is_show' => '1',
                'is_best' => '1',
                'state' => '1',
            ],
            [
                'cate_id' => '102',
                'cate_name' => '个人博客',
                'short_name' => '博客',
                'parent_id' => '20',
                'cate_level' => '3',
                'cate_keywords' => '个人博客',
                'cate_desc' => '',
                'cate_image' => '',
                'sort_order' => '100',
                'is_show' => '1',
                'is_best' => '1',
                'state' => '1',
            ],
            [
                'cate_id' => '103',
                'cate_name' => 'Bbs论坛',
                'short_name' => '论坛',
                'parent_id' => '20',
                'cate_level' => '3',
                'cate_keywords' => 'Bbs论坛',
                'cate_desc' => '',
                'cate_image' => '',
                'sort_order' => '100',
                'is_show' => '1',
                'is_best' => '1',
                'state' => '1',
            ],
            [
                'cate_id' => '120',
                'cate_name' => 'Php开发',
                'short_name' => 'Php',
                'parent_id' => '21',
                'cate_level' => '3',
                'cate_keywords' => 'Php开发',
                'cate_desc' => '',
                'cate_image' => '',
                'sort_order' => '100',
                'is_show' => '1',
                'is_best' => '1',
                'state' => '1',
            ],
            [
                'cate_id' => '121',
                'cate_name' => 'ECshop开发',
                'short_name' => 'ECshop',
                'parent_id' => '21',
                'cate_level' => '3',
                'cate_keywords' => 'ECshop开发',
                'cate_desc' => '',
                'cate_image' => '',
                'sort_order' => '100',
                'is_show' => '1',
                'is_best' => '1',
                'state' => '1',
            ],
            [
                'cate_id' => '122',
                'cate_name' => '微信开发',
                'short_name' => '微信',
                'parent_id' => '21',
                'cate_level' => '3',
                'cate_keywords' => '微信开发',
                'cate_desc' => '',
                'cate_image' => '',
                'sort_order' => '100',
                'is_show' => '1',
                'is_best' => '1',
                'state' => '1',
            ],
            [
                'cate_id' => '123',
                'cate_name' => 'App开发',
                'short_name' => 'App',
                'parent_id' => '21',
                'cate_level' => '3',
                'cate_keywords' => 'App开发',
                'cate_desc' => '',
                'cate_image' => '',
                'sort_order' => '100',
                'is_show' => '1',
                'is_best' => '1',
                'state' => '1',
            ],
        ]);
    }
}
