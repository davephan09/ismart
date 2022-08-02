<?php

namespace App\Helpers;

use NumberFormatter;
use Illuminate\Support\Str;

class Helper
{
    public static function postCat($postCat, $parent_id = 0, $char = '')
    {
        $html = '';

        foreach ($postCat as $key => $item) {
            if ($item->parent_id == $parent_id) {
                $html .= '
                <tr>
                    <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                    <td><span class="tbody-text">'. $item->id .'</h3></span>
                    <td class="clearfix">
                        <div class="tb-title fl-left">
                            <a href="" title="">'. $char . $item->name .'</a>
                        </div> 
                        <ul class="list-operation fl-right">
                            <li><a href="/admin/post_cat/edit/'. $item->id .'" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                            <li><a href="#" onclick="removeRow('. $item->id .', \'/admin/post_cat/destroy\')" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                        </ul>
                    </td>
                    <td><span class="tbody-text">'. $item->parent_id .'</span></td>
                    <td><span class="tbody-text">'. self::active($item->parent_id) .'</span></td>
                    <td><span class="tbody-text">'. $item->updated_at .'</span></td>
                </tr>
                ';

                unset($postCat[$key]);

                $html .= self::postCat($postCat, $item->id, $char . '-- ');
            }
        }
        return $html;
    }

    public static function active($active = 0) : string
    {
        return $active = 0 ? '<span>Không</span>' : '<span>Có</span>';
    }

    public static function productCat($productCat, $parent_id = 0, $char = '')
    {
        $html = '';

        foreach ($productCat as $key => $item) {
            if ($item->parent_id == $parent_id) {
                $html .= '
                <tr>
                    <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                    <td><span class="tbody-text">'. $item->id .'</h3></span>
                    <td class="clearfix">
                        <div class="tb-title fl-left">
                            <a href="" title="">'. $char . $item->name .'</a>
                        </div> 
                        <ul class="list-operation fl-right">
                            <li><a href="/admin/product_cat/edit/'. $item->id .'" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                            <li><a href="#" onclick="removeRow('. $item->id .', \'/admin/product_cat/destroy\')" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                        </ul>
                    </td>
                    <td><span class="tbody-text">'. $item->parent_id .'</span></td>
                    <td><span class="tbody-text">'. self::active($item->active) .'</span></td>
                    <td><span class="tbody-text">'. $item->updated_at .'</span></td>
                </tr>
                ';

                unset($productCat[$key]);

                $html .= self::productCat($productCat, $item->id, $char . '-- ');
            }
        }
        return $html;
    }

    #Currency Format
    public static function currencyFormat($money) {
        $fmt = new NumberFormatter( 'de_DE', NumberFormatter::CURRENCY );
        return $fmt->formatCurrency($money, "VND")."\n";
    }


    public static function product_cat($productCat, $parent_id = 0):string
    {
        $html = '';
        foreach ($productCat as $key => $item) {
            if ($item->parent_id == $parent_id) {
                $html .= '
                    <li>
                        <a href="/danh-muc/' . $item->id . '-' . Str::slug($item->name, '-') . ' .html">
                            '. $item->name .'
                        </a>';
                unset($productCat[$key]);
                if (self::isChild($productCat, $item->id)) {
                    $html .= '<ul class="sub-menu">';
                    $html .= self::product_cat($productCat, $item->id);
                    $html .= '</ul>';
                }

                $html .=' </li>';
            }
        }

        return $html;
    }

    public static function isChild($productCat, $id):bool {
        foreach ($productCat as $item) {
            if ($item->parent_id == $id) {
                return true;
            } 
        }
        return false;
    }

    public static function getArrayCatId($productCat, $id)                //Lấy ra mảng cat_id con   
    {
        $array_id = array();
        foreach ($productCat as $cat) {
            if ($cat->parent_id !== 0 && $cat->parent_id == $id) {
                $array_id[] = $cat->id;
            }
        }
        return $array_id;
    }
}
