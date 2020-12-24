<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use app\modules\Presentasi\models\Menu;
use app\modules\Presentasi\models\Content;
use app\modules\Presentasi\models\Images;


class HelloController extends Controller
{
    public function actionIndex()
    {
        // $faker = \Faker\Factory::create();

   
        
        $menuData = ['Color','Style','Recent','Popular','Education','Business','Marketing','Medical','Multi-Purpose','Infographics'];
        $contentData = ['Sketchnotes Lesson','Christmas Presents'];
        $images_one = ['1.jpg','2.jpg','3.jpg'];
        $images_two = ['4.jpg','5.jpg'];


        foreach($menuData as $val){
            $menu = new Menu();
            

            
            $menu->title  = $val;
            $menu->parent = -1; 
            $menu->save();
            $id = $menu->id;

            for ( $c = 0; $c < 30; $c++ )
            {


                $content = new Content();

                $getIndex = rand(0,1);
                $content->title = $contentData[$getIndex];
                $content->description = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, ";
                $content->menu_id = $id;
                $content->default_images = $getIndex == 0 ? '1.jpg' : '4.jpg';
                $randGratisAtauBayar = rand(0,1);
                $content->status = $randGratisAtauBayar;
                $content->harga = $randGratisAtauBayar == 0 ? 0 : 10000;
                $content->file_ppt = 'contoh.pptx';
                $content->is_published = 1;
                $content->save();
                $contentId = $content->id;


                
                if($getIndex == 0){
                    foreach($images_one as $x){
                        $images = new Images();

                        $images->name = $x;
                        $images->content_id = $contentId;
                        $images->save();
                    }
                }
                else{
                    foreach($images_two as $x){
                        $images = new Images();

                        $images->name = $x;
                        $images->content_id = $contentId;
                        $images->save();
                    }
                }
            }
        }
    }
}
