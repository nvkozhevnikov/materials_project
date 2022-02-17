<?php


namespace App\Modules\NewsParser;


class NewsParser
{
    public $html;
    public $title;
    public $link;
    public $date;

    public function __construct()
    {
        include 'simplehtmldom_1_9_1/simple_html_dom.php';
    }

    public function getData()
    {
        $data = array();
        $sources = include 'sources.php';
        foreach ($sources as $key => $source) {
            $this->html = $this->getHTML($source['url']);
            $this->title = $this->parseTitle($this->html, $source['title']);
            $this->link = $this->prepareUrl($source['url'], $this->parseLink($this->html, $source['link']));
            $this->date = $this->prepareDate($this->parseDate($this->html, $source['date']));

            $data[$key] = [
                'url' => trim($this->link),
                'title' => trim($this->title),
                'date' => trim($this->date),
            ];
        }
//        echo '<pre>';
//        var_dump($data);
        return $data;
    }

    public function getHTML($url)
    {
        $arrContextOptions = stream_context_create(
            array(
                "ssl"=>array(
                    "verify_peer"=>false,
                    "verify_peer_name"=>false,
                ),
                "http" => array(
                    "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36"
                )
            )
        );

        $html = file_get_html($url, false, $arrContextOptions);

        return $html;
    }

    public function parseTitle($html, $title)
    {
        return $html->find($title, 0)->plaintext;
    }

    public function parseLink($html, $link)
    {
        return $html->find($link, 0)->href;
    }

    public function parseDate($html, $date)
    {
        return $html->find($date, 0)->plaintext;
    }

    public function prepareUrl($url, $uri)
    {
        if (preg_match('/^http/', $uri)) {
            return $uri;
        } else {
            $split_url = explode('/', $url);
            $mod_url = $split_url[0] . '//' . $split_url[2];
            return $mod_url . $uri;
        }
    }

    public function splite_date($date, $del)
    {
        $split_date = explode($del, trim(mb_strtolower($date)));
        preg_match('!\d+!', $split_date[0], $day);
        preg_match('/[а-я\d]+/iu', $split_date[1], $month);
        preg_match('!\d+!', $split_date[2], $year);
        return [$day[0], $month[0], $year[0]];
    }

    public function check_year($year)
    {
        if (strlen($year) == 4) {
            return 'ok';
        } elseif (strlen($year) == 2) {
            return 'so-so';
        } else {
            return 'bad';
        }
    }

    public function prepareDate($date)
    {
        if (preg_match('/[а-яА-Я]+/', $date)) {
            $_month_list = array(
                'января' => '-01-',
                'февраля' => '-02-',
                'марта' => '-03-',
                'апреля' => '-04-',
                'мая' => '-05-',
                'июня' => '-06-',
                'июля' => '-07-',
                'августа' => '-08-',
                'сентября' => '-09-',
                'октября' => '-10-',
                'ноября' => '-11-',
                'декабря' => '-12-',
            );
            $split_date = $this->splite_date($date, ' ');
            if ($this->check_year($split_date[2]) === 'ok') {
                $replace_month = $_month_list[$split_date[1]];
                $new_date = $split_date[0] . $replace_month . $split_date[2];
                return date('Y-m-d', strtotime($new_date));
            } elseif ($this->check_year($split_date[2]) === 'so-so') {
                $replace_month = $_month_list[$split_date[1]];
                $new_year = '20' . $split_date[2];
                $new_date = $split_date[0] . $replace_month . $new_year;
                return date('Y-m-d', strtotime($new_date));
            }
        } elseif (preg_match('/[\.]+/', $date) or preg_match('/[\/]+/', $date)) {
            $new_date = preg_replace('/[\/]+/', '.', $date);
            $split_date = $this->splite_date($new_date, '.');
            if ($this->check_year($split_date[2]) === 'ok') {
                $new_date = $split_date[0] . '.' . $split_date[1] . '.' . $split_date[2];
                return date('Y-m-d', strtotime($new_date));
            } elseif ($this->check_year($split_date[2]) === 'so-so') {
                $new_year = '20' . $split_date[2];
                $new_date = $split_date[0] . '.' . $split_date[1] . '.' . $new_year;
                return date('Y-m-d', strtotime($new_date));
            }
        }
    }
}
