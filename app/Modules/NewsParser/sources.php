<?php
return [
    'rusal' => [
        'url' => 'https://rusal.ru/press-center',
        'title' => 'div[class=press-center-banner__headline] p[class=press-center-banner__title]',
        'link' => 'div[class=press-center-banner__headline] a',
        'date' => 'div[class=press-center-banner__headline] p[class=press-center-banner__date]',
    ],
    'specstal' => [
        'url' => 'http://omz-specialsteel.com/company/news/',
        'title' => 'ul[id=news-list] li a',
        'link' => 'ul[id=news-list] li a',
        'date' => 'ul[id=news-list] li p[class=news-data]',
    ],
    'omk' => [
        'url' => 'https://omk.ru/press/',
        'title' => 'div[class=publications] span strong[class=event-title2]',
        'link' => 'div[class=publications] a',
        'date' => 'div[class=publications] span span[class=event-date]',
    ],
    'nlmk' => [
        'url' => 'https://lipetsk.nlmk.com/ru/media-center/press-releases/',
        'title' => 'h4 a',
        'link' => 'h4 a',
        'date' => 'div[class=articles__item] div[class=headline-info__date]',
    ],
    'chtpz' => [
        'url' => 'https://chtpz.tmk-group.ru/',
        'title' => 'div[class=news] p[class=news__title]',
        'link' => 'div[class=news] a',
        'date' => 'div[class=news] span[class=text-muted  date]',
    ],
    'metalloinvest' => [
        'url' => 'https://www.metalloinvest.com/media/',
        'title' => 'div[class=latestNewsLeft] p[class=bignewsText2]',
        'link' => 'div[class=latestNewsLeft] a',
        'date' => 'div[class=latestNewsLeft] p[class=bignewsDate2]',
    ],
    'tmk' => [
        'url' => 'https://www.tmk-group.ru/PressReleases',
        'title' => 'h4 a',
        'link' => 'h4 a',
        'date' => 'div[class=post__preview] span',
    ],
    'mechel' => [
        'url' => 'https://www.mechel.ru/press/news/',
        'title' => 'div[class=release-card] a',
        'link' => 'div[class=release-card] a',
        'date' => 'div[class=release-card] time[class=time release-time]',
    ],
    'mmk' => [
        'url' => 'https://mmk.ru/ru/press-center/news/',
        'title' => 'div[class=card-news-list__card] div[class=card-article__title]',
        'link' => 'div[class=card-news-list__card] a',
        'date' => 'div[class=card-news-list__card] span[class=card-article__date]',
    ],
    'severstal' => [
        'url' => 'https://www.severstal.com/rus/media/',
        'title' => 'div[class=box news] a',
        'link' => 'div[class=box news] a',
        'date' => 'div[class=box news] div[class=date]',
    ],
    'polema' => [
        'url' => 'http://www.polema.net/news/',
        'title' => 'div[class=news_page] p[class=nname]',
        'link' => 'p[class=podr] a',
        'date' => 'div[class=news_page] p[class=ndate]',
    ],
    'lasar' => [
        'url' => 'https://lasar.ru/news/',
        'title' => 'div[class=item] div[class=title]',
        'link' => 'div[class=item] a',
        'date' => 'div[class=item] div[class=date-block]',
    ],
    'pzm' => [
        'url' => 'https://p-z-m.ru/news/',
        'title' => 'div[class=bx-newslist-block] h3[class=bx-newslist-title] a',
        'link' => 'div[class=bx-newslist-block] h3[class=bx-newslist-title] a',
        'date' => 'div[class=bx-newslist-block] div[class=bx-newslist-date]',
    ],
    'bmk' => [
        'url' => 'https://www.mechel.ru/sector/steel/beloretskiy-metallurgicheskiy-kombinat/press/',
        'title' => 'div[class=release-card] h4[class=release-card-title] a',
        'link' => 'div[class=release-card] h4[class=release-card-title] a',
        'date' => 'div[class=release-card] time[class=time release-time]',
    ],


];