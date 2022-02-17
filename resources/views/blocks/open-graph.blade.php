    <meta property='og:locale' content='@yield('og_locale')' />
    <meta property='og:site_name' content='Metal Work Industrial' />
    <meta property='og:type' content='@yield('og_type')' />
    <meta property='og:title' content='@yield('og_title')' />
    <meta property='og:description' content='@yield('og_description')' />
    <meta property='og:url' content='@yield('og_url_content')' />
    <meta property='og:image' content='@yield('og_src_image')' />
    <meta property='og:image:width' content='@yield('og_image_width')' />
    <meta property='og:image:height' content='@yield('og_image_height')' />
@hasSection('og_article_published_time')
    <meta property='atricle:published_time' content='@yield('og_article_published_time')' />
@endif
@hasSection('og_article_modified_time')
    <meta property='atricle:modified_time' content='@yield('og_article_modified_time')' />
@endif
