<?php


namespace App\Modules\ContentsOfArticle;


class CreateContentsArticle
{
    
    public static function generateArticle($data)
    {
        include 'simplehtmldom_1_9_1/simple_html_dom.php';
        $html = str_get_html($data);
        preg_match_all("#<[hH]([2-6])>(.*?)</[hH][2-6]>#", $html,$matches);
        
        $content = '';
        $h2 = 0;
        $h3 = 0;
        $h4 = 0;
        $h5 = 0;
        $quantity_anchor = 1;
        $soderjanie = "<ol class='contents-article-ol'>";

        for ($i = 0; $i < count($matches[0]); $i++) {
            if ($i != 0 and $matches[1][$i] > $matches[1][$i-1]) {
                $soderjanie .= "<ol class='header-{$matches[1][$i]}'>";

            } elseif ($i != 0 and $matches[1][$i] < $matches[1][$i-1]) {
                $quantity = $matches[1][$i-1] - $matches[1][$i];
                for ($j = 1; $j <= $quantity; $j++)
                    $soderjanie .= '</ol>';
            }
            //Создание якорей в “содержании”, на заголовки в статье
            $quantity_anchor++;
            $soderjanie.="<li><a href='#link-{$quantity_anchor}'>{$matches[2][$i]}</a></li>";

            $search_tag = 'h' . $matches[1][$i];

            if ($search_tag == 'h2') {
                $html->find($search_tag, $h2)->id = "link-{$quantity_anchor}";
                $h2++;
            }
            if ($search_tag == 'h3') {
                $html->find($search_tag, $h3)->id = "link-{$quantity_anchor}";
                $h3++;
            }
            if ($search_tag == 'h4') {
                $html->find($search_tag, $h4)->id = "link-{$quantity_anchor}";
                $h4++;
            }
            if ($search_tag == 'h5') {
                $html->find($search_tag, $h5)->id = "link-{$quantity_anchor}";
                $h5++;
            }

            //Изменение заголовков статьи, путем добавления для каждого уникального ID
            $content = str_replace($matches[0][$i],"<H{$matches[1][$i]} id='HAnch{$quantity_anchor}'>{$matches[2][$i]}</H{$matches[1][$i]}>", $content);
        }
        $soderjanie .= '</ol></div>';
        
        $result = [
            'soderzhanie' => $soderjanie,
            'article_text' => $html,
        ];
        
        return $result;
    }
}